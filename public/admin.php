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

// Handle approve volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'approve_volunteer') {
    $pdo->prepare("UPDATE volunteers SET status = 'approved' WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer approved successfully.';
    header('Location: admin.php?page=volunteers');
    exit;
}

// Handle reject volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'reject_volunteer') {
    $pdo->prepare("UPDATE volunteers SET status = 'rejected' WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer rejected.';
    header('Location: admin.php?page=volunteers');
    exit;
}

// Handle delete volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_volunteer') {
    $pdo->prepare("DELETE FROM volunteers WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer deleted.';
    header('Location: admin.php?page=volunteers');
    exit;
}

// Handle mark read query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'mark_read_query') {
    $pdo->prepare("UPDATE contact_queries SET status = 'read' WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query marked as read.';
    header('Location: admin.php?page=queries');
    exit;
}

// Handle mark replied query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'mark_replied_query') {
    $pdo->prepare("UPDATE contact_queries SET status = 'replied' WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query marked as replied.';
    header('Location: admin.php?page=queries');
    exit;
}

// Handle delete query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_query') {
    $pdo->prepare("DELETE FROM contact_queries WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query deleted.';
    header('Location: admin.php?page=queries');
    exit;
}

// Handle create career
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create_career') {
    $stmt = $pdo->prepare("INSERT INTO careers (title, department, location, type, description, requirements) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([trim($_POST['title']), trim($_POST['department'] ?? ''), trim($_POST['location'] ?? ''), $_POST['type'] ?? 'full-time', trim($_POST['description'] ?? ''), trim($_POST['requirements'] ?? '')]);
    $_SESSION['career_success'] = 'Job opening created.';
    header('Location: admin.php?page=careers');
    exit;
}

// Handle toggle career status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_career') {
    $pdo->prepare("UPDATE careers SET status = IF(status='active','closed','active') WHERE id = ?")->execute([(int)$_POST['career_id']]);
    $_SESSION['career_success'] = 'Career status updated.';
    header('Location: admin.php?page=careers');
    exit;
}

// Handle delete career
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_career') {
    $pdo->prepare("DELETE FROM careers WHERE id = ?")->execute([(int)$_POST['career_id']]);
    $_SESSION['career_success'] = 'Job opening deleted.';
    header('Location: admin.php?page=careers');
    exit;
}

// Handle update application status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_application') {
    $valid = ['new','reviewed','shortlisted','rejected'];
    $s = $_POST['status'] ?? 'new';
    if (in_array($s, $valid)) {
        $pdo->prepare("UPDATE career_applications SET status = ? WHERE id = ?")->execute([$s, (int)$_POST['app_id']]);
    }
    $_SESSION['career_success'] = 'Application status updated.';
    header('Location: admin.php?page=careers');
    exit;
}

// Handle delete application
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_application') {
    $stmt = $pdo->prepare("SELECT resume FROM career_applications WHERE id = ?");
    $stmt->execute([(int)$_POST['app_id']]);
    $app = $stmt->fetch();
    if ($app && $app['resume']) {
        $path = __DIR__ . '/assets/uploads/resumes/' . $app['resume'];
        if (file_exists($path)) unlink($path);
    }
    $pdo->prepare("DELETE FROM career_applications WHERE id = ?")->execute([(int)$_POST['app_id']]);
    $_SESSION['career_success'] = 'Application deleted.';
    header('Location: admin.php?page=careers');
    exit;
}

// Auto-create gallery table
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS gallery (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) DEFAULT '',
        category VARCHAR(100) DEFAULT 'General',
        image VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
} catch (Exception $e) {}

// Handle gallery upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'upload_gallery') {
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'General');
    $uploadDir = __DIR__ . '/assets/uploads/gallery/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $uploaded = 0;
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
            if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) continue;
            $ext = strtolower(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION));
            if (!in_array($ext, ['jpg','jpeg','png','gif','webp'])) continue;
            $filename = 'gallery_' . time() . '_' . $i . '.' . $ext;
            if (move_uploaded_file($tmp, $uploadDir . $filename)) {
                $imgTitle = $title ?: pathinfo($_FILES['images']['name'][$i], PATHINFO_FILENAME);
                $pdo->prepare("INSERT INTO gallery (title, category, image) VALUES (?, ?, ?)")->execute([$imgTitle, $category, $filename]);
                $uploaded++;
            }
        }
    }
    $_SESSION['gallery_success'] = $uploaded . ' photo(s) uploaded successfully.';
    header('Location: admin.php?page=gallery');
    exit;
}

// Handle gallery delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_gallery') {
    $stmt = $pdo->prepare("SELECT image FROM gallery WHERE id = ?");
    $stmt->execute([(int)$_POST['gallery_id']]);
    $img = $stmt->fetch();
    if ($img) {
        $path = __DIR__ . '/assets/uploads/gallery/' . $img['image'];
        if (file_exists($path)) unlink($path);
        $pdo->prepare("DELETE FROM gallery WHERE id = ?")->execute([(int)$_POST['gallery_id']]);
    }
    $_SESSION['gallery_success'] = 'Photo deleted.';
    header('Location: admin.php?page=gallery');
    exit;
}

// Route to correct page
$page = $_GET['page'] ?? 'dashboard';
$allowedPages = ['dashboard', 'blogs', 'queries', 'subscribers', 'events', 'causes', 'gallery', 'settings', 'comments', 'donations', 'volunteers', 'careers'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

$currentPage = $page;
include '../admin/views/layout/admin.php';
