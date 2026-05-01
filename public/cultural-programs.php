<?php
require_once '../app/config/config.php';
$pageTitle = "Cultural Programs in Dwarka Delhi | Cultural Events NGO- Durga Saptashati ";
$pageDescription = "Durga Saptashati Foundation organizes cultural programs in Dwarka Delhi including dance, music, art and community events that promote cultural values, creativity and social unity. Therefore, we organise various cultural programmes at periodic intervals. Catch glimpses of beautiful folk dances, rangoli decorations, drawings, paintings that promote cultural values, creativity and social unity visit our images gallery. Join us!";
$pageKeywords = "Cultural Programme For Underprivileged Children In Dwarka,Cultural Programme NGO in Dwarka Delhi,Cultural Programme for Underprivileged Children,Cultural Programme For Children In Delhi, cultural programs in Delhi, cultural activities for kids In Dwarka, cultural event in Dwarka Delhi, NGO cultural activities In Dwarka, Dance and music cultural programs In Dwarka";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/womens-empowerment.css') ?>">

<!-- Page Header -->
<div class="page-header cultural-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Cultural Programs</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('cultural-programs.php') ?>">Cultural Programs</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section — Image Collage Left + Content Right -->
<section class="we-hero">
    <div class="container-fluid">
        <div class="row align-items-center we-hero-row">
            <!-- Left: Image Collage -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="we-image-stack">
                    <div class="we-img-main">
                        <img src="<?= url('assets/images/cultural/cultural.webp') ?>" alt="Cultural Programs">
                    </div>
                    <div class="we-img-secondary">
                        <img src="<?= url('assets/images/cultural/cultural-1.webp') ?>" alt="Traditional Performance">
                    </div>
                    <div class="we-img-accent">
                        <img src="<?= url('assets/images/cultural/cultural-2.webp') ?>" alt="Heritage Celebration">
                    </div>
                    <div class="we-float-stat we-float-stat-1" data-aos="zoom-in" data-aos-delay="400">
                        <div class="we-fs-number" data-counter="500" data-counter-suffix="+">0</div>
                        <div class="we-fs-label">Participants</div>
                    </div>
                    <div class="we-float-stat we-float-stat-2" data-aos="zoom-in" data-aos-delay="500">
                        <div class="we-fs-number" data-counter="20" data-counter-suffix="+">0</div>
                        <div class="we-fs-label">Performances</div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="we-hero-content">
                    <div class="we-hero-badge">
                        <i class="fas fa-theater-masks"></i>
                        <span>Heritage & Culture</span>
                    </div>

                    <h2 class="we-hero-title">
                        Cultural
                        <span class="we-highlight">Programs</span>
                        & Celebrations
                    </h2>

                    <p class="we-hero-desc">
                        Preserving and promoting India's rich cultural heritage through vibrant performances,
                        folk dances, music concerts, art exhibitions, and community celebrations that bring
                        people together in joy and tradition.
                    </p>

                    <div class="we-theme-quote">
                        <i class="fas fa-quote-left"></i>
                        <div>
                            <h3>Celebrating Our Heritage</h3>
                            <p>Keeping traditions alive through art, dance, music, and community spirit</p>
                        </div>
                    </div>

                    <div class="we-mini-stats">
                        <div class="we-ms-item">
                            <i class="fas fa-music"></i>
                            <div>
                                <strong data-counter="8" data-counter-suffix="+">0</strong>
                                <span>Events</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-paint-brush"></i>
                            <div>
                                <strong data-counter="12" data-counter-suffix="+">0</strong>
                                <span>Art Forms</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong data-counter="5" data-counter-suffix="+">0</strong>
                                <span>Venues</span>
                            </div>
                        </div>
                    </div>

                    <div class="we-tags">
                        <span class="we-tag"><i class="fas fa-music"></i> Music</span>
                        <span class="we-tag"><i class="fas fa-theater-masks"></i> Drama</span>
                        <span class="we-tag"><i class="fas fa-paint-brush"></i> Art</span>
                        <span class="we-tag"><i class="fas fa-users"></i> Community</span>
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
            <h2 class="we-section-title">Cultural Highlights</h2>
            <p class="we-section-description">
                Witness the vibrant moments from our cultural programs — traditional performances,
                community celebrations, and artistic showcases.
            </p>
        </div>

        <?php
        $culturalImages = [
            ['file' => 'cultural-5.webp', 'title' => 'Traditional Performance'],
            ['file' => 'cultural.webp', 'title' => 'Cultural Evening'],
            ['file' => 'cultural-9.webp', 'title' => 'Community Celebration'],
            ['file' => 'cultural-3.webp', 'title' => 'Stage Programme'],
            ['file' => 'cultural-11.webp', 'title' => 'Heritage Showcase'],
            ['file' => 'cultural-1.webp', 'title' => 'Folk Celebration'],
            ['file' => 'cultural-7.webp', 'title' => 'Artistic Expression'],
            ['file' => 'cultural-4.webp', 'title' => 'Musical Evening'],
            ['file' => 'cultural-12.webp', 'title' => 'Grand Finale'],
            ['file' => 'cultural-2.webp', 'title' => 'Festive Spirit'],
            ['file' => 'cultural-8.webp', 'title' => 'Cultural Gathering'],
            ['file' => 'cultural-6.webp', 'title' => 'Vibrant Moments'],
            ['file' => 'cultural-10.webp', 'title' => 'Joyful Evening'],
        ];
        ?>
        <div class="we-gallery-grid gallery-grid">
            <?php foreach ($culturalImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/cultural/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Cultural Program</div>
                    <div class="gc-overlay">
                        <div class="gc-search-icon"><i class="fas fa-search-plus"></i></div>
                    </div>
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
<div id="culturalLb" class="page-lightbox">
    <button class="lb-close">&times;</button>
    <button class="lb-prev"><i class="fas fa-chevron-left"></i></button>
    <button class="lb-next"><i class="fas fa-chevron-right"></i></button>
    <div class="lb-content">
        <img class="lb-img" src="" alt="">
        <h5 class="lb-title"></h5>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var pageLb = initLightbox('culturalLb',
        <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/cultural/' . $img['file']), 'title' => $img['title']]; }, $culturalImages)) ?>);
    window.pageLb = pageLb;
});
</script>

<?php include '../app/views/layout/footer.php'; ?>