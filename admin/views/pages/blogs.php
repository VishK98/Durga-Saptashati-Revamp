<!-- Quill Rich Text Editor -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<style>
.ql-toolbar.ql-snow { border-radius: 8px 8px 0 0; border-color: #ddd; background: #f8f9fb; }
.ql-container.ql-snow { border-radius: 0 0 8px 8px; border-color: #ddd; }
.ql-editor { min-height: 200px; font-family: 'Inter', system-ui, sans-serif; font-size: 0.95rem; line-height: 1.7; }
.ql-editor.ql-blank::before { font-style: italic; color: #bbb; }
@keyframes spin { to { transform: rotate(360deg); } }

/* Fullscreen editor overlay */
#editorFullscreen {
    display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    z-index: 100000; background: #fff; flex-direction: column;
}
#editorFullscreen.active { display: flex; }
#editorFullscreen .fs-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 12px 24px; border-bottom: 1px solid #e5e7eb; background: #f8f9fb; flex-shrink: 0;
}
#editorFullscreen .fs-header h4 { margin: 0; font-size: 1rem; color: #1a1b2e; font-weight: 700; }
#editorFullscreen .fs-header button {
    background: none; border: 1px solid #ddd; font-size: 14px; cursor: pointer; color: #666;
    padding: 8px 16px; border-radius: 8px; font-family: inherit; font-weight: 500;
    display: flex; align-items: center; gap: 6px; transition: all 0.2s;
}
#editorFullscreen .fs-header button:hover { background: #f26522; color: #fff; border-color: #f26522; }
#editorFullscreen .fs-toolbar { flex-shrink: 0; }
#editorFullscreen .fs-toolbar .ql-toolbar.ql-snow { border-radius: 0; border-left: none; border-right: none; border-top: none; }
#editorFullscreen .fs-editor { flex: 1; overflow-y: auto; }
#editorFullscreen .fs-editor .ql-container.ql-snow { border: none; height: 100%; }
#editorFullscreen .fs-editor .ql-editor { padding: 30px 60px; font-size: 1.05rem; min-height: 100%; }
@media (max-width: 768px) {
    #editorFullscreen .fs-editor .ql-editor { padding: 20px; }
}
</style>

