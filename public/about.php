<?php
require_once '../app/config/config.php';

$pageTitle = "About Durga Saptashati Foundation | NGO for Social Welfare in Dwarka Delhi";
$pageDescription = "Learn about Durga Saptashati Foundation, a nonprofit NGO in Dwarka Delhi dedicated to women empowerment, child education, hunger relief, livelihood support, senior citizen welfare and community welfare programs for underprivileged people. Join our mission.";
$pageKeywords = "NGO in Dwarka Delhi, social welfare NGO Delhi, women empowerment NGO Delhi, senior citizen welfare NGO in Dwarka Delhi, charity organization Delhi, Community welfare NGO in Dwarka Delhi";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>About Us</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('about.php') ?>">About Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->



<!-- ============================================ -->
<!-- SECTION 1: About the Foundation              -->
<!-- ============================================ -->
<section id="about-foundation" class="abt-section">
    <div class="container py-4">
        <div class="row abt-row-stretch">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100 abt-img-container">
                    <img src="<?= asset('images/about-us-durga.jpeg') ?>" alt="About Durga Saptashati"
                        class="abt-img-cover">
                    <a class="position-absolute d-flex align-items-center justify-content-center abt-video-overlay"
                        href="#" data-toggle="modal" data-target="#videoModal"
                        data-src="https://www.youtube.com/embed/-VtO2d-zJ4k" onclick="event.preventDefault();">
                        <div class="abt-play-btn">
                            <i class="fa fa-play text-white"></i>
                        </div>
                    </a>
                    <div class="position-absolute abt-stat-bar-wrap">
                        <div class="abt-stat-overlay">
                            <div class="abt-stat-overlay-item abt-stat-overlay-item--bordered">
                                <h4>10+</h4>
                                <small>Years
                                    of Service</small>
                            </div>
                            <div class="abt-stat-overlay-item abt-stat-overlay-item--bordered">
                                <h4>5K+</h4>
                                <small>Lives
                                    Impacted</small>
                            </div>
                            <div class="abt-stat-overlay-item">
                                <h4>100+</h4>
                                <small>Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="text-uppercase abt-foundation-heading">
                    Durga Saptashati Foundation</h2>
                <p class="abt-foundation-tagline">
                    Empowerment | Education | Equality | Empathy</p>

                <h3 class="abt-commitment-heading">
                    Our Commitment <span class="abt-gradient-text">to
                        Community!</span>
                    <span class="abt-heading-underline"></span>
                </h3>

                <p class="abt-body-text">Durga Saptashati NGO in Dwarka, Delhi, is the
                    brainchild of a visionary and empathetic leader, <strong>Sandhya Singh</strong>. Saptashati
                    Foundation
                    is a trusted
                    charity
                    organisation in Delhi working tirelessly for the empowerment of women (from all walks of life),
                    underprivileged children, senior citizens, and people with disabilities. We firmly believe that
                    giving a voice to the marginalised helps build a more equal, inclusive, and just society. Our
                    approach focuses on grassroots initiatives, as our founder strongly believes in creating lasting
                    impact from the ground up, fostering self-reliance, education, and holistic development in
                    communities. Through our programs, we aim to inspire hope, bring positive change, and create
                    opportunities that transform lives.</p>

                <div class="abt-quote-block">
                    <p>
                        From gender equality to social justice, we are dismantling barriers, challenging
                        stereotypes,
                        and trying to create a more inclusive society!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content abt-video-modal-content">
            <div class="modal-body p-0">
                <button type="button" class="close abt-video-modal-close" data-dismiss="modal"
                    aria-label="Close">&times;</button>
                <div class="embed-responsive embed-responsive-16by9 abt-video-embed">
                    <iframe class="embed-responsive-item" src="" id="aboutVideoIframe" allowscriptaccess="always"
                        allow="autoplay" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ============================================ -->
