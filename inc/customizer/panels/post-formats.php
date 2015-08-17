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
            'priority' => 34,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Post Formats', 'riba-lite' )
        )
    );

    /***********************************************/
    /************** Standard Settings  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_post_standard_format_section' ,
        array(
            'title'       => __( 'Standard', 'riba-lite' ),
            'description' => __(' These settings affect front-pages. To control the settings for the single post, go go Blog Settings.', 'riba-lite'),
            'panel' 	  => $panel_id
        )
    );

    /* Enable Separator */
    $wp_customize->add_setting( $prefix.'_post_standard_enable_separator',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_standard_enable_separator',
        array(
            'type'	=> 'checkbox',
            'label' => __('Enable Separator', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_standard_format_section',
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
            'label' => __('Enable Author', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Posted ago', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Estimated Reading Time', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_standard_format_section',
        )
    );

    /***********************************************/
    /************** Image Settings  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_post_image_format_section' ,
        array(
            'title'       => __( 'Image', 'riba-lite' ),
            'description' => __(' These settings affect front-pages. To control the settings for the single post, go go Blog Settings.', 'riba-lite'),
            'panel'       => $panel_id
        )
    );

    /* Enable Separator */
    $wp_customize->add_setting( $prefix.'_post_image_enable_separator',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_image_enable_separator',
        array(
            'type'  => 'checkbox',
            'label' => __('Enable Separator', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_image_format_section',
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
            'label' => __('Enable Author', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Posted ago', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Estimated Reading Time', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_image_format_section',
        )
    );




    /***********************************************/
    /************** Video Settings  ***************/
    /***********************************************/


    /* Post Format Options */
    $wp_customize->add_section( $prefix.'_post_video_format_section' ,
        array(
            'title'       => __( 'Video', 'riba-lite' ),
            'description' => __(' These settings affect front-pages (homepage, archive, tag, etc). To control the settings for the single post, go go Blog Settings.', 'riba-lite'),
            'panel' 	  => $panel_id
        )
    );

    /* Enable Separator */
    $wp_customize->add_setting( $prefix.'_post_video_enable_separator',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_post_video_enable_separator',
        array(
            'type'	=> 'checkbox',
            'label' => __('Enable Separator', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
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
            'label' => __('Enable Author', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Posted ago', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Estimated Reading Time', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Video Controls', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Video AutoPlay', 'riba-lite'),
            'description' => __('Initial status: disabled', 'riba-lite'),
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
            'label' => __('Enable Video Loop Play', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
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
            'label' => __('Enable Video Mute Play', 'riba-lite'),
            'description' => __('Initial status: enabled', 'riba-lite'),
            'section' => $prefix.'_post_video_format_section',
        )
    );

