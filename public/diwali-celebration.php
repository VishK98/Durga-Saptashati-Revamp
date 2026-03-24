<?php
require_once '../app/config/config.php';
$pageTitle = "Diwali Celebration";
$pageDescription = "Festival of lights celebration with Durga Saptashati Foundation's Diwali programs spreading joy and cultural traditions.";
$pageKeywords = "diwali celebration, festival of lights, cultural traditions, diwali events, hindu festival, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Diwali Celebration</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('diwali-celebration.php') ?>">Diwali Celebration</a>
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
                        <i class="fas fa-star"></i>
                    </div>
                    <h1 class="coming-soon-title">Diwali Celebration</h1>
                    <h2 class="coming-soon-subtitle">Festival of Lights Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're organizing Diwali celebrations with the festival of lights including traditional diya lighting, 
                        rangoli competitions, cultural performances, sweets distribution, fireworks displays, and community 
                        gatherings celebrating the victory of light over darkness and good over evil.
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