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
    <link href="<?= asset('css/navbar-responsive.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/mobile-navbar.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/hero-slider.css') ?>" rel="stylesheet">
    <!-- Page-Level Enhancements -->
    <link href="<?= asset('css/page-enhancements.css') ?>" rel="stylesheet">
    <!-- Typography Overrides for Compact Styling -->
    <link href="<?= asset('css/typography-overrides.css') ?>" rel="stylesheet">
    <!-- Coming Soon Pages Stylesheet -->
    <link href="<?= asset('css/coming-soon.css') ?>" rel="stylesheet">
    <!-- Page-Specific Stylesheets -->
    <?php
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $pageSpecificCSS = [
        // About Us Pages
        'achievements' => 'about-us/achievements.css',
        'our-story' => 'about-us/our-story.css',
        'leadership' => 'about-us/leadership.css',
        'vision-mission' => 'about-us/vision-mission.css',
        // Program Pages
        'school-support' => 'programs/school-support.css',
        'adult-literacy' => 'programs/adult-literacy.css',
        'digital-learning' => 'programs/digital-learning.css',
        'medical-camps' => 'programs/medical-camps.css'
    ];

    if (isset($pageSpecificCSS[$currentPage])) {
        echo '<link href="' . asset('css/' . $pageSpecificCSS[$currentPage]) . '" rel="stylesheet">';
    }
    ?>

    <!-- Enhanced Navbar JavaScript -->
    <script src="<?= asset('js/navbar-enhanced.js') ?>" defer></script>
    <!-- Hero Slider JavaScript -->
    <script src="<?= asset('js/hero-slider.js') ?>" defer></script>
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
                    <!-- About Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= url('about.php') ?>" id="aboutDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">About Us</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu about-mega" aria-labelledby="aboutDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=300&h=200&fit=crop"
                                                alt="About Durga Saptashati Foundation" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Our Mission</h6>
                                                <p>Empowering communities since inception</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Organization</h6>
                                        <a class="dropdown-item" href="<?= url('our-story.php') ?>">
                                            <i class="fas fa-heart"></i> Our Story & History
                                            <span class="item-description">Learn about our journey and founding
                                                principles</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('vision-mission.php') ?>">
                                            <i class="fas fa-eye"></i> Vision & Mission
                                            <span class="item-description">Our goals for a better tomorrow</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('leadership.php') ?>">
                                            <i class="fas fa-users"></i> Leadership Team
                                            <span class="item-description">Meet the people behind our mission</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('achievements.php') ?>">
                                            <i class="fas fa-award"></i> Our Achievements
                                            <span class="item-description">Milestones and recognition over the
                                                years</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Transparency</h6>
                                        <a class="dropdown-item" href="<?= url('our-investors.php') ?>">
                                            <i class="fas fa-chart-line"></i> Our Investors & Partners
                                            <span class="item-description">Major donors and supporters</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Programs & Services Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= url('service.php') ?>" id="programsDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">Programs</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu programs-mega" aria-labelledby="programsDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=250&h=180&fit=crop"
                                                alt="Education Programs" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Education</h6>
                                            </div>
                                        </div>
                                        <h6 class="dropdown-header">Education</h6>
                                        <a class="dropdown-item" href="<?= url('school-support.php') ?>">
                                            <i class="fas fa-graduation-cap"></i> School Support
                                            <span class="item-description">Scholarships and school infrastructure</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('adult-literacy.php') ?>">
                                            <i class="fas fa-book"></i> Adult Literacy
                                            <span class="item-description">Teaching reading and writing to adults</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('digital-learning.php') ?>">
                                            <i class="fas fa-laptop"></i> Digital Learning
                                            <span class="item-description">Computer education and online
                                                resources</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=250&h=180&fit=crop"
                                                alt="Healthcare Services" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Healthcare</h6>
                                            </div>
                                        </div>
                                        <h6 class="dropdown-header">Healthcare</h6>
                                        <a class="dropdown-item" href="<?= url('medical-camps.php') ?>">
                                            <i class="fas fa-heartbeat"></i> Medical Camps
                                            <span class="item-description">Free health checkups and treatments</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('maternal-care.php') ?>">
                                            <i class="fas fa-baby"></i> Maternal Care
                                            <span class="item-description">Supporting mothers and newborns</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('health-awareness.php') ?>">
                                            <i class="fas fa-user-md"></i> Health Awareness
                                            <span class="item-description">Preventive healthcare education</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=250&h=180&fit=crop"
                                                alt="Women Empowerment" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Empowerment</h6>
                                            </div>
                                        </div>
                                        <h6 class="dropdown-header">Women Empowerment</h6>
                                        <a class="dropdown-item" href="<?= url('womens-rights.php') ?>">
                                            <i class="fas fa-venus"></i> Women's Rights
                                            <span class="item-description">Legal aid and awareness programs</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('skill-development.php') ?>">
                                            <i class="fas fa-briefcase"></i> Skill Development
                                            <span class="item-description">Vocational training for employment</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('self-help-groups.php') ?>">
                                            <i class="fas fa-coins"></i> Self Help Groups
                                            <span class="item-description">Financial independence initiatives</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=250&h=180&fit=crop"
                                                alt="Community Development" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Community</h6>
                                            </div>
                                        </div>
                                        <h6 class="dropdown-header">Community Development</h6>
                                        <a class="dropdown-item" href="<?= url('rural-development.php') ?>">
                                            <i class="fas fa-home"></i> Rural Development
                                            <span class="item-description">Infrastructure and facilities for
                                                villages</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('environment-care.php') ?>">
                                            <i class="fas fa-tree"></i> Environment Care
                                            <span class="item-description">Tree plantation and conservation</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('disaster-relief.php') ?>">
                                            <i class="fas fa-hands-helping"></i> Disaster Relief
                                            <span class="item-description">Emergency response and rehabilitation</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Causes Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= url('causes.php') ?>" id="causesDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">Causes</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu causes-mega" aria-labelledby="causesDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mega-featured-section">
                                            <h5><i class="fas fa-fire"></i> Urgent Causes</h5>
                                            <a class="dropdown-item featured" href="<?= url('urgent-causes.php') ?>">
                                                <i class="fas fa-exclamation-triangle"></i> Emergency Relief
                                                <span class="feature-badge hot">URGENT</span>
                                            </a>
                                            <a class="dropdown-item featured"
                                                href="<?= url('medical-emergencies.php') ?>">
                                                <i class="fas fa-heartbeat"></i> Medical Emergencies
                                                <span class="item-description">Critical healthcare support needed</span>
                                            </a>
                                            <a class="dropdown-item featured"
                                                href="<?= url('disaster-response.php') ?>">
                                                <i class="fas fa-house-damage"></i> Disaster Response
                                                <span class="item-description">Immediate relief for affected
                                                    families</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="dropdown-header">Active Campaigns</h6>
                                        <a class="dropdown-item" href="<?= url('education-for-all.php') ?>">
                                            <i class="fas fa-graduation-cap"></i> Education for All
                                            <span class="item-description">Help 500 children get quality
                                                education</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('zero-hunger.php') ?>">
                                            <i class="fas fa-utensils"></i> Zero Hunger
                                            <span class="item-description">Daily meals for 1000+ families</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('clean-water-project.php') ?>">
                                            <i class="fas fa-tint"></i> Clean Water Project
                                            <span class="item-description">Providing clean water to villages</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="dropdown-header">Long-term Goals</h6>
                                        <a class="dropdown-item" href="<?= url('women-empowerment-causes.php') ?>">
                                            <i class="fas fa-female"></i> Women Empowerment
                                            <span class="item-description">Creating equal opportunities</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('healthcare-access.php') ?>">
                                            <i class="fas fa-hospital"></i> Healthcare Access
                                            <span class="item-description">Medical facilities for all</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('environmental-protection.php') ?>">
                                            <i class="fas fa-leaf"></i> Environmental Protection
                                            <span class="item-description">Sustainable future initiatives</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mega-cta-card">
                                            <h4>Make a Difference</h4>
                                            <p>Your donation can change lives. Every contribution matters.</p>
                                            <div class="dropdown-stats">
                                                <div class="stat">
                                                    <span class="stat-value">₹50L+</span>
                                                    <span class="stat-label">Raised</span>
                                                </div>
                                                <div class="stat">
                                                    <span class="stat-value">5000+</span>
                                                    <span class="stat-label">Helped</span>
                                                </div>
                                            </div>
                                            <a href="<?= url('donate.php') ?>" class="btn-white">Donate Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div class="col-lg-3">
                                        <div class="mega-image">
                                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=300&h=200&fit=crop"
                                                alt="Events" class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Join Our Events</h6>
                                                <p>Be part of the change</p>
                                            </div>
                                        </div>
                                        <h6 class="dropdown-header">Upcoming Events</h6>
                                        <a class="dropdown-item featured" href="<?= url('event.php') ?>">
                                            <i class="fas fa-calendar-check"></i> This Month
                                            <span class="feature-badge new">5 NEW</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="dropdown-header">Annual Programs</h6>
                                        <a class="dropdown-item" href="<?= url('international-yoga-day.php') ?>">
                                            <i class="fas fa-om"></i> International Yoga Day
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
                                        <a class="dropdown-item" href="<?= url('ganpati-celebration.php') ?>">
                                            <i class="fas fa-star"></i> Ganpati Celebration
                                            <span class="item-description">Festival of Ganesha</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="dropdown-header">Community Events</h6>
                                        <a class="dropdown-item" href="<?= url('health-camps-events.php') ?>">
                                            <i class="fas fa-heartbeat"></i> Health Camps
                                            <span class="item-description">Free medical checkup camps</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('blood-donation-drives.php') ?>">
                                            <i class="fas fa-tint"></i> Blood Donation Drives
                                            <span class="item-description">Save lives by donating blood</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('education-workshops.php') ?>">
                                            <i class="fas fa-book"></i> Education Workshops
                                            <span class="item-description">Skills and career guidance</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('cultural-programs.php') ?>">
                                            <i class="fas fa-theater-masks"></i> Cultural Programs
                                            <span class="item-description">Celebrating our heritage</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="dropdown-header">Get Involved</h6>
                                        <a class="dropdown-item" href="<?= url('volunteer-events.php') ?>">
                                            <i class="fas fa-hands-helping"></i> Volunteer at Events
                                            <span class="item-description">Join us in making events successful</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('organize-event.php') ?>">
                                            <i class="fas fa-calendar-plus"></i> Organize an Event
                                            <span class="item-description">Host an event in your area</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('sponsor-events.php') ?>">
                                            <i class="fas fa-handshake"></i> Sponsor Events
                                            <span class="item-description">Support our initiatives financially</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= url('event-gallery.php') ?>">
                                            <i class="fas fa-images"></i> Event Gallery
                                            <span class="item-description">Browse photos from past events</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Blogs -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url('blog.php') ?>">
                            <span class="nav-text">Blogs</span>
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