<?php
require_once '../app/config/config.php';

$pageTitle = "Medical Camps & Healthcare Outreach";
$pageDescription = "Comprehensive free medical camps providing essential healthcare services, diagnostics, treatments, and medicines to underserved communities. Join Durga Saptashati Foundation's mission to make healthcare accessible to all.";
$pageKeywords = "medical camps, free healthcare, health checkups, medical outreach, community health, diagnostic services, free treatment, mobile medical units, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Medical Camps Page -->
<link rel="stylesheet" href="<?= url('assets/css/programs/medical-camps.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Medical Camps</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('service.php') ?>">Programs</a>
                <a href="<?= url('medical-camps.php') ?>">Medical Camps</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section with Heartbeat Animation -->
<section class="medical-hero">
    <div class="heartbeat-bg">
        <svg class="heartbeat-line" viewBox="0 0 1400 100">
            <path d="M0,50 L200,50 L220,20 L240,80 L260,10 L280,90 L300,50 L1400,50" stroke="rgba(242, 101, 34, 0.3)"
                stroke-width="2" fill="none" />
        </svg>
    </div>

    <div class="floating-icons">
        <div class="float-icon icon-1"><i class="fas fa-stethoscope"></i></div>
        <div class="float-icon icon-2"><i class="fas fa-pills"></i></div>
        <div class="float-icon icon-3"><i class="fas fa-heartbeat"></i></div>
        <div class="float-icon icon-4"><i class="fas fa-syringe"></i></div>
        <div class="float-icon icon-5"><i class="fas fa-band-aid"></i></div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <div class="hero-badge pulse">
                        <i class="fas fa-heart"></i>
                        <span>Healthcare for All</span>
                    </div>
                    <h1 class="hero-title">
                        Bringing Healthcare to
                        <span class="text-gradient">Your Doorstep</span>
                    </h1>
                    <p class="hero-description">
                        Our comprehensive medical camps provide free healthcare services, from basic checkups
                        to specialized treatments, ensuring quality medical care reaches every corner of society,
                        especially those who need it most.
                    </p>

                    <div class="hero-stats">
                        <div class="stat-box">
                            <div class="stat-icon"><i class="fas fa-user-injured"></i></div>
                            <div class="stat-content">
                                <div class="stat-number" data-counter="50000">0</div>
                                <div class="stat-label">Patients Treated</div>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-icon"><i class="fas fa-hospital"></i></div>
                            <div class="stat-content">
                                <div class="stat-number" data-counter="250">0</div>
                                <div class="stat-label">Camps Organized</div>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="stat-content">
                                <div class="stat-number" data-counter="85">0</div>
                                <div class="stat-label">Villages Covered</div>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-icon"><i class="fas fa-pills"></i></div>
                            <div class="stat-content">
                                <div class="stat-number" data-counter="15000">0</div>
                                <div class="stat-label">Free Medicines Distributed</div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-buttons">
                        <a href="#upcoming" class="btn-medical primary">
                            <i class="fas fa-calendar-check"></i>
                            View Upcoming Camps
                        </a>
                        <a href="#services" class="btn-medical secondary">
                            <i class="fas fa-list-ul"></i>
                            Our Services
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual">
                    <div class="medical-carousel">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&h=400&fit=crop"
                                alt="Medical camp in action" class="carousel-image">
                            <div class="carousel-overlay">
                                <span class="overlay-badge">Free Healthcare</span>
                            </div>
                        </div>
                        <div class="medical-badge-float">
                            <div class="badge-item">
                                <i class="fas fa-check-circle"></i>
                                <span>100% Free</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-clock"></i>
                                <span>Regular Camps</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services We Provide -->