<?php
// Fetch all blogs
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
$blogs = $stmt->fetchAll();
?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-blog" style="color:var(--accent);margin-right:8px;"></i> Blog Posts</h4>
        <button class="btn-admin btn-primary" onclick="openBlogModal()"><i class="fas fa-plus"></i> New Post</button>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Comments</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($blogs)): ?>
                <tr><td colspan="7" style="text-align:center;padding:40px;color:#999;">No blog posts yet. Click "New Post" to create one.</td></tr>
            <?php else: ?>
                <?php foreach ($blogs as $i => $blog): ?>
                    <tr id="blog-row-<?= $blog['id'] ?>"
                        data-id="<?= $blog['id'] ?>"
                        data-title="<?= htmlspecialchars($blog['title'], ENT_QUOTES) ?>"
                        data-slug="<?= htmlspecialchars($blog['slug'], ENT_QUOTES) ?>"
                        data-category="<?= htmlspecialchars($blog['category'] ?? '', ENT_QUOTES) ?>"
                        data-content="<?= htmlspecialchars($blog['content'] ?? '', ENT_QUOTES) ?>"
                        data-meta_description="<?= htmlspecialchars($blog['meta_description'] ?? '', ENT_QUOTES) ?>"
                        data-meta_keywords="<?= htmlspecialchars($blog['meta_keywords'] ?? '', ENT_QUOTES) ?>"
                        data-author="<?= htmlspecialchars($blog['author'] ?? 'Admin', ENT_QUOTES) ?>"
                        data-image="<?= htmlspecialchars($blog['image'] ?? '', ENT_QUOTES) ?>"
                        data-status="<?= htmlspecialchars($blog['status'], ENT_QUOTES) ?>"
                    >
                        <td><?= $i + 1 ?></td>
                        <td><strong><?= htmlspecialchars($blog['title']) ?></strong></td>
                        <td><?= htmlspecialchars($blog['category'] ?? '-') ?></td>
                        <td><?= date('M d, Y', strtotime($blog['created_at'])) ?></td>
                        <td>
                            <?php
                            $bcStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_comments WHERE blog_id = ?");
                            $bcStmt->execute([$blog['id']]);
                            $bcTotal = $bcStmt->fetchColumn();
                            ?>
                            <span style="background:rgba(242,101,34,0.1);color:#f26522;padding:2px 10px;border-radius:12px;font-size:0.78rem;font-weight:600;"><?= $bcTotal ?></span>
                        </td>
                        <td>
                            <span class="status-badge <?= $blog['status'] === 'published' ? 'status-active' : 'status-inactive' ?>">
                                <?= ucfirst($blog['status']) ?>
                            </span>
                        </td>
                        <td style="text-align:right;">
                            <div class="action-wrap">
                                <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="action-menu">
                                    <a href="javascript:void(0)" onclick="viewBlog(<?= $blog['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                                    <a href="javascript:void(0)" onclick="openBlogModal(<?= $blog['id'] ?>)"><i class="fas fa-edit"></i> Edit</a>
                                    <button class="action-delete" onclick="confirmDeleteBlog(<?= $blog['id'] ?>)"><i class="fas fa-trash"></i> Delete</button>
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
<div id="blogModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div class="modal-inner" id="blogModalInner" style="background:#fff;border-radius:12px;width:95%;max-width:1100px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="closeBlogModal()" id="modalCloseBtn" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 id="blogModalTitle" style="margin:0 0 25px;color:#1a1b2e;font-size:1.3rem;"><i class="fas fa-blog" style="color:var(--accent);margin-right:8px;"></i> New Blog Post</h3>

        <form id="blogForm" method="POST" action="admin.php?page=blogs" enctype="multipart/form-data">
            <input type="hidden" name="action" id="blogAction" value="create_blog">
            <input type="hidden" name="blog_id" id="blogId" value="">

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Title *</label>
                    <input type="text" name="title" id="blogTitleInput" required style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="Blog post title">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Category</label>
                    <input type="hidden" name="category" id="blogCategory" value="">
                    <div class="custom-select-wrap" id="categorySel">
                        <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                            <span id="categorySelText" class="cs-placeholder">Select Category</span>
                            <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="custom-select-options">
                            <div class="custom-select-option" data-value="" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:#f3f4f6;color:#999;"><i class="fas fa-times"></i></span>
                                <span class="cs-opt-text">None</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Empowerment" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:rgba(242,101,34,0.1);color:#f26522;"><i class="fas fa-female"></i></span>
                                <span class="cs-opt-text">Empowerment</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Food Drive" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:rgba(245,158,11,0.1);color:#d97706;"><i class="fas fa-utensils"></i></span>
                                <span class="cs-opt-text">Food Drive</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Education" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:rgba(59,130,246,0.1);color:#2563eb;"><i class="fas fa-graduation-cap"></i></span>
                                <span class="cs-opt-text">Education</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Health" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:rgba(16,185,129,0.1);color:#059669;"><i class="fas fa-heartbeat"></i></span>
                                <span class="cs-opt-text">Health</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Community" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:rgba(139,92,246,0.1);color:#7c3aed;"><i class="fas fa-users"></i></span>
                                <span class="cs-opt-text">Community</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="General" onclick="selectCategory(this)">
                                <span class="cs-opt-icon" style="background:#f3f4f6;color:#6b7280;"><i class="fas fa-tag"></i></span>
                                <span class="cs-opt-text">General</span>
                                <i class="fas fa-check cs-opt-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-bottom:15px;position:relative;" id="editorWrap">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Content</label>
                <div id="quillEditor" style="height:250px;background:#fff;border-radius:0 0 8px 8px;font-size:0.95rem;"></div>
                <textarea name="content" id="blogContent" style="display:none;"></textarea>
                <button type="button" onclick="toggleFullscreen()" id="fullscreenBtn" title="Fullscreen" style="position:absolute;bottom:12px;right:12px;background:rgba(0,0,0,0.06);border:1px solid #ddd;border-radius:6px;width:32px;height:32px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#666;font-size:14px;z-index:5;transition:all 0.2s;" onmouseover="this.style.background='#f26522';this.style.color='#fff';this.style.borderColor='#f26522'" onmouseout="this.style.background='rgba(0,0,0,0.06)';this.style.color='#666';this.style.borderColor='#ddd'">
                    <i class="fas fa-expand" id="fullscreenIcon"></i>
                </button>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Meta Description</label>
                    <input type="text" name="meta_description" id="blogMetaDesc" maxlength="255" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="SEO description">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="blogMetaKeys" maxlength="255" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="keyword1, keyword2">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Author</label>
                    <input type="text" name="author" id="blogAuthor" value="Admin" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="Author name">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Image</label>
                    <input type="file" name="image" id="blogImage" accept=".jpg,.jpeg,.png,.gif,.webp" style="width:100%;padding:8px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.85rem;font-family:inherit;" onchange="previewBlogImage(this)">
                </div>
            </div>

            <div id="imagePreviewWrap" style="display:none;margin-bottom:15px;">
                <img id="imagePreview" src="" style="max-width:200px;max-height:150px;border-radius:8px;border:1px solid #ddd;">
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:inline-flex;align-items:center;gap:8px;cursor:pointer;font-size:0.9rem;color:#333;">
                    <input type="checkbox" name="publish" id="blogPublish" value="1" style="width:16px;height:16px;">
                    <span>Publish immediately</span>
                </label>
            </div>

            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button type="button" onclick="closeBlogModal()" style="padding:10px 24px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-family:inherit;">Cancel</button>
                <button type="submit" id="blogSubmitBtn" style="padding:10px 24px;border:none;border-radius:8px;background:var(--accent, #f26522);color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;font-family:inherit;min-width:120px;">Save Post</button>
            </div>
        </form>
    </div>
