<?php
session_start();
require_once '../app/config/config.php';
$pageTitle = "Become a Member | Saptashati Foundation";
$pageDescription = "Join Saptashati Foundation as a proud member. Support our mission to empower underprivileged communities through education, healthcare, and development.";
$pageKeywords = "NGO membership, join Saptashati, member registration, support charity, community membership";
include '../app/views/layout/header.php';

$success = $_SESSION['membership_success'] ?? null;
if ($success)
    unset($_SESSION['membership_success']);

// Fetch active membership plans from DB
try {
    $membershipPlans = $pdo->query("SELECT * FROM membership_plans WHERE is_active = 1 ORDER BY sort_order ASC")->fetchAll();
} catch (Exception $e) {
    $membershipPlans = [];
}

// Fetch approved members
try {
    $approvedMembers = $pdo->query("SELECT full_name, profession, membership_type, photo, created_at FROM members WHERE status = 'approved' ORDER BY created_at DESC")->fetchAll();
    $planMapPublic = [];
    foreach ($membershipPlans as $mp) { $planMapPublic[$mp['slug']] = $mp['name']; }
} catch (Exception $e) {
    $approvedMembers = [];
    $planMapPublic = [];
}
?>

<link rel="stylesheet" href="<?= url('assets/css/become-member.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="page-header-title">Become a Member</p>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('become-member.php') ?>">Become a Member</a>
            </div>
        </div>
    </div>
</div>

