<?php
require_once '../app/config/config.php';

$pageTitle = "Durga Award Ceremony";
$pageDescription = "Durga Saptashati Foundation's prestigious Durga Award honours exceptional individuals and organizations making outstanding contributions to social welfare, women empowerment, and community development.";
$pageKeywords = "Durga Award, social welfare award, women empowerment, community development, recognition, Durga Saptashati Foundation, honour ceremony";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Durga Award Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/durga-award.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Durga Award</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('events.php') ?>">Events</a>
                <a href="<?= url('durga-award.php') ?>">Durga Award</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="award-hero-section">
    <div class="award-bg-elements">
        <div class="floating-star star-1"></div>
        <div class="floating-star star-2"></div>
        <div class="floating-star star-3"></div>
        <div class="award-circles">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="award-badge">
                    <i class="fas fa-trophy"></i>
                    <span>Excellence & Recognition</span>
                </div>

                <h1 class="hero-title-award">
                    The Prestigious
                    <span class="text-gradient-award">Durga Award</span>
                    Ceremony
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content-award">
                    <div class="award-date-banner">
                        <div class="date-info">
                            <div class="date-number">15</div>
                            <div class="date-text">
                                <span>October</span>
                                <span>2025</span>
                            </div>
                        </div>
                        <div class="event-theme">
                            <h4>"Honouring the Change Makers"</h4>
                            <p>Celebrating courage, compassion, and commitment to society</p>
                        </div>
                    </div>

                    <p class="hero-description-award">
                        The Durga Award is a prestigious recognition by Durga Saptashati Foundation that
                        honours exceptional individuals and organisations making outstanding contributions
                        to social welfare, women empowerment, education, and community development across India.
                    </p>

                    <div class="hero-stats-award">
                        <div class="stat-item-award">
                            <div class="stat-icon-award"><i class="fas fa-award"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-award" data-counter="50">0</div>
                                <div class="stat-label-award">Awardees Honoured</div>
                            </div>
                        </div>
                        <div class="stat-item-award">
                            <div class="stat-icon-award"><i class="fas fa-calendar-alt"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-award" data-counter="5">0</div>
                                <div class="stat-label-award">Years Running</div>
                            </div>
                        </div>
                        <div class="stat-item-award">
                            <div class="stat-icon-award"><i class="fas fa-star"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-award" data-counter="8">0</div>
                                <div class="stat-label-award">Award Categories</div>
                            </div>
                        </div>
                        <div class="stat-item-award">
                            <div class="stat-icon-award"><i class="fas fa-users"></i></div>
                            <div class="stat-content">
                                <div class="stat-number-award" data-counter="500">0</div>
                                <div class="stat-label-award">Attendees Expected</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="hero-visual-award">
                    <div class="award-showcase">
                        <div class="showcase-card main-showcase">
                            <img src="<?= url('assets/images/durga-award/durga-award.jpeg') ?>"
                                alt="Durga Award Ceremony" class="showcase-image">
                            <div class="showcase-overlay">
                                <span class="showcase-name">Annual Ceremony</span>
                                <span class="showcase-detail">Durga Award 2025</span>
                            </div>
                        </div>

                        <div class="floating-showcases">
                            <div class="mini-showcase showcase-1">
                                <img src="<?= url('assets/images/durga-award/durga-award-1.jpeg') ?>"
                                    alt="Award Felicitation">
                            </div>
                            <div class="mini-showcase showcase-2">
                                <img src="<?= url('assets/images/durga-award/durga-award-2.jpeg') ?>"
                                    alt="Award Ceremony">
                            </div>
                        </div>

                        <div class="award-highlights">
                            <div class="highlight-item">
                                <i class="fas fa-female"></i>
                                <span>Women Leaders</span>
                            </div>
                            <div class="highlight-item">
                                <i class="fas fa-hand-holding-heart"></i>
                                <span>Social Impact</span>
                            </div>
                            <div class="highlight-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Education</span>
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
        <div class="section-header-award text-center" data-aos="fade-up">
            <span class="section-badge-award">Gallery</span>
            <h2 class="section-title-award">Award Ceremony Moments</h2>
            <p class="section-description-award">
                Relive the inspiring moments from our previous Durga Award ceremonies
                and the stories of extraordinary change-makers.
            </p>
        </div>

        <?php
        $awardImages = [
            ['file' => 'durga-award-5.jpeg', 'title' => 'Cultural Performance'],
            ['file' => 'durga-award-27.jpeg', 'title' => 'Graceful Moves'],
            ['file' => 'durga-award.jpeg', 'title' => 'Award Ceremony'],
            ['file' => 'durga-award-13.jpeg', 'title' => 'Opening Act'],
            ['file' => 'durga-award-3.jpeg', 'title' => 'Awardee Speech'],
            ['file' => 'durga-award-35.jpeg', 'title' => 'Group Performance'],
            ['file' => 'durga-award-9.jpeg', 'title' => 'Inspiring Moments'],
            ['file' => 'durga-award-21.jpeg', 'title' => 'Elegant Performance'],
            ['file' => 'durga-award-15.jpeg', 'title' => 'Stage Spotlight'],
            ['file' => 'durga-award-1.jpeg', 'title' => 'Felicitation Moment'],
            ['file' => 'durga-award-30.jpeg', 'title' => 'Colourful Celebration'],
            ['file' => 'durga-award-17.jpeg', 'title' => 'Joyful Expressions'],
            ['file' => 'durga-award-7.jpeg', 'title' => 'Award Presentation'],
            ['file' => 'durga-award-24.jpeg', 'title' => 'Traditional Flair'],
            ['file' => 'durga-award-38.jpeg', 'title' => 'Grand Finale'],
            ['file' => 'durga-award-11.jpeg', 'title' => 'Recognition Ceremony'],
            ['file' => 'durga-award-19.jpeg', 'title' => 'Stage Highlight'],
            ['file' => 'durga-award-4.jpeg', 'title' => 'Community Leaders'],
            ['file' => 'durga-award-33.jpeg', 'title' => 'Energetic Showcase'],
            ['file' => 'durga-award-14.jpeg', 'title' => 'Artistic Expression'],
            ['file' => 'durga-award-8.jpeg', 'title' => 'Honourable Guests'],
            ['file' => 'durga-award-22.jpeg', 'title' => 'Cultural Moment'],
            ['file' => 'durga-award-36.jpeg', 'title' => 'Festive Spirit'],
            ['file' => 'durga-award-16.jpeg', 'title' => 'Rhythmic Harmony'],
            ['file' => 'durga-award-2.jpeg', 'title' => 'Guest of Honour'],
            ['file' => 'durga-award-29.jpeg', 'title' => 'Vibrant Moves'],
            ['file' => 'durga-award-18.jpeg', 'title' => 'Ensemble Act'],
            ['file' => 'durga-award-10.jpeg', 'title' => 'Stage Programme'],
            ['file' => 'durga-award-25.jpeg', 'title' => 'Soulful Performance'],
            ['file' => 'durga-award-39.jpeg', 'title' => 'Curtain Call'],
            ['file' => 'durga-award-20.jpeg', 'title' => 'Team Performance'],
            ['file' => 'durga-award-6.jpeg', 'title' => 'Group Photo'],
            ['file' => 'durga-award-31.jpeg', 'title' => 'Lively Celebration'],
            ['file' => 'durga-award-23.jpeg', 'title' => 'Captivating Moment'],
            ['file' => 'durga-award-12.jpeg', 'title' => 'Celebration'],
            ['file' => 'durga-award-37.jpeg', 'title' => 'Creative Showcase'],
            ['file' => 'durga-award-26.jpeg', 'title' => 'Cultural Evening'],
            ['file' => 'durga-award-34.jpeg', 'title' => 'Young Performers'],
            ['file' => 'durga-award-28.jpeg', 'title' => 'Powerful Act'],
            ['file' => 'durga-award-32.jpeg', 'title' => 'Heritage Tribute'],
        ];
        ?>
        <div class="award-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($awardImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openAwardLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/durga-award/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Durga Award</div>
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
<div id="awardLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeAwardLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="awardPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="awardNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="awardLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="awardLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var awardData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/durga-award/' . $img['file']), 'title' => $img['title']]; }, $awardImages)) ?>;
var awardIdx = 0;

function openAwardLightbox(i) {
    awardIdx = i;
    updateAwardLb();
    document.getElementById('awardLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeAwardLightbox() {
    document.getElementById('awardLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateAwardLb() {
    document.getElementById('awardLbImg').src = awardData[awardIdx].src;
    document.getElementById('awardLbTitle').textContent = awardData[awardIdx].title;
}

function awardPrev() {
    awardIdx = (awardIdx - 1 + awardData.length) % awardData.length;
    updateAwardLb();
}

function awardNext() {
    awardIdx = (awardIdx + 1) % awardData.length;
    updateAwardLb();
}
document.getElementById('awardLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeAwardLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('awardLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeAwardLightbox();
    if (e.key === 'ArrowLeft') awardPrev();
    if (e.key === 'ArrowRight') awardNext();
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

// Floating star animation
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.floating-star').forEach(function(star, i) {
        setTimeout(function() {
            star.style.animation = 'floatStar 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