<section class="medical-services" id="services">
    <div class="services-pattern"></div>
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Our Services</span>
            <h2 class="section-title">Comprehensive Healthcare Services</h2>
            <h6 class="section-description">
                From preventive care to specialized treatments, our medical camps offer a complete range
                of healthcare services delivered by experienced medical professionals.
            </h6>
        </div>

        <div class="services-grid">
            <!-- General Health Checkup -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4>General Health Checkup</h4>
                    <p>Complete body examination and vital signs monitoring</p>
                    <div class="service-badge">Most Popular</div>
                </div>
            </div>

            <!-- Diagnostic Services -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h4>Diagnostic Services</h4>
                    <p>Advanced testing and laboratory services on-site</p>
                </div>
            </div>

            <!-- Specialist Consultation -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                    <h4>Specialist Consultation</h4>
                    <p>Expert doctors from various specialties</p>
                </div>
            </div>

            <!-- Medicine Distribution -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h4>Free Medicines</h4>
                    <p>Quality medicines distributed free of cost</p>
                </div>
            </div>

            <!-- Vaccination -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                    <h4>Vaccination Drives</h4>
                    <p>Immunization programs for children and adults</p>
                </div>
            </div>

            <!-- Health Education -->
            <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                <div class="card-front">
                    <div class="service-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4>Health Education</h4>
                    <p>Awareness sessions on preventive healthcare</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Camp Process Timeline -->
<section class="camp-process">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">How It Works</span>
            <h2 class="section-title">Our Medical Camp Process</h2>
            <h6 class="section-description">
                A systematic approach ensuring efficient and quality healthcare delivery to all beneficiaries.
            </h6>
        </div>

        <div class="process-timeline">
            <div class="timeline-line"></div>

            <div class="process-step" data-aos="fade-up" data-aos-delay="100">
                <div class="step-number">01</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4>Registration</h4>
                    <p>Quick and easy registration process with minimal documentation</p>
                    <span class="step-time">5 mins</span>
                </div>
            </div>

            <div class="process-step" data-aos="fade-up" data-aos-delay="200">
                <div class="step-number">02</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-weight"></i>
                    </div>
                    <h4>Vital Signs Check</h4>
                    <p>Height, weight, BP, temperature, and pulse monitoring</p>
                    <span class="step-time">10 mins</span>
                </div>
            </div>

            <div class="process-step" data-aos="fade-up" data-aos-delay="300">
                <div class="step-number">03</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h4>Doctor Consultation</h4>
                    <p>Detailed examination and consultation with qualified doctors</p>
                    <span class="step-time">15-20 mins</span>
                </div>
            </div>

            <div class="process-step" data-aos="fade-up" data-aos-delay="400">
                <div class="step-number">04</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-vial"></i>
                    </div>
                    <h4>Diagnostic Tests</h4>
                    <p>Necessary tests conducted based on doctor's recommendation</p>
                    <span class="step-time">As needed</span>
                </div>
            </div>

            <div class="process-step" data-aos="fade-up" data-aos-delay="500">
                <div class="step-number">05</div>
                <div class="step-content">
                    <div class="step-icon">
                        <i class="fas fa-prescription-bottle-alt"></i>
                    </div>
                    <h4>Medicine Distribution</h4>
                    <p>Free medicines provided as per prescription with proper guidance</p>
                    <span class="step-time">5 mins</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Medical Camp Gallery -->
