<?php
require_once '../app/config/config.php';

$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    header('Location: ' . url('news.php'));
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM news WHERE slug = ? AND status = 'published'");
$stmt->execute([$slug]);
$news = $stmt->fetch();

if (!$news) {
    header('Location: ' . url('news.php'));
    exit;
}

$pageTitle = $news['title'];
$pageDescription = mb_strimwidth(strip_tags($news['content']), 0, 160, '...');
$pageKeywords = "news, " . $news['category'] . ", Durga Saptashati Foundation";

// Get related news (same category, exclude current)
$relatedStmt = $pdo->prepare("SELECT * FROM news WHERE status = 'published' AND id != ? AND category = ? ORDER BY created_at DESC LIMIT 3");
$relatedStmt->execute([$news['id'], $news['category']]);
$relatedNews = $relatedStmt->fetchAll();

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?= url('assets/css/about.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2><?= htmlspecialchars($news['title']) ?></h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('news.php') ?>">News</a>
                <a href="#"><?= htmlspecialchars(mb_strimwidth($news['title'], 0, 40, '...')) ?></a>
            </div>
        </div>
    </div>
</div>

<section style="background:#f8f9fa;padding:50px 0;">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 mb-4">
                <div class="nd-card">
                    <?php if ($news['image']): ?>
                    <div class="nd-img-wrap">
                        <img src="<?= asset('uploads/news/' . $news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                        <span class="nd-category"><i class="fas fa-tag"></i> <?= htmlspecialchars($news['category']) ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="nd-body">
                        <div class="nd-meta">
                            <span><i class="far fa-calendar-alt"></i> <?= date('F d, Y', strtotime($news['created_at'])) ?></span>
                            <?php if ($news['source']): ?>
                            <span><i class="far fa-building"></i> <?= htmlspecialchars($news['source']) ?></span>
                            <?php endif; ?>
                            <span><i class="fas fa-tag"></i> <?= htmlspecialchars($news['category']) ?></span>
                        </div>
                        <h1 class="nd-title"><?= htmlspecialchars($news['title']) ?></h1>
                        <div class="nd-content">
                            <?= nl2br(htmlspecialchars($news['content'])) ?>
                        </div>
                        <?php if ($news['source_url']): ?>
                        <div class="nd-source">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Source: <a href="<?= htmlspecialchars($news['source_url']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($news['source'] ?: 'Original Article') ?></a></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Recent News -->
                <?php
                $recentStmt = $pdo->prepare("SELECT title, slug, image, created_at FROM news WHERE status = 'published' AND id != ? ORDER BY created_at DESC LIMIT 5");
                $recentStmt->execute([$news['id']]);
                $recentNews = $recentStmt->fetchAll();
                ?>
                <?php if (!empty($recentNews)): ?>
                <div style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:25px;">
                    <h5 style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">Recent News</h5>
                    <?php foreach ($recentNews as $rn): ?>
                    <a href="<?= url('news/' . $rn['slug']) ?>" style="display:flex;gap:12px;align-items:center;padding:10px 0;border-bottom:1px solid #f3f4f6;text-decoration:none;transition:all 0.2s;"
                        onmouseover="this.querySelector('h6').style.color='#f26522'" onmouseout="this.querySelector('h6').style.color='#1a1b2e'">
                        <?php if ($rn['image']): ?>
                        <img src="<?= asset('uploads/news/' . $rn['image']) ?>" alt="" style="width:65px;height:50px;object-fit:cover;border-radius:8px;flex-shrink:0;">
                        <?php else: ?>
                        <div style="width:65px;height:50px;border-radius:8px;background:linear-gradient(135deg,#1a1b2e,#2a2b45);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-newspaper" style="color:rgba(242,101,34,0.4);font-size:0.9rem;"></i></div>
                        <?php endif; ?>
                        <div>
                            <h6 style="margin:0;font-size:0.82rem;font-weight:600;color:#1a1b2e;line-height:1.4;transition:color 0.2s;"><?= htmlspecialchars(mb_strimwidth($rn['title'], 0, 50, '...')) ?></h6>
                            <small style="color:#999;font-size:0.72rem;"><i class="far fa-calendar-alt" style="margin-right:3px;"></i><?= date('M d, Y', strtotime($rn['created_at'])) ?></small>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Categories -->
                <div style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:25px;">
                    <h5 style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">Categories</h5>
                    <?php
                    $catStmt = $pdo->query("SELECT category, COUNT(*) as cnt FROM news WHERE status='published' AND category IS NOT NULL AND category != '' GROUP BY category ORDER BY cnt DESC");
                    $newsCategories = $catStmt->fetchAll();
                    ?>
                    <?php foreach ($newsCategories as $cat): ?>
                    <div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid #f3f4f6;">
                        <span style="color:#555;font-size:0.88rem;"><?= htmlspecialchars($cat['category']) ?></span>
                        <span style="background:rgba(242,101,34,0.1);color:#f26522;padding:2px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><?= $cat['cnt'] ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.nd-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}
.nd-img-wrap {
    position: relative;
    overflow: hidden;
}
.nd-img-wrap img {
    width: 100%;
    height: auto;
    display: block;
}
.nd-category {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #f26522;
    color: #fff;
    padding: 5px 14px;
    border-radius: 25px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.nd-body { padding: 30px; }
.nd-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    margin-bottom: 18px;
}
.nd-meta span {
    font-size: 0.82rem;
    color: #999;
    display: flex;
    align-items: center;
    gap: 5px;
}
.nd-meta i { color: #f26522; }
.nd-title {
    color: #1a1b2e;
    font-weight: 800;
    font-size: 1.6rem;
    line-height: 1.4;
    margin-bottom: 20px;
}
.nd-content {
    color: #555;
    font-size: 0.95rem;
    line-height: 1.9;
}
.nd-source {
    margin-top: 25px;
    padding: 14px 18px;
    background: #f8f9fa;
    border-left: 3px solid #f26522;
    border-radius: 0 8px 8px 0;
    font-size: 0.85rem;
    color: #666;
    display: flex;
    align-items: center;
    gap: 8px;
}
.nd-source a { color: #f26522; font-weight: 600; }
.nd-sidebar-card {
    background: #fff;
    border-radius: 14px;
    padding: 22px;
    margin-bottom: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
}
.nd-sidebar-card h5 {
    color: #1a1b2e;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f0f0f0;
}
.nd-related-item {
    display: flex;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none;
    transition: all 0.3s;
}
.nd-related-item:last-child { border-bottom: none; }
.nd-related-item:hover { padding-left: 5px; }
.nd-related-item:hover h6 { color: #f26522; }
.nd-related-info h6 {
    color: #1a1b2e;
    font-size: 0.88rem;
    font-weight: 600;
    margin: 0 0 4px;
    line-height: 1.4;
    transition: color 0.3s;
}
.nd-related-info small {
    color: #999;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    gap: 4px;
}
.nd-related-info small i { color: #f26522; }
@media (max-width: 768px) {
    .nd-title { font-size: 1.3rem; }
    .nd-body { padding: 20px; }
}
</style>

<?php include '../app/views/layout/footer.php'; ?>
