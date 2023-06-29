<?php
/**
 * The template for the sidebar containing the shop widget area
 * 
 * @package Officebite Theme 
 */

?>

<?php if(is_active_sidebar('officebite-sidebar-shop')): ?>
    <?php dynamic_sidebar('officebite-sidebar-shop'); ?>
<?php endif; ?>
