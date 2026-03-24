<?php
require_once '../app/config/config.php';

$pageTitle = "Our Achievements";
$pageDescription = "Explore the milestones and recognition achieved by Durga Saptashati Foundation over the years in our journey to serve humanity.";
$pageKeywords = "achievements, milestones, recognition, awards, impact, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Achievements</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('achievements.php') ?>">Achievements</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Achievements Section Start -->
<div class="achievements-page">
    <!-- Hero Section with Background -->
    <div class="achievements-hero">
        <div class="hero-bg-overlay"></div>
        <div class="container-fluid">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="hero-content">
                        <div class="hero-badge text-white">
                            <i class="fas fa-trophy"></i>
                            <p>Celebrating Excellence</p>
                        </div>
                        <h1>Our Journey of <span class="text-white">Impact & Recognition</span></h1>
                        <p>Milestones that define our commitment to transforming lives and empowering communities across
                            India</p>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <h3>50+</h3>
                                <span>Communities</span>
                            </div>
                            <div class="stat-item">
                                <h3>10K+</h3>
                                <span>Lives Changed</span>
                            </div>
                            <div class="stat-item">
                                <h3>200+</h3>
                                <span>Programs</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=500&fit=crop"
                            alt="Our Achievements">
                        <div class="floating-card">
                            <i class="fas fa-award"></i>
                            <h4>Award Winning NGO</h4>
                            <p>Recognized for Excellence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Achievements Gallery -->
    <div class="achievements-gallery">
        <div class="container-fluid">
            <!-- Main Achievement Showcase -->
            <div class="main-achievement" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="achievement-image">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&h=400&fit=crop"
                                alt="Major Achievement">
                            <div class="achievement-badge">
                                <i class="fas fa-medal"></i>
                                <span>2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-content  p-3">
                            <h3>Excellence in Community Service Award</h3>
                            <p>Recognized by the State Government for our outstanding contribution to women empowerment,
                                child education, skill development, and community welfare across 50+ villages in rural
                                India — creating opportunities, uplifting lives, fostering sustainable growth, and
                                inspiring a new generation to build a brighter future.</p>
                            <div class="achievement-details">
                                <div class="detail-item">
                                    <i class="fas fa-users"></i>
                                    <span>2000+ Women Empowered</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>1000+ Scholarships Awarded</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-heartbeat"></i>
                                    <span>200+ Medical Camps Organized</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievement Grid -->
            <div class="achievements-grid">
                <div class="achievement-card" data-aos="flip-up" data-aos-delay="100">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=400&h=250&fit=crop"
                            alt="Women Empowerment Award">
                        <div class="card-overlay">
                            <i class="fas fa-certificate"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h4>Best NGO for Women Empowerment</h4>
                        <p>Regional Social Welfare Board</p>
                        <span class="year-badge">2022</span>
                    </div>
                </div>

                <div class="achievement-card" data-aos="flip-up" data-aos-delay="200">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&h=250&fit=crop"
                            alt="Innovation Award">
                        <div class="card-overlay">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h4>Innovation in Social Impact</h4>
                        <p>National NGO Excellence Awards</p>
                        <span class="year-badge">2021</span>
                    </div>
                </div>

                <div class="achievement-card" data-aos="flip-up" data-aos-delay="300">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400&h=250&fit=crop"
                            alt="Partnership Award">
                        <div class="card-overlay">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                    <div class="card-content">
                        <h4>Outstanding Partnership Initiative</h4>
                        <p>Corporate Social Responsibility Board</p>
                        <span class="year-badge">2020</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Impact Timeline -->
    <div class="impact-timeline">
        <!-- Floating animated icons - Achievement themed -->
        <i class="fas fa-trophy floating-icon"></i>
        <i class="fas fa-medal floating-icon"></i>
        <i class="fas fa-award floating-icon"></i>
        <i class="fas fa-certificate floating-icon"></i>
        <i class="fas fa-star floating-icon"></i>
        <i class="fas fa-ribbon floating-icon"></i>
        <i class="fas fa-crown floating-icon"></i>
        <i class="fas fa-gem floating-icon"></i>
        <i class="fas fa-shield-alt floating-icon"></i>
        <i class="fas fa-scroll floating-icon"></i>
        <i class="fas fa-stamp floating-icon"></i>
        <i class="fas fa-file-certificate floating-icon"></i>
        <i class="fas fa-flag-checkered floating-icon"></i>
        <i class="fas fa-graduation-cap floating-icon"></i>
        <i class="fas fa-handshake floating-icon"></i>
        <i class="fas fa-hands-helping floating-icon"></i>
        <i class="fas fa-users floating-icon"></i>
        <i class="fas fa-chart-line floating-icon"></i>

        <!-- Pulse icons -->
        <i class="fas fa-bullseye pulse-icon"></i>
        <i class="fas fa-check-circle pulse-icon"></i>
        <i class="fas fa-thumbs-up pulse-icon"></i>
        <i class="fas fa-heart pulse-icon"></i>
        <i class="fas fa-fire pulse-icon"></i>
        <i class="fas fa-bolt pulse-icon"></i>

        <!-- Rotating icons -->
        <i class="fas fa-sun rotate-icon"></i>
        <i class="fas fa-compass rotate-icon"></i>
        <i class="fas fa-cog rotate-icon"></i>

        <div class="container-fluid">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2>Timeline of Impact</h2>
                <p>Key milestones in our journey of service</p>
                <div class="header-line"></div>
            </div>

            <div class="timeline-wrapper">
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <div class="timeline-image">
                            <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=300&h=200&fit=crop"
                                alt="2023 Achievement">
                        </div>
                        <h4>State Recognition & Expansion</h4>
                        <p>Received state government recognition and expanded to 50+ communities</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left" data-aos-delay="200">
                    <div class="timeline-year">2022</div>
                    <div class="timeline-content">
                        <div class="timeline-image">
                            <img src="https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=300&h=200&fit=crop"
                                alt="2022 Achievement">
                        </div>
                        <h4>Women Empowerment Excellence</h4>
                        <p>Awarded for empowering 2000+ women through skill development programs</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <div class="timeline-image">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=200&fit=crop"
                                alt="2021 Achievement">
                        </div>
                        <h4>Innovation & Technology</h4>
                        <p>Recognized for innovative approaches in community development and digital inclusion</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left" data-aos-delay="400">
                    <div class="timeline-year">2020</div>
                    <div class="timeline-content">
                        <div class="timeline-image">
                            <img src="https://images.unsplash.com/photo-1551836022-8b2858c9c69b?w=300&h=200&fit=crop"
                                alt="2020 Achievement">
                        </div>
                        <h4>Partnership Excellence</h4>
                        <p>Established strategic partnerships with 50+ organizations for greater impact</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recognition Wall -->
    <div class="recognition-wall">
        <div class="container-fluid">
            <div class="section-header text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2>Wall of Recognition</h2>
                <p>Certificates, awards, and acknowledgments we've received</p>
            </div>

            <div class="certificates-grid">
                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="100"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1551836022-8b2858c9c69b?w=600&h=400&fit=crop"
                            alt="Government Recognition Certificate">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-award"></i>
                                <h4>Official Recognition</h4>
                                <p>Certified excellence in social impact</p>
                            </div>
                        </div>
                    </div>
                    <h5>Government Recognition Certificate</h5>
                </div>

                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="200"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&h=400&fit=crop"
                            alt="Excellence in Social Service">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-medal"></i>
                                <h4>Service Excellence</h4>
                                <p>Outstanding community welfare achievements</p>
                            </div>
                        </div>
                    </div>
                    <h5>Excellence in Social Service</h5>
                </div>

                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="300"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=400&fit=crop"
                            alt="Community Development Award">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-trophy"></i>
                                <h4>Community Impact</h4>
                                <p>Transforming lives across rural India</p>
                            </div>
                        </div>
                    </div>
                    <h5>Community Development Award</h5>
                </div>

                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="400"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=600&h=400&fit=crop"
                            alt="Women Empowerment Recognition">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-crown"></i>
                                <h4>Women's Empowerment</h4>
                                <p>Empowering 2000+ women nationwide</p>
                            </div>
                        </div>
                    </div>
                    <h5>Women Empowerment Recognition</h5>
                </div>

                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="500"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600&h=400&fit=crop"
                            alt="Outstanding Leadership Award">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-star"></i>
                                <h4>Leadership Excellence</h4>
                                <p>Pioneering social change initiatives</p>
                            </div>
                        </div>
                    </div>
                    <h5>Outstanding Leadership Award</h5>
                </div>

                <div class="certificate-item" data-aos="zoom-in" data-aos-delay="600"
                    onclick="openCertificateModal(this)">
                    <div class="certificate-image">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&h=400&fit=crop"
                            alt="Best NGO Partnership Initiative">
                        <div class="certificate-overlay">
                            <div class="certificate-overlay-content">
                                <i class="fas fa-handshake"></i>
                                <h4>Partnership Success</h4>
                                <p>Building bridges for greater impact</p>
                            </div>
                        </div>
                    </div>
                    <h5>Best NGO Partnership Initiative</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="cta-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="cta-content text-center">
                <h2>Be Part of Our Next Achievement</h2>
                <p>Join us in creating more milestones and achieving greater impact in communities across India</p>
                <div class="cta-buttons">
                    <a href="<?= url('volunteer.php') ?>" class="cta-btn primary">
                        <i class="fas fa-hands-helping"></i>
                        Volunteer With Us
                    </a>
                    <a href="<?= url('donate.php') ?>" class="cta-btn secondary">
                        <i class="fas fa-heart"></i>
                        Support Our Cause
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Achievements Section End -->

