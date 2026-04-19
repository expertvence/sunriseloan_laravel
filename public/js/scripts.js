/*!
    * Start Bootstrap - SB Admin v7.0.1 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 
window.addEventListener('DOMContentLoaded', event => {
    
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    const sidebarLinks = document.querySelectorAll('.ajax_link'); // Select all links with ajax_link class


    // Check for sidebar toggle button click
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    // Add click event listener to all sidebar links
    // sidebarLinks.forEach(link => {
    //     link.addEventListener('click', event => {
    //         console.log('Sidebar link clicked!');
    //         // $('body').removeClass('sb-nav-fixed mainContant')
    //         $('body').addClass('sb-sidenav-toggled')
    //         // Optionally prevent default if using Ajax
    //         // event.preventDefault();

    //         // Close the sidebar
    //         // closeSidebar();
    //     });
    // });

    sidebarLinks.forEach(link => {
        link.addEventListener('click', handleSidebarToggle);
        link.addEventListener('touchstart', handleSidebarToggle); // Add touchstart for mobile devices
    });

    // this is for sidebar onclick toggled
    // function handleSidebarToggle(event) {
    //     console.log('Sidebar link clicked!');
    //     $('body').addClass('sb-sidenav-toggled');
    // }
  
});

