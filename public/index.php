<?php
require_once '../app/config/config.php';

$pageTitle = "Home - " . APP_NAME;
$pageDescription = "Durga Saptashati Foundation - A non-profit organization dedicated to serving humanity through various charitable activities, education, healthcare, and social welfare.";
$pageKeywords = "Durga Saptashati, NGO, charity, donate, volunteer, education, healthcare, community development, women empowerment, spiritual, India";

include '../app/views/layout/header.php';
?>

<!-- Carousel Start -->
<div class="carousel" data-aos="fade" data-aos-duration="1500">
    <div class="container-fluid">
        <div class="owl-carousel owl-theme">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel.webp'); ?>" alt="Helping Children">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Let's be kind for children</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        Join us in making a difference in the lives of underprivileged children through education,
                        healthcare, and spiritual guidance.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel-1.webp'); ?>" alt="Helping Hand">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Get Involved with helping hand
                    </h1>
                    <p>
                        Together we can create positive change in society through compassion, service, and dedication to
                        the divine mother.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel-2.webp'); ?>" alt="Bringing Smiles">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Bringing smiles to millions
                    </h1>
                    <p>
                        Through the grace of Durga Ma, we work tirelessly to bring hope, healing, and happiness to those
                        in need.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Video Modal Start-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


<!-- About Start -->
<div class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img" data-aos="fade-right" data-aos-duration="1200" data-aos-once="true"
                    data-parallax="scroll" data-image-src="<?php echo asset('img/about.jpg'); ?>">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-once="true">
                <div class="section-header">
                    <p>Learn About Us</p>
                    <h2>Spiritual foundation serving humanity</h2>
                </div>
                <div class="about-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="javascript:void(0);"
                                data-target="#tab-content-1" onclick="return false;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="javascript:void(0);"
                                data-target="#tab-content-2" onclick="return false;">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="javascript:void(0);"
                                data-target="#tab-content-3" onclick="return false;">Vision</a>
                        </li>
                    </ul>

                    <div class="tab-content text-justify">
                        <div id="tab-content-1" class="tab-pane active donate-text">
                            <p>Durga Saptashati Foundation is a women’s rights nonprofit
                                organization which is a platform to empower widows, handicapped people, disabled people,
                                senior citizens and
                                women of the nation. With the goals of providing strength, confidence, better living,
                                and respect, Saptashati Foundation brings in enlightenment and a ray of hope in the
                                world of people who have gone through a lot of test things in their lives. We are the
                                voice of these people, and we are dedicated to bringing that positive change that can
                                bring happiness in their lives. We closely work with rural and urban women and
                                organizations on various problems to make their lives better. Saptashati Foundation also
                                links to various civil-society organizations on the welfare of society by addressing and
                                resolving many issues for women and senior citizens. From providing better education for
                                the needy people to raising voice against dowry harassment, child marriage, female
                                genital mutilation, our team of Saptashati Foundation becomes the voice of the strong
                                women of India and let them live with independence and a sense of respect in whatever
                                they are doing.</p>
                        </div>
                        <div id="tab-content-2" class="tab-pane fade donate-text">
                            <p>Widowed women, handicapped people, disabled people, have to struggle for their rights and
                                are frequently victims of discrimination. At Saptashati Foundation, our team works
                                towards empowering the widowed women of our Indian society and, we ensure that we reach
                                every corner of India to uplift these widowed from their distressed state. Sustaining
                                economic insecurity, social disgrace, and often abandonment, widowed women are facing
                                several challenges in Indian society. At Saptashati Foundation, we are committed to
                                transforming societal attitudes towards widowed women. We aim to shift Widowed women and
                                their children need our support and care. Saptashati Foundation was established with the
                                aim to inspire a sense of welfare and bring a social revolution in the way we see these
                                serious matters. Our purpose is to offer financial and social as well as economic
                                security to women who have endured the grief of widowhood. We help, assist, and support
                                old and young widowed women in rural and urban areas to regain an opportunity at a more
                                secure life. </p>
                        </div>
                        <div id="tab-content-3" class="tab-pane fade donate-text">
                            <p>Our vision focuses on the welfare of handicapped people, widows, and senior citizens. In
                                a bid to empower them with equal opportunities, we help them live independently with
                                pride, dignity and self respect. We work towards the economic reform of these people,
                                and help them provide the right skillset and exposure, so they may move forward in life.
                                We fight against dowry harassment, infanticide, and human trafficking. Women comprise of
                                half the population of the globe and share one percent of the resources. In India, women
                                have been enduring hardships on account of their widowed or even divorced status. They
                                are homebound often on account of this marital status, restricting them to grow
                                personally or professionally. The growing globalization that benefits only the urban
                                areas shows no remarkable impact on underprivileged rural areas- where women are still
                                suffering due to societal pressures. Every change on the planet starts with a new phase
                                of consciousness, a new experience, and a new vision.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Service Start -->
