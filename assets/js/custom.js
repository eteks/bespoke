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
