<?php
/**
* Template part for displaying page content in page.php.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Matheiken_Theme
*/

?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>> -->
	<header class="post__header">
		<div class="flex-expander">
			<?php matheiken_featured_image(); ?>
			<?php the_title('<h1 class="post__title entry-title flex-expander">', '</h1>'); ?>
		</div>
	</header>
	<section class="post__details">
		<?php if (is_dynamic_sidebar('about_sidebar')): ?>
		<aside class="post__sidebar sidebar">
			<div class="widget-wrap clearfix">
				<div class="inner">
					<?php dynamic_sidebar('about_sidebar'); ?>
					<div class="sidebar__widget social">
						<ul class="list-unstyled list--social">
							<li><a href="#"><i class="fa fa-fw fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-tumblr"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-vimeo"></i></a></li>
							<li><a href="#"><i class="fa fa-fw fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</aside>
		<?php endif; ?>

		<div class="post__content">
			<?php the_content(); ?>
		</div>
	</section>
<!-- </article> -->