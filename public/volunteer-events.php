<?php
require_once '../app/config/config.php';
$pageTitle = "Volunteer Events";
$pageDescription = "Join us in making events successful with Durga Saptashati Foundation's volunteer opportunities and community service programs.";
$pageKeywords = "volunteer events, community service, volunteer opportunities, event support, helping hands, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Volunteer Events</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('volunteer-events.php') ?>">Volunteer Events</a>
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
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h1 class="coming-soon-title">Volunteer Events</h1>
                    <h2 class="coming-soon-subtitle">Join Us in Making Events Successful - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating volunteer opportunities for community members to participate in event organization, 
                        crowd management, registration assistance, logistical support, and various community service 
                        activities that make our programs successful and impactful for everyone involved.
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