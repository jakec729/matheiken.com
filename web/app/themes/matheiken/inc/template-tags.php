<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
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

if ( ! function_exists( 'matheiken_project_banner') ) :
	function matheiken_project_banner() {
		$images = get_field('project_banner');
		if ($images): foreach ($images as $image): ?>

			<figure class="post__image flex-expander">
				<a href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</a>	
				<? if($image['caption']): ?>			 
					<figcaption>
						<?php echo $image['caption']; ?> &rarr;
					</figcaption>
				<?php endif; ?>
			</figure>

		<?php endforeach; endif;
	}
endif;	

if ( ! function_exists( 'matheiken_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function matheiken_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'matheiken' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'matheiken' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'matheiken_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function matheiken_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'matheiken' ) );
		if ( $categories_list && matheiken_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'matheiken' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'matheiken' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'matheiken' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'matheiken' ), esc_html__( '1 Comment', 'matheiken' ), esc_html__( '% Comments', 'matheiken' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'matheiken' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function matheiken_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'matheiken_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'matheiken_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so matheiken_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so matheiken_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in matheiken_categorized_blog.
 */
function matheiken_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'matheiken_categories' );
}
add_action( 'edit_category', 'matheiken_category_transient_flusher' );
add_action( 'save_post',     'matheiken_category_transient_flusher' );

function matheiken_categories() {
	$categories = get_the_category();
	$separator = ' ';
	$output = '';
	
	if ( ! empty( $categories ) ) {
		foreach( $categories as $category ) {
			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
		}
		echo trim( $output, $separator );
	}
}

function matheiken_first_category() {
	$categories = get_the_category();
	$separator = ' ';
	$output = '';
	
	if ( ! empty( $categories ) ) {
		$category = $categories[0];
		$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
		echo trim( $output, $separator );
	}
}