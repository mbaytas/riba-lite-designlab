</div><!-- #content -->


<footer id="footer" class="site-footer container-fluid" role="contentinfo">
    <div class="footer-widget-container">
            <?php

                echo '<div class="mt-footer-widget col-md-6">';
                if( is_active_sidebar( 'footer-sidebar-1' ) ) {
                    dynamic_sidebar('footer-sidebar-1');
                }
                echo '</div><!--/.mt--foter--widget.col-md-6-->';

                echo '<div class="mt-footer-widget col-md-6">';
                if( is_active_sidebar( 'footer-sidebar-2' ) ) {
                    dynamic_sidebar('footer-sidebar-2');
                }
                echo '</div><!--/.mt--foter--widget.col-md-6-->';


            ?>
    </div>
    <div class="clearfix"></div>
    <?php $footer_copyright = get_theme_mod('rl_footer_copyright', ''); ?>
    <div class="footer-copyright-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="footer-copyright"><?php echo esc_html($footer_copyright); ?>
                        &middot;
                        <?php _e('Powered by','riba-lite'); ?> <a href="<?php echo esc_url( __( 'http://www.machothemes.com', 'riba-lite') ); ?>" target="_blank" rel="nofollow" title="<?php _e('Premium WordPress Themes', 'riba-lite'); ?>"><?php _e('Macho Themes', 'riba-lite'); ?></a>
                        &middot;
                        <?php _e('Running on:', 'riba-lite'); ?> <a href="<?php echo esc_url( __( 'http://www.wordpress.org', 'riba-lite') ); ?>" target="_blank" rel="nofollow" title="WordPress"><?php _e('WordPress', 'riba-lite'); ?></a>
                    </p>
                </div><!--/.text-center-->
            </div><!--/col-lg-12-->
        </div><!--/.row-->
    </div><!--/.footer-copyright--container-->

</footer>
</div><!-- #page -->
	<a href="#" class="mt-top"><?php _e('Top', 'riba-lite'); ?></a>


<?php wp_footer(); ?>
</body>
</html>