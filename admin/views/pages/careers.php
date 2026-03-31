<?php
$careers = $pdo->query("SELECT * FROM careers ORDER BY created_at DESC")->fetchAll();
$applications = $pdo->query("SELECT a.*, c.title as job_title FROM career_applications a LEFT JOIN careers c ON a.career_id = c.id ORDER BY a.created_at DESC")->fetchAll();
$newApps = $pdo->query("SELECT COUNT(*) FROM career_applications WHERE status = 'new'")->fetchColumn();
$activeJobs = count(array_filter($careers, fn($c) => $c['status'] === 'active'));
$shortlisted = count(array_filter($applications, fn($a) => $a['status'] === 'shortlisted'));
?>

<!-- Page Title -->
<h3 style="margin:0 0 10px;font-size:1.4rem;font-weight:700;color:#1a1b2e;">Career Management</h3>

<!-- Tab Navigation -->
<style>
    .career-tabs {
        display: flex;
        gap: 6px;
        margin-bottom: 25px;
        background: #f1f5f9;
        padding: 5px;
        border-radius: 12px;
        width: fit-content;
    }

    .cr-tab {
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

    .cr-tab:hover {
        color: #1a1b2e;
    }

    .cr-tab.active {
        background: var(--accent);
        color: #fff;
        box-shadow: 0 2px 8px rgba(242, 101, 34, 0.3);
    }

    .cr-tab i {
        font-size: 0.85rem;
    }

    .cr-tab .tab-badge {
        background: rgba(255, 255, 255, 0.25);
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 0.72rem;
        margin-left: 2px;
    }

    .cr-tab:not(.active) .tab-badge {
        background: #ef4444;
        color: #fff;
    }

    .cr-content {
        display: none;
    }

    .cr-content.active {
        display: block;
    }
</style>

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

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i
                    class="fas fa-briefcase"></i></div>
            <div class="stat-info">
                <h3><?= count($careers) ?></h3>
                <p>Total Openings</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i
                    class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= $activeJobs ?></h3>
                <p>Active</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i
                    class="fas fa-pause-circle"></i></div>
            <div class="stat-info">
                <h3><?= count($careers) - $activeJobs ?></h3>
                <p>Closed</p>
            </div>
        </div>
    </div>

    <div class="data-panel">
        <div class="data-panel-header"
            style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
            <h4><i class="fas fa-briefcase" style="color:var(--accent);margin-right:8px;"></i> Job Openings</h4>
            <button onclick="document.getElementById('addJobModal').style.display='flex'"
                style="background:var(--accent);color:#fff;border:none;padding:8px 18px;border-radius:8px;cursor:pointer;font-size:0.9rem;">
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
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($careers)): ?>
                    <tr>
                        <td colspan="7" style="text-align:center;padding:40px;color:#999;">No job openings. Click "Add
                            Opening" to create one.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($careers as $i => $c): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><strong><?= htmlspecialchars($c['title']) ?></strong></td>
                            <td><?= htmlspecialchars($c['department'] ?? '-') ?></td>
                            <td><span
                                    style="background:rgba(59,130,246,0.1);color:#2563eb;padding:3px 10px;border-radius:12px;font-size:0.75rem;font-weight:600;"><?= ucfirst(str_replace('-', ' ', $c['type'])) ?></span>
                            </td>
                            <td><?= htmlspecialchars($c['location'] ?? '-') ?></td>
                            <td><span
                                    class="status-badge <?= $c['status'] === 'active' ? 'status-active' : 'status-new' ?>"><?= ucfirst($c['status']) ?></span>
                            </td>
                            <td style="text-align:right;">
                                <div class="action-wrap">
                                    <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                            class="fas fa-ellipsis-v"></i></button>
                                    <div class="action-menu">
                                        <a href="javascript:void(0)" onclick="viewJob(<?= htmlspecialchars(json_encode($c)) ?>)"><i class="fas fa-eye"></i> View</a>
                                        <a href="javascript:void(0)" onclick="editJob(<?= htmlspecialchars(json_encode($c)) ?>)"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="javascript:void(0)" onclick="ajaxCareerAction('toggle_career', {career_id: <?= $c['id'] ?>})"><i class="fas fa-toggle-on"></i> <?= $c['status'] === 'active' ? 'Close' : 'Activate' ?></a>
                                        <a href="javascript:void(0)" onclick="showCareerConfirm('Delete this opening?', function(){ ajaxCareerAction('delete_career', {career_id: <?= $c['id'] ?>}) })" style="color:#ef4444;"><i class="fas fa-trash"></i> Delete</a>
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

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:25px;">
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i
                    class="fas fa-file-alt"></i></div>
            <div class="stat-info">
                <h3><?= count($applications) ?></h3>
                <p>Total Applications</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#dbeafe;color:#2563eb;"><i class="fas fa-envelope"></i></div>
            <div class="stat-info">
                <h3><?= $newApps ?></h3>
                <p>New</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                <h3><?= $shortlisted ?></h3>
                <p>Shortlisted</p>
            </div>
        </div>
    </div>

    <div class="data-panel">
        <div class="data-panel-header"
            style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
            <h4><i class="fas fa-file-alt" style="color:var(--accent);margin-right:8px;"></i> Applications</h4>
        </div>
        <!-- Filter -->
        <div
            style="display:flex;gap:12px;flex-wrap:wrap;align-items:center;padding:15px 20px;background:#f8fafc;border-bottom:1px solid #e2e8f0;">
            <div style="position:relative;flex:1;min-width:200px;">
                <i class="fas fa-search"
                    style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#9ca3af;font-size:0.85rem;"></i>
                <input type="text" id="appSearch" placeholder="Search by name, email, position..."
                    oninput="filterApps()"
                    style="width:100%;padding:9px 12px 9px 35px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;">
            </div>
            <select id="filterAppStatus" onchange="filterApps()"
                style="padding:9px 14px;border:1px solid #ddd;border-radius:8px;font-size:0.88rem;min-width:140px;">
                <option value="">All Status</option>
                <option value="new">New</option>
                <option value="reviewed">Reviewed</option>
                <option value="shortlisted">Shortlisted</option>
                <option value="rejected">Rejected</option>
            </select>
            <button
                onclick="document.getElementById('appSearch').value='';document.getElementById('filterAppStatus').value='';filterApps();"
                style="background:none;border:1px solid #ddd;padding:9px 14px;border-radius:8px;cursor:pointer;font-size:0.85rem;color:#666;">
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
                    <th>Date</th>
                    <th>Resume</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($applications)): ?>
                    <tr>
                        <td colspan="8" style="text-align:center;padding:40px;color:#999;">No applications received yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($applications as $i => $a): ?>
                        <tr data-status="<?= $a['status'] ?>">
                            <td><?= $i + 1 ?></td>
                            <td><strong><?= htmlspecialchars($a['name']) ?></strong></td>
                            <td><?= htmlspecialchars($a['email']) ?></td>
                            <td><?= htmlspecialchars($a['job_title'] ?? 'General') ?></td>
                            <td style="font-size:0.82rem;color:var(--text-muted);">
                                <?= date('M d, Y', strtotime($a['created_at'])) ?></td>
                            <td>
                                <?php if ($a['resume']): ?>
                                    <a href="<?= asset('uploads/resumes/' . $a['resume']) ?>" target="_blank"
                                        style="color:#f26522;font-size:0.82rem;"><i class="fas fa-download"></i> View</a>
                                <?php else: ?>
                                    <span style="color:#999;font-size:0.82rem;">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span
                                    class="status-badge <?= $a['status'] === 'new' ? 'status-new' : ($a['status'] === 'shortlisted' ? 'status-active' : ($a['status'] === 'reviewed' ? 'status-pending' : 'status-new')) ?>">
                                    <?= ucfirst($a['status']) ?>
                                </span>
                            </td>
                            <td style="text-align:right;">
                                <div class="action-wrap">
                                    <button class="action-trigger" onclick="toggleActionMenu(this)"><i
                                            class="fas fa-ellipsis-v"></i></button>
                                    <div class="action-menu">
                                        <a href="javascript:void(0)"
                                            onclick="ajaxCareerAction('update_application', {app_id: <?= $a['id'] ?>, status: 'reviewed'})"><i
                                                class="fas fa-eye"></i> Mark Reviewed</a>
                                        <a href="javascript:void(0)"
                                            onclick="ajaxCareerAction('update_application', {app_id: <?= $a['id'] ?>, status: 'shortlisted'})"><i
                                                class="fas fa-star"></i> Shortlist</a>
                                        <a href="javascript:void(0)"
                                            onclick="ajaxCareerAction('update_application', {app_id: <?= $a['id'] ?>, status: 'rejected'})"><i
                                                class="fas fa-times"></i> Reject</a>
                                        <a href="javascript:void(0)"
                                            onclick="showCareerConfirm('Delete this application?', function(){ ajaxCareerAction('delete_application', {app_id: <?= $a['id'] ?>}) })"
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

