<?php
require_once '../app/config/config.php';
$pageTitle = "Make a Donation";
$pageDescription = "Every contribution matters - make a donation to support Durga Saptashati Foundation's community programs.";
$pageKeywords = "make donation, donate online, contribute, support foundation, financial contribution, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Make a Donation</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Get Involved</a>
                <a href="<?= url('make-donation.php') ?>">Make a Donation</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="container-fluid">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Support Our Mission</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">Every Contribution Makes a Difference</h2>
            <p style="color:#888;max-width:700px;margin:10px auto 0;">Your generous donation helps us provide education, healthcare, and empowerment programs to those who need it most. Every rupee counts.</p>
        </div>

        <div class="row">
            <!-- Donation Form -->
            <div class="col-lg-7 mb-4" data-aos="fade-right">
                <div style="background:#fff;border-radius:14px;padding:35px;box-shadow:0 5px 25px rgba(0,0,0,0.06);">
                    <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:8px;">Donation Details</h4>
                    <p style="color:#999;font-size:0.88rem;margin-bottom:25px;">Select an amount or enter a custom amount to donate.</p>

                    <!-- Amount Options -->
                    <div style="margin-bottom:20px;">
                        <label style="display:block;margin-bottom:10px;font-weight:600;font-size:0.85rem;color:#333;">Select Amount</label>
                        <div style="display:flex;flex-wrap:wrap;gap:10px;" id="amountOptions">
                            <button type="button" class="amt-btn" data-amount="500" style="padding:10px 22px;border:2px solid #e5e7eb;border-radius:10px;background:#f9fafb;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;color:#333;" onclick="selectAmount(this,500)">&#8377;500</button>
                            <button type="button" class="amt-btn" data-amount="1000" style="padding:10px 22px;border:2px solid #e5e7eb;border-radius:10px;background:#f9fafb;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;color:#333;" onclick="selectAmount(this,1000)">&#8377;1,000</button>
                            <button type="button" class="amt-btn" data-amount="2000" style="padding:10px 22px;border:2px solid #e5e7eb;border-radius:10px;background:#f9fafb;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;color:#333;" onclick="selectAmount(this,2000)">&#8377;2,000</button>
                            <button type="button" class="amt-btn" data-amount="5000" style="padding:10px 22px;border:2px solid #e5e7eb;border-radius:10px;background:#f9fafb;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;color:#333;" onclick="selectAmount(this,5000)">&#8377;5,000</button>
                            <button type="button" class="amt-btn" data-amount="custom" style="padding:10px 22px;border:2px solid #e5e7eb;border-radius:10px;background:#f9fafb;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;color:#333;" onclick="selectAmount(this,0)">Custom</button>
                        </div>
                    </div>

                    <form id="donationForm" onsubmit="return false;">
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
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Phone Number</label>
                                <input type="text" name="phone" placeholder="+91 XXXXXXXXXX"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Amount (&#8377;) *</label>
                                <input type="number" name="amount" id="donationAmount" required min="1" placeholder="Enter amount"
                                    style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;transition:all 0.3s;background:#f9fafb;"
                                    onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                    onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'">
                            </div>
                        </div>

                        <div style="margin-bottom:20px;">
                            <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:#333;">Message (Optional)</label>
                            <textarea name="message" rows="3" placeholder="Any message for us..."
                                style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:all 0.3s;background:#f9fafb;"
                                onfocus="this.style.borderColor='#f26522';this.style.boxShadow='0 0 0 3px rgba(242,101,34,0.1)';this.style.background='#fff'"
                                onblur="this.style.borderColor='#e5e7eb';this.style.boxShadow='none';this.style.background='#f9fafb'"></textarea>
                        </div>
                        <button type="submit" id="donationSubmitBtn"
                            style="background:#f26522;color:#fff;border:none;padding:14px 35px;border-radius:10px;font-size:0.95rem;font-weight:600;cursor:pointer;font-family:inherit;transition:all 0.3s;min-width:160px;"
                            onmouseover="this.style.background='#d4541a';this.style.boxShadow='0 8px 25px rgba(242,101,34,0.3)'"
                            onmouseout="this.style.background='#f26522';this.style.boxShadow='none'">
                            Donate Now
                        </button>
                    </form>

                    <script>
                    function selectAmount(btn, amount) {
                        document.querySelectorAll('.amt-btn').forEach(function(b) { b.style.borderColor='#e5e7eb'; b.style.background='#f9fafb'; b.style.color='#333'; });
                        btn.style.borderColor='#f26522'; btn.style.background='#f26522'; btn.style.color='#fff';
                        var input = document.getElementById('donationAmount');
                        if (amount > 0) { input.value = amount; } else { input.value = ''; input.focus(); }
                    }
                    document.getElementById('donationSubmitBtn').addEventListener('click', function() {
                        var form = document.getElementById('donationForm');
                        var btn = this;
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var amount = form.querySelector('[name="amount"]').value;
                        if (!name || !email || !amount || amount <= 0) { showToast('Please fill in all required fields.', 'error'); return; }
                        var originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:formSpin 0.6s linear infinite;vertical-align:middle;"></span>';
                        var formData = new FormData(form);
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?= url("api/donation.php") ?>');
                        xhr.onload = function() {
                            btn.disabled = false; btn.innerHTML = originalText;
                            try { var res = JSON.parse(xhr.responseText); if (res.success) { showToast(res.message, 'success'); form.reset(); document.querySelectorAll('.amt-btn').forEach(function(b) { b.style.borderColor='#e5e7eb'; b.style.background='#f9fafb'; b.style.color='#333'; }); window.scrollTo({top:0,behavior:'smooth'}); } else { showToast(res.message, 'error'); } } catch(e) { showToast('Something went wrong. Please try again.', 'error'); }
                        };
                        xhr.onerror = function() { btn.disabled = false; btn.innerHTML = originalText; showToast('Network error. Please check your connection.', 'error'); };
                        xhr.send(formData);
                    });
                    </script>

                </div>
            </div>

            <!-- Payment Info Side -->
            <div class="col-lg-5 mb-4" data-aos="fade-left">
                <!-- Why Donate -->
                <div style="background:#fff;border-radius:14px;padding:30px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:20px;">
                    <h5 style="color:#1a1b2e;font-weight:700;margin-bottom:15px;"><i class="fas fa-heart" style="color:#f26522;margin-right:8px;"></i> Why Donate?</h5>
                    <div style="display:flex;flex-direction:column;gap:12px;">
                        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:#f9fafb;border-radius:10px;">
                            <div style="width:40px;height:40px;background:rgba(242,101,34,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-graduation-cap" style="color:#f26522;"></i>
                            </div>
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Education</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">Help underprivileged children access quality education</p>
                            </div>
                        </div>
                        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:#f9fafb;border-radius:10px;">
                            <div style="width:40px;height:40px;background:rgba(242,101,34,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-female" style="color:#f26522;"></i>
                            </div>
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Women Empowerment</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">Skill development and self-reliance programmes</p>
                            </div>
                        </div>
                        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:#f9fafb;border-radius:10px;">
                            <div style="width:40px;height:40px;background:rgba(242,101,34,0.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-utensils" style="color:#f26522;"></i>
                            </div>
                            <div>
                                <strong style="color:#1a1b2e;font-size:0.85rem;">Hunger Relief</strong>
                                <p style="color:#888;font-size:0.78rem;margin:0;">Free kitchens and food donation drives</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tax Benefits -->
                <div style="background:linear-gradient(135deg,#1a1b2e,#2d2e45);border-radius:14px;padding:25px;color:#fff;">
                    <h5 style="font-weight:700;margin-bottom:10px;"><i class="fas fa-receipt" style="color:#f26522;margin-right:8px;"></i> Tax Benefits</h5>
                    <p style="color:#ccc;font-size:0.85rem;line-height:1.6;margin:0;">All donations are eligible for tax deduction under Section 80G of the Income Tax Act. You will receive an official receipt via email.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../app/views/layout/footer.php'; ?>
