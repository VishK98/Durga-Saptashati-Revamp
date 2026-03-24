<?php
require_once '../app/config/config.php';
$pageTitle = "Health Camps Events";
$pageDescription = "Join Durga Saptashati Foundation's free medical checkup camps and health screening programs for community wellness.";
$pageKeywords = "health camps, medical checkups, free health screenings, medical assistance, community health, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Health Camps Events</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('health-camps-events.php') ?>">Health Camps Events</a>
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
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h1 class="coming-soon-title">Health Camps Events</h1>
                    <h2 class="coming-soon-subtitle">Free Medical Care for All - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're organizing comprehensive health camps offering free medical checkups, health screenings, 
                        general physician consultations, basic diagnostic tests, health awareness sessions, and medical 
                        assistance for underserved communities to promote preventive healthcare and wellness.
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