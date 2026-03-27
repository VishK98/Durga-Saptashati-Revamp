<?php
$volunteers = $pdo->query("SELECT * FROM volunteers ORDER BY created_at DESC")->fetchAll();
$totalVolunteers = count($volunteers);
$pendingCount = $pdo->query("SELECT COUNT(*) FROM volunteers WHERE status = 'pending'")->fetchColumn();
$approvedCount = $pdo->query("SELECT COUNT(*) FROM volunteers WHERE status = 'approved'")->fetchColumn();
?>

<!-- Stats Row -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-user-plus"></i></div>
        <div class="stat-info">
            <h3><?= $totalVolunteers ?></h3>
            <p>Total Volunteers</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <h3><?= $pendingCount ?></h3>
            <p>Pending</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <h3><?= $approvedCount ?></h3>
            <p>Approved</p>
        </div>
    </div>
</div>

<!-- Volunteers Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-user-plus" style="color:var(--accent);margin-right:8px;"></i> Volunteer Applications</h4>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($volunteers)): ?>
                <tr><td colspan="7" style="text-align:center;padding:40px;color:#999;">No volunteer applications yet.</td></tr>
            <?php else: ?>
                <?php foreach ($volunteers as $i => $v): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($v['name']) ?></strong></td>
                    <td><?= htmlspecialchars($v['email']) ?></td>
                    <td><?= htmlspecialchars($v['phone'] ?? '-') ?></td>
                    <td><?= date('M d, Y', strtotime($v['created_at'])) ?></td>
                    <td>
                        <span class="status-badge <?= $v['status'] === 'approved' ? 'status-active' : ($v['status'] === 'pending' ? 'status-pending' : 'status-new') ?>">
                            <?= ucfirst($v['status']) ?>
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="viewVolunteer(<?= $v['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                                <?php if ($v['status'] !== 'approved'): ?>
                                <form method="POST" action="admin.php?page=volunteers" style="display:contents;">
                                    <input type="hidden" name="action" value="approve_volunteer">
                                    <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                    <button type="submit"><i class="fas fa-check"></i> Approve</button>
                                </form>
                                <?php endif; ?>
                                <?php if ($v['status'] !== 'rejected'): ?>
                                <form method="POST" action="admin.php?page=volunteers" style="display:contents;">
                                    <input type="hidden" name="action" value="reject_volunteer">
                                    <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                    <button type="submit"><i class="fas fa-times"></i> Reject</button>
                                </form>
                                <?php endif; ?>
                                <div class="action-divider"></div>
                                <form method="POST" action="admin.php?page=volunteers" style="display:contents;">
                                    <input type="hidden" name="action" value="delete_volunteer">
                                    <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                    <button type="submit" class="action-delete" onclick="return confirm('Delete this volunteer?')"><i class="fas fa-trash"></i> Delete</button>
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

<!-- View Volunteer Modal -->
<div id="viewVolunteerModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;width:95%;max-width:600px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="document.getElementById('viewVolunteerModal').style.display='none'" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 style="margin:0 0 20px;color:#1a1b2e;font-size:1.2rem;"><i class="fas fa-user-plus" style="color:#f26522;margin-right:8px;"></i> Volunteer Details</h3>
        <div id="viewVolunteerContent"></div>
    </div>
</div>

<?php
$volunteerDataJson = [];
foreach ($volunteers as $v) { $volunteerDataJson[$v['id']] = $v; }
?>

<script>
var volunteerData = <?= json_encode($volunteerDataJson) ?>;

function viewVolunteer(id) {
    var v = volunteerData[id];
    if (!v) return;
    var html = '<div style="margin-bottom:15px;padding-bottom:15px;border-bottom:1px solid #eee;">' +
        '<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">' +
        '<div><small style="color:#999;">Name</small><p style="margin:3px 0;font-weight:600;color:#1a1b2e;">' + escHtml(v.name) + '</p></div>' +
        '<div><small style="color:#999;">Email</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(v.email) + '</p></div>' +
        '<div><small style="color:#999;">Phone</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(v.phone || '-') + '</p></div>' +
        '<div><small style="color:#999;">Date</small><p style="margin:3px 0;color:#1a1b2e;">' + v.created_at + '</p></div>' +
        '</div></div>' +
        (v.address ? '<div style="margin-bottom:10px;"><small style="color:#999;">Address</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(v.address) + '</p></div>' : '') +
        (v.skills ? '<div style="margin-bottom:10px;"><small style="color:#999;">Skills / Interests</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(v.skills) + '</p></div>' : '') +
        '<div style="margin-top:15px;padding:15px;background:#f8f9fa;border-radius:8px;"><small style="color:#999;">Why they want to volunteer</small><p style="margin:8px 0 0;color:#444;line-height:1.7;white-space:pre-wrap;">' + escHtml(v.message || '-') + '</p></div>';
    document.getElementById('viewVolunteerContent').innerHTML = html;
    document.getElementById('viewVolunteerModal').style.display = 'flex';
}

function escHtml(str) { var div = document.createElement('div'); div.textContent = str || ''; return div.innerHTML; }

document.getElementById('viewVolunteerModal').addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
</script>
