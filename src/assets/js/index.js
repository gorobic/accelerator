(function ($) {
	$(".lazy").Lazy();

	var tooltipTriggerList = [].slice.call(
		document.querySelectorAll('[data-bs-toggle="tooltip"]')
	);
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});

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

	$(".vc_masonry_media_grid").on("click", ".vc_gitem-link", function (event) {
		event.preventDefault();

		$(".vc_masonry_media_grid").each(function (index, masonryMediaItem) {
			var shortcode_id = JSON.parse(
				$(this).attr("data-vc-grid-settings")
			).shortcode_id;

			var elements = $(this).find("a");

			$(this)
				.find("a")
				.attr("data-fancybox", "gallery-" + shortcode_id);
		});

		$(
			"a[href$='.webp'], a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']"
		).fancybox();

		$(this).trigger("click");
	});

	$(".acep-works").masonry({
		// options
		itemSelector: ".acep-work",
	});
})(jQuery);
