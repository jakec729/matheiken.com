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
		<?php matheiken_hero_image(); ?>
			
		<header class="post__header">
			<?php the_title('<h1 class="post__title entry-title flex-expander">', '</h1>'); ?>
		</header>

		<?php if (is_dynamic_sidebar('about_sidebar')): ?>
		<aside class="post__sidebar sidebar">
			<div class="widget-wrap clearfix">
				<div class="inner">
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