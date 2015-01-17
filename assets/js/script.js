$(document).ready(function() {

    /* Initialize Plugin */
    $("#owl-content").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true
    });

    /* Get carousel instance data and store it in variable owl */
    var owl = $(".owl-carousel").data('owlCarousel');

    /* Initialize the page to be on the Welcome to... Dan's Tools
      section of the carousel */
    window.onload = function() {
        owl.jumpTo(1)
    }

    /* Click on the "About Us" text to jump to that part of the carousel. */
    $("#about-us").click(function() {
        owl.goTo(0)
    });

    /* Click on the hammer logo to jump to the home part of the carousel. */
    $("#hammer-logo-container").click(function() {
        owl.goTo(1)
    });

    /* Click on the "Contact" text to jump to that part of the carousel. */
    $("#contact").click(function() {
        owl.goTo(2)
    });


});