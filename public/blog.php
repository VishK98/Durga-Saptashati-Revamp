<?php
require_once '../app/config/config.php';

$pageTitle = "Blog — Latest News & Stories | Saptashati Foundation";
$pageDescription = "Read the latest stories, updates, and insights from Saptashati Foundation's work in women empowerment, education, and social welfare.";
$pageKeywords = "Saptashati blog, NGO news, charity updates, community impact stories, women empowerment articles, education insights";

// Category filter
$filterCategory = trim($_GET['category'] ?? '');

// Pagination
$perPage = 9;
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * $perPage;

if ($filterCategory) {
    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM blogs WHERE status = 'published' AND category = ?");
    $totalStmt->execute([$filterCategory]);
} else {
    $totalStmt = $pdo->prepare("SELECT COUNT(*) FROM blogs WHERE status = 'published'");
    $totalStmt->execute();
}
$totalBlogs = (int) $totalStmt->fetchColumn();
$totalPages = max(1, ceil($totalBlogs / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

if ($filterCategory) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE status = 'published' AND category = :category ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':category', $filterCategory);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
} else {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE status = 'published' ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
}
$stmt->execute();
$allBlogs = $stmt->fetchAll();

include '../app/views/layout/header.php';
?>

<link rel="stylesheet" href="<?php echo asset('css/blog.css'); ?>">

<!-- Page Header Start -->
<div class="page-header blog-page-header">
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
            <h6 class="text-uppercase mb-2 blog-section-label">From Our Blog</h6>
            <h2 class="blog-section-heading">Latest <span>Articles & Insights</span></h2>
            <p class="blog-section-desc">Insights, stories, and updates
                from our journey of empowering communities and transforming lives.</p>
            <?php if ($filterCategory): ?>
            <div style="margin-top:15px;">
                <span style="background:rgba(242,101,34,0.1);color:#f26522;padding:6px 16px;border-radius:20px;font-size:0.85rem;font-weight:600;">
                    <i class="fas fa-tag" style="margin-right:4px;"></i> <?= htmlspecialchars($filterCategory) ?>
                </span>
                <a href="<?= url('blog.php') ?>" style="color:#999;font-size:0.85rem;margin-left:10px;text-decoration:none;">
                    <i class="fas fa-times"></i> Clear filter
                </a>
            </div>
            <?php endif; ?>
        </div>

        <?php if (empty($allBlogs)): ?>
        <div class="text-center blog-empty">
            <i class="fas fa-newspaper blog-empty-icon"></i>
            <p class="blog-empty-text">No blog posts published yet. Check back soon!</p>
        </div>
        <?php else: ?>
        <div class="row d-flex flex-wrap">
            <?php foreach ($allBlogs as $idx => $bp): ?>
            <div class="col-lg-4 col-md-6 mb-4 d-flex">
                <a href="<?= url('blog/' . $bp['slug']) ?>" class="blog-card d-flex flex-column">
                    <div class="blog-card-img-wrap">
                        <?php $blogImg = $bp['image'] ? asset('uploads/blogs/' . $bp['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg'); ?>
                        <img class="w-100 blog-card-img" src="<?= $blogImg ?>" alt="<?= htmlspecialchars($bp['title']) ?>">
                        <?php if (!empty($bp['category'])): ?>
                        <div class="blog-card-category">
                            <i class="fas fa-tag mr-1"></i> <?= htmlspecialchars($bp['category']) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4 d-flex flex-column flex-grow-1">
                        <div class="d-flex align-items-center mb-3 blog-card-meta">
                            <small><i class="far fa-calendar-alt mr-1"></i>
                                <?= date('M d, Y', strtotime($bp['created_at'])) ?></small>
                            <small><i class="far fa-user mr-1"></i>
                                <?= htmlspecialchars($bp['author'] ?? 'Admin') ?></small>
                            <?php
                                    $ccStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ? AND status = 'approved'");
                                    $ccStmt->execute([$bp['id']]);
                                    $ccCount = $ccStmt->fetchColumn();
                                    ?>
                            <small><i class="far fa-comment mr-1"></i>
                                <?= $ccCount ?></small>
                        </div>
                        <h5 class="font-weight-bold mb-2 blog-card-title">
                            <?= htmlspecialchars($bp['title']) ?>
                        </h5>
                        <p class="flex-grow-1 blog-card-excerpt">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags($bp['content'] ?? ''), 0, 150, '...')) ?>
                        </p>
                        <span class="blog-card-readmore">
                            Read More <i class="fa fa-long-arrow-alt-right ml-2"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <?php
        $catParam = $filterCategory ? '&category=' . urlencode($filterCategory) : '';
        $blogPageUrl = function($pg) use ($catParam) { return url('blog.php?page=' . $pg . $catParam); };
        ?>
        <?php if ($totalPages > 1): ?>
        <nav class="blog-pagination-nav">
            <ul class="blog-pagination">
                <li>
                    <a href="<?= $blogPageUrl(1) ?>" class="blog-page-link<?= $page === 1 ? ' disabled' : '' ?>">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= $page > 1 ? $blogPageUrl($page - 1) : '#' ?>"
                        class="blog-page-link<?= $page === 1 ? ' disabled' : '' ?>">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>

                <?php
                $pages = [];
                $pages[] = 1;
                for ($p = max(2, $page - 1); $p <= min($totalPages - 1, $page + 1); $p++) {
                    $pages[] = $p;
                }
                if ($totalPages > 1) $pages[] = $totalPages;
                $pages = array_unique($pages);
                sort($pages);

                $prev = null;
                foreach ($pages as $p):
                    if ($prev !== null && $p - $prev > 1): ?>
                <li><span class="blog-page-dots">&hellip;</span></li>
                <?php endif; ?>
                <li>
                    <a href="<?= $blogPageUrl($p) ?>"
                        class="blog-page-link<?= $p === $page ? ' blog-page-active' : '' ?>">
                        <?= $p ?>
                    </a>
                </li>
                <?php $prev = $p;
                endforeach; ?>

                <li>
                    <a href="<?= $page < $totalPages ? $blogPageUrl($page + 1) : '#' ?>"
                        class="blog-page-link<?= $page === $totalPages ? ' disabled' : '' ?>">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li>
                    <a href="<?= $blogPageUrl($totalPages) ?>"
                        class="blog-page-link<?= $page === $totalPages ? ' disabled' : '' ?>">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>

        <?php endif; ?>
    </div>
</div>
<!-- Blog Listing End -->

<?php include '../app/views/layout/footer.php'; ?>
