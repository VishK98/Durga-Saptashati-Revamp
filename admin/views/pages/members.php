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
    echo '<div class="mb-alert-success"><i class="fas fa-check-circle"></i> ' . $_SESSION['member_success'] . '</div>';
    unset($_SESSION['member_success']);
}
?>

<link rel="stylesheet" href="../admin/assets/css/queries.css">
<link rel="stylesheet" href="../admin/assets/css/members.css">

<!-- Tab Navigation -->
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
    <div class="mb-stats-grid">
        <div class="stat-card">
            <div class="stat-icon mb-stat-icon-accent"><i class="fas fa-tags"></i></div>
            <div class="stat-info">
                <h3><?= count($plans) ?></h3>
                <p>Total Plans</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon mb-stat-icon-success"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= count(array_filter($plans, fn($p) => $p['is_active'])) ?></h3>
                <p>Active Plans</p>
            </div>
        </div>
    </div>

    <!-- Plans Table -->
    <div class="data-panel">
        <div class="data-panel-header mb-panel-header">
            <h4><i class="fas fa-tags mb-header-icon"></i> Membership Plans</h4>
            <button onclick="document.getElementById('addPlanModal').style.display='flex'" class="mb-add-btn">
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
                    <th>Best Value</th>
                    <th>Active</th>
                    <th class="mb-actions-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($plans)): ?>
                <tr>
                    <td colspan="7" class="mb-empty-row">No plans configured.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($plans as $plan): ?>
                <tr>
                    <td><?= $plan['sort_order'] ?></td>
                    <td><i class="fas <?= htmlspecialchars($plan['icon']) ?>"></i>
                        <strong><?= htmlspecialchars($plan['name']) ?></strong>
                    </td>
                    <td><code><?= htmlspecialchars($plan['slug']) ?></code></td>
                    <td>&#8377;<?= number_format($plan['price'], 0) ?></td>
                    <td><?= $plan['is_best_value'] ? '<span class="mb-best-yes"><i class="fas fa-star"></i> Yes</span>' : 'No' ?>
                    </td>
                    <td>
                        <span class="status-badge <?= $plan['is_active'] ? 'status-active' : 'status-new' ?>">
                            <?= $plan['is_active'] ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>
                    <td class="mb-actions-td">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                    class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)"
                                    onclick="editPlan(<?= htmlspecialchars(json_encode($plan)) ?>)"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" class="mb-delete-link"
                                    onclick="showConfirmModal('Delete this plan?', function(){ ajaxAction('delete_membership_plan', {plan_id: <?= $plan['id'] ?>}) })"><i
                                        class="fas fa-trash"></i> Delete</a>
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
    <div class="mb-stats-grid">
        <div class="stat-card">
            <div class="stat-icon mb-stat-icon-accent"><i class="fas fa-id-card"></i></div>
            <div class="stat-info">
                <h3><?= $totalMembers ?></h3>
                <p>Total Members</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon mb-stat-icon-warning"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <h3><?= $pendingCount ?></h3>
                <p>Pending</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon mb-stat-icon-success"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= $approvedCount ?></h3>
                <p>Approved</p>
            </div>
        </div>
    </div>

    <!-- Members Table -->
    <div class="data-panel">
        <div class="data-panel-header mb-panel-header">
            <h4><i class="fas fa-users mb-header-icon"></i> Member List</h4>
            <div class="mb-btn-group">
                <button onclick="exportMembers()" class="mb-export-btn">
                    <i class="fas fa-download"></i> Export CSV
                </button>
                <button onclick="openAddMember()" class="mb-add-btn">
                    <i class="fas fa-plus"></i> Add Member
                </button>
            </div>
        </div>
        <!-- Filter Section -->
        <div class="mb-filter-bar">
            <div class="mb-filter-search">
                <i class="fas fa-search mb-filter-search-icon"></i>
                <input type="text" id="memberSearch" placeholder="Search by name, email, mobile..."
                    oninput="filterMembers()">
            </div>

            <input type="hidden" id="filterStatus" value="">
            <div class="custom-select-wrap mb-filter-dropdown mb-filter-dropdown-status" id="filterStatusWrap">
                <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                    <span id="filterStatusText" class="cs-placeholder">All Status</span>
                    <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option selected" data-value=""
                        onclick="selectMemberFilter('Status', this)">
                        <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-list"></i></span>
                        <span class="cs-opt-text">All Status</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="pending" onclick="selectMemberFilter('Status', this)">
                        <span class="cs-opt-icon" style="background:var(--warning-light);color:#d97706;"><i
                                class="fas fa-clock"></i></span>
                        <span class="cs-opt-text">Pending</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="approved"
                        onclick="selectMemberFilter('Status', this)">
                        <span class="cs-opt-icon" style="background:var(--success-light);color:#059669;"><i
                                class="fas fa-check-circle"></i></span>
                        <span class="cs-opt-text">Approved</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="rejected"
                        onclick="selectMemberFilter('Status', this)">
                        <span class="cs-opt-icon" style="background:#fef2f2;color:#ef4444;"><i
                                class="fas fa-times-circle"></i></span>
                        <span class="cs-opt-text">Rejected</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                </div>
            </div>

            <input type="hidden" id="filterType" value="">
            <div class="custom-select-wrap mb-filter-dropdown mb-filter-dropdown-plan" id="filterTypeWrap">
                <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                    <span id="filterTypeText" class="cs-placeholder">All Plans</span>
                    <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option selected" data-value="" onclick="selectMemberFilter('Type', this)">
                        <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-layer-group"></i></span>
                        <span class="cs-opt-text">All Plans</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <?php foreach ($plans as $p): ?>
                    <div class="custom-select-option" data-value="<?= htmlspecialchars($p['slug']) ?>"
                        onclick="selectMemberFilter('Type', this)">
                        <span class="cs-opt-icon" style="background:var(--accent-light);color:var(--accent);"><i
                                class="fas fa-id-card"></i></span>
                        <span class="cs-opt-text"><?= htmlspecialchars($p['name']) ?></span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <input type="hidden" id="filterPayment" value="">
            <div class="custom-select-wrap mb-filter-dropdown mb-filter-dropdown-payment" id="filterPaymentWrap">
                <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                    <span id="filterPaymentText" class="cs-placeholder">All Payments</span>
                    <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option selected" data-value=""
                        onclick="selectMemberFilter('Payment', this)">
                        <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-wallet"></i></span>
                        <span class="cs-opt-text">All Payments</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="Cash" onclick="selectMemberFilter('Payment', this)">
                        <span class="cs-opt-icon" style="background:var(--success-light);color:#059669;"><i
                                class="fas fa-money-bill-wave"></i></span>
                        <span class="cs-opt-text">Cash</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="Online" onclick="selectMemberFilter('Payment', this)">
                        <span class="cs-opt-icon" style="background:var(--info-light);color:#2563eb;"><i
                                class="fas fa-globe"></i></span>
                        <span class="cs-opt-text">Online</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                </div>
            </div>

            <button onclick="clearMemberFilters()" class="mb-filter-clear" id="memberClearBtn" title="Clear filters">
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
                    <th class="mb-actions-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($members)): ?>
                <tr>
                    <td colspan="6" class="mb-empty-row-lg">No membership applications yet.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($members as $i => $m): ?>
                <tr data-type="<?= htmlspecialchars($m['membership_type']) ?>"
                    data-payment="<?= htmlspecialchars($m['payment_mode']) ?>"
                    data-status="<?= htmlspecialchars($m['status']) ?>">
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
                    <td class="mb-actions-td">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                    class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="viewMember(<?= $m['id'] ?>)"><i
                                        class="fas fa-eye"></i> View</a>
                                <a href="javascript:void(0)" onclick="editMember(<?= $m['id'] ?>)"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <?php if ($m['status'] === 'pending'): ?>
                                <a href="javascript:void(0)" class="mb-approve-link"
                                    onclick="ajaxMemberAction('approve_member', <?= $m['id'] ?>)"><i
                                        class="fas fa-check"></i> Approve</a>
                                <a href="javascript:void(0)" class="mb-reject-link"
                                    onclick="ajaxMemberAction('reject_member', <?= $m['id'] ?>)"><i
                                        class="fas fa-times"></i> Reject</a>
                                <?php else: ?>
                                <a href="javascript:void(0)" class="mb-delete-link"
                                    onclick="showConfirmModal('Delete this member?', function(){ ajaxMemberAction('delete_member', <?= $m['id'] ?>) })"><i
                                        class="fas fa-trash"></i> Delete</a>
                                <?php endif; ?>
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
<div id="memberModal" class="mb-modal-overlay">
    <div class="mb-modal-box">
        <button onclick="document.getElementById('memberModal').style.display='none'"
            class="mb-modal-close">&times;</button>
        <h4 class="mb-modal-title"><i class="fas fa-id-card"></i> Member Details</h4>
        <div id="memberDetails"></div>
    </div>
