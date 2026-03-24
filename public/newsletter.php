<?php
require_once '../app/config/config.php';

$pageTitle = "Newsletter Signup";
$pageDescription = "Thank you for your interest in subscribing to our newsletter. Stay connected with Durga Saptashati Foundation.";
$pageKeywords = "newsletter, signup, subscription, updates";

include '../app/views/layout/header.php';
?>

<style>
.coming-soon-section {
    min-height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 0;
    background: #ffffff;
    position: relative;
}

.coming-soon-card {
    background: white;
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
    text-align: center;
    max-width: 500px;
    width: 90%;
    position: relative;
}

.coming-soon-icon {
    font-size: 60px;
    color: #28a745;
    margin-bottom: 20px;
}

.coming-soon-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.coming-soon-subtitle {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
}

.coming-soon-text {
    font-size: 15px;
    color: #777;
    line-height: 1.5;
    margin-bottom: 25px;
}

.coming-soon-btn {
    display: inline-block;
    padding: 10px 30px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s;
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
}

.coming-soon-btn:hover {
    background: #218838;
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .coming-soon-title {
        font-size: 24px;
    }
    .coming-soon-subtitle {
        font-size: 16px;
    }
    .coming-soon-card {
        padding: 30px 25px;
    }
}
</style>

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