<?php
require_once '../app/config/config.php';

$pageTitle = "Our Investors & Partners";
$pageDescription = "Meet our valued investors and partners who believe in our mission to create lasting social impact through sustainable initiatives and community empowerment.";
$pageKeywords = "investors, partners, stakeholders, social impact, funding, collaboration, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Our Investors Page -->
<link rel="stylesheet" href="<?= url('assets/css/about-us/our-investors.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Investors & Partners</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('our-investors.php') ?>">Investors</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Image Section -->
<section class="investor-hero">
    <div class="hero-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title" data-aos="fade-up">Building Tomorrow Together</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Partnering with visionary investors
                        and strategic allies to drive innovation and sustainable growth across industries.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Strategic Partners Section -->
<section class="strategic-partners py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Strategic Alliance</span>
            <h2 class="section-title">Our Principal Partners</h2>
            <p class="section-subtitle">
                Leading organizations that drive our mission forward through strategic collaboration and shared values
            </p>
        </div>

        <div class="row g-4">
            <!-- Partner Card 1 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="partner-card premium">
                    <div class="partner-logo">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&h=100&q=80"
                            alt="Global Impact Ventures">
                    </div>
                    <div class="partner-info">
                        <h3>Global Impact Ventures</h3>
                        <span class="partner-type">Lead Investor</span>
                        <p class="partner-description">
                            A leading impact investment firm focused on scalable solutions for social and environmental
                            challenges across emerging markets.
                        </p>
                        <div class="partner-stats">
                            <div class="stat">
                                <i class="fas fa-chart-line"></i>
                                <span>₹25 Cr Investment</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>Since 2018</span>
                            </div>
                        </div>
                    </div>
                    <div class="partner-badge">Premium Partner</div>
                </div>
            </div>

            <!-- Partner Card 2 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="partner-card premium">
                    <div class="partner-logo">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&h=100&q=80"
                            alt="Social Innovation Fund">
                    </div>
                    <div class="partner-info">
                        <h3>Social Innovation Fund</h3>
                        <span class="partner-type">Strategic Partner</span>
                        <p class="partner-description">
                            Pioneering social innovation through technology and sustainable development initiatives
                            across India and Southeast Asia.
                        </p>
                        <div class="partner-stats">
                            <div class="stat">
                                <i class="fas fa-chart-line"></i>
                                <span>₹20 Cr Investment</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>Since 2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="partner-badge">Premium Partner</div>
                </div>
            </div>

            <!-- Partner Card 3 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="partner-card premium">
                    <div class="partner-logo">
                        <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&h=100&q=80"
                            alt="Future Foundation">
                    </div>
                    <div class="partner-info">
                        <h3>Future Foundation</h3>
                        <span class="partner-type">Impact Investor</span>
                        <p class="partner-description">
                            Committed to building sustainable communities through education, healthcare, and economic
                            empowerment programs.
                        </p>
                        <div class="partner-stats">
                            <div class="stat">
                                <i class="fas fa-chart-line"></i>
                                <span>₹15 Cr Investment</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-calendar"></i>
                                <span>Since 2020</span>
                            </div>
                        </div>
                    </div>
                    <div class="partner-badge">Premium Partner</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Investment Journey Section -->
<section class="investment-journey">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Growth Story</span>
            <h2 class="section-title">Our Investment Journey</h2>
            <p class="section-subtitle">
                Building sustainable impact through strategic funding and partnerships
            </p>
        </div>

        <div class="journey-grid">
            <!-- Journey Card 1 -->
            <div class="journey-card" data-aos="zoom-in" data-aos-delay="100">
                <span class="journey-year">2018</span>
                <div class="journey-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="journey-title">Foundation Year</h3>
                <div class="journey-amount">₹10 Cr</div>
                <p class="journey-description">
                    Angel investors believed in our vision to transform communities through education and empowerment.
                </p>
                <ul class="journey-achievements">
                    <li>Launched flagship programs</li>
                    <li>Established 5 centers</li>
                    <li>Impacted 10,000+ lives</li>
                </ul>
            </div>

            <!-- Journey Card 2 -->
            <div class="journey-card" data-aos="zoom-in" data-aos-delay="200">
                <span class="journey-year">2019</span>
                <div class="journey-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="journey-title">Expansion Phase</h3>
                <div class="journey-amount">₹25 Cr</div>
                <p class="journey-description">
                    Series B funding enabled us to scale operations and reach underserved communities across India.
                </p>
                <ul class="journey-achievements">
                    <li>Expanded to 5 new states</li>
                    <li>Doubled our team size</li>
                    <li>Launched skill programs</li>
                </ul>
            </div>

            <!-- Journey Card 3 -->
            <div class="journey-card" data-aos="zoom-in" data-aos-delay="300">
                <span class="journey-year">2020</span>
                <div class="journey-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="journey-title">Global Partnership</h3>
                <div class="journey-amount">₹30 Cr</div>
                <p class="journey-description">
                    International foundations joined our mission, supporting pandemic relief and recovery programs.
                </p>
                <ul class="journey-achievements">
                    <li>COVID-19 relief efforts</li>
                    <li>Healthcare initiatives</li>
                    <li>Digital education launch</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Investor Categories -->
