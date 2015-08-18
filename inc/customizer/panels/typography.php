<?php

// Load customizer typography control class.
require_once get_template_directory(). '/inc/customizer/custom-controls/typography-control.php';

// Set Panel ID
$panel_id = 'rl_panel_typography';

// Set prefix
$prefix = 'rl';


// Register typography control JS template.
$wp_customize->register_control_type( 'RL_Customizer_Control_Typography' );


// Add the typography panel.
$wp_customize->add_panel( $panel_id,
    array(
        'priority' => 31,
        'title' => esc_html__( 'Typography', 'riba-lite' )
    )
);

// Add the `<p>` typography section.
$wp_customize->add_section( $prefix.'_p_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Paragraphs', 'riba-lite' )
    )
);

// Add the headings typography section.
$wp_customize->add_section( $prefix.'_headings_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Headings', 'riba-lite' )
    )
);

// Add the `Logo` typography section.
$wp_customize->add_section( $prefix.'_logo_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Logo', 'riba-lite' )
    )
);

// Add the `Menu` typography section.
$wp_customize->add_section( $prefix.'_menu_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Menu', 'riba-lite' )
    )
);

// Add the `Sidebar` typography section.
$wp_customize->add_section( $prefix.'_sidebar_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Sidebar', 'riba-lite' )
    )
);

// Add the `Footer` typography section.
$wp_customize->add_section( $prefix.'_footer_typography',
    array(
        'panel' => $panel_id,
        'title' => esc_html__( 'Footer', 'riba-lite' )
    )
);


