<?php
require_once '../app/config/config.php';

$pageTitle = "Our Causes";
$pageDescription = "Discover the various causes and charitable initiatives supported by Durga Saptashati Foundation. Learn about our education, healthcare, women empowerment, and community development programs.";
$pageKeywords = "charity causes, education programs, healthcare initiatives, women empowerment, community development, Durga Saptashati";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Popular Causes</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
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
            <h2>We believe that we can transform more lives with your support</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-diet"></i>
                    </div>
                    <div class="service-text">
                        <h3>Nutritious Food</h3>
                        <p>Providing healthy meals and nutrition programs for underprivileged families and children
                            through our community kitchens and feeding initiatives</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-water"></i>
                    </div>
                    <div class="service-text">
                        <h3>Clean Water</h3>
                        <p>Ensuring access to safe drinking water through well construction, water purification systems,
                            and sanitation programs in rural areas</p>
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
                        <p>Providing medical assistance, health camps, preventive care, and health awareness programs
                            for communities in need</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-education"></i>
                    </div>
                    <div class="service-text">
                        <h3>Quality Education</h3>
                        <p>Supporting education through scholarships, learning centers, educational materials, and skill
                            development programs for children and adults</p>
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
                        <p>Providing safe shelter and temporary housing assistance for homeless individuals and families
                            affected by disasters or hardships</p>
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
                        <p>Offering counseling, emotional support, women empowerment programs, and holistic community
                            development initiatives</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Causes Start -->
<div class="causes">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Popular Causes</p>
            <h2>Support our divine mission to serve humanity</h2>
        </div>
        <div class="owl-carousel causes-carousel">
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?= asset('img/causes-1.jpg') ?>" alt="Education for Underprivileged Children">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>85%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹85,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Education for Underprivileged Children</h3>
                    <p>Supporting the education of children from disadvantaged backgrounds through scholarships, books,
                        and learning materials to build a brighter future</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?= url('causes.php') ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?= url('donate.php') ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?= asset('img/causes-2.jpg') ?>" alt="Healthcare for Rural Communities">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>70%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹70,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Healthcare for Rural Communities</h3>
                    <p>Providing medical assistance, free health checkups, medicines, and health awareness programs in
                        remote villages and underserved areas</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?= url('causes.php') ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?= url('donate.php') ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?= asset('img/causes-3.jpg') ?>" alt="Food Security Program">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>60%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹60,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Food Security & Nutrition</h3>
                    <p>Ensuring nutritious meals for hungry families and children through our community kitchen
                        initiatives and food distribution programs</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?= url('causes.php') ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?= url('donate.php') ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?= asset('img/causes-4.jpg') ?>" alt="Clean Water Initiative">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>90%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹90,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Clean Water Initiative</h3>
                    <p>Providing access to clean and safe drinking water through well construction, water purification
                        systems, and sanitation facilities</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?= url('causes.php') ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?= url('donate.php') ?>">Donate Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Causes End -->

<?php include '../app/views/layout/footer.php'; ?>