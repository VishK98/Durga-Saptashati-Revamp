<?php
// Simple admin layout with sidebar
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Admin'; ?></title>
    <link rel="stylesheet" href="/public/assets/css/style.css" />
    <link rel="stylesheet" href="/public/assets/css/navbar-responsive.css" />
    <link rel="stylesheet" href="/public/assets/lib/animate/animate.min.css" />
    <link rel="stylesheet" href="/public/assets/lib/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="/public/assets/lib/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="/public/assets/css/admin.css" />
</head>

<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="brand">
                <img src="/public/assets/images/logo-wide.webp" alt="Logo" />
                <span>Admin</span>
            </div>
            <nav class="menu">
                <a class="menu-item" href="/public/admin.php?page=dashboard">
                    <span class="icon">🏠</span>
                    <span>Dashboard</span>
                </a>
                <a class="menu-item" href="/public/admin.php?page=events">
                    <span class="icon">📅</span>
                    <span>Events</span>
                </a>
                <a class="menu-item" href="/public/admin.php?page=causes">
                    <span class="icon">🎯</span>
                    <span>Causes</span>
                </a>
                <a class="menu-item" href="/public/admin.php?page=blog">
                    <span class="icon">✍️</span>
                    <span>Blog</span>
                </a>
            </nav>
        </aside>
        <main class="admin-main">
            <header class="admin-header">
                <div class="left">
                    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">☰</button>
                    <h1><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Admin'; ?></h1>
                </div>
                <div class="right">
                    <div class="user">
                        <img src="/public/assets/img/user.jpg" alt="User" />
                        <span>Admin</span>
                    </div>
                </div>
            </header>
            <section class="admin-content">
                <?php if (isset($contentView) && file_exists($contentView)) {
                    include $contentView;
                } else {
                    echo '<p>Content not found</p>';
                } ?>
            </section>
            <footer class="admin-footer">
                <span>&copy; <?php echo date('Y'); ?> Durga Saptashati</span>
            </footer>
        </main>
    </div>
    <script>
        (function () {
            var btn = document.getElementById('sidebarToggle');
            if (btn) {
                btn.addEventListener('click', function () {
                    document.body.classList.toggle('sidebar-collapsed');
                });
            }
        })();
    </script>
</body>

</html>