<?php
require_once '../app/config/config.php';
$pageTitle = "International Women's Day";
$pageDescription = "Join Durga Saptashati Foundation's International Women's Day celebration — empowering women through education, skill development, and community programs.";
$pageKeywords = "women's day, women empowerment, gender equality, empowerment programs, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= url('assets/css/events/womens-day.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>International Women's Day</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('womens-day.php') ?>">Women's Day</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="womens-hero-section">
    <div class="hero-background-overlay"></div>
    <div class="floating-elements">
        <div class="floating-icon icon-1"><i class="fas fa-venus"></i></div>
        <div class="floating-icon icon-2"><i class="fas fa-crown"></i></div>
        <div class="floating-icon icon-3"><i class="fas fa-heart"></i></div>
        <div class="floating-icon icon-4"><i class="fas fa-star"></i></div>
    </div>

    <div class="container-fluid">
        <div class="row min-vh-100 align-items-center">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="empowerment-badge">
                    <i class="fas fa-female"></i>
                    <span>Empowerment & Equality</span>
                </div>
                <h1 class="hero-title-womens">
                    Celebrating
                    <span class="text-gradient-womens">Women's</span>
                    Strength & Vision
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-womens">
                    <div class="yoga-date-banner"
                        style="background:linear-gradient(135deg,rgba(242,101,34,0.1),rgba(242,101,34,0.05));border:1px solid rgba(242,101,34,0.15);border-radius:16px;padding:20px;display:flex;align-items:center;gap:20px;margin-bottom:25px;">
                        <div style="min-width:60px;text-align:center;">
                            <div style="font-size:2.2rem;font-weight:800;color:#f26522;line-height:1;">8</div>
                            <div style="font-size:0.8rem;color:#f26522;font-weight:600;">March</div>
                            <div style="font-size:0.75rem;color:#999;">2025</div>
                        </div>
                        <div>
                            <h4 style="margin:0 0 4px;color:#1a1b2e;font-weight:700;font-size:1.1rem;">"Inspire
                                Inclusion"</h4>
                            <p style="margin:0;color:#888;font-size:0.88rem;">Empowering women to lead, innovate, and
                                inspire change</p>
                        </div>
                    </div>

                    <p style="color:#666;line-height:1.8;margin-bottom:25px;">
                        Join us in honoring the incredible achievements, resilience, and contributions of women
                        worldwide. Together, we build a future where every woman has the opportunity to lead, innovate,
                        and inspire positive change.
                    </p>

                    <div class="hero-stats-womens"
                        style="display:grid;grid-template-columns:repeat(4,1fr);gap:15px;margin-bottom:25px;">
                        <div
                            style="text-align:center;padding:15px 10px;background:#fff;border-radius:12px;box-shadow:0 3px 15px rgba(0,0,0,0.06);">
                            <div style="font-size:1.5rem;font-weight:800;color:#f26522;" data-counter="200">0</div>
                            <div style="font-size:0.72rem;color:#888;font-weight:500;">Women Empowered</div>
                        </div>
                        <div
                            style="text-align:center;padding:15px 10px;background:#fff;border-radius:12px;box-shadow:0 3px 15px rgba(0,0,0,0.06);">
                            <div style="font-size:1.5rem;font-weight:800;color:#f26522;" data-counter="8">0</div>
                            <div style="font-size:0.72rem;color:#888;font-weight:500;">Programs Conducted</div>
                        </div>
                        <div
                            style="text-align:center;padding:15px 10px;background:#fff;border-radius:12px;box-shadow:0 3px 15px rgba(0,0,0,0.06);">
                            <div style="font-size:1.5rem;font-weight:800;color:#f26522;" data-counter="5">0</div>
                            <div style="font-size:0.72rem;color:#888;font-weight:500;">Workshops</div>
                        </div>
                        <div
                            style="text-align:center;padding:15px 10px;background:#fff;border-radius:12px;box-shadow:0 3px 15px rgba(0,0,0,0.06);">
                            <div style="font-size:1.5rem;font-weight:800;color:#f26522;" data-counter="12">0</div>
                            <div style="font-size:0.72rem;color:#888;font-weight:500;">Expert Speakers</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-womens" style="position:relative;">
                    <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(242,101,34,0.2);">
                        <img src="<?= url('assets/images/yoga-day/yoga.jpeg') ?>" alt="Women's Day Celebration"
                            style="width:100%;height:450px;object-fit:cover;display:block;">
                    </div>
                    <div style="position:absolute;bottom:20px;left:20px;right:20px;display:flex;gap:10px;">
                        <div
                            style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);padding:12px 16px;border-radius:12px;display:flex;align-items:center;gap:8px;box-shadow:0 5px 20px rgba(0,0,0,0.1);">
                            <i class="fas fa-graduation-cap" style="color:#f26522;"></i>
                            <span style="font-size:0.8rem;font-weight:600;color:#1a1b2e;">Education First</span>
                        </div>
                        <div
                            style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);padding:12px 16px;border-radius:12px;display:flex;align-items:center;gap:8px;box-shadow:0 5px 20px rgba(0,0,0,0.1);">
                            <i class="fas fa-briefcase" style="color:#f26522;"></i>
                            <span style="font-size:0.8rem;font-weight:600;color:#1a1b2e;">Career Growth</span>
                        </div>
                        <div
                            style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);padding:12px 16px;border-radius:12px;display:flex;align-items:center;gap:8px;box-shadow:0 5px 20px rgba(0,0,0,0.1);">
                            <i class="fas fa-balance-scale" style="color:#f26522;"></i>
                            <span style="font-size:0.8rem;font-weight:600;color:#1a1b2e;">Equal Rights</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section style="padding:80px 0;background:linear-gradient(165deg,#f8f9fa,#fff);" id="gallery">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Gallery</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">Women's Day in Action</h2>
            <p style="color:#888;max-width:600px;margin:10px auto 0;">Moments from our Women's Day celebrations,
                workshops, and empowerment programs.</p>
        </div>

        <?php
        $wdImages = [
            ['file' => 'yoga.jpeg', 'title' => "Women's Day Celebration"],
            ['file' => 'yoga-1.jpeg', 'title' => 'Empowerment Workshop'],
            ['file' => 'yoga-2.jpeg', 'title' => 'Panel Discussion'],
            ['file' => 'yoga-3.jpeg', 'title' => 'Felicitation Ceremony'],
            ['file' => 'yoga-4.jpeg', 'title' => 'Skill Development'],
            ['file' => 'yoga-5.jpeg', 'title' => 'Community Program'],
            ['file' => 'yoga-6.jpeg', 'title' => 'Awards & Recognition'],
        ];
        ?>
        <div class="wd-gallery-grid-3" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($wdImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openWdLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/yoga-day/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(242,101,34,0.85);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Women's Day</div>
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

<style>
@media(max-width:991px){.wd-gallery-grid-3{grid-template-columns:repeat(2,1fr)!important;}}
@media(max-width:575px){.wd-gallery-grid-3{grid-template-columns:1fr!important;}}
</style>

<!-- Lightbox -->
<div id="wdLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeWdLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="wdPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="wdNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="wdLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="wdLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var wdData = <?= json_encode(array_map(function ($img) {
        return ['src' => url('assets/images/yoga-day/' . $img['file']), 'title' => $img['title']]; }, $wdImages)) ?>;
var wdIdx = 0;

function openWdLightbox(i) {
    wdIdx = i;
    updateWdLb();
    document.getElementById('wdLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeWdLightbox() {
    document.getElementById('wdLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateWdLb() {
    document.getElementById('wdLbImg').src = wdData[wdIdx].src;
    document.getElementById('wdLbTitle').textContent = wdData[wdIdx].title;
}

function wdPrev() {
    wdIdx = (wdIdx - 1 + wdData.length) % wdData.length;
    updateWdLb();
}

function wdNext() {
    wdIdx = (wdIdx + 1) % wdData.length;
    updateWdLb();
}
document.getElementById('wdLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeWdLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('wdLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeWdLightbox();
    if (e.key === 'ArrowLeft') wdPrev();
    if (e.key === 'ArrowRight') wdNext();
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
        e.preventDefault();
        var t = document.querySelector(this.getAttribute('href'));
        if (t) t.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
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

    // Floating icons
    document.querySelectorAll('.floating-icon').forEach(function(icon, i) {
        icon.style.animation = 'float 3s ease-in-out infinite';
        icon.style.animationDelay = (i * 0.5) + 's';
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>