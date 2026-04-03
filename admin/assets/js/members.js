// === Tab Switching ===
function switchTab(tab) {
    document.querySelectorAll('.member-tab').forEach(function(t) {
        t.classList.remove('active');
    });
    document.querySelectorAll('.tab-content').forEach(function(c) {
        c.classList.remove('active');
    });
    document.getElementById('tab-' + tab).classList.add('active');
    document.getElementById('content-' + tab).classList.add('active');
}

function viewMember(id) {
    var m = allMembers.find(function(x) {
        return x.id == id;
    });
    if (!m) return;
    var typeLabel = m.membership_type;
    if (planMap[m.membership_type]) {
        var p = planMap[m.membership_type];
        typeLabel = p.name + ' (\u20B9' + Number(p.price).toLocaleString('en-IN') + ')';
    }

    // Photo section
    var photoHtml = '<div style="text-align:center;margin-bottom:20px;">';
    if (m.photo) {
        photoHtml += '<img src="' + memberUploadsUrl + m.photo + '" alt="' + m.full_name + '" class="mb-view-photo">';
    } else {
        photoHtml += '<div class="mb-view-photo-placeholder"><i class="fas fa-user"></i></div>';
    }
    photoHtml += '<h5 style="color:#1a1b2e;font-weight:700;margin:10px 0 2px;">' + m.full_name + '</h5>';
    photoHtml += '<span class="status-badge ' + (m.status === 'approved' ? 'status-active' : m.status === 'pending' ? 'status-pending' : 'status-new') + '">' + m.status.charAt(0).toUpperCase() + m.status.slice(1) + '</span>';
    photoHtml += '</div>';

    var rows = [
        ['Email', m.email],
        ['Mobile', m.mobile],
        ['Gender', m.gender],
        ['Address', m.address],
        ['Profession', m.profession],
        ['Membership', typeLabel],
        ['Payment Mode', m.payment_mode && m.payment_mode !== 'N/A' ? m.payment_mode : null],
        ['Applied On', m.created_at && m.created_at !== '0000-00-00 00:00:00' ? new Date(m.created_at)
            .toLocaleDateString('en-IN', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : null
        ]
    ];
    var html = photoHtml + '<div class="qr-view-section"><div class="qr-view-grid">';
    rows.forEach(function(r) {
        if (r[1]) {
            html += '<div><div class="qr-view-label">' + r[0] + '</div><div class="qr-view-value-bold">' + r[1] + '</div></div>';
        }
    });
    html += '</div></div>';
    document.getElementById('memberDetails').innerHTML = html;
    document.getElementById('memberModal').style.display = 'flex';
}

function editMember(id) {
    var m = allMembers.find(function(x) {
        return x.id == id;
    });
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
    // Photo preview
    var img = document.getElementById('editMemberPhotoImg');
    var placeholder = document.getElementById('editMemberPhotoPlaceholder');
    if (m.photo) {
        img.src = memberUploadsUrl + m.photo;
        img.style.display = 'block';
        placeholder.style.display = 'none';
    } else {
        img.style.display = 'none';
        placeholder.style.display = 'flex';
    }
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
    var headers = ['Full Name', 'Gender', 'Address', 'Email', 'Mobile', 'Membership Type', 'Profession', 'Payment Mode',
        'Status', 'Created At'
    ];
    var rows = [headers.join(',')];
    allMembers.forEach(function(m) {
        rows.push(['"' + (m.full_name || '') + '"', m.gender || '', '"' + (m.address || '').replace(/"/g,
            '""') + '"', m.email || '', m.mobile || '', '"' + (m.membership_type || '') + '"', '"' + (m
                .profession || '') + '"', m.payment_mode || '', m.status || '', m.created_at || ''
        ].join(','));
    });
    var blob = new Blob([rows.join('\n')], {
        type: 'text/csv'
    });
    var a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'members_export_' + new Date().toISOString().slice(0, 10) + '.csv';
    a.click();
}

// Custom filter dropdown handler
function selectMemberFilter(name, el) {
    var val = el.dataset.value;
    var wrap = el.closest('.custom-select-wrap');
    var textEl = document.getElementById('filter' + name + 'Text');
    document.getElementById('filter' + name).value = val;
    textEl.textContent = el.querySelector('.cs-opt-text').textContent;
    textEl.className = val ? '' : 'cs-placeholder';
    wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
    el.classList.add('selected');
    wrap.classList.remove('open');
    filterMembers();
}

// Close member filter dropdowns on outside click
document.addEventListener('click', function(e) {
    document.querySelectorAll('.mb-filter-dropdown.open').forEach(function(wrap) {
        if (!wrap.contains(e.target)) wrap.classList.remove('open');
    });
});

function updateClearBtnVisibility() {
    var search = document.getElementById('memberSearch').value;
    var status = document.getElementById('filterStatus').value;
    var type = document.getElementById('filterType').value;
    var payment = document.getElementById('filterPayment').value;
    var btn = document.getElementById('memberClearBtn');
    if (search || status || type || payment) {
        btn.classList.add('visible');
    } else {
        btn.classList.remove('visible');
    }
}

function filterMembers() {
    var search = document.getElementById('memberSearch').value.toLowerCase();
    var status = document.getElementById('filterStatus').value;
    var type = document.getElementById('filterType').value;
    var payment = document.getElementById('filterPayment').value;
    var tbody = document.getElementById('membersTable').querySelector('tbody');
    var rows = tbody.querySelectorAll('tr');

    // First show all rows (override pagination hiding)
    rows.forEach(function(row) { row.style.display = ''; });

    var count = 0;
    var hasFilter = search || status || type || payment;
    rows.forEach(function(row) {
        var cells = row.querySelectorAll('td');
        if (cells.length <= 1) return;
        var name = (cells[1] ? cells[1].textContent : '').toLowerCase();
        var email = (cells[2] ? cells[2].textContent : '').toLowerCase();
        var mobile = (cells[3] ? cells[3].textContent : '').toLowerCase();
        var rowType = row.getAttribute('data-type') || '';
        var rowPayment = row.getAttribute('data-payment') || '';
        var rowStatus = row.getAttribute('data-status') || '';
        var matchSearch = !search || name.indexOf(search) > -1 || email.indexOf(search) > -1 || mobile.indexOf(search) > -1;
        var matchStatus = !status || rowStatus === status;
        var matchType = !type || rowType === type;
        var matchPayment = !payment || rowPayment === payment;
        if (matchSearch && matchStatus && matchType && matchPayment) {
            row.style.display = '';
            row.removeAttribute('data-filtered');
            count++;
            cells[0].textContent = count;
        } else {
            row.style.display = 'none';
            row.setAttribute('data-filtered', 'hidden');
        }
    });

    // Hide/show pagination when filtering
    var paginationEl = document.querySelector('#membersTable').closest('.data-panel').querySelector('.table-pagination');
    if (paginationEl) {
        paginationEl.style.display = hasFilter ? 'none' : '';
    }

    updateClearBtnVisibility();
}

function clearMemberFilters() {
    document.getElementById('memberSearch').value = '';
    // Reset all custom dropdowns
    ['Status', 'Type', 'Payment'].forEach(function(name) {
        document.getElementById('filter' + name).value = '';
        var textEl = document.getElementById('filter' + name + 'Text');
        var wrap = document.getElementById('filter' + name + 'Wrap');
        textEl.textContent = wrap.querySelector('.custom-select-option[data-value=""] .cs-opt-text').textContent;
        textEl.className = 'cs-placeholder';
        wrap.querySelectorAll('.custom-select-option').forEach(function(o) { o.classList.remove('selected'); });
        wrap.querySelector('.custom-select-option[data-value=""]').classList.add('selected');
    });
    // Restore pagination visibility
    var paginationEl = document.querySelector('#membersTable').closest('.data-panel').querySelector('.table-pagination');
    if (paginationEl) paginationEl.style.display = '';
    filterMembers();
    // Re-trigger pagination render
    if (paginationEl) {
        var evt = new Event('change', { bubbles: true });
        var sel = paginationEl.querySelector('.page-size-select');
        if (sel) sel.dispatchEvent(evt);
    }
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
    ajaxAction('add_membership_plan', data, function() {
        document.getElementById('addPlanModal').style.display = 'none';
        setTimeout(function() {
            location.reload();
        }, 800);
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
    ajaxAction('update_membership_plan', data, function() {
        document.getElementById('editPlanModal').style.display = 'none';
        setTimeout(function() {
            location.reload();
        }, 800);
    });
    return false;
}

function openAddMember() {
    document.getElementById('addMemberForm').reset();
    var img = document.getElementById('addMemberPhotoImg');
    var placeholder = document.getElementById('addMemberPhotoPlaceholder');
    if (img) { img.style.display = 'none'; img.src = ''; }
    if (placeholder) placeholder.style.display = 'flex';
    document.getElementById('addMemberModal').style.display = 'flex';
}

function submitAddMember(e) {
    e.preventDefault();
    var form = document.getElementById('addMemberForm');
    var fd = new FormData();
    fd.append('action', 'add_member');
    fd.append('full_name', form.querySelector('#addMemberName').value);
    fd.append('email', form.querySelector('#addMemberEmail').value);
    fd.append('mobile', form.querySelector('#addMemberMobile').value);
    fd.append('gender', form.querySelector('#addMemberGender').value);
    fd.append('membership_type', form.querySelector('#addMemberType').value);
    fd.append('address', form.querySelector('#addMemberAddress').value);
    fd.append('profession', form.querySelector('#addMemberProfession').value);
    fd.append('payment_mode', form.querySelector('#addMemberPayment').value);
    fd.append('status', form.querySelector('#addMemberStatus').value);
    var photoFile = form.querySelector('#addMemberPhoto');
    if (photoFile && photoFile.files[0]) fd.append('photo', photoFile.files[0]);
    ajaxActionFD(fd, function() {
        document.getElementById('addMemberModal').style.display = 'none';
        setTimeout(function() { location.reload(); }, 800);
    });
    return false;
}

// Photo preview helper
function previewMemberPhoto(input, imgId, placeholderId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById(imgId);
            var placeholder = document.getElementById(placeholderId);
            img.src = e.target.result;
            img.style.display = 'block';
            placeholder.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// === AJAX helpers ===
function ajaxAction(action, data, callback) {
    var fd = new FormData();
    fd.append('action', action);
    for (var key in data) fd.append(key, data[key]);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/members');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                if (callback) callback(res);
                else setTimeout(function() {
                    location.reload();
                }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch (e) {
            showToast('Server error.', 'error');
        }
    };
    xhr.onerror = function() {
        showToast('Network error.', 'error');
    };
    xhr.send(fd);
}

// AJAX with FormData (supports file uploads)
function ajaxActionFD(fd, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/admin/members');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function() {
        try {
            var res = JSON.parse(xhr.responseText);
            if (res.success) {
                showToast(res.message, 'success');
                if (callback) callback(res);
                else setTimeout(function() { location.reload(); }, 800);
            } else {
                showToast(res.message || 'Something went wrong.', 'error');
            }
        } catch (e) {
            showToast('Server error.', 'error');
        }
    };
    xhr.onerror = function() { showToast('Network error.', 'error'); };
    xhr.send(fd);
}

function ajaxMemberAction(action, memberId) {
    ajaxAction(action, {
        member_id: memberId
    });
}

function submitEditMember(e) {
    e.preventDefault();
    var form = document.getElementById('editMemberForm');
    var fd = new FormData();
    fd.append('action', 'update_member');
    fd.append('member_id', form.querySelector('#editMemberId').value);
    fd.append('full_name', form.querySelector('#editMemberName').value);
    fd.append('email', form.querySelector('#editMemberEmail').value);
    fd.append('mobile', form.querySelector('#editMemberMobile').value);
    fd.append('gender', form.querySelector('#editMemberGender').value);
    fd.append('membership_type', form.querySelector('#editMemberType').value);
    fd.append('address', form.querySelector('#editMemberAddress').value);
    fd.append('profession', form.querySelector('#editMemberProfession').value);
    fd.append('payment_mode', form.querySelector('#editMemberPayment').value);
    fd.append('status', form.querySelector('#editMemberStatus').value);
    var photoFile = form.querySelector('#editMemberPhoto');
    if (photoFile && photoFile.files[0]) fd.append('photo', photoFile.files[0]);
    ajaxActionFD(fd, function() {
        document.getElementById('editMemberModal').style.display = 'none';
        setTimeout(function() {
            location.reload();
        }, 800);
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
['memberModal', 'editMemberModal', 'editPlanModal', 'addPlanModal', 'addMemberModal', 'confirmModal'].forEach(function(
    id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) {
        if (e.target === this) this.style.display = 'none';
    });
});
