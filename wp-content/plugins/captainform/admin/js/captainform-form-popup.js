var element2;

var getIOSWindowHeight = function () {
    var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
    return window.innerHeight * zoomLevel;
};

function captainformChangePopupStyle(popupSelector, popupStyle){
    var backgroundColor = popupStyle.backgroundColor;
    var roundedCorners = popupStyle.roundedCorners;
    popupSelector.css('background-color', '#' + backgroundColor);
    // if( ! parseInt(roundedCorners))
    //     popupSelector.css('border-radius', 0);

}

function captainformRemoveOrHidePopup(popupSelector){
    if(!popupSelector)
        popupSelector = jQuery('.captainformPopupForm:visible');

    if(!captainformFormPopupIsPreloaded(popupSelector)) {
        var shouldPreloadAgain = false;
        try {
            shouldPreloadAgain = jQuery(popupSelector)[0].hasAttribute('shouldPreloadAgain');
        } catch(e){}

        var formId = popupSelector.data('form-id');

        popupSelector.remove();

        if(shouldPreloadAgain)
            captainform_preload_form_popup({formId: formId});
    }
    else {
        popupSelector.css('left', -50000);
        popupSelector.addClass('popup-hidden');
    }

    document.documentElement.style.overflow = 'auto';  // firefox, chrome
    document.body.scroll = "yes"; // ie only
    if (captainform_is_ios()) {
        document.ontouchmove = function () {
            return true;
        }
    }
}

function captainformShowPopup(popupSelector){
    if(jQuery('.captainformPopupForm:not(".popup-hidden"):visible').size())
        return;

    document.documentElement.style.overflow = 'hidden';  // firefox, chrome
    document.body.scroll = "no"; // ie only

    popupSelector.show();
    popupSelector.css('left', '0');
    popupSelector.removeClass('popup-hidden');
}

function captainformFormPopupIsPreloaded(popupSelector){
    return popupSelector.hasClass('preloaded');
}

function captainformFormPopupIsVisible(popupSelector){
    return !popupSelector.hasClass('popup-hidden');
}

function captainformNeedToCreateNewPopup(popupSelector){
    if(!popupSelector)
        return true;

    return !captainformFormPopupIsPreloaded(popupSelector);

}

function captainform_preload_form_popup(message){
    var formId = message.formId;
    message.preload = true;

    if(!jQuery("[data-form-id='" + formId +"']").size()){
        captainform_create_form_popup(message);
        var popupSelector = jQuery('#captainformPopupForm' + formId);
        captainformRemoveOrHidePopup(popupSelector);
    }
}

function captainform_create_form_popup(msg) {
    var formId = msg.formId;
    //noinspection JSJQueryEfficiency
    var popupSelector = jQuery('#captainformPopupForm' + formId);
    var createNewPopup = captainformNeedToCreateNewPopup(popupSelector);

    if(createNewPopup) {
        var url = msg.url
            ? msg.url
            : cfJsHost + captainform_servicedomain + '/form-' + formId + '/?' +  captainformCustomVars[formId] + captainformThemeStyle[formId];
        var width = msg.popup_w || 1000;
        var preload = msg.preload;

        popupSelector.remove();
        jQuery('body').append(captainformGetFormPopupHTML(url, formId, preload));

        var popupBoxSelector = jQuery('#popupBox' + formId);
        var iFrameSelector = jQuery('#popupIframe' + formId);

        popupBoxSelector.width(width);
        popupBoxSelector.height(0);
        captainformBindFormPopupEvents(iFrameSelector, popupBoxSelector);
    }

    //noinspection JSJQueryEfficiency
    popupSelector = jQuery('#captainformPopupForm' + formId);

    captainformShowPopup(popupSelector);
}

