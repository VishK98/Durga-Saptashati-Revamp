<?php
require_once '../app/config/config.php';
$pageTitle = "Membership Program";
$pageDescription = "Be part of our family with Durga Saptashati Foundation's membership program and exclusive benefits.";
$pageKeywords = "membership program, foundation family, member benefits, exclusive membership, community members, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Membership Program</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('membership-program.php') ?>">Membership Program</a>
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
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h1 class="coming-soon-title">Membership Program</h1>
                    <h2 class="coming-soon-subtitle">Be Part of Our Family Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching a membership program where you can be part of our foundation family with 
                        exclusive benefits including priority event access, member newsletters, special recognition, 
                        networking opportunities, and direct involvement in decision-making processes.
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