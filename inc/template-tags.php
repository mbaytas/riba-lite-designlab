<?php

if ( ! function_exists( 'rl_content_nav' ) ) {
    /**
     * Display navigation to next/previous pages when applicable
     */
    function rl_content_nav($nav_id)
    {
        global $wp_query, $post;

        // Don't print empty markup on single pages if there's nowhere to navigate.
        if (is_single()) {
            $previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
            $next = get_adjacent_post(false, '', false);

            if (!$next && !$previous)
                return;
        }

        // Don't print empty markup in archives if there's only one page.
        if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search()))
            return;

        $nav_class = (is_single()) ? 'post-navigation' : 'paging-navigation';
        ?>
        <nav role="navigation" id="<?php echo esc_attr($nav_id); ?>" class="<?php echo $nav_class; ?> col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 hidden-xs">
            <h1 class="screen-reader-text"><?php _e('Post navigation', 'pixova-lite'); ?></h1>

            <?php if (is_single()) : // navigation links for single posts ?>

                <?php previous_post_link('<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'pixova-lite') . '</span>'); ?>
                <?php next_post_link('<div class="nav-next">%link</div>', '<span class="meta-nav">' . _x('&rarr;', 'Next post link', 'pixova-lite') . '</span>'); ?>

            <?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages ?>

                <?php if (get_next_posts_link()) : ?>
                    <div
                        class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'pixova-lite')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div
                        class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'pixova-lite')); ?></div>
                <?php endif; ?>

            <?php endif; ?>
            <div class="clearfix"></div>
        </nav><!-- #<?php echo esc_html($nav_id); ?> -->
        <?php
    }
}


if ( ! function_exists( 'rl_posted_on' ) ) {
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function rl_posted_on()
    {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            esc_html_x('Posted on %s', 'post date', 'riba-lite'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            esc_html_x('by %s', 'post author', 'riba-lite'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );


        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }
}

if ( ! function_exists( 'rl_entry_footer' ) ) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function rl_entry_footer()
    {
        $display_category_post_meta = get_theme_mod('rl_enable_post_category_blog_posts', 1);
        $display_tags_post_meta = get_theme_mod('rl_enable_post_tags_blog_posts', 1);
        $display_number_comments = get_theme_mod('rl_enable_post_comments_blog_posts', 1);

        // Hide category and tag text for pages.
        if ('post' == get_post_type() ) {

            // check if category post meta is enabled
            if( $display_category_post_meta == 1 ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(esc_html__(', ', 'riba-lite'));

                if ($categories_list && rl_categorized_blog()) {
                    printf('<span class="cat-links">' . esc_html__('Posted in: %1$s', 'riba-lite') . '</span>', $categories_list); // WPCS: XSS OK.
                }
            }

            // check if tags post meta is enabled
            if( $display_tags_post_meta == 1 ) {

                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', esc_html__(', ', 'riba-lite'));
                if ($tags_list) {
                    printf('<span class="tags-links">' . esc_html__('Tagged with: %1$s', 'riba-lite') . '</span>', $tags_list); // WPCS: XSS OK.
                }
            }
        }

        // check if comment meta is enabled
        if( $display_number_comments == 1 ) {

            if (!post_password_required() && (comments_open() || get_comments_number())) {
                echo '<span class="comments-link">';
                comments_popup_link(esc_html__('Leave a comment', 'riba-lite'), esc_html__('1 Comment', 'riba-lite'), esc_html__('% Comments', 'riba-lite'));
                echo '</span>';
            }
        }

    }
}

/**
 * Pixova Lite only works in WordPress 4.1 or later.
 */