function captainformBindFormPopupEvents(iFrameSelector, popupBoxSelector) {
    var formId = jQuery(popupBoxSelector).data('form-id');

    iFrameSelector.on("load", function () {
        jQuery('#popupBox' + formId).show();
        captainformResizeFormPopupBox(formId);
    });

    popupBoxSelector.on("click", function (e) {
        e.preventDefault();
        return false;
    });

    element2 = document.getElementById('popupIframe' + formId);

    var isOldIE = (navigator.userAgent.indexOf("MSIE") !== -1); // Detect IE10 and below
    iFrameResize({
        log: false,
        scrolling: false,
        enablePublicMethods: true,
        checkOrigin: false,
        heightCalculationMethod: isOldIE ? 'max' : 'documentElementOffset', // old wy max e obligatoriu pt ie8
        resizedCallback: function (messageData) {
            iframe_height = parseInt(messageData.height) || 0;
            jQuery('#popupBox' + formId).height(iframe_height);
            captainformResizeFormPopupBox(formId);
            jQuery('#cfloader').remove();
        },
        scrollCallback: function () {},
        messageCallback: function (messageData) {}
    }, element2);
}

function captainformGetFormPopupHTML(url, formId, preload) {
    var iOSStyle = '';
    var preloadedClass = preload ? 'preloaded' : '';

    if (captainform_is_ios()) {
        iOSStyle = ' style="-webkit-overflow-scrolling: touch"';
    }

    var html = '';
    html += '<div id="captainformPopupForm' + formId + '" data-form-id="' + formId + '" onclick="captainformRemoveOrHidePopup()" class="captainformPopupForm captainform_popup_bg_form ' + preloadedClass + '">';
        html += '<div id="cfloader" class="captainform_loader_form"></div>';

        html += '<div id="captainformPopupCloseButton' + formId + '" class="captainform_popup_close_form" onclick="captainformRemoveOrHidePopup()">';
            html += '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 100 100" class="captainform_form_popup_close_button_svg" version="1.1" viewBox="0 0 100 100" xml:space="preserve">';
                html += '<polygon fill="#fff" class="captainform_form_popup_close_button_svg_shape" points="77.6,21.1 49.6,49.2 21.5,21.1 19.6,23 47.6,51.1 19.6,79.2 21.5,81.1 49.6,53 77.6,81.1 79.6,79.2   51.5,51.1 79.6,23 "/>';
            html += '</svg>';
        html += '</div>';

        html += '<div id="popupBox' + formId + '" data-form-id="' + formId + '" class="popupBox captainform_popup_box_form">';
            html += '<div id="popupBody' + formId + '" class="popupBody captainform_popup_body_form"' + iOSStyle + '>';
                html += '<iframe id="popupIframe' + formId + '" src="' + url + '" class="popupIframe popup_iframe_form" scrolling="no"></iframe>';
            html += '</div>';
        html += '</div>';
    html += '</div>';

    return html;
}

