/* ===== Admin Queries Page Scripts ===== */

function viewQuery(id) {
    var q = queryData[id];
    if (!q) return;
    var html = '<div class="qr-view-section">' +
        '<div class="qr-view-grid">' +
        '<div><small class="qr-view-label">Name</small><p class="qr-view-value-bold">' + escHtml(q.name) + '</p></div>' +
        '<div><small class="qr-view-label">Email</small><p class="qr-view-value">' + escHtml(q.email) + '</p></div>' +
        (q.phone ? '<div><small class="qr-view-label">Phone</small><p class="qr-view-value">' + escHtml(q.phone) + '</p></div>' : '') +
        '<div><small class="qr-view-label">Date</small><p class="qr-view-value">' + q.created_at + '</p></div>' +
        '</div></div>' +
        '<div class="qr-view-section"><small class="qr-view-label">Subject</small><p class="qr-view-value-bold">' + escHtml(q.subject) + '</p></div>' +
        '<div><small class="qr-view-label">Message</small><p class="qr-view-message">' + escHtml(q.message) + '</p></div>';
    document.getElementById('viewQueryContent').innerHTML = html;
    document.getElementById('viewQueryModal').style.display = 'flex';
}

function escHtml(str) {
    var div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

document.getElementById('viewQueryModal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
});
