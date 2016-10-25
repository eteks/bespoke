$(document).ready(function() {

	/*  -- Registration and Login section Start -- */


$(document).ajaxComplete(function() {
    centerContent();
});


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
            data: {atribute_combination : atribute_combination, product_id : product_id},
            success: function(res) {
                if (res)
                {  
                    if(res!=0) {
                        $('.prodcut_details_price').html(res.product_attribute_group_price);
                        $('.update_product_arrtibute_group').val(res.product_attribute_group_id); 
                        $('.add_to_cart_button').prop("disabled", false);
                        $('.add_to_cart_button').css("pointer-events", 'auto');
                        $('.add_to_cart_button_cond').val("true");
                        $('.add_to_cart_button').prop("title", "Add to cart");

                    }
                    else {
                        $('.in_stock').css('display','none');
                        $('.out_stock').fadeIn(350);         
                        $('.add_to_cart_button').prop("disabled", true);
                        $('.add_to_cart_button').css("pointer-events", 'none');
                        $('.add_to_cart_button_cond').val("false");
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
            data: {atribute_combination : atribute_combination, product_id : product_id},
            success: function(res) {
                if (res)
                {  
                    if(res!=0) {
                        $('.prodcut_details_price').html(res.product_attribute_group_price);
                        $('.update_product_arrtibute_group').val(res.product_attribute_group_id); 
                        $('.add_to_cart_button').prop("disabled", false);
                        $('.add_to_cart_button').css("pointer-events", 'auto');
                        $('.add_to_cart_button_cond').val("true");
                        $('.add_to_cart_button').prop("title", "Add to cart");

                    }
                    else {
                        $('.in_stock').css('display','none');
                        $('.out_stock').fadeIn(350); 
                        $('.out_stock').css('title','Out of stock');             
                        $('.add_to_cart_button').prop("disabled", true);
                        $('.add_to_cart_button').css("pointer-events", 'none');
                        $('.add_to_cart_button_cond').val("false");
                        $('.add_to_cart_button').prop("title", "No stack available now");
                    }
                }
            }
        });
    });

    //  Add to cart
    $(document).on('click','.add_to_cart_option',function() {

        if($(this).prev('.add_to_cart_button_cond').val() == "true") {
            var product_id = $('.product_id_detail').val();     
            var product_quantity = $('#quantity_product_details').val(); 
            var group_id_length = $('.update_product_arrtibute_group').length;
            if(group_id_length > 0) {
                var group_id = $('.update_product_arrtibute_group').val();
                var datavalues = {pro_id: product_id , grp_id : group_id, quan : product_quantity};
            }
            else {
                var datavalues = {pro_id: product_id, quan : product_quantity};
            }
            jQuery.ajax({
                type: "POST",
                url: baseurl+"index.php/ajax_controller/add_to_cart_details",
                data: datavalues,
                success: function(res) {
                    if (res)
                    {
                        $('.add_to_cart_status').html(res);
                        $('.add_to_cart_status').slideDown(350);
                        $('.add_to_cart_status').slideUp(2000);
                    }
                }
            });
        }
    });

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



    // Removing items in basket
    $(".delete_item_cart_list").on('click',function() {
        var cart_pro_id = $(this).data('pro_id');
        var cart_grp_id = $(this).data('grp_id');
        jQuery.ajax({
        type: "POST",
        url: baseurl+"ajax_controller/remove_cart_product",
        data: {cart_pro_id : cart_pro_id, cart_grp_id : cart_grp_id},
            success: function(res) {
                if (res)
                {   
                    location.reload();
                }
            }
        });
    });


    // Updating items in basket
    $("#updation_button").on('click',function() {
        var updation={};
        $('.amount_structure').each(function() {
            var product_id = $(this).find('.delete_item_cart_list').data('pro_id');
            var product_group_id = $(this).find('.delete_item_cart_list').data('grp_id');
            var product_quantity = $(this).find('.product_quantity').val();
            updation[product_id] = product_group_id + ',' +  product_quantity;
        });
        jQuery.ajax({
            type: "POST",
            url: baseurl+"index.php/ajax_controller/update_baseket_product",
            data: {updation_det : updation},
            success: function(res) {
                if (res)
                {   
                    if(res=="success") {
                        $('#checkout_button').removeClass('update_error');
                        $('#checkout_button').prop('title',"Proceed to checkout");
                    }  
                    $('.updations_status').html(res);
                    $('.updations_status').slideDown(350);

                }
            }
        });
    });




}); // End document