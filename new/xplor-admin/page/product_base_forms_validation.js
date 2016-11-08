/*
Document: base_forms_validation.js
Author: Rustheme
Description: Custom JS code used in Form Validation Page
 */

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function() {
        jQuery( '.js-validation-bootstrap' ).validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function( error, e ) {
                jQuery(e).parents( '.form-group > div' ).append( error );
            },
            highlight: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' ).addClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            success: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            rules: {
                'product_name': {
                    required: true
                },
                'product_startprice': {
                    required: true,
                    number: true
                },
                'product_category': {
                  required: true
                }
            },
            messages: {
                'product_name': {
                    required: 'Please enter product name ...'
                },
                'product_startprice': {
                    required: 'Please enter product price ...',
                    number: 'Please enter number format ... '
                },
                'product_category': {
                  required: 'Please select product category ...'
                }
            }
        });
    };

    var initValidationBootstrap_mini1 = function() {
        jQuery( '.js-validation-bootstrap-mini1' ).validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function( error, e ) {
                jQuery(e).parents( '.form-group > div' ).append( error );
            },
            highlight: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' ).addClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            success: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            rules: {
                'val-detail': {
                    required: true
                },
                'val-price': {
                    required: true,
                    number: true
                }
            },
            messages: {
                'val-detail': {
                    required: 'Please enter product attribute detail ...'
                },
                'val-price': {
                    required: 'Please enter product price ...',
                    number: 'Please enter number format ... '
                }
            }
        });
    };

    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();
            initValidationBootstrap_mini1();
        }
    };
}();

// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});
