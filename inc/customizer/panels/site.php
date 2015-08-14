<?php

    // Include Custom Controls
    require get_template_directory() . '/inc/customizer/custom-controls/radio-img-selector.php';

    // Set Panel ID
    $panel_id = 'rl_panel_general';

    // Set prefix
    $prefix = 'rl';

    // Change panel for Site Title & Tagline Section
    $site_title        = $wp_customize->get_section( 'title_tagline' );
    $site_title->panel = $panel_id;

    // Remove sections from customizer front-view
    $wp_customize->remove_section('colors');

    // Change panel for Background Image
    $site_title        = $wp_customize->get_section( 'background_image' );
    $site_title->panel = $panel_id;

    // Change panel for Static Front Page
    $site_title        = $wp_customize->get_section( 'static_front_page' );
    $site_title->panel = $panel_id;

    // Change panel for Navigation
    $site_title        = $wp_customize->get_section( 'nav' );
    $site_title->panel = $panel_id;

    // Change priority for Site Title
    $site_title           = $wp_customize->get_control( 'blogname' );
    $site_title->priority = 15;

    // Change priority for Site Tagline
    $site_title           = $wp_customize->get_control( 'blogdescription' );
    $site_title->priority = 17;


    /***********************************************/
    /************** GENERAL OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 29,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'General Options', 'riba-lite' )
        )
    );

    /***********************************************/
    /************** General Site Settings  ***************/
    /***********************************************/

    /* Layout */
    $wp_customize->add_section( $prefix.'_layout_section' ,
        array(
            'title'       => __( 'Site Layout', 'riba-lite' ),
            'priority'    => 1,
            'panel' 	  => $panel_id
        )
    );

    /* Site Layout */
    $wp_customize->add_setting($prefix.'_site_layout',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Riba', 'riba-lite'),
        )
    );

    $wp_customize->add_control( new RL_Layout_Picker_Custom_Control( $wp_customize,
        $prefix.'_site_layout',
            array(
                'type'          => 'radio-image',
                'label' 		=> __('Select Site Layout', 'riba-lite'),
                'description'   => __('Fixed / Fluid layout', 'riba-lite'),
                'section' 		=> $prefix.'_layout_section',
                'priority' 		=> 2,
                'choices'     => array(
                    'boxed' => get_template_directory_uri() . '/inc/customizer/assets/images/boxed.png',
                    'full' => get_template_directory_uri() . '/inc/customizer/assets/images/fullwidth.png',
                ),
            )
        )
    );



    /* Logo */
    $wp_customize->add_section( $prefix.'_general_section' ,
        array(
            'title'       => __( 'Logo', 'riba-lite' ),
            'priority'    => 2,
            'panel' 	  => $panel_id
        )
    );


    /* Company text logo */
    $wp_customize->add_setting($prefix.'_text_logo',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => __('Riba', 'riba-lite'),
        )
    );

    $wp_customize->add_control(
        $prefix.'_text_logo',
        array(
            'label' 		=> __('Enter company name', 'riba-lite'),
            'description'   => __('This field is best used when you don\'t have a professional image logo', 'riba-lite'),
            'section' 		=> $prefix.'_general_section',
            'priority' 		=> 2
        )
    );

    /* Company image logo */
    $wp_customize->add_setting($prefix.'_img_logo',
        array(
            'sanitize_callback' => $prefix.'_sanitize_file_url',
            'default' => get_template_directory_uri() . '/layout/images/logo/riba-logo.png',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            $prefix.'_img_logo',
            array(
                'label'         => __('Site Logo', 'riba-lite'),
                'description'   => __('Recommended size: 100 x 100', 'riba-lite'),
                'section'       => $prefix.'_general_section',
                'priority'      => 2
            )
        )
    );


    /***********************************************/
    /************** Contact Details  ***************/
    /***********************************************/
    $wp_customize->add_section( $prefix.'_general_contact_section' ,
        array(
            'title'       => __( 'Contact Details', 'riba-lite' ),
            'priority'    => 3,
            'panel' => $panel_id
        )
    );


    /* email */
    $wp_customize->add_setting( $prefix.'_email',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'contact@site.com'
        )
    );

    $wp_customize->add_control( $prefix.'_email',
        array(
            'label'   => __( 'Email addr.', 'riba-lite' ),
            'description' => __('Will be displayed in the footer', 'riba-lite'),
            'section' => $prefix.'_general_contact_section',
            'settings'   => $prefix.'_email',
            'priority' => 10
        )
    );


    /* phone number */
    $wp_customize->add_setting( $prefix.'_phone',
        array(
            'sanitize_callback' => $prefix.'_sanitize_number',
            'default' => '0 332 548 954'
        )
    );

    $wp_customize->add_control( $prefix.'_phone',
        array(
            'label'   => __( 'Phone number', 'riba-lite' ),
            'description' => __('Will be displayed in the footer', 'riba-lite'),
            'section' => $prefix.'_general_contact_section',
            'settings'   => $prefix.'_phone',
            'priority' => 12
        )
    );

    /***********************************************/
    /************** Footer Details  ***************/
    /***********************************************/
    $wp_customize->add_section( $prefix.'_general_footer_section' ,
        array(
            'title'       => __( 'Footer Details', 'riba-lite' ),
            'priority'    => 4,
            'panel' => $panel_id
        )
    );

    /* Footer Copyright */
    $wp_customize->add_setting( $prefix.'_footer_copyright',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => sprintf('&copy; %s', __('Macho Themes 2015. All Rights Reserved', 'riba-lite') )
        )
    );

    $wp_customize->add_control( $prefix.'_footer_copyright',
        array(
            'type'  => 'textarea',
            'label'   => __( 'Footer Copyright.', 'riba-lite' ),
            'description' => __('Will be displayed in the footer', 'riba-lite'),
            'section' => $prefix.'_general_footer_section',
            'settings'   => $prefix.'_footer_copyright',
            'priority' => 11
        )
    );

