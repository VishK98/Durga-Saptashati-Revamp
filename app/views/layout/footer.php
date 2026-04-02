<!-- Enhanced Footer Start -->
<footer class="enhanced-footer">
    <div class="footer-main">
        <div class="container-fluid">
            <div class="row">
                <!-- Contact & Address Section -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget" data-aos="fade-up" data-aos-duration="800">
                        <div class="footer-logo mb-3">
                            <img src="<?= asset('images/logo-wide.webp') ?>" alt="Durga Saptashati Foundation"
                                class="footer-logo-img">
                        </div>
                        <div class="footer-contact">
                            <div class="contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <div class="contact-info">
                                    <span class="contact-label">Phone</span>
                                    <a href="tel:<?= preg_replace('/[^+0-9]/', '', SITE_PHONE) ?>" class="contact-value"><?= htmlspecialchars(SITE_PHONE) ?></a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <div class="contact-info">
                                    <span class="contact-label">Email</span>
                                    <a href="mailto:<?= htmlspecialchars(SITE_EMAIL) ?>" class="contact-value"><?= htmlspecialchars(SITE_EMAIL) ?></a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="contact-info">
                                    <span class="contact-label">Address</span>
                                    <span class="contact-value"><?= htmlspecialchars(SITE_ADDRESS) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        <h3 class="footer-title">Quick Links</h3>
                        <div class="footer-links">
                            <a href="<?php echo url('about.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>About Us
                            </a>
                            <a href="<?php echo url('event.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>Events
                            </a>
                            <a href="<?php echo url('causes.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>Our Causes
                            </a>
                            <a href="<?php echo url('blog.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>Blogs & Articles
                            </a>
                            <a href="<?php echo url('news.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>News & Insights
                            </a>
                            <a href="<?php echo url('contact.php'); ?>" class="footer-link">
                                <i class="fas fa-chevron-right"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Google Rating & Trust Section -->
                <?php
                require_once APP_PATH . '/helpers/google_reviews.php';
                $googleReview = getGoogleReviewData();
                $gRating = $googleReview['rating'];
                $gTotal = $googleReview['total_reviews'];
                $gReviewUrl = $googleReview['review_url'];
                $fullStars = floor($gRating);
                $hasHalf = ($gRating - $fullStars) >= 0.3;
                $emptyStars = 5 - $fullStars - ($hasHalf ? 1 : 0);
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <h3 class="footer-title">Our Rating & Trust</h3>

                        <!-- Google Rating -->
                        <div class="google-rating-widget">
                            <div class="rating-header mb-3">
                                <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png"
                                    alt="Google" class="google-logo">
                                <span class="rating-text text-bold">Reviews</span>
                            </div>
                            <?php if ($googleReview['fetched']): ?>
                            <div class="rating-display">
                                <div class="rating-stars">
                                    <?php for ($s = 0; $s < $fullStars; $s++): ?>
                                    <i class="fas fa-star filled"></i>
                                    <?php endfor; ?>
                                    <?php if ($hasHalf): ?>
                                    <i class="fas fa-star-half-alt filled"></i>
                                    <?php endif; ?>
                                    <?php for ($s = 0; $s < $emptyStars; $s++): ?>
                                    <i class="far fa-star filled"></i>
                                    <?php endfor; ?>
                                </div>
                                <div class="rating-info">
                                    <span class="rating-score"><?= $gRating ?></span>
                                    <span class="rating-count">(<?= number_format($gTotal) ?> reviews)</span>
                                </div>
                            </div>
                            <a href="<?= htmlspecialchars($gReviewUrl) ?>" target="_blank" rel="noopener noreferrer"
                                class="rating-link">
                                <i class="fas fa-external-link-alt"></i>
                                Write a Review
                            </a>
                            <?php else: ?>
                            <div class="rating-display">
                                <div class="rating-stars">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="far fa-star filled"></i>
                                </div>
                                <div class="rating-info">
                                    <span class="rating-count">Rate us on Google</span>
                                </div>
                            </div>
                            <a href="https://search.google.com/local/writereview?placeid=<?= htmlspecialchars(GOOGLE_PLACE_ID) ?>"
                                target="_blank" rel="noopener noreferrer" class="rating-link">
                                <i class="fas fa-external-link-alt"></i>
                                Write a Review
                            </a>
                            <?php endif; ?>
                        </div>

                        <!-- Trust Badges -->
                        <div class="trust-badges">
                            <div class="trust-item">
                                <i class="fas fa-certificate"></i>
                                <span>Certified NGO</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-shield-alt"></i>
                                <span>Trusted by 10K+</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Newsletter & Social Section -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                        <h3 class="footer-title">Stay Connected</h3>

                        <!-- Newsletter -->
                        <div class="newsletter-section">
                            <p class="newsletter-text">Subscribe to our newsletter for updates on our programs and
                                impact.</p>
                            <form id="newsletterForm" class="newsletter-form"
                                data-url="<?php echo url('api/newsletter.php'); ?>">
                                <div class="input-group">
                                    <input type="email" name="email" id="newsletterEmail"
                                        class="form-control newsletter-input" placeholder="Your email address" required>
                                    <button type="submit" class="newsletter-btn" id="newsletterBtn">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                            <div id="newsletterMsg" class="newsletter-msg"></div>
                        </div>

                        <!-- Social Media -->
                        <div class="social-media-section mt-3">
                            <h4 class="social-title">Follow Us</h4>
                            <div class="social-links">
                                <a href="https://x.com/Saptashati_F" target="_blank" class="social-link twitter"
                                    title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.facebook.com/Durgasaptashati.org" target="_blank"
                                    class="social-link facebook" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/durgasaptashatifoundation/" target="_blank"
                                    class="social-link instagram" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.youtube.com/channel/UCKWpbOcfN4HHrkFHmjz4l5Q" target="_blank"
                                    class="social-link youtube" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo url(); ?>"
                                class="brand-link"><?php echo APP_NAME; ?></a>. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom-links">
                        <a href="#" data-toggle="modal" data-target="#privacyModal" class="bottom-link">Privacy
                            Policy</a>
                        <span class="separator">|</span>
                        <a href="#" data-toggle="modal" data-target="#termsModal" class="bottom-link">Terms of
                            Service</a>
                        <span class="separator">|</span>
                        <p class="designed-by">Designed with <i class="fa fa-heart text-danger"></i> for <a
                                href="https://www.sandhyasingh.org.in/" target="_blank">Sandhya Singh</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Simple Footer CSS -->
