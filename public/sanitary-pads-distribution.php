<?php
require_once '../app/config/config.php';
$pageTitle = "Sanitary Pads Distribution";
$pageDescription = "Durga Saptashati Foundation's Sanitary Pads Distribution — providing free sanitary pads to underprivileged women and girls while promoting menstrual hygiene awareness.";
$pageKeywords = "sanitary pads distribution, menstrual hygiene, women health, free sanitary pads, hygiene awareness, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/sanitary-pads.css') ?>">

<!-- Page Header -->
<div class="page-header spd-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Sanitary Pads Distribution</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('sanitary-pads-distribution.php') ?>">Sanitary Pads Distribution</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Card Layout — Image Left + Content Right -->
<section class="spd-hero">
    <div class="container">
        <div class="spd-hero-card" data-aos="fade-up">
            <div class="row g-0">
                <!-- Left: Large Image -->
                <div class="col-lg-6">
                    <div class="spd-hero-img">
                        <img src="<?= url('assets/images/sanitary-pads-distribution/sanitary-pads-distribution.webp') ?>"
                            alt="Sanitary Pads Distribution">
                        <div class="spd-hero-img-overlay">
                            <div class="spd-overlay-badge"><i class="fas fa-hand-holding-heart"></i> Hygiene Drive</div>
                        </div>
                        <!-- Small floating image -->
                        <div class="spd-mini-img">
                            <img src="<?= url('assets/images/sanitary-pads-distribution/sanitary-pads-distribution-1.webp') ?>"
                                alt="Distribution">
                        </div>
                    </div>
                </div>
                <!-- Right: Content -->
                <div class="col-lg-6">
                    <div class="spd-hero-content">
                        <div class="spd-badge">
                            <i class="fas fa-hand-holding-heart"></i>
                            <span>Menstrual Hygiene Awareness</span>
                        </div>

                        <h2 class="spd-title">Sanitary Pads <span class="spd-gradient">Distribution</span></h2>

                        <p class="spd-desc">
                            Breaking the taboo around menstrual hygiene — we distribute free sanitary pads
                            to underprivileged women and girls, conduct awareness workshops, and empower
                            them to manage their health with dignity and confidence.
                        </p>

                        <!-- Inline Stats -->
                        <div class="spd-stats-grid">
                            <div class="spd-stat-box">
                                <div class="spd-stat-icon"><i class="fas fa-box-open"></i></div>
                                <div class="spd-stat-num" data-counter="5000">0</div>
                                <div class="spd-stat-label">Pads Distributed</div>
                            </div>
                            <div class="spd-stat-box">
                                <div class="spd-stat-icon"><i class="fas fa-female"></i></div>
                                <div class="spd-stat-num" data-counter="500">0</div>
                                <div class="spd-stat-label">Women Reached</div>
                            </div>
                            <div class="spd-stat-box">
                                <div class="spd-stat-icon"><i class="fas fa-campground"></i></div>
                                <div class="spd-stat-num" data-counter="15">0</div>
                                <div class="spd-stat-label">Camps</div>
                            </div>
                            <div class="spd-stat-box">
                                <div class="spd-stat-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="spd-stat-num" data-counter="10">0</div>
                                <div class="spd-stat-label">Communities</div>
                            </div>
                        </div>

                        <div class="spd-tags">
                            <span class="spd-tag"><i class="fas fa-shield-alt"></i> Hygiene</span>
                            <span class="spd-tag"><i class="fas fa-female"></i> Women Health</span>
                            <span class="spd-tag"><i class="fas fa-hands-helping"></i> Awareness</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="spd-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="spd-section-header text-center" data-aos="fade-up">
            <span class="spd-section-badge">Gallery</span>
            <h2 class="spd-section-title">Distribution Moments</h2>
            <p class="spd-section-desc">
                Moments from our sanitary pads distribution drives — reaching women and girls
                in underserved communities with hygiene essentials and awareness.
            </p>
        </div>

        <?php
        $spdImages = [
            ['file' => 'sanitary-pads-distribution-7.webp', 'title' => 'Community Outreach'],
            ['file' => 'sanitary-pads-distribution-3.webp', 'title' => 'Community Drive'],
            ['file' => 'sanitary-pads-distribution-12.webp', 'title' => 'School Campaign'],
            ['file' => 'sanitary-pads-distribution.webp', 'title' => 'Distribution Camp'],
            ['file' => 'sanitary-pads-distribution-9.webp', 'title' => 'Volunteer Team'],
            ['file' => 'sanitary-pads-distribution-16.webp', 'title' => 'Empowering Women'],
            ['file' => 'sanitary-pads-distribution-5.webp', 'title' => 'Awareness Session'],
            ['file' => 'sanitary-pads-distribution-14.webp', 'title' => 'Rural Distribution'],
            ['file' => 'sanitary-pads-distribution-1.webp', 'title' => 'Reaching Every Girl'],
            ['file' => 'sanitary-pads-distribution-11.webp', 'title' => 'Health Education'],
            ['file' => 'sanitary-pads-distribution-6.webp', 'title' => 'Kit Preparation'],
            ['file' => 'sanitary-pads-distribution-4.webp', 'title' => 'Hygiene Workshop'],
            ['file' => 'sanitary-pads-distribution-15.webp', 'title' => 'Impact Stories'],
            ['file' => 'sanitary-pads-distribution-8.webp', 'title' => 'On-ground Support'],
            ['file' => 'sanitary-pads-distribution-2.webp', 'title' => 'Empowering Women'],
            ['file' => 'sanitary-pads-distribution-13.webp', 'title' => 'Women Gathering'],
            ['file' => 'sanitary-pads-distribution--10.webp', 'title' => 'Awareness Drive'],
        ];
        ?>
        <div class="spd-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($spdImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openSpdLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/sanitary-pads-distribution/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Hygiene Drive</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div
                            style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h3 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;">
                        <?= htmlspecialchars($img['title']) ?>
                    </h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="spdLb"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeSpdLb()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="spdPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="spdNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="spdLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="spdLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var spdData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/sanitary-pads-distribution/' . $img['file']), 'title' => $img['title']];
        }, $spdImages)) ?>;
var spdIdx = 0;

function openSpdLb(i) {
    spdIdx = i;
    updateSpdLb();
    document.getElementById('spdLb').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeSpdLb() {
    document.getElementById('spdLb').style.display = 'none';
    document.body.style.overflow = '';
}

function updateSpdLb() {
    document.getElementById('spdLbImg').src = spdData[spdIdx].src;
    document.getElementById('spdLbTitle').textContent = spdData[spdIdx].title;
}

function spdPrev() {
    spdIdx = (spdIdx - 1 + spdData.length) % spdData.length;
    updateSpdLb();
}

function spdNext() {
    spdIdx = (spdIdx + 1) % spdData.length;
    updateSpdLb();
}
document.getElementById('spdLb').addEventListener('click', function(e) {
    if (e.target === this) closeSpdLb();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('spdLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeSpdLb();
    if (e.key === 'ArrowLeft') spdPrev();
    if (e.key === 'ArrowRight') spdNext();
});

// Counter
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target,
                    target = parseInt(c.getAttribute('data-counter')),
                    current = 0,
                    inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) {
                        c.textContent = target.toLocaleString() + '+';
                        clearInterval(timer);
                    } else {
                        c.textContent = Math.floor(current).toLocaleString();
                    }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, {
        threshold: 0.7
    });
    counters.forEach(function(c) {
        obs.observe(c);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>