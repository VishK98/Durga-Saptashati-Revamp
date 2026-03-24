<?php
require_once '../app/config/config.php';

$pageTitle = "Donate Now";
$pageDescription = "Support Durga Saptashati Foundation's charitable mission by making a donation. Your contribution helps us serve humanity through education, healthcare, and community development programs.";
$pageKeywords = "donate, donation, support NGO, Durga Saptashati donation, charity donation, help, contribute";

// Handle donation form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $amount = sanitize($_POST['amount'] ?? '');

    if (!empty($name) && !empty($email) && !empty($amount)) {
        // Here you would typically integrate with a payment gateway
        // For now, we'll just set a success message
        $success_message = "Thank you for your generous donation of ₹{$amount}! We will contact you shortly with payment details.";
    } else {
        $error_message = "Please fill in all required fields.";
    }
}

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Donate Now</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('donate.php') ?>">Donate</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Donate Start -->
<div class="container-fluid">
    <div class="donate" data-parallax="scroll" data-image-src="<?= asset('img/donate.jpg') ?>">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="donate-content">
                    <div class="section-header">
                        <p>Donate Now</p>
                        <h2>Support our divine mission to serve the needy</h2>
                    </div>
                    <div class="donate-text">
                        <p>
                            Your generous contribution helps us continue our mission of serving humanity through the
                            divine grace of Durga Ma. Every donation, no matter the size, makes a meaningful difference
                            in the lives of those we serve. Join us in spreading love, compassion, and hope to those who
                            need it most.
                        </p>

                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success mt-3"><?= $success_message ?></div>
                        <?php endif; ?>
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger mt-3"><?= $error_message ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="donate-form">
                    <form action="<?= url('donate.php') ?>" method="POST">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name"
                                required="required" value="<?= isset($name) ? $name : '' ?>" />
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address"
                                required="required" value="<?= isset($email) ? $email : '' ?>" />
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-custom active">
                                <input type="radio" name="amount" value="500" checked> ₹500
                            </label>
                            <label class="btn btn-custom">
                                <input type="radio" name="amount" value="1000"> ₹1000
                            </label>
                            <label class="btn btn-custom">
                                <input type="radio" name="amount" value="2000"> ₹2000
                            </label>
                        </div>
                        <div class="control-group">
                            <input type="number" name="custom_amount" class="form-control"
                                placeholder="Enter custom amount (₹)" min="1" />
                            <small class="form-text text-muted">Or enter a custom amount above</small>
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit">Donate Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donate End -->

<?php include '../app/views/layout/footer.php'; ?>