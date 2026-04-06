/**
 * Reusable Gallery Lightbox + Counter Animation
 * Shared across all event/cause pages
 */

/* ---------- Lightbox ---------- */
function initLightbox(lightboxId, data) {
    var idx = 0;
    var filteredIndices = data.map(function (_, i) { return i; });
    var lb = document.getElementById(lightboxId);
    if (!lb) return null;

    var img = lb.querySelector('.lb-img');
    var title = lb.querySelector('.lb-title');
    var info = lb.querySelector('.lb-info');

    function update() {
        var d = data[idx];
        img.src = d.src;
        if (title) title.textContent = d.title || '';
        if (info) info.textContent = d.category || '';
    }

    function open(i) {
        idx = i;
        update();
        lb.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function close() {
        lb.style.display = 'none';
        document.body.style.overflow = '';
    }

    function prev() {
        var pos = filteredIndices.indexOf(idx);
        pos = (pos - 1 + filteredIndices.length) % filteredIndices.length;
        idx = filteredIndices[pos];
        update();
    }

    function next() {
        var pos = filteredIndices.indexOf(idx);
        pos = (pos + 1) % filteredIndices.length;
        idx = filteredIndices[pos];
        update();
    }

    lb.querySelector('.lb-close').addEventListener('click', close);
    lb.querySelector('.lb-prev').addEventListener('click', prev);
    lb.querySelector('.lb-next').addEventListener('click', next);
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });

    document.addEventListener('keydown', function (e) {
        if (lb.style.display !== 'flex') return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') prev();
        if (e.key === 'ArrowRight') next();
    });

    return {
        open: open,
        close: close,
        prev: prev,
        next: next,
        setFiltered: function (indices) { filteredIndices = indices; }
    };
}

/* ---------- Counter Animation ---------- */
function initCounters() {
    var counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var c = entry.target;
                var target = parseInt(c.getAttribute('data-counter'));
                var suffix = c.hasAttribute('data-counter-suffix') ? c.getAttribute('data-counter-suffix') : '';
                var useLocale = c.hasAttribute('data-counter-locale');
                var current = 0;
                var inc = target / 60;

                var timer = setInterval(function () {
                    current += inc;
                    if (current >= target) {
                        c.textContent = (useLocale ? target.toLocaleString() : target) + suffix;
                        clearInterval(timer);
                    } else {
                        c.textContent = useLocale ? Math.floor(current).toLocaleString() : Math.floor(current);
                    }
                }, 25);
                obs.unobserve(c);
            }
        });
    }, { threshold: 0.7 });

    counters.forEach(function (c) { obs.observe(c); });
}

/* ---------- Gallery Filter (for event-gallery) ---------- */
function initGalleryFilter(gridSelector) {
    var filterBtns = document.querySelectorAll('.gallery-filter');
    if (!filterBtns.length) return null;

    var filteredIndices = [];

    function filter(cat, btn) {
        filterBtns.forEach(function (b) {
            b.classList.remove('active');
        });
        btn.classList.add('active');

        filteredIndices = [];
        document.querySelectorAll(gridSelector + ' .gallery-card').forEach(function (item, i) {
            if (cat === 'all' || item.getAttribute('data-category') === cat) {
                item.style.display = '';
                filteredIndices.push(i);
            } else {
                item.style.display = 'none';
            }
        });

        return filteredIndices;
    }

    return { filter: filter };
}

/* ---------- Floating Animation Helper ---------- */
function initFloatingAnimation(selector, animationName, duration) {
    duration = duration || '6s';
    document.querySelectorAll(selector).forEach(function (el, i) {
        setTimeout(function () {
            el.style.animation = animationName + ' ' + duration + ' ease-in-out infinite';
        }, i * 2000);
    });
}

/* ---------- Auto-init counters on DOMContentLoaded ---------- */
document.addEventListener('DOMContentLoaded', initCounters);
