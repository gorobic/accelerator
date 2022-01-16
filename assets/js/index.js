(function ($) {
	$(".lazy").Lazy();

	$(".acc-carousel").slick({
		dots: false,
		infinite: true,
		speed: 500,
		//fade: true,
		cssEase: "linear",
		lazyLoad: "ondemand",
	});
})(jQuery);
