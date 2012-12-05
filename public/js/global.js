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
                window.mySwipe.slide($(e.currentTarget).parent().index());
                setActiveSubNav($(e.currentTarget).parent().index());
                animateNavBarToIndex($(e.currentTarget).parent().index());
            });
        } else {
            alert("Your browser is too old to navigate to a different subsection.")
        }
        $("[rel=popover]").popover();
        $('textarea').autoResizer();
        $('input#filter').quicksearch('.filterable');
    }
    function setActiveSubNav(index){
        $("#centralNav a").removeClass("active");
        $("#centralNav a").eq(index).addClass("active");
    }
    function animateNavBarToIndex(index){
        var positionIndicator = $("#positionIndicator");
        switch(index){
            case 0:
                positionIndicator.animate({
                    left:'0%'
                },250);
                break;
            case 1:
                positionIndicator.animate({
                    left:'34%'
                },250);
                break;
            case 2:
                positionIndicator.animate({
                    left:'68%'
                },250);
                break;
        }
    }
}());