<?php
require_once '../app/config/config.php';
$pageTitle = "Our Causes";
$pageDescription = "Discover the various causes and initiatives supported by Durga Saptashati Foundation — education, women empowerment, livelihood, and cultural programs.";
$pageKeywords = "charity causes, education, women empowerment, livelihood, yoga day, cultural programme, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

$causes = [
    ['title' => "Women's Empowerment", 'icon' => 'fa-female', 'color' => '#e91e63', 'url' => 'womens-empowerment.php', 'desc' => 'Empowering women through skill development, self-defense training, and awareness campaigns.', 'tag' => 'Empowerment'],
    ['title' => 'No People Hungry', 'icon' => 'fa-utensils', 'color' => '#ff9800', 'url' => 'no-people-hungry.php', 'desc' => 'Providing nutritious meals to underprivileged families through community kitchens and food drives.', 'tag' => 'Food Security'],
    ['title' => 'Education For Every Kids', 'icon' => 'fa-graduation-cap', 'color' => '#2196f3', 'url' => 'education-for-every-kids.php', 'desc' => 'Supporting quality education through scholarships, learning materials, and digital literacy.', 'tag' => 'Education'],
    ['title' => 'Livelihood', 'icon' => 'fa-briefcase', 'color' => '#4caf50', 'url' => 'livelihood.php', 'desc' => 'Creating sustainable livelihood through vocational training and employment support.', 'tag' => 'Employment'],
    ['title' => 'Yoga Day', 'icon' => 'fa-spa', 'color' => '#9c27b0', 'url' => 'yoga-day.php', 'desc' => 'Promoting physical and mental well-being through yoga sessions and health awareness.', 'tag' => 'Wellness'],
    ['title' => "International Women's Day", 'icon' => 'fa-venus', 'color' => '#f44336', 'url' => 'international-womens-day.php', 'desc' => "Celebrating women's achievements through events, felicitations, and workshops.", 'tag' => 'Celebration'],
    ['title' => 'Painting Competition', 'icon' => 'fa-palette', 'color' => '#ff5722', 'url' => 'painting-competition.php', 'desc' => 'Nurturing creativity in children through competitions, workshops, and exhibitions.', 'tag' => 'Arts & Culture'],
    ['title' => 'Cultural Programme', 'icon' => 'fa-music', 'color' => '#795548', 'url' => 'cultural-programme.php', 'desc' => 'Preserving Indian cultural heritage through dance, music, drama, and community events.', 'tag' => 'Heritage'],
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

<!-- Hero Banner -->
<div class="causes-hero" style="background-image:url('<?= asset('img/causes-1.jpg') ?>');">
    <div class="causes-hero-overlay"></div>
    <div class="container text-center" data-aos="fade-up">
        <span class="hero-label">What We Do</span>
        <h2>Transforming Lives, One Cause at a Time</h2>
        <p>Our causes span education, empowerment, livelihood, and cultural preservation — each one creating lasting impact in communities across India.</p>
        <div class="stat-bar" data-aos="fade-up" data-aos-delay="150">
            <div class="stat-item">
                <div class="stat-num">8+</div>
                <div class="stat-label">Active Causes</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">1000+</div>
                <div class="stat-label">Lives Impacted</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">10+</div>
                <div class="stat-label">Communities Served</div>
            </div>
        </div>
    </div>
</div>

<!-- Causes Grid -->
<div class="causes-grid">
    <div class="container">
        <div class="row" style="row-gap:30px;">
            <?php foreach ($causes as $i => $cause): ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 100 ?>">
                <a href="<?= url($cause['url']) ?>" class="cause-card" style="--card-color:<?= $cause['color'] ?>;">
                    <div class="card-icon" style="background:linear-gradient(145deg,<?= $cause['color'] ?>,<?= $cause['color'] ?>cc);">
                        <div class="icon-circle">
                            <i class="fas <?= $cause['icon'] ?>"></i>
                        </div>
                        <span class="card-tag"><?= $cause['tag'] ?></span>
                    </div>
                    <div class="card-content">
                        <h5><?= htmlspecialchars($cause['title']) ?></h5>
                        <p><?= htmlspecialchars($cause['desc']) ?></p>
                        <span class="learn-link" style="color:<?= $cause['color'] ?>;">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="causes-cta">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-7">
                <h3 style="color:#fff;font-weight:700;font-size:1.7rem;margin-bottom:10px;">Want to Support a Cause?</h3>
                <p style="color:rgba(255,255,255,0.8);font-size:0.95rem;margin:0;line-height:1.7;">Your contribution can create a lasting impact. Join hands with us to transform lives in communities that need it most.</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                <a href="<?= url('make-donation.php') ?>" class="cta-btn-primary">
                    <i class="fas fa-heart"></i> Donate Now
                </a>
                <a href="<?= url('become-volunteer.php') ?>" class="cta-btn-secondary">
                    <i class="fas fa-hands-helping"></i> Volunteer
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
