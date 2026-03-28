<?php
require_once '../app/config/config.php';

$pageTitle = "School Support & Educational Excellence";
$pageDescription = "Empowering education through scholarships, infrastructure development, and comprehensive academic support programs. Join Durga Saptashati Foundation in building brighter futures for underprivileged children.";
$pageKeywords = "school support, education scholarships, school infrastructure, academic programs, student aid, educational development, learning resources, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for School Support Page -->
<link rel="stylesheet" href="<?= url('assets/css/programs/school-support.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>School Support</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('programs.php') ?>">Programs</a>
                <a href="<?= url('school-support.php') ?>">School Support</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="education-hero">
    <div class="hero-overlay"></div>
    <div class="floating-elements">
        <div class="float-element float-1"><i class="fas fa-book-open"></i></div>
        <div class="float-element float-2"><i class="fas fa-graduation-cap"></i></div>
        <div class="float-element float-3"><i class="fas fa-school"></i></div>
        <div class="float-element float-4"><i class="fas fa-pencil-alt"></i></div>
        <div class="float-element float-5"><i class="fas fa-chalkboard-teacher"></i></div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-star"></i>
                        <span>Educational Excellence Initiative</span>
                    </div>
                    <h1 class="hero-title">
                        Transforming Lives Through
                        <span class="gradient-text">Quality Education</span>
                    </h1>
                    <p class="hero-description">
                        Breaking barriers to education by providing scholarships, modern infrastructure,
                        learning resources, and comprehensive academic support to deserving students across
                        rural and urban communities.
                    </p>
                    <div class="hero-stats-row">
                        <div class="stat-item">
                            <div class="stat-number" data-counter="5000">0</div>
                            <div class="stat-label">Students Supported</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-counter="150">0</div>
                            <div class="stat-label">Schools Enhanced</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-counter="98">0</div>
                            <div class="stat-label">% Success Rate</div>
                        </div>
                    </div>
                    <div class="hero-actions">
                        <a href="#programs" class="btn-hero primary">
                            <i class="fas fa-rocket"></i>
                            <span>Explore Programs</span>
                        </a>
                        <a href="#impact" class="btn-hero secondary">
                            <i class="fas fa-chart-line"></i>
                            <span>View Impact</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                <div class="hero-visual">
                    <div class="education-cards">
                        <div class="education-card card-1">
                            <div class="card-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <h4>Scholarship Program</h4>
                            <p>Merit-based financial aid for deserving students</p>
                        </div>
                        <div class="education-card card-2">
                            <div class="card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <h4>Infrastructure Development</h4>
                            <p>Modern classrooms and learning facilities</p>
                        </div>
                        <div class="education-card card-3">
                            <div class="card-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <h4>Digital Learning</h4>
                            <p>Technology integration and e-learning resources</p>
                        </div>
                    </div>
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=600&h=400&fit=crop"
                            alt="Students in classroom learning" class="hero-image">
                        <div class="image-badge">
                            <i class="fas fa-award"></i>
                            <span>Excellence in Education</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Overview -->
