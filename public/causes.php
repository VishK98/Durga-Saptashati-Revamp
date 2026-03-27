<?php
require_once '../app/config/config.php';
$pageTitle = "Our Causes";
$pageDescription = "Discover the various causes and initiatives supported by Durga Saptashati Foundation — education, women empowerment, livelihood, and cultural programs.";
$pageKeywords = "charity causes, education, women empowerment, livelihood, yoga day, cultural programme, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

$causes = [
    ['title' => "Women's Empowerment", 'icon' => 'fa-female', 'color' => '#e91e63', 'url' => 'womens-empowerment.php', 'desc' => 'Empowering women through skill development, self-defense training, and awareness campaigns.'],
    ['title' => 'No People Hungry', 'icon' => 'fa-utensils', 'color' => '#ff9800', 'url' => 'no-people-hungry.php', 'desc' => 'Providing nutritious meals to underprivileged families through community kitchens and food drives.'],
    ['title' => 'Education For Every Kids', 'icon' => 'fa-graduation-cap', 'color' => '#2196f3', 'url' => 'education-for-every-kids.php', 'desc' => 'Supporting quality education through scholarships, learning materials, and digital literacy.'],
    ['title' => 'Livelihood', 'icon' => 'fa-briefcase', 'color' => '#4caf50', 'url' => 'livelihood.php', 'desc' => 'Creating sustainable livelihood through vocational training and employment support.'],
    ['title' => 'Yoga Day', 'icon' => 'fa-om', 'color' => '#9c27b0', 'url' => 'yoga-day.php', 'desc' => 'Promoting physical and mental well-being through yoga sessions and health awareness.'],
    ['title' => "International Women's Day", 'icon' => 'fa-venus', 'color' => '#f44336', 'url' => 'international-womens-day.php', 'desc' => "Celebrating women's achievements through events, felicitations, and workshops."],
    ['title' => 'Painting Competition', 'icon' => 'fa-palette', 'color' => '#ff5722', 'url' => 'painting-competition.php', 'desc' => 'Nurturing creativity in children through competitions, workshops, and exhibitions.'],
    ['title' => 'Cultural Programme', 'icon' => 'fa-music', 'color' => '#795548', 'url' => 'cultural-programme.php', 'desc' => 'Preserving Indian cultural heritage through dance, music, drama, and community events.'],
];
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Our Causes</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-uppercase mb-2" style="color:#f26522;letter-spacing:3px;font-weight:600;">What We Do</h6>
            <h2 style="color:#1a1b2e;font-weight:700;">We believe we can transform lives with your support</h2>
            <p style="color:#888;max-width:650px;margin:10px auto 0;">Our causes span education, empowerment, livelihood, and cultural preservation — each one creating lasting impact in communities across India.</p>
        </div>

        <div class="row g-4">
            <?php foreach ($causes as $i => $cause): ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 100 ?>">
                <a href="<?= url($cause['url']) ?>" style="text-decoration:none;display:block;height:100%;">
                    <div style="background:#fff;border-radius:16px;padding:30px 24px;text-align:center;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.3s;height:100%;border-bottom:4px solid transparent;" onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 12px 35px rgba(0,0,0,0.12)';this.style.borderBottomColor='<?= $cause['color'] ?>'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.06)';this.style.borderBottomColor='transparent'">
                        <div style="width:70px;height:70px;margin:0 auto 18px;background:<?= $cause['color'] ?>;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 30px <?= $cause['color'] ?>30;">
                            <i class="fas <?= $cause['icon'] ?>" style="font-size:1.6rem;color:#fff;"></i>
                        </div>
                        <h5 style="color:#1a1b2e;font-weight:700;font-size:1rem;margin-bottom:10px;"><?= htmlspecialchars($cause['title']) ?></h5>
                        <p style="color:#888;font-size:0.85rem;line-height:1.6;margin-bottom:15px;"><?= htmlspecialchars($cause['desc']) ?></p>
                        <span style="display:inline-flex;align-items:center;gap:6px;color:<?= $cause['color'] ?>;font-size:0.85rem;font-weight:600;">
                            Learn More <i class="fas fa-arrow-right" style="font-size:0.75rem;"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
