<?php
session_start();
require_once '../app/config/config.php';

// Prevent caching of admin pages
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');

// Handle login FIRST (before AJAX block)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
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

        if (!empty($_POST['remember'])) {
            $token = bin2hex(random_bytes(32));
            $pdo->prepare("UPDATE admin_users SET remember_token = ? WHERE id = ?")->execute([$token, $admin['id']]);
            setcookie('admin_remember', $token, time() + (30 * 24 * 3600), '/');
            setcookie('admin_email', $email, time() + (30 * 24 * 3600), '/');
        } else {
            setcookie('admin_email', '', time() - 3600, '/');
        }

        echo '<script>window.location.replace("/admin/dashboard");</script>';
        exit;
    } else {
        $_SESSION['login_error'] = 'Invalid email or password.';
        $_SESSION['login_email'] = $email;
        echo '<script>window.location.replace("/admin");</script>';
        exit;
    }
}

// AJAX handlers (return JSON, no redirect)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header('Content-Type: application/json');
    $action = $_POST['action'] ?? '';
    try {
        switch ($action) {
            case 'add_member':
                $payMode = trim($_POST['payment_mode'] ?? 'Cash');
                $status = trim($_POST['status'] ?? 'pending');
                $photo = null;
                if (!empty($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/assets/uploads/members/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg','jpeg','png','webp']) && $_FILES['photo']['size'] <= 2*1024*1024) {
                        $photo = 'member_' . uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photo);
                    }
                }
                $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, photo, payment_mode, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    trim($_POST['full_name']),
                    trim($_POST['gender'] ?? ''),
                    trim($_POST['address'] ?? ''),
                    trim($_POST['email'] ?? ''),
                    trim($_POST['mobile'] ?? ''),
                    trim($_POST['membership_type'] ?? ''),
                    trim($_POST['profession'] ?? ''),
                    $photo,
                    $payMode,
                    $status
                ]);
                echo json_encode(['success' => true, 'message' => 'Member added successfully.']);
                exit;

            case 'delete_member':
                $pdo->prepare("DELETE FROM members WHERE id = ?")->execute([(int)$_POST['member_id']]);
                echo json_encode(['success' => true, 'message' => 'Member deleted successfully.']);
                exit;

            case 'update_member':
                $memberId = (int)$_POST['member_id'];
                // Handle photo upload
                $photoSql = '';
                $params = [
                    trim($_POST['full_name']),
                    trim($_POST['email'] ?? ''),
                    trim($_POST['mobile'] ?? ''),
                    trim($_POST['gender'] ?? ''),
                    trim($_POST['membership_type'] ?? ''),
                    trim($_POST['address'] ?? ''),
                    trim($_POST['profession'] ?? ''),
                ];
                if (!empty($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = __DIR__ . '/assets/uploads/members/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg','jpeg','png','webp']) && $_FILES['photo']['size'] <= 2*1024*1024) {
                        $newPhoto = 'member_' . uniqid() . '.' . $ext;
                        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $newPhoto);
                        // Delete old photo
                        $old = $pdo->prepare("SELECT photo FROM members WHERE id = ?");
                        $old->execute([$memberId]);
                        $oldPhoto = $old->fetchColumn();
                        if ($oldPhoto && file_exists($uploadDir . $oldPhoto)) unlink($uploadDir . $oldPhoto);
                        $photoSql = ', photo = ?';
                        $params[] = $newPhoto;
                    }
                }
                $params[] = trim($_POST['payment_mode'] ?? 'Cash');
                $params[] = trim($_POST['status'] ?? 'pending');
                $params[] = $memberId;
                $stmt = $pdo->prepare("UPDATE members SET full_name = ?, email = ?, mobile = ?, gender = ?, membership_type = ?, address = ?, profession = ?" . $photoSql . ", payment_mode = ?, status = ? WHERE id = ?");
                $stmt->execute($params);
                echo json_encode(['success' => true, 'message' => 'Member updated successfully.']);
                exit;

            case 'delete_membership_plan':
                $pdo->prepare("DELETE FROM membership_plans WHERE id = ?")->execute([(int)$_POST['plan_id']]);
                echo json_encode(['success' => true, 'message' => 'Plan deleted successfully.']);
                exit;

            case 'approve_member':
                $pdo->prepare("UPDATE members SET status = 'approved' WHERE id = ?")->execute([(int)$_POST['member_id']]);
                echo json_encode(['success' => true, 'message' => 'Member approved successfully.']);
                exit;

            case 'reject_member':
                $pdo->prepare("UPDATE members SET status = 'rejected' WHERE id = ?")->execute([(int)$_POST['member_id']]);
                echo json_encode(['success' => true, 'message' => 'Member rejected.']);
                exit;

            case 'add_membership_plan':
                $stmt = $pdo->prepare("INSERT INTO membership_plans (slug, name, price, description, duration_label, icon, sort_order, is_best_value, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
                $stmt->execute([
                    trim($_POST['plan_slug']),
                    trim($_POST['plan_name']),
                    (float)$_POST['plan_price'],
                    trim($_POST['plan_description'] ?? ''),
                    trim($_POST['plan_duration_label'] ?? ''),
                    trim($_POST['plan_icon'] ?? 'fa-id-card'),
                    (int)($_POST['plan_sort_order'] ?? 0),
                    ($_POST['plan_is_best_value'] ?? '0') === '1' ? 1 : 0
                ]);
                echo json_encode(['success' => true, 'message' => 'Plan added successfully.']);
                exit;

            case 'update_membership_plan':
                $stmt = $pdo->prepare("UPDATE membership_plans SET name = ?, price = ?, description = ?, duration_label = ?, icon = ?, sort_order = ?, is_best_value = ?, is_active = ? WHERE id = ?");
                $stmt->execute([
                    trim($_POST['plan_name']),
                    (float)$_POST['plan_price'],
                    trim($_POST['plan_description'] ?? ''),
                    trim($_POST['plan_duration_label'] ?? ''),
                    trim($_POST['plan_icon'] ?? 'fa-id-card'),
                    (int)($_POST['plan_sort_order'] ?? 0),
                    ($_POST['plan_is_best_value'] ?? '0') === '1' ? 1 : 0,
                    ($_POST['plan_is_active'] ?? '0') === '1' ? 1 : 0,
                    (int)$_POST['plan_id']
                ]);
                echo json_encode(['success' => true, 'message' => 'Plan updated successfully.']);
                exit;

            case 'toggle_career':
                $stmt = $pdo->prepare("SELECT status FROM careers WHERE id = ?");
                $stmt->execute([(int)$_POST['career_id']]);
                $cur = $stmt->fetchColumn();
                $new = ($cur === 'active') ? 'closed' : 'active';
                $pdo->prepare("UPDATE careers SET status = ? WHERE id = ?")->execute([$new, (int)$_POST['career_id']]);
                echo json_encode(['success' => true, 'message' => 'Job ' . ($new === 'active' ? 'activated' : 'closed') . ' successfully.']);
                exit;

            case 'update_career':
                $stmt = $pdo->prepare("UPDATE careers SET title = ?, department = ?, location = ?, type = ?, status = ?, description = ?, requirements = ? WHERE id = ?");
                $stmt->execute([
                    trim($_POST['title']),
                    trim($_POST['department'] ?? ''),
                    trim($_POST['location'] ?? ''),
                    trim($_POST['type'] ?? 'full-time'),
                    trim($_POST['status'] ?? 'active'),
                    trim($_POST['description'] ?? ''),
                    trim($_POST['requirements'] ?? ''),
                    (int)$_POST['career_id']
                ]);
                echo json_encode(['success' => true, 'message' => 'Job opening updated successfully.']);
                exit;

            case 'delete_career':
                $pdo->prepare("DELETE FROM careers WHERE id = ?")->execute([(int)$_POST['career_id']]);
                echo json_encode(['success' => true, 'message' => 'Job opening deleted.']);
                exit;

            case 'update_application':
                $pdo->prepare("UPDATE career_applications SET status = ? WHERE id = ?")->execute([trim($_POST['status']), (int)$_POST['app_id']]);
                echo json_encode(['success' => true, 'message' => 'Application updated.']);
                exit;

            case 'delete_application':
                $pdo->prepare("DELETE FROM career_applications WHERE id = ?")->execute([(int)$_POST['app_id']]);
                echo json_encode(['success' => true, 'message' => 'Application deleted.']);
                exit;

            case 'delete_gallery':
                $stmt = $pdo->prepare("SELECT image FROM gallery WHERE id = ?");
                $stmt->execute([(int)$_POST['gallery_id']]);
                $img = $stmt->fetchColumn();
                if ($img) {
                    $path = __DIR__ . '/assets/uploads/gallery/' . $img;
                    if (file_exists($path)) unlink($path);
                }
                $pdo->prepare("DELETE FROM gallery WHERE id = ?")->execute([(int)$_POST['gallery_id']]);
                echo json_encode(['success' => true, 'message' => 'Photo deleted successfully.']);
                exit;

            case 'toggle_report':
                $stmt = $pdo->prepare("SELECT is_active FROM financial_reports WHERE id = ?");
                $stmt->execute([(int)$_POST['report_id']]);
                $cur = $stmt->fetchColumn();
                $pdo->prepare("UPDATE financial_reports SET is_active = ? WHERE id = ?")->execute([$cur ? 0 : 1, (int)$_POST['report_id']]);
                echo json_encode(['success' => true, 'message' => 'Report visibility updated.']);
                exit;

            case 'delete_report':
                $stmt = $pdo->prepare("SELECT file FROM financial_reports WHERE id = ?");
                $stmt->execute([(int)$_POST['report_id']]);
                $file = $stmt->fetchColumn();
                if ($file) {
                    $path = __DIR__ . '/assets/reports/' . $file;
                    if (file_exists($path)) unlink($path);
                }
                $pdo->prepare("DELETE FROM financial_reports WHERE id = ?")->execute([(int)$_POST['report_id']]);
                echo json_encode(['success' => true, 'message' => 'Report deleted successfully.']);
                exit;

            case 'toggle_news':
                $stmt = $pdo->prepare("SELECT status FROM news WHERE id = ?");
                $stmt->execute([(int)$_POST['news_id']]);
                $current = $stmt->fetchColumn();
                $newStatus = ($current === 'published') ? 'draft' : 'published';
                $pdo->prepare("UPDATE news SET status = ? WHERE id = ?")->execute([$newStatus, (int)$_POST['news_id']]);
                echo json_encode(['success' => true, 'message' => 'Article ' . ($newStatus === 'published' ? 'published' : 'unpublished') . ' successfully.']);
                exit;

            case 'delete_news':
                $stmt = $pdo->prepare("SELECT image FROM news WHERE id = ?");
                $stmt->execute([(int)$_POST['news_id']]);
                $img = $stmt->fetchColumn();
                if ($img) {
                    $path = __DIR__ . '/assets/uploads/news/' . $img;
                    if (file_exists($path)) unlink($path);
                }
                $pdo->prepare("DELETE FROM news WHERE id = ?")->execute([(int)$_POST['news_id']]);
                echo json_encode(['success' => true, 'message' => 'Article deleted successfully.']);
                exit;

            default:
                echo json_encode(['success' => false, 'message' => 'Unknown action.']);
                exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        exit;
    }
}

