<?php
/**
 * Template Name: Home Page
 *
 * @package tm_engage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php module( 'hero' ); ?>

			<?php module( 'intro' ); ?>

			<?php module( 'news' ); ?>

			<?php module( 'clients' ); ?>

			<?php module( 'portfolio' ); ?>

			<?php module( 'philosophy' ); ?>

			<?php module( 'special' ); ?>

			<?php module( 'cta' ); ?>

			<?php module( 'subscribe' ); ?>

			<?php module( 'contact' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
