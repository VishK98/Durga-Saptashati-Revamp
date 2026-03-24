<?php
$hour = (int)date('H');
if ($hour < 12) $greeting = 'Good Morning';
elseif ($hour < 17) $greeting = 'Good Afternoon';
else $greeting = 'Good Evening';
?>

<!-- Greeting -->
<div class="greeting-section">
    <h2><?= $greeting ?> <span class="time" id="liveClock"></span></h2>
    <p>We're glad to have you back &mdash; <?= APP_NAME ?>.</p>
</div>

<!-- Stat Cards -->
<div class="stat-cards">
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--accent-light);color:var(--accent);">
            <i class="fas fa-blog"></i>
        </div>
        <div class="stat-info">
            <h3>3</h3>
            <p>Total Blogs</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--warning-light);color:#d97706;">
            <i class="fas fa-comments"></i>
        </div>
        <div class="stat-info">
            <h3>5</h3>
            <p>Total Queries</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--success-light);color:#059669;">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="stat-info">
            <h3>12</h3>
            <p>Subscribers</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--info-light);color:#2563eb;">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="stat-info">
            <h3>4</h3>
            <p>Events</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--purple-light);color:var(--purple);">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
        <div class="stat-info">
            <h3>3</h3>
            <p>Causes</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:var(--pink-light);color:var(--pink);">
            <i class="fas fa-images"></i>
        </div>
        <div class="stat-info">
            <h3>6</h3>
            <p>Gallery</p>
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
        <div class="activity-item">
            <div class="activity-icon" style="background:var(--warning-light);color:#d97706;">
                <i class="fas fa-comment-dots"></i>
            </div>
            <div class="activity-text">
                <h6>New query from Visitor</h6>
                <small><i class="far fa-clock"></i> <?= date('j F Y') ?></small>
            </div>
            <span class="activity-badge" style="background:var(--danger-light);color:#dc2626;">New</span>
        </div>
        <div class="activity-item">
            <div class="activity-icon" style="background:var(--success-light);color:#059669;">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="activity-text">
                <h6>New newsletter subscriber</h6>
                <small><i class="far fa-clock"></i> <?= date('j F Y', strtotime('-1 day')) ?></small>
            </div>
            <span class="activity-badge" style="background:var(--success-light);color:#059669;">Subscribed</span>
        </div>
        <div class="activity-item">
            <div class="activity-icon" style="background:var(--accent-light);color:var(--accent);">
                <i class="fas fa-blog"></i>
            </div>
            <div class="activity-text">
                <h6>Blog post published: Women Empowerment Initiatives</h6>
                <small><i class="far fa-clock"></i> <?= date('j F Y', strtotime('-3 days')) ?></small>
            </div>
            <span class="activity-badge" style="background:var(--info-light);color:#2563eb;">Published</span>
        </div>
        <div class="activity-item">
            <div class="activity-icon" style="background:var(--info-light);color:#2563eb;">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="activity-text">
                <h6>Event created: International Women's Day 2021</h6>
                <small><i class="far fa-clock"></i> <?= date('j F Y', strtotime('-5 days')) ?></small>
            </div>
            <span class="activity-badge" style="background:var(--purple-light);color:var(--purple);">Event</span>
        </div>
    </div>
</div>
