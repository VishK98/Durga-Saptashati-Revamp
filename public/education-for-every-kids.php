<?php
require_once '../app/config/config.php';

$pageTitle = "Durga Saptashati Foundation Child Education NGO in Dwarka| Volunteer with us!";
$pageDescription = "Durga Saptashati Foundation is a leading child education NGO based in Dwarka, Delhi. Every day we try to bridge the education gap among the underprivileged children in Delhi. We work as an after-school support group to bridge the educational & moral gap between these children and their affluent peers. If you wish to help, kindly visit our website to know more.";
$pageKeywords = "Best NGO Delhi, Education NGO, Volunteer Delhi, Volunteer Delhi, Volunteer NCR, Top 100 NGO India, , NGO underprivileged children, NGO underprivileged children education NCR, NGO underprivileged children education Delhi, NGO underprivileged children education Delhi, NGO schools in Delhi, NGO schools in NCR, NGO schools in Delhi, NGO girl child education, NGO girl education, NGO mentor program, School fees NGO, Distribute food NGO, Distribute snacks NGO, Celebrate with NGO, Celebrate birthday with underprivileged kids, Top 10 NGOs NCR, Top 10 NGOs Delhi, Charity NGO, Charity education, online donation, online donation noida, online donations delhi, donations for children, donations for children noida, charity donations, charity donations dwarka, ngo donations, feed the hungry, feed the hungry delhi, NGO for Child Education, NGO for Child Education dwarka, corona virus donation dwarka, covid19 Donation delhi, NGO working on COVID, NGO working on COVID delhi, NGO donations for Conorna virus, covid donation, covid donation delhi,Top NGOs in Delhi, Durga Saptashati NGO in Dwarka, Delhi, Best Food Health NGO in Delhi, food donation in Dwarka, No people hungry  ngo in Dwarka, No people hungry,Dwarka, Delhi, Durga Saptashati
,Durga Saptashati,Durga Saptashati NGO,Durga Saptashati foundation,DurgaSaptashati,Education for Every Kids in Dwarka Delhi, NGOs for Kids in Dwarka Delhi, Education for Everyone in Dwarka Delhi, Top NGOs for Education in Dwarka Delhi, Education for Every Kids in Dwarka";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/education-for-every-kids.css') ?>">

