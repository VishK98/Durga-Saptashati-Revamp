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

<!-- Quick Navigation -->
<nav class="about-quick-nav" id="aboutQuickNav">
    <div class="container-fluid">
        <ul class="quick-nav-list">
            <li><a href="#about-foundation" class="active"><i class="fas fa-info-circle"></i><span>About</span></a></li>
            <li><a href="#vision-mission"><i class="fas fa-eye"></i><span>Vision & Mission</span></a></li>
            <li><a href="#leadership"><i class="fas fa-users"></i><span>Leadership</span></a></li>
            <li><a href="#achievements"><i class="fas fa-award"></i><span>Achievements</span></a></li>
            <li><a href="#investors"><i class="fas fa-chart-line"></i><span>Transparency</span></a></li>
        </ul>
    </div>
</nav>

<!-- ============================================ -->
<!-- SECTION 1: About the Foundation              -->
<!-- ============================================ -->
<section id="about-foundation" class="abt-section">
    <div class="container py-4">
        <div class="row" style="align-items:stretch;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100"
                    style="border-radius:12px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.12);">
                    <img src="<?= asset('img/about.jpg') ?>" alt="About Durga Saptashati"
                        style="width:100%;height:100%;object-fit:cover;display:block;">
                    <a class="position-absolute d-flex align-items-center justify-content-center" href=""
                        data-toggle="modal" data-target="#videoModal"
                        style="top:0;left:0;right:0;bottom:0;background:linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.1));">
                        <div style="width:70px;height:70px;border-radius:50%;background:rgba(242,101,34,0.9);display:flex;align-items:center;justify-content:center;transition:all 0.3s;box-shadow:0 5px 25px rgba(242,101,34,0.4);"
                            onmouseover="this.style.transform='scale(1.1)';this.style.background='#f26522'"
                            onmouseout="this.style.transform='scale(1)';this.style.background='rgba(242,101,34,0.9)'">
                            <i class="fa fa-play text-white" style="font-size:1.5rem;margin-left:4px;"></i>
                        </div>
                    </a>
                    <div class="position-absolute" style="bottom:20px;left:20px;right:20px;">
                        <div
                            style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:10px;padding:15px 20px;display:flex;align-items:center;gap:20px;">
                            <div style="text-align:center;border-right:1px solid #eee;padding-right:20px;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;">10+</h4>
                                <small style="color:#666;font-size:0.75rem;">Years of Service</small>
                            </div>
                            <div style="text-align:center;border-right:1px solid #eee;padding-right:20px;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;">5K+</h4>
                                <small style="color:#666;font-size:0.75rem;">Lives Impacted</small>
                            </div>
                            <div style="text-align:center;">
                                <h4 style="color:#f26522;font-weight:700;margin:0;">100+</h4>
                                <small style="color:#666;font-size:0.75rem;">Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column" data-aos="fade-left" data-aos-duration="1000">
                <div style="padding-top:0;">
                    <h6 class="text-uppercase mb-2"
                        style="color:#f26522;letter-spacing:3px;font-weight:600;font-size:0.85rem;">About Us</h6>
                    <h2 style="color:#1a1b2e;font-weight:700;margin-bottom:20px;">Our Commitment <span
                            style="color:#f26522;">to Community!</span></h2>
                </div>
                <div>
                    <!-- Tab Navigation -->
                    <div style="display:flex;gap:0;margin-bottom:25px;border-bottom:2px solid #eee;">
                        <button class="about-tab-btn active" onclick="switchAboutTab(this, 'about')"
                            style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#1a1b2e;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid #f26522;margin-bottom:-2px;">
                            <i class="fas fa-info-circle mr-1" style="color:#f26522;"></i> About
                        </button>
                        <button class="about-tab-btn" onclick="switchAboutTab(this, 'mission')"
                            style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#999;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid transparent;margin-bottom:-2px;">
                            <i class="fas fa-bullseye mr-1"></i> Mission
                        </button>
                        <button class="about-tab-btn" onclick="switchAboutTab(this, 'vision')"
                            style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#999;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid transparent;margin-bottom:-2px;">
                            <i class="fas fa-eye mr-1"></i> Vision
                        </button>
                    </div>

                    <!-- Tab Content -->
                    <div id="about-tab-about" class="about-tab-content" style="display:block;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Durga Saptashati NGO in Dwarka, Delhi,
                            is the brainchild of a visionary and empathetic leader, <strong
                                style="color:#1a1b2e;">Sandhya Singh</strong>. Saptashati Foundation is a trusted
                            charity organisation in Delhi working for the empowerment of women (from all walks of life),
                            deprived children, senior citizens, and people with disabilities.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We are confident that giving a voice
                            to the marginalised will create a more equal and just society. Our approaches are mainly
                            grassroots initiatives because our founder, <strong style="color:#1a1b2e;">Sandhya
                                Singh</strong>, strongly believes in the lasting impact of working from the ground up.
                        </p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">From gender equality to social
                            justice, we are dismantling barriers, challenging stereotypes, and trying to create a more
                            inclusive society. Our dedicated team of volunteers and members work closely with rural and
                            urban communities on various issues to bring about meaningful and lasting change.</p>
                    </div>
                    <div id="about-tab-mission" class="about-tab-content" style="display:none;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Our mission is to work tirelessly for
                            the empowerment of women from all walks of life, the upliftment of deprived children through
                            education and care, the well-being of senior citizens, and the support of people with
                            disabilities.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We aim to create lasting change
                            through grassroots initiatives, skill development, awareness campaigns, and community-driven
                            programs across Delhi. We provide free self-defence classes, judicial protection aid, and
                            arrange skill development workshops to equip women with the knowledge and expertise they
                            need.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Through our education initiatives, we
                            help EWS children in Dwarka get admission to schools, organise after-school tuition classes,
                            and distribute school supplies to remove barriers to learning.</p>
                        <div style="display:flex;gap:15px;margin-top:15px;">
                            <div
                                style="flex:1;padding:12px;background:rgba(242,101,34,0.06);border-radius:8px;border-left:3px solid #f26522;">
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Women Empowerment</strong>
                                <p style="margin:5px 0 0;font-size:0.8rem;color:#888;">Self-defence, skill development &
                                    awareness</p>
                            </div>
                            <div
                                style="flex:1;padding:12px;background:rgba(242,101,34,0.06);border-radius:8px;border-left:3px solid #f26522;">
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Education For All</strong>
                                <p style="margin:5px 0 0;font-size:0.8rem;color:#888;">EWS admissions, tuition & school
                                    supplies</p>
                            </div>
                        </div>
                    </div>
                    <div id="about-tab-vision" class="about-tab-content" style="display:none;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Our vision is to build a more equal
                            and just society where every individual, regardless of their gender, age, or ability, has
                            access to opportunities, safety, and dignity.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We envision communities where women
                            are empowered, children are educated, the elderly are cared for, and every voice is heard
                            and valued. We strive to be the voice of the voiceless and bring positive change that leads
                            to happiness, independence, and a sense of respect in whatever they are doing.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Every change on the planet starts with
                            a new phase of consciousness, a new experience, and a new vision. We are committed to being
                            that catalyst for transformation in our society.</p>
                        <div style="display:flex;gap:15px;margin-top:15px;">
                            <div style="text-align:center;flex:1;">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-balance-scale" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Equality</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-hand-holding-heart" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Empathy</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-graduation-cap" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Education</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div
                                    style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-fist-raised" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Empowerment</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- SECTION 2: Vision & Mission                  -->
