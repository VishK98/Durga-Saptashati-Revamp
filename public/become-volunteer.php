<?php
require_once '../app/config/config.php';
$pageTitle = "Become a Volunteer";
$pageDescription = "Join our volunteer network and make a difference with Durga Saptashati Foundation's community programs.";
$pageKeywords = "become volunteer, volunteer network, community service, volunteer opportunities, join volunteers, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Become a Volunteer</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('become-volunteer.php') ?>">Become a Volunteer</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hero Section -->
<div class="container-fluid">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Join Our Team</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">Make a Difference with Your Time & Skills</h2>
            <p style="color:#888;max-width:700px;margin:10px auto 0;">Volunteering with Durga Saptashati Foundation is a rewarding way to contribute to society. Whether you have a few hours a week or want to commit long-term, your support can transform lives.</p>
        </div>

        <div class="row">
            <!-- Volunteer Form -->
            <div class="col-lg-7 mb-4" data-aos="fade-right">
                <div style="background:#fff;border-radius:14px;padding:35px;box-shadow:0 5px 25px rgba(0,0,0,0.06);">
                    <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;">Volunteer Application</h4>
                    <p style="color:#999;font-size:0.88rem;margin-bottom:25px;">Fill out the form below and our team will reach out to you.</p>

                    <form id="volunteerForm" onsubmit="return false;">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Full Name *</label>
                                <input type="text" name="name" required placeholder="Your full name"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Email Address *</label>
                                <input type="email" name="email" required placeholder="you@email.com"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Phone Number *</label>
                                <input type="text" name="phone" required placeholder="+91 XXXXXXXXXX"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Address</label>
                                <input type="text" name="address" placeholder="City, State"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>
                        <div style="margin-bottom:15px;">
                            <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Skills / Interests</label>
                            <textarea name="skills" rows="3" placeholder="e.g. Teaching, Event Management, Social Media, Healthcare..."
                                style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:all 0.3s;background:#f9fafb;"
                                onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
                        </div>
                        <div style="margin-bottom:20px;">
                            <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Why do you want to volunteer? *</label>
                            <textarea name="message" required rows="4" placeholder="Tell us what motivates you to volunteer..."
                                style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:all 0.3s;background:#f9fafb;"
                                onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
                        </div>
                        <button type="submit" id="volunteerSubmitBtn"
                            style="background:#f26522;color:#fff;border:none;padding:14px 35px;border-radius:10px;font-size:0.95rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;min-width:160px;"
                            onmouseover="this.style.background='#d4541a';this.style.boxShadow='0 8px 25px rgba(242,101,34,0.3)'"
                            onmouseout="this.style.background='#f26522';this.style.boxShadow='none'">
                            Submit Application
                        </button>
                    </form>
                    <script>
                    document.getElementById('volunteerSubmitBtn').addEventListener('click', function() {
                        var form = document.getElementById('volunteerForm');
                        var btn = this;
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var phone = form.querySelector('[name="phone"]').value.trim();
                        var message = form.querySelector('[name="message"]').value.trim();
                        if (!name || !email || !phone || !message) { showToast('Please fill in all required fields.', 'error'); return; }
                        var originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:formSpin 0.6s linear infinite;vertical-align:middle;"></span>';
                        var formData = new FormData(form);
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?= url("api/volunteer.php") ?>');
                        xhr.onload = function() {
                            btn.disabled = false; btn.innerHTML = originalText;
                            try { var res = JSON.parse(xhr.responseText); if (res.success) { showToast(res.message, 'success'); form.reset(); window.scrollTo({top:0,behavior:'smooth'}); } else { showToast(res.message, 'error'); } } catch(e) { showToast('Something went wrong. Please try again.', 'error'); }
                        };
                        xhr.onerror = function() { btn.disabled = false; btn.innerHTML = originalText; showToast('Network error. Please check your connection.', 'error'); };
                        xhr.send(formData);
                    });
                    </script>

                </div>
            </div>

            <!-- Side Info Cards -->
            <div class="col-lg-5 mb-4" data-aos="fade-left">
                <div style="background:#fff;border-radius:14px;padding:30px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:20px;">
                    <h5 style="color:#1a1b2e;font-weight:700;margin-bottom:20px;"><i class="fas fa-heart" style="color:#f26522;margin-right:8px;"></i> Why Volunteer?</h5>
                    <div style="margin-bottom:18px;display:flex;gap:12px;align-items:flex-start;">
                        <div style="width:40px;height:40px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-hands-helping" style="color:#f26522;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <h6 style="color:#1a1b2e;font-weight:600;margin-bottom:4px;font-size:0.9rem;">Make Real Impact</h6>
                            <p style="color:#888;font-size:0.82rem;margin:0;line-height:1.5;">Directly contribute to community development and touch lives that need it most.</p>
                        </div>
                    </div>
                    <div style="margin-bottom:18px;display:flex;gap:12px;align-items:flex-start;">
                        <div style="width:40px;height:40px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-user-graduate" style="color:#f26522;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <h6 style="color:#1a1b2e;font-weight:600;margin-bottom:4px;font-size:0.9rem;">Develop New Skills</h6>
                            <p style="color:#888;font-size:0.82rem;margin:0;line-height:1.5;">Gain experience in leadership, project management, and community engagement.</p>
                        </div>
                    </div>
                    <div style="margin-bottom:18px;display:flex;gap:12px;align-items:flex-start;">
                        <div style="width:40px;height:40px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-users" style="color:#f26522;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <h6 style="color:#1a1b2e;font-weight:600;margin-bottom:4px;font-size:0.9rem;">Join a Community</h6>
                            <p style="color:#888;font-size:0.82rem;margin:0;line-height:1.5;">Connect with like-minded individuals who share your passion for social change.</p>
                        </div>
                    </div>
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <div style="width:40px;height:40px;border-radius:50%;background:rgba(242,101,34,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-certificate" style="color:#f26522;font-size:0.9rem;"></i>
                        </div>
                        <div>
                            <h6 style="color:#1a1b2e;font-weight:600;margin-bottom:4px;font-size:0.9rem;">Get Recognized</h6>
                            <p style="color:#888;font-size:0.82rem;margin:0;line-height:1.5;">Receive certificates, letters of recommendation, and recognition for your service.</p>
                        </div>
                    </div>
                </div>

                <div style="background:linear-gradient(135deg,#1a1b2e,#2d2e45);border-radius:14px;padding:30px;color:#fff;">
                    <h5 style="font-weight:700;margin-bottom:12px;"><i class="fas fa-info-circle" style="color:#f26522;margin-right:8px;"></i> Need Help?</h5>
                    <p style="color:#ccc;font-size:0.85rem;margin-bottom:15px;">Have questions about volunteering? Contact our volunteer coordinator.</p>
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                        <i class="fas fa-phone-alt" style="color:#f26522;"></i>
                        <a href="tel:+919289088161" style="color:#fff;text-decoration:none;font-size:0.88rem;">+91-9289088161</a>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <i class="fas fa-envelope" style="color:#f26522;"></i>
                        <a href="mailto:support@saptashati.org" style="color:#fff;text-decoration:none;font-size:0.88rem;">support@saptashati.org</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
