<?php
/**
* Template part for displaying posts.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Matheiken_Theme
*/

?>

<?php if ( is_single() ): ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
		<?php matheiken_hero_image() ?>

		<section class="post__details">
			<div class="post__content">
				<h1 class="post__title"><?php the_title(); ?></h1>
				<?php if (get_field('project_short_description')): ?>
					<p class="post__subhead"><?php the_field('project_short_description'); ?></p>
				<?php endif ?>
				<div class="post__description">
					<?php the_content(); ?>
				</div>
			</div>
			<?php if (have_rows('project_images')): ?>
				<div class="post__images flex-expander">
					<?php while (have_rows('project_images')): the_row(); 
						$image = get_sub_field('image');
						$alignment = get_sub_field('alignment');
					?>
						<figure class="<?= $alignment ?>">
							<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
						</figure>
					<?php endwhile; ?>
				</div>
			<?php endif ?>
		</section>

		<footer class="post__footer">
			<?php matheiken_related_projects(); ?>
		</footer>

	</article>

<?php else: ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class("project flex-item hover-fixed hover-fixed__trigger"); ?>>
		<?php matheiken_cover_photo(); ?>
		<p class="project__category"><?php matheiken_categories(); ?></p>
		<a href="<?php the_permalink(); ?>" class="project__link">
			<h4 class="project__title entry-title"><?= get_the_title() ?>&nbsp;<span class="arrow">&rarr;</span></h4>
			<p class="project__description"><?php matheiken_excerpt(); ?></p>
		</a>
	</article>

<?php endif; ?>
