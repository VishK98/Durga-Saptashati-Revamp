<?php
namespace Admin\Controllers;

class DashboardController
{
    public function index(): void
    {
        $pageTitle = 'Admin Dashboard';
        $contentView = __DIR__ . '/../views/pages/dashboard.php';
        require __DIR__ . '/../views/layout/admin.php';
    }
}


