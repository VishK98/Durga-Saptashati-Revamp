/* ===== Admin Career Page Scripts ===== */

// Tab Switching
function switchCareerTab(tab) {
    document.querySelectorAll('.cr-tab').forEach(function(t) { t.classList.remove('active'); });
    document.querySelectorAll('.cr-content').forEach(function(c) { c.classList.remove('active'); });
    document.getElementById('crtab-' + tab).classList.add('active');
    document.getElementById('crcontent-' + tab).classList.add('active');
}

// View Job
function viewJob(job) {
    var rows = [
        ['Title', job.title],
        ['Department', job.department || '-'],
        ['Location', job.location || '-'],
        ['Type', job.type ? job.type.replace('-', ' ').replace(/\b\w/g, function(l) { return l.toUpperCase(); }) : '-'],
        ['Status', '<span class="status-badge ' + (job.status === 'active' ? 'status-active' : 'status-new') + '">' + job.status.charAt(0).toUpperCase() + job.status.slice(1) + '</span>'],
        ['Description', job.description || '-'],
        ['Requirements', job.requirements || '-'],
        ['Created', job.created_at ? new Date(job.created_at).toLocaleDateString('en-IN', { year: 'numeric', month: 'long', day: 'numeric' }) : '-']
    ];
    var html = '<table class="cr-view-table">';
    rows.forEach(function(r) {
        html += '<tr><td class="cr-view-label">' + r[0] + '</td><td class="cr-view-value">' + r[1] + '</td></tr>';
    });
    html += '</table>';
    document.getElementById('viewJobDetails').innerHTML = html;
    document.getElementById('viewJobModal').style.display = 'flex';
}

// Edit Job
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

// AJAX
function ajaxCareerAction(action, data) {
    var fd = new FormData();
    fd.append('action', action);
    for (var key in data) fd.append(key, data[key]);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin.php?page=careers');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(function() { location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch (e) { showToast('Server error.', 'error'); }
    };
    xhr.onerror = function() { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

// Confirm Modal
var _careerConfirmCb = null;
function showCareerConfirm(message, onConfirm) {
    _careerConfirmCb = onConfirm;
    document.getElementById('careerConfirmMsg').textContent = message;
    document.getElementById('careerConfirmModal').style.display = 'flex';
}
document.getElementById('careerConfirmBtn').addEventListener('click', function() {
    document.getElementById('careerConfirmModal').style.display = 'none';
    if (_careerConfirmCb) _careerConfirmCb();
    _careerConfirmCb = null;
});

// Filter Applications
function filterApps() {
    var search = document.getElementById('appSearch').value.toLowerCase();
    var status = document.getElementById('filterAppStatus').value;
    var table = document.getElementById('appsTable');
    if (!table) return;
    var rows = table.querySelector('tbody').querySelectorAll('tr');
    var count = 0;
    rows.forEach(function(row) {
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

// Close modals on backdrop click
['addJobModal', 'viewJobModal', 'editJobModal', 'careerConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});
