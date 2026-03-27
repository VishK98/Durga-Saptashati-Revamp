<?php
header('Content-Type: application/json');
require_once '../../app/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$careerId = !empty($_POST['career_id']) ? (int)$_POST['career_id'] : null;
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$area = trim($_POST['area_of_interest'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

// Handle resume upload
$resume = null;
if (!empty($_FILES['resume']['name'])) {
    $uploadDir = __DIR__ . '/../assets/uploads/resumes/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $ext = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
    $allowed = ['pdf', 'doc', 'docx'];
    if (!in_array($ext, $allowed)) {
        echo json_encode(['success' => false, 'message' => 'Resume must be PDF, DOC or DOCX.']);
        exit;
    }
    if ($_FILES['resume']['size'] > 5 * 1024 * 1024) {
        echo json_encode(['success' => false, 'message' => 'Resume must be under 5MB.']);
        exit;
    }
    $resume = uniqid('resume_', true) . '.' . $ext;
    move_uploaded_file($_FILES['resume']['tmp_name'], $uploadDir . $resume);
}

try {
    $stmt = $pdo->prepare("INSERT INTO career_applications (career_id, name, email, phone, area_of_interest, message, resume) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$careerId, $name, $email, $phone, $area, $message, $resume]);
    echo json_encode(['success' => true, 'message' => 'Your application has been submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}