<!-- SECTION: Mission — Split with accent sidebar -->
<!-- ============================================ -->
<section class="abt-mission-section">
    <div class="container">
        <div class="row align-items-start">
            <!-- Left: Sticky accent card -->
            <div class="col-lg-4 mb-4" data-aos="fade-right">
                <div class="abt-mission-sticky">
                    <div class="abt-mission-card">
                        <i class="fas fa-bullseye abt-mission-icon"></i>
                        <h3 class="abt-mission-card-title">Our Mission</h3>
                        <p class="abt-mission-card-desc">Empowering the
                            voiceless, uplifting the vulnerable, and creating a just society through grassroots action.
                        </p>
                        <div class="abt-mission-stats-grid">
                            <div class="abt-mission-stat-box">
                                <strong>5+</strong>
                                <small>Years of Service</small>
                            </div>
                            <div class="abt-mission-stat-box">
                                <strong>5K+</strong>
                                <small>Lives Touched</small>
                            </div>
                            <div class="abt-mission-stat-box">
                                <strong>50+</strong>
                                <small>Programs Run</small>
                            </div>
                            <div class="abt-mission-stat-box">
                                <strong>100+</strong>
                                <small>Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Mission content -->
            <div class="col-lg-8" data-aos="fade-left">
                <p class="abt-body-text abt-body-text--spaced">
                    Widowed women, handicapped people, disabled people, have to struggle for their rights and are
                    frequently victims of discrimination. At Saptashati Foundation, our team works towards empowering
                    the widowed women of our Indian society and we ensure that we reach every corner of India to uplift
                    these widowed from their distressed state.
                </p>
                <p class="abt-body-text abt-body-text--spaced">
                    Widowed women and their children need our support and care. Saptashati Foundation was established
                    with the aim to inspire a sense of welfare and bring a social revolution. Our purpose is to offer
                    financial, social, and economic security to women who have endured the grief of widowhood.
                </p>

                <div class="abt-quote-block abt-quote-block--lg">
                    <p>
                        Saptashati Foundation's mission is to instill knowledge and skill development in the minds of
                        widowed and less fortunate women — thus enabling them to become self-reliant and provide them
                        with social, financial, and psychological support for a better life.</p>
                </div>

                <div class="abt-focus-areas">
                    <?php
                    $focusAreas = [
                        ['icon' => 'fa-female', 'color' => '#f26522', 'title' => "Women's Empowerment", 'desc' => 'Supporting widowed women and single mothers'],
                        ['icon' => 'fa-wheelchair', 'color' => '#ff8c42', 'title' => 'Disability Support', 'desc' => 'Comprehensive care for disabled individuals'],
                        ['icon' => 'fa-user-friends', 'color' => '#c94a0f', 'title' => 'Senior Care', 'desc' => 'Dignified support for elderly citizens'],
                    ];
                    foreach ($focusAreas as $area):
                        ?>
                    <div class="abt-focus-card">
                        <div class="abt-focus-card-icon"
                            style="background:<?= $area['color'] ?>;box-shadow:0 6px 18px <?= $area['color'] ?>33;">
                            <i class="fas <?= $area['icon'] ?>"></i>
                        </div>
                        <strong><?= $area['title'] ?></strong>
                        <small><?= $area['desc'] ?></small>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION: Vision — Dark with accent boxes     -->
<!-- ============================================ -->
<section class="abt-vision-section">
    <div class="abt-vision-glow abt-vision-glow--top"></div>
    <div class="abt-vision-glow abt-vision-glow--bottom"></div>

    <div class="container position-relative abt-vision-content">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="abt-vision-label">
                <i class="fas fa-eye"></i> Our Vision
            </div>
            <h2 class="abt-vision-heading">Shaping a Better <span>Future</span></h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-lg-6 mb-4">
                <p class="abt-vision-text abt-vision-text--spaced">
                    Our vision focuses on the welfare of handicapped people, widows, and senior citizens. In a bid to
                    empower them with equal opportunities, we help them live independently with pride, dignity and
                    self-respect. We work towards the economic reform of these people, and help them provide the right
                    skillset and exposure, so they may move forward in life.
                </p>
                <p class="abt-vision-text">
                    Every change on the planet starts with a new phase of consciousness, a new experience, and a new
                    vision. We, at Durga Saptashati, create a new experience to set the motion for women's empowerment
                    through various programs and events that we organize annually.
                </p>
            </div>
            <div class="col-lg-6 mb-4">
                <p class="abt-vision-text abt-vision-text--spaced">
                    Our vision is to start and promote such methods and actions where socially and economically stable
                    women irrespective of age, class, color, or family are able to engage actively in the means of their
                    community so that they are able to start a life of dignity and respect.
                </p>

                <div class="abt-vision-quote">
                    <i class="fas fa-quote-left abt-vision-quote-icon"></i>
                    <p>
                        Women comprise half the population of the globe and share one percent of the resources. We are
                        here to bring about a positive change, offering equality to rural women and widows — thus
                        changing society's outlook as a whole.</p>
                </div>
            </div>
        </div>

        <!-- Vision pillars -->
        <div class="abt-vision-pillars" data-aos="fade-up" data-aos-delay="200">
            <?php
            $pillars = [
                ['icon' => 'fa-balance-scale', 'title' => 'Equality', 'desc' => 'Equal opportunities for all'],
                ['icon' => 'fa-hand-holding-heart', 'title' => 'Dignity', 'desc' => 'Living with pride & respect'],
                ['icon' => 'fa-fist-raised', 'title' => 'Empowerment', 'desc' => 'Self-reliance & independence'],
                ['icon' => 'fa-shield-alt', 'title' => 'Protection', 'desc' => 'Against harassment & trafficking'],
            ];
            foreach ($pillars as $p):
                ?>
            <div class="abt-vision-pillar">
                <div class="abt-vision-pillar-icon">
                    <i class="fas <?= $p['icon'] ?>"></i>
                </div>
                <strong><?= $p['title'] ?></strong>
                <small><?= $p['desc'] ?></small>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION: Founder & Leadership                -->
