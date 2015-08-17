<?php

// quickly fetch some vars
    $display_post_posted_on_meta = get_theme_mod('rl_enable_post_posted_on_blog_posts', 1);
    $display_post_esrt_meta = get_theme_mod('rl_enable_post_esrt_blog_posts', 1);
    $display_social_sharing = get_theme_mod('rl_enable_social_sharing_blog_posts', 1);
    $display_prev_next_links = get_theme_mod('rl_enable_post_nav_blog_posts', 1);
    $display_author_box = get_theme_mod('rl_enable_author_box_blog_posts', 1);
    $display_post_breadcrumbs = get_theme_mod('rl_enable_post_breadcrumbs', 1);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid ' . get_post_type() ); ?>>

<div class="link-wrapper">
    <div class="post-cover-wrapper">

    <?php

        if( $display_post_breadcrumbs == 1 ) {
            echo '<div class="hidden-xs">';
                    echo rl_breadcrumbs();
            echo '</div>';
        }

    ?>

            <?php if( has_post_thumbnail() ) {
                    $featured_image =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'riba-lite-2x' );

                echo '<a class="post-cover post-cover-'.get_the_ID().'">';
                    echo '<div class="parallax-bg-image" style="background-image: url('.esc_url( $featured_image[0] ).');"></div>';
                echo '</a>';
            } ?>
        </div><!-- .post-cover-wrapper -->

    <div class="entry-content">
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <hr />
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php if( $display_post_posted_on_meta == 1 ) {
                                rl_posted_on();
                            }
                        ?>
                        <?php if( $display_post_posted_on_meta == 1 && $display_post_esrt_meta == 1 ) { ?> 
                            <?php echo ' - '; ?>
                        <?php } ?>
                        
                        <?php if( $display_post_esrt_meta == 1 ) {
                                rl_estimated_reading_time();
                            }
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
            <footer>
                <div class="entry-footer">
                    <?php rl_entry_footer(); ?>
                </div>
            </footer>

        </div>
    </div><!-- .entry-content -->



    <div class="container">
        <div class="row">
            <?php the_title( sprintf( '<h2 class="post-title col-lg-10 col-md-10 col-sm-10 col-xs-12"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <?php if( $display_prev_next_links == 1 ) {
                echo '<div class="">' . rl_content_nav('riba-single-post-nav') . '</div>';
            } ?>

            <?php if( $display_social_sharing == 1 ) {
                rl_output_social_sharing_box();
            } ?>
            <div class="clearfix"></div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

</article><!-- #post-## -->

