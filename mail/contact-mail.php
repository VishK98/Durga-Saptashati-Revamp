<?php
/**
 * Contact Form Email Templates & Sender
 */

require_once __DIR__ . '/../vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../vendor/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Generate user confirmation email (thank you for reaching out)
 */
function generateContactUserEmail($data)
{
    $name = htmlspecialchars($data['name']);
    $subject = htmlspecialchars($data['subject']);
    $message = nl2br(htmlspecialchars($data['message']));
    $logoUrl = 'https://www.saptashati.org/public/assets/images/logo-wide.webp';

    return '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background-color:#f4f1ec; font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif; -webkit-font-smoothing:antialiased;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f1ec; padding:30px 10px;">
<tr><td align="center">

<table role="presentation" width="620" cellpadding="0" cellspacing="0" style="max-width:620px; width:100%; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 30px rgba(0,0,0,0.06);">

    <!-- Orange Top Strip -->
    <tr><td style="background:linear-gradient(90deg, #f26522, #ff8c42, #f26522); height:5px; font-size:0;">&nbsp;</td></tr>

    <!-- Logo -->
    <tr>
        <td style="padding:28px 40px 16px; text-align:center; border-bottom:1px solid #f5ede5;">
            <img src="' . $logoUrl . '" alt="Durga Saptashati Foundation" style="height:60px; margin-bottom:10px;" />
            <h1 style="margin:0; font-family:Georgia, Times New Roman, serif; color:#8b0000; font-size:21px; font-weight:900;">Durga Saptashati Foundation</h1>
            <p style="margin:4px 0 0; font-size:11px; color:#bbb; letter-spacing:1px;">&#2360;&#2352;&#2381;&#2357;&#2375; &#2349;&#2357;&#2344;&#2381;&#2340;&#2369; &#2360;&#2369;&#2326;&#2367;&#2344;&#2307;</p>
        </td>
    </tr>

    <!-- Checkmark Icon -->
    <tr>
        <td style="padding:28px 40px 0; text-align:center;">
            <div style="width:64px; height:64px; border-radius:50%; background:linear-gradient(135deg, #f26522, #ff8c42); display:inline-flex; align-items:center; justify-content:center; box-shadow:0 4px 18px rgba(242,101,34,0.3);">
                <span style="color:#fff; font-size:30px; line-height:1;">&#10003;</span>
            </div>
        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:18px 40px 8px; text-align:center;">
            <h2 style="margin:0 0 8px; font-size:22px; color:#1a1a1a; font-weight:700;">Thank You, ' . $name . '!</h2>
            <p style="margin:0; font-size:14px; color:#666; line-height:1.7; max-width:440px; display:inline-block;">
                We have received your message and will get back to you as soon as possible. Our team typically responds within <strong style="color:#f26522;">24 hours</strong>.
            </p>
        </td>
    </tr>

    <!-- Message Summary Card -->
    <tr>
        <td style="padding:22px 40px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fdf9f5; border-radius:10px; border:1px solid #f0e6d9; overflow:hidden;">
                <!-- Card Header -->
                <tr>
                    <td style="background:linear-gradient(135deg, #f26522, #ff8c42); padding:12px 22px;">
                        <p style="margin:0; font-size:13px; color:#fff; font-weight:700; letter-spacing:1px; text-transform:uppercase;">&#128172; Your Message Summary</p>
                    </td>
                </tr>
                <!-- Subject -->
                <tr>
                    <td style="padding:18px 22px 10px;">
                        <p style="margin:0 0 3px; font-size:10px; color:#f26522; text-transform:uppercase; letter-spacing:1.5px; font-weight:700;">Subject</p>
                        <p style="margin:0; font-size:15px; color:#222; font-weight:600;">' . $subject . '</p>
                    </td>
                </tr>
                <!-- Message -->
                <tr>
                    <td style="padding:10px 22px 18px;">
                        <p style="margin:0 0 3px; font-size:10px; color:#f26522; text-transform:uppercase; letter-spacing:1.5px; font-weight:700;">Message</p>
                        <p style="margin:0; font-size:13.5px; color:#444; line-height:1.7; background:#fff; border-radius:6px; padding:12px 14px; border:1px solid #f0e6d9;">' . $message . '</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- What Happens Next -->
    <tr>
        <td style="padding:0 40px 22px;">
            <h3 style="margin:0 0 12px; font-size:14px; color:#f26522; text-transform:uppercase; letter-spacing:1.5px; border-bottom:2px solid #f26522; padding-bottom:8px;">What Happens Next?</h3>
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding:8px 0; vertical-align:top; width:32px;">
                        <div style="width:26px; height:26px; border-radius:50%; background:#fff8f3; border:2px solid #f26522; text-align:center; line-height:22px; font-size:12px; font-weight:700; color:#f26522;">1</div>
                    </td>
                    <td style="padding:8px 0 8px 12px; font-size:13px; color:#555; line-height:1.5;">
                        <strong style="color:#333;">Review</strong> — Our team reviews your message carefully
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 0; vertical-align:top;">
                        <div style="width:26px; height:26px; border-radius:50%; background:#fff8f3; border:2px solid #f26522; text-align:center; line-height:22px; font-size:12px; font-weight:700; color:#f26522;">2</div>
                    </td>
                    <td style="padding:8px 0 8px 12px; font-size:13px; color:#555; line-height:1.5;">
                        <strong style="color:#333;">Respond</strong> — We will reply to your email within 24 hours
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 0; vertical-align:top;">
                        <div style="width:26px; height:26px; border-radius:50%; background:#fff8f3; border:2px solid #f26522; text-align:center; line-height:22px; font-size:12px; font-weight:700; color:#f26522;">3</div>
                    </td>
                    <td style="padding:8px 0 8px 12px; font-size:13px; color:#555; line-height:1.5;">
                        <strong style="color:#333;">Resolve</strong> — We work together to address your query
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Divider -->
    <tr><td style="padding:0 40px;"><div style="border-top:1px dashed #e0d5ca;"></div></td></tr>

    <!-- Contact -->
    <tr>
        <td style="padding:20px 40px; text-align:center;">
            <p style="margin:0 0 6px; font-size:13px; color:#888;">Need immediate assistance?</p>
            <p style="margin:0; font-size:13px;">
                <a href="mailto:support@saptashati.org" style="color:#f26522; text-decoration:none; font-weight:600;">support@saptashati.org</a>
                &nbsp;&nbsp;&#8226;&nbsp;&nbsp;
                <a href="tel:+919289088161" style="color:#f26522; text-decoration:none; font-weight:600;">+91 9289088161</a>
            </p>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#1a1b2e; padding:22px 40px; text-align:center;">
            <img src="' . $logoUrl . '" alt="Saptashati" style="height:32px; margin-bottom:8px; opacity:0.7;" />
            <p style="margin:0 0 6px; font-size:10.5px; color:#666; line-height:1.6;">
                Property No. 150, Basement, Spine Enclave, Block - C, Pocket - 8,<br>
                Sector - 17, Dwarka, New Delhi - 110075
            </p>
            <p style="margin:0 0 10px;">
                <a href="https://www.saptashati.org" style="color:#f26522; text-decoration:none; font-size:11px; font-weight:700;">www.saptashati.org</a>
            </p>
            <p style="margin:0; font-size:9.5px; color:#555;">
                This is an auto-generated confirmation. Please do not reply to this email.<br>
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
 * Generate admin notification email for new contact query
 */
function generateContactAdminEmail($data)
{
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $phone = htmlspecialchars($data['phone'] ?? 'N/A');
    $subject = htmlspecialchars($data['subject']);
    $message = nl2br(htmlspecialchars($data['message']));

    return '<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="margin:0; padding:0; background:#f4f1ec; font-family:Segoe UI, Arial, sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f1ec; padding:25px 10px;">
<tr><td align="center">
<table role="presentation" width="580" cellpadding="0" cellspacing="0" style="max-width:580px; width:100%; background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 2px 15px rgba(0,0,0,0.06);">

    <tr><td style="background:linear-gradient(135deg,#f26522,#ff8c42); padding:20px 30px; text-align:center;">
        <h2 style="margin:0; color:#fff; font-size:18px; font-weight:700;">&#128233; New Contact Message</h2>
    </td></tr>

    <tr><td style="padding:25px 30px;">

        <!-- Sender Info -->
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:18px;">
            <tr>
                <td style="background:#fff8f3; border:1px solid #fde0cc; border-radius:8px; padding:16px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="padding:5px 0; font-size:12px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; width:80px;">Name</td>
                            <td style="padding:5px 0; font-size:14px; color:#222; font-weight:700;">' . $name . '</td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0; font-size:12px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Email</td>
                            <td style="padding:5px 0; font-size:14px;"><a href="mailto:' . $email . '" style="color:#f26522; text-decoration:none; font-weight:600;">' . $email . '</a></td>
                        </tr>
                        <tr>
                            <td style="padding:5px 0; font-size:12px; color:#999; font-weight:600; text-transform:uppercase; letter-spacing:0.5px;">Phone</td>
                            <td style="padding:5px 0; font-size:14px; color:#333;">' . $phone . '</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Subject -->
        <p style="margin:0 0 4px; font-size:10px; color:#f26522; text-transform:uppercase; letter-spacing:1.5px; font-weight:700;">Subject</p>
        <p style="margin:0 0 16px; font-size:16px; color:#222; font-weight:700;">' . $subject . '</p>

        <!-- Message -->
        <p style="margin:0 0 4px; font-size:10px; color:#f26522; text-transform:uppercase; letter-spacing:1.5px; font-weight:700;">Message</p>
        <div style="background:#fdf9f5; border:1px solid #f0e6d9; border-radius:8px; padding:14px 16px; font-size:13.5px; color:#444; line-height:1.7;">' . $message . '</div>

    </td></tr>

    <!-- Quick Reply Button -->
    <tr>
        <td style="padding:0 30px 22px; text-align:center;">
            <a href="mailto:' . $email . '?subject=Re: ' . rawurlencode($data['subject']) . '" style="
                display:inline-block; background:linear-gradient(135deg,#f26522,#ff8c42);
                color:#fff; text-decoration:none; padding:12px 32px; border-radius:50px;
                font-size:13px; font-weight:700;
                box-shadow:0 3px 12px rgba(242,101,34,0.3);
            ">&#9993; Reply to ' . $name . '</a>
        </td>
    </tr>

    <tr><td style="background:#1a1b2e; padding:15px; text-align:center;">
        <p style="margin:0; font-size:10px; color:#666;">&copy; ' . date('Y') . ' Durga Saptashati Foundation | Contact Notification</p>
    </td></tr>

</table>
</td></tr></table>
</body></html>';
}

/**
 * Send contact form emails (user confirmation + admin notification)
 */
function sendContactEmails($data)
{
    $result = ['success' => false, 'error' => ''];

    try {
        // Send confirmation to user
        $userHTML = generateContactUserEmail($data);
        $userResult = sendContactEmail(
            $data['email'],
            $data['name'],
            'We received your message - Durga Saptashati Foundation',
            $userHTML,
            'Thank you for contacting Durga Saptashati Foundation. We will get back to you within 24 hours.'
        );

        // Send notification to admin
        $adminEmail = defined('ADMIN_EMAIL') ? ADMIN_EMAIL : 'admin@saptashati.org';
        $adminHTML = generateContactAdminEmail($data);
        sendContactEmail(
            $adminEmail,
            'Admin',
            'New Contact: ' . $data['name'] . ' - ' . $data['subject'],
            $adminHTML,
            'New contact from ' . $data['name'] . ': ' . $data['subject']
        );

        $result['success'] = true;
        if (!$userResult['success']) {
            $result['error'] = $userResult['error'];
        }
    } catch (\Exception $e) {
        $result['error'] = 'Email failed: ' . $e->getMessage();
    }

    return $result;
}

/**
 * Send a single email via PHPMailer
 */
function sendContactEmail($toEmail, $toName, $subject, $htmlBody, $altBody = '')
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

        $mail->send();
        $result['success'] = true;
    } catch (Exception $e) {
        $result['error'] = 'Email failed: ' . $mail->ErrorInfo;
    }

    return $result;
}
