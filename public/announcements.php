<?php
require_once '../app/config/config.php';
$pageTitle = "Announcements";
$pageDescription = "Important updates and notices from Durga Saptashati Foundation about our programs and initiatives.";
$pageKeywords = "announcements, important updates, notices, foundation news, program updates, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Announcements</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('announcements.php') ?>">Announcements</a>
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
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h1 class="coming-soon-title">Announcements</h1>
                    <h2 class="coming-soon-subtitle">Important Updates & Notices Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing an announcements section for important updates and notices about our programs, 
                        initiatives, policy changes, upcoming events, program launches, and significant organizational 
                        developments to keep our community informed and engaged.
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