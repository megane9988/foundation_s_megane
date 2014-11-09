<?php
/**
 * @package foundation_s_megane
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="thumbnail">
		<a href="<?php the_permalink(); ?>"><?php
if (has_post_thumbnail()) {
	the_post_thumbnail( 'thumbnail','');
}else {
	echo '<img src="http://placehold.it/150x150/444/444&text=coccot" />';
}
?></a>
	</div><!-- /.thumb -->
	<div class="post_info">
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php foundation_s_megane_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>
	</div><!-- /.post_info -->
</article><!-- #post-## -->