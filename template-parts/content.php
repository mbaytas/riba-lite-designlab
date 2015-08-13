<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid post-standard col-xs-6'); ?>>
    <div class="link-wrapper">
        <div class="post-cover-wrapper">
            <?php if( has_post_thumbnail() ) {
                    $featured_image =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'riba-lite-2x' );
                echo '<a href="'.esc_url( get_the_permalink() ).'" class="post-cover post-cover-'.get_the_ID().'"><img class="lazy" data-original="'.esc_url( $featured_image[0] ).'" width="'. esc_attr( $featured_image[1] ).'" height="'. esc_attr( $featured_image[2] ).'"></a>';
            } ?>
        </div><!-- .post-cover-wrapper -->

        <div class="entry-content">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <hr />
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php rl_posted_on(); ?>
                        <?php rl_estimated_reading_time(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
