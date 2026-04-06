<?php
require_once '../app/config/config.php';

$pageTitle = "Women Empowerment NGO in Dwarka Delhi | Durga Saptashati Foundation";
$pageDescription = "Durga Saptashati Foundation is a leading women empowerment NGO in Dwarka Delhi. Support an NGO through self defence training, skill development programs, and support for women safety and equality that build confidence and self-reliance.";
$pageKeywords = "Women NGOs And Welfare Services In Delhi,Women Empowerment and Safety NGO in Dwarka,NGO For Women Empowerment In Delhi,Empowerment Of Women In Dwarka,Top Women Empowerment Services In Dwarka,Top Women Empowerment NGO In Dwarka,Womens Empowerment In Dwarka,Womens Empowerment In Dwarka Delhi,Womens Empowerment,Women Empowerment vocational training In Dwarka,Women Empowerment Self defence In Dwarka,Women Empowerment Self defence Training In Dwarka,Women welfare NGO in Dwarka,NGOS For Women in Dwarka Delhi";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Women's Empowerment Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/womens-empowerment.css') ?>">

<!-- Page Header Start -->
<div class="page-header women-empowerment-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Women's Empowerment</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('womens-empowerment.php') ?>">Women's Empowerment</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section — Image Left + Content Right with Floating Stats -->
<section class="we-hero">
    <div class="container-fluid">
        <div class="row align-items-center we-hero-row">
            <!-- Left: Image Collage -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="we-image-stack">
                    <div class="we-img-main">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment.webp') ?>"
                            alt="Women's Empowerment">
                    </div>
                    <div class="we-img-secondary">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment-1.webp') ?>"
                            alt="Skill Development">
                    </div>
                    <div class="we-img-accent">
                        <img src="<?= url('assets/images/womens-empowerment/womens-empowerment-2.webp') ?>"
                            alt="Awareness Campaign">
                    </div>
                    <!-- Floating stat on image -->
                    <div class="we-float-stat we-float-stat-1" data-aos="zoom-in" data-aos-delay="400">
                        <div class="we-fs-number" data-counter="500">0</div>
                        <div class="we-fs-label">Women Empowered</div>
                    </div>
                    <div class="we-float-stat we-float-stat-2" data-aos="zoom-in" data-aos-delay="500">
                        <div class="we-fs-number" data-counter="20">0</div>
                        <div class="we-fs-label">Programs</div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="we-hero-content">
                    <div class="we-hero-badge">
                        <i class="fas fa-female"></i>
                        <span>Empowerment & Equality</span>
                    </div>

                    <h1 class="we-hero-title">
                        Women's
                        <span class="we-highlight">Empowerment</span>
                    </h1>

                    <p class="we-hero-desc">
                        We believe that empowering women is the key to transforming entire communities.
                        Our programs focus on skill development, self-defense training, awareness campaigns,
                        and financial literacy to help women become independent and confident leaders.
                    </p>

                    <div class="we-theme-quote">
                        <i class="fas fa-quote-left"></i>
                        <div>
                            <h4>Strength in Unity</h4>
                            <p>Building confident, independent women for a stronger society</p>
                        </div>
                    </div>

                    <div class="we-mini-stats">
                        <div class="we-ms-item">
                            <i class="fas fa-hands-helping"></i>
                            <div>
                                <strong data-counter="15">0</strong>
                                <span>Workshops</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong data-counter="10">0</strong>
                                <span>Communities</span>
                            </div>
                        </div>
                        <div class="we-ms-item">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <strong data-counter="8">0</strong>
                                <span>Skill Courses</span>
                            </div>
                        </div>
                    </div>

                    <div class="we-tags">
                        <span class="we-tag"><i class="fas fa-shield-alt"></i> Self Defense</span>
                        <span class="we-tag"><i class="fas fa-rupee-sign"></i> Financial Literacy</span>
                        <span class="we-tag"><i class="fas fa-graduation-cap"></i> Skill Building</span>
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
            <h2 class="we-section-title">Empowerment in Action</h2>
            <p class="we-section-description">
                Witness the transformative journey of women breaking barriers,
                building skills, and leading change in their communities.
            </p>
        </div>

        <?php
        $weImages = [
            ['file' => 'womens-empowerment.webp', 'title' => 'Empowerment Programme'],
            ['file' => 'womens-empowerment-1.webp', 'title' => 'Skill Development Workshop'],
            ['file' => 'womens-empowerment-2.webp', 'title' => 'Awareness Campaign'],
            ['file' => 'womens-empowerment-3.webp', 'title' => 'Self-Defense Training'],
            ['file' => 'womens-empowerment-4.webp', 'title' => 'Financial Literacy Session'],
            ['file' => 'womens-empowerment-5.webp', 'title' => 'Community Outreach'],
            ['file' => 'womens-empowerment-6.webp', 'title' => 'Women Leadership Meet'],
        ];
        ?>
        <div class="we-gallery-grid gallery-grid">
            <?php foreach ($weImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/womens-empowerment/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Women's Empowerment</div>
                    <div class="gc-overlay">
                        <div class="gc-search-icon"><i class="fas fa-search-plus"></i></div>
                    </div>
                </div>
                <div class="gc-caption">
                    <h6><?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Lightbox -->
<div id="weLightbox" class="page-lightbox">
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
    var pageLb = initLightbox('weLightbox', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/womens-empowerment/' . $img['file']), 'title' => $img['title']]; }, $weImages)) ?>);
    window.pageLb = pageLb;
    initFloatingAnimation('.we-floating', 'weFloat');
});
</script>

<?php include '../app/views/layout/footer.php'; ?>