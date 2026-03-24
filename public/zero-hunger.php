<?php
require_once '../app/config/config.php';
$pageTitle = "Zero Hunger";
$pageDescription = "Daily meals and nutrition support for 1000+ families through Durga Saptashati Foundation's zero hunger initiative.";
$pageKeywords = "zero hunger, daily meals, nutrition support, food security, hunger elimination, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Zero Hunger</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('zero-hunger.php') ?>">Zero Hunger</a>
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
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h1 class="coming-soon-title">Zero Hunger</h1>
                    <h2 class="coming-soon-subtitle">Daily Meals for 1000+ Families Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're implementing zero hunger programs providing daily meals for 1000+ families, nutrition support, 
                        food distribution drives, community kitchens, and sustainable food security initiatives to eliminate 
                        hunger and malnutrition in underserved communities.
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