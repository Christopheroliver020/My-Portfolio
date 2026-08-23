document.addEventListener('DOMContentLoaded', () => {

    const page = document.querySelector('.dashboard-page');

    const openButton = document.getElementById(
        'dashboardOpenMenu'
    );

    const closeButton = document.getElementById(
        'dashboardCloseMenu'
    );

    const overlay = document.getElementById(
        'dashboardMobileOverlay'
    );


    function openMenu() {

        if (!page) return;

        page.classList.add('mobile-menu-open');

        document.body.style.overflow = 'hidden';
    }


    function closeMenu() {

        if (!page) return;

        page.classList.remove('mobile-menu-open');

        document.body.style.overflow = '';
    }


    if (openButton) {
        openButton.addEventListener('click', openMenu);
    }


    if (closeButton) {
        closeButton.addEventListener('click', closeMenu);
    }


    if (overlay) {
        overlay.addEventListener('click', closeMenu);
    }


    document
        .querySelectorAll('.dashboard-mobile-sidebar a')
        .forEach((link) => {

            link.addEventListener('click', closeMenu);

        });

});