<!-- ============================================ -->
<section class="abt-section abt-section--alt">
    <div class="container-fluid">

        <!-- Founder's Words -->
        <div class="abt-founder" data-aos="fade-up">
            <div class="abt-founder-glow"></div>
            <div class="row align-items-center">
                <div class="col-lg-3 text-center" data-aos="zoom-in">
                    <div class="abt-founder-photo">
                        <img src="<?= url('assets/images/sandhya-singh.jpeg') ?>" alt="Sandhya Singh - Founder">
                    </div>
                    <h5 class="abt-founder-name">Smt. Sandhya Singh</h5>
                    <span class="abt-founder-title">Founder - Durga Saptashati Foundation</span>
                </div>
                <div class="col-lg-9" data-aos="fade-left" data-aos-delay="150">
                    <div class="abt-founder-message">
                        <i class="fas fa-quote-left abt-quote-icon"></i>
                        <p>Durga Saptashati Foundation, I believe that real and lasting change begins
                            with compassion and a shared sense of responsibility. Every child deserves
                            access to education, care, and opportunities that allow them to grow with
                            dignity and hope. At the same time, empowering women from marginalized
                            communities through skill development and livelihood opportunities is
                            essential for building a stronger and self-reliant society. Our mission is not only to
                            support those in need, but to uplift lives, restore hope,
                            and create opportunities for a brighter and more inclusive future. Every
                            initiative we undertake is a step toward building a society where no child is
                            deprived of education and no woman is left without the opportunity to stand
                            on her own feet.</p>
                        <p>I humbly invite you to join us in this journey of compassion and
                            impact — whether by donating, volunteering, or spreading awareness about
                            our work. Together, we can transform small acts of kindness into lasting
                            change and create a better future for many lives.</p>
                        <p><strong>Every contribution, big or small, has the power to make a difference.</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Stats Banner -->
