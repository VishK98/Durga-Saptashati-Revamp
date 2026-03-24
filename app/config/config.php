<?php
/**
 * Durga Saptashati Foundation - Configuration File
 */

// Load environment variables
function loadEnv($file)
{
    if (!file_exists($file)) {
        return;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_ENV)) {
            $_ENV[$name] = $value;
        }
    }
}

// Load .env file
loadEnv(__DIR__ . '/../../.env');

// Database Configuration
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'db_durga_saptashati');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');

// Application Configuration
define('APP_NAME', $_ENV['APP_NAME'] ?? 'Durga Saptashati Foundation');
define('APP_URL', $_ENV['APP_URL'] ?? 'http://localhost/durga-saptashati');
define('APP_ENV', $_ENV['APP_ENV'] ?? 'development');

// Paths
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('STORAGE_PATH', ROOT_PATH . '/storage');

// Email Configuration
define('MAIL_HOST', $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com');
define('MAIL_PORT', $_ENV['MAIL_PORT'] ?? 587);
define('MAIL_USER', $_ENV['MAIL_USER'] ?? '');
define('MAIL_PASS', $_ENV['MAIL_PASS'] ?? '');
define('MAIL_FROM', $_ENV['MAIL_FROM'] ?? 'info@saptashati.org');

// Admin Configuration
define('ADMIN_EMAIL', $_ENV['ADMIN_EMAIL'] ?? 'admin@saptashati.org');
define('ADMIN_PASS', $_ENV['ADMIN_PASS'] ?? 'admin123');

// File Upload Settings
define('MAX_UPLOAD_SIZE', $_ENV['MAX_UPLOAD_SIZE'] ?? '5M');
define('ALLOWED_EXTENSIONS', $_ENV['ALLOWED_EXTENSIONS'] ?? 'jpg,jpeg,png,gif,pdf,doc,docx');

// Database Connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    if (APP_ENV === 'development') {
        die("Database connection failed: " . $e->getMessage());
    } else {
        die("Database connection failed. Please try again later.");
    }
}

// Helper Functions
function asset($path)
{
    return APP_URL . '/public/assets/' . ltrim($path, '/');
}

function url($path = '')
{
    return APP_URL . '/public/' . ltrim($path, '/');
}

function view($view, $data = [])
{
    extract($data);
    $viewPath = APP_PATH . '/views/' . str_replace('.', '/', $view) . '.php';

    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        die("View not found: " . $view);
    }
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function sanitize($input)
{
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

function getCurrentPage()
{
    $uri = $_SERVER['REQUEST_URI'];
    $path = parse_url($uri, PHP_URL_PATH);
    return basename($path, '.php');
}