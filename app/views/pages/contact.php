<?php
?>
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Contact Us</h2>
            </div>
            <div class="col-12 breadcrumb"><a href="index.php?page=home">Home</a><a href="#">Contact</a></div>
        </div>
    </div>
</div>

<div class="contact">
    <div class="container-fluid">
        <div class="section-header text-center animate-fade-in-up">
            <p>Get In Touch</p>
            <h2>Let's Connect and Make a Difference Together</h2>
        </div>
        
        <div class="row">
            <div class="col-lg-6 animate-fade-in-left">
                <div class="contact-info-section">
                    <div class="contact-img animate-scale-in" data-float>
                        <img src="<?php echo asset('img/contact.jpg'); ?>" alt="Contact Us - Durga Saptashati Foundation" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    </div>
                    
                    <div class="contact-info animate-stagger" style="margin-top: 2rem;">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h5>Visit Us</h5>
                                <p class="small-text">123 Foundation Street, New Delhi, India 110001</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h5>Call Us</h5>
                                <p class="small-text">+91 98765 43210</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h5>Email Us</h5>
                                <p class="small-text">info@durgasaptashatifoundation.org</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 animate-fade-in-right">
                <div class="contact-form">
                    <h3 class="form-title">Send us a Message</h3>
                    <p class="lead-text">Have questions or want to get involved? We'd love to hear from you.</p>
                    
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate" class="animate-fade-in-up">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name"
                                            required="required" data-validation-required-message="Please enter your name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email"
                                            required="required" data-validation-required-message="Please enter your email" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                        </div>
                        
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Your Message" rows="6"
                                    required="required" data-validation-required-message="Please enter your message"></textarea>
                        </div>
                        
                        <div class="form-submit">
                            <button class="btn-professional btn-primary" type="submit" id="sendMessageButton">
                                <i class="fas fa-paper-plane"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-info-section {
    padding-right: 2rem;
}

.contact-info .info-item {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: rgba(242, 101, 34, 0.05);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.contact-info .info-item:hover {
    transform: translateX(10px);
    background: rgba(242, 101, 34, 0.1);
    box-shadow: 0 5px 15px rgba(242, 101, 34, 0.15);
}

.info-icon {
    width: 60px;
    height: 60px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1.5rem;
    color: white;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.info-content h5 {
    color: var(--color-secondary);
    margin-bottom: 0.5rem;
    font-weight: var(--font-weight-semibold);
}

.contact-form {
    padding: 2rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.form-title {
    color: var(--color-secondary);
    margin-bottom: 1rem;
    font-weight: var(--font-weight-bold);
}

.form-control {
    border: 2px solid rgba(74, 76, 112, 0.1);
    border-radius: 10px;
    padding: 15px 20px;
    font-size: var(--font-size-base);
    transition: all 0.3s ease;
    margin-bottom: 1.5rem;
}

.form-control:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(242, 101, 34, 0.1);
    transform: translateY(-2px);
}

.form-submit {
    text-align: center;
    margin-top: 2rem;
}

@media (max-width: 991.98px) {
    .contact-info-section {
        padding-right: 0;
        margin-bottom: 3rem;
    }
    
    .contact-form {
        padding: 1.5rem;
    }
}

@media (max-width: 767.98px) {
    .contact-info .info-item {
        flex-direction: column;
        text-align: center;
        padding: 1.5rem 1rem;
    }
    
    .info-icon {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}
</style>