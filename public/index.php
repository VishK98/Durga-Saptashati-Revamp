<?php
require_once '../app/config/config.php';

$pageTitle = "Home - " . APP_NAME;
$pageDescription = "Durga Saptashati Foundation - Empowerment, Education, Equality, Empathy. A trusted charity organisation in Delhi working for the empowerment of women, deprived children, senior citizens, and people with disabilities.";

include '../app/views/layout/header.php';
?>


<!-- Carousel Start -->
<div class="carousel" data-aos="fade" data-aos-duration="1500">
    <div class="container-fluid">
        <div class="owl-carousel owl-theme">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel.webp'); ?>" alt="Durga Saptashati Foundation">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Durga Saptashati Foundation
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000"
                        style="letter-spacing: 2px; font-size: 1.1rem;">
                        Empowerment || Education || Equality || Empathy
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('make-donation.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom" href="<?php echo url('become-volunteer.php'); ?>">Join Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('images/banner/banner-3.jpeg'); ?>" alt="Our Commitment to Community">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Our Commitment to Community!
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        A trusted charity organisation in Delhi working for the empowerment of women, deprived children,
                        senior citizens, and people with disabilities.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('about.php'); ?>">Learn More</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/-VtO2d-zJ4k" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('images/banner/banner.jpg'); ?>" alt="Gender Equality to Social Justice">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">From Gender Equality to Social
                        Justice</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        We are dismantling barriers, challenging stereotypes, and creating a more inclusive society
                        through grassroots initiatives.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('make-donation.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom" href="<?php echo url('contact.php'); ?>">Get Involved</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('images/banner/banner-1.jpg'); ?>"
                        alt="Gender Equality to Social Justice">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">From Gender Equality to Social
                        Justice</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        We are dismantling barriers, challenging stereotypes, and creating a more inclusive society
                        through grassroots initiatives.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('make-donation.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom" href="<?php echo url('contact.php'); ?>">Get Involved</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('images/banner/banner-4.webp'); ?>"
                        alt="Gender Equality to Social Justice">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">From Gender Equality to Social
                        Justice</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        We are dismantling barriers, challenging stereotypes, and creating a more inclusive society
                        through grassroots initiatives.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('make-donation.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom" href="<?php echo url('contact.php'); ?>">Get Involved</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Video Modal Start -->
<!-- Video Modal moved below about section -->

<!-- About Section Start -->
<div class="container-fluid" id="about">
    <div class="container py-4">
        <div class="row" style="align-items:stretch;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100"
                    style="border-radius:12px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.12);">
                    <img src="<?php echo asset('images/about-us-durga.jpeg') ?>" alt="About Durga Saptashati"
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
                    <div class="home-stats-overlay">
                        <div class="home-stats-bar">
                            <div class="home-stat-item">
                                <h4>10+</h4>
                                <small>Years of Service</small>
                            </div>
                            <div class="home-stat-item">
                                <h4>5K+</h4>
                                <small>Lives Impacted</small>
                            </div>
                            <div class="home-stat-item home-stat-last">
                                <h4>100+</h4>
                                <small>Volunteers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="home-foundation-name">Durga Saptashati Foundation</h2>
                <p class="home-tagline">
                    <span>Empowerment</span><span>Education</span><span>Equality</span><span>Empathy</span>
                </p>

                <h2 class="home-commitment-title">Our Commitment <span>to Community!</span></h2>

                <p class="home-about-desc">Durga Saptashati NGO in Dwarka, Delhi, is the brainchild of a visionary and
                    empathetic leader, <strong>Sandhya Singh</strong>. Saptashati Foundation is a trusted charity
                    organisation in Delhi working for the empowerment of women (from all walks of life), deprived
                    children, senior citizens, and people with disabilities. We are confident that giving a voice to the
                    marginalised will create a more equal and just society. Our approaches are mainly grassroots
                    initiatives because our founder, <strong>Sandhya Singh</strong>, strongly believes in the lasting
                    impact of working from the ground up.</p>

                <div class="home-quote-box">
                    <p>From gender equality to social justice, we are dismantling barriers, challenging stereotypes, and
                        trying to create a more inclusive society!</p>
                </div>

                <div>
                    <a href="<?php echo url('about.php') ?>" class="home-learn-more-btn">Learn More <i
                            class="fa fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background:transparent;border:none;">
            <div class="modal-body p-0">
                <button type="button" class="close text-white mb-2" data-dismiss="modal" aria-label="Close"
                    style="opacity:1;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sanskrit Quote Section Start -->
<div class="sanskrit-section "
    style="background: url('<?php echo asset('images/ancient-prayer.jpeg') ?>') center center/cover no-repeat fixed;">
    <div class="container p-lg-5 position-relative text-center" data-aos="zoom-in" data-aos-duration="1000">
        <p class="sanskrit-text mb-3">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामया।</p>
        <p class="sanskrit-translation mb-4">"May all beings be happy, May all beings be free from illness"</p>
        <div style="width:60px;height:3px;background:#f26522;margin:0 auto 20px;"></div>
        <p class="text-white" style="max-width:700px;margin:0 auto;font-size:1.05rem;opacity:0.85;">This ancient prayer
            guides our actions with love, compassion, equality, and empathy in everything we do.</p>
    </div>
</div>
<!-- Sanskrit Quote Section End -->

<!-- Facts/Counter Section Start -->
<div class="container-fluid" style="background:#1a1b2e;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="100">
                <div style="padding:20px;">
                    <i class="fa fa-heart fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="25">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Happy Donators</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="200">
                <div style="padding:20px;">
                    <i class="fa fa-check-circle fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="10">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Success Mission</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="300">
                <div style="padding:20px;">
                    <i class="fa fa-users fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="100">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Volunteer Reached</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                <div style="padding:20px;">
                    <i class="fa fa-globe fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="5">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Globalization Work
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var countersStarted = false;

    function animateCounters() {
        if (countersStarted) return;
        countersStarted = true;
        document.querySelectorAll('.counter-num').forEach(function(el) {
            var target = parseInt(el.getAttribute('data-target'));
            var duration = 2000;
            var start = 0;
            var startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var progress = Math.min((timestamp - startTime) / duration, 1);
                var eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.floor(eased * target);
                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.textContent = target;
                }
            }
            requestAnimationFrame(step);
        });
    }
    var counterSection = document.querySelector('.counter-num');
    if (counterSection) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.3
        });
        observer.observe(counterSection.closest('.container-fluid'));
    }
})();
</script>
<!-- Facts/Counter Section End -->

