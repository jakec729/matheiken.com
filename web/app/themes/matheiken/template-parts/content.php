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

		<?php if (has_post_thumbnail()) : ?>
			<header class="post__header">
				<?php matheiken_featured_image() ?>
			</header>
		<?php endif; ?>

		<section class="post__details">
			<div class="post__content">
				<h1 class="post__title"><?php the_title(); ?></h1>
				<?php if (get_field('subhead')): ?>
					<p class="post__subhead"><?php the_field('subhead'); ?></p>
				<?php endif ?>
				<div class="post__description">
					<?php the_content(); ?>
				</div>
			</div>
			<?php if (get_field('project_images')): ?>
				<div class="post__images flex-expander">
					<?php foreach (get_field('project_images') as $image): ?>
						<figure><img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"></figure>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		</section>

		<footer class="post__footer widget-related-projects">
			<h3 class="widget__heading">Related Projects</h3>
			<div class="projects flex-container">
				<?php $projects = [1,2,3,4]; if($projects): foreach ($projects as $project): ?>
					<article class="project flex-item">
						<p class="project__category"><?php matheiken_first_category(); ?></p>
						<a href="single-post.html" class="project__link">
							<h4 class="project__title">Project Title&nbsp;<span class="arrow">&rarr;</span></h4>
							<p class="project__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, suscipit.</p>
						</a>
					</article>
				<?php endforeach; endif; ?>
			</div>
		</footer>

	</article>

<?php else: ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class("project flex-item hover-fixed hover-fixed__trigger"); ?>>
		<?php if (has_post_thumbnail()) : ?>
			<figure class="project__image hover-fixed__image">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; ?>
		<p class="project__category"><?php matheiken_first_category(); ?></p>
		<a href="<?php the_permalink(); ?>" class="project__link">
			<h4 class="project__title entry-title"><?= get_the_title() ?>&nbsp;<span class="arrow">&rarr;</span></h4>
			<p class="project__description">
				<?= get_the_excerpt() ?>
			</p>
		</a>
	</article>

<?php endif; ?>
