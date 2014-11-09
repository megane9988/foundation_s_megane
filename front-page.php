<?php
/**
 * front-page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package foundation_s_megane
 */

get_header(); ?>

	<div id="feature" class="promotion-area">
			<div class="feature-content">
				<a href="#">
					<h1 class="feature-content-title">fiwifwie</h1>
					<p class="feature-content-description">それは事実とにかくこの意味めというものの日にあらるで。よし当時を換言ごともとうとうこの専攻なでほどにするがみませをも相当なれますますて、始終には連れだたなな。がたのなるうのもあに今朝がいったいですうま</p>
				</a>
			</div>
	</div><!-- /.feature -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php megane9988_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
