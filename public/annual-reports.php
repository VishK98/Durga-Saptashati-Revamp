<?php
require_once '../app/config/config.php';

$pageTitle = "Annual Reports & Impact Documentation";
$pageDescription = "Explore comprehensive annual reports showcasing Durga Saptashati Foundation's yearly impact, financial transparency, program outcomes, and organizational growth.";
$pageKeywords = "annual reports, impact reports, transparency, financial statements, program outcomes, yearly activities, organizational development, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Annual Reports Page -->
<link rel="stylesheet" href="<?= url('assets/css/about-us/annual-reports.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Annual Reports & Impact Documentation</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('annual-reports.php') ?>">Annual Reports</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="reports-hero">
    <div class="hero-pattern"></div>
    <div class="container-fluid">
        <div class="row align-items-center min-vh-60">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-chart-line"></i>
                        <span>Transparency & Accountability</span>
                    </div>
                    <h1 class="hero-title">
                        Our Journey in 
                        <span class="gradient-text">Numbers</span>
                    </h1>
                    <p class="hero-description">
                        Comprehensive annual documentation showcasing our impact, growth, and commitment 
                        to transparency. Each report reflects our dedication to meaningful change and 
                        accountable stewardship of resources.
                    </p>
                    <div class="hero-stats">
                        <div class="stat-card">
                            <div class="stat-number" data-counter="6">0</div>
                            <div class="stat-label">Years of Impact</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number" data-counter="100">0</div>
                            <div class="stat-label">% Transparency</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number" data-counter="50000">0</div>
                            <div class="stat-label">Lives Touched</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="hero-visual">
                    <div class="floating-reports">
                        <div class="report-float report-float-1">
                            <i class="fas fa-file-contract"></i>
                            <span>2024 Report</span>
                        </div>
                        <div class="report-float report-float-2">
                            <i class="fas fa-chart-bar"></i>
                            <span>Impact Analysis</span>
                        </div>
                        <div class="report-float report-float-3">
                            <i class="fas fa-coins"></i>
                            <span>Financial Report</span>
                        </div>
                    </div>
                    <div class="hero-image-container">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=600&h=400&fit=crop" 
                             alt="Annual Reports and Documentation" 
                             class="hero-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reports Archive Section -->
