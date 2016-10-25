$(document).ready(function() {

	/*  -- Registration and Login section Start -- */





// var array = ["aasdsa","dasdfasd","daSDAD","DASDSAD","DDSADA","DSADSB"];
// array = array.filter(function(value) {
//     return value.indexOf('D') < 0;
// });
// var test=0;
// $.each(array , function(i, val) { 
//   test += parseInt(array[i].length); 
// });

// alert(test);


	// Registeration
	$('.registration_login').on('submit',function(e) {
		e.preventDefault();
        var form_data =  $(this).serializeArray();
        var this_status = $(this).find('.registration_status');
        jQuery.ajax({
        type: "POST",
        url: baseurl+$(this).attr('action'),
        data: form_data,
            success: function(res) {
                if (res)
                {   
                    if(res=="success") {
                      window.location.href = baseurl;
                    }
                    else {
                        this_status.html(res);
                        this_status.slideDown();
                    }   
                }
            }
        });
	});

    /*  -- Registration and Login section End  -- */

    /*  -- Index page Start -- */
    if($('#load_more_featured_value').length > 0 ) {
        $('#load_more_featured_value').val('4');
    }
    // Registeration
    $(document).on('click','.load_more_featured',function() {
        var remaining_value =  $('.remaining_featured_value').val();
        var limit = 4;
        if(remaining_value >= 1 && remaining_value != '') {
            if(remaining_value >= 4) {
                $(this).css('pointer-events','auto');
                $(this).prop('disabled',false); 
            }
            else {
                $(this).css('pointer-events','none');
                $(this).prop('disabled',true); 
            }

            var start_value =  $('#load_more_featured_value').val();
            var limit = parseInt(start_value) + limit;
            jQuery.ajax({
            type: "POST",
            url: baseurl+'ajax_controller/load_more_featured',
            data: {str_val : start_value},
                success: function(res) {
                    if (res)
                    {   
                        $('.remaining_featured_value').remove();
                        $('#load_more_featured_value').val(limit);
                        $('#featured_product_section').append(res);

                    }
                }
            });
        }
    });

    /*  -- Index page End -- */







    /* -----------   Detail page start  ---------- */

    // sorting for numeric values
    function sortNumber(a,b) {
        return a - b;
    }

     // Attributes change in color panel
    $(document).on('click','.product_details_color_list',function() {

        $('.hidden_color_panel').val($(this).data('val_id'));  
        var attribute_value_id = [];
        $('.product_details_attributes').each(function() {
            attribute_value_id.push($(this).val());
        });
        attribute_value_id.sort(sortNumber);
        $('.attribute_combination').val(attribute_value_id.join(","));
        var atribute_combination = $('.attribute_combination').val();
        var product_id = $('.product_id_detail').val();
        var product_quantity = $('#quantity_product_details').val();
        $('.out_stock').css('display','none');
        $('.in_stock').fadeIn(350);
        jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/attribute_price",
            dataType: "json",
            data: {atribute_combination : atribute_combination, product_id : product_id, quantity : product_quantity},
            success: function(res) {
                if (res)
                {  
                    if(res!=0) {
                        $('.prodcut_details_price').html(res.product_attribute_group_price);
                        $('.update_product_arrtibute_group').val(res.product_attribute_group_id); 
                        $('.add_to_cart_button').prop("disabled", false);
                        $('.add_to_cart_button').css("pointer-events", 'auto');
                        $('.add_to_cart_button').attr("data-check", "true");
                        $('.add_to_cart_button').prop("title", "Add to cart");

                    }
                    else {
                        $('.in_stock').css('display','none');
                        $('.out_stock').fadeIn(350);         
                        $('.add_to_cart_button').prop("disabled", true);
                        $('.add_to_cart_button').css("pointer-events", 'none');
                        $('.add_to_cart_button').attr("data-check", "false");
                        $('.add_to_cart_button').prop("title", "No stack available now");
                    }
                }
            }
        });
    });

    // Attributes change in dropdown
    $(document).on('change','.product_details_attributes_select',function() {
        var attribute_value_id = [];
        $('.product_details_attributes').each(function() {
            attribute_value_id.push($(this).val());
        });
        attribute_value_id.sort(sortNumber);
        $('.attribute_combination').val(attribute_value_id.join(","));
        var atribute_combination = $('.attribute_combination').val();
        var product_id = $('.product_id_detail').val();
        var product_quantity = $('#quantity_product_details').val();
        $('.out_stock').css('display','none');
        $('.in_stock').fadeIn(350);
        jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/attribute_price",
            dataType: "json",
            data: {atribute_combination : atribute_combination, product_id : product_id, quantity : product_quantity},
            success: function(res) {
                if (res)
                {  
                    if(res!=0) {
                        $('.prodcut_details_price').html(res.product_attribute_group_price);
                        $('.update_product_arrtibute_group').val(res.product_attribute_group_id); 
                        $('.add_to_cart_button').prop("disabled", false);
                        $('.add_to_cart_button').css("pointer-events", 'auto');
                        $('.add_to_cart_button').attr("data-check", "true");
                        $('.add_to_cart_button').prop("title", "Add to cart");

                    }
                    else {
                        $('.in_stock').css('display','none');
                        $('.out_stock').fadeIn(350); 
                        $('.out_stock').css('title','Out of stock');             
                        $('.add_to_cart_button').prop("disabled", true);
                        $('.add_to_cart_button').css("pointer-events", 'none');
                        $('.add_to_cart_button').attr("data-check", "false");
                        $('.add_to_cart_button').prop("title", "No stack available now");
                    }
                }
            }
        });
    });

    // //  Add to cart
    // $("#add_to_cart_details").on('click',function() {
    //     var pro_id = $('#product_id').val();
    //     var group_id_length = $('.update_product_arrtibute_group').length;
    //     if(group_id_length > 0) {
    //         var group_id = $('.update_product_arrtibute_group').val();
    //         var datavalues = {pro_id: pro_id , grp_id : group_id};
    //     }
    //     else {
    //         var datavalues = {pro_id: pro_id};
    //     }
    //     jQuery.ajax({
    //     type: "POST",
    //     dataType: "json",
    //     url: baseurl+"index.php/ajax_controller/add_to_cart_details",
    //     data: datavalues,
    //     success: function(res) {
    //         if (res)
    //         {
    //            var order_count = res.order_count;
    //            var add_to_cart_status = res.add_to_cart_status;
    //            $('.add_to_cart').html(order_count);
    //            $('.add_to_cart_section').html(add_to_cart_status);
    //            $('.add_to_cart_section').slideDown(350);
    //            $('.add_to_cart_section').slideUp(2000);
    //         }
    //     }
    //     });
    // });

    /* -----------    Detail page end  ---------- */

    /* -----------    Add to cart popup start  ---------- */

    $(document).on('click','.add_to_cart_popup',function() {
        var pro_id = $(this).data('pro_id');
        $('.out_stock').css('display','none');
        $('.in_stock').fadeIn(350);    
        jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/popup_attributes",
            data: { pro_id : pro_id },
            success: function(res) {
                if (res)
                {  
                    $('#model_content_section').html(res);                    
                    add_to_cart_color_panel();
                }
            }
        });      
    });

    /* -----------    Add to cart popup end  ---------- */

});