(function($){

	$(document).ready(function(){
		$('.slider').slick({
			'accessibility': true,
			'adaptiveHeight': true,
			'dots': true,
			'appendDots': '.slider__nav',
			'appendArrows': '.slider__nav',
		});
	});

})(jQuery);