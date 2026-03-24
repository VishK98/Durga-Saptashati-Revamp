<?php
require_once '../app/config/config.php';

$pageTitle = "Blog Article";
$pageDescription = "Read detailed articles about Durga Saptashati Foundation's activities, spiritual insights, community impact stories, and divine teachings.";
$pageKeywords = "blog article, Durga Saptashati, spiritual insights, community impact, teachings, charity";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Blog Article</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">Blog</a>
                <a href="<?= url('single.php') ?>">Article</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="single">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-content">
                    <img src="<?= asset('img/blog-1.jpg') ?>" alt="The Power of Saptashati Path" />
                    <h2>The Power of Saptashati Path: Transforming Lives Through Divine Grace</h2>
                    <p>
                        The Durga Saptashati, also known as Devi Mahatmya, is a sacred text that narrates the glory and
                        power of Goddess Durga. This ancient scripture consists of 700 verses that describe the victory
                        of the Divine Mother over evil forces, symbolizing the triumph of good over evil.
                    </p>
                    <p>
                        Regular recitation of the Saptashati path has profound spiritual and practical benefits.
                        Devotees who engage in this sacred practice often experience increased mental peace, protection
                        from negative influences, and the fulfillment of their righteous desires. The path serves as a
                        powerful tool for spiritual transformation and personal growth.
                    </p>
                    <p>
                        At Durga Saptashati Foundation, we organize regular Saptashati path sessions where community
                        members come together to recite these sacred verses. These gatherings not only strengthen our
                        spiritual connection but also foster a sense of unity and shared purpose among participants.
                    </p>
                    <p>
                        The foundation has witnessed numerous instances where devotees have experienced miraculous
                        changes in their lives through the regular practice of Saptashati path. From healing of
                        illnesses to resolution of family disputes, from success in endeavors to protection from
                        calamities, the Divine Mother's blessings manifest in countless ways.
                    </p>
                    <p>
                        We encourage everyone to participate in our monthly Saptashati path sessions and experience the
                        transformative power of divine grace. Through collective chanting and devotion, we create a
                        powerful spiritual atmosphere that benefits not only the participants but the entire community.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <div class="search-widget">
                            <form>
                                <input class="form-control" type="text" placeholder="Search Blog Articles">
                                <button class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h2 class="widget-title">Recent Articles</h2>
                        <div class="recent-post">
                            <div class="post-item">
                                <div class="post-img">
                                    <img src="<?= asset('img/blog-1.jpg') ?>" alt="Community Service" />
                                </div>
                                <div class="post-text">
                                    <a href="#">Community Service and Spiritual Growth</a>
                                    <div class="post-meta">
                                        <p><i class="fa fa-user"></i>By <a href="#">Admin</a></p>
                                        <p><i class="fa fa-calendar"></i>01-Jan-2024</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-img">
                                    <img src="<?= asset('img/blog-2.jpg') ?>" alt="Healthcare Mission" />
                                </div>
                                <div class="post-text">
                                    <a href="#">Healthcare for All: Our Mission</a>
                                    <div class="post-meta">
                                        <p><i class="fa fa-user"></i>By <a href="#">Admin</a></p>
                                        <p><i class="fa fa-calendar"></i>15-Dec-2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h2 class="widget-title">Categories</h2>
                        <div class="category-widget">
                            <ul>
                                <li><a href="#">Spiritual Teachings</a><span>(25)</span></li>
                                <li><a href="#">Community Service</a><span>(18)</span></li>
                                <li><a href="#">Healthcare Programs</a><span>(15)</span></li>
                                <li><a href="#">Education Initiatives</a><span>(12)</span></li>
                                <li><a href="#">Women Empowerment</a><span>(10)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php include '../app/views/layout/footer.php'; ?>