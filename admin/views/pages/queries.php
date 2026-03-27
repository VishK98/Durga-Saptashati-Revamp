<?php
$queries = $pdo->query("SELECT * FROM contact_queries ORDER BY created_at DESC")->fetchAll();
$newCount = $pdo->query("SELECT COUNT(*) FROM contact_queries WHERE status = 'new'")->fetchColumn();
?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-comments" style="color:#d97706;margin-right:8px;"></i> Contact Queries</h4>
        <?php if ($newCount > 0): ?>
        <span class="status-badge status-pending"><?= $newCount ?> New</span>
        <?php endif; ?>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($queries)): ?>
                <tr><td colspan="7" style="text-align:center;padding:40px;color:#999;">No queries yet.</td></tr>
            <?php else: ?>
                <?php foreach ($queries as $i => $q): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= htmlspecialchars($q['name']) ?></strong></td>
                    <td><?= htmlspecialchars($q['email']) ?></td>
                    <td><?= htmlspecialchars(mb_strimwidth($q['subject'], 0, 40, '...')) ?></td>
                    <td><?= date('M d, Y', strtotime($q['created_at'])) ?></td>
                    <td>
                        <span class="status-badge <?= $q['status'] === 'new' ? 'status-new' : ($q['status'] === 'read' ? 'status-pending' : 'status-active') ?>">
                            <?= ucfirst($q['status']) ?>
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <div class="action-wrap">
                            <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="action-menu">
                                <a href="javascript:void(0)" onclick="viewQuery(<?= $q['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                                <?php if ($q['status'] === 'new'): ?>
                                <form method="POST" action="admin.php?page=queries" style="display:contents;">
                                    <input type="hidden" name="action" value="mark_read_query">
                                    <input type="hidden" name="query_id" value="<?= $q['id'] ?>">
                                    <button type="submit"><i class="fas fa-check"></i> Mark Read</button>
                                </form>
                                <?php endif; ?>
                                <form method="POST" action="admin.php?page=queries" style="display:contents;">
                                    <input type="hidden" name="action" value="mark_replied_query">
                                    <input type="hidden" name="query_id" value="<?= $q['id'] ?>">
                                    <button type="submit"><i class="fas fa-reply"></i> Mark Replied</button>
                                </form>
                                <div class="action-divider"></div>
                                <form method="POST" action="admin.php?page=queries" style="display:contents;">
                                    <input type="hidden" name="action" value="delete_query">
                                    <input type="hidden" name="query_id" value="<?= $q['id'] ?>">
                                    <button type="submit" class="action-delete" onclick="return confirm('Delete this query?')"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- View Query Modal -->
<div id="viewQueryModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;width:95%;max-width:600px;max-height:90vh;overflow-y:auto;padding:30px;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
        <button onclick="document.getElementById('viewQueryModal').style.display='none'" style="position:absolute;top:15px;right:20px;background:none;border:none;font-size:24px;cursor:pointer;color:#666;">&times;</button>
        <h3 style="margin:0 0 20px;color:#1a1b2e;font-size:1.2rem;"><i class="fas fa-envelope-open" style="color:#f26522;margin-right:8px;"></i> Query Details</h3>
        <div id="viewQueryContent"></div>
    </div>
</div>

<?php
// Store query data for JS
$queryDataJson = [];
foreach ($queries as $q) {
    $queryDataJson[$q['id']] = $q;
}
?>

<script>
var queryData = <?= json_encode($queryDataJson) ?>;

function viewQuery(id) {
    var q = queryData[id];
    if (!q) return;
    var html = '<div style="margin-bottom:15px;padding-bottom:15px;border-bottom:1px solid #eee;">' +
        '<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">' +
        '<div><small style="color:#999;">Name</small><p style="margin:3px 0;font-weight:600;color:#1a1b2e;">' + escHtml(q.name) + '</p></div>' +
        '<div><small style="color:#999;">Email</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(q.email) + '</p></div>' +
        (q.phone ? '<div><small style="color:#999;">Phone</small><p style="margin:3px 0;color:#1a1b2e;">' + escHtml(q.phone) + '</p></div>' : '') +
        '<div><small style="color:#999;">Date</small><p style="margin:3px 0;color:#1a1b2e;">' + q.created_at + '</p></div>' +
        '</div></div>' +
        '<div><small style="color:#999;">Subject</small><p style="margin:3px 0;font-weight:600;color:#1a1b2e;">' + escHtml(q.subject) + '</p></div>' +
        '<div style="margin-top:15px;padding:15px;background:#f8f9fa;border-radius:8px;"><small style="color:#999;">Message</small><p style="margin:8px 0 0;color:#444;line-height:1.7;white-space:pre-wrap;">' + escHtml(q.message) + '</p></div>';
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
</script>
