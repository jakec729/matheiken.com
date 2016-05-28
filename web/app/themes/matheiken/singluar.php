<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Matheiken_Theme
 */

get_header(); ?>

	<main id="main" class="site-main container-fluid" role="main">

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
		?>

	</main>
<?php
get_sidebar();
get_footer();
