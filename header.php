<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<?php
    $preloader_text = get_theme_mod('rl_preloader_text', __('Loading', 'riba-lite') );
    $rl_logo_url = get_theme_mod('rl_img_logo', get_template_directory_uri() . '/layout/images/logo/riba-logo.png');
    $rl_logo_text = get_theme_mod('rl_text_logo', __('Riba', 'riba-lite') );
?>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">


    <?php
        global $wp_customize;
        $preloader_is_enabled = get_theme_mod('rl_enable_site_preloader', 1);

    if( !isset($wp_customize) && $preloader_is_enabled == 1 ) { ?>
        <!-- Site Preloader -->
        <div id="page-loader">
            <div class="page-loader-inner">
                <div class="loader"><strong><?php echo esc_html( $preloader_text ); ?></strong></div>
            </div>
        </div>
        <!-- END Site Preloader -->
    <?php } ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'riba-lite' ); ?></a>

    <?php if($rl_logo_url) {  ?>
	    <div id="header-container" class="container-fluid rl-img-logo">
    <?php } else { ?>
        <div id="header-container" class="container-fluid">
    <?php } ?>


			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding col-lg-4 col-md-4 col-sm-4 col-xs-12 text-lg-left text-md-left text-sm-left text-xs-center">
					<?php
                        if($rl_logo_url) {
                            echo '<a href="'.esc_url( home_url( '/' ) ).'" rel="home" ><img src="'.esc_url( $rl_logo_url ).'"></a>';
                        } else {
                            echo '<a class="rl-text-logo" href="'.esc_url( home_url( '/' ) ).'" rel="home" >'.esc_attr( $rl_logo_text ).'</a>';
                        }

                    ?>
				</div><!-- .site-branding -->

                <?php

                if($rl_logo_url) {
                    echo '<nav id="site-navigation" class="main-navigation col-lg-8 col-md-8 col-sm-8 col-xs-12 has-img-logo" role="navigation">';
                } else {
                    echo '<nav id="site-navigation" class="main-navigation col-lg-8 col-md-8 col-sm-8 col-xs-12" role="navigation">';
                }
                ?>


					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'riba-lite' ); ?></button>
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu',
                        'container_id' => 'rl-main-menu',
                        'container_class' => 'hidden-xs',
						'walker' => new RibaLiteMyExtendedMenuWalker(),
						'fallback_cb' =>  'RibaLiteMyExtendedMenuWalker::fallback',
					) ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
	</div>


	<div id="content" class="site-content container-fluid">

