<?php $unique = uniqid(); ?><!--noptimize--><script type="text/javascript">
    var captainform{{ID}}TriggerDelay = 500;
    var form{{ID}}Triggered = false;
    setTimeout(function(){
        captainForm{{ID}}WindowLeavePreloadInterval<?php echo $unique?> = setInterval(function() {
            if(typeof cfJsHost != 'undefined') {
                captainformCustomVars['{{ID}}'] = '{{CUSTOMVARS}}';
                captainformThemeStyle['{{ID}}'] = '{{STYLE}}';
                var popupParams = {
                    formId: '{{ID}}'
                };
                captainform_preload_form_popup(popupParams);
                jQuery(document).mouseleave(function () {
                    if(!form{{ID}}Triggered && (jQuery('#captainform_popup_form').is(':visible') === false || jQuery('#captainform_popup_form').hasClass('popup-hidden'))){
                        captainform_create_form_popup(popupParams);
                        form{{ID}}Triggered = true;
                    }
                });
                clearInterval(captainForm{{ID}}WindowLeavePreloadInterval<?php echo $unique?>);
            }
        }, 10);
    }, captainform{{ID}}TriggerDelay || 1);
</script><!--/noptimize-->