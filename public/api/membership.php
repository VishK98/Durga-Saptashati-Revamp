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

// Handle photo upload
$photo = null;
if (!empty($_FILES['photo']['name']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/../assets/uploads/members/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp']) && $_FILES['photo']['size'] <= 2 * 1024 * 1024) {
        $photo = 'member_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photo);
    }
}

try {
    $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, photo, payment_mode, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullName, $gender, $address, $email, $mobile, $membershipType, $profession, $photo, $paymentMode, $status]);
    echo json_encode(['success' => true, 'message' => 'Your membership application has been submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
