<?php
require_once '../app/config/config.php';

$pageTitle = "International Yoga Day Celebration";
$pageDescription = "Join Durga Saptashati Foundation's International Yoga Day celebration promoting holistic wellness, mindfulness, and community harmony through ancient yogic practices and modern wellness techniques.";
$pageKeywords = "International Yoga Day, yoga celebration, wellness event, mindfulness, holistic health, yoga practice, meditation, community wellness, Durga Saptashati Foundation, yoga therapy";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for International Yoga Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/international-yoga-day.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>International Yoga Day</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('international-yoga-day.php') ?>">International Yoga Day</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section with Zen Design -->
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
                    <i class="fas fa-om"></i>
                    <span>Inner Peace & Wellness</span>
                </div>

                <h1 class="hero-title-yoga">
                    International
                    <span class="text-gradient-yoga">Yoga Day</span>
                    Celebration
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-yoga">
                    <div class="yoga-date-banner">
                        <div class="date-info">
                            <div class="date-number">21</div>
                            <div class="date-text">
                                <span>June</span>
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="event-theme">
                            <h4>"Yoga for Humanity"</h4>
                            <p>Unite mind, body, and soul through ancient wisdom</p>
                        </div>
                    </div>

                    <p class="hero-description-yoga">
                        Join us in celebrating the transformative power of yoga as we come together for
                        a day of mindfulness, wellness, and spiritual awakening. Experience the ancient
                        art of yoga that brings harmony between mind, body, and consciousness.
                    </p>

                    <div class="hero-stats-yoga">
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-users"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="500">0</div>
                                <div class="stat-label-yoga">Participants Expected</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-clock"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="8">0</div>
                                <div class="stat-label-yoga">Hours of Wellness</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-leaf"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="15">0</div>
                                <div class="stat-label-yoga">Yoga Sessions</div>
                            </div>
                        </div>
                        <div class="stat-item-yoga">
                            <div class="stat-icon-yoga"><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-yoga" data-counter="10">0</div>
                                <div class="stat-label-yoga">Expert Instructors</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-yoga">
                    <div class="yoga-pose-showcase">
                        <div class="pose-card main-pose">
                            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&h=400&fit=crop"
                                alt="Yoga meditation pose" class="pose-image">
                            <div class="pose-overlay">
                                <span class="pose-name">Padmasana</span>
                                <span class="pose-benefit">Lotus Pose</span>
                            </div>
                        </div>

                        <div class="floating-poses">
                            <div class="mini-pose pose-1">
                                <img src="https://images.unsplash.com/photo-1506629905607-d3ac5b9b8ec7?w=150&h=150&fit=crop"
                                    alt="Tree pose">
                            </div>
                            <div class="mini-pose pose-2">
                                <img src="https://images.unsplash.com/photo-1540206395-68808572332f?w=150&h=150&fit=crop"
                                    alt="Warrior pose">
                            </div>
                        </div>

                        <div class="wellness-badges">
                            <div class="badge-item">
                                <i class="fas fa-heart"></i>
                                <span>Heart Health</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-brain"></i>
                                <span>Mental Clarity</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-balance-scale"></i>
                                <span>Balance</span>
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
    <div class="container-fluid">
        <div class="section-header-yoga text-center" data-aos="fade-up">
            <span class="section-badge-yoga">Gallery</span>
            <h2 class="section-title-yoga">Yoga in Action</h2>
            <p class="section-description-yoga">
                Experience the transformative moments from our previous International Yoga Day celebrations
                and get inspired for this year's event.
            </p>
        </div>

        <?php
        $yogaImages = [
            ['file' => 'yoga.jpeg', 'title' => 'Yoga Day Celebration'],
            ['file' => 'yoga-1.jpeg', 'title' => 'Morning Meditation'],
            ['file' => 'yoga-2.jpeg', 'title' => 'Group Yoga Session'],
            ['file' => 'yoga-3.jpeg', 'title' => 'Asana Practice'],
            ['file' => 'yoga-4.jpeg', 'title' => 'Community Wellness'],
            ['file' => 'yoga-5.jpeg', 'title' => 'Pranayama Session'],
            ['file' => 'yoga-6.jpeg', 'title' => 'Sunset Yoga'],
        ];
        ?>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
            <?php foreach ($yogaImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openYogaLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/yoga-day/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Yoga Day</div>
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
<div id="yogaLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeYogaLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="yogaPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="yogaNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="yogaLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="yogaLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var yogaData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/yoga-day/' . $img['file']), 'title' => $img['title']]; }, $yogaImages)) ?>;
var yogaIdx = 0;

function openYogaLightbox(i) {
    yogaIdx = i;
    updateYogaLb();
    document.getElementById('yogaLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeYogaLightbox() {
    document.getElementById('yogaLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateYogaLb() {
    document.getElementById('yogaLbImg').src = yogaData[yogaIdx].src;
    document.getElementById('yogaLbTitle').textContent = yogaData[yogaIdx].title;
}

function yogaPrev() {
    yogaIdx = (yogaIdx - 1 + yogaData.length) % yogaData.length;
    updateYogaLb();
}

function yogaNext() {
    yogaIdx = (yogaIdx + 1) % yogaData.length;
    updateYogaLb();
}
document.getElementById('yogaLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeYogaLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('yogaLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeYogaLightbox();
    if (e.key === 'ArrowLeft') yogaPrev();
    if (e.key === 'ArrowRight') yogaNext();
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