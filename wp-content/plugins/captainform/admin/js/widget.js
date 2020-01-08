window.captainform_is_widget_page = true;
jQuery(document).ready(function ($) {
	captainform_bind_widget();
});

function captainform_bind_widget(widget_id_to_bind)
{
	var prefix = '';
	if (typeof widget_id_to_bind != 'undefined' && widget_id_to_bind != '' && widget_id_to_bind != null)
		prefix = "#" + widget_id_to_bind + " ";

	bind_searchable(prefix);
	bind_lightbox_publish(prefix);
	if (typeof jscolor != 'undefined')
		jscolor.init();
}

function bind_lightbox_publish(prefix)
{
	jQuery(prefix + '.cf_lightbox_cotainer').each(function () {
		if (jQuery(this).find(".cf_display_as_lightbox").is(':checked'))
		{
			jQuery(this).find('.cf_triggers_container').show();
			if (jQuery(this).find('.cf_trigger:checked').val() == 1)
			{
				image_obj = jQuery(this).find('.cf_trigger_1_url');
				captainform_test_valid_image(image_obj.val(), image_obj)
			}
		}
		else if (!jQuery(this).find(".cf_display_as_lightbox").is(':checked'))
		{
			jQuery(this).find('.cf_triggers_container').hide();
		}

		if(jQuery(this).find('.cf_use_custom_vars').is(':checked')){
			jQuery(this).find('.use_custom_vars_container').show();
		}
		else if(!jQuery(this).find('.cf_use_custom_vars').is(':checked')){
			jQuery(this).find('.use_custom_vars_container').hide();
		}

	});

	/*Populate values for Prefill form fields*/
	if(window.captainform_is_widget_page  == true){
		jQuery('.captainform_widget_container').each(function(){
			var cf_formid= jQuery(this).find('.captainform_widget_select').val();
			var cf_customvars_code = jQuery(this).find('.captainform_custom_vars_code').val();
			draw_prefix = '#' + jQuery(this).closest('.widget').attr('id');
			if(cf_customvars_code != "" && cf_formid != ""){
				jQuery(this).find('.cf_use_custom_vars').prop('checked',true);
				jQuery(this).find('.use_custom_vars_container').show();
				draw_custom_vars(cf_formid, draw_prefix , cf_customvars_code);
			}
			else{
				if((typeof captainform_forms_controls != 'undefined') && (typeof captainform_forms_controls[cf_formid] == 'undefined'))
					jQuery(draw_prefix + ' .customvars_trigger').hide();
			}
		});
	}

	/*Prefill for form fields checkebox*/
	jQuery(prefix + '.cf_use_custom_vars').on('click', function () {
		if (jQuery(this).is(':checked')) {
			jQuery(this).closest('.cf_lightbox_cotainer').find('.use_custom_vars_container').show();
			if(window.captainform_is_widget_page == true) {
				formid = jQuery(this).closest('.captainform_widget_container').find('.captainform_widget_select').val();
				prefix = '#' + jQuery(this).closest('.widget').attr('id');
				calculate_shortcode(this);
				draw_custom_vars(formid, prefix, '');
			}

		}
		else {
			jQuery(this).closest('.cf_lightbox_cotainer').find('.use_custom_vars_container').hide();
			jQuery(this).closest('.captainform_widget_container').find('.captainform_custom_vars_code').val('');
		}
	});

	/*Display as a lightbox checkbox*/
	jQuery(prefix + '.cf_display_as_lightbox').on('click', function () {
		if (jQuery(this).is(':checked'))
			jQuery(this).closest('.cf_lightbox_cotainer').find('.cf_triggers_container').show();
		else
			jQuery(this).closest('.cf_lightbox_cotainer').find('.cf_triggers_container').hide();
	});

	jQuery(prefix + '.cf_trigger').on('click', function () {
		var value = jQuery(this).val();
		var options_container = jQuery(this).closest('.cf_triggers_container');
		jQuery(options_container).find('.cf_trigger_selected_option_container').hide();
		jQuery(options_container).find('.cf_trigger_selected_option_cotainter_' + value).show();

	});

	jQuery(prefix + '.cf_trigger').each(function () {
		var value = jQuery(this).val();
		if (jQuery(this).is(':checked'))
		{
			var options_container = jQuery(this).closest('.cf_triggers_container');
			jQuery(options_container).find('.cf_trigger_selected_option_container').hide();
			jQuery(options_container).find('.cf_trigger_selected_option_cotainter_' + value).show();
		}
	});

	jQuery(prefix + '.cf_display_as_lightbox').on('change', function () {
		if (!jQuery(this).is(':checked'))
		{
			var formid = jQuery(this).closest('.captainform_widget_container').find('.captainform_widget_select').val();
			var code = '[captainform id="' + formid + '"]';
			jQuery(this).closest('.captainform_widget_container').find('.cf_generated_code').val(code);
		}
	});

	jQuery(prefix + '.cf_trigger_1_url').on('change keyup', function () {
		captainform_test_valid_image(jQuery(this).val(), jQuery(this));
	});

	jQuery(prefix + '.cf_triggers_container input , ' +
		prefix + ' .cf_display_as_lightbox, ' +
		prefix + ' .captainform_widget_select,' +
		prefix + ' .captainform_form_toembed'
	).on('change keyup', function () {
		calculate_shortcode(this);

	});

	jQuery(prefix + ' .cf_use_custom_vars, ' +
		prefix + ' .custom_var_option, ' +
		prefix + ' .custom_var_value').on('change ', function () {
			prepare_draw_custom_vars(prefix);
	});

	jQuery('.captainform_widget_select').on('change',function(){
		if(window.captainform_is_widget_page == true){
			jQuery(this).closest('.captainform_widget_container').find('.captainform_custom_vars_code').val('');
			formid =jQuery(this).val();
			prefix = '#' + jQuery(this).closest('.widget').attr('id');
			cf_custom_vars =  '';
			draw_custom_vars(formid, prefix, cf_custom_vars)
		}
		else {
			jQuery('.captainform_custom_vars_code').val('');
			prepare_draw_custom_vars(prefix);
		}
	});
}

