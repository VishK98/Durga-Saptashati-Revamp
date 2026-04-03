<link rel="stylesheet" href="../admin/assets/css/dashboard.css">

<!-- Greeting -->
<?php
$istTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$hour = (int) $istTime->format('G');
$greetText = $hour < 12 ? 'Good Morning' : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
?>
<div class="db-greeting">
    <div>
        <h2><?= $greetText ?></h2>
        <p>We're glad to have you back &mdash; <?= APP_NAME ?>.</p>
    </div>
    <span class="db-date-badge">
        <i class="far fa-calendar-alt"></i><?= $istTime->format('l, j F Y') ?>
    </span>
</div>

<?php
// Dynamic dashboard counts - all wrapped in try/catch for safety
try {
    $dBlogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
} catch (Exception $e) {
    $dBlogCount = 0;
}
try {
    $dCommentCount = $pdo->query("SELECT COUNT(*) FROM blog_comments")->fetchColumn();
} catch (Exception $e) {
    $dCommentCount = 0;
}
try {
    $dQueryCount = $pdo->query("SELECT COUNT(*) FROM contact_queries")->fetchColumn();
} catch (Exception $e) {
    $dQueryCount = 0;
}
try {
    $dSubCount = $pdo->query("SELECT COUNT(*) FROM subscribers")->fetchColumn();
} catch (Exception $e) {
    $dSubCount = 0;
}
try {
    $dDonationTotal = (float) $pdo->query("SELECT COALESCE(SUM(amount),0) FROM donations WHERE status='completed'")->fetchColumn();
} catch (Exception $e) {
    $dDonationTotal = 0;
}
try {
    $dDonationCount = $pdo->query("SELECT COUNT(*) FROM donations")->fetchColumn();
} catch (Exception $e) {
    $dDonationCount = 0;
}
try {
    $dEventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
} catch (Exception $e) {
    $dEventCount = 0;
}
try {
    $dMemberCount = $pdo->query("SELECT COUNT(*) FROM members")->fetchColumn();
} catch (Exception $e) {
    $dMemberCount = 0;
}
try {
    $dApprovedMembers = $pdo->query("SELECT COUNT(*) FROM members WHERE status='approved'")->fetchColumn();
} catch (Exception $e) {
    $dApprovedMembers = 0;
}
try {
    $dPendingMembers = $pdo->query("SELECT COUNT(*) FROM members WHERE status='pending'")->fetchColumn();
} catch (Exception $e) {
    $dPendingMembers = 0;
}
try {
    $dVolunteerCount = $pdo->query("SELECT COUNT(*) FROM volunteers")->fetchColumn();
} catch (Exception $e) {
    $dVolunteerCount = 0;
}
try {
    $dPendingDonations = $pdo->query("SELECT COUNT(*) FROM donations WHERE status='pending'")->fetchColumn();
} catch (Exception $e) {
    $dPendingDonations = 0;
}
try {
    $dCompletedDonations = $pdo->query("SELECT COUNT(*) FROM donations WHERE status='completed'")->fetchColumn();
} catch (Exception $e) {
    $dCompletedDonations = 0;
}
try {
    $dGalleryCount = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn();
} catch (Exception $e) {
    $dGalleryCount = 0;
}
try {
    $dNewsCount = $pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
} catch (Exception $e) {
    $dNewsCount = 0;
}

// Monthly donation data (last 6 months)
$monthlyDonations = [];
for ($i = 5; $i >= 0; $i--) {
    $monthStart = date('Y-m-01', strtotime("-$i months"));
    $monthEnd = date('Y-m-t', strtotime("-$i months"));
    $monthLabel = date('M Y', strtotime("-$i months"));
    try {
        $amt = (float) $pdo->query("SELECT COALESCE(SUM(amount),0) FROM donations WHERE status='completed' AND created_at BETWEEN '$monthStart' AND '$monthEnd 23:59:59'")->fetchColumn();
    } catch (Exception $e) {
        $amt = 0;
    }
    $monthlyDonations[] = ['label' => $monthLabel, 'amount' => $amt];
}

