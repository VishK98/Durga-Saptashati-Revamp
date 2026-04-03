/* Gallery Page Scripts */

// Generic form dropdown handler
function selectFormDropdown(prefix, el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    document.getElementById(prefix + 'Val').value = val;
    document.getElementById(prefix + 'Text').textContent = el.querySelector('.cs-opt-text').textContent;
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
}

function openUploadPhotos() {
    document.getElementById('uploadPhotosForm').reset();
    document.getElementById('fileCount').textContent = 'No files selected';
    document.getElementById('uploadPhotosModal').style.display = 'flex';
}

function updateFileCount(input) {
    var count = input.files.length;
    document.getElementById('fileCount').textContent = count > 0 ? count + ' file' + (count > 1 ? 's' : '') + ' selected' : 'No files selected';
}

// Drag & drop
var dropZone = document.getElementById('dropZone');
if (dropZone) {
    ['dragenter', 'dragover'].forEach(function (evt) {
        dropZone.addEventListener(evt, function (e) {
            e.preventDefault();
            dropZone.style.borderColor = 'var(--accent)';
            dropZone.style.background = 'rgba(242,101,34,0.04)';
        });
    });
    ['dragleave', 'drop'].forEach(function (evt) {
        dropZone.addEventListener(evt, function (e) {
            e.preventDefault();
            dropZone.style.borderColor = '#ddd';
            dropZone.style.background = '';
        });
    });
    dropZone.addEventListener('drop', function (e) {
        var input = document.getElementById('galleryFileInput');
        input.files = e.dataTransfer.files;
        updateFileCount(input);
    });
}

// AJAX delete
function ajaxGalleryAction(action, galleryId) {
    var fd = new FormData();
    fd.append('action', action);
    fd.append('gallery_id', galleryId);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/gallery');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function () {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(function () { location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch (e) { showToast('Server error.', 'error'); }
    };
    xhr.onerror = function () { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

// Custom confirm
var _galleryConfirmCb = null;
function showGalleryConfirm(message, onConfirm) {
    _galleryConfirmCb = onConfirm;
    document.getElementById('galleryConfirmMessage').textContent = message;
    document.getElementById('galleryConfirmModal').style.display = 'flex';
}
document.getElementById('galleryConfirmBtn').addEventListener('click', function () {
    document.getElementById('galleryConfirmModal').style.display = 'none';
    if (_galleryConfirmCb) _galleryConfirmCb();
    _galleryConfirmCb = null;
});

// Custom filter dropdown
function selectGalleryFilter(el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    var textEl = document.getElementById('filterGalleryCatText');
    document.getElementById('filterGalleryCategory').value = val;
    textEl.textContent = el.querySelector('.cs-opt-text').textContent;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
    filterGallery();
}

document.addEventListener('click', function(e) {
    document.querySelectorAll('.gl-filter-dropdown.open').forEach(function(wrap) {
        if (!wrap.contains(e.target)) wrap.classList.remove('open');
    });
});

function updateGalleryClearBtn() {
    var search = document.getElementById('gallerySearch').value;
    var category = document.getElementById('filterGalleryCategory').value;
    var btn = document.getElementById('galleryClearBtn');
    if (btn) {
        if (search || category) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    }
}

// Filter
function filterGallery() {
    var search = document.getElementById('gallerySearch').value.toLowerCase();
    var category = document.getElementById('filterGalleryCategory').value;
    var cards = document.querySelectorAll('.gallery-card');
    cards.forEach(function(card) {
        var title = card.getAttribute('data-title') || '';
        var cat = card.getAttribute('data-category') || '';
        var matchSearch = !search || title.indexOf(search) > -1;
        var matchCategory = !category || cat === category;
        card.style.display = (matchSearch && matchCategory) ? '' : 'none';
    });
    updateGalleryClearBtn();
}

function clearGalleryFilters() {
    document.getElementById('gallerySearch').value = '';
    document.getElementById('filterGalleryCategory').value = '';
    var textEl = document.getElementById('filterGalleryCatText');
    textEl.textContent = 'All Categories';
    textEl.className = 'cs-placeholder';
    var wrap = document.getElementById('filterGalleryCatWrap');
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    wrap.querySelector('.custom-select-option[data-value=""]').classList.add('selected');
    filterGallery();
}

// Close modals on backdrop
['uploadPhotosModal', 'galleryConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
