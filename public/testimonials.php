<?php
require_once '../app/config/config.php';
$pageTitle = "Testimonials";
$pageDescription = "Read inspiring testimonials and feedback from our beneficiaries and community members about the impact of Durga Saptashati Foundation's programs.";
$pageKeywords = "testimonials, beneficiary stories, community feedback, impact testimonials, foundation testimonials, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Testimonials</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('testimonials.php') ?>">Testimonials</a>
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
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <h1 class="coming-soon-title">Testimonials</h1>
                    <h2 class="coming-soon-subtitle">What People Say Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're building a testimonials section to share inspiring stories and feedback from our beneficiaries, 
                        community members, volunteers, and partners. Discover real impact testimonials, success stories, 
                        community feedback, and transformational experiences showcasing how our programs have made a difference.
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