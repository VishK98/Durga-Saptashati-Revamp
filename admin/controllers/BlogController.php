<?php
namespace Admin\Controllers;

class BlogController
{
    public function index(): void
    {
        $pageTitle = 'Manage Blog';
        $contentView = __DIR__ . '/../views/pages/blog.php';
        require __DIR__ . '/../views/layout/admin.php';
    }
}


