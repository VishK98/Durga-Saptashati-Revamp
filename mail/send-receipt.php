<?php
/**
 * Receipt Generator & Email Sender
 * Generates PDF receipt, saves to uploads folder, and emails as attachment.
 */

require_once __DIR__ . '/../vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../vendor/phpmailer/src/SMTP.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Generate receipt number
 */
function generateReceiptNumber($type, $id)
{
    $prefix = ($type === 'donation') ? 'DON' : 'MEM';
    return 'DSF-' . $prefix . '-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
}

/**
 * Convert amount to words (Indian format)
 */
function amountToWords($amount)
{
    $ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
        'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen',
        'Seventeen', 'Eighteen', 'Nineteen'];
    $tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

    $amount = (int) $amount;
    if ($amount === 0) return 'Zero';
    $words = '';
    if ($amount >= 10000000) { $words .= amountToWords(floor($amount / 10000000)) . ' Crore '; $amount %= 10000000; }
    if ($amount >= 100000) { $words .= amountToWords(floor($amount / 100000)) . ' Lakh '; $amount %= 100000; }
    if ($amount >= 1000) { $words .= amountToWords(floor($amount / 1000)) . ' Thousand '; $amount %= 1000; }
    if ($amount >= 100) { $words .= $ones[floor($amount / 100)] . ' Hundred '; $amount %= 100; }
    if ($amount >= 20) { $words .= $tens[floor($amount / 10)] . ' '; $amount %= 10; }
    if ($amount > 0) { $words .= $ones[$amount] . ' '; }
    return trim($words);
}

/**
 * Get image as base64 data URI (for PDF/receipt HTML)
 */
function getImageBase64($path, $mime = 'image/png')
{
    if (file_exists($path)) {
        return 'data:' . $mime . ';base64,' . base64_encode(file_get_contents($path));
    }
    return '';
}

/**
 * Generate receipt HTML (used for PDF generation and standalone viewing)
 */
