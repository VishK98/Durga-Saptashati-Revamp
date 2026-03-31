<!-- Greeting -->
<?php
$istTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$hour = (int)$istTime->format('G');
$greetText = $hour < 12 ? 'Good Morning' : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
?>
<div class="greeting-section" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;">
    <div>
        <h2><?= $greetText ?></h2>
        <p>We're glad to have you back &mdash; <?= APP_NAME ?>.</p>
    </div>
    <span style="background:var(--card-bg);border:1px solid var(--border);padding:8px 16px;border-radius:10px;font-size:0.82rem;color:var(--text-secondary);font-weight:500;">
        <i class="far fa-calendar-alt" style="margin-right:6px;color:var(--accent);"></i><?= $istTime->format('l, j F Y') ?>
    </span>
</div>

<?php
// Dynamic dashboard counts
$dBlogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$dCommentCount = $pdo->query("SELECT COUNT(*) FROM blog_comments")->fetchColumn();
try { $dQueryCount = $pdo->query("SELECT COUNT(*) FROM contact_queries")->fetchColumn(); } catch(Exception $e) { $dQueryCount = 0; }
try { $dSubCount = $pdo->query("SELECT COUNT(*) FROM subscribers")->fetchColumn(); } catch(Exception $e) { $dSubCount = 0; }
try { $dDonationTotal = (float)$pdo->query("SELECT COALESCE(SUM(amount),0) FROM donations WHERE status='completed'")->fetchColumn(); } catch(Exception $e) { $dDonationTotal = 0; }
try { $dDonationCount = $pdo->query("SELECT COUNT(*) FROM donations")->fetchColumn(); } catch(Exception $e) { $dDonationCount = 0; }
try { $dEventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn(); } catch(Exception $e) { $dEventCount = 0; }
try { $dMemberCount = $pdo->query("SELECT COUNT(*) FROM members")->fetchColumn(); } catch(Exception $e) { $dMemberCount = 0; }
try { $dApprovedMembers = $pdo->query("SELECT COUNT(*) FROM members WHERE status='approved'")->fetchColumn(); } catch(Exception $e) { $dApprovedMembers = 0; }
try { $dPendingMembers = $pdo->query("SELECT COUNT(*) FROM members WHERE status='pending'")->fetchColumn(); } catch(Exception $e) { $dPendingMembers = 0; }
try { $dVolunteerCount = $pdo->query("SELECT COUNT(*) FROM volunteers")->fetchColumn(); } catch(Exception $e) { $dVolunteerCount = 0; }
try { $dPendingDonations = $pdo->query("SELECT COUNT(*) FROM donations WHERE status='pending'")->fetchColumn(); } catch(Exception $e) { $dPendingDonations = 0; }
try { $dCompletedDonations = $pdo->query("SELECT COUNT(*) FROM donations WHERE status='completed'")->fetchColumn(); } catch(Exception $e) { $dCompletedDonations = 0; }
try { $dGalleryCount = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn(); } catch(Exception $e) { $dGalleryCount = 0; }
try { $dNewsCount = $pdo->query("SELECT COUNT(*) FROM news")->fetchColumn(); } catch(Exception $e) { $dNewsCount = 0; }

// Monthly donation data (last 6 months)
$monthlyDonations = [];
for ($i = 5; $i >= 0; $i--) {
    $monthStart = date('Y-m-01', strtotime("-$i months"));
    $monthEnd = date('Y-m-t', strtotime("-$i months"));
    $monthLabel = date('M Y', strtotime("-$i months"));
    try {
        $amt = (float)$pdo->query("SELECT COALESCE(SUM(amount),0) FROM donations WHERE status='completed' AND created_at BETWEEN '$monthStart' AND '$monthEnd 23:59:59'")->fetchColumn();
    } catch(Exception $e) { $amt = 0; }
    $monthlyDonations[] = ['label' => $monthLabel, 'amount' => $amt];
}

