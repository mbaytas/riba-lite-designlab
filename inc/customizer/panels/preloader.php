<?php

    // Set Panel ID
    $panel_id = 'rl_panel_preloader';

    // Set prefix
    $prefix = 'rl';

    /***********************************************/
    /************** GENERAL OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 28,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Preloader Options', 'riba-lite' )
        )
    );

    /* Layout */
    $wp_customize->add_section( $prefix.'_preloader_section' ,
        array(
            'title'       => __( 'Customisation', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );

    /* Preloader Text */
    $wp_customize->add_setting($prefix.'_preloader_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Loading', 'riba-lite'),
        )
    );

    $wp_customize->add_control(
        $prefix.'_preloader_text',
        array(
            'label' 		=> __('Preloader text', 'riba-lite'),
            'description'   => __('Current text: Loading', 'riba-lite'),
            'section' 		=> $prefix.'_preloader_section',
        )
    );

    /* Preloader BG Color */
    $wp_customize->add_setting($prefix.'_preloader_bg_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#FFF'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
    $prefix.'_preloader_bg_color',
            array(

                'label' 		=> __('Preloader background color', 'riba-lite'),
                'description'   => __('Current color: #FFF (white) ', 'riba-lite'),
                'section' 		=> $prefix.'_preloader_section',
            )
        )
    );

    /* Preloader Text Color */
    $wp_customize->add_setting($prefix.'_preloader_text_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#000'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        $prefix.'_preloader_text_color',
            array(
                'label' 		=> __('Preloader text color', 'riba-lite'),
                'description'   => __('Current color: #000 (black) ', 'riba-lite'),
                'section' 		=> $prefix.'_preloader_section',
            )
        )
    );