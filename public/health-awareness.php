<?php
require_once '../app/config/config.php';

$pageTitle = "Health Awareness";
$pageDescription = "Preventive healthcare education through Durga Saptashati Foundation's health awareness programs for community wellness.";
$pageKeywords = "health awareness, preventive healthcare, education, community wellness, health programs, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Health Awareness</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('health-awareness.php') ?>">Health Awareness</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Health Awareness Section Start -->
<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h1 class="coming-soon-title">Health Awareness</h1>
                    <h2 class="coming-soon-subtitle">Preventive Healthcare Education Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching health awareness campaigns focusing on preventive healthcare education, 
                        hygiene practices, nutrition guidance, vaccination awareness, and disease prevention. 
                        Empowering communities with knowledge for better health outcomes.
                    </p>
                    <a href="<?php echo url('service.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Health Awareness Section End -->

<?php include '../app/views/layout/footer.php'; ?>