<div class="abt-impact-banner">
    <div class="abt-impact-overlay"></div>
    <div class="container-fluid position-relative">
        <div class="row text-center">
            <?php
            $impactStats = [
                ['num' => '1,000+', 'label' => 'Smiles', 'icon' => 'fa-smile', 'target' => 1000],
                ['num' => '100+', 'label' => 'Happy Families', 'icon' => 'fa-home', 'target' => 100],
                ['num' => '10+', 'label' => 'Initiatives', 'icon' => 'fa-lightbulb', 'target' => 10],
            ];
            foreach ($impactStats as $i => $stat):
                ?>
            <div class="col-lg-4 col-md-4 col-4 mb-3" data-aos="zoom-in" data-aos-delay="<?= $i * 80 ?>">
                <div class="abt-impact-item">
                    <i class="fas <?= $stat['icon'] ?>"></i>
                    <h3 class="abt-counter-num" data-target="<?= $stat['target'] ?>">0</h3>
                    <p><?= $stat['label'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- SECTION 4: Leadership Team                   -->
<!-- ============================================ -->
<section id="leadership" class="abt-section abt-section--alt">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center">
                <i class="fas fa-crown"></i>
                <span>Our Team</span>
            </div>
            <h2 class="abt-section-title">Leadership Team</h2>
            <p class="abt-section-subtitle">Passionate individuals dedicated to creating lasting social impact</p>
        </div>

        <div class="row justify-content-center">
            <?php
            $leaders = [
                ['img' => url('assets/images/sandhya-singh.jpeg'), 'name' => 'Smt. Sandhya Singh', 'role' => 'Founder', 'bio' => 'Visionary leader and founder of Durga Saptashati Foundation, dedicated to empowering women, children, and underprivileged communities.'],
                ['img' => url('assets/images/ananya-singh.jpeg'), 'name' => 'Ms. Ananya Singh', 'role' => 'Director', 'bio' => 'Passionate advocate for women\'s empowerment and education, driving impactful community programmes.'],
                ['img' => url('assets/images/parul-gupta.jpeg'), 'name' => 'Mrs. Parul Gupta', 'role' => 'Director', 'bio' => 'Committed to scaling grassroots initiatives and building sustainable community development partnerships.'],
            ];
            foreach ($leaders as $i => $leader):
                ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 80 ?>">
                <div class="abt-leader-card">
                    <div class="abt-leader-img-wrap">
                        <img src="<?= $leader['img'] ?>" alt="<?= $leader['name'] ?>">
                        <div class="abt-leader-ring"></div>
                    </div>
                    <h4><?= $leader['name'] ?></h4>
                    <span class="abt-leader-role"><?= $leader['role'] ?></span>
                    <p><?= $leader['bio'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 5: Our Patrons -->
<section class="abt-section">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center">
                <i class="fas fa-star"></i>
                <span>Leadership</span>
            </div>
            <h2 class="abt-section-title">Our <span class="abt-accent-text">Patrons</span></h2>
            <p class="abt-section-subtitle">Visionary leaders guiding our mission to uplift communities</p>
        </div>
        <div class="row justify-content-center">
            <?php
            $patrons = [
                ['name' => 'Manoj Singh', 'role' => 'Chairman & MD', 'org' => 'Purple Wave Infocom Limited', 'img' => 'team/manoj-singh.png'],
                ['name' => 'Ravikant Sharma', 'role' => 'President', 'org' => 'Durga Saptashati Foundation', 'img' => 'team/ravikant-sharma.png'],
                ['name' => 'Promila Malik', 'role' => 'Chief Patron', 'org' => 'Durga Saptashati Foundation', 'img' => 'team/pormila-malik.png'],
                ['name' => 'Rohit Sharma', 'role' => 'National Secretary', 'org' => 'Akhil Bhartiya Mandir Parishad', 'img' => 'team/rohit-sharma.png'],
            ];
            foreach ($patrons as $i => $p): ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 80 ?>">
                <div class="abt-leader-card">
                    <div class="abt-leader-img-wrap">
                        <img src="<?= asset('images/' . $p['img']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                        <div class="abt-leader-ring"></div>
                    </div>
                    <h4><?= htmlspecialchars($p['name']) ?></h4>
                    <span class="abt-leader-role"><?= htmlspecialchars($p['role']) ?></span>
                    <p><?= htmlspecialchars($p['org']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 6: Executive Team -->
<section class="abt-section abt-section--alt">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center">
                <i class="fas fa-users"></i>
                <span>The People Behind The Mission</span>
            </div>
            <h2 class="abt-section-title">Meet Our <span class="abt-accent-text">Executive Team</span></h2>
            <p class="abt-section-subtitle">Passionate individuals dedicated to creating lasting social impact</p>
        </div>
        <div class="abt-exec-grid">
            <?php
            $executives = [
                ['name' => 'Smt. Shanti Rathore', 'role' => 'Design Head (Art & Craft)', 'img' => 'team/shanti-rathor.png'],
                ['name' => 'Ajeet Dubey', 'role' => 'Co-Convenor', 'img' => 'team/ajeet-dubey.png'],
                ['name' => 'CA. CMA. Aafaqu Ahmad', 'role' => 'Chief Financial Officer', 'img' => 'team/aafaqu-ahmad.png'],
                ['name' => 'CS. Shivani Gupta', 'role' => 'Compliance Officer', 'img' => 'team/shivani-gupta.png'],
                ['name' => 'Shikha Saxena', 'role' => 'Administration Manager', 'img' => 'team/shikha-saxena.png'],
                ['name' => 'Harish Arya', 'role' => 'Community Outreach Manager', 'img' => 'team/harish-arya.png'],
                ['name' => 'Md. Tariq Ansari', 'role' => 'Senior Graphic Designer', 'img' => 'team/tariq-ansari.png'],
                ['name' => 'Hemant', 'role' => 'Executive Graphic Designer', 'img' => 'team/hemant.png'],
                ['name' => 'Nupur', 'role' => 'Operations Manager', 'img' => 'team/nupur.png'],
                ['name' => 'Charan Singh Sehrawat', 'role' => 'Media Head', 'img' => 'team/charan-singh.png'],
                ['name' => 'Manmohan Gupta', 'role' => 'Yog Guru', 'img' => 'team/manmohan-gupta.png'],
                ['name' => 'Babita', 'role' => 'Social Media Executive', 'img' => 'team/babita.png'],
                ['name' => 'Karishma', 'role' => 'Kids Activity & Dance Trainer', 'img' => 'team/karishma.png'],
                ['name' => 'Sulekha', 'role' => 'Kids Arts Trainer', 'img' => 'team/shulekha.png'],
                ['name' => 'Shivani', 'role' => 'Assistant Trainer', 'img' => 'team/shivani.png'],
                ['name' => 'Vishesh Kumar', 'role' => 'Full Stack Developer', 'img' => 'team/vishesh-kumar.png'],
                ['name' => 'Nalini', 'role' => 'Volunteer Team Leader', 'img' => 'team/nalini.png'],
                ['name' => 'Tanishka', 'role' => 'Volunteer Team Leader', 'img' => 'team/tanishka.png'],
            ];
            foreach ($executives as $i => $e): ?>
            <div class="abt-exec-item" data-aos="fade-up" data-aos-delay="<?= min(($i + 1) * 60, 400) ?>">
                <div class="abt-leader-card">
                    <div class="abt-leader-img-wrap">
                        <img src="<?= asset('images/' . $e['img']) ?>" alt="<?= htmlspecialchars($e['name']) ?>">
                        <div class="abt-leader-ring"></div>
                    </div>
                    <h4><?= htmlspecialchars($e['name']) ?></h4>
                    <span class="abt-leader-role"><?= htmlspecialchars($e['role']) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<div class="causes-cta">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-7">
                <h3 class="cta-heading">Want to Support a Cause?
                </h3>
                <p class="cta-text">Your contribution can
                    create a lasting impact. Join hands with us to transform lives in communities that need it most.</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                <a href="<?= url('make-donation.php') ?>" class="cta-btn-primary">
                    <i class="fas fa-heart"></i> Donate Now
                </a>
                <a href="<?= url('become-volunteer.php') ?>" class="cta-btn-secondary">
                    <i class="fas fa-hands-helping"></i> Volunteer
                </a>
            </div>
        </div>
    </div>
</div>

<!-- PDF Viewer Modal -->
<div id="pdfModal" class="abt-pdf-modal" onclick="if(event.target===this)closePdfModal()">
    <div class="abt-pdf-content">
        <div class="abt-pdf-header">
            <div class="abt-pdf-title">
                <div class="abt-pdf-icon"><i class="fas fa-file-pdf"></i></div>
                <div>
                    <h5 id="pdfModalTitle">Document</h5>
                    <small>Durga Saptashati Foundation</small>
                </div>
            </div>
            <div class="abt-pdf-actions">
                <a id="pdfDownloadBtn" href="#" download class="abt-pdf-download">
                    <i class="fas fa-download"></i> Download
                </a>
                <button onclick="closePdfModal()" class="abt-pdf-close">&times;</button>
            </div>
        </div>
        <iframe id="pdfViewer" src=""></iframe>
    </div>
</div>

<script>
// Initialize AOS
AOS.init({
    duration: 800,
    once: true,
    offset: 80
});

// About Tab Switcher (matching home page)
function switchAboutTab(btn, tab) {
    document.querySelectorAll('.about-tab-btn').forEach(function(b) {
        b.style.color = '#999';
        b.style.borderBottomColor = 'transparent';
    });
    btn.style.color = '#1a1b2e';
    btn.style.borderBottomColor = '#f26522';
    document.querySelectorAll('.about-tab-content').forEach(function(c) {
        c.style.display = 'none';
    });
    document.getElementById('about-tab-' + tab).style.display = 'block';
}

// Smooth scroll for quick nav
document.querySelectorAll('.about-quick-nav a').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        var target = document.querySelector(this.getAttribute('href'));
        if (target) {
            var offset = document.getElementById('aboutQuickNav').offsetHeight + 20;
            var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({
                top: top,
                behavior: 'smooth'
            });
        }
    });
});