// Add the `<h1>` typography settings.
$wp_customize->add_setting( 'h1_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h1_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h1_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h1_font_size',   array( 'default' => '48',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h1_line_height', array( 'default' => '60',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<h2>` typography settings.
$wp_customize->add_setting( 'h2_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h2_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h2_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h2_font_size',   array( 'default' => '36',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h2_line_height', array( 'default' => '45',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h2_letter_spacing', array( 'default' => '1',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<h3>` typography settings.
$wp_customize->add_setting( 'h3_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h3_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h3_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h3_font_size',   array( 'default' => '28',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h3_line_height', array( 'default' => '35',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<h4>` typography settings.
$wp_customize->add_setting( 'h4_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h4_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h4_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h4_font_size',   array( 'default' => '18',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h4_line_height', array( 'default' => '22',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<h5>` typography settings.
$wp_customize->add_setting( 'h5_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h5_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h5_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h5_font_size',   array( 'default' => '16',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h5_line_height', array( 'default' => '20',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<h6>` typography settings.
$wp_customize->add_setting( 'h6_font_family', array( 'default' => 'Montserrat', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h6_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h6_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h6_font_size',   array( 'default' => '16',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'h6_line_height', array( 'default' => '20',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `<p>` typography settings.
$wp_customize->add_setting( 'p_font_family', array( 'default' => 'Domine',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'p_font_weight', array( 'default' => '300',    'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'p_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'p_font_size',   array( 'default' => '19',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'p_line_height', array( 'default' => '34',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the `Logo` typography settings.
$wp_customize->add_setting( 'logo_font_family', array( 'default' => 'Lato', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'logo_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'logo_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'logo_font_size',   array( 'default' => '26',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'logo_line_height', array( 'default' => '70',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'logo_letter_spacing', array( 'default' => '50',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );

// Add the menu typography settings.
$wp_customize->add_setting( 'menu_font_family', array( 'default' => 'Lato',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'menu_font_weight', array( 'default' => '700',     'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'menu_font_style',  array( 'default' => 'normal',  'sanitize_callback' => 'sanitize_key',        'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'menu_font_size',   array( 'default' => '11',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'menu_line_height', array( 'default' => '11',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );
$wp_customize->add_setting( 'menu_letter_spacing', array( 'default' => '0',      'sanitize_callback' => 'absint',              'transport' => 'postMessage' ) );


// Add the `<p>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_p_typography',
        array(
            'label'       => esc_html__( 'Paragraph Typography', 'riba-lite' ),
            'description' => __( 'Select how you want your paragraphs to appear.', 'riba-lite' ),
            'section'     => $prefix.'_p_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'p_font_family',
                'weight'      => 'p_font_weight',
                'style'       => 'p_font_style',
                'size'        => 'p_font_size',
                'line_height' => 'p_line_height',
            ),
        )
    )
);

// Add the `<h1>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h1_typography',
        array(
            'label'       => esc_html__( 'Heading 1', 'riba-lite' ),
            'description' => __( 'Select how heading 1 should appear.', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h1_font_family',
                'weight'      => 'h1_font_weight',
                'style'       => 'h1_font_style',
                'size'        => 'h1_font_size',
                'line_height' => 'h1_line_height'
            ),
        )
    )
);

// Add the `<h2>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h2_typography',
        array(
            'label'       => esc_html__( 'Heading 2', 'riba-lite' ),
            'description' => __( 'Select how heading 2 should appear.', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h2_font_family',
                'weight'      => 'h2_font_weight',
                'style'       => 'h2_font_style',
                'size'        => 'h2_font_size',
                'line_height' => 'h2_line_height'
            ),
        )
    )
);

// Add the `<h3>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h3_typography',
        array(
            'label'       => esc_html__( 'Heading 3', 'riba-lite' ),
            'description' => __( 'Select how heading 3 should appear. This is the same heading used for the widget titles in the footer', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h3_font_family',
                'weight'      => 'h3_font_weight',
                'style'       => 'h3_font_style',
                'size'        => 'h3_font_size',
                'line_height' => 'h3_line_height'
            ),

        )
    )
);

// Add the `<h4>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h4_typography',
        array(
            'label'       => esc_html__( 'Heading 4', 'riba-lite' ),
            'description' => __( 'Select how heading 4 should appear.', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h4_font_family',
                'weight'      => 'h4_font_weight',
                'style'       => 'h4_font_style',
                'size'        => 'h4_font_size',
                'line_height' => 'h4_line_height'
            ),

        )
    )
);

// Add the `<h5>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h5_typography',
        array(
            'label'       => esc_html__( 'Heading 5', 'riba-lite' ),
            'description' => __( 'Select how heading 5 should appear.', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h5_font_family',
                'weight'      => 'h5_font_weight',
                'style'       => 'h5_font_style',
                'size'        => 'h5_font_size',
                'line_height' => 'h5_line_height'
            ),

        )
    )
);

// Add the `<h6>` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_h6_typography',
        array(
            'label'       => esc_html__( 'Heading 6', 'riba-lite' ),
            'description' => __( 'Select how heading 6 should appear.', 'riba-lite' ),
            'section'     => $prefix.'_headings_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'h6_font_family',
                'weight'      => 'h6_font_weight',
                'style'       => 'h6_font_style',
                'size'        => 'h6_font_size',
                'line_height' => 'h6_line_height'
            ),

        )
    )
);

// Add the `logo` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_logo_typography',
        array(
            'label'       => esc_html__( 'Logo Typography', 'riba-lite' ),
            'description' => __( 'Select how the logo is displayed.', 'riba-lite' ),
            'section'     => $prefix.'_logo_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'logo_font_family',
                'weight'      => 'logo_font_weight',
                'style'       => 'logo_font_style',
                'size'        => 'logo_font_size',
                'line_height' => 'logo_line_height',
                'letter_spacing' => 'logo_letter_spacing'

            ),
        )
    )
);

// Add the `menu` typography control.
$wp_customize->add_control(
    new RL_Customizer_Control_Typography(
        $wp_customize,
        $prefix.'_menu_typography',
        array(
            'label'       => esc_html__( 'Menu Typography', 'riba-lite' ),
            'description' => __( 'Select how Menu items should appear.', 'riba-lite' ),
            'section'     => $prefix.'_menu_typography',

            // Tie a setting (defined via `$wp_customize->add_setting()`) to the control.
            'settings'    => array(
                'family'      => 'menu_font_family',
                'weight'      => 'menu_font_weight',
                'style'       => 'menu_font_style',
                'size'        => 'menu_font_size',
                'line_height' => 'menu_line_height',
                'letter_spacing' => 'menu_letter_spacing'
            ),

        )
    )
);