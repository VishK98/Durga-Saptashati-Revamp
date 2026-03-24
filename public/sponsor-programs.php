<?php
require_once '../app/config/config.php';
$pageTitle = "Sponsor Programs";
$pageDescription = "Fund specific initiatives and sponsor programs with Durga Saptashati Foundation's program sponsorship opportunities.";
$pageKeywords = "sponsor programs, fund specific initiatives, program sponsorship, sponsor initiatives, funding support, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Sponsor Programs</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('sponsor-programs.php') ?>">Sponsor Programs</a>
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
                    <h1 class="coming-soon-title">Sponsor Programs</h1>
                    <h2 class="coming-soon-subtitle">Fund Specific Initiatives Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating program sponsorship opportunities where you can fund specific initiatives 
                        including education programs, healthcare camps, women empowerment projects, disaster relief 
                        operations, and community development programs with dedicated sponsorship packages.
                    </p>
                    <a href="<?php echo url('volunteer.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Get Involved
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>