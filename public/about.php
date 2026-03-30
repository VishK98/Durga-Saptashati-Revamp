<?php
require_once '../app/config/config.php';

$pageTitle = "About Us";
$pageDescription = "Learn about Durga Saptashati Foundation - our story, vision, mission, leadership team, achievements, and financial transparency. Empowering communities since 2010.";
$pageKeywords = "About Durga Saptashati, our mission, our vision, NGO, spiritual foundation, community service, education, healthcare, women empowerment, leadership, achievements, investors";

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
        <div class="row" style="align-items:stretch;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100"
                    style="border-radius:12px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.12);">
                    <img src="<?= asset('images/about-us-durga.jpeg') ?>" alt="About Durga Saptashati"
                        style="width:100%;height:100%;object-fit:cover;display:block;">
                    <a class="position-absolute d-flex align-items-center justify-content-center" href="#"
                        data-toggle="modal" data-target="#videoModal"
                        data-src="https://www.youtube.com/embed/-VtO2d-zJ4k" onclick="event.preventDefault();"
                        style="top:0;left:0;right:0;bottom:0;background:linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.1));">
                        <div style="width:70px;height:70px;border-radius:50%;background:rgba(242,101,34,0.9);display:flex;align-items:center;justify-content:center;transition:all 0.3s;box-shadow:0 5px 25px rgba(242,101,34,0.4);"
                            onmouseover="this.style.transform='scale(1.1)';this.style.background='#f26522'"
                            onmouseout="this.style.transform='scale(1)';this.style.background='rgba(242,101,34,0.9)'">
                            <i class="fa fa-play text-white" style="font-size:1.5rem;margin-left:4px;"></i>
                        </div>
                    </a>
                    <div class="position-absolute" style="bottom:20px;left:20px;right:20px;">
                        <div
                            style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:10px;padding:15px 20px;display:flex;align-items:center;justify-content:space-evenly;">
                            <div style="text-align:center;padding:0 15px;border-right:1px solid #eee;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;font-size:1.3rem;">10+</h4>
                                <small
                                    style="color:#666;font-size:0.7rem;text-transform:uppercase;letter-spacing:0.5px;font-weight:600;">Years
                                    of Service</small>
                            </div>
                            <div style="text-align:center;padding:0 15px;border-right:1px solid #eee;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;font-size:1.3rem;">5K+</h4>
                                <small
                                    style="color:#666;font-size:0.7rem;text-transform:uppercase;letter-spacing:0.5px;font-weight:600;">Lives
                                    Impacted</small>
                            </div>
                            <div style="text-align:center;padding:0 15px;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;font-size:1.3rem;">100+</h4>
                                <small
                                    style="color:#666;font-size:0.7rem;text-transform:uppercase;letter-spacing:0.5px;font-weight:600;">Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="text-uppercase"
                    style="color:#f26522;letter-spacing:4px;font-weight:700;font-size:clamp(1rem, 2vw, 1.35rem);margin-bottom:8px;">
                    Durga Saptashati Foundation</h2>
                <p style="color:#f26522;font-weight:600;font-size:0.75rem;margin-bottom:15px;letter-spacing:1.5px;">
                    Empowerment | Education | Equality | Empathy</p>

                <h3
                    style="color:#1a1b2e;font-weight:800;margin-bottom:20px;font-size:1.5rem;position:relative;padding-bottom:15px;">
                    Our Commitment <span
                        style="background:linear-gradient(135deg,#f26522,#ff8c42);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">to
                        Community!</span>
                    <span
                        style="position:absolute;bottom:0;left:0;width:60px;height:4px;background:linear-gradient(90deg,#f26522,#ff8c42);border-radius:2px;"></span>
                </h3>

                <p style="color:#555;line-height:1.85;font-size:0.95rem;">Durga Saptashati NGO in Dwarka, Delhi, is the
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

                <div
                    style="background:linear-gradient(135deg,rgba(242,101,34,0.08),rgba(242,101,34,0.03));border-left:4px solid #f26522;border-radius:0 12px 12px 0;padding:18px 22px;margin-bottom:25px;">
                    <p
                        style="color:#1a1b2e;line-height:1.8;font-size:0.95rem;font-weight:600;margin:0;font-style:italic;">
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
        <div class="modal-content" style="background:transparent;border:none;">
            <div class="modal-body p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="position:absolute;top:-30px;right:0;color:#fff;opacity:1;font-size:1.5rem;z-index:10;">&times;</button>
                <div class="embed-responsive embed-responsive-16by9" style="border-radius:12px;overflow:hidden;">
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
<section style="padding:70px 0;background:#fff;overflow:hidden;">
    <div class="container">
        <div class="row align-items-start">
            <!-- Left: Sticky accent card -->
            <div class="col-lg-4 mb-4" data-aos="fade-right">
                <div style="position:sticky;top:120px;">
                    <div style="background:linear-gradient(135deg,#f26522,#ff8c42);border-radius:20px;padding:35px 28px;color:#fff;box-shadow:0 15px 40px rgba(242,101,34,0.25);">
                        <i class="fas fa-bullseye" style="font-size:2.5rem;opacity:0.3;margin-bottom:15px;display:block;"></i>
                        <h3 style="font-weight:800;font-size:1.6rem;margin-bottom:12px;">Our Mission</h3>
                        <p style="opacity:0.9;line-height:1.7;font-size:0.9rem;margin-bottom:25px;">Empowering the voiceless, uplifting the vulnerable, and creating a just society through grassroots action.</p>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                            <div style="background:rgba(255,255,255,0.15);border-radius:12px;padding:14px;text-align:center;backdrop-filter:blur(6px);">
                                <strong style="font-size:1.5rem;display:block;">5+</strong>
                                <small style="font-size:0.68rem;opacity:0.85;">Years of Service</small>
                            </div>
                            <div style="background:rgba(255,255,255,0.15);border-radius:12px;padding:14px;text-align:center;backdrop-filter:blur(6px);">
                                <strong style="font-size:1.5rem;display:block;">5K+</strong>
                                <small style="font-size:0.68rem;opacity:0.85;">Lives Touched</small>
                            </div>
                            <div style="background:rgba(255,255,255,0.15);border-radius:12px;padding:14px;text-align:center;backdrop-filter:blur(6px);">
                                <strong style="font-size:1.5rem;display:block;">50+</strong>
                                <small style="font-size:0.68rem;opacity:0.85;">Programs Run</small>
                            </div>
                            <div style="background:rgba(255,255,255,0.15);border-radius:12px;padding:14px;text-align:center;backdrop-filter:blur(6px);">
                                <strong style="font-size:1.5rem;display:block;">100+</strong>
                                <small style="font-size:0.68rem;opacity:0.85;">Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Mission content -->
            <div class="col-lg-8" data-aos="fade-left">
                <p style="color:#555;line-height:1.9;font-size:0.95rem;margin-bottom:20px;">
                    Widowed women, handicapped people, disabled people, have to struggle for their rights and are frequently victims of discrimination. At Saptashati Foundation, our team works towards empowering the widowed women of our Indian society and we ensure that we reach every corner of India to uplift these widowed from their distressed state.
                </p>
                <p style="color:#555;line-height:1.9;font-size:0.95rem;margin-bottom:20px;">
                    Widowed women and their children need our support and care. Saptashati Foundation was established with the aim to inspire a sense of welfare and bring a social revolution. Our purpose is to offer financial, social, and economic security to women who have endured the grief of widowhood.
                </p>

                <div style="background:linear-gradient(135deg,rgba(242,101,34,0.06),rgba(242,101,34,0.02));border-left:4px solid #f26522;border-radius:0 14px 14px 0;padding:20px 24px;margin:25px 0;">
                    <p style="color:#1a1b2e;line-height:1.8;font-size:0.95rem;font-weight:600;margin:0;font-style:italic;">
                        Saptashati Foundation's mission is to instill knowledge and skill development in the minds of widowed and less fortunate women — thus enabling them to become self-reliant and provide them with social, financial, and psychological support for a better life.</p>
                </div>

                <div style="display:flex;gap:16px;margin-top:30px;flex-wrap:wrap;">
                    <?php
                    $focusAreas = [
                        ['icon' => 'fa-female', 'color' => '#f26522', 'title' => "Women's Empowerment", 'desc' => 'Supporting widowed women and single mothers'],
                        ['icon' => 'fa-wheelchair', 'color' => '#ff8c42', 'title' => 'Disability Support', 'desc' => 'Comprehensive care for disabled individuals'],
                        ['icon' => 'fa-user-friends', 'color' => '#c94a0f', 'title' => 'Senior Care', 'desc' => 'Dignified support for elderly citizens'],
                    ];
                    foreach ($focusAreas as $area):
                    ?>
                    <div style="flex:1;min-width:180px;background:#fff;border-radius:14px;padding:22px 18px;box-shadow:0 4px 18px rgba(0,0,0,0.06);border:1px solid rgba(0,0,0,0.04);text-align:center;transition:all 0.3s;"
                        onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 30px rgba(242,101,34,0.12)'"
                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 18px rgba(0,0,0,0.06)'">
                        <div style="width:50px;height:50px;background:<?= $area['color'] ?>;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;box-shadow:0 6px 18px <?= $area['color'] ?>33;">
                            <i class="fas <?= $area['icon'] ?>" style="color:#fff;font-size:1.1rem;"></i>
                        </div>
                        <strong style="color:#1a1b2e;font-size:0.88rem;display:block;margin-bottom:4px;"><?= $area['title'] ?></strong>
                        <small style="color:#888;font-size:0.78rem;"><?= $area['desc'] ?></small>
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
<section style="padding:70px 0;background:linear-gradient(135deg,#1a1b2e 0%,#0d0e14 100%);overflow:hidden;position:relative;">
    <div style="position:absolute;top:-50px;right:-50px;width:300px;height:300px;background:radial-gradient(circle,rgba(242,101,34,0.08),transparent 70%);border-radius:50%;"></div>
    <div style="position:absolute;bottom:-80px;left:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(242,101,34,0.05),transparent 70%);border-radius:50%;"></div>

    <div class="container position-relative" style="z-index:2;">
        <div class="text-center mb-5" data-aos="fade-up">
            <div style="display:inline-flex;align-items:center;gap:10px;background:rgba(242,101,34,0.15);border:1px solid rgba(242,101,34,0.25);color:#ff8c42;padding:8px 20px;border-radius:50px;font-size:0.82rem;font-weight:600;margin-bottom:18px;">
                <i class="fas fa-eye"></i> Our Vision
            </div>
            <h2 style="color:#fff;font-weight:800;font-size:clamp(1.8rem,3.5vw,2.4rem);">Shaping a Better <span style="color:#f26522;">Future</span></h2>
        </div>

        <div class="row" data-aos="fade-up">
            <div class="col-lg-6 mb-4">
                <p style="color:rgba(255,255,255,0.75);line-height:1.9;font-size:0.95rem;margin-bottom:18px;">
                    Our vision focuses on the welfare of handicapped people, widows, and senior citizens. In a bid to empower them with equal opportunities, we help them live independently with pride, dignity and self-respect. We work towards the economic reform of these people, and help them provide the right skillset and exposure, so they may move forward in life.
                </p>
                <p style="color:rgba(255,255,255,0.75);line-height:1.9;font-size:0.95rem;">
                    Every change on the planet starts with a new phase of consciousness, a new experience, and a new vision. We, at Durga Saptashati, create a new experience to set the motion for women's empowerment through various programs and events that we organize annually.
                </p>
            </div>
            <div class="col-lg-6 mb-4">
                <p style="color:rgba(255,255,255,0.75);line-height:1.9;font-size:0.95rem;margin-bottom:18px;">
                    Our vision is to start and promote such methods and actions where socially and economically stable women irrespective of age, class, color, or family are able to engage actively in the means of their community so that they are able to start a life of dignity and respect.
                </p>

                <div style="background:rgba(242,101,34,0.12);border:1px solid rgba(242,101,34,0.2);border-radius:14px;padding:22px 24px;margin-top:20px;">
                    <i class="fas fa-quote-left" style="color:#f26522;font-size:1.2rem;margin-bottom:10px;display:block;opacity:0.6;"></i>
                    <p style="color:#fff;line-height:1.8;font-size:0.95rem;font-weight:600;margin:0;font-style:italic;">
                        Women comprise half the population of the globe and share one percent of the resources. We are here to bring about a positive change, offering equality to rural women and widows — thus changing society's outlook as a whole.</p>
                </div>
            </div>
        </div>

        <!-- Vision pillars -->
        <div style="display:flex;gap:16px;flex-wrap:wrap;margin-top:20px;" data-aos="fade-up" data-aos-delay="200">
            <?php
            $pillars = [
                ['icon' => 'fa-balance-scale', 'title' => 'Equality', 'desc' => 'Equal opportunities for all'],
                ['icon' => 'fa-hand-holding-heart', 'title' => 'Dignity', 'desc' => 'Living with pride & respect'],
                ['icon' => 'fa-fist-raised', 'title' => 'Empowerment', 'desc' => 'Self-reliance & independence'],
                ['icon' => 'fa-shield-alt', 'title' => 'Protection', 'desc' => 'Against harassment & trafficking'],
            ];
            foreach ($pillars as $p):
            ?>
            <div style="flex:1;min-width:200px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:14px;padding:22px 18px;text-align:center;transition:all 0.3s;"
                onmouseover="this.style.background='rgba(242,101,34,0.1)';this.style.borderColor='rgba(242,101,34,0.25)';this.style.transform='translateY(-4px)'"
                onmouseout="this.style.background='rgba(255,255,255,0.04)';this.style.borderColor='rgba(255,255,255,0.08)';this.style.transform='translateY(0)'">
                <div style="width:48px;height:48px;background:rgba(242,101,34,0.15);border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                    <i class="fas <?= $p['icon'] ?>" style="color:#f26522;font-size:1.1rem;"></i>
                </div>
                <strong style="color:#fff;font-size:0.9rem;display:block;margin-bottom:4px;"><?= $p['title'] ?></strong>
                <small style="color:rgba(255,255,255,0.5);font-size:0.78rem;"><?= $p['desc'] ?></small>
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
                ['num' => '5,000+', 'label' => 'Lives Transformed', 'icon' => 'fa-users'],
                ['num' => '500+', 'label' => 'Students Educated', 'icon' => 'fa-graduation-cap'],
                ['num' => '2,000+', 'label' => 'Women Empowered', 'icon' => 'fa-female'],
                ['num' => '50+', 'label' => 'Health Camps', 'icon' => 'fa-heartbeat'],
            ];
            foreach ($impactStats as $i => $stat):
                ?>
            <div class="col-lg-3 col-md-6 col-6 mb-3" data-aos="zoom-in" data-aos-delay="<?= $i * 80 ?>">
                <div class="abt-impact-item">
                    <i class="fas <?= $stat['icon'] ?>"></i>
                    <h3><?= $stat['num'] ?></h3>
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
</script>