<section class="reports-archive">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="1000">
            <span class="section-tag">Documentation Archive</span>
            <h2 class="section-title">Annual Reports Collection</h2>
            <p class="section-subtitle">
                Access our comprehensive collection of yearly reports, each telling the story of our growth, 
                impact, and commitment to transparency in social development.
            </p>
        </div>

        <!-- Reports Timeline -->
        <div class="reports-timeline" data-aos="fade-up" data-aos-delay="300">
            <!-- 2024 Report -->
            <div class="timeline-item active" data-year="2024">
                <div class="timeline-marker">
                    <div class="marker-dot"></div>
                    <div class="marker-year">2024</div>
                </div>
                <div class="timeline-content">
                    <div class="report-card featured">
                        <div class="report-header">
                            <div class="report-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="report-meta">
                                <h3>Annual Impact Report 2024</h3>
                                <p class="report-status preparing">In Preparation</p>
                                <span class="report-date">Expected: March 2025</span>
                            </div>
                        </div>
                        <div class="report-body">
                            <p class="report-description">
                                Our most comprehensive report yet, featuring expanded community programs, 
                                digital initiatives, and measurable impact across 50+ villages.
                            </p>
                            <div class="report-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-users"></i>
                                    <span>25,000+ Beneficiaries</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>1,500 Students Supported</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-heartbeat"></i>
                                    <span>200+ Medical Camps</span>
                                </div>
                            </div>
                        </div>
                        <div class="report-footer">
                            <button class="btn-report disabled">
                                <i class="fas fa-clock"></i>
                                Coming Soon
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2023 Report -->
            <div class="timeline-item" data-year="2023">
                <div class="timeline-marker">
                    <div class="marker-dot"></div>
                    <div class="marker-year">2023</div>
                </div>
                <div class="timeline-content">
                    <div class="report-card">
                        <div class="report-header">
                            <div class="report-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="report-meta">
                                <h3>Excellence in Service - Annual Report 2023</h3>
                                <p class="report-status available">Available</p>
                                <span class="report-date">Published: April 2024</span>
                            </div>
                        </div>
                        <div class="report-body">
                            <p class="report-description">
                                A landmark year marked by government recognition, expanded partnerships, 
                                and innovative approaches to community development.
                            </p>
                            <div class="report-stats">
                                <div class="stat-pill">
                                    <span class="stat-value">₹2.5Cr</span>
                                    <span class="stat-label">Programs Funded</span>
                                </div>
                                <div class="stat-pill">
                                    <span class="stat-value">95%</span>
                                    <span class="stat-label">Fund Utilization</span>
                                </div>
                                <div class="stat-pill">
                                    <span class="stat-value">40+</span>
                                    <span class="stat-label">New Initiatives</span>
                                </div>
                            </div>
                        </div>
                        <div class="report-footer">
                            <button class="btn-report primary" onclick="openReportModal('2023')">
                                <i class="fas fa-download"></i>
                                Download Report
                            </button>
                            <button class="btn-report secondary" onclick="previewReport('2023')">
                                <i class="fas fa-eye"></i>
                                Quick Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2022 Report -->
            <div class="timeline-item" data-year="2022">
                <div class="timeline-marker">
                    <div class="marker-dot"></div>
                    <div class="marker-year">2022</div>
                </div>
                <div class="timeline-content">
                    <div class="report-card">
                        <div class="report-header">
                            <div class="report-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="report-meta">
                                <h3>Growth & Expansion Report 2022</h3>
                                <p class="report-status available">Available</p>
                                <span class="report-date">Published: March 2023</span>
                            </div>
                        </div>
                        <div class="report-body">
                            <p class="report-description">
                                Documenting our strategic expansion into rural areas and the launch of 
                                women empowerment programs that reached thousands of beneficiaries.
                            </p>
                            <div class="report-metrics">
                                <div class="metric-box">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <div>
                                        <strong>35 Villages</strong>
                                        <span>Program Coverage</span>
                                    </div>
                                </div>
                                <div class="metric-box">
                                    <i class="fas fa-female"></i>
                                    <div>
                                        <strong>2,000 Women</strong>
                                        <span>Empowered</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="report-footer">
                            <button class="btn-report primary" onclick="openReportModal('2022')">
                                <i class="fas fa-download"></i>
                                Download Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2021 Report -->
            <div class="timeline-item" data-year="2021">
                <div class="timeline-marker">
                    <div class="marker-dot"></div>
                    <div class="marker-year">2021</div>
                </div>
                <div class="timeline-content">
                    <div class="report-card">
                        <div class="report-header">
                            <div class="report-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="report-meta">
                                <h3>Pandemic Response & Resilience 2021</h3>
                                <p class="report-status available">Available</p>
                                <span class="report-date">Published: February 2022</span>
                            </div>
                        </div>
                        <div class="report-body">
                            <p class="report-description">
                                Our response to the global pandemic, emergency relief programs, and 
                                adaptation of services to meet unprecedented community needs.
                            </p>
                        </div>
                        <div class="report-footer">
                            <button class="btn-report primary" onclick="openReportModal('2021')">
                                <i class="fas fa-download"></i>
                                Download Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earlier Years -->
            <div class="timeline-item" data-year="historical">
                <div class="timeline-marker">
                    <div class="marker-dot historical"></div>
                    <div class="marker-year">2019-20</div>
                </div>
                <div class="timeline-content">
                    <div class="report-card compact">
                        <div class="report-header">
                            <div class="report-icon">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="report-meta">
                                <h3>Foundation Years Archive</h3>
                                <p class="report-status archived">Historical Archive</p>
                            </div>
                        </div>
                        <div class="report-body">
                            <p class="report-description">
                                Early reports from our foundation years, documenting our initial programs 
                                and community engagement efforts.
                            </p>
                        </div>
                        <div class="report-footer">
                            <button class="btn-report secondary" onclick="showArchive()">
                                <i class="fas fa-folder-open"></i>
                                View Archive
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Metrics Dashboard -->
<section class="metrics-dashboard">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-tag">Impact Metrics</span>
            <h2 class="section-title">Our Progress at a Glance</h2>
            <p class="section-subtitle">
                Key performance indicators that demonstrate our consistent growth and expanding impact 
                across communities, programs, and beneficiaries.
            </p>
        </div>

        <div class="metrics-grid" data-aos="fade-up" data-aos-delay="300">
            <div class="metric-card" data-aos="zoom-in" data-aos-delay="100">
                <div class="metric-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="metric-content">
                    <div class="metric-number" data-counter="50000">0</div>
                    <div class="metric-label">Total Beneficiaries</div>
                    <div class="metric-trend positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+25% from last year</span>
                    </div>
                </div>
            </div>

            <div class="metric-card" data-aos="zoom-in" data-aos-delay="200">
                <div class="metric-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="metric-content">
                    <div class="metric-number" data-counter="75">0</div>
                    <div class="metric-label">Communities Served</div>
                    <div class="metric-trend positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+40% expansion</span>
                    </div>
                </div>
            </div>

            <div class="metric-card" data-aos="zoom-in" data-aos-delay="300">
                <div class="metric-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="metric-content">
                    <div class="metric-number" data-counter="5000">0</div>
                    <div class="metric-label">Students Supported</div>
                    <div class="metric-trend positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+30% growth</span>
                    </div>
                </div>
            </div>

            <div class="metric-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="metric-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <div class="metric-content">
                    <div class="metric-number" data-counter="200">0</div>
                    <div class="metric-label">Active Programs</div>
                    <div class="metric-trend positive">
                        <i class="fas fa-arrow-up"></i>
                        <span>+50% increase</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Report Preview Modal -->
