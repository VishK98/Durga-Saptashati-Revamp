<?php
require_once '../app/config/config.php';

$pageTitle = "Women's Rights";
$pageDescription = "Legal aid and awareness programs for women's rights through Durga Saptashati Foundation's empowerment initiatives.";
$pageKeywords = "women's rights, legal aid, awareness programs, women empowerment, gender equality, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Women's Rights</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('womens-rights.php') ?>">Women's Rights</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Women's Rights Section Start -->
<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-venus"></i>
                    </div>
                    <h1 class="coming-soon-title">Women's Rights</h1>
                    <h2 class="coming-soon-subtitle">Legal Aid & Awareness Programs Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're establishing women's rights programs offering legal aid, awareness campaigns, 
                        protection services, and advocacy for gender equality. Empowering women through 
                        education about their rights and providing support systems.
                    </p>
                    <a href="<?php echo url('service.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Women's Rights Section End -->

<?php include '../app/views/layout/footer.php'; ?>