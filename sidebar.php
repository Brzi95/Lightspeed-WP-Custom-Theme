<?php
/**
 * The template for the sidebar containing the main widget area
 * 
 * @package Officebite Theme 
 */

?>

<?php if(is_active_sidebar('officebite-sidebar-1')): ?>
    <aside class="col-lg-3 col-md-4 col-12 h-100">
        <?php dynamic_sidebar('officebite-sidebar-1'); ?>
    </aside>
<?php endif; ?>
