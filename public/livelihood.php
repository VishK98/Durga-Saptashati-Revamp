<?php
require_once '../app/config/config.php';

$pageTitle = "Livelihood & Skill Development Programs | Saptashati Foundation";
$pageDescription = "Empowering communities through vocational training, skill development, and livelihood programs for self-reliance in Delhi.";
$pageKeywords = "livelihood programs Delhi, skill development, vocational training, employment support, self-reliance, Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/livelihood.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Livelihood</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('livelihood.php') ?>">Livelihood</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Content Left + Mosaic Grid Right + Stats Strip -->
<section class="lv-hero">
    <div class="container-fluid">
        <div class="row align-items-center lv-hero-row">
            <!-- Left Content -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="lv-badge">
                    <i class="fas fa-briefcase"></i>
                    <span>Employment & Skills</span>
                </div>

                <h1 class="lv-title">
                    Sustainable <span class="lv-gradient">Livelihood</span> Programme
                </h1>

                <p class="lv-desc">
                    Our Livelihood Programme empowers individuals from underprivileged communities with
                    vocational training, skill development, and employment support — helping people build
                    dignified, self-reliant lives for themselves and their families.
                </p>

                <div class="lv-quote">
                    <i class="fas fa-quote-left"></i>
                    <div>
                        <h4>Skills for a Better Tomorrow</h4>
                        <p>Empowering individuals with skills to build sustainable futures</p>
                    </div>
                </div>

                <div class="lv-tags">
                    <span class="lv-tag"><i class="fas fa-tools"></i> Vocational Training</span>
                    <span class="lv-tag"><i class="fas fa-briefcase"></i> Job Placement</span>
                    <span class="lv-tag"><i class="fas fa-chart-line"></i> Entrepreneurship</span>
                    <span class="lv-tag"><i class="fas fa-certificate"></i> Certification</span>
                </div>
            </div>

            <!-- Right: Mosaic Grid -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="lv-mosaic">
                    <div class="lv-mosaic-tall">
                        <img src="<?= url('assets/images/livelihood/livelihood.webp') ?>" alt="Livelihood Programme">
                    </div>
                    <div class="lv-mosaic-top">
                        <img src="<?= url('assets/images/livelihood/livelihood-1.webp') ?>" alt="Vocational Training">
                    </div>
                    <div class="lv-mosaic-bottom">
                        <img src="<?= url('assets/images/livelihood/livelihood-2.webp') ?>" alt="Skill Development">
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Strip -->
        <div class="lv-stats-strip" data-aos="fade-up" data-aos-delay="300">
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-user-tie"></i></div>
                <div class="lv-strip-num" data-counter="300">0</div>
                <div class="lv-strip-label">People Trained</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-briefcase"></i></div>
                <div class="lv-strip-num" data-counter="50">0</div>
                <div class="lv-strip-label">Employed</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-tools"></i></div>
                <div class="lv-strip-num" data-counter="10">0</div>
                <div class="lv-strip-label">Trades</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-building"></i></div>
                <div class="lv-strip-num" data-counter="8">0</div>
                <div class="lv-strip-label">Centers</div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="lv-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="lv-section-header text-center" data-aos="fade-up">
            <span class="lv-section-badge">Gallery</span>
            <h2 class="lv-section-title">Livelihood in Action</h2>
            <p class="lv-section-desc">
                Explore our vocational training sessions, skill development workshops, and success stories
                of individuals who transformed their lives through our livelihood programmes.
            </p>
        </div>

        <?php
        $lvImages = [
            ['file' => 'livelihood.webp', 'title' => 'Livelihood Programme'],
            ['file' => 'livelihood-1.webp', 'title' => 'Vocational Training'],
            ['file' => 'livelihood-2.webp', 'title' => 'Skill Workshop'],
            ['file' => 'livelihood-3.webp', 'title' => 'Hands-on Training'],
            ['file' => 'livelihood-4.webp', 'title' => 'Certification Day'],
            ['file' => 'livelihood-5.webp', 'title' => 'Entrepreneurship Camp'],
            ['file' => 'livelihood-6.webp', 'title' => 'Job Placement Drive'],
            ['file' => 'livelihood-7.webp', 'title' => 'Community Workshop'],
            ['file' => 'livelihood-8.webp', 'title' => 'Success Stories'],
            ['file' => 'livelihood-9.webp', 'title' => 'Tailoring Training'],
            ['file' => 'livelihood-10.webp', 'title' => 'Computer Literacy'],
            ['file' => 'livelihood-11.webp', 'title' => 'Handicraft Workshop'],
        ];
        ?>
        <div class="lv-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($lvImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openLvLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/livelihood/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Livelihood</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h6 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;">
                        <?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="lvLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeLvLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="lvPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="lvNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="lvLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="lvLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var lvData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/livelihood/' . $img['file']), 'title' => $img['title']]; }, $lvImages)) ?>;
var lvIdx = 0;
function openLvLightbox(i) { lvIdx = i; updateLvLb(); document.getElementById('lvLightbox').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeLvLightbox() { document.getElementById('lvLightbox').style.display = 'none'; document.body.style.overflow = ''; }
function updateLvLb() { document.getElementById('lvLbImg').src = lvData[lvIdx].src; document.getElementById('lvLbTitle').textContent = lvData[lvIdx].title; }
function lvPrev() { lvIdx = (lvIdx - 1 + lvData.length) % lvData.length; updateLvLb(); }
function lvNext() { lvIdx = (lvIdx + 1) % lvData.length; updateLvLb(); }
document.getElementById('lvLightbox').addEventListener('click', function(e) { if (e.target === this) closeLvLightbox(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('lvLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeLvLightbox();
    if (e.key === 'ArrowLeft') lvPrev();
    if (e.key === 'ArrowRight') lvNext();
});

// Counter
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target, target = parseInt(c.getAttribute('data-counter')), current = 0, inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) { c.textContent = target.toLocaleString() + '+'; clearInterval(timer); }
                    else { c.textContent = Math.floor(current).toLocaleString(); }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, { threshold: 0.7 });
    counters.forEach(function(c) { obs.observe(c); });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