if ( ! function_exists( 'the_archive_title' ) && version_compare( $GLOBALS['wp_version'], '4.3', '<' ) ) {
    /**
     * Shim for `the_archive_title()`.
     *
     * Display the archive title based on the queried object.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after Optional. Content to append to the title. Default empty.
     */
    function the_archive_title($before = '', $after = '')
    {
        if (is_category()) {
            $title = sprintf(esc_html__('Category: %s', 'riba-lite'), single_cat_title('', false));
        } elseif (is_tag()) {
            $title = sprintf(esc_html__('Tag: %s', 'riba-lite'), single_tag_title('', false));
        } elseif (is_author()) {
            $title = sprintf(esc_html__('Author: %s', 'riba-lite'), '<span class="vcard">' . get_the_author() . '</span>');
        } elseif (is_year()) {
            $title = sprintf(esc_html__('Year: %s', 'riba-lite'), get_the_date(esc_html_x('Y', 'yearly archives date format', 'riba-lite')));
        } elseif (is_month()) {
            $title = sprintf(esc_html__('Month: %s', 'riba-lite'), get_the_date(esc_html_x('F Y', 'monthly archives date format', 'riba-lite')));
        } elseif (is_day()) {
            $title = sprintf(esc_html__('Day: %s', 'riba-lite'), get_the_date(esc_html_x('F j, Y', 'daily archives date format', 'riba-lite')));
        } elseif (is_tax('post_format')) {
            if (is_tax('post_format', 'post-format-aside')) {
                $title = esc_html_x('Asides', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-gallery')) {
                $title = esc_html_x('Galleries', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-image')) {
                $title = esc_html_x('Images', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-video')) {
                $title = esc_html_x('Videos', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-quote')) {
                $title = esc_html_x('Quotes', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-link')) {
                $title = esc_html_x('Links', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-status')) {
                $title = esc_html_x('Statuses', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-audio')) {
                $title = esc_html_x('Audio', 'post format archive title', 'riba-lite');
            } elseif (is_tax('post_format', 'post-format-chat')) {
                $title = esc_html_x('Chats', 'post format archive title', 'riba-lite');
            }
        } elseif (is_post_type_archive()) {
            $title = sprintf(esc_html__('Archives: %s', 'riba-lite'), post_type_archive_title('', false));
        } elseif (is_tax()) {
            $tax = get_taxonomy(get_queried_object()->taxonomy);
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf(esc_html__('%1$s: %2$s', 'riba-lite'), $tax->labels->singular_name, single_term_title('', false));
        } else {
            $title = esc_html__('Archives', 'riba-lite');
        }

        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters('get_the_archive_title', $title);

        if (!empty($title)) {
            echo $before . $title . $after;  // WPCS: XSS OK.
        }
    }
}

if ( ! function_exists( 'the_archive_description' ) ) {
    /**
     * Shim for `the_archive_description()`.
     *
     * Display category, tag, or term description.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     * @param string $before Optional. Content to prepend to the description. Default empty.
     * @param string $after Optional. Content to append to the description. Default empty.
     */
    function the_archive_description($before = '', $after = '')
    {
        $description = apply_filters('get_the_archive_description', term_description());

        if (!empty($description)) {
            /**
             * Filter the archive description.
             *
             * @see term_description()
             *
             * @param string $description Archive description to be displayed.
             */
            echo $before . $description . $after;  // WPCS: XSS OK.
        }
    }
}

if( !function_exists( 'rl_categorized_blog' ) ) {
    /**
     * Returns true if a blog has more than 1 category.
     *
     * @return bool
     */
    function rl_categorized_blog()
    {

        if (false === ($all_the_cool_cats = get_transient('rl_categories'))) {

            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields' => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number' => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('rl_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so rl_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so rl_categorized_blog should return false.
            return false;
        }
    }
}

if( !function_exists( 'rl_category_transient_flusher' ) ) {
    /**
     * Flush out the transients used in rl_categorized_blog.
     */
    function rl_category_transient_flusher()
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        // Like, beat it. Dig?
        delete_transient('rl_categories');
    }

    add_action('edit_category', 'rl_category_transient_flusher');
    add_action('save_post', 'rl_category_transient_flusher');
}