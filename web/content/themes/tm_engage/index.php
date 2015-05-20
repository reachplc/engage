<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm_engage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container section-padding" role="main">


		<?php if ( have_posts() ) : ?>
			<div class="row">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-sm-4 col-md-4">

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>
			</div>
			<?php endwhile; ?>
			</div>

		<div class="row">

			<?php if (is_single()) : ?>

				<div class="navigation  col-md-10 col-md-offset-1">
					<?php previous_post_link('<div class="alignleft">Previous entry: %link</div>', '%title'); ?>
					<?php next_post_link('<div class="alignright">Next entry: %link</div>', '%title'); ?>
				</div>

			<?php else : ?>

				<div class="navigation  col-md-10 col-md-offset-1">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</div>

			<?php endif; ?>

		</div>

		<?php else : ?>
		<div class="row">
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		</div>
		<?php endif; ?>

		</div><!-- .row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php #get_sidebar(); ?>
<?php get_footer(); ?>
