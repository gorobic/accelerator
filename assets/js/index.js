(function ($) {
	$(".lazy").Lazy();

	$(".acep-carousel")
		.slick({
			dots: false,
			infinite: true,
			speed: 500,
			//fade: true,
			cssEase: "linear",
			lazyLoad: "ondemand",
		})
		.on("afterChange", function () {
			$(".lazy").Lazy();
		});

	$(".fancybox, [data-fancybox]").fancybox();

	$(
		"a[href$='.webp'], a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']"
	).fancybox();

	$(
		".gallery a[href$='.webp'], .gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']"
	)
		.attr("rel", "gallery")
		.fancybox();

	$(".wpb_gallery, .wp-block-gallery").each(function (index, wpbGalleryItem) {
		$(this)
			.find(
				"li:not(.clone) a[href$='.webp'], li:not(.clone) a[href$='.jpg'], li:not(.clone) a[href$='.png'], li:not(.clone) a[href$='.jpeg'], li:not(.clone) a[href$='.gif']"
			)
			.attr("data-fancybox", "gallery-" + index);
	});
})(jQuery);