<!-- Add Job Modal -->
<div id="addJobModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:600px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('addJobModal').style.display='none'"
            style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-briefcase" style="color:var(--accent);"></i> Add
            Job Opening</h4>
        <form method="POST" action="admin.php?page=careers">
            <input type="hidden" name="action" value="create_career">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Job Title <span
                        style="color:#ef4444;">*</span></label>
                <input type="text" name="title" required placeholder="e.g. Program Coordinator"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Department</label>
                    <input type="text" name="department" placeholder="e.g. Education"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Location</label>
                    <input type="text" name="location" value="Dwarka, New Delhi"
                        style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Type</label>
                <select name="type"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                    <option value="full-time">Full Time</option>
                    <option value="part-time">Part Time</option>
                    <option value="internship">Internship</option>
                    <option value="volunteer">Volunteer</option>
                </select>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <textarea name="description" rows="4" placeholder="Job description..."
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Requirements</label>
                <textarea name="requirements" rows="3" placeholder="Required skills and qualifications..."
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <button type="submit"
                style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Create
                Opening</button>
        </form>
    </div>
</div>

<!-- View Job Modal -->
<div id="viewJobModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:600px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('viewJobModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-briefcase" style="color:var(--accent);"></i> Job Details</h4>
        <div id="viewJobDetails"></div>
    </div>
