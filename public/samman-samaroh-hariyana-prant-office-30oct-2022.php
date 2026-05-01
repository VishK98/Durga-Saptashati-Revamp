<?php
require_once '../app/config/config.php';
$pageTitle = "सम्मान समारोह - हरियाणा प्रान्त कार्यालय 30 Oct 2022";
$pageDescription = "Samman Samaroh at Hariyana Prant Office — a felicitation ceremony honouring dedicated individuals for their outstanding contributions to social welfare and community service.";
$pageKeywords = "samman samaroh, felicitation ceremony, haryana, community service, social welfare, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/samman-samaroh.css') ?>">

<!-- Page Header -->
<div class="page-header ss-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><p class="page-header-title">सम्मान समारोह</p></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('samman-samaroh-hariyana-prant-office-30oct-2022.php') ?>">Samman Samaroh</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Ribbon Banner — Full-width image with bottom content ribbon -->
<section class="ss-hero">
    <div class="ss-hero-visual">
        <img src="<?= url('assets/images/samman-samaroh/samman-samaroh.webp') ?>" alt="सम्मान समारोह" class="ss-hero-img">
        <div class="ss-hero-overlay"></div>
        <div class="ss-hero-center" data-aos="zoom-in">
            <div class="ss-badge">
                <i class="fas fa-award"></i>
                <span>सम्मान एवं पुरस्कार</span>
            </div>
            <h1 class="ss-title">सम्मान समारोह</h1>
            <h3 class="ss-venue">हरियाणा प्रान्त कार्यालय | 30 October 2022</h3>
        </div>
    </div>

    <div class="ss-ribbon" data-aos="fade-up">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <p class="ss-ribbon-text">
                        A grand felicitation ceremony honouring dedicated individuals and community leaders
                        for their outstanding contributions to social welfare, women empowerment, and
                        community development across Haryana.
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="ss-ribbon-stats">
                        <div class="ss-rs">
                            <strong data-counter="50">0</strong>
                            <span>Awardees</span>
                        </div>
                        <div class="ss-rs">
                            <strong data-counter="200">0</strong>
                            <span>Guests</span>
                        </div>
                        <div class="ss-rs">
                            <strong data-counter="8">0</strong>
                            <span>Speakers</span>
                        </div>
                        <div class="ss-rs">
                            <strong data-counter="5">0</strong>
                            <span>Categories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="ss-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="ss-section-header text-center" data-aos="fade-up">
            <span class="ss-section-badge">Gallery</span>
            <h2 class="ss-section-title">Samman Samaroh Moments</h2>
            <p class="ss-section-desc">Highlights from the felicitation ceremony — honouring community leaders, cultural performances, and moments of pride.</p>
        </div>

        <?php
        $ssImages = [
            ['file' => 'samman-samaroh-5.webp', 'title' => 'Award Presentation'],
            ['file' => 'samman-samaroh.webp', 'title' => 'Grand Ceremony'],
            ['file' => 'samman-samaroh-3.webp', 'title' => 'Guest of Honour'],
            ['file' => 'samman-samaroh-7.webp', 'title' => 'Cultural Programme'],
            ['file' => 'samman-samaroh-1.webp', 'title' => 'Opening Address'],
            ['file' => 'samman-samaroh-6.webp', 'title' => 'Felicitation Moment'],
            ['file' => 'samman-samaroh-2.webp', 'title' => 'Community Leaders'],
            ['file' => 'samman-samaroh-4.webp', 'title' => 'Group Celebration'],
        ];
        ?>
        <div class="ss-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($ssImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openSsLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/samman-samaroh/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">सम्मान समारोह</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h3 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;"><?= htmlspecialchars($img['title']) ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="ssLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeSsLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="ssPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="ssNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="ssLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="ssLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var ssData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/samman-samaroh/' . $img['file']), 'title' => $img['title']]; }, $ssImages)) ?>;
var ssIdx = 0;
function openSsLb(i) { ssIdx = i; updateSsLb(); document.getElementById('ssLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeSsLb() { document.getElementById('ssLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateSsLb() { document.getElementById('ssLbImg').src = ssData[ssIdx].src; document.getElementById('ssLbTitle').textContent = ssData[ssIdx].title; }
function ssPrev() { ssIdx = (ssIdx - 1 + ssData.length) % ssData.length; updateSsLb(); }
function ssNext() { ssIdx = (ssIdx + 1) % ssData.length; updateSsLb(); }
document.getElementById('ssLb').addEventListener('click', function(e) { if (e.target === this) closeSsLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('ssLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeSsLb();
    if (e.key === 'ArrowLeft') ssPrev();
    if (e.key === 'ArrowRight') ssNext();
});
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target, target = parseInt(c.getAttribute('data-counter')), current = 0, inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) { c.textContent = target + '+'; clearInterval(timer); }
                    else { c.textContent = Math.floor(current); }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, { threshold: 0.7 });
    counters.forEach(function(c) { obs.observe(c); });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
