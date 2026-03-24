<?php
require_once '../app/config/config.php';

$pageTitle = "International Yoga Day Celebration";
$pageDescription = "Join Durga Saptashati Foundation's International Yoga Day celebration promoting holistic wellness, mindfulness, and community harmony through ancient yogic practices and modern wellness techniques.";
$pageKeywords = "International Yoga Day, yoga celebration, wellness event, mindfulness, holistic health, yoga practice, meditation, community wellness, Durga Saptashati Foundation, yoga therapy";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for International Yoga Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/international-yoga-day.css') ?>">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>International Yoga Day</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('international-yoga-day.php') ?>">International Yoga Day</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section with Zen Design -->
<section class="yoga-hero-section">
    <div class="zen-background">
        <div class="floating-lotus lotus-1"></div>
        <div class="floating-lotus lotus-2"></div>
        <div class="floating-lotus lotus-3"></div>
        <div class="meditation-circles">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="spiritual-badge">
                    <i class="fas fa-om"></i>
                    <span>Inner Peace & Wellness</span>
                </div>

                <h1 class="hero-title-yoga">
                    International
                    <span class="text-gradient-yoga">Yoga Day</span>
                    Celebration
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-yoga">
                    <div class="yoga-date-banner">
                        <div class="date-info">
                            <div class="date-number">21</div>
                            <div class="date-text">
                                <span>June</span>
                                <span>2024</span>
                            </div>
                        </div>
                        <div class="event-theme">
                            <h4>"Yoga for Humanity"</h4>
                            <p>Unite mind, body, and soul through ancient wisdom</p>
                        </div>
                    </div>

                    <p class="hero-description-yoga">
                        Join us in celebrating the transformative power of yoga as we come together for
                        a day of mindfulness, wellness, and spiritual awakening. Experience the ancient
                        art of yoga that brings harmony between mind, body, and consciousness.
                    </p>

                    <div class="hero-stats-yoga">
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-users"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="500">0</div>
                                <div class="stat-label-yoga">Participants Expected</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-clock"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="8">0</div>
                                <div class="stat-label-yoga">Hours of Wellness</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-leaf"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="15">0</div>
                                <div class="stat-label-yoga">Yoga Sessions</div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#register" class="btn-yoga primary">
                            <i class="fas fa-user-plus"></i>
                            Register Now
                        </a>
                        <a href="#gallery" class="btn-yoga secondary">
                            <i class="fas fa-images"></i>
                            View Gallery
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-yoga">
                    <div class="yoga-pose-showcase">
                        <div class="pose-card main-pose">
                            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&h=400&fit=crop"
                                alt="Yoga meditation pose" class="pose-image">
                            <div class="pose-overlay">
                                <span class="pose-name">Padmasana</span>
                                <span class="pose-benefit">Lotus Pose</span>
                            </div>
                        </div>

                        <div class="floating-poses">
                            <div class="mini-pose pose-1">
                                <img src="https://images.unsplash.com/photo-1506629905607-d3ac5b9b8ec7?w=150&h=150&fit=crop"
                                    alt="Tree pose">
                            </div>
                            <div class="mini-pose pose-2">
                                <img src="https://images.unsplash.com/photo-1540206395-68808572332f?w=150&h=150&fit=crop"
                                    alt="Warrior pose">
                            </div>
                        </div>

                        <div class="wellness-badges">
                            <div class="badge-item">
                                <i class="fas fa-heart"></i>
                                <span>Heart Health</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-brain"></i>
                                <span>Mental Clarity</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-balance-scale"></i>
                                <span>Balance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Highlights Section -->