/**
 * Calculate the shortcode for  Display as a lightbox
 * @param thisobj
 */
function calculate_shortcode(thisobj){
	if (window.captainform_is_widget_page == true)
		var formid = jQuery(thisobj).closest('.captainform_widget_container').find('.captainform_widget_select').val();
	else
		var formid = document.getElementById('captainform_form_toembed').options[document.getElementById('captainform_form_toembed').selectedIndex].value;

	var display_as_lightbox = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_display_as_lightbox').is(':checked');
	var code = '[captainform id="' + formid+'"';

	if (display_as_lightbox == true)
	{
		code += ' lightbox="1" ';
		var selected_trigger = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger:checked').val();
		switch (selected_trigger)
		{
			case '0' : /*text*/
				var text_selected = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_0_text').val();
				code += 'text_content="' + encodeURIComponent(text_selected) + '" type="text"';
				break;
			case '1': /*image*/
				var image_obj = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_1_url');
				var image_url = image_obj.val();
				code += 'url="' + encodeURI(image_url) + '" type="image"';
				break;
			case '2': /*floating button*/
				var text = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_2_text').val();
				var position = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_2_position:checked').val();
				var background_color = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_2_background_color').val();
				var text_color = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_2_color').val();

				code += 'text_content="' + encodeURIComponent(text) + '" ';
				code += 'bg_color="' + background_color + '" ';
				code += 'text_color="' + text_color + '" ';

					switch (position)
					{
						case '1':
							code += 'position="left" ';
							break;
						case '2':
							code += 'position="right" ';
							break;
						case '3':
							code += 'position="bottom" ';
							break;
						default:
							code += 'position="left" ';
					}
					code += 'type="floating-button"';
					break;
				case '3': /*Auto popup*/
					var autoPopupType = jQuery(thisobj).closest('.captainform_widget_container').find('.captainform_auto_popup_trigger:checked').val();
					var after = jQuery(thisobj).closest('.captainform_widget_container').find('.cf_trigger_2_time').val() * 1000;

					if(autoPopupType == 1){
					    if(after <= 0)
						    after = 3000;
					    if (after != '')
						    code += 'miliseconds="' + after + '" ';
					    else
						    code += 'miliseconds="' + 3000 + '" ';
					}
					code += autoPopupType == 1 ? 'type="auto-popup"' : 'type="window-leave"';
					break;}
			}

			code += ']';

	if (window.captainform_is_widget_page == true) {
		jQuery(thisobj).closest('.captainform_widget_container').find('.cf_generated_code').val(code);
	}
	else
		jQuery('.cf_generated_code').val(code);
}

/**
 * Helper for drawing the Prefill form fields content
 * @param prefix
 */
function prepare_draw_custom_vars(prefix){
	if(window.captainform_is_widget_page) {
		var formid = jQuery(this).closest('.captainform_widget_container').find('.captainform_widget_select').val();
		var use_custom_vars =  jQuery(this).closest('.captainform_widget_container').find('.cf_use_custom_vars').is(':checked');
		var custom_vars_code =  jQuery(this).closest('.captainform_widget_container').find('.captainform_custom_vars_code').val();
		prefix = '#' + jQuery(this).closest('.widget').attr('id');
	}
	else{
		var formid = jQuery('.captainform_widget_select').val();
		var use_custom_vars =  jQuery('.cf_use_custom_vars').is(':checked');
		var custom_vars_code =  jQuery('.captainform_custom_vars_code').val();
	}

	draw_custom_vars(formid, prefix, custom_vars_code);
}

