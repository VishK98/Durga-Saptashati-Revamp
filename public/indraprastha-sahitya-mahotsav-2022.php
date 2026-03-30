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
            <div class="col-12"><h2>इंद्रप्रस्थ साहित्य महोत्सव 2022</h2></div>
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

                    <h1 class="indra-title">
                        इंद्रप्रस्थ साहित्य
                        <span class="indra-gradient">महोत्सव</span>
                        2022
                    </h1>

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
                            <strong data-counter="50">0</strong>
                            <span>Poets & Writers</span>
                        </div>
                        <div class="indra-si">
                            <strong data-counter="500">0</strong>
                            <span>Attendees</span>
                        </div>
                        <div class="indra-si">
                            <strong data-counter="12">0</strong>
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
        <div class="indra-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($indraImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openIndraLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/indra/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">साहित्य महोत्सव</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h6 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;"><?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="indraLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeIndraLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="indraPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="indraNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="indraLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="indraLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var indraData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/indra/' . $img['file']), 'title' => $img['title']]; }, $indraImages)) ?>;
var indraIdx = 0;
function openIndraLb(i) { indraIdx = i; updateIndraLb(); document.getElementById('indraLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeIndraLb() { document.getElementById('indraLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateIndraLb() { document.getElementById('indraLbImg').src = indraData[indraIdx].src; document.getElementById('indraLbTitle').textContent = indraData[indraIdx].title; }
function indraPrev() { indraIdx = (indraIdx - 1 + indraData.length) % indraData.length; updateIndraLb(); }
function indraNext() { indraIdx = (indraIdx + 1) % indraData.length; updateIndraLb(); }
document.getElementById('indraLb').addEventListener('click', function(e) { if (e.target === this) closeIndraLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('indraLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeIndraLb();
    if (e.key === 'ArrowLeft') indraPrev();
    if (e.key === 'ArrowRight') indraNext();
});
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target, target = parseInt(c.getAttribute('data-counter')), current = 0, inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) { c.textContent = target + '+'; clearInterval(timer); }
                    else { c.textContent = Math.floor(current); }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, { threshold: 0.7 });
    counters.forEach(function(c) { obs.observe(c); });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>
