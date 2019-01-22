jQuery(document).ready(function($) {
	jQuery('.mobile-search').on('click', function() {
		jQuery('.hidden-search').stop().slideToggle(500);
		return false;
	});
	
	var menu_bg = '<div class="cate_bg"></div>';
	
	$("#btn_hdcate").on("click", function() {
		//$("#category").show();
		$("#category").after(menu_bg);
		setTimeout(function() {
			$('.cate_bg').addClass('on');
		}, 100);
		$("#category").addClass('on');
		//$('.cate_bg').animate({}, 300);
	});

	$(".menu_close").on("click", function() {
		$("#category").removeClass('on');
		$('.cate_bg').removeClass('on');
		setTimeout(function() {
			$('.cate_bg').remove();
		}, 500);
	});
	 $(".cate-menu-bg").on("click", function() {
		$("#category").removeClass('on');
		$('.cate_bg').removeClass('on');
		setTimeout(function() {
			$('.cate_bg').remove();
		}, 500);
	});
	jQuery('#sit_inf_open').hide();
	jQuery('#sit_inf #sit_inf_open td').each(function() {
		var thisText = jQuery(this).text();
		if(thisText != '상품페이지 참고') {
			jQuery(this).closest('table').show();
		}
	});
});