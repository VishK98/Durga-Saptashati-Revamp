<?php
require_once '../app/config/config.php';
$pageTitle = "Event Gallery";
$pageDescription = "Browse photos from past events and relive memories with Durga Saptashati Foundation's comprehensive event photo gallery.";
$pageKeywords = "event gallery, photo gallery, past events, event photos, event memories, image gallery, Durga Saptashati Foundation";
include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12"><h2>Event Gallery</h2></div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
                <a href="<?= url('event-gallery.php') ?>">Event Gallery</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="coming-soon-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="coming-soon-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="coming-soon-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <h1 class="coming-soon-title">Event Gallery</h1>
                    <h2 class="coming-soon-subtitle">Browse Photos from Past Events - Coming Soon</h2>
                    <p class="coming-soon-text">
                        We're creating a comprehensive photo gallery showcasing memorable moments from our past events, 
                        community programs, workshops, celebrations, and social impact initiatives with high-quality 
                        images, event categorization, and interactive viewing experiences to preserve our journey.
                    </p>
                    <a href="<?php echo url('event.php'); ?>" class="coming-soon-btn">
                        <i class="fas fa-arrow-left"></i> Back to Events
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>