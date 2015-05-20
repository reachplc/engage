<?php
/**
 * The template for displaying all single posts.
 *
 * @package tm_engage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<div class="container section-padding-bottom">
					<div class="row">

			<?php if (is_single()) : ?>

				<div class="navigation col-md-10 col-md-offset-1">
					<?php previous_post_link('<div class="alignleft">Previous entry: %link</div>', '%title'); ?>
					<?php next_post_link('<div class="alignright">Next entry: %link</div>', '%title'); ?>
				</div>

			<?php else : ?>

				<div class="navigation col-md-10 col-md-offset-1">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</div>

			<?php endif; ?>

		</div>
			</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php #get_sidebar(); ?>
<?php get_footer(); ?>
