/* ===== Admin Blog Page Scripts ===== */

// Get uploads URL from script tag data attribute
var blogUploadsUrl = (function() {
    var scripts = document.getElementsByTagName('script');
    for (var i = scripts.length - 1; i >= 0; i--) {
        if (scripts[i].src && scripts[i].src.indexOf('blogs.js') !== -1) {
            return scripts[i].getAttribute('data-uploads-url') || '';
        }
    }
    return '';
})();

// Open blog modal (create/edit)
function openBlogModal(id) {
    var modal = document.getElementById('blogModal');
    var form = document.getElementById('blogForm');
    form.reset();
    quill.root.innerHTML = '';
    document.getElementById('imagePreviewWrap').style.display = 'none';
    setCategoryDropdown('');
    if (isFullscreen) exitFullscreen();

    if (id) {
        var row = document.getElementById('blog-row-' + id);
        document.getElementById('blogModalTitle').innerHTML = '<i class="fas fa-edit"></i> Edit Blog Post';
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
            document.getElementById('imagePreview').src = blogUploadsUrl + row.dataset.image;
            document.getElementById('imagePreviewWrap').style.display = 'block';
        }
    } else {
        document.getElementById('blogModalTitle').innerHTML = '<i class="fas fa-blog"></i> New Blog Post';
        document.getElementById('blogAction').value = 'create_blog';
        document.getElementById('blogId').value = '';
    }
    modal.style.display = 'flex';
}

// View blog in modal
function viewBlog(id) {
    var row = document.getElementById('blog-row-' + id);
    var imgHtml = row.dataset.image ?
        '<img src="' + blogUploadsUrl + row.dataset.image + '" class="blog-view-img">' : '';
    var content = row.dataset.content || '';
    var html = imgHtml +
        '<h4 class="blog-view-title">' + escHtml(row.dataset.title) + '</h4>' +
        '<div class="blog-view-meta">' +
        '<span><i class="fas fa-folder blog-view-meta-icon"></i>' + escHtml(row.dataset.category || '-') + '</span>' +
        '<span><i class="fas fa-user blog-view-meta-icon"></i>' + escHtml(row.dataset.author) + '</span>' +
        '<span class="status-badge ' + (row.dataset.status === 'published' ? 'status-active' : 'status-inactive') +
        '">' + row.dataset.status + '</span>' +
        '</div>' +
        '<div class="blog-view-content">' + content + '</div>' +
        (row.dataset.meta_description ?
            '<div class="blog-view-meta-box"><strong>Meta:</strong> ' + escHtml(row.dataset.meta_description) + '</div>' : '');
    document.getElementById('viewBlogContent').innerHTML = html;
    document.getElementById('viewBlogModal').style.display = 'flex';
}

// Blog filter custom dropdowns
function selectFilterCat(el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    var textEl = document.getElementById('filterCatText');
    document.getElementById('filterBlogCategory').value = val;
    textEl.textContent = val || 'All Categories';
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
    });
    el.classList.add('selected');
    wrap.classList.remove('open');
    filterBlogs();
}

function selectFilterStatus(el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    var textEl = document.getElementById('filterStatusText');
    document.getElementById('filterBlogStatus').value = val;
    textEl.textContent = el.querySelector('.cs-opt-text').textContent;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
    });
    el.classList.add('selected');
    wrap.classList.remove('open');
    filterBlogs();
}

// Close filter dropdowns on outside click
document.addEventListener('click', function(e) {
    document.querySelectorAll('.blog-filter-dropdown.open').forEach(function(wrap) {
        if (!wrap.contains(e.target)) wrap.classList.remove('open');
    });
});

function filterBlogs() {
    var search = document.getElementById('blogSearch').value.toLowerCase();
    var category = document.getElementById('filterBlogCategory').value;
    var status = document.getElementById('filterBlogStatus').value;
    var rows = document.querySelectorAll('.data-table.paginated-table tbody tr[id^="blog-row-"]');
    var visible = 0;
    rows.forEach(function(row) {
        var title = (row.dataset.title || '').toLowerCase();
        var author = (row.dataset.author || '').toLowerCase();
        var cat = row.dataset.category || '';
        var st = row.dataset.status || '';
        var matchSearch = !search || title.indexOf(search) !== -1 || author.indexOf(search) !== -1;
        var matchCat = !category || cat === category;
        var matchStatus = !status || st === status;
        var show = matchSearch && matchCat && matchStatus;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    var countEl = document.getElementById('blogFilterCount');
    if (search || category || status) {
        countEl.textContent = visible + ' of ' + rows.length + ' posts';
    } else {
        countEl.textContent = '';
    }
}

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

    if (!fsQuill) {
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

document.getElementById('exitFsBtn').addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    exitFullscreen();
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && isFullscreen) {
        exitFullscreen();
    }
});

function closeBlogModal() {
    document.getElementById('blogModal').style.display = 'none';
    if (isFullscreen) toggleFullscreen();
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
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreviewWrap').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function escHtml(str) {
    var div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

// Custom select dropdown for blog form category
function selectCategory(el) {
    var val = el.dataset.value;
    var text = val || 'Select Category';
    var wrap = el.closest('.custom-select-wrap');
    document.getElementById('blogCategory').value = val;
    var textEl = document.getElementById('categorySelText');
    textEl.textContent = text;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
    });
    el.classList.add('selected');
    wrap.classList.remove('open');
}

function setCategoryDropdown(val) {
    document.getElementById('blogCategory').value = val;
    var textEl = document.getElementById('categorySelText');
    var wrap = document.getElementById('categorySel');
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) {
        o.classList.remove('selected');
        if (o.dataset.value === val) {
            o.classList.add('selected');
        }
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

// Only view and delete modals close on backdrop click
['viewBlogModal', 'deleteModal'].forEach(function(id) {
    document.getElementById(id).addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });
});
