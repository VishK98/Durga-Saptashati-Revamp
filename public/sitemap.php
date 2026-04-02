<?php
require_once '../app/config/config.php';

header('Content-Type: application/xml; charset=utf-8');

$baseUrl = rtrim(APP_URL, '/') . '/public';
$today = date('Y-m-d');

// Static pages with priorities
$staticPages = [
    ['url' => '/', 'freq' => 'weekly', 'priority' => '1.00'],
    ['url' => '/about.php', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/contact.php', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/make-donation.php', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/causes.php', 'freq' => 'monthly', 'priority' => '0.80'],
    ['url' => '/event.php', 'freq' => 'weekly', 'priority' => '0.80'],
    ['url' => '/blog.php', 'freq' => 'weekly', 'priority' => '0.70'],
    ['url' => '/news.php', 'freq' => 'weekly', 'priority' => '0.70'],
    ['url' => '/event-gallery.php', 'freq' => 'weekly', 'priority' => '0.60'],
    ['url' => '/womens-empowerment.php', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/no-people-hungry.php', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/education-for-every-kids.php', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/livelihood.php', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/womens-rights.php', 'freq' => 'monthly', 'priority' => '0.70'],
    ['url' => '/become-volunteer.php', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/become-member.php', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/career-opportunities.php', 'freq' => 'monthly', 'priority' => '0.60'],
    ['url' => '/independence-day.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/international-womens-day.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/yoga-day.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/ganpati-celebration.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/durga-award.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/saree-run.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/blood-donation-drives.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/health-camps-events.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/sanitary-pads-distribution.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/flood-relief-campaign.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/painting-competition.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/cultural-programs.php', 'freq' => 'yearly', 'priority' => '0.60'],
    ['url' => '/hearing-aids-camp.php', 'freq' => 'yearly', 'priority' => '0.60'],
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
