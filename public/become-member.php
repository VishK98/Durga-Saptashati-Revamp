<?php
require_once '../app/config/config.php';
$pageTitle = "Become a Member";
$pageDescription = "Join Durga Saptashati Foundation as a member. Support our mission to empower underprivileged women and children through education, healthcare, and community development.";
$pageKeywords = "membership, join NGO, support charity, Durga Saptashati Foundation, member registration";
include '../app/views/layout/header.php';

$success = $_SESSION['membership_success'] ?? null;
if ($success)
    unset($_SESSION['membership_success']);
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Become a Member</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('become-member.php') ?>">Become a Member</a>
            </div>
        </div>
    </div>
</div>

<section style="padding:70px 0;background:linear-gradient(165deg,#f8f9fa,#fff);">
    <div class="container">
        <?php if ($success): ?>
        <div data-aos="fade-down"
            style="background:linear-gradient(135deg,#ecfdf5,#d1fae5);border:1px solid #6ee7b7;border-radius:16px;padding:25px 30px;margin-bottom:35px;display:flex;align-items:center;gap:15px;">
            <div
                style="width:50px;height:50px;background:#059669;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="fas fa-check" style="color:#fff;font-size:1.3rem;"></i>
            </div>
            <div>
                <h5 style="color:#065f46;font-weight:700;margin:0 0 4px;">Application Submitted!</h5>
                <p style="color:#047857;margin:0;font-size:0.92rem;"><?= htmlspecialchars($success) ?></p>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <!-- Left: Info -->
            <div class="col-lg-5 mb-4" data-aos="fade-right">
                <div
                    style="background:#fff;border-radius:20px;padding:35px;box-shadow:0 8px 35px rgba(0,0,0,0.06);border:1px solid rgba(0,0,0,0.04);height:100%;">
                    <div
                        style="display:inline-flex;align-items:center;gap:10px;background:rgba(242,101,34,0.1);color:#f26522;padding:8px 18px;border-radius:50px;font-size:0.8rem;font-weight:600;margin-bottom:20px;">
                        <i class="fas fa-id-card"></i> Membership Application
                    </div>

                    <h3 style="color:#1a1b2e;font-weight:700;font-size:1.4rem;margin-bottom:15px;">Join Our Foundation
                    </h3>

                    <p style="color:#666;line-height:1.8;font-size:0.92rem;margin-bottom:20px;">
                        The <strong style="color:#1a1b2e;">Durga Saptashati Foundation</strong>, established by
                        <strong style="color:#1a1b2e;">Ms. Sandhya Singh</strong> in December 2020, is set to reach
                        new milestones in its mission to uplift underprivileged women and children. By becoming a
                        member,
                        you empower the underprivileged while gaining a deeply fulfilling experience.
                    </p>

                    <div
                        style="background:rgba(242,101,34,0.05);border-left:4px solid #f26522;border-radius:0 10px 10px 0;padding:14px 18px;margin-bottom:20px;">
                        <p style="color:#1a1b2e;font-weight:600;font-size:0.85rem;margin:0;">
                            <i class="fas fa-file-alt" style="color:#f26522;margin-right:6px;"></i>
                            Registration No: U85300DL2020NPL374927
                        </p>
                    </div>

                    <h5 style="color:#1a1b2e;font-weight:700;font-size:1rem;margin-bottom:15px;">Membership Options</h5>

                    <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:25px;">
                        <div style="background:#fff;border:2px solid rgba(242,101,34,0.15);border-radius:14px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;transition:all 0.3s;"
                            onmouseover="this.style.borderColor='#f26522';this.style.boxShadow='0 4px 15px rgba(242,101,34,0.1)'"
                            onmouseout="this.style.borderColor='rgba(242,101,34,0.15)';this.style.boxShadow='none'">
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.95rem;">1-Year Membership</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">Annual contribution</p>
                            </div>
                            <span
                                style="background:linear-gradient(135deg,#f26522,#ff8c42);color:#fff;padding:6px 16px;border-radius:20px;font-weight:700;font-size:0.95rem;">&#8377;501</span>
                        </div>
                        <div style="background:#fff;border:2px solid rgba(242,101,34,0.15);border-radius:14px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;transition:all 0.3s;"
                            onmouseover="this.style.borderColor='#f26522';this.style.boxShadow='0 4px 15px rgba(242,101,34,0.1)'"
                            onmouseout="this.style.borderColor='rgba(242,101,34,0.15)';this.style.boxShadow='none'">
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.95rem;">6-Year Membership</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">Extended commitment</p>
                            </div>
                            <span
                                style="background:linear-gradient(135deg,#f26522,#ff8c42);color:#fff;padding:6px 16px;border-radius:20px;font-weight:700;font-size:0.95rem;">&#8377;2,500</span>
                        </div>
                        <div style="background:#fff;border:2px solid rgba(242,101,34,0.15);border-radius:14px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;position:relative;overflow:hidden;transition:all 0.3s;"
                            onmouseover="this.style.borderColor='#f26522';this.style.boxShadow='0 4px 15px rgba(242,101,34,0.1)'"
                            onmouseout="this.style.borderColor='rgba(242,101,34,0.15)';this.style.boxShadow='none'">
                            <div
                                style="position:absolute;top:0;right:0;background:#f26522;color:#fff;font-size:0.6rem;padding:2px 10px;border-radius:0 0 0 8px;font-weight:600;">
                                BEST VALUE</div>
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.95rem;">Lifetime Membership</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">One-time commitment</p>
                            </div>
                            <span
                                style="background:linear-gradient(135deg,#f26522,#ff8c42);color:#fff;padding:6px 16px;border-radius:20px;font-weight:700;font-size:0.95rem;">&#8377;11,000</span>
                        </div>
                    </div>

                    <div style="border-top:1px solid #eee;padding-top:18px;">
                        <h6 style="color:#1a1b2e;font-weight:700;font-size:0.9rem;margin-bottom:12px;">Contact Us</h6>
                        <div style="display:flex;flex-direction:column;gap:8px;">
                            <a href="tel:+919289088161"
                                style="color:#666;font-size:0.85rem;text-decoration:none;display:flex;align-items:center;gap:8px;">
                                <i class="fas fa-phone-alt" style="color:#f26522;width:16px;"></i> +91 9289088161
                            </a>
                            <a href="mailto:support@saptashati.org"
                                style="color:#666;font-size:0.85rem;text-decoration:none;display:flex;align-items:center;gap:8px;">
                                <i class="fas fa-envelope" style="color:#f26522;width:16px;"></i> support@saptashati.org
                            </a>
                            <a href="https://www.saptashati.org" target="_blank"
                                style="color:#666;font-size:0.85rem;text-decoration:none;display:flex;align-items:center;gap:8px;">
                                <i class="fas fa-globe" style="color:#f26522;width:16px;"></i> www.saptashati.org
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div
                    style="background:#fff;border-radius:20px;padding:35px;box-shadow:0 8px 35px rgba(0,0,0,0.06);border:1px solid rgba(0,0,0,0.04);">
                    <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:25px;">
                        <i class="fas fa-user-plus" style="color:#f26522;margin-right:8px;"></i> Membership Form
                    </h4>

                    <form method="POST" action="<?= url('admin.php') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="submit_membership">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Full
                                    Name <span style="color:#ef4444;">*</span></label>
                                <input type="text" name="full_name" required
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;"
                                    onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#e5e7eb'"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Date
                                    of Birth <span style="color:#ef4444;">*</span></label>
                                <input type="date" name="date_of_birth" required
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;"
                                    onfocus="this.style.borderColor='#f26522'"
                                    onblur="this.style.borderColor='#e5e7eb'">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label
                                style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:8px;display:block;">Gender
                                <span style="color:#ef4444;">*</span></label>
                            <div style="display:flex;gap:20px;">
                                <label
                                    style="display:flex;align-items:center;gap:6px;cursor:pointer;color:#555;font-size:0.9rem;">
                                    <input type="radio" name="gender" value="Male" required
                                        style="accent-color:#f26522;"> Male
                                </label>
                                <label
                                    style="display:flex;align-items:center;gap:6px;cursor:pointer;color:#555;font-size:0.9rem;">
                                    <input type="radio" name="gender" value="Female" style="accent-color:#f26522;">
                                    Female
                                </label>
                                <label
                                    style="display:flex;align-items:center;gap:6px;cursor:pointer;color:#555;font-size:0.9rem;">
                                    <input type="radio" name="gender" value="Prefer not to say"
                                        style="accent-color:#f26522;"> Prefer not to say
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label
                                style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Address</label>
                            <textarea name="address" rows="2"
                                style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;resize:vertical;transition:all 0.3s;outline:none;"
                                onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#e5e7eb'"
                                placeholder="Enter your address"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Email</label>
                                <input type="email" name="email"
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;"
                                    onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#e5e7eb'"
                                    placeholder="your@email.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Mobile
                                    Number</label>
                                <input type="tel" name="mobile"
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;"
                                    onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#e5e7eb'"
                                    placeholder="+91 XXXXX XXXXX">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Membership
                                    Type <span style="color:#ef4444;">*</span></label>
                                <select name="membership_type" required
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;background:#fff;"
                                    onfocus="this.style.borderColor='#f26522'"
                                    onblur="this.style.borderColor='#e5e7eb'">
                                    <option value="">Select membership</option>
                                    <option value="1-year">1-Year Membership - &#8377;501</option>
                                    <option value="6-year">6-Year Membership - &#8377;2,500</option>
                                    <option value="lifetime">Lifetime Membership - &#8377;11,000</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label
                                    style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Payment
                                    Mode <span style="color:#ef4444;">*</span></label>
                                <select name="payment_mode" required
                                    style="width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:0.92rem;transition:all 0.3s;outline:none;background:#fff;"
                                    onfocus="this.style.borderColor='#f26522'"
                                    onblur="this.style.borderColor='#e5e7eb'">
                                    <option value="">Select payment mode</option>
                                    <option value="Bank Transfer">Bank Transfer (IMPS, NEFT)</option>
                                    <option value="UPI">UPI</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label
                                style="font-weight:600;color:#1a1b2e;font-size:0.85rem;margin-bottom:6px;display:block;">Payment
                                Screenshot <span style="color:#888;font-weight:400;">(optional)</span></label>
                            <div style="border:2px dashed #e5e7eb;border-radius:10px;padding:25px;text-align:center;transition:all 0.3s;cursor:pointer;position:relative;"
                                onclick="document.getElementById('screenshotInput').click()"
                                onmouseover="this.style.borderColor='#f26522'"
                                onmouseout="this.style.borderColor='#e5e7eb'">
                                <i class="fas fa-cloud-upload-alt"
                                    style="font-size:2rem;color:#ccc;margin-bottom:8px;display:block;"></i>
                                <p style="color:#888;font-size:0.85rem;margin:0;" id="fileLabel">Click to upload payment
                                    screenshot</p>
                                <small style="color:#aaa;font-size:0.75rem;">JPG, PNG, WEBP (max 5MB)</small>
                                <input type="file" name="payment_screenshot" id="screenshotInput" accept="image/*"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;cursor:pointer;"
                                    onchange="document.getElementById('fileLabel').textContent = this.files[0] ? this.files[0].name : 'Click to upload'">
                            </div>
                        </div>

                        <button type="submit"
                            style="width:100%;padding:14px;background:linear-gradient(135deg,#f26522,#ff8c42);color:#fff;border:none;border-radius:12px;font-size:1rem;font-weight:700;cursor:pointer;transition:all 0.3s;box-shadow:0 8px 25px rgba(242,101,34,0.3);"
                            onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 12px 35px rgba(242,101,34,0.4)'"
                            onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 8px 25px rgba(242,101,34,0.3)'">
                            <i class="fas fa-paper-plane" style="margin-right:8px;"></i> Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../app/views/layout/footer.php'; ?>