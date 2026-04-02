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
    var rows = [
        ['Name', m.full_name],
        ['Email', m.email],
        ['Mobile', m.mobile],
        ['Gender', m.gender],
        ['Address', m.address],
        ['Profession', m.profession],
        ['Membership', typeLabel],
        ['Payment Mode', m.payment_mode && m.payment_mode !== 'N/A' ? m.payment_mode : null],
        ['Status', '<span class="status-badge ' + (m.status === 'approved' ? 'status-active' : m.status ===
                'pending' ? 'status-pending' : 'status-new') + '">' + m.status.charAt(0).toUpperCase() + m.status
            .slice(1) + '</span>'
        ],
        ['Applied On', m.created_at && m.created_at !== '0000-00-00 00:00:00' ? new Date(m.created_at)
            .toLocaleDateString('en-IN', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : null
        ]
    ];
    var html = '<div class="qr-view-section"><div class="qr-view-grid">';
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
    var count = 0;
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
            count++;
            cells[0].textContent = count;
        } else {
            row.style.display = 'none';
        }
    });
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
    ajaxAction('add_member', data, function() {
        document.getElementById('addMemberModal').style.display = 'none';
        setTimeout(function() {
            location.reload();
        }, 800);
    });
    return false;
}

// === AJAX helpers ===
function ajaxAction(action, data, callback) {
    var fd = new FormData();
    fd.append('action', action);
    for (var key in data) fd.append(key, data[key]);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin?page=members');
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

function ajaxMemberAction(action, memberId) {
    ajaxAction(action, {
        member_id: memberId
    });
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
    ajaxAction('update_member', data, function() {
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
