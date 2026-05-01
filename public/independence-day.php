<?php
require_once '../app/config/config.php';
$pageTitle = "Independence Day Celebration";
$pageDescription = "Durga Saptashati Foundation's Independence Day Celebration — honouring our freedom with flag hoisting, cultural performances, and community service drives.";
$pageKeywords = "independence day, 15 august, patriotic celebration, flag hoisting, cultural performance, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/independence-day.css') ?>">

<!-- Page Header -->
<div class="page-header ind-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h1>Independence Day Celebration</h1></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('independence-day.php') ?>">Independence Day</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Content Left + Image Right like reference -->
<section class="ind-hero">
    <div class="container-fluid">
        <div class="row align-items-center ind-hero-row">
            <!-- Left: Content -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="ind-content">
                    <div class="ind-badge">
                        <i class="fas fa-calendar-alt"></i>
                        <span>15th August 2025</span>
                    </div>

                    <h2 class="ind-title">
                        Celebrating <span class="ind-saffron-text">79 Years</span>
                        of <span class="ind-green-text">Freedom</span> & <span class="ind-saffron-text">Unity</span>
                    </h2>

                    <p class="ind-desc">
                        Join us in commemorating India's journey of independence, honoring the sacrifices
                        of our freedom fighters, and pledging to build a stronger, more inclusive nation
                        through community service and social responsibility.
                    </p>

                    <div class="ind-stats-row">
                        <div class="ind-stat-card">
                            <div class="ind-stat-num" data-counter="79">0</div>
                            <div class="ind-stat-label">Years of Independence</div>
                        </div>
                        <div class="ind-stat-card">
                            <div class="ind-stat-num" data-counter="500">0</div>
                            <div class="ind-stat-label">Community Members</div>
                        </div>
                        <div class="ind-stat-card">
                            <div class="ind-stat-num" data-counter="25">0</div>
                            <div class="ind-stat-label">Service Projects</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="ind-hero-img-wrap">
                    <img src="<?= url('assets/images/independence-day-celebration/indpe.jpg') ?>" alt="Independence Day" class="ind-hero-img">
                    <div class="ind-float-badge ind-float-1">
                        <i class="fas fa-dove"></i> <span>Peace</span>
                    </div>
                    <div class="ind-float-badge ind-float-2">
                        <i class="fas fa-hands-helping"></i> <span>Unity</span>
                    </div>
                    <div class="ind-float-badge ind-float-3">
                        <i class="fas fa-chart-line"></i> <span>Progress</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Indian Flag Banner (Horizontal Tricolor with Ashoka Chakra) -->
<div class="ind-flag-banner">
    <div class="ind-flag-col ind-saffron-bg"></div>
    <div class="ind-flag-col ind-white-bg">
        <div class="ind-ashoka-chakra">
            <svg viewBox="0 0 100 100" width="80" height="80">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#000080" stroke-width="3"/>
                <circle cx="50" cy="50" r="5" fill="#000080"/>
                <?php for ($s = 0; $s < 24; $s++): ?>
                <line x1="50" y1="50" x2="<?= 50 + 40 * cos(deg2rad($s * 15)) ?>" y2="<?= 50 + 40 * sin(deg2rad($s * 15)) ?>" stroke="#000080" stroke-width="1.5"/>
                <?php endfor; ?>
                <circle cx="50" cy="50" r="40" fill="none" stroke="#000080" stroke-width="2"/>
            </svg>
        </div>
    </div>
    <div class="ind-flag-col ind-green-bg"></div>
</div>

<!-- Gallery Section -->
<section class="ind-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="ind-section-header text-center" data-aos="fade-up">
            <span class="ind-section-badge">Gallery</span>
            <h2 class="ind-section-title">Celebration Moments</h2>
            <p class="ind-section-desc">Patriotic moments from our Independence Day celebrations — flag hoisting, cultural performances, and community gatherings.</p>
        </div>

        <?php
        $indImages = [
            ['file' => 'independence-day-celebration-5.webp', 'title' => 'Flag Hoisting'],
            ['file' => 'independence-day-celebration.webp', 'title' => 'Celebration Day'],
            ['file' => 'independence-day-celebration-12.webp', 'title' => 'Patriotic Performance'],
            ['file' => 'independence-day-celebration-3.webp', 'title' => 'Cultural Programme'],
            ['file' => 'independence-day-celebration-9.webp', 'title' => 'Community Gathering'],
            ['file' => 'independence-day-celebration-1.webp', 'title' => 'Morning Ceremony'],
            ['file' => 'independence-day-celebration-15.webp', 'title' => 'Stage Programme'],
            ['file' => 'independence-day-celebration-7.webp', 'title' => 'Student Performance'],
            ['file' => 'independence-day-celebration-4.webp', 'title' => 'Tribute Moment'],
            ['file' => 'independence-day-celebration-16.webp', 'title' => 'Grand Celebration'],
            ['file' => 'independence-day-celebration-2.webp', 'title' => 'National Pride'],
            ['file' => 'independence-day-celebration-10.webp', 'title' => 'Festive Spirit'],
            ['file' => 'independence-day-celebration-6.webp', 'title' => 'Group Photo'],
            ['file' => 'independence-day-celebration-13.webp', 'title' => 'Joyful Moments'],
            ['file' => 'independence-day-celebration-8.webp', 'title' => 'Award Ceremony'],
            ['file' => 'independence-day-celebration-17.webp', 'title' => 'Closing Ceremony'],
            ['file' => 'independence-day-celebration-11.webp', 'title' => 'Unity March'],
            ['file' => 'independence-day-celebration-14.webp', 'title' => 'Cultural Evening'],
        ];
        ?>
        <div class="ind-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($indImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openIndLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/independence-day-celebration/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">Independence Day</div>
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
<div id="indLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeIndLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="indPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="indNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="indLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="indLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var indData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/independence-day-celebration/' . $img['file']), 'title' => $img['title']]; }, $indImages)) ?>;
var indIdx = 0;
function openIndLb(i) { indIdx = i; updateIndLb(); document.getElementById('indLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeIndLb() { document.getElementById('indLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateIndLb() { document.getElementById('indLbImg').src = indData[indIdx].src; document.getElementById('indLbTitle').textContent = indData[indIdx].title; }
function indPrev() { indIdx = (indIdx - 1 + indData.length) % indData.length; updateIndLb(); }
function indNext() { indIdx = (indIdx + 1) % indData.length; updateIndLb(); }
document.getElementById('indLb').addEventListener('click', function(e) { if (e.target === this) closeIndLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('indLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeIndLb();
    if (e.key === 'ArrowLeft') indPrev();
    if (e.key === 'ArrowRight') indNext();
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
