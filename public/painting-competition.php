<?php
require_once '../app/config/config.php';

$pageTitle = "Painting Competition for underprivileged Kids- Durga Saptashati NGO ";
$pageDescription = "Durga Saptashati Foundation organizes painting competitions for kids in Dwarka Delhi to encourage creativity, art skills, and talent development among children through fun and educational activities. To give them a balanced chance at self-development, we conduct painting competitions to hone their talents and develop their creative abilities and get the recognition they deserve by sponsoring our painting competitions, awards, prizes or gifts.";
$pageKeywords = "Painting Competition For Underprivileged Children In Dwarka, Painting Competition NGO in Dwarka Delhi,painting competition for kids, art competition in Dwarka Delhi, drawing competition for children, painting competition in Dwarka";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Painting Competition Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/painting-competition.css') ?>">

<!-- Page Header Start -->
<div class="page-header painting-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">Painting Competition</p>
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
                            <h3>"Colours of Imagination"</h3>
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
        <div class="paint-gallery-grid gallery-grid">
            <?php foreach ($paintingImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/painting/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Painting Competition</div>
                    <div class="gc-overlay"><div class="gc-search-icon"><i class="fas fa-search-plus"></i></div></div>
                </div>
                <div class="gc-caption">
                    <h3><?= htmlspecialchars($img['title']) ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Lightbox -->
<div id="paintingLightbox" class="page-lightbox">
    <button class="lb-close">&times;</button>
    <button class="lb-prev"><i class="fas fa-chevron-left"></i></button>
    <button class="lb-next"><i class="fas fa-chevron-right"></i></button>
    <div class="lb-content">
        <img class="lb-img" src="" alt="">
        <h5 class="lb-title"></h5>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    window.pageLb = initLightbox('paintingLightbox', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/painting/' . $img['file']), 'title' => $img['title']]; }, $paintingImages)) ?>);
    initFloatingAnimation('.floating-brush', 'floatBrush');
});
</script>

<?php include '../app/views/layout/footer.php'; ?>