<div class="data-panel">
    <div class="data-panel-header">
        <h4><i class="fas fa-comments" style="color:#d97706;margin-right:8px;"></i> Contact Queries</h4>
        <span class="status-badge status-pending">5 Pending</span>
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>Rahul Sharma</strong></td>
                <td>rahul@email.com</td>
                <td>Volunteer Inquiry</td>
                <td><?= date('M d, Y') ?></td>
                <td><span class="status-badge status-new">New</span></td>
                <td>
                    <button class="btn-admin btn-sm btn-outline"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-admin btn-sm btn-success"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td><strong>Priya Gupta</strong></td>
                <td>priya@email.com</td>
                <td>Donation Query</td>
                <td><?= date('M d, Y', strtotime('-1 day')) ?></td>
                <td><span class="status-badge status-new">New</span></td>
                <td>
                    <button class="btn-admin btn-sm btn-outline"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-admin btn-sm btn-success"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td><strong>Amit Kumar</strong></td>
                <td>amit@email.com</td>
                <td>Partnership Opportunity</td>
                <td><?= date('M d, Y', strtotime('-2 days')) ?></td>
                <td><span class="status-badge status-pending">Pending</span></td>
                <td>
                    <button class="btn-admin btn-sm btn-outline"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-admin btn-sm btn-success"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td><strong>Sneha Patel</strong></td>
                <td>sneha@email.com</td>
                <td>Self-defence Classes</td>
                <td><?= date('M d, Y', strtotime('-3 days')) ?></td>
                <td><span class="status-badge status-pending">Pending</span></td>
                <td>
                    <button class="btn-admin btn-sm btn-outline"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-admin btn-sm btn-success"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td><strong>Vikram Singh</strong></td>
                <td>vikram@email.com</td>
                <td>Event Sponsorship</td>
                <td><?= date('M d, Y', strtotime('-5 days')) ?></td>
                <td><span class="status-badge status-active">Replied</span></td>
                <td>
                    <button class="btn-admin btn-sm btn-outline"><i class="fas fa-eye"></i> View</button>
                    <button class="btn-admin btn-sm btn-success"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