<!-- ============================================ -->
<section id="vision-mission" class="abt-section">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center">
                <i class="fas fa-bullseye"></i>
                <span>Our Purpose</span>
            </div>
            <h2 class="abt-section-title">Vision & Mission</h2>
            <p class="abt-section-subtitle">Guiding principles that drive every initiative we undertake</p>
        </div>

        <!-- Mission Content -->
        <div class="abt-mission-block" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="abt-mission-text">
                        <h3>Our <span class="abt-highlight">Mission</span> in Action</h3>
                        <p>Widowed women, handicapped people, disabled people, have to struggle for their rights and are
                            frequently
                            victims of discrimination. At Saptashati Foundation, our team works towards empowering the
                            widowed women
                            of our Indian society and, we ensure that we reach every corner of India to uplift these
                            widowed from
                            their distressed state.</p>
                    </div>
                    <div class="row mt-4">
                        <?php
                        $focusAreas = [
                            ['icon' => 'fa-female', 'title' => "Women's Empowerment", 'desc' => 'Supporting widowed women and single mothers'],
                            ['icon' => 'fa-wheelchair', 'title' => 'Disability Support', 'desc' => 'Comprehensive care for disabled individuals'],
                            ['icon' => 'fa-user-friends', 'title' => 'Senior Care', 'desc' => 'Dignified support for elderly citizens'],
                        ];
                        foreach ($focusAreas as $area):
                            ?>
                        <div class="col-md-4 mb-3">
                            <div class="abt-focus-card">
                                <div class="abt-focus-icon"><i class="fas <?= $area['icon'] ?>"></i></div>
                                <strong><?= $area['title'] ?></strong>
                                <p><?= $area['desc'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="abt-mission-stats-grid">
                        <div class="abt-ms-item"><span class="abt-ms-num">15+</span><span class="abt-ms-label">Years
                                Experience</span></div>
                        <div class="abt-ms-item"><span class="abt-ms-num">100K+</span><span class="abt-ms-label">Lives
                                Touched</span></div>
                        <div class="abt-ms-item"><span class="abt-ms-num">15</span><span class="abt-ms-label">States
                                Covered</span></div>
                        <div class="abt-ms-item"><span class="abt-ms-num">500+</span><span class="abt-ms-label">Programs
                                Run</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Founder's Words -->
        <div class="abt-founder" data-aos="fade-up">
            <div class="abt-founder-glow"></div>
            <div class="row align-items-center">
                <div class="col-lg-3 text-center" data-aos="zoom-in">
                    <div class="abt-founder-photo">
                        <img src="<?= asset('img/team-1.jpg') ?>" alt="Sandhya Singh - Founder">
                    </div>
                    <h5 class="abt-founder-name">Sandhya Singh</h5>
                    <span class="abt-founder-title">Founder</span>
                </div>
                <div class="col-lg-9" data-aos="fade-left" data-aos-delay="150">
                    <div class="abt-founder-message">
                        <i class="fas fa-quote-left abt-quote-icon"></i>
                        <p>Every child deserves the right to education, every woman deserves the strength to stand on
                            her own, and every elder deserves to live with dignity. Durga Saptashati was born from this
                            simple belief — that when we uplift the most vulnerable among us, we uplift all of humanity.
                        </p>
                        <p>Our journey began in the lanes of Dwarka, Delhi, with just a handful of volunteers and an
                            unshakable resolve. Today, we continue to work at the grassroots level because lasting
                            change starts from the ground up. I invite you to join us in this mission of compassion and
                            service.</p>
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
                ['img' => 'https://randomuser.me/api/portraits/men/32.jpg', 'name' => 'Dr. Rajesh Kumar', 'role' => 'Founder & Chairman', 'bio' => 'Visionary leader with 25+ years of experience in social development and community initiatives.', 'stats' => ['25+ Yrs', '100+ Projects', '50K+ Uplifted']],
                ['img' => 'https://randomuser.me/api/portraits/women/44.jpg', 'name' => 'Mrs. Priya Sharma', 'role' => 'Co-Founder & President', 'bio' => 'Passionate advocate for women\'s empowerment and education with expertise in management.', 'stats' => ['20+ Yrs', '75+ Programs', '30K+ Empowered']],
                ['img' => 'https://randomuser.me/api/portraits/men/46.jpg', 'name' => 'Mr. Amit Patel', 'role' => 'Executive Director', 'bio' => 'Strategic thinker with a proven track record in scaling non-profit operations and impact.', 'stats' => ['15+ Yrs', '10 States', '200+ Partners']],
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
                    <div class="abt-leader-stats">
                        <?php foreach ($leader['stats'] as $stat): ?>
                        <span><?= $stat ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION 5: Achievements                      -->
<!-- ============================================ -->
<section id="achievements" class="abt-section">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center">
                <i class="fas fa-trophy"></i>
                <span>Our Milestones</span>
            </div>
            <h2 class="abt-section-title">Achievements & Recognition</h2>
            <p class="abt-section-subtitle">Awards and milestones that validate our commitment to service</p>
        </div>

        <!-- Main Achievement -->
        <div class="abt-featured-award" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="abt-award-img">
                        <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&h=400&fit=crop"
                            alt="Major Achievement">
                        <div class="abt-award-badge">
                            <i class="fas fa-medal"></i>
                            <span>2023</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="abt-award-content">
                        <h3>Excellence in Community Service Award</h3>
                        <p>Recognized by the State Government for our outstanding contribution to women empowerment,
                            child education, skill development, and community welfare across 50+ villages in rural
                            India.</p>
                        <div class="abt-award-details">
                            <div class="abt-award-detail"><i class="fas fa-users"></i><span>2000+ Women Empowered</span>
                            </div>
                            <div class="abt-award-detail"><i class="fas fa-graduation-cap"></i><span>1000+ Scholarships
                                    Awarded</span></div>
                            <div class="abt-award-detail"><i class="fas fa-heartbeat"></i><span>200+ Medical Camps
                                    Organized</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Achievement Cards -->
        <div class="row mt-5">
            <?php
            $achievements = [
                ['img' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=400&h=250&fit=crop', 'title' => 'Best NGO for Women Empowerment', 'org' => 'Regional Social Welfare Board', 'year' => '2022'],
                ['img' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&h=250&fit=crop', 'title' => 'Innovation in Social Impact', 'org' => 'National NGO Excellence Awards', 'year' => '2021'],
                ['img' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400&h=250&fit=crop', 'title' => 'Outstanding Partnership Initiative', 'org' => 'Corporate Social Responsibility Board', 'year' => '2020'],
            ];
            foreach ($achievements as $i => $ach):
                ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="abt-achievement-card">
                    <div class="abt-ach-img">
                        <img src="<?= $ach['img'] ?>" alt="<?= $ach['title'] ?>">
                        <span class="abt-ach-year"><?= $ach['year'] ?></span>
                    </div>
                    <div class="abt-ach-body">
                        <h5><?= $ach['title'] ?></h5>
                        <p><?= $ach['org'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Certificates Gallery -->
        <div class="abt-section-header text-center mt-5" data-aos="fade-up">
            <h3 class="abt-section-title" style="font-size:1.6rem;">Wall of Recognition</h3>
            <p class="abt-section-subtitle">Certificates, awards, and acknowledgments</p>
        </div>
        <div class="row">
            <?php
            $certificates = [
                ['img' => 'https://images.unsplash.com/photo-1551836022-8b2858c9c69b?w=600&h=400&fit=crop', 'title' => 'Government Recognition Certificate'],
                ['img' => 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=600&h=400&fit=crop', 'title' => 'Excellence in Social Service'],
                ['img' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=400&fit=crop', 'title' => 'Community Development Award'],
                ['img' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=600&h=400&fit=crop', 'title' => 'Women Empowerment Recognition'],
                ['img' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600&h=400&fit=crop', 'title' => 'Outstanding Leadership Award'],
                ['img' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=600&h=400&fit=crop', 'title' => 'Best NGO Partnership Initiative'],
            ];
            foreach ($certificates as $i => $cert):
                ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= ($i + 1) * 80 ?>">
                <div class="abt-cert-card" onclick="openCertificateModal(this)">
                    <div class="abt-cert-img">
                        <img src="<?= $cert['img'] ?>" alt="<?= $cert['title'] ?>">
                        <div class="abt-cert-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <h6><?= $cert['title'] ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTION 6: Our Investors / Transparency      -->
<!-- ============================================ -->
<section id="investors" class="abt-section abt-section--dark">
    <div class="container-fluid">
        <div class="abt-section-header text-center" data-aos="fade-up">
            <div class="abt-section-label abt-section-label--center abt-section-label--light">
                <i class="fas fa-shield-alt"></i>
                <span>Transparency</span>
            </div>
            <h2 class="abt-section-title" style="color:#fff;">Our Investors & Financial Reports</h2>
            <p class="abt-section-subtitle" style="color:rgba(255,255,255,0.7);">We believe in complete transparency.
                View and download our audited financial reports.</p>
        </div>

        <div class="row justify-content-center mb-5">
            <?php
            $reports = [
                ['title' => 'Financials AY. 2021-22', 'file' => 'DSF - Audit Report 21-22.pdf', 'icon' => 'fa-file-pdf'],
                ['title' => 'Financials AY. 2022-23', 'file' => 'DSF - Audit Report 22-23.pdf', 'icon' => 'fa-file-invoice-dollar'],
                ['title' => 'Financials AY. 2023-24', 'file' => 'DSF - Audit Report 23-24.pdf', 'icon' => 'fa-balance-scale'],
                ['title' => 'Financials AY. 2024-25', 'file' => 'DSF - Audit Report 24-25.pdf', 'icon' => 'fa-receipt'],
            ];
            foreach ($reports as $i => $report):
                ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="abt-report-card"
                    onclick="openPdfModal('<?= url('assets/reports/' . rawurlencode($report['file'])) ?>', '<?= addslashes($report['title']) ?>')">
                    <div class="abt-report-icon">
                        <i class="fas <?= $report['icon'] ?>"></i>
                    </div>
                    <h5><?= htmlspecialchars($report['title']) ?></h5>
                    <p>Audit Report</p>
                    <span class="abt-report-link"><i class="fas fa-eye"></i> View PDF</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Impact Distribution -->
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="abt-invest-content">
                    <h3>Transforming Lives Through Strategic Investment</h3>
                    <p>Every investment creates a ripple effect of positive change, touching thousands of lives
                        and building sustainable communities for future generations.</p>
                    <div class="row mt-3">
                        <?php
                        $metrics = [
                            ['icon' => 'fa-graduation-cap', 'title' => 'Education', 'desc' => '50+ students educated'],
                            ['icon' => 'fa-heartbeat', 'title' => 'Healthcare', 'desc' => '100+ lives impacted'],
                            ['icon' => 'fa-home', 'title' => 'Livelihood', 'desc' => '10+ jobs created'],
                            ['icon' => 'fa-seedling', 'title' => 'Environment', 'desc' => '500+ trees planted'],
                        ];
                        foreach ($metrics as $m):
                            ?>
                        <div class="col-6 mb-3">
                            <div class="abt-metric-card">
                                <i class="fas <?= $m['icon'] ?>"></i>
                                <strong><?= $m['title'] ?></strong>
                                <small><?= $m['desc'] ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="abt-chart-box">
                    <h4>Impact Distribution</h4>
                    <p class="abt-chart-subtitle">How we transform communities</p>
                    <?php
                    $progressItems = [
                        ['label' => 'Education', 'value' => '30%', 'color' => '#f26522'],
                        ['label' => 'Healthcare', 'value' => '25%', 'color' => '#c94a0f'],
                        ['label' => 'Livelihood', 'value' => '20%', 'color' => '#ff8c42'],
                        ['label' => 'Environment', 'value' => '15%', 'color' => '#2d6a4f'],
                        ['label' => 'Women Empowerment', 'value' => '10%', 'color' => '#8b5cf6'],
                    ];
                    foreach ($progressItems as $item):
                        ?>
                    <div class="abt-progress-row">
                        <div class="abt-progress-labels">
                            <span><?= $item['label'] ?></span>
                            <span><?= $item['value'] ?></span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar abt-progress-fill" role="progressbar"
                                style="width: 0%; background: <?= $item['color'] ?>;"
                                data-width="<?= $item['value'] ?>"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Modal -->
<div id="certificateModal" class="abt-modal" onclick="closeCertificateModal()">
    <div class="abt-modal-body" onclick="event.stopPropagation()">
        <button class="abt-modal-close" onclick="closeCertificateModal()">&times;</button>
        <img id="modalImage" src="" alt="">
        <div class="abt-modal-nav">
            <button onclick="navigateCertificate(-1)"><i class="fas fa-chevron-left"></i></button>
            <button onclick="navigateCertificate(1)"><i class="fas fa-chevron-right"></i></button>
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