<?php
require_once '../app/config/config.php';
$pageTitle = "Newsletter News";
$pageDescription = "Subscribe to our newsletter for monthly updates and news from Durga Saptashati Foundation. Access newsletter archives and subscription updates.";
$pageKeywords = "newsletter news, monthly updates, newsletter archives, subscription updates, foundation newsletter, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Newsletter News</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('newsletter-news.php') ?>">Newsletter News</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <h1 class="coming-soon-title">Newsletter News</h1>
                    <h2 class="coming-soon-subtitle">Monthly Updates In Your Inbox Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing a newsletter section where you can access monthly updates delivered to your inbox, 
                        browse newsletter archives, manage subscription preferences, read featured stories, program highlights, 
                        and stay connected with our foundation's latest developments and achievements.
                    </p>
                    <a href="<?php echo url('blog.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to News
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>