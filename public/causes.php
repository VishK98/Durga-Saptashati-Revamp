<?php
require_once '../app/config/config.php';
$pageTitle = "Our Causes";
$pageDescription = "Discover the various causes and initiatives supported by Durga Saptashati Foundation — education, women empowerment, livelihood, and cultural programs.";
$pageKeywords = "charity causes, education, women empowerment, livelihood, yoga day, cultural programme, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

$causes = [
    ['title' => "Women Empowerment & Safety", 'icon' => 'fa-female', 'url' => 'womens-empowerment.php', 'img' => 'womens-empowerment/womens-empowerment.webp', 'desc' => 'We provide free self-defence classes, skill development workshops, and judicial protection aid for women in Dwarka.', 'tag' => 'Empowerment'],
    ['title' => 'Hunger Reduction / Food Donation', 'icon' => 'fa-utensils', 'url' => 'no-people-hungry.php', 'img' => 'hungary/hungary.webp', 'desc' => 'We organise frequent food donation drives, health and hygiene awareness campaigns, and run a free kitchen in Dwarka.', 'tag' => 'Food Drive'],
    ['title' => 'Education For Everyone', 'icon' => 'fa-graduation-cap', 'url' => 'education-for-every-kids.php', 'img' => 'education-for/education-for.webp', 'desc' => 'Durga Saptashati NGO is committed to providing access to quality education for all underprivileged children.', 'tag' => 'Education'],
    ['title' => 'Sustainable Livelihood', 'icon' => 'fa-briefcase', 'url' => 'livelihood.php', 'img' => 'livelihood/livelihood.webp', 'desc' => 'Empowering individuals with vocational training, skill development, and employment support for dignified lives.', 'tag' => 'Employment'],
    ['title' => 'International Yoga Day', 'icon' => 'fa-spa', 'url' => 'yoga-day.php', 'img' => 'yoga-day/yoga.jpeg', 'desc' => 'Promoting physical and mental well-being through mass yoga sessions, health awareness, and community fitness.', 'tag' => 'Wellness'],
    ['title' => "International Women's Day", 'icon' => 'fa-venus', 'url' => 'womens-day.php', 'img' => 'woman-day/woman.jpeg', 'desc' => "Celebrating women's achievements through felicitation events, empowerment workshops, and community programs.", 'tag' => 'Celebration'],
    ['title' => 'Painting Competition', 'icon' => 'fa-palette', 'url' => 'painting-competition.php', 'img' => 'painting/painting.webp', 'desc' => 'Nurturing creativity in children through inter-school painting competitions, workshops, and exhibitions.', 'tag' => 'Arts & Culture'],
    ['title' => 'Cultural Programme', 'icon' => 'fa-music', 'url' => 'cultural-programme.php', 'img' => 'yoga-day/yoga-7.webp', 'desc' => 'Preserving Indian cultural heritage through dance, music, drama, and community events.', 'tag' => 'Heritage'],
];
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Causes</h2>
            </div>
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
        <p>Our causes span education, empowerment, livelihood, and cultural preservation — each one creating lasting
            impact in communities across India.</p>
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
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <a href="<?= url($cause['url']) ?>" class="cause-card">
                    <div class="card-img-wrap">
                        <img src="<?= url('assets/images/' . $cause['img']) ?>" alt="<?= htmlspecialchars($cause['title']) ?>">
                        <span class="card-tag"><i class="fas <?= $cause['icon'] ?>"></i> <?= $cause['tag'] ?></span>
                    </div>
                    <div class="card-content">
                        <h5><?= htmlspecialchars($cause['title']) ?></h5>
                        <p><?= htmlspecialchars($cause['desc']) ?></p>
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
                <h3 style="color:#fff;font-weight:700;font-size:1.7rem;margin-bottom:10px;">Want to Support a Cause?
                </h3>
                <p style="color:rgba(255,255,255,0.8);font-size:0.95rem;margin:0;line-height:1.7;">Your contribution can
                    create a lasting impact. Join hands with us to transform lives in communities that need it most.</p>
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