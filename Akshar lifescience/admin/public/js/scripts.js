/*!
    * Start Bootstrap - SB Admin v7.0.3 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (h)
    */
    // 
// Scripts
// ttps://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function(e) {
        target.src = this.result;
    };
    src.addEventListener("change", function() {
        // fill fr with image data    
        fr.readAsDataURL(src.files[0]);
    });
}
