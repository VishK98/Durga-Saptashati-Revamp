<?php
require_once '../app/config/config.php';

$pageTitle = "Newsletter Signup";
$pageDescription = "Thank you for your interest in subscribing to our newsletter. Stay connected with Durga Saptashati Foundation.";
$pageKeywords = "newsletter, signup, subscription, updates";

include '../app/views/layout/header.php';
?>


<div class="coming-soon-section" data-aos="fade" data-aos-duration="1000">
    <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
        <div class="coming-soon-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h1 class="coming-soon-title">Thank You!</h1>
        <h2 class="coming-soon-subtitle">Newsletter Subscription</h2>
        <p class="coming-soon-text">
            Thank you for your interest in subscribing to our newsletter! We're currently setting up our 
            newsletter system to provide you with the best updates about our initiatives, events, and 
            impact stories. You'll be among the first to know when it's ready.
        </p>
        <a href="<?php echo url('index.php'); ?>" class="coming-soon-btn">
            <i class="fas fa-home"></i> Back to Home
        </a>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>