// Monthly members data (last 6 months)
$monthlyMembers = [];
for ($i = 5; $i >= 0; $i--) {
    $monthStart = date('Y-m-01', strtotime("-$i months"));
    $monthEnd = date('Y-m-t', strtotime("-$i months"));
    $monthLabel = date('M', strtotime("-$i months"));
    try {
        $cnt = (int) $pdo->query("SELECT COUNT(*) FROM members WHERE created_at BETWEEN '$monthStart' AND '$monthEnd 23:59:59'")->fetchColumn();
    } catch (Exception $e) {
        $cnt = 0;
    }
    $monthlyMembers[] = ['label' => $monthLabel, 'count' => $cnt];
}

// Recent donations for table
try {
    $recentDonationsList = $pdo->query("SELECT name, email, amount, status, payment_method, created_at FROM donations ORDER BY created_at DESC LIMIT 5")->fetchAll();
} catch (Exception $e) {
    $recentDonationsList = [];
}

// Pending members for quick list
try {
    $pendingMembersList = $pdo->query("SELECT full_name, membership_type, email, created_at FROM members WHERE status='pending' ORDER BY created_at DESC LIMIT 5")->fetchAll();
} catch (Exception $e) {
    $pendingMembersList = [];
}
?>

<!-- Stat Cards -->
<div class="db-stats-grid">

    <!-- Total Members -->
    <div class="db-stat-card db-stat-card--green">
        <div class="db-stat-circle-lg"></div>
        <div class="db-stat-circle-sm"></div>
        <div class="db-stat-icon-wrap">
            <i class="fas fa-id-card"></i>
        </div>
        <h3 class="db-stat-value"><?= $dMemberCount ?></h3>
        <p class="db-stat-label">Total Members</p>
        <div class="db-stat-footer">
            <span><i class="fas fa-check-circle"></i> <?= $dApprovedMembers ?> approved</span>
            <span><i class="fas fa-clock"></i> <?= $dPendingMembers ?> pending</span>
        </div>
    </div>

    <!-- Blogs -->
    <div class="db-stat-card db-stat-card--yellow">
        <div class="db-stat-circle-lg"></div>
        <div class="db-stat-circle-sm"></div>
        <div class="db-stat-icon-wrap">
            <i class="fas fa-blog"></i>
        </div>
        <h3 class="db-stat-value"><?= $dBlogCount ?></h3>
        <p class="db-stat-label">Blogs</p>
        <div class="db-stat-footer">
            <span><i class="fas fa-comment-dots"></i> <?= $dCommentCount ?> comments</span>
        </div>
    </div>

    <!-- Queries -->
    <div class="db-stat-card db-stat-card--purple">
        <div class="db-stat-circle-lg"></div>
        <div class="db-stat-circle-sm"></div>
        <div class="db-stat-icon-wrap">
            <i class="fas fa-comments"></i>
        </div>
        <h3 class="db-stat-value"><?= $dQueryCount ?></h3>
        <p class="db-stat-label">Queries</p>
        <div class="db-stat-footer">
            <span><i class="fas fa-envelope"></i> <?= $dSubCount ?> subscribers</span>
        </div>
    </div>

    <!-- Gallery -->
    <div class="db-stat-card db-stat-card--blue">
        <div class="db-stat-circle-lg"></div>
        <div class="db-stat-circle-sm"></div>
        <div class="db-stat-icon-wrap">
            <i class="fas fa-images"></i>
        </div>
        <h3 class="db-stat-value"><?= $dGalleryCount ?></h3>
        <p class="db-stat-label">Gallery</p>
        <div class="db-stat-footer">
            <span><i class="fas fa-camera"></i> Photos uploaded</span>
        </div>
    </div>
</div>


