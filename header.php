<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php the_title(); ?> </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
        <header class="main-header align-center">
            <section class="top-bar max-width-container">
                <div class="row main-header-row flex-column justify-center">
                    <div class="logo flex-column justify-center">
                        <?php if(has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <?php get_bloginfo() ?>
                            <span><?php bloginfo('description'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="nav-pages flex-column align-center hide-on-mobile-size show-on-desk-tablet-size">
                        <div class="row">
                            <nav class="main-menu navbar navbar-expand-md navbar-light" role="navigation">
                                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label=" <?php esc_attr_e('Toggle navigation', 'officebite'); ?> ">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'officebite_main_menu',
                                        'depth'             => 3,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'            => new WP_Bootstrap_Navwalker(),
                                    ) );
                                    ?>
                            </nav>
                        </div>
                    </div>
                    <div class="search-account-cart flex-column justify-center align-end">
                        <div class="icons">
                            <a class="menu-icons search-icon search-form nav-link">
                                <img class="search-icon search-form" src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/search-icon.png'); ?>" alt="<?php esc_html_e('Search', 'officebite') ?>">
                            </a>
                            <a class="menu-icons my-account-icon" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>"> 
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/my-account.png'); ?>" alt="<?php esc_html_e('My Account', 'officebite') ?>">
                            </a>
                            <div class="menu-icons cart-icon cart-div">
                                <a class="menu-icons cart-icon" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/icons/shopping-cart.png'); ?>" alt="<?php esc_html_e('Cart', 'officebite') ?>">
                                </a>
                                <span class="cart-items-count"> <?php echo esc_html(WC()->cart->get_cart_contents_count()); ?> </span>
                            </div>
                        </div>
                        <div class="search-div hidden search-form">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <nav class="main-menu navbar navbar-expand-md navbar-light show-on-mobile-size hide-on-desk-tablet-size" role="navigation">
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label=" <?php esc_attr_e('Toggle navigation', 'officebite'); ?> ">
                <span class="navbar-toggler-icon"></span>
            </button>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'officebite_main_menu',
                    'depth'             => 3,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ) );
                ?>
        </nav>
