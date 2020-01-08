/**
 * Created by Adrian Dumitru on 8/28/2016.
 */

var status;

function captainform_review_close()
{
	jQuery('#captainform_review').remove();
}



function captainform_review_popup()
{

	style_ios = '';
	if (captainform_is_ios_device())
	{
		style_ios = ' style="-webkit-overflow-scrolling: touch"';
	}

	jQuery('#captainform_review').remove();
	w = 550;
	url = '//'+chost+'/wp_iframe.php?wp_action=show_review';
	var htm = '';
	htm += '<div id="captainform_review" class="captainform_review_bg">';
		htm += '<div id="cfloader" class="captainform_loader"></div>';
		htm += '<div id="captainform_review_box" class="captainform_review_box">';
			htm += '<div class="captainform_review_div_close"><div id="captainform_review_close" class="captainform_review_close" onclick="captainform_review_close()"></div></div>';
			htm += '<div id="captainform_review_body" class="captainform_review_body"'+style_ios+'>';
				htm += '<iframe  id="ppiframe_review" src="' + url + '" class="captainform_iframe_review" scrolling="no"></iframe>';
			htm += '</div>';
		htm += '</div>';
	htm += '</div>';

	jQuery('body').append(htm);
	jQuery('#captainform_review_box').width(w);
	jQuery('#captainform_review_box').height(0);

	jQuery("#ppiframe_review").on("load", function () {
		jQuery('#captainform_review').show();
		captainform_review_resize();
	});

	element3 = document.getElementById('ppiframe_review');
	var isOldIE = (navigator.userAgent.indexOf("MSIE") !== -1); // Detect IE10 and below

	iFrameResize({
		log: false,
		scrolling: false,
		enablePublicMethods: true,
		checkOrigin: false,
		heightCalculationMethod: isOldIE ? 'max' : 'documentElementOffset', // old wy max e obligatoriu pt ie8
		resizedCallback: function (messageData) {
			hh = messageData.height;
			hhf = parseInt(hh) - 0 + 40;
			iframe_height = hhf;
			jQuery('#captainform_review_box').height(hhf);
			captainform_review_resize();
			jQuery('#cfloader').remove();
		},
		scrollCallback: function () {

		},
		messageCallback: function (messageData) { // Callback fn when message is received

		}
	}, element3);
}

function captainform_review_resize()
{
	if (jQuery('#ppiframe_review').length == 0) {
		return false;
	}
	max_h = jQuery(window).height() - 40;
	jQuery('#captainform_review_box').css('max-height', max_h + 'px');
	max_w = jQuery(window).width() - 40;
	jQuery('#captainform_review_box').css('max-width', max_w + 'px');
	popup_body_max_h = jQuery('#captainform_review_box').height()+10;
	jQuery('#captainform_review_body').css('max-height', popup_body_max_h-40 + 'px');
}

window.onresize = function(event) {
	captainform_review_resize();
};

window.addEventListener('message', function(e){
	msg_review = e.data;
	if(msg_review.msg_action == 'captainform_review_popup')
	{
		if(msg_review.msg_command == 'show')
		{
			status = msg_review.r_status;
			captainform_review_popup();
		}
		if(msg_review.msg_command == 'close_popup')
		{
			captainform_review_close();
		}
		if(msg_review.msg_command == 'show_close')
		{
			jQuery('#captainform_review_close').show();
		}
	}
});