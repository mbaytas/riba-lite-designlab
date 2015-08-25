<?php

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
                <?php if ( 'post' == get_post_type() ) {
                    echo '<div class="entry-meta">';
                        do_action('mtl_entry_meta');
                    echo '</div>';
                    } ?>
            </header><!-- .entry-header -->
        </div>
    </div><!-- .entry-content -->



    <div class="container">
        <div class="row">

            <?php do_action('mtl_before_content'); ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <div class="clearfix"></div>


            <footer>
                <div class="entry-footer">
                    <?php rl_entry_footer(); ?>
                </div>
            </footer>

            <?php do_action('mtl_after_content'); ?>
        </div>
    </div>

</article><!-- #post-## -->

