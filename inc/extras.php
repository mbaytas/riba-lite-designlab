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

if( !function_exists( 'rl_estimated_reading_time' ) ) {
    /**
     * Function to estimate the reading time of a post, based on the average reading speed of 200 words / minute
     */
    function rl_estimated_reading_time() {

        $post = get_post();

        $words = str_word_count(strip_tags($post->post_content));
        $minutes = floor($words / 200);
      

        if ( $minutes >= 1 ) {
            $estimated_time = $minutes . ' min.';
        } else {
            $estimated_time = sprintf('%s', __('1 min.', 'riba-lite') );
        }

        echo '<span class="riba-lite-estimated-reading-time">'. $estimated_time . __(' read', 'riba-lite'). '</span>';
    }
}
if(!class_exists('RibaLiteMyExtendedMenuWalker') ) {
    /**
     * My extended menu walker
     * Supports separators as "ex_separator" arg to wp_nav_menu call
     */
    class RibaLiteMyExtendedMenuWalker extends Walker_Nav_Menu
    {
        var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

        function start_lvl(&$output, $depth = 0, $args = array())
        {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul>\n";
        }

        function end_lvl(&$output, $depth = 0, $args = array())
        {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {

            global $wp_query;
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            $class_names = $value = '';
            $classes = empty($item->classes) ? array() : (array)$item->classes;

            /* Add active class */
            if (in_array('current-menu-item', $classes)) {
                $classes[] = 'active';
                unset($classes['current-menu-item']);
            }

            /* Check for children */
            $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
            if (!empty($children)) {
                $classes[] = 'has-sub';
            }

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '><span>';
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</span></a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        function end_el(&$output, $item, $depth = 0, $args = array())
        {
            $output .= "</li>\n";
        }

        /**
         * Menu Fallback
         * =============
         * If this function is assigned to the wp_nav_menu's fallback_cb variable
         * and a manu has not been assigned to the theme location in the WordPress
         * menu manager the function with display nothing to a non-logged in user,
         * and will add a link to the WordPress menu manager if logged in as an admin.
         *
         * @param array $args passed from the wp_nav_menu function.
         *
         */
        public static function fallback( $args = array() ) {

            if ( current_user_can( 'manage_options' ) ) {

                extract( $args );

                $fb_output = null;
                if ( $container ) {
                    $fb_output = '<' . $container;
                    if ( $container_id )
                        $fb_output .= ' id="' . $container_id . '"';
                    if ( $container_class )
                        $fb_output .= ' class="' . $container_class . '"';
                    $fb_output .= '>';
                }
                $fb_output .= '<ul';
                if ( $menu_id )
                    $fb_output .= ' id="' . $menu_id . '"';
                if ( $menu_class )
                    $fb_output .= ' class="' . $menu_class . '"';
                $fb_output .= '>';
                $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">'. __('Add a menu', 'riba-lite'). '</a></li>';
                $fb_output .= '</ul>';
                if ( $container )
                    $fb_output .= '</' . $container . '>';
                echo $fb_output;
            }
        }


    }
}

if( !function_exists( 'rl_display_sharingbox_social_links_array' ) ) {
    /**
     * Set up the array for sharing box social networks.
     *
     * @since 3.5.0
     * @return array  The social links array containing the social media and links to them.
     */
    function rl_display_sharingbox_social_links_array()
    {

        /*
         * Build the array
         */
        $social_links_array = array();

        /*
         * Get stored & Set defaults
         */
        $rl_fb =        get_theme_mod('rl_facebook_visibility', 1);
        $rl_twitter =   get_theme_mod('rl_twitter_visibility', 1);
        $rl_linkedin =  get_theme_mod('rl_linkedin_visibility', 1);
        $rl_reddit =    get_theme_mod('rl_reddit_visibility', 1);
        $rl_tumblr =    get_theme_mod('rl_tumblr_visibility', 1);
        $rl_googlep =   get_theme_mod('rl_googlep_visibility', 1);
        $rl_pinterest = get_theme_mod('rl_pinterest_visibility', 1);
        $rl_vk =        get_theme_mod('rl_vk_visibility', 1);
        $rl_mail =      get_theme_mod('rl_mail_visibility', 1);


        if ( $rl_fb ) {
            $social_link = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . get_the_permalink() . '&p&#91;images&#93;&#91;0&#93;=' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) . '&p&#91;title&#93;=' . rawurlencode( get_the_title() );
            $social_links_array['facebook'] = $social_link;
        }

        if ( $rl_twitter ) {
            $social_link = 'https://twitter.com/share?text=' . rawurlencode( get_the_title() ) . '&url=' . rawurlencode( get_the_permalink() );
            $social_links_array['twitter'] = $social_link;
        }

        if ( $rl_linkedin ) {
            $social_link = 'http://linkedin.com/shareArticle?mini=true&amp;url=' . get_the_permalink() . '&amp;title=' . rawurlencode( get_the_title() );
            $social_links_array['linkedin'] = $social_link;
        }

        if ( $rl_reddit ) {
            $social_link = 'http://reddit.com/submit?url=' . get_the_permalink() . '&amp;title=' . rawurlencode( get_the_title() );
            $social_links_array['reddit'] = $social_link;
        }

        if ( $rl_tumblr ) {
            $social_link = 'http://www.tumblr.com/share/link?url=' . rawurlencode( get_the_permalink() ) . '&amp;name=' . rawurlencode( get_the_title() ) . '&amp;description=' . rawurlencode( get_the_excerpt() );
            $social_links_array['tumblr'] = $social_link;
        }

        if ( $rl_googlep ) {
            $social_link = 'https://plus.google.com/share?url=' . get_the_permalink() . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;';
            $social_links_array['googleplus'] = $social_link;
        }

        if ( $rl_pinterest ) {
            $social_link = 'http://pinterest.com/pin/create/button/?url=' . urlencode(get_the_permalink() ) . '&amp;description=' . rawurlencode( get_the_excerpt() ) . '&amp;media=' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            $social_links_array['pinterest'] = $social_link;
        }

        if ( $rl_vk ) {
            $social_link = sprintf('http://vkontakte.ru/share.php?url=%s&amp;title=%s&amp;description=%s', rawurlencode( get_the_permalink() ), rawurlencode( get_the_title() ), rawurlencode( get_the_excerpt() ) );
            $social_links_array['vk'] = $social_link;
        }

        if ( $rl_mail ) {
            $social_link = 'mailto:?subject=' . get_the_title() . '&amp;body=' . get_the_permalink();
            $social_links_array['mail'] = $social_link;
        }

        return $social_links_array;
    }
}

if( !function_exists('rl_output_social_sharing_box') ) {

    function rl_output_social_sharing_box() {

        echo '<div class="row">';
            echo '<div class="riba-lite-social-sharing-box">';
                    echo '<div class="col-xs-12">';
                    /*
                     * Start the HTML output
                     */
                    foreach( rl_display_sharingbox_social_links_array() as $key => $value ) {

                        switch($key) {
                            case 'facebook':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>';
                                break;
                            case 'twitter':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>';
                                break;
                            case 'reddit':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Reddit"><i class="fa fa-reddit"></i></a>';
                                break;
                            case 'linkedin':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="LinkedIN"><i class="fa fa-linkedin"></i></a>';
                                break;
                            case 'googleplus':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus"></i></a>';
                                break;
                            case 'tumblr':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr"></i></a>';
                                break;
                            case 'pinterest':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>';
                                break;
                            case 'vk':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Vkontakte"><i class="fa fa-vk"></i></a>';
                                break;
                            case 'mail':
                                echo '<a target="_blank" rel="nofollow" href="'.$value.'" data-toggle="tooltip" data-placement="top" title="Mail"><i class="fa fa-envelope"></i></a>';
                                break;
                        }

                    }

                    echo '</div><!--/.col-xs-12-->';
            echo '</div><!--/.mt-social-sharing-box-->';
        echo '</div><!--/.row-->';

    }
}

if( ! function_exists( 'rl_get_related_posts' ) ) {
    /**
     * Get related posts by category
     * @param  integer  $post_id       current post id
     * @param  integer  $number_posts  number of posts to fetch
     * @return object                  object with posts info
     */
    function rl_get_related_posts( $post_id, $number_posts = -1 ) {

        $related_postsuery = new WP_Query();
        $args = '';

        if( $number_posts == 0 ) {
            return $related_postsuery;
        }

        $args = wp_parse_args( $args, array(
            'category__in'          => wp_get_post_categories( $post_id ),
            'ignore_sticky_posts'   => 0,
            'posts_per_page'        => $number_posts,
            'post__not_in'          => array( $post_id ),
            'meta_key'              => '_thumbnail_id',
        ));


        $related_postsuery = new WP_Query( $args );
        wp_reset_postdata();
        wp_reset_query();

        return $related_postsuery;
    }
}

if( ! function_exists( 'rl_render_related_posts' ) ) {
    /**
     * Render related posts carousel
     *
     * @return string                    HTML markup to display related posts
     **/
    function rl_render_related_posts()
    {

        $return_string = '';

        $return_string = '<div class="mt-related-posts">';

        // Check if related posts should be shown
        $related_posts = rl_get_related_posts(get_the_ID(), get_option('posts_per_page') );

        // Number of posts to show / view
        $limit = get_theme_mod('rl_howmany_blog_posts', 3);


        // Auto play
        $auto_play = get_theme_mod('rl_autoplay_blog_posts', 1);

        if( $auto_play == 0 ) {
            $auto_play = false;
        } else {
            $auto_play = true;
        }

        // Pagination
        $pagination = get_theme_mod('rl_pagination_blog_posts', 0);

        if( $pagination == 0 ) {
            $pagination = false;
        } else {
            $pagination = true;
        }



        $return_string .= '<div class="row">';

        /*
         * Heading
         */
        $return_string .= '<div class="col-sm-10 col-xs-12">';
            $return_string .= '<h3>' . __('Related posts: ', 'riba-lite') . '</h3>';
        $return_string .= '</div>';

        /*
         * Arrows
         */
        $return_string .= '<div class="col-sm-2 hidden-xs">';
        $return_string .= '<ul class="mt-carousel-arrows clearfix">';
        $return_string .= '<li class="pull-right"><a href="#" class="mt-owl-next fa fa-angle-right"></a></li>';
        $return_string .= '<li class="pull-left"><a href="#" class="mt-owl-prev fa fa-angle-left"></a></li>';

        $return_string .= '</ul>';
        $return_string .= '</div>';
        $return_string .= '</div><!--/.row-->';

        $return_string .= sprintf('<div class="owlCarousel" data-slider-id="%s" id="owlCarousel-%s" data-slider-items="%s" data-slider-speed="400" data-slider-auto-play="%s" data-slider-navigation="false" data-slider-pagination="%s">', get_the_ID(), get_the_ID(), $limit, $auto_play, $pagination);

        // Loop through related posts
        while ($related_posts->have_posts()): $related_posts->the_post();

            $return_string .= '<div class="item">';
            $return_string .= '<div class="col-sm-12">';


            if (has_post_thumbnail($related_posts->post->ID)) {
                $return_string .= '<a href="' . esc_url(get_the_permalink()) . '">' . get_the_post_thumbnail($related_posts->post->ID, 'riba-lite-1x') . '</a>';
            }


            $return_string .= '<div class="caption text-center">';

            /*
             * Post title
             */
            if (get_theme_mod('rl_enable_related_title_blog_posts') == 1) {
                $return_string .= '<a class="mt-blogpost-title" href="' . esc_url(get_the_permalink() ) . '">' . esc_html( get_the_title()) . '</a>';
            }

            /*
             * Post date
             */
            if (get_theme_mod('rl_enable_related_date_blog_posts') == 1) {
                $return_string .= '<div class="mt-date">' . get_the_date(get_option('date-format'), $related_posts->post->ID) . '</div>';
            }

            $return_string .= '</div><!--/.caption-->';


            $return_string .= '</div> <!--/.col-sm-6.col-md-4-->';
            $return_string .= '</div><!--/.item-->';


        endwhile;

        $return_string .= '</div>'; // owl Carousel
        $return_string .= '</div><!--/.mt-related-posts-->';

        wp_reset_query();
        wp_reset_postdata();

        return $return_string;

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

if( !function_exists( 'rl_render_author_box' ) ) {
    /**
     * Simple function that renders the Author Box Mark-up HTML code
     *
     * @return string
     */
    function rl_render_author_box() {

        $return_string = '<div class="rl-author-area row">';
            $return_string .= '<div class="col-lg-1 col-md-1 hidden-sm hidden-xs">';
                $return_string .='<a class="rl-author-link" href="'.esc_url( get_author_posts_url( get_the_author_meta() ) ).'" rel="author">';
                    $return_string .= get_avatar( get_the_author_meta( 'user_email' ), 110 );
                $return_string .= '</a>';
            $return_string .= '</div>';

            $return_string .= '<div class="col-lg-11 col-md-11 col-xs-12">';
                $return_string .= '<h4>';
                    $return_string .=  '<a class="rl-author-link" href="'.esc_url( get_author_posts_url( get_the_author_meta() ) ).'" rel="author">'.esc_html( get_the_author() ).'</a>';
                $return_string .= '</h4>';
                $return_string .= '<div class="rl-author-info">';
                    $return_string .= '<p>' . esc_html( get_the_author_meta( 'description' ) ) . '</p>';
                $return_string .= '</div>';
            $return_string .= '</div><!--/.col-lg-9-->';
        $return_string .= '</div> <!--/.rl-author-area-->';

        return $return_string;

    }
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