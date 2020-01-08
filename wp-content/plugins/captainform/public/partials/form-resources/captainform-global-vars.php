<!--noptimize--><script type="text/javascript">
    var captainformCustomVars = {};
    var captainformThemeStyle = {};
    var append_element = append_element || function(e){if(void 0==e)return!1;if(!("elementType"in e))return!1;var n=null;if(n=e.following?e.following.parentElement:e.inside?e.inside:e.replacing?e.replacing.parentElement:"script"==e.elementType?document.head:document.body,null==n)return!1;var l=document.createElement(e.elementType);delete e.elementType,l=jQuery.extend(l,e),e.replacing?n.replaceChild(l,e.replacing):n.appendChild(l)};
    var captainformDomReady = captainformDomReady || function(e){var t=!1,n=function(){document.addEventListener?(document.removeEventListener("DOMContentLoaded",d),window.removeEventListener("load",d)):(document.detachEvent("onreadystatechange",d),window.detachEvent("onload",d))},d=function(){t||!document.addEventListener&&"load"!==event.type&&"complete"!==document.readyState||(t=!0,n(),e())};if("complete"===document.readyState)e();else if(document.addEventListener)document.addEventListener("DOMContentLoaded",d),window.addEventListener("load",d);else{document.attachEvent("onreadystatechange",d),window.attachEvent("onload",d);var o=!1;try{o=null==window.frameElement&&document.documentElement}catch(a){}o&&o.doScroll&&!function c(){if(!t){try{o.doScroll("left")}catch(d){return setTimeout(c,50)}t=!0,n(),e()}}()}};
    var readyStateOverflowInterval;
    captainformDomReady(function() {
        if (document.getElementById('captainform_js_global_vars') == null) {
            append_element({
                elementType: "script",
                type: "text/javascript",
                id: "captainform_js_global_vars",
                textContent: 'var frmRef=""; try { frmRef=window.top.location.href; } catch(err) {}; var captainform_servicedomain="<?php echo $captainform_servicedomain;?>";var cfJsHost = "https://";',
            });
        }
        <?php if($embedding_type == 'normal_embedding'): ?>
        try {
            clearInterval(readyStateOverflowInterval);
        }
        catch(e) {
            console.warn('[CaptainForm] Clear readyStateOverflowInterval error');
        }
        readyStateOverflowInterval = setInterval(function () {
            try {
                var elements = ['html', 'body'];
                var foundElementWithOverflowHidden = false;
                jQuery(elements).each(function (index, element) {
                    if (jQuery(element).css('overflow-y') == 'hidden') {
                        foundElementWithOverflowHidden = true;
                        if(jQuery(element).height() > jQuery('window').height()){
                            jQuery(window).resize();
                        }
                    }
                    if(!foundElementWithOverflowHidden) {
                        clearInterval(readyStateOverflowInterval);
                    }
                });
            }
            catch (e) {
                console.warn('[CaptainForm] Overflow check error');
            }
        }, 300);
        <?php endif; ?>
    });
</script><!--/noptimize-->