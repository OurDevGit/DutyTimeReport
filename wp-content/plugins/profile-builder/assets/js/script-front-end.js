jQuery(document).ready(function(){
    jQuery('#wppb-register-user').submit(function (e) {
        //stop submitting the form to see the disabled button effect
        e.preventDefault();
        //disable the submit button
        jQuery('.form-submit #register').attr('disabled', true);
        this.submit();
    });
});