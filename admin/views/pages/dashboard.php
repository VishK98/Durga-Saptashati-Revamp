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
// Dynamic dashboard counts - all wrapped in try/catch for safety
try { $dBlogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn(); } catch(Exception $e) { $dBlogCount = 0; }
try { $dCommentCount = $pdo->query("SELECT COUNT(*) FROM blog_comments")->fetchColumn(); } catch(Exception $e) { $dCommentCount = 0; }
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

<!-- Stat Cards -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:18px;margin-top:20px;">

    <!-- Total Members -->
    <div style="background:linear-gradient(135deg,#059669 0%,#10b981 100%);border-radius:16px;padding:22px;color:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-15px;right:-15px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1);"></div>
        <div style="position:absolute;bottom:-20px;right:20px;width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
            <i class="fas fa-id-card" style="font-size:1rem;"></i>
        </div>
        <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dMemberCount ?></h3>
        <p style="font-size:0.78rem;opacity:0.7;margin:4px 0 0;">Total Members</p>
        <div style="margin-top:10px;font-size:0.7rem;opacity:0.6;display:flex;gap:10px;">
            <span><i class="fas fa-check-circle"></i> <?= $dApprovedMembers ?> approved</span>
            <span><i class="fas fa-clock"></i> <?= $dPendingMembers ?> pending</span>
        </div>
    </div>

    <!-- Blogs -->
    <div style="background:linear-gradient(135deg,#d97706 0%,#f59e0b 100%);border-radius:16px;padding:22px;color:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-15px;right:-15px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1);"></div>
        <div style="position:absolute;bottom:-20px;right:20px;width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
            <i class="fas fa-blog" style="font-size:1rem;"></i>
        </div>
        <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dBlogCount ?></h3>
        <p style="font-size:0.78rem;opacity:0.7;margin:4px 0 0;">Blogs</p>
        <div style="margin-top:10px;font-size:0.7rem;opacity:0.6;">
            <span><i class="fas fa-comment-dots"></i> <?= $dCommentCount ?> comments</span>
        </div>
    </div>

    <!-- Queries -->
    <div style="background:linear-gradient(135deg,#7c3aed 0%,#8b5cf6 100%);border-radius:16px;padding:22px;color:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-15px;right:-15px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1);"></div>
        <div style="position:absolute;bottom:-20px;right:20px;width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
            <i class="fas fa-comments" style="font-size:1rem;"></i>
        </div>
        <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dQueryCount ?></h3>
        <p style="font-size:0.78rem;opacity:0.7;margin:4px 0 0;">Queries</p>
        <div style="margin-top:10px;font-size:0.7rem;opacity:0.6;">
            <span><i class="fas fa-envelope"></i> <?= $dSubCount ?> subscribers</span>
        </div>
    </div>

    <!-- Gallery -->
    <div style="background:linear-gradient(135deg,#2563eb 0%,#3b82f6 100%);border-radius:16px;padding:22px;color:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;top:-15px;right:-15px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1);"></div>
        <div style="position:absolute;bottom:-20px;right:20px;width:50px;height:50px;border-radius:50%;background:rgba(255,255,255,0.06);"></div>
        <div style="width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
            <i class="fas fa-images" style="font-size:1rem;"></i>
        </div>
        <h3 style="font-size:1.6rem;font-weight:800;margin:0;"><?= $dGalleryCount ?></h3>
        <p style="font-size:0.78rem;opacity:0.7;margin:4px 0 0;">Gallery</p>
        <div style="margin-top:10px;font-size:0.7rem;opacity:0.6;">
            <span><i class="fas fa-camera"></i> Photos uploaded</span>
        </div>
    </div>
</div>


