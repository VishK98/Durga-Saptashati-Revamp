<link rel="stylesheet" href="../admin/assets/css/careers.css">

<?php
$careers = $pdo->query("SELECT * FROM careers ORDER BY created_at DESC")->fetchAll();
$applications = $pdo->query("SELECT a.*, c.title as job_title FROM career_applications a LEFT JOIN careers c ON a.career_id = c.id ORDER BY a.created_at DESC")->fetchAll();
$newApps = $pdo->query("SELECT COUNT(*) FROM career_applications WHERE status = 'new'")->fetchColumn();
$activeJobs = count(array_filter($careers, fn($c) => $c['status'] === 'active'));
$shortlisted = count(array_filter($applications, fn($a) => $a['status'] === 'shortlisted'));
?>

<div class="career-tabs">
    <button class="cr-tab active" onclick="switchCareerTab('openings')" id="crtab-openings">
        <i class="fas fa-briefcase"></i> Job Openings
    </button>
    <button class="cr-tab" onclick="switchCareerTab('applications')" id="crtab-applications">
        <i class="fas fa-file-alt"></i> Applications
        <?php if ($newApps > 0): ?><span class="tab-badge"><?= $newApps ?> new</span><?php endif; ?>
    </button>
</div>

<!-- ========== TAB 1: Job Openings ========== -->
<div class="cr-content active" id="crcontent-openings">

    <div class="cr-stats-grid">
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-accent"><i class="fas fa-briefcase"></i></div>
            <div class="stat-info">
                <h3><?= count($careers) ?></h3>
                <p>Total Openings</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-success"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= $activeJobs ?></h3>
                <p>Active</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-warning"><i class="fas fa-pause-circle"></i></div>
            <div class="stat-info">
                <h3><?= count($careers) - $activeJobs ?></h3>
                <p>Closed</p>
            </div>
        </div>
    </div>

    <div class="data-panel">
        <div class="data-panel-header">
            <h4><i class="fas fa-briefcase cr-header-icon"></i> Job Openings</h4>
            <button onclick="document.getElementById('addJobModal').style.display='flex'" class="cr-add-btn">
                <i class="fas fa-plus"></i> Add Opening
            </button>
        </div>
        <table class="data-table paginated-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th class="cr-actions-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($careers)): ?>
                <tr>
                    <td colspan="7" class="cr-empty-row">No job openings. Click "Add Opening" to create one.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($careers as $i => $c): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($c['title']) ?></strong></td>
                    <td><?= htmlspecialchars($c['department'] ?? '-') ?></td>
                    <td><span class="cr-type-badge"><?= ucfirst(str_replace('-', ' ', $c['type'])) ?></span></td>
                    <td><?= htmlspecialchars($c['location'] ?? '-') ?></td>
                    <td><span
                            class="status-badge <?= $c['status'] === 'active' ? 'status-active' : 'status-new' ?>"><?= ucfirst($c['status']) ?></span>
                    </td>
                    <td class="cr-actions-td">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                    class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)"
                                    onclick="viewJob(<?= htmlspecialchars(json_encode($c)) ?>)"><i
                                        class="fas fa-eye"></i> View</a>
                                <a href="javascript:void(0)"
                                    onclick="editJob(<?= htmlspecialchars(json_encode($c)) ?>)"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)"
                                    onclick="ajaxCareerAction('toggle_career', {career_id: <?= $c['id'] ?>})"><i
                                        class="fas fa-toggle-on"></i>
                                    <?= $c['status'] === 'active' ? 'Close' : 'Activate' ?></a>
                                <a href="javascript:void(0)" class="cr-delete-link"
                                    onclick="showCareerConfirm('Delete this opening?', function(){ ajaxCareerAction('delete_career', {career_id: <?= $c['id'] ?>}) })"><i
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

