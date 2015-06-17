<?php
/**
 * @package tm_engage
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-news text-center section-padding' ); ?>>
	<header class="entry-header">

  <?php if( has_post_thumbnail( $post->ID ) ): ?>
  	<div>
	  <?php echo get_the_post_thumbnail( $post->ID ); ?>
	  </div>
	<?php else: ?>
		<img src="<?php echo get_template_directory_uri(); ?>/gui/feature-placeholder.png" alt="">
  <?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

	<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
