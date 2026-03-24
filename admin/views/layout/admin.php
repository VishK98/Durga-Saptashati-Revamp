<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($currentPage) ?> - Admin Panel | <?= APP_NAME ?></title>
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

                <a href="admin.php?page=dashboard"
                    class="sidebar-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>

                <a href="admin.php?page=blogs" class="sidebar-item <?= $currentPage === 'blogs' ? 'active' : '' ?>">
                    <i class="fas fa-blog"></i> <span>Blogs</span>
                    <span class="badge-count">3</span>
                </a>

                <a href="admin.php?page=queries" class="sidebar-item <?= $currentPage === 'queries' ? 'active' : '' ?>">
                    <i class="fas fa-comments"></i> <span>Queries</span>
                    <span class="badge-count">5</span>
                </a>

                <div class="sidebar-menu-label">Content</div>

                <a href="admin.php?page=events" class="sidebar-item <?= $currentPage === 'events' ? 'active' : '' ?>">
                    <i class="fas fa-calendar-alt"></i> <span>Events</span>
                </a>

                <a href="admin.php?page=causes" class="sidebar-item <?= $currentPage === 'causes' ? 'active' : '' ?>">
                    <i class="fas fa-hand-holding-heart"></i> <span>Causes</span>
                </a>

                <a href="admin.php?page=gallery" class="sidebar-item <?= $currentPage === 'gallery' ? 'active' : '' ?>">
                    <i class="fas fa-images"></i> <span>Gallery</span>
                </a>

                <a href="admin.php?page=subscribers"
                    class="sidebar-item <?= $currentPage === 'subscribers' ? 'active' : '' ?>">
                    <i class="fas fa-envelope-open-text"></i> <span>Newsletter</span>
                </a>

                <div class="sidebar-menu-label">System</div>

                <a href="admin.php?page=settings"
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
                                <a href="admin.php?page=settings" class="profile-dropdown-item">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </div>
                            <div class="profile-dropdown-footer">
                                <a href="admin.php?logout=1" class="profile-dropdown-item logout">
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
    // Live clock
    function updateClock() {
        var now = new Date();
        var el = document.getElementById('liveClock');
        if (el) {
            el.textContent = now.toLocaleTimeString('en-GB', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }
    }
    setInterval(updateClock, 1000);
    updateClock();

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
    </script>
</body>

</html>