<section class="camp-gallery" id="gallery">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Gallery</span>
            <h2 class="section-title">Our Medical Camps in Action</h2>
            <p class="section-description">
                Witness the impact of our medical camps through these moments of hope, healing, and community service.
            </p>
        </div>


        <!-- Gallery Grid -->
        <div class="gallery-grid" id="galleryGrid">
            <!-- Image 1 -->
            <div class="gallery-item" data-category="general" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1584515933487-779824d29309?w=800&h=600&fit=crop" 
                     data-title="General Health Camp" 
                     data-description="Comprehensive health checkups and medical consultations provided to over 500 patients in Dwarka, Delhi. Our team of qualified doctors conducted thorough examinations and provided free medicines to those in need.">
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=400&h=300&fit=crop" alt="General Health Camp">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>General Health Camp</h4>
                            <p>Dwarka, Delhi - March 2024</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-users"></i> 500+ Patients</span>
                                <span><i class="fas fa-calendar"></i> 15 Mar 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="gallery-item" data-category="eye" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=800&h=600&fit=crop" 
                     data-title="Eye Care Camp" 
                     data-description="Comprehensive eye examinations and vision screenings conducted for over 300 patients in Rohini, Delhi. Free glasses distributed to those in need and cataract screenings performed by specialist ophthalmologists.">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400&h=300&fit=crop" alt="Eye Care Camp">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Eye Care Camp</h4>
                            <p>Rohini, Delhi - February 2024</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-eye"></i> 300+ Screenings</span>
                                <span><i class="fas fa-glasses"></i> 150 Glasses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="gallery-item" data-category="dental" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1609840114035-3c981960dc28?w=800&h=600&fit=crop" 
                     data-title="Dental Health Camp" 
                     data-description="Free dental checkups and treatments provided to over 200 patients of all ages in Janakpuri, Delhi. Our qualified dentists performed cleanings, fillings, and provided oral health education to the community.">
                    <img src="https://images.unsplash.com/photo-1609840114035-3c981960dc28?w=400&h=300&fit=crop" alt="Dental Camp">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Dental Health Camp</h4>
                            <p>Janakpuri, Delhi - January 2024</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-tooth"></i> 200+ Checkups</span>
                                <span><i class="fas fa-users"></i> All Ages</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image 4 -->
            <div class="gallery-item" data-category="women" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=800&h=600&fit=crop" 
                     data-title="Women's Health Camp" 
                     data-description="Specialized healthcare services for women including gynecological examinations, breast cancer screenings, and prenatal care. Over 250 women received comprehensive health checkups and counseling in Lajpat Nagar, Delhi.">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?w=400&h=300&fit=crop" alt="Women's Health Camp">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Women's Health Camp</h4>
                            <p>Lajpat Nagar, Delhi - December 2023</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-female"></i> 250+ Women</span>
                                <span><i class="fas fa-heart"></i> Health Screening</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image 5 -->
            <div class="gallery-item" data-category="child" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=800&h=600&fit=crop" 
                     data-title="Child Health Camp" 
                     data-description="Pediatric healthcare services including routine checkups, vaccinations, and growth monitoring for children. Over 180 children received comprehensive care and immunizations in Vasant Kunj, Delhi.">
                    <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=400&h=300&fit=crop" alt="Child Care Camp">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Child Health Camp</h4>
                            <p>Vasant Kunj, Delhi - November 2023</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-child"></i> 180+ Children</span>
                                <span><i class="fas fa-syringe"></i> Vaccination</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image 6 -->
            <div class="gallery-item" data-category="general" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-card" onclick="openImageModal(this)" 
                     data-image="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=800&h=600&fit=crop" 
                     data-title="Mobile Medical Unit" 
                     data-description="Our mobile medical unit reached remote villages in Delhi, providing healthcare services to underserved communities. The mobile clinic covered 5 villages, bringing medical care directly to those who need it most.">
                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=300&fit=crop" alt="Mobile Medical Unit">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Mobile Medical Unit</h4>
                            <p>Rural Areas, Delhi - October 2023</p>
                            <div class="camp-stats">
                                <span><i class="fas fa-ambulance"></i> Mobile Unit</span>
                                <span><i class="fas fa-map-marker-alt"></i> 5 Villages</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-5" data-aos="fade-up">
            <button class="btn-medical primary" id="loadMoreBtn">
                <i class="fas fa-plus"></i>
                Load More Images
            </button>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div id="imageModal" class="image-modal">
        <div class="modal-backdrop" onclick="closeImageModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 id="modalTitle">Medical Camp</h3>
                <button class="modal-close" onclick="closeImageModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Previous Button -->
                <button class="modal-nav-btn modal-prev" onclick="previousImage()">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <div class="modal-image-container">
                    <img id="modalImage" src="" alt="">
                </div>
                
                <!-- Next Button -->
                <button class="modal-nav-btn modal-next" onclick="nextImage()">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Impact Stories -->