/**
 * Generate association array for Prefill form fields
 * @param str String with all the prefill associations
 * @returns {Array}
 */
function generate_assocs_from_string(str){
	var regex = /(cf_custom_var[0-9]+[-]?[0-9])="([^"]+)"/g;
	var return_array = [];
	while ((match = regex.exec(str)) != null) {
		if((typeof match[1] != 'undefined') && (typeof match[2] != 'undefined'))
			return_array[match[1]] = match[2];
	}
	return return_array;
}

/**
 * Function that draws the content of Prefill form fields
 * @param formid
 * @param prefix
 * @param cf_custom_vars
 */
function draw_custom_vars(formid, prefix, cf_custom_vars) {
	var cf_assocs_array = generate_assocs_from_string(cf_custom_vars);

	if (typeof captainform_forms_controls[formid] != 'undefined') {
		jQuery(prefix + ' .customvars_trigger').show();
		if(jQuery(prefix + ' .cf_use_custom_vars').is(':checked'))
			jQuery(prefix + ' .use_custom_vars_container').show();
		var html = '';
		var field_text;
		for (key in captainform_forms_controls[formid]) {
			var field = captainform_forms_controls[formid][key];
			var field_id = field['c_id'];
			field_text = field['c_text'];
			var render_array = [];
			if(field['c_type'] == 6 && field['c_object'] == 1){ /*Name*/
				render_array[0] = {label: field_text + ' - First name', field_id : field_id + '-1'};
				render_array[1] = {label: field_text + ' - Last name', field_id : field_id + '-2'};
			}
			else { /*Any other type of field*/
				render_array[0] =  {label: field_text , field_id : field_id };
			}

			for(render_key in render_array) {
				var assoc_value = "";
				var assoc_index = "";
				if(typeof cf_custom_vars != 'undefined' && typeof cf_assocs_array['cf_custom_var' + render_array[render_key].field_id] != 'undefined')
				{
					assoc_index = 'cf_custom_var' + render_array[render_key].field_id;
					assoc_value = cf_assocs_array[assoc_index];
				}

				force_input_visible = false;
				if(((assoc_value.indexOf('WORDPRESS_') == -1) && (assoc_value.indexOf('CAPTAINFORMREQUEST') == -1)  && (assoc_value != '')) || (assoc_value.indexOf('CAPTAINFORMREQUEST')!= -1))
					force_input_visible = true;
				html +=
					'<div class="cf_row">' +
						'<div class="cf_left">' +
							render_array[render_key].label+
						'</div>';
				html +=	'<div class="cf_center">' +
							'<select name="custom_var_option" class="custom_var_option">' +
								'<option value="0">Do not prefill</option>' +
								'<option value="TEXT" ' + ((assoc_value.indexOf('WORDPRESS_') == -1) && (assoc_value.indexOf('CAPTAINFORMREQUEST') == -1)  && (assoc_value != '') ? 'selected' : '' ) + '>Text Value</option>' +
								'<option value="WORDPRESS_USERNAME" ' + (assoc_value == "WORDPRESS_USERNAME" ? 'selected' : '' ) + '>WordPress Username</option>' +
								'<option value="WORDPRESS_EMAIL" ' + (assoc_value == "WORDPRESS_EMAIL" ? 'selected' : '' ) + '>WordPress Email</option>' +
								'<option value="WORDPRESS_FIRSTNAME" ' + (assoc_value == "WORDPRESS_FIRSTNAME" ? 'selected' : '' ) + '>WordPress First Name</option>' +
								'<option value="WORDPRESS_LASTNAME" ' + (assoc_value == "WORDPRESS_LASTNAME" ? 'selected' : '' ) + '>Wordpress Last Name</option>' +
								'<option value="WORDPRESS_DISPLAYNAME" ' + (assoc_value == "WORDPRESS_DISPLAYNAME" ? 'selected' : '' ) + '>Wordpress Display Name</option>' +
								'<option value="WORDPRESS_URL" ' + (assoc_value == "WORDPRESS_URL" ? 'selected' : '' ) + '>Wordpress URL</option>' +
								'<option value="WORDPRESS_USERID" ' + (assoc_value == "WORDPRESS_USERID" ? 'selected' : '' ) + '>Wordpress User ID</option>' +
								'<option value="CAPTAINFORMREQUEST" ' + (assoc_value.indexOf('CAPTAINFORMREQUEST')  != -1 ? 'selected' : '' ) + '>Request Variable</option>' +
							'</select>' +
						'</div>';
				if(assoc_value.indexOf('CAPTAINFORMREQUEST_')!= -1)
					assoc_value = assoc_value.substring("CAPTAINFORMREQUEST_".length);
				html+=	'<div class="cf_right">' +
							'<input type="text" name="cf_custom_var' + render_array[render_key].field_id + '" class="custom_var_value cf_custom_var' + render_array[render_key].field_id + '" value="' + (force_input_visible ? assoc_value  : '' )+ '" ' + (force_input_visible ? ' style="display:block;"' : '') + ' />' +
						'</div>' +
					'</div>';
				assoc_value = '';
			}
		}

		jQuery(prefix + ' .custom_vars_draw').html(html);
		bind_change_custom_vars();
	}
	else{
		jQuery(prefix + ' .custom_vars_draw').html('');
		jQuery(prefix + ' .customvars_trigger').hide();
		jQuery(prefix + ' .use_custom_vars_container').hide();
	}
}

