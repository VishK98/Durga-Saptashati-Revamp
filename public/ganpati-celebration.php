<?php
require_once '../app/config/config.php';
$pageTitle = "Ganpati Festival Celebration - Durga Saptashati Foundation";
$pageKeywords = "Ganpati celebration, Ganesh Chaturthi, Hindu festival, cultural celebration, community gathering, traditional rituals, Ganpati utsav, festival of prosperity";
$pageDescription = "Join Durga Saptashati Foundation in celebrating Ganpati Festival with traditional rituals, cultural programs, community feasts, and spiritual ceremonies honoring Lord Ganesha.";

include '../app/views/layout/header.php';
?>

<!-- Custom CSS for Ganpati Celebration Page -->
<link rel="stylesheet" href="<?= url('assets/css/events/ganpati-celebration.css') ?>">

<!-- Page Header Start -->
<div class="page-header ganpati-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Ganpati Celebration</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('ganpati-celebration.php') ?>">Ganpati Celebration</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Divine Hero Section -->
<section class="ganpati-hero-section">
    <div class="divine-background">
        <div class="floating-elements">
            <div class="floating-lotus lotus-1"></div>
            <div class="floating-lotus lotus-2"></div>
            <div class="floating-lotus lotus-3"></div>
            <div class="divine-rays"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="hero-content-ganpati">
                    <div class="festival-badge">
                        <i class="fas fa-pray"></i>
                        <span>Ganesh Chaturthi Celebration</span>
                    </div>

                    <h1 class="hero-title-ganpati">
                        Ganpati Festival
                        <span class="text-gradient-divine">Celebration</span>
                        2025
                    </h1>

                    <p class="hero-description-ganpati">
                        Join us in celebrating the divine presence of Lord Ganesha, the remover of obstacles
                        and patron of arts and sciences. Experience the spiritual bliss through traditional
                        rituals, devotional music, and community harmony.
                    </p>

                    <div class="festival-highlights">
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>11 Days Festival</h4>
                                <p>Complete Ganpati Utsav celebration</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Community Participation</h4>
                                <p>Open for all devotees and families</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <div class="highlight-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="highlight-content">
                                <h4>Spiritual Experience</h4>
                                <p>Traditional rituals and prayers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1200">
                <div class="hero-visual-ganpati">
                    <div class="ganpati-shrine">
                        <div class="shrine-main-image">
                            <img src="<?= url('assets/images/ganpati/ganesh.jpg') ?>" alt="Ganpati Celebration"
                                style="width:95%;height:510px;object-fit:fill;border-radius:24px;box-shadow:0 20px 50px rgba(0,0,0,0.15);">
                        </div>

                        <div class="shrine-decorations">
                            <div class="decoration-item deco-1">
                                <i class="fas fa-seedling"></i>
                                <span>Modak</span>
                            </div>
                            <div class="decoration-item deco-2">
                                <i class="fas fa-fire"></i>
                                <span>Aarti</span>
                            </div>
                            <div class="decoration-item deco-3">
                                <i class="fas fa-spa"></i>
                                <span>Flowers</span>
                            </div>
                        </div>

                        <div class="divine-aura"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="ganpati-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="section-header-ganpati text-center" data-aos="fade-up">
            <span class="section-badge-ganpati">Gallery</span>
            <h2 class="section-title-ganpati">Festival Celebration Moments</h2>
            <p class="section-description-ganpati">
                Witness the divine beauty and spiritual atmosphere of our Ganpati celebrations
                through these sacred moments captured during previous festivals.
            </p>
        </div>

        <?php
        $ganpatiImages = [
            ['file' => 'ganpati.jpeg', 'title' => 'Ganpati Sthapana'],
            ['file' => 'ganpati-1.jpeg', 'title' => 'Morning Aarti'],
            ['file' => 'ganpat-2.jpeg', 'title' => 'Devotional Gathering'],
            ['file' => 'ganpati-3.jpeg', 'title' => 'Prasadam Distribution'],
            ['file' => 'ganpati-4.jpeg', 'title' => 'Community Celebration'],
            ['file' => 'ganpati-5.jpeg', 'title' => 'Evening Aarti'],
            ['file' => 'ganpati-6.jpeg', 'title' => 'Cultural Programme'],
            ['file' => 'ganpati-7.jpeg', 'title' => 'Decoration & Flowers'],
            ['file' => 'ganpati-8.jpeg', 'title' => 'Bhajan Sandhya'],
            ['file' => 'ganpati-9.jpeg', 'title' => 'Festive Spirit'],
            ['file' => 'ganpati-10.jpeg', 'title' => 'Sacred Rituals'],
            ['file' => 'ganpati-11.jpeg', 'title' => 'Grand Celebration'],
        ];
        ?>
        <div class="ganpati-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($ganpatiImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openGanpatiLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/ganpati/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Ganpati Celebration</div>
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
<div id="ganpatiLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeGanpatiLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="ganpatiPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="ganpatiNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="ganpatiLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="ganpatiLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var ganpatiData =
    <?= json_encode(array_map(function($img) { return ['src' => url('assets/images/ganpati/' . $img['file']), 'title' => $img['title']]; }, $ganpatiImages)) ?>;
var ganpatiIdx = 0;

function openGanpatiLightbox(i) {
    ganpatiIdx = i;
    updateGanpatiLb();
    document.getElementById('ganpatiLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeGanpatiLightbox() {
    document.getElementById('ganpatiLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateGanpatiLb() {
    document.getElementById('ganpatiLbImg').src = ganpatiData[ganpatiIdx].src;
    document.getElementById('ganpatiLbTitle').textContent = ganpatiData[ganpatiIdx].title;
}

function ganpatiPrev() {
    ganpatiIdx = (ganpatiIdx - 1 + ganpatiData.length) % ganpatiData.length;
    updateGanpatiLb();
}

function ganpatiNext() {
    ganpatiIdx = (ganpatiIdx + 1) % ganpatiData.length;
    updateGanpatiLb();
}
document.getElementById('ganpatiLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeGanpatiLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('ganpatiLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeGanpatiLightbox();
    if (e.key === 'ArrowLeft') ganpatiPrev();
    if (e.key === 'ArrowRight') ganpatiNext();
});
</script>

<?php include '../app/views/layout/footer.php'; ?>