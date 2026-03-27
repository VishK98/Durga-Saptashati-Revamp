<?php
require_once '../app/config/config.php';

$pageTitle = "Our Investors";
$pageDescription = "Meet our valued investors who believe in our mission to create lasting social impact through sustainable initiatives and community empowerment.";
$pageKeywords = "investors, stakeholders, social impact, funding, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Our Investors Page -->
<link rel="stylesheet" href="<?= url('assets/css/about-us/our-investors.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Investors</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
                <a href="<?= url('our-investors.php') ?>">Investors</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Image Section -->
<section class="investor-hero">
    <div class="hero-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title" data-aos="fade-up">Building Tomorrow Together</h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Backed by visionary investors who
                        share our commitment to driving innovation and sustainable social impact across communities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Financial Reports Section -->
<section class="investor-categories py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-tag">Transparency</span>
            <h2 class="section-title">Financial Reports</h2>
            <p class="section-subtitle">
                We believe in complete transparency. View and download our audited financial reports.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $reports = [
                ['title' => 'Financials AY. 2021-22', 'file' => 'DSF - Audit Report 21-22.pdf', 'icon' => 'fa-file-pdf', 'delay' => 100],
                ['title' => 'Financials AY. 2022-23', 'file' => 'DSF - Audit Report 22-23.pdf', 'icon' => 'fa-file-invoice-dollar', 'delay' => 200],
                ['title' => 'Financials AY. 2023-24', 'file' => 'DSF - Audit Report 23-24.pdf', 'icon' => 'fa-balance-scale', 'delay' => 300],
                ['title' => 'Financials AY. 2024-25', 'file' => 'DSF - Audit Report 24-25.pdf', 'icon' => 'fa-receipt', 'delay' => 400],
            ];
            foreach ($reports as $i => $report):
            ?>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $report['delay'] ?>">
                <div onclick="openPdfModal('<?= url('assets/reports/' . rawurlencode($report['file'])) ?>', '<?= addslashes($report['title']) ?>')"
                    style="cursor:pointer;background:rgba(255,255,255,0.06);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:35px 25px;text-align:center;transition:all 0.4s ease;height:100%;"
                    onmouseover="this.style.transform='translateY(-8px)';this.style.borderColor='#f26522';this.style.background='rgba(255,255,255,0.1)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='rgba(255,255,255,0.06)'">
                    <div
                        style="width:70px;height:70px;margin:0 auto 20px;background:linear-gradient(145deg,#c94a0f,#f26522);border-radius:18px;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 30px rgba(242,101,34,0.3);">
                        <i class="fas <?= $report['icon'] ?>" style="font-size:1.8rem;color:#fff;"></i>
                    </div>
                    <h5 style="color:#fff;font-weight:700;font-size:1rem;margin-bottom:8px;">
                        <?= htmlspecialchars($report['title']) ?></h5>
                    <p style="color:rgba(255,255,255,0.6);font-size:0.85rem;margin-bottom:15px;">Audit Report</p>
                    <span
                        style="display:inline-flex;align-items:center;gap:6px;color:#f26522;font-size:0.85rem;font-weight:600;">
                        <i class="fas fa-eye"></i> View PDF
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PDF Viewer Modal -->
<div id="pdfModal"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(6px);">
    <div
        style="background:#1a1b2e;border-radius:16px;width:95%;max-width:1000px;height:90vh;display:flex;flex-direction:column;position:relative;box-shadow:0 25px 60px rgba(0,0,0,0.5);animation:pdfModalIn 0.3s ease;">
        <!-- Modal Header -->
        <div
            style="padding:18px 24px;border-bottom:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:space-between;flex-shrink:0;">
            <div style="display:flex;align-items:center;gap:12px;">
                <div
                    style="width:40px;height:40px;background:linear-gradient(145deg,#c94a0f,#f26522);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-file-pdf" style="color:#fff;font-size:1.1rem;"></i>
                </div>
                <div>
                    <h5 id="pdfModalTitle" style="color:#fff;font-weight:700;margin:0;font-size:1rem;">Document</h5>
                    <small style="color:rgba(255,255,255,0.5);font-size:0.78rem;">Durga Saptashati Foundation</small>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
                <a id="pdfDownloadBtn" href="#" download
                    style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:10px 22px;border-radius:10px;font-size:0.85rem;font-weight:600;text-decoration:none;transition:all 0.2s;"
                    onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                    <i class="fas fa-download"></i> Download
                </a>
                <button onclick="closePdfModal()"
                    style="background:rgba(255,255,255,0.1);border:none;width:40px;height:40px;border-radius:10px;cursor:pointer;color:#fff;font-size:1.2rem;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
                    onmouseover="this.style.background='rgba(239,68,68,0.3)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
            </div>
        </div>
        <!-- PDF Viewer -->
        <div style="flex:1;overflow:hidden;border-radius:0 0 16px 16px;">
            <iframe id="pdfViewer" src="" style="width:100%;height:100%;border:none;background:#fff;"></iframe>
        </div>
    </div>
