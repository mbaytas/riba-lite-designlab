<?php


if ( ! function_exists( 'rl_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Riba Lite 1.0.0
	 */
	function rl_theme_setup() {

		/*
        * Using this feature you can set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
        * @see http://codex.wordpress.org/Content_Width
        */
		if ( ! isset( $content_width ) ) {
			$content_width = 1140;
		}

		/**
		 * Pixova Lite only works in WordPress 4.1 or later.
		 */
		if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
			require get_template_directory() . '/inc/back-compat.php';
		}

		/**
		 * Jetpack support
		 */
		require get_template_directory() . '/inc/jetpack.php';

		/**
		 * Custom functions that act independently of the theme templates.
		 */

		require get_template_directory() . '/inc/extras.php';
        require get_template_directory() . '/inc/template-tags.php';


		/**
		 * Customizer additions.
		 */
        require get_template_directory() . '/inc/customizer/customizer.php';


        /**
         * Sidebars
         */
        require get_template_directory() . '/sidebars/sidebars.php';

        /**
         * Widgets
         */

        require get_template_directory() . '/widgets/widget-about-sm.php';
        require get_template_directory() . '/widgets/widget-social-icons.php';
        require get_template_directory() . '/widgets/widget-latest-posts.php';

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on machoframe, use a find and replace
         * to change 'qck' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'riba-lite', get_template_directory() . '/languages/' );

        /*
         * Add post formats
         */
        add_theme_support( 'post-formats', array( 'image', 'video') );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
		add_editor_style( array( 'layout/css/editor-style.min.css', 'layout/css/font-awesome.min.css', rl_fonts_url() ) );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
		add_theme_support( 'post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'   => __( 'Header Menu', 'riba-lite' ),
            'secondary' => __( 'Footer Menu', 'riba-lite' )
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
         * Add image sizes
         * @link http://codex.wordpress.org/Function_Reference/add_image_size
         */
		add_image_size( 'riba-lite-2x', 1200, 900, true );
		add_image_size( 'riba-lite-1x', 600, 450, true );


	} // function rl_theme_setup
	add_action( 'after_setup_theme', 'rl_theme_setup', 9 );
} // function exists (riba_lite_theme_setup) check


