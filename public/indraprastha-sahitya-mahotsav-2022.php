<?php
require_once '../app/config/config.php';
$pageTitle = "इंद्रप्रस्थ साहित्य महोत्सव 2022";
$pageDescription = "Indraprastha Sahitya Mahotsav 2022 — A grand literary festival celebrating Hindi literature, poetry, and cultural heritage organised by Durga Saptashati Foundation.";
$pageKeywords = "indraprastha sahitya mahotsav, literary festival, Hindi literature, poetry, cultural event, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/indra.css') ?>">

<!-- Page Header -->
<div class="page-header indra-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h1>इंद्रप्रस्थ साहित्य महोत्सव 2022</h1></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('indraprastha-sahitya-mahotsav-2022.php') ?>">Sahitya Mahotsav</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Asymmetric Split — Content Left + Mosaic Grid Right -->
<section class="indra-hero">
    <div class="container-fluid">
        <div class="row align-items-center indra-hero-row">
            <!-- Left: Content -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="indra-hero-content">
                    <div class="indra-badge">
                        <i class="fas fa-book-open"></i>
                        <span>साहित्य एवं संस्कृति</span>
                    </div>

                    <h2 class="indra-title">
                        इंद्रप्रस्थ साहित्य
                        <span class="indra-gradient">महोत्सव</span>
                        2022
                    </h2>

                    <p class="indra-desc">
                        A grand celebration of Hindi literature, poetry, and cultural heritage — bringing together
                        poets, writers, scholars, and art enthusiasts to honour the richness of Indian literary traditions.
                    </p>

                    <div class="indra-highlights">
                        <div class="indra-hl"><i class="fas fa-feather-alt"></i> Poetry Recitation</div>
                        <div class="indra-hl"><i class="fas fa-comments"></i> Panel Discussions</div>
                        <div class="indra-hl"><i class="fas fa-award"></i> Felicitation</div>
                        <div class="indra-hl"><i class="fas fa-music"></i> Cultural Performances</div>
                    </div>

                    <div class="indra-stats-inline">
                        <div class="indra-si">
                            <strong data-counter="50" data-counter-suffix="+">0</strong>
                            <span>Poets & Writers</span>
                        </div>
                        <div class="indra-si">
                            <strong data-counter="500" data-counter-suffix="+">0</strong>
                            <span>Attendees</span>
                        </div>
                        <div class="indra-si">
                            <strong data-counter="12" data-counter-suffix="+">0</strong>
                            <span>Sessions</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Mosaic Image Grid -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="indra-mosaic">
                    <div class="indra-mosaic-tall">
                        <img src="<?= url('assets/images/indra/indra.webp') ?>" alt="Grand Opening">
                    </div>
                    <div class="indra-mosaic-top">
                        <img src="<?= url('assets/images/indra/indra-3.webp') ?>" alt="Literary Session">
                    </div>
                    <div class="indra-mosaic-bottom">
                        <img src="<?= url('assets/images/indra/indra-5.webp') ?>" alt="Poetry Evening">
                    </div>
                    <div class="indra-mosaic-wide">
                        <img src="<?= url('assets/images/indra/indra-7.webp') ?>" alt="Keynote Address">
                    </div>
                    <!-- Floating quote -->
                    <div class="indra-mosaic-quote">
                        <i class="fas fa-quote-left"></i>
                        <p>"साहित्य समाज का दर्पण है"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="indra-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="indra-section-header text-center" data-aos="fade-up">
            <span class="indra-section-badge">Gallery</span>
            <h2 class="indra-section-title">Mahotsav Highlights</h2>
            <p class="indra-section-desc">Memorable moments from Indraprastha Sahitya Mahotsav 2022 — poetry recitals, panel discussions, felicitations, and cultural celebrations.</p>
        </div>

        <?php
        $indraImages = [
            ['file' => 'indra-7.webp', 'title' => 'Keynote Address'],
            ['file' => 'indra.webp', 'title' => 'Grand Opening'],
            ['file' => 'indra-11.webp', 'title' => 'Poetry Recitation'],
            ['file' => 'indra-2.webp', 'title' => 'Panel Discussion'],
            ['file' => 'indra-9.webp', 'title' => 'Felicitation Ceremony'],
            ['file' => 'indra-4.webp', 'title' => 'Literary Session'],
            ['file' => 'indra-12.webp', 'title' => 'Cultural Performance'],
            ['file' => 'indra-1.webp', 'title' => 'Inaugural Moment'],
            ['file' => 'indra-6.webp', 'title' => 'Guest of Honour'],
            ['file' => 'indra-10.webp', 'title' => 'Award Presentation'],
            ['file' => 'indra-3.webp', 'title' => 'Audience Engagement'],
            ['file' => 'indra-8.webp', 'title' => 'Book Exhibition'],
            ['file' => 'indra-5.webp', 'title' => 'Poetry Evening'],
        ];
        ?>
        <div class="indra-gallery-grid gallery-grid">
            <?php foreach ($indraImages as $i => $img): ?>
            <div class="gallery-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/images/indra/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <div class="gc-badge">साहित्य महोत्सव</div>
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
<div id="indraLb" class="page-lightbox">
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
    window.pageLb = initLightbox('indraLb', <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/indra/' . $img['file']), 'title' => $img['title']]; }, $indraImages)) ?>);
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
