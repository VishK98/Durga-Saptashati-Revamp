<?php
require_once '../app/config/config.php';
$pageTitle = "Rural Development";
$pageDescription = "Infrastructure and facilities for villages through Durga Saptashati Foundation's rural development programs.";
$pageKeywords = "rural development, infrastructure, village development, community facilities, rural programs, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Rural Development</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('rural-development.php') ?>">Rural Development</a>
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
                        <i class="fas fa-home"></i>
                    </div>
                    <h1 class="coming-soon-title">Rural Development</h1>
                    <h2 class="coming-soon-subtitle">Infrastructure & Facilities for Villages Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're implementing rural development programs focusing on infrastructure development,
                        water supply systems, sanitation facilities, road connectivity, and community centers
                        to improve living conditions in villages and rural areas.
                    </p>
                    <a href="<?php echo url('service.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>