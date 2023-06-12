<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<div class="content-area">
    <main>

        <!-- If WooCommerce is activated -->
        <?php if(class_exists('WooCommerce')): ?>
        <section class="popular-products">
            <?php
                $popular_limit = get_theme_mod('set_popular_max_num', 4);
                $popular_col = get_theme_mod('set_popular_max_col', 4);
            ?>
            <div class="container">
                <h2> <?php echo get_theme_mod('set_popular_title', __('Popular Products', 'lightspeed')) ?> </h2>
                <?php 
                    echo do_shortcode('[products limit="'. esc_attr($popular_limit) .'" columns="'. esc_attr($popular_col) .'" orderby="popularity"]'); 
                ?>
            </div>
        </section>
        <?php

        $show_deal      = get_theme_mod('set_deal_show', 0);
        $deal           = get_theme_mod('set_deal');
        $currency       = get_woocommerce_currency_symbol();
        $regular        = get_post_meta($deal, '_regular_price', true);
        $sale           = get_post_meta($deal, '_sale_price', true);

        if($show_deal == 1 && !empty($deal) && !empty($sale)):
            $discount_percentage = absint(100 - (($sale/$regular) * 100));
        ?>
        <section class="deal-of-the-week">
            <div class="container">
                <h2> <?php echo esc_html(get_theme_mod('set_deal_title', __('Deal of the Week', 'lightspeed'))); ?> </h2>
                <div class="row d-flex align-items-center">
                    <div class="deal-img col-md-6 col-12 ml-auto text-center">
                        <?php echo get_the_post_thumbnail($deal, 'large', array('class' => 'img-fluid')); ?>
                    </div>
                    <div class="deal-desc col-md-4 col-12 mr-auto text-center">
                    <?php if(!empty($sale)): ?>
                        <span class="discount">
                            <?php echo esc_html($discount_percentage); esc_html_e('% OFF', 'lightspeed'); ?>
                        </span>
                    <?php endif; ?>
                    <h3>
                        <a href="<?php echo esc_url(get_permalink($deal)); ?>"><?php echo esc_html(get_the_title($deal)); ?></a>
                    </h3>
                    <p><?php echo esc_html(get_the_excerpt($deal)); ?></p>
                    <a href="<?php echo esc_url('?add-to-cart=' . $deal); ?>" class="add-to-cart"> <?php esc_html_e('Add to Cart', 'lightspeed') ?> </a>
                    

                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php endif; ?>
        <!-- End of WooCommerce class exists -->

        <!-- Home Page Blog -->
        <section class="lightspeed-blog">
            <div class="container">
                <div class="section-title">
                    <h2> <?php echo esc_html(get_theme_mod('set_blog_title', esc_html__('News From Our Blog', 'lightspeed'))) ?> </h2>
                </div>
                <div class="row">
                <?php

                $args = array(
                    'post_type'     => 'post',
                    'post_per_page' => 2,
                );

                $blog_posts = new WP_Query($args);

                if($blog_posts->have_posts()):
                    while($blog_posts->have_posts()): $blog_posts->the_post(); ?>
                        <article class="col-12 col-md-6">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if(has_post_thumbnail()):
                                    the_post_thumbnail('lightspeed_blog', array('class' => 'img-fluid'));
                                endif;
                                ?>
                            </a>
                            <h3> 
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="excerpt"> <?php the_excerpt(); ?> </div>
                            <div class="category"> <?php esc_html_e('Category', 'lightspeed') ?>: <?php the_category(); ?> </div>
                            <div class="author"> <?php esc_html_e('Author', 'lightspeed') ?>: <?php the_author(); ?> </div>
                        </article>
                        <?php
                    endwhile;

                    // This function restores the global $post variable to the current post in the main query. If you’re following best practices, this is the most common function you will use to reset loops.
                    wp_reset_postdata();
                else:
                ?>
                <p> <?php esc_html_e('Nothing to display', 'lightspeed') ?> </p>
                <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
</div>


<?php
get_footer();
?>
