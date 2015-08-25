<?php

/**
 * Class MTL_Typography_Output
 *
 * This file does the CSS outputting in the header for the custom typography customizer section
 *
 * @author		Cristian Raiber
 * @copyright	(c) Copyright by Macho Themes
 * @link		http://www.machothemes.com
 * @package 	Muscle Core Lite
 * @since		Version 1.0.0
 */

// @todo: find a way to make this file easily manageable
// @todo: find a way to not output duplicate font families

if( !function_exists( 'CallTypographyOutputClassMTL' ) ) {
    /**
     *
     * Gets called only if the "display social media options" option is checked
     * in the back-end
     *
     * @since   1.0.0
     *
     */
    function CallTypographyOutputClassMTL()
    {

    // instantiate the class & load everything else
    MTL_Typography_Output::getInstance();

    }
    add_action('wp_loaded', 'CallTypographyOutputClassMTL');
}

if( !class_exists( 'MTL_Typography_Output' ) ) {

    /**
     * Class MTL_Typography_Output
     */
    class MTL_Typography_Output {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;

        /**
         *
         */
        protected function __construct() {
            add_action( 'wp_head', array( $this, 'output_typography_styles' ), 3);
        }

        /**
         * Returns the *Singleton* instance of this class.
         *
         * @return Singleton The *Singleton* instance.
         */
        public static function getInstance()
        {
            if (null === static::$instance) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Private clone method to prevent cloning of the instance of the
         * *Singleton* instance.
         *
         * @return void
         */
        private function __clone()
        {
        }

        /**
         * Private unserialize method to prevent unserializing of the *Singleton*
         * instance.
         *
         * @return void
         */
        private function __wakeup()
        {
        }


        /**
         * Add custom body class to give some more weight to our styles.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function output_typography_styles() {


            $style = $_p_style = $_h1_style = $_h2_style = $_h3_style = $_h4_style = $_h5_style = $_h6_style = $_menu_style ='';
            $_font_families = array();


            $allowed_weights = array(100, 300, 400, 500, 700, 900);
            $allowed_styles = array('normal', 'italic', 'oblique');

            /* === <p> === */

            $p_family = get_theme_mod('p_font_family', '');
            $p_weight = get_theme_mod('p_font_weight', '');
            $p_style = get_theme_mod('p_font_style', '');
            $p_size = get_theme_mod('p_font_size', '');
            $p_line_h = get_theme_mod('p_line_height', '');

            if ($p_family)
                $_p_style .= sprintf("font-family: '%s';", esc_attr($p_family));

            if ($p_weight)
                $_p_style .= sprintf('font-weight: %s;', in_array(absint($p_weight), $allowed_weights) ? $p_weight : 400);


            if ($p_style)
                $_p_style .= sprintf('font-style: %s;', in_array($p_style, $allowed_styles) ? $p_style : 'normal');

            if ($p_size)
                $_p_style .= sprintf('font-size: %spx;', absint($p_size));

            if ($p_line_h)
                $_p_style .= sprintf('line-height: %spx;', absint($p_line_h));

            if ($_p_style)
                $_p_style = sprintf('body.riba-lite p { %s }', $_p_style);

            /* === <h1> === */

            $h1_family = get_theme_mod('h1_font_family', '');
            $h1_weight = get_theme_mod('h1_font_weight', '');
            $h1_style = get_theme_mod('h1_font_style', '');
            $h1_size = get_theme_mod('h1_font_size', '');
            $h1_line_h = get_theme_mod('h1_line_height', '');

            if ($h1_family)
                $_h1_style .= sprintf("font-family: '%s';", esc_attr($h1_family));


            if ($h1_weight)
                $_h1_style .= sprintf('font-weight: %s;', in_array(absint($h1_weight), $allowed_weights) ? $h1_weight : 400);


            if ($h1_style)
                $_h1_style .= sprintf('font-style: %s;', in_array($h1_style, $allowed_styles) ? $h1_style : 'normal');

            if ($h1_size)
                $_h1_style .= sprintf('font-size: %spx;', absint($h1_size));

            if ($h1_line_h)
                $_h1_style .= sprintf('line-height: %spx;', absint($h1_line_h));

            if ($_h1_style)
                $_h1_style = sprintf('body.riba-lite h1 { %s }', $_h1_style);

            /* === <h2> === */

            $h2_family = get_theme_mod('h2_font_family', '');
            $h2_weight = get_theme_mod('h2_font_weight', '');
            $h2_style = get_theme_mod('h2_font_style', '');
            $h2_size = get_theme_mod('h2_font_size', '');
            $h2_line_h = get_theme_mod('h2_line_height', '');

            if ($h2_family)
                $_h2_style .= sprintf("font-family: '%s';", esc_attr($h2_family));


            if ($h2_weight)
                $_h2_style .= sprintf('font-weight: %s;', in_array(absint($h2_weight), $allowed_weights) ? $h2_weight : 400);

            if ($h2_style)
                $_h2_style .= sprintf('font-style: %s;', in_array($h2_style, $allowed_styles) ? $h2_style : 'normal');

            if ($h2_size)
                $_h2_style .= sprintf('font-size: %spx;', absint($h2_size));

            if ($h2_line_h)
                $_h2_style .= sprintf('line-height: %spx;', absint($h2_line_h));

            if ($_h2_style)
                $_h2_style = sprintf('body.riba-lite h2 { %s }', $_h2_style);


            /* === <h3> === */

            $h3_family = get_theme_mod('h3_font_family', '');
            $h3_weight = get_theme_mod('h3_font_weight', '');
            $h3_style = get_theme_mod('h3_font_style', '');
            $h3_size = get_theme_mod('h3_font_size', '');
            $h3_line_h = get_theme_mod('h3_line_height', '');

            if ($h3_family)
                $_h3_style .= sprintf("font-family: '%s';", esc_attr($h3_family));

            if ($h3_weight)
                $_h3_style .= sprintf('font-weight: %s;', in_array(absint($h3_weight), $allowed_weights) ? $h3_weight : 400);


            if ($h3_style)
                $_h3_style .= sprintf('font-style: %s;', in_array($h3_style, $allowed_styles) ? $h3_style : 'normal');

            if ($h3_size)
                $_h3_style .= sprintf('font-size: %spx;', absint($h3_size));

            if ($h3_line_h)
                $_h3_style .= sprintf('line-height: %spx;', absint($h3_line_h));

            if ($_h3_style)
                $_h3_style = sprintf('body.riba-lite h3 { %s }', $_h3_style);

            /* === <h4> === */

            $h4_family = get_theme_mod('h4_font_family', '');
            $h4_weight = get_theme_mod('h4_font_weight', '');
            $h4_style = get_theme_mod('h4_font_style', '');
            $h4_size = get_theme_mod('h4_font_size', '');
            $h4_line_h = get_theme_mod('h4_line_height', '');

            if ($h4_family)
                $_h4_style .= sprintf("font-family: '%s';", esc_attr($h4_family));

            if ($h4_weight)
                $_h4_style .= sprintf('font-weight: %s;', in_array(absint($h4_weight), $allowed_weights) ? $h4_weight : 400);

            if ($h4_style)
                $_h4_style .= sprintf('font-style: %s;', in_array($h4_style, $allowed_styles) ? $h4_style : 'normal');

            if ($h4_size)
                $_h4_style .= sprintf('font-size: %spx;', absint($h4_size));

            if ($h4_line_h)
                $_h4_style .= sprintf('line-height: %spx;', absint($h4_line_h));

            if ($_h4_style)
                $_h4_style = sprintf('body.riba-lite h4 { %s }', $_h4_style);

            /* === <h5> === */

            $h5_family = get_theme_mod('h5_font_family', '');
            $h5_weight = get_theme_mod('h5_font_weight', '');
            $h5_style = get_theme_mod('h5_font_style', '');
            $h5_size = get_theme_mod('h5_font_size', '');
            $h5_line_h = get_theme_mod('h5_line_height', '');

            if ($h5_family)
                $_h5_style .= sprintf("font-family: '%s';", esc_attr($h5_family));


            if ($h5_weight)
                $_h5_style .= sprintf('font-weight: %s;', in_array(absint($h5_weight), $allowed_weights) ? $h5_weight : 400);


            if ($h5_style)
                $_h5_style .= sprintf('font-style: %s;', in_array($h5_style, $allowed_styles) ? $h5_style : 'normal');

            if ($h5_size)
                $_h5_style .= sprintf('font-size: %spx;', absint($h5_size));

            if ($h5_line_h)
                $_h5_style .= sprintf('line-height: %spx;', absint($h5_line_h));

            if ($_h5_style)
                $_h5_style = sprintf('body.riba-lite h5 { %s }', $_h5_style);

            /* === <h6> === */

            $h6_family = get_theme_mod('h6_font_family', '');
            $h6_weight = get_theme_mod('h6_font_weight', '');
            $h6_style = get_theme_mod('h6_font_style', '');
            $h6_size = get_theme_mod('h6_font_size', '');
            $h6_line_h = get_theme_mod('h6_line_height', '');

            if ($h6_family)
                $_h6_style .= sprintf("font-family: '%s';", esc_attr($h6_family));

            if ($h6_weight)
                $_h6_style .= sprintf('font-weight: %s;', in_array(absint($h6_weight), $allowed_weights) ? $h6_weight : 400);


            if ($h6_style)
                $_h6_style .= sprintf('font-style: %s;', in_array($h6_style, $allowed_styles) ? $h6_style : 'normal');

            if ($h6_size)
                $_h6_style .= sprintf('font-size: %spx;', absint($h6_size));

            if ($h6_line_h)
                $_h6_style .= sprintf('line-height: %spx;', absint($h6_line_h));

            if ($_h6_style)
                $_h6_style = sprintf('body.riba-lite h6 { %s }', $_h6_style);


            /* === Menu CSS === */

            $menu_family = get_theme_mod('menu_font_family', '');
            $menu_weight = get_theme_mod('menu_font_weight', '');
            $menu_style = get_theme_mod('menu_font_style', '');
            $menu_size = get_theme_mod('menu_font_size', '');
            $menu_line_h = get_theme_mod('menu_line_height', '');

            if ($menu_family)
                $_menu_style .= sprintf("font-family: '%s';", esc_attr($menu_family));

            if ($menu_weight)
                $_menu_style .= sprintf('font-weight: %s;', in_array(absint($menu_weight), $allowed_weights) ? $menu_weight : 400);

            if ($menu_style)
                $_menu_style .= sprintf('font-style: %s;', in_array($menu_style, $allowed_styles) ? $menu_style : 'normal');

            if ($menu_size)
                $_menu_style .= sprintf('font-size: %spx;', absint($menu_size));

            if ($menu_line_h)
                $_menu_style .= sprintf('line-height: %spx;', absint($menu_line_h));

            if ($_menu_style)
                $_menu_style = sprintf('body.riba-lite #rl-main-menu ul.nav-menu li a { %s }', $_menu_style);

            /* === Output === */

            // Join the styles.
            $style = join('', array($_p_style, $_h1_style, $_h2_style, $_h3_style, $_h4_style, $_h5_style, $_h6_style, $_menu_style) );

            $_font_families['fonts'] = array(

                'p' => array(
                    'font-family' => $p_family,
                    'weight' => $p_weight
                ),
                'h1' => array(
                    'font-family' => $h1_family,
                    'weight' => $h1_weight
                ),

                'h2' => array(
                    'font-family' => $h2_family,
                    'weight' => $h2_weight
                ),

                'h3' => array(
                    'font-family' => $h3_family,
                    'weight' => $h3_weight
                ),

                'h4' => array(
                    'font-family' => $h4_family,
                    'weight' => $h4_weight
                ),
                'h5' => array(
                    'font-family' => $h5_family,
                    'weight' => $h5_weight
                ),
                'h6' => array(
                    'font-family' => $h6_family,
                    'weight' => $h6_weight
                ),
            );

            echo '<!-- Custom Font Families -->'."\n";
            foreach ($_font_families as $k => $v) {
                foreach ($v as $font_type) {
                    $font_family = str_replace(' ', '+', $font_type['font-family']);

                    if( $font_family != '' ) {
                        echo '<link href="//fonts.googleapis.com/css?family=' . esc_attr($font_family) . ':' . esc_attr($font_type['weight']) . '" type="text/css" rel="stylesheet"/>'."\n";
                    }


                }
            }
            echo '<!-- END -->';

            // Output the styles.
            if ($style) {
                echo '<!-- Custom Font Styles -->'."\n";
                echo "\n" . '<style type="text/css" id="rl-typography">' . $style . '</style>' . "\n";
                echo '<!-- END -->';

                // Body class filter.
                add_filter('body_class', array($this, 'output_body_class') );
            }
        }


        public function output_body_class($classes) {

            /**
             * Add custom body class to give some more weight to our styles.
             *
             * @since  1.0.0
             * @access public
             * @param  array $classes
             * @return array
             */

            return array_merge($classes, array('riba-lite'));

        }
    }
}







