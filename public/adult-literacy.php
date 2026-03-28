<?php
require_once '../app/config/config.php';

$pageTitle = "Adult Literacy & Life Skills Empowerment";
$pageDescription = "Transforming lives through comprehensive adult literacy programs, digital education, and practical life skills training. Join Durga Saptashati Foundation in breaking barriers to learning and empowering communities.";
$pageKeywords = "adult literacy, adult education, life skills training, community empowerment, digital literacy, vocational training, reading writing programs, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Adult Literacy Page -->
<link rel="stylesheet" href="<?= url('assets/css/programs/adult-literacy.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Adult Literacy</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('programs.php') ?>">Programs</a>
                <a href="<?= url('adult-literacy.php') ?>">Adult Literacy</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="literacy-hero">
    <div class="hero-waves">
        <div class="wave wave-1"></div>
        <div class="wave wave-2"></div>
        <div class="wave wave-3"></div>
    </div>

    <div class="literacy-particles">
        <div class="particle particle-1">A</div>
        <div class="particle particle-2">B</div>
        <div class="particle particle-3">क</div>
        <div class="particle particle-4">C</div>
        <div class="particle particle-5">ख</div>
        <div class="particle particle-6">1</div>
        <div class="particle particle-7">२</div>
        <div class="particle particle-8">D</div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="hero-content">
                    <div class="hero-label">
                        <i class="fas fa-lightbulb"></i>
                        <span>Empowerment Through Knowledge</span>
                    </div>
                    <h1 class="hero-title">
                        Unlocking Potential Through
                        <span class="text-gradient">Adult Literacy</span>
                    </h1>
                    <p class="hero-subtitle">
                        Breaking barriers to learning and creating pathways to independence through
                        comprehensive literacy programs, digital skills training, and life empowerment
                        initiatives for adults who deserve a second chance at education.
                    </p>
                    <div class="hero-metrics">
                        <div class="metric-box">
                            <div class="metric-number" data-counter="15000">0</div>
                            <div class="metric-text">Adults Educated</div>
                        </div>
                        <div class="metric-box">
                            <div class="metric-number" data-counter="450">0</div>
                            <div class="metric-text">Learning Centers</div>
                        </div>
                        <div class="metric-box">
                            <div class="metric-number" data-counter="85">0</div>
                            <div class="metric-text">% Success Rate</div>
                        </div>
                    </div>
                    <div class="hero-actions">
                        <a href="#programs" class="btn-hero primary">
                            <span>Explore Programs</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                        <a href="#success-stories" class="btn-hero secondary">
                            <span>Success Stories</span>
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual">
                    <div class="learning-showcase">
                        <div class="showcase-main">
                            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=400&fit=crop"
                                alt="Adult learning in classroom" class="showcase-image">
                            <div class="showcase-overlay">
                                <div class="progress-ring">
                                    <div class="ring-progress" data-progress="78"></div>
                                    <div class="ring-content">
                                        <span class="ring-number">78%</span>
                                        <span class="ring-label">Literacy Rate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="showcase-cards">
                            <div class="skill-card card-reading">
                                <div class="card-icon">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Reading Skills</h4>
                                    <div class="skill-level">
                                        <div class="level-bar" data-level="90"></div>
                                        <span>90%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-card card-writing">
                                <div class="card-icon">
                                    <i class="fas fa-pen"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Writing Skills</h4>
                                    <div class="skill-level">
                                        <div class="level-bar" data-level="85"></div>
                                        <span>85%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-card card-digital">
                                <div class="card-icon">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <div class="card-content">
                                    <h4>Digital Literacy</h4>
                                    <div class="skill-level">
                                        <div class="level-bar" data-level="75"></div>
                                        <span>75%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="literacy-programs" id="programs">
    <div class="container-fluid">
        <div class="section-intro text-center" data-aos="fade-up">
            <span class="section-tag">Our Programs</span>
            <h2 class="section-heading">Comprehensive Learning Pathways</h2>
            <p class="section-description">
                Tailored programs designed to meet diverse learning needs and empower adults
                with essential skills for personal and professional growth.
            </p>
        </div>

        <div class="programs-container">
            <!-- Basic Literacy Program -->
            <div class="program-tile" data-aos="slide-up" data-aos-delay="100">
                <div class="tile-header">
                    <div class="program-number">01</div>
                    <div class="program-category">Foundation</div>
                </div>
                <div class="tile-content">
                    <div class="program-icon">
                        <i class="fas fa-alphabet"></i>
                    </div>
                    <h3>Basic Literacy Program</h3>
                    <p class="program-summary">
                        Essential reading, writing, and numeracy skills for complete beginners
                        through structured, supportive learning environments.
                    </p>
                    <div class="program-features">
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Alphabet & phonics training</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Basic numeracy concepts</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Practical writing exercises</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat-item">
                            <strong>6 months</strong>
                            <span>Duration</span>
                        </div>
                        <div class="stat-item">
                            <strong>3x/week</strong>
                            <span>Classes</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Functional Literacy Program -->
            <div class="program-tile featured" data-aos="slide-up" data-aos-delay="200">
                <div class="tile-header">
                    <div class="program-number">02</div>
                    <div class="program-category">Advanced</div>
                    <div class="featured-badge">Most Popular</div>
                </div>
                <div class="tile-content">
                    <div class="program-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Functional Literacy Program</h3>
                    <p class="program-summary">
                        Practical literacy skills for daily life activities, workplace communication,
                        and community participation with real-world applications.
                    </p>
                    <div class="program-features">
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Document reading & forms</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Financial literacy basics</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Communication skills</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Health & safety awareness</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat-item">
                            <strong>8 months</strong>
                            <span>Duration</span>
                        </div>
                        <div class="stat-item">
                            <strong>4x/week</strong>
                            <span>Classes</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Digital Literacy Program -->
            <div class="program-tile" data-aos="slide-up" data-aos-delay="300">
                <div class="tile-header">
                    <div class="program-number">03</div>
                    <div class="program-category">Technology</div>
                </div>
                <div class="tile-content">
                    <div class="program-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Digital Literacy Program</h3>
                    <p class="program-summary">
                        Modern technology skills including computer basics, internet usage,
                        and digital communication for 21st-century empowerment.
                    </p>
                    <div class="program-features">
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Computer basics & typing</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Internet navigation</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Email & communication</span>
                        </div>
                        <div class="feature-point">
                            <i class="fas fa-check"></i>
                            <span>Mobile apps training</span>
                        </div>
                    </div>
                    <div class="program-stats">
                        <div class="stat-item">
                            <strong>4 months</strong>
                            <span>Duration</span>
                        </div>
                        <div class="stat-item">
                            <strong>3x/week</strong>
                            <span>Classes</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Impact Stories -->
