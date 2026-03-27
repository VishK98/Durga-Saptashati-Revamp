<?php
$careers = $pdo->query("SELECT * FROM careers ORDER BY created_at DESC")->fetchAll();
$applications = $pdo->query("SELECT a.*, c.title as job_title FROM career_applications a LEFT JOIN careers c ON a.career_id = c.id ORDER BY a.created_at DESC")->fetchAll();
$newApps = $pdo->query("SELECT COUNT(*) FROM career_applications WHERE status = 'new'")->fetchColumn();
?>

<!-- Tabs -->
<div style="display:flex;gap:0;border-bottom:2px solid #e5e7eb;margin-bottom:25px;">
    <button class="career-tab active" onclick="switchCareerTab(this,'openings')" style="padding:12px 25px;border:none;background:none;font-weight:700;font-size:0.92rem;color:#1a1b2e;cursor:pointer;border-bottom:3px solid #f26522;margin-bottom:-2px;">
        <i class="fas fa-briefcase" style="margin-right:6px;color:#f26522;"></i> Job Openings (<?= count($careers) ?>)
    </button>
    <button class="career-tab" onclick="switchCareerTab(this,'applications')" style="padding:12px 25px;border:none;background:none;font-weight:700;font-size:0.92rem;color:#999;cursor:pointer;border-bottom:3px solid transparent;margin-bottom:-2px;">
        <i class="fas fa-file-alt" style="margin-right:6px;"></i> Applications (<?= count($applications) ?>)
        <?php if ($newApps > 0): ?><span style="background:#ef4444;color:#fff;padding:2px 8px;border-radius:10px;font-size:0.7rem;margin-left:5px;"><?= $newApps ?></span><?php endif; ?>
    </button>
</div>

<!-- Job Openings Tab -->
<div id="tab-openings">
    <div class="data-panel">
        <div class="data-panel-header">
            <h4><i class="fas fa-briefcase" style="color:var(--accent);margin-right:8px;"></i> Job Openings</h4>
            <button class="btn-admin btn-primary" onclick="document.getElementById('addJobModal').style.display='flex'"><i class="fas fa-plus"></i> Add Opening</button>
        </div>
        <table class="data-table paginated-table">
            <thead>
                <tr><th>#</th><th>Title</th><th>Department</th><th>Type</th><th>Location</th><th>Status</th><th style="text-align:right;">Actions</th></tr>
            </thead>
            <tbody>
                <?php if (empty($careers)): ?>
                    <tr><td colspan="7" style="text-align:center;padding:40px;color:#999;">No job openings. Click "Add Opening" to create one.</td></tr>
                <?php else: ?>
                    <?php foreach ($careers as $i => $c): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><strong><?= htmlspecialchars($c['title']) ?></strong></td>
                        <td><?= htmlspecialchars($c['department'] ?? '-') ?></td>
                        <td><span style="background:rgba(59,130,246,0.1);color:#2563eb;padding:3px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><?= ucfirst(str_replace('-',' ',$c['type'])) ?></span></td>
                        <td><?= htmlspecialchars($c['location'] ?? '-') ?></td>
                        <td><span class="status-badge <?= $c['status'] === 'active' ? 'status-active' : 'status-draft' ?>"><?= ucfirst($c['status']) ?></span></td>
                        <td style="text-align:right;">
                            <div class="action-wrap">
                                <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="action-menu">
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="toggle_career">
                                        <input type="hidden" name="career_id" value="<?= $c['id'] ?>">
                                        <button type="submit"><i class="fas fa-toggle-on"></i> <?= $c['status'] === 'active' ? 'Close' : 'Activate' ?></button>
                                    </form>
                                    <div class="action-divider"></div>
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="delete_career">
                                        <input type="hidden" name="career_id" value="<?= $c['id'] ?>">
                                        <button type="submit" class="action-delete" onclick="return confirm('Delete this opening?')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Applications Tab -->
