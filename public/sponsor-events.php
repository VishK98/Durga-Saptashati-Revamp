<?php
require_once '../app/config/config.php';
$pageTitle = "Sponsor Events";
$pageDescription = "Support Durga Saptashati Foundation's initiatives financially through event sponsorship and funding support programs.";
$pageKeywords = "sponsor events, event sponsorship, funding support, financial support, corporate partnership, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Sponsor Events</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('sponsor-events.php') ?>">Sponsor Events</a>
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
                    <h1 class="coming-soon-title">Sponsor Events</h1>
                    <h2 class="coming-soon-subtitle">Support Our Initiatives Financially - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing partnerships with individuals and organizations to sponsor our events, 
                        offering various sponsorship tiers, corporate partnership opportunities, funding support 
                        for specific programs, and recognition benefits to help amplify our community impact.
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