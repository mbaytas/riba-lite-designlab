<?php

// Set Panel ID
$panel_id = 'rl_panel_formats';

// Set prefix
$prefix = 'rl';

/***********************************************/
/************** Post Formats  ***************/
/***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 32,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Archive Blog Post Settings', 'riba-lite' ),
            'description' => esc_html__('This section allows you to control various settings specific to each post-format. Making changes in these sections will be reflected on the homepage.', 'riba-lite'),
        )
    );

    /***********************************************/
    /************** Standard Settings  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_post_standard_format_section' ,
        array(
            'title'       => esc_html__( 'Standard', 'riba-lite' ),
            'description' => esc_html__( 'Post format: Standard (or default) settings', 'riba-lite'),
            'panel' 	  => $panel_id
        )
    );


    /* Enable Author Name  */
    $wp_customize->add_setting( $prefix.'_post_standard_enable_author',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_standard_enable_author',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Author', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_standard_format_section',
        )
    );

    /* Enable Posted Ago  */
    $wp_customize->add_setting( $prefix.'_post_standard_enable_posted',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_standard_enable_posted',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Posted ago', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_standard_format_section',
        )
    );

    /* Enable Estimated Reading Time  */
    $wp_customize->add_setting( $prefix.'_post_standard_enable_ert',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_standard_enable_ert',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Estimated Reading Time', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_standard_format_section',
        )
    );

    /***********************************************/
    /************** Image Settings  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_post_image_format_section' ,
        array(
            'title'       => esc_html__( 'Image', 'riba-lite' ),
            'description' => esc_html__( 'Post format: Image or (featured image) settings here.', 'riba-lite'),
            'panel'       => $panel_id
        )
    );


    /* Enable Author Name  */
    $wp_customize->add_setting( $prefix.'_post_image_enable_author',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_image_enable_author',
        array(
            'type'  => 'checkbox',
            'label' => esc_html__('Enable Author', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_image_format_section',
        )
    );

    /* Enable Posted Ago  */
    $wp_customize->add_setting( $prefix.'_post_image_enable_posted',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_image_enable_posted',
        array(
            'type'  => 'checkbox',
            'label' => esc_html__('Enable Posted ago', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_image_format_section',
        )
    );

    /* Enable Estimated Reading Time  */
    $wp_customize->add_setting( $prefix.'_post_image_enable_ert',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_image_enable_ert',
        array(
            'type'  => 'checkbox',
            'label' => esc_html__('Enable Estimated Reading Time', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_image_format_section',
        )
    );




    /***********************************************/
    /************** Video Settings  ***************/
    /***********************************************/


    /* Post Format Options */
    $wp_customize->add_section( $prefix.'_post_video_format_section' ,
        array(
            'title'       => esc_html__( 'Video', 'riba-lite' ),
            'description' => esc_html__( 'Post format: Video (or featured video) settings here.', 'riba-lite'),
            'panel' 	  => $panel_id
        )
    );


    /* Enable Author Name  */
    $wp_customize->add_setting( $prefix.'_post_video_enable_author',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_video_enable_author',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Author', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

    /* Enable Posted Ago  */
    $wp_customize->add_setting( $prefix.'_post_video_enable_posted',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_video_enable_posted',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Posted ago', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

    /* Enable Estimated Reading Time  */
    $wp_customize->add_setting( $prefix.'_post_video_enable_ert',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_video_enable_ert',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Estimated Reading Time', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

    /* Enable Video Controls */
    $wp_customize->add_setting( $prefix.'_enable_video_controls',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_video_controls',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Video Controls', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );


    /* Enable Video Auto Play */
    $wp_customize->add_setting( $prefix.'_enable_video_auto_play',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 0
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_video_auto_play',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Video AutoPlay', 'riba-lite'),
            'description' => esc_html__('Initial status: disabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

    /* Enable Video Loop Play */
    $wp_customize->add_setting( $prefix.'_enable_video_loop_play',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_video_loop_play',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Video Loop Play', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

    /* Enable Video Mute Play */
    $wp_customize->add_setting( $prefix.'_enable_video_mute_play',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_video_mute_play',
        array(
            'type'	=> 'checkbox',
            'label' => esc_html__('Enable Video Mute Play', 'riba-lite'),
            'description' => esc_html__('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

