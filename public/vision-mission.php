<?php
require_once '../app/config/config.php';

$pageTitle = "Vision & Mission";
$pageDescription = "Discover the vision and mission of Durga Saptashati Foundation - our goals for creating a better tomorrow through compassionate service and spiritual growth.";
$pageKeywords = "vision, mission, goals, better tomorrow, Durga Saptashati Foundation, compassionate service";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/about-us/vision-mission.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Vision & Mission</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('vision-mission.php') ?>">Vision & Mission</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Modern Vision Mission Container -->
<div class="vm-container">
    <!-- Geometric Background Pattern -->
    <div class="geometric-pattern">
        <div class="geometric-shape hexagon"></div>
        <div class="geometric-shape diamond"></div>
        <div class="geometric-shape triangle"></div>
        <div class="geometric-shape hexagon"></div>
        <div class="geometric-shape diamond"></div>
        <div class="geometric-shape triangle"></div>
    </div>


    <!-- Interactive Vision Section -->
    <section id="vision" class="vision-section">
        <div class="container-fluid">
            <div class="section-intro" data-aos="fade-up">
                <div class="section-badge">Vision Statement</div>
                <h2 class="section-title">Our Vision for Tomorrow</h2>
                <p class="section-description mb-lg-5">
                    A society where every individual, regardless of their circumstances, has access to opportunities,
                    dignity, and the support needed to thrive and contribute meaningfully to their communities.
                </p>
            </div>

            <div class="row justify-content-center">
                <!-- Vision Card 1 - Empowerment -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="vision-card h-100" data-aos="fade-right" data-aos-duration="800">
                        <div class="vision-icon-wrapper">
                            <div class="vision-icon-bg"></div>
                            <i class="fas fa-hands-helping vision-icon"></i>
                        </div>
                        <h3 class="vision-title">Universal Empowerment</h3>
                        <p class="vision-content">
                            Creating a world where widowed women, disabled individuals, and senior citizens have equal
                            access to opportunities and are valued as integral members of society.
                        </p>
                        <ul class="vision-features">
                            <li><i class="fas fa-check"></i> Equal opportunity access</li>
                            <li><i class="fas fa-check"></i> Dignity preservation</li>
                            <li><i class="fas fa-check"></i> Community integration</li>
                            <li><i class="fas fa-check"></i> Social inclusion</li>
                        </ul>
                    </div>
                </div>

                <!-- Vision Card 2 - Innovation -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="vision-card h-100" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <div class="vision-icon-wrapper">
                            <div class="vision-icon-bg"></div>
                            <i class="fas fa-lightbulb vision-icon"></i>
                        </div>
                        <h3 class="vision-title">Innovative Solutions</h3>
                        <p class="vision-content">
                            Pioneering modern approaches to age-old challenges, leveraging technology and community
                            partnerships to create sustainable and scalable impact.
                        </p>
                        <ul class="vision-features">
                            <li><i class="fas fa-check"></i> Technology integration</li>
                            <li><i class="fas fa-check"></i> Scalable programs</li>
                            <li><i class="fas fa-check"></i> Data-driven outcomes</li>
                            <li><i class="fas fa-check"></i> Continuous innovation</li>
                        </ul>
                    </div>
                </div>

                <!-- Vision Card 3 - Transformation -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="vision-card h-100" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">
                        <div class="vision-icon-wrapper">
                            <div class="vision-icon-bg"></div>
                            <i class="fas fa-seedling vision-icon"></i>
                        </div>
                        <h3 class="vision-title">Lasting Transformation</h3>
                        <p class="vision-content">
                            Building generational change through education, skill development, and mindset
                            transformation
                            that creates ripple effects across communities.
                        </p>
                        <ul class="vision-features">
                            <li><i class="fas fa-check"></i> Educational excellence</li>
                            <li><i class="fas fa-check"></i> Skill development</li>
                            <li><i class="fas fa-check"></i> Mindset change</li>
                            <li><i class="fas fa-check"></i> Community impact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section with Unique Layout -->
    <section id="mission" class="mission-section">
        <div class="container-fluid">
            <h2 class="mission-title">Our <span class="highlight">Mission</span> in Action</h2>
            <p>Widowed women, handicapped people, disabled people, have to struggle for their rights and are frequently
                victims of discrimination. At Saptashati Foundation, our team works towards empowering the widowed women
                of our Indian society and, we ensure that we reach every corner of India to uplift these widowed from
                their distressed state. Sustaining economic insecurity, social disgrace, and often abandonment, widowed
                women are facing several challenges in Indian society. At Saptashati Foundation, we are committed to
                transforming societal attitudes towards widowed women. We aim to shift perceptions and foster respect,
                while actively creating economically empowering opportunities that help them lead independent, dignified
                lives. We are here to resolve the challenging experience of living in a patriarchal community with a
                widowed status.</p>
            <div class="mission-layout mt-lg-4">
                <div class="mission-content" data-aos="fade-right" data-aos-duration="1000">

                    <div class="mission-stats">
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                            <span class="stat-number">15+</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                            <span class="stat-number">100K+</span>
                            <span class="stat-label">Lives Touched</span>
                        </div>
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                            <span class="stat-number">15</span>
                            <span class="stat-label">States Covered</span>
                        </div>
                        <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Programs</span>
                        </div>
                    </div>

                    <div class="mission-highlights">
                        <h4 class="section-subtitle">Key Focus Areas :</h4>
                        <ul class="focus-list">
                            <li class="focus-item">
                                <div class="focus-icon" style="background: var(--vm-gradient-1);">
                                    <i class="fas fa-female"></i>
                                </div>
                                <div>
                                    <strong>Women's Empowerment</strong>
                                    <p>Supporting widowed women and single mothers</p>
                                </div>
                            </li>

                            <li class="focus-item">
                                <div class="focus-icon" style="background: var(--vm-gradient-2);">
                                    <i class="fas fa-wheelchair"></i>
                                </div>
                                <div>
                                    <strong>Disability Support</strong>
                                    <p>Comprehensive care for disabled individuals</p>
                                </div>
                            </li>

                            <li class="focus-item">
                                <div class="focus-icon" style="background: var(--vm-gradient-3);">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                                <div>
                                    <strong>Senior Care</strong>
                                    <p>Dignified support for elderly citizens</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="mission-visual" data-aos="fade-left" data-aos-duration="1000">
                    <div class="mission-image-stack">
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="Women Empowerment">
                        </div>
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="Community Support">
                        </div>
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                                alt="Education Programs">
                        </div>
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1544717302-9cdcb1f594e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Healthcare Initiatives">
                        </div>
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Education & Learning">
                        </div>
                        <div class="mission-image">
                            <img src="https://images.unsplash.com/photo-1520975930330-0321cae6d9b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                alt="Community Development">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Showcase Section -->
    <section class="impact-showcase">
        <div class="container-fluid">
            <div class="section-intro" data-aos="fade-up">
                <div class="section-badge" style="color: white; background: rgba(255,255,255,0.1);">Impact Metrics</div>
                </br>
                <h2 class="section-title" style="color: white;">Measuring Our Success</h2>
                <p class="section-description" style="color: rgba(255,255,255,0.8);">
                    Real numbers that reflect real change in the lives of those we serve
                </p>
            </div>

            <div class="impact-grid">
                <div class="impact-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="impact-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="impact-number">25,000+</div>
                    <div class="impact-label">Women Empowered</div>
                    <p class="impact-description">
                        Widowed women and single mothers provided with skills, resources, and emotional support for
                        independent living.
                    </p>
                </div>

                <div class="impact-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="impact-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="impact-number">50,000+</div>
                    <div class="impact-label">Lives Educated</div>
                    <p class="impact-description">
                        Children and adults provided with educational opportunities, from basic literacy to professional
                        skills.
                    </p>
                </div>

                <div class="impact-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="impact-icon">
                        <i class="fas fa-hands"></i>
                    </div>
                    <div class="impact-number">1,000+</div>
                    <div class="impact-label">Volunteers Active</div>
                    <p class="impact-description">
                        Dedicated volunteers working across 15 states to deliver programs and support to beneficiaries.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values & Principles Section -->
    <section class="vision-section" style="background: var(--vm-light);">
        <div class="container-fluid">
            <div class="section-intro" data-aos="fade-up">
                <div class="section-badge">Core Values</div>
                </br>
                <h2 class="section-title">Principles That Guide Us</h2>
                <p class="section-description">
                    Our fundamental beliefs that shape every decision, program, and interaction in our mission to serve.
                </p>
            </div>

            <div class="vision-grid">
                <!-- Value Card 1 -->
                <div class="vision-card" data-aos="flip-left" data-aos-duration="800">
                    <div class="vision-icon-wrapper">
                        <div class="vision-icon-bg"></div>
                        <i class="fas fa-balance-scale vision-icon"></i>
                    </div>
                    <h3 class="vision-title">Integrity & Transparency</h3>
                    <p class="vision-content">
                        We operate with complete honesty and openness, ensuring every donation and effort
                        directly benefits those we serve.
                    </p>
                </div>

                <!-- Value Card 3 -->
                <div class="vision-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="200">
                    <div class="vision-icon-wrapper">
                        <div class="vision-icon-bg"></div>
                        <i class="fas fa-heart vision-icon"></i>
                    </div>
                    <h3 class="vision-title">Compassion & Respect</h3>
                    <p class="vision-content">
                        Every individual is treated with dignity and respect, regardless of their background
                        or circumstances.
                    </p>
                </div>

                <!-- Value Card 2 -->
                <div class="vision-card" data-aos="flip-right" data-aos-duration="800" data-aos-delay="400">
                    <div class="vision-icon-wrapper">
                        <div class="vision-icon-bg"></div>
                        <i class="fas fa-rocket vision-icon"></i>
                    </div>
                    <h3 class="vision-title">Innovation & Excellence</h3>
                    <p class="vision-content">
                        We continuously improve our methods and strive for excellence in all our programs
                        and services.
                    </p>
                </div>

            </div>
        </div>
    </section>
