<?php
require_once '../app/config/config.php';

$pageTitle = "Home - " . APP_NAME;
$pageDescription = "Durga Saptashati Foundation - Empowerment, Education, Equality, Empathy. A trusted charity organisation in Delhi working for the empowerment of women, deprived children, senior citizens, and people with disabilities.";

include '../app/views/layout/header.php';
?>

<style>
    .sanskrit-section {
        background: url('<?php echo asset('img/facts.jpg') ?>') center center/cover no-repeat fixed;
        position: relative;
        padding: 100px 0;
        color: #fff;
    }
    .sanskrit-section::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(26,27,46,0.85);
    }
    .sanskrit-text {
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .sanskrit-translation {
        font-size: 1.2rem;
        font-style: italic;
        opacity: 0.9;
    }
    .gallery-section .gallery-item {
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
        border-radius: 8px;
    }
    .gallery-section .gallery-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .gallery-section .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-section .gallery-item .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(242,101,34,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    .gallery-section .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay a {
        color: #fff;
        font-size: 2rem;
        width: 50px; height: 50px;
        border: 2px solid #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }
    .gallery-overlay a:hover {
        background: #fff;
        color: #f26522;
    }
    .activities-section .activity-card {
        background: #fff;
        border-radius: 10px;
        padding: 40px 25px;
        text-align: center;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        height: 100%;
    }
    .activities-section .activity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 40px rgba(242,101,34,0.2);
    }
    .activities-section .activity-card .icon-wrap {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: rgba(242,101,34,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: #f26522;
        transition: all 0.4s;
    }
    .activities-section .activity-card:hover .icon-wrap {
        background: #f26522;
        color: #fff;
    }
    .section-title span {
        color: #f26522;
    }
    .causes-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        transition: all 0.4s;
        background: #fff;
        height: 100%;
    }
    .causes-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    }
    .causes-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .causes-card .causes-body {
        padding: 25px;
    }
    .causes-card .causes-body h5 {
        color: #1a1b2e;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .causes-card .causes-body p {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.7;
    }
    .event-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s;
    }
    .event-card:hover {
        box-shadow: 0 10px 35px rgba(0,0,0,0.15);
    }
    .event-card .event-date {
        background: #f26522;
        color: #fff;
        padding: 15px;
        text-align: center;
        min-width: 100px;
    }
    .event-card .event-date .day {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }
    .event-card .event-date .month {
        font-size: 0.9rem;
        text-transform: uppercase;
    }
    .event-card .event-info {
        padding: 20px;
    }
    .event-card .event-info h5 {
        font-weight: 700;
        color: #1a1b2e;
        margin-bottom: 10px;
    }
    .event-card .event-info p {
        color: #888;
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    .tab-content-section .nav-tabs .nav-link {
        color: #4a4c70;
        font-weight: 600;
        border: none;
        border-bottom: 3px solid transparent;
        padding: 10px 25px;
    }
    .tab-content-section .nav-tabs .nav-link.active {
        color: #f26522;
        border-bottom-color: #f26522;
        background: transparent;
    }
</style>

<!-- Carousel Start -->
<div class="carousel" data-aos="fade" data-aos-duration="1500">
    <div class="container-fluid">
        <div class="owl-carousel owl-theme">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel.webp'); ?>" alt="Durga Saptashati Foundation">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Durga Saptashati Foundation</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" style="letter-spacing: 2px; font-size: 1.1rem;">
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
                    <img src="<?php echo asset('img/carousel/carousel-1.webp'); ?>" alt="Our Commitment to Community">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Our Commitment to Community!</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        A trusted charity organisation in Delhi working for the empowerment of women, deprived children, senior citizens, and people with disabilities.
                    </p>
                    <div class="carousel-btn" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a class="btn btn-custom" href="<?php echo url('about.php'); ?>">Learn More</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel/carousel-2.webp'); ?>" alt="Gender Equality to Social Justice">
                </div>
                <div class="carousel-text">
                    <h1 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">From Gender Equality to Social Justice</h1>
                    <p data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        We are dismantling barriers, challenging stereotypes, and creating a more inclusive society through grassroots initiatives.
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
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->

<!-- About Section Start -->
<div class="container-fluid py-5" id="about">
    <div class="container py-4">
        <div class="row" style="align-items:stretch;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="position-relative h-100" style="border-radius:12px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.12);">
                    <img src="<?php echo asset('img/about.jpg') ?>" alt="About Durga Saptashati" style="width:100%;height:100%;object-fit:cover;display:block;">
                    <a class="position-absolute d-flex align-items-center justify-content-center" href="" data-toggle="modal" data-target="#videoModal" style="top:0;left:0;right:0;bottom:0;background:linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.1));">
                        <div style="width:70px;height:70px;border-radius:50%;background:rgba(242,101,34,0.9);display:flex;align-items:center;justify-content:center;transition:all 0.3s;box-shadow:0 5px 25px rgba(242,101,34,0.4);" onmouseover="this.style.transform='scale(1.1)';this.style.background='#f26522'" onmouseout="this.style.transform='scale(1)';this.style.background='rgba(242,101,34,0.9)'">
                            <i class="fa fa-play text-white" style="font-size:1.5rem;margin-left:4px;"></i>
                        </div>
                    </a>
                    <div class="position-absolute" style="bottom:20px;left:20px;right:20px;">
                        <div style="background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-radius:10px;padding:15px 20px;display:flex;align-items:center;gap:20px;">
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
                    <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;font-size:0.85rem;">About Us</h6>
                    <h2 style="color:#1a1b2e;font-weight:700;margin-bottom:20px;">Our Commitment <span style="color:#f26522;">to Community!</span></h2>
                </div>
                <div>
                    <!-- Tab Navigation -->
                    <div style="display:flex;gap:0;margin-bottom:25px;border-bottom:2px solid #eee;">
                        <button class="about-tab-btn active" onclick="switchAboutTab(this, 'about')" style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#1a1b2e;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid #f26522;margin-bottom:-2px;">
                            <i class="fas fa-info-circle mr-1" style="color:#f26522;"></i> About
                        </button>
                        <button class="about-tab-btn" onclick="switchAboutTab(this, 'mission')" style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#999;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid transparent;margin-bottom:-2px;">
                            <i class="fas fa-bullseye mr-1"></i> Mission
                        </button>
                        <button class="about-tab-btn" onclick="switchAboutTab(this, 'vision')" style="padding:10px 25px;border:none;background:none;font-weight:700;font-size:0.95rem;color:#999;position:relative;cursor:pointer;transition:all 0.3s;border-bottom:3px solid transparent;margin-bottom:-2px;">
                            <i class="fas fa-eye mr-1"></i> Vision
                        </button>
                    </div>

                    <!-- Tab Content -->
                    <div id="about-tab-about" class="about-tab-content" style="display:block;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Durga Saptashati NGO in Dwarka, Delhi, is the brainchild of a visionary and empathetic leader, <strong style="color:#1a1b2e;">Sandhya Singh</strong>. Saptashati Foundation is a trusted charity organisation in Delhi working for the empowerment of women (from all walks of life), deprived children, senior citizens, and people with disabilities.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We are confident that giving a voice to the marginalised will create a more equal and just society. Our approaches are mainly grassroots initiatives because our founder, <strong style="color:#1a1b2e;">Sandhya Singh</strong>, strongly believes in the lasting impact of working from the ground up.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">From gender equality to social justice, we are dismantling barriers, challenging stereotypes, and trying to create a more inclusive society. Our dedicated team of volunteers and members work closely with rural and urban communities on various issues to bring about meaningful and lasting change.</p>
                    </div>
                    <div id="about-tab-mission" class="about-tab-content" style="display:none;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Our mission is to work tirelessly for the empowerment of women from all walks of life, the upliftment of deprived children through education and care, the well-being of senior citizens, and the support of people with disabilities.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We aim to create lasting change through grassroots initiatives, skill development, awareness campaigns, and community-driven programs across Delhi. We provide free self-defence classes, judicial protection aid, and arrange skill development workshops to equip women with the knowledge and expertise they need.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Through our education initiatives, we help EWS children in Dwarka get admission to schools, organise after-school tuition classes, and distribute school supplies to remove barriers to learning.</p>
                        <div style="display:flex;gap:15px;margin-top:15px;">
                            <div style="flex:1;padding:12px;background:rgba(242,101,34,0.06);border-radius:8px;border-left:3px solid #f26522;">
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Women Empowerment</strong>
                                <p style="margin:5px 0 0;font-size:0.8rem;color:#888;">Self-defence, skill development & awareness</p>
                            </div>
                            <div style="flex:1;padding:12px;background:rgba(242,101,34,0.06);border-radius:8px;border-left:3px solid #f26522;">
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Education For All</strong>
                                <p style="margin:5px 0 0;font-size:0.8rem;color:#888;">EWS admissions, tuition & school supplies</p>
                            </div>
                        </div>
                    </div>
                    <div id="about-tab-vision" class="about-tab-content" style="display:none;">
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Our vision is to build a more equal and just society where every individual, regardless of their gender, age, or ability, has access to opportunities, safety, and dignity.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">We envision communities where women are empowered, children are educated, the elderly are cared for, and every voice is heard and valued. We strive to be the voice of the voiceless and bring positive change that leads to happiness, independence, and a sense of respect in whatever they are doing.</p>
                        <p style="color:#555;line-height:1.85;font-size:0.95rem;">Every change on the planet starts with a new phase of consciousness, a new experience, and a new vision. We are committed to being that catalyst for transformation in our society.</p>
                        <div style="display:flex;gap:15px;margin-top:15px;">
                            <div style="text-align:center;flex:1;">
                                <div style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-balance-scale" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Equality</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-hand-holding-heart" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Empathy</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-graduation-cap" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Education</small>
                            </div>
                            <div style="text-align:center;flex:1;">
                                <div style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 8px;">
                                    <i class="fas fa-fist-raised" style="color:#f26522;"></i>
                                </div>
                                <small style="color:#1a1b2e;font-weight:600;font-size:0.8rem;">Empowerment</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-auto pt-3">
                    <a href="<?php echo url('about.php') ?>" class="btn px-4 py-2" style="background:#f26522;color:#fff;border-radius:30px;font-weight:600;box-shadow:0 5px 20px rgba(242,101,34,0.3);transition:all 0.3s;" onmouseover="this.style.boxShadow='0 8px 30px rgba(242,101,34,0.45)';this.style.transform='translateY(-2px)'" onmouseout="this.style.boxShadow='0 5px 20px rgba(242,101,34,0.3)';this.style.transform='translateY(0)'">Learn More <i class="fa fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
