<article id="post-<?php the_ID(); ?>" <?php post_class('post-grid post-video col-xs-12'); ?>>
    <div class="link-wrapper">


        <!-- Video Controls -->
        <div class="video-wrapper-controls">
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Play', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPPlay()"><i class="fa fa-play"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Pause', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPPause()"><i class="fa fa-pause"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Stop', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPStop()"><i class="fa fa-stop"></i></button>
            <button class="rl-video-control" data-toggle="tooltip" data-placement="top" title="<?php _e('Maximize', 'riba-lite'); ?>" onclick="jQuery('#P1-<?php echo get_the_ID(); ?>').YTPFullscreen()"><i class="fa fa-arrows-alt"></i></button>
        </div>

        <div class="post-cover-wrapper" id="video-wrapper-<?php echo get_the_ID(); ?>">

       <?php $video_url = rl_get_video_id_from_iframe( esc_url( rl_get_first_video_from_post($post->ID) ) ); // fetch video URL
            $video_url = remove_query_arg('feature', $video_url);  // remove ?feature=oembed from URL
       ?>
            <!-- Mark-up for MB YTPlayer -->
            <div id="P1-<?php echo get_the_ID(); ?>" class="player" data-property="{videoURL: '<?php echo $video_url; ?>',containment:'#video-wrapper-<?php echo get_the_ID(); ?>',startAt:0,mute:false,autoPlay:true,loop:true,opacity:1}"></div>
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
