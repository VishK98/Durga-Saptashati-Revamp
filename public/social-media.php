<?php
require_once '../app/config/config.php';
$pageTitle = "Social Media";
$pageDescription = "Follow Durga Saptashati Foundation on social platforms for updates, community engagement, and social media news about our programs and activities.";
$pageKeywords = "social media, social platforms, community engagement, social media updates, foundation social media, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Social Media</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('social-media.php') ?>">Social Media</a>
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
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h1 class="coming-soon-title">Social Media</h1>
                    <h2 class="coming-soon-subtitle">Follow Us On Social Platforms Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're building a social media hub where you can follow us on various social platforms, view 
                        social media updates, engage with our community, access social feeds, share our content, 
                        and stay connected through Facebook, Twitter, Instagram, LinkedIn, and YouTube channels.
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