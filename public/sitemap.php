<?php
require_once '../app/config/config.php';

header('Content-Type: application/xml; charset=utf-8');

$baseUrl = rtrim(APP_URL, '/') . '/public';
$today = date('Y-m-d');

// Static pages with priorities
$staticPages = [
    ['url' => '/', 'freq' => 'weekly', 'priority' => '1.00'],
    ['url' => '/about', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/contact', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/make-donation', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/causes', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/event', 'freq' => 'weekly', 'priority' => '0.80'],
    ['url' => '/blog', 'freq' => 'weekly', 'priority' => '0.70'],
    ['url' => '/news', 'freq' => 'weekly', 'priority' => '0.70'],
    ['url' => '/event-gallery', 'freq' => 'weekly', 'priority' => '0.60'],
    ['url' => '/womens-empowerment', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/no-people-hungry', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/education-for-every-kids', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/livelihood', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/womens-rights', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/become-volunteer', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/become-member', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/career-opportunities', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/independence-day', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/international-womens-day', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/yoga-day', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/ganpati-celebration', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/durga-award', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/saree-run', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/blood-donation-drives', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/health-camps-events', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/sanitary-pads-distribution', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/flood-relief-campaign', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/painting-competition', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/cultural-programs', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/hearing-aids-camp', 'freq' => 'yearly', 'priority' => '0.60'],
];

// Dynamic blog posts
try {
    $blogs = $pdo->query("SELECT slug, updated_at FROM blogs WHERE status = 'published' ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $blogs = [];
}

// Dynamic news articles
try {
    $news = $pdo->query("SELECT slug, updated_at FROM news WHERE status = 'published' ORDER BY created_at DESC")->fetchAll();
} catch (Exception $e) {
    $news = [];
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<?php foreach ($staticPages as $page): ?>
  <url>
    <loc><?= htmlspecialchars($baseUrl . $page['url']) ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq><?= $page['freq'] ?></changefreq>
    <priority><?= $page['priority'] ?></priority>
  </url>
<?php endforeach; ?>

<?php foreach ($blogs as $blog): ?>
  <url>
    <loc><?= htmlspecialchars($baseUrl . '/blog/' . $blog['slug']) ?></loc>
    <lastmod><?= date('Y-m-d', strtotime($blog['updated_at'])) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.65</priority>
  </url>
<?php endforeach; ?>

<?php foreach ($news as $n): ?>
  <url>
    <loc><?= htmlspecialchars($baseUrl . '/news/' . $n['slug']) ?></loc>
    <lastmod><?= date('Y-m-d', strtotime($n['updated_at'])) ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.65</priority>
  </url>
<?php endforeach; ?>

</urlset>