<style>
/* Simple Footer Styles */
.enhanced-footer {
    background: #1a1b2e;
    color: #ffffff;
    position: relative;
}

.footer-main {
    padding: 60px 0 30px;
}

.footer-widget {
    margin-bottom: 30px;
}

.footer-logo-img {
    max-height: 75px;
    width: auto;
    filter: brightness(0) invert(1);
}

.footer-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: #f26522;
    margin-bottom: 20px;
}

/* Contact Section */
.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.contact-item i {
    color: #f26522;
    width: 18px;
    margin-right: 12px;
}

.contact-info {
    display: flex;
    flex-direction: column;
}

.contact-label {
    font-size: 0.8rem;
    color: #aaa;
    margin-bottom: 2px;
}

.contact-value {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-value:hover {
    color: #f26522;
    text-decoration: none;
}

/* Footer Links */
.footer-link {
    display: block;
    color: #ccc;
    text-decoration: none;
    padding: 6px 0;
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: #f26522;
    text-decoration: none;
}

.footer-link i {
    color: #f26522;
    font-size: 0.7rem;
    margin-right: 8px;
}

/* Google Rating Widget */
.google-rating-widget {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.rating-header {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}

.google-logo {
    height: 20px;
    margin-right: 8px;
}

.rating-stars {
    display: flex;
    gap: 2px;
    margin-bottom: 6px;
}

.rating-stars i {
    color: #ffd700;
    font-size: 1rem;
}

.rating-info {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
}

.rating-score {
    font-size: 1.4rem;
    font-weight: 600;
    color: #ffd700;
}

.rating-count {
    color: #ccc;
    font-size: 0.8rem;
}

.rating-link {
    color: #f26522;
    text-decoration: none;
    font-size: 0.85rem;
}

.rating-link:hover {
    color: #fff;
    text-decoration: none;
}

/* Trust Badges */
.trust-badges {
    display: flex;
    gap: 10px;
}

.trust-item {
    text-align: center;
    padding: 12px;
    background: rgba(242, 101, 34, 0.1);
    border-radius: 8px;
    flex: 1;
}

.trust-item i {
    color: #f26522;
    font-size: 1.2rem;
    margin-bottom: 5px;
    display: block;
}

.trust-item span {
    font-size: 0.75rem;
    color: #ccc;
}

/* Newsletter */
.newsletter-text {
    color: #ccc;
    font-size: 0.85rem;
    margin-bottom: 15px;
}

.newsletter-form .input-group {
    border-radius: 20px;
    overflow: hidden;
    height: 36px;
}


.newsletter-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    padding: 12px 16px;
    border-radius: 20px 0 0 20px;
    border-right: none;
}

.newsletter-input::placeholder {
    color: #aaa;
}

.newsletter-input:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: #f26522;
    color: #fff;
    box-shadow: none;
}

