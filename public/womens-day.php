<?php
require_once '../app/config/config.php';
$pageTitle = "International Women's Day - Durga Saptashati Foundation";
$pageKeywords = "women's day, women empowerment, gender equality, women's rights, empowerment programs, leadership development, skill training, women support";
$pageDescription = "Join Durga Saptashati Foundation's International Women's Day celebration - empowering women through education, skill development, and leadership programs for a more inclusive society.";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Women's Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/womens-day.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>International Women's Day</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('womens-day.php') ?>">International Women's Day</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="womens-hero-section">
    <div class="hero-background-overlay"></div>
    <div class="floating-elements">
        <div class="floating-icon icon-1"><i class="fas fa-venus"></i></div>
        <div class="floating-icon icon-2"><i class="fas fa-crown"></i></div>
        <div class="floating-icon icon-3"><i class="fas fa-heart"></i></div>
        <div class="floating-icon icon-4"><i class="fas fa-star"></i></div>
    </div>

    <div class="container-fluid">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-womens">
                    <div class="empowerment-badge">
                        <i class="fas fa-female"></i>
                        <span>Empowerment & Equality</span>
                    </div>
                    <h1 class="hero-title-womens">
                        Celebrating
                        <span class="text-gradient-womens">Women's</span>
                        Strength & Vision
                    </h1>
                    <p class="hero-description-womens">
                        Join us in honoring the incredible achievements, resilience, and contributions of women
                        worldwide. Together, we build a future where every woman has the opportunity to lead,
                        innovate, and inspire positive change in their communities.
                    </p>
                    <div class="hero-actions-womens">
                        <a href="#programs" class="btn-womens-primary">
                            <i class="fas fa-rocket"></i>
                            Explore Programs
                        </a>
                        <a href="#stories" class="btn-womens-secondary">
                            <i class="fas fa-users"></i>
                            Success Stories
                        </a>
                    </div>
                    <div class="hero-stats-womens">
                        <div class="stat-item">
                            <span class="stat-number" data-counter="500">0</span>
                            <span class="stat-label">Women Empowered</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-counter="15">0</span>
                            <span class="stat-label">Skills Programs</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-counter="98">0</span>
                            <span class="stat-label">Success Rate</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-womens">
                    <div class="main-image-container">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&h=700&fit=crop&crop=faces"
                            alt="Empowered Woman Leader" class="hero-main-image">
                        <div class="image-overlay-elements">
                            <div class="overlay-card card-1">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Education First</span>
                            </div>
                            <div class="overlay-card card-2">
                                <i class="fas fa-briefcase"></i>
                                <span>Career Growth</span>
                            </div>
                            <div class="overlay-card card-3">
                                <i class="fas fa-balance-scale"></i>
                                <span>Equal Rights</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Statement Section -->
<section class="mission-womens-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mission-content-womens" data-aos="fade-up">
                    <div class="section-header-womens text-center">
                        <span class="section-badge-womens">Our Mission</span>
                        <h2 class="section-title-womens">Breaking Barriers, Building Futures</h2>
                        <p class="section-description-womens">
                            We are dedicated to creating an inclusive world where women from all backgrounds have equal
                            access to opportunities, resources, and platforms to achieve their full potential and drive
                            meaningful change in society.
                        </p>
                    </div>
                    <div class="mission-pillars">
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="pillar-card">
                                    <div class="pillar-icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <h3>Innovation & Leadership</h3>
                                    <p>Fostering creative thinking and leadership skills to help women become
                                        changemakers in their fields.</p>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="pillar-card">
                                    <div class="pillar-icon">
                                        <i class="fas fa-hands-helping"></i>
                                    </div>
                                    <h3>Community Support</h3>
                                    <p>Building strong support networks that uplift and empower women through mentorship
                                        and collaboration.</p>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="pillar-card">
                                    <div class="pillar-icon">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h3>Economic Independence</h3>
                                    <p>Providing skills training and entrepreneurship opportunities for sustainable
                                        financial empowerment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Success Stories Section -->
