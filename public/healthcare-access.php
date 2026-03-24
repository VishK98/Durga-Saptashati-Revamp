<?php
require_once '../app/config/config.php';
$pageTitle = "Healthcare Access";
$pageDescription = "Medical facilities and healthcare access for all through Durga Saptashati Foundation's healthcare accessibility programs.";
$pageKeywords = "healthcare access, medical facilities, healthcare for all, medical accessibility, health services, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Healthcare Access</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('healthcare-access.php') ?>">Healthcare Access</a>
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
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h1 class="coming-soon-title">Healthcare Access</h1>
                    <h2 class="coming-soon-subtitle">Medical Facilities for All Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing healthcare access programs ensuring medical facilities for all through mobile clinics, 
                        health centers, telemedicine services, affordable medical care, health insurance support, and 
                        preventive healthcare initiatives reaching underserved communities.
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