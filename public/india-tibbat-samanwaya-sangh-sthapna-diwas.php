<?php
require_once '../app/config/config.php';
$pageTitle = "India Tibbat Samanwaya Sangh - Sthapna Diwas";
$pageDescription = "India Tibbat Samanwaya Sangh Sthapna Diwas celebration — honouring the foundation day with cultural programmes, felicitations, and community gatherings organised by Durga Saptashati Foundation.";
$pageKeywords = "india tibbat samanwaya sangh, sthapna diwas, foundation day, cultural celebration, community event, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/sthapna-diwas.css') ?>">

<!-- Page Header -->
<div class="page-header sd-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>India Tibbat Samanwaya Sangh - Sthapna Diwas</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('india-tibbat-samanwaya-sangh-sthapna-diwas.php') ?>">Sthapna Diwas</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Overlapping Cards — Two overlapping image frames + side content -->
<section class="sd-hero">
    <div class="container-fluid">
        <div class="row align-items-center sd-hero-row">
            <!-- Left: Content -->
            <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-duration="1000">
                <div class="sd-content">
                    <div class="sd-badge">
                        <i class="fas fa-landmark"></i>
                        <span>Foundation Day Celebration</span>
                    </div>

                    <h2 class="sd-title">
                        भारत-तिब्बत समन्वय संघ स्थापना दिवस एवं G20 देशो पर चर्चा एवं भारत का सांस्कृतिक संदेश
                    </h2>

                    <p class="sd-desc">
                        Celebrating the foundation day of India Tibbat Samanwaya Sangh with cultural programmes,
                        felicitation ceremonies, and community gatherings that strengthen the bond between
                        India and Tibet through shared heritage, values, and solidarity.
                    </p>

                    <div class="sd-info-box">
                        <div class="sd-info-item">
                            <div class="sd-info-icon"><i class="fas fa-flag"></i></div>
                            <div>
                                <strong>Indo-Tibetan Unity</strong>
                                <span>Strengthening cultural bonds</span>
                            </div>
                        </div>
                        <div class="sd-info-item">
                            <div class="sd-info-icon"><i class="fas fa-handshake"></i></div>
                            <div>
                                <strong>Community Solidarity</strong>
                                <span>Together for a shared future</span>
                            </div>
                        </div>
                    </div>

                    <div class="sd-stats">
                        <div class="sd-st">
                            <strong data-counter="200">0</strong>
                            <span>Guests</span>
                        </div>
                        <div class="sd-st">
                            <strong data-counter="10">0</strong>
                            <span>Speakers</span>
                        </div>
                        <div class="sd-st">
                            <strong data-counter="15">0</strong>
                            <span>Performances</span>
                        </div>
                        <div class="sd-st">
                            <strong data-counter="5">0</strong>
                            <span>Awards</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Overlapping image frames -->
            <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-duration="1000">
                <div class="sd-frames">
                    <div class="sd-frame sd-frame-back">
                        <img src="<?= url('assets/images/sthapna-diwas/sthapna-diwas-3.webp') ?>"
                            alt="Cultural Programme">
                    </div>
                    <div class="sd-frame sd-frame-front">
                        <img src="<?= url('assets/images/sthapna-diwas/sthapna-diwas.webp') ?>" alt="Sthapna Diwas">
                    </div>
                    <div class="sd-frame-accent">
                        <img src="<?= url('assets/images/sthapna-diwas/sthapna-diwas-5.webp') ?>" alt="Felicitation">
                    </div>
                    <div class="sd-frame-badge">
                        <i class="fas fa-om"></i>
                        <span>Unity & Heritage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="sd-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="sd-section-header text-center" data-aos="fade-up">
            <span class="sd-section-badge">Gallery</span>
            <h2 class="sd-section-title">Sthapna Diwas Highlights</h2>
            <p class="sd-section-desc">Memorable moments from the India Tibbat Samanwaya Sangh Sthapna Diwas —
                felicitations, cultural performances, and community celebrations.</p>
        </div>

        <?php
        $sdImages = [
            ['file' => 'sthapna-diwas-7.webp', 'title' => 'Guest Address'],
            ['file' => 'sthapna-diwas.webp', 'title' => 'Foundation Day'],
            ['file' => 'sthapna-diwas-12.webp', 'title' => 'Cultural Performance'],
            ['file' => 'sthapna-diwas-2.webp', 'title' => 'Lamp Lighting'],
            ['file' => 'sthapna-diwas-9.webp', 'title' => 'Felicitation Ceremony'],
            ['file' => 'sthapna-diwas-4.webp', 'title' => 'Stage Programme'],
            ['file' => 'sthapna-diwas-14.webp', 'title' => 'Grand Celebration'],
            ['file' => 'sthapna-diwas-1.webp', 'title' => 'Opening Ceremony'],
            ['file' => 'sthapna-diwas-11.webp', 'title' => 'Community Gathering'],
            ['file' => 'sthapna-diwas-6.webp', 'title' => 'Award Moment'],
            ['file' => 'sthapna-diwas-13.webp', 'title' => 'Group Photo'],
            ['file' => 'sthapna-diwas-3.webp', 'title' => 'Cultural Evening'],
            ['file' => 'sthapna-diwas-10.webp', 'title' => 'Keynote Session'],
            ['file' => 'sthapna-diwas-8.webp', 'title' => 'Festive Spirit'],
            ['file' => 'sthapna-diwas-5.webp', 'title' => 'Honourable Guests'],
        ];
        ?>
        <div class="sd-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($sdImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openSdLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/sthapna-diwas/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Sthapna Diwas</div>
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
<div id="sdLb"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeSdLb()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="sdPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="sdNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="sdLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="sdLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var sdData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/sthapna-diwas/' . $img['file']), 'title' => $img['title']];
        }, $sdImages)) ?>;
var sdIdx = 0;

function openSdLb(i) {
    sdIdx = i;
    updateSdLb();
    document.getElementById('sdLb').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeSdLb() {
    document.getElementById('sdLb').style.display = 'none';
    document.body.style.overflow = '';
}

function updateSdLb() {
    document.getElementById('sdLbImg').src = sdData[sdIdx].src;
    document.getElementById('sdLbTitle').textContent = sdData[sdIdx].title;
}

function sdPrev() {
    sdIdx = (sdIdx - 1 + sdData.length) % sdData.length;
    updateSdLb();
}

function sdNext() {
    sdIdx = (sdIdx + 1) % sdData.length;
    updateSdLb();
}
document.getElementById('sdLb').addEventListener('click', function(e) {
    if (e.target === this) closeSdLb();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('sdLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeSdLb();
    if (e.key === 'ArrowLeft') sdPrev();
    if (e.key === 'ArrowRight') sdNext();
});
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
                        c.textContent = target + '+';
                        clearInterval(timer);
                    } else {
                        c.textContent = Math.floor(current);
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