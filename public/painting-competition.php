<?php
require_once '../app/config/config.php';

$pageTitle = "Durga Saptashati NGO in Delhi: Painting Competition for underprivileged children.";
$pageDescription = "Durga Saptashati is a non-profit charity organisation in Dwarka working for the education of underprivileged children. To give them a balanced chance at self-development, we conduct painting competitions to hone their talents and develop their creative abilities. You can help these kids realize their potential and get the recognition they deserve by sponsoring our painting competitions, awards, prizes or gifts.";
$pageKeywords = "Durga Saptashati NGO, Top NGO in Dwarka, Delhi, NGO for underprivileged children,PaintingCompetitionInDwarka,DurgaSaptashatiPaintingCompetitionInDwarka,DwarkaPaintingCompetitionDurgaSaptashati,PaintingCompetition,PaintingCompetitionNGOInDwarkaDelhi,Durga Saptashati,Durga Saptashati NGO,Durga Saptashati foundation,DurgaSaptashati,Painting Competition for Underprivileged Children in Dwarka, Painting Competition NGO in Dwarka Delhi, Painting Competition for Underprivileged Children";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Painting Competition Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/painting-competition.css') ?>">

<!-- Page Header Start -->
<div class="page-header painting-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Painting Competition</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('painting-competition.php') ?>">Painting Competition</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<section class="paint-hero-section">
    <div class="paint-background">
        <div class="floating-brush brush-1"></div>
        <div class="floating-brush brush-2"></div>
        <div class="floating-brush brush-3"></div>
        <div class="paint-circles">
            <div class="paint-circle paint-circle-1"></div>
            <div class="paint-circle paint-circle-2"></div>
            <div class="paint-circle paint-circle-3"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <div class="col-12 text-center mb-4" data-aos="fade-down" data-aos-duration="800">
                <div class="painting-badge">
                    <i class="fas fa-palette"></i>
                    <span>Arts & Creativity</span>
                </div>

                <h1 class="paint-hero-title">
                    Painting
                    <span class="paint-text-gradient">Competition</span>
                    for Children
                </h1>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="paint-hero-content">
                    <div class="paint-date-banner">
                        <div class="paint-date-info">
                            <div class="paint-date-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                        </div>
                        <div class="paint-event-theme">
                            <h4>"Colours of Imagination"</h4>
                            <p>Unleashing creativity through art and expression</p>
                        </div>
                    </div>

                    <p class="paint-hero-description">
                        We believe every child has a creative spark waiting to be ignited. Our inter-school
                        painting competitions provide a vibrant platform for young artists to express themselves,
                        showcase their talent, and build confidence through art workshops, exhibitions, and
                        recognition of their boundless imagination.
                    </p>

                    <div class="paint-hero-stats">
                        <div class="paint-stat-item">
                            <div class="paint-stat-icon"><i class="fas fa-users"></i></div>
                            <div class="stat-content">
                                <div class="paint-stat-number" data-counter="200">0</div>
                                <div class="paint-stat-label">Participants</div>
                            </div>
                        </div>
                        <div class="paint-stat-item">
                            <div class="paint-stat-icon"><i class="fas fa-school"></i></div>
                            <div class="stat-content">
                                <div class="paint-stat-number" data-counter="15">0</div>
                                <div class="paint-stat-label">Schools</div>
                            </div>
                        </div>
                        <div class="paint-stat-item">
                            <div class="paint-stat-icon"><i class="fas fa-trophy"></i></div>
                            <div class="stat-content">
                                <div class="paint-stat-number" data-counter="50">0</div>
                                <div class="paint-stat-label">Awards</div>
                            </div>
                        </div>
                        <div class="paint-stat-item">
                            <div class="paint-stat-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="stat-content">
                                <div class="paint-stat-number" data-counter="10">0</div>
                                <div class="paint-stat-label">Workshops</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                <div class="paint-hero-visual">
                    <div class="paint-showcase">
                        <div class="paint-card paint-main-card">
                            <img src="<?= url('assets/images/painting/painting.webp') ?>" alt="Painting Competition"
                                class="paint-card-image">
                            <div class="paint-card-overlay">
                                <span class="paint-card-name">Colours of Imagination</span>
                                <span class="paint-card-detail">Inter-School Competition</span>
                            </div>
                        </div>

                        <div class="paint-floating-cards">
                            <div class="paint-mini-card paint-mini-1">
                                <img src="<?= url('assets/images/painting/painting-1.webp') ?>" alt="Art Workshop">
                            </div>
                            <div class="paint-mini-card paint-mini-2">
                                <img src="<?= url('assets/images/painting/painting-2.webp') ?>" alt="Art Exhibition">
                            </div>
                        </div>

                        <div class="paint-badges">
                            <div class="paint-badge-item">
                                <i class="fas fa-paint-brush"></i>
                                <span>Creativity</span>
                            </div>
                            <div class="paint-badge-item">
                                <i class="fas fa-palette"></i>
                                <span>Expression</span>
                            </div>
                            <div class="paint-badge-item">
                                <i class="fas fa-award"></i>
                                <span>Recognition</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="paint-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="paint-section-header text-center" data-aos="fade-up">
            <span class="paint-section-badge">Gallery</span>
            <h2 class="paint-section-title">Creative Moments</h2>
            <p class="paint-section-description">
                Relive the vibrant moments from our painting competitions where young artists
                brought their imagination to life on canvas.
            </p>
        </div>

        <?php
        $paintingImages = [
            ['file' => 'painting.webp', 'title' => 'Painting Competition'],
            ['file' => 'painting-1.webp', 'title' => 'Young Artists at Work'],
            ['file' => 'painting-2.webp', 'title' => 'Art Workshop'],
            ['file' => 'painting-3.webp', 'title' => 'Creative Expressions'],
            ['file' => 'painting-4.webp', 'title' => 'Art Exhibition'],
            ['file' => 'painting-5.webp', 'title' => 'Award Ceremony'],
            ['file' => 'painting-6.webp', 'title' => 'Colours of Imagination'],
        ];
        ?>
        <div class="paint-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($paintingImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openPaintingLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/painting/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Painting Competition</div>
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
<div id="paintingLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closePaintingLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="paintingPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="paintingNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="paintingLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="paintingLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
var paintingData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/painting/' . $img['file']), 'title' => $img['title']]; }, $paintingImages)) ?>;
var paintingIdx = 0;

function openPaintingLightbox(i) {
    paintingIdx = i;
    updatePaintingLb();
    document.getElementById('paintingLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closePaintingLightbox() {
    document.getElementById('paintingLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updatePaintingLb() {
    document.getElementById('paintingLbImg').src = paintingData[paintingIdx].src;
    document.getElementById('paintingLbTitle').textContent = paintingData[paintingIdx].title;
}

function paintingPrev() {
    paintingIdx = (paintingIdx - 1 + paintingData.length) % paintingData.length;
    updatePaintingLb();
}

function paintingNext() {
    paintingIdx = (paintingIdx + 1) % paintingData.length;
    updatePaintingLb();
}
document.getElementById('paintingLightbox').addEventListener('click', function(e) {
    if (e.target === this) closePaintingLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('paintingLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closePaintingLightbox();
    if (e.key === 'ArrowLeft') paintingPrev();
    if (e.key === 'ArrowRight') paintingNext();
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

// Floating brush animation
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.floating-brush').forEach(function(brush, i) {
        setTimeout(function() {
            brush.style.animation = 'floatBrush 6s ease-in-out infinite';
        }, i * 2000);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>