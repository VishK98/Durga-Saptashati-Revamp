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

// Route to correct page
$page = $_GET['page'] ?? 'dashboard';
$allowedPages = ['dashboard', 'blogs', 'queries', 'subscribers', 'events', 'causes', 'gallery', 'settings'];

if (!in_array($page, $allowedPages)) {
    $page = 'dashboard';
}

$currentPage = $page;
include '../admin/views/layout/admin.php';
