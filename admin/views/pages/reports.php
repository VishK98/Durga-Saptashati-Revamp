<?php
try {
    $reports = $pdo->query("SELECT * FROM financial_reports ORDER BY sort_order ASC, created_at DESC")->fetchAll();
} catch (Exception $e) {
    $reports = [];
}
$totalReports = count($reports);
$activeReports = count(array_filter($reports, fn($r) => $r['is_active']));
?>

<!-- Stats -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-file-pdf"></i></div>
        <div class="stat-info"><h3><?= $totalReports ?></h3><p>Total Reports</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info"><h3><?= $activeReports ?></h3><p>Active / Visible</p></div>
    </div>
</div>

<!-- Reports Table -->
<div class="data-panel">
    <div class="data-panel-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <h4><i class="fas fa-file-invoice-dollar" style="color:var(--accent);margin-right:8px;"></i> All Reports (<?= $totalReports ?>)</h4>
        <button onclick="openUploadReport()" style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
            <i class="fas fa-plus"></i> Upload Financial Report
        </button>
    </div>
    <div style="padding:0;">
        <?php if (empty($reports)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-file-pdf" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No reports uploaded yet. Click "Upload Financial Report" to get started.
        </div>
        <?php else: ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Uploaded</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $i => $report): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($report['title']) ?></strong></td>
                    <td><?= htmlspecialchars($report['description']) ?></td>
                    <td><?= $report['sort_order'] ?></td>
                    <td>
                        <?php if ($report['is_active']): ?>
                        <span style="background:var(--success-light);color:#059669;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;">Active</span>
                        <?php else: ?>
                        <span style="background:#fee2e2;color:#dc2626;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;">Hidden</span>
                        <?php endif; ?>
                    </td>
                    <td style="font-size:0.82rem;color:var(--text-muted);"><?= date('M d, Y', strtotime($report['created_at'])) ?></td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="<?= url('assets/reports/' . rawurlencode($report['file'])) ?>" target="_blank"><i class="fas fa-eye"></i> View PDF</a>
                                <a href="javascript:void(0)" onclick="ajaxReportAction('toggle_report', <?= $report['id'] ?>)"><i class="fas fa-eye<?= $report['is_active'] ? '-slash' : '' ?>"></i> <?= $report['is_active'] ? 'Hide' : 'Show' ?></a>
                                <a href="javascript:void(0)" onclick="showReportConfirm('Delete this report?', function(){ ajaxReportAction('delete_report', <?= $report['id'] ?>) })" style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</a>
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

<!-- Upload Report Modal -->
<div id="uploadReportModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('uploadReportModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-cloud-upload-alt" style="color:var(--accent);"></i> Upload Financial Report</h4>
        <form id="uploadReportForm" method="POST" action="admin.php?page=reports" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_report">
            <input type="hidden" name="icon" value="fa-file-pdf">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Report Title <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="title" required placeholder="e.g. Financials AY. 2024-25" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                    <input type="text" name="description" value="Audit Report" placeholder="e.g. Audit Report" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Sort Order</label>
                <input type="number" name="sort_order" value="0" min="0" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
            </div>
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">PDF File <span style="color:#ef4444;">*</span> (max 10MB)</label>
                <div id="reportDropZone" style="border:2px dashed #ddd;border-radius:10px;padding:30px;text-align:center;cursor:pointer;transition:border-color 0.2s,background 0.2s;" onclick="document.getElementById('reportFileInput').click()">
                    <i class="fas fa-file-pdf" style="font-size:2rem;color:#ccc;margin-bottom:10px;display:block;"></i>
                    <p style="margin:0 0 4px;font-weight:600;color:#666;font-size:0.9rem;">Click to select PDF file</p>
                    <p id="reportFileName" style="margin:0;color:#999;font-size:0.8rem;">No file selected</p>
                    <input type="file" name="report_file" id="reportFileInput" accept=".pdf" required style="display:none;" onchange="document.getElementById('reportFileName').textContent=this.files.length?this.files[0].name:'No file selected'">
                </div>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;"><i class="fas fa-upload"></i> Upload Report</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="reportConfirmModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:400px;width:90%;padding:30px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="width:56px;height:56px;border-radius:50%;background:#fef2f2;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
            <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.5rem;"></i>
        </div>
        <h4 style="margin-bottom:8px;color:#1a1b2e;font-size:1.1rem;">Are you sure?</h4>
        <p id="reportConfirmMsg" style="color:#666;font-size:0.92rem;margin-bottom:24px;">This action cannot be undone.</p>
        <div style="display:flex;gap:12px;justify-content:center;">
            <button onclick="document.getElementById('reportConfirmModal').style.display='none'" style="padding:10px 28px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;color:#666;">Cancel</button>
            <button id="reportConfirmBtn" style="padding:10px 28px;border:none;border-radius:8px;background:#ef4444;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
function openUploadReport() {
    document.getElementById('uploadReportForm').reset();
    document.getElementById('reportFileName').textContent = 'No file selected';
    document.getElementById('uploadReportModal').style.display = 'flex';
}

function ajaxReportAction(action, reportId) {
    var fd = new FormData();
    fd.append('action', action);
    fd.append('report_id', reportId);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin.php?page=reports');
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

var _reportConfirmCb = null;
function showReportConfirm(message, onConfirm) {
    _reportConfirmCb = onConfirm;
    document.getElementById('reportConfirmMsg').textContent = message;
    document.getElementById('reportConfirmModal').style.display = 'flex';
}
document.getElementById('reportConfirmBtn').addEventListener('click', function() {
    document.getElementById('reportConfirmModal').style.display = 'none';
    if (_reportConfirmCb) _reportConfirmCb();
    _reportConfirmCb = null;
});

// Close modals on backdrop
['uploadReportModal','reportConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
</script>