<!-- Events Section Start -->
<div class="container-fluid py-4" style="background:#fff;">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">What's Happening
            </h6>
            <h1 style="color:#1a1b2e;">Upcoming & Past <span style="color:#f26522;">Events</span></h1>
        </div>
        <div class="row" style="row-gap:30px;">
            <?php
            $homeEvents = [
                ['title' => 'Durga Award Ceremony', 'icon' => 'fa-trophy', 'url' => 'durga-award.php', 'img' => 'durga-award/durga-award.jpeg', 'desc' => 'Honouring exceptional individuals and organisations making outstanding contributions to social welfare and community development.', 'tag' => 'Award'],
                ['title' => 'International Yoga Day', 'icon' => 'fa-spa', 'url' => 'yoga-day.php', 'img' => 'yoga-day/yoga.jpeg', 'desc' => 'Celebrating the transformative power of yoga through mass sessions, mindfulness workshops, and community wellness programs.', 'tag' => 'Wellness'],
                ['title' => 'Ganpati Celebration', 'icon' => 'fa-pray', 'url' => 'ganpati-celebration.php', 'img' => 'ganpati/ganpati.jpeg', 'desc' => 'Celebrating the auspicious festival of Ganesh Chaturthi with devotion, cultural performances, and community gatherings.', 'tag' => 'Festival'],
            ];
            foreach ($homeEvents as $i => $event): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <a href="<?= url($event['url']) ?>"
                    style="text-decoration:none;display:block;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.06);transition:all 0.4s;height:100%;border:1px solid rgba(0,0,0,0.05);"
                    onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 18px 45px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 15px rgba(0,0,0,0.06)'">
                    <div style="position:relative;overflow:hidden;height:240px;">
                        <img src="<?= url('assets/images/' . $event['img']) ?>"
                            alt="<?= htmlspecialchars($event['title']) ?>"
                            style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 0.5s;"
                            onmouseover="this.style.transform='scale(1.06)'"
                            onmouseout="this.style.transform='scale(1)'">
                        <span
                            style="position:absolute;top:16px;left:16px;background:#f26522;color:#fff;padding:6px 16px;border-radius:25px;font-size:0.75rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;box-shadow:0 4px 12px rgba(242,101,34,0.3);">
                            <i class="fas <?= $event['icon'] ?>" style="font-size:0.7rem;"></i> <?= $event['tag'] ?>
                        </span>
                    </div>
                    <div style="padding:24px 24px 28px;">
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1.15rem;margin:0 0 12px;line-height:1.3;">
                            <?= htmlspecialchars($event['title']) ?>
                        </h5>
                        <p style="color:#666;font-size:0.88rem;line-height:1.7;margin:0;">
                            <?= htmlspecialchars($event['desc']) ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="<?= url('event.php') ?>"
                style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:12px 30px;border-radius:50px;font-size:0.9rem;font-weight:600;text-decoration:none;transition:all 0.3s;box-shadow:0 6px 20px rgba(242,101,34,0.25);"
                onmouseover="this.style.background='#d4541a';this.style.transform='translateY(-2px)'"
                onmouseout="this.style.background='#f26522';this.style.transform='translateY(0)'">
                View All Events <i class="fas fa-arrow-right" style="font-size:0.8rem;"></i>
            </a>
        </div>
    </div>
</div>
<!-- Events Section End -->

<!-- Volunteer / Join Us Section Start -->
<div class="container-fluid"
    style="background:url('<?php echo asset('images/volunteer.jpeg') ?>') center center/cover no-repeat fixed;position:relative;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(242,101,34,0.9);"></div>
    <div class="container py-5 position-relative text-center" style="z-index:1;">
        <div class="py-5" data-aos="zoom-in">
            <h6 class="text-uppercase text-white mb-3" style="letter-spacing:3px;">Make a Difference</h6>
            <h1 class="display-4 text-white mb-3 font-weight-bold">Want to Join Us?</h1>
            <h4 class="text-white mb-4" style="opacity:0.9;">Become a Proud Volunteer</h4>
            <p class="text-white mx-auto mb-4" style="max-width:600px;opacity:0.9;">Join our community of dedicated
                volunteers and help us create lasting change in the lives of women, children, senior citizens, and
                people with disabilities.</p>
            <a href="<?php echo url('become-volunteer.php') ?>" class="btn btn-lg px-5 py-3"
                style="background:#fff;color:#f26522;border-radius:30px;font-weight:600;">Join Now <i
                    class="fa fa-arrow-right ml-2"></i></a>
        </div>
    </div>