// Sticky quick nav highlight + scroll-based active state
window.addEventListener('scroll', function() {
    var sections = document.querySelectorAll('section[id]');
    var navLinks = document.querySelectorAll('.about-quick-nav a');
    var scrollPos = window.pageYOffset + 200;

    sections.forEach(function(section) {
        if (scrollPos >= section.offsetTop && scrollPos < section.offsetTop + section.offsetHeight) {
            navLinks.forEach(function(link) {
                link.classList.remove('active');
            });
            var activeLink = document.querySelector('.about-quick-nav a[href="#' + section.id + '"]');
            if (activeLink) activeLink.classList.add('active');
        }
    });
});

// Animate progress bars on scroll
var progressObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            var bar = entry.target;
            bar.style.width = bar.getAttribute('data-width');
            progressObserver.unobserve(bar);
        }
    });
}, {
    threshold: 0.5
});
document.querySelectorAll('.abt-progress-fill').forEach(function(bar) {
    progressObserver.observe(bar);
});

// Certificate Modal
var currentCertificateIndex = 0;
var certificateImages = [];

document.addEventListener('DOMContentLoaded', function() {
    certificateImages = Array.from(document.querySelectorAll('.abt-cert-card img')).map(function(img) {
        return {
            src: img.src,
            alt: img.alt
        };
    });
});

