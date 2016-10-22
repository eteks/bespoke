;(function() {
    "use strict";
    if($('#price_range_filter_value').length > 0) {
        var price_value = $('#price_range_filter_value').val().split(',');
        $("#double_number_range").rangepicker({
        type: "double",
        startValue: 0,
        endValue: price_value[1],
        translateSelectLabel: function(currentPosition, totalPosition) {
            return parseInt(price_value[1] * (currentPosition / totalPosition));
        }
        });
    }
}()); // Added by siva for price filter