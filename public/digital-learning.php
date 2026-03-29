<?php
require_once '../app/config/config.php';

$pageTitle = "Digital Learning for Children";
$pageDescription = "Basic digital education and computer skills training for children. Learn fundamental computer operations, internet safety, and digital literacy with Durga Saptashati Foundation.";
$pageKeywords = "digital learning, computer education for children, basic computer skills, digital literacy for kids, child education, technology training, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Digital Learning Page -->
<link rel="stylesheet" href="<?= url('assets/css/programs/digital-learning.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Digital Learning</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Programs</a>
                <a href="<?= url('digital-learning.php') ?>">Digital Learning</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="digital-hero">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="hero-content">
                    <span class="hero-badge">
                        <i class="fas fa-laptop"></i>
                        Basic Computer Education
                    </span>
                    <h1 class="hero-title">
                        Digital Learning for
                        <span class="text-primary">Children</span>
                    </h1>
                    <p class="hero-description">
                        We provide basic digital education to help children learn fundamental computer skills,
                        internet safety, and digital literacy that will prepare them for the modern world.
                    </p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number" data-counter="2500">0</div>
                            <div class="stat-label">Children Trained</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-counter="45">0</div>
                            <div class="stat-label">Learning Centers</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-counter="95">0</div>
                            <div class="stat-label">% Success Rate</div>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#programs" class="btn btn-primary">
                            <i class="fas fa-play"></i>
                            View Programs
                        </a>
                        <a href="<?= url('contact.php') ?>" class="btn btn-outline-primary">
                            <i class="fas fa-phone"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=400&fit=crop"
                        alt="Children learning computers" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Teach Section -->
<section class="what-we-teach" id="programs">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Our Curriculum</span>
            <h2 class="section-title">What We Teach Children</h2>
            <p class="section-description">
                Simple and fun computer lessons designed specifically for children to learn digital skills step by step.
            </p>
        </div>

        <div class="row">
            <!-- Basic Computer Skills -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="program-card">
                    <div class="card-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h4>Basic Computer Skills</h4>
                    <p>Learning how to use a computer, mouse, and keyboard. Understanding different parts of a computer
                        and how they work.</p>
                    <ul class="program-list">
                        <li><i class="fas fa-check"></i> Using mouse and keyboard</li>
                        <li><i class="fas fa-check"></i> Understanding computer parts</li>
                        <li><i class="fas fa-check"></i> Basic file management</li>
                        <li><i class="fas fa-check"></i> Opening and closing programs</li>
                    </ul>
                </div>
            </div>

            <!-- Internet Safety -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="program-card">
                    <div class="card-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Internet Safety</h4>
                    <p>Teaching children how to stay safe online, avoid harmful content, and practice good digital
                        citizenship.</p>
                    <ul class="program-list">
                        <li><i class="fas fa-check"></i> Safe internet browsing</li>
                        <li><i class="fas fa-check"></i> Password protection</li>
                        <li><i class="fas fa-check"></i> Avoiding stranger danger online</li>
                        <li><i class="fas fa-check"></i> Recognizing harmful websites</li>
                    </ul>
                </div>
            </div>

            <!-- Basic Software -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="program-card">
                    <div class="card-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>Basic Software Learning</h4>
                    <p>Introduction to simple software programs like Paint, educational games, and basic word processing
                        for children.</p>
                    <ul class="program-list">
                        <li><i class="fas fa-check"></i> MS Paint for creativity</li>
                        <li><i class="fas fa-check"></i> Simple word processing</li>
                        <li><i class="fas fa-check"></i> Educational software</li>
                        <li><i class="fas fa-check"></i> Basic typing skills</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Age Groups Section -->
<section class="age-groups">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">For Different Ages</span>
            <h2 class="section-title">Programs by Age Group</h2>
            <p class="section-description">
                We have specially designed programs for different age groups to ensure age-appropriate learning.
            </p>
        </div>

        <div class="row justify-content-center">
            <!-- Ages 6-8 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="age-group-card">
                    <div class="age-badge">Ages 6-8</div>
                    <h4>Beginners Program</h4>
                    <p>Fun introduction to computers through games and simple activities.</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="detail-label">Duration:</span>
                            <span class="detail-value">2 months</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Classes:</span>
                            <span class="detail-value">2x per week</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Time:</span>
                            <span class="detail-value">1 hour</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ages 9-12 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="age-group-card featured">
                    <div class="age-badge">Ages 9-12</div>
                    <h4>Intermediate Program</h4>
                    <p>Learning basic software, internet safety, and simple creative projects.</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="detail-label">Duration:</span>
                            <span class="detail-value">3 months</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Classes:</span>
                            <span class="detail-value">3x per week</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Time:</span>
                            <span class="detail-value">1.5 hours</span>
                        </div>
                    </div>
                    <div class="popular-badge">Most Popular</div>
                </div>
            </div>

            <!-- Ages 13-16 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="age-group-card">
                    <div class="age-badge">Ages 13-16</div>
                    <h4>Advanced Program</h4>
                    <p>More advanced computer skills, basic coding concepts, and digital citizenship.</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="detail-label">Duration:</span>
                            <span class="detail-value">4 months</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Classes:</span>
                            <span class="detail-value">3x per week</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Time:</span>
                            <span class="detail-value">2 hours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Digital Learning Section -->
