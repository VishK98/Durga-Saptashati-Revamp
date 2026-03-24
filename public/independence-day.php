<?php
require_once '../app/config/config.php';
$pageTitle = "Independence Day Celebration - Durga Saptashati Foundation";
$pageKeywords = "independence day, 15 august, freedom celebration, patriotic events, national pride, indian independence, community service, nation building";
$pageDescription = "Join Durga Saptashati Foundation in celebrating India's Independence Day with patriotic fervor, community service initiatives, and honoring our nation's heroes through meaningful programs.";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Independence Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/independence-day.css') ?>">

<!-- Separated Flag Styles -->
<link rel="stylesheet" href="<?= url('assets/css/events/flag.css') ?>">

<!-- International Yoga Day CSS for Gallery Styling -->
<link rel="stylesheet" href="<?= url('assets/css/events/international-yoga-day.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Independence Day Celebration</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('independence-day.php') ?>">Independence Day</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Patriotic Hero Section -->
<section class="independence-hero-section position-relative overflow-hidden">
    <div class="animated-bg-elements">
        <div class="flag-wave flag-1"></div>
        <div class="flag-wave flag-2"></div>
        <div class="flag-wave flag-3"></div>
    </div>

    <div class="container-fluid">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="hero-content-wrapper">
                    <div class="date-badge">
                        <i class="fas fa-calendar-day"></i>
                        <span>15th August 2024</span>
                    </div>

                    <h1 class="hero-title">
                        Celebrating <span class="text-saffron">78 Years</span> of
                        <span class="text-gradient-tricolor">Freedom & Unity</span>
                    </h1>

                    <p class="hero-description">
                        Join us in commemorating India's journey of independence, honoring the sacrifices of our freedom
                        fighters,
                        and pledging to build a stronger, more inclusive nation through community service and social
                        responsibility.
                    </p>

                    <div class="hero-stats-grid">
                        <div class="stat-card">
                            <div class="stat-value" data-count="78">0</div>
                            <div class="stat-label">Years of Independence</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" data-count="500">0+</div>
                            <div class="stat-label">Community Members</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" data-count="25">0+</div>
                            <div class="stat-label">Service Projects</div>
                        </div>
                    </div>

                    <div class="hero-cta-group">
                        <a href="#events" class="btn-primary-custom">
                            <i class="fas fa-flag"></i>
                            View Events
                        </a>
                        <a href="#wall-of-recognition" class="btn-outline-custom">
                            <i class="fas fa-medal"></i>
                            Wall of Recognition
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1200">
                <div class="hero-visual-container">
                    <div class="main-visual-wrapper">
                        <img src="https://images.unsplash.com/photo-1604931668626-ab49cb27d952?w=700&h=800&fit=crop"
                            alt="Independence Day Celebration" class="hero-main-image">
                        <div class="floating-badge badge-1">
                            <i class="fas fa-dove"></i>
                            <span>Peace</span>
                        </div>
                        <div class="floating-badge badge-2">
                            <i class="fas fa-hands-helping"></i>
                            <span>Unity</span>
                        </div>
                        <div class="floating-badge badge-3">
                            <i class="fas fa-chart-line"></i>
                            <span>Progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tri-color Divider -->
<div class="tricolor-divider">
    <div class="color-band saffron"></div>
    <div class="color-band white">
        <div class="ashoka-chakra">
            <div class="chakra-center"></div>
            <div class="chakra-spokes"></div>
        </div>
    </div>
    <div class="color-band green"></div>
</div>

