<?php
/**
 * Template part for displaying posts
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package Officebite Theme
 */

?>
<article <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>">    
        <h2> <?php the_title(); ?> </h2>
    </a>
    <div> <?php the_content(); ?> </div>
</article>