</div>
<!-- Volunteer / Join Us Section End -->

<!-- Membership Section Start -->
<?php
try {
    $homeMembershipPlans = $pdo->query("SELECT * FROM membership_plans WHERE is_active = 1 ORDER BY sort_order ASC")->fetchAll();
} catch (Exception $e) {
    $homeMembershipPlans = [];
}
$mshipFeatures = [
    1 => ['Membership Certificate', 'Event Invitations', 'Community Network'],
    2 => ['Membership Certificate', 'Priority Event Access', 'Community Network', 'Website Recognition'],
    3 => ['Membership Certificate', 'VIP Lifetime Access', 'Community Network', 'Website Recognition', 'Advisory Board'],
];
?>
<div class="container-fluid mship-section">
    <div class="mship-bg-pattern"></div>
    <div class="container py-4 position-relative" style="z-index:1;">
        <div class="text-center mb-4" data-aos="fade-up">
            <div class="mship-label-badge"><i class="fas fa-crown"></i> Join Our Family</div>
            <h1 class="mship-heading">Choose Your <span>Membership</span></h1>
            <p class="mship-subtext">Become a proud member and support our mission to empower communities.</p>
        </div>
        <div class="row justify-content-center mship-row">
            <?php foreach ($homeMembershipPlans as $i => $mplan):
                $planFeats = $mshipFeatures[$mplan['id']] ?? $mshipFeatures[1];
                $isFeatured = $mplan['is_best_value'];
                ?>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 150 ?>">
                <div class="mp-card<?= $isFeatured ? ' mp-featured' : '' ?>">
                    <?php if ($isFeatured): ?>
                    <div class="mp-popular"><i class="fas fa-star"></i> MOST POPULAR</div>
                    <?php endif; ?>

                    <div class="mp-header">
                        <div class="mp-icon-ring">
                            <div class="mp-icon"><i class="fas <?= htmlspecialchars($mplan['icon']) ?>"></i></div>
                        </div>
                        <h3 class="mp-name"><?= htmlspecialchars($mplan['name']) ?></h3>
                        <span class="mp-duration-tag"><i class="fas fa-clock"></i>
                            <?= htmlspecialchars($mplan['duration_label']) ?></span>
                    </div>

                    <div class="mp-price-block">
                        <span class="mp-currency">&#8377;</span>
                        <span class="mp-amount"><?= number_format($mplan['price'], 0) ?></span>
                    </div>

                    <div class="mp-divider"></div>

                    <ul class="mp-features">
                        <?php foreach ($planFeats as $feat): ?>
                        <li><span class="mp-check"><i class="fas fa-check"></i></span> <?= $feat ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?= url('become-member.php') ?>" class="mp-btn<?= $isFeatured ? ' mp-btn-glow' : '' ?>">
                        <span>Get Started</span> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-3" data-aos="fade-up" data-aos-delay="100">
            <div class="mship-trust-bar">
                <div class="mship-trust-item"><i class="fas fa-shield-alt"></i> Secure Payments</div>
                <div class="mship-trust-item"><i class="fas fa-receipt"></i> 80G Tax Benefits</div>
                <div class="mship-trust-item"><i class="fas fa-undo"></i> Easy Cancellation</div>
                <div class="mship-trust-item"><i class="fas fa-headset"></i> 24/7 Support</div>
            </div>
        </div>
    </div>
</div>

<style>
.mship-section {
    position: relative;
    background: linear-gradient(170deg, #0f1023 0%, #1a1b2e 50%, #1e1035 100%);
    overflow: hidden;
    padding: 10px 0;
}

.mship-bg-pattern {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 600px 400px at 10% 20%, rgba(242, 101, 34, 0.08) 0%, transparent 70%),
        radial-gradient(ellipse 500px 500px at 90% 80%, rgba(242, 101, 34, 0.06) 0%, transparent 70%);
    pointer-events: none;
}

.mship-label-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(242, 101, 34, 0.15), rgba(242, 101, 34, 0.05));
    border: 1px solid rgba(242, 101, 34, 0.25);
    color: #ff8c42;
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.mship-heading {
    color: #fff;
    font-weight: 800;
    font-size: 2rem;
    margin-bottom: 8px;
}

.mship-heading span {
    background: linear-gradient(135deg, #f26522, #ff8c42);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.mship-subtext {
    color: rgba(255, 255, 255, 0.55);
    max-width: 500px;
    margin: 0 auto;
    font-size: 0.9rem;
    line-height: 1.5;
}

/* Cards */
.mp-card {
    background: rgba(255, 255, 255, 0.04);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 20px;
    padding: 28px 24px 24px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.mp-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, rgba(242, 101, 34, 0.4), transparent);
    opacity: 0;
    transition: opacity 0.4s;
}

.mp-card:hover {
    transform: translateY(-8px);
    border-color: rgba(242, 101, 34, 0.25);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4), 0 0 30px rgba(242, 101, 34, 0.08);
    background: rgba(255, 255, 255, 0.07);
}

.mp-card:hover::before {
    opacity: 1;
}

/* Featured */
.mp-featured {
    background: linear-gradient(170deg, rgba(242, 101, 34, 0.1) 0%, rgba(255, 255, 255, 0.06) 30%, rgba(242, 101, 34, 0.05) 100%);
    border-color: rgba(242, 101, 34, 0.3);
    transform: scale(1.02);
    box-shadow: 0 15px 50px rgba(242, 101, 34, 0.15);
}

