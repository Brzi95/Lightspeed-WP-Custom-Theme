<?php

/**
 * Lightspeed Theme Customizer
 * 
 * @package Lightspeed
 */

function lightspeed_customizer($wp_customize) {

    // Copyright Section
    $wp_customize->add_section(
        'sec_copyright', array(
            'title'       => __('Copyright Settings', 'lightspeed'),
            'description' => __('Copyright Section', 'lightspeed')
        )
    );

            // Field 1 - Copyright Text Box
            $wp_customize->add_setting(
                'set_copyright', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_copyright', array(
                    'label'         => __('Copyright', 'lightspeed'),
                    'description'   => __('Please, add your copyright information here', 'lightspeed'),
                    'section'       => __('sec_copyright', 'lightspeed'),
                    'type'          => __('text', 'lightspeed')
                )
            );

    // Home page
    $wp_customize->add_section(
        'sec_home_page', array(
            'title'       => __('Home Page Products and Blog Settings', 'lightspeed'),
            'description' => __('Home Page Section', 'lightspeed'),
        )
    );

            $wp_customize->add_setting(
                'set_popular_max_num', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'absint'
                )
            );

            $wp_customize->add_control(
                'set_popular_max_num', array(
                    'label'         => __('Popular Products Max Number', 'lightspeed'),
                    'description'   => __('Popular Products Max Number', 'lightspeed'),
                    'section'       => __('sec_home_page', 'lightspeed'),
                    'type'          => __('number', 'lightspeed')
                )
            );

            $wp_customize->add_setting(
                'set_popular_max_col', array(
                    'type'              => 'theme_mod',
                    'default'           => '',
                    'sanitize_callback' => 'absint'
                )
            );

            $wp_customize->add_control(
                'set_popular_max_col', array(
                    'label'         => __('Popular Products Max Columns', 'lightspeed'),
                    'description'   => __('Popular Products Max Columns', 'lightspeed'),
                    'section'       => __('sec_home_page', 'lightspeed'),
                    'type'          => __('number', 'lightspeed')
                )
            );


    // Deal of the Week Product ID
    $wp_customize->add_setting(
        'set_deal_show', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'lightspeed_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        'set_deal_show', array(
            'label'         => __('Show Deal of the Week', 'lightspeed'),
            'description'   => __('Product ID to Display', 'lightspeed'),
            'section'       => __('sec_home_page', 'lightspeed'),
            'type'          => __('checkbox', 'lightspeed')
        )
    );

    $wp_customize->add_setting(
        'set_deal', array(
            'type'              => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_deal', array(
            'label'         => __('Deal of the Week Product ID', 'lightspeed'),
            'description'   => __('Product ID to Display', 'lightspeed'),
            'section'       => __('sec_home_page', 'lightspeed'),
            'type'          => __('number', 'lightspeed')
        )
    );

}
add_action('customize_register', 'lightspeed_customizer');

function lightspeed_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}