</div>

<!-- Edit Job Modal -->
<div id="editJobModal" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:16px;max-width:600px;width:95%;max-height:85vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <button onclick="document.getElementById('editJobModal').style.display='none'" style="position:absolute;top:15px;right:15px;background:none;border:none;font-size:1.3rem;cursor:pointer;color:#999;">&times;</button>
        <h4 style="margin-bottom:20px;color:#1a1b2e;"><i class="fas fa-edit" style="color:var(--accent);"></i> Edit Job Opening</h4>
        <form id="editJobForm" onsubmit="return submitEditJob(event)">
            <input type="hidden" id="editJobId">
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Job Title <span style="color:#ef4444;">*</span></label>
                <input type="text" id="editJobTitle" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Department</label>
                    <input type="text" id="editJobDept" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Location</label>
                    <input type="text" id="editJobLocation" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:15px;margin-bottom:15px;">
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Type</label>
                    <select id="editJobType" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="full-time">Full Time</option>
                        <option value="part-time">Part Time</option>
                        <option value="internship">Internship</option>
                        <option value="volunteer">Volunteer</option>
                    </select>
                </div>
                <div>
                    <label style="font-weight:600;display:block;margin-bottom:5px;">Status</label>
                    <select id="editJobStatus" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;">
                        <option value="active">Active</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
            </div>
            <div style="margin-bottom:15px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Description</label>
                <textarea id="editJobDesc" rows="4" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <div style="margin-bottom:20px;">
                <label style="font-weight:600;display:block;margin-bottom:5px;">Requirements</label>
                <textarea id="editJobReq" rows="3" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:inherit;resize:vertical;"></textarea>
            </div>
            <button type="submit" style="background:var(--accent);color:#fff;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;width:100%;font-size:1rem;font-weight:600;">Update Opening</button>
        </form>
    </div>
</div>

<!-- Confirm Modal -->
<div id="careerConfirmModal"
    style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.5);z-index:99999;align-items:center;justify-content:center;">
    <div
        style="background:#fff;border-radius:16px;max-width:400px;width:90%;padding:30px;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div
            style="width:56px;height:56px;border-radius:50%;background:#fef2f2;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
            <i class="fas fa-exclamation-triangle" style="color:#ef4444;font-size:1.5rem;"></i>
        </div>
        <h4 style="margin-bottom:8px;color:#1a1b2e;font-size:1.1rem;">Are you sure?</h4>
        <p id="careerConfirmMsg" style="color:#666;font-size:0.92rem;margin-bottom:24px;">This action cannot be undone.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;">
            <button onclick="document.getElementById('careerConfirmModal').style.display='none'"
                style="padding:10px 28px;border:1px solid #ddd;border-radius:8px;background:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;color:#666;">Cancel</button>
            <button id="careerConfirmBtn"
                style="padding:10px 28px;border:none;border-radius:8px;background:#ef4444;color:#fff;cursor:pointer;font-size:0.9rem;font-weight:600;">Yes,
                Delete</button>
        </div>
    </div>
</div>

