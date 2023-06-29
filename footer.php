<footer class="footer-bar flex-row justify-center">
    <div class="max-width-container">
        <div class="logo-footer flex-column justify-center">
            <?php if(has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <?php get_bloginfo() ?>
                <span><?php bloginfo('description'); ?></span>
            <?php endif; ?>
        </div>
        <div class="social-icons flex-row justify-end align-center">
            <a class="footer-icons" target="_blank" href="https://www.facebook.com/OfficeBite">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/facebook.png'); ?>" alt="facebook">
            </a>
            <a class="footer-icons" target="_blank" href="https://www.linkedin.com/company/officebite"> 
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/linkedin.png'); ?>" alt="linkedin">
            </a>
            <a class="footer-icons" target="_blank" href="https://www.instagram.com/office_bite/">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/instagram.png'); ?>" alt="instagram">
            </a>
        </div>
    </div>
</footer>
    <?php wp_footer(); ?>
</body>
</html>
