// Hello.
//
// This is The Scripts used for ___________ Theme
//
//



function main() {

(function () {
   'use strict';

   //Page Loader Script
  //<![CDATA[
  //-----------------------------------
     $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    });
    //]]>

    $(function() {
      $('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

 $('#about-slider').carousel({
  interval: false
});

$('body').scrollspy({ target: '.navmenu' });

// When we click on the LI
$(".tab").click(function(){
  // If this isn't already active
  if (!$(this).hasClass("active")) {
    // Remove the class from anything that is active
    $(".tab.active").removeClass("active");
    // And make this active
    $(this).addClass("active");
  }
});

// When we click on the LI
$("ul.qcontrols li").click(function(){
  // If this isn't already active
  if (!$(this).hasClass("active")) {
    // Remove the class from anything that is active
    $("ul.qcontrols li.active").removeClass("active");
    // And make this active
    $(this).addClass("active");
  }
});

$(document).ready(function(){
            $('.hover-bg a').nivoLightbox({
                effect: 'fade',                              // The effect to use when showing the lightbox
                theme: 'default'

            });
        });


}());

}
main();
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
