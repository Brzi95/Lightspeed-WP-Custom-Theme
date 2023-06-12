<?php
/**
 * The header for our theme
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 * 
 * @package Lightspeed Theme
 */

get_header(); 
?>
    <div class="content-area">
        <main>
            <section>
                <div class="container">
                    <div class="row">
                        <?php
                            while(have_posts()): the_post();
                                get_template_part('template-parts/content', 'page');
                                if(comments_open() || get_comments_number()):
                                    comments_template();
                                endif;
                            endwhile;
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>
