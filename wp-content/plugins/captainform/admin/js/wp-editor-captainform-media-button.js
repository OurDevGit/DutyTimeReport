function captainformBindPagePostWidget(url_plugin) {
    window.captainform_is_widget_page = false;
    if (typeof jscolor != 'undefined') {
        jscolor.dir = url_plugin + "/admin/js/jscolor/";
        captainform_bind_widget();
    }
}

window.shortcode123 = '';
function captainformInsertShortcode() {
    var publish_code = document.getElementById('captainform_publish_code').value;
    var custom_vars = document.getElementById('captainform_custom_vars_code').value;
    var code = publish_code.substring(0, publish_code.length - 1) + custom_vars + ']';
    if (!captainform_is_gutenberg_page()) {
        window.send_to_editor(code);
    }
    window.shortcode123 = code;
    tb_remove();
}

function captainformShowThickBox() {
    tb_show('Insert Form', 'admin-ajax.php?action=captainform_insert_dialog');

    captainform_resize_thickbox(1500);

    if (document.getElementById('TB_window') != null) {
        var cf_tb_show = document.getElementById('TB_window');
        cf_tb_show.className += " captainform";

    }
    if (document.getElementById('TB_ajaxContent') != null) {
        var cf_tb_show2 = document.getElementById('TB_ajaxContent');
        cf_tb_show2.className += " captainform";

    }
	
    if (document.getElementById('TB_overlay') != null) {
        var tb_overlay = document.getElementById('TB_overlay');
        tb_overlay.className += " captainform";
    }

}

function captainformRemoveThickBox() {
    tb_remove();
}

function captainform_resize_thickbox(intervalTime) {
    setTimeout(function () {
        var TB_WIDTH = 600;
        var TB_HEIGHT = 600;
        var TB_window = jQuery(document).find('#TB_window.captainform');
        var windowHeight = jQuery(window).height();

        if (parseInt(TB_window.width()) > 600 && TB_window.height() > 600) {
            TB_window.width(TB_WIDTH).height(TB_HEIGHT);
            var marginL = (parseInt(TB_window.width())) / 2;
            TB_window.css('margin-left', -marginL);

            if (windowHeight > TB_window.height()) {
                var marginT = (windowHeight - TB_window.height()) / 2;
                TB_window.css('margin-top', marginT).css('top', 0);
            }
        }
        if (parseInt(TB_window.height()) < 768) {
            var TB_HEIGHT = 432;

            if (windowHeight > TB_window.height()) {
                var marginT = (windowHeight - TB_window.height()) / 2;
                TB_window.css('margin-top', marginT).css('top', 0);
            }
        }

    }, intervalTime || 100);
}

function captainform_is_gutenberg_page() {
    if (document.body.classList.contains('block-editor-page')){
        return true;
    }
    return false;
}

jQuery(window).on('resize', captainform_resize_thickbox);