<!-- Charts Row -->
<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-top:25px;">
    <!-- Donation Chart -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:5px;">
            <div>
                <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0;">Donation Overview</h4>
                <p style="font-size:0.78rem;color:var(--text-muted);margin-top:2px;">Last 6 months</p>
            </div>
        </div>
        <div id="donationChart"></div>
    </div>

    <!-- Members Donut -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">Member Status</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:5px;">Total: <?= $dMemberCount ?></p>
        <div id="memberDonut"></div>
    </div>
</div>

<!-- Second Charts Row -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:20px;">
    <!-- Monthly Members Bar Chart -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">New Members</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:5px;">Monthly signups (last 6 months)</p>
        <div id="membersBarChart"></div>
    </div>

    <!-- Content Overview -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;padding:24px;">
        <h4 style="font-size:1rem;font-weight:700;color:var(--text-primary);margin:0 0 5px;">Content Overview</h4>
        <p style="font-size:0.78rem;color:var(--text-muted);margin-bottom:5px;">Distribution across categories</p>
        <div id="contentPie"></div>
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


<!-- Activity Row: Recent Members + Recent Donations -->
<?php
try { $actMembers = $pdo->query("SELECT full_name, membership_type, status, payment_mode, created_at FROM members ORDER BY created_at DESC LIMIT 6")->fetchAll(); } catch(Exception $e) { $actMembers = []; }
try { $actDonations = $pdo->query("SELECT name, email, amount, status, payment_method, created_at FROM donations ORDER BY created_at DESC LIMIT 6")->fetchAll(); } catch(Exception $e) { $actDonations = []; }
try { $actVolunteers = $pdo->query("SELECT name, email, status, created_at FROM volunteers ORDER BY created_at DESC LIMIT 6")->fetchAll(); } catch(Exception $e) { $actVolunteers = []; }
try { $actQueries = $pdo->query("SELECT name, email, subject, status, created_at FROM contact_queries ORDER BY created_at DESC LIMIT 6")->fetchAll(); } catch(Exception $e) { $actQueries = []; }
?>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:25px;">
    <!-- Recent Members Card -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:18px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:34px;height:34px;border-radius:10px;background:var(--purple-light);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-id-card" style="color:var(--purple);font-size:0.85rem;"></i>
                </div>
                <div>
                    <h4 style="font-size:0.92rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Members</h4>
                    <p style="font-size:0.72rem;color:var(--text-muted);margin:0;">Latest membership applications</p>
                </div>
            </div>
            <a href="admin.php?page=members" style="font-size:0.75rem;color:var(--accent);font-weight:600;text-decoration:none;">View All <i class="fas fa-arrow-right" style="font-size:0.6rem;"></i></a>
        </div>
        <div style="padding:0;">
            <?php if (empty($actMembers)): ?>
                <div style="padding:30px;text-align:center;color:var(--text-muted);font-size:0.85rem;">No members yet.</div>
            <?php else: ?>
                <?php foreach ($actMembers as $idx => $am): ?>
                <div style="display:flex;align-items:center;gap:12px;padding:12px 24px;border-bottom:1px solid #f5f5f5;<?= $idx >= 5 ? 'display:none;' : '' ?>">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,<?= $am['status']==='approved' ? '#10b981,#059669' : ($am['status']==='pending' ? '#f59e0b,#d97706' : '#ef4444,#dc2626') ?>);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-size:0.75rem;font-weight:700;">
                        <?= strtoupper(mb_substr($am['full_name'], 0, 1)) ?>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($am['full_name']) ?></div>
                        <div style="font-size:0.7rem;color:var(--text-muted);display:flex;align-items:center;gap:6px;">
                            <span><?= htmlspecialchars($am['membership_type']) ?></span>
                            <span style="color:#d1d5db;">&bull;</span>
                            <span><?= $am['payment_mode'] ?></span>
                        </div>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <span style="padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:600;
                            background:<?= $am['status']==='approved' ? 'var(--success-light)' : ($am['status']==='pending' ? 'var(--warning-light)' : 'var(--danger-light)') ?>;
                            color:<?= $am['status']==='approved' ? '#059669' : ($am['status']==='pending' ? '#d97706' : '#dc2626') ?>;">
                            <?= ucfirst($am['status']) ?>
                        </span>
                        <div style="font-size:0.65rem;color:var(--text-muted);margin-top:3px;"><?= date('d M, h:i A', strtotime($am['created_at'])) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Donations Card -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:18px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:34px;height:34px;border-radius:10px;background:var(--success-light);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-donate" style="color:#059669;font-size:0.85rem;"></i>
                </div>
                <div>
                    <h4 style="font-size:0.92rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Donations</h4>
                    <p style="font-size:0.72rem;color:var(--text-muted);margin:0;">Latest donation transactions</p>
                </div>
            </div>
            <a href="admin.php?page=donations" style="font-size:0.75rem;color:var(--accent);font-weight:600;text-decoration:none;">View All <i class="fas fa-arrow-right" style="font-size:0.6rem;"></i></a>
        </div>
        <div style="padding:0;">
            <?php if (empty($actDonations)): ?>
                <div style="padding:30px;text-align:center;color:var(--text-muted);font-size:0.85rem;">No donations yet.</div>
            <?php else: ?>
                <?php foreach ($actDonations as $idx => $ad): ?>
                <div style="display:flex;align-items:center;gap:12px;padding:12px 24px;border-bottom:1px solid #f5f5f5;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,<?= $ad['status']==='completed' ? '#10b981,#059669' : '#f59e0b,#d97706' ?>);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-size:0.75rem;font-weight:700;">
                        <?= strtoupper(mb_substr($ad['name'], 0, 1)) ?>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($ad['name']) ?></div>
                        <div style="font-size:0.7rem;color:var(--text-muted);"><?= htmlspecialchars($ad['email']) ?></div>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <div style="font-weight:700;font-size:0.9rem;color:var(--text-primary);">&#8377;<?= number_format($ad['amount'], 0) ?></div>
                        <span style="padding:2px 8px;border-radius:20px;font-size:0.65rem;font-weight:600;
                            background:<?= $ad['status']==='completed' ? 'var(--success-light)' : 'var(--warning-light)' ?>;
                            color:<?= $ad['status']==='completed' ? '#059669' : '#d97706' ?>;">
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
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:20px;">
    <!-- Recent Volunteers Card -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:18px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:34px;height:34px;border-radius:10px;background:var(--pink-light);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-hands-helping" style="color:var(--pink);font-size:0.85rem;"></i>
                </div>
                <div>
                    <h4 style="font-size:0.92rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Volunteers</h4>
                    <p style="font-size:0.72rem;color:var(--text-muted);margin:0;">Latest volunteer applications</p>
                </div>
            </div>
            <a href="admin.php?page=volunteers" style="font-size:0.75rem;color:var(--accent);font-weight:600;text-decoration:none;">View All <i class="fas fa-arrow-right" style="font-size:0.6rem;"></i></a>
        </div>
        <div style="padding:0;">
            <?php if (empty($actVolunteers)): ?>
                <div style="padding:30px;text-align:center;">
                    <i class="fas fa-user-plus" style="font-size:1.5rem;color:var(--border);margin-bottom:6px;display:block;"></i>
                    <p style="color:var(--text-muted);font-size:0.82rem;margin:0;">No volunteer applications yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($actVolunteers as $av): ?>
                <div style="display:flex;align-items:center;gap:12px;padding:12px 24px;border-bottom:1px solid #f5f5f5;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--pink),#d946ef);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-size:0.75rem;font-weight:700;">
                        <?= strtoupper(mb_substr($av['name'], 0, 1)) ?>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($av['name']) ?></div>
                        <div style="font-size:0.7rem;color:var(--text-muted);"><?= htmlspecialchars($av['email']) ?></div>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <span style="padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:600;
                            background:<?= $av['status']==='approved' ? 'var(--success-light)' : ($av['status']==='pending' ? 'var(--warning-light)' : 'var(--danger-light)') ?>;
                            color:<?= $av['status']==='approved' ? '#059669' : ($av['status']==='pending' ? '#d97706' : '#dc2626') ?>;">
                            <?= ucfirst($av['status']) ?>
                        </span>
                        <div style="font-size:0.65rem;color:var(--text-muted);margin-top:3px;"><?= date('d M, h:i A', strtotime($av['created_at'])) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Queries Card -->
    <div style="background:var(--card-bg);border:1px solid var(--border);border-radius:16px;overflow:hidden;">
        <div style="padding:18px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:34px;height:34px;border-radius:10px;background:var(--info-light);display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-comments" style="color:#2563eb;font-size:0.85rem;"></i>
                </div>
                <div>
                    <h4 style="font-size:0.92rem;font-weight:700;color:var(--text-primary);margin:0;">Recent Queries</h4>
                    <p style="font-size:0.72rem;color:var(--text-muted);margin:0;">Latest contact form submissions</p>
                </div>
            </div>
            <a href="admin.php?page=queries" style="font-size:0.75rem;color:var(--accent);font-weight:600;text-decoration:none;">View All <i class="fas fa-arrow-right" style="font-size:0.6rem;"></i></a>
        </div>
        <div style="padding:0;">
            <?php if (empty($actQueries)): ?>
                <div style="padding:30px;text-align:center;">
                    <i class="fas fa-inbox" style="font-size:1.5rem;color:var(--border);margin-bottom:6px;display:block;"></i>
                    <p style="color:var(--text-muted);font-size:0.82rem;margin:0;">No queries yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($actQueries as $aq): ?>
                <div style="display:flex;align-items:center;gap:12px;padding:12px 24px;border-bottom:1px solid #f5f5f5;">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#3b82f6,#2563eb);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-size:0.75rem;font-weight:700;">
                        <?= strtoupper(mb_substr($aq['name'], 0, 1)) ?>
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="font-weight:600;font-size:0.82rem;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($aq['name']) ?></div>
                        <div style="font-size:0.7rem;color:var(--text-muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= htmlspecialchars($aq['subject'] ?? $aq['email']) ?></div>
                    </div>
                    <div style="text-align:right;flex-shrink:0;">
                        <span style="padding:3px 10px;border-radius:20px;font-size:0.68rem;font-weight:600;
                            background:<?= $aq['status']==='replied' ? 'var(--success-light)' : ($aq['status']==='new' ? 'var(--info-light)' : 'var(--warning-light)') ?>;
                            color:<?= $aq['status']==='replied' ? '#059669' : ($aq['status']==='new' ? '#2563eb' : '#d97706') ?>;">
                            <?= ucfirst($aq['status']) ?>
                        </span>
                        <div style="font-size:0.65rem;color:var(--text-muted);margin-top:3px;"><?= date('d M, h:i A', strtotime($aq['created_at'])) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- ApexCharts CDN (SVG-based, no canvas/requestAnimationFrame) -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.49.0/dist/apexcharts.min.js"></script>