.mp-featured::before {
    opacity: 1;
    background: linear-gradient(90deg, #f26522, #ff8c42, #f26522);
}

.mp-featured:hover {
    transform: scale(1.02) translateY(-8px);
    box-shadow: 0 30px 70px rgba(242, 101, 34, 0.2);
}

.mp-popular {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, #f26522, #ff8c42);
    color: #fff;
    font-size: 0.6rem;
    font-weight: 800;
    padding: 4px 12px;
    border-radius: 50px;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    gap: 4px;
    box-shadow: 0 4px 15px rgba(242, 101, 34, 0.4);
    animation: mp-pulse 2s ease-in-out infinite;
}

@keyframes mp-pulse {

    0%,
    100% {
        box-shadow: 0 4px 15px rgba(242, 101, 34, 0.4);
    }

    50% {
        box-shadow: 0 4px 25px rgba(242, 101, 34, 0.6);
    }
}

/* Header */
.mp-header {
    margin-bottom: 12px;
}

.mp-icon-ring {
    position: relative;
    width: 64px;
    height: 64px;
    margin: 0 auto 12px;
}

.mp-icon-ring::before {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    border: 2px dashed rgba(242, 101, 34, 0.25);
    animation: mp-spin 20s linear infinite;
}

@keyframes mp-spin {
    to {
        transform: rotate(360deg);
    }
}

.mp-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f26522, #e05a1c);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: #fff;
    position: relative;
    z-index: 1;
    box-shadow: 0 8px 25px rgba(242, 101, 34, 0.35);
    transition: all 0.4s;
}

.mp-card:hover .mp-icon {
    transform: scale(1.08);
    box-shadow: 0 12px 35px rgba(242, 101, 34, 0.45);
}

.mp-name {
    font-weight: 800;
    color: #fff;
    font-size: 1.15rem;
    margin: 0 0 6px;
}

.mp-duration-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: rgba(242, 101, 34, 0.12);
    color: #ff8c42;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.72rem;
    font-weight: 600;
}

/* Price */
.mp-price-block {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 2px;
    margin-bottom: 8px;
}

.mp-currency {
    font-size: 1.2rem;
    font-weight: 700;
    color: #f26522;
    align-self: flex-start;
    margin-top: 6px;
}

.mp-amount {
    font-size: 2.4rem;
    font-weight: 900;
    color: #fff;
    line-height: 1;
    letter-spacing: -1px;
}

.mp-divider {
    width: 50px;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(242, 101, 34, 0.4), transparent);
    margin: 0 auto 12px;
}

/* Features */
.mp-features {
    list-style: none;
    padding: 0;
    margin: 0 0 18px;
    width: 100%;
    text-align: left;
}

.mp-features li {
    padding: 6px 0;
    font-size: 0.82rem;
    color: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
}

.mp-features li:last-child {
    border-bottom: none;
}

.mp-check {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: rgba(242, 101, 34, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.mp-check i {
    color: #f26522;
    font-size: 0.55rem;
}

/* Button */
.mp-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: transparent;
    color: #fff;
    padding: 10px 28px;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.4s;
    border: 2px solid rgba(255, 255, 255, 0.15);
    margin-top: auto;
    position: relative;
    overflow: hidden;
}

.mp-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #f26522, #ff8c42);
    opacity: 0;
    transition: opacity 0.4s;
    border-radius: 50px;
}

.mp-btn:hover {
    border-color: #f26522;
    color: #fff;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(242, 101, 34, 0.3);
}

.mp-btn:hover::before {
    opacity: 1;
}

.mp-btn i,
.mp-btn span {
    position: relative;
    z-index: 1;
}

