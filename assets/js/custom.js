$(window).load(function()
{
	centerContent();
});
$(window).resize(function()
{
	centerContent();
});
function centerContent()
{
	$('.images_alignment,.liked_product_images').each(function(){
		$(this).css("margin-left", -($(this).width())/2);
		$(this).css("margin-top", -($(this).height())/2);
	});
}
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

function add_to_cart_color_panel() {
    //Details page
    if($('.color_panel_details').length > 0) {
        $('.color_panel_details:first') .addClass('selected');
        var val_id= $('.color_panel_details:first').find('a').data('val_id');
        $('.hidden_color_panel').val(val_id);
    }
}
$(document).ready(function() {

    
    add_to_cart_color_panel();


});