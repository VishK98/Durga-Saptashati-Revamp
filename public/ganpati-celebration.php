<?php
require_once '../app/config/config.php';
$pageTitle = "Ganpati Festival Celebration - Durga Saptashati Foundation";
$pageKeywords = "Ganpati celebration, Ganesh Chaturthi, Hindu festival, cultural celebration, community gathering, traditional rituals, Ganpati utsav, festival of prosperity";
$pageDescription = "Join Durga Saptashati Foundation in celebrating Ganpati Festival with traditional rituals, cultural programs, community feasts, and spiritual ceremonies honoring Lord Ganesha.";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Ganpati Celebration Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/ganpati-celebration.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Ganpati Festival Celebration</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('ganpati-celebration.php') ?>">Ganpati Celebration</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Divine Hero Section -->
<section class="ganpati-hero-section">
    <div class="divine-background">
        <div class="floating-elements">
            <div class="floating-lotus lotus-1">🪷</div>
            <div class="floating-lotus lotus-2">🪷</div>
            <div class="floating-lotus lotus-3">🪷</div>
            <div class="floating-om om-1">ॐ</div>
            <div class="floating-om om-2">ॐ</div>
            <div class="divine-rays"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="hero-content-ganpati">
                    <div class="festival-badge">
                        <i class="fas fa-star-and-crescent"></i>
                        <span>गणेश चतुर्थी महोत्सव</span>
                    </div>

                    <h1 class="hero-title-ganpati">
                        Ganpati Festival
                        <span class="text-gradient-divine">Celebration</span>
                        2025
                    </h1>

                    <p class="hero-description-ganpati">
                        Join us in celebrating the divine presence of Lord Ganesha, the remover of obstacles
                        and patron of arts and sciences. Experience the spiritual bliss through traditional
                        rituals, devotional music, and community harmony.
                    </p>

                    <div class="festival-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>11 Days Festival</h4>
                                <p>Complete Ganpati Utsav celebration</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Community Participation</h4>
                                <p>Open for all devotees and families</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Spiritual Experience</h4>
                                <p>Traditional rituals and prayers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1200">
                <div class="hero-visual-ganpati">
                    <div class="ganpati-shrine">
                        <div class="spinning-wheel-container">
                            <img src="https://www.peacockride.com/cdn/shop/files/V3Asset3_a6f75805-72da-4035-970d-da2ae91e9907_1024x1024.jpg?v=1724152842"
                                alt="Divine Wheel" class="spinning-wheel-image">
                        </div>

                        <div class="shrine-decorations">
                            <div class="decoration-item deco-1">
                                <i class="fas fa-seedling"></i>
                                <span>Modak</span>
                            </div>
                            <div class="decoration-item deco-2">
                                <i class="fas fa-fire"></i>
                                <span>Aarti</span>
                            </div>
                            <div class="decoration-item deco-3">
                                <i class="fas fa-spa"></i>
                                <span>Flowers</span>
                            </div>
                        </div>

                        <div class="divine-aura"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Festival Schedule Section -->