<div class="service" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>What We Do?</p>
            <h2>We believe that we can save more lives with you</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-diet"></i>
                    </div>
                    <div class="service-text">
                        <h3>Healthy Food</h3>
                        <p>Providing nutritious meals and food security programs for underprivileged families and
                            children</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-water"></i>
                    </div>
                    <div class="service-text">
                        <h3>Pure Water</h3>
                        <p>Ensuring access to clean and safe drinking water through well construction and purification
                            systems</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-healthcare"></i>
                    </div>
                    <div class="service-text">
                        <h3>Health Care</h3>
                        <p>Providing medical assistance, health camps, and healthcare awareness programs for communities
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-education"></i>
                    </div>
                    <div class="service-text">
                        <h3>Primary Education</h3>
                        <p>Supporting education through scholarships, school supplies, and learning centers for children
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-home"></i>
                    </div>
                    <div class="service-text">
                        <h3>Residence Facilities</h3>
                        <p>Providing safe shelter and temporary housing for homeless and vulnerable individuals</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="flaticon-social-care"></i>
                    </div>
                    <div class="service-text">
                        <h3>Social Care</h3>
                        <p>Offering counseling, emotional support, and community development programs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Facts Start -->
<div class="facts" data-parallax="scroll" data-image-src="<?php echo asset('img/facts.jpg'); ?>" data-aos="fade"
    data-aos-duration="1000">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="facts-item">
                    <i class="flaticon-home"></i>
                    <div class="facts-text">
                        <h3 class="facts-plus" data-toggle="counter-up">25</h3>
                        <p>Communities</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="facts-item">
                    <i class="flaticon-charity"></i>
                    <div class="facts-text">
                        <h3 class="facts-plus" data-toggle="counter-up">150</h3>
                        <p>Volunteers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="facts-item">
                    <i class="flaticon-kindness"></i>
                    <div class="facts-text">
                        <h3 class="facts-dollar" data-toggle="counter-up">500000</h3>
                        <p>Our Goal</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="facts-item">
                    <i class="flaticon-donation"></i>
                    <div class="facts-text">
                        <h3 class="facts-dollar" data-toggle="counter-up">250000</h3>
                        <p>Raised</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Causes Start -->