<section class="impact-section">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge light">Impact</span>
            <h2 class="section-title light">Lives We've Touched</h2>
            <p class="section-description light">
                Real stories of how our medical camps have made a difference in people's lives.
            </p>
        </div>

        <div class="stories-carousel">
            <div class="story-slide active">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="story-image" data-aos="fade-right">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&h=400&fit=crop"
                                alt="Patient story" class="img-fluid">
                            <div class="story-badge">
                                <i class="fas fa-heart"></i>
                                Life Saved
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="story-content" data-aos="fade-left">
                            <h3>Early Detection Saved Her Life</h3>
                            <blockquote>
                                "During a routine checkup at your medical camp, doctors detected early-stage diabetes.
                                The timely diagnosis and free medicines helped me manage my condition. I'm grateful
                                for this life-saving intervention."
                            </blockquote>
                            <div class="story-author">
                                <strong>Kamla Devi</strong>
                                <span>Age 52, Delhi</span>
                            </div>
                            <div class="story-stats">
                                <div class="stat">
                                    <i class="fas fa-calendar"></i>
                                    <span>Diagnosed in 2023</span>
                                </div>
                                <div class="stat">
                                    <i class="fas fa-heartbeat"></i>
                                    <span>Now Healthy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="medical-cta">
    <div class="cta-overlay"></div>
    <div class="container-fluid">
        <div class="cta-content text-center" data-aos="zoom-in">
            <div class="cta-icon">
                <i class="fas fa-hands-helping"></i>
            </div>
            <h2 class="cta-title">Join Us in Making Healthcare Accessible</h2>
            <p class="cta-description">
                Your support can help us organize more medical camps and reach more communities in need.
                Together, we can ensure that quality healthcare is not a privilege but a right for all.
            </p>

            <div class="cta-buttons">
                <a href="<?= url('volunteer.php') ?>" class="btn-cta primary">
                    <i class="fas fa-hand-holding-heart"></i>
                    Volunteer With Us
                </a>
                <a href="<?= url('donate.php') ?>" class="btn-cta secondary">
                    <i class="fas fa-donate"></i>
                    Support Our Camps
                </a>
            </div>

            <div class="cta-contact">
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+91 9289088161</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>medical@saptashati.org</span>
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
                }, 25);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));

    // Animate heartbeat line
    animateHeartbeat();
});

// Heartbeat Animation
function animateHeartbeat() {
    const heartbeatLine = document.querySelector('.heartbeat-line path');
    if (heartbeatLine) {
        setInterval(() => {
            heartbeatLine.style.animation = 'none';
            setTimeout(() => {
                heartbeatLine.style.animation = 'heartbeatPulse 2s ease-in-out';
            }, 10);
        }, 3000);
    }
}

// Medical Camp Gallery Modal with Navigation
let currentImageIndex = 0;
let galleryImages = [];

// Initialize gallery images array
document.addEventListener('DOMContentLoaded', function() {
    const galleryCards = document.querySelectorAll('.gallery-card[onclick]');
    galleryImages = Array.from(galleryCards).map(card => ({
        src: card.getAttribute('data-image'),
        title: card.getAttribute('data-title'),
        element: card
    }));
});

function openImageModal(element) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    // Find current image index
    currentImageIndex = galleryImages.findIndex(img => img.element === element);
    
    // Set modal content
    const currentImage = galleryImages[currentImageIndex];
    modalImage.src = currentImage.src;
    modalImage.alt = currentImage.title;
    modalTitle.textContent = currentImage.title;
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Update navigation button states
    updateNavigationButtons();
}

function nextImage() {
    if (currentImageIndex < galleryImages.length - 1) {
        currentImageIndex++;
        updateModalImage();
    }
}

function previousImage() {
    if (currentImageIndex > 0) {
        currentImageIndex--;
        updateModalImage();
    }
}

function updateModalImage() {
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const currentImage = galleryImages[currentImageIndex];
    
    modalImage.src = currentImage.src;
    modalImage.alt = currentImage.title;
    modalTitle.textContent = currentImage.title;
    
    updateNavigationButtons();
}

function updateNavigationButtons() {
    const prevBtn = document.querySelector('.modal-prev');
    const nextBtn = document.querySelector('.modal-next');
    
    // Hide/show buttons based on current position
    if (currentImageIndex === 0) {
        prevBtn.style.opacity = '0.5';
        prevBtn.style.cursor = 'not-allowed';
    } else {
        prevBtn.style.opacity = '1';
        prevBtn.style.cursor = 'pointer';
    }
    
    if (currentImageIndex === galleryImages.length - 1) {
        nextBtn.style.opacity = '0.5';
        nextBtn.style.cursor = 'not-allowed';
    } else {
        nextBtn.style.opacity = '1';
        nextBtn.style.cursor = 'pointer';
    }
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key and add arrow key navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('imageModal');
    if (modal.classList.contains('active')) {
        if (e.key === 'Escape') {
            closeImageModal();
        } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            previousImage();
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            nextImage();
        }
    }
});

// Load More Button Functionality
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // Simulate loading more images (you can replace with actual functionality)
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-check"></i> All Images Loaded';
                this.disabled = true;
            }, 2000);
        });
    }
});

// Smooth Scroll
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