</div>

<!-- Enhanced JavaScript Interactions -->
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
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

// Counter animation for impact numbers
function animateCounters() {
    const counters = document.querySelectorAll('.impact-number, .stat-number');

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

// Enhanced hover effects for vision cards
function enhanceCardInteractions() {
    const cards = document.querySelectorAll('.vision-card, .impact-card');

    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-20px) rotateX(5deg) rotateY(5deg) scale(1.02)';

            // Add glow effect
            const iconBg = this.querySelector('.vision-icon-bg, .impact-icon');
            if (iconBg) {
                iconBg.style.boxShadow = '0 0 30px rgba(255, 255, 255, 0.5)';
            }
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotateX(0) rotateY(0) scale(1)';

            const iconBg = this.querySelector('.vision-icon-bg, .impact-icon');
            if (iconBg) {
                iconBg.style.boxShadow = '';
            }
        });
    });
}

// Parallax effect for geometric shapes
function initParallax() {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const shapes = document.querySelectorAll('.geometric-shape');

        shapes.forEach((shape, index) => {
            const speed = 0.1 + (index * 0.02);
            const yPos = -(scrolled * speed);
            shape.style.transform = `translateY(${yPos}px) rotate(${scrolled * 0.02}deg)`;
        });
    });
}

// Background color animation
function animateBackground() {
    const container = document.querySelector('.vm-container');
    if (container) {
        setInterval(() => {
            const hue = Math.floor(Math.random() * 360);
            container.style.filter = `hue-rotate(${hue}deg)`;
        }, 10000);
    }
}

// Text reveal animation
function initTextReveal() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const text = entry.target;
                text.style.opacity = '1';
                text.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1
    });

    const textElements = document.querySelectorAll('.vision-content, .mission-description, .impact-description');
    textElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(el);
    });
}

// Initialize all enhancements
document.addEventListener('DOMContentLoaded', function() {
    animateCounters();
    enhanceCardInteractions();
    initParallax();
    animateBackground();
    initTextReveal();
});

// Performance optimization
let ticking = false;

function requestTick() {
    if (!ticking) {
        requestAnimationFrame(updateAnimations);
        ticking = true;
    }
}

function updateAnimations() {
    // Update animations here if needed
    ticking = false;
}

window.addEventListener('scroll', requestTick);
</script>

<?php include '../app/views/layout/footer.php'; ?>