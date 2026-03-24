<?php
require_once '../app/config/config.php';

$pageTitle = "Our Story & History";
$pageDescription = "Learn about the journey and founding principles of Durga Saptashati Foundation - how we began our mission to serve humanity through divine grace.";
$pageKeywords = "our story, history, founding principles, Durga Saptashati Foundation, journey, mission";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Story & History</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('our-story.php') ?>">Our Story</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Interactive Timeline Section -->
<section class="story-timeline">
    <div class="timeline-bg-pattern"></div>

    <div class="timeline-wrapper">
        <!-- <div class="timeline-header" data-aos="fade-up">
            <h2 class="timeline-title">Our Journey Through Time</h2>
            <p class="timeline-subtitle">
                Milestones that shaped our mission and expanded our impact across communities
            </p>
        </div> -->

        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2>Our Journey Through Time</h2>
            <p>Milestones that shaped our mission and expanded our impact across communities</p>
        </div>

        <div class="timeline-track">
            <div class="timeline-line"></div>

            <!-- Timeline Card 1 - Foundation -->
            <div class="timeline-card" data-aos="fade-right" data-aos-duration="800">
                <div class="timeline-card-content">
                    <div class="timeline-year">2010</div>
                    <h3 class="timeline-card-title">The Beginning of Hope</h3>
                    <p class="timeline-card-description">
                        Durga Saptashati Foundation was born from a vision to empower the most vulnerable in society.
                        Started with just a handful of dedicated volunteers, we began our mission to serve widows,
                        disabled individuals, and senior citizens with dignity and respect.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-users"></i>
                            <span class="stat-value">5 Volunteers</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-heart"></i>
                            <span class="stat-value">50 Families</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Foundation Beginning">
                </div>
                <div class="timeline-dot"></div>
            </div>

            <!-- Timeline Card 2 - Growth -->
            <div class="timeline-card" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <div class="timeline-card-content">
                    <div class="timeline-year">2013</div>
                    <h3 class="timeline-card-title">Expanding Our Reach</h3>
                    <p class="timeline-card-description">
                        With growing community support, we expanded our programs to include educational initiatives
                        and healthcare support. Our team grew to include professional social workers and healthcare
                        providers, allowing us to serve more families with specialized care.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-graduation-cap"></i>
                            <span class="stat-value">200 Students</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-medical-bag"></i>
                            <span class="stat-value">500 Treated</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Expanding Programs">
                </div>
                <div class="timeline-dot"></div>
            </div>

            <!-- Timeline Card 3 - Recognition -->
            <div class="timeline-card" data-aos="fade-right" data-aos-duration="800" data-aos-delay="400">
                <div class="timeline-card-content">
                    <div class="timeline-year">2016</div>
                    <h3 class="timeline-card-title">National Recognition</h3>
                    <p class="timeline-card-description">
                        Our innovative approach to community development earned national recognition. We received
                        awards for our women's empowerment programs and established partnerships with government
                        agencies to amplify our impact across multiple states.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-trophy"></i>
                            <span class="stat-value">5 Awards</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-map-marked-alt"></i>
                            <span class="stat-value">8 States</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Recognition Awards">
                </div>
                <div class="timeline-dot"></div>
            </div>

            <!-- Timeline Card 4 - Digital Innovation -->
            <div class="timeline-card" data-aos="fade-left" data-aos-duration="800" data-aos-delay="600">
                <div class="timeline-card-content">
                    <div class="timeline-year">2019</div>
                    <h3 class="timeline-card-title">Digital Transformation</h3>
                    <p class="timeline-card-description">
                        Embracing technology to enhance our services, we launched digital platforms for skill
                        development, online counseling, and virtual support groups. This innovation helped us
                        reach remote communities and provide 24/7 support to those in need.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-laptop"></i>
                            <span class="stat-value">3000 Online</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-mobile-alt"></i>
                            <span class="stat-value">24/7 Support</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Digital Innovation">
                </div>
                <div class="timeline-dot"></div>
            </div>

            <!-- Timeline Card 5 - Pandemic Response -->
            <div class="timeline-card" data-aos="fade-right" data-aos-duration="800" data-aos-delay="800">
                <div class="timeline-card-content">
                    <div class="timeline-year">2020</div>
                    <h3 class="timeline-card-title">Crisis Response</h3>
                    <p class="timeline-card-description">
                        During the global pandemic, we quickly adapted our services to provide emergency relief.
                        Our teams distributed food packets, medical supplies, and essential services to vulnerable
                        families, while maintaining safety protocols and expanding our community kitchen programs.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-boxes"></i>
                            <span class="stat-value">10K Relief Kits</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-utensils"></i>
                            <span class="stat-value">50K Meals</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Pandemic Response">
                </div>
                <div class="timeline-dot"></div>
            </div>

            <!-- Timeline Card 6 - Present Day -->
            <div class="timeline-card" data-aos="fade-left" data-aos-duration="800" data-aos-delay="1000">
                <div class="timeline-card-content">
                    <div class="timeline-year">2024</div>
                    <h3 class="timeline-card-title">Expanding Horizons</h3>
                    <p class="timeline-card-description">
                        Today, we stand as a beacon of hope with comprehensive programs spanning education, healthcare,
                        women's empowerment, and sustainable development. Our vision for 2030 includes reaching
                        1 million beneficiaries and establishing centers in 20 states across India.
                    </p>
                    <div class="timeline-card-stats">
                        <div class="stat">
                            <i class="fas fa-globe-asia"></i>
                            <span class="stat-value">15 States</span>
                        </div>
                        <div class="stat">
                            <i class="fas fa-hands-helping"></i>
                            <span class="stat-value">100K Lives</span>
                        </div>
                    </div>
                </div>
                <div class="timeline-card-image">
                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Present Day">
                </div>
                <div class="timeline-dot"></div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Split Section -->
