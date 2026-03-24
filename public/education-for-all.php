<?php
require_once '../app/config/config.php';
$pageTitle = "Education for All";
$pageDescription = "Quality education opportunities for underprivileged children through Durga Saptashati Foundation's education for all programs.";
$pageKeywords = "education for all, quality education, underprivileged children, educational opportunities, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Education for All</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('education-for-all.php') ?>">Education for All</a>
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
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1 class="coming-soon-title">Education for All</h1>
                    <h2 class="coming-soon-subtitle">Quality Education for 500+ Children Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching education for all programs to help 500+ children get quality education through 
                        scholarships, school supplies, educational infrastructure development, and academic support systems 
                        ensuring every child has access to learning opportunities.
                    </p>
                    <a href="<?php echo url('causes.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Causes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>