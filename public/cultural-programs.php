<?php
require_once '../app/config/config.php';
$pageTitle = "Cultural Programs";
$pageDescription = "Celebrate heritage with Durga Saptashati Foundation's traditional performances, cultural events, and community celebrations.";
$pageKeywords = "cultural programs, traditional performances, cultural events, heritage celebration, community festivals, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/womens-empowerment.css') ?>">

<!-- Page Header -->
<div class="page-header cultural-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Cultural Programs</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('cultural-programs.php') ?>">Cultural Programs</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section — Image Collage Left + Content Right -->
<section class="we-hero">
    <div class="container-fluid">
        <div class="row align-items-center we-hero-row">
            <!-- Left: Image Collage -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="we-image-stack">
                    <div class="we-img-main">
                        <img src="<?= url('assets/images/cultural/cultural.webp') ?>" alt="Cultural Programs">
                    </div>
                    <div class="we-img-secondary">
                        <img src="<?= url('assets/images/cultural/cultural-1.webp') ?>" alt="Traditional Performance">
                    </div>
                    <div class="we-img-accent">
                        <img src="<?= url('assets/images/cultural/cultural-2.webp') ?>" alt="Heritage Celebration">
                    </div>
                    <div class="we-float-stat we-float-stat-1" data-aos="zoom-in" data-aos-delay="400">
                        <div class="we-fs-number" data-counter="500">0</div>
                        <div class="we-fs-label">Participants</div>
                    </div>
                    <div class="we-float-stat we-float-stat-2" data-aos="zoom-in" data-aos-delay="500">
                        <div class="we-fs-number" data-counter="20">0</div>
                        <div class="we-fs-label">Performances</div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="we-hero-content">
                    <div class="we-hero-badge">
                        <i class="fas fa-theater-masks"></i>
                        <span>Heritage & Culture</span>
                    </div>

                    <h1 class="we-hero-title">
                        Cultural
                        <span class="we-highlight">Programs</span>
                        & Celebrations
                    </h1>

                    <p class="we-hero-desc">
                        Preserving and promoting India's rich cultural heritage through vibrant performances,
                        folk dances, music concerts, art exhibitions, and community celebrations that bring
                        people together in joy and tradition.
                    </p>

                    <div class="we-theme-quote">
                        <i class="fas fa-quote-left"></i>
                        <div>
                            <h4>Celebrating Our Heritage</h4>
                            <p>Keeping traditions alive through art, dance, music, and community spirit</p>
                        </div>
                    </div>

                    <div class="we-mini-stats">
                        <div class="we-ms-item">
                            <i class="fas fa-music"></i>
                            <div>
                                <strong data-counter="8">0</strong>
                                <span>Events</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-paint-brush"></i>
                            <div>
                                <strong data-counter="12">0</strong>
                                <span>Art Forms</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong data-counter="5">0</strong>
                                <span>Venues</span>
                            </div>
                        </div>
                    </div>

                    <div class="we-tags">
                        <span class="we-tag"><i class="fas fa-music"></i> Music</span>
                        <span class="we-tag"><i class="fas fa-theater-masks"></i> Drama</span>
                        <span class="we-tag"><i class="fas fa-paint-brush"></i> Art</span>
                        <span class="we-tag"><i class="fas fa-users"></i> Community</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="we-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="we-section-header text-center" data-aos="fade-up">
            <span class="we-section-badge">Gallery</span>
            <h2 class="we-section-title">Cultural Highlights</h2>
            <p class="we-section-description">
                Witness the vibrant moments from our cultural programs — traditional performances,
                community celebrations, and artistic showcases.
            </p>
        </div>

        <?php
        $culturalImages = [
            ['file' => 'cultural-5.webp', 'title' => 'Traditional Performance'],
            ['file' => 'cultural.webp', 'title' => 'Cultural Evening'],
            ['file' => 'cultural-9.webp', 'title' => 'Community Celebration'],
            ['file' => 'cultural-3.webp', 'title' => 'Stage Programme'],
            ['file' => 'cultural-11.webp', 'title' => 'Heritage Showcase'],
            ['file' => 'cultural-1.webp', 'title' => 'Folk Celebration'],
            ['file' => 'cultural-7.webp', 'title' => 'Artistic Expression'],
            ['file' => 'cultural-4.webp', 'title' => 'Musical Evening'],
            ['file' => 'cultural-12.webp', 'title' => 'Grand Finale'],
            ['file' => 'cultural-2.webp', 'title' => 'Festive Spirit'],
            ['file' => 'cultural-8.webp', 'title' => 'Cultural Gathering'],
            ['file' => 'cultural-6.webp', 'title' => 'Vibrant Moments'],
            ['file' => 'cultural-10.webp', 'title' => 'Joyful Evening'],
        ];
        ?>
        <div class="we-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($culturalImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openCulturalLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/cultural/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Cultural Program</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div
                            style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
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
<div id="culturalLb"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeCulturalLb()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="culturalPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="culturalNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="culturalLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="culturalLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var culturalData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/cultural/' . $img['file']), 'title' => $img['title']]; }, $culturalImages)) ?>;
var culturalIdx = 0;

function openCulturalLb(i) {
    culturalIdx = i;
    updateCulturalLb();
    document.getElementById('culturalLb').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeCulturalLb() {
    document.getElementById('culturalLb').style.display = 'none';
    document.body.style.overflow = '';
}

function updateCulturalLb() {
    document.getElementById('culturalLbImg').src = culturalData[culturalIdx].src;
    document.getElementById('culturalLbTitle').textContent = culturalData[culturalIdx].title;
}

function culturalPrev() {
    culturalIdx = (culturalIdx - 1 + culturalData.length) % culturalData.length;
    updateCulturalLb();
}

function culturalNext() {
    culturalIdx = (culturalIdx + 1) % culturalData.length;
    updateCulturalLb();
}
document.getElementById('culturalLb').addEventListener('click', function(e) {
    if (e.target === this) closeCulturalLb();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('culturalLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeCulturalLb();
    if (e.key === 'ArrowLeft') culturalPrev();
    if (e.key === 'ArrowRight') culturalNext();
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
                        c.textContent = target + '+';
                        clearInterval(timer);
                    } else {
                        c.textContent = Math.floor(current);
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