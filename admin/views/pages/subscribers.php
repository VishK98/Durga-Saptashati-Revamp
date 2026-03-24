<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-envelope-open-text" style="color:#059669;margin-right:8px;"></i> Newsletter Subscribers</h4>
        <span class="status-badge status-active">12 Total</span>
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
            <tr>
                <td>1</td>
                <td>user1@example.com</td>
                <td><?= date('M d, Y') ?></td>
                <td><span class="status-badge status-active">Active</span></td>
                <td style="text-align:right;">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="#"><i class="fas fa-eye"></i> View</a>
                            <div class="action-divider"></div>
                            <button class="action-delete"><i class="fas fa-trash"></i> Remove</button>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>user2@example.com</td>
                <td><?= date('M d, Y', strtotime('-3 days')) ?></td>
                <td><span class="status-badge status-active">Active</span></td>
                <td style="text-align:right;">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="#"><i class="fas fa-eye"></i> View</a>
                            <div class="action-divider"></div>
                            <button class="action-delete"><i class="fas fa-trash"></i> Remove</button>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>user3@example.com</td>
                <td><?= date('M d, Y', strtotime('-7 days')) ?></td>
                <td><span class="status-badge status-active">Active</span></td>
                <td style="text-align:right;">
                    <div class="action-wrap">
                        <button class="action-trigger" onclick="toggleActionMenu(this)"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="action-menu">
                            <a href="#"><i class="fas fa-eye"></i> View</a>
                            <div class="action-divider"></div>
                            <button class="action-delete"><i class="fas fa-trash"></i> Remove</button>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
