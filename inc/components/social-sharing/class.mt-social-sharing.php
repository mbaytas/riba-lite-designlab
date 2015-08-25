<?php
/**
 * Class MTL_Social_Sharing_Output
 *
 * This file does the social sharing handling for the Muscle Core Lite Framework
 *
 * @author		Cristian Raiber
 * @copyright	(c) Copyright by Macho Themes
 * @link		http://www.machothemes.com
 * @package 	Muscle Core Lite
 * @since		Version 1.0.0
 */


// @todo: find a better solution for tooltips
// @todo : make the title changeable from the Customizer


/**
 *
 * Gets called only if the "display social media options" option is checked
 * in the back-end
 *
 * @since   1.0.0
 *
 */
if(!function_exists('CallSocialMediaClassMTL')) {
    function CallSocialMediaClassMTL()
    {

        $display_social_sharing = get_theme_mod('rl_enable_social_sharing_blog_posts', 1);

        if ($display_social_sharing == 1) {
            // instantiate the class & load everything else
            MTL_Social_Sharing_Output::getInstance();
        }
    }
    add_action('wp_loaded', 'CallSocialMediaClassMTL');
}



if( !class_exists( 'MTL_Social_Sharing_Output' ) ) {
    
    class MTL_Social_Sharing_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct() {

            $sharing_bar_position = get_theme_mod('rl_social_sharing_position', 'after_content');

            if( $sharing_bar_position == 'after_content' ) {
                /**
                 * Display the sharing bar at the end of the content
                 */
                add_action('mtl_after_content', array($this, 'output_social_sharing_box'), 1);

            } else if( $sharing_bar_position == 'before_content' ) {
                /**
                 * Display social sharing box before the content (right below the big bg. image)
                 */
                add_action('mtl_before_content', array($this, 'output_social_sharing_box'), 1);
            }


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
         * Set up the array for sharing box social networks.
         *
         * @return array  The social links array containing the social media and links to them.
         */
        public function social_links_array()
        {

            /*
             * Build the array
             */
            $social_links_array = array();

            /*
             * Get stored & Set defaults
             */
            $mtl_fb             = get_theme_mod( 'facebook_visibility', 1 );
            $mtl_twitter        = get_theme_mod( 'twitter_visibility', 1 );
            $mtl_linkedin       = get_theme_mod( 'linkedin_visibility', 1 );
            $mtl_reddit         = get_theme_mod( 'reddit_visibility', 1 );
            $mtl_tumblr         = get_theme_mod( 'tumblr_visibility', 1 );
            $mtl_googlep        = get_theme_mod( 'googlep_visibility', 1 );
            $mtl_pinterest      = get_theme_mod( 'pinterest_visibility', 1 );
            $mtl_vk             = get_theme_mod( 'vk_visibility', 1 );
            $mtl_mail           = get_theme_mod( 'mail_visibility', 1 );


            if ($mtl_fb) {
                $social_link = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . get_the_permalink() . '&p&#91;images&#93;&#91;0&#93;=' . wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '&p&#91;title&#93;=' . rawurlencode(get_the_title());
                $social_links_array['facebook'] = $social_link;
            }

            if ($mtl_twitter) {
                $social_link = 'https://twitter.com/share?text=' . rawurlencode(get_the_title()) . '&url=' . rawurlencode(get_the_permalink());
                $social_links_array['twitter'] = $social_link;
            }

            if ($mtl_linkedin) {
                $social_link = 'http://linkedin.com/shareArticle?mini=true&amp;url=' . get_the_permalink() . '&amp;title=' . rawurlencode(get_the_title());
                $social_links_array['linkedin'] = $social_link;
            }

            if ($mtl_reddit) {
                $social_link = 'http://reddit.com/submit?url=' . get_the_permalink() . '&amp;title=' . rawurlencode(get_the_title());
                $social_links_array['reddit'] = $social_link;
            }

            if ($mtl_tumblr) {
                $social_link = 'http://www.tumblr.com/share/link?url=' . rawurlencode(get_the_permalink()) . '&amp;name=' . rawurlencode(get_the_title()) . '&amp;description=' . rawurlencode(get_the_excerpt());
                $social_links_array['tumblr'] = $social_link;
            }

            if ($mtl_googlep) {
                $social_link = 'https://plus.google.com/share?url=' . get_the_permalink() . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;';
                $social_links_array['googleplus'] = $social_link;
            }

            if ($mtl_pinterest) {
                $social_link = 'http://pinterest.com/pin/create/button/?url=' . urlencode(get_the_permalink()) . '&amp;description=' . rawurlencode(get_the_excerpt()) . '&amp;media=' . wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                $social_links_array['pinterest'] = $social_link;
            }

            if ($mtl_vk) {
                $social_link = sprintf('http://vkontakte.ru/share.php?url=%s&amp;title=%s&amp;description=%s', rawurlencode(get_the_permalink()), rawurlencode(get_the_title()), rawurlencode(get_the_excerpt()));
                $social_links_array['vk'] = $social_link;
            }

            if ($mtl_mail) {
                $social_link = 'mailto:?subject=' . get_the_title() . '&amp;body=' . get_the_permalink();
                $social_links_array['mail'] = $social_link;
            }

            return $social_links_array;
        }


        function output_social_sharing_box()
        {

            echo '<div class="text-center mtl-social-sharing-box-wrapper">';
                echo '<div class="row">';
                    echo '<div class="mtl-social-sharing-box">';
                        echo '<div class="col-xs-12">';


                        // Title goes here
                        $sharing_bar_title = get_theme_mod('rl_sharing_bar_text', esc_html__('Share This', 'riba-lite') );

                        echo '<h4 class="mtl-social-sharing-box-title">'. $sharing_bar_title . '</h4>';

                        /*
                         * Start the HTML output
                         */
                        foreach ( $this->social_links_array() as $key => $value) {

                            switch ($key) {
                                case 'facebook':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>';
                                    break;

                                case 'twitter':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>';
                                    break;

                                case 'reddit':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Reddit"><i class="fa fa-reddit"></i></a>';
                                    break;

                                case 'linkedin':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="LinkedIN"><i class="fa fa-linkedin"></i></a>';
                                    break;

                                case 'googleplus':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus"></i></a>';
                                    break;

                                case 'tumblr':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr"></i></a>';
                                    break;

                                case 'pinterest':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>';
                                    break;

                                case 'vk':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Vkontakte"><i class="fa fa-vk"></i></a>';
                                    break;

                                case 'mail':
                                    echo '<a target="_blank" rel="nofollow" href="' . $value . '" data-toggle="tooltip" data-placement="top" title="Mail"><i class="fa fa-envelope"></i></a>';
                                    break;
                            }

                        }

                        echo '</div><!--/.col-xs-12-->';
                    echo '</div><!--/.mt-social-sharing-box-->';
                echo '</div><!--/.row-->';
            echo '</div><!--/.social-sharing-box-wrapper-->';
        }
    }
}



