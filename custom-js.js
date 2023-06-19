jQuery(document).ready(function($) {

    jQuery('li.product a img').on('click', function(event) {
        event.preventDefault(); 
        const productId = jQuery(this).closest('div.main-parent').data('product_id');
        const productTitle = jQuery(this).closest('div.main-parent').data('product_title');
        const productPopup = jQuery(this).closest('div.main-parent').find('.quick-view-product-popup');

        console.log(productId, productTitle);
        productPopup.addClass("open-popup");
          
    });

    jQuery('.close-popup-btn').off().on('click', function() {
        const productPopup = jQuery(this).closest('div.main-parent').find('.quick-view-product-popup');

        console.log('close popup');
        productPopup.removeClass("open-popup");
    });

    jQuery('.close-popup-btn').off().on('click', function() {
        const productPopup = jQuery(this).closest('div.main-parent').find('.quick-view-product-popup');

        console.log('close popup');
        productPopup.removeClass("open-popup");
    });

    jQuery('.quick-view-product-popup').click(function() {
        console.log('close popup');
        jQuery('.open-popup').removeClass("open-popup");
    });

    // Prevent events from getting pass .popup-container
    jQuery('.popup-container').click(function(e){
        e.stopPropagation();
    });

});
