<?php
require_once '../app/config/config.php';

$pageTitle = "News & Updates";
$pageDescription = "Stay informed with the latest news and updates from Durga Saptashati Foundation — our initiatives, events, and community impact stories.";
$pageKeywords = "Durga Saptashati news, NGO updates, charity news, community news, foundation updates";

try {
    $allNews = $pdo->query("SELECT * FROM news WHERE status = 'published' ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $allNews = [];
}

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/about.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>News & Updates</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('news.php') ?>">News</a>
            </div>
        </div>
    </div>
</div>

<section style="background:#f8f9fa;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">Latest Updates
            </h6>
            <h2 style="color:#1a1b2e;font-weight:800;">News & <span style="color:#f26522;">Announcements</span></h2>
            <p style="color:#888;max-width:550px;margin:1px auto 0;font-size:0.92rem;">Stay updated with our latest
                initiatives, events, and impact stories from the field and community highlights worldwide.</p>
        </div>

        <?php if (empty($allNews)): ?>
        <div class="text-center" style="padding:60px 0;">
            <i class="fas fa-newspaper" style="font-size:3rem;color:#ddd;margin-bottom:15px;display:block;"></i>
            <p style="color:#999;font-size:1rem;">No news articles published yet. Check back soon!</p>
        </div>
        <?php else: ?>
        <div class="row" style="row-gap:30px;">
            <?php foreach ($allNews as $i => $news): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 3 + 1) * 100 ?>">
                <a href="<?= url('news/' . $news['slug']) ?>" class="news-card"
                    style="text-decoration:none;color:inherit;">
                    <div class="news-img-wrap">
                        <?php if ($news['image']): ?>
                        <img src="<?= asset('uploads/news/' . $news['image']) ?>"
                            alt="<?= htmlspecialchars($news['title']) ?>">
                        <?php else: ?>
                        <div class="news-img-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <?php endif; ?>
                        <span class="news-category"><i class="fas fa-tag"></i>
                            <?= htmlspecialchars($news['category']) ?></span>
                    </div>
                    <div class="news-body">
                        <div class="news-meta">
                            <span><i class="far fa-calendar-alt"></i>
                                <?= date('M d, Y', strtotime($news['created_at'])) ?></span>
                            <?php if ($news['source']): ?>
                            <span><i class="far fa-building"></i> <?= htmlspecialchars($news['source']) ?></span>
                            <?php endif; ?>
                        </div>
                        <h5 class="news-title"><?= htmlspecialchars($news['title']) ?></h5>
                        <p class="news-excerpt">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags($news['content']), 0, 150, '...')) ?>
                        </p>
                        <span class="news-read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.news-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    height: 100%;
    border: 1px solid rgba(0, 0, 0, 0.05);
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
}

.news-img-wrap {
    position: relative;
    overflow: hidden;
    height: 220px;
}

.news-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s;
}

.news-card:hover .news-img-wrap img {
    transform: scale(1.06);
}

.news-img-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1a1b2e, #2a2b45);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: rgba(242, 101, 34, 0.3);
}

.news-category {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #f26522;
    color: #fff;
    padding: 5px 14px;
    border-radius: 25px;
    font-size: 0.72rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    box-shadow: 0 4px 12px rgba(242, 101, 34, 0.3);
}

.news-body {
    padding: 22px 24px 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 12px;
}

.news-meta span {
    font-size: 0.78rem;
    color: #999;
    display: flex;
    align-items: center;
    gap: 5px;
}

.news-meta i {
    color: #f26522;
}

.news-title {
    color: #1a1b2e;
    font-weight: 700;
    font-size: 1.1rem;
    line-height: 1.4;
    margin-bottom: 10px;
    transition: color 0.3s;
}

.news-card:hover .news-title {
    color: #f26522;
}

.news-excerpt {
    color: #777;
    font-size: 0.88rem;
    line-height: 1.7;
    margin: 0;
    flex-grow: 1;
}

.news-read-more {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #f26522;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    margin-top: 16px;
    transition: gap 0.3s;
}

.news-read-more:hover {
    gap: 10px;
    color: #d4541a;
    text-decoration: none;
}
</style>

<?php include '../app/views/layout/footer.php'; ?>