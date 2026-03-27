<?php
require_once '../app/config/config.php';
$pageTitle = "International Women's Day";
$pageDescription = "Celebrating women's achievements and strength through special events, felicitations, and empowerment workshops.";
$pageKeywords = "international womens day, women, celebration, empowerment, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>International Women's Day</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('international-womens-day.php') ?>">International Women's Day</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center g-4 mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div style="background:linear-gradient(135deg,rgba(244,67,54,0.1),rgba(244,67,54,0.04));border-radius:20px;padding:50px;text-align:center;">
                    <div style="width:100px;height:100px;margin:0 auto 20px;background:#f44336;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 15px 40px rgba(244,67,54,0.3);">
                        <i class="fas fa-venus" style="font-size:2.5rem;color:#fff;"></i>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-top:20px;">
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Felicitation Ceremonies</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Panel Discussions</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Success Stories</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Empowerment Workshops</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="text-uppercase mb-2" style="color:#f44336;letter-spacing:3px;font-weight:600;">Our Initiative</h6>
                <h2 style="color:#1a1b2e;font-weight:700;">Celebrating Women's Strength</h2>
                <p style="color:#666;line-height:1.8;margin:15px 0;">Every year on International Women's Day, we celebrate the incredible achievements of women through special events, felicitation ceremonies, panel discussions, and empowerment workshops.</p>
                <p style="color:#666;line-height:1.8;">We showcase success stories of women who have overcome challenges, organize interactive sessions on leadership and rights, and create a platform for women to connect, inspire, and support each other.</p>
                <a href="<?= url('make-donation.php') ?>" style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:12px 28px;border-radius:10px;font-size:0.9rem;font-weight:600;text-decoration:none;transition:all 0.3s;margin-top:15px;" onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                    <i class="fas fa-heart"></i> Support This Cause
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