// Handle logout (must run before auto-login)
if (isset($_GET['logout'])) {
    if (!empty($_SESSION['admin_id'])) {
        try { $pdo->prepare("UPDATE admin_users SET remember_token = NULL WHERE id = ?")->execute([$_SESSION['admin_id']]); } catch(Exception $e) {}
    }
    setcookie('admin_remember', '', time() - 3600, '/');
    session_destroy();
    header('Location: /admin');
    exit;
}

// Auto-login from remember cookie
if (empty($_SESSION['admin_logged_in']) && !empty($_COOKIE['admin_remember']) && strlen($_COOKIE['admin_remember']) > 10) {
    $token = $_COOKIE['admin_remember'];
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE remember_token = ? AND remember_token IS NOT NULL AND remember_token != ''");
    $stmt->execute([$token]);
    $admin = $stmt->fetch();
    if ($admin) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_name'] = $admin['name'];
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['login_time'] = time();
    } else {
        // Invalid token — clear cookie
        setcookie('admin_remember', '', time() - 3600, '/');
    }
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
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE admin_users SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
        $stmt->execute([$name, $email, $phone, $address, $_SESSION['admin_id']]);
        $_SESSION['admin_name'] = $name;
        $_SESSION['admin_email'] = $email;
        $_SESSION['settings_success'] = 'Profile updated successfully.';
    } else {
        $_SESSION['settings_error'] = 'Name and email are required.';
    }
    header('Location: /admin/settings');
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
    header('Location: /admin/settings');
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
    $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : date('Y-m-d H:i:s');

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = handleBlogImageUpload($_FILES['image']);
    }

    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, category, content, meta_description, meta_keywords, author, image, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $image, $status, $created_at]);
    $_SESSION['blog_success'] = 'Blog post created successfully.';
    header('Location: /admin/blogs');
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
    $created_at = !empty($_POST['created_at']) ? date('Y-m-d H:i:s', strtotime($_POST['created_at'])) : null;

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
            if ($created_at) {
                $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, image=?, status=?, created_at=? WHERE id=?");
                $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $image, $status, $created_at, $id]);
            } else {
                $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, image=?, status=? WHERE id=?");
                $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $image, $status, $id]);
            }
        }
    }
    if (!$image) {
        if ($created_at) {
            $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, status=?, created_at=? WHERE id=?");
            $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $status, $created_at, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE blogs SET title=?, slug=?, category=?, content=?, meta_description=?, meta_keywords=?, author=?, status=? WHERE id=?");
            $stmt->execute([$title, $slug, $category, $content, $meta_description, $meta_keywords, $author, $status, $id]);
        }
    }

    $_SESSION['blog_success'] = 'Blog post updated successfully.';
    header('Location: /admin/blogs');
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
    header('Location: /admin/blogs');
    exit;
}

