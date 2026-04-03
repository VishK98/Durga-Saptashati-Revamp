<link rel="stylesheet" href="../admin/assets/css/volunteers.css">
<link rel="stylesheet" href="../admin/assets/css/queries.css">

<?php
$volunteers = $pdo->query("SELECT * FROM volunteers ORDER BY created_at DESC")->fetchAll();
$totalVolunteers = count($volunteers);
$pendingCount = $pdo->query("SELECT COUNT(*) FROM volunteers WHERE status = 'pending'")->fetchColumn();
$approvedCount = $pdo->query("SELECT COUNT(*) FROM volunteers WHERE status = 'approved'")->fetchColumn();
?>

<!-- Stats Row -->
<div class="vl-stats-grid">
    <div class="stat-card">
        <div class="stat-icon vl-stat-icon-accent"><i class="fas fa-user-plus"></i></div>
        <div class="stat-info">
            <h3><?= $totalVolunteers ?></h3>
            <p>Total Volunteers</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon vl-stat-icon-warning"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <h3><?= $pendingCount ?></h3>
            <p>Pending</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon vl-stat-icon-success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <h3><?= $approvedCount ?></h3>
            <p>Approved</p>
        </div>
    </div>
</div>

<!-- Volunteers Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-user-plus vl-header-icon"></i> Volunteer Applications</h4>
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
                <th class="vl-actions-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($volunteers)): ?>
            <tr>
                <td colspan="7" class="vl-empty-row">No volunteer applications yet.</td>
            </tr>
            <?php else: ?>
            <?php foreach ($volunteers as $i => $v): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><strong><?= htmlspecialchars($v['name']) ?></strong></td>
                <td><?= htmlspecialchars($v['email']) ?></td>
                <td><?= htmlspecialchars($v['phone'] ?? '-') ?></td>
                <td><?= date('M d, Y', strtotime($v['created_at'])) ?></td>
                <td>
                    <span
                        class="status-badge <?= $v['status'] === 'approved' ? 'status-active' : ($v['status'] === 'pending' ? 'status-pending' : 'status-new') ?>">
                        <?= ucfirst($v['status']) ?>
                    </span>
                </td>
                <td class="vl-actions-td">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="javascript:void(0)" onclick="viewVolunteer(<?= $v['id'] ?>)"><i
                                    class="fas fa-eye"></i> View</a>
                            <?php if ($v['status'] !== 'approved'): ?>
                            <form method="POST" action="/admin/volunteers" class="action-form-inline">
                                <input type="hidden" name="action" value="approve_volunteer">
                                <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                <button type="submit"><i class="fas fa-check"></i> Approve</button>
                            </form>
                            <?php endif; ?>
                            <?php if ($v['status'] !== 'rejected'): ?>
                            <form method="POST" action="/admin/volunteers" class="action-form-inline">
                                <input type="hidden" name="action" value="reject_volunteer">
                                <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                <button type="submit"><i class="fas fa-times"></i> Reject</button>
                            </form>
                            <?php endif; ?>
                            <div class="action-divider"></div>
                            <form method="POST" action="/admin/volunteers" class="action-form-inline">
                                <input type="hidden" name="action" value="delete_volunteer">
                                <input type="hidden" name="volunteer_id" value="<?= $v['id'] ?>">
                                <button type="submit" class="action-delete"
                                    onclick="return confirm('Delete this volunteer?')"><i class="fas fa-trash"></i>
                                    Delete</button>
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
<div id="viewVolunteerModal" class="qr-modal-overlay">
    <div class="qr-modal-box">
        <button onclick="document.getElementById('viewVolunteerModal').style.display='none'"
            class="qr-modal-close">&times;</button>
        <h3 class="qr-modal-title"><i class="fas fa-user-plus"></i> Volunteer Details</h3>
        <div id="viewVolunteerContent"></div>
    </div>
</div>

<?php
$volunteerDataJson = [];
foreach ($volunteers as $v) {
    $volunteerDataJson[$v['id']] = $v;
}
?>

<script>
var volunteerData = <?= json_encode($volunteerDataJson) ?>;
</script>
<script src="../admin/assets/js/volunteers.js"></script>