<section class="programs-overview" id="programs">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Our Educational Programs</span>
            <h2 class="section-title">Comprehensive Support System</h2>
            <h6 class="section-subtitle">
                From financial assistance to infrastructure development, our holistic approach
                ensures every child receives quality education regardless of their background.
            </h6>
        </div>

        <div class="programs-grid">
            <!-- Scholarship Program -->
            <div class="program-card featured" data-aos="zoom-in" data-aos-delay="100">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="program-badge">Most Popular</div>
                </div>
                <div class="program-body">
                    <h3>Merit Scholarship Program</h3>
                    <p class="program-description">
                        Financial support for academically excellent students from economically
                        disadvantaged backgrounds, covering tuition, books, and essential supplies.
                    </p>
                    <div class="program-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Full tuition coverage</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Learning materials provided</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Academic mentoring</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Career guidance</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat-box">
                            <strong>₹50,000</strong>
                            <span>Average Annual Support</span>
                        </div>
                        <div class="stat-box">
                            <strong>2,500+</strong>
                            <span>Current Beneficiaries</span>
                        </div>
                    </div>
                </div>
                <div class="program-footer">
                    <button class="btn-program primary" onclick="openProgramModal('scholarship')">
                        <i class="fas fa-info-circle"></i>
                        Learn More
                    </button>
                    <button class="btn-program secondary" onclick="applyProgram('scholarship')">
                        <i class="fas fa-paper-plane"></i>
                        Apply Now
                    </button>
                </div>
            </div>

            <!-- Infrastructure Development -->
            <div class="program-card" data-aos="zoom-in" data-aos-delay="200">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-hammer"></i>
                    </div>
                </div>
                <div class="program-body">
                    <h3>School Infrastructure Development</h3>
                    <p class="program-description"> Building and renovating school facilities to create conducive
                        learning environments with modern classrooms, libraries, and laboratories, while also ensuring
                        access to safe drinking water, sanitation, and digital learning resources. </p>
                    <div class="program-highlights">
                        <div class="highlight-tag">Classroom Construction</div>
                        <div class="highlight-tag">Library Setup</div>
                        <div class="highlight-tag">Science Labs</div>
                        <div class="highlight-tag">Computer Centers</div>
                    </div>
                    <div class="progress-tracker mt-lg-5">
                        <div class="progress-item">
                            <div class="progress-label">Projects Completed</div>
                            <div class="progress-bar">
                                <div class="progress-fill" data-progress="85"></div>
                            </div>
                            <div class="progress-value">85%</div>
                        </div>
                    </div>
                </div>
                <div class="program-footer">
                    <button class="btn-program primary" onclick="openProgramModal('infrastructure')">
                        <i class="fas fa-eye"></i>
                        View Projects
                    </button>
                </div>
            </div>

            <!-- Learning Resources -->
            <div class="program-card" data-aos="zoom-in" data-aos-delay="300">
                <div class="program-header">
                    <div class="program-icon">
                        <i class="fas fa-book-reader"></i>
                    </div>
                </div>
                <div class="program-body">
                    <h3>Learning Resources & Materials</h3>
                    <p class="program-description">
                        Providing textbooks, digital learning tools, educational software,
                        and interactive materials to enhance the learning experience.
                    </p>
                    <div class="resource-categories">
                        <div class="category-item">
                            <i class="fas fa-book"></i>
                            <div>
                                <strong>Textbooks</strong>
                                <span>Grade-wise curriculum books</span>
                            </div>
                        </div>
                        <div class="category-item">
                            <i class="fas fa-tablet-alt"></i>
                            <div>
                                <strong>Digital Tools</strong>
                                <span>Tablets and e-learning apps</span>
                            </div>
                        </div>
                        <div class="category-item">
                            <i class="fas fa-microscope"></i>
                            <div>
                                <strong>Lab Equipment</strong>
                                <span>Science and computer lab tools</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="program-footer">
                    <button class="btn-program primary" onclick="openProgramModal('resources')">
                        <i class="fas fa-list"></i>
                        Resource List
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Metrics -->
<section class="impact-metrics" id="impact">
    <div class="metrics-background"></div>
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge light">Measuring Our Impact</span>
            <h2 class="section-title light">Education Transformation in Numbers</h2>
            <h6 class="section-subtitle light">
                Real results from our comprehensive educational support programs,
                demonstrating tangible improvements in learning outcomes and opportunities.
            </h6>
        </div>

        <div class="impact-dashboard" data-aos="fade-up" data-aos-delay="300">
            <div class="impact-card" data-aos="flip-left" data-aos-delay="100">
                <div class="impact-icon">
                    <i class="fas fa-users-crown"></i>
                </div>
                <div class="impact-content">
                    <div class="impact-number" data-counter="5247">0</div>
                    <div class="impact-label">Students Empowered</div>
                    <div class="impact-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>+35% this year</span>
                    </div>
                </div>
            </div>

            <div class="impact-card" data-aos="flip-left" data-aos-delay="200">
                <div class="impact-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="impact-content">
                    <div class="impact-number" data-counter="156">0</div>
                    <div class="impact-label">Schools Enhanced</div>
                    <div class="impact-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>+28% expansion</span>
                    </div>
                </div>
            </div>

            <div class="impact-card" data-aos="flip-left" data-aos-delay="300">
                <div class="impact-icon">
                    <i class="fas fa-rupee-sign"></i>
                </div>
                <div class="impact-content">
                    <div class="impact-number" data-counter="2.8">0</div>
                    <div class="impact-label">Crores Invested</div>
                    <div class="impact-growth">
                        <i class="fas fa-arrow-up"></i>
                        <span>in education</span>
                    </div>
                </div>
            </div>

            <div class="impact-card" data-aos="flip-left" data-aos-delay="400">
                <div class="impact-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="impact-content">
                    <div class="impact-number" data-counter="94">0</div>
                    <div class="impact-label">% Success Rate</div>
                    <div class="impact-growth">
                        <i class="fas fa-award"></i>
                        <span>academic achievement</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="achievement-showcase" data-aos="fade-up" data-aos-delay="500">
            <div class="achievement-grid">
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h4>Excellence Awards</h4>
                    <p>Recognized by Ministry of Education for outstanding contribution to rural education</p>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Partnership Programs</h4>
                    <p>Collaborative initiatives with 25+ educational institutions and government bodies</p>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <h4>Community Reach</h4>
                    <p>Active educational support programs across 12 states in India</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Student Success Stories -->
