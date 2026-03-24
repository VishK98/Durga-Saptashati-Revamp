/**
 * Global Animation Controller
 * Handles scroll-triggered animations and professional transitions
 */

(function () {
  "use strict";

  let animationElements = [];
  let isScrolling = false;

  // Initialize animations when DOM is ready
  function initAnimations() {
    // Gather all elements that need animation
    animationElements = [
      ...document.querySelectorAll(".animate-fade-in-up"),
      ...document.querySelectorAll(".animate-fade-in-left"),
      ...document.querySelectorAll(".animate-fade-in-right"),
      ...document.querySelectorAll(".animate-scale-in"),
      ...document.querySelectorAll(".animate-stagger"),
      ...document.querySelectorAll(".section-header"),
    ];

    // Set up intersection observer for performance
    setupIntersectionObserver();

    // Add scroll listener for navbar effects
    setupScrollEffects();

    // Add entrance animations for immediately visible content
    addEntranceAnimations();

    // Initialize text animations
    initTextAnimations();

    console.log(
      "Global animations initialized:",
      animationElements.length,
      "elements"
    );
  }

  // Intersection Observer for better performance
  function setupIntersectionObserver() {
    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              triggerAnimation(entry.target);
              observer.unobserve(entry.target);
            }
          });
        },
        {
          threshold: 0.1,
          rootMargin: "50px 0px -50px 0px",
        }
      );

      animationElements.forEach((element) => {
        observer.observe(element);
      });
    } else {
      // Fallback for older browsers
      window.addEventListener("scroll", throttle(checkAnimations, 100));
      checkAnimations();
    }
  }

  // Trigger animation on element
  function triggerAnimation(element) {
    if (element.classList.contains("section-header")) {
      element.classList.add("animate-in");
    } else {
      element.classList.add("in-view");
    }

    // Add stagger delay for child elements if needed
    if (element.classList.contains("animate-stagger")) {
      const children = element.children;
      Array.from(children).forEach((child, index) => {
        setTimeout(() => {
          child.style.opacity = "1";
          child.style.transform = "translateY(0)";
        }, index * 100);
      });
    }
  }

  // Check if element is in viewport (fallback)
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  // Check animations (fallback for older browsers)
  function checkAnimations() {
    animationElements.forEach((element) => {
      if (isInViewport(element) || isElementPartiallyVisible(element)) {
        triggerAnimation(element);
      }
    });
  }

  // Check if element is partially visible
  function isElementPartiallyVisible(element) {
    const rect = element.getBoundingClientRect();
    const windowHeight =
      window.innerHeight || document.documentElement.clientHeight;
    return rect.top < windowHeight && rect.bottom > 0;
  }

  // Throttle function for performance
  function throttle(func, limit) {
    let inThrottle;
    return function () {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  }

  // Add entrance animations for hero sections and immediate content
  function addEntranceAnimations() {
    // Hero content entrance
    const heroElements = document.querySelectorAll(
      ".carousel .carousel-text, .hero-content"
    );
    heroElements.forEach((element, index) => {
      element.style.animationDelay = `${index * 0.2}s`;
    });

    // Page header animations are handled by CSS

    // First section immediate animation
    const firstSection = document.querySelector(".section-header");
    if (firstSection && isElementPartiallyVisible(firstSection)) {
      setTimeout(() => {
        firstSection.classList.add("animate-in");
      }, 500);
    }
  }

  // Setup scroll effects for various elements
  function setupScrollEffects() {
    let ticking = false;

    function updateScrollEffects() {
      const scrollY = window.pageYOffset || document.documentElement.scrollTop;

      // Parallax effects for hero sections
      const heroElements = document.querySelectorAll("[data-parallax]");
      heroElements.forEach((element) => {
        const speed = element.dataset.parallax || 0.5;
        element.style.transform = `translateY(${scrollY * speed}px)`;
      });

      // Add scroll classes for additional effects
      if (scrollY > 100) {
        document.body.classList.add("scrolled");
      } else {
        document.body.classList.remove("scrolled");
      }

      ticking = false;
    }

    window.addEventListener("scroll", () => {
      if (!ticking) {
        requestAnimationFrame(updateScrollEffects);
        ticking = true;
      }
    });
  }

  // Initialize text animations with typing effect
  function initTextAnimations() {
    const typingElements = document.querySelectorAll("[data-typing]");
    typingElements.forEach((element) => {
      const text = element.textContent;
      const delay = element.dataset.typingDelay || 50;

      element.textContent = "";
      element.style.opacity = "1";

      let i = 0;
      const typing = setInterval(() => {
        element.textContent += text.charAt(i);
        i++;
        if (i >= text.length) {
          clearInterval(typing);
        }
      }, delay);
    });
  }

  // Initialize button hover effects
  function initButtonEffects() {
    const buttons = document.querySelectorAll(".btn-professional, .btn-custom");
    buttons.forEach((button) => {
      button.addEventListener("mouseenter", function () {
        this.style.transform = "translateY(-3px) scale(1.02)";
      });

      button.addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0) scale(1)";
      });
    });
  }

  // Add floating animation to elements
  function addFloatingAnimations() {
    const floatingElements = document.querySelectorAll("[data-float]");
    floatingElements.forEach((element, index) => {
      element.style.animation = `float ${
        3 + (index % 2)
      }s ease-in-out infinite`;
      element.style.animationDelay = `${index * 0.2}s`;
    });
  }

  // CSS for floating animation
  function addFloatingCSS() {
    if (!document.getElementById("floating-animation-css")) {
      const style = document.createElement("style");
      style.id = "floating-animation-css";
      style.textContent = `
                @keyframes float {
                    0%, 100% {
                        transform: translateY(0px);
                    }
                    50% {
                        transform: translateY(-10px);
                    }
                }
                
                @keyframes pulse {
                    0%, 100% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.05);
                    }
                }
                
                .animate-pulse {
                    animation: pulse 2s ease-in-out infinite;
                }
            `;
      document.head.appendChild(style);
    }
  }

  // Initialize everything when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
      initAnimations();
      initButtonEffects();
      addFloatingAnimations();
      addFloatingCSS();
    });
  } else {
    initAnimations();
    initButtonEffects();
    addFloatingAnimations();
    addFloatingCSS();
  }

  // Re-initialize on dynamic content changes
  window.reinitializeAnimations = function () {
    initAnimations();
    initButtonEffects();
    addFloatingAnimations();
  };
})();
