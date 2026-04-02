/* ===== Admin Volunteers Page Scripts ===== */

function viewVolunteer(id) {
    var v = volunteerData[id];
    if (!v) return;
    var statusClass = v.status === 'approved' ? 'status-active' : (v.status === 'pending' ? 'status-pending' : 'status-new');
    var html = '<div class="qr-view-section">' +
        '<div class="qr-view-grid">' +
        '<div><small class="qr-view-label">Name</small><p class="qr-view-value-bold">' + escHtml(v.name) + '</p></div>' +
        '<div><small class="qr-view-label">Email</small><p class="qr-view-value">' + escHtml(v.email) + '</p></div>' +
        '<div><small class="qr-view-label">Phone</small><p class="qr-view-value">' + escHtml(v.phone || '-') + '</p></div>' +
        '<div><small class="qr-view-label">Date</small><p class="qr-view-value">' + v.created_at + '</p></div>' +
        '<div><small class="qr-view-label">Status</small><p class="qr-view-value"><span class="status-badge ' + statusClass + '">' + v.status.charAt(0).toUpperCase() + v.status.slice(1) + '</span></p></div>' +
        '</div></div>' +
        (v.address ? '<div class="qr-view-section"><small class="qr-view-label">Address</small><p class="qr-view-value">' + escHtml(v.address) + '</p></div>' : '') +
        (v.skills ? '<div class="qr-view-section"><small class="qr-view-label">Skills / Interests</small><p class="qr-view-value">' + escHtml(v.skills) + '</p></div>' : '') +
        '<div><small class="qr-view-label">Why they want to volunteer</small><p class="qr-view-message">' + escHtml(v.message || '-') + '</p></div>';
    document.getElementById('viewVolunteerContent').innerHTML = html;
    document.getElementById('viewVolunteerModal').style.display = 'flex';
}

function escHtml(str) {
    var div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

document.getElementById('viewVolunteerModal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
});
