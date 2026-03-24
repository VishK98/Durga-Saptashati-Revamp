<?php
require_once '../app/config/config.php';
$pageTitle = "Clean Water Project";
$pageDescription = "Providing clean water access to villages through Durga Saptashati Foundation's water sustainability programs.";
$pageKeywords = "clean water project, water access, village water supply, water sustainability, clean water initiatives, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Clean Water Project</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('clean-water-project.php') ?>">Clean Water Project</a>
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
                        <i class="fas fa-tint"></i>
                    </div>
                    <h1 class="coming-soon-title">Clean Water Project</h1>
                    <h2 class="coming-soon-subtitle">Providing Clean Water to Villages Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching clean water projects providing safe drinking water to villages through bore wells, 
                        water purification systems, sanitation facilities, water conservation programs, and sustainable 
                        water management solutions ensuring access to clean water for all.
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