function captainformResizeFormPopupBox(formId) {
    var iFrameSelector = jQuery('#popupIframe' + formId);
    var popupSelector = jQuery('#captainformPopupForm' + formId);
    var popupBoxSelector = jQuery('#popupBox' + formId);
    var popupBodySelector = jQuery('#popupBody' + formId);
    var popupCloseButton = jQuery('#captainformPopupCloseButton' + formId);

    if (iFrameSelector.length == 0) {
        return false;
    }

    if (captainform_is_ios()) {
        if(captainformFormPopupIsVisible(popupSelector)){
            window.scrollTo(0, 0);
            document.ontouchmove = function (e) {
                e.preventDefault();
            };
        }
        popupSelector.css('height', getIOSWindowHeight() + 'px');
        popupSelector.css('top', '0px');
    }

    var popupMargin = 50;
    var closeButtonSpace = 120;

    var maxHeight = jQuery(window).height() - popupMargin;
    popupBoxSelector.css('max-height', maxHeight + 'px');
    var maxWidth = jQuery(window).width() - popupMargin;
    popupBoxSelector.css('max-width', maxWidth + 'px');

    var marginTop = parseInt(popupBoxSelector.css('margin-top'));
    if(marginTop < 0)
    {
        var correctMargin = marginTop * 2 - popupMargin;
        maxHeight = jQuery(window).height() - popupMargin + correctMargin;
        popupBoxSelector.css('max-height', maxHeight + 'px');
        maxWidth = jQuery(window).width() - popupMargin;
        popupBoxSelector.css('max-width', maxWidth + 'px');
    }

    if(parseInt(popupBoxSelector.width()) + closeButtonSpace * 2 + parseInt(popupBoxSelector.css('padding')) * 2 >= jQuery(window).width()){
        popupBoxSelector
            .css('margin-top', 60)
            .css('max-height', maxHeight - 35);
        popupCloseButton
            .css('position', 'relative')
            .css('float', 'right')
            .css('right', popupBoxSelector.css('margin-right'))
            .css('top', 0);
    }
    else
    {
        popupBoxSelector.css('margin-top', 'auto');
        popupCloseButton
            .css('position', 'absolute')
            .css('float', 'none')
            .css('right', 30).css('top', 30);
    }

    popupBodySelector.css('max-height', popupBoxSelector.height() + 'px');

    popupBodySelector.delay(500).queue(function (next) {
        next();
    });
}

function captainform_is_ios() {
    var iDevices = ['iPad Simulator', 'iPhone Simulator', 'iPod Simulator', 'iPad', 'iPhone', 'iPod'];
    if (!!navigator.platform) {
        while (iDevices.length) {
            if (navigator.platform === iDevices.pop()) {
                return true;
            }
        }
    }
    return false;
}

window.addEventListener('resize', function(){
    jQuery('.captainformPopupForm').each(function(index, popup){
        captainformResizeFormPopupBox(jQuery(popup).data('form-id'));
    });
}, true);

window.addEventListener('message', function (e) {
    var message = e.data;
    var formId = message.formId;
    var iFrameSelector = jQuery('#popupIframe' + formId);
    var popupBoxSelector = jQuery('#popupBox' + formId);
    var popupBodySelector = jQuery('#popupBody' + formId);

    if (message.hasOwnProperty('msgpreviewpopup')) {
        captainform_create_form_popup({
            url: 'https://app.captainform.com/form-' + message.msgpreviewpopup + '/?style=preview_iframe:1',
            formId: message.msgpreviewpopup
        });
    }

    if(message.hasOwnProperty('messageType')){
        switch(message.messageType){
            case 'initFormPopup':
                if(popupBoxSelector.length) {
                    var widthUnit = message.hasOwnProperty('widthUnit') ? message.widthUnit : '';
                    var width = parseInt(message.fwidth) > 300 && widthUnit != '%' ? parseInt(message.fwidth) : 300;

                    popupBoxSelector.css('width', width + 'px');

                    popupBodySelector.off('scrollTo').scrollTo(iFrameSelector, 300);

                    if(message.hasOwnProperty('popupStyle'))
                        captainformChangePopupStyle(popupBoxSelector, message.popupStyle);
                }
                break;
            case 'captainformSubmitMessage':
                var popupSelector = jQuery('#captainformPopupForm' + formId);
                if(message.shouldDestroyPopupObject == true) {
                    popupSelector.removeClass('preloaded');
                    if(message.shouldPreloadAgain == true)
                        popupSelector.attr('shouldPreloadAgain', 'true');
                }

                if(message.shouldClosePopup == true)
                    captainformRemoveOrHidePopup(popupSelector);
                break;
            default:
                break;
        }
    }
});

jQuery.fn.scrollTo = function (elem, speed) {
    jQuery(this).animate({
        scrollTop: jQuery(this).scrollTop() - jQuery(this).offset().top + jQuery(elem).offset().top
    }, speed == undefined ? 500 : speed);
    return this;
};