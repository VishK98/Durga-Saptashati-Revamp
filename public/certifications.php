<?php
require_once '../app/config/config.php';

$pageTitle = "Certifications & Accreditations";
$pageDescription = "Discover our comprehensive certifications, accreditations, and compliance standards that validate our commitment to excellence and transparency in social impact initiatives.";
$pageKeywords = "certifications, accreditations, compliance, ISO standards, quality assurance, transparency, social impact, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Certifications Page -->
<link rel="stylesheet" href="<?= url('assets/css/about-us/certifications.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Certifications & Accreditations</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('certifications.php') ?>">Certifications</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="certifications-hero">
    <div class="hero-background">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="hero-badge" data-aos="zoom-in">
                        <i class="fas fa-award"></i>
                        <span>Certified Excellence</span>
                    </div>
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="200">
                        Trusted Standards, <br>
                        <span class="highlight">Verified Impact</span>
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="400">
                        Our certifications reflect our unwavering commitment to transparency, accountability,
                        and excellence in delivering sustainable social impact across communities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certification Categories -->
<section class="certification-categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5">
                <div class=" text-center" data-aos="fade-up">
                    <span class="section-tag">Standards of Excellence</span>
                    <h2 class="section-title">Our Certification Portfolio</h2>
                    <p class="section-subtitle">
                        Comprehensive accreditations spanning quality management, social responsibility,
                        environmental stewardship, and operational excellence.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5 justify-content-center">
            <!-- Quality Management -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3 class="category-title">Quality Management</h3>
                    <div class="category-count">8</div>
                    <p class="category-description">
                        ISO standards and quality assurance certifications ensuring excellence in all operations and
                        service delivery.
                    </p>
                    <div class="category-link">
                        <span>View Certifications</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <!-- Social Responsibility -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="category-title">Social Responsibility</h3>
                    <div class="category-count">12</div>
                    <p class="category-description">
                        Comprehensive CSR and social impact certifications validating our community initiatives and
                        ethical practices.
                    </p>
                    <div class="category-link">
                        <span>View Certifications</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <!-- Environmental Standards -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="category-title">Environmental Standards</h3>
                    <div class="category-count">9</div>
                    <p class="category-description">
                        Green certifications and environmental compliance standards promoting sustainable and
                        eco-friendly practices.
                    </p>
                    <div class="category-link">
                        <span>View Certifications</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wall of Recognition -->
<section class="wall-of-recognition">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center" data-aos="fade-up">
                    <span class="section-tag">Wall of Recognition</span>
                    <h2 class="section-title">Certificates, Awards & Acknowledgments</h2>
                    <p class="section-subtitle"> A collection of our achievements, recognitions, and certifications
                        reflecting our commitment to excellence and social impact.
                    </p>
                </div>
            </div>
        </div>

        <div class="wall-container">
            <div class="certificates-list">
                <div class="row g-4">
                    <!-- Certificate 1 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="certificate-item" data-certificate="iso-9001">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="ISO 9001:2015 Certificate">
                                <div class="certificate-badge">
                                    <span>VERIFIED</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>ISO 9001:2015</h4>
                                <p>Quality Management Systems</p>
                                <span class="certificate-year">2024</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 2 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="certificate-item" data-certificate="fcra">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="FCRA Registration">
                                <div class="certificate-badge">
                                    <span>ACTIVE</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>FCRA Registration</h4>
                                <p>Ministry of Home Affairs</p>
                                <span class="certificate-year">2023</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 3 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="certificate-item" data-certificate="80g">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="80G Tax Exemption">
                                <div class="certificate-badge">
                                    <span>APPROVED</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>80G Tax Exemption</h4>
                                <p>Income Tax Department</p>
                                <span class="certificate-year">2022</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 4 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="certificate-item" data-certificate="guidestar">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="GuideStar Platinum Seal">
                                <div class="certificate-badge platinum">
                                    <span>PLATINUM</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>GuideStar India</h4>
                                <p>Platinum Transparency Seal</p>
                                <span class="certificate-year">2024</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 5 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="certificate-item" data-certificate="iso-14001">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="ISO 14001:2015 Certificate">
                                <div class="certificate-badge">
                                    <span>CERTIFIED</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>ISO 14001:2015</h4>
                                <p>Environmental Management</p>
                                <span class="certificate-year">2024</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 6 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="certificate-item" data-certificate="csr">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="CSR-1 Registration">
                                <div class="certificate-badge">
                                    <span>REGISTERED</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>CSR-1 Registration</h4>
                                <p>Corporate Social Responsibility</p>
                                <span class="certificate-year">2023</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 7 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="certificate-item" data-certificate="excellence">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="Excellence Award">
                                <div class="certificate-badge award">
                                    <span>AWARD</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>Excellence Award</h4>
                                <p>Social Impact Recognition</p>
                                <span class="certificate-year">2023</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate 8 -->
                    <div class="col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="800">
                        <div class="certificate-item" data-certificate="community">
                            <div class="certificate-thumbnail">
                                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&h=200&q=80"
                                    alt="Community Service Award">
                                <div class="certificate-badge award">
                                    <span>AWARD</span>
                                </div>
                                <div class="view-overlay">
                                    <i class="fas fa-search-plus"></i>
                                    <span>View Certificate</span>
                                </div>
                            </div>
                            <div class="certificate-details">
                                <h4>Community Service Award</h4>
                                <p>Outstanding Contribution</p>
                                <span class="certificate-year">2022</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="wall-stats" data-aos="fade-up" data-aos-delay="1000">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-number" data-counter="8">0</div>
                                <div class="stat-label">Total Certifications</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-counter="5">0</div>
                                <div class="stat-label">Awards Received</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-counter="6">0</div>
                                <div class="stat-label">Years of Excellence</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number" data-counter="100">0</div>
                                <div class="stat-label">% Compliance Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Preview Modal -->
