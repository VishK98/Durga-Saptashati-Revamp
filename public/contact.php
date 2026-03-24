<?php
require_once '../app/config/config.php';

$pageTitle = "Contact Us";
$pageDescription = "Get in touch with Durga Saptashati Foundation. Contact us for inquiries, volunteer opportunities, partnerships, or to learn more about our charitable activities and programs.";
$pageKeywords = "contact Durga Saptashati, contact NGO, volunteer inquiries, partnership, donate, support, help";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $subject = sanitize($_POST['subject'] ?? '');
    $message = sanitize($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Here you would typically send an email or save to database
        // For now, we'll just set a success message
        $success_message = "Thank you for contacting us. We will get back to you soon!";
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


<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Get In Touch</p>
            <h2>Contact us for any inquiry or support</h2>
        </div>
        <div class="contact-img">
            <img src="<?= asset('img/contact.jpg') ?>" alt="Contact Durga Saptashati Foundation">
        </div>
        <div class="contact-form">
            <div id="success">
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?= $success_message ?></div>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message ?></div>
                <?php endif; ?>
            </div>
            <form name="sentMessage" id="contactForm" action="<?= url('contact.php') ?>" method="POST"
                novalidate="novalidate">
                <div class="control-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name"
                        required="required" data-validation-required-message="Please enter your name"
                        value="<?= isset($name) ? $name : '' ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                        required="required" data-validation-required-message="Please enter your email"
                        value="<?= isset($email) ? $email : '' ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        required="required" data-validation-required-message="Please enter a subject"
                        value="<?= isset($subject) ? $subject : '' ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Message" required="required"
                        data-validation-required-message="Please enter your message"><?= isset($message) ? $message : '' ?></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <button class="btn btn-custom" type="submit" id="sendMessageButton">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include '../app/views/layout/footer.php'; ?>