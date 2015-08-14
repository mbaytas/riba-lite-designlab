<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid post-quote text-center col-xs-12'); ?>>
    <div class="link-wrapper">
        <div class="entry-content">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php the_content(); ?>

            </header><!-- .entry-header -->
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
