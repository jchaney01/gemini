//This file has JS code used by every single page.
;(function () {
    'use strict';
    // restfulizer.js

    /**
     * Restfulize any hiperlink that contains a data-method attribute by
     * creating a mini form with the specified method and adding a trigger
     * within the link.
     * Requires jQuery!
     *
     * Ex:
     *     <a href="post/1" data-method="delete">destroy</a>
     *     // Will trigger the route Route::delete('post/(:id)')
     *
     */
    $(function(){
        $('[data-method]').append(function(){
            return "\n"+
                "<form action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
                "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
                "</form>\n"
        })
            .removeAttr('href')
            .attr('style','cursor:pointer;color:#FFFFFF')
            .attr('onclick','$(this).find("form").submit();');
    });
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

                var target = $(e.currentTarget).data("section");
                //window.mySwipe.slide($(e.currentTarget).parent().index());
                setActiveSubNav($(e.currentTarget).parent().index());
                animateNavBarToIndex($(e.currentTarget).parent().index());

                switch(target){
                    case "changeorders":
                        appRouter.navigate("#changeorders",{trigger:true,replace:true});
                        break;
                    case "overview":
                        appRouter.navigate("#overview",{trigger:true,replace:true});
                        break;
                    case "timelogs":
                        appRouter.navigate("#timelogs",{trigger:true,replace:true});
                        break;
                }
            });
        } else {
            alert("Your browser is too old to navigate to a different subsection.")
        }
        $("[rel=popover]").popover();
        $('textarea').autoResizer();
        $('input#filter').quicksearch('.filterable');
        var AppRouter = Backbone.Router.extend({

            routes: {
                "changeorders":                 "co",    // #changeorders
                "overview":                 "overview",
                "timelogs":                 "timelogs"
            },
            co: function() {
                window.mySwipe.slide(2);
            },
            overview: function() {
                window.mySwipe.slide(0);
            },
            timelogs: function() {
                window.mySwipe.slide(1);
            }
        });
        var appRouter = new AppRouter();
        Backbone.history.start();

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
                    left:'0%',
                    width:"85px"
                },250);
                break;
            case 1:
                positionIndicator.animate({
                    left:'34%',
                    width:"100px"
                },250);
                break;
            case 2:
                positionIndicator.animate({
                    left:'68%',
                    width:"130px"
                },250);
                break;
        }
    }
}());