<?php
try { $members = $pdo->query("SELECT * FROM members ORDER BY created_at DESC")->fetchAll(); } catch(Exception $e) { $members = []; }
$totalMembers = count($members);
try { $pendingCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'pending'")->fetchColumn(); } catch(Exception $e) { $pendingCount = 0; }
try { $approvedCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'approved'")->fetchColumn(); } catch(Exception $e) { $approvedCount = 0; }

if (isset($_SESSION['member_success'])) {
    echo '<div class="alert-success" style="padding:12px 20px;background:#ecfdf5;color:#059669;border-radius:8px;margin-bottom:20px;font-weight:600;border-left:4px solid #059669;"><i class="fas fa-check-circle"></i> ' . $_SESSION['member_success'] . '</div>';
    unset($_SESSION['member_success']);
}
?>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-id-card"></i></div>
        <div class="stat-info"><h3><?= $totalMembers ?></h3><p>Total Members</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-clock"></i></div>
        <div class="stat-info"><h3><?= $pendingCount ?></h3><p>Pending</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-check-circle"></i></div>
        <div class="stat-info"><h3><?= $approvedCount ?></h3><p>Approved</p></div>
    </div>
</div>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-id-card" style="color:var(--accent);margin-right:8px;"></i> Membership Applications</h4>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Type</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($members)): ?>
                <tr><td colspan="9" style="text-align:center;padding:40px;color:#999;">No membership applications yet.</td></tr>
            <?php else: ?>
                <?php foreach ($members as $i => $m): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($m['full_name']) ?></strong></td>
                    <td><?= htmlspecialchars($m['email'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($m['mobile'] ?? '-') ?></td>
                    <td>
                        <?php
                        $typeLabels = ['1-year' => '1 Year (₹501)', '6-year' => '6 Years (₹2,500)', 'lifetime' => 'Lifetime (₹11,000)'];
                        echo $typeLabels[$m['membership_type']] ?? $m['membership_type'];
                        ?>
                    </td>
                    <td><?= htmlspecialchars($m['payment_mode']) ?></td>
                    <td><?= date('M d, Y', strtotime($m['created_at'])) ?></td>
                    <td>
                        <span class="status-badge <?= $m['status'] === 'approved' ? 'status-active' : ($m['status'] === 'pending' ? 'status-pending' : 'status-new') ?>">
                            <?= ucfirst($m['status']) ?>
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="viewMember(<?= $m['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                                <?php if ($m['status'] !== 'approved'): ?>
                                <form method="POST" action="admin.php?page=members" style="display:contents;">
                                    <input type="hidden" name="action" value="approve_member">
                                    <input type="hidden" name="member_id" value="<?= $m['id'] ?>">
                                    <button type="submit"><i class="fas fa-check"></i> Approve</button>
                                </form>
                                <?php endif; ?>
                                <?php if ($m['status'] !== 'rejected'): ?>
                                <form method="POST" action="admin.php?page=members" style="display:contents;">
                                    <input type="hidden" name="action" value="reject_member">
                                    <input type="hidden" name="member_id" value="<?= $m['id'] ?>">
                                    <button type="submit"><i class="fas fa-times"></i> Reject</button>
                                </form>
                                <?php endif; ?>
                                <form method="POST" action="admin.php?page=members" style="display:contents;" onsubmit="return confirm('Delete this member?')">
                                    <input type="hidden" name="action" value="delete_member">
                                    <input type="hidden" name="member_id" value="<?= $m['id'] ?>">
                                    <button type="submit" style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</button>
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

<!-- View Member Modal -->
<div id="memberModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('memberModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-id-card" style="color:var(--accent);"></i> Member Details</h4>
        <div id="memberDetails"></div>
    </div>
</div>

<script>
var allMembers = <?= json_encode(array_map(function($m) {
    return [
        'id' => $m['id'], 'full_name' => $m['full_name'], 'email' => $m['email'],
        'mobile' => $m['mobile'], 'date_of_birth' => $m['date_of_birth'], 'gender' => $m['gender'],
        'address' => $m['address'], 'membership_type' => $m['membership_type'],
        'payment_mode' => $m['payment_mode'], 'payment_screenshot' => $m['payment_screenshot'],
        'status' => $m['status'], 'created_at' => $m['created_at']
    ];
}, $members)) ?>;

function viewMember(id) {
    var m = allMembers.find(function(x) { return x.id == id; });
    if (!m) return;
    var types = {'1-year':'1 Year (₹501)','6-year':'6 Years (₹2,500)','lifetime':'Lifetime (₹11,000)'};
    var html = '<table style="width:100%;border-collapse:collapse;">';
    var rows = [
        ['Name', m.full_name], ['Email', m.email || '-'], ['Mobile', m.mobile || '-'],
        ['Date of Birth', m.date_of_birth || '-'], ['Gender', m.gender || '-'],
        ['Address', m.address || '-'], ['Membership', types[m.membership_type] || m.membership_type],
        ['Payment Mode', m.payment_mode], ['Status', '<span class="status-badge '+(m.status==='approved'?'status-active':m.status==='pending'?'status-pending':'status-new')+'">'+m.status.charAt(0).toUpperCase()+m.status.slice(1)+'</span>'],
        ['Applied On', new Date(m.created_at).toLocaleDateString('en-IN',{year:'numeric',month:'long',day:'numeric'})]
    ];
    rows.forEach(function(r) { html += '<tr><td style="padding:8px 12px;font-weight:600;color:#666;width:40%;border-bottom:1px solid #f0f0f0;">'+r[0]+'</td><td style="padding:8px 12px;color:#1a1b2e;border-bottom:1px solid #f0f0f0;">'+r[1]+'</td></tr>'; });
    if (m.payment_screenshot) {
        html += '<tr><td style="padding:8px 12px;font-weight:600;color:#666;">Screenshot</td><td style="padding:8px 12px;"><img src="assets/uploads/members/'+m.payment_screenshot+'" style="max-width:200px;border-radius:8px;"></td></tr>';
    }
    html += '</table>';
    document.getElementById('memberDetails').innerHTML = html;
    document.getElementById('memberModal').style.display = 'flex';
}
document.getElementById('memberModal').addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
</script>
