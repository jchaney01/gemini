(function () {
    'use strict';
    $(init);
    function init () {
        $(".icon-cog").parent().on("click",function(e){
            var d = new Date();
            var h = d.getHours();
            var m = d.getMinutes();
            var med = "";
            h = checkHourTime(h);
            m = checkMinuteTime(m);
            med = checkMed(d.getHours());
            $(e.currentTarget).prev().val(h + ":" + m + med);
        })
    }

    function checkHourTime(i) {
        if (i > 12) {
            i = i - 12;
            if (i < 10) {
                i = "0" + i;
                return i;
            }
            return i;
        } else if (i < 1) {
            i = 12;
        }
        return i;
    }

    function checkMinuteTime(i) {
        if (i < 10) {
            i = "0" + i;
            return i;
        }
        return i;
    }

    function checkMed(i) {
        if (i > 11) {
            return " pm";
        } else {
            return " am";
        }
    }
}());