.newsletter-btn {
    background: #f26522;
    color: #fff;
    border: none;
    padding: 7px 14px;
    border-radius: 0 20px 20px 0;
}

.newsletter-btn:hover {
    background: #e55a1f;
}

.newsletter-msg {
    margin-top: 8px;
    font-size: 0.8rem;
    display: none;
}

.newsletter-msg.success {
    color: #10b981;
    display: block;
}

.newsletter-msg.error {
    color: #ef4444;
    display: block;
}

/* Social Media */
.social-title {
    font-size: 1rem;
    font-weight: 500;
    color: #f26522;
    margin-bottom: 15px;
    margin-top: 31px;
    /* text-align: center; */
}

.social-links {
    display: flex;
    justify-content: space-around;
    gap: 12px;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
}

.social-link.twitter {
    background: #1da1f2;
}

.social-link.facebook {
    background: #1877f2;
}

.social-link.instagram {
    background: #e4405f;
}

.social-link.youtube {
    background: #ff0000;
}

.social-link.linkedin {
    background: #0077b5;
}

.social-link:hover {
    transform: translateY(-2px);
}

/* Footer Bottom */
.footer-bottom {
    background: rgba(0, 0, 0, 0.2);
    padding: 20px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.copyright-text p {
    margin: 0;
    color: #ccc;
    font-size: 0.85rem;
}

.brand-link {
    color: #f26522;
    text-decoration: none;
}

.brand-link:hover {
    color: #fff;
    text-decoration: none;
}

.footer-bottom-links {
    text-align: right;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
}

.bottom-link {
    color: #ccc;
    text-decoration: none;
    font-size: 0.85rem;
}

.bottom-link:hover {
    color: #f26522;
    text-decoration: none;
}

.separator {
    color: #666;
}

.designed-by {
    margin: 0;
    color: #ccc;
    font-size: 0.85rem;
}

.designed-by a {
    color: #f26522;
    text-decoration: none;
}

.designed-by a:hover {
    color: #fff;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-main {
        padding: 40px 0 20px;
    }

    .footer-widget {
        margin-bottom: 25px;
        text-align: center;
    }

    .trust-badges {
        justify-content: center;
    }

    .footer-bottom-links {
        text-align: center;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }
}

@media (max-width: 576px) {
    .trust-badges {
        flex-direction: column;
    }

    .social-link {
        width: 36px;
        height: 36px;
    }
}
</style>
<!-- Enhanced Footer End -->

<!-- Back to top button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo asset('lib/easing/easing.min.js'); ?>"></script>
<script src="<?php echo asset('lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo asset('lib/waypoints/waypoints.min.js'); ?>"></script>
<script src="<?php echo asset('lib/counterup/counterup.min.js'); ?>"></script>
<script src="<?php echo asset('lib/parallax/parallax.min.js'); ?>"></script>