<section class="success-stories">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Inspiring Journeys</span>
            <h2 class="section-title">Student Success Stories</h2>
            <h6 class="section-subtitle">
                Real stories from students whose lives have been transformed through our educational support programs.
                </>
        </div>

        <div class="stories-carousel" data-aos="fade-up" data-aos-delay="300">
            <div class="story-card active">
                <div class="story-header">
                    <div class="student-photo">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face"
                            alt="Priya Sharma">
                    </div>
                    <div class="student-info">
                        <h4>Priya Sharma</h4>
                        <p>Engineering Graduate</p>
                        <div class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Rural Maharashtra</span>
                        </div>
                    </div>
                    <div class="story-quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                </div>
                <div class="story-content">
                    <h6 class="story-text">
                        "Thanks to the scholarship program, I was able to complete my engineering degree
                        from a top university. The mentoring and career guidance helped me secure a position
                        at a leading tech company. Today, I'm not just supporting my family but also
                        contributing to my community's development."
                    </h6>
                </div>
                <div class="story-footer">
                    <div class="story-achievement">
                        <i class="fas fa-star"></i>
                        <span>First in family to graduate</span>
                    </div>
                    <div class="story-achievement">
                        <i class="fas fa-briefcase"></i>
                        <span>Software Engineer at MNC</span>
                    </div>
                </div>
            </div>

            <div class="story-card">
                <div class="story-header">
                    <div class="student-photo">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face"
                            alt="Rahul Kumar">
                    </div>
                    <div class="student-info">
                        <h4>Rahul Kumar</h4>
                        <p>Medical Student</p>
                        <div class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Rural Bihar</span>
                        </div>
                    </div>
                    <div class="story-quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                </div>
                <div class="story-content">
                    <h6 class="story-text">
                        "The comprehensive support from infrastructure development to digital learning tools
                        transformed our village school. Now I'm pursuing MBBS and plan to return to serve
                        my community as a doctor. This program didn't just change my life—it changed my
                        entire village's future."
                    </h6>
                </div>
                <div class="story-footer">
                    <div class="story-achievement">
                        <i class="fas fa-user-md"></i>
                        <span>Future Doctor</span>
                    </div>
                    <div class="story-achievement">
                        <i class="fas fa-heart"></i>
                        <span>Community Health Mission</span>
                    </div>
                </div>
            </div>

            <div class="story-navigation">
                <button class="story-nav prev" onclick="changeStory(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="story-indicators">
                    <div class="indicator active" onclick="showStory(0)"></div>
                    <div class="indicator" onclick="showStory(1)"></div>
                </div>
                <button class="story-nav next" onclick="changeStory(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Application Process -->