if( !function_exists( 'rl_enqueue_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 *
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
	 *
	 * Riba Lite 1.0.0
	 */

	function rl_enqueue_scripts() {

		/* WordPress _s default JS scripts that this theme is reusing */

		    // Navigation JS
            wp_register_script( 'riba-lite-navigation-js', get_template_directory_uri() . '/layout/js/navigation/navigation.min.js', array('jquery'), '1.0', true);

            // Skip Link Focus JS
            wp_register_script( 'riba-lite-skip-link-focus-js', get_template_directory_uri() . '/layout/js/skiplinkfocus/skiplinkfocus.min.js', array('jquery'), '1.0', true);

		/* END WordPress scripts */



		// Bootstrap JS (required for theme)
		wp_register_script( 'bootstrap-min-js' , get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array('jquery'), '3.3.4', true);

        // owlCarousel main JS
        wp_register_script( 'owlCarousel-min-js', get_template_directory_uri() .'/layout/js/owl-carousel/owl-carousel.min.js', array('jquery'), '1.3.3', true);

		// Pace Loader
		wp_register_script( 'pace-loader-min-js', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array('jquery'), '2.0', true );

        // Lazy Loader for images
        wp_register_script( 'lazy-load-min-js', get_template_directory_uri() . '/layout/js/lazyLoad/lazyLoad.min.js', array('jquery'), '1.9.5', true );

        // Headroom JS
        wp_register_script( 'headroom-min-js', get_template_directory_uri() . '/layout/js/headroom/headroom.min.js', array('jquery'), '0.7', true );

        // Headroom jQuery JS
        wp_register_script('headroom-jquery-min-js', get_template_directory_uri() . '/layout/js/headroom/headroom-jquery.min.js', array('jquery', 'headroom-min-js'), '0.7', true);

		// Smooth Scroll JS
		wp_register_script ( 'smooth-scroll-min-js', get_template_directory_uri() . '/layout/js/smoothscroll/smoothscroll.min.js', array('jquery'), '0.9.9', true);

		// Simple Placeholders JS
		wp_register_script( 'simple-placeholder-js', get_template_directory_uri() . '/layout/js/simpleplaceholder/simplePlaceholder.min.js', array('jquery'), '1.0.0', true );

		// YT Player JS
		wp_register_script( 'mb-ytplayer-min-js', get_template_directory_uri() . '/layout/js/ytplayer/mb-ytplayer.min.js', array('jquery'), '2.9.4', true );

        // Parallax JS
        wp_register_script( ' parallax-js ', get_template_directory_uri() . '/layout/js/parallax.min.js', array('jquery'), '1.3.1', true );

		// Scripts JS
		wp_register_script ( 'riba-lite-scripts-js', get_template_directory_uri() . '/layout/js/scripts.min.js', array(), '1.0', true );

		// Preloader JS
		wp_register_script( 'riba-lite-preloader-js', get_template_directory_uri() . '/layout/js/preloader.min.js', array('pace-loader-min-js'), '1.0', true );

		// Plugins JS
		wp_register_script( 'riba-lite-plugins-js', get_template_directory_uri() . '/layout/js/plugins.js', array('lazy-load-min-js', 'mb-ytplayer-min-js', 'simple-placeholder-js', 'owlCarousel-min-js'), '1.0', true );


		/*
		*	Enqueue scripts
		*/


		// make sure we don't load our preloader script in the customizer
		global $wp_customize;

		if( !isset($wp_customize) ) {
			wp_enqueue_script( 'pace-loader-min-js' );
			wp_enqueue_script( 'riba-lite-preloader-js' );
            wp_enqueue_script( 'headroom-min-js' );
            wp_enqueue_script( 'headroom-jquery-min-js' );
		} else {
			function rl_output_css_to_head() {

				echo '<style>';
				    echo '#page-loader { display: none !important; }';
					echo '#masthead {position: static !important; }';
					echo '#page {padding-top: 0 !important; }';
				echo '</style>';
			}

			add_action('wp_head', 'rl_output_css_to_head');
		}



		wp_enqueue_script( 'bootstrap-min-js' );
        wp_enqueue_script( 'owlCarousel-min-js' );
		wp_enqueue_script( 'simple-placeholder-js' );
		wp_enqueue_script( 'smooth-scroll-min-js' );
        wp_enqueue_script( 'lazy-load-min-js' );
		wp_enqueue_script( 'riba-lite-scripts-js' );
		wp_enqueue_script( 'riba-lite-plugins-js' );
		wp_enqueue_script( 'riba-lite-navigation-js' );
        wp_enqueue_script( 'mb-ytplayer-min-js' );



		/**
		 *
		 * Stylesheets below
		 *
		 */

		// General theme Stylesheet
		wp_enqueue_style( 'riba-main-style', get_stylesheet_uri() );

        // BS3 Components
        wp_enqueue_style( 'bootstrap-components', get_template_directory_uri() .'/layout/css/bootstrap-components.min.css' );

		// Font Awesome Stylesheet
		wp_enqueue_style ( 'font-awesome-min-css', get_template_directory_uri() . '/layout/css/font-awesome.min.css');


        // owlCarousel Stylesheet
        wp_enqueue_style( 'owlCarousel-main-css', get_template_directory_uri() .'/layout/css/owl-carousel.min.css' );
        wp_enqueue_style( 'owlCarousel-theme-css', get_template_directory_uri() .'/layout/css/owl-theme.min.css' );



	} // function riba_lite_enqueue_scripts end

	add_action( 'wp_enqueue_scripts', 'rl_enqueue_scripts' );

} // function exists (riba_lite_enqueue_scripts) check


if( !function_exists( 'rl_comment_reply_js' ) ) {
	/**
	 * Function that only loads the comment-reply JS script on pages that have the comment form enabled
	 *
	 * Given that we have a one page website, is_singular() will return true for pages as well (that means it gets loaded on the homepage for nothing)
	 *
	 * Riba Lite 1.0.0
	 */
	function rl_comment_reply_js()
	{

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	add_action( 'comment_form_before', 'rl_comment_reply_js' );
}



if ( ! function_exists( 'rl_fonts_url' ) ) {
	/**
	 * Register Google fonts for Twenty Fifteen.
	 *
	 * Riba Lite 1.16
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function rl_fonts_url()
	{
		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		/*
         * Translators: If there are characters in your language that are not supported
         * by Source Sans Pro Sans Serif, translate this to 'off'. Do not translate into your own language.
         */
		if ('off' !== _x('on', 'Montserrat: on or off', 'riba-lite')) {
			$fonts[] = 'Montserrat:400,700';
		}

		/*
         * Translators: If there are characters in your language that are not supported
         * by Souce Sans Pro Sans Serif, translate this to 'off'. Do not translate into your own language.
         */
		if ('off' !== _x('on', 'Montserrat: on or off', 'riba-lite')) {
			$fonts[] = 'Montserrat:400,700';
		}

		/*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'riba-lite' ) ) {
			$fonts[] = 'Inconsolata:400,700';
		}


		/*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
		$subset = _x('no-subset', 'Add new subset (latin-extended, vietnamese)', 'riba-lite');

		if ( 'latin-extended' == $subset ) {
			$subsets .= ',latin,latin-ext';
		}
		else if ('vietnamese' == $subset) {
			$subsets .= ',vietnamese';
		}

		if ($fonts) {
			$fonts_url = add_query_arg(array(
				'family' => urlencode(implode('|', $fonts)),
				'subset' => urlencode($subsets),
			), '//fonts.googleapis.com/css');
		}

		return $fonts_url;
	}
}

if( !function_exists( 'rl_javascript_detection' ) ) {
	/**
	 * JavaScript Detection.
	 *
	 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
	 *
	 * Riba Lite 1.0
	 */
	function rl_javascript_detection()
	{
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}

	add_action('wp_head', 'rl_javascript_detection', 0);
}


if( !function_exists( 'rl_print_layout_styles' ) ) {
    /**
     * Simple function to switch CSS for boxed / fluid layouts
     */
    function rl_print_layout_styles() {

        $layout = get_theme_mod('rl_site_layout', 'full');

        // Output the styles.
        if ( $layout == 'boxed' ) {
            echo '<!-- Custom Layout Styles -->'."\n";
            echo "\n" . '<style type="text/css" id="riba-lite-layout-css"> body {background-color: #111 !important; } body .container-fluid {max-width: 1170px; } body .container {width: auto !important; } body #masthead {width: 1140px; } </style>' . "\n";
            echo '<!-- END -->';
        }
    }

    # Add custom styles to `<head>`.
    add_action( 'wp_head', 'rl_print_layout_styles', 1);
}


if( !function_exists( 'rl_print_font_styles' ) ) {
    /**
     * Add custom body class to give some more weight to our styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    function rl_print_font_styles()
    {

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
            echo "\n" . '<style type="text/css" id="riba-lite-font-css">' . $style . '</style>' . "\n";
            echo '<!-- END -->';

            // Body class filter.
            add_filter('body_class', 'rl_font_body_class');
        }
    }

    # Add custom styles to `<head>`.
    add_action( 'wp_head', 'rl_print_font_styles' );
}

if( !function_exists( 'rl_font_body_class' ) ) {
    /**
     * Add custom body class to give some more weight to our styles.
     *
     * @since  1.0.0
     * @access public
     * @param  array $classes
     * @return array
     */
    function rl_font_body_class($classes)
    {
        return array_merge($classes, array('riba-lite'));
    }
}