<!-- Our Pledge Section -->
<section class="pledge-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-badge">Our Commitment</span>
                    <h2 class="section-title">Nation Building Through Service</h2>
                    <h6 class="section-subtitle">
                        At Durga Saptashati Foundation, we believe true independence means empowering every citizen
                        with education, healthcare, and opportunities for growth.
                    </h6>
                </div>

                <div class="row pledge-cards-row">
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pledge-card">
                            <div class="card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h3>Education for All</h3>
                            <p>Ensuring quality education reaches every corner of our nation, breaking barriers of
                                inequality.</p>
                            <div class="card-stats">
                                <span><i class="fas fa-users"></i> 5000+ Students</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="pledge-card">
                            <div class="card-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h3>Healthcare Access</h3>
                            <p>Providing essential healthcare services to underserved communities across rural and urban
                                areas.</p>
                            <div class="card-stats">
                                <span><i class="fas fa-hospital"></i> 50+ Health Camps</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="pledge-card">
                            <div class="card-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <h3>Environmental Care</h3>
                            <p>Protecting our nation's natural heritage through sustainable practices and green
                                initiatives.</p>
                            <div class="card-stats">
                                <span><i class="fas fa-tree"></i> 10000+ Trees Planted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events Timeline Section -->
<section class="events-timeline-section" id="events">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Celebration Events</span>
            <h2 class="section-title">Independence Day Programs</h2>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item left" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="time-badge">6:00 AM</div>
                    <h3>Flag Hoisting Ceremony</h3>
                    <p>Traditional flag hoisting followed by the national anthem and patriotic songs.</p>
                    <div class="event-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Main Ground</span>
                        <span><i class="fas fa-users"></i> Open to All</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="time-badge">8:00 AM</div>
                    <h3>Cultural Performances</h3>
                    <p>Students showcase patriotic dances, songs, and theatrical performances.</p>
                    <div class="event-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Auditorium</span>
                        <span><i class="fas fa-ticket-alt"></i> Free Entry</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item left" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="time-badge">10:00 AM</div>
                    <h3>Freedom Fighters Tribute</h3>
                    <p>Special ceremony honoring local freedom fighters and veterans.</p>
                    <div class="event-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Memorial Hall</span>
                        <span><i class="fas fa-medal"></i> Special Guests</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-content">
                    <div class="time-badge">2:00 PM</div>
                    <h3>Community Service Drive</h3>
                    <p>Blood donation camp, free health checkup, and distribution of essentials.</p>
                    <div class="event-meta">
                        <span><i class="fas fa-map-marker-alt"></i> Community Center</span>
                        <span><i class="fas fa-hands-helping"></i> Volunteer</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item left" data-aos="fade-right">
                <div class="timeline-content">
                    <div class="time-badge">5:00 PM</div>
                    <h3>Unity March & Rally</h3>
                    <p>Peace march promoting national unity and communal harmony.</p>
                    <div class="event-meta">
                        <span><i class="fas fa-map-marker-alt"></i> City Center</span>
                        <span><i class="fas fa-walking"></i> Join Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wall of Recognition Gallery -->
<section class="gallery-section" id="wall-of-recognition">
    <div class="container-fluid">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Honor & Pride</span>
            <h2 class="section-title-yoga">Wall of Recognition</h2>
            <p class="section-description-yoga">
                Certificates, awards, and acknowledgments we've received for our service to the nation
            </p>
        </div>

        <div class="yoga-gallery-grid">
            <!-- Certificate Item 1 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1604931668626-ab49cb27d952?w=800&h=600&fit=crop"
                    data-title="Government Recognition Certificate - Excellence in Nation Building">
                    <img src="https://images.unsplash.com/photo-1604931668626-ab49cb27d952?w=400&h=300&fit=crop"
                        alt="Government Recognition Certificate">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>National Excellence Award</h4>
                            <p>Government Recognition 2023</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Item 2 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1532618793091-ec5fe9635fbd?w=800&h=600&fit=crop"
                    data-title="Excellence in Social Service - Community Welfare Award">
                    <img src="https://images.unsplash.com/photo-1532618793091-ec5fe9635fbd?w=400&h=300&fit=crop"
                        alt="Excellence in Social Service">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Service Excellence</h4>
                            <p>Community Service Award 2023</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Item 3 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1578662996442-48f60103fc7e?w=800&h=600&fit=crop"
                    data-title="Community Development Award - Nation Building Initiative">
                    <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc7e?w=400&h=300&fit=crop"
                        alt="Community Development Award">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Nation Building Award</h4>
                            <p>Development Excellence 2022</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Item 4 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop"
                    data-title="Best NGO for Women Empowerment - Regional Social Welfare Board">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop"
                        alt="Women Empowerment Recognition">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Women Empowerment</h4>
                            <p>Best NGO Award 2022</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Item 5 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=800&h=600&fit=crop"
                    data-title="Outstanding Leadership Award - Excellence in Social Impact">
                    <img src="https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=400&h=300&fit=crop"
                        alt="Outstanding Leadership Award">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Leadership Excellence</h4>
                            <p>Outstanding Leadership 2021</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificate Item 6 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&h=600&fit=crop"
                    data-title="Outstanding Partnership Initiative - Corporate Social Responsibility">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=400&h=300&fit=crop"
                        alt="Partnership Initiative Award">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Unity in Service</h4>
                            <p>Partnership Excellence 2020</p>
                            <i class="fas fa-search-plus"></i>
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
                <h3 id="galleryModalTitle">Gallery Image</h3>
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

