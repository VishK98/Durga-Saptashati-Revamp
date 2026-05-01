<?php
require_once '../app/config/config.php';
$pageTitle = "Decorative Cover Making";
$pageDescription = "Durga Saptashati Foundation's Decorative Cover Making initiative — empowering women with creative skills through handcrafted decorative covers, workshops, and entrepreneurship training.";
$pageKeywords = "decorative cover, handicraft, women empowerment, skill training, handmade crafts, creative workshop, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/decorative.css') ?>">

<!-- Page Header -->
<div class="page-header deco-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h1>Decorative Cover Making</h1></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('decorative.php') ?>">Decorative Cover</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Bento Grid — Mixed images + content blocks -->
<section class="deco-hero">
    <div class="container">
        <div class="deco-bento" data-aos="fade-up">
            <!-- Large image -->
            <div class="deco-bento-main">
                <img src="<?= url('assets/images/decorative-cover/decorative-cover.webp') ?>" alt="Decorative Cover Making">
                <div class="deco-bento-overlay">
                    <span class="deco-bento-tag"><i class="fas fa-paint-brush"></i> Handcrafted Art</span>
                </div>
            </div>

            <!-- Content block -->
            <div class="deco-bento-content">
                <div class="deco-badge">
                    <i class="fas fa-cut"></i>
                    <span>Creative Skills</span>
                </div>
                <h2 class="deco-title">Decorative Cover <span class="deco-gradient">Making</span></h2>
                <p class="deco-desc">Empowering women with creative skills through handcrafted decorative covers — building confidence, artistry, and sustainable income opportunities.</p>
            </div>

            <!-- Small image 1 -->
            <div class="deco-bento-sm1">
                <img src="<?= url('assets/images/decorative-cover/decorative-cover-1.webp') ?>" alt="Workshop">
            </div>

            <!-- Stats block -->
            <div class="deco-bento-stats">
                <div class="deco-bs">
                    <strong data-counter="200">0</strong>
                    <span>Women Trained</span>
                </div>
                <div class="deco-bs">
                    <strong data-counter="12">0</strong>
                    <span>Workshops</span>
                </div>
                <div class="deco-bs">
                    <strong data-counter="500">0</strong>
                    <span>Covers Made</span>
                </div>
            </div>

            <!-- Small image 2 -->
            <div class="deco-bento-sm2">
                <img src="<?= url('assets/images/decorative-cover/decorative-cover-2.webp') ?>" alt="Craft Display">
            </div>

            <!-- Quote block -->
            <div class="deco-bento-quote">
                <i class="fas fa-quote-left"></i>
                <p>"Creativity is the foundation of empowerment"</p>
                <div class="deco-tags">
                    <span><i class="fas fa-palette"></i> Art</span>
                    <span><i class="fas fa-female"></i> Empowerment</span>
                    <span><i class="fas fa-rupee-sign"></i> Income</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="deco-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="deco-section-header text-center" data-aos="fade-up">
            <span class="deco-section-badge">Gallery</span>
            <h2 class="deco-section-title">Creative Moments</h2>
            <p class="deco-section-desc">Beautiful handcrafted decorative covers made by women from our community workshops — each piece tells a story of creativity and empowerment.</p>
        </div>

        <?php
        $decoImages = [
            ['file' => 'decorative-cover-4.webp', 'title' => 'Handcrafted Designs'],
            ['file' => 'decorative-cover.webp', 'title' => 'Cover Making Workshop'],
            ['file' => 'decorative-cover-6.webp', 'title' => 'Creative Process'],
            ['file' => 'decorative-cover-1.webp', 'title' => 'Artisan at Work'],
            ['file' => 'decorative-cover-7.webp', 'title' => 'Finished Products'],
            ['file' => 'decorative-cover-3.webp', 'title' => 'Group Workshop'],
            ['file' => 'decorative-cover-5.webp', 'title' => 'Skill Training'],
            ['file' => 'decorative-cover-2.webp', 'title' => 'Craft Display'],
        ];
        ?>
        <div class="deco-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($decoImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openDecoLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/decorative-cover/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">Decorative Cover</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h3 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;"><?= htmlspecialchars($img['title']) ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="decoLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeDecoLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="decoPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="decoNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="decoLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="decoLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var decoData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/decorative-cover/' . $img['file']), 'title' => $img['title']]; }, $decoImages)) ?>;
var decoIdx = 0;
function openDecoLb(i) { decoIdx = i; updateDecoLb(); document.getElementById('decoLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeDecoLb() { document.getElementById('decoLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateDecoLb() { document.getElementById('decoLbImg').src = decoData[decoIdx].src; document.getElementById('decoLbTitle').textContent = decoData[decoIdx].title; }
function decoPrev() { decoIdx = (decoIdx - 1 + decoData.length) % decoData.length; updateDecoLb(); }
function decoNext() { decoIdx = (decoIdx + 1) % decoData.length; updateDecoLb(); }
document.getElementById('decoLb').addEventListener('click', function(e) { if (e.target === this) closeDecoLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('decoLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeDecoLb();
    if (e.key === 'ArrowLeft') decoPrev();
    if (e.key === 'ArrowRight') decoNext();
});

// Counter
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target, target = parseInt(c.getAttribute('data-counter')), current = 0, inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) { c.textContent = target.toLocaleString() + '+'; clearInterval(timer); }
                    else { c.textContent = Math.floor(current).toLocaleString(); }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, { threshold: 0.7 });
    counters.forEach(function(c) { obs.observe(c); });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
