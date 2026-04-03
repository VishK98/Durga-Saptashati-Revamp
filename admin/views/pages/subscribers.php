<?php
$subscribers = $pdo->query("SELECT * FROM subscribers ORDER BY created_at DESC")->fetchAll();
$totalSubs = count($subscribers);
$activeSubs = count(array_filter($subscribers, fn($s) => $s['status'] === 'active'));
?>

<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-envelope-open-text" style="color:#059669;margin-right:8px;"></i> Newsletter Subscribers</h4>
        <span class="status-badge status-active"><?= $totalSubs ?> Total (<?= $activeSubs ?> Active)</span>
    </div>
    <table class="data-table paginated-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subscribed On</th>
                <th>Status</th>
                <th style="text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($subscribers)): ?>
            <tr>
                <td colspan="5" style="text-align:center;padding:40px;color:#999;">No subscribers yet.</td>
            </tr>
            <?php else: ?>
            <?php foreach ($subscribers as $i => $sub): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><strong><?= htmlspecialchars($sub['email']) ?></strong></td>
                <td><?= date('M d, Y', strtotime($sub['created_at'])) ?></td>
                <td>
                    <span class="status-badge <?= $sub['status'] === 'active' ? 'status-active' : 'status-new' ?>">
                        <?= ucfirst($sub['status']) ?>
                    </span>
                </td>
                <td style="text-align:right;">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <?php if ($sub['status'] === 'active'): ?>
                            <form method="POST" action="/admin/subscribers" class="action-form-inline">
                                <input type="hidden" name="action" value="unsubscribe">
                                <input type="hidden" name="subscriber_id" value="<?= $sub['id'] ?>">
                                <button type="submit"><i class="fas fa-ban"></i> Unsubscribe</button>
                            </form>
                            <?php else: ?>
                            <form method="POST" action="/admin/subscribers" class="action-form-inline">
                                <input type="hidden" name="action" value="resubscribe">
                                <input type="hidden" name="subscriber_id" value="<?= $sub['id'] ?>">
                                <button type="submit"><i class="fas fa-check"></i> Reactivate</button>
                            </form>
                            <?php endif; ?>
                            <div class="action-divider"></div>
                            <form method="POST" action="/admin/subscribers" class="action-form-inline">
                                <input type="hidden" name="action" value="delete_subscriber">
                                <input type="hidden" name="subscriber_id" value="<?= $sub['id'] ?>">
                                <button type="submit" class="action-delete" onclick="return confirm('Delete this subscriber?')"><i class="fas fa-trash"></i> Delete</button>
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
