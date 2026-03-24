<!-- Greeting -->
<div class="greeting-section">
    <h2 id="greetingText"></h2>
    <p>We're glad to have you back &mdash; <?= APP_NAME ?>.</p>
</div>
<script>
function updateGreeting() {
    var now = new Date();
    // Convert to IST (UTC+5:30)
    var utc = now.getTime() + (now.getTimezoneOffset() * 60000);
    var ist = new Date(utc + (5.5 * 3600000));
    var h = ist.getHours();
    var greeting = h < 12 ? 'Good Morning' : h < 17 ? 'Good Afternoon' : 'Good Evening';
    var time = ist.toLocaleTimeString('en-GB', {hour:'2-digit', minute:'2-digit', second:'2-digit'});
    document.getElementById('greetingText').innerHTML = greeting + ' <span class="time">' + time + '</span>';
}
setInterval(updateGreeting, 1000);
updateGreeting();
</script>

<?php
// Dynamic dashboard counts
$dBlogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$dCommentCount = $pdo->query("SELECT COUNT(*) FROM blog_comments")->fetchColumn();
try { $dQueryCount = $pdo->query("SELECT COUNT(*) FROM contact_queries")->fetchColumn(); } catch(Exception $e) { $dQueryCount = 0; }
try { $dSubCount = $pdo->query("SELECT COUNT(*) FROM subscribers")->fetchColumn(); } catch(Exception $e) { $dSubCount = 0; }
try { $dDonationTotal = $pdo->query("SELECT COALESCE(SUM(amount),0) FROM donations WHERE status='completed'")->fetchColumn(); } catch(Exception $e) { $dDonationTotal = 0; }
try { $dDonationCount = $pdo->query("SELECT COUNT(*) FROM donations")->fetchColumn(); } catch(Exception $e) { $dDonationCount = 0; }
try { $dEventCount = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn(); } catch(Exception $e) { $dEventCount = 0; }
try { $dCauseCount = $pdo->query("SELECT COUNT(*) FROM causes")->fetchColumn(); } catch(Exception $e) { $dCauseCount = 0; }
?>

<!-- Stat Cards -->
<div class="stat-cards" style="grid-template-columns:repeat(4,1fr);">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);"><i class="fas fa-blog"></i></div>
        <div class="stat-info"><h3><?= $dBlogCount ?></h3><p>Total Blogs</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;"><i class="fas fa-comment-dots"></i></div>
        <div class="stat-info"><h3><?= $dCommentCount ?></h3><p>Comments</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;"><i class="fas fa-users"></i></div>
        <div class="stat-info"><h3><?= $dBlogCount + $dCommentCount + $dDonationCount ?></h3><p>Total Activities</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--info-light);color:#2563eb;"><i class="fas fa-donate"></i></div>
        <div class="stat-info"><h3><?= $dDonationCount ?></h3><p>Total Donations</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--purple-light);color:var(--purple);"><i class="fas fa-comments"></i></div>
        <div class="stat-info"><h3><?= $dQueryCount ?></h3><p>Queries</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--pink-light);color:var(--pink);"><i class="fas fa-envelope"></i></div>
        <div class="stat-info"><h3><?= $dSubCount ?></h3><p>Subscribers</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(14,165,233,0.1);color:#0ea5e9;"><i class="fas fa-calendar-alt"></i></div>
        <div class="stat-info"><h3><?= $dEventCount ?></h3><p>Events</p></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:rgba(234,88,12,0.1);color:#ea580c;"><i class="fas fa-hand-holding-heart"></i></div>
        <div class="stat-info"><h3><?= $dCauseCount ?></h3><p>Causes</p></div>
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
        <a href="admin.php?page=queries" class="action-card">
            <div class="action-icon" style="background:var(--warning-light);color:#d97706;">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div class="action-text">
                <h6>View Queries</h6>
                <p>Review and respond to queries</p>
            </div>
        </a>
        <a href="admin.php?page=events" class="action-card">
            <div class="action-icon" style="background:var(--info-light);color:#2563eb;">
                <i class="fas fa-calendar-plus"></i>
            </div>
            <div class="action-text">
                <h6>Add Event</h6>
                <p>Create a new upcoming event</p>
            </div>
        </a>
        <a href="admin.php?page=gallery" class="action-card">
            <div class="action-icon" style="background:var(--success-light);color:#059669;">
                <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <div class="action-text">
                <h6>Upload Photos</h6>
                <p>Add images to the gallery</p>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="recent-activity">
    <h4>Recent Activity</h4>
    <div class="activity-list">
        <?php
        // Collect recent activities from all tables into one array
        $activities = [];

        // Recent blogs
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

        // Recent comments
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

        // Recent donations
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

        // Sort all by time descending and take latest 10
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
