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
            <div class="col-12">
                <h1>Investors & Transparency</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('investor.php') ?>">Investors</a>
            </div>
        </div>
    </div>
</div>

<!-- Why Invest Section -->
<section style="background:#fff;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Why Partner With
                Us</h6>
            <h2 style="color:#1a1b2e;font-weight:800;">Your Investment, <span style="color:#f26522;">Our
                    Accountability</span></h2>
            <p style="color:#888;max-width:550px;margin:10px auto 0;font-size:0.92rem;">We ensure every rupee is
                accounted for and creates maximum social impact.</p>
        </div>
        <div class="row">
            <?php
            $whyInvest = [
                ['icon' => 'fa-search-dollar', 'title' => 'Full Transparency', 'desc' => 'Every financial transaction is documented, audited, and publicly available for review.'],
                ['icon' => 'fa-certificate', 'title' => '80G Tax Exemption', 'desc' => 'All donations are eligible for tax deduction under Section 80G of Income Tax Act.'],
                ['icon' => 'fa-chart-line', 'title' => 'Measurable Impact', 'desc' => 'We provide quarterly impact reports showing exactly how your funds create change.'],
                ['icon' => 'fa-handshake', 'title' => 'Trusted Governance', 'desc' => 'Led by experienced professionals committed to ethical and accountable management.'],
            ];
            foreach ($whyInvest as $i => $item):
                ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="inv-why-card">
                    <div class="inv-why-icon"><i class="fas <?= $item['icon'] ?>"></i></div>
                    <h3 class="inv-why-title"><?= $item['title'] ?></h3>
                    <p class="inv-why-desc"><?= $item['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Financial Reports Section -->
<section class="abt-section abt-section--dark" style="margin-bottom:0;">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center abt-section-label--light">
                <i class="fas fa-shield-alt"></i>
                <span>Transparency</span>
            </div>
            <h2 class="abt-section-title" style="color:#fff;">Our Investors & Financial Reports</h2>
            <p class="abt-section-subtitle" style="color:rgba(255,255,255,0.7);">We believe in complete transparency.
                View and download our audited financial reports.</p>
        </div>

        <div class="row justify-content-center mb-5">
            <?php
            try {
                $reports = $pdo->query("SELECT * FROM financial_reports WHERE is_active = 1 ORDER BY sort_order ASC, created_at DESC")->fetchAll();
            } catch (Exception $e) {
                $reports = [];
            }
            if (empty($reports)):
                ?>
            <div class="col-12 text-center" style="padding:40px;">
                <i class="fas fa-file-pdf"
                    style="font-size:2.5rem;color:rgba(255,255,255,0.2);margin-bottom:15px;display:block;"></i>
                <p style="color:rgba(255,255,255,0.5);">Financial reports will be available soon.</p>
            </div>
            <?php else:
                foreach ($reports as $i => $report):
                    ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="abt-report-card"
                    onclick="openPdfModal('<?= url('assets/reports/' . rawurlencode($report['file'])) ?>', '<?= addslashes($report['title']) ?>')">
                    <div class="abt-report-icon">
                        <i class="fas <?= htmlspecialchars($report['icon']) ?>"></i>
                    </div>
                    <h3><?= htmlspecialchars($report['title']) ?></h3>
                    <p><?= htmlspecialchars($report['description']) ?></p>
                    <span class="abt-report-link"><i class="fas fa-eye"></i> View PDF</span>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Impact Distribution -->
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="abt-invest-content">
                    <h3>Transforming Lives Through Strategic Investment</h3>
                    <p>Every investment creates a ripple effect of positive change, touching thousands of lives and
                        building sustainable communities for future generations.</p>
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
                    <h3>Impact Distribution</h3>
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



<!-- Key Numbers Section -->
<section style="background:linear-gradient(135deg,#1a1b2e,#2a2b45);padding:50px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-right">
                <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Our Numbers
                </h6>
                <h2 style="color:#fff;font-weight:800;line-height:1.3;">Impact That <span
                        style="color:#f26522;">Speaks</span></h2>
                <p style="color:rgba(255,255,255,0.55);font-size:0.9rem;line-height:1.7;">Since 2020, we have
                    consistently grown our reach and deepened our commitment to the communities we serve.</p>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $numbers = [
                        ['num' => '5K+', 'label' => 'Lives Impacted', 'icon' => 'fa-users'],
                        ['num' => '4+', 'label' => 'Years Active', 'icon' => 'fa-calendar-check'],
                        ['num' => '100+', 'label' => 'Volunteers', 'icon' => 'fa-hands-helping'],
                        ['num' => '10+', 'label' => 'Programs Run', 'icon' => 'fa-project-diagram'],
                    ];
                    foreach ($numbers as $i => $n):
                        ?>
                    <div class="col-6 col-md-3 mb-3" data-aos="zoom-in" data-aos-delay="<?= ($i + 1) * 100 ?>">
                        <div class="inv-num-card">
                            <i class="fas <?= $n['icon'] ?>"></i>
                            <h3><?= $n['num'] ?></h3>
                            <small><?= $n['label'] ?></small>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background:#fff;padding:50px 0;">
    <div class="container">
        <div class="inv-cta-box" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h3 style="color:#fff;font-weight:800;margin:0 0 8px;">Ready to Make a Difference?</h3>
                    <p style="color:rgba(255,255,255,0.75);margin:0;font-size:0.92rem;">Partner with us and help
                        transform the lives of underprivileged women, children, and communities across India.</p>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a href="<?= url('make-donation.php') ?>" class="inv-cta-btn"><i class="fas fa-heart"></i> Donate
                        Now</a>
                    <a href="<?= url('contact.php') ?>" class="inv-cta-btn inv-cta-btn-outline"><i
                            class="fas fa-phone-alt"></i> Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Why Invest Cards */
.inv-why-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 18px;
    padding: 32px 24px;
    text-align: center;
    height: 100%;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    overflow: hidden;
}

