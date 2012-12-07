(function () {
    'use strict';
    $(init);
    function init () {
        $('.hideIt').change(function(e) {
            $(e.currentTarget).parent().next().toggle(300).toggleClass("hidden");
        });

        var ProjectRouter = Backbone.Router.extend({

            routes: {
                "changeorders":                 "co"    // #changeorders
            },
            co: function() {
                window.mySwipe.slide(2);
            }
        });
        var projectRouter = new ProjectRouter();
        Backbone.history.start();
    }
}());