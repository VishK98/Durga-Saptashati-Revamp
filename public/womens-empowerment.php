<?php
require_once '../app/config/config.php';

$pageTitle = "Women's Empowerment";
$pageDescription = "Empowering women through skill development, self-defense training, awareness campaigns, and financial literacy at Durga Saptashati Foundation.";
$pageKeywords = "women empowerment, skill development, self defense, awareness, financial literacy, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Women's Empowerment Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/womens-empowerment.css') ?>">

<!-- Page Header Start -->
<div class="page-header women-empowerment-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Women's Empowerment</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('womens-empowerment.php') ?>">Women's Empowerment</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section — Image Left + Content Right with Floating Stats -->
<section class="we-hero">
    <div class="container-fluid">
        <div class="row align-items-center we-hero-row">
            <!-- Left: Image Collage -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="we-image-stack">
                    <div class="we-img-main">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment.webp') ?>"
                            alt="Women's Empowerment">
                    </div>
                    <div class="we-img-secondary">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment-1.webp') ?>"
                            alt="Skill Development">
                    </div>
                    <div class="we-img-accent">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment-2.webp') ?>"
                            alt="Awareness Campaign">
                    </div>
                    <!-- Floating stat on image -->
                    <div class="we-float-stat we-float-stat-1" data-aos="zoom-in" data-aos-delay="400">
                        <div class="we-fs-number" data-counter="500">0</div>
                        <div class="we-fs-label">Women Empowered</div>
                    </div>
                    <div class="we-float-stat we-float-stat-2" data-aos="zoom-in" data-aos-delay="500">
                        <div class="we-fs-number" data-counter="20">0</div>
                        <div class="we-fs-label">Programs</div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="we-hero-content">
                    <div class="we-hero-badge">
                        <i class="fas fa-female"></i>
                        <span>Empowerment & Equality</span>
                    </div>

                    <h1 class="we-hero-title">
                        Women's
                        <span class="we-highlight">Empowerment</span>
                        Initiative
                    </h1>

                    <p class="we-hero-desc">
                        We believe that empowering women is the key to transforming entire communities.
                        Our programs focus on skill development, self-defense training, awareness campaigns,
                        and financial literacy to help women become independent and confident leaders.
                    </p>

                    <div class="we-theme-quote">
                        <i class="fas fa-quote-left"></i>
                        <div>
                            <h4>Strength in Unity</h4>
                            <p>Building confident, independent women for a stronger society</p>
                        </div>
                    </div>

                    <div class="we-mini-stats">
                        <div class="we-ms-item">
                            <i class="fas fa-hands-helping"></i>
                            <div>
                                <strong data-counter="15">0</strong>
                                <span>Workshops</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong data-counter="10">0</strong>
                                <span>Communities</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <strong data-counter="8">0</strong>
                                <span>Skill Courses</span>
                            </div>
                        </div>
                    </div>

                    <div class="we-tags">
                        <span class="we-tag"><i class="fas fa-shield-alt"></i> Self Defense</span>
                        <span class="we-tag"><i class="fas fa-rupee-sign"></i> Financial Literacy</span>
                        <span class="we-tag"><i class="fas fa-graduation-cap"></i> Skill Building</span>
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
            <h2 class="we-section-title">Empowerment in Action</h2>
            <p class="we-section-description">
                Witness the transformative journey of women breaking barriers,
                building skills, and leading change in their communities.
            </p>
        </div>

        <?php
        $weImages = [
            ['file' => 'womens-empowerment.webp', 'title' => 'Empowerment Programme'],
            ['file' => 'womens-empowerment-1.webp', 'title' => 'Skill Development Workshop'],
            ['file' => 'womens-empowerment-2.webp', 'title' => 'Awareness Campaign'],
            ['file' => 'womens-empowerment-3.webp', 'title' => 'Self-Defense Training'],
            ['file' => 'womens-empowerment-4.webp', 'title' => 'Financial Literacy Session'],
            ['file' => 'womens-empowerment-5.webp', 'title' => 'Community Outreach'],
            ['file' => 'womens-empowerment-6.webp', 'title' => 'Women Leadership Meet'],
        ];
        ?>
        <div class="we-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($weImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openWeLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/womens-empowerment/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Women's Empowerment</div>
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
                        <?= htmlspecialchars($img['title']) ?>
                    </h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Lightbox -->
<div id="weLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeWeLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="wePrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="weNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="weLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="weLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var weData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/womens-empowerment/' . $img['file']), 'title' => $img['title']]; }, $weImages)) ?>;
var weIdx = 0;

function openWeLightbox(i) {
    weIdx = i;
    updateWeLb();
    document.getElementById('weLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeWeLightbox() {
    document.getElementById('weLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateWeLb() {
    document.getElementById('weLbImg').src = weData[weIdx].src;
    document.getElementById('weLbTitle').textContent = weData[weIdx].title;
}

function wePrev() {
    weIdx = (weIdx - 1 + weData.length) % weData.length;
    updateWeLb();
}

function weNext() {
    weIdx = (weIdx + 1) % weData.length;
    updateWeLb();
}
document.getElementById('weLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeWeLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('weLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeWeLightbox();
    if (e.key === 'ArrowLeft') wePrev();
    if (e.key === 'ArrowRight') weNext();
});

// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var counter = entry.target;
                var target = parseInt(counter.getAttribute('data-counter'));
                var current = 0;
                var increment = target / 60;
                var timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 25);
                counterObserver.unobserve(counter);
            }
        });
    }, {
        threshold: 0.7
    });
    counters.forEach(function(c) {
        counterObserver.observe(c);
    });
});

// Floating element animation
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.we-floating').forEach(function(el, i) {
        setTimeout(function() {
            el.style.animation = 'weFloat 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>