// Handle approve comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'approve_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blog_comments SET status = 'approved' WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment approved successfully.';
    header('Location: /admin/comments');
    exit;
}

// Handle reject comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'reject_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blog_comments SET status = 'rejected' WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment rejected.';
    header('Location: /admin/comments');
    exit;
}

// Handle delete comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_comment') {
    $id = (int)($_POST['comment_id'] ?? 0);
    $stmt = $pdo->prepare("DELETE FROM blog_comments WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['comment_success'] = 'Comment deleted successfully.';
    header('Location: /admin/comments');
    exit;
}

// Handle toggle blog status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_blog_status') {
    $id = (int)($_POST['blog_id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE blogs SET status = IF(status='published','draft','published') WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['blog_success'] = 'Blog status updated.';
    header('Location: /admin/blogs');
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
    header('Location: /admin/donations');
    exit;
}

// Handle complete donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'complete_donation') {
    $pdo->prepare("UPDATE donations SET status = 'completed' WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation marked as completed.';
    header('Location: /admin/donations');
    exit;
}

// Handle fail donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'fail_donation') {
    $pdo->prepare("UPDATE donations SET status = 'failed' WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation marked as failed.';
    header('Location: /admin/donations');
    exit;
}

// Handle delete donation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_donation') {
    $pdo->prepare("DELETE FROM donations WHERE id = ?")->execute([(int)$_POST['donation_id']]);
    $_SESSION['donation_success'] = 'Donation record deleted.';
    header('Location: /admin/donations');
    exit;
}