<section class="impact-stories" id="success-stories">
    <div class="stories-background"></div>
    <div class="container-fluid">
        <div class="section-intro text-center" data-aos="fade-up">
            <span class="section-tag light">Real Impact</span>
            <h2 class="section-heading light">Transformational Success Stories</h2>
            <p class="section-description light">
                Witness the power of education through real stories of adults who transformed
                their lives and communities through our literacy programs.
            </p>
        </div>

        <div class="stories-slider" data-aos="fade-up" data-aos-delay="300">
            <div class="story-container active">
                <div class="story-visual">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=400&h=400&fit=crop&crop=face"
                        alt="Sunita Devi" class="story-image">
                    <div class="story-badge">
                        <i class="fas fa-award"></i>
                        <span>Community Leader</span>
                    </div>
                </div>
                <div class="story-content">
                    <div class="story-header">
                        <h3>Sunita Devi</h3>
                        <p class="story-role">Village Entrepreneur</p>
                        <div class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Rajasthan, India</span>
                        </div>
                    </div>
                    <blockquote class="story-quote">
                        "At 45, I thought it was too late to learn. But this program gave me the confidence
                        to read, write, and even start my own tailoring business. Today, I employ 12 women
                        from my village and have become a role model for others."
                    </blockquote>
                    <div class="story-achievements">
                        <div class="achievement-item">
                            <i class="fas fa-business-time"></i>
                            <span>Started own business</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-users"></i>
                            <span>12 employees</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-rupee-sign"></i>
                            <span>₹25k monthly income</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="story-container">
                <div class="story-visual">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&crop=face"
                        alt="Ramesh Kumar" class="story-image">
                    <div class="story-badge">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Digital Expert</span>
                    </div>
                </div>
                <div class="story-content">
                    <div class="story-header">
                        <h3>Ramesh Kumar</h3>
                        <p class="story-role">Community Digital Volunteer</p>
                        <div class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Uttar Pradesh, India</span>
                        </div>
                    </div>
                    <blockquote class="story-quote">
                        "Learning to use computers and the internet opened up a whole new world for me.
                        Now I help other villagers with online government services and have become the
                        go-to person for digital assistance in our community."
                    </blockquote>
                    <div class="story-achievements">
                        <div class="achievement-item">
                            <i class="fas fa-laptop"></i>
                            <span>Digital literacy expert</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-hands-helping"></i>
                            <span>200+ people helped</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-certificate"></i>
                            <span>Government recognition</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="story-container">
                <div class="story-visual">
                    <img src="https://images.unsplash.com/photo-1594736797933-d0c8c2e8e117?w=400&h=400&fit=crop&crop=face"
                        alt="Meera Sharma" class="story-image">
                    <div class="story-badge">
                        <i class="fas fa-heart"></i>
                        <span>Health Advocate</span>
                    </div>
                </div>
                <div class="story-content">
                    <div class="story-header">
                        <h3>Meera Sharma</h3>
                        <p class="story-role">Community Health Worker</p>
                        <div class="story-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Bihar, India</span>
                        </div>
                    </div>
                    <blockquote class="story-quote">
                        "Reading and writing skills helped me understand health manuals and medicine labels.
                        Now I serve as a community health worker, educating families about hygiene,
                        nutrition, and preventive healthcare practices."
                    </blockquote>
                    <div class="story-achievements">
                        <div class="achievement-item">
                            <i class="fas fa-medical-kit"></i>
                            <span>Health worker certification</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-home"></i>
                            <span>500+ families served</span>
                        </div>
                        <div class="achievement-item">
                            <i class="fas fa-shield-check"></i>
                            <span>Disease prevention specialist</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="story-navigation">
                <button class="nav-btn prev-story" onclick="changeStory(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="story-dots">
                    <span class="dot active" onclick="showStory(0)"></span>
                    <span class="dot" onclick="showStory(1)"></span>
                    <span class="dot" onclick="showStory(2)"></span>
                </div>
                <button class="nav-btn next-story" onclick="changeStory(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Learning Approach -->
