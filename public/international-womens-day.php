<?php
require_once '../app/config/config.php';

$pageTitle = "International Women’s Day Celebration in Dwarka Delhi | International Women’s day";
$pageDescription = "Durga Saptashati Foundation celebrates International Women’s Day in Dwarka Delhi with women empowerment programs, awareness campaigns and community events promoting gender equality and women’s rights. Although we celebrate the power of women every day  celebrating International women’s day on 8th March every year- has its own charm.";
$pageKeywords = "International Women’s Day in Dwarka ,Women’s Day Celebration in Dwarka Delhi ,Women Empowerment NGO in Delhi ,Women’s Day Event NGO in Delhi ,NGO Celebrating Women’s Day in Dwarka ,Women Empowerment Program in Delhi ,Women Safety Awareness Program Delhi , International Women Day Celebrated In Dwarka,Women Rights Non Profit Organization In Delhi, International Women Day In Dwarka, International Women Day, Celebrating International Women Day In Dwarka, International Women Day Celebration In Dwarka";

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
                                <div class="iwd-stat-number" data-counter="300" data-counter-suffix="+" data-counter-locale>0</div>
                                <div class="iwd-stat-label">Attendees</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-microphone"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="10" data-counter-suffix="+" data-counter-locale>0</div>
                                <div class="iwd-stat-label">Speakers</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-chalkboard"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="5" data-counter-suffix="+" data-counter-locale>0</div>
                                <div class="iwd-stat-label">Workshops</div>
                            </div>
                        </div>
                        <div class="iwd-stat-item">
                            <div class="iwd-stat-icon"><i class="fas fa-trophy"></i></div>
                            <div class="iwd-stat-content">
                                <div class="iwd-stat-number" data-counter="15" data-counter-suffix="+" data-counter-locale>0</div>
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
        <div class="iwd-gallery-grid gallery-grid">
            <?php foreach ($iwdImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/woman-day/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Women's Day</div>
                    <div class="gc-overlay"><div class="gc-search-icon"><i class="fas fa-search-plus"></i></div></div>
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
<div id="iwdLightbox" class="page-lightbox">
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
    window.pageLb = initLightbox('iwdLightbox', <?= json_encode(array_map(function ($img) { return ['src' => url('assets/images/woman-day/' . $img['file']), 'title' => $img['title']]; }, $iwdImages)) ?>);
    initFloatingAnimation('.iwd-floating-lotus', 'iwdFloatLotus');
});
</script>

<?php include '../app/views/layout/footer.php'; ?>