<!-- ========== TAB 2: Applications ========== -->
<div class="cr-content" id="crcontent-applications">

    <div class="cr-stats-grid">
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-accent"><i class="fas fa-file-alt"></i></div>
            <div class="stat-info">
                <h3><?= count($applications) ?></h3>
                <p>Total Applications</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-blue"><i class="fas fa-envelope"></i></div>
            <div class="stat-info">
                <h3><?= $newApps ?></h3>
                <p>New</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon cr-stat-icon-success"><i class="fas fa-star"></i></div>
            <div class="stat-info">
                <h3><?= $shortlisted ?></h3>
                <p>Shortlisted</p>
            </div>
        </div>
    </div>

    <div class="data-panel">
        <div class="data-panel-header">
            <h4><i class="fas fa-file-alt cr-header-icon"></i> Applications</h4>
        </div>
        <div class="cr-filter-bar">
            <div class="cr-filter-search">
                <i class="fas fa-search cr-filter-search-icon"></i>
                <input type="text" id="appSearch" placeholder="Search by name, email, position..."
                    oninput="filterApps()">
            </div>
            <input type="hidden" id="filterAppStatus" value="">
            <div class="custom-select-wrap cr-filter-dropdown" id="filterAppStatusWrap">
                <div class="custom-select-trigger" onclick="this.parentElement.classList.toggle('open')">
                    <span id="filterAppStatusText" class="cs-placeholder">All Status</span>
                    <span class="cs-icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option selected" data-value="" onclick="selectAppFilter(this)">
                        <span class="cs-opt-icon cs-opt-icon-all"><i class="fas fa-list"></i></span>
                        <span class="cs-opt-text">All Status</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="new" onclick="selectAppFilter(this)">
                        <span class="cs-opt-icon" style="background:var(--info-light);color:#2563eb;"><i
                                class="fas fa-envelope"></i></span>
                        <span class="cs-opt-text">New</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="reviewed" onclick="selectAppFilter(this)">
                        <span class="cs-opt-icon" style="background:var(--warning-light);color:#d97706;"><i
                                class="fas fa-eye"></i></span>
                        <span class="cs-opt-text">Reviewed</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="shortlisted" onclick="selectAppFilter(this)">
                        <span class="cs-opt-icon" style="background:var(--success-light);color:#059669;"><i
                                class="fas fa-star"></i></span>
                        <span class="cs-opt-text">Shortlisted</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                    <div class="custom-select-option" data-value="rejected" onclick="selectAppFilter(this)">
                        <span class="cs-opt-icon" style="background:#fef2f2;color:#ef4444;"><i
                                class="fas fa-times-circle"></i></span>
                        <span class="cs-opt-text">Rejected</span>
                        <i class="fas fa-check cs-opt-check"></i>
                    </div>
                </div>
            </div>
            <button onclick="clearAppFilters()" class="cr-filter-clear" id="appClearBtn">
                <i class="fas fa-times"></i> Clear
            </button>
        </div>
        <table class="data-table paginated-table" id="appsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th class="cr-actions-th">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($applications)): ?>
                <tr>
                    <td colspan="6" class="cr-empty-row">No applications received yet.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($applications as $i => $a): ?>
                <tr data-status="<?= $a['status'] ?>">
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($a['name']) ?></strong></td>
                    <td><?= htmlspecialchars($a['email']) ?></td>
                    <td><?= htmlspecialchars($a['job_title'] ?? 'General') ?></td>
                    <td>
                        <span
                            class="status-badge <?= $a['status'] === 'new' ? 'status-new' : ($a['status'] === 'shortlisted' ? 'status-active' : ($a['status'] === 'reviewed' ? 'status-pending' : 'status-new')) ?>">
                            <?= ucfirst($a['status']) ?>
                        </span>
                    </td>
                    <td class="cr-actions-td">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                    class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="viewApplication(<?= $a['id'] ?>)"><i
                                        class="fas fa-eye"></i> View</a>
                                <a href="javascript:void(0)" onclick="editApplication(<?= $a['id'] ?>)"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <div class="action-divider"></div>
                                <a href="javascript:void(0)" class="cr-delete-link"
                                    onclick="showCareerConfirm('Delete this application?', function(){ ajaxCareerAction('delete_application', {app_id: <?= $a['id'] ?>}) })"><i
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

<!-- Add Job Modal -->
<div id="addJobModal" class="cr-modal-overlay">
    <div class="cr-modal-box">
        <button onclick="document.getElementById('addJobModal').style.display='none'"
            class="cr-modal-close">&times;</button>
        <h4 class="cr-modal-title"><i class="fas fa-briefcase"></i> Add Job Opening</h4>
        <form method="POST" action="admin/careers">
            <input type="hidden" name="action" value="create_career">
            <div class="cr-form-group">
                <label class="cr-form-label">Job Title <span class="cr-form-required">*</span></label>
                <input type="text" name="title" required placeholder="e.g. Program Coordinator" class="cr-form-input">
            </div>
            <div class="cr-form-grid">
                <div>
                    <label class="cr-form-label">Department</label>
                    <input type="text" name="department" placeholder="e.g. Education" class="cr-form-input">
                </div>
                <div>
                    <label class="cr-form-label">Location</label>
                    <input type="text" name="location" value="Dwarka, New Delhi" class="cr-form-input">
                </div>
            </div>
            <div class="cr-form-group">
                <label class="cr-form-label">Type</label>
                <select name="type" class="cr-form-input">
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="internship">Internship</option>
                    <option value="volunteer">Volunteer</option>
                </select>
            </div>
            <div class="cr-form-group">
                <label class="cr-form-label">Description</label>
                <textarea name="description" rows="4" placeholder="Job description..."
                    class="cr-form-textarea"></textarea>
            </div>
            <div class="cr-form-group-last">
                <label class="cr-form-label">Requirements</label>
                <textarea name="requirements" rows="3" placeholder="Required skills and qualifications..."
                    class="cr-form-textarea"></textarea>
            </div>
            <button type="submit" class="cr-form-submit">Create Opening</button>
        </form>
    </div>