</div>

<style>
@keyframes pdfModalIn {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(20px);
    }

    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}
</style>

<script>
function openPdfModal(url, title) {
    document.getElementById('pdfModalTitle').textContent = title;
    document.getElementById('pdfViewer').src = url;
    document.getElementById('pdfDownloadBtn').href = url;
    document.getElementById('pdfModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closePdfModal() {
    document.getElementById('pdfModal').style.display = 'none';
    document.getElementById('pdfViewer').src = '';
    document.body.style.overflow = '';
}
document.getElementById('pdfModal').addEventListener('click', function(e) {
    if (e.target === this) closePdfModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePdfModal();
});
</script>

<!-- Impact Metrics -->
<section class="impact-metrics py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="metrics-content">
                    <span class="section-tag">Impact at Scale</span>
                    <h2 class="mb-4">Transforming Lives Through Strategic Investment</h2>
                    <p class="mb-5">
                        Every investment creates a ripple effect of positive change, touching thousands of lives
                        and building sustainable communities for future generations.
                    </p>

                    <div class="metric-grid">
                        <div class="metric-item">
                            <div class="metric-icon"><i class="fas fa-graduation-cap"></i></div>
                            <div class="metric-info">
                                <h4>Education</h4>
                                <p>50+ students educated</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon"><i class="fas fa-heartbeat"></i></div>
                            <div class="metric-info">
                                <h4>Healthcare</h4>
                                <p>100+ lives impacted</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon"><i class="fas fa-home"></i></div>
                            <div class="metric-info">
                                <h4>Livelihood</h4>
                                <p>10+ jobs created</p>
                            </div>
                        </div>
                        <div class="metric-item">
                            <div class="metric-icon"><i class="fas fa-seedling"></i></div>
                            <div class="metric-info">
                                <h4>Environment</h4>
                                <p>500+ trees planted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="metrics-visual">
                    <div class="impact-chart-container">
                        <div class="chart-header">
                            <h3>Impact Distribution</h3>
                            <p>How we transform communities</p>
                        </div>
                        <div class="progress-chart">
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="100">
                                <div class="progress-info"><span class="progress-label">Education</span><span
                                        class="progress-value">30%</span></div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 30%; background: #f26522;"></div>
                                </div>
                                <small>50+ students educated</small>
                            </div>
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="200">
                                <div class="progress-info"><span class="progress-label">Healthcare</span><span
                                        class="progress-value">25%</span></div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 25%; background: #c94a0f;"></div>
                                </div>
                                <small>100+ lives impacted</small>
                            </div>
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="300">
                                <div class="progress-info"><span class="progress-label">Livelihood</span><span
                                        class="progress-value">20%</span></div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 20%; background: #ff8c42;"></div>
                                </div>
                                <small>10+ jobs created</small>
                            </div>
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="400">
                                <div class="progress-info"><span class="progress-label">Environment</span><span
                                        class="progress-value">15%</span></div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 15%; background: #0d0e14;"></div>
                                </div>
                                <small>500+ trees planted</small>
                            </div>
                            <div class="progress-item" data-aos="fade-left" data-aos-delay="500">
                                <div class="progress-info"><span class="progress-label">Women Empowerment</span><span
                                        class="progress-value">10%</span></div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 10%; background: #6c757d;"></div>
                                </div>
                                <small>20+ women empowered</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="investor-cta py-5">
    <div class="container">
        <div class="cta-wrapper" data-aos="zoom-in">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Invest in Change</h2>
                    <p class="cta-subtitle">
                        Join our mission to create sustainable social impact and transform communities across India
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= url('contact.php') ?>" class="btn btn-cta">
                        <span>Get in Touch</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Animated Progress Bars
var progressBars = document.querySelectorAll('.progress-fill');
var progressObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            var fill = entry.target;
            var target = fill.style.width;
            fill.style.width = '0%';
            setTimeout(function() {
                fill.style.width = target;
            }, 200);
            progressObserver.unobserve(fill);
        }
    });
}, {
    threshold: 0.5
});
progressBars.forEach(function(bar) {
    progressObserver.observe(bar);
});
</script>

<?php include '../app/views/layout/footer.php'; ?>