<section class="mission-vision">
    <div class="mission-side" data-aos="fade-right">
        <div class="mv-content">
            <div class="mv-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2 class="mv-title">Our Mission</h2>
            <p class="mv-description">
                To empower the most vulnerable members of society through comprehensive support programs
                that restore dignity, provide opportunities, and create sustainable change.
            </p>
            <ul class="mv-list">
                <li><i class="fas fa-check"></i> Empower widows and single mothers</li>
                <li><i class="fas fa-check"></i> Support disabled individuals</li>
                <li><i class="fas fa-check"></i> Care for senior citizens</li>
                <li><i class="fas fa-check"></i> Advance women's rights</li>
                <li><i class="fas fa-check"></i> Promote education and healthcare</li>
            </ul>
        </div>
        <div class="mv-decoration"></div>
    </div>

    <div class="vision-side" data-aos="fade-left">
        <div class="mv-content">
            <div class="mv-icon">
                <i class="fas fa-eye"></i>
            </div>
            <h2 class="mv-title">Our Vision</h2>
            <p class="mv-description">
                A society where every individual, regardless of their circumstances, has access to opportunities,
                dignity, and the support needed to thrive and contribute meaningfully to their communities.
            </p>
            <ul class="mv-list">
                <li><i class="fas fa-star"></i> Inclusive communities for all</li>
                <li><i class="fas fa-star"></i> Zero discrimination based on status</li>
                <li><i class="fas fa-star"></i> Self-reliant individuals</li>
                <li><i class="fas fa-star"></i> Sustainable development</li>
                <li><i class="fas fa-star"></i> Universal access to basic needs</li>
            </ul>
        </div>
        <div class="mv-decoration"></div>
    </div>
</section>

<!-- Founder's Message Section -->
<section class="founders-message">
    <div class="founders-container">
        <div class="founders-grid">
            <div class="founder-image-wrapper" data-aos="fade-right">
                <div class="founder-image">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Founder">
                    <div class="founder-badge">
                        <div class="founder-name">Dr. Rajesh Kumar</div>
                        <div class="founder-title">Founder & Chairman</div>
                    </div>
                </div>
            </div>

            <div class="message-content" data-aos="fade-left">
                <i class="fas fa-quote-left message-quote"></i>
                <h3 class="message-title">A Message from Our Founder</h3>
                <p class="message-text">
                    "When I started this foundation, I had a simple belief - that every person deserves dignity,
                    respect, and the opportunity to live a meaningful life. Over the years, we've seen how small
                    acts of kindness can transform entire communities. Our work is far from over, but every day
                    I'm inspired by the resilience of the people we serve and the dedication of our volunteers
                    who make our mission possible."
                </p>
                <p class="message-text">
                    "What began as a personal calling has become a movement of hope. Together, we're not just
                    changing lives - we're building a society where compassion leads the way and no one is left behind."
                </p>
                <div class="message-signature">
                    <div>
                        <strong>Dr. Rajesh Kumar</strong><br>
                        <small style="color: #666;">Founder & Chairman</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics Section -->
