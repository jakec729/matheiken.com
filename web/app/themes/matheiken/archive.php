<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Matheiken_Theme
 */

get_header(); ?>

	<main id="main" class="site-main container-fluid" role="main">

		<?php if ( have_posts() ) : ?>

			<section class="projects flex-container">
				<div class="flex-container projects-wrap">
					<?php while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					} ?>
				</div>
			</section>

		<?php else : get_template_part( 'template-parts/content', 'none' ); endif; ?>

	</main>

<?php
get_sidebar();
get_footer();
