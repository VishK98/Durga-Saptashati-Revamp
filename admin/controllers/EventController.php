<?php
namespace Admin\Controllers;

class EventController
{
    public function index(): void
    {
        $pageTitle = 'Manage Events';
        $contentView = __DIR__ . '/../views/pages/events.php';
        require __DIR__ . '/../views/layout/admin.php';
    }
}


