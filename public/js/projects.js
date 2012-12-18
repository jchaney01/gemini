(function () {
    'use strict';
    $(init);
    function init () {
        $('.hideIt').change(function(e) {
            $(e.currentTarget).parent().next().toggle(300).toggleClass("hidden");
        });

        $('#autopop').change(function(e) {
            var email = $(e.currentTarget).val();
            $("#recipient").val(email);
            $(e.currentTarget).val("Autopopulate");
            $('#recipient').popover({
                "placement":"bottom",
                "title":"Please verify",
                "content":"Is this the right person?",
                "trigger":"manual"
            });
            $('#recipient').popover('show');
            _.delay(function(){$('#recipient').popover('hide');},2500);
        });


    }
}());