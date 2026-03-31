<?php
try {
    $members = $pdo->query("SELECT * FROM members ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $members = [];
}
try {
    $plans = $pdo->query("SELECT * FROM membership_plans ORDER BY sort_order ASC")->fetchAll();
} catch (Exception $e) {
    $plans = [];
}
$totalMembers = count($members);
try {
    $pendingCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'pending'")->fetchColumn();
} catch (Exception $e) {
    $pendingCount = 0;
}
try {
    $approvedCount = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'approved'")->fetchColumn();
} catch (Exception $e) {
    $approvedCount = 0;
}

// Build plan lookup
$planMap = [];
foreach ($plans as $p) {
    $planMap[$p['slug']] = $p;
}

if (isset($_SESSION['member_success'])) {
    echo '<div class="alert-success" style="padding:12px 20px;background:#ecfdf5;color:#059669;border-radius:8px;margin-bottom:20px;font-weight:600;border-left:4px solid #059669;"><i class="fas fa-check-circle"></i> ' . $_SESSION['member_success'] . '</div>';
    unset($_SESSION['member_success']);
}
?>

<!-- Page Title -->
<h3 style="margin:0 0 10px;font-size:1.4rem;font-weight:700;color:#1a1b2e;">Membership Management</h3>

<!-- Tab Navigation -->
<style>
    .member-tabs {
        display: flex;
        gap: 6px;
        margin-bottom: 25px;
        background: #f1f5f9;
        padding: 5px;
        border-radius: 12px;
        width: fit-content;
    }

    .member-tab {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        border: none;
        border-radius: 9px;
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 600;
        font-family: inherit;
        transition: all 0.25s ease;
        background: transparent;
        color: #64748b;
    }

    .member-tab:hover {
        color: #1a1b2e;
    }

    .member-tab.active {
        background: var(--accent);
        color: #fff;
        box-shadow: 0 2px 8px rgba(242, 101, 34, 0.3);
    }

    .member-tab i {
        font-size: 0.85rem;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>

<div class="member-tabs">
    <button class="member-tab active" onclick="switchTab('membership')" id="tab-membership">
        <i class="fas fa-tags"></i> Membership Plans
    </button>
    <button class="member-tab" onclick="switchTab('members')" id="tab-members">
        <i class="fas fa-users"></i> Member List
    </button>
</div>

<!-- ========== TAB 1: Membership Plans ========== -->
<div class="tab-content active" id="content-membership">

    <!-- Stats -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i
                    class="fas fa-tags"></i></div>
            <div class="stat-info">
                <h3><?= count($plans) ?></h3>
                <p>Total Plans</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i
                    class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= count(array_filter($plans, fn($p) => $p['is_active'])) ?></h3>
                <p>Active Plans</p>
            </div>
        </div>
    </div>

    <!-- Plans Table -->
    <div class="data-panel">
        <div class="data-panel-header"
            style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
            <h4><i class="fas fa-tags" style="color:var(--accent);margin-right:8px;"></i> Membership Plans</h4>
            <button onclick="document.getElementById('addPlanModal').style.display='flex'"
                style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
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
                    <tr>
                        <td colspan="8" style="text-align:center;padding:30px;color:#999;">No plans configured.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($plans as $plan): ?>
                        <tr>
                            <td><?= $plan['sort_order'] ?></td>
                            <td><i class="fas <?= htmlspecialchars($plan['icon']) ?>"></i>
                                <strong><?= htmlspecialchars($plan['name']) ?></strong></td>
                            <td><code><?= htmlspecialchars($plan['slug']) ?></code></td>
                            <td>&#8377;<?= number_format($plan['price'], 0) ?></td>
                            <td><?= htmlspecialchars($plan['description']) ?></td>
                            <td><?= $plan['is_best_value'] ? '<span style="color:#059669;"><i class="fas fa-star"></i> Yes</span>' : 'No' ?>
                            </td>
                            <td>
                                <span class="status-badge <?= $plan['is_active'] ? 'status-active' : 'status-new' ?>">
                                    <?= $plan['is_active'] ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td style="text-align:right;">
                                <div class="action-wrap">
                                    <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                            class="fas fa-ellipsis-v"></i></button>
                                    <div class="action-menu">
                                        <a href="javascript:void(0)"
                                            onclick="editPlan(<?= htmlspecialchars(json_encode($plan)) ?>)"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="javascript:void(0)"
                                            onclick="showConfirmModal('Delete this plan?', function(){ ajaxAction('delete_membership_plan', {plan_id: <?= $plan['id'] ?>}) })"
                                            style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</a>
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

<!-- ========== TAB 2: Member List ========== -->
<div class="tab-content" id="content-members">

    <!-- Stats -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i
                    class="fas fa-id-card"></i></div>
            <div class="stat-info">
                <h3><?= $totalMembers ?></h3>
                <p>Total Members</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3><?= $pendingCount ?></h3>
                <p>Pending</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i
                    class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= $approvedCount ?></h3>
                <p>Approved</p>
            </div>
        </div>
    </div>

    <!-- Members Table -->
    <div class="data-panel">
        <div class="data-panel-header"
            style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
            <h4><i class="fas fa-users" style="color:var(--accent);margin-right:8px;"></i> Member List</h4>
            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <button onclick="exportMembers()"
                    style="background:#059669;color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
                    <i class="fas fa-download"></i> Export CSV
                </button>
                <button onclick="openAddMember()"
                    style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
                    <i class="fas fa-plus"></i> Add Member
                </button>
            </div>
        </div>
        <!-- Filter Section -->
        <div
            style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;padding:15px 20px;background:#f8fafc;border-bottom:1px solid #e2e8f0;">
            <div style="position:relative;flex:1;min-width:200px;">
                <i class="fas fa-search"
                    style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;font-size:0.85rem;"></i>
                <input type="text" id="memberSearch" placeholder="Search by name, email, mobile..."
                    oninput="filterMembers()"
                    style="width:100%;padding:9px 12px 9px 35px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;">
            </div>
            <select id="filterStatus" onchange="filterMembers()"
                style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:140px;">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
            <select id="filterType" onchange="filterMembers()"
                style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:160px;">
                <option value="">All Plans</option>
                <?php foreach ($plans as $p): ?>
                    <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <select id="filterPayment" onchange="filterMembers()"
                style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:140px;">
                <option value="">All Payments</option>
                <option value="Cash">Cash</option>
                <option value="Online">Online</option>
            </select>
            <button onclick="clearMemberFilters()"
                style="background:none;border:1px solid #ddd;padding:9px 14px;border-radius:8px;cursor:pointer;font-size:0.85rem;color:#666;"
                title="Clear filters">
                <i class="fas fa-times"></i> Clear
            </button>
        </div>
        <table class="data-table paginated-table" id="membersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Type</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($members)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center;padding:40px;color:#999;">No membership applications yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($members as $i => $m): ?>
                        <tr data-type="<?= htmlspecialchars($m['membership_type']) ?>"
                            data-payment="<?= htmlspecialchars($m['payment_mode']) ?>">
                            <td><?= $i + 1 ?></td>
                            <td><strong><?= htmlspecialchars($m['full_name']) ?></strong></td>
                            <td><?= htmlspecialchars($m['email'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($m['mobile'] ?? '-') ?></td>
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
                            <td style="text-align:right;">
                                <div class="action-wrap">
                                    <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                            class="fas fa-ellipsis-v"></i></button>
                                    <div class="action-menu">
                                        <a href="javascript:void(0)" onclick="viewMember(<?= $m['id'] ?>)"><i
                                                class="fas fa-eye"></i> View</a>
                                        <a href="javascript:void(0)" onclick="editMember(<?= $m['id'] ?>)"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <?php if ($m['status'] !== 'approved' && $m['payment_mode'] === 'Cash'): ?>
                                            <a href="javascript:void(0)"
                                                onclick="ajaxMemberAction('approve_member', <?= $m['id'] ?>)"><i
                                                    class="fas fa-check"></i> Approve</a>
                                        <?php endif; ?>
                                        <?php if ($m['status'] !== 'rejected'): ?>
                                            <a href="javascript:void(0)"
                                                onclick="ajaxMemberAction('reject_member', <?= $m['id'] ?>)"><i
                                                    class="fas fa-times"></i> Reject</a>
                                        <?php endif; ?>
                                        <a href="javascript:void(0)"
                                            onclick="showConfirmModal('Delete this member?', function(){ ajaxMemberAction('delete_member', <?= $m['id'] ?>) })"
                                            style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</a>
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

<!-- View Member Modal -->
<div id="memberModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('memberModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-id-card" style="color:var(--accent);"></i> Member
            Details</h4>
        <div id="memberDetails"></div>
    </div>
</div>

<!-- Edit Member Modal -->
<div id="editMemberModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('editMemberModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-edit" style="color:var(--accent);"></i> Edit
            Member</h4>
        <form id="editMemberForm" onsubmit="return submitEditMember(event)">
            <input type="hidden" name="member_id" id="editMemberId">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Full Name</label>
                <input type="text" name="full_name" id="editMemberName" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Email</label>
                    <input type="email" name="email" id="editMemberEmail"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Mobile</label>
                    <input type="text" name="mobile" id="editMemberMobile"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Gender</label>
                    <select name="gender" id="editMemberGender"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Membership Type</label>
                    <select name="membership_type" id="editMemberType"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <?php foreach ($plans as $p): ?>
                            <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['name']) ?>
                                (&#8377;<?= number_format($p['price'], 0) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Address</label>
                <textarea name="address" id="editMemberAddress" rows="2"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;resize:vertical;"></textarea>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Profession</label>
                <input type="text" name="profession" id="editMemberProfession"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Payment Mode</label>
                    <select name="payment_mode" id="editMemberPayment"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                    <select name="status" id="editMemberStatus"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update
                Member</button>
        </form>
    </div>
</div>

<!-- Edit Plan Modal -->
<div id="editPlanModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:500px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('editPlanModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-edit" style="color:var(--accent);"></i> Edit
            Membership Plan</h4>
        <form id="editPlanForm" onsubmit="return submitEditPlan(event)">
            <input type="hidden" name="plan_id" id="editPlanId">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Plan Name</label>
                <input type="text" name="plan_name" id="editPlanName" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Price (&#8377;)</label>
                <input type="number" name="plan_price" id="editPlanPrice" step="0.01" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <input type="text" name="plan_description" id="editPlanDesc"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Duration Label</label>
                <input type="text" name="plan_duration_label" id="editPlanDuration"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Icon (FontAwesome class)</label>
                <input type="text" name="plan_icon" id="editPlanIcon"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
                    placeholder="fa-calendar-alt">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Sort Order</label>
                <input type="number" name="plan_sort_order" id="editPlanOrder"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;display:flex;gap:20px;">
                <label><input type="checkbox" name="plan_is_best_value" id="editPlanBest" value="1"> Best Value
                    Badge</label>
                <label><input type="checkbox" name="plan_is_active" id="editPlanActive" value="1"> Active</label>
            </div>
            <button type="submit"
                style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update
                Plan</button>
        </form>
    </div>
</div>

<!-- Add Plan Modal -->
<div id="addPlanModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:500px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('addPlanModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-plus" style="color:var(--accent);"></i> Add
            Membership Plan</h4>
        <form id="addPlanForm" onsubmit="return submitAddPlan(event)">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Slug (unique key)</label>
                <input type="text" name="plan_slug" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="e.g. 5-year">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Plan Name</label>
                <input type="text" name="plan_name" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
                    placeholder="e.g. 5-Year Membership">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Price (&#8377;)</label>
                <input type="number" name="plan_price" step="0.01" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <input type="text" name="plan_description"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;"
                    placeholder="Short description">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Duration Label</label>
                <input type="text" name="plan_duration_label"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;" placeholder="e.g. 5 Years">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Icon (FontAwesome class)</label>
                <input type="text" name="plan_icon" value="fa-id-card"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Sort Order</label>
                <input type="number" name="plan_sort_order" value="0"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="margin-bottom:15px;">
                <label><input type="checkbox" name="plan_is_best_value" value="1"> Best Value Badge</label>
            </div>
            <button type="submit"
                style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Add
                Plan</button>
        </form>
    </div>
</div>

<!-- Add Member Modal -->
<div id="addMemberModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:550px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('addMemberModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-user-plus" style="color:var(--accent);"></i> Add
            Member</h4>
        <form id="addMemberForm" onsubmit="return submitAddMember(event)">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Full Name</label>
                <input type="text" name="full_name" id="addMemberName" required
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Email</label>
                    <input type="email" name="email" id="addMemberEmail"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Mobile</label>
                    <input type="text" name="mobile" id="addMemberMobile"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Gender</label>
                    <select name="gender" id="addMemberGender"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Membership Type</label>
                    <select name="membership_type" id="addMemberType" required
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="">Select Plan</option>
                        <?php foreach ($plans as $p): ?>
                            <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['name']) ?>
                                (&#8377;<?= number_format($p['price'], 0) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Address</label>
                <textarea name="address" id="addMemberAddress" rows="2"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;resize:vertical;"></textarea>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Profession</label>
                <input type="text" name="profession" id="addMemberProfession"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Payment Mode</label>
                    <select name="payment_mode" id="addMemberPayment"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                    <select name="status" id="addMemberStatus"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Add
                Member</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="confirmModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:400px;width:90%;padding:30px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div
            style="width:56px;height:56px;border-radius:50%;background:#fef2f2;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
            <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.5rem;"></i>
        </div>
        <h4 style="margin-bottom:8px;color:#1a1b2e;font-size:1.1rem;">Are you sure?</h4>
        <p id="confirmMessage" style="color:#666;font-size:0.92rem;margin-bottom:24px;">This action cannot be undone.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;">
            <button onclick="closeConfirmModal()"
                style="padding:10px 28px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;color:#666;">Cancel</button>
            <button onclick="execConfirm()"
                style="padding:10px 28px;border:none;border-radius:8px;background:#ef4444;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Yes,
                Delete</button>
        </div>
    </div>
</div>

<script>
    // === Tab Switching ===
    function switchTab(tab) {
        document.querySelectorAll('.member-tab').forEach(function (t) { t.classList.remove('active'); });
        document.querySelectorAll('.tab-content').forEach(function (c) { c.classList.remove('active'); });
        document.getElementById('tab-' + tab).classList.add('active');
        document.getElementById('content-' + tab).classList.add('active');
    }

    var allMembers = <?= json_encode(array_map(function ($m) {
        return [
            'id' => $m['id'],
            'full_name' => $m['full_name'],
            'email' => $m['email'],
            'mobile' => $m['mobile'],
            'gender' => $m['gender'],
            'address' => $m['address'],
            'membership_type' => $m['membership_type'],
            'profession' => $m['profession'] ?? '',
            'payment_mode' => $m['payment_mode'],
            'status' => $m['status'],
            'created_at' => $m['created_at']
        ];
    }, $members)) ?>;

    var planMap = <?= json_encode($planMap) ?>;

    function viewMember(id) {
        var m = allMembers.find(function (x) { return x.id == id; });
        if (!m) return;
        var typeLabel = m.membership_type;
        if (planMap[m.membership_type]) {
            var p = planMap[m.membership_type];
            typeLabel = p.name + ' (\u20B9' + Number(p.price).toLocaleString('en-IN') + ')';
        }
        var html = '<table style="width:100%;border-collapse:collapse;">';
        var rows = [
            ['Name', m.full_name], ['Email', m.email], ['Mobile', m.mobile],
            ['Gender', m.gender], ['Address', m.address], ['Profession', m.profession],
            ['Membership', typeLabel],
            ['Payment Mode', m.payment_mode && m.payment_mode !== 'N/A' ? m.payment_mode : null],
            ['Status', '<span class="status-badge ' + (m.status === 'approved' ? 'status-active' : m.status === 'pending' ? 'status-pending' : 'status-new') + '">' + m.status.charAt(0).toUpperCase() + m.status.slice(1) + '</span>'],
            ['Applied On', m.created_at && m.created_at !== '0000-00-00 00:00:00' ? new Date(m.created_at).toLocaleDateString('en-IN', { year: 'numeric', month: 'long', day: 'numeric' }) : null]
        ];
        rows.forEach(function (r) { if (r[1]) html += '<tr><td style="padding:10px 14px;font-weight:600;color:#666;width:40%;border-bottom:1px solid #f0f0f0;">' + r[0] + '</td><td style="padding:10px 14px;color:#1a1b2e;border-bottom:1px solid #f0f0f0;">' + r[1] + '</td></tr>'; });
        html += '</table>';
        document.getElementById('memberDetails').innerHTML = html;
        document.getElementById('memberModal').style.display = 'flex';
    }

    function editMember(id) {
        var m = allMembers.find(function (x) { return x.id == id; });
        if (!m) return;
        document.getElementById('editMemberId').value = m.id;
        document.getElementById('editMemberName').value = m.full_name || '';
        document.getElementById('editMemberEmail').value = m.email || '';
        document.getElementById('editMemberMobile').value = m.mobile || '';
        document.getElementById('editMemberGender').value = m.gender || '';
        document.getElementById('editMemberType').value = m.membership_type || '';
        document.getElementById('editMemberAddress').value = m.address || '';
        document.getElementById('editMemberProfession').value = m.profession || '';
        document.getElementById('editMemberPayment').value = m.payment_mode || 'Cash';
        document.getElementById('editMemberStatus').value = m.status || 'pending';
        document.getElementById('editMemberModal').style.display = 'flex';
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
        var headers = ['Full Name', 'Gender', 'Address', 'Email', 'Mobile', 'Membership Type', 'Profession', 'Payment Mode', 'Status', 'Created At'];
        var rows = [headers.join(',')];
        allMembers.forEach(function (m) {
            rows.push(['"' + (m.full_name || '') + '"', m.gender || '', '"' + (m.address || '').replace(/"/g, '""') + '"', m.email || '', m.mobile || '', '"' + (m.membership_type || '') + '"', '"' + (m.profession || '') + '"', m.payment_mode || '', m.status || '', m.created_at || ''].join(','));
        });
        var blob = new Blob([rows.join('\n')], { type: 'text/csv' });
        var a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'members_export_' + new Date().toISOString().slice(0, 10) + '.csv';
        a.click();
    }

    function filterMembers() {
        var search = document.getElementById('memberSearch').value.toLowerCase();
        var status = document.getElementById('filterStatus').value;
        var type = document.getElementById('filterType').value;
        var payment = document.getElementById('filterPayment').value;
        var tbody = document.getElementById('membersTable').querySelector('tbody');
        var rows = tbody.querySelectorAll('tr');
        var count = 0;
        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            if (cells.length <= 1) return;
            var name = (cells[1] ? cells[1].textContent : '').toLowerCase();
            var email = (cells[2] ? cells[2].textContent : '').toLowerCase();
            var mobile = (cells[3] ? cells[3].textContent : '').toLowerCase();
            var rowType = row.getAttribute('data-type') || '';
            var rowPayment = row.getAttribute('data-payment') || '';
            var matchSearch = !search || name.indexOf(search) > -1 || email.indexOf(search) > -1 || mobile.indexOf(search) > -1;
            var matchStatus = !status;
            var matchType = !type || rowType === type;
            var matchPayment = !payment || rowPayment === payment;
            if (matchSearch && matchStatus && matchType && matchPayment) {
                row.style.display = '';
                count++;
                cells[0].textContent = count;
            } else {
                row.style.display = 'none';
            }
        });
    }

    function clearMemberFilters() {
        document.getElementById('memberSearch').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterType').value = '';
        document.getElementById('filterPayment').value = '';
        filterMembers();
    }

    function submitAddPlan(e) {
        e.preventDefault();
        var form = document.getElementById('addPlanForm');
        var data = {
            plan_slug: form.querySelector('[name="plan_slug"]').value,
            plan_name: form.querySelector('[name="plan_name"]').value,
            plan_price: form.querySelector('[name="plan_price"]').value,
            plan_description: form.querySelector('[name="plan_description"]').value,
            plan_duration_label: form.querySelector('[name="plan_duration_label"]').value,
            plan_icon: form.querySelector('[name="plan_icon"]').value,
            plan_sort_order: form.querySelector('[name="plan_sort_order"]').value,
            plan_is_best_value: form.querySelector('[name="plan_is_best_value"]').checked ? '1' : '0'
        };
        ajaxAction('add_membership_plan', data, function () {
            document.getElementById('addPlanModal').style.display = 'none';
            setTimeout(function () { location.reload(); }, 800);
        });
        return false;
    }

    function submitEditPlan(e) {
        e.preventDefault();
        var form = document.getElementById('editPlanForm');
        var data = {
            plan_id: form.querySelector('#editPlanId').value,
            plan_name: form.querySelector('#editPlanName').value,
            plan_price: form.querySelector('#editPlanPrice').value,
            plan_description: form.querySelector('#editPlanDesc').value,
            plan_duration_label: form.querySelector('#editPlanDuration').value,
            plan_icon: form.querySelector('#editPlanIcon').value,
            plan_sort_order: form.querySelector('#editPlanOrder').value,
            plan_is_best_value: form.querySelector('#editPlanBest').checked ? '1' : '0',
            plan_is_active: form.querySelector('#editPlanActive').checked ? '1' : '0'
        };
        ajaxAction('update_membership_plan', data, function () {
            document.getElementById('editPlanModal').style.display = 'none';
            setTimeout(function () { location.reload(); }, 800);
        });
        return false;
    }

    function openAddMember() {
        document.getElementById('addMemberForm').reset();
        document.getElementById('addMemberModal').style.display = 'flex';
    }

    function submitAddMember(e) {
        e.preventDefault();
        var form = document.getElementById('addMemberForm');
        var data = {
            full_name: form.querySelector('#addMemberName').value,
            email: form.querySelector('#addMemberEmail').value,
            mobile: form.querySelector('#addMemberMobile').value,
            gender: form.querySelector('#addMemberGender').value,
            membership_type: form.querySelector('#addMemberType').value,
            address: form.querySelector('#addMemberAddress').value,
            profession: form.querySelector('#addMemberProfession').value,
            payment_mode: form.querySelector('#addMemberPayment').value,
            status: form.querySelector('#addMemberStatus').value
        };
        ajaxAction('add_member', data, function () {
            document.getElementById('addMemberModal').style.display = 'none';
            setTimeout(function () { location.reload(); }, 800);
        });
        return false;
    }

    // === AJAX helpers ===
    function ajaxAction(action, data, callback) {
        var fd = new FormData();
        fd.append('action', action);
        for (var key in data) fd.append(key, data[key]);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'admin.php?page=members');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onload = function () {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    showToast(res.message, 'success');
                    if (callback) callback(res);
                    else setTimeout(function () { location.reload(); }, 800);
                } else {
                    showToast(res.message || 'Something went wrong.', 'error');
                }
            } catch (e) { showToast('Server error.', 'error'); }
        };
        xhr.onerror = function () { showToast('Network error.', 'error'); };
        xhr.send(fd);
    }

    function ajaxMemberAction(action, memberId) {
        ajaxAction(action, { member_id: memberId });
    }

    function submitEditMember(e) {
        e.preventDefault();
        var form = document.getElementById('editMemberForm');
        var data = {
            member_id: form.querySelector('#editMemberId').value,
            full_name: form.querySelector('#editMemberName').value,
            email: form.querySelector('#editMemberEmail').value,
            mobile: form.querySelector('#editMemberMobile').value,
            gender: form.querySelector('#editMemberGender').value,
            membership_type: form.querySelector('#editMemberType').value,
            address: form.querySelector('#editMemberAddress').value,
            profession: form.querySelector('#editMemberProfession').value,
            payment_mode: form.querySelector('#editMemberPayment').value,
            status: form.querySelector('#editMemberStatus').value
        };
        ajaxAction('update_member', data, function () {
            document.getElementById('editMemberModal').style.display = 'none';
            setTimeout(function () { location.reload(); }, 800);
        });
        return false;
    }

    // === Custom Confirm Modal ===
    var _confirmCallback = null;
    function showConfirmModal(message, onConfirm) {
        _confirmCallback = onConfirm;
        document.getElementById('confirmMessage').textContent = message;
        document.getElementById('confirmModal').style.display = 'flex';
    }
    function closeConfirmModal() {
        document.getElementById('confirmModal').style.display = 'none';
        _confirmCallback = null;
    }
    function execConfirm() {
        document.getElementById('confirmModal').style.display = 'none';
        if (_confirmCallback) _confirmCallback();
        _confirmCallback = null;
    }

    // Close modals on backdrop click
    ['memberModal', 'editMemberModal', 'editPlanModal', 'addPlanModal', 'addMemberModal', 'confirmModal'].forEach(function (id) {
        var el = document.getElementById(id);
        if (el) el.addEventListener('click', function (e) { if (e.target === this) this.style.display = 'none'; });
    });
</script>