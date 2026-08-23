import gsap from 'gsap';

const canvas = document.querySelector('#three-canvas');

if (!canvas) {
    console.warn('Three.js canvas not found.');
}

let scrollProgress = 0;

function updateScroll() {
    const maxScroll =
        document.documentElement.scrollHeight -
        window.innerHeight;

    if (maxScroll <= 0) {
        scrollProgress = 0;
        return;
    }

    scrollProgress =
        window.scrollY / maxScroll;

    /*
    |--------------------------------------------------------------------------
    | Portfolio scroll progress
    |--------------------------------------------------------------------------
    |
    | 0 = top of page
    | 1 = bottom of page
    |
    | We'll connect this value to the Three.js
    | camera and objects as we build the
    | different portfolio sections.
    |
    */

    window.dispatchEvent(
        new CustomEvent('portfolio-scroll', {
            detail: {
                progress: scrollProgress,
                scrollY: window.scrollY,
            },
        })
    );
}

window.addEventListener(
    'scroll',
    updateScroll,
    { passive: true }
);

updateScroll();

export function getScrollProgress() {
    return scrollProgress;
}
