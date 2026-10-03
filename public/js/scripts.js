/*! Start Bootstrap - SB Admin v7.0.1 */
(function () {
    function initializeSidebar() {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var sidebarLinks = document.querySelectorAll('#layoutSidenav_nav .ajax_link');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

        sidebarLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (!window.matchMedia('(max-width: 991.98px)').matches) return;

                document.body.classList.remove('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', 'false');
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSidebar);
    } else {
        initializeSidebar();
    }
})();