<section class="mbr-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="mbr-section-label">Become a Member</h6>
            <h1 class="mbr-section-heading">Support Our Mission, Shape the Future</h1>
            <p class="mbr-section-desc">Join Durga Saptashati Foundation to support women, educate children, and uplift
                communities—creating lasting change.</p>
        </div>

        <?php if ($success): ?>
        <div class="mbr-success" data-aos="fade-down">
            <div class="mbr-success-icon"><i class="fas fa-check"></i></div>
            <div>
                <h5>Application Submitted!</h5>
                <p><?= htmlspecialchars($success) ?></p>
            </div>
        </div>
        <?php endif; ?>

        <div class="row" style="align-items:stretch;">
            <!-- Left: Info -->
            <div class="col-lg-5 d-flex" data-aos="fade-right">
                <div class="mbr-card">
                    <div class="mbr-badge"><i class="fas fa-id-card"></i> Membership Application</div>
                    <h3 class="mbr-title">Join Our Foundation</h3>
                    <p class="mbr-desc">
                        The <strong>Durga Saptashati Foundation</strong>, established by
                        <strong>Ms. Sandhya Singh</strong> in December 2020, is set to reach new milestones in its
                        mission to uplift underprivileged women and children. By becoming a member, you empower
                        the underprivileged while gaining a deeply fulfilling experience.
                    </p>
                    <div class="mbr-reg-box">
                        <p><i class="fas fa-file-alt"></i> Registration No: U85300DL2020NPL374927</p>
                    </div>
                    <h5 class="mbr-options-title">Membership Options</h5>
                    <div class="mbr-options">
                        <?php foreach ($membershipPlans as $plan): ?>
                        <div class="mbr-option">
                            <?php if ($plan['is_best_value']): ?>
                            <span class="mbr-best-value">BEST VALUE</span>
                            <?php endif; ?>
                            <div><strong><?= htmlspecialchars($plan['name']) ?></strong>
                                <p><?= htmlspecialchars($plan['description']) ?></p>
                            </div>
                            <span class="mbr-price">&#8377;<?= number_format($plan['price'], 0) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="col-lg-7 d-flex" data-aos="fade-left">
                <div class="mbr-card mbr-form-card">
                    <h4 class="mbr-form-title"><i class="fas fa-user-plus"></i> Membership Form</h4>
                    <form method="POST" onsubmit="return false;" enctype="multipart/form-data" class="mbr-form">
                        <input type="hidden" name="action" value="submit_membership">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Full Name <span class="req">*</span></label>
                                <input type="text" name="full_name" required class="mbr-input"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Email</label>
                                <input type="email" name="email" class="mbr-input" placeholder="your@email.com">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Mobile Number</label>
                                <input type="tel" name="mobile" class="mbr-input" placeholder="+91 XXXXX XXXXX">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Gender <span class="req">*</span></label>
                                <input type="hidden" name="gender" required>
                                <div class="cdd" id="genderDd">
                                    <div class="cdd-selected" onclick="toggleCdd('genderDd')">
                                        <span class="cdd-text">Select gender</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="cdd-options">
                                        <div class="cdd-option" onclick="selectCdd('genderDd','Male','Male','fa-mars')">
                                            <i class="fas fa-mars"></i> Male
                                        </div>
                                        <div class="cdd-option"
                                            onclick="selectCdd('genderDd','Female','Female','fa-venus')">
                                            <i class="fas fa-venus"></i> Female
                                        </div>
                                        <div class="cdd-option"
                                            onclick="selectCdd('genderDd','Prefer not to say','Other','fa-genderless')">
                                            <i class="fas fa-genderless"></i> Other
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Membership Type <span class="req">*</span></label>
                                <input type="hidden" name="membership_type" required>
                                <div class="cdd" id="membershipDd">
                                    <div class="cdd-selected" onclick="toggleCdd('membershipDd')">
                                        <span class="cdd-text">Select membership</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="cdd-options">
                                        <?php foreach ($membershipPlans as $plan): ?>
                                        <div class="cdd-option"
                                            onclick="selectCdd('membershipDd','<?= htmlspecialchars($plan['slug']) ?>','<?= htmlspecialchars($plan['name']) ?> — ₹<?= number_format($plan['price'], 0) ?>','<?= htmlspecialchars($plan['icon']) ?>')">
                                            <i class="fas <?= htmlspecialchars($plan['icon']) ?>"></i>
                                            <?= htmlspecialchars($plan['name']) ?> —
                                            &#8377;<?= number_format($plan['price'], 0) ?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mbr-label">Payment Method <span class="req">*</span></label>
                                <input type="hidden" name="payment_mode" required>
                                <div class="cdd" id="paymentDd">
                                    <div class="cdd-selected" onclick="toggleCdd('paymentDd')">
                                        <span class="cdd-text">Select payment method</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="cdd-options">
                                        <div class="cdd-option"
                                            onclick="selectCdd('paymentDd','Online','Online','fa-globe')">
                                            <i class="fas fa-globe"></i> Online
                                        </div>
                                        <div class="cdd-option"
                                            onclick="selectCdd('paymentDd','Cash','Cash','fa-money-bill-wave')">
                                            <i class="fas fa-money-bill-wave"></i> Cash
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="mbr-label">Profession</label>
                                <input type="text" name="profession" class="mbr-input"
                                    placeholder="e.g. Teacher, Engineer, Business">
                            </div>
                            <div class="col-md-6">
                                <label class="mbr-label">Passport Photo</label>
                                <input type="file" name="photo" accept=".jpg,.jpeg,.png,.webp" class="mbr-input" style="padding:8px 12px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="mbr-label">Address</label>
                            <textarea name="address" rows="2" class="mbr-input mbr-textarea"
                                placeholder="Enter your address"></textarea>
                        </div>

                        <button type="submit" class="mbr-submit" id="membershipSubmitBtn">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php if (!empty($approvedMembers)): ?>
        <!-- Our Members Section -->
    </div>
</section>

