<?php
require_once '../app/config/config.php';
$pageTitle = "Career Opportunities";
$pageDescription = "Work with purpose and join our team with Durga Saptashati Foundation's career opportunities and job openings.";
$pageKeywords = "career opportunities, job openings, work with purpose, foundation jobs, team positions, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Career Opportunities</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('career-opportunities.php') ?>">Career Opportunities</a>
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
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h1 class="coming-soon-title">Career Opportunities</h1>
                    <h2 class="coming-soon-subtitle">Work With Purpose Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating career opportunities where you can work with purpose in meaningful roles 
                        including program management, field operations, communications, fundraising, administration, 
                        and community outreach positions making a direct impact on social change.
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