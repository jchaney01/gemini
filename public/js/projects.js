(function () {
    'use strict';
    $(init);
    function init () {
        $('.hideIt').change(function(e) {
            $(e.currentTarget).parent().next().toggle(300).toggleClass("hidden");
        });
    }
}());