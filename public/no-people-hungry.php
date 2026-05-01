<?php
require_once '../app/config/config.php';

$pageTitle = "Food Donation NGO in Dwarka Delhi | No People Hungry Initiative | Durga Saptashati Foundation";
$pageDescription = "Durga Saptashati Foundation runs the “No People Hungry” initiative providing free food and hunger relief support to poor and needy people in Dwarka Delhi through food donation drives . Just like water and air are free and accessible to all, come and help us make food available too! Donate today.";
$pageKeywords = "No People Hungry In Dwarka,No People Hungry In Dwarka Delhi,No People Hungry In Delhi,Food Donation NGO in Dwarka Delhi,Hunger Relief NGO in Delhi NCR, NGO helping hungry people in Delhi, Charity organization for hunger relief";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for No People Hungry Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/no-people-hungry.css') ?>">

<!-- Page Header Start -->
<div class="page-header hungary-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>No People Hungry</h1>
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

                <h2 class="hunger-hero-title">
                    No People
                    <span class="hunger-highlight">Hungry</span>
                    Campaign
                </h2>

                <p class="hunger-hero-desc">
                    Join our mission to eradicate hunger from our communities. Through dedicated food drives,
                    community kitchens, and volunteer-led distribution programs, we ensure that no one goes
                    to bed hungry. Together, we can build a world where food security is a reality for all.
                </p>

                <div class="hunger-info-row">
                    <div class="hunger-info-card">
                        <div class="hunger-info-icon"><i class="fas fa-utensils"></i></div>
                        <div>
                            <h3>"Nourishing Lives, Building Hope"</h3>
                            <p>Every meal served is a step towards a hunger-free world</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="hunger-stats-grid">
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="hunger-stat-icon"><i class="fas fa-hamburger"></i></div>
                        <div class="hunger-stat-number" data-counter="10000" data-counter-suffix="+" data-counter-locale>0</div>
                        <div class="hunger-stat-label">Meals Served</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="hunger-stat-icon"><i class="fas fa-truck"></i></div>
                        <div class="hunger-stat-number" data-counter="50" data-counter-suffix="+" data-counter-locale>0</div>
                        <div class="hunger-stat-label">Food Drives</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="hunger-stat-icon"><i class="fas fa-store"></i></div>
                        <div class="hunger-stat-number" data-counter="15" data-counter-suffix="+" data-counter-locale>0</div>
                        <div class="hunger-stat-label">Community Kitchens</div>
                    </div>
                    <div class="hunger-stat-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="hunger-stat-icon"><i class="fas fa-hands-helping"></i></div>
                        <div class="hunger-stat-number" data-counter="200" data-counter-suffix="+" data-counter-locale>0</div>
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
            <h2 class="hunger-section-title">No People Hungry</h2>
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
        <div class="hunger-gallery-grid gallery-grid">
            <?php foreach ($hungerImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/hungary/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Food Drive</div>
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
<div id="hungerLightbox" class="page-lightbox">
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
    var pageLb = initLightbox('hungerLightbox', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/hungary/' . $img['file']), 'title' => $img['title']]; }, $hungerImages)) ?>);
    window.pageLb = pageLb;
});
</script>

<?php include '../app/views/layout/footer.php'; ?>