.mp-btn-glow {
    background: linear-gradient(135deg, #f26522, #ff8c42);
    border-color: transparent;
    box-shadow: 0 8px 30px rgba(242, 101, 34, 0.35);
}

.mp-btn-glow::before {
    opacity: 1;
}

.mp-btn-glow:hover {
    box-shadow: 0 12px 40px rgba(242, 101, 34, 0.5);
}

/* Trust Bar */
.mship-trust-bar {
    display: inline-flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 50px;
    padding: 12px 30px;
    margin-top: 5px;
}

.mship-trust-item {
    display: flex;
    align-items: center;
    gap: 6px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.78rem;
    font-weight: 600;
}

.mship-trust-item i {
    color: #f26522;
    font-size: 0.85rem;
}

/* Responsive */
@media (max-width: 992px) {
    .mp-featured {
        transform: scale(1);
    }

    .mp-featured:hover {
        transform: translateY(-12px);
    }

    .mship-heading {
        font-size: 1.8rem;
    }
}

@media (max-width: 768px) {
    .mp-card {
        padding: 35px 24px 30px;
    }

    .mship-trust-bar {
        gap: 15px;
        padding: 14px 20px;
        border-radius: 16px;
    }

    .mp-amount {
        font-size: 2.4rem;
    }
}
</style>
<!-- Membership Section End -->

<!-- Our Causes Section Start -->
<div class="container-fluid py-4" style="background:#f8f9fa;">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">See Our Work</h6>
            <h1 style="color:#1a1b2e;">Our Campaign / <span style="color:#f26522;">Causes</span></h1>
        </div>
        <div class="row" style="row-gap:30px;">
            <?php
            $homeCauses = [
                ['title' => 'Women Empowerment & Safety', 'icon' => 'fa-female', 'url' => 'womens-empowerment.php', 'img' => 'womens-empowerment/womens-empowerment.webp', 'desc' => 'We provide free self-defence classes, skill development workshops, and judicial protection aid for women in Dwarka.', 'tag' => 'Empowerment'],
                ['title' => 'Hunger Reduction / Food Donation', 'icon' => 'fa-utensils', 'url' => 'no-people-hungry.php', 'img' => 'hungary/hungary.webp', 'desc' => 'We organise frequent food donation drives, health and hygiene awareness campaigns, and run a free kitchen in Dwarka.', 'tag' => 'Food Drive'],
                ['title' => 'Education For Everyone', 'icon' => 'fa-graduation-cap', 'url' => 'education-for-every-kids.php', 'img' => 'education-for/education-for.webp', 'desc' => 'Durga Saptashati NGO is committed to providing access to quality education for all underprivileged children.', 'tag' => 'Education'],
            ];
            foreach ($homeCauses as $i => $cause): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <a href="<?= url($cause['url']) ?>"
                    style="text-decoration:none;display:block;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.06);transition:all 0.4s;height:100%;border:1px solid rgba(0,0,0,0.05);"
                    onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 18px 45px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 15px rgba(0,0,0,0.06)'">
                    <div style="position:relative;overflow:hidden;height:240px;">
                        <img src="<?= url('assets/images/' . $cause['img']) ?>"
                            alt="<?= htmlspecialchars($cause['title']) ?>"
                            style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 0.5s;"
                            onmouseover="this.style.transform='scale(1.06)'"
                            onmouseout="this.style.transform='scale(1)'">
                        <span
                            style="position:absolute;top:16px;left:16px;background:#f26522;color:#fff;padding:6px 16px;border-radius:25px;font-size:0.75rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;box-shadow:0 4px 12px rgba(242,101,34,0.3);">
                            <i class="fas <?= $cause['icon'] ?>" style="font-size:0.7rem;"></i> <?= $cause['tag'] ?>
                        </span>
                    </div>
                    <div style="padding:24px 24px 28px;">
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1.15rem;margin:0 0 12px;line-height:1.3;">
                            <?= htmlspecialchars($cause['title']) ?>
                        </h5>
                        <p style="color:#666;font-size:0.88rem;line-height:1.7;margin:0;">
                            <?= htmlspecialchars($cause['desc']) ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="<?= url('causes.php') ?>"
                style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:12px 30px;border-radius:50px;font-size:0.9rem;font-weight:600;text-decoration:none;transition:all 0.3s;box-shadow:0 6px 20px rgba(242,101,34,0.25);"
                onmouseover="this.style.background='#d4541a';this.style.transform='translateY(-2px)'"
                onmouseout="this.style.background='#f26522';this.style.transform='translateY(0)'">
                View All Causes <i class="fas fa-arrow-right" style="font-size:0.8rem;"></i>
            </a>
        </div>
    </div>
</div>
<!-- Our Causes Section End -->

<!-- Activities Section Start -->
<div class="container-fluid" style="background:#fff;">
    <div class="container py-5">
        <div class="row align-items-center mb-4">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="act-label"><i class="fas fa-hands-helping"></i> How We Help</span>
                <h1 class="act-heading">Making Real <span>Impact</span> Through Action</h1>
                <p class="act-subtitle">From healthcare to hunger, our dedicated volunteers work tirelessly across
                    multiple fronts to create lasting change in communities.</p>
            </div>
            <div class="col-lg-6 text-lg-right" data-aos="fade-left">
                <div class="act-stats-row">
                    <div class="act-stat-pill">
                        <div class="act-stat-num">5K+</div>
                        <div class="act-stat-text">Lives Touched</div>
                    </div>
                    <div class="act-stat-pill">
                        <div class="act-stat-num">4</div>
                        <div class="act-stat-text">Active Programs</div>
                    </div>
                    <div class="act-stat-pill">
                        <div class="act-stat-num">10+</div>
                        <div class="act-stat-text">Years of Service</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $activities = [
            ['icon' => 'fa-first-aid', 'title' => 'Covid 19 Products', 'desc' => 'Distributing essential safety products including masks, sanitizers, and medical supplies to communities in need.', 'num' => '01', 'color' => '#e74c3c'],
            ['icon' => 'fa-hands-helping', 'title' => 'Serve People', 'desc' => 'Dedicated to serving the underprivileged through food drives, healthcare camps, and community welfare programmes.', 'num' => '02', 'color' => '#f26522'],
            ['icon' => 'fa-donate', 'title' => 'Donation', 'desc' => 'Every contribution matters. Your generous donations help us sustain our initiatives and reach more people in need.', 'num' => '03', 'color' => '#27ae60'],
            ['icon' => 'fa-people-carry', 'title' => 'Community Support', 'desc' => 'Building stronger communities through awareness campaigns, skill development, and grassroots support programmes.', 'num' => '04', 'color' => '#2980b9'],
        ];
        ?>
        <div class="row">
            <?php foreach ($activities as $i => $act): ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="act-card" style="--act-c: <?= $act['color'] ?>;">
                    <div class="act-stripe"></div>
                    <div class="act-num"><?= $act['num'] ?></div>
                    <div class="act-icon-wrap">
                        <div class="act-icon">
                            <i class="fas <?= $act['icon'] ?>"></i>
                        </div>
                    </div>
                    <h5 class="act-title"><?= $act['title'] ?></h5>
                    <p class="act-desc"><?= $act['desc'] ?></p>
                    <div class="act-bottom-line"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
/* Header */
.act-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(242, 101, 34, 0.08);
    color: #f26522;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 16px;
}

