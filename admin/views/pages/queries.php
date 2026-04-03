<link rel="stylesheet" href="../admin/assets/css/queries.css">

<?php
$queries = $pdo->query("SELECT * FROM contact_queries ORDER BY created_at DESC")->fetchAll();
$newCount = $pdo->query("SELECT COUNT(*) FROM contact_queries WHERE status = 'new'")->fetchColumn();
?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-comments qr-header-icon"></i> Contact Queries</h4>
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
                <th class="qr-actions-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($queries)): ?>
            <tr>
                <td colspan="7" class="qr-empty-row">No queries yet.</td>
            </tr>
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
                <td class="qr-actions-td">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="javascript:void(0)" onclick="viewQuery(<?= $q['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                            <?php if ($q['status'] === 'new'): ?>
                            <form method="POST" action="admin/queries" class="action-form-inline">
                                <input type="hidden" name="action" value="mark_read_query">
                                <input type="hidden" name="query_id" value="<?= $q['id'] ?>">
                                <button type="submit"><i class="fas fa-check"></i> Mark Read</button>
                            </form>
                            <?php endif; ?>
                            <form method="POST" action="admin/queries" class="action-form-inline">
                                <input type="hidden" name="action" value="mark_replied_query">
                                <input type="hidden" name="query_id" value="<?= $q['id'] ?>">
                                <button type="submit"><i class="fas fa-reply"></i> Mark Replied</button>
                            </form>
                            <div class="action-divider"></div>
                            <form method="POST" action="admin/queries" class="action-form-inline">
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
<div id="viewQueryModal" class="qr-modal-overlay">
    <div class="qr-modal-box">
        <button onclick="document.getElementById('viewQueryModal').style.display='none'" class="qr-modal-close">&times;</button>
        <h3 class="qr-modal-title"><i class="fas fa-envelope-open"></i> Query Details</h3>
        <div id="viewQueryContent"></div>
    </div>
</div>

<?php
$queryDataJson = [];
foreach ($queries as $q) {
    $queryDataJson[$q['id']] = $q;
}
?>

<script>
var queryData = <?= json_encode($queryDataJson) ?>;
</script>
<script src="../admin/assets/js/queries.js"></script>