<!-- About Section End -->

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="background:transparent;border:none;">
            <div class="modal-body p-0">
                <button type="button" class="close text-white mb-2" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Causes Section Start -->
<div class="container-fluid py-4" style="background:#f8f9fa;">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">What We Do</h6>
            <h1 style="color:#1a1b2e;">Our <span style="color:#f26522;">Causes</span></h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="causes-card" style="border-radius:10px;overflow:hidden;box-shadow:0 3px 15px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;height:100%;border-bottom:3px solid #f26522;">
                    <div style="position:relative;overflow:hidden;">
                        <img src="<?php echo asset('img/causes-1.jpg') ?>" alt="Women Empowerment & Safety" style="width:100%;height:200px;object-fit:cover;transition:transform 0.5s;">
                        <div style="position:absolute;top:12px;left:12px;background:#f26522;color:#fff;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;"><i class="fas fa-female mr-1"></i> Empowerment</div>
                    </div>
                    <div style="padding:18px 18px 15px;">
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1.05rem;margin-bottom:10px;">Women Empowerment & Safety</h5>
                        <p style="color:#666;font-size:0.88rem;line-height:1.65;margin:0;">Empowered and safe women are the catalysts for social growth and progress. At Durga Saptashati, we provide free self-defence classes in Dwarka, ensuring that women have the tools and knowledge to protect themselves. Additionally, we offer judicial protection aid for women and arrange skill development classes and awareness drives.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                <div class="causes-card" style="border-radius:10px;overflow:hidden;box-shadow:0 3px 15px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;height:100%;border-bottom:3px solid #f26522;">
                    <div style="position:relative;overflow:hidden;">
                        <img src="<?php echo asset('img/causes-2.jpg') ?>" alt="Hunger Reduction / Food Donation" style="width:100%;height:200px;object-fit:cover;transition:transform 0.5s;">
                        <div style="position:absolute;top:12px;left:12px;background:#f26522;color:#fff;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;"><i class="fas fa-utensils mr-1"></i> Food Drive</div>
                    </div>
                    <div style="padding:18px 18px 15px;">
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1.05rem;margin-bottom:10px;">Hunger Reduction / Food Donation</h5>
                        <p style="color:#666;font-size:0.88rem;line-height:1.65;margin:0;">In the battle against hunger, we refuse to retreat. Through our 'Hunger Reduction' initiative, we organise frequent food donation drives in Dwarka, health and hygiene awareness campaigns, and run a free kitchen, ensuring that no one in our community goes to bed hungry.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="300">
                <div class="causes-card" style="border-radius:10px;overflow:hidden;box-shadow:0 3px 15px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;height:100%;border-bottom:3px solid #f26522;">
                    <div style="position:relative;overflow:hidden;">
                        <img src="<?php echo asset('img/causes-3.jpg') ?>" alt="Education For Everyone" style="width:100%;height:200px;object-fit:cover;transition:transform 0.5s;">
                        <div style="position:absolute;top:12px;left:12px;background:#f26522;color:#fff;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;"><i class="fas fa-graduation-cap mr-1"></i> Education</div>
                    </div>
                    <div style="padding:18px 18px 15px;">
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1.05rem;margin-bottom:10px;">Education For Everyone</h5>
                        <p style="color:#666;font-size:0.88rem;line-height:1.65;margin:0;">The transformative power of education is not a hidden fact. But still, many children are deprived of it because of financial conditions. That's why Durga Saptashati NGO in Dwarka is committed to providing access to quality education for all. Our NGO founder, Sandhya Singh, also helps EWS children in Dwarka get admission to schools using their quota privileges.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Causes Section End -->

