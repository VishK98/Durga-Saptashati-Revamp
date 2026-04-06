<!DOCTYPE html>
<html lang="en">

<?php
// SEO defaults
$seoTitle = isset($pageTitle) ? $pageTitle : APP_NAME . ' - Empowering Communities, Transforming Lives';
$seoDesc = isset($pageDescription) ? $pageDescription : 'Durga Saptashati Foundation is dedicated to empowering communities through education, healthcare, women empowerment, and sustainable development programs across India.';
$seoKeywords = isset($pageKeywords) ? $pageKeywords : 'NGO, Charity, Durga Saptashati, Foundation, Women Empowerment, Education, Healthcare, Community Development';
$seoUrl = isset($pageCanonical) ? $pageCanonical : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . ($_SERVER['REQUEST_URI'] ?? '/');
$seoImage = isset($pageImage) ? $pageImage : asset('images/og-default.jpg');
$seoType = isset($pageType) ? $pageType : 'website';
?>
<head>
    <?php if (!empty(GA_MEASUREMENT_ID)): ?>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA_MEASUREMENT_ID ?>"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= GA_MEASUREMENT_ID ?>');
    </script>
    <?php endif; ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">

    <!-- SEO Core -->
    <title><?= htmlspecialchars($seoTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seoDesc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($seoKeywords) ?>">
    <meta name="author" content="<?= APP_NAME ?>">
    <link rel="canonical" href="<?= htmlspecialchars($seoUrl) ?>">

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:type" content="<?= $seoType ?>">
    <meta property="og:site_name" content="<?= APP_NAME ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seoTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seoDesc) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seoUrl) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seoImage) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@Saptashati_F">
    <meta name="twitter:title" content="<?= htmlspecialchars($seoTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seoDesc) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seoImage) ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?= asset('images/favicon.png') ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('images/favicon.png') ?>">
    <meta name="theme-color" content="#f26522">

    <!-- JSON-LD Organization Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "<?= APP_NAME ?>",
        "url": "<?= APP_URL ?>/public/",
        "logo": "<?= asset('images/logo-wide.png') ?>",
        "description": "<?= htmlspecialchars($seoDesc) ?>",
        "sameAs": [
            "https://www.instagram.com/durgasaptashatifoundation/",
            "https://www.facebook.com/Durgasaptashati.org",
            "https://x.com/Saptashati_F",
            "https://www.youtube.com/channel/UCKWpbOcfN4HHrkFHmjz4l5Q"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91 8826422990",
            "contactType": "customer service",
            "email": "support@saptashati.org",
            "areaServed": "IN",
            "availableLanguage": ["English", "Hindi"]
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "MNG Tower, Plot NO - 1 & 2, Pocket - A2",
            "addressLocality": "2nd Floor, Sector - 17, Near SBI Bank Dwarka",
            "addressRegion": "New Delhi",
            "postalCode": "110078",
            "addressCountry": "IN"
        }
    }
    </script>
    <?php if (!empty($pageSchema)): ?>
    <script type="application/ld+json"><?= $pageSchema ?></script>
    <?php endif; ?>

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
    <!-- Shared Gallery Cards + Lightbox -->
    <link href="<?= asset('css/gallery-cards.css') ?>" rel="stylesheet">
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
    <!-- Shared Gallery Lightbox + Counter JS -->
    <script src="<?= asset('js/gallery-lightbox.js') ?>" defer></script>
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
                        <a href="https://www.instagram.com/durgasaptashatifoundation/" target="_blank"
                            title="Follow us on Instagram" data-toggle="tooltip" data-placement="bottom">
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
        <div class="container-fluid">
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
                                        <div class="mega-image">
                                            <img src="<?= asset('images/strength.jpg') ?>" alt="Our Events"
                                                class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Our Events</h6>
                                                <p>Celebrations, programmes & more</p>
                                            </div>
                                        </div>
                                    </div>
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
                                        <a class="dropdown-item" href="<?= url('international-womens-day.php') ?>">
                                            <i class="fas fa-female"></i> Women's Day
                                            <span class="item-description">March 8th - Empowerment events</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('independence-day.php') ?>">
                                            <i class="fas fa-flag"></i> Independence Day
                                            <span class="item-description">August 15th - Patriotic celebrations</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Community Events</h6>
                                        <a class="dropdown-item" href="<?= url('saree-run.php') ?>">
                                            <i class="fas fa-running"></i> Saree Run
                                            <span class="item-description">Celebrating strength & culture</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('hearing-aids-camp.php') ?>">
                                            <i class="fas fa-assistive-listening-systems"></i> Hearing Aids Camp
                                            <span class="item-description">Free hearing aid distribution</span>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('cultural-programs.php') ?>">
                                            <i class="fas fa-theater-masks"></i> Cultural Programs
                                            <span class="item-description">Celebrating our heritage</span>
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
                                            <img src="<?= asset('images/unity.jpg') ?>"
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

                    <!-- Media Mega Dropdown -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="mediaDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-text">Media</span>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu dropdown-menu-right involved-mega"
                            aria-labelledby="mediaDropdown">
                            <div class="mega-dropdown-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mega-image">
                                            <img src="<?= asset('images/support-1.jpg') ?>" alt="Media & Updates"
                                                class="img-fluid rounded">
                                            <div class="mega-image-overlay">
                                                <h6>Media Centre</h6>
                                                <p>Photos, news & stories of impact</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Stories & Updates</h6>
                                        <a class="dropdown-item" href="<?= url('news.php') ?>">
                                            <i class="fas fa-newspaper"></i>
                                            <div>
                                                <strong>News & Updates</strong>
                                                <small>Latest announcements</small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="<?= url('blog.php') ?>">
                                            <i class="fas fa-blog"></i>
                                            <div>
                                                <strong>Blog & Articles</strong>
                                                <small>Insights & stories</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="dropdown-header">Visual Media</h6>
                                        <a class="dropdown-item" href="<?= url('event-gallery.php') ?>">
                                            <i class="fas fa-images"></i>
                                            <div>
                                                <strong>Photo Gallery</strong>
                                                <small>Event photos & memories</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    </a>
                </div>

                <!-- Mobile Social Links -->
                <div class="mobile-social-links d-lg-none">
                    <a href="https://x.com/Saptashati_F" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/Durgasaptashati.org" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/durgasaptashatifoundation/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCKWpbOcfN4HHrkFHmjz4l5Q" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Desktop CTA Button -->
            <a href="<?= url('contact.php') ?>" class="btn rally-btn d-none d-lg-flex">
                <span class="btn-text">Contact Us</span>
            </a>
        </div>
    </nav>
    <!-- Nav Bar End -->