<div id="certificateModal" class="certificate-modal" onclick="closeCertificateModal()">
    <div class="modal-overlay">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button class="modal-close" id="closeModal" onclick="closeCertificateModal()">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-header">
                <h3 id="modalTitle">Certificate Preview</h3>
                <p id="modalSubtitle">Click to view full size</p>
            </div>
            <div class="modal-body">
                <div class="certificate-preview">
                    <img id="modalImage" src="" alt="Certificate Preview">
                    <div class="certificate-info-modal">
                        <div class="info-item">
                            <i class="fas fa-certificate"></i>
                            <span id="modalCertName">Certificate Name</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-building"></i>
                            <span id="modalIssuer">Issued By</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span id="modalDate">Issue Date</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-check-circle"></i>
                            <span id="modalStatus">Status</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-download">
                    <i class="fas fa-download"></i>
                    Download Certificate
                </button>
            </div>
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
</div>

<!-- Call to Action -->
<section class="certification-cta">
    <div class="container">
        <div class="cta-content" data-aos="zoom-in">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Partner with a Certified Organization</h2>
                    <p class="cta-subtitle">
                        Our comprehensive certifications ensure that your partnership with us meets
                        the highest standards of accountability, transparency, and impact delivery.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= url('contact.php') ?>" class="btn btn-cta">
                        <span>Get In Touch</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script>
// Wait for the page to fully load before checking AOS
window.addEventListener('load', function() {
    // AOS is initialized in footer.php, just refresh it if needed
    if (typeof AOS !== 'undefined') {
        AOS.refresh();
    }
});

// Counter Animation
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
            }, 20);

            counterObserver.unobserve(counter);
        }
    });
}, observerOptions);

counters.forEach(counter => counterObserver.observe(counter));

// Category Card Interactions
const categoryCards = document.querySelectorAll('.category-card');
categoryCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Certificate Modal Variables
let currentCertificateIndex = 0;
let certificates = [];

// Initialize certificates array - wait for AOS to finish
document.addEventListener('DOMContentLoaded', function() {
    // Wait a bit for AOS to initialize
    setTimeout(function() {
        const certificateItems = document.querySelectorAll('.certificate-item');

        certificates = Array.from(certificateItems).map(item => {
            const img = item.querySelector('img');
            const title = item.querySelector('h4').textContent;
            const description = item.querySelector('p').textContent;
            return {
                src: img.src,
                alt: img.alt,
                title: title,
                description: description,
                certificateId: item.getAttribute('data-certificate')
            };
        });

        // Add click event listeners to certificate items
        certificateItems.forEach((item, index) => {
            // Make sure the entire certificate item is clickable
            item.style.cursor = 'pointer';

            // Add click event to the certificate item
            item.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openCertificateModal(this);
            });

            // Also add click events to child elements to ensure it works
            const thumbnail = item.querySelector('.certificate-thumbnail');
            const details = item.querySelector('.certificate-details');
            const overlay = item.querySelector('.view-overlay');

            [thumbnail, details, overlay].forEach(element => {
                if (element) {
                    element.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        openCertificateModal(item);
                    });
                    element.style.cursor = 'pointer';
                }
            });
        });

        // Certificate modal initialization complete
    }, 500); // Wait 500ms for AOS to initialize
});

