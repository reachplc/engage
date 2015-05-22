<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm_engage
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header row">
				<?php
					the_archive_title( '<h1 class="page-title text-center arrow-pink">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description text-center">', '</div>' );
				?>
			</header><!-- .page-header -->

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
				<div class="navigation col-md-10 col-md-offset-1 section-padding-bottom">
				<?php the_posts_navigation(); ?>
				</div>
			</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php #get_sidebar(); ?>
<?php get_footer(); ?>
