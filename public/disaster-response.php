<?php
require_once '../app/config/config.php';
$pageTitle = "Disaster Response";
$pageDescription = "Immediate relief and rehabilitation for disaster-affected families through Durga Saptashati Foundation's disaster response programs.";
$pageKeywords = "disaster response, immediate relief, rehabilitation, disaster-affected families, emergency response, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Disaster Response</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('disaster-response.php') ?>">Disaster Response</a>
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
                        <i class="fas fa-house-damage"></i>
                    </div>
                    <h1 class="coming-soon-title">Disaster Response</h1>
                    <h2 class="coming-soon-subtitle">Immediate Relief for Affected Families Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing disaster response programs providing immediate relief for affected families, 
                        emergency shelter provision, food and water distribution, medical aid, and long-term rehabilitation 
                        support for communities impacted by natural and man-made disasters.
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