/**
 * Function that binds all the actions for the change custom variables actions
 * @since: 2.1.6
 */
function bind_change_custom_vars(){
	/*change left select*/
	jQuery('.custom_var_option').on('change',function(){
		var select_value = jQuery(this).val();
		var right_item_selector = jQuery(this).closest('.cf_row').find('.cf_right input');
		if((select_value == 'TEXT') || (select_value == "CAPTAINFORMREQUEST")) {
			right_item_selector.show();
		}
		else {
			right_item_selector.hide();
		}
	});

	/*calculate the custom vars code on change*/
	jQuery('.custom_vars_draw input, .custom_vars_draw select').on('change keyup',function(){
		var custom_vars_code = "" ;
		jQuery(this).closest('.custom_vars_draw').find('.cf_row').each(function(){
			selected_val = jQuery(this).find('.custom_var_option').val();
			if(selected_val != "0") {
				var input = jQuery(this).find('.cf_right input');
				var input_name = input.attr('name');
				var input_val = input.val();

				custom_vars_code += " " + input_name;
				if(selected_val == "TEXT" )
					custom_vars_code += '="' + input_val + '" ';
				else if(selected_val == "CAPTAINFORMREQUEST" )
					custom_vars_code += '="CAPTAINFORMREQUEST_' + input_val + '" ';
				else if(selected_val.lastIndexOf('WORDPRESS_') != -1){
					custom_vars_code += '="' + selected_val + '" ';
				}
			}

			jQuery(this).closest('.captainform_widget_container').find('.captainform_custom_vars_code').val(custom_vars_code);
		});
	});
}

function bind_searchable(prefix)
{
	try {
		jQuery(prefix + '.captainform_widget_select').chosen({search_contains: true, no_results_text: 'No results match'});
		jQuery(prefix + '.captainform_widget_container').find('.chosen-container.chosen-container-single').each(function () {
			if (jQuery(this).parent().find('.chosen-container.chosen-container-single').length > 1)
			{
				jQuery(this).parent().find('.chosen-container.chosen-container-single').last().remove();
			}
		});
	}
	catch (err)
	{
	}
}

jQuery(document).ajaxComplete(function (event, XMLHttpRequest, ajaxOptions) {
	var request = {}, pairs, i, split, widget;
	if(typeof ajaxOptions.data != 'undefined')
	{
		pairs = ajaxOptions.data.split('&');
	for (i in pairs) {
		split = pairs[i].split('=');
		request[decodeURIComponent(split[0])] = decodeURIComponent(split[1]);
		}
	}
	if ((request.action && (request.action === 'save-widget') && (typeof request['widget-id'] != 'undefined') && (request['widget-id'].indexOf('captainform_widget') != -1))|| (typeof request.wp_customize != 'undefined' && request.wp_customize == 'on')) {
		var my_widget_id = request['widget-id'];
		var widget_div_id = null;
		var bind_captainform_widgets = false;
		if(typeof request.wp_customize != 'undefined' && request.wp_customize == 'on'){
			bind_captainform_widgets = true;
		}
		else{
		jQuery('.widget').each(function () {
			if (jQuery(this).attr('id').match(new RegExp(my_widget_id))) {
				widget_div_id = jQuery(this).attr('id');
			}
		});
		if (widget_div_id != null)
				bind_captainform_widgets =true;
		}
		if(bind_captainform_widgets == true)
			captainform_bind_widget(widget_div_id);
	}
});

function captainform_test_valid_image(url, object, timeout) {
	timeout = timeout || 5000;
	var timedOut = false, timer;
	var img = new Image();
	img.onerror = img.onabort = function () {
		if (!timedOut) {
			clearTimeout(timer);
			jQuery(object).addClass('cf_red_border'); /*error*/
		}
	};
	img.onload = function () {
		if (!timedOut) {
			clearTimeout(timer);
			jQuery(object).removeClass('cf_red_border'); /*success*/
		}
	};
	img.src = url;
	timer = setTimeout(function () {
		timedOut = true;
		jQuery(object).addClass('cf_red_border'); /*timeout*/
	}, timeout);
}