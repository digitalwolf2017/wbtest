// ===== MODAL HANDLING =====
document.addEventListener('click', (e) => {
    const popup = document.getElementById('popup-form');

    // If the clicked element has 'open-modal' class, open the popup
    const openBtn = e.target.closest('.open-modal');
    if (openBtn) {
        if (popup) {
            popup.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden'; // Stop scrolling
            
            const isBrochureInput = document.getElementById('is_brochure_input');
            if (isBrochureInput) {
                const isBrochure = openBtn.dataset.type === 'brochure';
                isBrochureInput.value = isBrochure ? '1' : '0';
                console.log('Modal Triggered:', isBrochure ? 'Brochure Mode' : 'Normal Mode');
            }
        }
    }

    // If 'close-modal' is clicked OR user clicks the background overlay
    if (e.target.closest('.close-modal') || e.target.id === 'popup-form') {
        if (popup) {
            popup.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'auto'; // Enable scrolling
        }
    }
});


// ===== MODAL HANDLING =====
document.addEventListener('click', (e) => {
    const popup = document.getElementById('rank-form');

    // If the clicked element has 'open-modal' class, open the popup
    const openBtn = e.target.closest('.open-rank-modal');
    if (openBtn) {
        if (popup) {
            popup.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden'; // Stop scrolling
            
            const isBrochureInput = document.getElementById('is_brochure_input');
            if (isBrochureInput) {
                const isBrochure = openBtn.dataset.type === 'brochure';
                isBrochureInput.value = isBrochure ? '1' : '0';
                console.log('Modal Triggered:', isBrochure ? 'Brochure Mode' : 'Normal Mode');
            }
        }
    }

    // If 'close-modal' is clicked OR user clicks the background overlay
    if (e.target.closest('.close-modal') || e.target.id === 'rank-form') {
        if (popup) {
            popup.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'auto'; // Enable scrolling
        }
    }
});
// ===== NAVBAR SCROLL LOGIC =====
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    const navLogo = document.getElementById('nav-logo');
    const menuBtn = document.getElementById('menu-btn');
    const navLinks = document.querySelectorAll('.nav-link');

    // Scroll Logic Handler for Dynamic Navbar Transition
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.remove('bg-transparent', 'py-4');
                navbar.classList.add('bg-white', 'shadow-md', 'py-3');

                if (navLogo) {
                    navLogo.classList.remove('text-white');
                    navLogo.classList.add('text-blue-950');
                }
                if (menuBtn) {
                    menuBtn.classList.remove('text-white');
                    menuBtn.classList.add('text-blue-950');
                }

                navLinks.forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-gray-700');
                });
            } else {
                navbar.classList.remove('bg-white', 'shadow-md', 'py-3');
                navbar.classList.add('bg-transparent', 'py-4');

                if (navLogo) {
                    navLogo.classList.remove('text-blue-950');
                    navLogo.classList.add('text-white');
                }
                if (menuBtn) {
                    menuBtn.classList.remove('text-blue-950');
                    menuBtn.classList.add('text-white');
                }

                navLinks.forEach(link => {
                    link.classList.remove('text-gray-700');
                    link.classList.add('text-white');
                });
            }
        });
    }
});

// ===== SCROLL REVEAL & COUNTERS =====
document.addEventListener("DOMContentLoaded", () => {
    // 1. Reveal layout wrapper triggers
    const revealElements = document.querySelectorAll('.scroll-reveal');

    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-6', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');

                    // If it's the stats box, fire up the incremental visual data count tickers
                    if (entry.target.querySelector('.counter-val')) {
                        animateCounters();
                    }
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        revealElements.forEach(el => revealObserver.observe(el));
    }

    // 2. Incremental Data Ticker Module
    function animateCounters() {
        const counters = document.querySelectorAll('.counter-val');

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 1600; // global duration in milliseconds
            const startTime = performance.now();

            function updateCount(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // EaseOutQuad formula for clean speed distribution
                const easeProgress = progress * (2 - progress);
                const currentVal = Math.floor(easeProgress * target);

                // Inject localized thousands separation formatting if needed
                counter.innerText = currentVal.toLocaleString('en-US');

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target.toLocaleString('en-US');
                }
            }
            requestAnimationFrame(updateCount);
        });
    }
});

// ===== AOS INITIALIZATION =====
document.addEventListener('DOMContentLoaded', () => {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800, // global animation duration in ms
            once: true,    // whether animation should happen only once - while scrolling down
        });
    }
});