<?php
require_once '../app/config/config.php';
$pageTitle = "Women's Empowerment";
$pageDescription = "Empowering women through skill development, self-defense training, and awareness campaigns at Durga Saptashati Foundation.";
$pageKeywords = "women empowerment, skill development, self defense, awareness, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Women's Empowerment</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('womens-empowerment.php') ?>">Women's Empowerment</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center g-4 mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div style="background:linear-gradient(135deg,rgba(233,30,99,0.1),rgba(233,30,99,0.04));border-radius:20px;padding:50px;text-align:center;">
                    <div style="width:100px;height:100px;margin:0 auto 20px;background:#e91e63;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 15px 40px rgba(233,30,99,0.3);">
                        <i class="fas fa-female" style="font-size:2.5rem;color:#fff;"></i>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-top:20px;">
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Skill Development</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Self-Defense Training</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Awareness Campaigns</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Financial Literacy</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="text-uppercase mb-2" style="color:#e91e63;letter-spacing:3px;font-weight:600;">Our Cause</h6>
                <h2 style="color:#1a1b2e;font-weight:700;">Empowering Women, Transforming Communities</h2>
                <p style="color:#666;line-height:1.8;margin:15px 0;">We believe that empowering women is the key to transforming entire communities. Our programs focus on skill development, self-defense training, awareness campaigns, and financial literacy to help women become independent and confident leaders.</p>
                <p style="color:#666;line-height:1.8;">Through workshops, mentorship programs, and community support networks, we create an ecosystem where women can thrive, grow, and inspire the next generation.</p>
                <a href="<?= url('make-donation.php') ?>" style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:12px 28px;border-radius:10px;font-size:0.9rem;font-weight:600;text-decoration:none;transition:all 0.3s;margin-top:15px;" onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                    <i class="fas fa-heart"></i> Support This Cause
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
