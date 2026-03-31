<?php
try {
    $allNews = $pdo->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $allNews = [];
}
$totalNews = count($allNews);
$publishedCount = count(array_filter($allNews, fn($n) => $n['status'] === 'published'));
?>

<!-- Stats -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-newspaper"></i></div>
        <div class="stat-info"><h3><?= $totalNews ?></h3><p>Total Articles</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info"><h3><?= $publishedCount ?></h3><p>Published</p></div>
    </div>
</div>

<!-- Add News Form -->
<div class="data-panel" style="margin-bottom:25px;">
    <div class="data-panel-header">
        <h4><i class="fas fa-plus-circle" style="color:var(--accent);margin-right:8px;"></i> Add News Article</h4>
    </div>
    <div style="padding:20px;">
        <form method="POST" action="admin.php?page=news" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create_news">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Title *</label>
                    <input type="text" name="title" required placeholder="News headline" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Category</label>
                    <input type="text" name="category" value="General" placeholder="e.g. Education, Events, Community" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Content *</label>
                <textarea name="content" rows="4" required placeholder="Write the news article content..." style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Image</label>
                    <input type="file" name="news_image" accept="image/*" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.85rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Source</label>
                    <input type="text" name="source" placeholder="e.g. Times of India" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Source URL</label>
                    <input type="url" name="source_url" placeholder="https://..." style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Status</label>
                    <select name="status" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-admin btn-primary"><i class="fas fa-paper-plane"></i> Publish Article</button>
        </form>
    </div>
</div>

<!-- News Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-newspaper" style="color:var(--accent);margin-right:8px;"></i> All News (<?= $totalNews ?>)</h4>
    </div>
    <div style="padding:0;">
        <?php if (empty($allNews)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-newspaper" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No news articles yet. Add your first article above.
        </div>
        <?php else: ?>
        <table class="data-table paginated-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allNews as $i => $news): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($news['title']) ?></strong></td>
                    <td><span style="background:rgba(242,101,34,0.08);color:#f26522;padding:3px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><?= htmlspecialchars($news['category']) ?></span></td>
                    <td><?= htmlspecialchars($news['source'] ?: '-') ?></td>
                    <td>
                        <?php if ($news['status'] === 'published'): ?>
                        <span style="background:var(--success-light);color:#059669;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;">Published</span>
                        <?php else: ?>
                        <span style="background:#fef3c7;color:#d97706;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td style="font-size:0.82rem;color:var(--text-muted);"><?= date('M d, Y', strtotime($news['created_at'])) ?></td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="<?= url('news/' . $news['slug']) ?>" target="_blank"><i class="fas fa-eye"></i> View</a>
                                <a href="javascript:void(0)" onclick="editNews(<?= htmlspecialchars(json_encode($news)) ?>)"><i class="fas fa-edit"></i> Edit</a>
                                <form method="POST" action="admin.php?page=news" style="display:contents;">
                                    <input type="hidden" name="action" value="toggle_news">
                                    <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
                                    <button type="submit"><i class="fas fa-<?= $news['status'] === 'published' ? 'eye-slash' : 'check' ?>"></i> <?= $news['status'] === 'published' ? 'Unpublish' : 'Publish' ?></button>
                                </form>
                                <form method="POST" action="admin.php?page=news" style="display:contents;" onsubmit="return confirm('Delete this article?')">
                                    <input type="hidden" name="action" value="delete_news">
                                    <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
                                    <button type="submit" style="color:#dc2626;"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- Edit News Modal -->
<div id="editNewsModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:650px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('editNewsModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-edit" style="color:var(--accent);"></i> Edit News Article</h4>
        <form method="POST" action="admin.php?page=news" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update_news">
            <input type="hidden" name="news_id" id="editNewsId">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Title</label>
                <input type="text" name="title" id="editNewsTitle" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Category</label>
                    <input type="text" name="category" id="editNewsCategory" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                    <select name="status" id="editNewsStatus" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Content</label>
                <textarea name="content" id="editNewsContent" rows="5" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Source</label>
                    <input type="text" name="source" id="editNewsSource" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Source URL</label>
                    <input type="url" name="source_url" id="editNewsUrl" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Replace Image</label>
                    <input type="file" name="news_image" accept="image/*" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update Article</button>
        </form>
    </div>
</div>

<script>
function editNews(news) {
    document.getElementById('editNewsId').value = news.id;
    document.getElementById('editNewsTitle').value = news.title;
    document.getElementById('editNewsCategory').value = news.category;
    document.getElementById('editNewsContent').value = news.content || '';
    document.getElementById('editNewsSource').value = news.source || '';
    document.getElementById('editNewsUrl').value = news.source_url || '';
    document.getElementById('editNewsStatus').value = news.status;
    document.getElementById('editNewsModal').style.display = 'flex';
}
document.getElementById('editNewsModal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
});
</script>
