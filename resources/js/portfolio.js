/*
|--------------------------------------------------------------------------
| Portfolio interactions
|--------------------------------------------------------------------------
*/

const initializePortfolio = () => {
    const navToggle = document.querySelector('[data-nav-toggle]');
    const navLinks = document.querySelector('#primary-navigation');

    const closeNavigation = () => {
        navLinks?.classList.remove('is-open');
        navToggle?.setAttribute('aria-expanded', 'false');
        navToggle?.setAttribute('aria-label', 'Open navigation menu');
    };

    navToggle?.addEventListener('click', () => {
        const isOpen = navLinks?.classList.toggle('is-open');

        navToggle.setAttribute('aria-expanded', String(isOpen));
        navToggle.setAttribute(
            'aria-label',
            isOpen ? 'Close navigation menu' : 'Open navigation menu'
        );
    });

    navLinks?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeNavigation);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeNavigation();
        }
    });

    document.querySelectorAll('[data-hover-video]').forEach((video) => {
        video.addEventListener('mouseenter', () => {
            video.play().catch(() => {});
        });

        video.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0;
        });
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializePortfolio, { once: true });
} else {
    initializePortfolio();
}