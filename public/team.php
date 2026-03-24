<?php
require_once '../app/config/config.php';

$pageTitle = "Our Team";
$pageDescription = "Meet the dedicated team members and leadership of Durga Saptashati Foundation who work tirelessly to serve humanity through divine grace and compassionate service.";
$pageKeywords = "team, leadership, volunteers, staff, Durga Saptashati team, NGO leadership";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Team</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('team.php') ?>">Team</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="team">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Meet Our Team</p>
            <h2>Dedicated souls serving humanity through divine grace</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-1.jpg') ?>" alt="Swami Ramdev">
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
                        <img src="<?= asset('img/team-2.jpg') ?>" alt="Dr. Priya Sharma">
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
                        <img src="<?= asset('img/team-3.jpg') ?>" alt="Rajesh Kumar">
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
                        <img src="<?= asset('img/team-4.jpg') ?>" alt="Meera Devi">
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
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <div class="team-img">
                        <img src="<?= asset('img/team-1.jpg') ?>" alt="Arjun Singh">
                    </div>
                    <div class="team-text">
                        <h2>Arjun Singh</h2>
                        <p>Education Program Manager</p>
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
                        <img src="<?= asset('img/team-2.jpg') ?>" alt="Kavita Patel">
                    </div>
                    <div class="team-text">
                        <h2>Kavita Patel</h2>
                        <p>Women Empowerment Lead</p>
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
                        <img src="<?= asset('img/team-3.jpg') ?>" alt="Vikram Joshi">
                    </div>
                    <div class="team-text">
                        <h2>Vikram Joshi</h2>
                        <p>Finance & Operations</p>
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
                        <img src="<?= asset('img/team-4.jpg') ?>" alt="Sunita Gupta">
                    </div>
                    <div class="team-text">
                        <h2>Sunita Gupta</h2>
                        <p>Volunteer Coordinator</p>
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

<?php include '../app/views/layout/footer.php'; ?>