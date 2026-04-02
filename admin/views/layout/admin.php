<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($currentPage) ?> - Admin Panel | <?= APP_NAME ?></title>
    <link href="<?= asset('images/favicon.png') ?>" rel="icon" type="image/png">
    <link href="../admin/assets/css/admin.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <img src="<?= asset('images/logo-wide.webp') ?>" alt="<?= APP_NAME ?>">
            </div>

            <div class="sidebar-menu">
                <div class="sidebar-menu-label">Main</div>

                <a href="admin?page=dashboard"
                    class="sidebar-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>

                <?php
                // Dynamic counts
                $blogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
                $pendingComments = $pdo->query("SELECT COUNT(*) FROM blog_comments WHERE status = 'pending'")->fetchColumn();
                $totalComments = $pdo->query("SELECT COUNT(*) FROM blog_comments")->fetchColumn();

                // Safe count for tables that may not exist yet
                try { $donationCount = $pdo->query("SELECT COUNT(*) FROM donations")->fetchColumn(); } catch(Exception $e) { $donationCount = 0; }
                try { $subscriberCount = $pdo->query("SELECT COUNT(*) FROM subscribers")->fetchColumn(); } catch(Exception $e) { $subscriberCount = 0; }
                try { $queryCount = $pdo->query("SELECT COUNT(*) FROM contact_queries WHERE status = 'new'")->fetchColumn(); } catch(Exception $e) { $queryCount = 0; }
                ?>

                <a href="admin?page=blogs" class="sidebar-item <?= $currentPage === 'blogs' ? 'active' : '' ?>">
                    <i class="fas fa-blog"></i> <span>Blogs</span>
                    <?php if ($blogCount > 0): ?><span class="badge-count"><?= $blogCount ?></span><?php endif; ?>
                </a>

                <a href="admin?page=queries" class="sidebar-item <?= $currentPage === 'queries' ? 'active' : '' ?>">
                    <i class="fas fa-comments"></i> <span>Queries</span>
                    <?php if ($queryCount > 0): ?><span class="badge-count"><?= $queryCount ?></span><?php endif; ?>
                </a>

                <a href="admin?page=comments" class="sidebar-item <?= $currentPage === 'comments' ? 'active' : '' ?>">
                    <i class="fas fa-comment-dots"></i> <span>Comments</span>
                    <?php if ($pendingComments > 0): ?><span class="badge-count"><?= $pendingComments ?></span><?php endif; ?>
                </a>

                <a href="admin?page=donations" class="sidebar-item <?= $currentPage === 'donations' ? 'active' : '' ?>">
                    <i class="fas fa-donate"></i> <span>Donations</span>
                    <?php if ($donationCount > 0): ?><span class="badge-count"><?= $donationCount ?></span><?php endif; ?>
                </a>

                <?php
                try { $pendingVolunteers = $pdo->query("SELECT COUNT(*) FROM volunteers WHERE status = 'pending'")->fetchColumn(); } catch(Exception $e) { $pendingVolunteers = 0; }
                ?>

                <a href="admin?page=volunteers" class="sidebar-item <?= $currentPage === 'volunteers' ? 'active' : '' ?>">
                    <i class="fas fa-user-plus"></i> <span>Volunteers</span>
                    <?php if ($pendingVolunteers > 0): ?><span class="badge-count"><?= $pendingVolunteers ?></span><?php endif; ?>
                </a>

                <?php try { $pendingMembers = $pdo->query("SELECT COUNT(*) FROM members WHERE status = 'pending'")->fetchColumn(); } catch(Exception $e) { $pendingMembers = 0; } ?>
                <a href="admin?page=members" class="sidebar-item <?= $currentPage === 'members' ? 'active' : '' ?>">
                    <i class="fas fa-id-card"></i> <span>Members</span>
                    <?php if ($pendingMembers > 0): ?><span class="badge-count"><?= $pendingMembers ?></span><?php endif; ?>
                </a>

                <?php try { $newAppsCount = $pdo->query("SELECT COUNT(*) FROM career_applications WHERE status = 'new'")->fetchColumn(); } catch(Exception $e) { $newAppsCount = 0; } ?>
                <a href="admin?page=careers" class="sidebar-item <?= $currentPage === 'careers' ? 'active' : '' ?>">
                    <i class="fas fa-briefcase"></i> <span>Careers</span>
                    <?php if ($newAppsCount > 0): ?><span class="badge-count"><?= $newAppsCount ?></span><?php endif; ?>
                </a>

                <?php try { $reportsCount = $pdo->query("SELECT COUNT(*) FROM financial_reports")->fetchColumn(); } catch(Exception $e) { $reportsCount = 0; } ?>
                <a href="admin?page=reports" class="sidebar-item <?= $currentPage === 'reports' ? 'active' : '' ?>">
                    <i class="fas fa-file-invoice-dollar"></i> <span>Reports</span>
                    <?php if ($reportsCount > 0): ?><span class="badge-count"><?= $reportsCount ?></span><?php endif; ?>
                </a>

                <div class="sidebar-menu-label">Content</div>

                <?php try { $newsCount = $pdo->query("SELECT COUNT(*) FROM news")->fetchColumn(); } catch(Exception $e) { $newsCount = 0; } ?>
                <a href="admin?page=news" class="sidebar-item <?= $currentPage === 'news' ? 'active' : '' ?>">
                    <i class="fas fa-newspaper"></i> <span>News</span>
                    <?php if ($newsCount > 0): ?><span class="badge-count"><?= $newsCount ?></span><?php endif; ?>
                </a>

                <?php try { $galleryCount = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn(); } catch(Exception $e) { $galleryCount = 0; } ?>
                <a href="admin?page=gallery" class="sidebar-item <?= $currentPage === 'gallery' ? 'active' : '' ?>">
                    <i class="fas fa-images"></i> <span>Gallery</span>
                    <?php if ($galleryCount > 0): ?><span class="badge-count"><?= $galleryCount ?></span><?php endif; ?>
                </a>

                <a href="admin?page=subscribers"
                    class="sidebar-item <?= $currentPage === 'subscribers' ? 'active' : '' ?>">
                    <i class="fas fa-envelope-open-text"></i> <span>Newsletter</span>
                    <?php if ($subscriberCount > 0): ?><span class="badge-count"><?= $subscriberCount ?></span><?php endif; ?>
                </a>

                <div class="sidebar-menu-label">System</div>

                <a href="admin?page=settings"
                    class="sidebar-item <?= $currentPage === 'settings' ? 'active' : '' ?>">
                    <i class="fas fa-cog"></i> <span>Settings</span>
                </a>
            </div>

        </aside>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <div class="header-left">
                    <button class="header-icon"
                        onclick="document.getElementById('adminSidebar').classList.toggle('open')" style="display:none;"
                        id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search blogs, queries, subscribers...">
                    </div>
                </div>
                <div class="header-right">
                    <button class="header-icon">
                        <i class="fas fa-envelope"></i>
                        <span class="notif-dot"></span>
                    </button>
                    <button class="header-icon">
                        <i class="fas fa-bell"></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="header-profile-wrap" style="position:relative;margin-left:8px;">
                        <div class="header-profile" onclick="document.getElementById('profileDropdown').classList.toggle('show')">
                            <div class="avatar"><?= strtoupper(substr($_SESSION['admin_name'] ?? 'A', 0, 1)) ?></div>
                            <div class="profile-info">
                                <h6><?= $_SESSION['admin_name'] ?? 'Admin' ?></h6>
                                <small><?= $_SESSION['admin_email'] ?? '' ?></small>
                            </div>
                            <i class="fas fa-chevron-down" id="profileArrow" style="color:#9ca3af;font-size:0.7rem;margin-left:5px;transition:transform 0.3s;"></i>
                        </div>
                        <!-- Profile Dropdown -->
                        <div id="profileDropdown" class="profile-dropdown">
                            <div class="profile-dropdown-header">
                                <div>
                                    <h6 style="margin:0;font-size:0.9rem;font-weight:700;color:var(--text-primary);"><?= $_SESSION['admin_name'] ?? 'Admin' ?></h6>
                                    <small style="color:var(--text-muted);font-size:0.75rem;"><?= $_SESSION['admin_email'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="profile-dropdown-body">
                                <a href="admin?page=settings" class="profile-dropdown-item">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </div>
                            <div class="profile-dropdown-footer">
                                <a href="admin?logout=1" class="profile-dropdown-item logout">
                                    <i class="fas fa-sign-out-alt"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="admin-content">
                <?php include __DIR__ . '/../pages/' . $currentPage . '.php'; ?>
            </div>

            <!-- Footer -->
            <div class="admin-footer">
                &copy; <?= date('Y') ?> <?= APP_NAME ?>. All Rights Reserved. | Admin Panel
            </div>
        </div>
    </div>

    <script>
    // Action menu toggle
    function toggleActionMenu(btn) {
        var menu = btn.nextElementSibling;
        // Close all other menus first
        document.querySelectorAll('.action-menu.show').forEach(function(m) {
            if (m !== menu) m.classList.remove('show');
        });
        menu.classList.toggle('show');
    }
    // Close action menus on click outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.action-wrap')) {
            document.querySelectorAll('.action-menu.show').forEach(function(m) {
                m.classList.remove('show');
            });
        }
    });

    // Live clock (only runs if element exists)
    var clockEl = document.getElementById('liveClock');
    if (clockEl) {
        function updateClock() {
            clockEl.textContent = new Date().toLocaleTimeString('en-GB', {
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            });
        }
        setInterval(updateClock, 1000);
        updateClock();
    }

    // Profile dropdown - close on click outside
    document.addEventListener('click', function(e) {
        var dropdown = document.getElementById('profileDropdown');
        var wrap = document.querySelector('.header-profile-wrap');
        if (dropdown && wrap && !wrap.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });

    // Responsive sidebar toggle
    function checkWidth() {
        var toggle = document.getElementById('sidebarToggle');
        if (window.innerWidth <= 768) {
            toggle.style.display = 'flex';
        } else {
            toggle.style.display = 'none';
            document.getElementById('adminSidebar').classList.remove('open');
        }
    }
    window.addEventListener('resize', checkWidth);
    checkWidth();

    // ===== CLIENT-SIDE TABLE PAGINATION =====
    (function() {
        document.querySelectorAll('table.paginated-table').forEach(function(table) {
            var tbody = table.querySelector('tbody');
            if (!tbody) return;
            var allRows = Array.prototype.slice.call(tbody.querySelectorAll('tr'));
            // Skip if table has no data rows or only a "no data" placeholder row
            if (allRows.length === 0 || (allRows.length === 1 && allRows[0].querySelectorAll('td').length === 1)) return;

            var pageSize = 10;
            var currentPage = 1;
            var panel = table.closest('.data-panel');

            // Create pagination container
            var paginationDiv = document.createElement('div');
            paginationDiv.className = 'table-pagination';
            if (panel) {
                panel.appendChild(paginationDiv);
            } else {
                table.parentNode.insertBefore(paginationDiv, table.nextSibling);
            }

            function totalPages() {
                return Math.max(1, Math.ceil(allRows.length / pageSize));
            }

            function render() {
                var total = allRows.length;
                var tp = totalPages();
                if (currentPage > tp) currentPage = tp;
                var start = (currentPage - 1) * pageSize;
                var end = Math.min(start + pageSize, total);

                // Show/hide rows
                allRows.forEach(function(row, i) {
                    row.style.display = (i >= start && i < end) ? '' : 'none';
                });

                // Build pagination HTML
                var html = '<div class="page-info">';
                html += '<span>Showing ' + (total === 0 ? '0' : (start + 1)) + '-' + end + ' of ' + total + '</span>';
                html += '<select class="page-size-select" data-action="pagesize">';
                [5, 10, 25, 50].forEach(function(s) {
                    html += '<option value="' + s + '"' + (s === pageSize ? ' selected' : '') + '>' + s + '/page</option>';
                });
                html += '</select></div>';

                html += '<div class="page-numbers">';
                html += '<button class="page-btn' + (currentPage <= 1 ? ' disabled' : '') + '" data-action="prev">&lt;</button>';

                // Page number buttons (show max 5)
                var startPage = Math.max(1, currentPage - 2);
                var endPage = Math.min(tp, startPage + 4);
                if (endPage - startPage < 4) startPage = Math.max(1, endPage - 4);

                for (var p = startPage; p <= endPage; p++) {
                    html += '<button class="page-btn' + (p === currentPage ? ' active' : '') + '" data-action="page" data-page="' + p + '">' + p + '</button>';
                }

                html += '<button class="page-btn' + (currentPage >= tp ? ' disabled' : '') + '" data-action="next">&gt;</button>';
                html += '</div>';

                paginationDiv.innerHTML = html;
            }

            // Event delegation
            paginationDiv.addEventListener('click', function(e) {
                var btn = e.target.closest('[data-action]');
                if (!btn) return;
                var action = btn.getAttribute('data-action');
                if (action === 'prev' && currentPage > 1) { currentPage--; render(); }
                else if (action === 'next' && currentPage < totalPages()) { currentPage++; render(); }
                else if (action === 'page') { currentPage = parseInt(btn.getAttribute('data-page')); render(); }
            });

            paginationDiv.addEventListener('change', function(e) {
                if (e.target.getAttribute('data-action') === 'pagesize') {
                    pageSize = parseInt(e.target.value);
                    currentPage = 1;
                    render();
                }
            });

            render();
        });
    })();
    </script>

    <!-- Global Toaster -->
    <div id="toasterContainer" style="position:fixed;top:20px;right:20px;z-index:999999;display:flex;flex-direction:column;gap:10px;pointer-events:none;"></div>
    <style>
    .toaster{pointer-events:all;display:flex;align-items:center;gap:12px;padding:14px 20px;border-radius:10px;background:#fff;box-shadow:0 10px 40px rgba(0,0,0,0.15);font-size:0.9rem;font-family:inherit;min-width:300px;max-width:420px;transform:translateX(120%);animation:toastIn 0.4s ease forwards;border-left:4px solid #10b981;position:relative;overflow:hidden;}
    .toaster.toast-success{border-left-color:#10b981;}.toaster.toast-success .toast-icon{color:#10b981;}
    .toaster.toast-error{border-left-color:#ef4444;}.toaster.toast-error .toast-icon{color:#ef4444;}
    .toaster.toast-info{border-left-color:#3b82f6;}.toaster.toast-info .toast-icon{color:#3b82f6;}
    .toaster .toast-icon{font-size:1.2rem;flex-shrink:0;}
    .toaster .toast-body{flex:1;}
    .toaster .toast-body strong{display:block;color:#1a1b2e;font-size:0.88rem;margin-bottom:2px;}
    .toaster .toast-body span{color:#666;font-size:0.82rem;}
    .toaster .toast-close{background:none;border:none;color:#999;font-size:1.1rem;cursor:pointer;padding:0 0 0 8px;flex-shrink:0;transition:color 0.2s;}
    .toaster .toast-close:hover{color:#333;}
    .toaster .toast-progress{position:absolute;bottom:0;left:0;height:3px;border-radius:0 0 0 10px;animation:toastProgress 3s linear forwards;}
    .toaster.toast-success .toast-progress{background:#10b981;}
    .toaster.toast-error .toast-progress{background:#ef4444;}
    .toaster.toast-info .toast-progress{background:#3b82f6;}
    .toaster.removing{animation:toastOut 0.3s ease forwards;}
    @keyframes toastIn{from{transform:translateX(120%);opacity:0;}to{transform:translateX(0);opacity:1;}}
    @keyframes toastOut{from{transform:translateX(0);opacity:1;}to{transform:translateX(120%);opacity:0;}}
    @keyframes toastProgress{from{width:100%;}to{width:0%;}}
    </style>
    <script>
    function showToast(message, type, title) {
        type = type || 'success';
        title = title || (type === 'success' ? 'Success' : type === 'error' ? 'Error' : 'Info');
        var icons = {success:'fa-check-circle', error:'fa-exclamation-circle', info:'fa-info-circle'};
        var container = document.getElementById('toasterContainer');
        var toast = document.createElement('div');
        toast.className = 'toaster toast-' + type;
        toast.innerHTML = '<i class="fas ' + icons[type] + ' toast-icon"></i>' +
            '<div class="toast-body"><strong>' + title + '</strong><span>' + message + '</span></div>' +
            '<button class="toast-close" onclick="removeToast(this.parentElement)">&times;</button>' +
            '<div class="toast-progress"></div>';
        container.appendChild(toast);
        setTimeout(function(){ removeToast(toast); }, 3000);
    }
    function removeToast(el) {
        if (!el || el.classList.contains('removing')) return;
        el.classList.add('removing');
        setTimeout(function(){ if(el.parentElement) el.parentElement.removeChild(el); }, 300);
    }
    </script>

    <?php
    // Auto-show toasters from session
    $adminToasts = [
        'blog_success' => 'success', 'donation_success' => 'success', 'query_success' => 'success',
        'comment_success' => 'success', 'settings_success' => 'success',
        'volunteer_success' => 'success', 'career_success' => 'success', 'gallery_success' => 'success',
        'settings_error' => 'error', 'toast_success' => 'success', 'toast_error' => 'error'
    ];
    foreach ($adminToasts as $key => $type) {
        if (!empty($_SESSION[$key])) {
            echo "<script>showToast('" . addslashes(htmlspecialchars($_SESSION[$key])) . "','" . $type . "');</script>";
            unset($_SESSION[$key]);
        }
    }
    ?>
</body>

</html>