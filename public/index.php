<?php
require_once '../app/config/config.php';

$pageTitle = "Top NGOs In Delhi Working For Women, Kids & Senior Citizens | Saptashati";
$pageDescription = "Saptashati Foundation is a top NGO in Dwarka, Delhi working for women empowerment, child education, and senior citizen welfare. Join our mission.";
$pageKeywords = "top NGOs in Delhi, best NGO Dwarka, women empowerment NGO, child education Delhi, senior citizen welfare, Durga Saptashati Foundation, charity Delhi";

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?php echo asset('css/index.css'); ?>">

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
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" class="carousel-tagline">
                        Empowerment || Education || Equality || Empathy
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('make-donation.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom" href="<?php echo url('become-member.php'); ?>">Join Us</a>
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
                    <img src="<?php echo asset('images/banner/class-banner.jpeg'); ?>"
                        alt="Gender Equality to Social Justice">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        Empowering Young Minds Through Digital Learning
                    </h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        Our classrooms blend technology with teaching, where dedicated educators and curious students
                        learn, explore, and grow together in a modern, interactive environment.
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
        <div class="row about-row">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100 about-img-wrapper">
                    <img src="<?php echo asset('images/about-us-durga.jpeg') ?>" alt="About Durga Saptashati">
                    <a class="position-absolute d-flex align-items-center justify-content-center about-video-overlay"
                        href="#" data-toggle="modal" data-target="#videoModal"
                        data-src="https://www.youtube.com/embed/-VtO2d-zJ4k" onclick="event.preventDefault();">
                        <div class="about-play-btn">
                            <i class="fa fa-play text-white about-play-icon"></i>
                        </div>
                    </a>
                    <div class="home-stats-overlay">
                        <div class="home-stats-bar">
                            <div class="home-stat-item">
                                <h4>5+</h4>
                                <small>Years of Service</small>
                            </div>
                            <div class="home-stat-item">
                                <h4>3.5K+</h4>
                                <small>Lives Impacted</small>
                            </div>
                            <div class="home-stat-item home-stat-last">
                                <h4>40+</h4>
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
<div class="modal fade modal-transparent" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <button type="button" class="close text-white mb-2" data-dismiss="modal" aria-label="Close">
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
    style="background: url('<?php echo asset('images/ancient-prayer.jpeg') ?>') center center/cover no-repeat fixed;">
    <div class="container p-lg-5 position-relative text-center" data-aos="zoom-in" data-aos-duration="1000">
        <p class="sanskrit-text mb-3">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामया।</p>
        <p class="sanskrit-translation mb-4">"May all beings be happy, May all beings be free from illness"</p>
        <div class="sanskrit-divider"></div>
        <p class="text-white sanskrit-desc">This ancient prayer
            guides our actions with love, compassion, equality, and empathy in everything we do.</p>
    </div>
</div>
<!-- Sanskrit Quote Section End -->

<!-- Facts/Counter Section Start -->
<div class="container-fluid facts-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 col-4 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="facts-item">
                    <i class="fa fa-smile fa-3x mb-3 facts-icon"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="1000">0</h1>
                    <h6 class="text-uppercase text-white facts-label">Smiles</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-4 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="facts-item">
                    <i class="fa fa-home fa-3x mb-3 facts-icon"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="100">0</h1>
                    <h6 class="text-uppercase text-white facts-label">Happy Families</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-4 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="facts-item">
                    <i class="fa fa-lightbulb fa-3x mb-3 facts-icon"></i>
                    <h1 class="text-white mb-2 counter-num" data-target="10">0</h1>
                    <h6 class="text-uppercase text-white facts-label">Initiatives</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts/Counter Section End -->

<!-- Events Section Start -->
<div class="container-fluid py-4 events-section">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1 events-section-label">What's Happening
            </h6>
            <h1 class="events-heading">Upcoming & Past <span class="events-heading-highlight">Events</span></h1>
        </div>
        <div class="row events-row">
            <?php
            $homeEvents = [
                ['title' => 'Durga Award Ceremony', 'icon' => 'fa-trophy', 'url' => 'durga-award.php', 'img' => 'durga-award/durga-award.jpeg', 'desc' => 'Honouring exceptional individuals and organisations making outstanding contributions to social welfare and community development.', 'tag' => 'Award'],
                ['title' => 'International Yoga Day', 'icon' => 'fa-spa', 'url' => 'yoga-day.php', 'img' => 'yoga-day/yoga.jpeg', 'desc' => 'Celebrating the transformative power of yoga through mass sessions, mindfulness workshops, and community wellness programs.', 'tag' => 'Wellness'],
                ['title' => 'Saree Run', 'icon' => 'fa-running', 'url' => 'saree-run.php', 'img' => 'saree/saree-6.webp', 'desc' => 'A unique event celebrating Indian women\'s strength, culture, and fitness through a vibrant community run in sarees.', 'tag' => 'Event'],
            ];
            foreach ($homeEvents as $i => $event): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <a href="<?= url($event['url']) ?>" class="event-card-link">
                    <div class="event-card-img-wrap">
                        <img src="<?= url('assets/images/' . $event['img']) ?>"
                            alt="<?= htmlspecialchars($event['title']) ?>">
                        <span class="event-card-tag">
                            <i class="fas <?= $event['icon'] ?>"></i> <?= $event['tag'] ?>
                        </span>
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">
                            <?= htmlspecialchars($event['title']) ?>
                        </h5>
                        <p class="event-card-desc">
                            <?= htmlspecialchars($event['desc']) ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="<?= url('event.php') ?>" class="events-view-all-btn">
                View All Events <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- Events Section End -->

<!-- Volunteer / Join Us Section Start -->
<div class="container-fluid volunteer-section"
    style="background:url('<?php echo asset('images/volunteer.jpeg') ?>') center center/cover no-repeat fixed;">
    <div class="volunteer-overlay"></div>
    <div class="container py-5 position-relative text-center volunteer-content">
        <div class="py-5" data-aos="zoom-in">
            <h6 class="text-uppercase text-white mb-3 volunteer-label">Make a Difference</h6>
            <h1 class="display-4 text-white mb-3 font-weight-bold">Want to Join Us?</h1>
            <h4 class="text-white mb-4 volunteer-subtitle">Become a Proud Volunteer</h4>
            <p class="text-white mx-auto mb-4 volunteer-desc">Join our community of dedicated
                volunteers and help us create lasting change in the lives of women, children, senior citizens, and
                people with disabilities.</p>
            <a href="<?php echo url('become-volunteer.php') ?>" class="btn btn-lg px-5 py-3 volunteer-btn">Join Now <i
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
    <div class="container py-4 position-relative mship-container">
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
<!-- Membership Section End -->

<!-- Our Causes Section Start -->
<div class="container-fluid py-4 causes-section">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1 causes-section-label">See Our Work</h6>
            <h1 class="causes-heading">Our Campaign / <span class="causes-heading-highlight">Causes</span></h1>
        </div>
        <div class="row causes-row">
            <?php
            $homeCauses = [
                ['title' => 'Women Empowerment & Safety', 'icon' => 'fa-female', 'url' => 'womens-empowerment.php', 'img' => 'womens-empowerment/womens-empowerment.webp', 'desc' => 'We provide free self-defence classes, skill development workshops, and judicial protection aid for women in Dwarka.', 'tag' => 'Empowerment'],
                ['title' => 'Hunger Reduction / Food Donation', 'icon' => 'fa-utensils', 'url' => 'no-people-hungry.php', 'img' => 'hungary/hungary.webp', 'desc' => 'We organise frequent food donation drives, health and hygiene awareness campaigns, and run a free kitchen in Dwarka.', 'tag' => 'Food Drive'],
                ['title' => 'Education For Everyone', 'icon' => 'fa-graduation-cap', 'url' => 'education-for-every-kids.php', 'img' => 'education-for/education-for.webp', 'desc' => 'Durga Saptashati NGO is committed to providing access to quality education for all underprivileged children.', 'tag' => 'Education'],
            ];
            foreach ($homeCauses as $i => $cause): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 100 ?>">
                <a href="<?= url($cause['url']) ?>" class="event-card-link">
                    <div class="event-card-img-wrap">
                        <img src="<?= url('assets/images/' . $cause['img']) ?>"
                            alt="<?= htmlspecialchars($cause['title']) ?>">
                        <span class="event-card-tag">
                            <i class="fas <?= $cause['icon'] ?>"></i> <?= $cause['tag'] ?>
                        </span>
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">
                            <?= htmlspecialchars($cause['title']) ?>
                        </h5>
                        <p class="event-card-desc">
                            <?= htmlspecialchars($cause['desc']) ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="<?= url('causes.php') ?>" class="events-view-all-btn">
                View All Causes <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- Our Causes Section End -->

<!-- Activities Section Start -->
<div class="container-fluid activities-section-bg">
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
            ['icon' => 'fa-first-aid', 'title' => 'Covid 19 Products', 'desc' => 'Providing masks, sanitizers, and medical supplies to those in need.', 'num' => '01', 'color' => '#e74c3c'],
            ['icon' => 'fa-hands-helping', 'title' => 'Serve People', 'desc' => 'Providing food aid and organizing camps for underprivileged communities.', 'num' => '02', 'color' => '#f26522'],
            ['icon' => 'fa-donate', 'title' => 'Donation', 'desc' => 'Your generous donations help us continue and expand our initiatives.', 'num' => '03', 'color' => '#27ae60'],
            ['icon' => 'fa-people-carry', 'title' => 'Community Support', 'desc' => 'Strengthening communities through awareness and support programs.', 'num' => '04', 'color' => '#2980b9'],
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
<!-- Activities Section End -->

<!-- Donate Section Start -->
<div class="container-fluid donate-section"
    style="background:url('<?php echo asset('img/donate.jpg') ?>') center center/cover no-repeat fixed;">
    <div class="donate-overlay"></div>
    <div class="container py-5 position-relative donate-section-content">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="section-title mb-4">
                    <h6 class="text-uppercase d-inline-flex align-items-center donate-section-label">
                        <span class="donate-heart-icon">
                            <i class="fas fa-heart"></i>
                        </span>
                        Make a Donation
                    </h6>
                    <h1 class="text-white">Your Small Help Can Make a <span class="donate-heading-highlight">Big
                            Difference</span>
                    </h1>
                </div>
                <p class="text-white mb-4 donate-body-text">Your generosity enables us to continue
                    our mission of empowering women, educating children, and supporting the elderly and disabled. Every
                    rupee counts in creating a more equal society.</p>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">100% Transparent</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">Tax Benefits (80G)</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">Secure Payments</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">Direct Impact</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">Regular Updates</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle mr-3 donate-check-icon"></i>
                            <span class="text-white">Community Driven</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="donate-form-card">
                    <div class="donate-form-header">
                        <h3>Donate Now</h3>
                        <p>Every rupee makes a difference</p>
                    </div>
                    <form id="homeDonateForm" data-payment-url="<?= url("api/razorpay-payment.php") ?>"
                        onsubmit="return false;">
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
                            <span class="donate-quick" data-amount="500">&#8377;500</span>
                            <span class="donate-quick" data-amount="1000">&#8377;1,000</span>
                            <span class="donate-quick" data-amount="2500">&#8377;2,500</span>
                            <span class="donate-quick" data-amount="5000">&#8377;5,000</span>
                        </div>
                        <button type="submit" class="donate-submit" id="homeDonateBtn">
                            <i class="fas fa-heart"></i> Donate Now
                        </button>
                        <div class="donate-secure"><i class="fas fa-lock"></i> 100% Secure &amp; Encrypted Payment</div>
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
<div class="container-fluid blog-section">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2 blog-heading-label">From Our Blog</h6>
            <h2 class="blog-heading">Latest <span class="blog-heading-highlight">News & Articles</span></h2>
            <p class="blog-subtitle">Insights, stories, and updates
                from our journey of empowering communities and transforming lives.</p>
        </div>
        <div class="row blog-row">
            <?php if (empty($latestBlogs)): ?>
            <div class="col-12 text-center">
                <p class="blog-no-posts">No blog posts published yet.</p>
            </div>
            <?php else: ?>
            <?php $delays = [100, 200, 300];
                $idx = 0; ?>
            <?php foreach ($latestBlogs as $bp): ?>
            <div class="col-lg-4 col-md-6 mb-4 d-flex" data-aos="fade-up" data-aos-delay="<?= $delays[$idx] ?? 100 ?>">
                <a href="<?= url('blog/' . $bp['slug']) ?>" class="d-flex flex-column blog-card">
                    <div class="blog-card-img-wrap">
                        <?php
                                $blogImg = $bp['image'] ? asset('uploads/blogs/' . $bp['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg');
                                ?>
                        <img class="w-100 blog-card-img" src="<?= $blogImg ?>"
                            alt="<?= htmlspecialchars($bp['title']) ?>">
                        <?php if (!empty($bp['category'])): ?>
                        <div class="blog-category-tag">
                            <?= htmlspecialchars($bp['category']) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center mb-3 blog-meta">
                            <small><i class="far fa-calendar-alt mr-1 blog-meta-icon"></i>
                                <?= date('M d, Y', strtotime($bp['created_at'])) ?></small>
                            <small><i class="far fa-user mr-1 blog-meta-icon"></i>
                                <?= htmlspecialchars($bp['author'] ?? 'Admin') ?></small>
                            <?php
                                    $hcStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ? AND status = 'approved'");
                                    $hcStmt->execute([$bp['id']]);
                                    $hcCount = $hcStmt->fetchColumn();
                                    ?>
                            <small><i class="far fa-comment mr-1 blog-meta-icon"></i>
                                <?= $hcCount ?></small>
                        </div>
                        <h5 class="font-weight-bold mb-2 blog-title">
                            <?= htmlspecialchars($bp['title']) ?>
                        </h5>
                        <p class="flex-grow-1 blog-excerpt">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags($bp['content'] ?? ''), 0, 150, '...')) ?>
                        </p>
                        <span class="blog-read-more">
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

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="<?php echo asset('js/index.js'); ?>"></script>

<?php include '../app/views/layout/footer.php'; ?>