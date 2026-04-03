<!-- Quill Rich Text Editor -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="../admin/assets/css/blogs.css">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<?php
// Fetch all blogs
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
$blogs = $stmt->fetchAll();
?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-blog blog-header-icon"></i> Blog Posts</h4>
        <button class="btn-admin btn-primary" onclick="openBlogModal()"><i class="fas fa-plus"></i> New Post</button>
    </div>
    <div class="blog-filter-bar">
        <div class="blog-filter-search">
            <i class="fas fa-search blog-filter-search-icon"></i>
            <input type="text" id="blogSearch" placeholder="Search by title, author..." oninput="filterBlogs()">
        </div>

        <input type="hidden" id="filterBlogCategory" value="">
        <div class="custom-select-wrap blog-filter-dropdown blog-filter-cat" id="filterCatWrap">
            <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                <span id="filterCatText" class="cs-placeholder">All Categories</span>
                <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option selected" data-value="" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-layer-group"></i></span>
                    <span class="cs-opt-text">All Categories</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Empowerment" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-empowerment"><i class="fas fa-female"></i></span>
                    <span class="cs-opt-text">Empowerment</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Food Drive" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-food"><i class="fas fa-utensils"></i></span>
                    <span class="cs-opt-text">Food Drive</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Education" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-education"><i class="fas fa-graduation-cap"></i></span>
                    <span class="cs-opt-text">Education</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Health" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-health"><i class="fas fa-heartbeat"></i></span>
                    <span class="cs-opt-text">Health</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Community" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-community"><i class="fas fa-users"></i></span>
                    <span class="cs-opt-text">Community</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="Events" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-events"><i class="fas fa-calendar-alt"></i></span>
                    <span class="cs-opt-text">Events</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="General" onclick="selectFilterCat(this)">
                    <span class="cs-opt-icon cs-opt-icon-general"><i class="fas fa-tag"></i></span>
                    <span class="cs-opt-text">General</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
            </div>
        </div>

        <input type="hidden" id="filterBlogStatus" value="">
        <div class="custom-select-wrap blog-filter-dropdown blog-filter-status" id="filterStatusWrap">
            <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                <span id="filterStatusText" class="cs-placeholder">All Status</span>
                <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option selected" data-value="" onclick="selectFilterStatus(this)">
                    <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-list"></i></span>
                    <span class="cs-opt-text">All Status</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="published" onclick="selectFilterStatus(this)">
                    <span class="cs-opt-icon cs-opt-icon-published"><i class="fas fa-check-circle"></i></span>
                    <span class="cs-opt-text">Published</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <div class="custom-select-option" data-value="draft" onclick="selectFilterStatus(this)">
                    <span class="cs-opt-icon cs-opt-icon-draft"><i class="fas fa-pencil-alt"></i></span>
                    <span class="cs-opt-text">Draft</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
            </div>
        </div>

        <span id="blogFilterCount" class="blog-filter-count"></span>
    </div>

    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Status</th>
                <th class="blog-actions-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($blogs)): ?>
            <tr>
                <td colspan="6" class="blog-empty-row">No blog posts yet. Click "New Post" to create one.</td>
            </tr>
            <?php else: ?>
            <?php foreach ($blogs as $i => $blog): ?>
            <tr id="blog-row-<?= $blog['id'] ?>" data-id="<?= $blog['id'] ?>"
                data-title="<?= htmlspecialchars($blog['title'], ENT_QUOTES) ?>"
                data-slug="<?= htmlspecialchars($blog['slug'], ENT_QUOTES) ?>"
                data-category="<?= htmlspecialchars($blog['category'] ?? '', ENT_QUOTES) ?>"
                data-content="<?= htmlspecialchars($blog['content'] ?? '', ENT_QUOTES) ?>"
                data-meta_description="<?= htmlspecialchars($blog['meta_description'] ?? '', ENT_QUOTES) ?>"
                data-meta_keywords="<?= htmlspecialchars($blog['meta_keywords'] ?? '', ENT_QUOTES) ?>"
                data-author="<?= htmlspecialchars($blog['author'] ?? 'Admin', ENT_QUOTES) ?>"
                data-image="<?= htmlspecialchars($blog['image'] ?? '', ENT_QUOTES) ?>"
                data-status="<?= htmlspecialchars($blog['status'], ENT_QUOTES) ?>"
                data-created_at="<?= date('Y-m-d\TH:i', strtotime($blog['created_at'])) ?>">
                <td><?= $i + 1 ?></td>
                <td><strong><?= htmlspecialchars($blog['title']) ?></strong></td>
                <td><?= htmlspecialchars($blog['category'] ?? '-') ?></td>
                <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
                <td>
                    <span
                        class="status-badge <?= $blog['status'] === 'published' ? 'status-active' : 'status-inactive' ?>">
                        <?= ucfirst($blog['status']) ?>
                    </span>
                </td>
                <td class="blog-actions-td">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="javascript:void(0)" onclick="viewBlog(<?= $blog['id'] ?>)"><i
                                    class="fas fa-eye"></i> View</a>
                            <a href="javascript:void(0)" onclick="openBlogModal(<?= $blog['id'] ?>)"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <button class="action-delete" onclick="confirmDeleteBlog(<?= $blog['id'] ?>)"><i
                                    class="fas fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Blog Modal -->