<div class="page-header education-page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Education For Every Kids</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('education-for-every-kids.php') ?>">Education For Every Kids</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero: Centered Title + Image Banner + Overlapping Content -->
<section class="edu-hero">
    <!-- Top: Centered intro -->
    <div class="edu-hero-top">
        <div class="container-fluid text-center">
            <div class="edu-badge" data-aos="fade-down">
                <i class="fas fa-graduation-cap"></i>
                <span>Education For All</span>
            </div>
            <h1 class="edu-hero-title" data-aos="fade-up" data-aos-delay="100">
                Education For <span class="edu-gradient">Every Kids</span>
            </h1>
            <p class="edu-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                Lighting the path of knowledge — every child deserves access to quality education
            </p>

            <!-- Horizontal Stats -->
            <div class="edu-stats-bar" data-aos="fade-up" data-aos-delay="300">
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="500">0</div>
                    <div class="edu-stat-txt">Students Supported</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="10">0</div>
                    <div class="edu-stat-txt">Partner Schools</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="200">0</div>
                    <div class="edu-stat-txt">Scholarships</div>
                </div>
                <div class="edu-stat">
                    <div class="edu-stat-num" data-counter="15">0</div>
                    <div class="edu-stat-txt">Programs</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Banner -->
    <div class="edu-image-banner" data-aos="fade-up" data-aos-delay="350">
        <div class="container-fluid">
            <div class="edu-banner-wrap">
                <img src="<?= url('assets/images/education-for/education-for.webp') ?>" alt="Education For Every Kids"
                    class="edu-banner-img">
                <div class="edu-banner-overlay"></div>

                <!-- Overlapping Content Card -->
                <div class="edu-overlap-card">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h3>Transforming Lives Through Education</h3>
                            <p>We believe education is the most powerful tool for transforming lives. Our initiative
                                provides scholarships, school supplies, digital literacy programs, and mentorship to
                                underprivileged children, ensuring every child has access to quality education.</p>
                        </div>
                        <div class="col-lg-5">
                            <div class="edu-feature-list">
                                <div class="edu-feature">
                                    <i class="fas fa-book-open"></i>
                                    <span>Scholarships & Support</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-laptop"></i>
                                    <span>Digital Literacy</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <span>Mentorship Programs</span>
                                </div>
                                <div class="edu-feature">
                                    <i class="fas fa-school"></i>
                                    <span>School Infrastructure</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="edu-gallery-section" id="gallery">
    <div class="container-fluid">
        <div class="edu-section-header text-center" data-aos="fade-up">
            <span class="edu-section-badge">Gallery</span>
            <h2 class="edu-section-title">Education in Action</h2>
            <p class="edu-section-desc">
                See how our education programs are transforming young minds and creating opportunities
                for children who dream of a brighter future.
            </p>
        </div>

        <?php
        $eduImages = [
            ['file' => 'education-for.webp', 'title' => 'Classroom Session'],
            ['file' => 'education-for-1.webp', 'title' => 'Learning Together'],
            ['file' => 'education-for-2.webp', 'title' => 'Digital Literacy Program'],
            ['file' => 'education-for-3.webp', 'title' => 'Scholarship Ceremony'],
            ['file' => 'education-for-4.webp', 'title' => 'Creative Workshop'],
        ];
        ?>
        <div class="edu-gallery-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
            <?php foreach ($eduImages as $i => $img): ?>
            <div data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 50 ?>"
                style="cursor:pointer;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;background:#fff;"
                onclick="openEduLightbox(<?= $i ?>)"
                onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)'">
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= url('assets/images/education-for/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['title']) ?>"
                        style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.4s;"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div
                        style="position:absolute;top:12px;left:12px;background:rgba(0,0,0,0.6);color:#fff;padding:4px 12px;border-radius:15px;font-size:0.72rem;font-weight:600;backdrop-filter:blur(4px);">
                        Education</div>
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
                        <?= htmlspecialchars($img['title']) ?>
                    </h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div id="eduLightbox"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;backdrop-filter:blur(8px);">
    <button onclick="closeEduLightbox()"
        style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.1);border:none;width:44px;height:44px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.3rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'">&times;</button>
    <button onclick="eduPrev()"
        style="position:absolute;left:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="eduNext()"
        style="position:absolute;right:20px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.1);border:none;width:50px;height:50px;border-radius:50%;cursor:pointer;color:#fff;font-size:1.2rem;z-index:10;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
        onmouseover="this.style.background='rgba(255,255,255,0.2)'"
        onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="eduLbImg" src="" alt=""
            style="max-width:100%;max-height:78vh;border-radius:10px;box-shadow:0 20px 60px rgba(0,0,0,0.5);object-fit:contain;">
        <h5 id="eduLbTitle" style="color:#fff;font-weight:600;font-size:1rem;margin:14px 0 0;"></h5>
    </div>
</div>

<script>
var eduData =
    <?= json_encode(array_map(function ($img) {
            return ['src' => url('assets/images/education-for/' . $img['file']), 'title' => $img['title']];
        }, $eduImages)) ?>;
var eduIdx = 0;

function openEduLightbox(i) {
    eduIdx = i;
    updateEduLb();
    document.getElementById('eduLightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeEduLightbox() {
    document.getElementById('eduLightbox').style.display = 'none';
    document.body.style.overflow = '';
}

function updateEduLb() {
    document.getElementById('eduLbImg').src = eduData[eduIdx].src;
    document.getElementById('eduLbTitle').textContent = eduData[eduIdx].title;
}

function eduPrev() {
    eduIdx = (eduIdx - 1 + eduData.length) % eduData.length;
    updateEduLb();
}

function eduNext() {
    eduIdx = (eduIdx + 1) % eduData.length;
    updateEduLb();
}
document.getElementById('eduLightbox').addEventListener('click', function(e) {
    if (e.target === this) closeEduLightbox();
});
document.addEventListener('keydown', function(e) {
    if (document.getElementById('eduLightbox').style.display !== 'flex') return;
    if (e.key === 'Escape') closeEduLightbox();
    if (e.key === 'ArrowLeft') eduPrev();
    if (e.key === 'ArrowRight') eduNext();
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