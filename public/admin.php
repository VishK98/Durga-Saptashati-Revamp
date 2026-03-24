<?php
session_start();
require_once '../app/config/config.php';

// Handle login
if (isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['login_time'] = time();
        header('Location: admin.php?page=dashboard');
        exit;
    } else {
        $loginError = 'Invalid email or password.';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// If not logged in, show login page
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    include '../admin/views/login.php';
    exit;
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_GET['action'] ?? '') === 'update_profile' && ($_GET['page'] ?? '') === 'settings') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE admin_users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $_SESSION['admin_id']]);
        $_SESSION['admin_name'] = $name;
        $_SESSION['admin_email'] = $email;
        $_SESSION['settings_success'] = 'Profile updated successfully.';
    } else {
        $_SESSION['settings_error'] = 'Name and email are required.';
    }
    header('Location: admin.php?page=settings');
    exit;
}

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_GET['action'] ?? '') === 'change_password' && ($_GET['page'] ?? '') === 'settings') {
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($newPassword !== $confirmPassword) {
        $_SESSION['settings_error'] = 'New passwords do not match.';
    } elseif (strlen($newPassword) < 6) {
        $_SESSION['settings_error'] = 'New password must be at least 6 characters.';
    } else {
        $stmt = $pdo->prepare("SELECT password FROM admin_users WHERE id = ?");
        $stmt->execute([$_SESSION['admin_id']]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($currentPassword, $admin['password'])) {
            $stmt = $pdo->prepare("UPDATE admin_users SET password = ? WHERE id = ?");
            $stmt->execute([password_hash($newPassword, PASSWORD_DEFAULT), $_SESSION['admin_id']]);
            $_SESSION['settings_success'] = 'Password updated successfully.';
        } else {
            $_SESSION['settings_error'] = 'Current password is incorrect.';
        }
    }
    header('Location: admin.php?page=settings');
    exit;
}

// Helper: generate slug from title
function generateSlug($title, $pdo, $excludeId = null) {
    $slug = strtolower(trim($title));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s-]+/', '-', $slug);
    $slug = trim($slug, '-');

    $baseSlug = $slug;
    $counter = 1;
    while (true) {
        $sql = "SELECT id FROM blogs WHERE slug = ?";
        $params = [$slug];
        if ($excludeId) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        if (!$stmt->fetch()) break;
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }
    return $slug;
}

// Helper: handle blog image upload
function handleBlogImageUpload($file) {
    $uploadDir = __DIR__ . '/assets/uploads/blogs/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) return false;
    if ($file['size'] > 5 * 1024 * 1024) return false;
    $filename = uniqid('blog_', true) . '.' . $ext;
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
        return $filename;
    }
    return false;
}

// Handle create blog
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create_blog') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');
    $author = trim($_POST['author'] ?? 'Admin');
    $status = isset($_POST['publish']) ? 'published' : 'draft';
    $slug = generateSlug($title, $pdo);

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = handleBlogImageUpload($_FILES['image']);
    }

    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, category, content, meta_description, meta_keywords, author, image, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $image, $status]);
    $_SESSION['blog_success'] = 'Blog post created successfully.';
    header('Location: admin.php?page=blogs');
    exit;
}

// Handle update blog
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_blog') {
    $id = (int)($_POST['blog_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');
    $author = trim($_POST['author'] ?? 'Admin');
    $status = isset($_POST['publish']) ? 'published' : 'draft';
    $slug = generateSlug($title, $pdo, $id);

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = handleBlogImageUpload($_FILES['image']);
        if ($image) {
            // Delete old image
            $stmt = $pdo->prepare("SELECT image FROM blogs WHERE id = ?");
            $stmt->execute([$id]);
            $old = $stmt->fetch();
            if ($old && $old['image']) {
                $oldPath = __DIR__ . '/assets/uploads/blogs/' . $old['image'];
                if (file_exists($oldPath)) unlink($oldPath);
            }
            $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, image=?, status=? WHERE id=?");
            $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $image, $status, $id]);
        }
    }
    if (!$image) {
        $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, status=? WHERE id=?");
        $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $status, $id]);
    }

    $_SESSION['blog_success'] = 'Blog post updated successfully.';
    header('Location: admin.php?page=blogs');
    exit;
}

// Handle delete blog
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_blog') {
    $id = (int)($_POST['blog_id'] ?? 0);
    $stmt = $pdo->prepare("SELECT image FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    $blog = $stmt->fetch();
    if ($blog && $blog['image']) {
        $imgPath = __DIR__ . '/assets/uploads/blogs/' . $blog['image'];
        if (file_exists($imgPath)) unlink($imgPath);
    }
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['blog_success'] = 'Blog post deleted successfully.';
    header('Location: admin.php?page=blogs');
    exit;
}

// Handle approve comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'approve_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blog_comments SET status = 'approved' WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment approved successfully.';
    header('Location: admin.php?page=comments');
    exit;
}

// Handle reject comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'reject_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blog_comments SET status = 'rejected' WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment rejected.';
    header('Location: admin.php?page=comments');
    exit;
}

// Handle delete comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("DELETE FROM blog_comments WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment deleted successfully.';
    header('Location: admin.php?page=comments');
    exit;
}

// Handle toggle blog status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_blog_status') {
    $id = (int)($_POST['blog_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blogs SET status = IF(status='published','draft','published') WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['blog_success'] = 'Blog status updated.';
    header('Location: admin.php?page=blogs');
    exit;
}

// Handle add donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_donation') {
    $stmt = $pdo->prepare("INSERT INTO donations (name, email, phone, amount, cause, transaction_id, payment_method, status, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        trim($_POST['name'] ?? ''),
        trim($_POST['email'] ?? ''),
        trim($_POST['phone'] ?? ''),
        (float)($_POST['amount'] ?? 0),
        trim($_POST['cause'] ?? ''),
        trim($_POST['transaction_id'] ?? ''),
        trim($_POST['payment_method'] ?? 'Online'),
        trim($_POST['status'] ?? 'pending'),
        trim($_POST['notes'] ?? '')
    ]);
    $_SESSION['donation_success'] = 'Donation record added.';
    header('Location: admin.php?page=donations');
    exit;
}

// Handle complete donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'complete_donation') {
    $pdo->prepare("UPDATE donations SET status = 'completed' WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation marked as completed.';
    header('Location: admin.php?page=donations');
    exit;
}

// Handle fail donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'fail_donation') {
    $pdo->prepare("UPDATE donations SET status = 'failed' WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation marked as failed.';
    header('Location: admin.php?page=donations');
    exit;
}

// Handle delete donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_donation') {
    $pdo->prepare("DELETE FROM donations WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation record deleted.';
    header('Location: admin.php?page=donations');
    exit;
}

// Route to correct page
$page = $_GET['page'] ?? 'dashboard';
$allowedPages = ['dashboard', 'blogs', 'queries', 'subscribers', 'events', 'causes', 'gallery', 'settings', 'comments', 'donations'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

$currentPage = $page;
include '../admin/views/layout/admin.php';
