<?php $unique = uniqid(); ?><!--noptimize--><script type="text/javascript">
    captainForm{{ID}}PreloadInterval<?php echo $unique?> = setInterval(function(){
        if(typeof cfJsHost != 'undefined'){
            captainformCustomVars['{{ID}}'] = '{{CUSTOMVARS}}';
            captainformThemeStyle['{{ID}}'] = '{{STYLE}}';
            var popupParams = {
                formId: '{{ID}}'
            };
            captainform_preload_form_popup(popupParams);
            clearInterval(captainForm{{ID}}PreloadInterval<?php echo $unique?>);
            var popupTrigger = jQuery("#captainformForm{{ID}}EmbedPopup<?php echo $unique?>");
            popupTrigger.css('visibility', 'visible');
            popupTrigger.click(function(){
                captainform_create_form_popup(popupParams);
            });
        }
    }, 10);
</script><!--/noptimize--><span {{LIGHTBOX_TYPE}} id='captainformForm{{ID}}EmbedPopup<?php echo $unique?>' class="captainform_lightbox {{POSITION_CLASS}}" style="visibility:hidden; background-color: #{{BG_COLOR}};"><span id='captainformForm{{ID}}EmbedPopupContent<?php echo $unique?>' class="floating-button-content"><a style="color:#{{TEXT_COLOR}}" href="javascript:">{{CONTENT}}</a></span></span><!--noptimize--><script type="text/javascript">
    function resize{{ID}}<?php echo $unique?>(wrapper){
        if ('{{POSITION_CLASS}}' == 'left')
            jQuery(wrapper).css('top', jQuery(window).height() * 0.4 + wrapper.width() + wrapper.css('padding').replace('px', '') * 2);
        else if ('{{POSITION_CLASS}}' == 'right')
            jQuery(wrapper).css('top', jQuery(window).height() * 0.4 - wrapper.outerHeight());
    }
    if('{{LIGHTBOX_TYPE}}' == 'floating') {
        setTimeout(function () {
            var wrapper = jQuery('#captainformForm{{ID}}EmbedPopup<?php echo $unique?>');
            resize{{ID}}<?php echo $unique?>(wrapper);
            jQuery(wrapper).find('a').removeAttr('href');
        }, 50);
    }
    window.addEventListener('resize', function(){
        var wrapper = jQuery('#captainformForm{{ID}}EmbedPopup<?php echo $unique?>');
        resize{{ID}}<?php echo $unique?>(wrapper);
    }, true);
</script><!--/noptimize-->