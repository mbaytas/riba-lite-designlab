</div><!-- #content -->
<?php

    $footer_email = get_theme_mod('rl_email', 'contact@site.com');
    $footer_phone = get_theme_mod('rl_phone', '0 332 548 954');
    $footer_copyright = get_theme_mod('rl_footer_copyright', sprintf('&copy; %s', __('Macho Themes 2015. All Rights Reserved', 'riba-lite') ) );
?>

<footer id="footer" class="site-footer container-fluid" role="contentinfo">
    <div class="footer-widget-container">
            <?php

                echo '<div class="mt-footer-widget col-md-6">';
                if( is_active_sidebar( 'footer-sidebar-1' ) ) {
                    dynamic_sidebar('footer-sidebar-1');
                } else {
                    the_widget('riba_lite_widget_about', sprintf( 'title=%s', __('About', 'riba-lite') ) .'&'. sprintf('about_text=%s.', __('The many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected true of a humour', 'riba-lite') ) );
                }
                echo '</div><!--/.mt--foter--widget.col-md-6-->';

                echo '<div class="mt-footer-widget col-md-6">';
                if( is_active_sidebar( 'footer-sidebar-2' ) ) {
                    dynamic_sidebar('footer-sidebar-2');
                } else {
                    the_widget('riba_lite_widget_social_media', sprintf( 'title=%s', __('Follow us', 'riba-lite') ).'&profile_facebook=#&profile_twitter=#&profile_plus=#&profile_pinterest=#&profile_youtube=#&profile_dribbble=#&profile_tumblr=#&profile_instagram=#.');
                }
                echo '</div><!--/.mt--foter--widget.col-md-6-->';


            ?>
    </div>
    <div class="clearfix"></div>
    <div class="footer-contact-container">
        <div class="container">
        <div class="row">
        <?php if($footer_email !== '' || $footer_phone !== '' ) { ?>
        <div class="col-lg-7">
                <div class="text-left">
                    <small>
                        <?php _e('Mail: ', 'riba-lite'); ?><a href="mailto:<?php echo esc_attr( $footer_email ); ?>" rel="nofollow" target="_blank"><?php echo esc_attr( $footer_email ); ?></a> &middot;
                        <?php _e('Phone: ', 'riba-lite'); ?><a href="tel:<?php echo esc_attr( $footer_phone ); ?>" rel="nofollow"><?php echo esc_attr( $footer_phone ); ?></a>
                    </small>
                </div><!--/.text-center-->
            </div><!--/col-lg-7-->
            <?php } ?>
            <div class="col-lg-5">
                <?php wp_nav_menu( array(
                    'theme_location' => 'secondary',
                    'menu_id' => 'secondary-menu',
                    'container_id' => 'rl-secondary-menu',
                    'container_class' => 'hidden-xs',
                    'walker' => new RibaLiteMyExtendedMenuWalker(),
                    'fallback_cb' =>  'RibaLiteMyExtendedMenuWalker::fallback',
                ) ); ?>
            </div>
        </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.footer-copyright--container-->



    <div class="clearfix"></div>
    <div class="footer-copyright-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="footer-copyright"><?php echo esc_html($footer_copyright); ?>
                        <?php _e('Powered by','riba-lite'); ?> <a href="<?php echo esc_url( __( 'http://www.machothemes.com', 'riba-lite') ); ?>" target="_blank" rel="nofollow" title="<?php _e('Premium WordPress Themes', 'riba-lite'); ?>"><?php _e('Macho Themes', 'riba-lite'); ?></a>
                        &middot;
                        <?php _e('Running on:', 'riba-lite'); ?> <a href="<?php echo esc_url( __( 'http://www.wordpress.org', 'riba-lite') ); ?>" target="_blank" rel="nofollow" title="WordPress"><?php _e('WordPress', 'riba-lite'); ?></a>
                    </p>
                </div><!--/.text-center-->
            </div><!--/.col-lg-12-->
        </div><!--/.row-->
    </div><!--/.footer-contact-container-->


</footer>
</div><!-- #page -->
	<a href="#" class="mt-top"><?php _e('Top', 'riba-lite'); ?></a>


<?php wp_footer(); ?>
</body>
</html>