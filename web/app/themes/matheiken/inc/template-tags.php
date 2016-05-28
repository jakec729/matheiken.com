<?php
/**
 * Custom template tags for this theme.
 *
 * @package Matheiken_Theme
 */

if ( ! function_exists( 'matheiken_featured_image') ) :
	function matheiken_featured_image() {
		if (has_post_thumbnail()) : ?>
			<figure class="post__image flex-expander">
				<?php 
				the_post_thumbnail(); 
				$caption = get_post( get_post_thumbnail_id() )->post_excerpt;
				 
				if ( $caption != "" ): ?>
					<figcaption>
						<?php echo $caption; ?> &rarr;
					</figcaption>
				<?php endif; ?>
			</figure>
		<?php endif;
	}
endif;	

if ( ! function_exists( 'matheiken_hero_image') ) :
	function matheiken_hero_image() {
		$images = get_field('hero_images');
		if ($images): foreach ($images as $image): ?>

			<figure class="post__image flex-expander">
				<a href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>	
				<?php if($image['caption']): ?>			 
					<figcaption>
						<?php echo $image['caption']; ?> &rarr;
					</figcaption>
				<?php endif; ?>
			</figure>

		<?php endforeach; endif;
	}
endif;	

if ( ! function_exists( 'matheiken_related_projects') ) :
	function matheiken_related_projects() {
		$posts = get_field('related_projects');
		if ($posts) : ?>
			<aside class="widget-related-projects">
				<h3 class="widget__heading">Related Projects</h3>
				<div class="projects flex-container">
					<?php foreach ($posts as $post) : setup_postdata($post); ?>
						<article class="project flex-item">
							<p class="project__category"><?php matheiken_categories(); ?></p>
							<a href="<?php the_permalink(); ?>" class="project__link">
								<h4 class="project__title"><?php the_title() ?>&nbsp;<span class="arrow">&rarr;</span></h4>
								<p class="project__description"><?php matheiken_excerpt(); ?></p>
							</a>
						</article>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</aside>
		<?php 
		endif;	
	}
endif;

if ( ! function_exists( 'matheiken_categories') ) :
	function matheiken_categories() {
		return the_category( ', ' );
	}
endif;

if ( ! function_exists( 'matheiken_excerpt') ) :
	function matheiken_excerpt() {
		return (get_field('project_short_description')) 
			? the_field('project_short_description') 
			: the_excerpt();
	}
endif;

if ( ! function_exists( 'matheiken_cover_photo') ) :
	function matheiken_cover_photo() {
		if (has_post_thumbnail()) : ?>
			<?php $position = (get_field('cover_photo_position')) ? get_field('cover_photo_position') : 'top-left'; ?>
			<figure class="project__image hover-fixed__image <?= 'hover-' . $position ?>">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; 
	}
endif;