</div>

<!-- View Blog Modal -->
<div id="viewBlogModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;width:95%;max-width:700px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="closeViewModal()" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 style="margin:0 0 20px;color:#1a1b2e;font-size:1.3rem;"><i class="fas fa-eye" style="color:var(--accent);margin-right:8px;"></i> View Blog Post</h3>
        <div id="viewBlogContent"></div>
    </div>
</div>

<!-- Delete Confirm Modal -->
<div id="deleteModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:10000;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;padding:30px;max-width:400px;width:90%;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <i class="fas fa-exclamation-triangle" style="font-size:48px;color:#e74c3c;margin-bottom:15px;"></i>
        <h4 style="margin:0 0 10px;color:#1a1b2e;">Delete Blog Post?</h4>
        <p style="color:#666;margin-bottom:20px;font-size:0.9rem;">This action cannot be undone.</p>
        <form id="deleteForm" method="POST" action="admin.php?page=blogs" style="display:inline;">
            <input type="hidden" name="action" value="delete_blog">
            <input type="hidden" name="blog_id" id="deleteBlogId" value="">
            <button type="button" onclick="closeDeleteModal()" style="padding:10px 24px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;margin-right:10px;">Cancel</button>
            <button type="submit" style="padding:10px 24px;border:none;border-radius:8px;background:#e74c3c;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Delete</button>
        </form>
    </div>
</div>

<!-- Fullscreen Editor Overlay -->
<div id="editorFullscreen">
    <div class="fs-header">
        <h4><i class="fas fa-edit" style="color:#f26522;margin-right:8px;"></i> Content Editor</h4>
    </div>
    <div class="fs-toolbar" id="fsToolbar"></div>
    <div class="fs-editor" id="fsEditorContainer"></div>
</div>
<button id="exitFsBtn" style="display:none;position:fixed;bottom:25px;right:25px;z-index:200000;background:#fff;color:#333;border:1px solid #ddd;padding:10px 18px;border-radius:8px;font-size:0.85rem;font-weight:500;font-family:inherit;cursor:pointer;align-items:center;gap:6px;box-shadow:0 4px 15px rgba(0,0,0,0.1);"><i class="fas fa-compress"></i> Exit Fullscreen</button>