// Handle approve volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'approve_volunteer') {
    $pdo->prepare("UPDATE volunteers SET status = 'approved' WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer approved successfully.';
    header('Location: /admin/volunteers');
    exit;
}

// Handle reject volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'reject_volunteer') {
    $pdo->prepare("UPDATE volunteers SET status = 'rejected' WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer rejected.';
    header('Location: /admin/volunteers');
    exit;
}

// Handle delete volunteer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_volunteer') {
    $pdo->prepare("DELETE FROM volunteers WHERE id = ?")->execute([(int)$_POST['volunteer_id']]);
    $_SESSION['volunteer_success'] = 'Volunteer deleted.';
    header('Location: /admin/volunteers');
    exit;
}

// Handle mark read query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'mark_read_query') {
    $pdo->prepare("UPDATE contact_queries SET status = 'read' WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query marked as read.';
    header('Location: /admin/queries');
    exit;
}

// Handle mark replied query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'mark_replied_query') {
    $pdo->prepare("UPDATE contact_queries SET status = 'replied' WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query marked as replied.';
    header('Location: /admin/queries');
    exit;
}

// Handle delete query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_query') {
    $pdo->prepare("DELETE FROM contact_queries WHERE id = ?")->execute([(int)$_POST['query_id']]);
    $_SESSION['query_success'] = 'Query deleted.';
    header('Location: /admin/queries');
    exit;
}