function generateReceiptHTML($data)
{
    $receiptNo = $data['receipt_no'];
    $date = $data['date'];
    $name = htmlspecialchars($data['name']);
    $amount = number_format($data['amount'], 2);
    $amountWords = amountToWords((int) $data['amount']) . ' Rupees Only';
    $transactionId = htmlspecialchars($data['transaction_id']);
    $type = $data['type'];
    $purpose = ($type === 'donation') ? 'Donation' : 'Membership - ' . htmlspecialchars($data['membership_type'] ?? '');

    $logoSrc = getImageBase64(__DIR__ . '/../public/assets/images/logo-wide.webp', 'image/webp');
    $signatureSrc = getImageBase64(__DIR__ . '/../public/assets/images/sandhya-singh-signature.png', 'image/png');

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Receipt - ' . $receiptNo . '</title>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@400;500;600;700&display=swap");
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: "Inter", "Segoe UI", sans-serif; background: linear-gradient(135deg, #f8f4ef 0%, #ede4d8 100%); padding: 30px 15px; min-height: 100vh; }
    .receipt-wrapper { max-width: 840px; margin: 0 auto; }

    .print-bar { text-align: center; margin-bottom: 24px; display: flex; justify-content: center; gap: 12px; }
    .print-bar button {
        background: linear-gradient(135deg, #f26522, #ff8c42); color: #fff; border: none;
        padding: 13px 36px; font-size: 14px; font-weight: 600; border-radius: 50px;
        cursor: pointer; font-family: "Inter", sans-serif;
        box-shadow: 0 4px 20px rgba(242,101,34,0.35); transition: all 0.3s ease;
    }
    .print-bar button:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(242,101,34,0.45); }
    .print-bar button svg { vertical-align: middle; margin-right: 8px; }

    .receipt-outer {
        background: linear-gradient(180deg, #f26522 0%, #e8a040 25%, #f26522 50%, #d4541a 75%, #c0392b 100%);
        padding: 7px; border-radius: 6px;
        box-shadow: 0 8px 40px rgba(0,0,0,0.12), 0 2px 8px rgba(242,101,34,0.15);
    }
    .receipt-card { background: #fffcf9; position: relative; overflow: hidden; border-radius: 2px; }
    .receipt-card::after {
        content: ""; position: absolute; top: 0; right: 0;
        width: 100px; height: 100px; opacity: 0.06;
        background: radial-gradient(circle at top right, #f26522 0%, transparent 70%);
        pointer-events: none; z-index: 0;
    }

    .r-header {
        background: linear-gradient(135deg, #fef6ec 0%, #fff9f2 30%, #fef0df 70%, #fbe4cc 100%);
        padding: 26px 32px; display: flex; align-items: center; gap: 24px;
        position: relative; z-index: 1;
    }
    .r-header img.logo { height: 110px; flex-shrink: 0; filter: drop-shadow(0 2px 6px rgba(0,0,0,0.08)); }
    .r-header-info h1 {
        font-family: "Playfair Display", Georgia, serif; color: #8b0000;
        font-size: 29px; font-weight: 900; margin-bottom: 5px;
    }
    .r-header-info p { font-size: 11.8px; color: #444; line-height: 1.6; margin: 1.5px 0; }
    .r-header-info .b { font-weight: 700; color: #222; }

    .r-sep-wrap { padding: 0; position: relative; z-index: 1; }
    .r-sep-outer { height: 1px; background: #ddd; }
    .r-sep-main { height: 3px; background: linear-gradient(90deg, #c0392b, #f26522, #ff8c42, #f26522, #c0392b); margin: 2px 0; }
    .r-sep-inner { height: 1px; background: #ddd; }

    .r-badge-wrap { text-align: center; padding: 14px 0 4px; position: relative; z-index: 1; }
    .r-badge {
        display: inline-block; background: linear-gradient(135deg, #f26522, #e05515);
        color: #fff; padding: 6px 32px; border-radius: 50px;
        font-size: 12px; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase;
        box-shadow: 0 3px 12px rgba(242,101,34,0.3);
    }

    .r-body { padding: 18px 32px 12px; position: relative; z-index: 1; }
    .r-row { display: flex; align-items: baseline; margin-bottom: 20px; gap: 10px; }
    .r-label { font-size: 14.5px; font-weight: 700; color: #222; white-space: nowrap; }
    .r-val-fill {
        flex: 1; font-size: 14.5px; color: #111; font-weight: 500;
        border-bottom: 1.5px dotted #bbb; padding-bottom: 3px; padding-left: 6px;
    }
    .r-row-split { display: flex; gap: 50px; margin-bottom: 20px; }
    .r-row-split .r-col { flex: 1; display: flex; align-items: baseline; gap: 10px; }
    .r-row-split .r-col:last-child { flex: 0 0 auto; margin-left: auto; }

    .r-amount-bar {
        display: flex; justify-content: space-between; align-items: center;
        background: linear-gradient(135deg, #fff7f0, #fff1e6, #ffecdb);
        border: 2px solid #f26522; border-radius: 12px;
        padding: 16px 24px; margin: 24px 0 8px; position: relative; overflow: hidden;
    }
    .r-amount-label { font-size: 10px; text-transform: uppercase; letter-spacing: 2px; color: #f26522; font-weight: 700; margin-bottom: 3px; }
    .r-amount-words { font-size: 12px; color: #888; font-style: italic; }
    .r-amount-big { font-size: 34px; font-weight: 800; color: #f26522; }
    .r-amount-big .rupee { font-size: 24px; font-weight: 600; margin-right: 3px; opacity: 0.8; }

    .r-footer {
        display: flex; justify-content: space-between; align-items: flex-end;
        padding: 22px 32px 24px; position: relative; z-index: 1;
        border-top: 1.5px dashed #e0d5ca;
    }
    .r-rupee-box {
        display: inline-flex; align-items: stretch; border: 2.5px solid #c0392b;
        border-radius: 6px; overflow: hidden; font-size: 20px; font-weight: 700;
        box-shadow: 0 2px 8px rgba(242,101,34,0.15);
    }
    .r-rupee-sym {
        background: linear-gradient(135deg, #d4541a, #c0392b); color: #fff;
        padding: 7px 14px; font-size: 22px; display: flex; align-items: center;
    }
    .r-rupee-amt { padding: 7px 20px; display: flex; align-items: center; background: #fff; letter-spacing: 0.5px; }

    .r-tax { margin-top: 12px; font-size: 10px; color: #999; line-height: 1.8; }
    .r-tax table td { font-size: 10px; color: #999; vertical-align: top; }
    .r-tax .tb { font-weight: 700; color: #666; white-space: nowrap; padding-right: 5px; }

    .r-sign { text-align: center; }
    .r-sign img { height: 58px; display: block; margin: 0 auto 6px; }
    .r-sign-line { width: 195px; margin: 0 auto 7px; border: none; border-top: 1.5px solid #333; }
    .r-sign-text { font-size: 12.5px; font-weight: 600; color: #8b0000; }
    .r-sign-text strong { font-weight: 800; }
    .r-sign-sub { font-size: 9.5px; color: #aaa; margin-top: 3px; letter-spacing: 0.5px; text-transform: uppercase; }

    .r-bottom {
        background: linear-gradient(135deg, #1a1b2e, #252840);
        text-align: center; padding: 10px 20px; font-size: 10px; color: #777;
        position: relative; z-index: 1;
    }
    .r-bottom a { color: #f26522; text-decoration: none; font-weight: 700; }

    @media print {
        body { background: #fff !important; padding: 10px !important; }
        .print-bar { display: none !important; }
        .receipt-outer { box-shadow: none !important; }
    }
    @media (max-width: 620px) {
        .r-header { flex-direction: column; text-align: center; padding: 20px 16px; }
        .r-header img.logo { height: 80px; }
        .r-header-info h1 { font-size: 22px; }
        .r-body { padding: 16px 16px 10px; }
        .r-row-split { flex-direction: column; gap: 18px; }
        .r-footer { flex-direction: column; gap: 24px; align-items: center; }
        .r-amount-bar { flex-direction: column; text-align: center; gap: 10px; }
    }
</style>
</head>
<body>
<div class="receipt-wrapper">
    <div class="print-bar">
        <button onclick="window.print()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
            Print Receipt
        </button>
    </div>
    <div class="receipt-outer">
    <div class="receipt-card">
        <div class="r-header">
            ' . ($logoSrc ? '<img class="logo" src="' . $logoSrc . '" alt="Saptashati">' : '') . '
            <div class="r-header-info">
                <h1>Durga Saptashati Foundation</h1>
                <p>Property No. 150, Basement, Spine Enclave, Block - C, Pocket - 8,<br>Sector - 17, Dwarka, New Delhi - 110075</p>
                <p><span class="b">Email</span> : support@saptashati.org, <span class="b">Website</span> : www.saptashati.org</p>
                <p><span class="b">CIN</span> : U85300DL2020NPL374927, &nbsp;<span class="b">PAN</span> : AAICD2212N, &nbsp;<span class="b">TAN</span> : DELD24422G</p>
                <p><span class="b">12A UAN</span> : AAICD2212NE20210, <span class="b">80G UAN</span> : AAICD2212NF20226</p>
                <p><span class="b">DARPAN REG. NO.</span> : DL/2021/0280503, <span class="b">CSR REG. NO.</span> : CSR00087989</p>
            </div>
        </div>
        <div class="r-sep-wrap"><div class="r-sep-outer"></div><div class="r-sep-main"></div><div class="r-sep-inner"></div></div>
        <div class="r-badge-wrap"><span class="r-badge">' . ($type === 'donation' ? 'Donation Receipt' : 'Membership Receipt') . '</span></div>
        <div class="r-body">
            <div class="r-row-split">
                <div class="r-col">
                    <span class="r-label">Receipt No. :</span>
                    <span class="r-val-fill" style="font-weight:700; color:#c0392b;">' . $receiptNo . '</span>
                </div>
                <div class="r-col">
                    <span class="r-label">Date :</span>
                    <span class="r-val-fill" style="text-align:right; min-width:140px;">' . $date . '</span>
                </div>
            </div>
            <div class="r-row">
                <span class="r-label">Received with thanks from Mr./Mrs./Ku.</span>
                <span class="r-val-fill" style="font-weight:600;">' . $name . '</span>
            </div>
            <div class="r-row">
                <span class="r-label">The sum of Rupees</span>
                <span class="r-val-fill">' . $amountWords . '</span>
            </div>
            <div class="r-row">
                <span class="r-label">Towards</span>
                <span class="r-val-fill">' . $purpose . '</span>
            </div>
            <div class="r-row">
                <span class="r-label">Transaction ID</span>
                <span class="r-val-fill" style="font-family: Consolas, monospace; letter-spacing: 0.5px; font-size: 13.5px;">' . $transactionId . '</span>
            </div>
            <div class="r-row">
                <span class="r-label">Payment Mode</span>
                <span class="r-val-fill">Online (Razorpay)</span>
            </div>
            <div class="r-amount-bar">
                <div>
                    <div class="r-amount-label">Total Amount</div>
                    <div class="r-amount-words">' . $amountWords . '</div>
                </div>
                <div class="r-amount-big"><span class="rupee">&#8377;</span>' . $amount . '</div>
            </div>
        </div>
        <div class="r-footer">
            <div>
                <div class="r-rupee-box">
                    <span class="r-rupee-sym">&#8377;</span>
                    <span class="r-rupee-amt">' . $amount . '</span>
                </div>
                <div class="r-tax">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr><td colspan="2" style="padding-bottom:4px;">Donations are eligible for tax exemption under<br>Section 80G of the Income Tax Act, 1961.</td></tr>
                        <tr><td class="tb">80G UAN</td><td>: AAICD2212NF20226</td></tr>
                        <tr><td class="tb">PAN</td><td>: AAICD2212N</td></tr>
                    </table>
                </div>
            </div>
            <div class="r-sign">
                ' . ($signatureSrc ? '<img src="' . $signatureSrc . '" alt="Authorized Signature">' : '') . '
                <div class="r-sign-line"></div>
                <div class="r-sign-text">For, <strong>Durga Saptashati Foundation</strong></div>
                <div class="r-sign-sub">Authorized Signatory</div>
            </div>
        </div>
        <div class="r-bottom">
            This is a computer-generated receipt and does not require a physical signature. &bull;
            <a href="https://www.saptashati.org">www.saptashati.org</a>
        </div>
    </div>
    </div>
</div>
</body>
</html>';
}

/**
 * Generate PDF-compatible receipt HTML (table-based layout matching the browser receipt UI)
 * Uses tables instead of flexbox, solid colors instead of gradients (DOMPDF compatible)
 */
function generateReceiptPDFHTML($data)
{
    $receiptNo = $data['receipt_no'];
    $date = $data['date'];
    $name = htmlspecialchars($data['name']);
    $amount = number_format($data['amount'], 2);
    $amountWords = amountToWords((int) $data['amount']) . ' Rupees Only';
    $transactionId = htmlspecialchars($data['transaction_id']);
    $type = $data['type'];
    $purpose = ($type === 'donation') ? 'Donation' : 'Membership - ' . htmlspecialchars($data['membership_type'] ?? '');

    $logoSrc = getImageBase64(__DIR__ . '/../public/assets/images/logo-wide.webp', 'image/webp');
    $signatureSrc = getImageBase64(__DIR__ . '/../public/assets/images/sandhya-singh-signature.png', 'image/png');

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Receipt - ' . $receiptNo . '</title>
<style>
    * { margin: 0; padding: 0; }
    body { font-family: "Segoe UI", Arial, sans-serif; background: #fff; padding: 18px; }

    /* Outer border */
    .receipt-border { background: #f26522; padding: 5px; }
    .receipt-card { background: #fffcf9; position: relative; }

    /* Watermark */
    .watermark {
        position: fixed;
        top: 45%;
        left: 50%;
        width: 280px;
        height: 280px;
        margin-left: -140px;
        margin-top: -140px;
        opacity: 0.06;
        z-index: 0;
    }

    /* Header */
    .r-header { background: #fef6ec; padding: 0; position: relative; z-index: 1; }
    .r-header td { vertical-align: middle; padding: 22px 28px; }
    .r-header .logo { height: 100px; }
    .r-header .org-name {
        font-family: Georgia, "Times New Roman", serif; color: #8b0000;
        font-size: 26px; font-weight: bold; margin: 0 0 4px;
    }
    .r-header .org-info { font-size: 11px; color: #444; line-height: 1.65; margin: 1px 0; }
    .r-header .org-info b { color: #222; }

    /* Separator lines */
    .sep-outer { height: 1px; background: #ddd; font-size: 1px; line-height: 1px; }
    .sep-main { height: 3px; background: #f26522; font-size: 1px; line-height: 1px; margin: 2px 0; }

    /* Badge */
    .badge-wrap { text-align: center; padding: 14px 0 6px; }
    .badge {
        display: inline-block; background: #f26522; color: #fff;
        padding: 6px 30px; border-radius: 50px;
        font-size: 11px; font-weight: bold; letter-spacing: 2.5px; text-transform: uppercase;
    }

    /* Body detail rows */
    .r-body { padding: 16px 28px 10px; position: relative; z-index: 1; }
    .detail-row { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
    .detail-row td { font-size: 13.5px; vertical-align: baseline; line-height: 1.3; padding: 6px 0; }
    .detail-row .lbl { font-weight: bold; color: #222; white-space: nowrap; padding-right: 10px; width: 1%; }
    .detail-row .val {
        color: #555; font-weight: 500;
        border-bottom: 1.5px dashed #ccc; padding-left: 35px; text-align: left;
    }

    /* Amount bar */
    .amount-bar { border: 2px solid #f26522; background: #fff8f3; margin: 20px 0 8px; }
    .amount-bar td { padding: 14px 22px; vertical-align: middle; }
    .amount-label { font-size: 10px; text-transform: uppercase; letter-spacing: 2px; color: #f26522; font-weight: bold; }
    .amount-words { font-size: 11px; color: #888; font-style: italic; margin-top: 2px; }
    .amount-big { font-size: 30px; font-weight: bold; color: #f26522; text-align: right; }

    /* Footer */
    .r-footer { padding: 18px 28px 20px; border-top: 1px dashed #e0d5ca; position: relative; z-index: 1; }
    .r-footer td { vertical-align: top; }

    .rupee-box { border: 2px solid #d4541a; border-collapse: collapse; }
    .rupee-sym { background: #d4541a; color: #fff; padding: 6px 14px; font-size: 16px; font-weight: bold; text-align: center; }
    .rupee-amt { padding: 6px 18px; font-size: 18px; font-weight: bold; background: #fff; }

    .tax-text { font-size: 9.5px; color: #999; line-height: 1.8; margin-top: 10px; }
    .tax-text b { color: #666; }
    .tax-detail { font-size: 9.5px; color: #999; }
    .tax-detail b { color: #666; white-space: nowrap; }

    .sign-area { text-align: center; vertical-align: bottom; }
    .sign-img { height: 55px; }
    .sign-line { width: 180px; border-top: 1.5px solid #333; margin: 4px auto 6px; }
    .sign-name { font-size: 12px; font-weight: bold; color: #8b0000; margin: 0; }
    .sign-sub { font-size: 9px; color: #aaa; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 2px; }

    /* Bottom bar */
    .r-bottom { background: #1a1b2e; text-align: center; padding: 9px 16px; }
    .r-bottom p { margin: 0; font-size: 9.5px; color: #777; }
    .r-bottom a { color: #f26522; text-decoration: none; font-weight: bold; }
</style>
</head>
<body>

<div class="receipt-border">
<div class="receipt-card">

    <!-- Watermark Logo -->
    ' . ($logoSrc ? '<img class="watermark" src="' . $logoSrc . '" alt="">' : '') . '

    <!-- Header with Logo + Org Info -->
    <table class="r-header" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 120px; text-align: center; padding-right: 20px;">
                ' . ($logoSrc ? '<img class="logo" src="' . $logoSrc . '" alt="Saptashati">' : '') . '
            </td>
            <td>
                <p class="org-name">Durga Saptashati Foundation</p>
                <p class="org-info">Property No. 150, Basement, Spine Enclave, Block - C, Pocket - 8,<br>Sector - 17, Dwarka, New Delhi - 110075</p>
                <p class="org-info"><b>Email</b> : support@saptashati.org, <b>Website</b> : www.saptashati.org</p>
                <p class="org-info"><b>CIN</b> : U85300DL2020NPL374927, &nbsp;<b>PAN</b> : AAICD2212N, &nbsp;<b>TAN</b> : DELD24422G</p>
                <p class="org-info"><b>12A UAN</b> : AAICD2212NE20210, <b>80G UAN</b> : AAICD2212NF20226</p>
                <p class="org-info"><b>DARPAN REG. NO.</b> : DL/2021/0280503, <b>CSR REG. NO.</b> : CSR00087989</p>
            </td>
        </tr>
    </table>

    <!-- Decorative Separator -->
    <div class="sep-outer">&nbsp;</div>
    <div class="sep-main">&nbsp;</div>
    <div class="sep-outer">&nbsp;</div>

    <!-- Receipt Type Badge -->
    <div class="badge-wrap"><span class="badge">' . ($type === 'donation' ? 'Donation Receipt' : 'Membership Receipt') . '</span></div>

    <!-- Receipt Details -->
    <div class="r-body">
        <!-- Receipt No & Date row -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">Receipt No. :</td>
                <td class="val" style="font-weight:bold; color:#c0392b;">' . $receiptNo . '</td>
                <td class="lbl" style="padding-left:40px;">Date :</td>
                <td class="val" style="text-align:right;">' . $date . '</td>
            </tr>
        </table>

        <!-- Name -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">Received with thanks from Mr./Mrs./Ku.</td>
                <td class="val" style="font-weight:600;">' . $name . '</td>
            </tr>
        </table>

        <!-- Amount in words -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">The sum of Rupees</td>
                <td class="val">' . $amountWords . '</td>
            </tr>
        </table>

        <!-- Purpose -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">Towards</td>
                <td class="val">' . $purpose . '</td>
            </tr>
        </table>

        <!-- Transaction ID -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">Transaction ID</td>
                <td class="val" style="font-family: Consolas, Courier, monospace; letter-spacing: 0.5px; font-size: 12.5px;">' . $transactionId . '</td>
            </tr>
        </table>

        <!-- Payment Mode -->
        <table class="detail-row" cellpadding="0" cellspacing="0">
            <tr>
                <td class="lbl">Payment Mode</td>
                <td class="val">Online (Razorpay)</td>
            </tr>
        </table>

        <!-- Amount Bar -->
        <table class="amount-bar" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <p class="amount-label">Total Amount</p>
                    <p class="amount-words">' . $amountWords . '</p>
                </td>
                <td class="amount-big">Rs. ' . $amount . '</td>
            </tr>
        </table>
    </div>

    <!-- Footer: Rupee box + Tax info | Signature -->
    <div class="r-footer">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <table class="rupee-box" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="rupee-sym">Rs.</td>
                            <td class="rupee-amt">' . $amount . '</td>
                        </tr>
                    </table>
                    <div class="tax-text">
                        Donations are eligible for tax exemption under<br>Section 80G of the Income Tax Act, 1961.
                    </div>
                    <table cellpadding="0" cellspacing="0" style="margin-top: 4px;">
                        <tr>
                            <td class="tax-detail"><b>80G UAN</b></td>
                            <td class="tax-detail" style="padding-left: 5px;">: AAICD2212NF20226</td>
                        </tr>
                        <tr>
                            <td class="tax-detail"><b>PAN</b></td>
                            <td class="tax-detail" style="padding-left: 5px;">: AAICD2212N</td>
                        </tr>
                    </table>
                </td>
                <td class="sign-area" style="width: 50%; vertical-align: bottom;">
                    ' . ($signatureSrc ? '<img class="sign-img" src="' . $signatureSrc . '" alt="Authorized Signature"><br>' : '') . '
                    <div class="sign-line"></div>
                    <p class="sign-name">For, <b>Durga Saptashati Foundation</b></p>
                    <p class="sign-sub">Authorized Signatory</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Bottom Bar -->
    <div class="r-bottom">
        <p>This is a computer-generated receipt and does not require a physical signature. &bull;
        <a href="https://www.saptashati.org">www.saptashati.org</a></p>
    </div>

</div>
</div>

</body>
</html>';
}

/**
 * Generate PDF from receipt HTML using DOMPDF
 */
function generateReceiptPDF($data)
{
    $html = generateReceiptPDFHTML($data);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $options->set('isHtml5ParserEnabled', true);
    $options->set('defaultFont', 'sans-serif');
    $options->setChroot(__DIR__ . '/../public');

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    return $dompdf->output();
}

/**
 * Generate professional email template (no receipt embedded, PDF is attached)
 */
function generateEmailHTML($data)
{
    $name = htmlspecialchars($data['name']);
    $amount = number_format($data['amount'], 2);
    $receiptNo = $data['receipt_no'];
    $transactionId = htmlspecialchars($data['transaction_id']);
    $date = $data['date'];
    $type = $data['type'];
    $typeLabel = ($type === 'donation') ? 'Donation' : 'Membership';
    $purpose = ($type === 'donation') ? 'Donation' : 'Membership - ' . htmlspecialchars($data['membership_type'] ?? '');
    $amountWords = amountToWords((int) $data['amount']) . ' Rupees Only';

    $logoUrl = 'https://www.saptashati.org/public/assets/images/logo-wide.webp';

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>' . $typeLabel . ' Receipt</title>
</head>
<body style="margin:0; padding:0; background-color:#ffffff; font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; -webkit-font-smoothing:antialiased;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#ffffff;">
<tr><td align="center">

<table role="presentation" width="620" cellpadding="0" cellspacing="0" style="max-width:620px; width:100%; background:#ffffff;">

    <!-- Orange Top Strip -->
    <tr><td style="background:linear-gradient(90deg, #f26522, #ff8c42, #f26522); height:5px; font-size:0;">&nbsp;</td></tr>

    <!-- Logo -->
    <tr>
        <td style="padding:20px 32px 12px; text-align:center; border-bottom:1px solid #f5ede5;">
            <img src="' . $logoUrl . '" alt="Durga Saptashati Foundation" style="height:55px; margin-bottom:8px;" />
            <h1 style="margin:0; font-family:Georgia, Times New Roman, serif; color:#8b0000; font-size:20px; font-weight:900;">Durga Saptashati Foundation</h1>
            <p style="margin:3px 0 0; font-size:10px; color:#bbb; letter-spacing:1px;">&#2360;&#2352;&#2381;&#2357;&#2375; &#2349;&#2357;&#2344;&#2381;&#2340;&#2369; &#2360;&#2369;&#2326;&#2367;&#2344;&#2307;</p>
        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:18px 32px 6px;">
            <h2 style="margin:0 0 4px; font-size:18px; color:#1a1a1a; font-weight:700;">Thank You, ' . $name . '!</h2>
            <p style="margin:0; font-size:13px; color:#666; line-height:1.6;">
                Your ' . strtolower($typeLabel) . ' has been received successfully. We are grateful for your generous contribution.
            </p>
        </td>
    </tr>

    <!-- Amount Card -->
    <tr>
        <td style="padding:12px 32px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fff8f3; border:2px solid #f26522; border-radius:10px;">
                <tr>
                    <td style="padding:16px 24px; text-align:center;">
                        <p style="margin:0 0 2px; font-size:10px; color:#f26522; text-transform:uppercase; letter-spacing:2px; font-weight:700;">Amount Received</p>
                        <p style="margin:0; font-size:32px; font-weight:800; color:#f26522; line-height:1.2;">&#8377;' . $amount . '</p>
                        <p style="margin:4px 0 0; font-size:11px; color:#aaa; font-style:italic;">' . $amountWords . '</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Details Header -->
    <tr>
        <td style="padding:8px 32px 0;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="border-bottom:2px solid #f26522; padding-bottom:6px;">
                        <p style="margin:0; font-size:11px; color:#f26522; text-transform:uppercase; letter-spacing:2px; font-weight:700;">' . $typeLabel . ' Details</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Details Table -->
    <tr>
        <td style="padding:4px 32px 12px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; width:38%; border-bottom:1px solid #f5ede5;">Receipt No.</td>
                    <td style="padding:8px 0; font-size:13px; color:#c0392b; font-weight:700; border-bottom:1px solid #f5ede5;">' . $receiptNo . '</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; border-bottom:1px solid #f5ede5;">Date</td>
                    <td style="padding:8px 0; font-size:13px; color:#333; border-bottom:1px solid #f5ede5;">' . $date . '</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; border-bottom:1px solid #f5ede5;">Name</td>
                    <td style="padding:8px 0; font-size:13px; color:#222; font-weight:600; border-bottom:1px solid #f5ede5;">' . $name . '</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; border-bottom:1px solid #f5ede5;">Towards</td>
                    <td style="padding:8px 0; font-size:13px; color:#333; border-bottom:1px solid #f5ede5;">' . $purpose . '</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; border-bottom:1px solid #f5ede5;">Payment Mode</td>
                    <td style="padding:8px 0; font-size:13px; color:#333; border-bottom:1px solid #f5ede5;">Online (Razorpay)</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; font-size:11px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Transaction ID</td>
                    <td style="padding:8px 0; font-size:12px; color:#333; font-family:Consolas, Courier New, monospace; letter-spacing:0.8px;">' . $transactionId . '</td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Tax Info -->
    <tr>
        <td style="padding:0 32px 10px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fdf9f5; border-radius:6px; border:1px solid #f0e6d9;">
                <tr>
                    <td style="padding:10px 14px;">
                        <p style="margin:0 0 3px; font-size:10px; color:#888; line-height:1.5;">
                            <strong style="color:#555;">Tax Exemption:</strong> Eligible under Section 80G of Income Tax Act, 1961.
                        </p>
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td style="font-size:10px; font-weight:700; color:#555; padding-right:5px; white-space:nowrap;">80G UAN</td>
                                <td style="font-size:10px; color:#888;">: AAICD2212NF20226</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px; font-weight:700; color:#555; padding-right:5px;">PAN</td>
                                <td style="font-size:10px; color:#888;">: AAICD2212N</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Attachment Note -->
    <tr>
        <td style="padding:0 32px 12px; text-align:center;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fff7f0; border-radius:8px; border:1px dashed #f26522;">
                <tr>
                    <td style="padding:12px 16px; text-align:center;">
                        <p style="margin:0; font-size:12px; color:#d4541a; font-weight:700;">&#128206; Your official receipt is attached as a PDF</p>
                        <p style="margin:3px 0 0; font-size:10px; color:#aaa;">Please save it for your records and tax purposes</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#1a1b2e; padding:14px 30px; text-align:center;">
            <img src="' . $logoUrl . '" alt="Saptashati" style="height:35px; margin-bottom:8px; opacity:0.7;" />
            <p style="margin:0 0 6px; font-size:10.5px; color:#666; line-height:1.6;">
                Property No. 150, Basement, Spine Enclave, Block - C, Pocket - 8,<br>
                Sector - 17, Dwarka, New Delhi - 110075
            </p>
            <p style="margin:0 0 10px;">
                <a href="https://www.saptashati.org" style="color:#f26522; text-decoration:none; font-size:11px; font-weight:700;">www.saptashati.org</a>
            </p>
            <p style="margin:0; font-size:9.5px; color:#555;">
                This is an auto-generated email. Please do not reply directly.<br>
                &copy; ' . date('Y') . ' Durga Saptashati Foundation. All rights reserved.
            </p>
        </td>
    </tr>

</table>

</td></tr>
</table>

</body>
</html>';
}

/**
 * Generate admin notification email
 */
function generateAdminEmailHTML($data)
{
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email'] ?? 'N/A');
    $amount = number_format($data['amount'], 2);
    $receiptNo = $data['receipt_no'];
    $transactionId = htmlspecialchars($data['transaction_id']);
    $date = $data['date'];
    $type = $data['type'];
    $typeLabel = ($type === 'donation') ? 'Donation' : 'Membership';
    $purpose = ($type === 'donation') ? 'Donation' : 'Membership - ' . htmlspecialchars($data['membership_type'] ?? '');

    return '<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="margin:0; padding:0; background:#f4f1ec; font-family:Segoe UI, Arial, sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f1ec; padding:25px 10px;">
<tr><td align="center">
<table role="presentation" width="580" cellpadding="0" cellspacing="0" style="max-width:580px; width:100%; background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 2px 15px rgba(0,0,0,0.06);">

    <tr><td style="background:linear-gradient(135deg,#f26522,#ff8c42); padding:20px 30px; text-align:center;">
        <h2 style="margin:0; color:#fff; font-size:18px; font-weight:700;">&#128276; New ' . $typeLabel . ' Received</h2>
    </td></tr>

    <tr><td style="padding:25px 30px;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">
            <tr>
                <td style="background:#fff8f3; border:1px solid #fde0cc; border-radius:8px; padding:15px; text-align:center;">
                    <p style="margin:0 0 3px; font-size:11px; color:#f26522; text-transform:uppercase; font-weight:700; letter-spacing:1px;">Amount</p>
                    <p style="margin:0; font-size:28px; font-weight:800; color:#f26522;">&#8377;' . $amount . '</p>
                </td>
            </tr>
        </table>

        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600; border-bottom:1px solid #f5f0ea;">Name</td><td style="padding:8px 0; font-size:14px; color:#333; font-weight:600; border-bottom:1px solid #f5f0ea; text-align:right;">' . $name . '</td></tr>
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600; border-bottom:1px solid #f5f0ea;">Email</td><td style="padding:8px 0; font-size:14px; color:#333; border-bottom:1px solid #f5f0ea; text-align:right;">' . $email . '</td></tr>
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600; border-bottom:1px solid #f5f0ea;">Receipt No.</td><td style="padding:8px 0; font-size:14px; color:#c0392b; font-weight:700; border-bottom:1px solid #f5f0ea; text-align:right;">' . $receiptNo . '</td></tr>
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600; border-bottom:1px solid #f5f0ea;">Towards</td><td style="padding:8px 0; font-size:14px; color:#333; border-bottom:1px solid #f5f0ea; text-align:right;">' . $purpose . '</td></tr>
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600; border-bottom:1px solid #f5f0ea;">Transaction ID</td><td style="padding:8px 0; font-size:13px; color:#333; font-family:Consolas,monospace; border-bottom:1px solid #f5f0ea; text-align:right;">' . $transactionId . '</td></tr>
            <tr><td style="padding:8px 0; font-size:13px; color:#888; font-weight:600;">Date</td><td style="padding:8px 0; font-size:14px; color:#333; text-align:right;">' . $date . '</td></tr>
        </table>
    </td></tr>

    <tr><td style="padding:0 30px 20px; text-align:center;">
        <p style="margin:0; font-size:11px; color:#aaa;">&#128206; Receipt PDF attached to this email</p>
    </td></tr>

    <tr><td style="background:#1a1b2e; padding:15px; text-align:center;">
        <p style="margin:0; font-size:10px; color:#666;">&copy; ' . date('Y') . ' Durga Saptashati Foundation | Admin Notification</p>
    </td></tr>

</table>
</td></tr></table>
</body></html>';
}

/**
 * Save receipt PDF and send email with attachment to user + admin
 */
function sendReceipt($data, $pdo = null)
{
    $result = ['success' => false, 'receipt_path' => '', 'error' => ''];

    try {
        // Create uploads directory
        $uploadsDir = __DIR__ . '/../public/uploads/receipts';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        // Generate PDF
        $pdfContent = generateReceiptPDF($data);
        $pdfFilename = $data['receipt_no'] . '_' . date('Ymd_His') . '.pdf';
        $pdfPath = $uploadsDir . '/' . $pdfFilename;
        file_put_contents($pdfPath, $pdfContent);
        $result['receipt_path'] = $pdfPath;

        // Send email to user with PDF attachment
        if (!empty($data['email'])) {
            $emailHTML = generateEmailHTML($data);
            $typeLabel = ($data['type'] === 'donation') ? 'Donation' : 'Membership';
            $userMailResult = sendEmail(
                $data['email'],
                $data['name'],
                $typeLabel . ' Receipt - Durga Saptashati Foundation (' . $data['receipt_no'] . ')',
                $emailHTML,
                'Receipt ' . $data['receipt_no'] . ' | Amount: Rs.' . number_format($data['amount'], 2),
                $pdfPath,
                $data['receipt_no'] . '.pdf'
            );

            if (!$userMailResult['success']) {
                $result['error'] = $userMailResult['error'];
            }
        }

        // Send admin notification with PDF attachment
        $adminEmail = defined('ADMIN_EMAIL') ? ADMIN_EMAIL : 'admin@saptashati.org';
        $adminHTML = generateAdminEmailHTML($data);
        $typeLabel = ($data['type'] === 'donation') ? 'Donation' : 'Membership';
        sendEmail(
            $adminEmail,
            'Admin',
            'New ' . $typeLabel . ': ' . $data['name'] . ' - Rs.' . number_format($data['amount'], 2) . ' (' . $data['receipt_no'] . ')',
            $adminHTML,
            'New ' . $typeLabel . ' from ' . $data['name'],
            $pdfPath,
            $data['receipt_no'] . '.pdf'
        );

        $result['success'] = true;

    } catch (\Exception $e) {
        $result['error'] = 'Receipt generation failed: ' . $e->getMessage();
    }

    return $result;
}

/**
 * Send email via PHPMailer with optional PDF attachment
 */
function sendEmail($toEmail, $toName, $subject, $htmlBody, $altBody = '', $attachmentPath = '', $attachmentName = '')
{
    $result = ['success' => false, 'error' => ''];

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = defined('MAIL_HOST') ? MAIL_HOST : 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = defined('MAIL_USER') ? MAIL_USER : '';
        $mail->Password = defined('MAIL_PASS') ? MAIL_PASS : '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = defined('MAIL_PORT') ? (int) MAIL_PORT : 587;

        if (empty($mail->Username) || empty($mail->Password)) {
            $mail->isMail();
        }

        $fromEmail = defined('MAIL_USER') ? MAIL_USER : (defined('MAIL_FROM') ? MAIL_FROM : 'info@saptashati.org');
        $mail->setFrom($fromEmail, 'Durga Saptashati Foundation');
        $mail->addAddress($toEmail, $toName);
        $mail->addReplyTo('support@saptashati.org', 'Durga Saptashati Foundation');

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $mail->Body = $htmlBody;
        $mail->AltBody = $altBody;

        // Attach PDF if provided
        if (!empty($attachmentPath) && file_exists($attachmentPath)) {
            $mail->addAttachment($attachmentPath, $attachmentName ?: basename($attachmentPath), 'base64', 'application/pdf');
        }

        $mail->send();
        $result['success'] = true;
    } catch (Exception $e) {
        $result['error'] = 'Email failed: ' . $mail->ErrorInfo;
    }

    return $result;
}