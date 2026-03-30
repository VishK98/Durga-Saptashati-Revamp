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
        <div class="stat-info">
            <h3><?= $totalReports ?></h3>
            <p>Total Reports</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <h3><?= $activeReports ?></h3>
            <p>Active / Visible</p>
        </div>
    </div>
</div>

<!-- Upload Form -->
<div class="data-panel" style="margin-bottom:25px;">
    <div class="data-panel-header">
        <h4><i class="fas fa-cloud-upload-alt" style="color:var(--accent);margin-right:8px;"></i> Upload Financial Report</h4>
    </div>
    <div style="padding:20px;">
        <form method="POST" action="admin.php?page=reports" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload_report">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Report Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Financials AY. 2024-25" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Description</label>
                    <input type="text" name="description" value="Audit Report" placeholder="e.g. Audit Report, Annual Report" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
            </div>
            <input type="hidden" name="icon" value="fa-file-pdf">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">Sort Order</label>
                    <input type="number" name="sort_order" value="0" min="0" style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.88rem;font-family:inherit;">
                </div>
                <div>
                    <label style="display:block;margin-bottom:6px;font-weight:600;font-size:0.85rem;color:var(--text-primary);">PDF File * (max 10MB)</label>
                    <input type="file" name="report_file" accept=".pdf" required style="width:100%;padding:10px 14px;border:1px solid var(--border);border-radius:8px;font-size:0.85rem;font-family:inherit;">
                </div>
            </div>
            <button type="submit" class="btn-admin btn-primary"><i class="fas fa-upload"></i> Upload Report</button>
        </form>
    </div>
</div>

<!-- Reports Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-file-invoice-dollar" style="color:var(--accent);margin-right:8px;"></i> All Reports (<?= $totalReports ?>)</h4>
    </div>
    <div style="padding:0;">
        <?php if (empty($reports)): ?>
        <div style="text-align:center;padding:40px;color:var(--text-muted);">
            <i class="fas fa-file-pdf" style="font-size:2rem;margin-bottom:10px;display:block;opacity:0.3;"></i>
            No reports uploaded yet. Upload your first report above.
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
                                <a href="<?= url('assets/reports/' . rawurlencode($report['file'])) ?>" target="_blank" style="text-decoration:none;"><i class="fas fa-eye"></i> View PDF</a>
                                <form method="POST" action="admin.php?page=reports" style="display:contents;">
                                    <input type="hidden" name="action" value="toggle_report">
                                    <input type="hidden" name="report_id" value="<?= $report['id'] ?>">
                                    <button type="submit"><i class="fas fa-eye<?= $report['is_active'] ? '-slash' : '' ?>"></i> <?= $report['is_active'] ? 'Hide' : 'Show' ?></button>
                                </form>
                                <form method="POST" action="admin.php?page=reports" style="display:contents;" onsubmit="return confirm('Delete this report?')">
                                    <input type="hidden" name="action" value="delete_report">
                                    <input type="hidden" name="report_id" value="<?= $report['id'] ?>">
                                    <button type="submit" style="color:#dc2626;"><i class="fas fa-trash"></i> Delete</button>
                                </form>
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