// Handle create career
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create_career') {
    $stmt = $pdo->prepare("INSERT INTO careers (title, department, location, type, description, requirements) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([trim($_POST['title']), trim($_POST['department'] ?? ''), trim($_POST['location'] ?? ''), $_POST['type'] ?? 'full-time', trim($_POST['description'] ?? ''), trim($_POST['requirements'] ?? '')]);
    $_SESSION['career_success'] = 'Job opening created.';
    header('Location: /admin/careers');
    exit;
}

// Handle toggle career status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_career') {
    $pdo->prepare("UPDATE careers SET status = IF(status='active','closed','active') WHERE id = ?")->execute([(int)$_POST['career_id']]);
    $_SESSION['career_success'] = 'Career status updated.';
    header('Location: /admin/careers');
    exit;
}

// Handle delete career
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_career') {
    $pdo->prepare("DELETE FROM careers WHERE id = ?")->execute([(int)$_POST['career_id']]);
    $_SESSION['career_success'] = 'Job opening deleted.';
    header('Location: /admin/careers');
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
    header('Location: /admin/careers');
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
    header('Location: /admin/careers');
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
    header('Location: /admin/gallery');
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
    header('Location: /admin/gallery');
    exit;
}

// Auto-create membership_plans table
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS membership_plans (
        id INT AUTO_INCREMENT PRIMARY KEY,
        slug VARCHAR(50) NOT NULL UNIQUE,
        name VARCHAR(100) NOT NULL,
        description VARCHAR(255) DEFAULT '',
        price DECIMAL(10,2) NOT NULL,
        duration_label VARCHAR(100) DEFAULT '',
        icon VARCHAR(50) DEFAULT 'fa-id-card',
        is_best_value TINYINT(1) DEFAULT 0,
        sort_order INT DEFAULT 0,
        is_active TINYINT(1) DEFAULT 1,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");
    // Seed default plans if empty
    $planCount = $pdo->query("SELECT COUNT(*) FROM membership_plans")->fetchColumn();
    if ($planCount == 0) {
        $pdo->exec("INSERT INTO membership_plans (slug, name, description, price, duration_label, icon, is_best_value, sort_order) VALUES
            ('1-year', '1-Year Membership', 'Annual contribution', 501.00, '1 Year', 'fa-calendar-alt', 0, 1),
            ('6-year', '6-Year Membership', 'Extended commitment', 2500.00, '6 Years', 'fa-calendar-check', 0, 2),
            ('lifetime', 'Lifetime Membership', 'One-time commitment', 11000.00, 'Lifetime', 'fa-infinity', 1, 3)
        ");
    }
} catch (Exception $e) {}

// Auto-create members table
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS members (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        date_of_birth DATE,
        gender ENUM('Male','Female','Prefer not to say') DEFAULT 'Male',
        address TEXT,
        email VARCHAR(255),
        mobile VARCHAR(20),
        membership_type VARCHAR(50) NOT NULL,
        payment_mode VARCHAR(50) NOT NULL DEFAULT 'N/A',
        payment_screenshot VARCHAR(255) DEFAULT NULL,
        status ENUM('pending','approved','rejected') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    // Alter membership_type column if it's still ENUM (migration)
    try {
        $pdo->exec("ALTER TABLE members MODIFY membership_type VARCHAR(50) NOT NULL");
        $pdo->exec("ALTER TABLE members MODIFY payment_mode VARCHAR(50) NOT NULL DEFAULT 'N/A'");
    } catch (Exception $e) {}
} catch (Exception $e) {}

// Handle update membership plan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_membership_plan') {
    $stmt = $pdo->prepare("UPDATE membership_plans SET name = ?, description = ?, price = ?, duration_label = ?, icon = ?, is_best_value = ?, is_active = ?, sort_order = ? WHERE id = ?");
    $stmt->execute([
        trim($_POST['plan_name']), trim($_POST['plan_description']), (float)$_POST['plan_price'],
        trim($_POST['plan_duration_label']), trim($_POST['plan_icon']),
        isset($_POST['plan_is_best_value']) ? 1 : 0, isset($_POST['plan_is_active']) ? 1 : 0,
        (int)$_POST['plan_sort_order'], (int)$_POST['plan_id']
    ]);
    $_SESSION['member_success'] = 'Membership plan updated successfully.';
    header('Location: /admin/members');
    exit;
}

