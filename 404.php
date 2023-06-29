<?php
/**
 * The template for diplaying 404 pages (not found)
 * 
 * @link https://developer.wordpress.org/Creating_an_Error_Page
 * 
 * @package Officebite Theme
 */

get_header();
?>
<div class="content-area">
    <main>
        <div class="container">
            <div class="error-404">
                <header>
                    <h1><?php esc_html_e('Page not found', 'officebite') ?></h1>
                    <p><?php esc_html_e('Unfortunately, the page you tried to reach does not exist on this site!', 'officebite') ?></p>
                </header>
                <?php
                    the_widget('WP_Widget_Recent_Posts',
                        array(
                            'title'     => esc_html__('Take a Look at Our Latest Posts', 'officebite'),
                            'number'    => 3
                        )
                    );
                ?>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>
