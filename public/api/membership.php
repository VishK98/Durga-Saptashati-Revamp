<?php
header('Content-Type: application/json');
session_start();
require_once '../../app/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$fullName = trim($_POST['full_name'] ?? '');
$gender = $_POST['gender'] ?? '';
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$membershipType = $_POST['membership_type'] ?? '';
$profession = trim($_POST['profession'] ?? '');
$paymentMode = $_POST['payment_mode'] ?? 'Cash';

if (empty($fullName) || empty($gender) || empty($membershipType) || empty($paymentMode)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

$status = ($paymentMode === 'Online') ? 'approved' : 'pending';

try {
    $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, payment_mode, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullName, $gender, $address, $email, $mobile, $membershipType, $profession, $paymentMode, $status]);
    echo json_encode(['success' => true, 'message' => 'Your membership application has been submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
