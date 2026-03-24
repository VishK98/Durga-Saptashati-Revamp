<?php
require_once '../app/config/config.php';
$pageTitle = "Education Workshops";
$pageDescription = "Enhance your skills with Durga Saptashati Foundation's educational seminars, career guidance, and professional training programs.";
$pageKeywords = "education workshops, skills training, career guidance, educational seminars, professional development, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Education Workshops</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('education-workshops.php') ?>">Education Workshops</a>
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
                        <i class="fas fa-book"></i>
                    </div>
                    <h1 class="coming-soon-title">Education Workshops</h1>
                    <h2 class="coming-soon-subtitle">Skills and Career Guidance - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're organizing comprehensive educational seminars, skills development workshops, career 
                        guidance sessions, professional training programs, digital literacy classes, and mentorship 
                        opportunities to empower individuals with knowledge and practical skills for better futures.
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