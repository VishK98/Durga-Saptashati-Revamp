<?php
require_once '../app/config/config.php';
$pageTitle = "Make Donation to NGO In Dwarka Delhi | Support NGO in Delhi | Saptashati Foundation";
$pageDescription = "Support Durga Saptashati Foundation by making a donation online. Your contribution helps provide food, education, women empowerment programs and support for underprivileged communities in Dwarka Delhi.";
$pageKeywords = "Donate to NGO in Dwarka , Online Donation NGO in Delhi ,Charity NGO in Dwarka Delhi ,Donate to NGO in Dwarka NCR ,Best NGO to Donate in Delhi ,Food and Clothes Donation NGO in Dwarka ,Support Charity Organization in Delhi ";
include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/events/make-donation.css') ?>">

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Make a Donation</h1>
            </div>
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
            <h6 class="text-uppercase mb-2 donate-subtitle">Support Our
                Mission</h6>
            <h2 class="donate-title">Make Donation</h2>
            <p class="donate-desc">Your generous donation helps us provide education,
                healthcare, and empowerment programs to those who need it most. Every rupee counts.</p>
        </div>

        <div class="row">
            <!-- Donation Form -->
            <div class="col-lg-7 mb-4" data-aos="fade-right">
                <div class="donate-form-card">
                    <h4>Donation Details</h4>
                    <p class="form-hint">Select an amount or enter a custom
                        amount to donate.</p>

                    <!-- Amount Options -->
                    <div class="mb-4">
                        <label class="amt-label">Select
                            Amount</label>
                        <div class="amt-options" id="amountOptions">
                            <button type="button" class="amt-btn" data-amount="500"
                                onclick="selectAmount(this,500)">&#8377;500</button>
                            <button type="button" class="amt-btn" data-amount="1000"
                                onclick="selectAmount(this,1000)">&#8377;1,000</button>
                            <button type="button" class="amt-btn" data-amount="2000"
                                onclick="selectAmount(this,2000)">&#8377;2,000</button>
                            <button type="button" class="amt-btn" data-amount="5000"
                                onclick="selectAmount(this,5000)">&#8377;5,000</button>
                            <button type="button" class="amt-btn" data-amount="custom"
                                onclick="selectAmount(this,0)">Custom</button>
                        </div>
                    </div>

                    <form id="donationForm" onsubmit="return false;">
                        <div class="donate-form-grid">
                            <div>
                                <label class="donate-field-label">Full
                                    Name *</label>
                                <input type="text" name="name" required placeholder="Your full name"
                                    class="donate-input">
                            </div>
                            <div>
                                <label class="donate-field-label">Email
                                    Address *</label>
                                <input type="email" name="email" required placeholder="you@email.com"
                                    class="donate-input">
                            </div>
                        </div>
                        <div class="donate-form-grid">
                            <div>
                                <label class="donate-field-label">Phone
                                    Number</label>
                                <input type="text" name="phone" placeholder="+91 XXXXXXXXXX"
                                    class="donate-input">
                            </div>
                            <div>
                                <label class="donate-field-label">Amount
                                    (&#8377;) *</label>
                                <input type="number" name="amount" id="donationAmount" required min="1"
                                    placeholder="Enter amount"
                                    class="donate-input">
                            </div>
                        </div>

                        <div class="donate-msg-wrap">
                            <label class="donate-field-label">Message
                                (Optional)</label>
                            <textarea name="message" rows="3" placeholder="Any message for us..."
                                class="donate-textarea"></textarea>
                        </div>
                        <button type="submit" id="donationSubmitBtn" class="donate-submit-btn">
                            Donate Now
                        </button>
                    </form>

                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                    function selectAmount(btn, amount) {
                        document.querySelectorAll('.amt-btn').forEach(function(b) { b.classList.remove('active'); });
                        btn.classList.add('active');
                        var input = document.getElementById('donationAmount');
                        if (amount > 0) {
                            input.value = amount;
                        } else {
                            input.value = '';
                            input.focus();
                        }
                    }
                    document.getElementById('donationSubmitBtn').addEventListener('click', function() {
                        var form = document.getElementById('donationForm');
                        var btn = this;
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var phone = form.querySelector('[name="phone"]').value.trim();
                        var amount = parseInt(form.querySelector('[name="amount"]').value);
                        var message = form.querySelector('[name="message"]').value.trim();
                        if (!name || !email || !amount || amount <= 0) {
                            showToast('Please fill in all required fields.', 'error');
                            return;
                        }

                        var originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

                        // Create Razorpay order
                        var fd = new FormData();
                        fd.append('action', 'create_order');
                        fd.append('amount', amount);
                        fd.append('type', 'donation');
                        fd.append('name', name);
                        fd.append('email', email);
                        fd.append('phone', phone);

                        fetch('<?= url("api/razorpay-payment.php") ?>', {
                                method: 'POST',
                                body: fd
                            })
                            .then(function(r) {
                                return r.json();
                            })
                            .then(function(data) {
                                if (!data.success) {
                                    btn.disabled = false;
                                    btn.innerHTML = originalText;
                                    showToast(data.message || 'Could not initiate payment.', 'error');
                                    return;
                                }

                                var options = {
                                    key: data.key,
                                    amount: data.amount * 100,
                                    currency: 'INR',
                                    name: 'Durga Saptashati Foundation',
                                    description: 'Donation',
                                    order_id: data.order_id,
                                    prefill: {
                                        name: name,
                                        email: email,
                                        contact: phone
                                    },
                                    theme: {
                                        color: '#f26522'
                                    },
                                    handler: function(response) {
                                        var vfd = new FormData();
                                        vfd.append('action', 'verify_payment');
                                        vfd.append('type', 'donation');
                                        vfd.append('razorpay_payment_id', response
                                            .razorpay_payment_id);
                                        vfd.append('razorpay_order_id', response.razorpay_order_id);
                                        vfd.append('razorpay_signature', response
                                            .razorpay_signature);
                                        vfd.append('name', name);
                                        vfd.append('email', email);
                                        vfd.append('phone', phone);
                                        vfd.append('amount', amount);
                                        vfd.append('message', message);

                                        fetch('<?= url("api/razorpay-payment.php") ?>', {
                                                method: 'POST',
                                                body: vfd
                                            })
                                            .then(function(r) {
                                                return r.json();
                                            })
                                            .then(function(vdata) {
                                                btn.disabled = false;
                                                btn.innerHTML = originalText;
                                                if (vdata.success) {
                                                    showToast(vdata.message, 'success');
                                                    form.reset();
                                                    document.querySelectorAll('.amt-btn')
                                                        .forEach(function(b) {
                                                            b.classList.remove('active');
                                                        });
                                                    window.scrollTo({
                                                        top: 0,
                                                        behavior: 'smooth'
                                                    });
                                                } else {
                                                    showToast(vdata.message, 'error');
                                                }
                                            });
                                    },
                                    modal: {
                                        ondismiss: function() {
                                            btn.disabled = false;
                                            btn.innerHTML = originalText;
                                            showToast('Payment was cancelled.', 'error');
                                        }
                                    }
                                };

                                var rzp = new Razorpay(options);
                                rzp.open();
                            })
                            .catch(function() {
                                btn.disabled = false;
                                btn.innerHTML = originalText;
                                showToast('Network error. Please try again.', 'error');
                            });
                    });
                    </script>

                </div>
            </div>

            <!-- Payment Info Side -->
            <div class="col-lg-5 mb-4" data-aos="fade-left">
                <!-- Why Donate -->
                <div class="donate-why-card">
                    <h3><i class="fas fa-heart"></i> Why Donate?</h3>
                    <div class="donate-why-list">
                        <div class="donate-why-item">
                            <div class="donate-why-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div>
                                <strong>Education</strong>
                                <p>Help underprivileged children access
                                    quality education</p>
                            </div>
                        </div>
                        <div class="donate-why-item">
                            <div class="donate-why-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <div>
                                <strong>Women Empowerment</strong>
                                <p>Skill development and self-reliance
                                    programmes</p>
                            </div>
                        </div>
                        <div class="donate-why-item">
                            <div class="donate-why-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div>
                                <strong>Hunger Relief</strong>
                                <p>Free kitchens and food donation drives
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tax Benefits -->
                <div class="donate-tax-card">
                    <h3><i class="fas fa-receipt"></i> Tax Benefits</h3>
                    <p>All donations are eligible for tax
                        deduction under Section 80G of the Income Tax Act. You will receive an official receipt via
                        email.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../app/views/layout/footer.php'; ?>