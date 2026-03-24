<?php
require_once '../app/config/config.php';

$pageTitle = "Subscribe to Newsletter";
$pageDescription = "Subscribe to Durga Saptashati Foundation's newsletter to stay updated with our latest initiatives, events, and impact stories.";
$pageKeywords = "newsletter, subscribe, updates, Durga Saptashati Foundation, news";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Newsletter</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('subscribe.php') ?>">Newsletter</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<style>
.coming-soon-section {
    padding: 60px 0;
    background: #ffffff;
}

.coming-soon-card {
    background: white;
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #f0f0f0;
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
}

.coming-soon-icon {
    font-size: 60px;
    color: #f26522;
    margin-bottom: 20px;
}

.coming-soon-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.coming-soon-subtitle {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
}

.coming-soon-text {
    font-size: 15px;
    color: #777;
    line-height: 1.5;
    margin-bottom: 25px;
}

.coming-soon-btn {
    display: inline-block;
    padding: 10px 30px;
    background: #f26522;
    color: white;
    text-decoration: none;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s;
    box-shadow: 0 4px 10px rgba(242, 101, 34, 0.3);
}

.coming-soon-btn:hover {
    background: #d94d0f;
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(242, 101, 34, 0.4);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .coming-soon-title {
        font-size: 24px;
    }
    .coming-soon-subtitle {
        font-size: 16px;
    }
    .coming-soon-card {
        padding: 30px 25px;
    }
}
</style>

<!-- Newsletter Section Start -->
<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <h1 class="coming-soon-title">Newsletter</h1>
                    <h2 class="coming-soon-subtitle">Subscription Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're preparing an amazing newsletter experience to keep you updated with our latest initiatives, 
                        impact stories, upcoming events, and inspirational content from the Durga Saptashati Foundation. 
                        Stay tuned for regular updates on our mission to serve humanity.
                    </p>
                    <a href="<?php echo url('index.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Section End -->

<?php include '../app/views/layout/footer.php'; ?>