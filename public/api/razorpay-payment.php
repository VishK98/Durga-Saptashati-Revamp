<?php
header('Content-Type: application/json');
require_once '../../app/config/config.php';
require_once '../../mail/send-receipt.php';

$razorpayKeyId = 'rzp_live_SXpNPGQ1lkwtcQ';
$razorpayKeySecret = 'sFpRY6rpRlLN8QEI4PSmf3Q4';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Create Razorpay Order
if ($action === 'create_order') {
    $amount = (int)($_POST['amount'] ?? 0);
    $type = trim($_POST['type'] ?? 'donation'); // 'donation' or 'membership'
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    if ($amount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid amount.']);
        exit;
    }

    // Create Razorpay order via API
    $orderData = [
        'amount' => $amount * 100, // Razorpay expects amount in paise
        'currency' => 'INR',
        'receipt' => $type . '_' . time(),
        'notes' => [
            'type' => $type,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]
    ];

    $ch = curl_init('https://api.razorpay.com/v1/orders');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($orderData),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_USERPWD => $razorpayKeyId . ':' . $razorpayKeySecret,
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $order = json_decode($response, true);

    if ($httpCode === 200 && isset($order['id'])) {
        echo json_encode([
            'success' => true,
            'order_id' => $order['id'],
            'amount' => $amount,
            'key' => $razorpayKeyId,
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Could not create payment order. Please try again.']);
    }
    exit;
}

// Verify payment after Razorpay callback
if ($action === 'verify_payment') {
    $razorpayPaymentId = $_POST['razorpay_payment_id'] ?? '';
    $razorpayOrderId = $_POST['razorpay_order_id'] ?? '';
    $razorpaySignature = $_POST['razorpay_signature'] ?? '';
    $type = $_POST['type'] ?? 'donation';

    // Verify signature
    $expectedSignature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, $razorpayKeySecret);

    if ($expectedSignature !== $razorpaySignature) {
        echo json_encode(['success' => false, 'message' => 'Payment verification failed.']);
        exit;
    }

    // Payment verified - save to database
    try {
        if ($type === 'donation') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $amount = (float)($_POST['amount'] ?? 0);
            $message = trim($_POST['message'] ?? '');

            $stmt = $pdo->prepare("INSERT INTO donations (name, email, phone, amount, cause, payment_method, status, notes, transaction_id) VALUES (?, ?, ?, ?, '', 'Online', 'completed', ?, ?)");
            $stmt->execute([$name, $email, $phone, $amount, $message, $razorpayPaymentId]);
            $insertId = $pdo->lastInsertId();

            // Generate and send receipt
            $receiptData = [
                'receipt_no' => generateReceiptNumber('donation', $insertId),
                'date' => date('d F Y'),
                'name' => $name,
                'email' => $email,
                'amount' => $amount,
                'transaction_id' => $razorpayPaymentId,
                'type' => 'donation',
            ];
            $receiptResult = sendReceipt($receiptData, $pdo);

            echo json_encode(['success' => true, 'message' => 'Thank you for your generous donation! Payment received successfully. A receipt has been sent to your email.']);

        } elseif ($type === 'membership') {
            $fullName = trim($_POST['full_name'] ?? '');
            $gender = $_POST['gender'] ?? '';
            $address = trim($_POST['address'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $mobile = trim($_POST['mobile'] ?? '');
            $membershipType = $_POST['membership_type'] ?? '';
            $profession = trim($_POST['profession'] ?? '');

            $stmt = $pdo->prepare("INSERT INTO members (full_name, gender, address, email, mobile, membership_type, profession, payment_mode, status, transaction_id) VALUES (?, ?, ?, ?, ?, ?, ?, 'Online', 'approved', ?)");
            $stmt->execute([$fullName, $gender, $address, $email, $mobile, $membershipType, $profession, $razorpayPaymentId]);
            $insertId = $pdo->lastInsertId();

            // Get membership plan price
            $planStmt = $pdo->prepare("SELECT price FROM membership_plans WHERE name = ? LIMIT 1");
            $planStmt->execute([$membershipType]);
            $plan = $planStmt->fetch();
            $amount = $plan ? (float)$plan['price'] : 0;

            // Generate and send receipt
            $receiptData = [
                'receipt_no' => generateReceiptNumber('membership', $insertId),
                'date' => date('d F Y'),
                'name' => $fullName,
                'email' => $email,
                'amount' => $amount,
                'transaction_id' => $razorpayPaymentId,
                'type' => 'membership',
                'membership_type' => $membershipType,
            ];
            $receiptResult = sendReceipt($receiptData, $pdo);

            echo json_encode(['success' => true, 'message' => 'Payment successful! Your membership has been approved. A receipt has been sent to your email.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Payment received but could not save record. Please contact support with payment ID: ' . $razorpayPaymentId]);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid action.']);
