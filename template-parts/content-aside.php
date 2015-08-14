<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid post-aside text-center col-xs-12'); ?>>
    <div class="link-wrapper">
        <div class="entry-content">
            <header class="entry-header">
                <a href="<?php echo get_the_permalink(); ?>">
                    <?php echo get_the_content(); ?>
                </a>
            </header><!-- .entry-header -->
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
