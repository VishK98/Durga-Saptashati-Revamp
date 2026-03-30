<?php
try { $members = $pdo->query("SELECT * FROM members ORDER BY created_at DESC")->fetchAll(); } catch(Exception $e) { $members = []; }
try { $plans = $pdo->query("SELECT * FROM membership_plans ORDER BY sort_order ASC")->fetchAll(); } catch(Exception $e) { $plans = []; }
$totalMembers = count($members);
try { $pendingCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'pending'")->fetchColumn(); } catch(Exception $e) { $pendingCount = 0; }
try { $approvedCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'approved'")->fetchColumn(); } catch(Exception $e) { $approvedCount = 0; }

// Build plan lookup
$planMap = [];
foreach ($plans as $p) { $planMap[$p['slug']] = $p; }

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

<!-- Membership Plans Management -->
<div class="data-panel" style="margin-bottom:25px;">
    <div class="data-panel-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <h4><i class="fas fa-tags" style="color:var(--accent);margin-right:8px;"></i> Membership Plans</h4>
        <button onclick="document.getElementById('addPlanModal').style.display='flex'" style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
            <i class="fas fa-plus"></i> Add Plan
        </button>
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Price</th>
                <th>Description</th>
                <th>Best Value</th>
                <th>Active</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($plans)): ?>
                <tr><td colspan="8" style="text-align:center;padding:30px;color:#999;">No plans configured.</td></tr>
            <?php else: ?>
                <?php foreach ($plans as $plan): ?>
                <tr>
                    <td><?= $plan['sort_order'] ?></td>
                    <td><i class="fas <?= htmlspecialchars($plan['icon']) ?>"></i> <strong><?= htmlspecialchars($plan['name']) ?></strong></td>
                    <td><code><?= htmlspecialchars($plan['slug']) ?></code></td>
                    <td>&#8377;<?= number_format($plan['price'], 0) ?></td>
                    <td><?= htmlspecialchars($plan['description']) ?></td>
                    <td><?= $plan['is_best_value'] ? '<span style="color:#059669;"><i class="fas fa-star"></i> Yes</span>' : 'No' ?></td>
                    <td>
                        <span class="status-badge <?= $plan['is_active'] ? 'status-active' : 'status-new' ?>">
                            <?= $plan['is_active'] ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="editPlan(<?= htmlspecialchars(json_encode($plan)) ?>)"><i class="fas fa-edit"></i> Edit</a>
                                <form method="POST" action="admin.php?page=members" style="display:contents;" onsubmit="return confirm('Delete this plan?')">
                                    <input type="hidden" name="action" value="delete_membership_plan">
                                    <input type="hidden" name="plan_id" value="<?= $plan['id'] ?>">
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

<!-- Members Table with Import -->
<div class="data-panel">
    <div class="data-panel-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
        <h4><i class="fas fa-id-card" style="color:var(--accent);margin-right:8px;"></i> Membership Applications</h4>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <button onclick="exportMembers()" style="background:#059669;color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
                <i class="fas fa-download"></i> Export CSV
            </button>
            <button onclick="document.getElementById('importModal').style.display='flex'" style="background:#2563eb;color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
                <i class="fas fa-upload"></i> Import CSV
            </button>
        </div>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Profession</th>
                <th>Type</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($members)): ?>
                <tr><td colspan="10" style="text-align:center;padding:40px;color:#999;">No membership applications yet.</td></tr>
            <?php else: ?>
                <?php foreach ($members as $i => $m): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($m['full_name']) ?></strong></td>
                    <td><?= htmlspecialchars($m['email'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($m['mobile'] ?? '-') ?></td>
                    <td><?= htmlspecialchars($m['profession'] ?? '-') ?></td>
                    <td>
                        <?php
                        if (isset($planMap[$m['membership_type']])) {
                            $p = $planMap[$m['membership_type']];
                            echo htmlspecialchars($p['name']) . ' (&#8377;' . number_format($p['price'], 0) . ')';
                        } else {
                            echo htmlspecialchars($m['membership_type']);
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($m['payment_mode'] === 'Online'): ?>
                        <span style="background:#dbeafe;color:#2563eb;padding:3px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><i class="fas fa-globe"></i> Online</span>
                        <?php elseif ($m['payment_mode'] === 'Cash'): ?>
                        <span style="background:#fef3c7;color:#d97706;padding:3px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><i class="fas fa-money-bill-wave"></i> Cash</span>
                        <?php else: ?>
                        <?= htmlspecialchars($m['payment_mode']) ?>
                        <?php endif; ?>
                    </td>
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
                                <?php if ($m['status'] !== 'approved' && $m['payment_mode'] === 'Cash'): ?>
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

<!-- Edit Plan Modal -->
<div id="editPlanModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:500px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('editPlanModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-edit" style="color:var(--accent);"></i> Edit Membership Plan</h4>
        <form method="POST" action="admin.php?page=members">
            <input type="hidden" name="action" value="update_membership_plan">
            <input type="hidden" name="plan_id" id="editPlanId">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Plan Name</label>
                <input type="text" name="plan_name" id="editPlanName" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Price (&#8377;)</label>
                <input type="number" name="plan_price" id="editPlanPrice" step="0.01" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <input type="text" name="plan_description" id="editPlanDesc" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Duration Label</label>
                <input type="text" name="plan_duration_label" id="editPlanDuration" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Icon (FontAwesome class)</label>
                <input type="text" name="plan_icon" id="editPlanIcon" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="fa-calendar-alt">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Sort Order</label>
                <input type="number" name="plan_sort_order" id="editPlanOrder" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;display:flex;gap:20px;">
                <label><input type="checkbox" name="plan_is_best_value" id="editPlanBest" value="1"> Best Value Badge</label>
                <label><input type="checkbox" name="plan_is_active" id="editPlanActive" value="1"> Active</label>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update Plan</button>
        </form>
    </div>
</div>

<!-- Add Plan Modal -->
<div id="addPlanModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:500px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('addPlanModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-plus" style="color:var(--accent);"></i> Add Membership Plan</h4>
        <form method="POST" action="admin.php?page=members">
            <input type="hidden" name="action" value="add_membership_plan">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Slug (unique key)</label>
                <input type="text" name="plan_slug" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="e.g. 5-year">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Plan Name</label>
                <input type="text" name="plan_name" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="e.g. 5-Year Membership">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Price (&#8377;)</label>
                <input type="number" name="plan_price" step="0.01" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <input type="text" name="plan_description" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="Short description">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Duration Label</label>
                <input type="text" name="plan_duration_label" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="e.g. 5 Years">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Icon (FontAwesome class)</label>
                <input type="text" name="plan_icon" value="fa-id-card" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Sort Order</label>
                <input type="number" name="plan_sort_order" value="0" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label><input type="checkbox" name="plan_is_best_value" value="1"> Best Value Badge</label>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Add Plan</button>
        </form>
    </div>
</div>

<!-- Import Modal -->
<div id="importModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('importModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:10px;color:#1a1b2e;"><i class="fas fa-upload" style="color:#2563eb;"></i> Import Members from CSV</h4>
        <p style="color:#666;font-size:0.9rem;margin-bottom:15px;">Upload a CSV file with the following columns in order:</p>
        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:12px;margin-bottom:20px;font-size:0.85rem;font-family:monospace;">
            full_name, gender, address, email, mobile, membership_type, profession, payment_mode, status, created_at
        </div>
        <p style="color:#666;font-size:0.85rem;margin-bottom:15px;">
            <strong>Notes:</strong><br>
            - First row should be the header (it will be skipped)<br>
            - <code>membership_type</code> should be a plan slug (e.g. <code>1-year</code>, <code>lifetime</code>)<br>
            - <code>status</code>: pending, approved, or rejected<br>
            - <code>date_of_birth</code> format: YYYY-MM-DD<br>
            - Empty <code>created_at</code> defaults to now
        </p>
        <form method="POST" action="admin.php?page=members" enctype="multipart/form-data">
            <input type="hidden" name="action" value="import_members">
            <div style="margin-bottom:15px;">
                <input type="file" name="csv_file" accept=".csv" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <button type="submit" style="background:#2563eb;color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">
                <i class="fas fa-upload"></i> Import
            </button>
        </form>
    </div>
</div>

<script>
var allMembers = <?= json_encode(array_map(function($m) {
    return [
        'id' => $m['id'], 'full_name' => $m['full_name'], 'email' => $m['email'],
        'mobile' => $m['mobile'], 'gender' => $m['gender'],
        'address' => $m['address'], 'membership_type' => $m['membership_type'],
        'profession' => $m['profession'] ?? '', 'payment_mode' => $m['payment_mode'],
        'status' => $m['status'], 'created_at' => $m['created_at']
    ];
}, $members)) ?>;

var planMap = <?= json_encode($planMap) ?>;

function viewMember(id) {
    var m = allMembers.find(function(x) { return x.id == id; });
    if (!m) return;
    var typeLabel = m.membership_type;
    if (planMap[m.membership_type]) {
        var p = planMap[m.membership_type];
        typeLabel = p.name + ' (\u20B9' + Number(p.price).toLocaleString('en-IN') + ')';
    }
    var html = '<table style="width:100%;border-collapse:collapse;">';
    var rows = [
        ['Name', m.full_name],
        ['Email', m.email],
        ['Mobile', m.mobile],
        ['Gender', m.gender],
        ['Address', m.address],
        ['Profession', m.profession],
        ['Membership', typeLabel],
        ['Payment Mode', m.payment_mode && m.payment_mode !== 'N/A' ? m.payment_mode : null],
        ['Status', '<span class="status-badge '+(m.status==='approved'?'status-active':m.status==='pending'?'status-pending':'status-new')+'">'+m.status.charAt(0).toUpperCase()+m.status.slice(1)+'</span>'],
        ['Applied On', m.created_at && m.created_at !== '0000-00-00 00:00:00' ? new Date(m.created_at).toLocaleDateString('en-IN',{year:'numeric',month:'long',day:'numeric'}) : null]
    ];
    rows.forEach(function(r) { if (r[1]) html += '<tr><td style="padding:10px 14px;font-weight:600;color:#666;width:40%;border-bottom:1px solid #f0f0f0;">'+r[0]+'</td><td style="padding:10px 14px;color:#1a1b2e;border-bottom:1px solid #f0f0f0;">'+r[1]+'</td></tr>'; });
    html += '</table>';
    document.getElementById('memberDetails').innerHTML = html;
    document.getElementById('memberModal').style.display = 'flex';
}

function editPlan(plan) {
    document.getElementById('editPlanId').value = plan.id;
    document.getElementById('editPlanName').value = plan.name;
    document.getElementById('editPlanPrice').value = plan.price;
    document.getElementById('editPlanDesc').value = plan.description;
    document.getElementById('editPlanDuration').value = plan.duration_label;
    document.getElementById('editPlanIcon').value = plan.icon;
    document.getElementById('editPlanOrder').value = plan.sort_order;
    document.getElementById('editPlanBest').checked = plan.is_best_value == 1;
    document.getElementById('editPlanActive').checked = plan.is_active == 1;
    document.getElementById('editPlanModal').style.display = 'flex';
}

function exportMembers() {
    var headers = ['Full Name','Gender','Address','Email','Mobile','Membership Type','Profession','Payment Mode','Status','Created At'];
    var rows = [headers.join(',')];
    allMembers.forEach(function(m) {
        rows.push([
            '"'+(m.full_name||'')+'"', m.gender||'',
            '"'+(m.address||'').replace(/"/g,'""')+'"', m.email||'', m.mobile||'',
            '"'+(m.membership_type||'')+'"', '"'+(m.profession||'')+'"', m.payment_mode||'', m.status||'', m.created_at||''
        ].join(','));
    });
    var blob = new Blob([rows.join('\n')], {type:'text/csv'});
    var a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'members_export_' + new Date().toISOString().slice(0,10) + '.csv';
    a.click();
}

// Close modals on backdrop click
['memberModal','editPlanModal','addPlanModal','importModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
</script>
