<?php
/**
 * The template for diplaying search results pages
 * 
 * @link https://developer.wordpress.org/themes/basics/#search-result
 * 
 * @package Officebite Theme
 */

get_header(); 
?>
    <div class="content-area">
        <main>
            <section>
                <div class="container">
                    <div class="row">
                          <h1> <?php esc_html_e('Search results for', 'officebite'); ?>: <?php echo get_search_query(); ?></h1>
                        <?php
                        get_search_form();
                            if(have_posts()):
                                while(have_posts()): the_post();
                                    get_template_part('template-parts/content', 'search');
                                endwhile;
                                the_posts_pagination(array(
                                    'prev_text'     => esc_html__('Previous', 'officebite'),
                                    'next_text'     => esc_html__('Next', 'officebite')
                                ));
                            else:
                            ?>
                            <p> <?php esc_html_e('There are no results for your query', 'officebite'); ?> </p>
                            <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>
