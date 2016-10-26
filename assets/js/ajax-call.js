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
                    this_status.html(res);
                    this_status.slideDown();
                }
            }
        });
	});    

    // Forgetten password
    $('#forgetten_password').on('submit',function(e) {
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
                    this_status.html(res);
                    this_status.slideDown();
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

    /* -----------    Delete items in cart start  ---------- */

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

    /* -----------    Delete items in cart end  ---------- */

    /* -----------    Update items in cart start  ---------- */

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

    /* -----------    Update items in cart end  ---------- */


    /* -----------    State City Area With Shipping Amount start  ---------- */


    // Load city based on state
    $(document).on('change','.che_state',function() {
        var state_id = $(this).val();
        var state_name = $('option:selected',$(this)).text();
        if(state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/get_city",
            data: {state_id: state_id},
                success: function(res) {
                    if (res)
                    {
                        var obj = JSON.parse(res);
                        var options = '<option value="">Please select city</option>';   
                        if(obj.length!=0){               
                            $.each(obj, function(i){
                                options += '<option value="'+obj[i].city_id+'">'+obj[i].city_name+'</option>';
                          });  
                        }   
                        else{
                            alert('No City added for '+state_name);    
                        }  
                        $('.che_city').html(options); 
                    }
                }
            });
        }
    });

    // Load area based on city
    $(document).on('change','.che_city',function() {
        var city_id = $(this).val();
        var city_name = $('option:selected',$(this)).text();
        var state_id = $(".che_state").val();
        if(city_id!='' && state_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/get_area",
            data: {city_id: city_id , state_id: state_id},
                success: function(res) {
                    if (res)
                    {
                        var obj = JSON.parse(res);
                        var options = '<option value="">Please select area</option>';   
                        if(obj.length!=0){               
                            $.each(obj, function(i){
                                options += '<option value="'+obj[i].area_id+'">'+obj[i].area_name+'</option>';
                          });  
                        }   
                        else{
                            alert('No Area added for '+city_name);    
                        }  
                        $('.che_area').html(options); 
                    }
                }
            });
        }
    });

    // Load shipping amount based on area
    $(document).on('change','.che_area',function() {
        var area_id = $(this).val();
        if($('.ordinary_total_amount').length > 0) {
            var sub_total = parseFloat($('.ordinary_total_amount').val().replace(',',''));
        }

        if(area_id!='') {    
            jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/get_area_shipping",
            data: {area_id: area_id},
                success: function(res) {
                    if (res)
                    {   
                        var shipping_amount = parseFloat(res.replace(',',''));
                        var total_amount = sub_total + shipping_amount;
                        var total_amount_final = Math.ceil(total_amount).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var total_paymnet =  total_amount_final.replace(',','');
                        $('.ordinary_shipping_amount').html(res);
                        $('.product_final_amount').html(total_amount_final);  
                        $('.total_amount_hidden').val(total_paymnet);             
                    }
                }
            });
        }
    });

    /* -----------    State City Area With Shipping Amount end  ---------- */

    /* -----------    Checkout default address start  ---------- */
      // Order status verification
    $('#checkout_profile_details').on('click',function() {
        if($('.ordinary_total_amount').length > 0) {
            var sub_total = parseFloat($('.ordinary_total_amount').val().replace(',',''));
        }
        if($(this).is(':checked')) {
            var user_value = 1;     
            jQuery.ajax({
                type: "POST",
                url: baseurl+"ajax_controller/checkout_profile_detail",
                data: {user_value : user_value},
                success: function(res) {
                    if(res) {
                        $('.checkout_content').html(res);
                        var shipping_amt = $('.shipping_checkout_area').val();
                        var shipping_amount = parseFloat(shipping_amt.replace(',',''));
                        var total_amount = sub_total + shipping_amount;
                        var total_amount_final = Math.ceil(total_amount).toLocaleString('en-US', {minimumFractionDigits: 2});
                        var total_paymnet =  total_amount_final.replace(',','');
                        $('.ordinary_shipping_amount').html(shipping_amt);
                        $('.product_final_amount').html(total_amount_final);  
                        $('.total_amount_hidden').val(total_paymnet);
                    }
                }
            });
        }
    });

    /* -----------    Checkout default address end  ---------- */

    // Order status verification
    $('#checkout_form').on('submit',function(e) {
        e.preventDefault();
        var updation={};
        $('.amount_structure').each(function() {
            var product_id = $(this).find('.delete_item_cart_list').data('pro_id');
            var product_group_id = $(this).find('.delete_item_cart_list').data('grp_id');
            var product_quantity = $(this).find('.delete_item_cart_list').val();
            updation[product_id] = product_group_id + ',' +  product_quantity;
        });

        jQuery.ajax({
            type: "POST",
            url: baseurl+"ajax_controller/update_baseket_product",
            data: {updation_det : order_status},
            success: function(res) {
                if (res)
                {                      
                    if(res=="success") {
                        $('#checkout_form').unbind();    
                        $('#checkout_form').submit();
                    }  
                    else {
                        $('.oreder_status_error').html(res);
                        $('.oreder_status').slideDown();
                    }           
                }
            }
        });
    });




}); // End document