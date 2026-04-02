<link rel="stylesheet" href="../admin/assets/css/donations.css">

<?php
$donations = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC")->fetchAll();
$totalAmount = $pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn();
$totalDonations = count($donations);
$completedCount = $pdo->query("SELECT COUNT(*) FROM donations WHERE status = 'completed'")->fetchColumn();
$pendingCount = $pdo->query("SELECT COUNT(*) FROM donations WHERE status = 'pending'")->fetchColumn();
?>

<!-- Stats Row -->
<div class="dn-stats-grid">
    <div class="stat-card">
        <div class="stat-icon dn-stat-icon-accent"><i class="fas fa-rupee-sign"></i></div>
        <div class="stat-info">
            <h3>₹<?= number_format($totalAmount, 0) ?></h3>
            <p>Total Collected</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon dn-stat-icon-success"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <h3><?= $completedCount ?></h3>
            <p>Completed</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon dn-stat-icon-warning"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <h3><?= $pendingCount ?></h3>
            <p>Pending</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon dn-stat-icon-info"><i class="fas fa-donate"></i></div>
        <div class="stat-info">
            <h3><?= $totalDonations ?></h3>
            <p>Total Donations</p>
        </div>
    </div>
</div>

<!-- Donations Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-donate dn-header-icon"></i> Donations</h4>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Donor</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th class="dn-actions-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($donations)): ?>
            <tr><td colspan="7" class="dn-empty-row">No donations yet.</td></tr>
            <?php else: ?>
            <?php foreach ($donations as $i => $d): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><strong><?= htmlspecialchars($d['name']) ?></strong></td>
                <td><?= htmlspecialchars($d['email'] ?? '-') ?></td>
                <td class="dn-amount">₹<?= number_format($d['amount'], 0) ?></td>
                <td><?= date('M d, Y', strtotime($d['created_at'])) ?></td>
                <td>
                    <span class="status-badge <?= $d['status'] === 'completed' ? 'status-active' : ($d['status'] === 'pending' ? 'status-pending' : 'status-new') ?>">
                        <?= ucfirst($d['status']) ?>
                    </span>
                </td>
                <td class="dn-actions-td">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <?php if ($d['status'] !== 'completed'): ?>
                            <form method="POST" action="admin.php?page=donations" class="action-form-inline">
                                <input type="hidden" name="action" value="complete_donation">
                                <input type="hidden" name="donation_id" value="<?= $d['id'] ?>">
                                <button type="submit"><i class="fas fa-check"></i> Mark Completed</button>
                            </form>
                            <?php endif; ?>
                            <?php if ($d['status'] !== 'failed'): ?>
                            <form method="POST" action="admin.php?page=donations" class="action-form-inline">
                                <input type="hidden" name="action" value="fail_donation">
                                <input type="hidden" name="donation_id" value="<?= $d['id'] ?>">
                                <button type="submit"><i class="fas fa-times"></i> Mark Failed</button>
                            </form>
                            <?php endif; ?>
                            <div class="action-divider"></div>
                            <form method="POST" action="admin.php?page=donations" class="action-form-inline">
                                <input type="hidden" name="action" value="delete_donation">
                                <input type="hidden" name="donation_id" value="<?= $d['id'] ?>">
                                <button type="submit" class="action-delete" onclick="return confirm('Delete this donation record?')"><i class="fas fa-trash"></i> Delete</button>
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
