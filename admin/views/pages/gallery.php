<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-images" style="color:var(--pink);margin-right:8px;"></i> Gallery</h4>
        <button class="btn-admin btn-primary"><i class="fas fa-cloud-upload-alt"></i> Upload Photos</button>
    </div>
    <div style="padding:20px;">
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:15px;">
            <?php
            $images = ['causes-1.jpg','causes-2.jpg','causes-3.jpg','causes-4.jpg','event-1.jpg','event-2.jpg'];
            foreach ($images as $i => $img): ?>
            <div style="position:relative;border-radius:10px;overflow:hidden;border:1px solid var(--border);">
                <img src="<?= asset('img/' . $img) ?>" alt="Gallery" style="width:100%;height:140px;object-fit:cover;display:block;">
                <div style="padding:10px;display:flex;justify-content:space-between;align-items:center;">
                    <small style="color:var(--text-muted);"><?= $img ?></small>
                    <button class="btn-admin btn-sm btn-danger" style="padding:4px 8px;"><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
