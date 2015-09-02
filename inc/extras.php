<?php

if( !function_exists( 'rl_body_classes' ) ) {
    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */

    function rl_body_classes($classes)
    {

        // Adds a class of group-blog to blogs with more than 1 published author.

        if (is_multi_author()) {
            $classes[] = 'group-blog';
        }

        return $classes;

    }

    add_filter('body_class', 'rl_body_classes');
}

if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) ) {
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function rl_wp_title($title, $sep)
    {
        if (is_feed()) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name.
        $title .= get_bloginfo('name', 'display');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }

        // Add a page number if necessary.
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(esc_html__('Page %s', 'riba-lite'), max($paged, $page));
        }

        return $title;
    }

    add_filter('wp_title', 'rl_wp_title', 10, 2);

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     */
    function rl_render_title()
    {
        ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
        <?php
    }

    add_action('wp_head', 'rl_render_title');
}

if( !function_exists( 'rl_setup_author' ) ) {
    /**
     * Sets the authordata global when viewing an author archive.
     *
     * This provides backwards compatibility with
     * http://core.trac.wordpress.org/changeset/25574
     *
     * It removes the need to call the_post() and rewind_posts() in an author
     * template to print information about the author.
     *
     * @global WP_Query $wp_query WordPress Query object.
     * @return void
     */

    function rl_setup_author()
    {

        global $wp_query;

        if ($wp_query->is_author() && isset($wp_query->post)) {
            $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);

        }

    }

    add_action('wp', 'rl_setup_author');
}


// Function to convert hex color codes to rgba
if( !function_exists( 'rl_hex2rgba' ) ) {
    /**
     * Convers HEX color codes to RGBA
     *
     * @param $color
     * @param bool|false $opacity
     * @return string
     */
    function rl_hex2rgba($color, $opacity = false)
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
}




if( !function_exists( 'rl_get_first_video_from_post') ) {
    /**
     * Function to fetch only URL of embedded video
     *
     * @param $post_id
     * @return bool
     */
    function rl_get_first_video_from_post($post_id) {

        $post = get_post($post_id);
        $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
        $embeds = get_media_embedded_in_content( $content );

        if( !empty($embeds) ) {
            //check what is the first embed containg video tag, youtube or vimeo
            foreach( $embeds as $embed ) {

                if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) ) {

                    return rl_get_video_id_from_iframe( $embed );
                }
            }

        } else {
            //No video embedded found
            return false;
        }

    }
}

if( !function_exists( 'rl_get_video_id_from_iframe' ) ) {
    /**
     * Simple function to get video URL from <iframe></iframe>
     *
     * @param $input
     * @return array
     */
    function rl_get_video_id_from_iframe( $input ) {

        $pattern = '/(youtu.be\/|youtube.com\/(watch\?(.*&)?v=|(embed|v)\/))([^\?&\"\'>]+)/';

        $result = preg_match($pattern, $input, $matches);

        if (false !== (bool)$result) {
            return $matches[5];
        }

        return false;


    }
}

if( !function_exists( 'rl_fix_responsive_videos' ) ) {
    /**
     * Makes Embeddable videos to become responsive, cool eh ?
     *
     * @param $html
     * @return string
     */
function rl_fix_responsive_videos($html) {


    return '<div class="rl-video-container">' . $html . '</div>';
}

    add_filter('embed_oembed_html', 'rl_fix_responsive_videos', 10, 3);
    add_filter('video_embed_html', 'rl_fix_responsive_videos'); // Jetpack
}



if( ! function_exists( 'rl_breadcrumbs' ) ) {
    /**
     * Render the breadcrumbs with help of class-breadcrumbs.php
     *
     * @return void
     */
    function rl_breadcrumbs() {
        $breadcrumbs = new Riba_Breadcrumbs();
        $breadcrumbs->get_breadcrumbs();
    }
}

if( !function_exists( 'rl_prefix_upsell_notice' ) ) {
    /**
     * Display upgrade notice on customizer page
     *
     * @since Riba Lite 1.0.3
     */
    function rl_prefix_upsell_notice()
    {

        // Enqueue the script
        wp_enqueue_script(
            'riba-lite-customizer-upsell',
            get_template_directory_uri() . '/inc/customizer/assets/js/upsell/upsell.js',
            array(), '1.0.0',
            true
        );

        // Localize the script
        wp_localize_script(
            'riba-lite-customizer-upsell',
            'prefixL10n',
            array(
                'prefixURL' => esc_url('https://www.machothemes.com/?edd_action=add_to_cart&download_id=13&discount=DEMO10'),
                'prefixLabel' => esc_html__('Buy PRO', 'pixova-lite'),
                'prefixImageURL' => esc_url( get_template_directory_uri() . '/layout/images/upsell/placeholdit-300x100.png')
            )
        );

    }

    add_action('customize_controls_enqueue_scripts', 'rl_prefix_upsell_notice');
}