<section class="learning-approach">
    <div class="container-fluid">
        <div class="section-intro text-center" data-aos="fade-up">
            <span class="section-tag">Our Methodology</span>
            <h2 class="section-heading">Innovative Learning Approach</h2>
            <p class="section-description">
                Evidence-based teaching methods adapted for adult learners, ensuring effective
                and engaging educational experiences that fit into busy schedules.
            </p>
        </div>

        <div class="approach-timeline" data-aos="fade-up" data-aos-delay="300">
            <div class="timeline-track"></div>

            <div class="approach-step" data-aos="zoom-in" data-aos-delay="100">
                <div class="step-marker">
                    <div class="marker-number">1</div>
                </div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h4>Assessment & Planning</h4>
                    <p>Individual skill assessment and personalized learning path creation based on current abilities
                        and goals.</p>
                    <div class="step-features">
                        <span class="feature-tag">Skills Assessment</span>
                        <span class="feature-tag">Pathway</span>
                        <span class="feature-tag">Goal Setting</span>
                    </div>
                </div>
            </div>

            <div class="approach-step" data-aos="zoom-in" data-aos-delay="200">
                <div class="step-marker">
                    <div class="marker-number">2</div>
                </div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>Interactive Learning</h4>
                    <p>Engaging classroom sessions with practical exercises, group activities, and peer-to-peer learning
                        opportunities.</p>
                    <div class="step-features">
                        <span class="feature-tag">Group Sessions</span>
                        <span class="feature-tag">Practical Exercises</span>
                        <span class="feature-tag">Peer Learning</span>
                    </div>
                </div>
            </div>

            <div class="approach-step" data-aos="zoom-in" data-aos-delay="300">
                <div class="step-marker">
                    <div class="marker-number">3</div>
                </div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Flexible Learning</h4>
                    <p>Multiple learning formats including evening classes, weekend sessions, and mobile learning units
                        for accessibility.</p>
                    <div class="step-features">
                        <span class="feature-tag">Evening Classes</span>
                        <span class="feature-tag">Weekend Options</span>
                        <span class="feature-tag">Mobile Units</span>
                    </div>
                </div>
            </div>

            <div class="approach-step" data-aos="zoom-in" data-aos-delay="400">
                <div class="step-marker">
                    <div class="marker-number">4</div>
                </div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Certification & Support</h4>
                    <p>Recognition certificates and ongoing support for continued learning and skill development
                        opportunities.</p>
                    <div class="step-features">
                        <span class="feature-tag">Certificates</span>
                        <span class="feature-tag">Ongoing Support</span>
                        <span class="feature-tag">Skill Development</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="literacy-cta">
    <div class="cta-pattern"></div>
    <div class="container-fluid">
        <div class="cta-wrapper" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content">
                        <h2 class="cta-title">Ready to Begin Your Learning Journey?</h2>
                        <p class="cta-description">
                            Join thousands of adults who have transformed their lives through education.
                            Our programs are designed to fit your schedule and learning pace.
                        </p>
                        <div class="cta-benefits">
                            <div class="benefit-point">
                                <i class="fas fa-clock"></i>
                                <span>Flexible timings</span>
                            </div>
                            <div class="benefit-point">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>Completely free</span>
                            </div>
                            <div class="benefit-point">
                                <i class="fas fa-certificate"></i>
                                <span>Recognized certificates</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cta-actions">
                        <a href="#" class="btn-cta primary" onclick="startEnrollment()">
                            <i class="fas fa-user-plus"></i>
                            <span>Enroll Now</span>
                        </a>
                        <a href="<?= url('contact.php') ?>" class="btn-cta secondary">
                            <i class="fas fa-phone"></i>
                            <span>Get Information</span>
                        </a>
                        <div class="contact-info">
                            <div class="info-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>+91 9289088161</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <span>literacy@saptashati.org</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Detail Modal -->
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
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal secondary" onclick="closeProgramModal()">Close</button>
            <button class="btn-modal primary" onclick="startEnrollment()">Enroll Now</button>
        </div>
    </div>
