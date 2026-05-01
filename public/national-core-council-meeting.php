<?php
require_once '../app/config/config.php';
$pageTitle = "National Core Council Meeting - 8 & 9 Oct 2022";
$pageDescription = "National Core Council Meeting organised by Durga Saptashati Foundation on 8-9 October 2022 — strategic planning, governance discussions, and organisational development.";
$pageKeywords = "national core council meeting, organisational meeting, strategic planning, governance, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/nccm.css') ?>">

<!-- Page Header -->
<div class="page-header nccm-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>National Core Council Meeting</h1>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('national-core-council-meeting.php') ?>">Council Meeting</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Timeline Header — Centered date block + Side-by-side content & images -->
<section class="nccm-hero">
    <div class="container-fluid">
        <!-- Date Block -->
        <div class="nccm-date-block text-center" data-aos="fade-down">
            <div class="nccm-date-pill">
                <div class="nccm-day">
                    <span class="nccm-num">8</span>
                    <span class="nccm-month">Oct</span>
                </div>
                <div class="nccm-date-sep">&</div>
                <div class="nccm-day">
                    <span class="nccm-num">9</span>
                    <span class="nccm-month">Oct</span>
                </div>
                <div class="nccm-date-year">2022</div>
            </div>
        </div>

        <div class="row align-items-center nccm-hero-row">
            <!-- Left: Content -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="nccm-content">
                    <div class="nccm-badge">
                        <i class="fas fa-landmark"></i>
                        <span>Governance & Strategy</span>
                    </div>

                    <h2 class="nccm-title">
                        National Core Council
                        <span class="nccm-gradient">Meeting</span>
                    </h2>

                    <p class="nccm-desc">
                        A two-day strategic meeting bringing together core council members from across the nation
                        to discuss organisational goals, review progress, plan new initiatives, and strengthen
                        governance for greater community impact.
                    </p>

                    <div class="nccm-agenda">
                        <div class="nccm-agenda-item">
                            <div class="nccm-agenda-dot"></div>
                            <div>
                                <strong>Day 1 — Strategy & Review</strong>
                                <span>Progress review, goal setting, and strategic planning sessions</span>
                            </div>
                        </div>
                        <div class="nccm-agenda-item">
                            <div class="nccm-agenda-dot"></div>
                            <div>
                                <strong>Day 2 — Action & Resolutions</strong>
                                <span>New initiatives, committee formations, and resolution adoption</span>
                            </div>
                        </div>
                    </div>

                    <div class="nccm-stats">
                        <div class="nccm-st">
                            <strong data-counter="30">0</strong>
                            <span>Council Members</span>
                        </div>
                        <div class="nccm-st">
                            <strong data-counter="2">0</strong>
                            <span>Days</span>
                        </div>
                        <div class="nccm-st">
                            <strong data-counter="12">0</strong>
                            <span>Sessions</span>
                        </div>
                        <div class="nccm-st">
                            <strong data-counter="8">0</strong>
                            <span>Resolutions</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Image Grid -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="nccm-img-grid">
                    <div class="nccm-ig-large">
                        <img src="<?= url('assets/images/national-core-council-meeting/national-core-council-meeting.webp') ?>"
                            alt="Council Meeting">
                    </div>
                    <div class="nccm-ig-sm1">
                        <img src="<?= url('assets/images/national-core-council-meeting/national-core-council-meeting-1.webp') ?>"
                            alt="Discussion">
                    </div>
                    <div class="nccm-ig-sm2">
                        <img src="<?= url('assets/images/national-core-council-meeting/national-core-council-meeting-4.webp') ?>"
                            alt="Planning Session">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="nccm-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="nccm-section-header text-center" data-aos="fade-up">
            <span class="nccm-section-badge">Gallery</span>
            <h2 class="nccm-section-title">Meeting Highlights</h2>
            <p class="nccm-section-desc">Key moments from the National Core Council Meeting — discussions, planning
                sessions, resolutions, and team building.</p>
        </div>

        <?php
        $nccmImages = [
            ['file' => 'national-core-council-meeting-8.webp', 'title' => 'Strategy Session'],
            ['file' => 'national-core-council-meeting.webp', 'title' => 'Opening Session'],
            ['file' => 'national-core-council-meeting-14.webp', 'title' => 'Group Discussion'],
            ['file' => 'national-core-council-meeting-3.webp', 'title' => 'Keynote Address'],
            ['file' => 'national-core-council-meeting-11.webp', 'title' => 'Council Members'],
            ['file' => 'national-core-council-meeting-6.webp', 'title' => 'Planning Board'],
            ['file' => 'national-core-council-meeting-17.webp', 'title' => 'Resolution Adoption'],
            ['file' => 'national-core-council-meeting-1.webp', 'title' => 'Welcome Address'],
            ['file' => 'national-core-council-meeting-9.webp', 'title' => 'Panel Review'],
            ['file' => 'national-core-council-meeting-15.webp', 'title' => 'Team Building'],
            ['file' => 'national-core-council-meeting-4.webp', 'title' => 'Progress Review'],
            ['file' => 'national-core-council-meeting-12.webp', 'title' => 'Brainstorming'],
            ['file' => 'national-core-council-meeting-7.webp', 'title' => 'Committee Formation'],
            ['file' => 'national-core-council-meeting-18.webp', 'title' => 'Closing Ceremony'],
            ['file' => 'national-core-council-meeting-2.webp', 'title' => 'Day 1 Session'],
            ['file' => 'national-core-council-meeting-10.webp', 'title' => 'Networking'],
            ['file' => 'national-core-council-meeting-5.webp', 'title' => 'Goal Setting'],
            ['file' => 'national-core-council-meeting-16.webp', 'title' => 'Group Photo'],
            ['file' => 'national-core-council-meeting-13.webp', 'title' => 'Day 2 Session'],
        ];
        ?>
        <div class="nccm-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($nccmImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openNccmLb(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/national-core-council-meeting/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Council Meeting</div>
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
                        <?= htmlspecialchars($img['title']) ?></h3>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="nccmLb"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeNccmLb()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="nccmPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="nccmNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="nccmLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="nccmLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var nccmData =
    <?= json_encode(array_map(function ($img) {
        return ['src' => url('assets/images/national-core-council-meeting/' . $img['file']), 'title' => $img['title']]; }, $nccmImages)) ?>;
var nccmIdx = 0;

function openNccmLb(i) {
    nccmIdx = i;
    updateNccmLb();
    document.getElementById('nccmLb').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeNccmLb() {
    document.getElementById('nccmLb').style.display = 'none';
    document.body.style.overflow = '';
}

function updateNccmLb() {
    document.getElementById('nccmLbImg').src = nccmData[nccmIdx].src;
    document.getElementById('nccmLbTitle').textContent = nccmData[nccmIdx].title;
}

function nccmPrev() {
    nccmIdx = (nccmIdx - 1 + nccmData.length) % nccmData.length;
    updateNccmLb();
}

function nccmNext() {
    nccmIdx = (nccmIdx + 1) % nccmData.length;
    updateNccmLb();
}
document.getElementById('nccmLb').addEventListener('click', function(e) {
    if (e.target === this) closeNccmLb();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('nccmLb').style.display !== 'flex') return;
    if (e.key === 'Escape') closeNccmLb();
    if (e.key === 'ArrowLeft') nccmPrev();
    if (e.key === 'ArrowRight') nccmNext();
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