<!-- Sanskrit Quote Section Start -->
<div class="sanskrit-section">
    <div class="container position-relative text-center" data-aos="zoom-in" data-aos-duration="1000">
        <p class="sanskrit-text mb-3">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामया।</p>
        <p class="sanskrit-translation mb-4">"May all beings be happy, May all beings be free from illness"</p>
        <div style="width:60px;height:3px;background:#f26522;margin:0 auto 20px;"></div>
        <p class="text-white" style="max-width:700px;margin:0 auto;font-size:1.05rem;opacity:0.85;">This ancient prayer guides our actions with love, compassion, equality, and empathy in everything we do.</p>
    </div>
</div>
<!-- Sanskrit Quote Section End -->

<!-- Facts/Counter Section Start -->
<div class="container-fluid py-5" style="background:#1a1b2e;">
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
                    <h6 class="text-uppercase text-white" style="letter-spacing:2px;opacity:0.8;">Globalization Work</h6>
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
        }, { threshold: 0.3 });
        observer.observe(counterSection.closest('.container-fluid'));
    }
})();
</script>
<!-- Facts/Counter Section End -->

<!-- Events Section Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase" style="color:#f26522;letter-spacing:3px;font-weight:600;">What's Happening</h6>
            <h1 style="color:#1a1b2e;">Upcoming & Past <span style="color:#f26522;">Events</span></h1>
        </div>
        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="200">
            <div class="event-card d-flex">
                <div class="event-date d-flex flex-column align-items-center justify-content-center">
                    <span class="day">8</span>
                    <span class="month">Mar</span>
                </div>
                <div class="event-info">
                    <h5>International Women's Day 2021</h5>
                    <p><i class="fa fa-clock mr-2"></i>11:00 AM - 3:00 PM</p>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Dwarka, Delhi</p>
                </div>
            </div>
            <div class="event-card d-flex">
                <div class="event-date d-flex flex-column align-items-center justify-content-center">
                    <span class="day">28</span>
                    <span class="month">Feb</span>
                </div>
                <div class="event-info">
                    <h5>Cultural Programme</h5>
                    <p><i class="fa fa-clock mr-2"></i>5:00 PM - 7:30 PM</p>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Dwarka, Delhi</p>
                </div>
            </div>
            <div class="event-card d-flex">
                <div class="event-date d-flex flex-column align-items-center justify-content-center">
                    <span class="day">14</span>
                    <span class="month">Jan</span>
                </div>
                <div class="event-info">
                    <h5>Cultural Programme</h5>
                    <p><i class="fa fa-clock mr-2"></i>5:00 PM - 7:30 PM</p>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Dwarka, Delhi</p>
                </div>
            </div>
            <div class="event-card d-flex">
                <div class="event-date d-flex flex-column align-items-center justify-content-center">
                    <span class="day">21</span>
                    <span class="month">Jun</span>
                </div>
                <div class="event-info">
                    <h5>Yoga Day 2021</h5>
                    <p><i class="fa fa-clock mr-2"></i>5:00 AM - 10:00 AM</p>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Dwarka, Delhi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events Section End -->