</div>

<!-- JavaScript for Interactive Features -->
<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    // Initialize counters
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
                const increment = target / 60;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));

    // Initialize progress rings and skill bars
    setTimeout(() => {
        initializeProgressElements();
    }, 500);
});

function initializeProgressElements() {
    // Progress rings
    const rings = document.querySelectorAll('.ring-progress');
    rings.forEach(ring => {
        const progress = ring.getAttribute('data-progress');
        const circumference = 2 * Math.PI * 45; // radius = 45
        const offset = circumference - (progress / 100) * circumference;
        ring.style.strokeDasharray = circumference;
        ring.style.strokeDashoffset = offset;
    });

    // Skill level bars
    const skillBars = document.querySelectorAll('.level-bar');
    skillBars.forEach(bar => {
        const level = bar.getAttribute('data-level');
        bar.style.width = level + '%';
    });
}

// Success Stories Carousel
let currentStory = 0;
const stories = document.querySelectorAll('.story-container');
const dots = document.querySelectorAll('.dot');

function showStory(index) {
    // Hide all stories
    stories.forEach(story => story.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    // Show selected story
    stories[index].classList.add('active');
    dots[index].classList.add('active');

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
function openProgramDetail(programType) {
    const modal = document.getElementById('programModal');
    const title = document.getElementById('modalTitle');
    const content = document.getElementById('modalContent');

    const programData = {
        'basic-literacy': {
            title: 'Basic Literacy Program',
            content: `
                <div class="program-details">
                    <div class="program-overview">
                        <h4>Program Overview</h4>
                        <p>Our foundational program designed for adults with no prior formal education. Learn essential reading, writing, and basic numeracy skills in a supportive, non-judgmental environment.</p>
                    </div>
                    
                    <div class="curriculum-section">
                        <h4>Curriculum Highlights</h4>
                        <div class="curriculum-grid">
                            <div class="curriculum-item">
                                <i class="fas fa-font"></i>
                                <div>
                                    <strong>Letter Recognition</strong>
                                    <span>Alphabet identification and sound association</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-spell-check"></i>
                                <div>
                                    <strong>Word Formation</strong>
                                    <span>Building words from letters and syllables</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-book-reader"></i>
                                <div>
                                    <strong>Reading Comprehension</strong>
                                    <span>Understanding simple texts and stories</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-calculator"></i>
                                <div>
                                    <strong>Basic Mathematics</strong>
                                    <span>Numbers, counting, and simple calculations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="schedule-section">
                        <h4>Class Schedule</h4>
                        <div class="schedule-info">
                            <div class="schedule-item">
                                <strong>Duration:</strong> 6 months
                            </div>
                            <div class="schedule-item">
                                <strong>Frequency:</strong> 3 classes per week
                            </div>
                            <div class="schedule-item">
                                <strong>Timing:</strong> Morning (9-11 AM) or Evening (5-7 PM)
                            </div>
                            <div class="schedule-item">
                                <strong>Class Size:</strong> Maximum 15 students
                            </div>
                        </div>
                    </div>
                </div>
            `
        },
        'functional-literacy': {
            title: 'Functional Literacy Program',
            content: `
                <div class="program-details">
                    <div class="program-overview">
                        <h4>Program Overview</h4>
                        <p>Advanced literacy program focusing on practical life skills and real-world applications. Perfect for adults who want to become independent in handling daily tasks and documentation.</p>
                    </div>
                    
                    <div class="curriculum-section">
                        <h4>Key Learning Areas</h4>
                        <div class="curriculum-grid">
                            <div class="curriculum-item">
                                <i class="fas fa-file-contract"></i>
                                <div>
                                    <strong>Document Reading</strong>
                                    <span>Forms, applications, and official documents</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-rupee-sign"></i>
                                <div>
                                    <strong>Financial Literacy</strong>
                                    <span>Banking, budgeting, and money management</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-comments"></i>
                                <div>
                                    <strong>Communication Skills</strong>
                                    <span>Written and verbal communication improvement</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-medkit"></i>
                                <div>
                                    <strong>Health Awareness</strong>
                                    <span>Reading medicine labels and health information</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="benefits-section">
                        <h4>Program Benefits</h4>
                        <ul class="benefits-list">
                            <li>Gain confidence in handling official paperwork</li>
                            <li>Develop better communication skills</li>
                            <li>Learn basic financial management</li>
                            <li>Improve employment opportunities</li>
                            <li>Become more independent in daily tasks</li>
                        </ul>
                    </div>
                </div>
            `
        },
        'digital-literacy': {
            title: 'Digital Literacy Program',
            content: `
                <div class="program-details">
                    <div class="program-overview">
                        <h4>Program Overview</h4>
                        <p>Modern technology skills program designed to bridge the digital divide. Learn essential computer and internet skills to participate in today's digital world.</p>
                    </div>
                    
                    <div class="curriculum-section">
                        <h4>Technology Skills Covered</h4>
                        <div class="curriculum-grid">
                            <div class="curriculum-item">
                                <i class="fas fa-desktop"></i>
                                <div>
                                    <strong>Computer Basics</strong>
                                    <span>Hardware, software, and basic operations</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-keyboard"></i>
                                <div>
                                    <strong>Typing Skills</strong>
                                    <span>Keyboard proficiency and text input</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-globe"></i>
                                <div>
                                    <strong>Internet Navigation</strong>
                                    <span>Web browsing, search, and online safety</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong>Email Communication</strong>
                                    <span>Creating accounts and sending emails</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="practical-applications">
                        <h4>Practical Applications</h4>
                        <div class="application-tags">
                            <span class="app-tag">Online Banking</span>
                            <span class="app-tag">Government Services</span>
                            <span class="app-tag">Job Applications</span>
                            <span class="app-tag">Social Media</span>
                            <span class="app-tag">Online Shopping</span>
                            <span class="app-tag">Video Calling</span>
                        </div>
                    </div>
                </div>
            `
        },
        'life-skills': {
            title: 'Life Skills & Empowerment Program',
            content: `
                <div class="program-details">
                    <div class="program-overview">
                        <h4>Program Overview</h4>
                        <p>Comprehensive personal development program focusing on leadership, entrepreneurship, and community engagement skills for holistic empowerment.</p>
                    </div>
                    
                    <div class="curriculum-section">
                        <h4>Empowerment Areas</h4>
                        <div class="curriculum-grid">
                            <div class="curriculum-item">
                                <i class="fas fa-user-graduate"></i>
                                <div>
                                    <strong>Personal Development</strong>
                                    <span>Self-confidence, goal setting, and motivation</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-users"></i>
                                <div>
                                    <strong>Leadership Training</strong>
                                    <span>Team building and community leadership</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-lightbulb"></i>
                                <div>
                                    <strong>Entrepreneurship</strong>
                                    <span>Business basics and income generation</span>
                                </div>
                            </div>
                            <div class="curriculum-item">
                                <i class="fas fa-handshake"></i>
                                <div>
                                    <strong>Community Engagement</strong>
                                    <span>Social participation and civic responsibility</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="outcomes-section">
                        <h4>Expected Outcomes</h4>
                        <div class="outcomes-list">
                            <div class="outcome-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Increased self-confidence and self-esteem</span>
                            </div>
                            <div class="outcome-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Enhanced leadership and communication skills</span>
                            </div>
                            <div class="outcome-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Basic entrepreneurial knowledge</span>
                            </div>
                            <div class="outcome-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Active community participation</span>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    };

    const program = programData[programType];
    if (program) {
        title.textContent = program.title;
        content.innerHTML = program.content;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeProgramModal() {
    const modal = document.getElementById('programModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

function startEnrollment() {
    alert('Enrollment system will be available soon! Please contact us at +91 9289088161 for immediate assistance.');
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeProgramModal();
    }
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