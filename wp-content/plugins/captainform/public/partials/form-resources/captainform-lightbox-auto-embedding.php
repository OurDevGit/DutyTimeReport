<?php $unique = uniqid(); ?><!--noptimize--><script type="text/javascript">
    captainForm{{ID}}PreloadInterval<?php echo $unique?> = setInterval(function(){
        if(typeof cfJsHost != 'undefined'){
            captainformCustomVars['{{ID}}'] = '{{CUSTOMVARS}}';
            captainformThemeStyle['{{ID}}'] = '{{STYLE}}';
            var popupParams = {
                formId: '{{ID}}'
            };
            if(parseInt('{{MILISECONDS}}') >= 3000) {
                setTimeout(function () {
                    captainform_preload_form_popup(popupParams);
                }, parseInt('{{MILISECONDS}}') - 2000);
            }
            clearInterval(captainForm{{ID}}PreloadInterval<?php echo $unique?>);
            setTimeout(function(){
                if (typeof captainform_create_form_popup == 'function')
                    captainform_create_form_popup(popupParams);
            }, parseInt('{{MILISECONDS}}'));
        }
    }, 10);
</script><!--/noptimize-->