<!-- Certificate Modal -->
<div id="certificateModal" class="certificate-modal" onclick="closeCertificateModal()">
    <div class="modal-content" onclick="event.stopPropagation()">
        <span class="modal-close" onclick="closeCertificateModal()">&times;</span>
        <img id="modalImage" src="" alt="">
        <div class="modal-navigation">
            <button class="nav-btn prev-btn" onclick="navigateCertificate(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="nav-btn next-btn" onclick="navigateCertificate(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<script>
let currentCertificateIndex = 0;
let certificates = [];

// Initialize certificates array
document.addEventListener('DOMContentLoaded', function() {
    const certificateItems = document.querySelectorAll('.certificate-item');
    certificates = Array.from(certificateItems).map(item => {
        const img = item.querySelector('img');
        return {
            src: img.src,
            alt: img.alt,
        };
    });
});

function openCertificateModal(certificateElement) {
    const img = certificateElement.querySelector('img');

    // Find current certificate index
    const certificateItems = document.querySelectorAll('.certificate-item');
    currentCertificateIndex = Array.from(certificateItems).indexOf(certificateElement);

    document.getElementById('modalImage').src = img.src;
    document.getElementById('modalImage').alt = img.alt;

    document.getElementById('certificateModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeCertificateModal() {
    document.getElementById('certificateModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function navigateCertificate(direction) {
    currentCertificateIndex += direction;

    if (currentCertificateIndex < 0) {
        currentCertificateIndex = certificates.length - 1;
    } else if (currentCertificateIndex >= certificates.length) {
        currentCertificateIndex = 0;
    }

    const certificate = certificates[currentCertificateIndex];
    document.getElementById('modalImage').src = certificate.src;
    document.getElementById('modalImage').alt = certificate.alt;
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCertificateModal();
    } else if (e.key === 'ArrowLeft') {
        navigateCertificate(-1);
    } else if (e.key === 'ArrowRight') {
        navigateCertificate(1);
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>