<?php
require_once '../app/config/config.php';
$pageTitle = "Media Coverage";
$pageDescription = "Featured news outlets and media coverage of Durga Saptashati Foundation's work and impact.";
$pageKeywords = "media coverage, news outlets, foundation featured, media mentions, press coverage, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Media Coverage</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('media-coverage.php') ?>">Media Coverage</a>
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
                        <i class="fas fa-tv"></i>
                    </div>
                    <h1 class="coming-soon-title">Media Coverage</h1>
                    <h2 class="coming-soon-subtitle">Featured in News Outlets Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're compiling media coverage showcasing our foundation featured in news outlets including 
                        newspaper articles, television interviews, radio mentions, online publications, and digital 
                        media coverage highlighting our work and community impact.
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