<section class="impact-section">
    <div class="container-fluid">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="timeline-title">Our Impact in Numbers</h2>
            <p class="timeline-subtitle">Measurable change that speaks to our commitment</p>
        </div>

        <div class="impact-grid">
            <div class="impact-card" data-aos="zoom-in" data-aos-delay="100">
                <div class="impact-icon">
                    <i class="fas fa-users"></i>
                </div>
                <span class="impact-number">100,000+</span>
                <span class="impact-label">Lives Transformed</span>
            </div>

            <div class="impact-card" data-aos="zoom-in" data-aos-delay="200">
                <div class="impact-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <span class="impact-number">25,000+</span>
                <span class="impact-label">Students Educated</span>
            </div>

            <div class="impact-card" data-aos="zoom-in" data-aos-delay="300">
                <div class="impact-icon">
                    <i class="fas fa-female"></i>
                </div>
                <span class="impact-number">15,000+</span>
                <span class="impact-label">Women Empowered</span>
            </div>

            <div class="impact-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="impact-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <span class="impact-number">500+</span>
                <span class="impact-label">Health Camps</span>
            </div>

            <div class="impact-card" data-aos="zoom-in" data-aos-delay="500">
                <div class="impact-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <span class="impact-number">200+</span>
                <span class="impact-label">Community Partners</span>
            </div>

            <div class="impact-card" data-aos="zoom-in" data-aos-delay="600">
                <div class="impact-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <span class="impact-number">15</span>
                <span class="impact-label">States Covered</span>
            </div>
        </div>
    </div>
</section>

<!-- Hero Section with Animated Particles -->
<section class="story-hero">
    <div class="hero-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
        <div class="story-badge">
            <i class="fas fa-star"></i>
            <span>Our Journey</span>
        </div>
        <h1 class="hero-title">
            The <span class="highlight">Story</span><br>
            of Hope & Change
        </h1>
        <p class="hero-description">
            From humble beginnings to transforming thousands of lives - discover how divine grace
            meets humanity's greatest needs through our unwavering commitment to service.
        </p>
    </div>

    <div class="hero-scroll">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Partners Section -->
<section class="partners-section">
    <div class="container-fluid">
        <div class="partners-header" data-aos="fade-up">
            <h2 class="partners-title">Our Trusted Partners</h2>
            <p class="timeline-subtitle">Working together to maximize our collective impact</p>
        </div>

        <div class="partners-slider">
            <div class="partners-track">
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/f26522/ffffff?text=Partner+1" alt="Partner 1">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/1a1b26/ffffff?text=Partner+2" alt="Partner 2">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/f26522/ffffff?text=Partner+3" alt="Partner 3">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/1a1b26/ffffff?text=Partner+4" alt="Partner 4">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/f26522/ffffff?text=Partner+5" alt="Partner 5">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/1a1b26/ffffff?text=Partner+6" alt="Partner 6">
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/f26522/ffffff?text=Partner+1" alt="Partner 1">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/1a1b26/ffffff?text=Partner+2" alt="Partner 2">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/f26522/ffffff?text=Partner+3" alt="Partner 3">
                </div>
                <div class="partner-logo">
                    <img src="https://via.placeholder.com/150x80/1a1b26/ffffff?text=Partner+4" alt="Partner 4">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Enhanced Interactions -->
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// Smooth scroll for hero scroll indicator
document.querySelector('.hero-scroll').addEventListener('click', function() {
    document.querySelector('.story-timeline').scrollIntoView({
        behavior: 'smooth'
    });
});

// Counter animation for impact numbers
function animateCounters() {
    const counters = document.querySelectorAll('.impact-number');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.textContent.replace(/[^\d]/g, ''));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }

                    const suffix = counter.textContent.includes('+') ? '+' : '';
                    const formatted = Math.floor(current).toLocaleString() + suffix;
                    counter.textContent = formatted;
                }, 16);

                observer.unobserve(counter);
            }
        });
    });

    counters.forEach(counter => observer.observe(counter));
}

// Timeline dots animation
function animateTimelineDots() {
    const dots = document.querySelectorAll('.timeline-dot');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, {
        threshold: 0.5
    });

    dots.forEach(dot => {
        dot.style.animationPlayState = 'paused';
        observer.observe(dot);
    });
}

// Particle animation enhancement
function enhanceParticles() {
    const particles = document.querySelectorAll('.particle');
    particles.forEach((particle, index) => {
        // Randomize particle properties
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.left = Math.random() * 100 + '%';

        // Add random opacity variation
        setInterval(() => {
            particle.style.opacity = 0.3 + Math.random() * 0.7;
        }, 3000 + Math.random() * 2000);
    });
}

// Initialize all animations
document.addEventListener('DOMContentLoaded', function() {
    animateCounters();
    animateTimelineDots();
    enhanceParticles();
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-content');
    const particles = document.querySelector('.hero-particles');

    if (heroContent && particles) {
        heroContent.style.transform = `translateY(${scrolled * 0.3}px)`;
        particles.style.transform = `translateY(${scrolled * 0.1}px)`;
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>