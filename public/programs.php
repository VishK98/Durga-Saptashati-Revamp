<?php
require_once '../app/config/config.php';
$pageTitle = "Our Programs";
$pageDescription = "Explore the various programs offered by Durga Saptashati Foundation including education, healthcare, women empowerment, livelihood, and community development.";
$pageKeywords = "programs, education, healthcare, women empowerment, community development, livelihood, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

$programs = [
    ['title' => 'Durga Award Ceremony', 'icon' => 'fa-trophy', 'url' => 'durga-award.php', 'img' => 'durga-award/durga-award.jpeg', 'desc' => 'Honouring exceptional individuals making outstanding contributions to social welfare.', 'tag' => 'Award'],
    ['title' => 'Saree Run', 'icon' => 'fa-running', 'url' => 'saree-run.php', 'img' => 'saree/saree.webp', 'desc' => 'Celebrating Indian women\'s strength, culture, and fitness through a vibrant community run.', 'tag' => 'Event'],
    ['title' => 'Ganpati Celebration', 'icon' => 'fa-pray', 'url' => 'ganpati-celebration.php', 'img' => 'ganpati/ganpati.jpeg', 'desc' => 'Celebrating Ganesh Chaturthi with traditional rituals, cultural programmes, and community gatherings.', 'tag' => 'Festival'],
    ['title' => 'International Yoga Day', 'icon' => 'fa-spa', 'url' => 'yoga-day.php', 'img' => 'yoga-day/yoga.jpeg', 'desc' => 'Promoting physical and mental well-being through mass yoga sessions and health awareness.', 'tag' => 'Wellness'],
    ['title' => "International Women's Day", 'icon' => 'fa-venus', 'url' => 'womens-day.php', 'img' => 'woman-day/woman.jpeg', 'desc' => "Celebrating women's achievements through felicitation events and empowerment workshops.", 'tag' => 'Celebration'],
    ['title' => 'Hearing Aids Camp', 'icon' => 'fa-assistive-listening-systems', 'url' => 'hearing-aids-camp.php', 'img' => 'hearing/hearing-4.jpeg', 'desc' => 'Providing free hearing aids and audiological support to those in need through health camps.', 'tag' => 'Health Camp'],
    ['title' => 'Painting Competition', 'icon' => 'fa-palette', 'url' => 'painting-competition.php', 'img' => 'painting/painting.webp', 'desc' => 'Nurturing creativity in children through inter-school competitions, workshops, and exhibitions.', 'tag' => 'Arts & Culture'],
    ['title' => 'Cultural Programme', 'icon' => 'fa-music', 'url' => 'cultural-programme.php', 'img' => 'cultural/cultural.webp', 'desc' => 'Preserving Indian cultural heritage through dance, music, drama, and community events.', 'tag' => 'Heritage'],
    ['title' => 'Hunger Reduction / Food Donation', 'icon' => 'fa-utensils', 'url' => 'no-people-hungry.php', 'img' => 'hungary/hungary.webp', 'desc' => 'Frequent food donation drives, hygiene awareness campaigns, and running a free community kitchen.', 'tag' => 'Food Drive'],
    ['title' => "Women Empowerment & Safety", 'icon' => 'fa-female', 'url' => 'womens-empowerment.php', 'img' => 'womens-empowerment/womens-empowerment.webp', 'desc' => 'Free self-defence classes, skill development workshops, and judicial protection aid for women.', 'tag' => 'Empowerment'],
    ['title' => 'Education For Everyone', 'icon' => 'fa-graduation-cap', 'url' => 'education-for-every-kids.php', 'img' => 'education-for/education-for.webp', 'desc' => 'Providing access to quality education through scholarships, learning materials, and digital literacy.', 'tag' => 'Education'],
    ['title' => 'Sustainable Livelihood', 'icon' => 'fa-briefcase', 'url' => 'livelihood.php', 'img' => 'livelihood/livelihood.webp', 'desc' => 'Vocational training, skill development, and employment support for dignified, self-reliant lives.', 'tag' => 'Employment'],
];
?>

<link rel="stylesheet" href="<?= url('assets/css/causes.css') ?>">

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Our Programs</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('programs.php') ?>">Programs</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Banner -->
<div class="causes-hero" style="background-image:url('<?= asset('img/causes-1.jpg') ?>');">
    <div class="causes-hero-overlay"></div>
    <div class="container text-center" data-aos="fade-up">
        <span class="hero-label">What We Do</span>
        <h2>Our Programs & Initiatives</h2>
        <p>From education and empowerment to cultural celebrations and community welfare — explore all our programs that
            create lasting impact across India.</p>
        <div class="stat-bar" data-aos="fade-up" data-aos-delay="150">
            <div class="stat-item">
                <div class="stat-num">12+</div>
                <div class="stat-label">Active Programs</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">5,000+</div>
                <div class="stat-label">Lives Impacted</div>
            </div>
            <div class="stat-item">
                <div class="stat-num">15+</div>
                <div class="stat-label">Communities Served</div>
            </div>
        </div>
    </div>
</div>

<!-- Programs Grid -->
<div class="causes-grid">
    <div class="container">
        <div class="row" style="row-gap:30px;">
            <?php foreach ($programs as $i => $program): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <a href="<?= url($program['url']) ?>" class="cause-card">
                    <div class="card-img-wrap">
                        <img src="<?= url('assets/images/' . $program['img']) ?>"
                            alt="<?= htmlspecialchars($program['title']) ?>">
                        <span class="card-tag"><i class="fas <?= $program['icon'] ?>"></i> <?= $program['tag'] ?></span>
                    </div>
                    <div class="card-content">
                        <h5><?= htmlspecialchars($program['title']) ?></h5>
                        <p><?= htmlspecialchars($program['desc']) ?></p>
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
                <h3 style="color:#fff;font-weight:700;font-size:1.7rem;margin-bottom:10px;">Want to Support Our
                    Programs?</h3>
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