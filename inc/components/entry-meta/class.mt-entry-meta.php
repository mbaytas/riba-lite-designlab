<?php


/**
 *
 *
 * @since   1.0.0
 *
 */
if(!function_exists('CallEntryMetaClassMTL')) {
    /**
     *
     */
    function CallEntryMetaClassMTL()
    {

        // instantiate the class & load everything else
        MTL_Entry_Meta_Output::getInstance();

    }
    add_action('wp_loaded', 'CallEntryMetaClassMTL');
}



if( !class_exists( 'MTL_Entry_Meta_Output' ) ) {

    class MTL_Entry_Meta_Output
    {

        /**
         * @var Singleton The reference to *Singleton* instance of this class
         */
        private static $instance;


        protected function __construct()
        {

            add_action('mtl_entry_meta', array($this, 'entry_meta_output'), 1);
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

        public function entry_meta_output() {

            // quickly fetch some vars
            $display_post_posted_on_meta = get_theme_mod('rl_enable_post_posted_on_blog_posts', 1);
            $display_post_esrt_meta = get_theme_mod('rl_enable_post_esrt_blog_posts', 1);


            if( $display_post_posted_on_meta == 1 ) {
               echo $this->posted_on_output();
            }

            if( $display_post_esrt_meta == 1 ) {
               echo $this->reading_time_output();
            }
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
         * Function to estimate the reading time of a post, based on the average reading speed of 200 words / minute
         */
        function reading_time_output() {

            $post = get_post();

            $words = str_word_count(strip_tags($post->post_content));
            $minutes = floor($words / 200);


            if ( $minutes >= 1 ) {
                $estimated_time = $minutes . __(' min. read', 'riba-lite');
            } else {
                $estimated_time = sprintf('%s', __('1 min. read', 'riba-lite') );
            }

            echo '<span class="riba-lite-estimated-reading-time">'. $estimated_time . '</span>';
        }

        /**
         * Prints HTML with meta information for the current post-date/time and author.
         */
        function posted_on_output()
        {
            global $post;


            if( get_post_format() !== false ) {
                $display_author = get_theme_mod('rl_post_'.esc_attr( get_post_format( $post->ID ) ).'_enable_author', 1);
                $display_date = get_theme_mod('rl_post_'.esc_attr( get_post_format( $post-> ID ) ).'_enable_posted', 1);
            } else {
                $display_author = get_theme_mod('rl_post_standard_enable_author', 1);
                $display_date = get_theme_mod('rl_post_standard_enable_posted', 1);
            }


            $posted_on = sprintf(
                esc_html_x( '%s ago', '%s = human-readable time difference', 'riba-lite' ),
                human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
            );

            $byline = sprintf(
                esc_html_x('%s', 'post author', 'riba-lite'),
                '<div class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></div>'
            );

            if( $display_author == 1 ) {
                echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
            }


            if( $display_date == 1 ) {
                echo '<span class="posted-on">' . $posted_on . '</span>';
            }



        }


    }
}