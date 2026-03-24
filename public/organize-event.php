<?php
require_once '../app/config/config.php';
$pageTitle = "Organize Event";
$pageDescription = "Host an event in your area with Durga Saptashati Foundation's event organization support and community event planning.";
$pageKeywords = "organize event, host event, event organization, community events, event planning support, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Organize Event</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('organize-event.php') ?>">Organize Event</a>
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
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h1 class="coming-soon-title">Organize Event</h1>
                    <h2 class="coming-soon-subtitle">Host an Event in Your Area - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing a platform for community members to organize local events with our support, 
                        providing event planning guidance, resource allocation, promotional assistance, volunteer 
                        coordination, and logistical support to make community-driven initiatives successful.
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