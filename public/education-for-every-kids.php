<?php
require_once '../app/config/config.php';

$pageTitle = "Child Education NGO in Dwarka Delhi | Education for Every Kids- Durga Saptashati Foundation";
$pageDescription = "Durga Saptashati Foundation supports quality education for underprivileged children in Dwarka Delhi. Every day we try to bridge the education gap among the underprivileged children in Delhi. Join us in our mission to empower young minds and transform lives through education.";
$pageKeywords = "Education NGOs in Dwarka Delhi,Best Education NGO in Dwarka Delhi,Education For Every Kids in Dwarka delhi,NGOS For Kids in Dwarka Delhi,Education For Everyone in Dwarka Delhi,Top Ngos For Education in Dwarka Delhi,Education For Every Kids In Dwarka,Child Education NGO in Dwarka ,Kids Education NGO in Delhi ,Best NGO for Child Education in Dwarka ,Free Education NGO in Delhi NCR ,NGO Helping Poor Children Education in Delhi ,Child Safety and Education NGO in Dwarka ,Education Support NGO in Dwarka Delhi ,NGO for Underprivileged Kids in Delhi";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/education-for-every-kids.css') ?>">

<div class="page-header education-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">Education For Every Kids</p>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('education-for-every-kids.php') ?>">Education For Every Kids</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Centered Title + Image Banner + Overlapping Content -->
<section class="edu-hero">
    <!-- Top: Centered intro -->
    <div class="edu-hero-top">
        <div class="container-fluid text-center">
            <div class="edu-badge" data-aos="fade-down">
                <i class="fas fa-graduation-cap"></i>
                <span>Education For All</span>
            </div>
            <h1 class="edu-hero-title" data-aos="fade-up" data-aos-delay="100">
                Education For <span class="edu-gradient">Every Kids</span>
            </h1>
            <p class="edu-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Lighting the path of knowledge — every child deserves access to quality education
            </p>

            <!-- Horizontal Stats -->
            <div class="edu-stats-bar" data-aos="fade-up" data-aos-delay="300">
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="500" data-counter-suffix="+" data-counter-locale>0</div>
                    <div class="edu-stat-txt">Students Supported</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="10" data-counter-suffix="+" data-counter-locale>0</div>
                    <div class="edu-stat-txt">Partner Schools</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="200" data-counter-suffix="+" data-counter-locale>0</div>
                    <div class="edu-stat-txt">Scholarships</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="15" data-counter-suffix="+" data-counter-locale>0</div>
                    <div class="edu-stat-txt">Programs</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Banner -->
    <div class="edu-image-banner" data-aos="fade-up" data-aos-delay="350">
        <div class="container-fluid">
            <div class="edu-banner-wrap">
                <img src="<?= url('assets/images/education-for/education-for.webp') ?>" alt="Education For Every Kids"
                    class="edu-banner-img">
                <div class="edu-banner-overlay"></div>

                <!-- Overlapping Content Card -->
                <div class="edu-overlap-card">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h3>Transforming Lives Through Education</h3>
                            <p>We believe education is the most powerful tool for transforming lives. Our initiative
                                provides scholarships, school supplies, digital literacy programs, and mentorship to
                                underprivileged children, ensuring every child has access to quality education.</p>
                        </div>
                        <div class="col-lg-5">
                            <div class="edu-feature-list">
                                <div class="edu-feature">
                                    <i class="fas fa-book-open"></i>
                                    <span>Scholarships & Support</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-laptop"></i>
                                    <span>Digital Literacy</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <span>Mentorship Programs</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-school"></i>
                                    <span>School Infrastructure</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="edu-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="edu-section-header text-center" data-aos="fade-up">
            <span class="edu-section-badge">Gallery</span>
            <h2 class="edu-section-title">Education in Action</h2>
            <p class="edu-section-desc">
                See how our education programs are transforming young minds and creating opportunities
                for children who dream of a brighter future.
            </p>
        </div>

        <?php
        $eduImages = [
            ['file' => 'education-for.webp', 'title' => 'Classroom Session'],
            ['file' => 'education-for-1.webp', 'title' => 'Learning Together'],
            ['file' => 'education-for-2.webp', 'title' => 'Digital Literacy Program'],
            ['file' => 'education-for-3.webp', 'title' => 'Scholarship Ceremony'],
            ['file' => 'education-for-4.webp', 'title' => 'Creative Workshop'],
        ];
        ?>
        <div class="edu-gallery-grid gallery-grid">
            <?php foreach ($eduImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/education-for/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">Education</div>
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
<div id="eduLightbox" class="page-lightbox">
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
    var pageLb = initLightbox('eduLightbox', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/education-for/' . $img['file']), 'title' => $img['title']]; }, $eduImages)) ?>);
    window.pageLb = pageLb;
});
</script>

<?php include '../app/views/layout/footer.php'; ?>