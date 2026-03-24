<?php
require_once '../app/config/config.php';

$pageTitle = "Events & Activities";
$pageDescription = "Join our upcoming spiritual and charitable events. Participate in Durga Saptashati Foundation's community activities, religious celebrations, and social service programs.";
$pageKeywords = "events, activities, Durga Saptashati events, charity events, spiritual celebrations, community programs";

include '../app/views/layout/header.php';
?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Upcoming Events</h2>
            </div>
            <div class="col-12">
                <a href="<?= url('index.php') ?>">Home</a>
                <a href="<?= url('event.php') ?>">Events</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Event Start -->
<div class="event">
    <div class="container-fluid">
        <div class="section-header text-center">
            <p>Upcoming Events</p>
            <h2>Join our spiritual and community events</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="event-item">
                    <img src="<?= asset('img/event-1.jpg') ?>" alt="Durga Puja Celebration">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>15-Oct-2024</p>
                            <p><i class="far fa-clock"></i>10:00 - 16:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>New Delhi</p>
                        </div>
                        <div class="event-text">
                            <h3>Durga Puja Celebration</h3>
                            <p>
                                Join us for our annual Durga Puja celebration with community prayers, cultural programs,
                                and free meals for all devotees and visitors.
                            </p>
                            <a class="btn btn-custom" href="<?= url('contact.php') ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="event-item">
                    <img src="<?= asset('img/event-2.jpg') ?>" alt="Free Health Camp">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>22-Oct-2024</p>
                            <p><i class="far fa-clock"></i>09:00 - 17:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>Mumbai</p>
                        </div>
                        <div class="event-text">
                            <h3>Free Health Camp</h3>
                            <p>
                                Free medical checkups, medicines, and health awareness sessions for the underprivileged
                                community members and families.
                            </p>
                            <a class="btn btn-custom" href="<?= url('contact.php') ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="event-item">
                    <img src="<?= asset('img/event-1.jpg') ?>" alt="International Yoga Day">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>21-Jun-2024</p>
                            <p><i class="far fa-clock"></i>06:00 - 08:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>Rishikesh</p>
                        </div>
                        <div class="event-text">
                            <h3>International Yoga Day Celebration</h3>
                            <p>
                                Join our special yoga session and meditation program celebrating International Yoga Day
                                with spiritual teachings and wellness activities.
                            </p>
                            <a class="btn btn-custom" href="<?= url('contact.php') ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="event-item">
                    <img src="<?= asset('img/event-2.jpg') ?>" alt="Women's Day Celebration">
                    <div class="event-content">
                        <div class="event-meta">
                            <p><i class="fa fa-calendar-alt"></i>08-Mar-2025</p>
                            <p><i class="far fa-clock"></i>14:00 - 18:00</p>
                            <p><i class="fa fa-map-marker-alt"></i>Kolkata</p>
                        </div>
                        <div class="event-text">
                            <h3>Women Empowerment Day</h3>
                            <p>
                                Special event celebrating the divine feminine power with workshops on women's rights,
                                skill development, and spiritual empowerment programs.
                            </p>
                            <a class="btn btn-custom" href="<?= url('contact.php') ?>">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Event End -->

<?php include '../app/views/layout/footer.php'; ?>