<div id="blogModal" class="blog-modal-overlay">
    <div class="blog-modal-box blog-modal-form" id="blogModalInner">
        <button onclick="closeBlogModal()" id="modalCloseBtn" class="blog-modal-close">&times;</button>
        <h3 id="blogModalTitle" class="blog-modal-title"><i class="fas fa-blog"></i> New Blog Post</h3>

        <form id="blogForm" method="POST" action="admin/blogs" enctype="multipart/form-data">
            <input type="hidden" name="action" id="blogAction" value="create_blog">
            <input type="hidden" name="blog_id" id="blogId" value="">

            <div class="blog-form-grid">
                <div>
                    <label class="blog-form-label">Title *</label>
                    <input type="text" name="title" id="blogTitleInput" required class="blog-form-input"
                        placeholder="Blog post title">
                </div>
                <div>
                    <label class="blog-form-label">Category</label>
                    <input type="hidden" name="category" id="blogCategory" value="">
                    <div class="custom-select-wrap" id="categorySel">
                        <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                            <span id="categorySelText" class="cs-placeholder">Select Category</span>
                            <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="custom-select-options">
                            <div class="custom-select-option" data-value="" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-none"><i class="fas fa-times"></i></span>
                                <span class="cs-opt-text">None</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Empowerment" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-empowerment"><i class="fas fa-female"></i></span>
                                <span class="cs-opt-text">Empowerment</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Food Drive" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-food"><i class="fas fa-utensils"></i></span>
                                <span class="cs-opt-text">Food Drive</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Education" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-education"><i
                                        class="fas fa-graduation-cap"></i></span>
                                <span class="cs-opt-text">Education</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Health" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-health"><i class="fas fa-heartbeat"></i></span>
                                <span class="cs-opt-text">Health</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Community" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-community"><i class="fas fa-users"></i></span>
                                <span class="cs-opt-text">Community</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="General" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-general"><i class="fas fa-tag"></i></span>
                                <span class="cs-opt-text">General</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Events" onclick="selectCategory(this)">
                                <span class="cs-opt-icon cs-opt-icon-events"><i class="fas fa-calendar-alt"></i></span>
                                <span class="cs-opt-text">Events</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog-editor-wrap" id="editorWrap">
                <label class="blog-form-label">Content</label>
                <div id="quillEditor" class="blog-quill-editor"></div>
                <textarea name="content" id="blogContent" hidden></textarea>
                <button type="button" onclick="toggleFullscreen()" id="fullscreenBtn" title="Fullscreen"
                    class="blog-fullscreen-btn">
                    <i class="fas fa-expand" id="fullscreenIcon"></i>
                </button>
            </div>

            <div class="blog-form-grid">
                <div>
                    <label class="blog-form-label">Meta Description</label>
                    <input type="text" name="meta_description" id="blogMetaDesc" maxlength="255" class="blog-form-input"
                        placeholder="SEO description">
                </div>
                <div>
                    <label class="blog-form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="blogMetaKeys" maxlength="255" class="blog-form-input"
                        placeholder="keyword1, keyword2">
                </div>
            </div>

            <div class="blog-form-grid">
                <div>
                    <label class="blog-form-label">Author</label>
                    <input type="text" name="author" id="blogAuthor" value="Admin" class="blog-form-input"
                        placeholder="Author name">
                </div>
                <div>
                    <label class="blog-form-label">Image</label>
                    <input type="file" name="image" id="blogImage" accept=".jpg,.jpeg,.png,.gif,.webp"
                        class="blog-form-file" onchange="previewBlogImage(this)">
                </div>
            </div>

            <div class="blog-image-preview" id="imagePreviewWrap">
                <img id="imagePreview" src="">
            </div>

            <div class="blog-publish-wrap">
                <label class="blog-publish-label">
                    <input type="checkbox" name="publish" id="blogPublish" value="1" checked>
                    <span>Publish immediately</span>
                </label>
            </div>

            <div class="blog-form-actions">
                <button type="button" onclick="closeBlogModal()" class="blog-btn-cancel">Cancel</button>
                <button type="submit" id="blogSubmitBtn" class="blog-btn-submit">Save Post</button>
            </div>
        </form>
    </div>
