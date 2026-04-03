function openUploadReport() {
    document.getElementById('uploadReportForm').reset();
    document.getElementById('reportFileName').textContent = 'No file selected';
    document.getElementById('uploadReportModal').style.display = 'flex';
}

function ajaxReportAction(action, reportId) {
    var fd = new FormData();
    fd.append('action', action);
    fd.append('report_id', reportId);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/reports');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(function(){ location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch(e) { showToast('Server error.', 'error'); }
    };
    xhr.onerror = function() { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

var _reportConfirmCb = null;
function showReportConfirm(message, onConfirm) {
    _reportConfirmCb = onConfirm;
    document.getElementById('reportConfirmMsg').textContent = message;
    document.getElementById('reportConfirmModal').style.display = 'flex';
}

document.getElementById('reportConfirmBtn').addEventListener('click', function() {
    document.getElementById('reportConfirmModal').style.display = 'none';
    if (_reportConfirmCb) _reportConfirmCb();
    _reportConfirmCb = null;
});

// Close modals on backdrop
['uploadReportModal','reportConfirmModal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) { if (e.target === this) this.style.display = 'none'; });
});

// File input display handler
document.getElementById('reportFileInput').addEventListener('change', function() {
    document.getElementById('reportFileName').textContent = this.files.length ? this.files[0].name : 'No file selected';
});