<!-- Volunteer / Join Us Section Start -->
<div class="container-fluid" style="background:url('<?php echo asset('img/volunteer.jpg') ?>') center center/cover no-repeat fixed;position:relative;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(242,101,34,0.9);"></div>
    <div class="container py-5 position-relative text-center" style="z-index:1;">
        <div class="py-5" data-aos="zoom-in">
            <h6 class="text-uppercase text-white mb-3" style="letter-spacing:3px;">Make a Difference</h6>
            <h1 class="display-4 text-white mb-3 font-weight-bold">Want to Join Us?</h1>
            <h4 class="text-white mb-4" style="opacity:0.9;">Become a Proud Volunteer</h4>
            <p class="text-white mx-auto mb-4" style="max-width:600px;opacity:0.9;">Join our community of dedicated volunteers and help us create lasting change in the lives of women, children, senior citizens, and people with disabilities.</p>
            <a href="<?php echo url('contact') ?>" class="btn btn-lg px-5 py-3" style="background:#fff;color:#f26522;border-radius:30px;font-weight:600;">Join Now <i class="fa fa-arrow-right ml-2"></i></a>
        </div>
    </div>
</div>
<!-- Volunteer / Join Us Section End -->

<!-- Gallery Section Start -->
<div class="container-fluid py-4 gallery-section" style="background:#f8f9fa;">
    <div class="container py-3">
        <div class="text-center mb-4" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">See Our Work</h6>
            <h1 style="color:#1a1b2e;">Our Campaign / <span style="color:#f26522;">Causes Gallery</span></h1>
        </div>
        <div class="row no-gutters">
            <?php
            $galleryImages = [
                ['src' => 'img/causes-1.jpg', 'alt' => 'Women Empowerment', 'caption' => 'Women Empowerment'],
                ['src' => 'img/causes-2.jpg', 'alt' => 'Food Donation', 'caption' => 'Food Donation Drive'],
                ['src' => 'img/causes-3.jpg', 'alt' => 'Education', 'caption' => 'Education For All'],
                ['src' => 'img/causes-4.jpg', 'alt' => 'Community Support', 'caption' => 'Community Support'],
                ['src' => 'img/event-1.jpg', 'alt' => 'Events', 'caption' => 'Community Events'],
                ['src' => 'img/event-2.jpg', 'alt' => 'Health Camp', 'caption' => 'Health Camps'],
            ];
            foreach ($galleryImages as $i => $img): ?>
            <div class="col-lg-4 col-md-6 p-1" data-aos="fade-up" data-aos-delay="<?php echo ($i % 3 + 1) * 100; ?>">
                <div class="gallery-item" onclick="openGallery(<?php echo $i; ?>)" style="cursor:pointer;">
                    <img src="<?php echo asset($img['src']); ?>" alt="<?php echo $img['alt']; ?>">
                    <div class="gallery-overlay">
                        <div class="text-center text-white">
                            <i class="fa fa-search-plus mb-2" style="font-size:1.5rem;"></i>
                            <p class="mb-0 font-weight-bold" style="font-size:0.9rem;"><?php echo $img['caption']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Gallery Lightbox Modal -->
