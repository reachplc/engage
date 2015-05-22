<?php
/**
 * @package tm_engage
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'news' ); ?>>

<header class="entry-meta">

  <?php if( has_post_thumbnail( $post->ID ) ): ?>
	  <?php echo get_the_post_thumbnail( $post->ID ); ?>
	<?php else: ?>
		<img src="<?php echo get_template_directory_uri(); ?>/gui/feature-placeholder.png" alt="">
  <?php endif; ?>

	<div class="container section-padding-top">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
		    <?php the_title( '<h1 class="entry-title arrow-pink text-center ">', '</h1>' ); ?>
				<div class="entry-meta">
				<?php tm_engage_posted_on(); ?>
				</div><!-- .entry-meta -->
	    </div>
		</div>
	</div>

	</header><!-- .entry-header -->



	<div class="entry-content container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<?php the_content(); ?>
		</div>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tm_engage' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container section-padding-bottom">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php tm_engage_entry_footer(); ?>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
