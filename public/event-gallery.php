<?php
require_once '../app/config/config.php';
$pageTitle = "Event Gallery";
$pageDescription = "Browse photos from our events, causes, and community programs at Durga Saptashati Foundation.";
$pageKeywords = "event gallery, photo gallery, event photos, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

try {
    $galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
    $categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
} catch (Exception $e) {
    $galleryImages = [];
    $categories = [];
}
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Captured Moments</h2>
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
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Our Gallery</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">Moments That Matter</h2>
            <p style="color:#888;max-width:600px;margin:10px auto 0;">Browse through photos from our events, community
                programs, and initiatives that are making a difference.</p>
        </div>

        <?php if (empty($galleryImages)): ?>
        <div style="text-align:center;padding:60px 20px;">
            <div
                style="width:80px;height:80px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                <i class="fas fa-images" style="font-size:2rem;color:#f26522;"></i>
            </div>
            <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:10px;">Gallery Coming Soon</h4>
            <p style="color:#888;max-width:400px;margin:0 auto;">We're uploading photos from our events and programs.
                Check back soon!</p>
        </div>
        <?php else: ?>

        <!-- Category Filter -->
        <?php if (count($categories) > 1): ?>
        <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="100">
            <div style="display:inline-flex;flex-wrap:wrap;gap:8px;justify-content:center;">
                <button class="gallery-filter active" onclick="filterGallery('all', this)"
                    style="padding:8px 20px;border-radius:25px;border:2px solid #f26522;background:#f26522;color:#fff;font-size:0.85rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;">All</button>
                <?php foreach ($categories as $cat): ?>
                <button class="gallery-filter"
                    onclick="filterGallery('<?= htmlspecialchars(addslashes($cat)) ?>', this)"
                    style="padding:8px 20px;border-radius:25px;border:2px solid #e5e7eb;background:#fff;color:#555;font-size:0.85rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;"><?= htmlspecialchars($cat) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Gallery Grid -->
        <div id="galleryGrid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;">
            <?php foreach ($galleryImages as $i => $img): ?>
            <div class="gallery-item" data-category="<?= htmlspecialchars($img['category']) ?>" data-aos="fade-up"
                data-aos-delay="<?= ($i % 6) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/uploads/gallery/' . $img['image']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        <?= htmlspecialchars($img['category']) ?></div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div
                            style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h6
                        style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0 0 4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        <?= htmlspecialchars($img['title'] ?: 'Untitled') ?></h6>
                    <small
                        style="color:#999;font-size:0.78rem;"><?= date('M d, Y', strtotime($img['created_at'])) ?></small>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if (!empty($galleryImages)): ?>
<!-- Lightbox Modal -->
<div id="lightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <!-- Close -->
    <button onclick="closeLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;transition:all 0.2s;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <!-- Prev -->
    <button onclick="prevImage()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;transition:all 0.2s;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <!-- Next -->
    <button onclick="nextImage()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;transition:all 0.2s;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <!-- Image -->
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="lightboxImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <div style="margin-top:14px;">
            <h5 id="lightboxTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:0 0 4px;"></h5>
            <small id="lightboxInfo" style="color:rgba(255,255,255,0.6);font-size:0.82rem;"></small>
        </div>
    </div>
</div>

<script>
var galleryData = <?= json_encode(array_map(function($img) {
    return [
        'src' => url('assets/uploads/gallery/' . $img['image']),
        'title' => $img['title'] ?: 'Untitled',
        'category' => $img['category'],
        'date' => date('M d, Y', strtotime($img['created_at']))
    ];
}, $galleryImages)) ?>;

var currentIndex = 0;
var filteredIndices = galleryData.map(function(_, i) {
    return i;
});

function openLightbox(index) {
    currentIndex = index;
    updateLightbox();
    document.getElementById('lightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateLightbox() {
    var d = galleryData[currentIndex];
    document.getElementById('lightboxImg').src = d.src;
    document.getElementById('lightboxTitle').textContent = d.title;
    document.getElementById('lightboxInfo').textContent = d.category + ' \u2022 ' + d.date;
}

function prevImage() {
    var pos = filteredIndices.indexOf(currentIndex);
    pos = (pos - 1 + filteredIndices.length) % filteredIndices.length;
    currentIndex = filteredIndices[pos];
    updateLightbox();
}

function nextImage() {
    var pos = filteredIndices.indexOf(currentIndex);
    pos = (pos + 1) % filteredIndices.length;
    currentIndex = filteredIndices[pos];
    updateLightbox();
}

function filterGallery(cat, btn) {
    document.querySelectorAll('.gallery-filter').forEach(function(b) {
        b.style.background = '#fff';
        b.style.color = '#555';
        b.style.borderColor = '#e5e7eb';
    });
    btn.style.background = '#f26522';
    btn.style.color = '#fff';
    btn.style.borderColor = '#f26522';

    filteredIndices = [];
    document.querySelectorAll('.gallery-item').forEach(function(item, i) {
        if (cat === 'all' || item.getAttribute('data-category') === cat) {
            item.style.display = '';
            filteredIndices.push(i);
        } else {
            item.style.display = 'none';
        }
    });
}

document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('lightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevImage();
    if (e.key === 'ArrowRight') nextImage();
});
</script>
<?php endif; ?>

<?php include '../app/views/layout/footer.php'; ?>