<div class="causes" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Popular Causes</p>
            <h2>Let's know about charity causes around the world</h2>
        </div>
        <div class="owl-carousel causes-carousel" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?php echo asset('img/causes-1.jpg'); ?>" alt="Image">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>85%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹85,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Education for Underprivileged Children</h3>
                    <p>Supporting the education of children from disadvantaged backgrounds through scholarships and
                        learning materials</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?php echo url('causes.php'); ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?php echo asset('img/causes-2.jpg'); ?>" alt="Image">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>70%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹70,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Healthcare for Rural Communities</h3>
                    <p>Providing medical assistance and health awareness programs in remote villages and underserved
                        areas</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?php echo url('causes.php'); ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?php echo asset('img/causes-3.jpg'); ?>" alt="Image">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>60%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹60,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Food Security Program</h3>
                    <p>Ensuring nutritious meals for hungry families and children through our community kitchen
                        initiatives</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?php echo url('causes.php'); ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                </div>
            </div>
            <div class="causes-item">
                <div class="causes-img">
                    <img src="<?php echo asset('img/causes-4.jpg'); ?>" alt="Image">
                </div>
                <div class="causes-progress">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100">
                            <span>90%</span>
                        </div>
                    </div>
                    <div class="progress-text">
                        <p><strong>Raised:</strong> ₹90,000</p>
                        <p><strong>Goal:</strong> ₹1,00,000</p>
                    </div>
                </div>
                <div class="causes-text">
                    <h3>Clean Water Initiative</h3>
                    <p>Providing access to clean and safe drinking water through well construction and purification
                        systems</p>
                </div>
                <div class="causes-btn">
                    <a class="btn btn-custom" href="<?php echo url('causes.php'); ?>">Learn More</a>
                    <a class="btn btn-custom" href="<?php echo url('donate.php'); ?>">Donate Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Causes End -->


<!-- Donate Start -->
<div class="donate" data-parallax="scroll" data-image-src="<?php echo asset('img/donate.jpg'); ?>" data-aos="fade"
    data-aos-duration="1000">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                <div class="donate-content">
                    <div class="section-header">
                        <p>Donate Now</p>
                        <h2>Let's donate to needy people for better lives</h2>
                    </div>
                    <div class="donate-text">
                        <p>
                            Your generous contribution helps us continue our mission of serving humanity through the
                            divine grace of Durga Ma. Every donation, no matter the size, makes a meaningful difference
                            in the lives of those we serve.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="donate-form">
                    <form action="<?php echo url('donate.php'); ?>" method="POST">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required />
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address"
                                required />
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-custom active">
                                <input type="radio" name="amount" value="500" checked> ₹500
                            </label>
                            <label class="btn btn-custom">
                                <input type="radio" name="amount" value="1000"> ₹1000
                            </label>
                            <label class="btn btn-custom">
                                <input type="radio" name="amount" value="2000"> ₹2000
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit">Donate Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donate End -->


<!-- Event Start -->
<div class="event" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Upcoming Events</p>
            <h2>Be ready for our upcoming charity events</h2>
        </div>
        <div class="row">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="event-item">
                    <img src="<?php echo asset('img/event-1.jpg'); ?>" alt="Image">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>15-Oct-2024</p>
                            <p><i class="far fa-clock"></i>10:00 - 16:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>New Delhi</p>
                        </div>
                        <div class="event-text">
                            <h3>Durga Puja Celebration</h3>
                            <p>
                                Join us for our annual Durga Puja celebration with community prayers, cultural programs,
                                and free meals for all
                            </p>
                            <a class="btn btn-custom" href="<?php echo url('event.php'); ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="event-item">
                    <img src="<?php echo asset('img/event-2.jpg'); ?>" alt="Image">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>22-Oct-2024</p>
                            <p><i class="far fa-clock"></i>09:00 - 17:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>Mumbai</p>
                        </div>
                        <div class="event-text">
                            <h3>Free Health Camp</h3>
                            <p>
                                Free medical checkups, medicines, and health awareness sessions for the underprivileged
                                community
                            </p>
                            <a class="btn btn-custom" href="<?php echo url('event.php'); ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Event End -->


<!-- Team Start -->
<div class="team" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Meet Our Team</p>
            <h2>Awesome people behind our charity activities</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?php echo asset('img/team-1.jpg'); ?>" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>Swami Ramdev</h2>
                        <p>Founder & Spiritual Guide</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?php echo asset('img/team-2.jpg'); ?>" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>Dr. Priya Sharma</h2>
                        <p>Medical Director</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?php echo asset('img/team-3.jpg'); ?>" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>Rajesh Kumar</h2>
                        <p>Program Coordinator</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?php echo asset('img/team-4.jpg'); ?>" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>Meera Devi</h2>
                        <p>Community Outreach</p>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Volunteer Start -->
