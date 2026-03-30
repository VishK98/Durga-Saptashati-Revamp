<?php
require_once '../app/config/config.php';
$pageTitle = "Investors & Financial Transparency";
$pageDescription = "Durga Saptashati Foundation's financial transparency — view audited reports, impact distribution, and how your investment transforms communities.";
$pageKeywords = "financial transparency, audit reports, investors, NGO finances, impact report, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/about.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Investors & Transparency</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('investor.php') ?>">Investors</a>
            </div>
        </div>
    </div>
</div>

<!-- Financial Reports Section -->
<section class="abt-section abt-section--dark" style="margin-bottom:0;">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center abt-section-label--light">
                <i class="fas fa-shield-alt"></i>
                <span>Transparency</span>
            </div>
            <h2 class="abt-section-title" style="color:#fff;">Our Investors & Financial Reports</h2>
            <p class="abt-section-subtitle" style="color:rgba(255,255,255,0.7);">We believe in complete transparency. View and download our audited financial reports.</p>
        </div>

        <div class="row justify-content-center mb-5">
            <?php
            $reports = [
                ['title' => 'Financials AY. 2021-22', 'file' => 'DSF - Audit Report 21-22.pdf', 'icon' => 'fa-file-pdf'],
                ['title' => 'Financials AY. 2022-23', 'file' => 'DSF - Audit Report 22-23.pdf', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Financials AY. 2023-24', 'file' => 'DSF - Audit Report 23-24.pdf', 'icon' => 'fa-balance-scale'],
                ['title' => 'Financials AY. 2024-25', 'file' => 'DSF - Audit Report 24-25.pdf', 'icon' => 'fa-receipt'],
            ];
            foreach ($reports as $i => $report):
            ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="abt-report-card" onclick="openPdfModal('<?= url('assets/reports/' . rawurlencode($report['file'])) ?>', '<?= addslashes($report['title']) ?>')">
                    <div class="abt-report-icon">
                        <i class="fas <?= $report['icon'] ?>"></i>
                    </div>
                    <h5><?= htmlspecialchars($report['title']) ?></h5>
                    <p>Audit Report</p>
                    <span class="abt-report-link"><i class="fas fa-eye"></i> View PDF</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Impact Distribution -->
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="abt-invest-content">
                    <h3>Transforming Lives Through Strategic Investment</h3>
                    <p>Every investment creates a ripple effect of positive change, touching thousands of lives and building sustainable communities for future generations.</p>
                    <div class="row mt-3">
                        <?php
                        $metrics = [
                            ['icon' => 'fa-graduation-cap', 'title' => 'Education', 'desc' => '50+ students educated'],
                            ['icon' => 'fa-heartbeat', 'title' => 'Healthcare', 'desc' => '100+ lives impacted'],
                            ['icon' => 'fa-home', 'title' => 'Livelihood', 'desc' => '10+ jobs created'],
                            ['icon' => 'fa-seedling', 'title' => 'Environment', 'desc' => '500+ trees planted'],
                        ];
                        foreach ($metrics as $m):
                        ?>
                        <div class="col-6 mb-3">
                            <div class="abt-metric-card">
                                <i class="fas <?= $m['icon'] ?>"></i>
                                <strong><?= $m['title'] ?></strong>
                                <small><?= $m['desc'] ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="abt-chart-box">
                    <h4>Impact Distribution</h4>
                    <p class="abt-chart-subtitle">How we transform communities</p>
                    <?php
                    $progressItems = [
                        ['label' => 'Education', 'value' => '30%', 'color' => '#f26522'],
                        ['label' => 'Healthcare', 'value' => '25%', 'color' => '#c94a0f'],
                        ['label' => 'Livelihood', 'value' => '20%', 'color' => '#ff8c42'],
                        ['label' => 'Environment', 'value' => '15%', 'color' => '#2d6a4f'],
                        ['label' => 'Women Empowerment', 'value' => '10%', 'color' => '#8b5cf6'],
                    ];
                    foreach ($progressItems as $item):
                    ?>
                    <div class="abt-progress-row">
                        <div class="abt-progress-labels">
                            <span><?= $item['label'] ?></span>
                            <span><?= $item['value'] ?></span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar abt-progress-fill" role="progressbar"
                                style="width: 0%; background: <?= $item['color'] ?>;"
                                data-width="<?= $item['value'] ?>"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PDF Viewer Modal -->
<div id="pdfModal" class="abt-pdf-modal" onclick="if(event.target===this)closePdfModal()">
    <div class="abt-pdf-content">
        <div class="abt-pdf-header">
            <div class="abt-pdf-title">
                <div class="abt-pdf-icon"><i class="fas fa-file-pdf"></i></div>
                <div>
                    <h5 id="pdfModalTitle">Document</h5>
                    <small>Durga Saptashati Foundation</small>
                </div>
            </div>
            <div class="abt-pdf-actions">
                <a id="pdfDownloadBtn" href="#" download class="abt-pdf-download">
                    <i class="fas fa-download"></i> Download
                </a>
                <button onclick="closePdfModal()" class="abt-pdf-close">&times;</button>
            </div>
        </div>
        <iframe id="pdfViewer" src=""></iframe>
    </div>
</div>

<script>
// Animate progress bars on scroll
var progressObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            var bar = entry.target;
            bar.style.width = bar.getAttribute('data-width');
            progressObserver.unobserve(bar);
        }
    });
}, { threshold: 0.5 });
document.querySelectorAll('.abt-progress-fill').forEach(function(bar) {
    progressObserver.observe(bar);
});

// PDF Modal
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

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePdfModal();
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
