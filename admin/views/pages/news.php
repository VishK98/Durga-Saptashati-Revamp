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

<link rel="stylesheet" href="../admin/assets/css/news.css">

<!-- Stats -->
<div class="nw-stats-grid">
    <div class="stat-card">
        <div class="stat-icon nw-stat-icon-articles"><i class="fas fa-newspaper"></i></div>
        <div class="stat-info"><h3><?= $totalNews ?></h3><p>Total Articles</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon nw-stat-icon-published"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info"><h3><?= $publishedCount ?></h3><p>Published</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon nw-stat-icon-drafts"><i class="fas fa-file-alt"></i></div>
        <div class="stat-info"><h3><?= $draftCount ?></h3><p>Drafts</p></div>
    </div>
</div>

<!-- News Table -->
<div class="data-panel">
    <div class="data-panel-header nw-panel-header">
        <h4><i class="fas fa-newspaper nw-header-icon"></i> All News (<?= $totalNews ?>)</h4>
        <button onclick="openAddNews()" class="nw-add-btn">
            <i class="fas fa-plus"></i> Add News
        </button>
    </div>
    <!-- Filter Section -->
    <div class="nw-filter-bar">
        <div class="nw-search-wrap">
            <i class="fas fa-search nw-search-icon"></i>
            <input type="text" id="newsSearch" placeholder="Search by title, category, source..." oninput="filterNews()" class="nw-search-input">
        </div>
        <input type="hidden" id="filterNewsStatus" value="">
        <div class="custom-select-wrap nw-filter-dropdown" id="filterNewsStatusWrap">
            <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                <span id="filterNewsStatusText" class="cs-placeholder">All Status</span>
                <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option selected" data-value="" onclick="selectNewsFilter(this)">
                    <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-list"></i></span>
                    <span class="cs-opt-text">All Status</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="published" onclick="selectNewsFilter(this)">
                    <span class="cs-opt-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></span>
                    <span class="cs-opt-text">Published</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="draft" onclick="selectNewsFilter(this)">
                    <span class="cs-opt-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-pencil-alt"></i></span>
                    <span class="cs-opt-text">Draft</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
            </div>
        </div>
        <button onclick="clearNewsFilters()" class="nw-clear-btn" id="newsClearBtn" title="Clear filters">
            <i class="fas fa-times"></i> Clear
        </button>
    </div>
    <div class="nw-no-padding">
        <?php if (empty($allNews)): ?>
        <div class="nw-empty-state">
            <i class="fas fa-newspaper nw-empty-icon"></i>
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
                    <th class="nw-th-actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allNews as $i => $news): ?>
                <tr data-status="<?= $news['status'] ?>">
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($news['title']) ?></strong></td>
                    <td><span class="nw-category-badge"><?= htmlspecialchars($news['category']) ?></span></td>
                    <td><?= htmlspecialchars($news['source'] ?: '-') ?></td>
                    <td>
                        <?php if ($news['status'] === 'published'): ?>
                        <span class="nw-status-published">Published</span>
                        <?php else: ?>
                        <span class="nw-status-draft">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td class="nw-date-cell"><?= date('M d, Y', strtotime($news['created_at'])) ?></td>
                    <td class="nw-td-actions">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="<?= url('news/' . $news['slug']) ?>" target="_blank"><i class="fas fa-eye"></i> View</a>
                                <a href="javascript:void(0)" onclick="editNews(<?= htmlspecialchars(json_encode($news)) ?>)"><i class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" onclick="ajaxNewsAction('toggle_news', <?= $news['id'] ?>)"><i class="fas fa-<?= $news['status'] === 'published' ? 'eye-slash' : 'check' ?>"></i> <?= $news['status'] === 'published' ? 'Unpublish' : 'Publish' ?></a>
                                <a href="javascript:void(0)" onclick="showNewsConfirm('Delete this article?', function(){ ajaxNewsAction('delete_news', <?= $news['id'] ?>) })" class="nw-delete-link"><i class="fas fa-trash"></i> Delete</a>
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
<div id="addNewsModal" class="nw-modal-overlay">
    <div class="nw-modal-box">
        <button onclick="document.getElementById('addNewsModal').style.display='none'" class="nw-modal-close">&times;</button>
        <h4 class="nw-modal-title"><i class="fas fa-plus-circle nw-modal-title-icon"></i> Add News Article</h4>
        <form id="addNewsForm" method="POST" action="admin?page=news" enctype="multipart/form-data">
            <input type="hidden" name="action" value="create_news">
            <div class="nw-form-grid-2">
                <div>
                    <label class="nw-label">Title <span class="nw-required">*</span></label>
                    <input type="text" name="title" required placeholder="News headline" class="nw-input">
                </div>
                <div>
                    <label class="nw-label">Category</label>
                    <input type="hidden" name="category" id="addNewsCategoryVal" value="General">
                    <div class="custom-select-wrap nw-form-dropdown" id="addNewsCategoryWrap">
                        <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                            <span id="addNewsCategoryText">General</span>
                            <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="custom-select-options">
                            <div class="custom-select-option selected" data-value="General" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">General</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Events" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">Events</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Education" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">Education</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Community" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">Community</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Announcements" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">Announcements</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Achievements" onclick="selectFormDropdown('addNewsCategory', this)">
                                <span class="cs-opt-text">Achievements</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nw-form-group">
                <label class="nw-label">Content <span class="nw-required">*</span></label>
                <textarea name="content" rows="5" required placeholder="Write the news article content..." class="nw-textarea"></textarea>
            </div>
            <div class="nw-form-group">
                <label class="nw-label">Image</label>
                <input type="file" name="news_image" accept="image/*" class="nw-file-input">
            </div>
            <div class="nw-form-grid-2">
                <div>
                    <label class="nw-label">Source</label>
                    <input type="text" name="source" placeholder="e.g. Times of India" class="nw-input">
                </div>
                <div>
                    <label class="nw-label">Source URL</label>
                    <input type="url" name="source_url" placeholder="https://..." class="nw-input">
                </div>
            </div>
            <div class="nw-form-group-last">
                <label class="nw-label">Status</label>
                <input type="hidden" name="status" id="addNewsStatusVal" value="published">
                <div class="custom-select-wrap nw-form-dropdown" id="addNewsStatusWrap">
                    <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                        <span id="addNewsStatusText">Published</span>
                        <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="custom-select-options">
                        <div class="custom-select-option selected" data-value="published" onclick="selectFormDropdown('addNewsStatus', this)">
                            <span class="cs-opt-text">Published</span><i class="fas fa-check cs-opt-check"></i>
                        </div>
                        <div class="custom-select-option" data-value="draft" onclick="selectFormDropdown('addNewsStatus', this)">
                            <span class="cs-opt-text">Draft</span><i class="fas fa-check cs-opt-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="nw-submit-btn"><i class="fas fa-paper-plane"></i> Publish Article</button>
        </form>
    </div>
