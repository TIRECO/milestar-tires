jQuery('#contact-form-01').addClass('form-hider');
jQuery('#contact-form-02').addClass('form-hider');
jQuery('#contact-form-03').addClass('form-hider');
console.log(jQuery('#contact-form-03'));
jQuery(document).ready(function() {
    jQuery('#contact-form-selector').change(function() {

        jQuery('#contact-form-01').addClass('form-hider');
        jQuery('#contact-form-02').addClass('form-hider');
        jQuery('#contact-form-03').addClass('form-hider');
        jQuery('#' + jQuery('#contact-form-selector').val()).removeClass('form-hider');
    });
});


