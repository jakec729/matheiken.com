<?php
/**
 * The Front Page template file.
 *
 * This controls the look of your homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Matheiken_Theme
 */

get_header(); ?>

	<main id="main" class="site-main container-fluid" role="main">

		<?php $categories = [];

		$categories[] = [
			'title' => "Ongoing",
			'args' => [
				'posts_per_page' => -1, 
				'tag' => "ongoing"
			]
		];

		$categories[] = [
			'title' => "2015-2013",
			'args' => [
				'posts_per_page' => -1, 
				'tag' => "2015-2013"
			]
		];

		$categories[] = [
			'title' => "2012-2010",
			'args' => [
				'posts_per_page' => -1, 
				'tag' => "2012-2010"
			]
		];

		$categories[] = [
			'title' => "Pre-2010",
			'args' => [
				'posts_per_page' => -1, 
				'tag' => "pre-2010"
			]
		];

		foreach ($categories as $category) : ?>

		<?php 
			$query = new WP_Query($category['args']);
		 ?>
		<?php if ( $query->have_posts() ) : ?>
			<section class="projects flex-container">
				<header class="projects__header flex-item">
					<h3 class="projects__group-name"><?= $category['title']; ?></h3>
				</header>
				<div class="flex-container projects-wrap">
					<?php while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					} ?>
				</div>
			</section>
		<?php endif ?>

		<?php wp_reset_postdata(); ?>

	<?php endforeach; ?>

	</main>

<?php
get_sidebar();
get_footer();
?>