function openCertificateModal(el) {
    var img = el.querySelector('img');
    var cards = document.querySelectorAll('.abt-cert-card');
    currentCertificateIndex = Array.from(cards).indexOf(el);
    document.getElementById('modalImage').src = img.src;
    document.getElementById('modalImage').alt = img.alt;
    document.getElementById('certificateModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeCertificateModal() {
    document.getElementById('certificateModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function navigateCertificate(dir) {
    currentCertificateIndex += dir;
    if (currentCertificateIndex < 0) currentCertificateIndex = certificateImages.length - 1;
    if (currentCertificateIndex >= certificateImages.length) currentCertificateIndex = 0;
    var cert = certificateImages[currentCertificateIndex];
    document.getElementById('modalImage').src = cert.src;
    document.getElementById('modalImage').alt = cert.alt;
}

// PDF Modal
function openPdfModal(url, title) {
    document.getElementById('pdfModalTitle').textContent = title;
    document.getElementById('pdfViewer').src = url;
    document.getElementById('pdfDownloadBtn').href = url;
    document.getElementById('pdfModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closePdfModal() {
    document.getElementById('pdfModal').style.display = 'none';
    document.getElementById('pdfViewer').src = '';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeCertificateModal();
        closePdfModal();
    }
    if (e.key === 'ArrowLeft') navigateCertificate(-1);
    if (e.key === 'ArrowRight') navigateCertificate(1);
});
</script>

<?php include '../app/views/layout/footer.php'; ?>

<script>
// Video Modal — runs after footer loads jQuery
$('#videoModal').on('show.bs.modal', function(e) {
    var src = $(e.relatedTarget).data('src');
    if (src) $('#aboutVideoIframe').attr('src', src + '?autoplay=1');
});
$('#videoModal').on('hidden.bs.modal', function() {
    $('#aboutVideoIframe').attr('src', '');
});

// Impact stats counter animation
(function() {
    var started = false;

    function animateCounters() {
        if (started) return;
        started = true;
        document.querySelectorAll('.abt-counter-num').forEach(function(el) {
            var target = parseInt(el.getAttribute('data-target'));
            var duration = 2000;
            var startTime = null;

            function step(ts) {
                if (!startTime) startTime = ts;
                var progress = Math.min((ts - startTime) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.floor(eased * target) + '+';
                if (progress < 1) requestAnimationFrame(step);
                else el.textContent = target + '+';
            }
            requestAnimationFrame(step);
        });
    }
    var el = document.querySelector('.abt-counter-num');
    if (el) {
        new IntersectionObserver(function(entries, obs) {
            if (entries[0].isIntersecting) {
                animateCounters();
                obs.disconnect();
            }
        }, {
            threshold: 0.3
        }).observe(el);
    }
})();
</script>