// Handle add membership plan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_membership_plan') {
    $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9-]/', '-', $_POST['plan_slug'])));
    $stmt = $pdo->prepare("INSERT INTO membership_plans (slug, name, description, price, duration_label, icon, is_best_value, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $stmt->execute([
        $slug, trim($_POST['plan_name']), trim($_POST['plan_description']),
        (float)$_POST['plan_price'], trim($_POST['plan_duration_label']),
        trim($_POST['plan_icon']), isset($_POST['plan_is_best_value']) ? 1 : 0,
        (int)$_POST['plan_sort_order']
    ]);
    $_SESSION['member_success'] = 'New membership plan added.';
    header('Location: /admin/members');
    exit;
}

// Handle delete membership plan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_membership_plan') {
    $pdo->prepare("DELETE FROM membership_plans WHERE id = ?")->execute([(int)$_POST['plan_id']]);
    $_SESSION['member_success'] = 'Membership plan deleted.';
    header('Location: /admin/members');
    exit;
}

// Handle import members CSV
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'import_members') {
    if (!empty($_FILES['csv_file']['tmp_name'])) {
        $handle = fopen($_FILES['csv_file']['tmp_name'], 'r');
        $header = fgetcsv($handle); // skip header row
        $imported = 0;
        $errors = 0;
        $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, payment_mode, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 2) continue; // skip empty rows
            try {
                $payMode = trim($row[7] ?? 'Cash');
                $sts = trim($row[8] ?? ($payMode === 'Online' ? 'approved' : 'pending'));
                $stmt->execute([
                    trim($row[0] ?? ''),                            // full_name
                    trim($row[1] ?? ''),                            // gender
                    trim($row[2] ?? ''),                            // address
                    trim($row[3] ?? ''),                            // email
                    trim($row[4] ?? ''),                            // mobile
                    trim($row[5] ?? ''),                            // membership_type
                    trim($row[6] ?? ''),                            // profession
                    $payMode,                                       // payment_mode
                    $sts,                                           // status
                    !empty($row[9]) ? $row[9] : date('Y-m-d H:i:s') // created_at
                ]);
                $imported++;
            } catch (Exception $e) { $errors++; }
        }
        fclose($handle);
        $_SESSION['member_success'] = "Imported $imported members successfully." . ($errors ? " $errors rows had errors." : '');
    } else {
        $_SESSION['member_success'] = 'No file uploaded.';
    }
    header('Location: /admin/members');
    exit;
}

// Handle approve member
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'approve_member') {
    $pdo->prepare("UPDATE members SET status = 'approved' WHERE id = ?")->execute([(int)$_POST['member_id']]);
    $_SESSION['member_success'] = 'Member approved successfully.';
    header('Location: /admin/members');
    exit;
}

// Handle reject member
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'reject_member') {
    $pdo->prepare("UPDATE members SET status = 'rejected' WHERE id = ?")->execute([(int)$_POST['member_id']]);
    $_SESSION['member_success'] = 'Member rejected.';
    header('Location: /admin/members');
    exit;
}

// Handle update member
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_member') {
    $stmt = $pdo->prepare("UPDATE members SET full_name = ?, email = ?, mobile = ?, gender = ?, membership_type = ?, address = ?, profession = ?, payment_mode = ?, status = ? WHERE id = ?");
    $stmt->execute([
        trim($_POST['full_name']),
        trim($_POST['email'] ?? ''),
        trim($_POST['mobile'] ?? ''),
        trim($_POST['gender'] ?? ''),
        trim($_POST['membership_type'] ?? ''),
        trim($_POST['address'] ?? ''),
        trim($_POST['profession'] ?? ''),
        trim($_POST['payment_mode'] ?? 'Cash'),
        trim($_POST['status'] ?? 'pending'),
        (int)$_POST['member_id']
    ]);
    $_SESSION['member_success'] = 'Member updated successfully.';
    header('Location: /admin/members');
    exit;
}

