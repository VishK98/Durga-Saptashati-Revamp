<?php
require_once '../app/config/config.php';
$pageTitle = "Urgent Causes";
$pageDescription = "Emergency relief and urgent humanitarian assistance through Durga Saptashati Foundation's critical support programs.";
$pageKeywords = "urgent causes, emergency relief, humanitarian assistance, critical support, immediate help, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Urgent Causes</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('urgent-causes.php') ?>">Urgent Causes</a>
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
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h1 class="coming-soon-title">Urgent Causes</h1>
                    <h2 class="coming-soon-subtitle">Emergency Relief Programs Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing urgent cause programs for immediate humanitarian assistance, emergency relief operations, 
                        rapid response initiatives, and critical support systems for communities facing acute crises and 
                        life-threatening situations requiring immediate intervention.
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