</div>

<!-- Edit News Modal -->
<div id="editNewsModal" class="nw-modal-overlay">
    <div class="nw-modal-box">
        <button onclick="document.getElementById('editNewsModal').style.display='none'" class="nw-modal-close">&times;</button>
        <h4 class="nw-modal-title"><i class="fas fa-edit nw-modal-title-icon"></i> Edit News Article</h4>
        <form method="POST" action="admin?page=news" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update_news">
            <input type="hidden" name="news_id" id="editNewsId">
            <div class="nw-form-grid-2">
                <div>
                    <label class="nw-label">Title</label>
                    <input type="text" name="title" id="editNewsTitle" required class="nw-input">
                </div>
                <div>
                    <label class="nw-label">Category</label>
                    <input type="hidden" name="category" id="editNewsCategoryVal" value="General">
                    <div class="custom-select-wrap nw-form-dropdown" id="editNewsCategoryWrap">
                        <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                            <span id="editNewsCategoryText">General</span>
                            <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="custom-select-options">
                            <div class="custom-select-option selected" data-value="General" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">General</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Events" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">Events</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Education" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">Education</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Community" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">Community</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Announcements" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">Announcements</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Achievements" onclick="selectFormDropdown('editNewsCategory', this)">
                                <span class="cs-opt-text">Achievements</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nw-form-group">
                <label class="nw-label">Content</label>
                <textarea name="content" id="editNewsContent" rows="5" class="nw-textarea"></textarea>
            </div>
            <div class="nw-form-grid-3">
                <div>
                    <label class="nw-label">Source</label>
                    <input type="text" name="source" id="editNewsSource" class="nw-input">
                </div>
                <div>
                    <label class="nw-label">Source URL</label>
                    <input type="url" name="source_url" id="editNewsUrl" class="nw-input">
                </div>
                <div>
                    <label class="nw-label">Replace Image</label>
                    <input type="file" name="news_image" accept="image/*" class="nw-file-input">
                </div>
            </div>
            <div class="nw-form-group-last">
                <label class="nw-label">Status</label>
                <input type="hidden" name="status" id="editNewsStatusVal" value="published">
                <div class="custom-select-wrap nw-form-dropdown" id="editNewsStatusWrap">
                    <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                        <span id="editNewsStatusText">Published</span>
                        <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="custom-select-options">
                        <div class="custom-select-option selected" data-value="published" onclick="selectFormDropdown('editNewsStatus', this)">
                            <span class="cs-opt-text">Published</span><i class="fas fa-check cs-opt-check"></i>
                        </div>
                        <div class="custom-select-option" data-value="draft" onclick="selectFormDropdown('editNewsStatus', this)">
                            <span class="cs-opt-text">Draft</span><i class="fas fa-check cs-opt-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="nw-submit-btn">Update Article</button>
        </form>
    </div>
</div>

<!-- Confirm Modal for News -->
<div id="newsConfirmModal" class="nw-modal-overlay nw-confirm-overlay">
    <div class="nw-confirm-box">
        <div class="nw-confirm-icon-wrap">
            <i class="fas fa-exclamation-triangle nw-confirm-icon"></i>
        </div>
        <h4 class="nw-confirm-title">Are you sure?</h4>
        <p id="newsConfirmMessage" class="nw-confirm-message">This action cannot be undone.</p>
        <div class="nw-confirm-actions">
            <button onclick="document.getElementById('newsConfirmModal').style.display='none'" class="nw-cancel-btn">Cancel</button>
            <button id="newsConfirmBtn" class="nw-confirm-delete-btn">Yes, Delete</button>
        </div>
    </div>
</div>

<script src="../admin/assets/js/news.js"></script>
