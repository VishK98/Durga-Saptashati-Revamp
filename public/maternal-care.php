<?php
require_once '../app/config/config.php';

$pageTitle = "Maternal Care";
$pageDescription = "Supporting mothers and newborns through Durga Saptashati Foundation's maternal care programs for healthy families.";
$pageKeywords = "maternal care, mothers, newborns, pregnancy support, healthcare, family health, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Maternal Care</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('maternal-care.php') ?>">Maternal Care</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Maternal Care Section Start -->
<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-baby"></i>
                    </div>
                    <h1 class="coming-soon-title">Maternal Care</h1>
                    <h2 class="coming-soon-subtitle">Supporting Mothers & Newborns Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing maternal care programs providing prenatal care, safe delivery support, 
                        postnatal care, and newborn health services. Our initiative includes nutrition support 
                        for expecting mothers and healthcare education for healthy families.
                    </p>
                    <a href="<?php echo url('service.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Maternal Care Section End -->

<?php include '../app/views/layout/footer.php'; ?>