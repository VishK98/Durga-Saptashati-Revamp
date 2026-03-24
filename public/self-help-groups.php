<?php
require_once '../app/config/config.php';
$pageTitle = "Self Help Groups";
$pageDescription = "Financial independence initiatives through Durga Saptashati Foundation's self help group programs.";
$pageKeywords = "self help groups, financial independence, microfinance, women empowerment, community support, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Self Help Groups</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('self-help-groups.php') ?>">Self Help Groups</a>
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
                        <i class="fas fa-coins"></i>
                    </div>
                    <h1 class="coming-soon-title">Self Help Groups</h1>
                    <h2 class="coming-soon-subtitle">Financial Independence Initiatives Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing self help groups for financial empowerment through microfinance, 
                        savings programs, collective lending, and entrepreneurship support. Building sustainable 
                        financial systems for community development and women's economic independence.
                    </p>
                    <a href="<?php echo url('service.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>