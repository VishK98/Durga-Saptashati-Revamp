<?php
require_once '../app/config/config.php';
$pageTitle = "Saree Run";
$pageDescription = "Join Durga Saptashati Foundation's Saree Run — a unique event celebrating Indian women's strength, culture, and fitness through a vibrant community run in sarees.";
$pageKeywords = "saree run, women empowerment, fitness event, cultural run, community event, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/saree-run.css') ?>">

<!-- Page Header -->
<div class="page-header saree-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">Saree Run</p>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('saree-run.php') ?>">Saree Run</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Centered Title + 3-Image Strip + Stats + Quote -->
<section class="sr-hero">
    <div class="sr-hero-top">
        <div class="container text-center">
            <div class="sr-badge" data-aos="fade-down">
                <i class="fas fa-running"></i>
                <span>Celebrating Strength & Culture</span>
            </div>
            <h1 class="sr-title" data-aos="fade-up" data-aos-delay="100">
                The Vibrant <span class="sr-gradient">Saree Run</span>
            </h1>
            <p class="sr-subtitle" data-aos="fade-up" data-aos-delay="200">
                A unique event where women from all walks of life come together for a vibrant community run in sarees —
                breaking stereotypes and promoting health, unity, and empowerment.
            </p>
        </div>
    </div>

    <div class="sr-image-strip" data-aos="fade-up" data-aos-delay="250">
        <div class="container">
            <div class="sr-strip-grid">
                <div class="sr-strip-img sr-strip-main">
                    <img src="<?= url('assets/images/saree/saree.webp') ?>" alt="Saree Run">
                </div>
                <div class="sr-strip-img">
                    <img src="<?= url('assets/images/saree/saree-1.webp') ?>" alt="Warm-up Session">
                </div>
                <div class="sr-strip-img">
                    <img src="<?= url('assets/images/saree/saree-4.webp') ?>" alt="Ready to Run">
                </div>
            </div>

            <div class="sr-stats-row" data-aos="fade-up" data-aos-delay="350">
                <div class="sr-stat">
                    <div class="sr-stat-icon"><i class="fas fa-female"></i></div>
                    <div class="sr-stat-num" data-counter="300">0</div>
                    <div class="sr-stat-label">Women Participants</div>
                </div>
                <div class="sr-stat">
                    <div class="sr-stat-icon"><i class="fas fa-road"></i></div>
                    <div class="sr-stat-num" data-counter="5">0</div>
                    <div class="sr-stat-label">KM Run</div>
                </div>
                <div class="sr-stat">
                    <div class="sr-stat-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <span class="sr-stat-text">Dwarka</sp>
                        <!-- <div class="sr-stat-num" data-counter="3">0
                </div> -->
                        <div class="sr-stat-label">Delhi</div>
                </div>
                <div class="sr-stat">
                    <div class="sr-stat-icon"><i class="fas fa-award"></i></div>
                    <div class="sr-stat-num" data-counter="10">0</div>
                    <div class="sr-stat-label">Awards Given</div>
                </div>
            </div>

            <div class="sr-quote" data-aos="fade-up" data-aos-delay="400">
                <i class="fas fa-quote-left"></i>
                <p>"Run with Pride, Run in Saree" — Breaking stereotypes, one stride at a time</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="sr-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="sr-section-header text-center" data-aos="fade-up">
            <span class="sr-section-badge">Gallery</span>
            <h2 class="sr-section-title">Saree Run Moments</h2>
            <p class="sr-section-desc">Relive the energy, colour, and spirit of our Saree Run events where women
                celebrated strength, culture, and fitness together.</p>
        </div>

        <?php
        $sareeImages = [
            ['file' => 'saree-4.webp', 'title' => 'Ready to Run'],
            ['file' => 'saree.webp', 'title' => 'Saree Run Kickoff'],
            ['file' => 'saree-7.webp', 'title' => 'Colourful Participants'],
            ['file' => 'saree-2.webp', 'title' => 'Running with Pride'],
            ['file' => 'saree-5.webp', 'title' => 'Community Spirit'],
            ['file' => 'saree-1.webp', 'title' => 'Warm-up Session'],
            ['file' => 'saree-8.webp', 'title' => 'Finish Line Celebration'],
            ['file' => 'saree-3.webp', 'title' => 'Group Energy'],
            ['file' => 'saree-6.webp', 'title' => 'Award Ceremony'],
        ];
        ?>
        <div class="sr-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($sareeImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openSareeLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/saree/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Saree Run</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div
                            style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h3 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;">
                        <?= htmlspecialchars($img['title']) ?>
                    </h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="sareeLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeSareeLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="sareePrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="sareeNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="sareeLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="sareeLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var sareeData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/saree/' . $img['file']), 'title' => $img['title']];
        }, $sareeImages)) ?>;
var sareeIdx = 0;

function openSareeLightbox(i) {
    sareeIdx = i;
    updateSareeLb();
    document.getElementById('sareeLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeSareeLightbox() {
    document.getElementById('sareeLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateSareeLb() {
    document.getElementById('sareeLbImg').src = sareeData[sareeIdx].src;
    document.getElementById('sareeLbTitle').textContent = sareeData[sareeIdx].title;
}

function sareePrev() {
    sareeIdx = (sareeIdx - 1 + sareeData.length) % sareeData.length;
    updateSareeLb();
}

function sareeNext() {
    sareeIdx = (sareeIdx + 1) % sareeData.length;
    updateSareeLb();
}
document.getElementById('sareeLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeSareeLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('sareeLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeSareeLightbox();
    if (e.key === 'ArrowLeft') sareePrev();
    if (e.key === 'ArrowRight') sareeNext();
});

// Counter
document.addEventListener('DOMContentLoaded', function() {
    var counters = document.querySelectorAll('[data-counter]');
    var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                var c = entry.target,
                    target = parseInt(c.getAttribute('data-counter')),
                    current = 0,
                    inc = target / 60;
                var timer = setInterval(function() {
                    current += inc;
                    if (current >= target) {
                        c.textContent = target.toLocaleString() + '+';
                        clearInterval(timer);
                    } else {
                        c.textContent = Math.floor(current).toLocaleString();
                    }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, {
        threshold: 0.7
    });
    counters.forEach(function(c) {
        obs.observe(c);
    });
});
</script>

<?php include '../app/views/layout/footer.php'; ?>