<!-- Charts Row -->
<div class="db-charts-row">
    <!-- Donation Chart -->
    <div class="db-chart-card">
        <div class="db-chart-header">
            <div>
                <h4 class="db-chart-title">Donation Overview</h4>
                <p class="db-chart-subtitle">Last 6 months</p>
            </div>
        </div>
        <div id="donationChart"></div>
    </div>

    <!-- Members Donut -->
    <div class="db-chart-card">
        <h4 class="db-chart-title db-chart-title--spaced">Member Status</h4>
        <p class="db-chart-subtitle db-chart-subtitle--spaced">Total: <?= $dMemberCount ?></p>
        <div id="memberDonut"></div>
    </div>
</div>

<!-- Second Charts Row -->
<div class="db-charts-row-equal">
    <!-- Monthly Members Bar Chart -->
    <div class="db-chart-card">
        <h4 class="db-chart-title db-chart-title--spaced">New Members</h4>
        <p class="db-chart-subtitle db-chart-subtitle--spaced">Monthly signups (last 6 months)</p>
        <div id="membersBarChart"></div>
    </div>

    <!-- Content Overview -->
    <div class="db-chart-card">
        <h4 class="db-chart-title db-chart-title--spaced">Content Overview</h4>
        <p class="db-chart-subtitle db-chart-subtitle--spaced">Distribution across categories</p>
        <div id="contentPie"></div>
    </div>
</div>