<section class="stories-womens-section" id="stories">
    <div class="container-fluid">
        <div class="section-header-womens text-center" data-aos="fade-up">
            <span class="section-badge-womens">Success Stories</span>
            <h2 class="section-title-womens">Inspiring Journeys of Transformation</h2>
            <p class="section-description-womens">
                Meet the remarkable women who have transformed their lives and communities through our empowerment
                programs.
            </p>
        </div>

        <div class="stories-showcase">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="story-content">
                        <div class="story-quote">
                            <i class="fas fa-quote-left quote-icon"></i>
                            <blockquote>
                                "The Women in Leadership program didn't just teach me skills – it transformed my entire
                                perspective.
                                Today, I lead a team of 50+ employees and have launched initiatives that impact
                                thousands of women
                                in rural communities. This program gave me the confidence to dream bigger and achieve
                                more."
                            </blockquote>
                        </div>
                        <div class="story-author">
                            <div class="author-info">
                                <h4>Dr. Priya Mehta</h4>
                                <span>CEO, Rural Innovation Solutions</span>
                                <div class="author-achievements">
                                    <span class="achievement"><i class="fas fa-award"></i> Women Entrepreneur Award
                                        2023</span>
                                    <span class="achievement"><i class="fas fa-users"></i> Empowered 5000+ Women</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="story-visual">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=600&h=500&fit=crop&crop=faces"
                            alt="Dr. Priya Mehta" class="story-image">
                        <div class="story-metrics">
                            <div class="metric-card">
                                <span class="metric-number">50+</span>
                                <span class="metric-label">Team Members</span>
                            </div>
                            <div class="metric-card">
                                <span class="metric-number">5000+</span>
                                <span class="metric-label">Women Impacted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Story Cards -->
        <div class="row mt-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="mini-story-card">
                    <img src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?w=300&h=300&fit=crop&crop=faces"
                        alt="Success Story">
                    <div class="mini-story-content">
                        <h5>Sarah Ahmed</h5>
                        <span>Tech Entrepreneur</span>
                        <p>"From learning basic coding to launching my AI startup – the journey has been incredible!"
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="mini-story-card">
                    <img src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=300&h=300&fit=crop&crop=faces"
                        alt="Success Story">
                    <div class="mini-story-content">
                        <h5>Maya Sharma</h5>
                        <span>Financial Advisor</span>
                        <p>"The financial empowerment program helped me build a successful consulting practice."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="mini-story-card">
                    <img src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?w=300&h=300&fit=crop&crop=faces"
                        alt="Success Story">
                    <div class="mini-story-content">
                        <h5>Lisa Chen</h5>
                        <span>Community Leader</span>
                        <p>"Leadership training empowered me to advocate for women's rights in my community."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Statistics Section -->
<section class="impact-womens-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="impact-content" data-aos="fade-up">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="impact-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-female"></i>
                                </div>
                                <h3 class="stat-number" data-counter="1250">0</h3>
                                <p class="stat-description">Women Empowered</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="impact-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h3 class="stat-number" data-counter="25">0</h3>
                                <p class="stat-description">Training Programs</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="impact-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <h3 class="stat-number" data-counter="850">0</h3>
                                <p class="stat-description">Career Placements</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="impact-stat">
                                <div class="stat-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <h3 class="stat-number" data-counter="120">0</h3>
                                <p class="stat-description">Startups Launched</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get Involved Section -->
<section class="involvement-womens-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="involvement-content text-center" data-aos="fade-up">
                    <h2 class="involvement-title">Ready to Make a Difference?</h2>
                    <p class="involvement-description">
                        Join our community of empowered women and changemakers. Whether you're looking to develop new
                        skills,
                        advance your career, or make an impact in your community, we have the perfect program for you.
                    </p>
                    <div class="involvement-actions">
                        <a href="#" class="btn-womens-primary">
                            <i class="fas fa-user-plus"></i>
                            Join a Program
                        </a>
                        <a href="#" class="btn-womens-outline">
                            <i class="fas fa-hands-helping"></i>
                            Become a Mentor
                        </a>
                        <a href="#" class="btn-womens-outline">
                            <i class="fas fa-heart"></i>
                            Support the Cause
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content gallery-modal-content">
            <div class="modal-header gallery-modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Program Details</h5>
                <button type="button" class="btn-close gallery-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body gallery-modal-body">
                <img src="" alt="" class="gallery-modal-image" id="modalImage">
                <div class="gallery-modal-info">
                    <h4 id="modalTitle">Program Title</h4>
                    <p id="modalDescription">Program description will appear here.</p>
                    <div class="modal-actions">
                        <a href="#" class="btn-womens-primary modal-btn">
                            <i class="fas fa-user-plus"></i>
                            Join Program
                        </a>
                        <a href="#" class="btn-womens-outline modal-btn">
                            <i class="fas fa-info-circle"></i>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- JavaScript for Interactive Features -->
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-out-back',
    once: true
});

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
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target + (counter.textContent.includes(
                            '%') ? '%' : '+');
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current) + (counter.textContent
                            .includes('%') ? '%' : '+');
                    }
                }, 30);
                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));
});

// Smooth scrolling for navigation links
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
    const floatingIcons = document.querySelectorAll('.floating-icon');
    floatingIcons.forEach((icon, index) => {
        icon.style.animation = `float 3s ease-in-out infinite`;
        icon.style.animationDelay = `${index * 0.5}s`;
    });
}

// Initialize floating animations
document.addEventListener('DOMContentLoaded', animateFloatingElements);

// Program card hover effects
document.querySelectorAll('.program-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Gallery Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                const parent = item.closest('.col-lg-4, .col-md-6');
                
                if (filter === 'all' || category === filter) {
                    parent.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        parent.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Gallery Modal Functionality
    const galleryModal = document.getElementById('galleryModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    
    if (galleryModal && modalImage && modalTitle && modalDescription) {
        document.querySelectorAll('.gallery-view-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const imageSrc = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                
                modalImage.src = imageSrc;
                modalImage.alt = title;
                modalTitle.textContent = title;
                modalDescription.textContent = description;
            });
        });
    }
    
    // Gallery item hover effects
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>