// Certificate data for modal details
const certificateData = {
    'iso-9001': {
        title: 'ISO 9001:2015 Certificate',
        subtitle: 'Quality Management Systems Certification',
        name: 'ISO 9001:2015',
        issuer: 'ISO International Organization',
        date: 'December 2024',
        status: 'Active & Verified'
    },
    'fcra': {
        title: 'FCRA Registration Certificate',
        subtitle: 'Foreign Contribution Regulation Act',
        name: 'FCRA Registration',
        issuer: 'Ministry of Home Affairs, India',
        date: 'March 2023',
        status: 'Active & Valid'
    },
    '80g': {
        title: '80G Tax Exemption Certificate',
        subtitle: 'Income Tax Deduction Certificate',
        name: '80G Tax Exemption',
        issuer: 'Income Tax Department, India',
        date: 'Ongoing - Perpetual',
        status: 'Approved & Active'
    },
    'guidestar': {
        title: 'GuideStar Platinum Seal',
        subtitle: 'Highest Level Transparency Certification',
        name: 'GuideStar India Platinum',
        issuer: 'GuideStar India',
        date: 'June 2024',
        status: 'Platinum Level'
    },
    'iso-14001': {
        title: 'ISO 14001:2015 Certificate',
        subtitle: 'Environmental Management Systems',
        name: 'ISO 14001:2015',
        issuer: 'ISO International Organization',
        date: 'September 2024',
        status: 'Certified & Active'
    },
    'csr': {
        title: 'CSR-1 Registration',
        subtitle: 'Corporate Social Responsibility',
        name: 'CSR-1 Registration',
        issuer: 'Ministry of Corporate Affairs',
        date: 'Ongoing Registration',
        status: 'Registered & Active'
    },
    'excellence': {
        title: 'Excellence Award',
        subtitle: 'Social Impact Recognition',
        name: 'Excellence in Social Impact',
        issuer: 'National Social Impact Council',
        date: 'December 2023',
        status: 'Award Recipient'
    },
    'community': {
        title: 'Community Service Award',
        subtitle: 'Outstanding Community Contribution',
        name: 'Community Service Excellence',
        issuer: 'Community Development Ministry',
        date: 'August 2022',
        status: 'Award Winner'
    }
};

function openCertificateModal(certificateElement) {
    const img = certificateElement.querySelector('img');
    const certificateId = certificateElement.getAttribute('data-certificate');
    const data = certificateData[certificateId];

    // Find current certificate index
    const certificateItems = document.querySelectorAll('.certificate-item');
    currentCertificateIndex = Array.from(certificateItems).indexOf(certificateElement);

    // Update modal content
    const modalImage = document.getElementById('modalImage');
    const modal = document.getElementById('certificateModal');

    if (!modalImage || !modal) {
        return;
    }

    modalImage.src = img.src;
    modalImage.alt = img.alt;

    if (data) {
        document.getElementById('modalTitle').textContent = data.title;
        document.getElementById('modalSubtitle').textContent = data.subtitle;
        document.getElementById('modalCertName').textContent = data.name;
        document.getElementById('modalIssuer').textContent = data.issuer;
        document.getElementById('modalDate').textContent = data.date;
        document.getElementById('modalStatus').textContent = data.status;
    }

    modal.style.display = 'flex';
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
    const certificateId = certificate.certificateId;
    const data = certificateData[certificateId];

    document.getElementById('modalImage').src = certificate.src;
    document.getElementById('modalImage').alt = certificate.alt;

    if (data) {
        document.getElementById('modalTitle').textContent = data.title;
        document.getElementById('modalSubtitle').textContent = data.subtitle;
        document.getElementById('modalCertName').textContent = data.name;
        document.getElementById('modalIssuer').textContent = data.issuer;
        document.getElementById('modalDate').textContent = data.date;
        document.getElementById('modalStatus').textContent = data.status;
    }
}

// Close modal with Escape key and navigation
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('certificateModal');
    if (modal.style.display === 'flex') {
        if (e.key === 'Escape') {
            closeCertificateModal();
        } else if (e.key === 'ArrowLeft') {
            navigateCertificate(-1);
        } else if (e.key === 'ArrowRight') {
            navigateCertificate(1);
        }
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>