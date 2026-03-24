<?php
require_once '../app/config/config.php';
$pageTitle = "Press Releases";
$pageDescription = "Official statements and news from Durga Saptashati Foundation for media and public information.";
$pageKeywords = "press releases, official statements, media news, foundation announcements, public information, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Press Releases</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('press-releases.php') ?>">Press Releases</a>
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
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h1 class="coming-soon-title">Press Releases</h1>
                    <h2 class="coming-soon-subtitle">Official Statements & News Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating a press releases section for official statements and news including major 
                        program launches, partnership announcements, achievement milestones, policy updates, and 
                        important organizational developments for media outlets and public information.
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