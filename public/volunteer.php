<?php
require_once '../app/config/config.php';

$pageTitle = "Volunteer With Us";
$pageDescription = "Join the Durga Saptashati Foundation volunteer community and contribute to meaningful social change. Help us serve humanity through various charitable and spiritual activities.";
$pageKeywords = "volunteer, join NGO, serve humanity, community service, spiritual volunteering, Durga Saptashati";

// Handle volunteer form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $message = sanitize($_POST['message'] ?? '');
    $skills = sanitize($_POST['skills'] ?? '');

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Here you would typically send an email or save to database
        $success_message = "Thank you for your interest in volunteering with us! We will contact you soon with more details.";
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
                <h2>Volunteer With Us</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('volunteer.php') ?>">Volunteer</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Volunteer Start -->
<div class="volunteer" data-parallax="scroll" data-image-src="<?= asset('img/volunteer.jpg') ?>">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="volunteer-form">
                    <?php if (isset($success_message)): ?>
                        <div class="alert alert-success mb-3"><?= $success_message ?></div>
                    <?php endif; ?>
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger mb-3"><?= $error_message ?></div>
                    <?php endif; ?>

                    <form action="<?= url('volunteer.php') ?>" method="POST">
                        <div class="control-group">
                            <input type="text" name="name" class="form-control" placeholder="Full Name" required
                                value="<?= isset($name) ? $name : '' ?>" />
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required
                                value="<?= isset($email) ? $email : '' ?>" />
                        </div>
                        <div class="control-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number"
                                value="<?= isset($phone) ? $phone : '' ?>" />
                        </div>
                        <div class="control-group">
                            <select name="skills" class="form-control">
                                <option value="">Select Your Skills/Interest Area</option>
                                <option value="education" <?= (isset($skills) && $skills === 'education') ? 'selected' : '' ?>>Education & Teaching</option>
                                <option value="healthcare" <?= (isset($skills) && $skills === 'healthcare') ? 'selected' : '' ?>>Healthcare & Medical</option>
                                <option value="community" <?= (isset($skills) && $skills === 'community') ? 'selected' : '' ?>>Community Service</option>
                                <option value="administration" <?= (isset($skills) && $skills === 'administration') ? 'selected' : '' ?>>Administration</option>
                                <option value="fundraising" <?= (isset($skills) && $skills === 'fundraising') ? 'selected' : '' ?>>Fundraising</option>
                                <option value="spiritual" <?= (isset($skills) && $skills === 'spiritual') ? 'selected' : '' ?>>Spiritual Activities</option>
                                <option value="other" <?= (isset($skills) && $skills === 'other') ? 'selected' : '' ?>>
                                    Other</option>
                            </select>
                        </div>
                        <div class="control-group">
                            <textarea name="message" class="form-control"
                                placeholder="Why do you want to become a volunteer? Tell us about your motivation and availability."
                                required><?= isset($message) ? $message : '' ?></textarea>
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit">Join Our Mission</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="volunteer-content">
                    <div class="section-header">
                        <p>Become A Volunteer</p>
                        <h2>Join our divine mission to serve humanity</h2>
                    </div>
                    <div class="volunteer-text">
                        <p>
                            Join our volunteer family and be part of the divine service to humanity. Through
                            volunteering with Durga Saptashati Foundation, you can contribute to meaningful change while
                            experiencing spiritual growth and fulfillment. Together, we can serve the Divine Mother by
                            serving her children.
                        </p>
                        <p>
                            Our volunteers participate in various activities including educational programs, healthcare
                            camps, community development initiatives, spiritual events, and disaster relief efforts.
                            Whether you have a few hours a week or can dedicate more time, your contribution matters.
                        </p>
                        <p>
                            As a volunteer, you'll not only help transform lives but also experience personal growth,
                            develop new skills, build meaningful connections, and find purpose in serving others. Join
                            us in creating a more compassionate and equitable world.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Volunteer End -->

<?php include '../app/views/layout/footer.php'; ?>