<div class="mbr-members-dark">
    <div class="mbr-members-dark-bg"></div>
    <div class="container" style="position:relative;z-index:1;">
        <div class="text-center mb-4" data-aos="fade-up">
            <div class="mbr-members-badge"><i class="fas fa-users"></i> Our Community</div>
            <h2 class="mbr-members-dark-heading">Our Proud <span>Members</span></h2>
            <p class="mbr-members-dark-sub">Together we create lasting change through unity and compassion.</p>
        </div>
        <div class="mbr-members-section">
            <div class="mbr-members-grid">
                <?php foreach ($approvedMembers as $idx => $am): ?>
                <div class="mbr-member-card <?= $idx >= 9 ? 'mbr-member-hidden' : '' ?>" data-aos="fade-up" data-aos-delay="<?= min($idx * 50, 300) ?>">
                    <div class="mbr-member-avatar">
                        <img src="<?= !empty($am['photo']) ? asset('uploads/members/' . $am['photo']) : asset('images/profile-1.png') ?>" alt="<?= htmlspecialchars($am['full_name']) ?>">
                    </div>
                    <div class="mbr-member-info">
                        <h3 class="mbr-member-name"><?= htmlspecialchars($am['full_name']) ?></h3>
                        <?php if (!empty($am['profession'])): ?>
                        <span class="mbr-member-plan"><?= htmlspecialchars($am['profession']) ?></span>
                        <?php endif; ?>
                    </div>
                    <span class="mbr-member-since">Since <?= date('M Y', strtotime($am['created_at'])) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if (count($approvedMembers) > 9): ?>
            <div class="text-center mt-4">
                <button class="mbr-show-more-btn" id="showMoreMembers" onclick="toggleMoreMembers()">
                    <span>Show More</span> <i class="fas fa-chevron-down"></i>
                </button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<section class="mbr-section">
    <div class="container">
        <!-- Full-width Contact Bar -->
        <div class="row mt-4" data-aos="fade-up">
            <div class="col-12">
                <div class="mbr-contact-bar">
                    <div class="mbr-contact-info">
                        <div class="mbr-contact-icon"><i class="fas fa-headset"></i></div>
                        <div>
                            <h6>Need Help? Contact Us</h6>
                            <p>We're here to assist you with your membership application</p>
                        </div>
                    </div>
                    <div class="mbr-contact-links">
                        <a href="tel:+919289088161" class="mbr-contact-link"><i class="fas fa-phone-alt"></i> +91
                            9289088161</a>
                        <a href="mailto:support@saptashati.org" class="mbr-contact-link"><i class="fas fa-envelope"></i>
                            support@saptashati.org</a>
                        <a href="https://www.saptashati.org" target="_blank" class="mbr-contact-link"><i
                                class="fas fa-globe"></i> www.saptashati.org</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
// Membership plan prices for Razorpay
var membershipPrices = {};
<?php foreach ($membershipPlans as $plan): ?>
membershipPrices['<?= htmlspecialchars($plan['slug']) ?>'] = <?= (int)$plan['price'] ?>;
<?php endforeach; ?>

// Intercept form submission for Razorpay
(function() {
    var form = document.querySelector('.mbr-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        var paymentMode = form.querySelector('[name="payment_mode"]').value;
        var membershipType = form.querySelector('[name="membership_type"]').value;
        var fullName = form.querySelector('[name="full_name"]').value.trim();
        var email = form.querySelector('[name="email"]').value.trim();
        var mobile = form.querySelector('[name="mobile"]').value.trim();
        var gender = form.querySelector('[name="gender"]').value;

        if (!fullName || !gender || !membershipType || !paymentMode) {
            showToast('Please fill in all required fields.', 'error');
            return;
        }

        var btn = document.getElementById('membershipSubmitBtn');
        var originalHTML = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

        if (paymentMode === 'Cash') {
            // Submit via AJAX
            var fd = new FormData(form);
            fetch('<?= url("api/membership.php") ?>', { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                btn.disabled = false; btn.innerHTML = originalHTML;
                if (data.success) {
                    showToast(data.message, 'success');
                    form.reset();
                    document.querySelectorAll('.cdd-text').forEach(function(t) { t.classList.remove('has-value'); });
                    window.scrollTo({top: 0, behavior: 'smooth'});
                    setTimeout(function() { location.reload(); }, 2000);
                } else { showToast(data.message, 'error'); }
            })
            .catch(function() {
                btn.disabled = false; btn.innerHTML = originalHTML;
                showToast('Network error. Please try again.', 'error');
            });
            return;
        }

        // Online payment - use Razorpay
        var amount = membershipPrices[membershipType] || 0;
        if (amount <= 0) {
            btn.disabled = false; btn.innerHTML = originalHTML;
            showToast('Invalid membership plan selected.', 'error');
            return;
        }

        // Create Razorpay order
        var fd = new FormData();
        fd.append('action', 'create_order');
        fd.append('amount', amount);
        fd.append('type', 'membership');
        fd.append('name', fullName);
        fd.append('email', email);
        fd.append('phone', mobile);

        fetch('<?= url("api/razorpay-payment.php") ?>', { method: 'POST', body: fd })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (!data.success) {
                btn.disabled = false;
                btn.innerHTML = originalHTML;
                showToast(data.message || 'Could not initiate payment.', 'error');
                return;
            }

            var options = {
                key: data.key,
                amount: data.amount * 100,
                currency: 'INR',
                name: 'Durga Saptashati Foundation',
                description: 'Membership - ' + membershipType,
                order_id: data.order_id,
                prefill: { name: fullName, email: email, contact: mobile },
                theme: { color: '#f26522' },
                handler: function(response) {
                    // Verify payment on server
                    var vfd = new FormData();
                    vfd.append('action', 'verify_payment');
                    vfd.append('type', 'membership');
                    vfd.append('razorpay_payment_id', response.razorpay_payment_id);
                    vfd.append('razorpay_order_id', response.razorpay_order_id);
                    vfd.append('razorpay_signature', response.razorpay_signature);
                    vfd.append('full_name', fullName);
                    vfd.append('gender', gender);
                    vfd.append('address', form.querySelector('[name="address"]').value);
                    vfd.append('email', email);
                    vfd.append('mobile', mobile);
                    vfd.append('membership_type', membershipType);
                    vfd.append('profession', form.querySelector('[name="profession"]').value);
                    vfd.append('amount', amount);

                    fetch('<?= url("api/razorpay-payment.php") ?>', { method: 'POST', body: vfd })
                    .then(function(r) { return r.json(); })
                    .then(function(vdata) {
                        btn.disabled = false;
                        btn.innerHTML = originalHTML;
                        if (vdata.success) {
                            showToast(vdata.message, 'success');
                            form.reset();
                            document.querySelectorAll('.cdd-text').forEach(function(t) {
                                t.classList.remove('has-value');
                                t.innerHTML = t.closest('.cdd').querySelector('.cdd-selected').getAttribute('data-placeholder') || 'Select...';
                            });
                            window.scrollTo({top: 0, behavior: 'smooth'});
                            setTimeout(function() { location.reload(); }, 2000);
                        } else {
                            showToast(vdata.message, 'error');
                        }
                    });
                },
                modal: {
                    ondismiss: function() {
                        btn.disabled = false;
                        btn.innerHTML = originalHTML;
                        showToast('Payment was cancelled.', 'error');
                    }
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        })
        .catch(function() {
            btn.disabled = false;
            btn.innerHTML = originalHTML;
            showToast('Network error. Please try again.', 'error');
        });
    });
})();