<section class="event-highlights-section" id="highlights">
    <div class="container-fluid">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Event Highlights</span>
            <h2 class="section-title-yoga">A Day of Transformative Experiences</h2>
            <p class="section-description-yoga">
                Immerse yourself in a carefully curated program designed to enhance your physical,
                mental, and spiritual well-being through authentic yogic practices.
            </p>
        </div>

        <div class="highlights-grid">
            <!-- Highlight 1 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="100">
                <div class="card-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <h3>Sunrise Meditation</h3>
                <p>Begin your day with guided meditation sessions led by experienced practitioners, welcoming the dawn
                    with mindfulness and gratitude.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>6:00 AM - 7:00 AM</span>
                </div>
            </div>

            <!-- Highlight 2 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="200">
                <div class="card-icon">
                    <i class="fas fa-running"></i>
                </div>
                <h3>Asana Workshops</h3>
                <p>Learn and practice various yoga poses with certified instructors, from beginner-friendly to advanced
                    sequences for all skill levels.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>8:00 AM - 12:00 PM</span>
                </div>
            </div>

            <!-- Highlight 3 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="300">
                <div class="card-icon">
                    <i class="fas fa-wind"></i>
                </div>
                <h3>Pranayama Sessions</h3>
                <p>Master the art of conscious breathing with specialized pranayama techniques to enhance vitality and
                    inner peace.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>1:00 PM - 3:00 PM</span>
                </div>
            </div>

            <!-- Highlight 4 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="400">
                <div class="card-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <h3>Healing Therapies</h3>
                <p>Experience holistic healing through sound therapy, aromatherapy, and traditional Ayurvedic wellness
                    treatments.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>3:30 PM - 5:30 PM</span>
                </div>
            </div>

            <!-- Highlight 5 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="500">
                <div class="card-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <h3>Ayurvedic Consultation</h3>
                <p>Personalized consultations with Ayurvedic practitioners to understand your unique constitution and
                    wellness path.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>Throughout Day</span>
                </div>
            </div>

            <!-- Highlight 6 -->
            <div class="highlight-card" data-aos="flip-left" data-aos-delay="600">
                <div class="card-icon">
                    <i class="fas fa-moon"></i>
                </div>
                <h3>Sunset Yoga</h3>
                <p>Conclude the day with restorative yoga and meditation as we embrace the peaceful transition into
                    evening.</p>
                <div class="card-time">
                    <i class="fas fa-clock"></i>
                    <span>6:00 PM - 7:30 PM</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Gallery</span>
            <h2 class="section-title-yoga">Yoga in Action</h2>
            <p class="section-description-yoga">
                Experience the transformative moments from our previous International Yoga Day celebrations
                and get inspired for this year's event.
            </p>
        </div>

        <div class="yoga-gallery-grid">
            <!-- Gallery Item 1 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=800&h=600&fit=crop"
                    data-title="Morning Meditation Session">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=300&fit=crop"
                        alt="Morning Meditation">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Morning Meditation</h4>
                            <p>Peaceful start to the day</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1506629905607-d3ac5b9b8ec7?w=800&h=600&fit=crop"
                    data-title="Group Yoga Practice">
                    <img src="https://images.unsplash.com/photo-1506629905607-d3ac5b9b8ec7?w=400&h=300&fit=crop"
                        alt="Group Yoga">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Group Practice</h4>
                            <p>Community yoga sessions</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1540206395-68808572332f?w=800&h=600&fit=crop"
                    data-title="Advanced Asanas">
                    <img src="https://images.unsplash.com/photo-1540206395-68808572332f?w=400&h=300&fit=crop"
                        alt="Advanced Poses">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Advanced Poses</h4>
                            <p>Mastering the asanas</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 4 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1588286840104-8957b019727f?w=800&h=600&fit=crop"
                    data-title="Outdoor Yoga Session">
                    <img src="https://images.unsplash.com/photo-1588286840104-8957b019727f?w=400&h=300&fit=crop"
                        alt="Outdoor Yoga">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Outdoor Sessions</h4>
                            <p>Nature-based practice</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 5 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&h=600&fit=crop"
                    data-title="Breathing Exercises">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop"
                        alt="Pranayama">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Pranayama</h4>
                            <p>Breathing techniques</p>
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Item 6 -->
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600">
                <div class="gallery-card" onclick="openGalleryModal(this)"
                    data-image="https://images.unsplash.com/photo-1593811167562-9cef47bfc4d7?w=800&h=600&fit=crop"
                    data-title="Sunset Yoga">
                    <img src="https://images.unsplash.com/photo-1593811167562-9cef47bfc4d7?w=400&h=300&fit=crop"
                        alt="Sunset Yoga">
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <h4>Sunset Practice</h4>
                            <p>Evening tranquility</p>
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

