<?php
require_once '../app/config/config.php';
$pageTitle = "Disaster Relief";
$pageDescription = "Emergency assistance and rehabilitation programs through Durga Saptashati Foundation's disaster relief initiatives.";
$pageKeywords = "disaster relief, emergency assistance, rehabilitation, disaster management, humanitarian aid, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Disaster Relief</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('disaster-relief.php') ?>">Disaster Relief</a>
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
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h1 class="coming-soon-title">Disaster Relief</h1>
                    <h2 class="coming-soon-subtitle">Emergency Assistance & Rehabilitation Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing disaster relief programs providing emergency assistance, rescue operations, 
                        temporary shelters, food distribution, medical aid, and long-term rehabilitation support for 
                        communities affected by natural and man-made disasters.
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