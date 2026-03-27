<?php
header('Content-Type: application/json');
require_once '../../app/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$amount = (float)($_POST['amount'] ?? 0);
$cause = trim($_POST['cause'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || $amount <= 0) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO donations (name, email, phone, amount, cause, payment_method, status, notes) VALUES (?, ?, ?, ?, ?, 'Online', 'pending', ?)");
    $stmt->execute([$name, $email, $phone, $amount, $cause, $message]);
    echo json_encode(['success' => true, 'message' => 'Thank you for your generous donation! We will send you a confirmation shortly.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
