<?php
require_once '../app/config/config.php';
$pageTitle = "Events & Activities";
$pageDescription = "Join our upcoming spiritual and charitable events. Participate in Durga Saptashati Foundation's community activities, religious celebrations, and social service programs.";
$pageKeywords = "events, activities, Durga Saptashati events, charity events, spiritual celebrations, community programs";
include '../app/views/layout/header.php';

$events = [
    ['title' => 'Durga Award Ceremony', 'icon' => 'fa-trophy', 'url' => 'durga-award.php', 'img' => 'durga-award/durga-award.jpeg', 'desc' => 'Honouring exceptional individuals making outstanding contributions to social welfare and community development.', 'tag' => 'Award'],
    ['title' => 'International Yoga Day', 'icon' => 'fa-spa', 'url' => 'yoga-day.php', 'img' => 'yoga-day/yoga.jpeg', 'desc' => 'Celebrating the transformative power of yoga through mass sessions, mindfulness, and community wellness.', 'tag' => 'Wellness'],
    ['title' => 'Ganpati Celebration', 'icon' => 'fa-pray', 'url' => 'ganpati-celebration.php', 'img' => 'ganpati/ganpati.jpeg', 'desc' => 'Celebrating Ganesh Chaturthi with traditional rituals, cultural programmes, and community gatherings.', 'tag' => 'Festival'],
    ['title' => "International Women's Day", 'icon' => 'fa-venus', 'url' => 'womens-day.php', 'img' => 'woman-day/woman.jpeg', 'desc' => "Celebrating women's achievements through felicitation events, empowerment workshops, and community programs.", 'tag' => 'Celebration'],
    ['title' => 'Hearing Aids Camp', 'icon' => 'fa-assistive-listening-systems', 'url' => 'hearing-aids-camp.php', 'img' => 'hearing/hearing-4.jpeg', 'desc' => 'Providing free hearing aids and audiological support to those in need through community health camps.', 'tag' => 'Health Camp'],
    ['title' => 'Painting Competition', 'icon' => 'fa-palette', 'url' => 'painting-competition.php', 'img' => 'painting/painting.webp', 'desc' => 'Nurturing creativity in children through inter-school painting competitions, workshops, and exhibitions.', 'tag' => 'Arts & Culture'],
    ['title' => 'Independence Day', 'icon' => 'fa-flag', 'url' => 'independence-day.php', 'img' => 'yoga-day/yoga-10.webp', 'desc' => 'Celebrating the spirit of freedom with patriotic events, flag hoisting, and community programmes.', 'tag' => 'National Day'],
    ['title' => 'Diwali Celebration', 'icon' => 'fa-fire', 'url' => 'diwali-celebration.php', 'img' => 'yoga-day/yoga-11.webp', 'desc' => 'Spreading the light of joy through community celebrations, lamp lighting, and festive gatherings.', 'tag' => 'Festival'],
    ['title' => 'Saree Run', 'icon' => 'fa-running', 'url' => 'saree-run.php', 'img' => 'saree/saree.webp', 'desc' => 'A unique event celebrating Indian women\'s strength, culture, and fitness through a vibrant community run.', 'tag' => 'Event'],
];
?>

<link rel="stylesheet" href="<?= url('assets/css/causes.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Events & Activities</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Banner -->
<div class="causes-hero" style="background-image:url('<?= asset('img/event-1.jpg') ?>');">
    <div class="causes-hero-overlay"></div>
    <div class="container text-center" data-aos="fade-up">
        <span class="hero-label">What's Happening</span>
        <h2>Upcoming & Past Events</h2>
        <p>Join our spiritual celebrations, community programmes, and social service events that bring people together
            and create lasting impact.</p>
        <div class="stat-bar" data-aos="fade-up" data-aos-delay="150">
            <div class="stat-item">
                <div class="stat-num">9+</div>
                <div class="stat-label">Events</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">5,000+</div>
                <div class="stat-label">Participants</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">15+</div>
                <div class="stat-label">Communities</div>
            </div>
        </div>
    </div>
</div>

<!-- Events Grid -->
<div class="causes-grid">
    <div class="container">
        <div class="row" style="row-gap:30px;">
            <?php foreach ($events as $i => $event): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <a href="<?= url($event['url']) ?>" class="cause-card">
                    <div class="card-img-wrap">
                        <img src="<?= url('assets/images/' . $event['img']) ?>"
                            alt="<?= htmlspecialchars($event['title']) ?>">
                        <span class="card-tag"><i class="fas <?= $event['icon'] ?>"></i> <?= $event['tag'] ?></span>
                    </div>
                    <div class="card-content">
                        <h5><?= htmlspecialchars($event['title']) ?></h5>
                        <p><?= htmlspecialchars($event['desc']) ?></p>
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
                <h3 style="color:#fff;font-weight:700;font-size:1.7rem;margin-bottom:10px;">Want to Participate?</h3>
                <p style="color:rgba(255,255,255,0.8);font-size:0.95rem;margin:0;line-height:1.7;">Be part of our events
                    and help us create meaningful experiences that uplift communities and celebrate our heritage.</p>
            </div>
            <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
                <a href="<?= url('become-volunteer.php') ?>" class="cta-btn-primary">
                    <i class="fas fa-hands-helping"></i> Volunteer
                </a>
                <a href="<?= url('contact.php') ?>" class="cta-btn-secondary">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>