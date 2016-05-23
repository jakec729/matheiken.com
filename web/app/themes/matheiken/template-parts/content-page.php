<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Matheiken_Theme
*/

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<section class="post__hero">
			<?php matheiken_hero_image(); ?>
		</section>
			
		<header class="post__header">
			<?php the_title('<h1 class="post__title entry-title flex-expander">', '</h1>'); ?>
		</header>

		<?php if (is_dynamic_sidebar('about_sidebar')): ?>
		<aside class="post__sidebar sidebar">
			<div class="widget-wrap clearfix">
				<div class="inner">
					<div class="sidebar__widget widget-social">
						<ul class="list-unstyled list-flex list--social">
							<li><a href="#"><i class="fa fa-fw fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-tumblr"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-vimeo"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-linkedin"></i></a></li>
						</ul>
					</div>
					<?php dynamic_sidebar('about_sidebar'); ?>
				</div>
			</div>
		</aside>
		<?php endif; ?>

		<section class="post__content">
			<?php the_content(); ?>
		</section>

		<div style="clear: both;"></div>
	</article>