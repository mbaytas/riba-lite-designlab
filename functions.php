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
         * Muscle Core Lite :: Components
         */

        // Design
        require get_template_directory() . '/inc/components/colors/class.mt-colors-output.php';
        require get_template_directory() . '/inc/components/typography/class.mt-typography-output.php';
        require get_template_directory() . '/inc/components/preloader/class.mt-preloader-output.php';

        // Functionality
        require get_template_directory() . '/inc/components/nav-walker/class.mt-nav-walker.php';
        require get_template_directory() . '/inc/components/breadcrumbs/class.mt-breadcrumbs.php';
        require get_template_directory() . '/inc/components/entry-meta/class.mt-entry-meta.php';
        require get_template_directory() . '/inc/components/social-sharing/class.mt-social-sharing.php';
        require get_template_directory() . '/inc/components/related-posts/class.mt-related-posts.php';
        require get_template_directory() . '/inc/components/author-box/class.mt-author-box.php';


        /**
		 * Riba Lite only works in WordPress 4.1 or later.
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
         * Bundled Widgets
         */
        require get_template_directory() . '/widgets/widget-about-sm.php';
        require get_template_directory() . '/widgets/widget-social-icons.php';
        require get_template_directory() . '/widgets/widget-latest-posts.php';


		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on machoframe, use a find and replace
         * to change 'riba-lite' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'riba-lite', get_template_directory() . '/languages/' );

        /*
         * Add post formats
         */
        add_theme_support( 'post-formats', array( 'image', 'video', 'quote', 'aside') );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
		add_editor_style( array( 'layout/css/editor-style.min.css', rl_fonts_url() ) );

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

		// Scripts JS
		wp_register_script ( 'riba-lite-scripts-js', get_template_directory_uri() . '/layout/js/scripts.min.js', array(), '1.0', true );

		// Preloader JS
		wp_register_script( 'preloader-js', get_template_directory_uri() . '/layout/js/preloader.min.js', array('pace-loader-min-js'), '1.0', true );

		// Plugins JS
		wp_register_script( 'riba-lite-plugins-js', get_template_directory_uri() . '/layout/js/plugins.js', array('jquery', 'preloader-js', 'lazy-load-min-js', 'owlCarousel-min-js', 'headroom-jquery-min-js'), '1.0', true );

        // Menu JS
        //if( !wp_is_mobile() ) {
            wp_register_script('navigation-js', get_template_directory_uri() . '/layout/js/navigation/navigation.js', array('jquery'), '1.0', true);
        //}

		/*
		*	Enqueue scripts
		*/


		$enable_smooth_scroll = get_theme_mod('rl_enable_site_smoothscroll', 1);
        $enable_site_preloader = get_theme_mod('rl_enable_site_preloader', 1);
		$enable_mbytplayer = get_theme_mod('rl_enable_site_mbytplayer', 1);
        $enable_headroom = get_theme_mod('rl_enable_site_headroom', 1);
        $enable_lazyload = get_theme_mod('rl_enable_site_lazyload', 1);


        // make sure we don't load our preloader script in the customizer
        global $wp_customize;

        if( !isset($wp_customize) && $enable_site_preloader == 1) {
            wp_enqueue_script( 'pace-loader-min-js' );
            wp_enqueue_script( 'preloader-js' );

        } else {
            function rl_output_css_to_head() {

                echo '<!-- Customizer CSS Fixes-->'."\n";
                echo '<style>';
                echo '.site-header {top : 0 !important; max-width: 1545px; }'."\n";
                echo '#page {padding-top: 0 !important; }'."\n";
                echo '</style>';
            }

            add_action( 'wp_head', 'rl_output_css_to_head' );
        }

		wp_enqueue_script( 'bootstrap-min-js' );
        wp_enqueue_script( 'owlCarousel-min-js' );
		wp_enqueue_script( 'simple-placeholder-js' );

        if( $enable_smooth_scroll == 1 ) {
            wp_enqueue_script( 'smooth-scroll-min-js' );
        }

        if( $enable_lazyload == 1 ) {
            wp_enqueue_script( 'lazy-load-min-js' );
        }

        if( $enable_mbytplayer == 1 ) {
            wp_enqueue_script( 'mb-ytplayer-min-js' );
        }

        if( $enable_headroom == 1 ) {
            wp_enqueue_script( 'headroom-min-js' );
            wp_enqueue_script( 'headroom-jquery-min-js' );
        }



        // Script below SHOULD only loads on mobile devices
        //if( !wp_is_mobile() ) {
            wp_enqueue_script('riba-lite-navigation-js');
        //}

        wp_enqueue_script( 'riba-lite-scripts-js' );
        wp_enqueue_script( 'riba-lite-plugins-js' );
        wp_enqueue_script( 'navigation-js' );

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

        // Google Fonts StyleSheet
        wp_enqueue_style( 'ga-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Domine:400|Lato:300,700' );

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


if( !function_exists( 'rl_print_layout_styles' ) ) {
    /**
     * Simple function to switch CSS for boxed / fluid layouts
     */
    function rl_print_layout_styles() {

        $layout = get_theme_mod('rl_site_layout', 'boxed');

        // Output the styles.
        if ( $layout == 'boxed' ) {
            echo '<!-- Custom Layout Styles -->'."\n";
            echo "\n" . '<style type="text/css" id="rl-layout"> body .container-fluid {max-width: 1170px; } body .container {width: auto !important; } body .site-header {width: 1170px; max-width: 100% !important;} </style>' . "\n";
            echo '<!-- END -->';

            # Add custom body class for more CSS weight
            add_filter( 'body_class', 'rl_layout_body_class' );

        }
    }

    # Add custom styles to `<head>`.
    add_action( 'wp_head', 'rl_print_layout_styles', 2);
}

if( !function_exists( 'rl_layout_body_class' ) ) {
    /**
     * Add custom body class to give some more weight to our styles.
     *
     * @since  1.0.0
     * @access public
     * @param  array $classes
     * @return array
     */
    function rl_layout_body_class($classes)
    {
        return array_merge($classes, array('rl-layout'));
    }
}

