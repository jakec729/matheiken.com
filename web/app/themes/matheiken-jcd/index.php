<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Matheiken_Theme
 */

get_header(); ?>
	<main id="main" class="site-main container-fluid" role="main">

		<?php if ( have_posts() ) : ?>

		<section class="projects flex-container">
			<header class="projects__header flex-item">
				<h3 class="projects__group-name">Ongoing</h3>
			</header>
			<div class="flex-container projects-wrap">
				<?php while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				} ?>
			</div>
		</section>

		<?php // the_posts_navigation(); ?>

		<?php else : get_template_part( 'template-parts/content', 'none' ); endif; ?>

	</main>

<?php
get_sidebar();
get_footer();
?>
