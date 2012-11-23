//This file has JS code used by every single page.
(function () {
    'use strict';
    $(init);
    function init () {

        if ( Modernizr.csstransforms ) {
            window.mySwipe = new Swipe(document.getElementById('slider'),{
                callback: function(event, index, elem) {
                    setActiveSubNav(index);
                    animateNavBarToIndex(index);
                }
            });
            $("#centralNav a").on('click',function(e){
                e.preventDefault();
                window.mySwipe.slide($(e.currentTarget).index());
                setActiveSubNav($(e.currentTarget).index());
                animateNavBarToIndex($(e.currentTarget).index());
            });
        } else {
            alert("Your browser is too old to navigate to a different subsection.")
        }
    }
    function setActiveSubNav(index){
        $("#centralNav a").removeClass("active");
        $("#centralNav a").eq(index).addClass("active");
    }
    //<editor-fold desc="Description">
    function animateNavBarToIndex(index){
        var positionIndicator = $("#positionIndicator");
        switch(index){
            case 0:
                positionIndicator.animate({
                    left:'40'
                });
                break;
            case 1:
                positionIndicator.animate({
                    left:'196'
                });
                break;
            case 2:
                positionIndicator.animate({
                    left:'355'
                });
                break;

        }
    }
    //</editor-fold>
}());