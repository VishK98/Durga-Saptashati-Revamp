<?php
require_once '../app/config/config.php';
$pageTitle = "Livelihood";
$pageDescription = "Creating sustainable livelihood opportunities through vocational training, skill development, and employment support.";
$pageKeywords = "livelihood, vocational training, employment, skill development, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Livelihood</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('causes.php') ?>">Causes</a>
                <a href="<?= url('livelihood.php') ?>">Livelihood</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center g-4 mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div style="background:linear-gradient(135deg,rgba(76,175,80,0.1),rgba(76,175,80,0.04));border-radius:20px;padding:50px;text-align:center;">
                    <div style="width:100px;height:100px;margin:0 auto 20px;background:#4caf50;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 15px 40px rgba(76,175,80,0.3);">
                        <i class="fas fa-briefcase" style="font-size:2.5rem;color:#fff;"></i>
                    </div>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-top:20px;">
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Vocational Training</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Employment Support</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Entrepreneurship</span>
                        <span style="background:#fff;padding:8px 16px;border-radius:20px;font-size:0.8rem;color:#555;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,0.06);">Skill Certification</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="text-uppercase mb-2" style="color:#4caf50;letter-spacing:3px;font-weight:600;">Our Cause</h6>
                <h2 style="color:#1a1b2e;font-weight:700;">Building Sustainable Livelihoods</h2>
                <p style="color:#666;line-height:1.8;margin:15px 0;">We create sustainable livelihood opportunities through vocational training, skill development, and employment support programs that help individuals become financially independent.</p>
                <p style="color:#666;line-height:1.8;">From entrepreneurship guidance to skill certification programs, we equip people with the tools they need to build a better future for themselves and their families.</p>
                <a href="<?= url('make-donation.php') ?>" style="display:inline-flex;align-items:center;gap:8px;background:#f26522;color:#fff;padding:12px 28px;border-radius:10px;font-size:0.9rem;font-weight:600;text-decoration:none;transition:all 0.3s;margin-top:15px;" onmouseover="this.style.background='#d4541a'" onmouseout="this.style.background='#f26522'">
                    <i class="fas fa-heart"></i> Support This Cause
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