function toggleMoreMembers() {
    var hidden = document.querySelectorAll('.mbr-member-hidden');
    var btn = document.getElementById('showMoreMembers');
    var isShowing = btn.classList.contains('expanded');
    hidden.forEach(function(card) {
        card.style.display = isShowing ? 'none' : 'flex';
    });
    btn.classList.toggle('expanded');
    btn.querySelector('span').textContent = isShowing ? 'Show More' : 'Show Less';
    btn.querySelector('i').className = isShowing ? 'fas fa-chevron-down' : 'fas fa-chevron-up';
}

function toggleCdd(id) {
    var dd = document.getElementById(id);
    var opts = dd.querySelector('.cdd-options');
    var icon = dd.querySelector('.fa-chevron-down');
    var sel = dd.querySelector('.cdd-selected');
    var isOpen = opts.style.display === 'block';
    document.querySelectorAll('.cdd-options').forEach(function(o) {
        o.style.display = 'none';
    });
    document.querySelectorAll('.cdd .fa-chevron-down').forEach(function(i) {
        i.style.transform = 'rotate(0)';
    });
    document.querySelectorAll('.cdd-selected').forEach(function(s) {
        s.classList.remove('active');
    });
    if (!isOpen) {
        opts.style.display = 'block';
        icon.style.transform = 'rotate(180deg)';
        sel.classList.add('active');
    }
}

function selectCdd(id, value, label, iconClass) {
    var dd = document.getElementById(id);
    var text = dd.querySelector('.cdd-text');
    text.innerHTML = '<i class="fas ' + iconClass + '"></i>' + label;
    text.classList.add('has-value');
    dd.querySelector('.cdd-options').style.display = 'none';
    dd.querySelector('.fa-chevron-down').style.transform = 'rotate(0)';
    dd.querySelector('.cdd-selected').classList.remove('active');
    var hidden = dd.previousElementSibling;
    if (hidden && hidden.type === 'hidden') hidden.value = value;
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.cdd')) {
        document.querySelectorAll('.cdd-options').forEach(function(o) {
            o.style.display = 'none';
        });
        document.querySelectorAll('.cdd .fa-chevron-down').forEach(function(i) {
            i.style.transform = 'rotate(0)';
        });
        document.querySelectorAll('.cdd-selected').forEach(function(s) {
            s.classList.remove('active');
        });
    }
});
</script>

<?php include '../app/views/layout/footer.php'; ?>