// Monthly members data (last 6 months)
$monthlyMembers = [];
for ($i = 5; $i >= 0; $i--) {
    $monthStart = date('Y-m-01', strtotime("-$i months"));
    $monthEnd = date('Y-m-t', strtotime("-$i months"));
    $monthLabel = date('M', strtotime("-$i months"));
    try {
        $cnt = (int)$pdo->query("SELECT COUNT(*) FROM members WHERE created_at BETWEEN '$monthStart' AND '$monthEnd 23:59:59'")->fetchColumn();
    } catch(Exception $e) { $cnt = 0; }
    $monthlyMembers[] = ['label' => $monthLabel, 'count' => $cnt];
}

// Recent donations for table
try {
    $recentDonationsList = $pdo->query("SELECT name, email, amount, status, payment_method, created_at FROM donations ORDER BY created_at DESC LIMIT 5")->fetchAll();
} catch(Exception $e) { $recentDonationsList = []; }

// Pending members for quick list
try {
    $pendingMembersList = $pdo->query("SELECT full_name, membership_type, email, created_at FROM members WHERE status='pending' ORDER BY created_at DESC LIMIT 5")->fetchAll();
} catch(Exception $e) { $pendingMembersList = []; }
?>

<!-- Revenue Highlight Card -->
<div style="margin-top:20px;background:linear-gradient(135deg, #1a1b2e 0%, #2d2e4a 60%, #f26522 100%);border-radius:18px;padding:30px 35px;color:#fff;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;">
    <div>
        <p style="font-size:0.82rem;opacity:0.7;margin-bottom:4px;text-transform:uppercase;letter-spacing:2px;font-weight:600;">Total Revenue Collected</p>
        <h2 style="font-size:2.4rem;font-weight:800;margin:0;letter-spacing:-1px;">&#8377;<?= number_format($dDonationTotal, 0) ?></h2>
        <p style="font-size:0.82rem;opacity:0.6;margin-top:6px;"><i class="fas fa-check-circle" style="color:#10b981;"></i> <?= $dCompletedDonations ?> completed &nbsp;&bull;&nbsp; <i class="fas fa-clock" style="color:#f59e0b;"></i> <?= $dPendingDonations ?> pending</p>
    </div>
    <div style="display:flex;gap:15px;flex-wrap:wrap;">
        <div style="background:rgba(255,255,255,0.12);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.15);border-radius:14px;padding:18px 22px;text-align:center;min-width:110px;">
            <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dMemberCount ?></h3>
            <p style="font-size:0.75rem;opacity:0.7;margin-top:3px;">Members</p>
        </div>
        <div style="background:rgba(255,255,255,0.12);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.15);border-radius:14px;padding:18px 22px;text-align:center;min-width:110px;">
            <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dVolunteerCount ?></h3>
            <p style="font-size:0.75rem;opacity:0.7;margin-top:3px;">Volunteers</p>
        </div>
        <div style="background:rgba(255,255,255,0.12);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.15);border-radius:14px;padding:18px 22px;text-align:center;min-width:110px;">
            <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dDonationCount ?></h3>
            <p style="font-size:0.75rem;opacity:0.7;margin-top:3px;">Donations</p>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="stat-cards" style="grid-template-columns:repeat(4,1fr);margin-top:20px;">
    <div class="stat-card" style="border-left:3px solid var(--accent);">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-blog"></i></div>
        <div class="stat-info"><h3><?= $dBlogCount ?></h3><p>Blogs</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid #d97706;">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-comment-dots"></i></div>
        <div class="stat-info"><h3><?= $dCommentCount ?></h3><p>Comments</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid #059669;">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-id-card"></i></div>
        <div class="stat-info">
            <h3><?= $dApprovedMembers ?><span style="font-size:0.7rem;color:var(--text-muted);font-weight:400;">/ <?= $dMemberCount ?></span></h3>
            <p>Approved Members</p>
        </div>
    </div>
    <div class="stat-card" style="border-left:3px solid #2563eb;">
        <div class="stat-icon" style="background:var(--info-light);color:#2563eb;"><i class="fas fa-donate"></i></div>
        <div class="stat-info"><h3>&#8377;<?= number_format($dDonationTotal, 0) ?></h3><p>Donations</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid var(--purple);">
        <div class="stat-icon" style="background:var(--purple-light);color:var(--purple);"><i class="fas fa-comments"></i></div>
        <div class="stat-info"><h3><?= $dQueryCount ?></h3><p>Queries</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid var(--pink);">
        <div class="stat-icon" style="background:var(--pink-light);color:var(--pink);"><i class="fas fa-envelope"></i></div>
        <div class="stat-info"><h3><?= $dSubCount ?></h3><p>Subscribers</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid #0ea5e9;">
        <div class="stat-icon" style="background:rgba(14,165,233,0.1);color:#0ea5e9;"><i class="fas fa-newspaper"></i></div>
        <div class="stat-info"><h3><?= $dNewsCount ?></h3><p>News</p></div>
    </div>
    <div class="stat-card" style="border-left:3px solid #14b8a6;">
        <div class="stat-icon" style="background:rgba(20,184,166,0.1);color:#14b8a6;"><i class="fas fa-images"></i></div>
        <div class="stat-info"><h3><?= $dGalleryCount ?></h3><p>Gallery</p></div>
    </div>
