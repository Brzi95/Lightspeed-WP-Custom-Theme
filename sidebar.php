<?php
/**
 * The template for the sidebar containing the main widget area
 * 
 * @package Lightspeed Theme 
 */

?>

<?php if(is_active_sidebar('lightspeed-sidebar-1')): ?>
    <aside class="col-lg-3 col-md-4 col-12 h-100 brzi">
        <?php dynamic_sidebar('lightspeed-sidebar-1'); ?>
    </aside>
<?php endif; ?>
