<?php
require_once '../app/config/config.php';
$pageTitle = "Corporate Partnership";
$pageDescription = "Collaborate for impact with Durga Saptashati Foundation through corporate partnerships and CSR initiatives.";
$pageKeywords = "corporate partnership, collaborate for impact, CSR initiatives, business partnership, corporate social responsibility, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Corporate Partnership</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('corporate-partnership.php') ?>">Corporate Partnership</a>
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
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h1 class="coming-soon-title">Corporate Partnership</h1>
                    <h2 class="coming-soon-subtitle">Collaborate for Impact Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing corporate partnership programs to collaborate for impact through CSR initiatives, 
                        employee engagement programs, skills-based volunteering, joint community projects, and strategic 
                        partnerships creating sustainable social change together.
                    </p>
                    <a href="<?php echo url('volunteer.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Get Involved
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>