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
        add_theme_support( 'post-formats', array( 'image') );

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
		add_image_size('riba-lite-2x', 1200, 900, true);
		add_image_size('riba-lite-1x', 600, 450, true);


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
		wp_register_script('riba-lite-skip-link-focus-js', get_template_directory_uri() . '/layout/js/skiplinkfocus/skiplinkfocus.min.js', array('jquery'), '1.0', true);

		/* END WordPress scripts */

		// Bootstrap JS (required for theme)
		wp_register_script( 'bootstrap-min-js' , get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array('jquery'), '3.3.4', true);

        // owlCarousel main JS
        wp_register_script( 'owlCarousel-min-js', get_template_directory_uri() .'/layout/js/owl-carousel/owl-carousel.min.js', array('jquery'), '1.3.3', true);

		// Pace Loader
		wp_register_script( 'pace-loader-min-js', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array('jquery'), '2.0', true );

        // Headroom JS
        wp_register_script( 'headroom-min-js', get_template_directory_uri() . '/layout/js/headroom/headroom.min.js', array('jquery'), '0.7', true );

        // Headroom jQuery JS
        wp_register_script('headroom-jquery-min-js', get_template_directory_uri() . '/layout/js/headroom/headroom-jquery.min.js', array('jquery', 'headroom-min-js'), '0.7', true);

		// Smooth Scroll JS
		wp_register_script ( 'smooth-scroll-js', get_template_directory_uri() . '/layout/js/smoothscroll/smoothscroll.min.js', array('jquery'), '0.9.9', true);

		// Simple Placeholders JS
		wp_register_script( 'simple-placeholder-js', get_template_directory_uri() . '/layout/js/simpleplaceholder/simplePlaceholder.min.js', array('jquery'), '1.0.0', true );

        // Parallax JS
        wp_register_script( ' parallax-js ', get_template_directory_uri() . '/layout/js/parallax.min.js', array('jquery'), '1.3.1', true );

		// Scripts JS
		wp_register_script ( 'riba-lite-scripts-js', get_template_directory_uri() . '/layout/js/scripts.min.js', array(), '1.0', true );

		// Preloader JS
		wp_register_script( 'riba-lite-preloader-js', get_template_directory_uri() . '/layout/js/preloader.min.js', array('pace-loader-min-js'), '1.0', true );

		// Plugins JS
		wp_register_script( 'riba-lite-plugins-js', get_template_directory_uri() . '/layout/js/plugins.js', array('riba-lite-scripts-js', 'simple-placeholder-js'), '1.0', true );




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
		wp_enqueue_script( 'smooth-scroll-js' );
		wp_enqueue_script( 'riba-lite-scripts-js' );
		wp_enqueue_script( 'riba-lite-plugins-js' );
		wp_enqueue_script( 'riba-lite-navigation-js' );


		/**
		 *
		 * Stylesheets below
		 *
		 */

		// General theme Stylesheet
		wp_enqueue_style( 'riba-min-style', get_stylesheet_uri() );

        // BS3 Components
        wp_enqueue_style( 'bootstrap-components', get_template_directory_uri() .'/layout/css/bootstrap-components.min.css' );

		// Font Awesome Stylesheet
		wp_enqueue_style ( 'font-awesome-min-css', get_template_directory_uri() . '/layout/css/font-awesome.min.css');

		// Google Fonts StyleSheet
		wp_enqueue_style( 'ga-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Roboto+Slab:300,400|Lato:700' );

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


if( !function_exists('rl_register_required_plugins') ) {
	/**
	 * Custom function to load TGMPA
	 *
	 * Riba Lite 1.0.0
	 */
	function rl_register_required_plugins()
	{

		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(

			// This is an example of how to include a plugin pre-packaged with a theme.
			array(
				'name' => 'Contact Form 7', // The plugin name.
				'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
				'source' => '', // The plugin source.
				'required' => false, // If false, the plugin is only 'recommended' instead of required.
				'version' => '4.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url' => '', // If set, overrides default API URL and points to an external URL.
			),
		);

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu' => 'mt-install-plugins', // Menu slug.
			'has_notices' => true,                    // Show admin notices or not.
			'dismissable' => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message' => '',                      // Message to output right before the plugins table.
			'strings' => array(
				'page_title' => __('Install Required Plugins', 'riba-lite'),
				'menu_title' => __('Install Plugins', 'riba-lite'),
				'installing' => __('Installing Plugin: %s', 'riba-lite'), // %s = plugin name.
				'oops' => __('Something went wrong with the plugin API.', 'riba-lite'),
				'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'riba-lite'), // %1$s = plugin name(s).
				'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'riba-lite'), // %1$s = plugin name(s).
				'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'riba-lite'),
				'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'riba-lite'),
				'return' => __('Return to Required Plugins Installer', 'riba-lite'),
				'plugin_activated' => __('Plugin activated successfully.', 'riba-lite'),
				'complete' => __('All plugins installed and activated successfully. %s', 'riba-lite'), // %s = dashboard link.
				'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);

		tgmpa($plugins, $config);
	}

	add_action( 'tgmpa_register', 'rl_register_required_plugins' );
}



// Fallback nav menu
if( !function_exists('rl_fallback_cb') ) {
	/**
	 * Nav menu fallback function
	 *
	 * Riba Lite 1.11
	 *
	 */

	function rl_fallback_cb()
	{

		$html = '<ul id="menu-riba-lite-main-menu-container mt-default-menu">';
		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#about" title="' . __('About', 'riba-lite') . '">';
		$html .= __('About', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#works" title="' . __('Recent Works', 'riba-lite') . '">';
		$html .= __('Recent Works', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#testimonials" title="' . __('Testimonials', 'riba-lite') . '">';
		$html .= __('Testimonials', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#team" title="' . __('Team', 'riba-lite') . '">';
		$html .= __('Team', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#news" title="' . __('News', 'riba-lite') . '">';
		$html .= __('News', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/#contact" title="' . __('Contact', 'riba-lite') . '">';
		$html .= __('Contact', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';


		$html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
		$html .= '<a href="' . get_site_url() . '/shop/" title="' . __('Shop', 'riba-lite') . '">';
		$html .= __('Shop', 'riba-lite');
		$html .= '</a>';
		$html .= '</li>';

		$html .= '</ul>';

		echo $html;
	}
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
	 * Riba Lite 1.16
	 */
	function rl_javascript_detection()
	{
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}

	add_action('wp_head', 'rl_javascript_detection', 0);
}



if ( !function_exists( 'rl_pagination' ) ) {
	/**
	 * Custom pagination function
	 *
	 * Riba Lite 1.09
	 */

	function rl_pagination() {

		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			) );
		}
	}
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