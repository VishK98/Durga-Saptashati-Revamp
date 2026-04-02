<?php
try {
    $reports = $pdo->query("SELECT * FROM financial_reports ORDER BY sort_order ASC, created_at DESC")->fetchAll();
} catch (Exception $e) {
    $reports = [];
}
$totalReports = count($reports);
$activeReports = count(array_filter($reports, fn($r) => $r['is_active']));
?>

<link rel="stylesheet" href="../admin/assets/css/reports.css">

<!-- Stats -->
<div class="rp-stats-grid">
    <div class="stat-card">
        <div class="stat-icon rp-stat-icon-accent"><i class="fas fa-file-pdf"></i></div>
        <div class="stat-info"><h3><?= $totalReports ?></h3><p>Total Reports</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon rp-stat-icon-success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info"><h3><?= $activeReports ?></h3><p>Active / Visible</p></div>
    </div>
</div>

<!-- Reports Table -->
<div class="data-panel">
    <div class="data-panel-header rp-panel-header">
        <h4><i class="fas fa-file-invoice-dollar rp-header-icon"></i> All Reports (<?= $totalReports ?>)</h4>
        <button onclick="openUploadReport()" class="rp-upload-btn">
            <i class="fas fa-plus"></i> Upload Financial Report
        </button>
    </div>
    <div class="rp-no-padding">
        <?php if (empty($reports)): ?>
        <div class="rp-empty-state">
            <i class="fas fa-file-pdf rp-empty-icon"></i>
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
                    <th class="rp-actions-col">Actions</th>
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
                        <span class="rp-badge-active">Active</span>
                        <?php else: ?>
                        <span class="rp-badge-hidden">Hidden</span>
                        <?php endif; ?>
                    </td>
                    <td class="rp-date-cell"><?= date('M d, Y', strtotime($report['created_at'])) ?></td>
                    <td class="rp-actions-col">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="<?= url('assets/reports/' . rawurlencode($report['file'])) ?>" target="_blank"><i class="fas fa-eye"></i> View PDF</a>
                                <a href="javascript:void(0)" onclick="ajaxReportAction('toggle_report', <?= $report['id'] ?>)"><i class="fas fa-eye<?= $report['is_active'] ? '-slash' : '' ?>"></i> <?= $report['is_active'] ? 'Hide' : 'Show' ?></a>
                                <a href="javascript:void(0)" onclick="showReportConfirm('Delete this report?', function(){ ajaxReportAction('delete_report', <?= $report['id'] ?>) })" class="rp-delete-link"><i class="fas fa-trash"></i> Delete</a>
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
<div id="uploadReportModal" class="rp-modal-overlay">
    <div class="rp-modal-box">
        <button onclick="document.getElementById('uploadReportModal').style.display='none'" class="rp-modal-close">&times;</button>
        <h4 class="rp-modal-title"><i class="fas fa-cloud-upload-alt rp-modal-title-icon"></i> Upload Financial Report</h4>
        <form id="uploadReportForm" method="POST" action="admin?page=reports" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_report">
            <input type="hidden" name="icon" value="fa-file-pdf">
            <div class="rp-form-grid">
                <div>
                    <label class="rp-label">Report Title <span class="rp-required">*</span></label>
                    <input type="text" name="title" required placeholder="e.g. Financials AY. 2024-25" class="rp-input">
                </div>
                <div>
                    <label class="rp-label">Description</label>
                    <input type="text" name="description" value="Audit Report" placeholder="e.g. Audit Report" class="rp-input">
                </div>
            </div>
            <div class="rp-form-group">
                <label class="rp-label">Sort Order</label>
                <input type="number" name="sort_order" value="0" min="0" class="rp-input">
            </div>
            <div class="rp-form-group-lg">
                <label class="rp-label">PDF File <span class="rp-required">*</span> (max 10MB)</label>
                <div id="reportDropZone" class="rp-dropzone" onclick="document.getElementById('reportFileInput').click()">
                    <i class="fas fa-file-pdf rp-dropzone-icon"></i>
                    <p class="rp-dropzone-text">Click to select PDF file</p>
                    <p id="reportFileName" class="rp-dropzone-filename">No file selected</p>
                    <input type="file" name="report_file" id="reportFileInput" accept=".pdf" required class="rp-hidden">
                </div>
            </div>
            <button type="submit" class="rp-submit-btn"><i class="fas fa-upload"></i> Upload Report</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="reportConfirmModal" class="rp-modal-overlay rp-confirm-overlay">
    <div class="rp-confirm-box">
        <div class="rp-confirm-icon-wrap">
            <i class="fas fa-exclamation-triangle rp-confirm-icon"></i>
        </div>
        <h4 class="rp-confirm-title">Are you sure?</h4>
        <p id="reportConfirmMsg" class="rp-confirm-msg">This action cannot be undone.</p>
        <div class="rp-confirm-actions">
            <button onclick="document.getElementById('reportConfirmModal').style.display='none'" class="rp-btn-cancel">Cancel</button>
            <button id="reportConfirmBtn" class="rp-btn-delete">Yes, Delete</button>
        </div>
    </div>
</div>

<script src="../admin/assets/js/reports.js"></script>
