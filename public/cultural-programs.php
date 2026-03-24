<?php
require_once '../app/config/config.php';
$pageTitle = "Cultural Programs";
$pageDescription = "Celebrate heritage with Durga Saptashati Foundation's traditional performances, cultural events, and community celebrations.";
$pageKeywords = "cultural programs, traditional performances, cultural events, heritage celebration, community festivals, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Cultural Programs</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('cultural-programs.php') ?>">Cultural Programs</a>
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
                        <i class="fas fa-theater-masks"></i>
                    </div>
                    <h1 class="coming-soon-title">Cultural Programs</h1>
                    <h2 class="coming-soon-subtitle">Celebrating Our Heritage - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're organizing vibrant cultural programs featuring traditional performances, folk dances, 
                        music concerts, art exhibitions, heritage festivals, storytelling sessions, and community 
                        celebrations to preserve and promote our rich cultural traditions and artistic heritage.
                    </p>
                    <a href="<?php echo url('event.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Events
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>