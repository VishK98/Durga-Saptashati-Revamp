<?php
require_once '../app/config/config.php';

$pageTitle = "About Us";
$pageDescription = "Learn about Durga Saptashati Foundation, a spiritual organization dedicated to serving humanity through the divine grace of Goddess Durga. Discover our mission, vision, and commitment to community service.";
$pageKeywords = "About Durga Saptashati, our mission, our vision, NGO, spiritual foundation, community service, education, healthcare, women empowerment";

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


<!-- About Start -->
<div class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img" data-parallax="scroll" data-image-src="<?= asset('img/about.jpg') ?>"></div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <p>Learn About Us</p>
                    <h2>Spiritual foundation serving humanity worldwide</h2>
                </div>
                <div class="about-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#tab-content-1">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tab-content-2">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#tab-content-3">Vision</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-content-1" class="container-fluid tab-pane active">
                            Durga Saptashati Foundation is a spiritual non-profit organization dedicated to serving
                            humanity through the divine grace of Goddess Durga. Founded on the principles of compassion,
                            service, and spiritual growth, we work tirelessly to provide educational opportunities,
                            healthcare services, food security, and spiritual guidance to those in need. Our foundation
                            believes that by serving others, we serve the Divine Mother and contribute to creating a
                            more harmonious and just society for all.
                        </div>
                        <div id="tab-content-2" class="container-fluid tab-pane fade">
                            Our mission is to spread the divine teachings of the Durga Saptashati and serve humanity
                            through various charitable activities. We aim to provide education, healthcare, nutrition,
                            spiritual guidance, and social support to underprivileged communities, fostering personal
                            growth and societal well-being through the blessings of Durga Ma. We strive to be an
                            instrument of divine service, helping individuals realize their potential while promoting
                            values of compassion, equality, and spiritual consciousness.
                        </div>
                        <div id="tab-content-3" class="container-fluid tab-pane fade">
                            We envision a world where every individual has access to education, healthcare, proper
                            nutrition, and spiritual enlightenment. Through the grace of the Divine Mother, we strive to
                            create a society based on compassion, equality, and service, where everyone can realize
                            their full potential and contribute to the greater good. Our vision is to establish
                            sustainable communities that embody the divine principles of love, service, and spiritual
                            awakening across the globe.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="facts" data-parallax="scroll" data-image-src="<?= asset('img/facts.jpg') ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="facts-item">
                    <i class="flaticon-home"></i>
                    <div class="facts-text">
                        <h3 class="facts-plus" data-toggle="counter-up">25</h3>
                        <p>Communities Served</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facts-item">
                    <i class="flaticon-charity"></i>
                    <div class="facts-text">
                        <h3 class="facts-plus" data-toggle="counter-up">150</h3>
                        <p>Active Volunteers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facts-item">
                    <i class="flaticon-kindness"></i>
                    <div class="facts-text">
                        <h3 class="facts-dollar" data-toggle="counter-up">500000</h3>
                        <p>Our Goal (₹)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facts-item">
                    <i class="flaticon-donation"></i>
                    <div class="facts-text">
                        <h3 class="facts-dollar" data-toggle="counter-up">250000</h3>
                        <p>Funds Raised (₹)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Team Start -->
<div class="team">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Meet Our Team</p>
            <h2>Dedicated souls behind our divine service</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-1.jpg') ?>" alt="Team Image">
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
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-2.jpg') ?>" alt="Team Image">
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
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-3.jpg') ?>" alt="Team Image">
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
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-4.jpg') ?>" alt="Team Image">
                    </div>
                    <div class="team-text">
                        <h2>Meera Devi</h2>
                        <p>Community Outreach Director</p>
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


<!-- Testimonial Start -->
<div class="testimonial">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Testimonial</p>
            <h2>What people say about our foundation and services</h2>
        </div>
        <div class="owl-carousel testimonials-carousel">
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?= asset('img/testimonial-1.jpg') ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Anjali Singh</h3>
                        <p>Beneficiary Parent</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "The foundation has been a blessing for our family. Their educational support helped my daughter
                        complete her studies. We are forever grateful to Durga Ma and this wonderful organization for
                        their compassionate service."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?= asset('img/testimonial-2.jpg') ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Ram Prakash</h3>
                        <p>Community Leader</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "Their healthcare initiatives have transformed our village. The free medical camps and medicines
                        have been a lifeline for many families. This is true service to humanity through divine grace."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?= asset('img/testimonial-3.jpg') ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Dr. Sita Sharma</h3>
                        <p>Volunteer Doctor</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "Volunteering with this foundation has been a spiritually enriching experience. The dedication
                        and compassion of the entire team is inspiring. It's a privilege to serve the Divine Mother
                        through service to humanity."
                    </p>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-profile">
                    <img src="<?= asset('img/testimonial-4.jpg') ?>" alt="Image">
                    <div class="testimonial-name">
                        <h3>Mohan Kumar</h3>
                        <p>Regular Donor</p>
                    </div>
                </div>
                <div class="testimonial-text">
                    <p>
                        "I have been supporting this foundation for years. Their transparency and genuine commitment to
                        helping the needy makes me confident that every rupee donated makes a real difference in
                        someone's life."
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php include '../app/views/layout/footer.php'; ?>