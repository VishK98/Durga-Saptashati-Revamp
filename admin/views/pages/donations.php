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
                            <a href="javascript:void(0)" onclick="viewDonation(<?= $d['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- View Donation Modal -->
<div id="viewDonationModal" class="dn-modal-overlay">
    <div class="dn-modal-box">
        <button onclick="document.getElementById('viewDonationModal').style.display='none'" class="dn-modal-close">&times;</button>
        <h3 class="dn-modal-title"><i class="fas fa-donate"></i> Donation Details</h3>
        <div id="viewDonationContent"></div>
    </div>
</div>

<?php
$donationDataJson = [];
foreach ($donations as $d) {
    $donationDataJson[$d['id']] = $d;
}
?>

<link rel="stylesheet" href="../admin/assets/css/queries.css">
<script>
var donationData = <?= json_encode($donationDataJson) ?>;

function viewDonation(id) {
    var d = donationData[id];
    if (!d) return;
    var statusClass = d.status === 'completed' ? 'status-active' : (d.status === 'pending' ? 'status-pending' : 'status-new');
    var html = '<div class="qr-view-section">' +
        '<div class="qr-view-grid">' +
        '<div><small class="qr-view-label">Donor Name</small><p class="qr-view-value-bold">' + escHtml(d.name) + '</p></div>' +
        '<div><small class="qr-view-label">Email</small><p class="qr-view-value">' + escHtml(d.email || '-') + '</p></div>' +
        '<div><small class="qr-view-label">Phone</small><p class="qr-view-value">' + escHtml(d.phone || '-') + '</p></div>' +
        '<div><small class="qr-view-label">Amount</small><p class="qr-view-value-bold dn-amount">\u20B9' + Number(d.amount).toLocaleString('en-IN') + '</p></div>' +
        '</div></div>' +
        '<div class="qr-view-section">' +
        '<div class="qr-view-grid">' +
        '<div><small class="qr-view-label">Payment Method</small><p class="qr-view-value">' + escHtml(d.payment_method || '-') + '</p></div>' +
        '<div><small class="qr-view-label">Transaction ID</small><p class="qr-view-value">' + escHtml(d.transaction_id || '-') + '</p></div>' +
        '<div><small class="qr-view-label">Date</small><p class="qr-view-value">' + d.created_at + '</p></div>' +
        '<div><small class="qr-view-label">Status</small><p class="qr-view-value"><span class="status-badge ' + statusClass + '">' + d.status.charAt(0).toUpperCase() + d.status.slice(1) + '</span></p></div>' +
        '</div></div>' +
        (d.notes ? '<div><small class="qr-view-label">Notes</small><p class="qr-view-message">' + escHtml(d.notes) + '</p></div>' : '');
    document.getElementById('viewDonationContent').innerHTML = html;
    document.getElementById('viewDonationModal').style.display = 'flex';
}

function escHtml(str) {
    var div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

document.getElementById('viewDonationModal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
});
</script>
