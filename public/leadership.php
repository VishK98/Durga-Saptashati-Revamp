<?php
require_once '../app/config/config.php';

$pageTitle = "Leadership Team";
$pageDescription = "Meet the dedicated leadership team behind Durga Saptashati Foundation - the people who guide our mission and drive our charitable initiatives.";
$pageKeywords = "leadership team, management, founders, directors, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Leadership Team</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('leadership.php') ?>">Leadership</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Leadership Container with Animated Background -->
<div class="leadership-container">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape shape-circle"></div>
        <div class="shape shape-triangle"></div>
        <div class="shape shape-square"></div>
        <div class="shape shape-circle"></div>
        <div class="shape shape-triangle"></div>
    </div>

    <!-- Hero Section -->
    <section class="leadership-hero">
        <div class="container-fluid">
            <div class="hero-content" data-aos="fade-up" data-aos-duration="1200">
                <div class="hero-badge">
                    <i class="fas fa-crown"></i>
                    <span>Excellence in Leadership</span>
                </div>
                <h1 class="hero-title">Visionary Leaders</h1>
                <p class="hero-subtitle">Guiding our mission with wisdom, integrity, and unwavering commitment</p>
                <div class="hero-cta">
                    <a href="#team" class="cta-button cta-primary">Meet Our Team</a>
                    <a href="#values" class="cta-button cta-secondary">Our Values</a>
                </div>
                <div class="scroll-indicator">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Grid Section -->
    <section id="team" class="leadership-grid-section">
        <div class="container-fluid">
            <div class="section-header">
                <div class="section-badge" data-aos="zoom-in">
                    <i class="fas fa-users"></i>
                    <span>Our Team</span>
                </div>
                <h2 class="section-title" data-aos="fade-up">
                    Meet the <span class="highlight">Driving Force</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Passionate individuals dedicated to creating lasting social impact
                </p>
            </div>

            <div class="leadership-grid">
                <!-- Leader Card 1 - Founder/Chairman -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Founder" class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Dr. Rajesh Kumar</h3>
                        <p class="leader-position">Founder & Chairman</p>
                        <p class="leader-bio">Visionary leader with 25+ years of experience in social development and
                            community initiatives.</p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">25+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100+</span>
                                <span class="stat-label">Projects</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">50K+</span>
                                <span class="stat-label">Uplifted</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leader Card 2 - Co-Founder/President -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Co-Founder"
                            class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Mrs. Priya Sharma</h3>
                        <p class="leader-position">Co-Founder & President</p>
                        <p class="leader-bio">
                            Passionate advocate for women’s empowerment and education with expertise in management.
                        </p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">20+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">75+</span>
                                <span class="stat-label">Programs</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">30K+</span>
                                <span class="stat-label">Empowered</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leader Card 3 - Executive Director -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Executive Director"
                            class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Mr. Amit Patel</h3>
                        <p class="leader-position">Executive Director</p>
                        <p class="leader-bio">
                            Strategic thinker with a proven track record in scaling non-profit operations and impact.
                        </p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">15+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">10</span>
                                <span class="stat-label">States</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">200+</span>
                                <span class="stat-label">Partners</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leader Card 4 - Program Director -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Program Director"
                            class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Dr. Neha Gupta</h3>
                        <p class="leader-position">Program Director</p>
                        <p class="leader-bio">
                            Expert in designing and implementing community development programs with measurable impact.
                        </p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">12+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Programs</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">95%</span>
                                <span class="stat-label">Success</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leader Card 5 - Finance Director -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/men/52.jpg" alt="Finance Director"
                            class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Mr. Vikram Singh</h3>
                        <p class="leader-position">Finance Director</p>
                        <p class="leader-bio">
                            Chartered accountant ensuring transparency and efficiency in financial management.
                        </p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">18+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Compliance</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">₹50Cr+</span>
                                <span class="stat-label">Managed</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leader Card 6 - Operations Manager -->
                <div class="leader-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="leader-image-wrapper">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Operations Manager"
                            class="leader-image">
                        <div class="leader-overlay">
                            <div class="leader-social">
                                <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="leader-info">
                        <h3 class="leader-name">Ms. Anjali Reddy</h3>
                        <p class="leader-position">Operations Manager</p>
                        <p class="leader-bio">
                            Streamlining operations to maximize efficiency and impact across all our initiatives.
                        </p>
                        <div class="leader-stats">
                            <div class="stat-item">
                                <span class="stat-number">10+</span>
                                <span class="stat-label">Years</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">25</span>
                                <span class="stat-label">Teams</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">40%</span>
                                <span class="stat-label">Savings</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section id="values" class="values-section">
        <div class="container-fluid">
            <div class="section-header">
                <div class="section-badge" data-aos="zoom-in">
                    <i class="fas fa-heart"></i>
                    <span>Our Values</span>
                </div>
                <h2 class="section-title" data-aos="fade-up">
                    Principles That <span class="highlight">Guide Us</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Core values that shape our approach to creating positive change
                </p>
            </div>

            <div class="values-grid">
                <div class="value-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="value-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3 class="value-title">Compassion</h3>
                    <p class="value-description">
                        We approach every initiative with empathy and understanding, putting people first in all we do.
                    </p>
                </div>

                <div class="value-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="value-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3 class="value-title">Integrity</h3>
                    <p class="value-description">
                        Transparency and honesty guide our actions, ensuring trust with our communities and partners.
                    </p>
                </div>

                <div class="value-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="value-title">Innovation</h3>
                    <p class="value-description">
                        We continuously seek creative solutions to address complex social challenges effectively.
                    </p>
                </div>

                <div class="value-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="value-title">Collaboration</h3>
                    <p class="value-description">
                        Working together with communities, partners, and stakeholders to maximize our collective impact.
                    </p>
                </div>

                <div class="value-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="value-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="value-title">Sustainability</h3>
                    <p class="value-description">
                        Building lasting solutions that empower communities to thrive independently over time.
                    </p>
                </div>

                <div class="value-card" data-aos="zoom-in" data-aos-delay="600">
                    <div class="value-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="value-title">Excellence</h3>
                    <p class="value-description">
                        Striving for the highest standards in all our programs and maintaining professional excellence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Timeline Section -->
    <section class="timeline-section">
        <div class="container-fluid">
            <div class="section-header">
                <div class="section-badge" data-aos="zoom-in">
                    <i class="fas fa-history"></i>
                    <span>Our Journey</span>
                </div>
                <h2 class="section-title" data-aos="fade-up">
                    Leadership <span class="highlight">Milestones</span>
                </h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Key moments in our leadership evolution
                </p>
            </div>

            <div class="timeline-container">
                <div class="timeline-line"></div>

                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2010</span>
                        <h3 class="timeline-title">Foundation Established</h3>
                        <p class="timeline-description">
                            Visionary leaders came together to establish Durga Saptashati Foundation with a mission to
                            serve.
                        </p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2013</span>
                        <h3 class="timeline-title">Leadership Expansion</h3>
                        <p class="timeline-description">
                            Welcomed new board members and expanded our leadership team to scale operations.
                        </p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2016</span>
                        <h3 class="timeline-title">Strategic Restructuring</h3>
                        <p class="timeline-description">
                            Implemented new governance structure to enhance efficiency and impact measurement.
                        </p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2019</span>
                        <h3 class="timeline-title">Youth Leadership Program</h3>
                        <p class="timeline-description">
                            Launched initiative to develop next generation of social leaders and changemakers.
                        </p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-right">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2022</span>
                        <h3 class="timeline-title">National Recognition</h3>
                        <p class="timeline-description">
                            Leadership team received national awards for excellence in social development.
                        </p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2024</span>
                        <h3 class="timeline-title">Future Vision 2030</h3>
                        <p class="timeline-description">
                            Unveiled ambitious roadmap to triple our impact under visionary leadership guidance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container-fluid">
            <div class="cta-content" data-aos="zoom-in">
                <h2 class="cta-title">Join Our Leadership Journey</h2>
                <p class="cta-description">
                    Be part of our mission to create lasting positive change in communities
                </p>
                <div class="cta-buttons">
                    <a href="<?= url('contact.php') ?>" class="cta-button cta-primary">
                        <i class="fas fa-handshake"></i> Partner With Us
                    </a>
                    <a href="<?= url('volunteer.php') ?>" class="cta-button cta-secondary">
                        <i class="fas fa-hands-helping"></i> Volunteer Today
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Initialize AOS -->
<script>
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
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

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.leadership-hero');
    if (hero) {
        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Animate timeline items on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
        }
    });
}, observerOptions);

document.querySelectorAll('.timeline-item').forEach(item => {
    item.style.animationPlayState = 'paused';
    observer.observe(item);
});
</script>

<?php include '../app/views/layout/footer.php'; ?>