// Handle delete member
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_member') {
    $pdo->prepare("DELETE FROM members WHERE id = ?")->execute([(int)$_POST['member_id']]);
    $_SESSION['member_success'] = 'Member deleted.';
    header('Location: /admin/members');
    exit;
}

// Handle membership submission (public form)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'submit_membership') {
    $paymentMode = $_POST['payment_mode'] ?? 'Cash';
    $status = ($paymentMode === 'Online') ? 'approved' : 'pending';
    $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, payment_mode, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        trim($_POST['full_name']), $_POST['gender'],
        trim($_POST['address'] ?? ''), trim($_POST['email'] ?? ''), trim($_POST['mobile'] ?? ''),
        $_POST['membership_type'], trim($_POST['profession'] ?? ''), $paymentMode, $status
    ]);
    $_SESSION['membership_success'] = 'Your membership application has been submitted successfully!';
    header('Location: ' . url('become-member.php'));
    exit;
}

// Auto-create financial_reports table
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS financial_reports (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description VARCHAR(255) DEFAULT 'Audit Report',
        icon VARCHAR(100) DEFAULT 'fa-file-pdf',
        file VARCHAR(255) NOT NULL,
        sort_order INT DEFAULT 0,
        is_active TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
} catch (Exception $e) {}

// Upload financial report
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'upload_report') {
    if (!empty($_FILES['report_file']['name'])) {
        $uploadDir = __DIR__ . '/assets/reports/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = strtolower(pathinfo($_FILES['report_file']['name'], PATHINFO_EXTENSION));
        if ($ext === 'pdf' && $_FILES['report_file']['size'] <= 10*1024*1024) {
            $filename = 'report_' . time() . '_' . preg_replace('/[^a-zA-Z0-9\-]/', '', $_POST['title']) . '.pdf';
            if (move_uploaded_file($_FILES['report_file']['tmp_name'], $uploadDir . $filename)) {
                $stmt = $pdo->prepare("INSERT INTO financial_reports (title, description, icon, file, sort_order) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([
                    trim($_POST['title']),
                    trim($_POST['description'] ?: 'Audit Report'),
                    trim($_POST['icon'] ?: 'fa-file-pdf'),
                    $filename,
                    (int)($_POST['sort_order'] ?? 0)
                ]);
                $_SESSION['toast_success'] = 'Financial report uploaded successfully.';
            } else {
                $_SESSION['toast_error'] = 'Failed to upload file.';
            }
        } else {
            $_SESSION['toast_error'] = 'Only PDF files up to 10MB allowed.';
        }
    }
    header('Location: /admin/reports');
    exit;
}

// Delete financial report
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_report') {
    $stmt = $pdo->prepare("SELECT file FROM financial_reports WHERE id = ?");
    $stmt->execute([(int)$_POST['report_id']]);
    $r = $stmt->fetch();
    if ($r && $r['file']) {
        $path = __DIR__ . '/assets/reports/' . $r['file'];
        if (file_exists($path)) unlink($path);
    }
    $pdo->prepare("DELETE FROM financial_reports WHERE id = ?")->execute([(int)$_POST['report_id']]);
    $_SESSION['toast_success'] = 'Report deleted.';
    header('Location: /admin/reports');
    exit;
}

// Toggle report active/inactive
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_report') {
    $pdo->prepare("UPDATE financial_reports SET is_active = NOT is_active WHERE id = ?")->execute([(int)$_POST['report_id']]);
    $_SESSION['toast_success'] = 'Report status updated.';
    header('Location: /admin/reports');
    exit;
}

// Create news article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'create_news') {
    $title = trim($_POST['title']);
    $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $title));
    $slug = trim($slug, '-');
    // Ensure unique slug
    $check = $pdo->prepare("SELECT COUNT(*) FROM news WHERE slug = ?");
    $check->execute([$slug]);
    if ($check->fetchColumn() > 0) $slug .= '-' . time();

    $image = null;
    if (!empty($_FILES['news_image']['name'])) {
        $uploadDir = __DIR__ . '/assets/uploads/news/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = strtolower(pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg','jpeg','png','webp']) && $_FILES['news_image']['size'] <= 5*1024*1024) {
            $image = 'news_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['news_image']['tmp_name'], $uploadDir . $image);
        }
    }
    $stmt = $pdo->prepare("INSERT INTO news (title, slug, category, content, image, source, source_url, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, trim($_POST['category'] ?? 'General'), trim($_POST['content'] ?? ''), $image, trim($_POST['source'] ?? ''), trim($_POST['source_url'] ?? ''), $_POST['status'] ?? 'published']);
    $_SESSION['toast_success'] = 'News article published.';
    header('Location: /admin/news');
    exit;
}