<section class="application-process">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Get Started</span>
            <h2 class="section-title">Simple Application Process</h2>
            <p class="section-subtitle">
                Join our educational support programs with our streamlined application process
                designed to be accessible and transparent for all applicants.
            </p>
        </div>

        <div class="process-timeline" data-aos="fade-up" data-aos-delay="300">
            <div class="process-step" data-aos="zoom-in" data-aos-delay="100">
                <div class="step-number">1</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4>Submit Application</h4>
                    <p>Fill out our comprehensive online application form with required documents and academic records.
                    </p>
                    <div class="step-duration">2-3 Days</div>
                </div>
            </div>

            <div class="process-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="process-step" data-aos="zoom-in" data-aos-delay="200">
                <div class="step-number">2</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Review & Verification</h4>
                    <p>Our team reviews applications and verifies documents. Eligible candidates are contacted for
                        interviews.</p>
                    <div class="step-duration">1-2 Weeks</div>
                </div>
            </div>

            <div class="process-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="process-step" data-aos="zoom-in" data-aos-delay="300">
                <div class="step-number">3</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Selection & Onboarding</h4>
                    <p>Successful candidates are notified and onboarded with program details, mentorship, and support
                        systems.</p>
                    <div class="step-duration">3-5 Days</div>
                </div>
            </div>

            <div class="process-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="process-step" data-aos="zoom-in" data-aos-delay="400">
                <div class="step-number">4</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4>Program Launch</h4>
                    <p>Begin your educational journey with full support, resources, and continuous monitoring of
                        progress.</p>
                    <div class="step-duration">Ongoing</div>
                </div>
            </div>
        </div>

        <div class="application-cta" data-aos="fade-up" data-aos-delay="500">
            <div class="cta-content">
                <h3>Ready to Transform Your Educational Journey?</h3>
                <p>Join thousands of students who have already benefited from our comprehensive support programs.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn-cta primary" onclick="startApplication()">
                        <i class="fas fa-paper-plane"></i>
                        <span>Start Application</span>
                    </a>
                    <a href="#" class="btn-cta secondary" onclick="downloadBrochure()">
                        <i class="fas fa-download"></i>
                        <span>Download Brochure</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Modal -->
<div id="programModal" class="program-modal">
    <div class="modal-backdrop" onclick="closeProgramModal()"></div>
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Program Details</h3>
            <button class="modal-close" onclick="closeProgramModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="modalContent">
                <!-- Dynamic content loaded here -->
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal secondary" onclick="closeProgramModal()">Close</button>
            <button class="btn-modal primary" id="modalActionBtn">Apply Now</button>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="education-contact">
    <div class="contact-background"></div>
    <div class="container-fluid">
        <div class="contact-content" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="contact-title">Have Questions About Our Programs?</h2>
                    <p class="contact-description">
                        Our education specialists are here to help you choose the right support program
                        and guide you through the application process.
                    </p>
                    <div class="contact-features">
                        <div class="contact-feature">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support Available</span>
                        </div>
                        <div class="contact-feature">
                            <i class="fas fa-language"></i>
                            <span>Multi-language Assistance</span>
                        </div>
                        <div class="contact-feature">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Phone & Online Consultation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-actions">
                        <a href="<?= url('contact.php') ?>" class="btn-contact primary">
                            <i class="fas fa-phone"></i>
                            <span>Contact Specialist</span>
                        </a>
                        <a href="#" class="btn-contact secondary" onclick="scheduleCallback()">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Schedule Callback</span>
                        </a>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>+91 9289088161</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>education@saptashati.org</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Interactive Features -->
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-counter]');
    const observerOptions = {
        threshold: 0.7
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseFloat(counter.getAttribute('data-counter'));
                let current = 0;
                const increment = target / 60;
                const isDecimal = target % 1 !== 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        if (isDecimal) {
                            counter.textContent = target.toFixed(1);
                        } else {
                            counter.textContent = target.toLocaleString();
                        }
                        clearInterval(timer);
                    } else {
                        if (isDecimal) {
                            counter.textContent = current.toFixed(1);
                        } else {
                            counter.textContent = Math.floor(current).toLocaleString();
                        }
                    }
                }, 16);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));

    // Progress bars animation
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach(bar => {
        const progress = bar.getAttribute('data-progress');
        setTimeout(() => {
            bar.style.width = progress + '%';
        }, 500);
    });
});

