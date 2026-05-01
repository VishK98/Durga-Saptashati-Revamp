<?php
require_once '../app/config/config.php';

$pageTitle = "International Yoga Day Celebration in Dwarka Delhi | Yoga Awareness Program- Saptashati Foundation";
$pageDescription = "Durga Saptashati Foundation celebrates International Yoga Day in Dwarka Delhi with free yoga sessions, awareness programs, and community activities promoting health, wellness, and a healthy lifestyle. We always try our best to spread awareness about Yoga, its positive impacts on health, and the importance of exercise in general.";
$pageKeywords = "International Yoga Day in Dwarka ,Yoga Day Event in Dwarka Delhi ,Yoga Day Celebration NGO in Delhi ,Free Yoga Session in Dwarka Delhi ,Yoga Awareness Program Delhi Community Yoga Event Dwarka , Yoga Classes NGO in Dwarka , Yogaday in Dwarka Delhi,Yoga Day Celebration in Dwarka Delhi,InternationalDayOfYoga2026InDwarka,Yoga Day In Delhi";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for International Yoga Day Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/international-yoga-day.css') ?>">

<!-- Page Header Start -->
<div class="yoga-page-header page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">International Yoga Day</p>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('yoga-day.php') ?>">Yoga Day</a>
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
                    <i class="fas fa-spa"></i>
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
                            <h3>"Yoga for Humanity"</h3>
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
                            <img src="<?= url('assets/images/yoga-day/yoga.jpeg') ?>" alt="Yoga Day Celebration"
                                class="pose-image">
                            <div class="pose-overlay">
                                <span class="pose-name">Yoga Day</span>
                                <span class="pose-benefit">Community Wellness</span>
                            </div>
                        </div>

                        <div class="floating-poses">
                            <div class="mini-pose pose-1">
                                <img src="<?= url('assets/images/yoga-day/yoga-1.jpeg') ?>" alt="Morning Meditation">
                            </div>
                            <div class="mini-pose pose-2">
                                <img src="<?= url('assets/images/yoga-day/yoga-2.jpeg') ?>" alt="Group Yoga">
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
            ['file' => 'yoga-7.webp', 'title' => 'Yoga Workshop'],
            ['file' => 'yoga-8.webp', 'title' => 'Breathing Exercise'],
            ['file' => 'yoga-9.webp', 'title' => 'Meditation Circle'],
            ['file' => 'yoga-10.webp', 'title' => 'Yoga for All Ages'],
            ['file' => 'yoga-11.webp', 'title' => 'Flexibility Training'],
            ['file' => 'yoga-12.webp', 'title' => 'Outdoor Yoga'],
            ['file' => 'yoga-13.webp', 'title' => 'Mindfulness Session'],
            ['file' => 'yoga-14.webp', 'title' => 'Yoga Awareness'],
            ['file' => 'yoga-15.webp', 'title' => 'Health & Harmony'],
            ['file' => 'yoga-16.webp', 'title' => 'Yoga Camp'],
            ['file' => 'yoga-17.webp', 'title' => 'Stretching Session'],
            ['file' => 'yoga-18.webp', 'title' => 'Inner Peace'],
            ['file' => 'yoga-19.webp', 'title' => 'Yoga Celebration'],
        ];
        ?>
        <div class="yoga-gallery-grid-3 gallery-grid">
            <?php foreach ($yogaImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/yoga-day/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Yoga Day</div>
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
<div id="yogaLightbox" class="page-lightbox">
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
    window.pageLb = initLightbox('yogaLightbox', <?= json_encode(array_map(function ($img) { return ['src' => url('assets/images/yoga-day/' . $img['file']), 'title' => $img['title']]; }, $yogaImages)) ?>);
    initFloatingAnimation('.floating-lotus', 'floatLotus');
});
</script>

<?php include '../app/views/layout/footer.php'; ?>