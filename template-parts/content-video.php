<?php

    $display_video_controls = get_theme_mod('rl_enable_video_controls', 1);
    $video_auto_play = get_theme_mod('rl_enable_video_auto_play', 1);
    $video_loop_play = get_theme_mod('rl_enable_video_loop_play', 1);
    $video_mute_play = get_theme_mod('rl_enable_video_mute_play', 1);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid post-video col-xs-12'); ?>>
    <div class="link-wrapper">

    <?php if($display_video_controls == 1 ) { ?>
        <!-- Video Controls -->
        <div class="video-wrapper-controls">
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Play', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPPlay()"><i class="fa fa-play"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Pause', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPPause()"><i class="fa fa-pause"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Stop', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPStop()"><i class="fa fa-stop"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Maximize', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPFullscreen()"><i class="fa fa-arrows-alt"></i></button>
        </div>
    <?php } ?>

        <div class="post-cover-wrapper" id="video-wrapper-<?php echo get_the_ID(); ?>">

       <?php $video_id = rl_get_first_video_from_post($post->ID); // fetch video URL  ?>


    <!-- Mark-up for MB YTPlayer -->
    <a href="<?php echo get_the_permalink(); ?>" rel="nofollow">
        <div id="P1-<?php echo get_the_ID(); ?>" class="player" data-property="{videoURL: '<?php echo $video_id; ?>',containment:'#video-wrapper-<?php echo get_the_ID(); ?>', autoPlay: <?php echo esc_attr( $video_auto_play ); ?>, mute: <?php echo esc_attr( $video_mute_play ); ?>, loop: <?php echo esc_attr( $video_loop_play ); ?> }"></div>
    </a>

        </div><!-- .post-cover-wrapper -->

        <div class="entry-content">


            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <hr />
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php rl_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->
        </div><!-- .entry-content -->
    </div>

</article><!-- #post-## -->
