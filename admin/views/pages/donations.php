<?php
$donations = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC")->fetchAll();
$totalAmount = $pdo->query("SELECT COALESCE(SUM(amount), 0) FROM donations WHERE status = 'completed'")->fetchColumn();
$totalDonations = count($donations);
$completedCount = $pdo->query("SELECT COUNT(*) FROM donations WHERE status = 'completed'")->fetchColumn();
$pendingCount = $pdo->query("SELECT COUNT(*) FROM donations WHERE status = 'pending'")->fetchColumn();
?>

<?php if (!empty($_SESSION['donation_success'])): ?>
    <div style="background:#d4edda;color:#155724;padding:12px 20px;border-radius:8px;margin-bottom:20px;display:flex;align-items:center;justify-content:space-between;">
        <span><?= htmlspecialchars($_SESSION['donation_success']) ?></span>
        <button onclick="this.parentElement.remove()" style="background:none;border:none;font-size:18px;cursor:pointer;color:#155724;">&times;</button>
    </div>
    <?php unset($_SESSION['donation_success']); ?>
<?php endif; ?>

<!-- Stats Row -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-rupee-sign"></i></div>
        <div class="stat-info">
            <h3>₹<?= number_format($totalAmount, 0) ?></h3>
            <p>Total Collected</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info">
            <h3><?= $completedCount ?></h3>
            <p>Completed</p>
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
        <div class="stat-icon" style="background:var(--info-light);color:#2563eb;"><i class="fas fa-donate"></i></div>
        <div class="stat-info">
            <h3><?= $totalDonations ?></h3>
            <p>Total Donations</p>
        </div>
    </div>
</div>

<!-- Donations Table -->
<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-donate" style="color:var(--accent);margin-right:8px;"></i> Donations</h4>
        <button class="btn-admin btn-primary" onclick="document.getElementById('addDonationModal').style.display='flex'"><i class="fas fa-plus"></i> Add Donation</button>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Donor</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Cause</th>
                <th>Method</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($donations)): ?>
                <tr><td colspan="9" style="text-align:center;padding:40px;color:#999;">No donations yet.</td></tr>
            <?php else: ?>
                <?php foreach ($donations as $i => $d): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($d['name']) ?></strong></td>
                    <td><?= htmlspecialchars($d['email'] ?? '-') ?></td>
                    <td style="font-weight:700;color:#059669;">₹<?= number_format($d['amount'], 0) ?></td>
                    <td><?= htmlspecialchars($d['cause'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($d['payment_method'] ?? '-') ?></td>
                    <td><?= date('M d, Y', strtotime($d['created_at'])) ?></td>
                    <td>
                        <span class="status-badge <?= $d['status'] === 'completed' ? 'status-active' : ($d['status'] === 'pending' ? 'status-pending' : 'status-new') ?>">
                            <?= ucfirst($d['status']) ?>
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <?php if ($d['status'] !== 'completed'): ?>
                                <form method="POST" action="admin.php?page=donations" style="display:contents;">
                                    <input type="hidden" name="action" value="complete_donation">
                                    <input type="hidden" name="donation_id" value="<?= $d['id'] ?>">
                                    <button type="submit"><i class="fas fa-check"></i> Mark Completed</button>
                                </form>
                                <?php endif; ?>
                                <?php if ($d['status'] !== 'failed'): ?>
                                <form method="POST" action="admin.php?page=donations" style="display:contents;">
                                    <input type="hidden" name="action" value="fail_donation">
                                    <input type="hidden" name="donation_id" value="<?= $d['id'] ?>">
                                    <button type="submit"><i class="fas fa-times"></i> Mark Failed</button>
                                </form>
                                <?php endif; ?>
                                <div class="action-divider"></div>
                                <form method="POST" action="admin.php?page=donations" style="display:contents;">
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

<!-- Add Donation Modal -->
<div id="addDonationModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;width:95%;max-width:600px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="document.getElementById('addDonationModal').style.display='none'" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 style="margin:0 0 25px;color:#1a1b2e;font-size:1.2rem;"><i class="fas fa-donate" style="color:var(--accent);margin-right:8px;"></i> Add Donation</h3>

        <form method="POST" action="admin.php?page=donations">
            <input type="hidden" name="action" value="add_donation">

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Donor Name *</label>
                    <input type="text" name="name" required style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="Full name">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Email</label>
                    <input type="email" name="email" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="donor@email.com">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Amount (₹) *</label>
                    <input type="number" name="amount" required min="1" step="0.01" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="500">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Phone</label>
                    <input type="text" name="phone" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="+91 XXXXXXXXXX">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Cause</label>
                    <select name="cause" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;background:#fff;">
                        <option value="">General Fund</option>
                        <option value="Women Empowerment">Women Empowerment</option>
                        <option value="Hunger Reduction">Hunger Reduction</option>
                        <option value="Education For All">Education For All</option>
                        <option value="Health">Health</option>
                        <option value="Community">Community</option>
                    </select>
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Payment Method</label>
                    <select name="payment_method" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;background:#fff;">
                        <option value="Online">Online</option>
                        <option value="UPI">UPI</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Transaction ID</label>
                    <input type="text" name="transaction_id" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;" placeholder="TXN123456">
                </div>
                <div>
                    <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Status</label>
                    <select name="status" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;background:#fff;">
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block;margin-bottom:5px;font-weight:600;font-size:0.85rem;color:#333;">Notes</label>
                <textarea name="notes" rows="3" style="width:100%;padding:10px 12px;border:1px solid #ddd;border-radius:8px;font-size:0.9rem;font-family:inherit;resize:vertical;" placeholder="Any additional notes..."></textarea>
            </div>

            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button type="button" onclick="document.getElementById('addDonationModal').style.display='none'" style="padding:10px 24px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-family:inherit;">Cancel</button>
                <button type="submit" style="padding:10px 24px;border:none;border-radius:8px;background:#f26522;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;font-family:inherit;">Save Donation</button>
            </div>
        </form>
    </div>
</div>
