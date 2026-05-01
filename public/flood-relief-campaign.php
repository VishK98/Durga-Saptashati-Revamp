<?php
require_once '../app/config/config.php';
$pageTitle = "Flood Relief Campaign";
$pageDescription = "Durga Saptashati Foundation's Flood Relief Campaign — providing emergency aid, food, shelter, and rehabilitation support to flood-affected communities.";
$pageKeywords = "flood relief, disaster relief, emergency aid, flood victims, rehabilitation, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/flood-relief.css') ?>">

<!-- Page Header with custom bg -->
<div class="page-header flood-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h1>Flood Relief Campaign</h1></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('flood-relief-campaign.php') ?>">Flood Relief Campaign</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Split — Content Left + Diagonal Image Right -->
<section class="frc-hero">
    <div class="frc-hero-bg-shape"></div>
    <div class="container-fluid">
        <div class="row align-items-center frc-hero-row">
            <!-- Content -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="frc-hero-content">
                    <div class="frc-badge">
                        <i class="fas fa-water"></i>
                        <span>Emergency Relief</span>
                    </div>

                    <h2 class="frc-title">
                        Flood Relief <span class="frc-gradient">Campaign</span>
                    </h2>

                    <p class="frc-desc">
                        When floods devastate communities, we stand with victims — providing emergency food,
                        clean water, shelter, medical aid, and rehabilitation support. Together, we help
                        rebuild lives with dignity and hope.
                    </p>

                    <div class="frc-features">
                        <div class="frc-feature">
                            <div class="frc-feature-icon"><i class="fas fa-utensils"></i></div>
                            <div>
                                <strong>Food & Water</strong>
                                <span>Emergency meal kits & clean drinking water</span>
                            </div>
                        </div>
                        <div class="frc-feature">
                            <div class="frc-feature-icon"><i class="fas fa-home"></i></div>
                            <div>
                                <strong>Shelter & Clothing</strong>
                                <span>Temporary shelters & essential clothing</span>
                            </div>
                        </div>
                        <div class="frc-feature">
                            <div class="frc-feature-icon"><i class="fas fa-medkit"></i></div>
                            <div>
                                <strong>Medical Aid</strong>
                                <span>First aid, medicines & health camps</span>
                            </div>
                        </div>
                    </div>

                    <div class="frc-stats-inline">
                        <div class="frc-si">
                            <strong data-counter="1000">0</strong>
                            <span>Families Helped</span>
                        </div>
                        <div class="frc-si">
                            <strong data-counter="5000">0</strong>
                            <span>Meals Distributed</span>
                        </div>
                        <div class="frc-si">
                            <strong data-counter="200">0</strong>
                            <span>Volunteers</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagonal Image -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="frc-image-block">
                    <div class="frc-img-main">
                        <img src="<?= url('assets/images/food-relief-campaign/food-relief-campaign.webp') ?>" alt="Flood Relief Campaign">
                    </div>
                    <div class="frc-img-small">
                        <img src="<?= url('assets/images/food-relief-campaign/food-relief-campaign-1.webp') ?>" alt="Relief Distribution">
                    </div>
                    <div class="frc-img-badge">
                        <i class="fas fa-hands-helping"></i>
                        <span>Standing Together</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="frc-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="frc-section-header text-center" data-aos="fade-up">
            <span class="frc-section-badge">Gallery</span>
            <h2 class="frc-section-title">Relief Campaign Moments</h2>
            <p class="frc-section-desc">
                Witness our volunteers and team members in action — distributing relief materials,
                providing medical aid, and standing with flood-affected families.
            </p>
        </div>

        <?php
        $floodImages = [
            ['file' => 'food-relief-campaign.webp', 'title' => 'Relief Distribution'],
            ['file' => 'food-relief-campaign-3.webp', 'title' => 'Food Kit Preparation'],
            ['file' => 'food-relief-campaign-1.webp', 'title' => 'Community Support'],
            ['file' => 'food-relief-campaign-5.webp', 'title' => 'Volunteer Team'],
            ['file' => 'food-relief-campaign-2.webp', 'title' => 'Aid Distribution'],
            ['file' => 'food-relief-campaign-4.webp', 'title' => 'On-ground Relief'],
        ];
        ?>
        <div class="frc-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($floodImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openFloodLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/food-relief-campaign/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Flood Relief</div>
                    <div style="position:absolute;inset:0;background:rgba(0,0,0,0.3);opacity:0;transition:opacity 0.3s;display:flex;align-items:center;justify-content:center;"
                        onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                        <div style="width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.9);display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-search-plus" style="color:#f26522;font-size:1.2rem;"></i>
                        </div>
                    </div>
                </div>
                <div style="padding:14px 16px;">
                    <h3 style="color:#1a1b2e;font-weight:600;font-size:0.9rem;margin:0;">
                        <?= htmlspecialchars($img['title']) ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="floodLb" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeFloodLb()" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="floodPrev()" style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="floodNext()" style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="floodLbImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="floodLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var floodData = <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/food-relief-campaign/' . $img['file']), 'title' => $img['title']]; }, $floodImages)) ?>;
var floodIdx = 0;
function openFloodLb(i) { floodIdx = i; updateFloodLb(); document.getElementById('floodLb').style.display = 'flex'; document.body.style.overflow = 'hidden'; }
function closeFloodLb() { document.getElementById('floodLb').style.display = 'none'; document.body.style.overflow = ''; }
function updateFloodLb() { document.getElementById('floodLbImg').src = floodData[floodIdx].src; document.getElementById('floodLbTitle').textContent = floodData[floodIdx].title; }
function floodPrev() { floodIdx = (floodIdx - 1 + floodData.length) % floodData.length; updateFloodLb(); }
function floodNext() { floodIdx = (floodIdx + 1) % floodData.length; updateFloodLb(); }
document.getElementById('floodLb').addEventListener('click', function(e) { if (e.target === this) closeFloodLb(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('floodLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeFloodLb();
    if (e.key === 'ArrowLeft') floodPrev();
    if (e.key === 'ArrowRight') floodNext();
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