// Story Carousel
let currentStory = 0;
const stories = document.querySelectorAll('.story-card');
const indicators = document.querySelectorAll('.indicator');

function showStory(index) {
    stories.forEach((story, i) => {
        story.classList.toggle('active', i === index);
    });
    indicators.forEach((indicator, i) => {
        indicator.classList.toggle('active', i === index);
    });
    currentStory = index;
}

function changeStory(direction) {
    currentStory += direction;
    if (currentStory < 0) currentStory = stories.length - 1;
    if (currentStory >= stories.length) currentStory = 0;
    showStory(currentStory);
}

// Auto-rotate stories
setInterval(() => {
    changeStory(1);
}, 8000);

// Program Modal Functions
function openProgramModal(programType) {
    const modal = document.getElementById('programModal');
    const title = document.getElementById('modalTitle');
    const content = document.getElementById('modalContent');
    const actionBtn = document.getElementById('modalActionBtn');

    const programData = {
        scholarship: {
            title: 'Merit Scholarship Program',
            content: `
                <div class="modal-program-details">
                    <div class="program-overview">
                        <h4>Program Overview</h4>
                        <p>Our flagship scholarship program provides comprehensive financial support to academically excellent students from economically disadvantaged backgrounds.</p>
                    </div>
                    
                    <div class="eligibility-criteria">
                        <h4>Eligibility Criteria</h4>
                        <ul>
                            <li>Minimum 80% marks in previous academic year</li>
                            <li>Family annual income below ₹3 lakhs</li>
                            <li>Age between 14-22 years</li>
                            <li>Regular school attendance (minimum 85%)</li>
                        </ul>
                    </div>
                    
                    <div class="benefits-package">
                        <h4>Benefits Package</h4>
                        <div class="benefit-grid">
                            <div class="benefit-item">
                                <i class="fas fa-rupee-sign"></i>
                                <div>
                                    <strong>Tuition Support</strong>
                                    <span>Up to ₹50,000 annually</span>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-book"></i>
                                <div>
                                    <strong>Learning Materials</strong>
                                    <span>Books, supplies, uniform</span>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-laptop"></i>
                                <div>
                                    <strong>Technology Access</strong>
                                    <span>Laptop/tablet for digital learning</span>
                                </div>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-user-tie"></i>
                                <div>
                                    <strong>Mentorship</strong>
                                    <span>Personal academic guidance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        },
        infrastructure: {
            title: 'School Infrastructure Development',
            content: `
                <div class="modal-program-details">
                    <div class="project-gallery">
                        <h4>Recent Projects</h4>
                        <div class="project-showcase">
                            <div class="project-item">
                                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=200&h=150&fit=crop" alt="New Classroom">
                                <div class="project-info">
                                    <strong>Modern Classrooms</strong>
                                    <span>25 schools upgraded</span>
                                </div>
                            </div>
                            <div class="project-item">
                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=200&h=150&fit=crop" alt="Library">
                                <div class="project-info">
                                    <strong>Digital Libraries</strong>
                                    <span>15 libraries established</span>
                                </div>
                            </div>
                            <div class="project-item">
                                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=200&h=150&fit=crop" alt="Computer Lab">
                                <div class="project-info">
                                    <strong>Computer Labs</strong>
                                    <span>30 labs set up</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="development-areas">
                        <h4>Development Focus Areas</h4>
                        <div class="area-list">
                            <div class="area-item">
                                <i class="fas fa-chalkboard"></i>
                                <span>Smart Classroom Technology</span>
                            </div>
                            <div class="area-item">
                                <i class="fas fa-flask"></i>
                                <span>Science Laboratory Equipment</span>
                            </div>
                            <div class="area-item">
                                <i class="fas fa-wifi"></i>
                                <span>High-Speed Internet Connectivity</span>
                            </div>
                            <div class="area-item">
                                <i class="fas fa-accessible-icon"></i>
                                <span>Accessibility Infrastructure</span>
                            </div>
                        </div>
                    </div>
                </div>
            `
        },
        resources: {
            title: 'Learning Resources & Materials',
            content: `
                <div class="modal-program-details">
                    <div class="resource-catalog">
                        <h4>Available Resources</h4>
                        <div class="catalog-grid">
                            <div class="catalog-category">
                                <div class="category-header">
                                    <i class="fas fa-book"></i>
                                    <h5>Textbooks & Workbooks</h5>
                                </div>
                                <ul>
                                    <li>NCERT curriculum books (Classes 1-12)</li>
                                    <li>Reference books for competitive exams</li>
                                    <li>Workbooks and practice materials</li>
                                    <li>Subject-specific guide books</li>
                                </ul>
                            </div>
                            
                            <div class="catalog-category">
                                <div class="category-header">
                                    <i class="fas fa-desktop"></i>
                                    <h5>Digital Learning Tools</h5>
                                </div>
                                <ul>
                                    <li>Educational software licenses</li>
                                    <li>Online course subscriptions</li>
                                    <li>Interactive learning apps</li>
                                    <li>Virtual laboratory simulations</li>
                                </ul>
                            </div>
                            
                            <div class="catalog-category">
                                <div class="category-header">
                                    <i class="fas fa-tools"></i>
                                    <h5>Equipment & Supplies</h5>
                                </div>
                                <ul>
                                    <li>Scientific calculators</li>
                                    <li>Art and craft supplies</li>
                                    <li>Sports equipment</li>
                                    <li>Stationery and writing materials</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="distribution-info">
                        <h4>Resource Distribution</h4>
                        <p>Resources are distributed based on grade levels, subject requirements, and individual student needs. Our logistics team ensures timely delivery to all partner schools and scholarship recipients.</p>
                    </div>
                </div>
            `
        },
        training: {
            title: 'Teacher Training & Development',
            content: `
                <div class="modal-program-details">
                    <div class="training-modules">
                        <h4>Training Modules</h4>
                        <div class="module-list">
                            <div class="module-item">
                                <div class="module-icon">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <div class="module-content">
                                    <h5>Modern Pedagogy</h5>
                                    <p>Innovative teaching methods and student-centered learning approaches</p>
                                    <div class="module-duration">Duration: 2 weeks</div>
                                </div>
                            </div>
                            
                            <div class="module-item">
                                <div class="module-icon">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <div class="module-content">
                                    <h5>Digital Integration</h5>
                                    <p>Technology tools for enhanced classroom experiences</p>
                                    <div class="module-duration">Duration: 1 week</div>
                                </div>
                            </div>
                            
                            <div class="module-item">
                                <div class="module-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="module-content">
                                    <h5>Student Psychology</h5>
                                    <p>Understanding and supporting student mental health and development</p>
                                    <div class="module-duration">Duration: 1 week</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="certification-info">
                        <h4>Certification Process</h4>
                        <p>Participants receive recognized certificates upon successful completion of training modules. Ongoing support and refresher courses are provided to ensure continuous professional development.</p>
                        
                        <div class="certification-benefits">
                            <div class="benefit">
                                <i class="fas fa-certificate"></i>
                                <span>Professional Certification</span>
                            </div>
                            <div class="benefit">
                                <i class="fas fa-users"></i>
                                <span>Peer Learning Network</span>
                            </div>
                            <div class="benefit">
                                <i class="fas fa-life-ring"></i>
                                <span>Ongoing Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    };

    const program = programData[programType];
    title.textContent = program.title;
    content.innerHTML = program.content;

    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeProgramModal() {
    const modal = document.getElementById('programModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Additional Functions
function applyProgram(programType) {
    alert(
        `Application form for ${programType} program will be available soon. Please contact us for more information.`
    );
}

function startApplication() {
    alert(
        'Application portal will be available soon. Please contact our education specialists for immediate assistance.'
    );
}

function downloadBrochure() {
    alert('Brochure download will be available soon. Please contact us to request program information.');
}

function scheduleCallback() {
    alert('Callback scheduling system will be available soon. Please call us directly at +91 9289088161.');
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeProgramModal();
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>