<!-- Hidden toggle form -->
<form id="toggleForm" method="POST" action="admin.php?page=blogs" style="display:none;">
    <input type="hidden" name="action" value="toggle_blog_status">
    <input type="hidden" name="blog_id" id="toggleBlogId" value="">
</form>

<script>
// Initialize Quill Editor
var quill = new Quill('#quillEditor', {
    theme: 'snow',
    placeholder: 'Write your blog content...',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'font': [] }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'align': [] }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            ['blockquote', 'code-block'],
            ['link', 'image', 'video'],
            ['clean']
        ]
    }
});

// Sync Quill content to hidden textarea on form submit
document.getElementById('blogForm').addEventListener('submit', function() {
    document.getElementById('blogContent').value = quill.root.innerHTML;
    var btn = document.getElementById('blogSubmitBtn');
    btn.disabled = true;
    btn.innerHTML = '<span class="btn-spinner" style="display:inline-block;width:18px;height:18px;border:3px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin 0.6s linear infinite;vertical-align:middle;"></span>';
});

// Fullscreen: create a second Quill instance in the overlay
var fsQuill = null;
var isFullscreen = false;

function toggleFullscreen() {
    var overlay = document.getElementById('editorFullscreen');
    var fsContainer = document.getElementById('fsEditorContainer');
    var fsToolbar = document.getElementById('fsToolbar');

    // Initialize fullscreen editor once
    if (!fsQuill) {
        fsToolbar.innerHTML = '<div id="fsToolbarBar"></div>';
        fsContainer.innerHTML = '<div id="fsQuillEditor"></div>';
        fsQuill = new Quill('#fsQuillEditor', {
            theme: 'snow',
            placeholder: 'Write your blog content...',
            modules: {
                toolbar: {
                    container: '#fsToolbarBar',
                    handlers: {}
                }
            }
        });
        // Re-create toolbar options matching main editor
        fsQuill = null;
        fsToolbar.innerHTML = '';
        fsContainer.innerHTML = '<div id="fsQuillEditor"></div>';
        fsQuill = new Quill('#fsQuillEditor', {
            theme: 'snow',
            placeholder: 'Write your blog content...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
    }

    // Copy content from main editor to fullscreen
    fsQuill.root.innerHTML = quill.root.innerHTML;
    overlay.classList.add('active');
    document.getElementById('exitFsBtn').style.display = 'flex';
    document.body.style.overflow = 'hidden';
    isFullscreen = true;
    fsQuill.focus();
}

function exitFullscreen() {
    quill.root.innerHTML = fsQuill.root.innerHTML;
    document.getElementById('editorFullscreen').classList.remove('active');
    document.getElementById('exitFsBtn').style.display = 'none';
    document.body.style.overflow = '';
    isFullscreen = false;
}

// Exit fullscreen button click
document.getElementById('exitFsBtn').addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    exitFullscreen();
});

// ESC to exit fullscreen
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && isFullscreen) {
        exitFullscreen();
    }
});

function openBlogModal(id) {
    const modal = document.getElementById('blogModal');
    const form = document.getElementById('blogForm');
    form.reset();
    quill.root.innerHTML = '';
    document.getElementById('imagePreviewWrap').style.display = 'none';
    setCategoryDropdown('');
    if (isFullscreen) exitFullscreen();

    if (id) {
        const row = document.getElementById('blog-row-' + id);
        document.getElementById('blogModalTitle').innerHTML = '<i class="fas fa-edit" style="color:var(--accent);margin-right:8px;"></i> Edit Blog Post';
        document.getElementById('blogAction').value = 'update_blog';
        document.getElementById('blogId').value = id;
        document.getElementById('blogTitleInput').value = row.dataset.title;
        setCategoryDropdown(row.dataset.category || '');
        quill.root.innerHTML = row.dataset.content || '';
        document.getElementById('blogMetaDesc').value = row.dataset.meta_description;
        document.getElementById('blogMetaKeys').value = row.dataset.meta_keywords;
        document.getElementById('blogAuthor').value = row.dataset.author;
        document.getElementById('blogPublish').checked = (row.dataset.status === 'published');
        if (row.dataset.image) {
            document.getElementById('imagePreview').src = '<?= url("assets/uploads/blogs/") ?>' + row.dataset.image;
            document.getElementById('imagePreviewWrap').style.display = 'block';
        }
    } else {
        document.getElementById('blogModalTitle').innerHTML = '<i class="fas fa-blog" style="color:var(--accent);margin-right:8px;"></i> New Blog Post';
        document.getElementById('blogAction').value = 'create_blog';
        document.getElementById('blogId').value = '';
    }
    modal.style.display = 'flex';
}

