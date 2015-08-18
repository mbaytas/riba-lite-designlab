<?php

// Set Panel ID
$panel_id = 'rl_panel_colors';

// Set prefix
$prefix = 'rl';

/***********************************************/
/************** Settings  ***************/
/***********************************************/




$wp_customize->add_panel( $panel_id,
    array(
        'priority' => 33,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Color Options', 'riba-lite' )
    )
);

    /***********************************************/
    /************** Header  ***************/
    /***********************************************/
    $wp_customize->add_section( $prefix.'_header_colors' ,
        array(
            'title'       => __( 'Header', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );

    /* Header: Background Color */
    $wp_customize->add_setting( $prefix.'_header_bg_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize,
        $prefix.'_header_bg_color',
            array(
                'label' => __('Header BG Color', 'riba-lite'),
                'description' => __('Default value: #FFF', 'riba-lite'),
                'section' => $prefix.'_header_colors',
            )
        )
    );

    /* Header: Text Logo Color */
    $wp_customize->add_setting( $prefix.'_header_text_logo_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#FFF'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize,
            $prefix.'_header_text_logo_color',
            array(
                'label' => __('Header Text Logo Color', 'riba-lite'),
                'description' => __('Default value: #333', 'riba-lite'),
                'section' => $prefix.'_header_colors',
            )
        )
    );

    /* Header: Menu Link Color */
    $wp_customize->add_setting( $prefix.'_header_menu_link_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#FFF'
        )
    );

    $wp_customize->add_control( new WP_Customize_Color_Control ( $wp_customize,
            $prefix.'_header_menu_link_color',
            array(
                'label' => __('Header Menu Link Color', 'riba-lite'),
                'description' => __('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_header_colors',
            )
        )
    );



    /***********************************************/
    /************** Fonts  ***************/
    /***********************************************/
    $wp_customize->add_section( $prefix.'_heading_colors' ,
        array(
            'title'       => __( 'Typography', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );


    /* Headings: H1 Color */
    $wp_customize->add_setting( $prefix.'_heading_h1_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
        $prefix.'_heading_h1_color',
            array(
                'label' => __('Heading H1 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Headings: H2 Color */
    $wp_customize->add_setting( $prefix.'_heading_h2_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_h2_color',
            array(
                'label' => __('Heading H2 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Headings: H3 Color */
    $wp_customize->add_setting( $prefix.'_heading_h3_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_h3_color',
            array(
                'label' => __('Heading H3 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Headings: H4 Color */
    $wp_customize->add_setting( $prefix.'_heading_h4_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_h4_color',
            array(
                'label' => __('Heading H4 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Headings: H5 Color */
    $wp_customize->add_setting( $prefix.'_heading_h5_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_h5_color',
            array(
                'label' => __('Heading H5 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Headings: H6 Color */
    $wp_customize->add_setting( $prefix.'_heading_h6_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_h6_color',
            array(
                'label' => __('Heading H6 Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /* Typography: P Color */
    $wp_customize->add_setting( $prefix.'_heading_p_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_heading_p_color',
            array(
                'label' => __('Paragraph Color', 'riba-lite'),
                'description' => __('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /***********************************************/
    /************** Links  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_link_colors' ,
        array(
            'title'       => __( 'Links', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );


    /* Link Color: Normal */
    $wp_customize->add_setting( $prefix.'_link_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#111'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_link_color',
            array(
                'label' => __('Link color normally', 'riba-lite'),
                'description' => __('Default value: #111', 'riba-lite'),
                'section' => $prefix.'_link_colors',
            )
        )
    );

    /* Link Color: Hover */
    $wp_customize->add_setting( $prefix.'_link_color_hover',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#BBB'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            $prefix.'_link_color_hover',
            array(
                'label' => __('Link color on hover', 'riba-lite'),
                'description' => __('Default value: #BBB', 'riba-lite'),
                'section' => $prefix.'_link_colors',
            )
        )
    );

    /***********************************************/
    /************** Footer  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_footer_colors' ,
        array(
            'title'       => __( 'Footer', 'riba-lite' ),
            'panel' 	  => $panel_id
        )
    );


    /* Footer Background Color */
    $wp_customize->add_setting( $prefix.'_footer_bg_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#FFF'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
        $prefix.'_footer_bg_color',
            array(
                'label' => __('Footer Background Color', 'riba-lite'),
                'description' => __('Default value: #FFF', 'riba-lite'),
                'section' => $prefix.'_footer_colors',
            )
        )
    );

    /* Footer Title Color */
    $wp_customize->add_setting( $prefix.'_footer_heading_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_footer_heading_color',
            array(
                'label' => __('Footer Heading Color', 'riba-lite'),
                'description' => __('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_footer_colors',
            )
        )
    );

    /* Footer Link Color */
    $wp_customize->add_setting( $prefix.'_footer_link_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_footer_link_color',
            array(
                'label' => __('Footer Link Color', 'riba-lite'),
                'description' => __('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_footer_colors',
            )
        )
    );

    /* Footer Paragraph Color */
    $wp_customize->add_setting( $prefix.'_footer_p_color',
        array(
            'sanitize_callback' => $prefix.'_sanitize_hex_color',
            'default' => '#222'
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize,
            $prefix.'_footer_p_color',
            array(
                'label' => __('Footer Paragraph Color', 'riba-lite'),
                'description' => __('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_footer_colors',
            )
        )
    );
