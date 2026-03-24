<?php
?>
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel-1.jpg'); ?>" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Let's be kind for children</h1>
                    <p>Lorem ipsum dolor sit amet elit. Vivamus egestas eleifend dui.</p>
                    <div class="carousel-btn">
                        <a class="btn btn-custom" href="index.php?page=join-us">Donate Now</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="<?php echo asset('img/carousel-2.jpg'); ?>" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Get Involved with helping hand</h1>
                    <p>Morbi sagittis turpis id suscipit feugiat. Suspendisse eu augue urna.</p>
                    <div class="carousel-btn">
                        <a class="btn btn-custom" href="index.php?page=join-us">Donate Now</a>
                        <a class="btn btn-custom btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch
                            Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img" data-parallax="scroll" data-image-src="<?php echo asset('img/about.jpg'); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-header">
                    <p>Learn About Us</p>
                    <h2>Worldwide non-profit charity organization</h2>
                </div>
                <div class="about-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item"><a class="nav-link active" data-toggle="pill"
                                href="#tab-content-1">About</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab-content-2">Mission</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tab-content-3">Vision</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-content-1" class="container-fluid tab-pane active">Lorem ipsum dolor sit amet...
                        </div>
                        <div id="tab-content-2" class="container-fluid tab-pane fade">Sed tincidunt, magna ut vehicula
                            volutpat...</div>
                        <div id="tab-content-3" class="container-fluid tab-pane fade">Aliquam dolor odio, mollis sed
                            feugiat...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>