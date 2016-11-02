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

function price_filter() {
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

}()); 
} // Added by siva for price filter

function add_to_cart_color_panel() {
    //Details page
    if($('.color_panel_details').length > 0) {
        $('.color_panel_details:first') .addClass('selected');
        var val_id= $('.color_panel_details:first').find('a').data('val_id');
        $('.hidden_color_panel').val(val_id);
    }
}
$(document).ready(function() {
    price_filter();
    add_to_cart_color_panel();

    $('body').bind("cut copy paste",function(e) {
          e.preventDefault();
    });

    if($('#total_amount').val() == 0 ) {
        $('.basket_section_button').css('pointer-events','none');
        $('.basket_section_button').attr('disabled',true);
    }
    else {
        $('.basket_section_button').css('pointer-events','auto');
        $('.basket_section_button').attr('disabled',false);
    }   

    //if the letter is not digit then display error and don't type anything
    $('.product_quantity').on('keypress',function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('.product_quantity').on('change',function() {
        $('#checkout_button').addClass('update_error');
        $('#checkout_button').prop('title',"To update the basket");
 
    });
    $('#checkout_button').on('click',function(e) {
        if($(this).hasClass('update_error')) {
            e.preventDefault();
        }
        else {
            e.unbind();
        }
 
    });


    $('.product_quantity').on('keyup',function() {
        var this_value = $(this).val();
        var this_parent = $(this).parents('.amount_structure');
        var overall_updated_total = 0;

        if(this_value <= 0) {
            alert("Enter product quantity correctly");
            $(this).val('1');
            this_value = 1;
        }
        var orderitem_price = this_parent.find('.ordinary_orderitem_price').val();
        var product_overall_total = $('.ordinary_product_total').val();
        var unit_price = parseFloat(orderitem_price.replace(',',''));
        var quantity_total = parseFloat(this_value);
        var single_product_total = unit_price * quantity_total;
        var shipping_amount = parseFloat($('.ordinary_shipping_amount').val().replace(',',''));

        this_parent.find('.product_total').html(single_product_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
        this_parent.find('.updated_product_total').val(single_product_total.toLocaleString('en-US', {minimumFractionDigits: 2}));
   
        $('.updated_product_total').each(function(){
            var this_amount = parseFloat($(this).val().replace(',', ''));
            overall_updated_total += this_amount;
        });

        $('.product_overall_total').html(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.overall_total_product_amount').val(overall_updated_total.toLocaleString('en-US', {minimumFractionDigits: 2}));

        var total_final_amount = overall_updated_total + shipping_amount;

        $('.product_final_amount').html(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.ordinary_final_amount').val(Math.ceil(overall_updated_total).toLocaleString('en-US', {minimumFractionDigits: 2}));
       
        this_parent.find('.update_basket_details').attr('data-quantity',this_value);
    });
//Checkout page validation add by velpandi
//  Moibile number validation
$(document).on('keypress',"#InputMobile,#InputZip",function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});

// Checkout address button
$(document).on('click','#checkout_address_submit',function() {

    var text_field = ["InputName","InputLastName","InputAddress","InputAddress2","InputEmail","InputMobile","InputZip","InputState","InputCity","InputArea"];
    var email_val = $('#InputEmail');
    var phone_val = $('#InputMobile');
    var zip_val = $('#InputZip');

    // Empty validation
    for(var i=0;i<text_field.length;i++) {
        var current_field = $('#'+text_field[i]);
        if(current_field.val() != '') {
           current_field.removeClass('error_field');
        }
        else {
            current_field.addClass('error_field');
        }
    }

    // Email validation
    if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email_val.val())) {
        email_val.addClass("error_mail_field");
    }
    else {
        email_val.removeClass("error_mail_field");
    }

    //  Number validation
    if(phone_val.val().length < 10) {
        phone_val.addClass("error_mobile_field");
    }
    else {
        phone_val.removeClass("error_mobile_field"); 
    }

    //  Zip validation
    if(zip_val.val().length < 4) {
        zip_val.addClass("error_zip_field");
    }
    else {
        zip_val.removeClass("error_zip_field"); 
    }

    //  Display error message
    if($('input').hasClass('error_field') || $('select').hasClass('error_field')) {
        $('.error_msg').html("Please fill out all fields");   
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_zip_field')){
        $('.error_msg').html("Please enter valid postal code");
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_mobile_field')){
        $('.error_msg').html("Please enter valid mobile number");
        $('.error_msg').slideDown();
    }
    else if($('input').hasClass('error_mail_field')){
        $('.error_msg').html("Please enter valid email address");
        $('.error_msg').slideDown();
    }
    else {
        $('.error_msg').slideUp();
        $('#checkout_address').hide();
        $('#checkout_order').slideDown(800);
        $('.address_label').removeClass('active');
        $('.address_label').addClass('disabled');
        $('.order_label').removeClass('disabled');
        $('.order_label').addClass('active');
    }
    return false;
});
// Checkout address button
$('#checkout_order_submit').on('click',function() {
    $('#checkout_order').hide();
    $('#checkout_address').slideDown(800);
    $('.order_label').removeClass('active');
    $('.order_label').addClass('disabled');
    $('.address_label').removeClass('disabled');
    $('.address_label').addClass('active');
});



}); // End document