<div class="volunteer" data-parallax="scroll" data-image-src="<?php echo asset('img/volunteer.jpg'); ?>" data-aos="fade"
    data-aos-duration="1000">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="volunteer-form">
                    <form action="<?php echo url('volunteer.php'); ?>" method="POST">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required />
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address"
                                required />
                        </div>
                        <div class="control-group">
                            <textarea name="message" class="form-control"
                                placeholder="Why you want to become a volunteer?" required></textarea>
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit">Become a volunteer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="volunteer-content">
                    <div class="section-header">
                        <p>Become A Volunteer</p>
                        <h2>Let's make a difference in the lives of others</h2>
                    </div>
                    <div class="volunteer-text">
                        <p>
                            Join our volunteer family and be part of the divine service to humanity. Through
                            volunteering with us, you can contribute to meaningful change while experiencing spiritual
                            growth and fulfillment. Together, we can serve the divine mother by serving her children.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Volunteer End -->


<!-- Testimonial Start -->
<div class="testimonial" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Testimonial</p>
            <h2>What people are talking about our charity activities</h2>
        </div>
        <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="200"
            data-aos-duration="1000">
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?php echo asset('img/testimonial-1.jpg'); ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Anjali Singh</h3>
                        <p>Beneficiary Parent</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "The foundation has been a blessing for our family. Their educational support helped my daughter
                        complete her studies. We are forever grateful to Durga Ma and this wonderful organization."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?php echo asset('img/testimonial-2.jpg'); ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Ram Prakash</h3>
                        <p>Community Leader</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "Their healthcare initiatives have transformed our village. The free medical camps and medicines
                        have been a lifeline for many families. This is true service to humanity."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?php echo asset('img/testimonial-3.jpg'); ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Dr. Sita Sharma</h3>
                        <p>Volunteer Doctor</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "Volunteering with this foundation has been a spiritually enriching experience. The dedication
                        and compassion of the entire team is inspiring. It's a privilege to serve."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?php echo asset('img/testimonial-4.jpg'); ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Mohan Kumar</h3>
                        <p>Donor</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "I have been supporting this foundation for years. Their transparency and genuine commitment to
                        helping the needy makes me confident that every donation makes a real difference."
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Contact Start -->
<div class="contact" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Get In Touch</p>
            <h2>Contact for any query</h2>
        </div>
        <div class="contact-img" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000">
            <img src="<?php echo asset('img/contact.jpg'); ?>" alt="Image">
        </div>
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
            <div id="success"></div>
            <form name="sentMessage" id="contactForm" action="<?php echo url('contact.php'); ?>" method="POST"
                novalidate="novalidate">
                <div class="control-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                        required="required" data-validation-required-message="Please enter your name" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                        required="required" data-validation-required-message="Please enter your email" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required="required" data-validation-required-message="Please enter a subject" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Message" required="required"
                        data-validation-required-message="Please enter your message"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <button class="btn btn-custom" type="submit" id="sendMessageButton">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Blog Start -->
<div class="blog" data-aos="fade-up" data-aos-duration="1000">
    <div class="container-fluid">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <p>Our Blog</p>
            <h2>Latest news & articles directly from our blog</h2>
        </div>
        <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?php echo asset('img/blog-1.jpg'); ?>" alt="Image">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?php echo url('blog.php'); ?>">The Power of Saptashati Path</a></h3>
                        <p>
                            Discover the spiritual significance and benefits of reciting the Durga Saptashati for
                            personal transformation and divine blessing.
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">12 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?php echo asset('img/blog-2.jpg'); ?>" alt="Image">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?php echo url('blog.php'); ?>">Community Service and Spiritual Growth</a></h3>
                        <p>
                            Learn how serving others through charitable activities leads to spiritual development and
                            inner peace through divine grace.
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">8 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?php echo asset('img/blog-3.jpg'); ?>" alt="Image">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?php echo url('blog.php'); ?>">Healthcare for All: Our Mission</a></h3>
                        <p>
                            Read about our ongoing healthcare initiatives and how we're working to provide medical
                            assistance to underserved communities.
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">15 Comments</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php include '../app/views/layout/footer.php'; ?>