<section class="festival-schedule-section" id="programs">
    <div class="container-fluid">
        <div class="section-header-ganpati text-center" data-aos="fade-up">
            <span class="section-badge-ganpati">Festival Schedule</span>
            <h2 class="section-title-ganpati">11 Days of Divine Celebration</h2>
            <p class="section-description-ganpati">
                Experience the complete Ganpati Utsav with daily rituals, cultural programs,
                and community activities that bring together devotees in celebration of Lord Ganesha.
            </p>
        </div>

        <div class="schedule-timeline">
            <!-- Day 1 - Ganesh Chaturthi -->
            <div class="timeline-day" data-aos="fade-right" data-aos-delay="100">
                <div class="day-marker">
                    <div class="day-number">1</div>
                    <div class="day-title">Ganesh Chaturthi</div>
                </div>
                <div class="day-content">
                    <h3>Ganpati Sthapana</h3>
                    <p>Sacred installation of Lord Ganesha idol with traditional Vedic rituals</p>
                    <div class="day-activities">
                        <div class="activity">
                            <i class="fas fa-sun"></i>
                            <span>6:00 AM - Pran Pratishtha Ceremony</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-music"></i>
                            <span>7:00 AM - Devotional Songs & Bhajans</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-utensils"></i>
                            <span>12:00 PM - Prasadam Distribution</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 2-10 -->
            <div class="timeline-day" data-aos="fade-left" data-aos-delay="200">
                <div class="day-marker">
                    <div class="day-number">2-10</div>
                    <div class="day-title">Daily Celebration</div>
                </div>
                <div class="day-content">
                    <h3>Daily Rituals & Programs</h3>
                    <p>Continuous celebration with morning and evening aarti, cultural activities</p>
                    <div class="day-activities">
                        <div class="activity">
                            <i class="fas fa-praying-hands"></i>
                            <span>6:00 AM & 7:00 PM - Daily Aarti</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-theater-masks"></i>
                            <span>8:00 PM - Cultural Performances</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-apple-alt"></i>
                            <span>Throughout Day - Prasadam Seva</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Day 11 - Visarjan -->
            <div class="timeline-day" data-aos="fade-right" data-aos-delay="300">
                <div class="day-marker">
                    <div class="day-number">11</div>
                    <div class="day-title">Ganpati Visarjan</div>
                </div>
                <div class="day-content">
                    <h3>Sacred Immersion Ceremony</h3>
                    <p>Farewell procession with traditional drums, dancing, and community participation</p>
                    <div class="day-activities">
                        <div class="activity">
                            <i class="fas fa-route"></i>
                            <span>4:00 PM - Grand Procession Begins</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-water"></i>
                            <span>6:00 PM - Eco-friendly Visarjan</span>
                        </div>
                        <div class="activity">
                            <i class="fas fa-hands"></i>
                            <span>7:00 PM - Community Celebration</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Traditional Rituals Section -->
<section class="rituals-section" id="rituals">
    <div class="container-fluid">
        <div class="section-header-ganpati text-center" data-aos="fade-up">
            <span class="section-badge-ganpati">Sacred Traditions</span>
            <h2 class="section-title-ganpati">Traditional Rituals & Ceremonies</h2>
        </div>

        <div class="rituals-grid">
            <!-- Morning Aarti -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="100">
                <div class="ritual-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3>Morning Aarti</h3>
                <p>Begin each day with devotional aarti, offering prayers and gratitude to Lord Ganesha with traditional
                    hymns and incense.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>6:00 AM Daily</span>
                </div>
            </div>

            <!-- Modak Offering -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="200">
                <div class="ritual-icon">
                    <i class="fas fa-cookie"></i>
                </div>
                <h3>Modak Seva</h3>
                <p>Prepare and offer Lord Ganesha's favorite sweet, modak, prepared with love and devotion by community
                    members.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>10:00 AM Daily</span>
                </div>
            </div>

            <!-- Bhajan Sandhya -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="300">
                <div class="ritual-icon">
                    <i class="fas fa-music"></i>
                </div>
                <h3>Bhajan Sandhya</h3>
                <p>Evening devotional singing sessions featuring soulful traditional Ganpati bhajans and uplifting
                    spiritual music.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>5:00 PM Daily</span>
                </div>
            </div>

            <!-- Evening Aarti -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="400">
                <div class="ritual-icon">
                    <i class="fas fa-fire-alt"></i>
                </div>
                <h3>Evening Aarti</h3>
                <p>Conclude each day with the grand evening aarti ceremony accompanied by drums, bells, and community
                    chanting.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>7:00 PM Daily</span>
                </div>
            </div>

            <!-- Prasadam Distribution -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="500">
                <div class="ritual-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3>Prasadam Seva</h3>
                <p>Distribution of blessed food to all devotees, fostering community spirit and sharing divine
                    blessings.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>Throughout Day</span>
                </div>
            </div>

            <!-- Cultural Programs -->
            <div class="ritual-card" data-aos="flip-up" data-aos-delay="600">
                <div class="ritual-icon">
                    <i class="fas fa-theater-masks"></i>
                </div>
                <h3>Cultural Programs</h3>
                <p>Traditional dance performances, drama, and storytelling celebrating the glory and teachings of Lord
                    Ganesha.</p>
                <div class="ritual-time">
                    <i class="fas fa-clock"></i>
                    <span>8:00 PM Daily</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Festival Gallery Section -->
