<?php
require_once '../app/config/config.php';
$pageTitle = "Become a Volunteer";
$pageDescription = "Join our volunteer network and make a difference with Durga Saptashati Foundation's community programs.";
$pageKeywords = "become volunteer, volunteer network, community service, volunteer opportunities, join volunteers, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Become a Volunteer</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('become-volunteer.php') ?>">Become a Volunteer</a>
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
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h1 class="coming-soon-title">Become a Volunteer</h1>
                    <h2 class="coming-soon-subtitle">Join Our Volunteer Network Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're developing a volunteer program where you can join our volunteer network and contribute 
                        to community service through various opportunities including event support, program assistance, 
                        skill-based volunteering, and direct community engagement making a meaningful difference.
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