.act-heading {
    color: #1a1b2e;
    font-weight: 800;
    font-size: 2.2rem;
    line-height: 1.2;
    margin-bottom: 14px;
}

.act-heading span {
    color: #f26522;
}

.act-subtitle {
    color: #888;
    font-size: 0.95rem;
    line-height: 1.7;
    max-width: 480px;
}

/* Stats */
.act-stats-row {
    display: flex;
    gap: 14px;
    justify-content: flex-end;
    flex-wrap: wrap;
}

.act-stat-pill {
    background: linear-gradient(135deg, #1a1b2e, #2a2b45);
    border-radius: 16px;
    padding: 18px 24px;
    text-align: center;
    min-width: 110px;
    transition: transform 0.3s;
}

.act-stat-pill:hover {
    transform: translateY(-4px);
}

.act-stat-num {
    color: #f26522;
    font-size: 1.6rem;
    font-weight: 900;
    line-height: 1;
    margin-bottom: 4px;
}

.act-stat-text {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Cards */
.act-card {
    background: #fff;
    border-radius: 18px;
    padding: 0 18px 18px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    border: 1px solid #eee;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.act-stripe {
    height: 4px;
    background: var(--act-c);
    margin: 0 -28px 0;
    opacity: 0;
    transition: opacity 0.4s;
}

.act-card:hover .act-stripe {
    opacity: 1;
}

.act-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    border-color: transparent;
}

.act-num {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 3rem;
    font-weight: 900;
    color: rgba(0, 0, 0, 0.03);
    line-height: 1;
    pointer-events: none;
    transition: all 0.4s;
}

.act-card:hover .act-num {
    color: var(--act-c);
    opacity: 0.1;
}

/* Icon */
.act-icon-wrap {
    margin: 28px auto 20px;
    position: relative;
    width: 76px;
    height: 76px;
}

.act-icon-wrap::before {
    content: '';
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.02);
    transition: all 0.4s;
}

.act-card:hover .act-icon-wrap::before {
    transform: scale(1.2);
    background: color-mix(in srgb, var(--act-c) 8%, transparent);
}

.act-icon {
    width: 76px;
    height: 76px;
    border-radius: 20px;
    background: var(--act-c);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    color: #fff;
    box-shadow: 0 10px 28px color-mix(in srgb, var(--act-c) 30%, transparent);
    position: relative;
    z-index: 1;
    transition: all 0.4s;
}

.act-card:hover .act-icon {
    border-radius: 50%;
    transform: rotate(-6deg) scale(1.08);
    box-shadow: 0 14px 35px color-mix(in srgb, var(--act-c) 40%, transparent);
}

.act-title {
    font-weight: 700;
    color: #1a1b2e;
    font-size: 1.05rem;
    margin-bottom: 10px;
    transition: color 0.3s;
}

.act-card:hover .act-title {
    color: var(--act-c);
}

.act-desc {
    color: #777;
    font-size: 0.84rem;
    text margin: 0;
    text-align: start;
}

