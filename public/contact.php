<?php
require_once '../app/config/config.php';

$pageTitle = "Contact Us";
$pageDescription = "Get in touch with Durga Saptashati Foundation. Contact us for inquiries, volunteer opportunities, partnerships, or donations.";
$pageKeywords = "contact Durga Saptashati, contact NGO, volunteer, partnership, donate";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Contact Us</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('contact.php') ?>">Contact</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Info Cards -->
<div class="container-fluid">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Get In Touch</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">We'd Love to Hear From You</h2>
            <p style="color:#888;max-width:600px;margin:10px auto 0;">Have a question or want to get involved? Reach out
                to us and we'll respond as soon as possible.</p>
        </div>

        <!-- Info Cards -->
        <div class="row mb-4">
            <div class="col-lg-4 col-md-6 mb-3">
                <div style="background:#fff;border-radius:10px;padding:22px 20px;text-align:center;box-shadow:0 3px 15px rgba(0,0,0,0.05);height:100%;transition:all 0.3s;border-bottom:3px solid transparent;"
                    onmouseover="this.style.transform='translateY(-5px)';this.style.borderBottomColor='#f26522'"
                    onmouseout="this.style.transform='translateY(0)';this.style.borderBottomColor='transparent'">
                    <div
                        style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                        <i class="fas fa-map-marker-alt" style="font-size:1.1rem;color:#f26522;"></i>
                    </div>
                    <h6 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;font-size:0.92rem;">Our Office Location
                    </h6>
                    <p style="color:#666;font-size:0.82rem;line-height:1.6;margin:0;">Property No. 150, Basement, Spine
                        Enclave, Block-C, Pocket-8, Sector-17, Dwarka, New Delhi - 110075</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div style="background:#fff;border-radius:10px;padding:22px 20px;text-align:center;box-shadow:0 3px 15px rgba(0,0,0,0.05);height:100%;transition:all 0.3s;border-bottom:3px solid transparent;"
                    onmouseover="this.style.transform='translateY(-5px)';this.style.borderBottomColor='#f26522'"
                    onmouseout="this.style.transform='translateY(0)';this.style.borderBottomColor='transparent'">
                    <div
                        style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                        <i class="fas fa-phone-alt" style="font-size:1.1rem;color:#f26522;"></i>
                    </div>
                    <h6 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;font-size:0.92rem;">Contact Number</h6>
                    <p style="color:#666;font-size:0.82rem;margin:0 0 4px;"><a href="tel:+919289088161"
                            style="color:#666;text-decoration:none;">+91-9289088161</a></p>
                    <p style="color:#aaa;font-size:0.75rem;margin:0;">Mon - Sat: 10:00 AM - 6:00 PM</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div style="background:#fff;border-radius:10px;padding:22px 20px;text-align:center;box-shadow:0 3px 15px rgba(0,0,0,0.05);height:100%;transition:all 0.3s;border-bottom:3px solid transparent;"
                    onmouseover="this.style.transform='translateY(-5px)';this.style.borderBottomColor='#f26522'"
                    onmouseout="this.style.transform='translateY(0)';this.style.borderBottomColor='transparent'">
                    <div
                        style="width:50px;height:50px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                        <i class="fas fa-envelope" style="font-size:1.1rem;color:#f26522;"></i>
                    </div>
                    <h6 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;font-size:0.92rem;">Email Address</h6>
                    <p style="color:#666;font-size:0.82rem;margin:0 0 4px;"><a href="mailto:support@saptashati.org"
                            style="color:#666;text-decoration:none;">support@saptashati.org</a></p>
                    <p style="color:#aaa;font-size:0.75rem;margin:0;">We reply within 24 hours</p>
                </div>
            </div>
        </div>

        <!-- Contact Form + Map -->
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div style="background:#fff;border-radius:14px;padding:35px;box-shadow:0 5px 25px rgba(0,0,0,0.06);">
                    <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;">Send Us a Message</h4>
                    <p style="color:#999;font-size:0.88rem;margin-bottom:25px;">Fill out the form below and we'll get
                        back to you shortly.</p>

                    <form id="contactForm" onsubmit="return false;">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label
                                    style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Full
                                    Name *</label>
                                <input type="text" name="name" required placeholder="Your full name"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label
                                    style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Email
                                    Address *</label>
                                <input type="email" name="email" required placeholder="you@email.com"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label
                                    style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Phone
                                    Number</label>
                                <input type="text" name="phone" placeholder="+91 XXXXXXXXXX"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label
                                    style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Subject
                                    *</label>
                                <input type="text" name="subject" required placeholder="How can we help?"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>
                        <div style="margin-bottom:20px;">
                            <label
                                style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Message
                                *</label>
                            <textarea name="message" required rows="5" placeholder="Write your message here..."
                                style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:all 0.3s;background:#f9fafb;"
                                onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
                        </div>
                        <button type="submit" id="contactSubmitBtn"
                            style="background:#f26522;color:#fff;border:none;padding:14px 35px;border-radius:10px;font-size:0.95rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;min-width:160px;"
                            onmouseover="this.style.background='#d4541a';this.style.boxShadow='0 8px 25px rgba(242,101,34,0.3)'"
                            onmouseout="this.style.background='#f26522';this.style.boxShadow='none'">
                            Send Message
                        </button>
                    </form>
                    <script>
                    document.getElementById('contactSubmitBtn').addEventListener('click', function() {
                        var form = document.getElementById('contactForm');
                        var btn = this;

                        // Validate required fields
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var subject = form.querySelector('[name="subject"]').value.trim();
                        var message = form.querySelector('[name="message"]').value.trim();

                        if (!name || !email || !subject || !message) {
                            showToast('Please fill in all required fields.', 'error');
                            return;
                        }

                        // Show spinner
                        var originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:contactSpin 0.6s linear infinite;vertical-align:middle;"></span>';

                        // AJAX request
                        var formData = new FormData(form);
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?= url("api/contact.php") ?>');
                        xhr.onload = function() {
                            btn.disabled = false;
                            btn.innerHTML = originalText;
                            try {
                                var res = JSON.parse(xhr.responseText);
                                if (res.success) {
                                    showToast(res.message, 'success');
                                    form.reset();
                                    window.scrollTo({top:0,behavior:'smooth'});
                                } else {
                                    showToast(res.message, 'error');
                                }
                            } catch(e) {
                                showToast('Something went wrong. Please try again.', 'error');
                            }
                        };
                        xhr.onerror = function() {
                            btn.disabled = false;
                            btn.innerHTML = originalText;
                            showToast('Network error. Please check your connection.', 'error');
                        };
                        xhr.send(formData);
                    });
                    </script>
                    <style>
                    @keyframes contactSpin { to { transform: rotate(360deg); } }
                    </style>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-5 mb-4">
                <div
                    style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.06);height:100%;display:flex;flex-direction:column;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.786559699947!2d77.04189!3d28.5823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1b0000000001%3A0x0!2sDwarka%2C%20New%20Delhi!5e0!3m2!1sen!2sin!4v1"
                        style="width:100%;flex:1;min-height:350px;border:none;" allowfullscreen=""
                        loading="lazy"></iframe>
                    <div style="padding:20px;background:#1a1b2e;color:#fff;">
                        <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                            <i class="fas fa-map-marker-alt" style="color:#f26522;"></i>
                            <span style="font-size:0.88rem;">Sector-17, Dwarka, New Delhi - 110075</span>
                        </div>
                        <div style="display:flex;gap:20px;">
                            <a href="tel:+919289088161" style="color:#f26522;font-size:0.85rem;text-decoration:none;"><i
                                    class="fas fa-phone-alt mr-1"></i> +91-9289088161</a>
                            <a href="mailto:support@saptashati.org"
                                style="color:#f26522;font-size:0.85rem;text-decoration:none;"><i
                                    class="fas fa-envelope mr-1"></i> support@saptashati.org</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>