</div>

<!-- Charts Row -->
<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-top:25px;">
    <!-- Donation Chart -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <div>
                <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0;">Donation Overview</h4>
                <p style="font-size:0.78rem;color:var(--text-muted);margin-top:2px;">Last 6 months</p>
            </div>
            <div style="display:flex;align-items:center;gap:12px;font-size:0.75rem;">
                <span style="display:flex;align-items:center;gap:4px;"><span style="width:8px;height:8px;border-radius:50%;background:var(--accent);display:inline-block;"></span> Revenue</span>
            </div>
        </div>
        <canvas id="donationChart" height="220"></canvas>
    </div>

    <!-- Members Donut -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">Member Status</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:15px;">Total: <?= $dMemberCount ?></p>
        <canvas id="memberDonut" height="200"></canvas>
        <div style="display:flex;justify-content:center;gap:20px;margin-top:15px;font-size:0.78rem;">
            <span style="display:flex;align-items:center;gap:5px;"><span style="width:10px;height:10px;border-radius:3px;background:#10b981;display:inline-block;"></span> Approved (<?= $dApprovedMembers ?>)</span>
            <span style="display:flex;align-items:center;gap:5px;"><span style="width:10px;height:10px;border-radius:3px;background:#f59e0b;display:inline-block;"></span> Pending (<?= $dPendingMembers ?>)</span>
        </div>
    </div>
</div>

<!-- Second Charts Row -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:20px;">
    <!-- Monthly Members Bar Chart -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">New Members</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:15px;">Monthly signups (last 6 months)</p>
        <canvas id="membersBarChart" height="180"></canvas>
    </div>

    <!-- Activity Breakdown Pie -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">Content Overview</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:15px;">Distribution across categories</p>
        <canvas id="contentPie" height="180"></canvas>
    </div>
</div>

