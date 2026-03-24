<?php
require_once '../app/config/config.php';
$pageTitle = "Impact Reports";
$pageDescription = "Access comprehensive impact reports, program data, and statistical updates showcasing Durga Saptashati Foundation's achievements and progress.";
$pageKeywords = "impact reports, quarterly updates, program data, statistical reports, progress reports, foundation impact, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Impact Reports</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">News</a>
                <a href="<?= url('impact-reports.php') ?>">Impact Reports</a>
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
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h1 class="coming-soon-title">Impact Reports</h1>
                    <h2 class="coming-soon-subtitle">Quarterly Updates & Program Impact Data Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating a comprehensive impact reports section featuring quarterly updates, detailed program 
                        impact data, statistical reports, progress metrics, beneficiary statistics, and achievement summaries 
                        to demonstrate our foundation's measurable impact on communities we serve.
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