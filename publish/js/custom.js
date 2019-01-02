// 
(function($) {
	jQuery(window).scroll(function() {
		var scrollPos = jQuery(document).scrollTop();
		if(scrollPos > 344) {
			jQuery('#hd_menu').addClass('switch');
		} else {
			jQuery('#hd_menu').removeClass('switch');
		}
	});
	/* BIGIN :: title popup delete */
	jQuery(document).on('mouseenter', 'img', function() {
		var alt = jQuery(this).attr('alt');
		jQuery(this).attr('title', '');
	});
	jQuery(document).on('mouseleave', 'img', function() {
		var alt = jQuery(this).attr('alt');
		jQuery(this).attr('title', alt);
	});
	/* END :: title popup delete */
	/**/
	jQuery(document).on('mouseenter', '.sct_11 .sct_img > a', function() {
		jQuery(this).addClass('on');
	});
	jQuery(document).on('mouseleave', '.sct_11 .sct_img > a', function() {
		var currentMask = jQuery(this);
		var maskBool = false;
		sct_img_mask(currentMask, maskBool);
	});

	jQuery(document).on('mouseover', '.sct_11, .sct_11 .sct_cost, .sct_11 .sct_sns, .sct_11 .sct_txt, .sct_11 .sct_icon', function() {
		var currentMask = jQuery(this).closest('.sct_11').find('.sct_img').children('a');
		var maskBool = true;
		sct_img_mask(currentMask, maskBool);
	});
	jQuery(document).on('mouseleave', '.sct_11, .sct_11 .sct_cost, .sct_11 .sct_sns, .sct_11 .sct_txt, .sct_11 .sct_icon', function() {
		var currentMask = jQuery(this).closest('.sct_11').find('.sct_img').children('a');
		var maskBool = false;
		sct_img_mask(currentMask, maskBool);
	});


	function sct_img_mask(here,bool) {
		if(bool == true) {
			here.addClass('on');
			here.closest('.sct_11').find('.sct_txt > a').addClass('on');
		} else {
			here.removeClass('on');
			here.closest('.sct_11').find('.sct_txt > a').removeClass('on');
		}
	}
	/**/
	/* BIGIN :: all menus show and hide of top navigation */
	jQuery(document).on('mouseenter', '.all-menus-btn', function() {
		jQuery('.all-menus').addClass('on');
	});
	jQuery(document).on('mouseleave', '.all-menus-btn', function() {
		jQuery('.all-menus').removeClass('on');
		jQuery(document).on('mouseover', '.all-menus', function() {
			jQuery(this).addClass('on');
		});
		jQuery(document).on('mouseout', '.all-menus', function() {
			jQuery(this).removeClass('on');
		});
	});
	/* END :: all menus show and hide of top navigation */
	/* BIGIN :: Detail page anchor menu control */
	jQuery(document).on('click', 'ul.sanchor li a', function() {
		var link = jQuery(this).attr('href');
		var offset = jQuery(link).offset();
        jQuery('html, body').animate({scrollTop : offset.top - 54}, 400);
	});
	/* END :: Detail page anchor menu control */
	/* BIGIN :: all check checked change */
	jQuery(document).on('change', '.chk', function() {
		jQuery('#chk_all').prop('checked', checkedConfirm());
	});
	function checkedConfirm() {
		var checked = true;
		var chk_cnt = 0;
		jQuery('.chk').each(function() {
			var checked = jQuery(this).prop('checked');
			if(checked == false) {
				chk_cnt++;
				//alert(checked);
				return checked;

			}
		});
		if(chk_cnt == 0) {
			checked = true;
			return checked;
		} else {
			checked = false;
			return checked;
		}
	}
	/* END :: all check checked change */
})(jQuery);