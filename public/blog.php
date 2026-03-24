<?php
require_once '../app/config/config.php';

$pageTitle = "Blog & News";
$pageDescription = "Stay updated with the latest news, articles, and insights from Durga Saptashati Foundation.";
$pageKeywords = "Durga Saptashati blog, news, articles, community impact, charity updates";

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC");
$stmt->execute();
$allBlogs = $stmt->fetchAll();

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Blog</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">Blog</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Listing Start -->
<div class="container-fluid">
    <div class="container py-3">
        <div class="text-center mb-5">
            <h6 class="text-uppercase mb-1" style="color:#f26522;letter-spacing:3px;font-weight:600;">From Our Blog</h6>
            <h1 style="color:#1a1b2e;">Latest <span style="color:#f26522;">News & Articles</span></h1>
        </div>

        <?php if (empty($allBlogs)): ?>
        <div class="text-center" style="padding:60px 0;">
            <i class="fas fa-newspaper" style="font-size:3rem;color:#ddd;margin-bottom:15px;"></i>
            <p style="color:#999;font-size:1rem;">No blog posts published yet. Check back soon!</p>
        </div>
        <?php else: ?>
        <div class="row" style="display:flex;flex-wrap:wrap;">
            <?php foreach ($allBlogs as $idx => $bp): ?>
            <div class="col-lg-4 col-md-6 mb-4 d-flex">
                <a href="<?= url('blog/' . $bp['slug']) ?>" class="d-flex flex-column"
                    style="border-radius:12px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);transition:all 0.4s;background:#fff;width:100%;text-decoration:none;color:inherit;cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                    onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 25px rgba(0,0,0,0.08)'">
                    <div style="position:relative;overflow:hidden;">
                        <?php $blogImg = $bp['image'] ? asset('uploads/blogs/' . $bp['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg'); ?>
                        <img class="w-100" src="<?= $blogImg ?>" alt="<?= htmlspecialchars($bp['title']) ?>"
                            style="height:220px;object-fit:cover;transition:transform 0.5s;"
                            onmouseover="this.style.transform='scale(1.05)'"
                            onmouseout="this.style.transform='scale(1)'">
                        <?php if (!empty($bp['category'])): ?>
                        <div
                            style="position:absolute;top:15px;left:15px;background:#f26522;color:#fff;padding:5px 14px;border-radius:20px;font-size:0.75rem;font-weight:600;">
                            <i class="fas fa-tag mr-1"></i> <?= htmlspecialchars($bp['category']) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center mb-3" style="gap:15px;">
                            <small style="color:#999;"><i class="far fa-calendar-alt mr-1" style="color:#f26522;"></i>
                                <?= date('M d, Y', strtotime($bp['created_at'])) ?></small>
                            <small style="color:#999;"><i class="far fa-user mr-1" style="color:#f26522;"></i>
                                <?= htmlspecialchars($bp['author'] ?? 'Admin') ?></small>
                            <?php
                                $ccStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ? AND status = 'approved'");
                                $ccStmt->execute([$bp['id']]);
                                $ccCount = $ccStmt->fetchColumn();
                                ?>
                            <small style="color:#999;"><i class="far fa-comment mr-1" style="color:#f26522;"></i>
                                <?= $ccCount ?></small>
                        </div>
                        <h5 class="font-weight-bold mb-2" style="color:#1a1b2e;font-size:1.1rem;line-height:1.4;">
                            <?= htmlspecialchars($bp['title']) ?></h5>
                        <p class="flex-grow-1" style="color:#666;font-size:0.9rem;line-height:1.7;">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags($bp['content'] ?? ''), 0, 150, '...')) ?></p>
                        <span style="color:#f26522;font-weight:600;font-size:0.9rem;display:inline-flex;align-items:center;">
                            Read More <i class="fa fa-long-arrow-alt-right ml-2"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Blog Listing End -->

<?php include '../app/views/layout/footer.php'; ?>