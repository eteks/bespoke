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

    // Registeration
    $('#load_more_featured').on('click',function() {
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
                        $('#load_more_featured_value').val(limit)
                        $('#featured_product_section').append(res);

                    }
                }
            });
        }
    });

    /*  -- Index page End -- */




});