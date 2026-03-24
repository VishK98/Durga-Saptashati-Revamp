<?php
// Fetch all comments with blog title
$stmt = $pdo->query("SELECT c.*, b.title as blog_title FROM blog_comments c JOIN blogs b ON c.blog_id = b.id ORDER BY c.created_at DESC");
$allComments = $stmt->fetchAll();
?>

<?php if (!empty($_SESSION['comment_success'])): ?>
    <div style="background:#d4edda;color:#155724;padding:12px 20px;border-radius:8px;margin-bottom:20px;display:flex;align-items:center;justify-content:space-between;">
        <span><?= htmlspecialchars($_SESSION['comment_success']) ?></span>
        <button onclick="this.parentElement.remove()" style="background:none;border:none;font-size:18px;cursor:pointer;color:#155724;">&times;</button>
    </div>
    <?php unset($_SESSION['comment_success']); ?>
<?php endif; ?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-comment-dots" style="color:var(--accent);margin-right:8px;"></i> Blog Comments</h4>
        <span style="color:#666;font-size:0.85rem;"><?= count($allComments) ?> Total</span>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Blog</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($allComments)): ?>
                <tr><td colspan="8" style="text-align:center;padding:40px;color:#999;">No comments yet.</td></tr>
            <?php else: ?>
                <?php foreach ($allComments as $i => $cm): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><strong><?= htmlspecialchars(mb_strimwidth($cm['blog_title'], 0, 30, '...')) ?></strong></td>
                        <td><?= htmlspecialchars($cm['name']) ?></td>
                        <td><?= htmlspecialchars($cm['email']) ?></td>
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
                        <td style="text-align:right;">
                            <div class="action-wrap">
                                <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="action-menu">
                                    <?php if ($cm['status'] !== 'approved'): ?>
                                    <a href="javascript:void(0)" onclick="this.closest('.action-menu').querySelector('.approve-form').submit()">
                                        <i class="fas fa-check" style="color:#28a745;"></i> Approve
                                    </a>
                                    <form class="approve-form" method="POST" action="admin.php?page=comments" style="display:none;">
                                        <input type="hidden" name="action" value="approve_comment">
                                        <input type="hidden" name="comment_id" value="<?= $cm['id'] ?>">
                                    </form>
                                    <?php endif; ?>
                                    <?php if ($cm['status'] !== 'rejected'): ?>
                                    <a href="javascript:void(0)" onclick="this.closest('.action-menu').querySelector('.reject-form').submit()">
                                        <i class="fas fa-ban" style="color:#ffc107;"></i> Reject
                                    </a>
                                    <form class="reject-form" method="POST" action="admin.php?page=comments" style="display:none;">
                                        <input type="hidden" name="action" value="reject_comment">
                                        <input type="hidden" name="comment_id" value="<?= $cm['id'] ?>">
                                    </form>
                                    <?php endif; ?>
                                    <div class="action-divider"></div>
                                    <a href="javascript:void(0)" class="action-delete" onclick="if(confirm('Delete this comment?')) this.closest('.action-menu').querySelector('.delete-form').submit()">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <form class="delete-form" method="POST" action="admin.php?page=comments" style="display:none;">
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