.act-bottom-line {
    width: 0;
    height: 3px;
    border-radius: 3px;
    background: var(--act-c);
    margin-top: 18px;
    transition: width 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.act-card:hover .act-bottom-line {
    width: 45px;
}

@media (max-width: 992px) {
    .act-heading {
        font-size: 1.7rem;
    }

    .act-stats-row {
        justify-content: flex-start;
    }
}

@media (max-width: 768px) {
    .act-stat-pill {
        min-width: 90px;
        padding: 14px 16px;
    }

    .act-stat-num {
        font-size: 1.3rem;
    }
}
</style>
<!-- Activities Section End -->

<!-- Donate Section Start -->
<div class="container-fluid"
    style="background:url('<?php echo asset('img/donate.jpg') ?>') center center/cover no-repeat fixed;position:relative;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(26,27,46,0.9);"></div>
    <div class="container py-5 position-relative" style="z-index:1;">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="section-title mb-4">
                    <h6 class="text-uppercase d-inline-flex align-items-center"
                        style="color:#f26522;letter-spacing:3px;font-weight:600;gap:8px;">
                        <span
                            style="width:36px;height:36px;border-radius:50%;background:rgba(242,101,34,0.15);display:inline-flex;align-items:center;justify-content:center;animation:donate-heart 1.2s ease-in-out infinite;">
                            <i class="fas fa-heart" style="font-size:0.9rem;"></i>
                        </span>
                        Make a Donation
                    </h6>
                    <style>
                    @keyframes donate-heart {

                        0%,
                        100% {
                            transform: scale(1);
                        }

                        50% {
                            transform: scale(1.2);
                        }
                    }
                    </style>
                    <h1 class="text-white">Your Small Help Can Make a <span style="color:#f26522;">Big Difference</span>
                    </h1>
                </div>
                <p class="text-white mb-4" style="opacity:0.85;line-height:1.8;">Your generosity enables us to continue
                    our mission of empowering women, educating children, and supporting the elderly and disabled. Every
                    rupee counts in creating a more equal society.</p>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">100% Transparent</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">Tax Benefits (80G)</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">Secure Payments</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">Direct Impact</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">Regular Updates</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3" style="color:#f26522;font-size:1.3rem;"></i>
                            <span class="text-white">Community Driven</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="donate-form-card">
                    <div class="donate-form-header">
                        <!-- <div class="donate-form-icon"><i class="fas fa-heart"></i></div> -->
                        <h3>Donate Now</h3>
                        <p>Every rupee makes a difference</p>
                    </div>
                    <form id="homeDonateForm" onsubmit="return false;">
                        <div class="donate-field">
                            <div class="donate-field-icon"><i class="fas fa-user"></i></div>
                            <input type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="donate-field">
                            <div class="donate-field-icon"><i class="fas fa-envelope"></i></div>
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="donate-field">
                            <div class="donate-field-icon"><i class="fas fa-phone-alt"></i></div>
                            <input type="tel" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="donate-field">
                            <div class="donate-field-icon"><i class="fas fa-rupee-sign"></i></div>
                            <input type="number" name="amount" placeholder="Amount (INR)" min="1" required>
                        </div>
                        <div class="donate-quick-amounts">
                            <span class="donate-quick"
                                onclick="this.closest('form').querySelector('[name=amount]').value=500">&#8377;500</span>
                            <span class="donate-quick"
                                onclick="this.closest('form').querySelector('[name=amount]').value=1000">&#8377;1,000</span>
                            <span class="donate-quick"
                                onclick="this.closest('form').querySelector('[name=amount]').value=2500">&#8377;2,500</span>
                            <span class="donate-quick"
                                onclick="this.closest('form').querySelector('[name=amount]').value=5000">&#8377;5,000</span>
                        </div>
                        <button type="submit" class="donate-submit" id="homeDonateBtn">
                            <i class="fas fa-heart"></i> Donate Now
                        </button>
                        <div class="donate-secure"><i class="fas fa-lock"></i> 100% Secure &amp; Encrypted Payment</div>
                    </form>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                    document.getElementById('homeDonateBtn').addEventListener('click', function() {
                        var form = document.getElementById('homeDonateForm');
                        var btn = this;
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var phone = form.querySelector('[name="phone"]').value.trim();
                        var amount = parseInt(form.querySelector('[name="amount"]').value);
                        if (!name || !email || !amount || amount <= 0) { showToast('Please fill in all required fields.', 'error'); return; }

                        var originalHTML = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

                        var fd = new FormData();
                        fd.append('action', 'create_order');
                        fd.append('amount', amount);
                        fd.append('type', 'donation');
                        fd.append('name', name);
                        fd.append('email', email);
                        fd.append('phone', phone);

                        fetch('<?= url("api/razorpay-payment.php") ?>', { method: 'POST', body: fd })
                        .then(function(r) { return r.json(); })
                        .then(function(data) {
                            if (!data.success) {
                                btn.disabled = false; btn.innerHTML = originalHTML;
                                showToast(data.message || 'Could not initiate payment.', 'error');
                                return;
                            }
                            var options = {
                                key: data.key,
                                amount: data.amount * 100,
                                currency: 'INR',
                                name: 'Durga Saptashati Foundation',
                                description: 'Donation',
                                order_id: data.order_id,
                                prefill: { name: name, email: email, contact: phone },
                                theme: { color: '#f26522' },
                                handler: function(response) {
                                    var vfd = new FormData();
                                    vfd.append('action', 'verify_payment');
                                    vfd.append('type', 'donation');
                                    vfd.append('razorpay_payment_id', response.razorpay_payment_id);
                                    vfd.append('razorpay_order_id', response.razorpay_order_id);
                                    vfd.append('razorpay_signature', response.razorpay_signature);
                                    vfd.append('name', name);
                                    vfd.append('email', email);
                                    vfd.append('phone', phone);
                                    vfd.append('amount', amount);
                                    vfd.append('message', '');

                                    fetch('<?= url("api/razorpay-payment.php") ?>', { method: 'POST', body: vfd })
                                    .then(function(r) { return r.json(); })
                                    .then(function(vdata) {
                                        btn.disabled = false; btn.innerHTML = originalHTML;
                                        if (vdata.success) {
                                            showToast(vdata.message, 'success');
                                            form.reset();
                                        } else { showToast(vdata.message, 'error'); }
                                    });
                                },
                                modal: {
                                    ondismiss: function() {
                                        btn.disabled = false; btn.innerHTML = originalHTML;
                                    }
                                }
                            };
                            var rzp = new Razorpay(options);
                            rzp.open();
                        })
                        .catch(function() {
                            btn.disabled = false; btn.innerHTML = originalHTML;
                            showToast('Network error. Please try again.', 'error');
                        });
                    });
                    </script>
                </div>
            </div>

            <style>
            .donate-form-card {
                background: #fff;
                border-radius: 20px;
                padding: 0;
                overflow: hidden;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            }

            .donate-form-header {
                background: linear-gradient(135deg, #f26522, #ff8c42);
                padding: 18px 20px 12px;
                text-align: center;
            }

            .donate-form-icon {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 12px;
                font-size: 1.2rem;
                color: #fff;
            }

            .donate-form-header h3 {
                color: #fff;
                font-weight: 800;
                font-size: 1.4rem;
                margin: 0 0 4px;
            }

            .donate-form-header p {
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.85rem;
                margin: 0;
            }

            .donate-form-card form {
                padding: 28px 30px 24px;
            }

            .donate-field {
                display: flex;
                align-items: center;
                background: #f8f9fa;
                border: 2px solid #eee;
                border-radius: 12px;
                margin-bottom: 14px;
                transition: border-color 0.3s, box-shadow 0.3s;
                overflow: hidden;
            }

            .donate-field:focus-within {
                border-color: #f26522;
                box-shadow: 0 0 0 3px rgba(242, 101, 34, 0.08);
            }

            .donate-field-icon {
                width: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #bbb;
                font-size: 0.9rem;
                flex-shrink: 0;
                transition: color 0.3s;
            }

            .donate-field:focus-within .donate-field-icon {
                color: #f26522;
            }

            .donate-field input {
                flex: 1;
                border: none;
                background: transparent;
                padding: 14px 14px 14px 0;
                font-size: 0.92rem;
                outline: none;
                color: #1a1b2e;
                font-family: inherit;
            }

            .donate-field input::placeholder {
                color: #aaa;
            }

            .donate-quick-amounts {
                display: flex;
                gap: 8px;
                margin-bottom: 18px;
            }

            .donate-quick {
                flex: 1;
                text-align: center;
                padding: 8px 0;
                border-radius: 8px;
                border: 2px solid #eee;
                font-size: 0.82rem;
                font-weight: 700;
                color: #1a1b2e;
                cursor: pointer;
                transition: all 0.3s;
                user-select: none;
            }

            .donate-quick:hover {
                border-color: #f26522;
                color: #f26522;
                background: rgba(242, 101, 34, 0.04);
            }

            .donate-submit {
                width: 100%;
                padding: 15px;
                background: linear-gradient(135deg, #f26522, #ff8c42);
                color: #fff;
                border: none;
                border-radius: 12px;
                font-size: 1.05rem;
                font-weight: 700;
                cursor: pointer;
                transition: all 0.3s;
                box-shadow: 0 8px 25px rgba(242, 101, 34, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                font-family: inherit;
            }

            .donate-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 35px rgba(242, 101, 34, 0.4);
            }

            .donate-secure {
                text-align: center;
                margin-top: 14px;
                font-size: 0.78rem;
                color: #aaa;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
            }

            .donate-secure i {
                color: #27ae60;
                font-size: 0.7rem;
            }
            </style>
        </div>
    </div>
</div>
<!-- Donate Section End -->


<!-- Blog Section Start -->
<?php
$blogStmt = $pdo->prepare("SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT 3");
$blogStmt->execute();
$latestBlogs = $blogStmt->fetchAll();
?>
<div class="container-fluid" style="background:#f8f9fa;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">From Our Blog</h6>
            <h2 style="color:#1a1b2e;font-weight:800;">Latest <span style="color:#f26522;">News & Articles</span></h2>
            <p style="color:#888;max-width:550px;margin:10px auto 0;font-size:0.92rem;">Insights, stories, and updates
                from our journey of empowering communities and transforming lives.</p>
        </div>
        <div class="row" style="display:flex;flex-wrap:wrap;">
            <?php if (empty($latestBlogs)): ?>
            <div class="col-12 text-center">
                <p style="color:#999;">No blog posts published yet.</p>
            </div>
            <?php else: ?>
            <?php $delays = [100, 200, 300];
                $idx = 0; ?>
            <?php foreach ($latestBlogs as $bp): ?>
            <div class="col-lg-4 col-md-6 mb-4 d-flex" data-aos="fade-up" data-aos-delay="<?= $delays[$idx] ?? 100 ?>">
                <a href="<?= url('blog/' . $bp['slug']) ?>" class="d-flex flex-column"
                    style="border-radius:12px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;width:100%;text-decoration:none;color:inherit;cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 25px rgba(0,0,0,0.08)'">
                    <div style="position:relative;overflow:hidden;">
                        <?php
                                $blogImg = $bp['image'] ? asset('uploads/blogs/' . $bp['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg');
                                ?>
                        <img class="w-100" src="<?= $blogImg ?>" alt="<?= htmlspecialchars($bp['title']) ?>"
                            style="height:220px;object-fit:cover;transition:transform 0.5s;"
                            onmouseover="this.style.transform='scale(1.05)'"
                            onmouseout="this.style.transform='scale(1)'">
                        <?php if (!empty($bp['category'])): ?>
                        <div
                            style="position:absolute;top:15px;left:15px;background:#f26522;color:#fff;padding:5px 14px;border-radius:20px;font-size:0.75rem;font-weight:600;">
                            <?= htmlspecialchars($bp['category']) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center mb-3" style="gap:15px;">
                            <small style="color:#999;"><i class="far fa-calendar-alt mr-1" style="color:#f26522;"></i>
                                <?= date('M d, Y', strtotime($bp['created_at'])) ?></small>
                            <small style="color:#999;"><i class="far fa-user mr-1" style="color:#f26522;"></i>
                                <?= htmlspecialchars($bp['author'] ?? 'Admin') ?></small>
                            <?php
                                    $hcStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ? AND status = 'approved'");
                                    $hcStmt->execute([$bp['id']]);
                                    $hcCount = $hcStmt->fetchColumn();
                                    ?>
                            <small style="color:#999;"><i class="far fa-comment mr-1" style="color:#f26522;"></i>
                                <?= $hcCount ?></small>
                        </div>
                        <h5 class="font-weight-bold mb-2" style="color:#1a1b2e;font-size:1.1rem;line-height:1.4;">
                            <?= htmlspecialchars($bp['title']) ?>
                        </h5>
                        <p class="flex-grow-1" style="color:#666;font-size:0.9rem;line-height:1.7;">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags($bp['content'] ?? ''), 0, 150, '...')) ?>
                        </p>
                        <span
                            style="color:#f26522;font-weight:600;font-size:0.9rem;display:inline-flex;align-items:center;">
                            Read More <i class="fa fa-long-arrow-alt-right ml-2"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php $idx++; endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Blog Section End -->


<?php include '../app/views/layout/footer.php'; ?>