<script>
// Donation Area Chart
new ApexCharts(document.getElementById('donationChart'), {
    chart: { type: 'area', height: 260, toolbar: { show: false }, fontFamily: 'Inter, sans-serif', animations: { enabled: true, easing: 'easeinout', speed: 600, animateGradually: { enabled: false } } },
    series: [{ name: 'Revenue', data: <?= json_encode(array_column($monthlyDonations, 'amount')) ?> }],
    labels: <?= json_encode(array_column($monthlyDonations, 'label')) ?>,
    colors: ['#f26522'],
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.05, stops: [0, 90, 100] } },
    stroke: { curve: 'smooth', width: 3 },
    markers: { size: 5, colors: ['#fff'], strokeColors: '#f26522', strokeWidth: 2, hover: { size: 7 } },
    dataLabels: { enabled: false },
    grid: { borderColor: '#f0f0f0', strokeDashArray: 4, xaxis: { lines: { show: false } } },
    xaxis: { labels: { style: { colors: '#9ca3af', fontSize: '11px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
    yaxis: { labels: { style: { colors: '#9ca3af', fontSize: '11px' }, formatter: function(v) { return '₹' + (v >= 1000 ? (v/1000)+'k' : v); } } },
    tooltip: { theme: 'dark', y: { formatter: function(v) { return '₹' + v.toLocaleString('en-IN'); } } }
}).render();

// Member Donut
new ApexCharts(document.getElementById('memberDonut'), {
    chart: { type: 'donut', height: 280, fontFamily: 'Inter, sans-serif', animations: { enabled: true, speed: 500 } },
    series: [<?= $dApprovedMembers ?>, <?= $dPendingMembers ?>],
    labels: ['Approved', 'Pending'],
    colors: ['#10b981', '#f59e0b'],
    plotOptions: { pie: { donut: { size: '72%', labels: { show: true, name: { fontSize: '14px', fontWeight: 600 }, value: { fontSize: '22px', fontWeight: 700, color: '#1a1b2e' }, total: { show: true, label: 'Total', fontSize: '13px', color: '#9ca3af', formatter: function(w) { return w.globals.seriesTotals.reduce(function(a,b){return a+b},0); } } } } } },
    dataLabels: { enabled: false },
    legend: { position: 'bottom', fontSize: '12px', fontWeight: 500, markers: { width: 10, height: 10, radius: 3 }, itemMargin: { horizontal: 12 } },
    stroke: { width: 0 },
    tooltip: { theme: 'dark' }
}).render();

// Members Bar Chart
new ApexCharts(document.getElementById('membersBarChart'), {
    chart: { type: 'bar', height: 240, toolbar: { show: false }, fontFamily: 'Inter, sans-serif', animations: { enabled: true, speed: 500 } },
    series: [{ name: 'New Members', data: <?= json_encode(array_column($monthlyMembers, 'count')) ?> }],
    labels: <?= json_encode(array_column($monthlyMembers, 'label')) ?>,
    colors: ['#8b5cf6'],
    plotOptions: { bar: { borderRadius: 8, columnWidth: '45%', distributed: false } },
    dataLabels: { enabled: false },
    grid: { borderColor: '#f0f0f0', strokeDashArray: 4, xaxis: { lines: { show: false } } },
    xaxis: { labels: { style: { colors: '#9ca3af', fontSize: '11px' } }, axisBorder: { show: false }, axisTicks: { show: false } },
    yaxis: { labels: { style: { colors: '#9ca3af', fontSize: '11px' } }, tickAmount: 4 },
    tooltip: { theme: 'dark' }
}).render();

// Content Donut
new ApexCharts(document.getElementById('contentPie'), {
    chart: { type: 'donut', height: 280, fontFamily: 'Inter, sans-serif', animations: { enabled: true, speed: 500 } },
    series: [<?= $dBlogCount ?>, <?= $dNewsCount ?>, <?= $dGalleryCount ?>, <?= $dEventCount ?>],
    labels: ['Blogs', 'News', 'Gallery', 'Events'],
    colors: ['#f26522', '#3b82f6', '#8b5cf6', '#10b981'],
    plotOptions: { pie: { donut: { size: '65%' } } },
    dataLabels: { enabled: false },
    legend: { position: 'bottom', fontSize: '12px', fontWeight: 500, markers: { width: 10, height: 10, radius: 3 }, itemMargin: { horizontal: 10 } },
    stroke: { width: 0 },
    tooltip: { theme: 'dark' }
}).render();
</script>

<style>
/* Dashboard responsive overrides */
@media (max-width: 992px) {
    div[style*="grid-template-columns:2fr 1fr"] { grid-template-columns: 1fr !important; }
    div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns: 1fr !important; }
}
</style>
