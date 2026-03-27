<?php
session_start();
header('Content-Type: application/json');
require_once '../../app/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$blogId = (int)($_POST['blog_id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$comment = trim($_POST['comment'] ?? '');

if (empty($name) || empty($email) || empty($comment) || $blogId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO blog_comments (blog_id, name, email, comment, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->execute([$blogId, $name, $email, $comment]);
    echo json_encode(['success' => true, 'message' => 'Your comment has been submitted and is awaiting approval.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
