<?php

    // includes
    require get_template_directory() . '/inc/customizer/custom-controls/slider-selector.php';

    // Set Panel ID
    $panel_id = 'rl_panel_blog';

    // Set prefix
    $prefix = 'rl';

    /***********************************************/
    /************** BLOG OPTIONS  ***************/
    /***********************************************/


    $wp_customize->add_panel( $panel_id,
        array(
            'priority' => 29,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Blog options', 'riba-lite' )
        )
    );

    /***********************************************/
    /************** Global Blog Settings  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_blog_global_section' ,
        array(
            'title'       => __( 'Global', 'riba-lite' ),
            'priority'    => 1,
            'panel' 	  => $panel_id
        )
    );

    /* Posted on on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_posted_on_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Posted on meta on single blog post', 'riba-lite'),
            'description' => __('This will disable the posted on zone.', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );


    /* Estimated reading time single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_esrt_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_esrt_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Estimated reading time meta on single blog post', 'riba-lite'),
            'description' => __('This will disable the estimated reading time zone.', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /* Post Category on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_category_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_category_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Category meta on single blog post', 'riba-lite'),
            'description' => __('This will disable the posted in zone.', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /* Post Tags on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_tags_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_tags_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Tags meta on single blog post', 'riba-lite'),
            'description' => __('This will disable the tagged with zone.', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /* Post Comments on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_comments_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );

    $wp_customize->add_control(
        $prefix.'_enable_post_comments_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Coments meta on single blog post', 'riba-lite'),
            'description' => __('This will disable the comments header zone.', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );



    /* Social Sharing on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_social_sharing_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_social_sharing_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Social sharing on single blog post', 'riba-lite'),
            'description' => __('Displayed right under the post title', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /* Post Prev / Next links on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_post_nav_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_post_nav_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Nav links on single blog post', 'riba-lite'),
            'description' => __('Displayed on the opposite side of the post title (usually, the right side)', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /* Author Info Box on single blog posts */
    $wp_customize->add_setting( $prefix.'_enable_author_box_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_author_box_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Author info box on single blog post', 'riba-lite'),
            'description' => __('Displayed right at the end of the post', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /*  related posts carousel */
    $wp_customize->add_setting( $prefix.'_enable_related_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_related_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Related posts carousel ?', 'riba-lite'),
            'description' => __('Displayed after the author box', 'riba-lite'),
            'section' => $prefix.'_blog_global_section',
        )
    );

    /***********************************************/
    /************** Social Blog Settings  ***************/
    /***********************************************/


    $wp_customize->add_section( $prefix.'_blog_social_section' ,
        array(
            'title'       => __( 'Social Sharing', 'riba-lite' ),
            'priority'    => 2,
            'panel' 	  => $panel_id
        )
    );


    /* Facebook visibility */
    $wp_customize->add_setting($prefix.'_facebook_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_facebook_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Facebook ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* Twitter visibility */
    $wp_customize->add_setting($prefix.'_twitter_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_twitter_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Twitter ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* LinkedIN visibility */
    $wp_customize->add_setting($prefix.'_linkein_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_linkein_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on LinkedIN ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* Reddit visibility */
    $wp_customize->add_setting($prefix.'_reddit_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_reddit_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Reddit?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* Tumblr visibility */
    $wp_customize->add_setting($prefix.'_tumblr_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_tumblr_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Tumblr ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* Google+ visibility */
    $wp_customize->add_setting($prefix.'_googlep_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_googlep_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Google+ ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* Pinterest visibility */
    $wp_customize->add_setting($prefix.'_pinterest_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_pinterest_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on Pinterest ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );

    /* VK visibility */
    $wp_customize->add_setting($prefix.'_vk_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_vk_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on VK ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );


    /* Mail visibility */
    $wp_customize->add_setting($prefix.'_mail_visibility',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_mail_visibility',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display share on VK ?', 'riba-lite'),
            'section' => $prefix.'_blog_social_section',
        )
    );



    /***********************************************/
    /************** Related Blog Settings  ***************/
    /***********************************************/

    $wp_customize->add_section( $prefix.'_blog_related_section' ,
        array(
            'title'       => __( 'Related posts', 'riba-lite' ),
            'priority'    => 3,
            'panel' 	  => $panel_id
        )
    );


    /*  related posts title */
    $wp_customize->add_setting( $prefix.'_enable_related_title_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_related_title_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Show posts title in the carousel ?', 'riba-lite'),
            'section' => $prefix.'_blog_related_section',
        )
    );

    /*  related posts date */
    $wp_customize->add_setting( $prefix.'_enable_related_date_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
        $prefix.'_enable_related_date_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Show posts date in the carousel ?', 'riba-lite'),
            'section' => $prefix.'_blog_related_section',
        )
    );


    /* Auto play carousel */
    $wp_customize->add_setting( $prefix.'_autoplay_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 1,
        )
    );
    $wp_customize->add_control(
        $prefix.'_autoplay_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Autoplay related posts carousel ?', 'riba-lite'),
            'section' => $prefix.'_blog_related_section',
        )
    );

    /* Number of related posts to display at once  */
    $wp_customize->add_setting( $prefix.'_howmany_blog_posts',
        array(
            'sanitize_callback' => 'absint',
            'default' => 1
        )
    );
    $wp_customize->add_control( new RL_Controls_Slider_Control($wp_customize,
        $prefix.'_howmany_blog_posts',
            array(
                'label' => __('How many blog posts to display in the carousel at once ?', 'riba-lite'),
                'description' => __('No more than 4 posts at once;', 'riba-lite'),
                'choices' => array(
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                ),
                'section' => $prefix.'_blog_related_section',
                'default' => 2
            )
        )
    );

    /* Display pagination ?  */
    $wp_customize->add_setting( $prefix.'_pagination_blog_posts',
        array(
            'sanitize_callback' => $prefix.'_sanitize_checkbox',
            'default' => 0
        )
    );
    $wp_customize->add_control(
        $prefix.'_pagination_blog_posts',
        array(
            'type'	=> 'checkbox',
            'label' => __('Display pagination controls ?', 'riba-lite'),
            'description' => __('Will be displayed as navigation bullets', 'riba-lite'),
            'section' => $prefix.'_blog_related_section',
        )
    );