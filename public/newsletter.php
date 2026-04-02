<?php
require_once '../app/config/config.php';

// Handle direct POST (non-AJAX fallback)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("SELECT id, status FROM subscribers WHERE email = ?");
        $stmt->execute([$email]);
        $existing = $stmt->fetch();

        if ($existing) {
            if ($existing['status'] !== 'active') {
                $pdo->prepare("UPDATE subscribers SET status = 'active' WHERE id = ?")->execute([$existing['id']]);
            }
        } else {
            $pdo->prepare("INSERT INTO subscribers (email) VALUES (?)")->execute([$email]);
        }
    }
}

$pageTitle = "Newsletter - " . APP_NAME;
$pageDescription = "Thank you for subscribing to our newsletter.";
$pageKeywords = "newsletter, subscription, updates";

include '../app/views/layout/header.php';
?>

<div class="coming-soon-section" data-aos="fade" data-aos-duration="1000">
    <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
        <div class="coming-soon-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="coming-soon-title">Thank You!</h1>
        <h2 class="coming-soon-subtitle">You're Subscribed</h2>
        <p class="coming-soon-text">
            Thank you for subscribing to our newsletter! You'll receive updates about our initiatives,
            events, and impact stories directly in your inbox.
        </p>
        <a href="<?php echo url('index.php'); ?>" class="coming-soon-btn">
            <i class="fas fa-home"></i> Back to Home
        </a>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
