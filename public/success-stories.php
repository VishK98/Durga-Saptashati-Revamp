<?php
require_once '../app/config/config.php';
$pageTitle = "Success Stories";
$pageDescription = "Inspiring success stories of lives changed through Durga Saptashati Foundation's programs and initiatives.";
$pageKeywords = "success stories, lives changed, inspiring stories, program impact, beneficiary stories, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Success Stories</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('success-stories.php') ?>">Success Stories</a>
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
                        <i class="fas fa-star"></i>
                    </div>
                    <h1 class="coming-soon-title">Success Stories</h1>
                    <h2 class="coming-soon-subtitle">Lives We've Changed Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're sharing inspiring success stories of lives transformed through our programs including 
                        educational achievements, healthcare recoveries, women empowerment journeys, skill development 
                        successes, and community transformation stories showcasing real impact and hope.
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