<div id="tab-applications" style="display:none;">
    <div class="data-panel">
        <div class="data-panel-header">
            <h4><i class="fas fa-file-alt" style="color:#2563eb;margin-right:8px;"></i> Applications</h4>
            <?php if ($newApps > 0): ?><span class="status-badge status-new"><?= $newApps ?> New</span><?php endif; ?>
        </div>
        <table class="data-table paginated-table">
            <thead>
                <tr><th>#</th><th>Name</th><th>Email</th><th>Position</th><th>Date</th><th>Resume</th><th>Status</th><th style="text-align:right;">Actions</th></tr>
            </thead>
            <tbody>
                <?php if (empty($applications)): ?>
                    <tr><td colspan="8" style="text-align:center;padding:40px;color:#999;">No applications received yet.</td></tr>
                <?php else: ?>
                    <?php foreach ($applications as $i => $a): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><strong><?= htmlspecialchars($a['name']) ?></strong></td>
                        <td><?= htmlspecialchars($a['email']) ?></td>
                        <td><?= htmlspecialchars($a['job_title'] ?? 'General') ?></td>
                        <td><?= date('M d, Y', strtotime($a['created_at'])) ?></td>
                        <td>
                            <?php if ($a['resume']): ?>
                                <a href="<?= asset('uploads/resumes/' . $a['resume']) ?>" target="_blank" style="color:#f26522;font-size:0.82rem;"><i class="fas fa-download"></i> View</a>
                            <?php else: ?>
                                <span style="color:#999;font-size:0.82rem;">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="status-badge <?= $a['status'] === 'new' ? 'status-new' : ($a['status'] === 'shortlisted' ? 'status-active' : ($a['status'] === 'reviewed' ? 'status-pending' : 'status-draft')) ?>">
                                <?= ucfirst($a['status']) ?>
                            </span>
                        </td>
                        <td style="text-align:right;">
                            <div class="action-wrap">
                                <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="action-menu">
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="update_application">
                                        <input type="hidden" name="app_id" value="<?= $a['id'] ?>">
                                        <input type="hidden" name="status" value="reviewed">
                                        <button type="submit"><i class="fas fa-eye"></i> Mark Reviewed</button>
                                    </form>
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="update_application">
                                        <input type="hidden" name="app_id" value="<?= $a['id'] ?>">
                                        <input type="hidden" name="status" value="shortlisted">
                                        <button type="submit"><i class="fas fa-star"></i> Shortlist</button>
                                    </form>
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="update_application">
                                        <input type="hidden" name="app_id" value="<?= $a['id'] ?>">
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit"><i class="fas fa-times"></i> Reject</button>
                                    </form>
                                    <div class="action-divider"></div>
                                    <form method="POST" action="admin.php?page=careers" style="display:contents;">
                                        <input type="hidden" name="action" value="delete_application">
                                        <input type="hidden" name="app_id" value="<?= $a['id'] ?>">
                                        <button type="submit" class="action-delete" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Job Modal -->
<div id="addJobModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;width:95%;max-width:600px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="document.getElementById('addJobModal').style.display='none'" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 style="margin:0 0 25px;color:#1a1b2e;font-size:1.2rem;"><i class="fas fa-briefcase" style="color:#f26522;margin-right:8px;"></i> Add Job Opening</h3>
        <form method="POST" action="admin.php?page=careers">
            <input type="hidden" name="action" value="create_career">
            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Job Title *</label>
                <input type="text" name="title" required style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="e.g. Program Coordinator">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Department</label>
                    <input type="text" name="department" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="e.g. Education">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Location</label>
                    <input type="text" name="location" value="Dwarka, New Delhi" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;">
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Type</label>
                <select name="type" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;background:#fff;">
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="internship">Internship</option>
                    <option value="volunteer">Volunteer</option>
                </select>
            </div>
            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Description</label>
                <textarea name="description" rows="4" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;resize:vertical;" placeholder="Job description..."></textarea>
            </div>
            <div style="margin-bottom:20px;">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Requirements</label>
                <textarea name="requirements" rows="3" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;resize:vertical;" placeholder="Required skills and qualifications..."></textarea>
            </div>
            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button type="button" onclick="document.getElementById('addJobModal').style.display='none'" style="padding:10px 24px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-family:inherit;">Cancel</button>
                <button type="submit" style="padding:10px 24px;border:none;border-radius:8px;background:#f26522;color:#fff;cursor:pointer;font-weight:600;font-family:inherit;">Create Opening</button>
            </div>
        </form>
    </div>
</div>

<script>
function switchCareerTab(btn, tab) {
    document.querySelectorAll('.career-tab').forEach(function(t) { t.style.color = '#999'; t.style.borderBottomColor = 'transparent'; });
    btn.style.color = '#1a1b2e'; btn.style.borderBottomColor = '#f26522';
    document.getElementById('tab-openings').style.display = tab === 'openings' ? 'block' : 'none';
    document.getElementById('tab-applications').style.display = tab === 'applications' ? 'block' : 'none';
}
</script>
