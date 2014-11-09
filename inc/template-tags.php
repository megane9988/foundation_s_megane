<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package foundation_s_megane
 */

if ( ! function_exists( 'foundation_s_megane_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function foundation_s_megane_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'foundationfoundation_s_megane_megane' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'foundationfoundation_s_megane_megane' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'foundation_s_megane_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function foundation_s_megane_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">前の記事 : %link</div>', _x( '%title', 'Previous post link', 'foundationfoundation_s_megane_megane' ) );
				next_post_link(     '<div class="nav-next">次の記事 : %link</div>',     _x( '%title', 'Next post link',     'foundationfoundation_s_megane_megane' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'foundation_s_megane_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function foundation_s_megane_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		_x( '<i class="fa fa-calendar"></i> %s', 'post date', 'foundationfoundation_s_megane_megane' ),
		$time_string
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'foundation_s_megane_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function foundation_s_megane_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ' | ', 'foundationfoundation_s_megane_megane' ) );
		if ( $categories_list && foundation_s_megane_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( '<i class="fa fa-folder-open-o"></i> %1$s') . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' | ') );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( '<i class="fa fa-tags"></i> %1$s' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'foundationfoundation_s_megane_megane' ), __( '1 Comment', 'foundationfoundation_s_megane_megane' ), __( '% Comments', 'foundationfoundation_s_megane_megane' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'foundationfoundation_s_megane_megane' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function foundation_s_megane_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'foundation_s_megane_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'foundation_s_megane_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so foundation_s_megane_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so foundation_s_megane_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in foundation_s_megane_categorized_blog.
 */
function foundation_s_megane_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'foundation_s_megane_categories' );
}
add_action( 'edit_category', 'foundation_s_megane_category_transient_flusher' );
add_action( 'save_post',     'foundation_s_megane_category_transient_flusher' );