<!-- Registration Section -->
<section class="registration-section" id="register">
    <div class="registration-bg"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="registration-info">
                    <h2>Join Our Yoga Community</h2>
                    <p class="registration-description">
                        Take the first step towards a healthier, more balanced life. Registration is
                        completely free and includes access to all sessions, wellness consultations,
                        and refreshments throughout the day.
                    </p>

                    <div class="registration-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Free participation in all yoga sessions</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Complimentary yoga mat and props</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Healthy refreshments and herbal teas</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Digital wellness guide and resources</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Certificate of participation</span>
                        </div>
                    </div>

                    <div class="event-details">
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <strong>Date</strong>
                                <span>June 21, 2024 (Friday)</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong>Time</strong>
                                <span>6:00 AM - 7:30 PM</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Venue</strong>
                                <span>Central Park Amphitheater, New Delhi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="registration-form-container">
                    <form class="registration-form" id="yogaRegistrationForm">
                        <h3>Reserve Your Spot</h3>
                        <p>Fill in your details to secure your place at this transformative event.</p>

                        <div class="form-group">
                            <input type="text" id="fullName" name="fullName" required>
                            <label for="fullName">Full Name</label>
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" name="email" required>
                            <label for="email">Email Address</label>
                        </div>

                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" required>
                            <label for="phone">Phone Number</label>
                        </div>

                        <div class="form-group">
                            <select id="experience" name="experience" required>
                                <option value="">Select Experience Level</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="advanced">Advanced</option>
                            </select>
                            <label for="experience">Yoga Experience</label>
                        </div>

                        <div class="form-group">
                            <select id="age" name="age" required>
                                <option value="">Select Age Group</option>
                                <option value="18-25">18-25 years</option>
                                <option value="26-35">26-35 years</option>
                                <option value="36-50">36-50 years</option>
                                <option value="50+">50+ years</option>
                            </select>
                            <label for="age">Age Group</label>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the terms and conditions and privacy policy</label>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            <label for="newsletter">Subscribe to wellness newsletter and event updates</label>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-user-plus"></i>
                            Register Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container-fluid">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Testimonials</span>
            <h2 class="section-title-yoga">Voices of Transformation</h2>
            <p class="section-description-yoga">
                Hear from participants who have experienced the life-changing benefits of our yoga events.
            </p>
        </div>

        <!-- Swiper Testimonials Carousel -->
        <div class="swiper testimonials-swiper" data-aos="fade-up">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <blockquote>
                                "Attending the International Yoga Day celebration was truly transformative.
                                The variety of sessions, from beginner-friendly to advanced practices,
                                made it accessible and enriching for everyone. I left feeling rejuvenated
                                and with a deeper understanding of yogic philosophy."
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b4b1c6cb?w=80&h=80&fit=crop&crop=face"
                                    alt="Priya Sharma">
                                <div class="author-info">
                                    <h4>Priya Sharma</h4>
                                    <span>Software Engineer, Delhi</span>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <blockquote>
                                "As someone dealing with chronic stress, the sound healing and meditation
                                sessions were incredibly healing. The instructors were knowledgeable and
                                created a safe, nurturing environment. This event reminded me of the
                                importance of self-care and inner peace."
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face"
                                    alt="Rajesh Kumar">
                                <div class="author-info">
                                    <h4>Rajesh Kumar</h4>
                                    <span>Business Owner, Gurgaon</span>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <blockquote>
                                "The family yoga session was wonderful! My children and I practiced together,
                                and it strengthened not just our bodies but our bond as a family. The event
                                was well-organized, inspiring, and created beautiful memories for all of us."
                            </blockquote>
                            <div class="testimonial-author">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&crop=face"
                                    alt="Meera Gupta">
                                <div class="author-info">
                                    <h4>Meera Gupta</h4>
                                    <span>Teacher, Noida</span>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Swiper Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section-yoga">
    <div class="cta-overlay"></div>
    <div class="container-fluid">
        <div class="cta-content-yoga text-center" data-aos="zoom-in">
            <div class="cta-icon-yoga">
                <i class="fas fa-om"></i>
            </div>
            <h2 class="cta-title-yoga">Begin Your Journey to Inner Peace</h2>
            <p class="cta-description-yoga">
                Don't miss this opportunity to connect with your inner self, learn from experienced
                practitioners, and be part of a community dedicated to wellness and spiritual growth.
            </p>

            <div class="cta-buttons-yoga">
                <a href="#register" class="btn-cta-yoga primary">
                    <i class="fas fa-user-plus"></i>
                    Register for Free
                </a>
                <a href="tel:+919289088161" class="btn-cta-yoga secondary">
                    <i class="fas fa-phone-alt"></i>
                    Call for Info
                </a>
            </div>

            <div class="cta-contact-yoga">
                <div class="contact-item-yoga">
                    <i class="fas fa-envelope"></i>
                    <span>events@saptashati.org</span>
                </div>
                <div class="contact-item-yoga">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Central Park Amphitheater, New Delhi</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 25);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));

    // Initialize Swiper for Testimonials
    const testimonialsSwiper = new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        navigation: {
            nextEl: '.testimonials-swiper .swiper-button-next',
            prevEl: '.testimonials-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.testimonials-swiper .swiper-pagination',
            clickable: true,
            dynamicBullets: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 600,
        grabCursor: true,
        touchRatio: 1,
        simulateTouch: true,
        allowTouchMove: true,
        watchOverflow: false,
        observer: true,
        observeParents: true,
        init: true,
        on: {
            init: function () {
                console.log('Swiper initialized with', this.slides.length, 'slides');
                // Ensure first slide is visible
                this.slideTo(0, 0);
            },
            slideChange: function () {
                console.log('Slide changed to:', this.activeIndex);
            }
        }
    });
});

// Registration Form
document.getElementById('yogaRegistrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Basic form validation
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);

    if (!data.terms) {
        alert('Please accept the terms and conditions to continue.');
        return;
    }

    // Simulate form submission
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registering...';
    submitBtn.disabled = true;

    setTimeout(() => {
        alert('Registration successful! You will receive a confirmation email shortly.');
        this.reset();
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 2000);
});

// Smooth scrolling for anchor links
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

// Floating animation for lotus elements
function animateLotus() {
    const lotusElements = document.querySelectorAll('.floating-lotus');

    lotusElements.forEach((lotus, index) => {
        const delay = index * 2000;
        setTimeout(() => {
            lotus.style.animation = `floatLotus 6s ease-in-out infinite`;
        }, delay);
    });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', animateLotus);

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
    if (modal.classList.contains('active')) {
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
</script>

<?php include '../app/views/layout/footer.php'; ?>