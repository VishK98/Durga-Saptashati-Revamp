<?php
require_once '../app/config/config.php';
$pageTitle = "Our Causes";
$pageDescription = "Discover the various causes and initiatives supported by Durga Saptashati Foundation — education, women empowerment, livelihood, and cultural programs.";
$pageKeywords = "charity causes, education, women empowerment, livelihood, yoga day, cultural programme, Durga Saptashati Foundation";
include '../app/views/layout/header.php';

$causes = [
    ['title' => "Women Empowerment & Safety", 'icon' => 'fa-female', 'url' => 'womens-empowerment.php', 'img' => 'womens-empowerment/womens-empowerment.webp', 'desc' => 'Free self-defence classes, skill development workshops, and judicial protection aid for women.', 'tag' => 'Empowerment'],
    ['title' => 'Hunger Reduction / Food Donation', 'icon' => 'fa-utensils', 'url' => 'no-people-hungry.php', 'img' => 'hungary/hungary.webp', 'desc' => 'Frequent food donation drives, hygiene awareness campaigns, and running a free community kitchen.', 'tag' => 'Food Drive'],
    ['title' => 'Education For Everyone', 'icon' => 'fa-graduation-cap', 'url' => 'education-for-every-kids.php', 'img' => 'education-for/education-for.webp', 'desc' => 'Providing access to quality education for all underprivileged children through scholarships and support.', 'tag' => 'Education'],
    ['title' => 'Sustainable Livelihood', 'icon' => 'fa-briefcase', 'url' => 'livelihood.php', 'img' => 'livelihood/livelihood.webp', 'desc' => 'Vocational training, skill development, and employment support for dignified, self-reliant lives.', 'tag' => 'Employment'],
    ['title' => "Women's Rights & Legal Aid", 'icon' => 'fa-venus', 'url' => 'womens-rights.php', 'img' => 'womens-empowerment/womens-empowerment-3.webp', 'desc' => 'Legal awareness programs, judicial protection aid, and advocacy for women\'s rights and safety.', 'tag' => 'Rights'],
    ['title' => 'Flood Relief Campaign', 'icon' => 'fa-water', 'url' => 'flood-relief-campaign.php', 'img' => 'food-relief-campaign/food-relief-campaign.webp', 'desc' => 'Emergency food, shelter, medical aid, and rehabilitation support for flood-affected communities.', 'tag' => 'Relief'],
    ['title' => 'Sanitary Pads Distribution', 'icon' => 'fa-hand-holding-heart', 'url' => 'sanitary-pads-distribution.php', 'img' => 'sanitary-pads-distribution/sanitary-pads-distribution-11.webp', 'desc' => 'Distributing free sanitary pads to underprivileged women and girls, promoting menstrual hygiene awareness.', 'tag' => 'Hygiene'],
    ['title' => 'School Support', 'icon' => 'fa-school', 'url' => 'school-support.php', 'img' => 'education-for/education-for-1.webp', 'desc' => 'Scholarships, school infrastructure support, and learning materials for underprivileged students.', 'tag' => 'Education'],
    ['title' => 'Adult Literacy', 'icon' => 'fa-book', 'url' => 'adult-literacy.php', 'img' => 'education-for/education-for-2.webp', 'desc' => 'Teaching reading and writing to adults who missed out on formal education.', 'tag' => 'Literacy'],
    ['title' => 'Digital Learning', 'icon' => 'fa-laptop', 'url' => 'digital-learning.php', 'img' => 'education-for/education-for-3.webp', 'desc' => 'Computer education, online resources, and digital literacy programs for communities.', 'tag' => 'Digital'],
    ['title' => 'Medical Camps', 'icon' => 'fa-heartbeat', 'url' => 'medical-camps.php', 'img' => 'hearing/hearing-4.jpeg', 'desc' => 'Free health checkups, treatments, and medical supplies for underprivileged communities.', 'tag' => 'Healthcare'],
    ['title' => 'Maternal Care', 'icon' => 'fa-baby', 'url' => 'maternal-care.php', 'img' => 'woman-day/woman-1.jpeg', 'desc' => 'Supporting mothers and newborns through prenatal care, nutrition, and health awareness.', 'tag' => 'Healthcare'],
    ['title' => 'Health Awareness', 'icon' => 'fa-user-md', 'url' => 'health-awareness.php', 'img' => 'yoga-day/yoga-9.webp', 'desc' => 'Preventive healthcare education, hygiene campaigns, and wellness programs.', 'tag' => 'Awareness'],
    ['title' => 'Blood Donation Drives', 'icon' => 'fa-tint', 'url' => 'blood-donation-drives.php', 'img' => 'yoga-day/yoga-13.webp', 'desc' => 'Organising blood donation camps to save lives and promote voluntary blood donation.', 'tag' => 'Health'],
    ['title' => 'Health Camps', 'icon' => 'fa-medkit', 'url' => 'health-camps-events.php', 'img' => 'yoga-day/yoga-14.webp', 'desc' => 'Free medical checkup camps providing healthcare access to underserved communities.', 'tag' => 'Health Camp'],
    ['title' => 'Rural Development', 'icon' => 'fa-home', 'url' => 'rural-development.php', 'img' => 'livelihood/livelihood-5.webp', 'desc' => 'Infrastructure development, sanitation, and facilities for rural villages.', 'tag' => 'Community'],
    ['title' => 'Environment Care', 'icon' => 'fa-tree', 'url' => 'environment-care.php', 'img' => 'yoga-day/yoga-15.webp', 'desc' => 'Tree plantation drives, conservation initiatives, and environmental awareness programs.', 'tag' => 'Environment'],
    ['title' => 'Decorative Cover Making', 'icon' => 'fa-cut', 'url' => 'decorative.php', 'img' => 'decorative-cover/decorative-cover.webp', 'desc' => 'Empowering women with creative skills through handcrafted decorative covers and workshops.', 'tag' => 'Craft'],
    ['title' => 'इंद्रप्रस्थ साहित्य महोत्सव', 'icon' => 'fa-book-open', 'url' => 'indraprastha-sahitya-mahotsav-2022.php', 'img' => 'indra/indra.webp', 'desc' => 'A grand literary festival celebrating Hindi literature, poetry, and cultural heritage.', 'tag' => 'Literary'],
    ['title' => 'Junior Super Model', 'icon' => 'fa-star', 'url' => 'junior-super-model-pacific-mall-D21.php', 'img' => 'junior-super-modal/junior-super-modal.jpg', 'desc' => 'A platform for young talents to showcase confidence, creativity, and personality at Pacific Mall D21.', 'tag' => 'Talent'],
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
                        <img src="<?= url('assets/images/' . $cause['img']) ?>"
                            alt="<?= htmlspecialchars($cause['title']) ?>">
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