<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?= isset($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME . ' - Empowering Communities, Transforming Lives' ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="<?= isset($pageKeywords) ? $pageKeywords : 'NGO, Charity, Durga Saptashati, Foundation, Women Empowerment, Education, Healthcare, Community Development' ?>"
        name="keywords">
    <meta
        content="<?= isset($pageDescription) ? $pageDescription : (isset($metaDescription) ? $metaDescription : 'Durga Saptashati Foundation is dedicated to empowering communities through education, healthcare, women empowerment, and sustainable development programs across India.') ?>"
        name="description">
    <meta name="author" content="Durga Saptashati Foundation">

    <!-- Favicon -->
    <link href="<?= asset('img/favicon.ico') ?>" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?= asset('lib/flaticon/font/flaticon.css') ?>" rel="stylesheet">
    <link href="<?= asset('lib/animate/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <!-- AOS (Animate On Scroll) Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/page-header.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/navbar-responsive.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/mobile-navbar.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/hero-slider.css') ?>" rel="stylesheet">
    <!-- Page-Level Enhancements -->
    <link href="<?= asset('css/page-enhancements.css') ?>" rel="stylesheet">
    <!-- Typography Overrides for Compact Styling -->
    <link href="<?= asset('css/typography-overrides.css') ?>" rel="stylesheet">
    <!-- Coming Soon Pages Stylesheet -->
    <link href="<?= asset('css/coming-soon.css') ?>" rel="stylesheet">
    <!-- Shared Form/Modal Animations -->
    <link href="<?= asset('css/form-animations.css') ?>" rel="stylesheet">
    <!-- Gallery Lightbox Responsive -->
    <link href="<?= asset('css/gallery-lightbox.css') ?>" rel="stylesheet">
    <!-- Page-Specific Stylesheets -->
    <?php
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $pageSpecificCSS = [
        // About Us
        'about' => 'about.css',
        // Program Pages
        'school-support' => 'programs/school-support.css',
        'adult-literacy' => 'programs/adult-literacy.css',
        'digital-learning' => 'programs/digital-learning.css',
        'medical-camps' => 'programs/medical-camps.css',
        // Main Pages
        'index' => 'home.css',
        'causes' => 'causes.css',
        'blog-detail' => 'blog-detail.css',
    ];

    if (isset($pageSpecificCSS[$currentPage])) {
        echo '<link href="' . asset('css/' . $pageSpecificCSS[$currentPage]) . '" rel="stylesheet">';
    }
    ?>

    <!-- Enhanced Navbar JavaScript -->
    <script src="<?= asset('js/navbar-enhanced.js') ?>" defer></script>
</head>

<body>
    <!-- Header Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="row">
            <div class="col-md-8">
                <div class="top-bar-left">
                    <div class="text">
                        <i class="fa fa-phone-alt"></i>
                        <p>+91 9289088161</p>
                    </div>
                    <div class="text">
                        <i class="fa fa-envelope"></i>
                        <p>support@saptashati.org</p>
                    </div>
                    <div class="text">
                        <i class="fa fa-map-marker-alt"></i>
                        <p>Dwarka, New Delhi, India</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="top-bar-right">
                    <div class="social">
                        <a href="https://x.com/Saptashati_F" target="_blank" title="Follow us on Twitter"
                            data-toggle="tooltip" data-placement="bottom">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/Durgasaptashati.org" target="_blank"
                            title="Like us on Facebook" data-toggle="tooltip" data-placement="bottom">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/_saptashati/" target="_blank" title="Follow us on Instagram"
                            data-toggle="tooltip" data-placement="bottom">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCKWpbOcfN4HHrkFHmjz4l5Q" target="_blank"
                            title="Subscribe to our YouTube" data-toggle="tooltip" data-placement="bottom">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Bar End -->

    <!-- Nav Bar Start -->
    <nav class="navbar navbar-expand-lg navbar-modern">
        <div class="container-fluid px-3 px-md-4">
            <a href="<?= url('index.php') ?>" class="navbar-brand">
                <img src="<?= asset('images/logo-wide.webp') ?>" alt="Durga Saptashati Foundation">
            </a>

            <!-- Modern Hamburger Menu -->
            <button class="navbar-toggler" type="button" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Mobile Menu Header -->
                <div class="mobile-menu-header d-lg-none">
                    <img src="<?= asset('images/logo-wide.webp') ?>" alt="Durga Saptashati Foundation"
                        class="mobile-menu-logo">
                    <!-- Mobile Close Button -->
                    <button class="mobile-close" onclick="closeMobileMenu()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <ul class="navbar-nav mx-auto">
                    <!-- About Us -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('about.php') ?>">
                            <span class="nav-text">About Us</span>
                        </a>
                    </li>

                    <!-- Events Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= url('event.php') ?>" id="eventsDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">Events</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu events-mega" aria-labelledby="eventsDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Annual Programs</h6>
                                        <a class="dropdown-item" href="<?= url('durga-award.php') ?>">
                                            <i class="fas fa-trophy"></i> Durga Award
                                            <span class="item-description">Honouring the change makers</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('yoga-day.php') ?>">
                                            <i class="fas fa-spa"></i> International Yoga Day
                                            <span class="item-description">June 21st - Join thousands</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('womens-day.php') ?>">
                                            <i class="fas fa-female"></i> Women's Day
                                            <span class="item-description">March 8th - Empowerment events</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('independence-day.php') ?>">
                                            <i class="fas fa-flag"></i> Independence Day
                                            <span class="item-description">August 15th - Patriotic celebrations</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Festivals & Celebrations</h6>
                                        <a class="dropdown-item" href="<?= url('ganpati-celebration.php') ?>">
                                            <i class="fas fa-pray"></i> Ganpati Celebration
                                            <span class="item-description">Festival of Ganesha</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('diwali-celebration.php') ?>">
                                            <i class="fas fa-fire"></i> Diwali Celebration
                                            <span class="item-description">Festival of lights</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('cultural-programs.php') ?>">
                                            <i class="fas fa-theater-masks"></i> Cultural Programs
                                            <span class="item-description">Celebrating our heritage</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('saree-run.php') ?>">
                                            <i class="fas fa-running"></i> Saree Run
                                            <span class="item-description">Celebrating strength & culture</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Community Events</h6>
                                        <a class="dropdown-item" href="<?= url('hearing-aids-camp.php') ?>">
                                            <i class="fas fa-assistive-listening-systems"></i> Hearing Aids Camp
                                            <span class="item-description">Free hearing aid distribution</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('painting-competition.php') ?>">
                                            <i class="fas fa-palette"></i> Painting Competition
                                            <span class="item-description">Nurturing young creativity</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= url('event.php') ?>">
                                            <i class="fas fa-arrow-right"></i> View All Events
                                            <span class="item-description">Explore all our events</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Causes -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('causes.php') ?>">
                            <span class="nav-text">Our Causes</span>
                        </a>
                    </li>

                    <!-- Get Involved Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= url('volunteer.php') ?>" id="involvedDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">Get Involved</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu dropdown-menu-right involved-mega"
                            aria-labelledby="involvedDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=300&h=200&fit=crop"
                                                alt="Join Durga Saptashati Foundation" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Join Our Mission</h6>
                                                <p>Together we can make a difference</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Join Our Community</h6>
                                        <a class="dropdown-item" href="<?= url('become-member.php') ?>">
                                            <i class="fas fa-id-card"></i>
                                            <div>
                                                <strong>Become a Member</strong>
                                                <small>Join as a valued member</small>
                                            </div>
                                        </a>

                                        <a class="dropdown-item" href="<?= url('become-volunteer.php') ?>">
                                            <i class="fas fa-user-plus"></i>
                                            <div>
                                                <strong>Become a Volunteer</strong>
                                                <small>Join our volunteer network</small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('career-opportunities.php') ?>">
                                            <i class="fas fa-briefcase"></i>
                                            <div>
                                                <strong>Career Opportunities</strong>
                                                <small>Work with purpose</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Support Our Cause</h6>
                                        <a class="dropdown-item" href="<?= url('make-donation.php') ?>">
                                            <i class="fas fa-donate"></i>
                                            <div>
                                                <strong>Make a Donation</strong>
                                                <small>Every contribution matters</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Gallery -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('event-gallery.php') ?>">
                            <span class="nav-text">Gallery</span>
                        </a>
                    </li>

                    <!-- Blogs -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('blog.php') ?>">
                            <span class="nav-text">Blogs</span>
                        </a>
                    </li>

                    <!-- Investor -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('investor.php') ?>">
                            <span class="nav-text">Investor</span>
                        </a>
                    </li>

                </ul>

                <!-- Mobile CTA Button - Inside Mobile Menu -->
                <div class="mobile-cta-wrapper d-lg-none">
                    <a href="<?= url('contact.php') ?>" class="btn rally-btn mobile-cta-btn">
                        <span class="btn-text">Contact Us</span>
                        <span class="btn-icon"><i class="fas fa-phone-alt"></i></span>
                    </a>
                </div>
            </div>

            <!-- Desktop CTA Button -->
            <a href="<?= url('contact.php') ?>" class="btn rally-btn d-none d-lg-flex">
                <span class="btn-text">Contact Us</span>
                <span class="btn-icon"><i class="fas fa-phone-alt"></i></span>
            </a>
        </div>
    </nav>
    <!-- Nav Bar End -->