function closeBlogModal() {
    document.getElementById('blogModal').style.display = 'none';
    if (isFullscreen) toggleFullscreen();
}

function viewBlog(id) {
    const row = document.getElementById('blog-row-' + id);
    const imgHtml = row.dataset.image
        ? '<img src="<?= url("assets/uploads/blogs/") ?>' + row.dataset.image + '" style="max-width:100%;border-radius:8px;margin-bottom:15px;">'
        : '';
    const content = row.dataset.content || '';
    const html = imgHtml +
        '<h4 style="color:#1a1b2e;margin-bottom:5px;">' + escHtml(row.dataset.title) + '</h4>' +
        '<div style="display:flex;gap:15px;margin-bottom:15px;font-size:0.85rem;color:#999;">' +
            '<span><i class="fas fa-folder" style="color:var(--accent);margin-right:4px;"></i>' + escHtml(row.dataset.category || '-') + '</span>' +
            '<span><i class="fas fa-user" style="color:var(--accent);margin-right:4px;"></i>' + escHtml(row.dataset.author) + '</span>' +
            '<span class="status-badge ' + (row.dataset.status === 'published' ? 'status-active' : 'status-inactive') + '" style="font-size:0.75rem;">' + row.dataset.status + '</span>' +
        '</div>' +
        '<div style="line-height:1.7;color:#444;font-size:0.9rem;border-top:1px solid #eee;padding-top:15px;">' + content + '</div>' +
        (row.dataset.meta_description ? '<div style="margin-top:15px;padding:10px;background:#f8f9fa;border-radius:6px;font-size:0.82rem;color:#666;"><strong>Meta:</strong> ' + escHtml(row.dataset.meta_description) + '</div>' : '');
    document.getElementById('viewBlogContent').innerHTML = html;
    document.getElementById('viewBlogModal').style.display = 'flex';
}

function closeViewModal() {
    document.getElementById('viewBlogModal').style.display = 'none';
}

function confirmDeleteBlog(id) {
    document.getElementById('deleteBlogId').value = id;
    document.getElementById('deleteModal').style.display = 'flex';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function toggleStatus(id) {
    document.getElementById('toggleBlogId').value = id;
    document.getElementById('toggleForm').submit();
}

function previewBlogImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreviewWrap').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function escHtml(str) {
    const div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

// Custom select dropdown
function selectCategory(el) {
    var val = el.dataset.value;
    var text = val || 'Select Category';
    var wrap = el.closest('.custom-select-wrap');
    document.getElementById('blogCategory').value = val;
    var textEl = document.getElementById('categorySelText');
    textEl.textContent = text;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
}

function setCategoryDropdown(val) {
    document.getElementById('blogCategory').value = val;
    var textEl = document.getElementById('categorySelText');
    var wrap = document.getElementById('categorySel');
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
        if (o.dataset.value === val) { o.classList.add('selected'); }
    });
    if (val) {
        textEl.textContent = val;
        textEl.className = '';
    } else {
        textEl.textContent = 'Select Category';
        textEl.className = 'cs-placeholder';
    }
}

// Close custom selects on outside click
document.addEventListener('click', function(e) {
    document.querySelectorAll('.custom-select-wrap.open').forEach(function(w) {
        if (!w.contains(e.target)) w.classList.remove('open');
    });
});

// Only view and delete modals close on backdrop click (blog form modal does NOT)
['viewBlogModal', 'deleteModal'].forEach(function(id) {
    document.getElementById(id).addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });
});
</script>
