$(document).ready(function() {

    //Initialize Plugin
    $("#owl-content").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true
    });

    //get carousel instance data and store it in variable owl
    var owl = $(".owl-carousel").data('owlCarousel');

    window.onload = function() {
        owl.jumpTo(1)
    }

});