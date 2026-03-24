<?php
require_once '../app/config/config.php';

$pageTitle = "Our Services & Programs";
$pageDescription = "Explore the various services and programs offered by Durga Saptashati Foundation including education, healthcare, women empowerment, community development, and spiritual guidance.";
$pageKeywords = "services, programs, education, healthcare, women empowerment, community development, spiritual guidance, Durga Saptashati";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Services</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Services</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="service">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>What We Do?</p>
            <h2>We believe we can transform more lives through divine service</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-diet"></i>
                    </div>
                    <div class="service-text">
                        <h3>Nutritious Food Programs</h3>
                        <p>Providing healthy meals, nutrition education, and food security programs for underprivileged
                            families and children through our community kitchens</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-water"></i>
                    </div>
                    <div class="service-text">
                        <h3>Clean Water Access</h3>
                        <p>Ensuring access to safe drinking water through well construction, water purification systems,
                            and sanitation infrastructure development</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-healthcare"></i>
                    </div>
                    <div class="service-text">
                        <h3>Healthcare Services</h3>
                        <p>Comprehensive medical assistance including free health camps, preventive care, medicines, and
                            health awareness programs for communities</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-education"></i>
                    </div>
                    <div class="service-text">
                        <h3>Educational Support</h3>
                        <p>Supporting quality education through scholarships, learning centers, educational materials,
                            and skill development programs for all ages</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-home"></i>
                    </div>
                    <div class="service-text">
                        <h3>Shelter & Housing</h3>
                        <p>Providing safe shelter, temporary housing assistance, and rehabilitation support for homeless
                            individuals and disaster-affected families</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-social-care"></i>
                    </div>
                    <div class="service-text">
                        <h3>Community Development</h3>
                        <p>Holistic community development through counseling, women empowerment, spiritual guidance, and
                            sustainable livelihood programs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<?php include '../app/views/layout/footer.php'; ?>