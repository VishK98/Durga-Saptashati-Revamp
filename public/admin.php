<?php
// Admin entry point

define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Asia/Kolkata');
}

spl_autoload_register(function ($class) {
    $prefixes = [
        'Admin\\' => BASE_PATH . '/admin/',
        'App\\' => BASE_PATH . '/app/'
    ];
    foreach ($prefixes as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0)
            continue;
        $relativeClass = substr($class, $len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

require BASE_PATH . '/routes/admin.php';

use Admin\Controllers\DashboardController;

$page = isset($_GET['page']) ? trim($_GET['page']) : 'dashboard';
$dashboard = new DashboardController();

switch ($page) {
    case 'dashboard':
        $dashboard->index();
        break;
    case 'events':
        (new Admin\Controllers\EventController())->index();
        break;
    case 'causes':
        (new Admin\Controllers\CauseController())->index();
        break;
    case 'blog':
        (new Admin\Controllers\BlogController())->index();
        break;
    default:
        http_response_code(404);
        echo 'Admin page not found';
}