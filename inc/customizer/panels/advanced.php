<?php

    // Set Panel ID
    $panel_id = 'rl_panel_advanced';

    // Set prefix
    $prefix = 'rl';

    /***********************************************/
    /************** Settings  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Advanced Options', 'riba-lite' )
        )
    );

    /* Advanced */
    $wp_customize->add_section( $prefix.'_advanced_section' ,
        array(
            'title'       => esc_html__( 'Settings', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );


    /* Enable Site Preloader*/
    $wp_customize->add_setting( $prefix.'_enable_site_preloader',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_site_preloader',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable site preloader', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );

    /* Enable LazyLoad */
    $wp_customize->add_setting( $prefix.'_enable_site_smoothscroll',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_site_smoothscroll',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable smoothscroll', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );


    /* MB YTplayer */
    $wp_customize->add_setting( $prefix.'_enable_site_mbytplayer',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_site_mbytplayer',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable YouTube Player ?', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled. If you do not plan on using videos in your post (or featuring them), go ahead and uncheck this.', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );

    /* Enable Sticky Header Behaviour */
    $wp_customize->add_setting( $prefix.'_enable_site_headroom',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_site_headroom',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Sticky Header behavior ?', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled. If you don\'t like the fact that the header is hidden when you scroll down, uncheck this.', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );

    /* Enable Image LazyLoad Behavior */
    $wp_customize->add_setting( $prefix.'_enable_site_lazyload',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_site_lazyload',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Lazy Load behavior for images ?', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled. If you don\'t like the fact that images are being loaded as you scroll them into view, uncheck this.', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );