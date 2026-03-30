<?php
require_once '../app/config/config.php';
$pageTitle = "Junior Super Model - Pacific Mall D21";
$pageDescription = "Junior Super Model competition at Pacific Mall D21 — a platform for young talents to showcase confidence, creativity, and personality organised by Durga Saptashati Foundation.";
$pageKeywords = "junior super model, kids fashion show, talent competition, Pacific Mall D21, children talent, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/junior-super-model.css') ?>">

<!-- Page Header -->
<div class="page-header jsm-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Junior Super Model</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('junior-super-model-pacific-mall-D21.php') ?>">Junior Super Model</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Diagonal Split — Image behind with glass content card -->
<section class="jsm-hero">
    <div class="jsm-hero-bg">
        <img src="<?= url('assets/images/junior-super-modal/junior-super-modal.jpg') ?>" alt="Junior Super Model">
    </div>
    <div class="jsm-hero-diagonal"></div>

    <div class="container position-relative" style="z-index:10;">
        <div class="row align-items-center jsm-hero-row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="jsm-glass-card">
                    <div class="jsm-badge">
                        <i class="fas fa-star"></i>
                        <span>Talent & Confidence</span>
                    </div>

                    <h1 class="jsm-title">
                        Junior Super
                        <span class="jsm-gradient">Model</span>
                    </h1>
                    <h4 class="jsm-venue">Pacific Mall D21</h4>

                    <p class="jsm-desc">
                        A spectacular platform for young talents to showcase their confidence, creativity,
                        and personality. Children from across the city walked the ramp with pride, expressing
                        themselves through fashion and performance.
                    </p>

                    <div class="jsm-features">
                        <div class="jsm-feat"><i class="fas fa-child"></i> Ramp Walk</div>
                        <div class="jsm-feat"><i class="fas fa-award"></i> Awards</div>
                        <div class="jsm-feat"><i class="fas fa-camera"></i> Photoshoot</div>
                        <div class="jsm-feat"><i class="fas fa-music"></i> Performance</div>
                    </div>

                    <div class="jsm-stats">
                        <div class="jsm-st">
                            <strong data-counter="100">0</strong>
                            <span>Participants</span>
                        </div>
                        <div class="jsm-st">
                            <strong data-counter="10">0</strong>
                            <span>Winners</span>
                        </div>
                        <div class="jsm-st">
                            <strong data-counter="5">0</strong>
                            <span>Judges</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left" data-aos-delay="300">
                <div class="jsm-side-images">
                    <div class="jsm-side-img jsm-si-1">
                        <img src="<?= url('assets/images/junior-super-modal/junior-super-modal-1.jpg') ?>" alt="Ramp Walk">
                    </div>
                    <div class="jsm-side-img jsm-si-2">
                        <img src="<?= url('assets/images/junior-super-modal/junior-super-modal-3.jpg') ?>" alt="Award Ceremony">
                    </div>
                    <div class="jsm-side-img jsm-si-3">
                        <img src="<?= url('assets/images/junior-super-modal/junior-super-modal-5.jpg') ?>" alt="Young Talent">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="jsm-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="jsm-section-header text-center" data-aos="fade-up">
            <span class="jsm-section-badge">Gallery</span>
            <h2 class="jsm-section-title">Spotlight Moments</h2>
            <p class="jsm-section-desc">Relive the glamour, confidence, and joy from Junior Super Model at Pacific Mall D21.</p>
        </div>

        <?php
        $jsmImages = [
            ['file' => 'junior-super-modal-4.jpg', 'title' => 'Ramp Walk'],
            ['file' => 'junior-super-modal.jpg', 'title' => 'Grand Opening'],
            ['file' => 'junior-super-modal-7.jpg', 'title' => 'Award Ceremony'],
            ['file' => 'junior-super-modal-2.jpg', 'title' => 'Young Stars'],
            ['file' => 'junior-super-modal-9.jpg', 'title' => 'Stage Performance'],
            ['file' => 'junior-super-modal-1.jpg', 'title' => 'Confident Walk'],
            ['file' => 'junior-super-modal-6.jpg', 'title' => 'Group Photo'],
            ['file' => 'junior-super-modal-3.jpg', 'title' => 'Talent Showcase'],
            ['file' => 'junior-super-modal-8.jpg', 'title' => 'Celebration'],
            ['file' => 'junior-super-modal-5.jpg', 'title' => 'Spotlight Moment'],
        ];
        ?>
        <div class="jsm-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($jsmImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openJsmLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/junior-super-modal/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">Junior Super Model</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h6 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;"><?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="jsmLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeJsmLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="jsmPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="jsmNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="jsmLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="jsmLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var jsmData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/junior-super-modal/' . $img['file']), 'title' => $img['title']]; }, $jsmImages)) ?>;
var jsmIdx = 0;
function openJsmLb(i) { jsmIdx = i; updateJsmLb(); document.getElementById('jsmLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeJsmLb() { document.getElementById('jsmLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateJsmLb() { document.getElementById('jsmLbImg').src = jsmData[jsmIdx].src; document.getElementById('jsmLbTitle').textContent = jsmData[jsmIdx].title; }
function jsmPrev() { jsmIdx = (jsmIdx - 1 + jsmData.length) % jsmData.length; updateJsmLb(); }
function jsmNext() { jsmIdx = (jsmIdx + 1) % jsmData.length; updateJsmLb(); }
document.getElementById('jsmLb').addEventListener('click', function(e) { if (e.target === this) closeJsmLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('jsmLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeJsmLb();
    if (e.key === 'ArrowLeft') jsmPrev();
    if (e.key === 'ArrowRight') jsmNext();
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