.inv-why-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #f26522, #ff8c42);
    transform: scaleX(0);
    transition: transform 0.4s;
}

.inv-why-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
    border-color: transparent;
}

.inv-why-card:hover::before {
    transform: scaleX(1);
}

.inv-why-icon {
    width: 65px;
    height: 65px;
    border-radius: 18px;
    background: rgba(242, 101, 34, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: #f26522;
    margin: 0 auto 18px;
    transition: all 0.4s;
}

.inv-why-card:hover .inv-why-icon {
    background: linear-gradient(135deg, #f26522, #ff8c42);
    color: #fff;
    border-radius: 50%;
    transform: scale(1.08);
    box-shadow: 0 10px 25px rgba(242, 101, 34, 0.3);
}

.inv-why-title {
    font-weight: 700;
    color: #1a1b2e;
    font-size: 1.05rem;
    margin-bottom: 10px;
}

.inv-why-desc {
    color: #777;
    font-size: 0.84rem;
    line-height: 1.7;
    margin: 0;
}

/* Number Cards */
.inv-num-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 24px 16px;
    text-align: center;
    transition: all 0.4s;
}

.inv-num-card:hover {
    background: rgba(255, 255, 255, 0.08);
    transform: translateY(-5px);
    border-color: rgba(242, 101, 34, 0.2);
}

.inv-num-card i {
    color: #f26522;
    font-size: 1.3rem;
    margin-bottom: 10px;
    display: block;
}

.inv-num-card h3 {
    color: #fff;
    font-weight: 900;
    font-size: 1.8rem;
    margin: 0 0 4px;
}

.inv-num-card small {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* CTA Box */
.inv-cta-box {
    background: linear-gradient(135deg, #f26522, #e05a1c);
    border-radius: 20px;
    padding: 40px 45px;
    box-shadow: 0 15px 50px rgba(242, 101, 34, 0.25);
}

.inv-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s;
    background: #fff;
    color: #f26522;
    margin: 4px;
}

.inv-cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    color: #f26522;
    text-decoration: none;
}

.inv-cta-btn-outline {
    background: transparent;
    color: #fff;
    border: 2px solid rgba(255, 255, 255, 0.4);
}

.inv-cta-btn-outline:hover {
    background: #fff;
    color: #f26522;
    border-color: #fff;
}

@media (max-width: 768px) {
    .inv-cta-box {
        padding: 30px 24px;
        text-align: center;
    }

    .inv-cta-box .text-lg-right {
        text-align: center !important;
    }
}
</style>

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
}, {
    threshold: 0.5
});
document.querySelectorAll('.abt-progress-fill').forEach(function(bar) {
    progressObserver.observe(bar);
});

// PDF Modal
function openPdfModal(url, title) {
    document.getElementById('pdfModalTitle').textContent = title;
    document.getElementById('pdfViewer').src = url;
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