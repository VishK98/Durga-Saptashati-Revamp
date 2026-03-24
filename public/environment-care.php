<?php
require_once '../app/config/config.php';
$pageTitle = "Environment Care";
$pageDescription = "Tree plantation and conservation through Durga Saptashati Foundation's environmental protection programs.";
$pageKeywords = "environment care, tree plantation, conservation, environmental protection, sustainability, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Environment Care</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('environment-care.php') ?>">Environment Care</a>
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
                        <i class="fas fa-tree"></i>
                    </div>
                    <h1 class="coming-soon-title">Environment Care</h1>
                    <h2 class="coming-soon-subtitle">Tree Plantation & Conservation Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching environmental protection programs including tree plantation drives, 
                        conservation awareness, waste management initiatives, and sustainable development practices 
                        to preserve our environment for future generations.
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