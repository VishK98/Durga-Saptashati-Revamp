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
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
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
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
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
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
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
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
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
<div class="sanskrit-section"
    style="background: url('<?php echo asset('img/facts.jpg') ?>') center center/cover no-repeat fixed;">
    <div class="container position-relative text-center" data-aos="zoom-in" data-aos-duration="1000">
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
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="100">
                <div style="padding:30px;">
                    <i class="fa fa-heart fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="25">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Happy Donators</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="200">
                <div style="padding:30px;">
                    <i class="fa fa-check-circle fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="10">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Success Mission</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="300">
                <div style="padding:30px;">
                    <i class="fa fa-users fa-3x mb-3" style="color:#f26522;"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="100">0</h1>
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Volunteer Reached</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                <div style="padding:30px;">
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
    style="background:url('<?php echo asset('img/volunteer.jpg') ?>') center center/cover no-repeat fixed;position:relative;">
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
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">How We Help</h6>
            <h1 style="color:#1a1b2e;">Our <span style="color:#f26522;">Activities</span></h1>
        </div>
        <?php
        $activities = [
            ['icon' => 'fa-first-aid', 'title' => 'Covid 19 Products', 'desc' => 'Distributing essential safety products including masks, sanitizers, and medical supplies to communities in need.', 'num' => '01'],
            ['icon' => 'fa-hands-helping', 'title' => 'Serve People', 'desc' => 'Dedicated to serving the underprivileged through food drives, healthcare camps, and community welfare programmes.', 'num' => '02'],
            ['icon' => 'fa-donate', 'title' => 'Donation', 'desc' => 'Every contribution matters. Your generous donations help us sustain our initiatives and reach more people in need.', 'num' => '03'],
            ['icon' => 'fa-people-carry', 'title' => 'Community Support', 'desc' => 'Building stronger communities through awareness campaigns, skill development, and grassroots support programmes.', 'num' => '04'],
        ];
        ?>
        <div class="row">
            <?php foreach ($activities as $i => $act): ?>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <div class="act-card">
                    <div class="act-top-bar"></div>
                    <div class="act-num"><?= $act['num'] ?></div>
                    <div class="act-icon-wrap">
                        <div class="act-icon">
                            <i class="fas <?= $act['icon'] ?>"></i>
                        </div>
                    </div>
                    <h5 class="act-title"><?= $act['title'] ?></h5>
                    <p class="act-desc"><?= $act['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.act-card {
    background: #fff;
    border-radius: 18px;
    padding: 0 28px 30px;
    text-align: center;
    height: 100%;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
    transition: all 0.4s ease;
}

.act-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(242, 101, 34, 0.12);
    border-color: rgba(242, 101, 34, 0.15);
}

.act-top-bar {
    height: 4px;
    background: linear-gradient(90deg, #f26522, #ff8a50);
    border-radius: 0 0 4px 4px;
    margin: 0 -28px 0;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.act-card:hover .act-top-bar {
    opacity: 1;
}

.act-num {
    position: absolute;
    top: 14px;
    right: 18px;
    font-size: 2.5rem;
    font-weight: 900;
    color: rgba(242, 101, 34, 0.06);
    line-height: 1;
    pointer-events: none;
    transition: color 0.4s ease;
}

.act-card:hover .act-num {
    color: rgba(242, 101, 34, 0.12);
}

.act-icon-wrap {
    margin: 28px auto 20px;
    position: relative;
    width: 80px;
    height: 80px;
}

.act-icon-wrap::before {
    content: '';
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    background: rgba(242, 101, 34, 0.06);
    transition: transform 0.4s ease;
}

.act-card:hover .act-icon-wrap::before {
    transform: scale(1.15);
    background: rgba(242, 101, 34, 0.1);
}

.act-icon {
    width: 80px;
    height: 80px;
    border-radius: 22px;
    background: linear-gradient(135deg, #f26522, #ff8a50);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.7rem;
    color: #fff;
    box-shadow: 0 10px 28px rgba(242, 101, 34, 0.3);
    position: relative;
    z-index: 1;
    transition: all 0.4s ease;
}

.act-card:hover .act-icon {
    border-radius: 50%;
    transform: rotate(-8deg) scale(1.08);
    box-shadow: 0 14px 35px rgba(242, 101, 34, 0.35);
}

.act-title {
    font-weight: 700;
    color: #1a1b2e;
    font-size: 1.1rem;
    margin-bottom: 12px;
    transition: color 0.3s ease;
}

.act-card:hover .act-title {
    color: #f26522;
}

.act-desc {
    color: #777;
    font-size: 0.85rem;
    line-height: 1.75;
    margin: 0;
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
                    <h6 class="text-uppercase" style="color:#f26522;letter-spacing:3px;font-weight:600;">Make a Donation
                    </h6>
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
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="bg-white p-4 p-md-5" style="border-radius:15px;">
                    <h3 class="text-center mb-4" style="color:#1a1b2e;font-weight:700;">Donate Now</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Your Name"
                                style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 p-4" placeholder="Your Email"
                                style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <select class="form-control border-0 p-4"
                                style="background:#f8f9fa;border-radius:8px;height:auto;">
                                <option selected>Select a Cause</option>
                                <option>Women Empowerment</option>
                                <option>Hunger Reduction</option>
                                <option>Education For All</option>
                                <option>General Fund</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control border-0 p-4" placeholder="Amount (INR)"
                                style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div>
                            <button class="btn btn-block py-3" type="submit"
                                style="background:#f26522;color:#fff;border-radius:8px;font-weight:600;font-size:1.1rem;">Donate
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
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
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">From Our Blog</h6>
            <h1 style="color:#1a1b2e;">Latest <span style="color:#f26522;">News & Articles</span></h1>
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