<!-- Video Modal Handler -->
<script>
$(document).ready(function() {
    $('#videoModal').on('show.bs.modal', function(e) {
        var src = $(e.relatedTarget).data('src');
        if (src) {
            $(this).find('iframe').attr('src', src + '?autoplay=1');
        }
    });
    $('#videoModal').on('hidden.bs.modal', function() {
        $(this).find('iframe').attr('src', '');
    });
});
</script>

<!-- Template Javascript -->
<script src="<?php echo asset('js/main.js'); ?>"></script>
<script src="<?php echo asset('js/hero-slider.js'); ?>"></script>

<!-- AOS (Animate On Scroll) JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100,
    easing: 'ease-in-out',
    delay: 0,
    anchorPlacement: 'top-bottom'
});

// Initialize parallax for facts section
$(document).ready(function() {
    // Force parallax initialization
    $('[data-parallax="scroll"]').each(function() {
        $(this).parallax();
    });
});

$(window).on('load', function() {
    // Reinitialize after window load
    $('[data-parallax="scroll"]').parallax('refresh');
});

// Refresh AOS on dynamic content changes
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        AOS.refresh();
    }, 500);
});

// Fix tab scrolling issue - prevent page from jumping to top
$(document).ready(function() {
    // Store current scroll position
    var scrollPos = 0;

    // Override default tab behavior
    $('.about-tab .nav-link').off('click').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        // Store current scroll position
        scrollPos = $(window).scrollTop();

        var $this = $(this);
        var target = $this.attr('data-target') || $this.attr('href');

        // Remove active class from all tabs and panes
        $('.about-tab .nav-link').removeClass('active');
        $('.about-tab .tab-pane').removeClass('show active');

        // Add active class to clicked tab and corresponding pane
        $this.addClass('active');
        $(target).addClass('show active');

        // Restore scroll position
        $(window).scrollTop(scrollPos);

        // Prevent any default action
        return false;
    });

    // Prevent Bootstrap's default tab behavior from scrolling
    $('[data-toggle="pill"]').on('show.bs.tab', function(e) {
        scrollPos = $(window).scrollTop();
    });

    $('[data-toggle="pill"]').on('shown.bs.tab', function(e) {
        $(window).scrollTop(scrollPos);
    });
});

// Fix parallax with AOS animation
$(document).ready(function() {
    // Refresh parallax after AOS animations complete
    setTimeout(function() {
        if (typeof $.fn.parallax !== 'undefined') {
            $('.about-img').parallax('refresh');
        }
    }, 1500);

    // Ensure about image animates properly
    var aboutImg = $('.about .about-img');
    if (aboutImg.length) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('aos-animate');
                }
            });
        }, {
            threshold: 0.1
        });

        aboutImg.each(function() {
            observer.observe(this);
        });
    }
});