// Delete news article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_news') {
    $stmt = $pdo->prepare("SELECT image FROM news WHERE id = ?");
    $stmt->execute([(int)$_POST['news_id']]);
    $n = $stmt->fetch();
    if ($n && $n['image']) {
        $path = __DIR__ . '/assets/uploads/news/' . $n['image'];
        if (file_exists($path)) unlink($path);
    }
    $pdo->prepare("DELETE FROM news WHERE id = ?")->execute([(int)$_POST['news_id']]);
    $_SESSION['toast_success'] = 'News article deleted.';
    header('Location: /admin/news');
    exit;
}

// Update news article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_news') {
    $image = null;
    if (!empty($_FILES['news_image']['name'])) {
        $uploadDir = __DIR__ . '/assets/uploads/news/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = strtolower(pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg','jpeg','png','webp']) && $_FILES['news_image']['size'] <= 5*1024*1024) {
            $image = 'news_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['news_image']['tmp_name'], $uploadDir . $image);
            // Delete old image
            $old = $pdo->prepare("SELECT image FROM news WHERE id = ?");
            $old->execute([(int)$_POST['news_id']]);
            $oldImg = $old->fetchColumn();
            if ($oldImg && file_exists($uploadDir . $oldImg)) unlink($uploadDir . $oldImg);
        }
    }
    $sql = "UPDATE news SET title = ?, category = ?, content = ?, source = ?, source_url = ?, status = ?";
    $params = [trim($_POST['title']), trim($_POST['category'] ?? 'General'), trim($_POST['content'] ?? ''), trim($_POST['source'] ?? ''), trim($_POST['source_url'] ?? ''), $_POST['status'] ?? 'published'];
    if ($image) { $sql .= ", image = ?"; $params[] = $image; }
    $sql .= " WHERE id = ?";
    $params[] = (int)$_POST['news_id'];
    $pdo->prepare($sql)->execute($params);
    $_SESSION['toast_success'] = 'News article updated.';
    header('Location: /admin/news');
    exit;
}

// Toggle news status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'toggle_news') {
    $pdo->prepare("UPDATE news SET status = CASE WHEN status = 'published' THEN 'draft' ELSE 'published' END WHERE id = ?")->execute([(int)$_POST['news_id']]);
    $_SESSION['toast_success'] = 'News status updated.';
    header('Location: /admin/news');
    exit;
}

// Handle subscriber actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $subAction = $_POST['action'];
    $subId = (int)($_POST['subscriber_id'] ?? 0);

    if ($subAction === 'unsubscribe' && $subId) {
        $pdo->prepare("UPDATE subscribers SET status = 'unsubscribed' WHERE id = ?")->execute([$subId]);
        $_SESSION['toast_success'] = 'Subscriber unsubscribed.';
        header('Location: /admin/subscribers');
        exit;
    }
    if ($subAction === 'resubscribe' && $subId) {
        $pdo->prepare("UPDATE subscribers SET status = 'active' WHERE id = ?")->execute([$subId]);
        $_SESSION['toast_success'] = 'Subscriber reactivated.';
        header('Location: /admin/subscribers');
        exit;
    }
    if ($subAction === 'delete_subscriber' && $subId) {
        $pdo->prepare("DELETE FROM subscribers WHERE id = ?")->execute([$subId]);
        $_SESSION['toast_success'] = 'Subscriber deleted.';
        header('Location: /admin/subscribers');
        exit;
    }
}

// Route to correct page
$page = $_GET['page'] ?? 'dashboard';
$allowedPages = ['dashboard', 'blogs', 'queries', 'subscribers', 'gallery', 'settings', 'comments', 'donations', 'volunteers', 'careers', 'members', 'reports', 'news'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

$currentPage = $page;
include '../admin/views/layout/admin.php';