<!-- Bottom Grid: Recent Donations + Pending Members -->
<div class="db-bottom-grid">

    <!-- Recent Donations Table -->
    <div class="db-table-card">
        <div class="db-table-header">
            <h4>Recent Donations</h4>
            <a href="admin/donations" class="db-table-link">View All
                <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-table-body">
            <?php if (empty($recentDonationsList)): ?>
            <p class="db-empty-text--center">No donations yet.</p>
            <?php else: ?>
            <table class="db-donation-table">
                <thead>
                    <tr>
                        <th class="db-donation-th db-donation-th--left">Donor</th>
                        <th class="db-donation-th db-donation-th--right">Amount</th>
                        <th class="db-donation-th db-donation-th--center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentDonationsList as $don): ?>
                    <tr class="db-donation-row">
                        <td>
                            <div class="db-donor-name"><?= htmlspecialchars($don['name']) ?></div>
                            <div class="db-donor-date"><?= date('d M Y', strtotime($don['created_at'])) ?></div>
                        </td>
                        <td class="db-donation-amount">&#8377;<?= number_format($don['amount'], 0) ?></td>
                        <td class="db-donation-status">
                            <span
                                class="db-badge db-badge-<?= $don['status'] === 'completed' ? 'completed' : 'pending' ?>">
                                <?= ucfirst($don['status']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pending Members -->
    <div class="db-table-card">
        <div class="db-table-header">
            <h4>Pending Members</h4>
            <a href="admin/members" class="db-table-link">Manage <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-table-body">
            <?php if (empty($pendingMembersList)): ?>
            <div class="db-empty-state">
                <i class="fas fa-check-circle db-empty-icon"></i>
                <p class="db-empty-text">All caught up! No pending members.</p>
            </div>
            <?php else: ?>
            <?php foreach ($pendingMembersList as $pm): ?>
            <div class="db-pending-item">
                <div class="db-pending-icon-wrap">
                    <i class="fas fa-user-clock"></i>
                </div>
                <div class="db-pending-info">
                    <div class="db-pending-name"><?= htmlspecialchars($pm['full_name']) ?></div>
                    <div class="db-pending-meta">
                        <?= htmlspecialchars($pm['membership_type']) ?> &bull;
                        <?= date('d M', strtotime($pm['created_at'])) ?>
                    </div>
                </div>
                <span class="db-badge-sm db-badge-pending">Pending</span>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<!-- Activity Row: Recent Members + Recent Donations -->
<?php
try {
    $actMembers = $pdo->query("SELECT full_name, membership_type, status, payment_mode, created_at FROM members ORDER BY created_at DESC LIMIT 6")->fetchAll();
} catch (Exception $e) {
    $actMembers = [];
}
try {
    $actDonations = $pdo->query("SELECT name, email, amount, status, payment_method, created_at FROM donations ORDER BY created_at DESC LIMIT 6")->fetchAll();
} catch (Exception $e) {
    $actDonations = [];
}
try {
    $actVolunteers = $pdo->query("SELECT name, email, status, created_at FROM volunteers ORDER BY created_at DESC LIMIT 6")->fetchAll();
} catch (Exception $e) {
    $actVolunteers = [];
}
try {
    $actQueries = $pdo->query("SELECT name, email, subject, status, created_at FROM contact_queries ORDER BY created_at DESC LIMIT 6")->fetchAll();
} catch (Exception $e) {
    $actQueries = [];
}
?>

<div class="db-activity-grid">
    <!-- Recent Members Card -->
    <div class="db-activity-card">
        <div class="db-activity-header">
            <div class="db-activity-header-left">
                <div class="db-activity-icon db-activity-icon--purple">
                    <i class="fas fa-id-card"></i>
                </div>
                <div>
                    <h4 class="db-activity-title">Recent Members</h4>
                    <p class="db-activity-subtitle">Latest membership applications</p>
                </div>
            </div>
            <a href="admin/members" class="db-activity-link">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-activity-body">
            <?php if (empty($actMembers)): ?>
            <div class="db-activity-empty">No members yet.</div>
            <?php else: ?>
            <?php foreach ($actMembers as $idx => $am): ?>
            <div class="db-activity-item">
                <div
                    class="db-avatar db-avatar--<?= $am['status'] === 'approved' ? 'approved' : ($am['status'] === 'pending' ? 'pending' : 'rejected') ?>">
                    <?= strtoupper(mb_substr($am['full_name'], 0, 1)) ?>
                </div>
                <div class="db-item-info">
                    <div class="db-item-name"><?= htmlspecialchars($am['full_name']) ?></div>
                    <div class="db-item-meta">
                        <span><?= htmlspecialchars($am['membership_type']) ?></span>
                        <span class="db-dot">&bull;</span>
                        <span><?= $am['payment_mode'] ?></span>
                    </div>
                </div>
                <div class="db-item-right">
                    <span
                        class="db-badge-sm db-badge-<?= $am['status'] === 'approved' ? 'approved' : ($am['status'] === 'pending' ? 'pending' : 'rejected') ?>">
                        <?= ucfirst($am['status']) ?>
                    </span>
                    <div class="db-item-date"><?= date('d M, h:i A', strtotime($am['created_at'])) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Donations Card -->
    <div class="db-activity-card">
        <div class="db-activity-header">
            <div class="db-activity-header-left">
                <div class="db-activity-icon db-activity-icon--green">
                    <i class="fas fa-donate"></i>
                </div>
                <div>
                    <h4 class="db-activity-title">Recent Donations</h4>
                    <p class="db-activity-subtitle">Latest donation transactions</p>
                </div>
            </div>
            <a href="admin/donations" class="db-activity-link">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-activity-body">
            <?php if (empty($actDonations)): ?>
            <div class="db-activity-empty">No donations yet.</div>
            <?php else: ?>
            <?php foreach ($actDonations as $idx => $ad): ?>
            <div class="db-activity-item">
                <div class="db-avatar db-avatar--<?= $ad['status'] === 'completed' ? 'completed' : 'pending' ?>">
                    <?= strtoupper(mb_substr($ad['name'], 0, 1)) ?>
                </div>
                <div class="db-item-info">
                    <div class="db-item-name"><?= htmlspecialchars($ad['name']) ?></div>
                    <div class="db-item-meta-single"><?= htmlspecialchars($ad['email']) ?></div>
                </div>
                <div class="db-item-right">
                    <div class="db-item-amount">&#8377;<?= number_format($ad['amount'], 0) ?></div>
                    <span class="db-badge-xs db-badge-<?= $ad['status'] === 'completed' ? 'completed' : 'pending' ?>">
                        <?= ucfirst($ad['status']) ?>
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Second Activity Row: Volunteers + Queries -->
<div class="db-activity-grid--mt20">
    <!-- Recent Volunteers Card -->
    <div class="db-activity-card">
        <div class="db-activity-header">
            <div class="db-activity-header-left">
                <div class="db-activity-icon db-activity-icon--pink">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div>
                    <h4 class="db-activity-title">Recent Volunteers</h4>
                    <p class="db-activity-subtitle">Latest volunteer applications</p>
                </div>
            </div>
            <a href="admin/volunteers" class="db-activity-link">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-activity-body">
            <?php if (empty($actVolunteers)): ?>
            <div class="db-activity-empty">
                <i class="fas fa-user-plus db-activity-empty-icon"></i>
                <p class="db-activity-empty-text">No volunteer applications yet.</p>
            </div>
            <?php else: ?>
            <?php foreach ($actVolunteers as $av): ?>
            <div class="db-activity-item">
                <div class="db-avatar db-avatar--pink">
                    <?= strtoupper(mb_substr($av['name'], 0, 1)) ?>
                </div>
                <div class="db-item-info">
                    <div class="db-item-name"><?= htmlspecialchars($av['name']) ?></div>
                    <div class="db-item-meta-single"><?= htmlspecialchars($av['email']) ?></div>
                </div>
                <div class="db-item-right">
                    <span
                        class="db-badge-sm db-badge-<?= $av['status'] === 'approved' ? 'approved' : ($av['status'] === 'pending' ? 'pending' : 'rejected') ?>">
                        <?= ucfirst($av['status']) ?>
                    </span>
                    <div class="db-item-date"><?= date('d M, h:i A', strtotime($av['created_at'])) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Queries Card -->
    <div class="db-activity-card">
        <div class="db-activity-header">
            <div class="db-activity-header-left">
                <div class="db-activity-icon db-activity-icon--blue">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h4 class="db-activity-title">Recent Queries</h4>
                    <p class="db-activity-subtitle">Latest contact form submissions</p>
                </div>
            </div>
            <a href="admin/queries" class="db-activity-link">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="db-activity-body">
            <?php if (empty($actQueries)): ?>
            <div class="db-activity-empty">
                <i class="fas fa-inbox db-activity-empty-icon"></i>
                <p class="db-activity-empty-text">No queries yet.</p>
            </div>
            <?php else: ?>
            <?php foreach ($actQueries as $aq): ?>
            <div class="db-activity-item">
                <div class="db-avatar db-avatar--blue">
                    <?= strtoupper(mb_substr($aq['name'], 0, 1)) ?>
                </div>
                <div class="db-item-info">
                    <div class="db-item-name"><?= htmlspecialchars($aq['name']) ?></div>
                    <div class="db-item-meta-ellipsis"><?= htmlspecialchars($aq['subject'] ?? $aq['email']) ?></div>
                </div>
                <div class="db-item-right">
                    <span
                        class="db-badge-sm db-badge-<?= $aq['status'] === 'replied' ? 'replied' : ($aq['status'] === 'new' ? 'new' : 'read') ?>">
                        <?= ucfirst($aq['status']) ?>
                    </span>
                    <div class="db-item-date"><?= date('d M, h:i A', strtotime($aq['created_at'])) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ApexCharts CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.49.0/dist/apexcharts.min.js"></script>
<script>
var chartData = {
    donationAmounts: <?= json_encode(array_column($monthlyDonations, 'amount')) ?>,
    donationLabels: <?= json_encode(array_column($monthlyDonations, 'label')) ?>,
    memberCounts: <?= json_encode(array_column($monthlyMembers, 'count')) ?>,
    memberLabels: <?= json_encode(array_column($monthlyMembers, 'label')) ?>,
    approvedMembers: <?= $dApprovedMembers ?>,
    pendingMembers: <?= $dPendingMembers ?>,
    blogCount: <?= $dBlogCount ?>,
    newsCount: <?= $dNewsCount ?>,
    galleryCount: <?= $dGalleryCount ?>,
    eventCount: <?= $dEventCount ?>
};
</script>
<script src="../admin/assets/js/dashboard.js"></script>