</div>

<!-- View Blog Modal -->
<div id="viewBlogModal" class="blog-modal-overlay">
    <div class="blog-modal-box blog-modal-view">
        <button onclick="closeViewModal()" class="blog-modal-close">&times;</button>
        <h3 class="blog-modal-title"><i class="fas fa-eye"></i> View Blog Post</h3>
        <div id="viewBlogContent"></div>
    </div>
</div>

<!-- Delete Confirm Modal -->
<div id="deleteModal" class="blog-modal-overlay blog-modal-overlay-delete">
    <div class="blog-modal-box blog-modal-delete">
        <i class="fas fa-exclamation-triangle blog-delete-icon"></i>
        <h4 class="blog-delete-title">Delete Blog Post?</h4>
        <p class="blog-delete-text">This action cannot be undone.</p>
        <form id="deleteForm" method="POST" action="admin/blogs">
            <input type="hidden" name="action" value="delete_blog">
            <input type="hidden" name="blog_id" id="deleteBlogId" value="">
            <button type="button" onclick="closeDeleteModal()" class="blog-btn-delete-cancel">Cancel</button>
            <button type="submit" class="blog-btn-delete-confirm">Delete</button>
        </form>
    </div>
</div>

<!-- Fullscreen Editor Overlay -->
<div id="editorFullscreen">
    <div class="fs-header">
        <h4><i class="fas fa-edit blog-header-icon"></i> Content Editor</h4>
    </div>
    <div class="fs-toolbar" id="fsToolbar"></div>
    <div class="fs-editor" id="fsEditorContainer"></div>
</div>
<button id="exitFsBtn" class="blog-exit-fs-btn"><i class="fas fa-compress"></i> Exit Fullscreen</button>

<!-- Hidden toggle form -->
<form id="toggleForm" method="POST" action="admin/blogs" hidden>
    <input type="hidden" name="action" value="toggle_blog_status">
    <input type="hidden" name="blog_id" id="toggleBlogId" value="">
</form>

<script src="../admin/assets/js/blogs.js" data-uploads-url="<?= url('assets/uploads/blogs/') ?>"></script>