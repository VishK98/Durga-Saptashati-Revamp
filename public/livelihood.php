<?php
require_once '../app/config/config.php';

$pageTitle = "Livelihood Support NGO in Dwarka Delhi | Skill Development NGO- Durga Saptashati Foundation";
$pageDescription = "Durga Saptashati Foundation is a premier NGO dedicated to livelihood skill development training in Idwarka Delhi. Explore our online and offline livelihood skill training programmes and impactful initiatives in Dwarka and beyond. Join us to provide free skill-based training and vocational learning opportunities. ";
$pageKeywords = "Livelihood Support NGO In Dwarka , Livelihood Development Program In Dwarka ,NGO for Livelihood Support In Delhi ,Livelihood NGO in Delhi , NGO for Skill Training In Dwarka , Sustainable Livelihood Program In Dwarka,Livelihood Empowerment NGO In Dwarka, Livelihood in Dwarka Delhi,Underprivileged Women vocational skills in Dwarka Delhi,Livelihood NGO in Dwarka Delhi,Livelihood Top NGOs Senior Citizens In Dwarka Delhi,Livelihoods Top NGOs Senior Citizens in Dwarka Delhi,livelihood training Program in Dwarka Delhi, Best Livelihood NGO in Dwarka, Livelihood NGO in Delhi, Livelihood NGO in Dwarka Delhi,Livelihood Top NGOs Senior Citizens In Dwarka Delhi,livelihoods in DwarkaDelhi,underprivileged women vocational skills in Dwarka Delhi,Trusted Charity Organisation In Dwarka Delhi,Best NGOs Working On Livelihood In Delhi,Top NGOs Senior Citizens in Dwarka Delhi,livelihood training Program in Dwarka Delhi,Livelihood Top NGOs Senior Citizens in Dwarka Delhi,Livelihood International Women day celebration in Dwarka,Livelihood International Women Day In Dwarka,Livelihood Best Food Health NGO in Delhi,Livelihood Kids Education in Dwarka,Livelihood Self Defence Camp In Dwarka,Livelihood training in Dwarka";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/livelihood.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Livelihood</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('livelihood.php') ?>">Livelihood</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Content Left + Mosaic Grid Right + Stats Strip -->
<section class="lv-hero">
    <div class="container-fluid">
        <div class="row align-items-center lv-hero-row">
            <!-- Left Content -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="lv-badge">
                    <i class="fas fa-briefcase"></i>
                    <span>Employment & Skills</span>
                </div>

                <h1 class="lv-title">
                    Livelihood In<span class="lv-gradient"> Action</span>
                </h1>

                <p class="lv-desc">
                    Our Livelihood Programme empowers individuals from underprivileged communities with
                    vocational training, skill development, and employment support — helping people build
                    dignified, self-reliant lives for themselves and their families.
                </p>

                <div class="lv-quote">
                    <i class="fas fa-quote-left"></i>
                    <div>
                        <h4>Skills for a Better Tomorrow</h4>
                        <p>Empowering individuals with skills to build sustainable futures</p>
                    </div>
                </div>

                <div class="lv-tags">
                    <span class="lv-tag"><i class="fas fa-tools"></i> Vocational Training</span>
                    <span class="lv-tag"><i class="fas fa-briefcase"></i> Job Placement</span>
                    <span class="lv-tag"><i class="fas fa-chart-line"></i> Entrepreneurship</span>
                    <span class="lv-tag"><i class="fas fa-certificate"></i> Certification</span>
                </div>
            </div>

            <!-- Right: Mosaic Grid -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="lv-mosaic">
                    <div class="lv-mosaic-tall">
                        <img src="<?= url('assets/images/livelihood/livelihood.webp') ?>" alt="Livelihood Programme">
                    </div>
                    <div class="lv-mosaic-top">
                        <img src="<?= url('assets/images/livelihood/livelihood-1.webp') ?>" alt="Vocational Training">
                    </div>
                    <div class="lv-mosaic-bottom">
                        <img src="<?= url('assets/images/livelihood/livelihood-2.webp') ?>" alt="Skill Development">
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Strip -->
        <div class="lv-stats-strip" data-aos="fade-up" data-aos-delay="300">
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-user-tie"></i></div>
                <div class="lv-strip-num" data-counter="300" data-counter-suffix="+" data-counter-locale>0</div>
                <div class="lv-strip-label">People Trained</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-briefcase"></i></div>
                <div class="lv-strip-num" data-counter="50" data-counter-suffix="+" data-counter-locale>0</div>
                <div class="lv-strip-label">Employed</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-tools"></i></div>
                <div class="lv-strip-num" data-counter="10" data-counter-suffix="+" data-counter-locale>0</div>
                <div class="lv-strip-label">Trades</div>
            </div>
            <div class="lv-strip-item">
                <div class="lv-strip-icon"><i class="fas fa-building"></i></div>
                <div class="lv-strip-num" data-counter="8" data-counter-suffix="+" data-counter-locale>0</div>
                <div class="lv-strip-label">Centers</div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="lv-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="lv-section-header text-center" data-aos="fade-up">
            <span class="lv-section-badge">Gallery</span>
            <h2 class="lv-section-title">Sustainable Livelihood Programme</h2>
            <p class="lv-section-desc">
                Explore our vocational training sessions, skill development workshops, and success stories
                of individuals who transformed their lives through our livelihood programmes.
            </p>
        </div>

        <?php
        $lvImages = [
            ['file' => 'livelihood.webp', 'title' => 'Livelihood Programme'],
            ['file' => 'livelihood-1.webp', 'title' => 'Vocational Training'],
            ['file' => 'livelihood-2.webp', 'title' => 'Skill Workshop'],
            ['file' => 'livelihood-3.webp', 'title' => 'Hands-on Training'],
            ['file' => 'livelihood-4.webp', 'title' => 'Certification Day'],
            ['file' => 'livelihood-5.webp', 'title' => 'Entrepreneurship Camp'],
            ['file' => 'livelihood-6.webp', 'title' => 'Job Placement Drive'],
            ['file' => 'livelihood-7.webp', 'title' => 'Community Workshop'],
            ['file' => 'livelihood-8.webp', 'title' => 'Success Stories'],
            ['file' => 'livelihood-9.webp', 'title' => 'Tailoring Training'],
            ['file' => 'livelihood-10.webp', 'title' => 'Computer Literacy'],
            ['file' => 'livelihood-11.webp', 'title' => 'Handicraft Workshop'],
        ];
        ?>
        <div class="lv-gallery-grid gallery-grid">
            <?php foreach ($lvImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/livelihood/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Livelihood</div>
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
<div id="lvLightbox" class="page-lightbox">
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
    var pageLb = initLightbox('lvLightbox', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/livelihood/' . $img['file']), 'title' => $img['title']]; }, $lvImages)) ?>);
    window.pageLb = pageLb;
});
</script>

<?php include '../app/views/layout/footer.php'; ?>