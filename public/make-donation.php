<?php
require_once '../app/config/config.php';
$pageTitle = "Make a Donation";
$pageDescription = "Every contribution matters - make a donation to support Durga Saptashati Foundation's community programs.";
$pageKeywords = "make donation, donate online, contribute, support foundation, financial contribution, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Make a Donation</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('make-donation.php') ?>">Make a Donation</a>
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
                        <i class="fas fa-donate"></i>
                    </div>
                    <h1 class="coming-soon-title">Make a Donation</h1>
                    <h2 class="coming-soon-subtitle">Every Contribution Matters Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're setting up secure donation systems where every contribution matters through various 
                        giving options including one-time donations, monthly giving, program-specific funding, 
                        and memorial donations supporting our community programs and initiatives.
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