<?php
$galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
$totalImages = count($galleryImages);
$categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
?>

<!-- Stats -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-images"></i></div>
        <div class="stat-info"><h3><?= $totalImages ?></h3><p>Total Photos</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-folder"></i></div>
        <div class="stat-info"><h3><?= count($categories) ?></h3><p>Categories</p></div>
    </div>
</div>

<!-- Gallery Grid -->
<div class="data-panel">
    <div class="data-panel-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <h4><i class="fas fa-images" style="color:var(--accent);margin-right:8px;"></i> Gallery (<?= $totalImages ?> photos)</h4>
        <button onclick="openUploadPhotos()" style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
            <i class="fas fa-plus"></i> Upload Photos
        </button>
    </div>
    <!-- Filter Section -->
    <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;padding:15px 20px;background:#f8fafc;border-bottom:1px solid #e2e8f0;">
        <div style="position:relative;flex:1;min-width:200px;">
            <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;font-size:0.85rem;"></i>
            <input type="text" id="gallerySearch" placeholder="Search by title..." oninput="filterGallery()" style="width:100%;padding:9px 12px 9px 35px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;">
        </div>
        <select id="filterGalleryCategory" onchange="filterGallery()" style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:160px;">
            <option value="">All Categories</option>
            <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
            <?php endforeach; ?>
        </select>
        <button onclick="document.getElementById('gallerySearch').value='';document.getElementById('filterGalleryCategory').value='';filterGallery();" style="background:none;border:1px solid #ddd;padding:9px 14px;border-radius:8px;cursor:pointer;font-size:0.85rem;color:#666;" title="Clear filters">
            <i class="fas fa-times"></i> Clear
        </button>
    </div>
    <div style="padding:20px;">
        <?php if (empty($galleryImages)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-images" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No photos uploaded yet. Click "Upload Photos" to get started.
        </div>
        <?php else: ?>
        <div id="galleryGrid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:15px;">
            <?php foreach ($galleryImages as $img): ?>
            <div class="gallery-card" data-title="<?= htmlspecialchars(strtolower($img['title'] ?? '')) ?>" data-category="<?= htmlspecialchars($img['category']) ?>" style="position:relative;border-radius:10px;overflow:hidden;border:1px solid var(--border);background:var(--card-bg);">
                <img src="<?= url('assets/uploads/gallery/' . $img['image']) ?>" alt="<?= htmlspecialchars($img['title']) ?>" style="width:100%;height:160px;object-fit:cover;display:block;">
                <div style="padding:10px;">
                    <p style="margin:0 0 4px;font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($img['title'] ?: 'Untitled') ?></p>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <small style="color:var(--text-muted);font-size:0.72rem;"><?= htmlspecialchars($img['category']) ?> &bull; <?= date('M d, Y', strtotime($img['created_at'])) ?></small>
                        <button onclick="showGalleryConfirm('Delete this photo?', function(){ ajaxGalleryAction('delete_gallery', <?= $img['id'] ?>) })" style="background:none;border:none;color:#ef4444;cursor:pointer;padding:4px 8px;font-size:0.85rem;" title="Delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Upload Photos Modal -->
<div id="uploadPhotosModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('uploadPhotosModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-cloud-upload-alt" style="color:var(--accent);"></i> Upload Photos</h4>
        <form id="uploadPhotosForm" method="POST" action="admin.php?page=gallery" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_gallery">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Title (optional)</label>
                    <input type="text" name="title" placeholder="e.g. Yoga Day 2025" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Category</label>
                    <select name="category" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="General">General</option>
                        <?php foreach ($categories as $cat): ?>
                        <?php if ($cat !== 'General'): ?>
                        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <option value="Events">Events</option>
                        <option value="Celebrations">Celebrations</option>
                        <option value="Causes">Causes</option>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Select Photos (multiple allowed)</label>
                <div id="dropZone" style="border:2px dashed #ddd;border-radius:10px;padding:30px;text-align:center;cursor:pointer;transition:border-color 0.2s,background 0.2s;" onclick="document.getElementById('galleryFileInput').click()">
                    <i class="fas fa-cloud-upload-alt" style="font-size:2rem;color:#ccc;margin-bottom:10px;display:block;"></i>
                    <p style="margin:0 0 4px;font-weight:600;color:#666;font-size:0.9rem;">Click to select or drag & drop</p>
                    <p id="fileCount" style="margin:0;color:#999;font-size:0.8rem;">No files selected</p>
                    <input type="file" name="images[]" id="galleryFileInput" multiple accept="image/*" required style="display:none;" onchange="updateFileCount(this)">
                </div>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;"><i class="fas fa-upload"></i> Upload Photos</button>
        </form>
    </div>
</div>

<!-- Confirm Modal for Gallery -->
<div id="galleryConfirmModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:400px;width:90%;padding:30px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="width:56px;height:56px;border-radius:50%;background:#fef2f2;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
            <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.5rem;"></i>
        </div>
        <h4 style="margin-bottom:8px;color:#1a1b2e;font-size:1.1rem;">Are you sure?</h4>
        <p id="galleryConfirmMessage" style="color:#666;font-size:0.92rem;margin-bottom:24px;">This action cannot be undone.</p>
        <div style="display:flex;gap:12px;justify-content:center;">
            <button onclick="document.getElementById('galleryConfirmModal').style.display='none'" style="padding:10px 28px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;color:#666;">Cancel</button>
            <button id="galleryConfirmBtn" style="padding:10px 28px;border:none;border-radius:8px;background:#ef4444;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
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
    ['dragenter','dragover'].forEach(function(evt) {
        dropZone.addEventListener(evt, function(e) { e.preventDefault(); dropZone.style.borderColor = 'var(--accent)'; dropZone.style.background = 'rgba(242,101,34,0.04)'; });
    });
    ['dragleave','drop'].forEach(function(evt) {
        dropZone.addEventListener(evt, function(e) { e.preventDefault(); dropZone.style.borderColor = '#ddd'; dropZone.style.background = ''; });
    });
    dropZone.addEventListener('drop', function(e) {
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
    xhr.open('POST', 'admin.php?page=gallery');
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

// Custom confirm
var _galleryConfirmCb = null;
function showGalleryConfirm(message, onConfirm) {
    _galleryConfirmCb = onConfirm;
    document.getElementById('galleryConfirmMessage').textContent = message;
    document.getElementById('galleryConfirmModal').style.display = 'flex';
}
document.getElementById('galleryConfirmBtn').addEventListener('click', function() {
    document.getElementById('galleryConfirmModal').style.display = 'none';
    if (_galleryConfirmCb) _galleryConfirmCb();
    _galleryConfirmCb = null;
});

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
}

// Close modals on backdrop
['uploadPhotosModal','galleryConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
</script>
