<?php
require_once '../app/config/config.php';

$slug = $_GET['slug'] ?? '';
if (empty($slug)) {
    header('Location: ' . url('blog.php'));
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? AND status = 'published'");
$stmt->execute([$slug]);
$blog = $stmt->fetch();

if (!$blog) {
    header('Location: ' . url('blog.php'));
    exit;
}


$pageTitle = $blog['title'];
$pageDescription = $blog['meta_description'] ?? mb_strimwidth(strip_tags($blog['content']), 0, 160, '...');
$pageKeywords = $blog['meta_keywords'] ?? 'blog, ' . $blog['category'];

// Get related blogs (same category, exclude current)
$relatedStmt = $pdo->prepare("SELECT * FROM blogs WHERE status = 'published' AND id != ? AND category = ? ORDER BY created_at DESC LIMIT 3");
$relatedStmt->execute([$blog['id'], $blog['category']]);
$relatedBlogs = $relatedStmt->fetchAll();

// Get approved comments
$commentsStmt = $pdo->prepare("SELECT * FROM blog_comments WHERE blog_id = ? AND status = 'approved' ORDER BY created_at DESC");
$commentsStmt->execute([$blog['id']]);
$comments = $commentsStmt->fetchAll();
$commentCount = count($comments);

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2><?= htmlspecialchars($blog['title']) ?></h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('blog.php') ?>">Blog</a>
                <a href="#"><?= htmlspecialchars($blog['title']) ?></a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article style="background:#fff;border-radius:14px;overflow:hidden;">
                    <?php if ($blog['image']): ?>
                    <img src="<?= asset('uploads/blogs/' . $blog['image']) ?>"
                        alt="<?= htmlspecialchars($blog['title']) ?>"
                        style="width:100%;max-height:450px;object-fit:cover;">
                    <?php endif; ?>

                    <div style="padding:30px 35px;">
                        <!-- Meta -->
                        <div
                            style="display:flex;flex-wrap:wrap;gap:18px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid #eee;">
                            <span style="color:#999;font-size:0.85rem;">
                                <i class="far fa-calendar-alt" style="color:#f26522;margin-right:5px;"></i>
                                <?= date('F d, Y', strtotime($blog['created_at'])) ?>
                            </span>
                            <span style="color:#999;font-size:0.85rem;">
                                <i class="far fa-user" style="color:#f26522;margin-right:5px;"></i>
                                <?= htmlspecialchars($blog['author'] ?? 'Admin') ?>
                            </span>
                            <span style="color:#999;font-size:0.85rem;">
                                <i class="far fa-comment" style="color:#f26522;margin-right:5px;"></i>
                                <?= $commentCount ?> Comment<?= $commentCount !== 1 ? 's' : '' ?>
                            </span>
                            <?php if ($blog['category']): ?>
                            <span
                                style="background:rgba(242,101,34,0.1);color:#f26522;padding:3px 12px;border-radius:20px;font-size:0.78rem;font-weight:600;">
                                <?= htmlspecialchars($blog['category']) ?>
                            </span>
                            <?php endif; ?>
                        </div>

                        <!-- Title -->
                        <h2 style="color:#1a1b2e;font-weight:700;font-size:1.6rem;margin-bottom:20px;line-height:1.4;">
                            <?= htmlspecialchars($blog['title']) ?>
                        </h2>

                        <!-- Content -->
                        <div class="blog-content" style="color:#555;font-size:1rem;line-height:1.9;">
                            <?= $blog['content'] ?>
                        </div>

                        <!-- Tags/Keywords -->

                        <!-- Share -->
                        <div
                            style="margin-top:25px;padding-top:20px;border-top:1px solid #eee;display:flex;align-items:center;gap:12px;">
                            <strong style="color:#333;font-size:0.85rem;">Share:</strong>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(APP_URL . '/public/blog/' . $blog['slug']) ?>"
                                target="_blank"
                                style="width:36px;height:36px;border-radius:50%;background:#1877f2;color:#fff;display:flex;align-items:center;justify-content:center;font-size:0.85rem;transition:transform 0.2s;"
                                onmouseover="this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transform='scale(1)'"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(APP_URL . '/public/blog/' . $blog['slug']) ?>&text=<?= urlencode($blog['title']) ?>"
                                target="_blank"
                                style="width:36px;height:36px;border-radius:50%;background:#1da1f2;color:#fff;display:flex;align-items:center;justify-content:center;font-size:0.85rem;transition:transform 0.2s;"
                                onmouseover="this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transform='scale(1)'"><i class="fab fa-twitter"></i></a>
                            <a href="https://wa.me/?text=<?= urlencode($blog['title'] . ' ' . APP_URL . '/public/blog/' . $blog['slug']) ?>"
                                target="_blank"
                                style="width:36px;height:36px;border-radius:50%;background:#25d366;color:#fff;display:flex;align-items:center;justify-content:center;font-size:0.85rem;transition:transform 0.2s;"
                                onmouseover="this.style.transform='scale(1.1)'"
                                onmouseout="this.style.transform='scale(1)'"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </article>

                <!-- Comments Section -->
                <div
                    style="background:#fff;border-radius:14px;padding:30px 35px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-top:30px;">
                    <h4
                        style="color:#1a1b2e;font-weight:700;margin-bottom:25px;padding-bottom:15px;border-bottom:2px solid #f26522;display:inline-block;">
                        <i class="far fa-comments" style="color:#f26522;margin-right:8px;"></i><?= $commentCount ?>
                        Comment<?= $commentCount !== 1 ? 's' : '' ?>
                    </h4>


                    <?php if (empty($comments)): ?>
                    <p style="color:#999;font-size:0.9rem;margin-bottom:0;">No comments yet. Be the first to share your
                        thoughts!</p>
                    <?php else: ?>
                    <?php foreach ($comments as $c): ?>
                    <div style="display:flex;gap:15px;padding:20px 0;border-bottom:1px solid #f3f4f6;">
                        <div
                            style="width:48px;height:48px;border-radius:50%;background:#f26522;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1.1rem;flex-shrink:0;">
                            <?= strtoupper(substr(htmlspecialchars($c['name']), 0, 1)) ?>
                        </div>
                        <div style="flex:1;">
                            <div style="display:flex;align-items:center;gap:12px;margin-bottom:6px;">
                                <strong
                                    style="color:#1a1b2e;font-size:0.95rem;"><?= htmlspecialchars($c['name']) ?></strong>
                                <small style="color:#999;font-size:0.78rem;"><i class="far fa-clock"
                                        style="margin-right:3px;"></i><?= date('M d, Y \a\t h:i A', strtotime($c['created_at'])) ?></small>
                            </div>
                            <p style="color:#555;font-size:0.9rem;line-height:1.7;margin:0;">
                                <?= nl2br(htmlspecialchars($c['comment'])) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Comment Form -->
                <div
                    style="background:#fff;border-radius:14px;padding:30px 35px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-top:30px;">
                    <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:20px;">
                        <i class="fas fa-pen" style="color:#f26522;margin-right:8px;font-size:0.9rem;"></i>Leave a
                        Comment
                    </h4>
                    <form id="commentForm" onsubmit="return false;">
                        <input type="hidden" name="blog_id" value="<?= $blog['id'] ?>">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                            <div>
                                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Name *</label>
                                <input type="text" name="name" required placeholder="Your name" style="width:100%;padding:11px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;transition:border-color 0.2s;" onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#ddd'">
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Email *</label>
                                <input type="email" name="email" required placeholder="Your email" style="width:100%;padding:11px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;transition:border-color 0.2s;" onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#ddd'">
                            </div>
                        </div>
                        <div style="margin-bottom:15px;">
                            <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Comment *</label>
                            <textarea name="comment" required rows="5" placeholder="Write your comment..." style="width:100%;padding:11px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;resize:vertical;transition:border-color 0.2s;" onfocus="this.style.borderColor='#f26522'" onblur="this.style.borderColor='#ddd'"></textarea>
                        </div>
                        <button type="button" id="commentSubmitBtn" onclick="submitComment()" style="background:#f26522;color:#fff;border:none;padding:12px 30px;border-radius:8px;font-size:0.9rem;font-weight:600;cursor:pointer;font-family:inherit;transition:background 0.2s;min-width:150px;" onmouseover="this.style.background='#d9551a'" onmouseout="this.style.background='#f26522'">
                            Post Comment
                        </button>
                    </form>
                    <script>
                    function submitComment() {
                        var form = document.getElementById('commentForm');
                        var btn = document.getElementById('commentSubmitBtn');
                        var name = form.querySelector('[name="name"]').value.trim();
                        var email = form.querySelector('[name="email"]').value.trim();
                        var comment = form.querySelector('[name="comment"]').value.trim();

                        if (!name || !email || !comment) {
                            showToast('Please fill in all required fields.', 'error');
                            return;
                        }

                        var originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:cmtSpin 0.6s linear infinite;vertical-align:middle;"></span>';

                        var formData = new FormData(form);
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?= url("api/comment.php") ?>');
                        xhr.onload = function() {
                            btn.disabled = false;
                            btn.innerHTML = originalText;
                            try {
                                var res = JSON.parse(xhr.responseText);
                                if (res.success) {
                                    showToast(res.message, 'success');
                                    form.reset();
                                    form.querySelector('[name="blog_id"]').value = '<?= $blog['id'] ?>';
                                } else {
                                    showToast(res.message, 'error');
                                }
                            } catch(e) {
                                showToast('Something went wrong. Please try again.', 'error');
                            }
                        };
                        xhr.onerror = function() {
                            btn.disabled = false;
                            btn.innerHTML = originalText;
                            showToast('Network error. Please check your connection.', 'error');
                        };
                        xhr.send(formData);
                    }
                    </script>
                    <style>@keyframes cmtSpin { to { transform: rotate(360deg); } }</style>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- About Widget -->
                <div
                    style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:25px;">
                    <h5
                        style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">
                        About Us</h5>
                    <p style="color:#666;font-size:0.88rem;line-height:1.7;">Durga Saptashati Foundation is a trusted
                        charity organisation in Delhi working for the empowerment of women, deprived children, senior
                        citizens, and people with disabilities.</p>
                    <a href="<?= url('about.php') ?>" style="color:#f26522;font-weight:600;font-size:0.85rem;">Learn
                        More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>

                <!-- Recent Posts -->
                <?php
                $recentStmt = $pdo->prepare("SELECT title, slug, image, created_at FROM blogs WHERE status = 'published' AND id != ? ORDER BY created_at DESC LIMIT 5");
                $recentStmt->execute([$blog['id']]);
                $recentPosts = $recentStmt->fetchAll();
                ?>
                <?php if (!empty($recentPosts)): ?>
                <div
                    style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 5px 25px rgba(0,0,0,0.06);margin-bottom:25px;">
                    <h5
                        style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">
                        Recent Posts</h5>
                    <?php foreach ($recentPosts as $rp): ?>
                    <a href="<?= url('blog/' . $rp['slug']) ?>"
                        style="display:flex;gap:12px;align-items:center;padding:10px 0;border-bottom:1px solid #f3f4f6;text-decoration:none;transition:all 0.2s;"
                        onmouseover="this.querySelector('h6').style.color='#f26522'"
                        onmouseout="this.querySelector('h6').style.color='#1a1b2e'">
                        <?php $rpImg = $rp['image'] ? asset('uploads/blogs/' . $rp['image']) : asset('img/blog-1.jpg'); ?>
                        <img src="<?= $rpImg ?>" alt=""
                            style="width:65px;height:50px;object-fit:cover;border-radius:8px;flex-shrink:0;">
                        <div>
                            <h6
                                style="margin:0;font-size:0.82rem;font-weight:600;color:#1a1b2e;line-height:1.4;transition:color 0.2s;">
                                <?= htmlspecialchars(mb_strimwidth($rp['title'], 0, 50, '...')) ?>
                            </h6>
                            <small style="color:#999;font-size:0.72rem;"><i class="far fa-calendar-alt"
                                    style="margin-right:3px;"></i><?= date('M d, Y', strtotime($rp['created_at'])) ?></small>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Categories -->
                <div style="background:#fff;border-radius:14px;padding:25px;box-shadow:0 5px 25px rgba(0,0,0,0.06);">
                    <h5
                        style="color:#1a1b2e;font-weight:700;margin-bottom:15px;padding-bottom:12px;border-bottom:2px solid #f26522;display:inline-block;">
                        Categories</h5>
                    <?php
                    $catStmt = $pdo->query("SELECT category, COUNT(*) as cnt FROM blogs WHERE status='published' AND category IS NOT NULL AND category != '' GROUP BY category ORDER BY cnt DESC");
                    $categories = $catStmt->fetchAll();
                    ?>
                    <?php foreach ($categories as $cat): ?>
                    <div
                        style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid #f3f4f6;">
                        <span style="color:#555;font-size:0.88rem;"><?= htmlspecialchars($cat['category']) ?></span>
                        <span
                            style="background:rgba(242,101,34,0.1);color:#f26522;padding:2px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><?= $cat['cnt'] ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Related Posts -->
        <?php if (!empty($relatedBlogs)): ?>
        <div style="margin-top:50px;">
            <h4 style="color:#1a1b2e;font-weight:700;margin-bottom:25px;">Related Posts</h4>
            <div class="row">
                <?php foreach ($relatedBlogs as $idx => $rb): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div style="border-radius:12px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);background:#fff;height:100%;transition:all 0.4s;"
                        onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 5px 25px rgba(0,0,0,0.08)'">
                        <div style="position:relative;overflow:hidden;">
                            <?php $rbImg = $rb['image'] ? asset('uploads/blogs/' . $rb['image']) : asset('img/blog-' . (($idx % 3) + 1) . '.jpg'); ?>
                            <img src="<?= $rbImg ?>" alt="<?= htmlspecialchars($rb['title']) ?>"
                                style="width:100%;height:220px;object-fit:cover;">
                            <?php if ($rb['category']): ?>
                            <div
                                style="position:absolute;top:15px;left:15px;background:#f26522;color:#fff;padding:5px 14px;border-radius:20px;font-size:0.75rem;font-weight:600;">
                                <?= htmlspecialchars($rb['category']) ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div style="padding:20px;">
                            <small style="color:#999;"><i class="far fa-calendar-alt mr-1" style="color:#f26522;"></i>
                                <?= date('M d, Y', strtotime($rb['created_at'])) ?></small>
                            <h5 style="color:#1a1b2e;font-weight:700;font-size:1.05rem;margin:10px 0;line-height:1.4;">
                                <?= htmlspecialchars($rb['title']) ?>
                            </h5>
                            <a href="<?= url('blog/' . $rb['slug']) ?>"
                                style="color:#f26522;font-weight:600;font-size:0.88rem;">Read More <i
                                    class="fa fa-long-arrow-alt-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Blog Detail End -->

<style>
.blog-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 15px 0;
}

.blog-content h1,
.blog-content h2,
.blog-content h3 {
    color: #1a1b2e;
    margin: 20px 0 10px;
}

.blog-content p {
    margin-bottom: 15px;
}

.blog-content ul,
.blog-content ol {
    margin-bottom: 15px;
    padding-left: 25px;
}

.blog-content blockquote {
    border-left: 4px solid #f26522;
    padding: 15px 20px;
    margin: 20px 0;
    background: #f8f9fa;
    border-radius: 0 8px 8px 0;
    font-style: italic;
    color: #555;
}

.blog-content a {
    color: #f26522;
}
</style>

<?php include '../app/views/layout/footer.php'; ?>