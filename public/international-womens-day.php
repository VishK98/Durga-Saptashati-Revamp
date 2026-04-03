<?php
require_once '../app/config/config.php';

$pageTitle = "Durga Saptashati NGO in Delhi: International Women’s day Celebration in Dwarka.";
$pageDescription = "Durga Saptashati NGO in Dwarka is dedicated to improving the living conditions of marginalised women in Delhi. Although we celebrate the power of women every day, celebrating International women’s day on 8th March every year- has its own charm. We conduct various fun activities, cultural programmes, and competitions to promote women’s empowerment and spread awareness about women’s safety and education in Delhi.";
$pageKeywords = "Durga Saptashati NGO, Best NGO in Dwarka, Delhi, International Women’s day celebration in Dwarka,InternationalWomenDayInDwarka, InternationalWomenDay, Internationalwomendaycelebrationindwarka, CelebrationofInternationalWomenDay, Internationalwomendaycelebration,Durga Saptashati,Durga Saptashati NGO,Durga Saptashati foundation,DurgaSaptashati,International Women’s Day celebrated in Dwarka, Women’s Rights Non-Profit Organization in Delhi";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for International Women's Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/international-womens-day.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>International Women's Day</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('international-womens-day.php') ?>">International Women's Day</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="iwd-hero-section">
    <div class="iwd-zen-background">
        <div class="iwd-floating-lotus iwd-lotus-1"></div>
        <div class="iwd-floating-lotus iwd-lotus-2"></div>
        <div class="iwd-floating-lotus iwd-lotus-3"></div>
        <div class="iwd-meditation-circles">
            <div class="iwd-circle iwd-circle-1"></div>
            <div class="iwd-circle iwd-circle-2"></div>
            <div class="iwd-circle iwd-circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="iwd-spiritual-badge">
                    <i class="fas fa-venus"></i>
                    <span>Celebration & Honour</span>
                </div>

                <h1 class="iwd-hero-title">
                    International
                    <span class="iwd-text-gradient">Women's Day</span>
                    Celebration
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="iwd-hero-content">
                    <div class="iwd-date-banner">
                        <div class="iwd-date-info">
                            <div class="iwd-date-number">8</div>
                            <div class="iwd-date-text">
                                <span>March</span>
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="iwd-event-theme">
                            <h4>"Inspire Inclusion"</h4>
                            <p>Celebrating women's strength, resilience, and achievements</p>
                        </div>
                    </div>

                    <p class="iwd-hero-description">
                        Join us as we celebrate the incredible achievements, resilience, and strength of women
                        across all walks of life. Our International Women's Day celebration brings together
                        inspiring speakers, empowerment workshops, and heartfelt felicitations to honour the
                        women who shape our world every day.
                    </p>

                    <div class="iwd-hero-stats">
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-users"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="300">0</div>
                                <div class="iwd-stat-label">Attendees</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-microphone"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="10">0</div>
                                <div class="iwd-stat-label">Speakers</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-chalkboard"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="5">0</div>
                                <div class="iwd-stat-label">Workshops</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-trophy"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="15">0</div>
                                <div class="iwd-stat-label">Awards Given</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="iwd-hero-visual">
                    <div class="iwd-pose-showcase">
                        <div class="iwd-pose-card iwd-main-pose">
                            <img src="<?= url('assets/images/woman-day/woman.jpeg') ?>" alt="Women's Day Celebration"
                                class="iwd-pose-image">
                            <div class="iwd-pose-overlay">
                                <span class="iwd-pose-name">Women's Day</span>
                                <span class="iwd-pose-benefit">Inspire Inclusion</span>
                            </div>
                        </div>

                        <div class="iwd-floating-poses">
                            <div class="iwd-mini-pose iwd-pose-1">
                                <img src="<?= url('assets/images/woman-day/woman-1.jpeg') ?>" alt="Women empowerment">
                            </div>
                            <div class="iwd-mini-pose iwd-pose-2">
                                <img src="<?= url('assets/images/woman-day/woman-2.jpeg') ?>" alt="Women celebration">
                            </div>
                        </div>

                        <div class="iwd-wellness-badges">
                            <div class="iwd-badge-item">
                                <i class="fas fa-heart"></i>
                                <span>Strength</span>
                            </div>
                            <div class="iwd-badge-item">
                                <i class="fas fa-fist-raised"></i>
                                <span>Empowerment</span>
                            </div>
                            <div class="iwd-badge-item">
                                <i class="fas fa-star"></i>
                                <span>Excellence</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="iwd-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="iwd-section-header text-center" data-aos="fade-up">
            <span class="iwd-section-badge">Gallery</span>
            <h2 class="iwd-section-title">Celebration Moments</h2>
            <p class="iwd-section-description">
                Relive the inspiring moments from our International Women's Day celebrations featuring
                powerful speeches, heartfelt felicitations, and joyous community gatherings.
            </p>
        </div>

        <?php
        $iwdImages = [
            ['file' => 'woman.jpeg', 'title' => "Women's Day Celebration"],
            ['file' => 'woman-1.jpeg', 'title' => 'Felicitation Ceremony'],
            ['file' => 'woman-2.jpeg', 'title' => 'Empowerment Workshop'],
            ['file' => 'woman-3.jpeg', 'title' => 'Inspirational Speeches'],
            ['file' => 'woman-4.jpeg', 'title' => 'Community Gathering'],
            ['file' => 'woman-5.jpeg', 'title' => 'Award Ceremony'],
            ['file' => 'woman-6.jpeg', 'title' => 'Cultural Programme'],
        ];
        ?>
        <div class="iwd-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($iwdImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openIwdLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/woman-day/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
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

<!-- Lightbox -->
<div id="iwdLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeIwdLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="iwdPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="iwdNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="iwdLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="iwdLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var iwdData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/woman-day/' . $img['file']), 'title' => $img['title']]; }, $iwdImages)) ?>;
var iwdIdx = 0;

function openIwdLightbox(i) {
    iwdIdx = i;
    updateIwdLb();
    document.getElementById('iwdLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeIwdLightbox() {
    document.getElementById('iwdLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateIwdLb() {
    document.getElementById('iwdLbImg').src = iwdData[iwdIdx].src;
    document.getElementById('iwdLbTitle').textContent = iwdData[iwdIdx].title;
}

function iwdPrev() {
    iwdIdx = (iwdIdx - 1 + iwdData.length) % iwdData.length;
    updateIwdLb();
}

function iwdNext() {
    iwdIdx = (iwdIdx + 1) % iwdData.length;
    updateIwdLb();
}
document.getElementById('iwdLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeIwdLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('iwdLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeIwdLightbox();
    if (e.key === 'ArrowLeft') iwdPrev();
    if (e.key === 'ArrowRight') iwdNext();
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
                        counter.textContent = target.toLocaleString() + '+';
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
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
    document.querySelectorAll('.iwd-floating-lotus').forEach(function(lotus, i) {
        setTimeout(function() {
            lotus.style.animation = 'iwdFloatLotus 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>