jQuery(document).ready(function() {

    // Search bar appearing on click
    jQuery("a.search-icon").on('click', function(){
        jQuery(".search-div").toggleClass("hidden");
    });

    jQuery(document).on("click", function(e) {
        if ((jQuery(e.target).is(".search-form") === false) && (jQuery(e.target).is("[type='search']") === false)) {
          jQuery(".search-div").addClass("hidden");
        }
    });

    // Sidebar appearing on click on archive page
    jQuery('.toggle-sidebar').on('click', function() {
        jQuery('.sidebar-overlay').toggleClass('show-overlay');
        jQuery('.sidebar-container').toggleClass('show-sidebar');
        jQuery('body').toggleClass('disable-y-scroll');
    });

    jQuery('.sidebar-container').on('click', function() {
        jQuery('.sidebar-overlay').removeClass('show-overlay');
        jQuery('.sidebar-container').toggleClass('show-sidebar');
        jQuery('body').removeClass('disable-y-scroll');
    });

    jQuery('.sidebar-content').click(function(e){
        e.stopPropagation();
    });

});