</div>

<!-- View Job Modal -->
<div id="viewJobModal" class="cr-modal-overlay">
    <div class="cr-modal-box">
        <button onclick="document.getElementById('viewJobModal').style.display='none'"
            class="cr-modal-close">&times;</button>
        <h4 class="cr-modal-title"><i class="fas fa-briefcase"></i> Job Details</h4>
        <div id="viewJobDetails"></div>
    </div>
</div>

<!-- Edit Job Modal -->
<div id="editJobModal" class="cr-modal-overlay">
    <div class="cr-modal-box">
        <button onclick="document.getElementById('editJobModal').style.display='none'"
            class="cr-modal-close">&times;</button>
        <h4 class="cr-modal-title"><i class="fas fa-edit"></i> Edit Job Opening</h4>
        <form id="editJobForm" onsubmit="return submitEditJob(event)">
            <input type="hidden" id="editJobId">
            <div class="cr-form-group">
                <label class="cr-form-label">Job Title <span class="cr-form-required">*</span></label>
                <input type="text" id="editJobTitle" required class="cr-form-input">
            </div>
            <div class="cr-form-grid">
                <div>
                    <label class="cr-form-label">Department</label>
                    <input type="text" id="editJobDept" class="cr-form-input">
                </div>
                <div>
                    <label class="cr-form-label">Location</label>
                    <input type="text" id="editJobLocation" class="cr-form-input">
                </div>
            </div>
            <div class="cr-form-grid">
                <div>
                    <label class="cr-form-label">Type</label>
                    <select id="editJobType" class="cr-form-input">
                        <option value="full-time">Full Time</option>
                        <option value="part-time">Part Time</option>
                        <option value="internship">Internship</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                </div>
                <div>
                    <label class="cr-form-label">Status</label>
                    <select id="editJobStatus" class="cr-form-input">
                        <option value="active">Active</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
            </div>
            <div class="cr-form-group">
                <label class="cr-form-label">Description</label>
                <textarea id="editJobDesc" rows="4" class="cr-form-textarea"></textarea>
            </div>
            <div class="cr-form-group-last">
                <label class="cr-form-label">Requirements</label>
                <textarea id="editJobReq" rows="3" class="cr-form-textarea"></textarea>
            </div>
            <button type="submit" class="cr-form-submit">Update Opening</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="careerConfirmModal" class="cr-modal-overlay cr-modal-overlay-confirm">
    <div class="cr-modal-box cr-modal-confirm-box">
        <div class="cr-confirm-icon-wrap">
            <i class="fas fa-exclamation-triangle cr-confirm-icon"></i>
        </div>
        <h4 class="cr-confirm-title">Are you sure?</h4>
        <p id="careerConfirmMsg" class="cr-confirm-text">This action cannot be undone.</p>
        <div class="cr-confirm-actions">
            <button onclick="document.getElementById('careerConfirmModal').style.display='none'"
                class="cr-btn-cancel">Cancel</button>
            <button id="careerConfirmBtn" class="cr-btn-delete">Yes, Delete</button>
        </div>
    </div>
</div>

<!-- View Application Modal -->
<div id="viewAppModal" class="cr-modal-overlay">
    <div class="cr-modal-box">
        <button onclick="document.getElementById('viewAppModal').style.display='none'"
            class="cr-modal-close">&times;</button>
        <h4 class="cr-modal-title"><i class="fas fa-file-alt"></i> Application Details</h4>
        <div id="viewAppContent"></div>
    </div>
</div>

<!-- Edit Application Modal -->
<div id="editAppModal" class="cr-modal-overlay">
    <div class="cr-modal-box">
        <button onclick="document.getElementById('editAppModal').style.display='none'"
            class="cr-modal-close">&times;</button>
        <h4 class="cr-modal-title"><i class="fas fa-edit"></i> Edit Application</h4>
        <form id="editAppForm" onsubmit="return submitEditApp(event)">
            <input type="hidden" id="editAppId">
            <div class="cr-form-group">
                <label class="cr-form-label">Status</label>
                <select id="editAppStatus" class="cr-form-input">
                    <option value="new">New</option>
                    <option value="reviewed">Reviewed</option>
                    <option value="shortlisted">Shortlisted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <button type="submit" class="cr-form-submit">Update Application</button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="../admin/assets/css/queries.css">

<?php
$appDataJson = [];
foreach ($applications as $a) { $appDataJson[$a['id']] = $a; }
?>
<script>
var appData = <?= json_encode($appDataJson) ?>;
</script>
<script src="../admin/assets/js/careers.js"></script>