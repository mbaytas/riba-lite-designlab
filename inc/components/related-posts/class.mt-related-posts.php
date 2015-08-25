<?php

/**
 * Class MTL_Related_Posts_Output
 *
 * This file does the social sharing handling for the Muscle Core Lite Framework
 *
 * @author		Cristian Raiber
 * @copyright	(c) Copyright by Macho Themes
 * @link		http://www.machothemes.com
 * @package 	Muscle Core Lite
 * @since		Version 1.0.0
 */

// @todo : more effects for hover images
// @todo: pull in more than post title & date




if( !function_exists( 'CallRelatedPostsClassMTL' ) ) {
    /**
     *
     * Gets called only if the "display related posts" option is checked
     * in the back-end
     *
     * @since   1.0.0
     *
     */
    function CallRelatedPostsClassMTL()
    {
        $display_related_blog_posts = get_theme_mod('rl_enable_related_blog_posts', 1);

        if ($display_related_blog_posts == 1) {

            // instantiate the class & load everything else
            MTL_Related_Posts_Output::getInstance();
        }
    }
    add_action( 'wp_loaded', 'CallRelatedPostsClassMTL');
}


if( !class_exists( 'MTL_Related_Posts_Output' ) ) {

    /**
     * Class MTL_Related_Posts_Output
     */
    class MTL_Related_Posts_Output{

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;

        /**
         *
         */
        protected function __construct() {
            add_action( 'mtl_after_content', array( $this, 'output_related_posts' ), 2);
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
         * Get related posts by category
         * @param  integer  $post_id       current post id
         * @param  integer  $number_posts  number of posts to fetch
         * @return object                  object with posts info
         */
        public function get_related_posts( $post_id, $number_posts = -1 ) {

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

            // reset post query
            wp_reset_postdata();
            wp_reset_query();

            return $related_postsuery;
        }

        /**
         * Render related posts carousel
         *
         * @return string                    HTML markup to display related posts
         **/
        function output_related_posts()
        {



           echo '<div class="mt-related-posts">';

            // Check if related posts should be shown
            $related_posts = $this->get_related_posts( get_the_ID(), get_option('posts_per_page') );

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



            echo '<div class="row">';

            /*
             * Heading
             */
            echo '<div class="col-sm-10 col-xs-12">';
            echo '<h3>' . __('Related posts: ', 'riba-lite') . '</h3>';
            echo '</div>';

            /*
             * Arrows
             */
            echo '<div class="col-sm-2 hidden-xs">';
            echo '<ul class="mt-carousel-arrows clearfix">';
                echo '<li class="pull-right"><a href="#" class="mt-owl-next fa fa-angle-right"></a></li>';
                echo '<li class="pull-left"><a href="#" class="mt-owl-prev fa fa-angle-left"></a></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div><!--/.row-->';

            echo sprintf('<div class="owlCarousel" data-slider-id="%s" id="owlCarousel-%s" data-slider-items="%s" data-slider-speed="400" data-slider-auto-play="%s" data-slider-navigation="false" data-slider-pagination="%s">', get_the_ID(), get_the_ID(), $limit, $auto_play, $pagination);

            // Loop through related posts
            while ($related_posts->have_posts()): $related_posts->the_post();

                echo '<div class="item">';
                echo '<div class="col-sm-12">';


                if (has_post_thumbnail($related_posts->post->ID)) {
                    echo '<a href="' . esc_url(get_the_permalink()) . '">' . get_the_post_thumbnail($related_posts->post->ID, 'riba-lite-1x') . '</a>';
                }


                echo '<div class="caption text-center">';

                /*
                 * Post title
                 */
                if ( get_theme_mod('rl_enable_related_title_blog_posts') == 1) {
                    echo '<a class="mt-blogpost-title" href="' . esc_url(get_the_permalink() ) . '">' . esc_html( get_the_title()) . '</a>';
                }

                /*
                 * Post date
                 */
                if (get_theme_mod('rl_enable_related_date_blog_posts') == 1) {
                    echo '<div class="mt-date">' . get_the_date(get_option('date-format'), $related_posts->post->ID) . '</div>';
                }

                echo '</div><!--/.caption-->';


                echo '</div> <!--/.col-sm-6.col-md-4-->';
                echo '</div><!--/.item-->';


            endwhile;

            echo '</div>'; // owl Carousel
            echo '</div><!--/.mt-related-posts-->';

            wp_reset_query();
            wp_reset_postdata();
        }
    }
}






