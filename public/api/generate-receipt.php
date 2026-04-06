<?php
/**
 * Generate receipt for existing donation or member record
 * Usage: /api/generate-receipt.php?type=donation&id=1
 *        /api/generate-receipt.php?type=membership&id=3
 *        Add &format=pdf for PDF output (default: html)
 */
require_once '../../app/config/config.php';
require_once '../../mail/send-receipt.php';

$type = $_GET['type'] ?? '';
$id = (int) ($_GET['id'] ?? 0);
$format = $_GET['format'] ?? 'html';

if (!in_array($type, ['donation', 'membership']) || $id <= 0) {
    http_response_code(400);
    echo 'Invalid parameters. Usage: ?type=donation&id=1';
    exit;
}

try {
    if ($type === 'donation') {
        $stmt = $pdo->prepare("SELECT * FROM donations WHERE id = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch();
        if (!$record) { http_response_code(404); echo 'Donation not found.'; exit; }

        $data = [
            'receipt_no' => generateReceiptNumber('donation', $record['id']),
            'date' => date('d F Y', strtotime($record['created_at'])),
            'name' => $record['name'],
            'email' => $record['email'] ?? '',
            'amount' => (float) $record['amount'],
            'transaction_id' => $record['transaction_id'] ?? 'N/A',
            'type' => 'donation',
        ];

    } else {
        $stmt = $pdo->prepare("SELECT m.*, mp.price FROM members m LEFT JOIN membership_plans mp ON m.membership_type = mp.slug OR m.membership_type = mp.name WHERE m.id = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch();
        if (!$record) { http_response_code(404); echo 'Member not found.'; exit; }

        // Get plan name for display
        $planName = $record['membership_type'];
        $planStmt = $pdo->prepare("SELECT name, price FROM membership_plans WHERE slug = ? OR name = ? LIMIT 1");
        $planStmt->execute([$record['membership_type'], $record['membership_type']]);
        $plan = $planStmt->fetch();
        if ($plan) {
            $planName = $plan['name'];
            $amount = (float) $plan['price'];
        } else {
            $amount = (float) ($record['price'] ?? 0);
        }

        $data = [
            'receipt_no' => generateReceiptNumber('membership', $record['id']),
            'date' => date('d F Y', strtotime($record['created_at'])),
            'name' => $record['full_name'],
            'email' => $record['email'] ?? '',
            'amount' => $amount,
            'transaction_id' => $record['transaction_id'] ?? 'N/A',
            'type' => 'membership',
            'membership_type' => $planName,
        ];
    }

    if ($format === 'pdf') {
        $pdf = generateReceiptPDF($data);
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $data['receipt_no'] . '.pdf"');
        echo $pdf;
    } else {
        echo generateReceiptHTML($data);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo 'Error generating receipt: ' . $e->getMessage();
}