<!-- Bottom Grid: Recent Donations + Pending Members + Quick Actions -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:25px;">

    <!-- Recent Donations Table -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:20px 24px 0;display:flex;align-items:center;justify-content:space-between;">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Donations</h4>
            <a href="admin.php?page=donations" style="font-size:0.78rem;color:var(--accent);font-weight:600;">View All <i class="fas fa-arrow-right" style="font-size:0.65rem;"></i></a>
        </div>
        <div style="padding:15px 24px 20px;">
            <?php if (empty($recentDonationsList)): ?>
                <p style="color:var(--text-muted);font-size:0.85rem;text-align:center;padding:20px 0;">No donations yet.</p>
            <?php else: ?>
            <table style="width:100%;border-collapse:collapse;font-size:0.82rem;">
                <thead>
                    <tr style="border-bottom:2px solid var(--border);">
                        <th style="text-align:left;padding:8px 0;color:var(--text-muted);font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.5px;">Donor</th>
                        <th style="text-align:right;padding:8px 0;color:var(--text-muted);font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.5px;">Amount</th>
                        <th style="text-align:center;padding:8px 0;color:var(--text-muted);font-weight:600;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.5px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentDonationsList as $don): ?>
                    <tr style="border-bottom:1px solid #f3f4f6;">
                        <td style="padding:10px 0;">
                            <div style="font-weight:600;color:var(--text-primary);"><?= htmlspecialchars($don['name']) ?></div>
                            <div style="font-size:0.72rem;color:var(--text-muted);"><?= date('d M Y', strtotime($don['created_at'])) ?></div>
                        </td>
                        <td style="text-align:right;font-weight:700;color:var(--text-primary);">&#8377;<?= number_format($don['amount'], 0) ?></td>
                        <td style="text-align:center;">
                            <span style="padding:3px 10px;border-radius:20px;font-size:0.7rem;font-weight:600;
                                background:<?= $don['status']==='completed' ? 'var(--success-light)' : 'var(--warning-light)' ?>;
                                color:<?= $don['status']==='completed' ? '#059669' : '#d97706' ?>;">
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
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:20px 24px 0;display:flex;align-items:center;justify-content:space-between;">
            <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0;">Pending Members</h4>
            <a href="admin.php?page=members" style="font-size:0.78rem;color:var(--accent);font-weight:600;">Manage <i class="fas fa-arrow-right" style="font-size:0.65rem;"></i></a>
        </div>
        <div style="padding:15px 24px 20px;">
            <?php if (empty($pendingMembersList)): ?>
                <div style="text-align:center;padding:25px 0;">
                    <i class="fas fa-check-circle" style="font-size:2rem;color:#10b981;margin-bottom:8px;display:block;"></i>
                    <p style="color:var(--text-muted);font-size:0.85rem;">All caught up! No pending members.</p>
                </div>
            <?php else: ?>
                <?php foreach ($pendingMembersList as $pm): ?>
                <div style="display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f3f4f6;">
                    <div style="width:36px;height:36px;border-radius:10px;background:var(--warning-light);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas fa-user-clock" style="color:#d97706;font-size:0.85rem;"></i>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:600;font-size:0.85rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($pm['full_name']) ?></div>
                        <div style="font-size:0.72rem;color:var(--text-muted);"><?= htmlspecialchars($pm['membership_type']) ?> &bull; <?= date('d M', strtotime($pm['created_at'])) ?></div>
                    </div>
                    <span style="padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:600;background:var(--warning-light);color:#d97706;">Pending</span>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <h4>Quick Actions</h4>
    <div class="action-cards">
        <a href="admin.php?page=blogs" class="action-card">
            <div class="action-icon" style="background:var(--accent-light);color:var(--accent);">
                <i class="fas fa-pen-fancy"></i>
            </div>
            <div class="action-text">
                <h6>Create New Blog</h6>
                <p>Write and publish a new blog post</p>
            </div>
        </a>
        <a href="admin.php?page=members" class="action-card">
            <div class="action-icon" style="background:var(--success-light);color:#059669;">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="action-text">
                <h6>Manage Members</h6>
                <p>Review pending applications</p>
            </div>
        </a>
        <a href="admin.php?page=donations" class="action-card">
            <div class="action-icon" style="background:var(--info-light);color:#2563eb;">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="action-text">
                <h6>View Donations</h6>
                <p>Track and manage donations</p>
            </div>
        </a>
        <a href="admin.php?page=queries" class="action-card">
            <div class="action-icon" style="background:var(--warning-light);color:#d97706;">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div class="action-text">
                <h6>View Queries</h6>
                <p>Review and respond to queries</p>
            </div>
        </a>
        <a href="admin.php?page=gallery" class="action-card">
            <div class="action-icon" style="background:var(--purple-light);color:var(--purple);">
                <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <div class="action-text">
                <h6>Upload Photos</h6>
                <p>Add images to the gallery</p>
            </div>
        </a>
        <a href="admin.php?page=volunteers" class="action-card">
            <div class="action-icon" style="background:var(--pink-light);color:var(--pink);">
                <i class="fas fa-hands-helping"></i>
            </div>
            <div class="action-text">
                <h6>Volunteers</h6>
                <p>Manage volunteer applications</p>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="recent-activity">
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:15px;">
        <h4 style="margin:0;">Recent Activity</h4>
        <span style="font-size:0.75rem;color:var(--text-muted);"><i class="fas fa-history" style="margin-right:4px;"></i> Last 10 activities</span>
    </div>
    <div class="activity-list">
        <?php
        $activities = [];

        $recentBlogs = $pdo->query("SELECT title, status, created_at FROM blogs ORDER BY created_at DESC LIMIT 5")->fetchAll();
        foreach ($recentBlogs as $b) {
            $activities[] = [
                'icon' => 'fa-blog', 'icon_bg' => 'var(--accent-light)', 'icon_color' => 'var(--accent)',
                'text' => 'Blog post ' . ($b['status'] === 'published' ? 'published' : 'drafted') . ': ' . $b['title'],
                'time' => $b['created_at'],
                'badge' => ucfirst($b['status']),
                'badge_bg' => $b['status'] === 'published' ? 'var(--info-light)' : '#f3f4f6',
                'badge_color' => $b['status'] === 'published' ? '#2563eb' : '#6b7280'
            ];
        }

        $recentComments = $pdo->query("SELECT c.name, c.status, c.created_at, b.title as blog_title FROM blog_comments c LEFT JOIN blogs b ON c.blog_id = b.id ORDER BY c.created_at DESC LIMIT 5")->fetchAll();
        foreach ($recentComments as $c) {
            $activities[] = [
                'icon' => 'fa-comment-dots', 'icon_bg' => 'var(--warning-light)', 'icon_color' => '#d97706',
                'text' => 'Comment from ' . $c['name'] . ' on "' . mb_strimwidth($c['blog_title'] ?? '', 0, 40, '...') . '"',
                'time' => $c['created_at'],
                'badge' => ucfirst($c['status']),
                'badge_bg' => $c['status'] === 'approved' ? 'var(--success-light)' : ($c['status'] === 'pending' ? 'var(--warning-light)' : 'var(--danger-light)'),
                'badge_color' => $c['status'] === 'approved' ? '#059669' : ($c['status'] === 'pending' ? '#d97706' : '#dc2626')
            ];
        }

        try {
            $recentDonations = $pdo->query("SELECT name, amount, status, created_at FROM donations ORDER BY created_at DESC LIMIT 5")->fetchAll();
            foreach ($recentDonations as $d) {
                $activities[] = [
                    'icon' => 'fa-donate', 'icon_bg' => 'var(--success-light)', 'icon_color' => '#059669',
                    'text' => 'Donation of ₹' . number_format($d['amount'], 0) . ' by ' . $d['name'],
                    'time' => $d['created_at'],
                    'badge' => ucfirst($d['status']),
                    'badge_bg' => $d['status'] === 'completed' ? 'var(--success-light)' : 'var(--warning-light)',
                    'badge_color' => $d['status'] === 'completed' ? '#059669' : '#d97706'
                ];
            }
        } catch(Exception $e) {}

        try {
            $recentMembers = $pdo->query("SELECT full_name, status, created_at FROM members ORDER BY created_at DESC LIMIT 5")->fetchAll();
            foreach ($recentMembers as $m) {
                $activities[] = [
                    'icon' => 'fa-id-card', 'icon_bg' => 'var(--purple-light)', 'icon_color' => 'var(--purple)',
                    'text' => 'New membership: ' . $m['full_name'],
                    'time' => $m['created_at'],
                    'badge' => ucfirst($m['status']),
                    'badge_bg' => $m['status'] === 'approved' ? 'var(--success-light)' : ($m['status'] === 'pending' ? 'var(--warning-light)' : 'var(--danger-light)'),
                    'badge_color' => $m['status'] === 'approved' ? '#059669' : ($m['status'] === 'pending' ? '#d97706' : '#dc2626')
                ];
            }
        } catch(Exception $e) {}

        usort($activities, function($a, $b) { return strtotime($b['time']) - strtotime($a['time']); });
        $activities = array_slice($activities, 0, 10);
        ?>

        <?php if (empty($activities)): ?>
            <div class="activity-item"><div class="activity-text"><h6 style="color:#999;">No recent activity yet.</h6></div></div>
        <?php else: ?>
            <?php foreach ($activities as $act): ?>
            <div class="activity-item">
                <div class="activity-icon" style="background:<?= $act['icon_bg'] ?>;color:<?= $act['icon_color'] ?>;">
                    <i class="fas <?= $act['icon'] ?>"></i>
                </div>
                <div class="activity-text">
                    <h6><?= htmlspecialchars(mb_strimwidth($act['text'], 0, 70, '...')) ?></h6>
                    <small><i class="far fa-clock"></i> <?= date('j F Y, h:i A', strtotime($act['time'])) ?></small>
                </div>
                <span class="activity-badge" style="background:<?= $act['badge_bg'] ?>;color:<?= $act['badge_color'] ?>;"><?= $act['badge'] ?></span>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
