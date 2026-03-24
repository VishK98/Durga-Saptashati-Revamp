<?php
require_once '../app/config/config.php';
$pageTitle = "Medical Emergencies";
$pageDescription = "Critical healthcare support and medical emergency assistance through Durga Saptashati Foundation's emergency medical programs.";
$pageKeywords = "medical emergencies, healthcare support, emergency medical care, critical health assistance, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Medical Emergencies</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('medical-emergencies.php') ?>">Medical Emergencies</a>
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
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h1 class="coming-soon-title">Medical Emergencies</h1>
                    <h2 class="coming-soon-subtitle">Critical Healthcare Support Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing medical emergency response programs providing critical healthcare support, 
                        emergency medical assistance, ambulance services, and immediate medical intervention for 
                        life-threatening conditions and urgent medical situations.
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