<?php
$galleryImages = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetchAll();
$totalImages = count($galleryImages);
$categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
?>

<!-- Stats -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-images"></i></div>
        <div class="stat-info">
            <h3><?= $totalImages ?></h3>
            <p>Total Photos</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-folder"></i></div>
        <div class="stat-info">
            <h3><?= count($categories) ?></h3>
            <p>Categories</p>
        </div>
    </div>
</div>

<!-- Upload Form -->
<div class="data-panel" style="margin-bottom:25px;">
    <div class="data-panel-header">
        <h4><i class="fas fa-cloud-upload-alt" style="color:var(--accent);margin-right:8px;"></i> Upload Photos</h4>
    </div>
    <div style="padding:20px;">
        <form method="POST" action="admin.php?page=gallery" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_gallery">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Title (optional)</label>
                    <input type="text" name="title" placeholder="e.g. Yoga Day 2025" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Category</label>
                    <input type="text" name="category" value="General" placeholder="e.g. Events, Causes, Celebrations" list="categoryList" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                    <datalist id="categoryList">
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= htmlspecialchars($cat) ?>">
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Select Photos (multiple allowed)</label>
                <input type="file" name="images[]" multiple accept="image/*" required style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.85rem;font-family:inherit;">
            </div>
            <button type="submit" class="btn-admin btn-primary"><i class="fas fa-upload"></i> Upload Photos</button>
        </form>
    </div>
</div>

<!-- Gallery Grid -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-images" style="color:var(--accent);margin-right:8px;"></i> Gallery (<?= $totalImages ?> photos)</h4>
    </div>
    <div style="padding:20px;">
        <?php if (empty($galleryImages)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-images" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No photos uploaded yet. Upload your first photo above.
        </div>
        <?php else: ?>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:15px;">
            <?php foreach ($galleryImages as $img): ?>
            <div style="position:relative;border-radius:10px;overflow:hidden;border:1px solid var(--border);background:var(--card-bg);">
                <img src="<?= url('assets/uploads/gallery/' . $img['image']) ?>" alt="<?= htmlspecialchars($img['title']) ?>" style="width:100%;height:160px;object-fit:cover;display:block;">
                <div style="padding:10px;">
                    <p style="margin:0 0 4px;font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($img['title'] ?: 'Untitled') ?></p>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <small style="color:var(--text-muted);font-size:0.72rem;"><?= htmlspecialchars($img['category']) ?> &bull; <?= date('M d, Y', strtotime($img['created_at'])) ?></small>
                        <form method="POST" action="admin.php?page=gallery" style="display:inline;" onsubmit="return confirm('Delete this photo?')">
                            <input type="hidden" name="action" value="delete_gallery">
                            <input type="hidden" name="gallery_id" value="<?= $img['id'] ?>">
                            <button type="submit" class="btn-admin btn-sm btn-danger" style="padding:4px 8px;"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
