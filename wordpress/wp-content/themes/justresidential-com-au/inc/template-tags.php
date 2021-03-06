<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package justresidential.com.au
 */

if ( ! function_exists( 'justresidential_com_au_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function justresidential_com_au_posted_on() {
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
		esc_html_x( '%s', 'post date', 'justresidential-com-au' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'justresidential-com-au' ),
		'<span class="author"><a class="url fn n" href="javascript:void(0);">' . esc_html( get_the_author() ) . '</a></span>'
	);
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'justresidential-com-au' ) );
		if ( $tags_list ) {
			$tags_post = sprintf(
			esc_html_x( '%s', 'post author', 'justresidential-com-au' ),
			'<span class="tags">' . $tags_list . '</span>'
			);
		}
	echo '<div class="vcard"><span class="time">' . $posted_on . '</span>' . $byline . ''.$tags_post.'</div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'justresidential_com_au_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function justresidential_com_au_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		/*$categories_list = get_the_category_list( esc_html__( ', ', 'justresidential-com-au' ) );
		if ( $categories_list && justresidential_com_au_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'justresidential-com-au' ) . '</span>', $categories_list ); 
		}*/

		/* translators: used between list items, there is a space after the comma */
		/*$tags_list = get_the_tag_list( '', esc_html__( ', ', 'justresidential-com-au' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'justresidential-com-au' ) . '</span>', $tags_list ); 
		}*/
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'justresidential-com-au' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function justresidential_com_au_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'justresidential_com_au_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'justresidential_com_au_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so justresidential_com_au_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so justresidential_com_au_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in justresidential_com_au_categorized_blog.
 */
function justresidential_com_au_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'justresidential_com_au_categories' );
}
add_action( 'edit_category', 'justresidential_com_au_category_transient_flusher' );
add_action( 'save_post',     'justresidential_com_au_category_transient_flusher' );
