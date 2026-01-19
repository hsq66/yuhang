jQuery(document).ready(function ($) {
	$(document).on('click', '.topscene-welcome-notice .notice-dismiss', function () {
		$.post(topsceneNotice.ajaxurl, {
			action: 'topscene_dismiss_welcome_notice',
		});
	});
});
