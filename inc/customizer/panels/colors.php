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
            'title' => esc_html__( 'Color Options', 'riba-lite' ),
            'description' => esc_html__('From this panel you will be able to change theme colors', 'riba-lite'),
        )
    );

    /***********************************************/
    /************** Header  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_header_colors' ,
        array(
            'title'       => esc_html__( 'Header', 'riba-lite' ),
            'description' => esc_html__( 'Header related color controls below', 'riba-lite' ),
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
                'label' => esc_html__('Header BG Color', 'riba-lite'),
                'description' => esc_html__('Default value: #FFF', 'riba-lite'),
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
                'label' => esc_html__('Header Text Logo Color', 'riba-lite'),
                'description' => esc_html__('Default value: #333', 'riba-lite'),
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
                'label' => esc_html__('Header Menu Link Color', 'riba-lite'),
                'description' => esc_html__('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_header_colors',
            )
        )
    );



    /***********************************************/
    /************** Fonts  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_heading_colors' ,
        array(
            'title'       => esc_html__( 'Typography', 'riba-lite' ),
            'description' => esc_html__( 'Change headings ( h1- h6 ) & paragraph colors from here.', 'riba-lite'),
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
                'label' => esc_html__('Heading H1 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Heading H2 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Heading H3 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Heading H4 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Heading H5 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Heading H6 Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
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
                'label' => esc_html__('Paragraph Color', 'riba-lite'),
                'description' => esc_html__('Default Value: #222', 'riba-lite'),
                'section' => $prefix.'_heading_colors',
            )
        )
    );

    /***********************************************/
    /************** Links  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_link_colors' ,
        array(
            'title'       => esc_html__( 'Links', 'riba-lite' ),
            'description' => esc_html__( 'Change the way links look on this website. To change the way links in the header look, please go to the "Header" Section above. ', 'riba-lite'),
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
                'label' => esc_html__('Link color normally', 'riba-lite'),
                'description' => esc_html__('Default value: #111', 'riba-lite'),
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
                'label' => esc_html__('Link color on hover', 'riba-lite'),
                'description' => esc_html__('Default value: #BBB', 'riba-lite'),
                'section' => $prefix.'_link_colors',
            )
        )
    );

    /***********************************************/
    /************** Footer  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_footer_colors' ,
        array(
            'title'       => esc_html__( 'Footer', 'riba-lite' ),
            'description' => esc_html__( 'Change footer related colors here.', 'riba-lite'),
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
                'label' => esc_html__('Footer Background Color', 'riba-lite'),
                'description' => esc_html__('Default value: #FFF', 'riba-lite'),
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
                'label' => esc_html__('Footer Heading Color', 'riba-lite'),
                'description' => esc_html__('Default value: #222', 'riba-lite'),
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
                'label' => esc_html__('Footer Link Color', 'riba-lite'),
                'description' => esc_html__('Default value: #222', 'riba-lite'),
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
                'label' => esc_html__('Footer Paragraph Color', 'riba-lite'),
                'description' => esc_html__('Default value: #222', 'riba-lite'),
                'section' => $prefix.'_footer_colors',
            )
        )
    );
