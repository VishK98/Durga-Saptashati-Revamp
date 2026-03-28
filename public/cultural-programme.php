<?php
require_once '../app/config/config.php';

$pageTitle = "Cultural Programme";
$pageDescription = "Preserving and promoting Indian cultural heritage through dance, music, drama, and community events organized by Durga Saptashati Foundation.";
$pageKeywords = "cultural programme, heritage, Indian culture, dance, music, drama, festivals, community events, Durga Saptashati Foundation";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Cultural Programme Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/cultural-programme.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Cultural Programme</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('cultural-programme.php') ?>">Cultural Programme</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="cultural-hero-section">
    <div class="cultural-background">
        <div class="cultural-floating-note cultural-note-1"><i class="fas fa-music"></i></div>
        <div class="cultural-floating-note cultural-note-2"><i class="fas fa-music"></i></div>
        <div class="cultural-floating-note cultural-note-3"><i class="fas fa-music"></i></div>
        <div class="cultural-rhythm-circles">
            <div class="cultural-circle cultural-circle-1"></div>
            <div class="cultural-circle cultural-circle-2"></div>
            <div class="cultural-circle cultural-circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="cultural-badge">
                    <i class="fas fa-music"></i>
                    <span>Heritage & Culture</span>
                </div>

                <h1 class="cultural-hero-title">
                    Cultural
                    <span class="cultural-text-gradient">Programme</span>
                    Celebration
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="cultural-hero-content">
                    <div class="cultural-date-banner">
                        <div class="cultural-date-info">
                            <div class="cultural-date-number">15</div>
                            <div class="cultural-date-text">
                                <span>August</span>
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="cultural-event-theme">
                            <h4>"Preserving Our Heritage"</h4>
                            <p>Celebrating the richness of Indian art and tradition</p>
                        </div>
                    </div>

                    <p class="cultural-hero-description">
                        Join us in preserving and celebrating the rich tapestry of Indian cultural heritage
                        through captivating performances of dance, music, drama, and community events. Our
                        cultural programmes bring together artists and audiences to honour timeless traditions
                        and pass them on to future generations.
                    </p>

                    <div class="cultural-hero-stats">
                        <div class="cultural-stat-item">
                            <div class="cultural-stat-icon"><i class="fas fa-users"></i></div>
                            <div class="cultural-stat-content">
                                <div class="cultural-stat-number" data-counter="300">0</div>
                                <div class="cultural-stat-label">Participants</div>
                            </div>
                        </div>
                        <div class="cultural-stat-item">
                            <div class="cultural-stat-icon"><i class="fas fa-theater-masks"></i></div>
                            <div class="cultural-stat-content">
                                <div class="cultural-stat-number" data-counter="20">0</div>
                                <div class="cultural-stat-label">Performances</div>
                            </div>
                        </div>
                        <div class="cultural-stat-item">
                            <div class="cultural-stat-icon"><i class="fas fa-palette"></i></div>
                            <div class="cultural-stat-content">
                                <div class="cultural-stat-number" data-counter="8">0</div>
                                <div class="cultural-stat-label">Cultural Forms</div>
                            </div>
                        </div>
                        <div class="cultural-stat-item">
                            <div class="cultural-stat-icon"><i class="fas fa-calendar-alt"></i></div>
                            <div class="cultural-stat-content">
                                <div class="cultural-stat-number" data-counter="5">0</div>
                                <div class="cultural-stat-label">Events Organized</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="cultural-hero-visual">
                    <div class="cultural-showcase">
                        <div class="cultural-main-card">
                            <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&h=400&fit=crop"
                                alt="Cultural performance celebration" class="cultural-main-image">
                            <div class="cultural-main-overlay">
                                <span class="cultural-overlay-title">Classical Dance</span>
                                <span class="cultural-overlay-subtitle">Bharatanatyam Performance</span>
                            </div>
                        </div>

                        <div class="cultural-floating-images">
                            <div class="cultural-mini-image cultural-mini-1">
                                <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=150&h=150&fit=crop"
                                    alt="Music performance">
                            </div>
                            <div class="cultural-mini-image cultural-mini-2">
                                <img src="https://images.unsplash.com/photo-1504680177321-2e6a879aac86?w=150&h=150&fit=crop"
                                    alt="Cultural event">
                            </div>
                        </div>

                        <div class="cultural-art-badges">
                            <div class="cultural-art-badge">
                                <i class="fas fa-music"></i>
                                <span>Music</span>
                            </div>
                            <div class="cultural-art-badge">
                                <i class="fas fa-paint-brush"></i>
                                <span>Art & Dance</span>
                            </div>
                            <div class="cultural-art-badge">
                                <i class="fas fa-theater-masks"></i>
                                <span>Drama</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="cultural-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="cultural-section-header text-center" data-aos="fade-up">
            <span class="cultural-section-badge">Gallery</span>
            <h2 class="cultural-section-title">Cultural Highlights</h2>
            <p class="cultural-section-description">
                Relive the vibrant moments from our cultural programmes celebrating
                the beauty and diversity of Indian art, music, and heritage.
            </p>
        </div>

        <?php
        $culturalImages = [
            ['src' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&h=400&fit=crop', 'title' => 'Grand Cultural Evening'],
            ['src' => 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&h=400&fit=crop', 'title' => 'Musical Performance'],
            ['src' => 'https://images.unsplash.com/photo-1504680177321-2e6a879aac86?w=600&h=400&fit=crop', 'title' => 'Traditional Dance'],
            ['src' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&h=400&fit=crop', 'title' => 'Stage Performance'],
            ['src' => 'https://images.unsplash.com/photo-1511192336575-5a79af67a629?w=600&h=400&fit=crop', 'title' => 'Folk Music Session'],
            ['src' => 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=600&h=400&fit=crop', 'title' => 'Community Celebration'],
        ];
        ?>
        <div class="cultural-gallery-grid">
            <?php foreach ($culturalImages as $i => $img): ?>
            <div class="cultural-gallery-item" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                onclick="culturalOpenLightbox(<?= $i ?>)">
                <div class="cultural-gallery-img-wrapper">
                    <img src="<?= $img['src'] ?>" alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="cultural-gallery-tag">Cultural Event</div>
                    <div class="cultural-gallery-hover-overlay">
                        <div class="cultural-gallery-hover-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="cultural-gallery-caption">
                    <h6><?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="culturalLightbox" class="cultural-lightbox">
    <button class="cultural-lightbox-close" onclick="culturalCloseLightbox()">&times;</button>
    <button class="cultural-lightbox-nav cultural-lightbox-prev" onclick="culturalPrev()"><i class="fas fa-chevron-left"></i></button>
    <button class="cultural-lightbox-nav cultural-lightbox-next" onclick="culturalNext()"><i class="fas fa-chevron-right"></i></button>
    <div class="cultural-lightbox-content">
        <img id="culturalLbImg" src="" alt="">
        <h5 id="culturalLbTitle"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var culturalData = <?= json_encode($culturalImages) ?>;
var culturalIdx = 0;

function culturalOpenLightbox(i) {
    culturalIdx = i;
    culturalUpdateLb();
    document.getElementById('culturalLightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function culturalCloseLightbox() {
    document.getElementById('culturalLightbox').classList.remove('active');
    document.body.style.overflow = '';
}

function culturalUpdateLb() {
    document.getElementById('culturalLbImg').src = culturalData[culturalIdx].src;
    document.getElementById('culturalLbTitle').textContent = culturalData[culturalIdx].title;
}

function culturalPrev() {
    culturalIdx = (culturalIdx - 1 + culturalData.length) % culturalData.length;
    culturalUpdateLb();
}

function culturalNext() {
    culturalIdx = (culturalIdx + 1) % culturalData.length;
    culturalUpdateLb();
}

document.getElementById('culturalLightbox').addEventListener('click', function(e) {
    if (e.target === this) culturalCloseLightbox();
});

document.addEventListener('keydown', function(e) {
    if (!document.getElementById('culturalLightbox').classList.contains('active')) return;
    if (e.key === 'Escape') culturalCloseLightbox();
    if (e.key === 'ArrowLeft') culturalPrev();
    if (e.key === 'ArrowRight') culturalNext();
});

// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('.cultural-stat-number[data-counter]');
    var culturalCounterObserver = new IntersectionObserver(function(entries) {
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
                culturalCounterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.7 });
    counters.forEach(function(c) {
        culturalCounterObserver.observe(c);
    });
});

// Floating music note animation
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.cultural-floating-note').forEach(function(note, i) {
        setTimeout(function() {
            note.style.animation = 'culturalFloatNote 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