<section class="festival-gallery-section">
    <div class="container-fluid">
        <div class="section-header-ganpati text-center" data-aos="fade-up">
            <span class="section-badge-ganpati">Sacred Moments</span>
            <h2 class="section-title-ganpati">Festival Gallery</h2>
            <p class="section-description-ganpati">
                Witness the divine beauty and spiritual atmosphere of our Ganpati celebrations
                through these sacred moments captured during previous festivals.
            </p>
        </div>

        <div class="gallery-masonry">
            <!-- Gallery Item 1 -->
            <div class="gallery-item large" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1583407723882-5da9a6d5b0b9?w=800&h=600&fit=crop"
                    data-title="Lord Ganesha Installation Ceremony">
                    <img src="https://images.unsplash.com/photo-1583407723882-5da9a6d5b0b9?w=500&h=350&fit=crop"
                        alt="Ganpati Installation">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Divine Installation</h4>
                            <p>Sacred Pran Pratishtha ceremony</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="gallery-item medium" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1578662996442-48f60103fc7e?w=800&h=600&fit=crop"
                    data-title="Community Aarti Ceremony">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc7e?w=400&h=300&fit=crop"
                        alt="Community Aarti">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Community Aarti</h4>
                            <p>Devotional prayer ceremony</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="gallery-item medium" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop"
                    data-title="Traditional Dance Performance">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop"
                        alt="Cultural Dance">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Cultural Dance</h4>
                            <p>Traditional performance art</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div class="gallery-item small" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&h=600&fit=crop"
                    data-title="Modak Preparation by Devotees">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=300&h=200&fit=crop"
                        alt="Modak Making">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Modak Seva</h4>
                            <p>Sacred offering preparation</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 5 -->
            <div class="gallery-item small" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=800&h=600&fit=crop"
                    data-title="Visarjan Procession">
                    <img src="https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=300&h=200&fit=crop"
                        alt="Visarjan Process">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Grand Visarjan</h4>
                            <p>Farewell procession</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 6 -->
            <div class="gallery-item medium" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1604931668626-ab49cb27d952?w=800&h=600&fit=crop"
                    data-title="Community Feast">
                    <img src="https://images.unsplash.com/photo-1604931668626-ab49cb27d952?w=400&h=300&fit=crop"
                        alt="Community Meal">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Prasadam Seva</h4>
                            <p>Community feast sharing</p>
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="gallery-modal">
        <div class="modal-backdrop" onclick="closeGalleryModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 id="galleryModalTitle">Festival Gallery</h3>
                <button class="modal-close" onclick="closeGalleryModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <button class="modal-nav-btn modal-prev" onclick="previousGalleryImage()">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="modal-image-container">
                    <img id="galleryModalImage" src="" alt="">
                </div>

                <button class="modal-nav-btn modal-next" onclick="nextGalleryImage()">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Participation Section -->
<section class="participation-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="participation-content">
                    <h2 class="participation-title">Join Our Sacred Celebration</h2>
                    <p class="participation-description">
                        Be part of this divine festival that brings our community together in devotion,
                        service, and celebration. Everyone is welcome to participate in the rituals,
                        cultural programs, and community service activities.
                    </p>

                    <div class="participation-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-pray"></i>
                            <div>
                                <h4>Spiritual Growth</h4>
                                <p>Experience divine blessings through traditional rituals and prayers</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <h4>Community Bonding</h4>
                                <p>Connect with fellow devotees and strengthen community ties</p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-heart"></i>
                            <div>
                                <h4>Cultural Heritage</h4>
                                <p>Preserve and celebrate our rich cultural traditions</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Community Center, Delhi</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <span>+91 92890 88161</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>events@saptashati.org</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="participation-visual">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=1250&h=800&fit=crop"
                        alt="Community Participation" class="participation-image">
                    <div class="visual-overlay">
                        <div class="participation-stats">
                            <div class="stat-item">
                                <div class="stat-number" data-count="1000">0+</div>
                                <div class="stat-label">Devotees</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-count="11">0</div>
                                <div class="stat-label">Days Festival</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-count="50">0+</div>
                                <div class="stat-label">Volunteers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section-ganpati">
    <div class="cta-bg-pattern"></div>
    <div class="container-fluid">
        <div class="cta-content-ganpati text-center" data-aos="zoom-in">
            <div class="cta-icon-ganpati">
                <i class="fas fa-hands-praying"></i>
            </div>
            <h2 class="cta-title-ganpati">गणपति बप्पा मोरया!</h2>
            <p class="cta-description-ganpati">
                Join us in seeking the blessings of Lord Ganesha for prosperity, wisdom, and success.
                Be part of our sacred celebration and experience the divine grace.
            </p>

            <div class="cta-buttons-ganpati">
                <a href="#" class="btn-cta-ganpati primary">
                    <i class="fas fa-calendar-plus"></i>
                    Register Now
                </a>
                <a href="tel:+919289088161" class="btn-cta-ganpati secondary">
                    <i class="fas fa-phone-alt"></i>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Interactive Features -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-count]');
    const observerOptions = {
        threshold: 0.7,
        rootMargin: '0px 0px -100px 0px'
    };

    const startCounting = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-count'));
                const hasPlus = counter.getAttribute('data-count') && counter.getAttribute(
                    'data-count').includes('+');
                let current = 0;
                const increment = target / 100;

                const updateCounter = () => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + (hasPlus ? '+' : '');
                    } else {
                        counter.textContent = Math.floor(current) + (hasPlus && current >
                            target * 0.8 ? '+' : '');
                        requestAnimationFrame(updateCounter);
                    }
                };

                updateCounter();
                observer.unobserve(counter);
            }
        });
    };

    const counterObserver = new IntersectionObserver(startCounting, observerOptions);
    counters.forEach(counter => counterObserver.observe(counter));
});

