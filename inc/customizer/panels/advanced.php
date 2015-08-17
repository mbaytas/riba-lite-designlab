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
            'title' => __( 'Advanced Options', 'riba-lite' )
        )
    );

    /* Advanced */
    $wp_customize->add_section( $prefix.'_advanced_section' ,
        array(
            'title'       => __( 'Settings', 'riba-lite' ),
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
            'label' => __('Enable site preloader', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable smoothscroll', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_advanced_section',
        )
    );



