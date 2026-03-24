/**
 * Hero Slider JavaScript - Professional Auto-Switching Carousel
 * Separate file for better organization and maintainability
 */

$(document).ready(function() {
    
    // Professional hero slider with 4-second intervals
    var $carousel = $(".carousel .owl-carousel");
    
    $carousel.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000, // 5 seconds for all images
        autoplayHoverPause: true,
        autoplaySpeed: 1000, // Smooth 1s transition speed
        smartSpeed: 1000,
        dots: true,
        nav: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        dotsSpeed: 800,
        navSpeed: 800,
        dragEndSpeed: 800,
        responsive: {
            0: {
                dots: true,
                nav: true,
                autoplayTimeout: 5000 // Consistent 5s on all devices
            },
            768: {
                dots: true,
                nav: true,
                autoplayTimeout: 5000
            },
            992: {
                autoplayTimeout: 5000
            }
        }
    });

    // Enhanced text animations reset for ultra-smooth transitions
    function resetTextAnimations() {
        var $activeSlide = $('.carousel .owl-item.active');
        var $allSlides = $('.carousel .owl-item');
        
        // Reset all slides first to prevent conflicts
        $allSlides.find('.carousel-text, .carousel-text h1, .carousel-text p, .carousel-btn').css({
            'animation': 'none',
            'opacity': '0',
            'transform': ''
        });
        
        // Reset specific transforms for the active slide
        $activeSlide.find('.carousel-text').css({
            'transform': 'translateX(-50%) translateY(50px) scale(0.95)',
            'opacity': '0'
        });
        $activeSlide.find('.carousel-text h1').css({
            'transform': 'translateY(30px) scale(0.9)',
            'opacity': '0'
        });
        $activeSlide.find('.carousel-text p').css({
            'transform': 'translateY(25px)',
            'opacity': '0'
        });
        $activeSlide.find('.carousel-btn').css({
            'transform': 'translateY(20px)',
            'opacity': '0'
        });
        
        // Force browser reflow to ensure reset is applied
        $activeSlide[0].offsetHeight;
        
        // Re-apply animations with staggered, smooth timing
        setTimeout(function() {
            $activeSlide.find('.carousel-text').css({
                'animation': 'textEntrance 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.1s forwards'
            });
        }, 50);
        
        setTimeout(function() {
            $activeSlide.find('.carousel-text h1').css({
                'animation': 'titleSlide 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.2s forwards'
            });
        }, 100);
        
        setTimeout(function() {
            $activeSlide.find('.carousel-text p').css({
                'animation': 'descriptionFade 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.4s forwards'
            });
        }, 150);
        
        setTimeout(function() {
            $activeSlide.find('.carousel-btn').css({
                'animation': 'buttonsSlide 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.6s forwards'
            });
        }, 200);
    }

    // Trigger animations on slide initialization
    $carousel.on('initialized.owl.carousel', function(event) {
        setTimeout(resetTextAnimations, 200);
    });

    // Trigger animations on every slide change
    $carousel.on('changed.owl.carousel', function(event) {
        resetTextAnimations();
    });

    // Also trigger on manual navigation
    $carousel.on('translated.owl.carousel', function(event) {
        resetTextAnimations();
    });

    // Video Modal functionality
    var $videoSrc;
    $('.carousel .btn-play').click(function() {
        $videoSrc = $(this).data("src");
    });
    
    $('#videoModal').on('shown.bs.modal', function (e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    });
    
    $('#videoModal').on('hide.bs.modal', function (e) {
        $("#video").attr('src', '');
    });

    // Pause slider when video modal is open
    $('#videoModal').on('shown.bs.modal', function () {
        $carousel.trigger('stop.owl.autoplay');
    });
    
    $('#videoModal').on('hidden.bs.modal', function () {
        $carousel.trigger('play.owl.autoplay', [5000]); // Resume with 5s interval
    });

    // Optional: Add slide counter for debugging
    if (window.location.search.includes('debug')) {
        var slideCounter = 0;
        $carousel.on('changed.owl.carousel', function(event) {
            slideCounter++;
            console.log('Slide changed to:', event.item.index, 'Total changes:', slideCounter);
        });
    }
});