<div id="galleryModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.92);z-index:99999;align-items:center;justify-content:center;">
    <button onclick="closeGallery()" style="position:absolute;top:20px;right:25px;background:none;border:none;color:#fff;font-size:2.5rem;cursor:pointer;z-index:10;opacity:0.8;transition:opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">&times;</button>
    <button onclick="prevImage()" style="position:absolute;left:15px;top:50%;transform:translateY(-50%);background:rgba(242,101,34,0.8);border:none;color:#fff;font-size:1.5rem;width:50px;height:50px;border-radius:50%;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#f26522'" onmouseout="this.style.background='rgba(242,101,34,0.8)'"><i class="fas fa-chevron-left"></i></button>
    <button onclick="nextImage()" style="position:absolute;right:15px;top:50%;transform:translateY(-50%);background:rgba(242,101,34,0.8);border:none;color:#fff;font-size:1.5rem;width:50px;height:50px;border-radius:50%;cursor:pointer;transition:background 0.3s;" onmouseover="this.style.background='#f26522'" onmouseout="this.style.background='rgba(242,101,34,0.8)'"><i class="fas fa-chevron-right"></i></button>
    <div style="text-align:center;max-width:90%;max-height:85vh;">
        <img id="galleryModalImg" src="" alt="" style="max-width:100%;max-height:78vh;border-radius:6px;box-shadow:0 10px 50px rgba(0,0,0,0.5);object-fit:contain;">
        <p id="galleryModalCaption" style="color:#fff;margin-top:12px;font-size:1rem;font-weight:600;letter-spacing:1px;"></p>
        <p id="galleryModalCounter" style="color:rgba(255,255,255,0.5);font-size:0.85rem;margin-top:4px;"></p>
    </div>
