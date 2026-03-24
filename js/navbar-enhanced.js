/*!
 * Enhanced Navbar & Hero Slider JavaScript
 * Professional implementation for Durga Saptashati Foundation
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initStickyNavbar();
    initMobileMenu();
    initDropdowns();
    initHeroSlider();
    initSmoothScroll();
    initAccessibility();
    
    /**
     * Sticky Navbar Implementation
     */
    function initStickyNavbar() {
        const navbar = document.querySelector('.navbar-modern');
        const topBar = document.querySelector('.top-bar');
        const carousel = document.querySelector('.carousel');
        
        if (!navbar) return;
        
        const navbarHeight = navbar.offsetHeight;
        const topBarHeight = topBar ? topBar.offsetHeight : 45;
        const triggerPoint = topBarHeight + 50; // When to make navbar sticky
        
        let lastScrollTop = 0;
        let ticking = false;
        
        function updateNavbar() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add sticky class when scrolled past trigger point
            if (scrollTop > triggerPoint) {
                if (!navbar.classList.contains('nav-sticky')) {
                    navbar.classList.add('nav-sticky');
                    
                    // Add margin to carousel to prevent content jump
                    if (carousel) {
                        carousel.style.marginTop = navbarHeight + 'px';
                    }
                }
                
                // Auto-hide behavior on desktop only
                if (window.innerWidth > 991) {
                    if (scrollTop > lastScrollTop && scrollTop > triggerPoint + 200) {
                        // Scrolling down - hide navbar
                        navbar.style.transform = 'translateY(-100%)';
                    } else {
                        // Scrolling up - show navbar
                        navbar.style.transform = 'translateY(0)';
                    }
                }
            } else {
                // Remove sticky class when at top
                if (navbar.classList.contains('nav-sticky')) {
                    navbar.classList.remove('nav-sticky');
                    navbar.style.transform = 'translateY(0)';
                    
                    // Remove margin from carousel
                    if (carousel) {
                        carousel.style.marginTop = '';
                    }
                }
            }
            
            lastScrollTop = Math.max(0, scrollTop);
            ticking = false;
        }
        
        function onScroll() {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }
        
        // Initial check
        updateNavbar();
        
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', updateNavbar, { passive: true });
    }
    
    /**
     * Mobile Menu Implementation
     */
    function initMobileMenu() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('#navbarCollapse');
        const mobileClose = document.querySelector('.mobile-close');
        
        if (!navbarToggler || !navbarCollapse) return;
        
        function openMobileMenu() {
            if (window.innerWidth <= 991) {
                navbarToggler.classList.add('active');
                navbarCollapse.classList.add('show');
                navbarToggler.setAttribute('aria-expanded', 'true');
                document.body.classList.add('mobile-menu-open');
                
                // Animate menu items
                const navItems = navbarCollapse.querySelectorAll('.nav-item');
                navItems.forEach((item, index) => {
                    item.style.animationDelay = `${index * 0.1}s`;
                    item.classList.add('fadeInUp');
                });
            }
        }
        
        function closeMobileMenu() {
            navbarToggler.classList.remove('active');
            navbarCollapse.classList.remove('show');
            navbarToggler.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('mobile-menu-open');
            
            // Remove animation classes
            const navItems = navbarCollapse.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.style.animationDelay = '';
                item.classList.remove('fadeInUp');
            });
            
            // Close any open dropdowns
            const openDropdowns = navbarCollapse.querySelectorAll('.dropdown.show');
            openDropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
                dropdown.querySelector('.dropdown-menu').classList.remove('show');
            });
        }
        
        // Make closeMobileMenu globally available
        window.closeMobileMenu = closeMobileMenu;
        
        // Toggle button events
        navbarToggler.addEventListener('click', function(e) {
            e.preventDefault();
            if (navbarCollapse.classList.contains('show')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
        
        // Mobile close button
        if (mobileClose) {
            mobileClose.addEventListener('click', closeMobileMenu);
        }
        
        // Close on nav link click (non-dropdown links)
        const navLinks = navbarCollapse.querySelectorAll('.nav-link:not(.dropdown-toggle)');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 991) {
                    setTimeout(closeMobileMenu, 300);
                }
            });
        });
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navbarCollapse.classList.contains('show')) {
                closeMobileMenu();
            }
        });
    }
    
    /**
     * Enhanced Dropdown Implementation
     */
    function initDropdowns() {
        const dropdowns = document.querySelectorAll('.navbar-modern .dropdown');
        
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');
            let timeoutId;
            
            if (!toggle || !menu) return;
            
            // Desktop hover effects
            if (window.innerWidth > 991) {
                dropdown.addEventListener('mouseenter', function() {
                    clearTimeout(timeoutId);
                    this.classList.add('show');
                    menu.classList.add('show', 'fadeInDown');
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    const currentDropdown = this;
                    timeoutId = setTimeout(function() {
                        currentDropdown.classList.remove('show');
                        menu.classList.remove('show', 'fadeInDown');
                    }, 300);
                });
            }
            
            // Mobile/tablet click toggle
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    const isOpen = dropdown.classList.contains('show');
                    
                    // Close other dropdowns
                    dropdowns.forEach(dd => {
                        if (dd !== dropdown) {
                            dd.classList.remove('show');
                            dd.querySelector('.dropdown-menu').classList.remove('show');
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdown.classList.toggle('show');
                    menu.classList.toggle('show');
                }
            });
        });
        
        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('show');
                    dropdown.querySelector('.dropdown-menu').classList.remove('show', 'fadeInDown');
                });
            }
        });
    }
    
    /**
     * Hero Slider Enhancement
     */
    function initHeroSlider() {
        // Check if Owl Carousel is loaded
        if (typeof $.fn.owlCarousel === 'undefined') {
            console.warn('Owl Carousel not loaded. Hero slider functionality limited.');
            return;
        }
        
        const carousel = $('.carousel .owl-carousel');
        if (carousel.length === 0) return;
        
        // Initialize Owl Carousel with responsive settings
        carousel.owlCarousel({
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    nav: false,
                    autoplayTimeout: 4000
                },
                768: {
                    nav: true,
                    autoplayTimeout: 5000
                },
                992: {
                    nav: true,
                    autoplayTimeout: 6000
                }
            },
            onInitialized: function(event) {
                // Add fade-in animation to first slide
                const activeSlide = $(event.target).find('.owl-item.active .carousel-text');
                activeSlide.addClass('fadeInDown');
            },
            onChanged: function(event) {
                // Add animation to new active slide
                const activeSlide = $(event.target).find('.owl-item.active .carousel-text');
                activeSlide.addClass('fadeInDown');
                
                // Remove animation from inactive slides
                $(event.target).find('.owl-item:not(.active) .carousel-text').removeClass('fadeInDown');
            }
        });
        
        // Pause on form interaction (if any forms in slides)
        carousel.on('click', 'input, button, a', function() {
            carousel.trigger('stop.owl.autoplay');
        });
        
        // Resume autoplay after interaction
        carousel.hover(
            function() {
                carousel.trigger('stop.owl.autoplay');
            },
            function() {
                carousel.trigger('play.owl.autoplay', [6000]);
            }
        );
    }
    
    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const navbar = document.querySelector('.navbar-modern');
        const navbarHeight = navbar ? navbar.offsetHeight : 70;
        
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '#top') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - navbarHeight - 20;
                    
                    window.scrollTo({
                        top: Math.max(0, offsetTop),
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    /**
     * Accessibility Enhancements
     */
    function initAccessibility() {
        const dropdowns = document.querySelectorAll('.navbar-modern .dropdown');
        
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');
            const items = menu.querySelectorAll('.dropdown-item');
            
            if (!toggle || !menu) return;
            
            // Keyboard navigation for dropdowns
            toggle.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    dropdown.classList.toggle('show');
                    menu.classList.toggle('show');
                    
                    if (menu.classList.contains('show') && items.length > 0) {
                        items[0].focus();
                    }
                }
            });
            
            // Arrow key navigation in dropdown items
            items.forEach((item, index) => {
                item.addEventListener('keydown', function(e) {
                    switch(e.key) {
                        case 'ArrowDown':
                            e.preventDefault();
                            if (index < items.length - 1) {
                                items[index + 1].focus();
                            }
                            break;
                        case 'ArrowUp':
                            e.preventDefault();
                            if (index > 0) {
                                items[index - 1].focus();
                            } else {
                                toggle.focus();
                            }
                            break;
                        case 'Escape':
                            dropdown.classList.remove('show');
                            menu.classList.remove('show');
                            toggle.focus();
                            break;
                        case 'Tab':
                            if (!e.shiftKey && index === items.length - 1) {
                                dropdown.classList.remove('show');
                                menu.classList.remove('show');
                            }
                            break;
                    }
                });
            });
        });
        
        // Focus management for mobile menu
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('#navbarCollapse');
        
        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        }
    }
    
    /**
     * Performance Optimizations
     */
    
    // Throttle scroll events
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }
    
    // Debounce resize events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Handle responsive changes
    const handleResize = debounce(function() {
        // Close mobile menu if screen becomes larger
        if (window.innerWidth > 991) {
            const navbarCollapse = document.querySelector('#navbarCollapse');
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                window.closeMobileMenu();
            }
        }
    }, 300);
    
    window.addEventListener('resize', handleResize);
    
    // Add loading state management
    window.addEventListener('load', function() {
        document.body.classList.add('loaded');
        
        // Initialize any remaining components that need full load
        const lazyElements = document.querySelectorAll('[data-lazy]');
        lazyElements.forEach(element => {
            element.classList.add('loaded');
        });
    });
});

// Add fadeInUp animation styles
const animationStyles = document.createElement('style');
animationStyles.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fadeInUp {
        animation: fadeInUp 0.6s ease forwards;
    }
    
    .loaded {
        opacity: 1;
        transition: opacity 0.3s ease;
    }
`;
document.head.appendChild(animationStyles);