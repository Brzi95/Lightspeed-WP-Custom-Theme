<footer class="footer-bar">
    <section class="footer-widgets">
        <div class="container">
            <div class="row">
                <?php if(is_active_sidebar('lightspeed-sidebar-footer-1')): ?>
                    <div class="col-md-4 col-12">
                        <?php dynamic_sidebar('lightspeed-sidebar-footer-1'); ?>
                    </div>
                <?php endif; ?>
                <?php if(is_active_sidebar('lightspeed-sidebar-footer-2')): ?>
                    <div class="col-md-4 col-12">
                        <?php dynamic_sidebar('lightspeed-sidebar-footer-2'); ?>
                    </div>
                <?php endif; ?>
                <?php if(is_active_sidebar('lightspeed-sidebar-footer-3')): ?>
                    <div class="col-md-4 col-12">
                        <?php dynamic_sidebar('lightspeed-sidebar-footer-3'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <seciton class="copyright">
        <div class="container">
            <div class="row">
                <div class="copyright-text col-12 col-md-6">
                    <p><?php echo esc_html(get_theme_mod('set_copyright', __('All Rights Reserved', 'lightspeed'))); ?></p>
                </div>
                <nav class="footer-menu col-12 col-md-6 text-left text-md-right">
                    <?php 
                        // wp_nav_menu(
                        //     array(
                        //         'theme_location' => 'lightspeed_footer_menu'
                        //     )
                        // );
                    ?>
                </nav>
            </div>
        </div>
    </seciton>
</footer>
    <?php wp_footer(); ?>
</body>
</html>
