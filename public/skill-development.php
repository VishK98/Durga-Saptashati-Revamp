<?php
require_once '../app/config/config.php';
$pageTitle = "Skill Development";
$pageDescription = "Vocational training for employment through Durga Saptashati Foundation's skill development programs.";
$pageKeywords = "skill development, vocational training, employment, job skills, career training, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Skill Development</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('skill-development.php') ?>">Skill Development</a>
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
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h1 class="coming-soon-title">Skill Development</h1>
                    <h2 class="coming-soon-subtitle">Vocational Training for Employment Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching skill development programs offering vocational training, job-ready skills, 
                        entrepreneurship support, and placement assistance. Empowering individuals with practical 
                        skills for sustainable livelihoods and economic independence.
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