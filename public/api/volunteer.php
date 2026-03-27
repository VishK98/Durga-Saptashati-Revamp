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
$address = trim($_POST['address'] ?? '');
$skills = trim($_POST['skills'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO volunteers (name, email, phone, address, skills, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $address, $skills, $message]);
    echo json_encode(['success' => true, 'message' => 'Thank you for your interest in volunteering! We will review your application and get back to you soon.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