</div>

<!-- Edit Member Modal -->
<div id="editMemberModal" class="mb-modal-overlay">
    <div class="mb-modal-box">
        <button onclick="document.getElementById('editMemberModal').style.display='none'"
            class="mb-modal-close">&times;</button>
        <h4 class="mb-modal-title"><i class="fas fa-edit"></i> Edit Member</h4>
        <form id="editMemberForm" onsubmit="return submitEditMember(event)">
            <input type="hidden" name="member_id" id="editMemberId">
            <div class="mb-form-group">
                <label class="mb-form-label">Full Name</label>
                <input type="text" name="full_name" id="editMemberName" required class="mb-form-input">
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Email</label>
                    <input type="email" name="email" id="editMemberEmail" class="mb-form-input">
                </div>
                <div>
                    <label class="mb-form-label">Mobile</label>
                    <input type="text" name="mobile" id="editMemberMobile" class="mb-form-input">
                </div>
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Gender</label>
                    <select name="gender" id="editMemberGender" class="mb-form-input">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="mb-form-label">Membership Type</label>
                    <select name="membership_type" id="editMemberType" class="mb-form-input">
                        <?php foreach ($plans as $p): ?>
                        <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['name']) ?>
                            (&#8377;<?= number_format($p['price'], 0) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Address</label>
                <textarea name="address" id="editMemberAddress" rows="2" class="mb-form-textarea"></textarea>
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Profession</label>
                <input type="text" name="profession" id="editMemberProfession" class="mb-form-input">
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Payment Mode</label>
                    <select name="payment_mode" id="editMemberPayment" class="mb-form-input">
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>
                <div>
                    <label class="mb-form-label">Status</label>
                    <select name="status" id="editMemberStatus" class="mb-form-input">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="mb-form-submit">Update Member</button>
        </form>
    </div>
</div>

<!-- Edit Plan Modal -->
<div id="editPlanModal" class="mb-modal-overlay">
    <div class="mb-modal-box-sm">
        <button onclick="document.getElementById('editPlanModal').style.display='none'"
            class="mb-modal-close">&times;</button>
        <h4 class="mb-modal-title"><i class="fas fa-edit"></i> Edit Membership Plan</h4>
        <form id="editPlanForm" onsubmit="return submitEditPlan(event)">
            <input type="hidden" name="plan_id" id="editPlanId">
            <div class="mb-form-group">
                <label class="mb-form-label">Plan Name</label>
                <input type="text" name="plan_name" id="editPlanName" required class="mb-form-input">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Price (&#8377;)</label>
                <input type="number" name="plan_price" id="editPlanPrice" step="0.01" required class="mb-form-input">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Description</label>
                <input type="text" name="plan_description" id="editPlanDesc" class="mb-form-input">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Duration Label</label>
                <input type="text" name="plan_duration_label" id="editPlanDuration" class="mb-form-input">
            </div>
            <input type="hidden" name="plan_icon" id="editPlanIcon" value="fa-id-card">
            <div class="mb-form-group">
                <label class="mb-form-label">Sort Order</label>
                <input type="number" name="plan_sort_order" id="editPlanOrder" class="mb-form-input">
            </div>
            <div class="mb-checkbox-row">
                <label><input type="checkbox" name="plan_is_best_value" id="editPlanBest" value="1"> Best Value
                    Badge</label>
                <label><input type="checkbox" name="plan_is_active" id="editPlanActive" value="1"> Active</label>
            </div>
            <button type="submit" class="mb-form-submit">Update Plan</button>
        </form>
    </div>
</div>

<!-- Add Plan Modal -->
<div id="addPlanModal" class="mb-modal-overlay">
    <div class="mb-modal-box-sm">
        <button onclick="document.getElementById('addPlanModal').style.display='none'"
            class="mb-modal-close">&times;</button>
        <h4 class="mb-modal-title"><i class="fas fa-plus"></i> Add Membership Plan</h4>
        <form id="addPlanForm" onsubmit="return submitAddPlan(event)">
            <div class="mb-form-group">
                <label class="mb-form-label">Slug (unique key)</label>
                <input type="text" name="plan_slug" required class="mb-form-input" placeholder="e.g. 5-year">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Plan Name</label>
                <input type="text" name="plan_name" required class="mb-form-input" placeholder="e.g. 5-Year Membership">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Price (&#8377;)</label>
                <input type="number" name="plan_price" step="0.01" required class="mb-form-input">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Description</label>
                <input type="text" name="plan_description" class="mb-form-input" placeholder="Short description">
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Duration Label</label>
                <input type="text" name="plan_duration_label" class="mb-form-input" placeholder="e.g. 5 Years">
            </div>
            <input type="hidden" name="plan_icon" value="fa-id-card">
            <div class="mb-form-group">
                <label class="mb-form-label">Sort Order</label>
                <input type="number" name="plan_sort_order" value="0" class="mb-form-input">
            </div>
            <div class="mb-form-group">
                <label><input type="checkbox" name="plan_is_best_value" value="1"> Best Value Badge</label>
            </div>
            <button type="submit" class="mb-form-submit">Add Plan</button>
        </form>
    </div>
</div>

<!-- Add Member Modal -->
<div id="addMemberModal" class="mb-modal-overlay">
    <div class="mb-modal-box">
        <button onclick="document.getElementById('addMemberModal').style.display='none'"
            class="mb-modal-close">&times;</button>
        <h4 class="mb-modal-title"><i class="fas fa-user-plus"></i> Add Member</h4>
        <form id="addMemberForm" onsubmit="return submitAddMember(event)">
            <div class="mb-form-group">
                <label class="mb-form-label">Full Name</label>
                <input type="text" name="full_name" id="addMemberName" required class="mb-form-input">
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Email</label>
                    <input type="email" name="email" id="addMemberEmail" class="mb-form-input">
                </div>
                <div>
                    <label class="mb-form-label">Mobile</label>
                    <input type="text" name="mobile" id="addMemberMobile" class="mb-form-input">
                </div>
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Gender</label>
                    <select name="gender" id="addMemberGender" class="mb-form-input">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="mb-form-label">Membership Type</label>
                    <select name="membership_type" id="addMemberType" required class="mb-form-input">
                        <option value="">Select Plan</option>
                        <?php foreach ($plans as $p): ?>
                        <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['name']) ?>
                            (&#8377;<?= number_format($p['price'], 0) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Address</label>
                <textarea name="address" id="addMemberAddress" rows="2" class="mb-form-textarea"></textarea>
            </div>
            <div class="mb-form-group">
                <label class="mb-form-label">Profession</label>
                <input type="text" name="profession" id="addMemberProfession" class="mb-form-input">
            </div>
            <div class="mb-form-grid">
                <div>
                    <label class="mb-form-label">Payment Mode</label>
                    <select name="payment_mode" id="addMemberPayment" class="mb-form-input">
                        <option value="Cash">Cash</option>
                        <option value="Online">Online</option>
                    </select>
                </div>
                <div>
                    <label class="mb-form-label">Status</label>
                    <select name="status" id="addMemberStatus" class="mb-form-input">
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="mb-form-submit">Add Member</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="confirmModal" class="mb-confirm-overlay">
    <div class="mb-confirm-box">
        <div class="mb-confirm-icon-wrap">
            <i class="fas fa-exclamation-triangle mb-confirm-icon"></i>
        </div>
        <h4 class="mb-confirm-title">Are you sure?</h4>
        <p id="confirmMessage" class="mb-confirm-text">This action cannot be undone.</p>
        <div class="mb-confirm-actions">
            <button onclick="closeConfirmModal()" class="mb-btn-cancel">Cancel</button>
            <button onclick="execConfirm()" class="mb-btn-delete">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
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
</script>
<script src="../admin/assets/js/members.js"></script>