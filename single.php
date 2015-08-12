<?php
/**
 * The template for displaying all single posts.
 *
 * @package Riba Lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<div class="container">
				<div class="row">
					<?php
					$related_posts_enabled = get_theme_mod('rl_enable_related_blog_posts', 1);
					if(  $related_posts_enabled == 1) {
                        echo rl_render_related_posts();
                    }

					?>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				</div>
			</div>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