<!-- Freedom Stories Section -->
<section class="freedom-stories-section">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">Inspiring Journeys</span>
            <h2 class="section-title">Stories of Change</h2>
        </div>

        <div class="row stories-row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="story-card featured">
                    <div class="story-image">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&h=400&fit=crop"
                            alt="Community Service">
                    </div>
                    <div class="story-content">
                        <span class="story-category">Community Impact</span>
                        <h3>From Streets to Schools</h3>
                        <p>How our education initiative transformed the lives of 500+ street children, giving them hope
                            and a future through quality education and mentorship.</p>
                        <div class="story-author">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50&h=50&fit=crop"
                                alt="Author">
                            <div>
                                <h5>Sarah Johnson</h5>
                                <span>Program Director</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12" data-aos="fade-left" data-aos-delay="100">
                        <div class="story-card horizontal">
                            <div class="story-image">
                                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=200&h=150&fit=crop"
                                    alt="Rural Development">
                            </div>
                            <div class="story-content">
                                <span class="story-category">Rural Development</span>
                                <h4>Empowering Villages</h4>
                                <p>Digital literacy programs reaching 50+ villages, connecting rural India to
                                    opportunities.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" data-aos="fade-left" data-aos-delay="200">
                        <div class="story-card horizontal">
                            <div class="story-image">
                                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200&h=150&fit=crop"
                                    alt="Healthcare">
                            </div>
                            <div class="story-content">
                                <span class="story-category">Healthcare</span>
                                <h4>Health for All</h4>
                                <p>Free medical camps providing healthcare access to 10,000+ underprivileged citizens.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" data-aos="fade-left" data-aos-delay="300">
                        <div class="story-card horizontal">
                            <div class="story-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=200&h=150&fit=crop"
                                    alt="Women Empowerment">
                            </div>
                            <div class="story-content">
                                <span class="story-category">Women Empowerment</span>
                                <h4>Breaking Barriers</h4>
                                <p>Skill development programs helping 1000+ women achieve financial independence.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section">
    <div class="container-fluid">
        <div class="cta-wrapper" data-aos="zoom-in">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Be Part of Nation Building</h2>
                    <p class="cta-description">
                        Join us in our mission to create a stronger, more inclusive India through education,
                        healthcare, and community service.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="cta-buttons">
                        <a href="#" class="btn-primary-custom">
                            <i class="fas fa-hands-helping"></i>
                            Volunteer Now
                        </a>
                        <a href="#" class="btn-outline-custom">
                            <i class="fas fa-donate"></i>
                            Support Us
                        </a>
                    </div>
                </div>
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
    const counters = document.querySelectorAll('.stat-value');
    const observerOptions = {
        threshold: 0.7,
        rootMargin: '0px 0px -100px 0px'
    };

    const startCounting = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-count'));
                const hasPlus = counter.getAttribute('data-count').includes('+');
                let current = 0;
                const increment = target / 100;

                const updateCounter = () => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + (hasPlus ? '+' : '');
                    } else {
                        counter.textContent = Math.floor(current) + (hasPlus ? '+' : '');
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

// Parallax Effect for Hero Section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.flag-wave');

    parallaxElements.forEach((element, index) => {
        const speed = 0.5 + (index * 0.1);
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>