// Donation Area Chart
var donCtx = document.getElementById('donationChart').getContext('2d');
var donGradient = donCtx.createLinearGradient(0, 0, 0, 220);
donGradient.addColorStop(0, 'rgba(242, 101, 34, 0.25)');
donGradient.addColorStop(1, 'rgba(242, 101, 34, 0.01)');

new Chart(donCtx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_column($monthlyDonations, 'label')) ?>,
        datasets: [{
            label: 'Revenue (₹)',
            data: <?= json_encode(array_column($monthlyDonations, 'amount')) ?>,
            borderColor: '#f26522',
            backgroundColor: donGradient,
            borderWidth: 3,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#fff',
            pointBorderColor: '#f26522',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#1a1b2e',
                titleFont: { size: 12, weight: '600' },
                bodyFont: { size: 12 },
                padding: 12,
                cornerRadius: 10,
                callbacks: {
                    label: function(ctx) { return '₹' + ctx.parsed.y.toLocaleString('en-IN'); }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                ticks: { font: { size: 11 }, color: '#9ca3af', callback: function(v) { return '₹' + (v >= 1000 ? (v/1000)+'k' : v); } }
            },
            x: {
                grid: { display: false },
                ticks: { font: { size: 11 }, color: '#9ca3af' }
            }
        }
    }
});