<section class="investor-categories py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Partnership Ecosystem</span>
            <h2 class="section-title">Our Investor Network</h2>
            <p class="section-subtitle">
                A diverse network of partners contributing to sustainable social impact
            </p>
        </div>

        <div class="row g-5 justify-content-center">
            <!-- Category 1 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Corporate Partners</h3>
                    <div class="category-count">15+</div>
                    <ul class="category-list">
                        <li>Tech Giants</li>
                        <li>Financial Institutions</li>
                        <li>Manufacturing Leaders</li>
                        <li>Retail Chains</li>
                    </ul>
                </div>
            </div>

            <!-- Category 2 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Foundations</h3>
                    <div class="category-count">20+</div>
                    <ul class="category-list">
                        <li>Family Foundations</li>
                        <li>Community Trusts</li>
                        <li>Religious Organizations</li>
                        <li>Educational Endowments</li>
                    </ul>
                </div>
            </div>

            <!-- Category 3 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Individual Donors</h3>
                    <div class="category-count">500+</div>
                    <ul class="category-list">
                        <li>Philanthropists</li>
                        <li>Angel Investors</li>
                        <li>Industry Leaders</li>
                        <li>Community Champions</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Impact Metrics -->
<section class="impact-metrics py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="metrics-content">
                    <span class="section-tag text-white-50">Impact at Scale</span>
                    <h2 class="mb-4">Transforming Lives Through Strategic Investment</h2>
                    <p class="mb-5">
                        Every investment creates a ripple effect of positive change, touching thousands of lives
                        and building sustainable communities for future generations.
                    </p>

                    <div class="metric-grid">
                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="metric-info">
                                <h4>Education</h4>
                                <p>50,000+ students educated</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="metric-info">
                                <h4>Healthcare</h4>
                                <p>100,000+ lives impacted</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="metric-info">
                                <h4>Livelihood</h4>
                                <p>25,000+ jobs created</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="metric-info">
                                <h4>Environment</h4>
                                <p>1M+ trees planted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="metrics-visual">
                    <div class="impact-chart-container">
                        <div class="chart-header">
                            <h3>Impact Distribution</h3>
                            <p>How we transform communities</p>
                        </div>
                        
                        <div class="progress-chart">
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="100">
                                <div class="progress-info">
                                    <span class="progress-label">Education</span>
                                    <span class="progress-value">30%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 30%; background: #f26522;"></div>
                                </div>
                                <small>50,000+ students educated</small>
                            </div>
                            
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="200">
                                <div class="progress-info">
                                    <span class="progress-label">Healthcare</span>
                                    <span class="progress-value">25%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 25%; background: #c94a0f;"></div>
                                </div>
                                <small>100,000+ lives impacted</small>
                            </div>
                            
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="300">
                                <div class="progress-info">
                                    <span class="progress-label">Livelihood</span>
                                    <span class="progress-value">20%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 20%; background: #ff8c42;"></div>
                                </div>
                                <small>25,000+ jobs created</small>
                            </div>
                            
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="400">
                                <div class="progress-info">
                                    <span class="progress-label">Environment</span>
                                    <span class="progress-value">15%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 15%; background: #0d0e14;"></div>
                                </div>
                                <small>1M+ trees planted</small>
                            </div>
                            
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="500">
                                <div class="progress-info">
                                    <span class="progress-label">Women Empowerment</span>
                                    <span class="progress-value">10%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 10%; background: #6c757d;"></div>
                                </div>
                                <small>15,000+ women empowered</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="investor-testimonials py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Voices of Support</span>
            <h2 class="section-title">What Our Partners Say</h2>
            <p class="section-subtitle">
                Hear from our investors about their experience partnering with us
            </p>
        </div>

        <div class="testimonial-carousel owl-carousel owl-theme">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Partnering with Durga Saptashati Foundation has been transformative. Their transparency,
                    impact metrics, and dedication to sustainable change make them an ideal investment partner."
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=60&h=60&q=80"
                        alt="Rajesh Kumar">
                    <div class="author-info">
                        <h4>Rajesh Kumar</h4>
                        <span>CEO, Global Impact Ventures</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "The foundation's innovative approach to social challenges and their ability to scale
                    impact efficiently makes them stand out in the social sector."
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=60&h=60&q=80"
                        alt="Sarah Johnson">
                    <div class="author-info">
                        <h4>Sarah Johnson</h4>
                        <span>Director, Social Innovation Fund</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "We've seen remarkable returns on our social investment. The foundation's work creates
                    lasting change that benefits entire communities."
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=60&h=60&q=80"
                        alt="Michael Chen">
                    <div class="author-info">
                        <h4>Michael Chen</h4>
                        <span>Partner, Future Foundation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="investor-cta py-5">
    <div class="container">
        <div class="cta-wrapper" data-aos="zoom-in">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Become a Partner in Change</h2>
                    <p class="cta-subtitle">
                        Join our mission to create sustainable social impact and transform communities worldwide
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= url('contact.php') ?>" class="btn btn-cta">
                        <span>Partner With Us</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});


// Counter Animation
const counters = document.querySelectorAll('[data-counter]');
const observerOptions = {
    threshold: 0.5
};

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            const target = parseInt(counter.getAttribute('data-counter'));
            let current = 0;
            const increment = target / 100;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 20);

            counterObserver.unobserve(counter);
        }
    });
}, observerOptions);

counters.forEach(counter => counterObserver.observe(counter));

// Animated Progress Bars
const progressBars = document.querySelectorAll('.progress-fill');
const progressObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const progressFill = entry.target;
            const targetWidth = progressFill.style.width;
            
            // Reset width to 0 and animate to target
            progressFill.style.width = '0%';
            setTimeout(() => {
                progressFill.style.width = targetWidth;
            }, 200);
            
            progressObserver.unobserve(progressFill);
        }
    });
}, { threshold: 0.5 });

progressBars.forEach(bar => progressObserver.observe(bar));

// Testimonial Carousel
$('.testimonial-carousel').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1024: {
            items: 3
        }
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>