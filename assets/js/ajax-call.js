$(document).ready(function() {

	/*  -- Registration and Login section -- */

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





});