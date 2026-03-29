<?php
require_once '../app/config/config.php';

$pageTitle = "No People Hungry Campaign";
$pageDescription = "Durga Saptashati Foundation's No People Hungry Campaign - Nourishing lives and building hope through food security drives, community kitchens, and volunteer-led meal distribution programs.";
$pageKeywords = "no people hungry, food security, meal distribution, community kitchen, hunger relief, food drive, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for No People Hungry Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/no-people-hungry.css') ?>">

<!-- Page Header Start -->
<div class="page-header hungary-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>No People Hungry</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('no-people-hungry.php') ?>">No People Hungry</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section — Full-width Image Background -->
<section class="hunger-hero">
    <div class="hunger-hero-bg">
        <img src="<?= url('assets/images/hungary/hungary.webp') ?>" alt="No People Hungry Campaign">
        <div class="hunger-hero-overlay"></div>
    </div>

    <div class="container-fluid position-relative" style="z-index:10;">
        <div class="row min-vh-80 align-items-center">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                <div class="hunger-hero-badge">
                    <i class="fas fa-utensils"></i>
                    <span>Food Security</span>
                </div>

                <h1 class="hunger-hero-title">
                    No People
                    <span class="hunger-highlight">Hungry</span>
                    Campaign
                </h1>

                <p class="hunger-hero-desc">
                    Join our mission to eradicate hunger from our communities. Through dedicated food drives,
                    community kitchens, and volunteer-led distribution programs, we ensure that no one goes
                    to bed hungry. Together, we can build a world where food security is a reality for all.
                </p>

                <div class="hunger-info-row">
                    <div class="hunger-info-card">
                        <div class="hunger-info-icon"><i class="fas fa-utensils"></i></div>
                        <div>
                            <h4>"Nourishing Lives, Building Hope"</h4>
                            <p>Every meal served is a step towards a hunger-free world</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="hunger-stats-grid">
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="hunger-stat-icon"><i class="fas fa-hamburger"></i></div>
                        <div class="hunger-stat-number" data-counter="10000">0</div>
                        <div class="hunger-stat-label">Meals Served</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="hunger-stat-icon"><i class="fas fa-truck"></i></div>
                        <div class="hunger-stat-number" data-counter="50">0</div>
                        <div class="hunger-stat-label">Food Drives</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="hunger-stat-icon"><i class="fas fa-store"></i></div>
                        <div class="hunger-stat-number" data-counter="15">0</div>
                        <div class="hunger-stat-label">Community Kitchens</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="hunger-stat-icon"><i class="fas fa-hands-helping"></i></div>
                        <div class="hunger-stat-number" data-counter="200">0</div>
                        <div class="hunger-stat-label">Volunteers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="hunger-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="hunger-section-header text-center" data-aos="fade-up">
            <span class="hunger-section-badge">Gallery</span>
            <h2 class="hunger-section-title">Hunger Relief in Action</h2>
            <p class="hunger-section-desc">
                Witness the impact of our food security campaigns as we serve meals, distribute groceries,
                and bring smiles to countless faces across communities.
            </p>
        </div>

        <?php
        $hungerImages = [
            ['file' => 'hungary.webp', 'title' => 'Community Meal Distribution'],
            ['file' => 'hungary-1.webp', 'title' => 'Food Drive Campaign'],
            ['file' => 'hungary-2.webp', 'title' => 'Volunteer Kitchen Service'],
            ['file' => 'hungary-3.webp', 'title' => 'Grocery Distribution'],
            ['file' => 'hungary-4.webp', 'title' => 'Feeding the Community'],
        ];
        ?>
        <div class="hunger-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($hungerImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openHungerLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/hungary/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Food Drive</div>
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
<div id="hungerLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeHungerLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="hungerPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="hungerNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="hungerLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="hungerLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var hungerData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/hungary/' . $img['file']), 'title' => $img['title']]; }, $hungerImages)) ?>;
var hungerIdx = 0;

function openHungerLightbox(i) {
    hungerIdx = i;
    updateHungerLb();
    document.getElementById('hungerLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeHungerLightbox() {
    document.getElementById('hungerLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateHungerLb() {
    document.getElementById('hungerLbImg').src = hungerData[hungerIdx].src;
    document.getElementById('hungerLbTitle').textContent = hungerData[hungerIdx].title;
}

function hungerPrev() {
    hungerIdx = (hungerIdx - 1 + hungerData.length) % hungerData.length;
    updateHungerLb();
}

function hungerNext() {
    hungerIdx = (hungerIdx + 1) % hungerData.length;
    updateHungerLb();
}
document.getElementById('hungerLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeHungerLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('hungerLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeHungerLightbox();
    if (e.key === 'ArrowLeft') hungerPrev();
    if (e.key === 'ArrowRight') hungerNext();
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
</script>

<?php include '../app/views/layout/footer.php'; ?>