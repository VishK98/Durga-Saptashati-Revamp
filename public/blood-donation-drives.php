<?php
require_once '../app/config/config.php';
$pageTitle = "Blood Donation Drives";
$pageDescription = "Save lives by participating in Durga Saptashati Foundation's blood donation drives and voluntary donation campaigns.";
$pageKeywords = "blood donation, blood drives, save lives, voluntary donation, blood collection, community service, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Blood Donation Drives</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('blood-donation-drives.php') ?>">Blood Donation Drives</a>
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
                    <h1 class="coming-soon-title">Blood Donation Drives</h1>
                    <h2 class="coming-soon-subtitle">Save Lives Through Donation - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're organizing regular blood donation drives to save precious lives by collecting voluntary 
                        blood donations, partnering with certified blood banks, conducting health screenings for donors, 
                        and creating awareness about the importance of blood donation in our communities.
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