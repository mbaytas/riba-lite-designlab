<?php

/**
 * Class MTL_Colors_Output
 *
 * This file does the color handling of the color output for the Muscle Core Lite Framework
 *
 * @author		Cristian Raiber
 * @copyright	(c) Copyright by Macho Themes
 * @link		http://www.machothemes.com
 * @package 	Muscle Core Lite
 * @since		Version 1.0
 */


if( !function_exists( 'CallColorsyOutputClassMTL' ) ) {
    /**
     *
     * Gets called only if the "display social media options" option is checked
     * in the back-end
     *
     * @since   1.0.0
     *
     */
    function CallColorsyOutputClassMTL()
    {

        // instantiate the class & load everything else
        MTL_Colors_Output::getInstance();

    }
    add_action('wp_loaded', 'CallColorsyOutputClassMTL');
}

if( !class_exists( 'MTL_Colors_Output' ) ) {

    /**
     * Class MTL_Colors_Output
     */
    class MTL_Colors_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;

        /**
         *
         */
        protected function __construct() {
            add_action( 'wp_head', array( $this, 'output_color_styles' ), 3);
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
         * This just exists here for when we'll extend (actually, switch) the Customizer Color Control JS with one that supports RGBA (transparency)
         *
         *
         * @param $color
         * @param bool|false $opacity
         * @return string
         */
        private function mt_hex2rgba($color, $opacity = false)
        {

            $default = 'rgb(0,0,0)';

            //Return default if no color provided
            if (empty($color))
                return $default;

            //Sanitize $color if "#" is provided
            if ($color[0] == '#') {
                $color = substr($color, 1);
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
            } elseif (strlen($color) == 3) {
                $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
            } else {
                return $default;
            }

            //Convert hexadec to rgb
            $rgb = array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
            if ($opacity) {
                if (abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
            } else {
                $output = 'rgb(' . implode(",", $rgb) . ')';
            }

            //Return rgb(a) color string
            return $output;
        }


        /**
         * Simple class that prints out CSS based on stlye options selected in the customizer
         */
    function output_color_styles()
    {
        // Fetch stored values
        $header_bg_color = get_theme_mod('rl_header_bg_color', '#222');
        $logo_color = get_theme_mod('rl_header_text_logo_color', '#FFF');
        $header_menu_link_color = get_theme_mod('rl_header_menu_link_color', '#FFF');
        $h1_color = get_theme_mod('rl_heading_h1_color', '#222');
        $h2_color = get_theme_mod('rl_heading_h2_color', '#222');
        $h3_color = get_theme_mod('rl_heading_h3_color', '#222');
        $h4_color = get_theme_mod('rl_heading_h4_color', '#222');
        $h5_color = get_theme_mod('rl_heading_h5_color', '#222');
        $h6_color = get_theme_mod('rl_heading_h6_color', '#222');
        $p_color = get_theme_mod('rl_heading_p_color', '#222');
        $link_color = get_theme_mod('rl_link_color', '#111');
        $link_color_hover = get_theme_mod('rl_link_color_hover', '#BBB');
        $footer_bg_color = get_theme_mod('rl_footer_bg_color', '#FFF');
        $footer_title_color = get_theme_mod('rl_footer_heading_color', '#222');
        $footer_link_color = get_theme_mod('rl_footer_link_color', '#222');
        $footer_paragraph_color = get_theme_mod('rl_footer_p_color', '#222');

        /* Header Style */
        $_header_bg_color = sprintf("body.mt-colors header.site-header { background-color: %s; }", esc_attr($header_bg_color)) . "\n";

        /* Logo Style */
        $_logo_color = sprintf("body.mt-colors .site-header .site-branding a{ color: %s; }", esc_attr($logo_color)) . "\n";

        /* Headings */
        $_h1_color = sprintf("body.mt-colors h1 { color: %s; }", esc_attr( $h1_color ) ) . "\n";
        $_h2_color = sprintf("body.mt-colors h2 { color: %s; }", esc_attr( $h2_color) ) . "\n";
        $_h3_color = sprintf("body.mt-colors h3 { color: %s; }", esc_attr( $h3_color ) ) . "\n";
        $_h4_color = sprintf("body.mt-colors h4 { color: %s; }", esc_attr( $h4_color ) ) . "\n";
        $_h5_color = sprintf("body.mt-colors h5 { color: %s; }", esc_attr( $h5_color ) ) . "\n";
        $_h6_color = sprintf("body.mt-colors h6 { color: %s; }", esc_attr( $h6_color ) ) . "\n";
        $_p_color = sprintf("body.mt-colors p { color: %s; }", esc_attr( $p_color ) ) . "\n";

        /* Link Style */
        $_a_style = sprintf("body.mt-colors a { color: %s; }", esc_attr( $link_color ) ) . "\n";
        $_a_style .= sprintf("body.mt-colors #rl-main-menu > ul > li > a { color : %s; }", esc_attr( $header_menu_link_color ) ) . "\n";
        $_a_hover_style = sprintf("body.mt-colors #rl-main-menu > ul > li > a:hover, body.mt-colors a:hover { color: %s; } ", esc_attr( $link_color_hover ) ) . "\n";

        /* Footer Style */
        $_footer_style = sprintf("body.mt-colors #footer { background-color: %s; }", esc_attr( $footer_bg_color ) ) . "\n";
        $_footer_style .= sprintf("body.mt-colors #footer .widgettitle { color: %s }", esc_attr( $footer_title_color ) ) . "\n";
        $_footer_style .= sprintf("body.mt-colors #footer a { color: %s ;}", esc_attr( $footer_link_color) ) . "\n";
        $_footer_style .= sprintf("body.mt-colors #footer p {color: %s; } ", esc_attr( $footer_paragraph_color) ) . "\n";

        $style = join('', array(
                $_header_bg_color,
                $_logo_color,
                $_h1_color,
                $_h2_color,
                $_h3_color,
                $_h4_color,
                $_h5_color,
                $_h6_color,
                $_p_color,
                $_a_style,
                $_a_hover_style,
                $_footer_style
            )
        );


        // Output the styles.
        if ($style) {
            echo '<!-- Custom Color Styles -->' . "\n";
            echo "\n" . '<style type="text/css" id="mt-colors">' . $style . '</style>' . "\n";
            echo '<!-- END -->';

            # Add custom body class for more CSS weight
            add_filter('body_class', array($this, 'output_body_class') );
        }


    }


        /**
         * Add custom body class to give some more weight to our styles.
         *
         * @since  1.0.0
         * @access public
         * @param  array $classes
         * @return array
         */
        function output_body_class($classes)
        {
            return array_merge($classes, array('mt-colors'));
        }
    }
}