<?php
require_once '../app/config/config.php';
$pageTitle = "Environmental Protection";
$pageDescription = "Sustainable future initiatives and environmental conservation through Durga Saptashati Foundation's environmental protection programs.";
$pageKeywords = "environmental protection, sustainable future, environmental conservation, eco-friendly initiatives, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Environmental Protection</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('environmental-protection.php') ?>">Environmental Protection</a>
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
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h1 class="coming-soon-title">Environmental Protection</h1>
                    <h2 class="coming-soon-subtitle">Sustainable Future Initiatives Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're launching environmental protection programs for sustainable future initiatives including 
                        tree plantation drives, pollution control measures, renewable energy projects, waste management 
                        systems, and climate change awareness campaigns protecting our planet for future generations.
                    </p>
                    <a href="<?php echo url('causes.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Causes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>