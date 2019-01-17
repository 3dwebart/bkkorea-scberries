jQuery(document).ready(function($) {
	jQuery('.mobile-search').on('click', function() {
		jQuery('.hidden-search').stop().slideToggle(500);
		return false;
	});
});