// Initialize Bootstrap tooltips globally
if (window.jQuery && typeof $().tooltip === 'function') {
    jQuery(function() {
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
}
</script>

<!-- Global Toaster -->
<div id="toasterContainer"
    style="position:fixed;top:20px;right:20px;z-index:999999;display:flex;flex-direction:column;gap:10px;pointer-events:none;">
</div>
<style>
.toaster {
    pointer-events: all;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 20px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    font-size: 0.9rem;
    font-family: inherit;
    min-width: 300px;
    max-width: 420px;
    transform: translateX(120%);
    animation: toastIn 0.4s ease forwards;
    border-left: 4px solid #10b981;
}

.toaster.toast-success {
    border-left-color: #10b981;
}

.toaster.toast-success .toast-icon {
    color: #10b981;
}

.toaster.toast-error {
    border-left-color: #ef4444;
}

.toaster.toast-error .toast-icon {
    color: #ef4444;
}

.toaster.toast-info {
    border-left-color: #3b82f6;
}

.toaster.toast-info .toast-icon {
    color: #3b82f6;
}

.toaster .toast-icon {
    font-size: 1.2rem;
    flex-shrink: 0;
}

.toaster .toast-body {
    flex: 1;
}

.toaster .toast-body strong {
    display: block;
    color: #1a1b2e;
    font-size: 0.88rem;
    margin-bottom: 2px;
}

.toaster .toast-body span {
    color: #666;
    font-size: 0.82rem;
}

.toaster .toast-close {
    background: none;
    border: none;
    color: #999;
    font-size: 1.1rem;
    cursor: pointer;
    padding: 0 0 0 8px;
    flex-shrink: 0;
    transition: color 0.2s;
}

.toaster .toast-close:hover {
    color: #333;
}

.toaster .toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    border-radius: 0 0 0 10px;
    animation: toastProgress 3s linear forwards;
}

.toaster.toast-success .toast-progress {
    background: #10b981;
}

.toaster.toast-error .toast-progress {
    background: #ef4444;
}

.toaster.toast-info .toast-progress {
    background: #3b82f6;
}

.toaster.removing {
    animation: toastOut 0.3s ease forwards;
}

@keyframes toastIn {
    from {
        transform: translateX(120%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes toastOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }

    to {
        transform: translateX(120%);
        opacity: 0;
    }
}

@keyframes toastProgress {
    from {
        width: 100%;
    }

    to {
        width: 0%;
    }
}
</style>
<script>
function showToast(message, type, title) {
    type = type || 'success';
    title = title || (type === 'success' ? 'Success' : type === 'error' ? 'Error' : 'Info');
    var icons = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        info: 'fa-info-circle'
    };
    var container = document.getElementById('toasterContainer');
    var toast = document.createElement('div');
    toast.className = 'toaster toast-' + type;
    toast.style.position = 'relative';
    toast.style.overflow = 'hidden';
    toast.innerHTML = '<i class="fas ' + icons[type] + ' toast-icon"></i>' +
        '<div class="toast-body"><strong>' + title + '</strong><span>' + message + '</span></div>' +
        '<button class="toast-close" onclick="removeToast(this.parentElement)">&times;</button>' +
        '<div class="toast-progress"></div>';
    container.appendChild(toast);
    setTimeout(function() {
        removeToast(toast);
    }, 3000);
}

function removeToast(el) {
    if (!el || el.classList.contains('removing')) return;
    el.classList.add('removing');
    setTimeout(function() {
        if (el.parentElement) el.parentElement.removeChild(el);
    }, 300);
}
</script>

<script>
// Newsletter AJAX
(function() {
    var form = document.getElementById('newsletterForm');
    if (!form) return;
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var email = document.getElementById('newsletterEmail').value.trim();
        var btn = document.getElementById('newsletterBtn');
        var msg = document.getElementById('newsletterMsg');
        if (!email) return;
        var origHTML = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        msg.className = 'newsletter-msg';
        msg.textContent = '';
        var fd = new FormData();
        fd.append('email', email);
        fetch(form.getAttribute('data-url'), {
                method: 'POST',
                body: fd
            })
            .then(function(r) {
                return r.json();
            })
            .then(function(data) {
                btn.disabled = false;
                btn.innerHTML = origHTML;
                msg.textContent = data.message;
                msg.className = 'newsletter-msg ' + (data.success ? 'success' : 'error');
                if (data.success) {
                    document.getElementById('newsletterEmail').value = '';
                    showToast(data.message, 'success');
                }
            })
            .catch(function() {
                btn.disabled = false;
                btn.innerHTML = origHTML;
                msg.textContent = 'Network error. Please try again.';
                msg.className = 'newsletter-msg error';
            });
    });
})();
</script>

<?php
// Auto-show toasters from session flash messages
$toastTypes = [
    'toast_success' => 'success',
    'toast_error' => 'error',
    'toast_info' => 'info'
];
foreach ($toastTypes as $key => $type) {
    if (!empty($_SESSION[$key])) {
        echo "<script>document.addEventListener('DOMContentLoaded',function(){showToast('" . addslashes(htmlspecialchars($_SESSION[$key])) . "','" . $type . "');});</script>";
        unset($_SESSION[$key]);
    }
}
?>
</body>

</html>