<link rel="stylesheet" href="../admin/assets/css/queries.css">

<?php
$stmt = $pdo->query("SELECT c.*, b.title as blog_title FROM blog_comments c JOIN blogs b ON c.blog_id = b.id ORDER BY c.created_at DESC");
$allComments = $stmt->fetchAll();
?>

<?php if (!empty($_SESSION['comment_success'])): ?>
<div class="cm-alert-success">
    <span><?= htmlspecialchars($_SESSION['comment_success']) ?></span>
    <button onclick="this.parentElement.remove()" class="cm-alert-close">&times;</button>
</div>
<?php unset($_SESSION['comment_success']); ?>
<?php endif; ?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-comment-dots qr-header-icon"></i> Blog Comments</h4>
        <span class="cm-total-count"><?= count($allComments) ?> Total</span>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Blog</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Status</th>
                <th class="qr-actions-th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($allComments)): ?>
            <tr><td colspan="7" class="qr-empty-row">No comments yet.</td></tr>
            <?php else: ?>
            <?php foreach ($allComments as $i => $cm): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><strong><?= htmlspecialchars(mb_strimwidth($cm['blog_title'], 0, 30, '...')) ?></strong></td>
                <td><?= htmlspecialchars($cm['name']) ?></td>
                <td title="<?= htmlspecialchars($cm['comment']) ?>"><?= htmlspecialchars(mb_strimwidth($cm['comment'], 0, 50, '...')) ?></td>
                <td><?= date('M d, Y', strtotime($cm['created_at'])) ?></td>
                <td>
                    <?php
                    $statusClass = 'status-pending';
                    if ($cm['status'] === 'approved') $statusClass = 'status-active';
                    elseif ($cm['status'] === 'rejected') $statusClass = 'status-inactive';
                    ?>
                    <span class="status-badge <?= $statusClass ?>"><?= ucfirst($cm['status']) ?></span>
                </td>
                <td class="qr-actions-td">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="javascript:void(0)" onclick="viewComment(<?= $cm['id'] ?>)"><i class="fas fa-eye"></i> View</a>
                            <?php if ($cm['status'] !== 'approved'): ?>
                            <a href="javascript:void(0)" onclick="this.closest('.action-menu').querySelector('.approve-form').submit()">
                                <i class="fas fa-check cm-icon-approve"></i> Approve
                            </a>
                            <form class="approve-form" method="POST" action="admin.php?page=comments" hidden>
                                <input type="hidden" name="action" value="approve_comment">
                                <input type="hidden" name="comment_id" value="<?= $cm['id'] ?>">
                            </form>
                            <?php endif; ?>
                            <?php if ($cm['status'] !== 'rejected'): ?>
                            <a href="javascript:void(0)" onclick="this.closest('.action-menu').querySelector('.reject-form').submit()">
                                <i class="fas fa-ban cm-icon-reject"></i> Reject
                            </a>
                            <form class="reject-form" method="POST" action="admin.php?page=comments" hidden>
                                <input type="hidden" name="action" value="reject_comment">
                                <input type="hidden" name="comment_id" value="<?= $cm['id'] ?>">
                            </form>
                            <?php endif; ?>
                            <div class="action-divider"></div>
                            <a href="javascript:void(0)" class="action-delete" onclick="if(confirm('Delete this comment?')) this.closest('.action-menu').querySelector('.delete-form').submit()">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form class="delete-form" method="POST" action="admin.php?page=comments" hidden>
                                <input type="hidden" name="action" value="delete_comment">
                                <input type="hidden" name="comment_id" value="<?= $cm['id'] ?>">
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

<!-- View Comment Modal -->
<div id="viewCommentModal" class="qr-modal-overlay">
    <div class="qr-modal-box">
        <button onclick="document.getElementById('viewCommentModal').style.display='none'" class="qr-modal-close">&times;</button>
        <h3 class="qr-modal-title"><i class="fas fa-comment-dots"></i> Comment Details</h3>
        <div id="viewCommentContent"></div>
    </div>
</div>

<?php
$commentDataJson = [];
foreach ($allComments as $cm) {
    $commentDataJson[$cm['id']] = $cm;
}
?>

<script>
var commentData = <?= json_encode($commentDataJson) ?>;

function viewComment(id) {
    var c = commentData[id];
    if (!c) return;
    var statusClass = 'status-pending';
    if (c.status === 'approved') statusClass = 'status-active';
    else if (c.status === 'rejected') statusClass = 'status-inactive';

    var html = '<div class="qr-view-section">' +
        '<div class="qr-view-grid">' +
        '<div><small class="qr-view-label">Name</small><p class="qr-view-value-bold">' + escHtml(c.name) + '</p></div>' +
        '<div><small class="qr-view-label">Email</small><p class="qr-view-value">' + escHtml(c.email) + '</p></div>' +
        '<div><small class="qr-view-label">Blog</small><p class="qr-view-value">' + escHtml(c.blog_title) + '</p></div>' +
        '<div><small class="qr-view-label">Date</small><p class="qr-view-value">' + c.created_at + '</p></div>' +
        '<div><small class="qr-view-label">Status</small><p class="qr-view-value"><span class="status-badge ' + statusClass + '">' + c.status.charAt(0).toUpperCase() + c.status.slice(1) + '</span></p></div>' +
        '</div></div>' +
        '<div><small class="qr-view-label">Comment</small><p class="qr-view-message">' + escHtml(c.comment) + '</p></div>';
    document.getElementById('viewCommentContent').innerHTML = html;
    document.getElementById('viewCommentModal').style.display = 'flex';
}

function escHtml(str) {
    var div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}

document.getElementById('viewCommentModal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
});
</script>