</div>

<script>
var galleryImages = [
    <?php foreach ($galleryImages as $img): ?>
    {src: '<?php echo asset($img["src"]); ?>', caption: '<?php echo $img["caption"]; ?>'},
    <?php endforeach; ?>
];
var currentImg = 0;

function openGallery(index) {
    currentImg = index;
    showImage();
    document.getElementById('galleryModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeGallery() {
    document.getElementById('galleryModal').style.display = 'none';
    document.body.style.overflow = '';
}
function showImage() {
    document.getElementById('galleryModalImg').src = galleryImages[currentImg].src;
    document.getElementById('galleryModalCaption').textContent = galleryImages[currentImg].caption;
    document.getElementById('galleryModalCounter').textContent = (currentImg + 1) + ' / ' + galleryImages.length;
}
function nextImage() { currentImg = (currentImg + 1) % galleryImages.length; showImage(); }
function prevImage() { currentImg = (currentImg - 1 + galleryImages.length) % galleryImages.length; showImage(); }

document.getElementById('galleryModal').addEventListener('click', function(e) { if (e.target === this) closeGallery(); });
document.addEventListener('keydown', function(e) {
    if (document.getElementById('galleryModal').style.display === 'flex') {
        if (e.key === 'Escape') closeGallery();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    }
});
</script>
<!-- Gallery Section End -->

<!-- Activities Section Start -->
<div class="container-fluid py-5" style="background:#fff;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">How We Help</h6>
            <h1 style="color:#1a1b2e;">Our <span style="color:#f26522;">Activities</span></h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:35px 25px;text-align:center;height:100%;transition:all 0.4s ease;box-shadow:0 4px 20px rgba(0,0,0,0.06);" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 12px 35px rgba(242,101,34,0.15)';this.style.borderColor='#f26522'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';this.style.borderColor='#eee'">
                    <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f26522,#ff8a50);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:1.8rem;color:#fff;box-shadow:0 8px 25px rgba(242,101,34,0.3);">
                        <i class="fas fa-first-aid"></i>
                    </div>
                    <h5 class="font-weight-bold mb-3" style="color:#1a1b2e;">Covid 19 Products</h5>
                    <p style="color:#666;font-size:0.9rem;line-height:1.7;margin:0;">Distributing essential Covid-19 safety products including masks, sanitizers, and medical supplies to communities in need.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:35px 25px;text-align:center;height:100%;transition:all 0.4s ease;box-shadow:0 4px 20px rgba(0,0,0,0.06);" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 12px 35px rgba(242,101,34,0.15)';this.style.borderColor='#f26522'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';this.style.borderColor='#eee'">
                    <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f26522,#ff8a50);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:1.8rem;color:#fff;box-shadow:0 8px 25px rgba(242,101,34,0.3);">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h5 class="font-weight-bold mb-3" style="color:#1a1b2e;">Serve People</h5>
                    <p style="color:#666;font-size:0.9rem;line-height:1.7;margin:0;">Dedicated to serving the underprivileged through food drives, healthcare camps, and community welfare programmes.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:35px 25px;text-align:center;height:100%;transition:all 0.4s ease;box-shadow:0 4px 20px rgba(0,0,0,0.06);" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 12px 35px rgba(242,101,34,0.15)';this.style.borderColor='#f26522'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';this.style.borderColor='#eee'">
                    <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f26522,#ff8a50);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:1.8rem;color:#fff;box-shadow:0 8px 25px rgba(242,101,34,0.3);">
                        <i class="fas fa-donate"></i>
                    </div>
                    <h5 class="font-weight-bold mb-3" style="color:#1a1b2e;">Donation</h5>
                    <p style="color:#666;font-size:0.9rem;line-height:1.7;margin:0;">Every contribution matters. Your generous donations help us sustain our initiatives and reach more people in need.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div style="background:#fff;border:1px solid #eee;border-radius:16px;padding:35px 25px;text-align:center;height:100%;transition:all 0.4s ease;box-shadow:0 4px 20px rgba(0,0,0,0.06);" onmouseover="this.style.transform='translateY(-10px)';this.style.boxShadow='0 12px 35px rgba(242,101,34,0.15)';this.style.borderColor='#f26522'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';this.style.borderColor='#eee'">
                    <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#f26522,#ff8a50);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:1.8rem;color:#fff;box-shadow:0 8px 25px rgba(242,101,34,0.3);">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <h5 class="font-weight-bold mb-3" style="color:#1a1b2e;">Community Support</h5>
                    <p style="color:#666;font-size:0.9rem;line-height:1.7;margin:0;">Building stronger communities through awareness campaigns, skill development, and grassroots support programmes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Activities Section End -->

<!-- Donate Section Start -->
<div class="container-fluid py-5" style="background:url('<?php echo asset('img/donate.jpg') ?>') center center/cover no-repeat fixed;position:relative;">
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(26,27,46,0.9);"></div>
    <div class="container py-5 position-relative" style="z-index:1;">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="section-title mb-4">
                    <h6 class="text-uppercase" style="color:#f26522;letter-spacing:3px;font-weight:600;">Make a Donation</h6>
                    <h1 class="text-white">Your Small Help Can Make a <span style="color:#f26522;">Big Difference</span></h1>
                </div>
                <p class="text-white mb-4" style="opacity:0.85;line-height:1.8;">Your generosity enables us to continue our mission of empowering women, educating children, and supporting the elderly and disabled. Every rupee counts in creating a more equal society.</p>
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
                            <input type="text" class="form-control border-0 p-4" placeholder="Your Name" style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 p-4" placeholder="Your Email" style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div class="form-group">
                            <select class="form-control border-0 p-4" style="background:#f8f9fa;border-radius:8px;height:auto;">
                                <option selected>Select a Cause</option>
                                <option>Women Empowerment</option>
                                <option>Hunger Reduction</option>
                                <option>Education For All</option>
                                <option>General Fund</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control border-0 p-4" placeholder="Amount (INR)" style="background:#f8f9fa;border-radius:8px;">
                        </div>
                        <div>
                            <button class="btn btn-block py-3" type="submit" style="background:#f26522;color:#fff;border-radius:8px;font-weight:600;font-size:1.1rem;">Donate Now</button>
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
<div class="container-fluid py-5" style="background:#f8f9fa;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">From Our Blog</h6>
            <h1 style="color:#1a1b2e;">Latest <span style="color:#f26522;">News & Articles</span></h1>
        </div>
        <div class="row" style="display:flex;flex-wrap:wrap;">
            <?php if (empty($latestBlogs)): ?>
                <div class="col-12 text-center"><p style="color:#999;">No blog posts published yet.</p></div>
            <?php else: ?>
                <?php $delays = [100, 200, 300]; $idx = 0; ?>
                <?php foreach ($latestBlogs as $bp): ?>
                    <div class="col-lg-4 col-md-6 mb-4 d-flex" data-aos="fade-up" data-aos-delay="<?= $delays[$idx] ?? 100 ?>">
                        <a href="<?= url('blog/' . $bp['slug']) ?>" class="d-flex flex-column" style="border-radius:12px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;width:100%;text-decoration:none;color:inherit;cursor:pointer;" onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 25px rgba(0,0,0,0.08)'">
                            <div style="position:relative;overflow:hidden;">
                                <?php
                                $blogImg = $bp['image'] ? asset('uploads/blogs/' . $bp['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg');
                                ?>
                                <img class="w-100" src="<?= $blogImg ?>" alt="<?= htmlspecialchars($bp['title']) ?>" style="height:220px;object-fit:cover;transition:transform 0.5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                <?php if (!empty($bp['category'])): ?>
                                <div style="position:absolute;top:15px;left:15px;background:#f26522;color:#fff;padding:5px 14px;border-radius:20px;font-size:0.75rem;font-weight:600;">
                                    <?= htmlspecialchars($bp['category']) ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1">
                                <div class="d-flex align-items-center mb-3" style="gap:15px;">
                                    <small style="color:#999;"><i class="far fa-calendar-alt mr-1" style="color:#f26522;"></i> <?= date('M d, Y', strtotime($bp['created_at'])) ?></small>
                                    <small style="color:#999;"><i class="far fa-user mr-1" style="color:#f26522;"></i> <?= htmlspecialchars($bp['author'] ?? 'Admin') ?></small>
                                    <?php
                                    $hcStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ? AND status = 'approved'");
                                    $hcStmt->execute([$bp['id']]);
                                    $hcCount = $hcStmt->fetchColumn();
                                    ?>
                                    <small style="color:#999;"><i class="far fa-comment mr-1" style="color:#f26522;"></i> <?= $hcCount ?></small>
                                </div>
                                <h5 class="font-weight-bold mb-2" style="color:#1a1b2e;font-size:1.1rem;line-height:1.4;"><?= htmlspecialchars($bp['title']) ?></h5>
                                <p class="flex-grow-1" style="color:#666;font-size:0.9rem;line-height:1.7;"><?= htmlspecialchars(mb_strimwidth(strip_tags($bp['content'] ?? ''), 0, 150, '...')) ?></p>
                                <span style="color:#f26522;font-weight:600;font-size:0.9rem;display:inline-flex;align-items:center;">
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

<!-- Owl Carousel & AOS Initialization -->
<script>
    $(document).ready(function() {
        // Events Carousel
        $(".events-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            margin: 30,
            dots: true,
            loop: true,
            nav: false,
            responsive: {
                0: { items: 1 },
                576: { items: 1 },
                768: { items: 2 },
                992: { items: 3 }
            }
        });
    });
</script>

<?php include '../app/views/layout/footer.php'; ?>