<section class="why-digital-learning">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="content-section">
                    <span class="section-subtitle">Why It's Important</span>
                    <h2 class="section-title">Why Children Need Digital Learning</h2>
                    <p class="section-description">
                        In today's world, basic computer skills are essential for children's future success in education
                        and careers.
                    </p>

                    <div class="benefits-list">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="benefit-content">
                                <h5>Better School Performance</h5>
                                <p>Computer skills help children with their school projects and research.</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <div class="benefit-content">
                                <h5>Develops Problem Solving</h5>
                                <p>Learning computers helps children think logically and solve problems.</p>
                            </div>
                        </div>

                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="benefit-content">
                                <h5>Future Ready</h5>
                                <p>Prepares children for a world where digital skills are necessary.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="image-section">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600&h=400&fit=crop"
                        alt="Children learning together" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="success-stories">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Happy Stories</span>
            <h2 class="section-title">Children's Success Stories</h2>
            <p class="section-description">
                See how digital learning has helped children in their studies and daily life.
            </p>
        </div>

        <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="story-card">
                    <div class="story-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=200&fit=crop&crop=face"
                            alt="Rahul" class="img-fluid">
                    </div>
                    <div class="story-content">
                        <h4>Rahul, Age 10</h4>
                        <p class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Delhi, India
                        </p>
                        <p class="story-text">
                            "I can now type my school projects on the computer and use Paint to make drawings.
                            My teacher is very happy with my work!"
                        </p>
                        <div class="story-achievement">
                            <i class="fas fa-star"></i>
                            Improved school grades
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="story-card">
                    <div class="story-image">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b5bb?w=300&h=200&fit=crop&crop=face"
                            alt="Priya" class="img-fluid">
                    </div>
                    <div class="story-content">
                        <h4>Priya, Age 12</h4>
                        <p class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Mumbai, India
                        </p>
                        <p class="story-text">
                            "Learning about internet safety helped me understand how to use the internet safely.
                            Now I can research for my studies without any worry."
                        </p>
                        <div class="story-achievement">
                            <i class="fas fa-shield-alt"></i>
                            Safe internet user
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="story-card">
                    <div class="story-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=300&h=200&fit=crop&crop=face"
                            alt="Amit" class="img-fluid">
                    </div>
                    <div class="story-content">
                        <h4>Amit, Age 14</h4>
                        <p class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Bangalore, India
                        </p>
                        <p class="story-text">
                            "The computer classes helped me become confident with technology.
                            I even help my parents with basic computer work at home now!"
                        </p>
                        <div class="story-achievement">
                            <i class="fas fa-user-graduate"></i>
                            Tech confident
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="cta-pattern-bg">
        <div class="pattern-circle circle-1"></div>
        <div class="pattern-circle circle-2"></div>
        <div class="pattern-circle circle-3"></div>
    </div>
    
    <div class="container-fluid">
        <div class="cta-wrapper" data-aos="zoom-in">
            <div class="cta-header text-center">
                <div class="cta-icon-main">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h2 class="cta-title">
                    <span class="title-line">Enroll Your</span>
                    <span class="title-highlight">Child Today</span>
                </h2>
                <p class="cta-description">
                    Give your child the gift of digital literacy. Our programs are completely free
                    <br>and designed to be fun and educational.
                </p>
            </div>

            <div class="cta-features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Completely Free</h4>
                    <p>No hidden costs</p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Flexible Timings</h4>
                    <p>Morning & Evening</p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Small Class Size</h4>
                    <p>Personal attention</p>
                </div>
                
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-wrapper">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Certificate Given</h4>
                    <p>Course completion</p>
                </div>
            </div>

            <div class="cta-action-area">
                <div class="cta-phone-highlight">
                    <div class="phone-icon-pulse">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="phone-content">
                        <span class="phone-label">Call us now</span>
                        <h3 class="phone-number">+91 9289088161</h3>
                    </div>
                </div>
                
                <div class="cta-buttons-group">
                    <a href="<?= url('contact.php') ?>" class="btn-enroll primary">
                        <span class="btn-content">
                            <i class="fas fa-user-plus"></i>
                            <span>Start Enrollment</span>
                        </span>
                        <span class="btn-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </a>
                    
                    <a href="mailto:digital@saptashati.org" class="btn-enroll secondary">
                        <span class="btn-content">
                            <i class="fas fa-envelope"></i>
                            <span>Email Us</span>
                        </span>
                    </a>
                </div>
                
                <div class="cta-footer-text">
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        Available across <strong>45+ centers</strong> in Delhi NCR
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Interactive Features -->
<script>
// Simple counter animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-counter]');
    const observerOptions = {
        threshold: 0.7
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-counter'));
                let current = 0;
                const increment = target / 50;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 30);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>