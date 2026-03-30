<?php
require_once '../app/config/config.php';
$pageTitle = "Pradhan Mantri Bhartiya Janaushadhi Pariyojana - Jan Aushadhi Diwas 2023";
$pageDescription = "Durga Saptashati Foundation's celebration of Jan Aushadhi Diwas 2023 under Pradhan Mantri Bhartiya Janaushadhi Pariyojana — promoting affordable medicines and healthcare awareness.";
$pageKeywords = "jan aushadhi diwas, janaushadhi pariyojana, affordable medicines, healthcare awareness, generic medicines, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/jan-aushadhi.css') ?>">

<!-- Page Header -->
<div class="page-header ja-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Jan Aushadhi Diwas 2023</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('pradhan-mantri-bhartiya-janaushadhi-pariyojana-7th-march.php') ?>">Jan Aushadhi
                    Diwas</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Horizontal Card Layout — Left image strip + Right content -->
<section class="ja-hero">
    <div class="container-fluid">
        <div class="row align-items-center ja-hero-row">
            <!-- Left: Stacked horizontal image cards -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="ja-card-stack">
                    <div class="ja-card-main">
                        <img src="<?= url('assets/images/jan-aushadhi/jan-aushadhi.webp') ?>" alt="Jan Aushadhi Diwas">
                        <div class="ja-card-label">
                            <i class="fas fa-calendar-alt"></i> 7th March 2023
                        </div>
                    </div>
                    <div class="ja-card-row">
                        <div class="ja-card-sm">
                            <img src="<?= url('assets/images/jan-aushadhi/jan-aushadhi-1.webp') ?>"
                                alt="Awareness Camp">
                        </div>
                        <div class="ja-card-sm">
                            <img src="<?= url('assets/images/jan-aushadhi/jan-aushadhi-3.webp') ?>"
                                alt="Medicine Distribution">
                        </div>
                        <div class="ja-card-sm">
                            <img src="<?= url('assets/images/jan-aushadhi/jan-aushadhi-5.webp') ?>" alt="Health Talk">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <div class="ja-content">
                    <div class="ja-badge">
                        <i class="fas fa-pills"></i>
                        <span>Healthcare Awareness</span>
                    </div>

                    <h1 class="ja-title">
                        Pradhan Mantri Bhartiya
                        <span class="ja-gradient">Janaushadhi</span>
                        Pariyojana
                    </h1>
                    <h4 class="ja-subtitle">Jan Aushadhi Diwas 2023</h4>

                    <p class="ja-desc">
                        Celebrating Jan Aushadhi Diwas to promote awareness about affordable generic medicines
                        available under the Pradhan Mantri Bhartiya Janaushadhi Pariyojana. Making quality
                        healthcare accessible to every citizen through community awareness drives and health camps.
                    </p>

                    <div class="ja-quote">
                        <i class="fas fa-quote-left"></i>
                        <div>
                            <h4>"Jan Aushadhi — Sasti Bhi, Acchi Bhi"</h4>
                            <p>Affordable quality medicines for all</p>
                        </div>
                    </div>

                    <div class="ja-mini-stats">
                        <div class="ja-ms">
                            <i class="fas fa-users"></i>
                            <div>
                                <strong data-counter="300">0</strong>
                                <span>People Reached</span>
                            </div>
                        </div>
                        <div class="ja-ms">
                            <i class="fas fa-medkit"></i>
                            <div>
                                <strong data-counter="5">0</strong>
                                <span>Health Camps</span>
                            </div>
                        </div>
                        <div class="ja-ms">
                            <i class="fas fa-hand-holding-medical"></i>
                            <div>
                                <strong data-counter="1000">0</strong>
                                <span>Free Medicines</span>
                            </div>
                        </div>
                    </div>

                    <div class="ja-tags">
                        <span class="ja-tag"><i class="fas fa-pills"></i> Generic Medicines</span>
                        <span class="ja-tag"><i class="fas fa-heartbeat"></i> Health Awareness</span>
                        <span class="ja-tag"><i class="fas fa-rupee-sign"></i> Affordable Care</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="ja-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="ja-section-header text-center" data-aos="fade-up">
            <span class="ja-section-badge">Gallery</span>
            <h2 class="ja-section-title">Jan Aushadhi Diwas Moments</h2>
            <p class="ja-section-desc">Highlights from our Jan Aushadhi Diwas 2023 celebration — awareness drives,
                health camps, and community engagement for affordable healthcare.</p>
        </div>

        <?php
        $jaImages = [
            ['file' => 'jan-aushadhi-6.webp', 'title' => 'Awareness Drive'],
            ['file' => 'jan-aushadhi.webp', 'title' => 'Jan Aushadhi Diwas'],
            ['file' => 'jan-aushadhi-9.webp', 'title' => 'Community Camp'],
            ['file' => 'jan-aushadhi-2.webp', 'title' => 'Health Talk'],
            ['file' => 'jan-aushadhi-7.webp', 'title' => 'Medicine Distribution'],
            ['file' => 'jan-aushadhi-4.webp', 'title' => 'Guest Address'],
            ['file' => 'jan-aushadhi-10.webp', 'title' => 'Group Photo'],
            ['file' => 'jan-aushadhi-1.webp', 'title' => 'Opening Ceremony'],
            ['file' => 'jan-aushadhi-8.webp', 'title' => 'Health Checkup'],
            ['file' => 'jan-aushadhi-3.webp', 'title' => 'Felicitation'],
            ['file' => 'jan-aushadhi-5.webp', 'title' => 'Public Engagement'],
        ];
        ?>
        <div class="ja-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($jaImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openJaLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/jan-aushadhi/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Jan Aushadhi Diwas</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div
                            style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h6 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;">
                        <?= htmlspecialchars($img['title']) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="jaLb"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeJaLb()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="jaPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="jaNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="jaLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="jaLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var jaData =
    <?= json_encode(array_map(function ($img) {
        return ['src' => url('assets/images/jan-aushadhi/' . $img['file']), 'title' => $img['title']]; }, $jaImages)) ?>;
var jaIdx = 0;

function openJaLb(i) {
    jaIdx = i;
    updateJaLb();
    document.getElementById('jaLb').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeJaLb() {
    document.getElementById('jaLb').style.display = 'none';
    document.body.style.overflow = '';
}

function updateJaLb() {
    document.getElementById('jaLbImg').src = jaData[jaIdx].src;
    document.getElementById('jaLbTitle').textContent = jaData[jaIdx].title;
}

function jaPrev() {
    jaIdx = (jaIdx - 1 + jaData.length) % jaData.length;
    updateJaLb();
}

function jaNext() {
    jaIdx = (jaIdx + 1) % jaData.length;
    updateJaLb();
}
document.getElementById('jaLb').addEventListener('click', function(e) {
    if (e.target === this) closeJaLb();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('jaLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeJaLb();
    if (e.key === 'ArrowLeft') jaPrev();
    if (e.key === 'ArrowRight') jaNext();
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