<?php
$galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
$totalImages = count($galleryImages);
$categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
?>

<link rel="stylesheet" href="../admin/assets/css/gallery.css">

<!-- Stats -->
<div class="gl-stats-grid">
    <div class="stat-card">
        <div class="stat-icon gl-stat-icon-accent"><i class="fas fa-images"></i></div>
        <div class="stat-info"><h3><?= $totalImages ?></h3><p>Total Photos</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gl-stat-icon-success"><i class="fas fa-folder"></i></div>
        <div class="stat-info"><h3><?= count($categories) ?></h3><p>Categories</p></div>
    </div>
</div>

<!-- Gallery Grid -->
<div class="data-panel">
    <div class="data-panel-header gl-panel-header">
        <h4><i class="fas fa-images gl-header-icon"></i> Gallery (<?= $totalImages ?> photos)</h4>
        <button onclick="openUploadPhotos()" class="gl-upload-btn">
            <i class="fas fa-plus"></i> Upload Photos
        </button>
    </div>
    <!-- Filter Section -->
    <div class="gl-filter-bar">
        <div class="gl-search-wrapper">
            <i class="fas fa-search gl-search-icon"></i>
            <input type="text" id="gallerySearch" placeholder="Search by title..." oninput="filterGallery()" class="gl-search-input">
        </div>
        <input type="hidden" id="filterGalleryCategory" value="">
        <div class="custom-select-wrap gl-filter-dropdown" id="filterGalleryCatWrap">
            <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                <span id="filterGalleryCatText" class="cs-placeholder">All Categories</span>
                <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option selected" data-value="" onclick="selectGalleryFilter(this)">
                    <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-layer-group"></i></span>
                    <span class="cs-opt-text">All Categories</span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <?php foreach ($categories as $cat): ?>
                <div class="custom-select-option" data-value="<?= htmlspecialchars($cat) ?>" onclick="selectGalleryFilter(this)">
                    <span class="cs-opt-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-images"></i></span>
                    <span class="cs-opt-text"><?= htmlspecialchars($cat) ?></span>
                    <i class="fas fa-check cs-opt-check"></i>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button onclick="clearGalleryFilters()" class="gl-clear-btn" id="galleryClearBtn" title="Clear filters">
            <i class="fas fa-times"></i> Clear
        </button>
    </div>
    <div class="gl-content">
        <?php if (empty($galleryImages)): ?>
        <div class="gl-empty-state">
            <i class="fas fa-images gl-empty-icon"></i>
            No photos uploaded yet. Click "Upload Photos" to get started.
        </div>
        <?php else: ?>
        <div id="galleryGrid" class="gl-grid">
            <?php foreach ($galleryImages as $img): ?>
            <div class="gallery-card gl-card" data-title="<?= htmlspecialchars(strtolower($img['title'] ?? '')) ?>" data-category="<?= htmlspecialchars($img['category']) ?>">
                <img src="<?= url('assets/uploads/gallery/' . $img['image']) ?>" alt="<?= htmlspecialchars($img['title']) ?>" class="gl-card-img">
                <div class="gl-card-body">
                    <p class="gl-card-title"><?= htmlspecialchars($img['title'] ?: 'Untitled') ?></p>
                    <div class="gl-card-meta-row">
                        <small class="gl-card-meta"><?= htmlspecialchars($img['category']) ?> &bull; <?= date('M d, Y', strtotime($img['created_at'])) ?></small>
                        <button onclick="showGalleryConfirm('Delete this photo?', function(){ ajaxGalleryAction('delete_gallery', <?= $img['id'] ?>) })" class="gl-delete-btn" title="Delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Upload Photos Modal -->
<div id="uploadPhotosModal" class="gl-modal-overlay">
    <div class="gl-modal-content">
        <button onclick="document.getElementById('uploadPhotosModal').style.display='none'" class="gl-modal-close">&times;</button>
        <h4 class="gl-modal-title"><i class="fas fa-cloud-upload-alt gl-modal-title-icon"></i> Upload Photos</h4>
        <form id="uploadPhotosForm" method="POST" action="admin?page=gallery" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_gallery">
            <div class="gl-form-grid">
                <div>
                    <label class="gl-form-label">Title (optional)</label>
                    <input type="text" name="title" placeholder="e.g. Yoga Day 2025" class="gl-form-input">
                </div>
                <div>
                    <label class="gl-form-label">Category</label>
                    <input type="hidden" name="category" id="uploadGalleryCatVal" value="General">
                    <div class="custom-select-wrap nw-form-dropdown" id="uploadGalleryCatWrap">
                        <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                            <span id="uploadGalleryCatText">General</span>
                            <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                        </div>
                        <div class="custom-select-options">
                            <div class="custom-select-option selected" data-value="General" onclick="selectFormDropdown('uploadGalleryCat', this)">
                                <span class="cs-opt-text">General</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <?php foreach ($categories as $cat): ?>
                            <?php if ($cat !== 'General'): ?>
                            <div class="custom-select-option" data-value="<?= htmlspecialchars($cat) ?>" onclick="selectFormDropdown('uploadGalleryCat', this)">
                                <span class="cs-opt-text"><?= htmlspecialchars($cat) ?></span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="custom-select-option" data-value="Events" onclick="selectFormDropdown('uploadGalleryCat', this)">
                                <span class="cs-opt-text">Events</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Celebrations" onclick="selectFormDropdown('uploadGalleryCat', this)">
                                <span class="cs-opt-text">Celebrations</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                            <div class="custom-select-option" data-value="Causes" onclick="selectFormDropdown('uploadGalleryCat', this)">
                                <span class="cs-opt-text">Causes</span><i class="fas fa-check cs-opt-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gl-file-upload-wrapper">
                <label class="gl-form-label">Select Photos (multiple allowed)</label>
                <div id="dropZone" class="gl-drop-zone" onclick="document.getElementById('galleryFileInput').click()">
                    <i class="fas fa-cloud-upload-alt gl-drop-zone-icon"></i>
                    <p class="gl-drop-zone-text">Click to select or drag & drop</p>
                    <p id="fileCount" class="gl-drop-zone-count">No files selected</p>
                    <input type="file" name="images[]" id="galleryFileInput" multiple accept="image/*" required class="gl-hidden-input" onchange="updateFileCount(this)">
                </div>
            </div>
            <button type="submit" class="gl-submit-btn"><i class="fas fa-upload"></i> Upload Photos</button>
        </form>
    </div>
</div>

<!-- Confirm Modal for Gallery -->
<div id="galleryConfirmModal" class="gl-confirm-overlay">
    <div class="gl-confirm-content">
        <div class="gl-confirm-icon-wrapper">
            <i class="fas fa-exclamation-triangle gl-confirm-icon"></i>
        </div>
        <h4 class="gl-confirm-title">Are you sure?</h4>
        <p id="galleryConfirmMessage" class="gl-confirm-message">This action cannot be undone.</p>
        <div class="gl-confirm-actions">
            <button onclick="document.getElementById('galleryConfirmModal').style.display='none'" class="gl-cancel-btn">Cancel</button>
            <button id="galleryConfirmBtn" class="gl-confirm-delete-btn">Yes, Delete</button>
        </div>
    </div>
</div>

<script src="../admin/assets/js/gallery.js"></script>
