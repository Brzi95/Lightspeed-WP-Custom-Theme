<?php
/**
 * Template part for displaying posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package Officebite Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta">
            <p>
            <?php esc_html_e('Published by', 'officebite'); ?> <?php the_author_posts_link(); ?> <?php esc_html_e('on', 'officebite'); ?> <?php echo get_the_date(); ?>
            <br>
            <?php if(has_category()): ?>
                <?php esc_html_e('Categories', 'officebite'); ?>: <span> <?php the_category(' '); ?> </span>
            <?php endif; ?>
            <br>
            <?php if(has_tag()): ?>
                <?php esc_html_e('Tags', 'officebite'); ?>: <span> <?php the_tags('', ', ') ?> </span>
            <?php endif; ?>
            </p>
        </div>
        <div class="post-thumbnail">
            <?php
            if(has_post_thumbnail()):
                the_post_thumbnail('officebite-blog', array('class' => 'img-fluid'));
            endif;
            ?>
        </div>
    </header>
    <div class="content">
        <?php
        wp_link_pages(
            array(
                'before'    => '<p class="inner-pagination"' . esc_html__('Pages', 'officebite'),
                'after'     => '</p>',
            )
        )
        ?>
        <?php the_content(); ?>
    </div>
</article>
