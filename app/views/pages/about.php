<?php
?>
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>About Us</h2>
            </div>
            <div class="col-12 breadcrumb"><a href="index.php?page=home">Home</a><a href="#">About</a></div>
        </div>
    </div>
</div>

<div class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 animate-fade-in-left">
                <div class="about-img" data-parallax="0.3" data-image-src="<?php echo asset('img/about.jpg'); ?>" data-float>
                </div>
            </div>
            <div class="col-lg-6 animate-fade-in-right">
                <div class="section-header">
                    <p>Learn About Us</p>
                    <h2>Worldwide non-profit charity organization</h2>
                </div>
                <div class="content-wrapper animate-fade-in-up">
                    <p class="lead-text">Empowering communities through sustainable development, education, and healthcare initiatives across India.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae pellentesque turpis, vitae dignissim dolor. Donec auctor fermentum mauris, sed cursus dui faucibus eu. Aliquam dolor nulla, cursus eu cursus et, dapibus eget dolor.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                    <div class="about-stats animate-stagger" style="margin-top: 2rem;">
                        <div class="stat-item">
                            <h4 class="text-primary">10,000+</h4>
                            <p class="small-text">Lives Impacted</p>
                        </div>
                        <div class="stat-item">
                            <h4 class="text-primary">50+</h4>
                            <p class="small-text">Active Projects</p>
                        </div>
                        <div class="stat-item">
                            <h4 class="text-primary">15+</h4>
                            <p class="small-text">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.about-stats {
    display: flex;
    gap: 2rem;
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
}

.stat-item h4 {
    margin-bottom: 0.5rem;
    font-weight: var(--font-weight-bold);
}

@media (max-width: 767.98px) {
    .about-stats {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>