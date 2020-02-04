console.log('Script JS loaded')

$(document).ready(function(){

	console.log('Document Ready')
	if ($) console.log('JQuery defined');
	if ($(".owl-carousel")) console.log('.owl-carousel defined')
	if ($(".owl-carousel").length) console.log('.owl-carousel tag exists')
	if ($(".owl-carousel") && $(".owl-carousel").owlCarousel) console.log('.owl-carousel function owlCarousel exists')

	$(".owl-carousel").owlCarousel({
		items:1, nav:true, loop:true, autoWidth:true,
		navClass: ['ControlsHeader carousel-control-prev carousel-control-prev-custom',"ControlsHeader carousel-control-next carousel-control-next-custom"]
	});
});
