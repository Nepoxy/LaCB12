/* ===========================
   TAB FILTER — Discover page
=========================== */
(function initTabs() {
    const tabs = document.querySelectorAll('.tab');
    if (!tabs.length) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Update active state
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            const selected = tab.dataset.tab;

            // Filter featured cards
            document.querySelectorAll('.featured-card[data-category]').forEach(card => {
                const show = selected === 'all' || card.dataset.category === selected;
                card.classList.toggle('hidden', !show);
            });

            // Filter top destination cards
            document.querySelectorAll('.top-card[data-category]').forEach(card => {
                const show = selected === 'all' || card.dataset.category === selected;
                card.classList.toggle('hidden', !show);
            });
        });
    });
})();

/* ===========================
   THUMBNAIL SWITCHER — Detail page
=========================== */
(function initThumbs() {
    const thumbs   = document.querySelectorAll('.thumb');
    const heroImg  = document.getElementById('hero-img');
    if (!thumbs.length || !heroImg) return;

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            thumbs.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');

            // Crossfade hero image
            heroImg.style.opacity = '0';
            heroImg.style.transition = 'opacity 0.3s ease';
            setTimeout(() => {
                heroImg.src = thumb.src.replace('w=160&h=160', 'w=600');
                heroImg.style.opacity = '1';
            }, 150);
        });
    });
})();

/* ===========================
   HEART TOGGLE — Detail page
=========================== */
(function initHeart() {
    const heartBtn = document.getElementById('heart-btn');
    if (!heartBtn) return;

    heartBtn.addEventListener('click', () => {
        heartBtn.classList.toggle('liked');
        const svg = heartBtn.querySelector('svg');
        if (heartBtn.classList.contains('liked')) {
            svg.innerHTML = '<path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>';
        } else {
            svg.innerHTML = '<path fill="currentColor" d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/>';
        }
    });
})();

/* ===========================
   READ MORE — Detail page
=========================== */
(function initReadMore() {
    const readMoreBtn  = document.getElementById('read-more-btn');
    const fullText     = document.getElementById('desc-full');
    if (!readMoreBtn || !fullText) return;

    readMoreBtn.addEventListener('click', () => {
        if (fullText.style.display === 'none' || !fullText.style.display) {
            fullText.style.display = 'inline';
            readMoreBtn.textContent = 'Read Less';
        } else {
            fullText.style.display = 'none';
            readMoreBtn.textContent = 'Read More';
        }
    });
})();

/* ===========================
   SPLASH — Go button ripple
=========================== */
(function initSplash() {
    const goBtn = document.querySelector('.go-btn');
    if (!goBtn) return;

    goBtn.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(0,0,0,0.08);
            width: 100%; height: 100%;
            top: 0; left: 0;
            transform: scale(0);
            animation: ripple 0.5s ease-out;
            pointer-events: none;
        `;
        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 500);
    });

    // Add ripple animation
    if (!document.getElementById('ripple-style')) {
        const style = document.createElement('style');
        style.id = 'ripple-style';
        style.textContent = '@keyframes ripple { to { transform: scale(2.5); opacity: 0; } }';
        document.head.appendChild(style);
    }
})();