// Gallery Modal Functions
let currentGalleryIndex = 0;
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

function openGalleryModal(element) {
    const modal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('galleryModalImage');
    const modalTitle = document.getElementById('galleryModalTitle');

    // Find current image index
    currentGalleryIndex = galleryImages.findIndex(img => img.element === element);

    // Set modal content
    const currentImage = galleryImages[currentGalleryIndex];
    modalImage.src = currentImage.src;
    modalImage.alt = currentImage.title;
    modalTitle.textContent = currentImage.title;

    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';

    // Update navigation button states
    updateGalleryNavigationButtons();
}

function nextGalleryImage() {
    if (currentGalleryIndex < galleryImages.length - 1) {
        currentGalleryIndex++;
        updateGalleryModalImage();
    }
}

function previousGalleryImage() {
    if (currentGalleryIndex > 0) {
        currentGalleryIndex--;
        updateGalleryModalImage();
    }
}

function updateGalleryModalImage() {
    const modalImage = document.getElementById('galleryModalImage');
    const modalTitle = document.getElementById('galleryModalTitle');
    const currentImage = galleryImages[currentGalleryIndex];

    modalImage.src = currentImage.src;
    modalImage.alt = currentImage.title;
    modalTitle.textContent = currentImage.title;

    updateGalleryNavigationButtons();
}

function updateGalleryNavigationButtons() {
    const prevBtn = document.querySelector('.modal-prev');
    const nextBtn = document.querySelector('.modal-next');

    // Update button states
    if (currentGalleryIndex === 0) {
        prevBtn.style.opacity = '0.5';
        prevBtn.style.cursor = 'not-allowed';
    } else {
        prevBtn.style.opacity = '1';
        prevBtn.style.cursor = 'pointer';
    }

    if (currentGalleryIndex === galleryImages.length - 1) {
        nextBtn.style.opacity = '0.5';
        nextBtn.style.cursor = 'not-allowed';
    } else {
        nextBtn.style.opacity = '1';
        nextBtn.style.cursor = 'pointer';
    }
}

function closeGalleryModal() {
    const modal = document.getElementById('galleryModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key and add arrow key navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('galleryModal');
    if (modal && modal.classList.contains('active')) {
        if (e.key === 'Escape') {
            closeGalleryModal();
        } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            previousGalleryImage();
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            nextGalleryImage();
        }
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

// Floating elements animation
function animateFloatingElements() {
    const elements = document.querySelectorAll('.floating-lotus, .floating-om');
    elements.forEach((element, index) => {
        const delay = index * 500;
        const duration = 3000 + (index * 1000);

        setTimeout(() => {
            element.style.animation = `floatGently ${duration}ms ease-in-out infinite`;
        }, delay);
    });
}

// Initialize animations on load
document.addEventListener('DOMContentLoaded', animateFloatingElements);
</script>

<?php include '../app/views/layout/footer.php'; ?>