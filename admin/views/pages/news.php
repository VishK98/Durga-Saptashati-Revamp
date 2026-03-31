<?php
try {
    $allNews = $pdo->query("SELECT * FROM news ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $allNews = [];
}
$totalNews = count($allNews);
$publishedCount = count(array_filter($allNews, fn($n) => $n['status'] === 'published'));
$draftCount = $totalNews - $publishedCount;
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
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-file-alt"></i></div>
        <div class="stat-info"><h3><?= $draftCount ?></h3><p>Drafts</p></div>
    </div>
</div>

<!-- News Table -->
<div class="data-panel">
    <div class="data-panel-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <h4><i class="fas fa-newspaper" style="color:var(--accent);margin-right:8px;"></i> All News (<?= $totalNews ?>)</h4>
        <button onclick="openAddNews()" style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
            <i class="fas fa-plus"></i> Add News
        </button>
    </div>
    <!-- Filter Section -->
    <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;padding:15px 20px;background:#f8fafc;border-bottom:1px solid #e2e8f0;">
        <div style="position:relative;flex:1;min-width:200px;">
            <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;font-size:0.85rem;"></i>
            <input type="text" id="newsSearch" placeholder="Search by title, category, source..." oninput="filterNews()" style="width:100%;padding:9px 12px 9px 35px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;">
        </div>
        <select id="filterNewsStatus" onchange="filterNews()" style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:140px;">
            <option value="">All Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
        <button onclick="document.getElementById('newsSearch').value='';document.getElementById('filterNewsStatus').value='';filterNews();" style="background:none;border:1px solid #ddd;padding:9px 14px;border-radius:8px;cursor:pointer;font-size:0.85rem;color:#666;" title="Clear filters">
            <i class="fas fa-times"></i> Clear
        </button>
    </div>
    <div style="padding:0;">
        <?php if (empty($allNews)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-newspaper" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No news articles yet. Click "Add News" to get started.
        </div>
        <?php else: ?>
        <table class="data-table paginated-table" id="newsTable">
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
                <tr data-status="<?= $news['status'] ?>">
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
                                <a href="javascript:void(0)" onclick="ajaxNewsAction('toggle_news', <?= $news['id'] ?>)"><i class="fas fa-<?= $news['status'] === 'published' ? 'eye-slash' : 'check' ?>"></i> <?= $news['status'] === 'published' ? 'Unpublish' : 'Publish' ?></a>
                                <a href="javascript:void(0)" onclick="showNewsConfirm('Delete this article?', function(){ ajaxNewsAction('delete_news', <?= $news['id'] ?>) })" style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</a>
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

<!-- Add News Modal -->
<div id="addNewsModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:650px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('addNewsModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-plus-circle" style="color:var(--accent);"></i> Add News Article</h4>
        <form id="addNewsForm" method="POST" action="admin.php?page=news" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create_news">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Title <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="title" required placeholder="News headline" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Category</label>
                    <select name="category" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="General">General</option>
                        <option value="Events">Events</option>
                        <option value="Education">Education</option>
                        <option value="Community">Community</option>
                        <option value="Announcements">Announcements</option>
                        <option value="Achievements">Achievements</option>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Content <span style="color:#ef4444;">*</span></label>
                <textarea name="content" rows="5" required placeholder="Write the news article content..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Image</label>
                <input type="file" name="news_image" accept="image/*" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Source</label>
                    <input type="text" name="source" placeholder="e.g. Times of India" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Source URL</label>
                    <input type="url" name="source_url" placeholder="https://..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
            </div>
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                <select name="status" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;"><i class="fas fa-paper-plane"></i> Publish Article</button>
        </form>
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
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Title</label>
                    <input type="text" name="title" id="editNewsTitle" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Category</label>
                    <select name="category" id="editNewsCategory" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="General">General</option>
                        <option value="Events">Events</option>
                        <option value="Education">Education</option>
                        <option value="Community">Community</option>
                        <option value="Announcements">Announcements</option>
                        <option value="Achievements">Achievements</option>
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
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                <select name="status" id="editNewsStatus" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update Article</button>
        </form>
    </div>
</div>

<!-- Confirm Modal for News -->
<div id="newsConfirmModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:400px;width:90%;padding:30px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="width:56px;height:56px;border-radius:50%;background:#fef2f2;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
            <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.5rem;"></i>
        </div>
        <h4 style="margin-bottom:8px;color:#1a1b2e;font-size:1.1rem;">Are you sure?</h4>
        <p id="newsConfirmMessage" style="color:#666;font-size:0.92rem;margin-bottom:24px;">This action cannot be undone.</p>
        <div style="display:flex;gap:12px;justify-content:center;">
            <button onclick="document.getElementById('newsConfirmModal').style.display='none'" style="padding:10px 28px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;color:#666;">Cancel</button>
            <button id="newsConfirmBtn" style="padding:10px 28px;border:none;border-radius:8px;background:#ef4444;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
function openAddNews() {
    document.getElementById('addNewsForm').reset();
    document.getElementById('addNewsModal').style.display = 'flex';
}

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

// AJAX for news actions
function ajaxNewsAction(action, newsId) {
    var fd = new FormData();
    fd.append('action', action);
    fd.append('news_id', newsId);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin.php?page=news');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(function(){ location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch(e) { showToast('Server error.', 'error'); }
    };
    xhr.onerror = function() { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

// Custom confirm modal
var _newsConfirmCb = null;
function showNewsConfirm(message, onConfirm) {
    _newsConfirmCb = onConfirm;
    document.getElementById('newsConfirmMessage').textContent = message;
    document.getElementById('newsConfirmModal').style.display = 'flex';
}
document.getElementById('newsConfirmBtn').addEventListener('click', function() {
    document.getElementById('newsConfirmModal').style.display = 'none';
    if (_newsConfirmCb) _newsConfirmCb();
    _newsConfirmCb = null;
});

// Filter
function filterNews() {
    var search = document.getElementById('newsSearch').value.toLowerCase();
    var status = document.getElementById('filterNewsStatus').value;
    var table = document.getElementById('newsTable');
    if (!table) return;
    var rows = table.querySelector('tbody').querySelectorAll('tr');
    var count = 0;
    rows.forEach(function(row) {
        var cells = row.querySelectorAll('td');
        if (cells.length <= 1) return;
        var title = (cells[1] ? cells[1].textContent : '').toLowerCase();
        var category = (cells[2] ? cells[2].textContent : '').toLowerCase();
        var source = (cells[3] ? cells[3].textContent : '').toLowerCase();
        var rowStatus = row.getAttribute('data-status') || '';
        var matchSearch = !search || title.indexOf(search) > -1 || category.indexOf(search) > -1 || source.indexOf(search) > -1;
        var matchStatus = !status || rowStatus === status;
        if (matchSearch && matchStatus) {
            row.style.display = '';
            count++;
            cells[0].textContent = count;
        } else {
            row.style.display = 'none';
        }
    });
}

// Close modals on backdrop click
['addNewsModal','editNewsModal','newsConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
</script>
