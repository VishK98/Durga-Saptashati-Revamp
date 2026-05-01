<?php
require_once '../app/config/config.php';
$pageTitle = "Event Gallery | Photo Gallery | Saptashati Foundation";
$pageDescription = "Explore the event gallery of Durga Saptashati Foundation Browse photos from our events, community programs ,social activities, women empowerment programs, cultural events, kids competitions, and community initiatives in Dwarka Delhi. ";
$pageKeywords = "Durga Saptashati gallery, event photos, NGO gallery, charity events gallery, NGO event gallery, NGO activities photos, community events gallery Delhi, women empowerment event photos, cultural program gallery, NGO social work images, charity event gallery Delhi.";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/event-gallery.css') ?>">

<?php

try {
    $galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
    $categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
} catch (Exception $e) {
    $galleryImages = [];
    $categories = [];
}
?>

<div class="page-header gallery-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Captured Moments</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event-gallery.php') ?>">Gallery</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-2 eg-section-subtitle">Our Gallery</h6>
            <h2 class="eg-section-title">Moments That Matter</h2>
            <p class="eg-section-desc">Browse through photos from our events, community
                programs, and initiatives that are making a difference.</p>
        </div>

        <?php if (empty($galleryImages)): ?>
        <div class="eg-empty-state">
            <div class="eg-empty-icon">
                <i class="fas fa-images"></i>
            </div>
            <h3 class="eg-empty-title">Gallery Coming Soon</h3>
            <p class="eg-empty-desc">We're uploading photos from our events and programs.
                Check back soon!</p>
        </div>
        <?php else: ?>

        <!-- Category Filter -->
        <?php if (count($categories) > 1): ?>
        <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="gallery-filter-wrap">
                <button class="gallery-filter active" data-category="all">All</button>
                <?php foreach ($categories as $cat): ?>
                <button class="gallery-filter" data-category="<?= htmlspecialchars(addslashes($cat)) ?>"><?= htmlspecialchars($cat) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Gallery Grid -->
        <div id="galleryGrid" class="gallery-grid eg-gallery-grid">
            <?php foreach ($galleryImages as $i => $img): ?>
            <div class="gallery-card" data-category="<?= htmlspecialchars($img['category']) ?>" data-aos="fade-up"
                data-aos-delay="<?= ($i % 6) * 50 ?>" onclick="pageLb.open(<?= $i ?>)">
                <div class="gc-img-wrap">
                    <img class="gc-img" src="<?= url('assets/uploads/gallery/' . $img['image']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>">
                    <span class="gc-badge"><?= htmlspecialchars($img['category']) ?></span>
                    <div class="gc-overlay">
                        <div class="gc-search-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="gc-caption">
                    <h3><?= htmlspecialchars($img['title'] ?: 'Untitled') ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if (!empty($galleryImages)): ?>
<!-- Lightbox -->
<div id="galleryLightbox" class="page-lightbox">
    <button class="lb-close">&times;</button>
    <button class="lb-prev"><i class="fas fa-chevron-left"></i></button>
    <button class="lb-next"><i class="fas fa-chevron-right"></i></button>
    <div class="lb-content">
        <img class="lb-img" src="" alt="">
        <h5 class="lb-title"></h5>
        <small class="lb-info"></small>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var galleryData = <?= json_encode(array_map(function($img) {
        return [
            'src' => url('assets/uploads/gallery/' . $img['image']),
            'title' => $img['title'] ?: 'Untitled',
            'category' => $img['category'],
            'date' => date('M d, Y', strtotime($img['created_at']))
        ];
    }, $galleryImages)) ?>;

    window.pageLb = initLightbox('galleryLightbox', galleryData);

    // Filter functionality
    document.querySelectorAll('.gallery-filter').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var cat = this.getAttribute('data-category');
            document.querySelectorAll('.gallery-filter').forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');
            var indices = [];
            document.querySelectorAll('#galleryGrid .gallery-card').forEach(function(item, i) {
                if (cat === 'all' || item.getAttribute('data-category') === cat) {
                    item.style.display = '';
                    indices.push(i);
                } else {
                    item.style.display = 'none';
                }
            });
            if (pageLb) pageLb.setFiltered(indices);
        });
    });
});
</script>
<?php endif; ?>

<?php include '../app/views/layout/footer.php'; ?>