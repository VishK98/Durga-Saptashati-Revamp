<?php
namespace Admin\Controllers;

class CauseController
{
    public function index(): void
    {
        $pageTitle = 'Manage Causes';
        $contentView = __DIR__ . '/../views/pages/causes.php';
        require __DIR__ . '/../views/layout/admin.php';
    }
}


