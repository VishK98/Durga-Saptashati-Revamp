<?php
require_once '../app/config/config.php';
$pageTitle = "Hearing Aids Camp";
$pageDescription = "Durga Saptashati Foundation's Hearing Aids Camp — providing free hearing aids and audiological support to those in need.";
$pageKeywords = "hearing aids camp, free hearing aids, audiological support, community health, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/international-yoga-day.css') ?>">

<div class="page-header hearing-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">Hearing Aids Camp</p>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('hearing-aids-camp.php') ?>">Hearing Aids Camp</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="yoga-hero-section">
    <div class="zen-background">
        <div class="floating-lotus lotus-1"></div>
        <div class="floating-lotus lotus-2"></div>
        <div class="floating-lotus lotus-3"></div>
        <div class="meditation-circles">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="spiritual-badge">
                    <i class="fas fa-assistive-listening-systems"></i>
                    <span>Community Healthcare</span>
                </div>
                <h1 class="hero-title-yoga">
                    Hearing Aids
                    <span class="text-gradient-yoga">Distribution</span>
                    Camp
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-yoga">
                    <div class="yoga-date-banner">
                        <div class="date-info">
                            <div class="date-number">15</div>
                            <div class="date-text">
                                <span>Jan</span>
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="event-theme">
                            <h3>"Sound of Hope"</h3>
                            <p>Restoring hearing, restoring lives through free audiological support</p>
                        </div>
                    </div>

                    <p class="hero-description-yoga">
                        Our Hearing Aids Camp provides free hearing assessments, hearing aid fitting, and audiological
                        support to underprivileged individuals. We believe everyone deserves the gift of sound —
                        helping people reconnect with their families, communities, and the world around them.
                    </p>

                    <div class="hero-stats-yoga">
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-users"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="300">0</div>
                                <div class="stat-label-yoga">Beneficiaries</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-headphones"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="200">0</div>
                                <div class="stat-label-yoga">Hearing Aids Given</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-stethoscope"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="10">0</div>
                                <div class="stat-label-yoga">Expert Audiologists</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="5">0</div>
                                <div class="stat-label-yoga">Camp Locations</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-yoga">
                    <div class="yoga-pose-showcase">
                        <div class="pose-card main-pose">
                            <img src="<?= url('assets/images/hearing/hearing.jpeg') ?>" alt="Hearing Aids Camp"
                                class="pose-image">
                            <div class="pose-overlay">
                                <span class="pose-name">Free Camp</span>
                                <span class="pose-benefit">Hearing Aid Distribution</span>
                            </div>
                        </div>

                        <div class="floating-poses">
                            <div class="mini-pose pose-1">
                                <img src="<?= url('assets/images/hearing/hearing-1.jpeg') ?>" alt="Hearing Test">
                            </div>
                            <div class="mini-pose pose-2">
                                <img src="<?= url('assets/images/hearing/hearing-2.jpeg') ?>" alt="Aid Fitting">
                            </div>
                        </div>

                        <div class="wellness-badges">
                            <div class="badge-item">
                                <i class="fas fa-assistive-listening-systems"></i>
                                <span>Free Hearing Aids</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-user-md"></i>
                                <span>Expert Doctors</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-hand-holding-heart"></i>
                                <span>Community Care</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section" id="gallery">
    <div class="container">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Gallery</span>
            <h2 class="section-title-yoga">Camp in Action</h2>
            <p class="section-description-yoga">
                Moments from our hearing aids distribution camps — bringing the gift of sound to those in need.
            </p>
        </div>

        <?php
        $campImages = [
            ['file' => 'hearing-4.jpeg', 'title' => 'Doctor Consultation'],
            ['file' => 'hearing.jpeg', 'title' => 'Camp Inauguration'],
            ['file' => 'hearing-5.jpeg', 'title' => 'Beneficiary Support'],
            ['file' => 'hearing-1.jpeg', 'title' => 'Hearing Assessment'],
            ['file' => 'hearing-7.jpeg', 'title' => 'Hearing Aid Distribution'],
            ['file' => 'hearing-2.jpeg', 'title' => 'Aid Fitting Session'],
            ['file' => 'hearing-3.jpeg', 'title' => 'Community Outreach'],
            ['file' => 'hearing-6.jpeg', 'title' => 'Camp Highlights'],
            ['file' => 'hearing-8.jpeg', 'title' => 'Audiological Testing'],
            ['file' => 'hearing-9.jpeg', 'title' => 'Patient Care'],
            ['file' => 'hearing-10.jpeg', 'title' => 'Camp Overview'],
        ];
        ?>
        <div class="ha-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($campImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openHaLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/hearing/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Hearing Aids Camp</div>
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
<div id="haLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeHaLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="haPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="haNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="haLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="haLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var haData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/hearing/' . $img['file']), 'title' => $img['title']];
        }, $campImages)) ?>;
var haIdx = 0;

function openHaLightbox(i) {
    haIdx = i;
    updateHaLb();
    document.getElementById('haLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeHaLightbox() {
    document.getElementById('haLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateHaLb() {
    document.getElementById('haLbImg').src = haData[haIdx].src;
    document.getElementById('haLbTitle').textContent = haData[haIdx].title;
}

function haPrev() {
    haIdx = (haIdx - 1 + haData.length) % haData.length;
    updateHaLb();
}

function haNext() {
    haIdx = (haIdx + 1) % haData.length;
    updateHaLb();
}
document.getElementById('haLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeHaLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('haLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeHaLightbox();
    if (e.key === 'ArrowLeft') haPrev();
    if (e.key === 'ArrowRight') haNext();
});

// Counter Animation
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
                        c.textContent = target;
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

// Floating lotus animation
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.floating-lotus').forEach(function(lotus, i) {
        setTimeout(function() {
            lotus.style.animation = 'floatLotus 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>