<?php


if ( ! function_exists( 'riba_lite_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Riba Lite 1.0.0
	 */
	function riba_lite_theme_setup() {

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
        require get_template_directory() . '/inc/components/preloader/class.mt-preloader-output.php';

        // Functionality
		require get_template_directory() . '/inc/components/contact-bar/class.mt-contact-bar.php';
 		require get_template_directory() . '/inc/components/pagination/class.mt-pagination.php';
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
         * Riba Lite Plugin dependencies
         *
         * @since Riba Lite 1.0.3
         */
        require get_template_directory() . '/inc/plugin-activation.php';


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
		add_editor_style( array( 'layout/css/editor-style.min.css', riba_lite_fonts_url() ) );

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
			'default-color' => 'f2f2f2',
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


	} // function riba_lite_theme_setup
	add_action( 'after_setup_theme', 'riba_lite_theme_setup', 9 );
} // function exists (riba_lite_theme_setup) check


if( !function_exists( 'riba_lite_enqueue_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 *
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
	 *
	 * Riba Lite 1.0.0
	 */

	function riba_lite_enqueue_scripts() {


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


		$enable_smooth_scroll = get_theme_mod('riba_lite_enable_site_smoothscroll', 1);
        $enable_site_preloader = get_theme_mod('riba_lite_enable_site_preloader', 1);
        $enable_headroom = get_theme_mod('riba_lite_enable_site_headroom', 1);
        $enable_lazyload = get_theme_mod('riba_lite_enable_site_lazyload', 1);


        // make sure we don't load our preloader script in the customizer
        global $wp_customize;

        if( !isset($wp_customize) && $enable_site_preloader == 1) {
            wp_enqueue_script( 'pace-loader-min-js' );
            wp_enqueue_script( 'preloader-js' );

        } else {
            function riba_lite_output_css_to_head() {

                echo '<!-- Customizer CSS Fixes-->'."\n";
                echo '<style>';
	            echo 'body .site-header {top: 42px; }'."\n";
                echo 'body .site-header.headroom--pinned.headroom--top {top : 42px !important; max-width: 1545px; }'."\n";
                echo 'body .site-header.headroom--unpinned.headroom--not-top {top: 90px !important; }' ."\n";
	            echo 'body .site-header.headroom--not-top.headroom--pinned { top: 0 !important; }' ."\n";
                echo '#page {padding-top: 0 !important; }'."\n";
                echo '</style>';
            }

            add_action( 'wp_head', 'riba_lite_output_css_to_head' );
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
		wp_enqueue_style( 'rl-main-style', get_stylesheet_uri() );

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

	add_action( 'wp_enqueue_scripts', 'riba_lite_enqueue_scripts' );

} // function exists (riba_lite_enqueue_scripts) check


if( !function_exists( 'riba_lite_comment_reply_js' ) ) {
	/**
	 * Function that only loads the comment-reply JS script on pages that have the comment form enabled
	 *
	 * Given that we have a one page website, is_singular() will return true for pages as well (that means it gets loaded on the homepage for nothing)
	 *
	 * Riba Lite 1.0.0
	 */
	function riba_lite_comment_reply_js()
	{

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	add_action( 'comment_form_before', 'riba_lite_comment_reply_js' );
}



if ( ! function_exists( 'riba_lite_fonts_url' ) ) {
	/**
	 * Register Google fonts for Riba Lite.
	 *
	 * Riba Lite 1.16
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function riba_lite_fonts_url()
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

if( !function_exists( 'riba_lite_print_layout_styles' ) ) {
	/**
	 * Simple function to switch CSS for boxed / fluid layouts
	 */
	function riba_lite_print_layout_styles() {

		$layout = get_theme_mod('riba_lite_site_layout', 'boxed');

		// Output the styles.
		if ( $layout == 'boxed' ) {
			echo '<!-- Custom Layout Styles -->'."\n";
			echo "\n" . '<style type="text/css" id="rl-layout"> body .container-fluid {max-width: 1170px; } body .container {width: auto !important; } body .site-header {width: 1170px; max-width: 100% !important;} </style>' . "\n";
			echo '<!-- END -->';

			# Add custom body class for more CSS weight
			add_filter( 'body_class', 'riba_lite_layout_body_class' );

		}
	}

	# Add custom styles to `<head>`.
	add_action( 'wp_head', 'riba_lite_print_layout_styles', 2);
}

if( !function_exists( 'riba_lite_layout_body_class' ) ) {
	/**
	 * Add custom body class to give some more weight to our styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $classes
	 * @return array
	 */
	function riba_lite_layout_body_class($classes)
	{
		return array_merge($classes, array('rl-layout'));
	}
}


if( !function_exists('riba_lite_register_required_plugins') ) {
    /**
     * Custom function to load TGMPA
     *
     * @since Riba Lite 1.0.3
     */
    function riba_lite_register_required_plugins()
    {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // Login Customizer
            array(
                'name' => 'Custom Login Page Customizer', // The plugin name.
                'slug' => 'login-customizer', // The plugin slug (typically the folder name).
                'source' => '', // The plugin source.
                'required' => false, // If false, the plugin is only 'recommended' instead of required.
                'version' => '1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            )

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
            'menu'        => 'mt-install-plugins', // Menu slug.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => true,                      // If 'dismissable' is false, this message will be output at top of nag.
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

    add_action( 'tgmpa_register', 'riba_lite_register_required_plugins' );
}

#
# More Themes Functionality
#


if( !function_exists( 'riba_lite_more_themes_styles' ) ) {
    /**
     *
     */
    function riba_lite_more_themes_styles() {
        wp_enqueue_style('riba-lite-more-theme-style', get_template_directory_uri() . '/layout/css/more-themes.min.css');
    }
}

# Add upsell page to the menu.
if( !function_exists( 'riba_lite_add_upsell' ) ) {
    /**
     *
     */
    function riba_lite_lite_add_upsell() {

        $page = add_theme_page(
            __( 'More Themes', 'riba-lite' ),
            __( 'More Themes', 'riba-lite' ),
            'administrator',
            'macho-themes',
            'riba_lite_display_upsell'
        );

        add_action( 'admin_print_styles-' . $page, 'riba_lite_more_themes_styles' );
    }

    add_action( 'admin_menu', 'riba_lite_lite_add_upsell', 11 );
}


# Define markup for the upsell page.
if( !function_exists( 'riba_lite_display_upsell' ) ) {
    function riba_lite_display_upsell() {

        // Set template directory uri
        $directory_uri = get_template_directory_uri();
        ?>
        <div class="wrap">
            <div class="container-fluid">
                <div id="upsell_container">
                    <div class="row">
                        <div id="upsell_header" class="col-md-12">

                            <a href="http://www.machothemes.com/" target="_blank">
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/layout/images/upsell/macho-themes-logo.png"/>
                            </a>



                            <h3><?php echo __( 'Simple. Powerful. Flexible. That\'s how we at', 'riba-lite'). sprintf('<a href="%s" target=="_blank" rel="nofollow">', 'http://www.machothemes.com'). __(' Macho Themes', 'riba-lite'). '</a>'. __(' build all of our themes.', 'riba-lite' ); ?></h3>

                        </div>
                    </div>
                    <div id="upsell_themes" class="row">
                        <?php

                        // Set the argument array with author name.
                        $args = array(
                            'author' => 'cristianraiber-1',
                        );

                        // Set the $request array.
                        $request = array(
                            'body' => array(
                                'action'  => 'query_themes',
                                'request' => serialize( (object) $args )
                            )
                        );

                        $themes       = riba_lite_get_themes( $request );
                        $active_theme = wp_get_theme()->get( 'Name' );
                        $counter      = 1;

                        // For currently active theme.
                        foreach ( $themes->themes as $theme ) {
                            if ( $active_theme == $theme->name ) { ?>

                                <div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
                                    <div class="image-container">
                                        <img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

                                        <div class="theme-description">
                                            <p><?php echo $theme->description; ?></p>
                                        </div>
                                    </div>
                                    <div class="theme-details active">
											<span
                                                class="theme-name"><?php echo $theme->name . ':' . __( ' Current theme', 'riba-lite' ); ?></span>
                                        <a class="button button-secondary customize right" target="_blank"
                                           href="<?php echo get_site_url() . '/wp-admin/customize.php' ?>"><?php _e('Customize', 'riba-lite'); ?></a>
                                    </div>
                                </div>

                                <?php
                                $counter ++;
                                break;
                            }
                        }

                        // For all other themes.
                        foreach ( $themes->themes as $theme ) {
                            if ( $active_theme != $theme->name ) {

                                // Set the argument array with author name.
                                $args = array(
                                    'slug' => $theme->slug,
                                );

                                // Set the $request array.
                                $request = array(
                                    'body' => array(
                                        'action'  => 'theme_information',
                                        'request' => serialize( (object) $args )
                                    )
                                );

                                $theme_details = riba_lite_get_themes( $request );
                                ?>

                                <div id="<?php echo $theme->slug; ?>"
                                     class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-margin' : ""; ?>">
                                    <div class="image-container">
                                        <img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

                                        <div class="theme-description">
                                            <p><?php echo $theme->description; ?></p>
                                        </div>
                                    </div>
                                    <div class="theme-details">
                                        <span class="theme-name"><?php echo $theme->name; ?></span>

                                        <!-- Check if the theme is installed -->
                                        <?php if ( wp_get_theme( $theme->slug )->exists() ) { ?>



                                            <!-- Activate Button -->
                                            <a class="button button-primary activate right"
                                               href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug ); ?>"><?php _e('Activate', 'riba-lite'); ?></a>
                                        <?php } else {

                                            // Set the install url for the theme.
                                            $install_url = add_query_arg( array(
                                                'action' => 'install-theme',
                                                'theme'  => $theme->slug,
                                            ), self_admin_url( 'update.php' ) );
                                            ?>
                                            <!-- Install Button -->
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>"
                                               class="button button-primary install right"
                                               href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>"><?php _e( 'Install Now', 'riba-lite' ); ?></a>
                                        <?php } ?>

                                        <!-- Preview button -->
                                        <a class="button button-secondary preview right" target="_blank"
                                           href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'riba-lite' ); ?></a>
                                    </div>
                                </div>
                                <?php
                                $counter ++;
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>


        <?php
    }
}

# Get all Macho Themes themes by using WP API.
if( !function_exists( 'riba_lite_get_themes' ) ) {
    function riba_lite_get_themes( $request ) {

        // Generate a cache key that would hold the response for this request:
        $key = 'riba-lite_' . md5( serialize( $request ) );

        // Check transient. If it's there - use that, if not re fetch the theme
        if ( false === ( $themes = get_transient( $key ) ) ) {

            // Transient expired/does not exist. Send request to the API.
            $response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

            // Check for the error.
            if ( ! is_wp_error( $response ) ) {

                $themes = unserialize( wp_remote_retrieve_body( $response ) );


                if ( ! is_object( $themes ) && ! is_array( $themes ) ) {

                    // Response body does not contain an object/array
                    return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
                }

                // Set transient for next time... keep it for 24 hours should be good
                set_transient( $key, $themes, 60 * 60 * 24 );
            } else {
                // Error object returned
                return $response;
            }
        }

        return $themes;
    }
}