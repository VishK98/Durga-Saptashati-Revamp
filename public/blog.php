<?php
require_once '../app/config/config.php';

$pageTitle = "Blog & News";
$pageDescription = "Stay updated with the latest news, articles, and spiritual insights from Durga Saptashati Foundation. Read about our community impact, divine teachings, and charitable activities.";
$pageKeywords = "Durga Saptashati blog, news, articles, spiritual insights, community impact, charity updates";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>From Blog</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">Blog</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="blog">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Our Blog</p>
            <h2>Latest news & spiritual insights from our foundation</h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-1.jpg') ?>" alt="The Power of Saptashati Path">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">The Power of Saptashati Path</a></h3>
                        <p>
                            Discover the spiritual significance and transformative benefits of reciting the Durga
                            Saptashati for personal growth and divine blessings
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">12 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-2.jpg') ?>" alt="Community Service and Spiritual Growth">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">Community Service and Spiritual Growth</a></h3>
                        <p>
                            Learn how serving others through charitable activities leads to spiritual development and
                            inner peace through divine grace
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">8 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-3.jpg') ?>" alt="Healthcare for All: Our Mission">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">Healthcare for All: Our Mission</a></h3>
                        <p>
                            Read about our ongoing healthcare initiatives and how we're working to provide medical
                            assistance to underserved communities
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">15 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-1.jpg') ?>" alt="Women Empowerment Through Divine Strength">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">Women Empowerment Through Divine Strength</a></h3>
                        <p>
                            Explore how the divine feminine energy of Durga Ma inspires and empowers women in our
                            community programs and initiatives
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">10 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-2.jpg') ?>" alt="Education as Divine Service">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">Education as Divine Service</a></h3>
                        <p>
                            Understanding how providing education to underprivileged children aligns with our spiritual
                            mission and creates lasting impact
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">18 Comments</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="<?= asset('img/blog-3.jpg') ?>" alt="Celebrating Navratri with the Community">
                    </div>
                    <div class="blog-text">
                        <h3><a href="<?= url('single.php') ?>">Celebrating Navratri with the Community</a></h3>
                        <p>
                            Join us as we celebrate the nine divine nights of Navratri with community prayers, cultural
                            programs, and charitable activities
                        </p>
                    </div>
                    <div class="blog-meta">
                        <p><i class="fa fa-user"></i><a href="#">Admin</a></p>
                        <p><i class="fa fa-comments"></i><a href="#">22 Comments</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php include '../app/views/layout/footer.php'; ?>