// Member Donut
new Chart(document.getElementById('memberDonut').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: ['Approved', 'Pending'],
        datasets: [{
            data: [<?= $dApprovedMembers ?>, <?= $dPendingMembers ?>],
            backgroundColor: ['#10b981', '#f59e0b'],
            borderWidth: 0,
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: '#1a1b2e',
                padding: 10,
                cornerRadius: 8,
                bodyFont: { size: 12 }
            }
        }
    }
});

// Members Bar Chart
new Chart(document.getElementById('membersBarChart').getContext('2d'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($monthlyMembers, 'label')) ?>,
        datasets: [{
            label: 'New Members',
            data: <?= json_encode(array_column($monthlyMembers, 'count')) ?>,
            backgroundColor: 'rgba(139, 92, 246, 0.7)',
            borderRadius: 8,
            borderSkipped: false,
            barThickness: 28
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { backgroundColor: '#1a1b2e', padding: 10, cornerRadius: 8 }
        },
        scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false }, ticks: { font: { size: 11 }, color: '#9ca3af', stepSize: 1 } },
            x: { grid: { display: false }, ticks: { font: { size: 11 }, color: '#9ca3af' } }
        }
    }
});

// Content Pie
new Chart(document.getElementById('contentPie').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: ['Blogs', 'News', 'Gallery', 'Events'],
        datasets: [{
            data: [<?= $dBlogCount ?>, <?= $dNewsCount ?>, <?= $dGalleryCount ?>, <?= $dEventCount ?>],
            backgroundColor: ['#f26522', '#3b82f6', '#8b5cf6', '#10b981'],
            borderWidth: 0,
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '60%',
        plugins: {
            legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true, pointStyle: 'rectRounded', font: { size: 11 } } },
            tooltip: { backgroundColor: '#1a1b2e', padding: 10, cornerRadius: 8 }
        }
    }
});
</script>

<style>
/* Dashboard responsive overrides */
@media (max-width: 992px) {
    div[style*="grid-template-columns:2fr 1fr"] { grid-template-columns: 1fr !important; }
    div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns: 1fr !important; }
}
</style>