<div id="reportModal" class="report-modal">
    <div class="modal-backdrop" onclick="closeReportModal()"></div>
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Annual Report Preview</h3>
            <button class="modal-close" onclick="closeReportModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="report-preview-content">
                <div class="preview-placeholder">
                    <div class="preview-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 id="previewTitle">Report Preview</h4>
                    <p id="previewDescription">Loading report preview...</p>
                    <div class="preview-stats">
                        <div class="preview-stat">
                            <span class="stat-label">Pages:</span>
                            <span class="stat-value" id="previewPages">--</span>
                        </div>
                        <div class="preview-stat">
                            <span class="stat-label">Size:</span>
                            <span class="stat-value" id="previewSize">--</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal secondary" onclick="closeReportModal()">Close</button>
            <button class="btn-modal primary" id="downloadBtn">
                <i class="fas fa-download"></i>
                Download Full Report
            </button>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="reports-cta">
    <div class="cta-background"></div>
    <div class="container-fluid">
        <div class="cta-content" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Stay Updated with Our Latest Reports</h2>
                    <p class="cta-description">
                        Subscribe to receive notifications when new annual reports are published, 
                        along with quarterly updates and impact summaries.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="cta-actions">
                        <a href="<?= url('newsletter.php') ?>" class="btn-cta primary">
                            <i class="fas fa-bell"></i>
                            <span>Subscribe for Updates</span>
                        </a>
                        <a href="<?= url('contact.php') ?>" class="btn-cta secondary">
                            <i class="fas fa-envelope"></i>
                            <span>Contact Us</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Interactive Features -->
<script>
// Initialize AOS
document.addEventListener('DOMContentLoaded', function() {
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
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));
});

// Report Modal Functions
function openReportModal(year) {
    const modal = document.getElementById('reportModal');
    const title = document.getElementById('modalTitle');
    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewPages = document.getElementById('previewPages');
    const previewSize = document.getElementById('previewSize');
    
    const reportData = {
        '2023': {
            title: 'Annual Impact Report 2023',
            description: 'Comprehensive overview of our achievements, financial statements, and program outcomes for 2023.',
            pages: '84',
            size: '12.5 MB'
        },
        '2022': {
            title: 'Growth & Expansion Report 2022',
            description: 'Detailed documentation of our strategic expansion and new program initiatives.',
            pages: '72',
            size: '9.8 MB'
        },
        '2021': {
            title: 'Pandemic Response & Resilience 2021',
            description: 'Our emergency response programs and community support during the global pandemic.',
            pages: '68',
            size: '8.2 MB'
        }
    };
    
    const report = reportData[year];
    if (report) {
        title.textContent = report.title;
        previewTitle.textContent = report.title;
        previewDescription.textContent = report.description;
        previewPages.textContent = report.pages;
        previewSize.textContent = report.size;
    }
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function previewReport(year) {
    openReportModal(year);
}

function closeReportModal() {
    const modal = document.getElementById('reportModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

function showArchive() {
    alert('Historical archive will be available soon. Contact us for specific year requests.');
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeReportModal();
    }
});

// Smooth scroll for timeline navigation
document.querySelectorAll('.timeline-item').forEach(item => {
    item.addEventListener('click', function() {
        const year = this.getAttribute('data-year');
        // Add active state
        document.querySelectorAll('.timeline-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>