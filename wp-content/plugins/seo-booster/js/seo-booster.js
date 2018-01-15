jQuery(document).ready(function($) {

	// Changes the css and visual appearance of some settings in SEO Booster 2 if the "Use Dynamic Tagging" feature is turned on.
	jQuery('#seobooster_dynamic_tagging').on('click', function(event) {

		if ($(this).prop('checked')) {

			$('.taggingrelated').each( function( i, elem ) {
				$(elem).removeClass('muted');
			});

		}
		else {
			$('.taggingrelated').each( function( i, elem ) {
				$(elem).addClass('muted');
			});
		}
	});

	// Hide internal buttons related to internal linking
	jQuery('#seobooster_internal_linking').on('click', function(event) {

		if ($(this).prop('checked')) {

			$('.linkingrelated').each( function( i, elem ) {
				$(elem).removeClass('muted');
			});

		}
		else {
			$('.linkingrelated').each( function( i, elem ) {
				$(elem).addClass('muted');
			});
		}
	});




	// todo - check if any images needs to be lazy loaded before running the script
	// todo - any lazy load library included with WP?
	jQuery("img.lazy").lazyload();

});