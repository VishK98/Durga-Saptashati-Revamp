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

// Detect environment
define('APP_ENV', $_ENV['APP_ENV'] ?? 'development');
$isLocal = (APP_ENV === 'development');
// $isLocal = (APP_ENV === 'production ');

// Database Configuration (switches based on APP_ENV)
define('DB_HOST', $isLocal ? ($_ENV['DB_LOCAL_HOST'] ?? 'localhost') : ($_ENV['DB_PROD_HOST'] ?? 'localhost'));
define('DB_NAME', $isLocal ? ($_ENV['DB_LOCAL_NAME'] ?? 'durga_saptashati') : ($_ENV['DB_PROD_NAME'] ?? 'durga_saptashati'));
define('DB_USER', $isLocal ? ($_ENV['DB_LOCAL_USER'] ?? 'root') : ($_ENV['DB_PROD_USER'] ?? 'root'));
define('DB_PASS', $isLocal ? ($_ENV['DB_LOCAL_PASS'] ?? '') : ($_ENV['DB_PROD_PASS'] ?? ''));

// Application Configuration
define('APP_NAME', trim($_ENV['APP_NAME'] ?? 'Durga Saptashati Foundation', '"'));
define('APP_URL', $isLocal ? ($_ENV['APP_LOCAL_URL'] ?? 'http://localhost/Durga-Saptashati-Revamp') : ($_ENV['APP_PROD_URL'] ?? 'https://wavebroadcast.in/durga-saptashati'));

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

// Google Places API
define('GOOGLE_PLACES_API_KEY', $_ENV['GOOGLE_PLACES_API_KEY'] ?? '');
define('GOOGLE_PLACE_ID', $_ENV['GOOGLE_PLACE_ID'] ?? '');

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