<script>
    // === Tab Switching ===
    function switchCareerTab(tab) {
        document.querySelectorAll('.cr-tab').forEach(function (t) { t.classList.remove('active'); });
        document.querySelectorAll('.cr-content').forEach(function (c) { c.classList.remove('active'); });
        document.getElementById('crtab-' + tab).classList.add('active');
        document.getElementById('crcontent-' + tab).classList.add('active');
    }

    // === View / Edit Job ===
    function viewJob(job) {
        var html = '<table style="width:100%;border-collapse:collapse;">';
        var rows = [
            ['Title', job.title],
            ['Department', job.department || '-'],
            ['Location', job.location || '-'],
            ['Type', job.type ? job.type.replace('-',' ').replace(/\b\w/g, function(l){ return l.toUpperCase(); }) : '-'],
            ['Status', '<span class="status-badge '+(job.status==='active'?'status-active':'status-new')+'">'+job.status.charAt(0).toUpperCase()+job.status.slice(1)+'</span>'],
            ['Description', job.description || '-'],
            ['Requirements', job.requirements || '-'],
            ['Created', job.created_at ? new Date(job.created_at).toLocaleDateString('en-IN',{year:'numeric',month:'long',day:'numeric'}) : '-']
        ];
        rows.forEach(function(r) {
            html += '<tr><td style="padding:10px 14px;font-weight:600;color:#666;width:35%;border-bottom:1px solid #f0f0f0;vertical-align:top;">'+r[0]+'</td><td style="padding:10px 14px;color:#1a1b2e;border-bottom:1px solid #f0f0f0;white-space:pre-wrap;">'+r[1]+'</td></tr>';
        });
        html += '</table>';
        document.getElementById('viewJobDetails').innerHTML = html;
        document.getElementById('viewJobModal').style.display = 'flex';
    }

    function editJob(job) {
        document.getElementById('editJobId').value = job.id;
        document.getElementById('editJobTitle').value = job.title || '';
        document.getElementById('editJobDept').value = job.department || '';
        document.getElementById('editJobLocation').value = job.location || '';
        document.getElementById('editJobType').value = job.type || 'full-time';
        document.getElementById('editJobStatus').value = job.status || 'active';
        document.getElementById('editJobDesc').value = job.description || '';
        document.getElementById('editJobReq').value = job.requirements || '';
        document.getElementById('editJobModal').style.display = 'flex';
    }

    function submitEditJob(e) {
        e.preventDefault();
        ajaxCareerAction('update_career', {
            career_id: document.getElementById('editJobId').value,
            title: document.getElementById('editJobTitle').value,
            department: document.getElementById('editJobDept').value,
            location: document.getElementById('editJobLocation').value,
            type: document.getElementById('editJobType').value,
            status: document.getElementById('editJobStatus').value,
            description: document.getElementById('editJobDesc').value,
            requirements: document.getElementById('editJobReq').value
        });
        document.getElementById('editJobModal').style.display = 'none';
        return false;
    }

    // === AJAX ===
    function ajaxCareerAction(action, data) {
        var fd = new FormData();
        fd.append('action', action);
        for (var key in data) fd.append(key, data[key]);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'admin.php?page=careers');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onload = function () {
            try {
                var res = JSON.parse(xhr.responseText);
                if (res.success) {
                    showToast(res.message, 'success');
                    setTimeout(function () { location.reload(); }, 800);
                } else {
                    showToast(res.message || 'Something went wrong.', 'error');
                }
            } catch (e) { showToast('Server error.', 'error'); }
        };
        xhr.onerror = function () { showToast('Network error.', 'error'); };
        xhr.send(fd);
    }

    // === Confirm Modal ===
    var _careerConfirmCb = null;
    function showCareerConfirm(message, onConfirm) {
        _careerConfirmCb = onConfirm;
        document.getElementById('careerConfirmMsg').textContent = message;
        document.getElementById('careerConfirmModal').style.display = 'flex';
    }
    document.getElementById('careerConfirmBtn').addEventListener('click', function () {
        document.getElementById('careerConfirmModal').style.display = 'none';
        if (_careerConfirmCb) _careerConfirmCb();
        _careerConfirmCb = null;
    });

    // === Filter Applications ===
    function filterApps() {
        var search = document.getElementById('appSearch').value.toLowerCase();
        var status = document.getElementById('filterAppStatus').value;
        var table = document.getElementById('appsTable');
        if (!table) return;
        var rows = table.querySelector('tbody').querySelectorAll('tr');
        var count = 0;
        rows.forEach(function (row) {
            var cells = row.querySelectorAll('td');
            if (cells.length <= 1) return;
            var name = (cells[1] ? cells[1].textContent : '').toLowerCase();
            var email = (cells[2] ? cells[2].textContent : '').toLowerCase();
            var position = (cells[3] ? cells[3].textContent : '').toLowerCase();
            var rowStatus = row.getAttribute('data-status') || '';
            var matchSearch = !search || name.indexOf(search) > -1 || email.indexOf(search) > -1 || position.indexOf(search) > -1;
            var matchStatus = !status || rowStatus === status;
            if (matchSearch && matchStatus) {
                row.style.display = '';
                count++;
                cells[0].textContent = count;
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Close modals on backdrop
    ['addJobModal', 'viewJobModal', 'editJobModal', 'careerConfirmModal'].forEach(function (id) {
        var el = document.getElementById(id);
        if (el) el.addEventListener('click', function (e) { if (e.target === this) this.style.display = 'none'; });
    });
</script>