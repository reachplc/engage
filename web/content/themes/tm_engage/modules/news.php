<?php
/**
 * The template for displaying portfolio module.
 *
 * @package tm_engage
 */


$post_type = 'post';
$news_args = array(
  'numberposts' => 3,
  'offset' => 0,
  'category' => 0,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'post_type' => $post_type,
  'post_status' => 'publish',
  'suppress_filters' => true );

  $recent_news = get_posts( $news_args );


?>

<?php if( $recent_news ): // Check for news posts ?>

<section class="news text-center section-padding" id="blog">
<div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h1 class="arrow-pink"><span class="magenta">Engage:</span> Our Blog.</h1>
    </div>
  </div><!-- .row -->
    <div class="clearfix"></div>
    <div class="row">
      <div>
<?php foreach( $recent_news as $post) : setup_postdata($post);?>
            <div class="col-sm-4 col-md-4 wp5 delay-05s">
              <div class="overlay-effect effects clearfix">

                	<a href="<?php echo get_permalink( $post->ID ) ?>">
                	<div class="img">
                	<?php if( has_post_thumbnail( $post->ID ) ): ?>
		                <?php echo get_the_post_thumbnail( $post->ID ); ?>
	                <?php else: ?>
	                  <img src="<?php echo get_template_directory_uri(); ?>/gui/feature-placeholder.png" alt="">
	                <?php endif; ?>
                  <div class="overlay">
                    <div class="info-dump-button expand"><i class="fa fa-newspaper-o"></i><br>
                      Read More</div>
                  </div>
                </div></a>

              </div>
              <h2><a href="<?php echo get_permalink( $post->ID ) ?>"><?php echo get_the_title( $post->ID ); ?></a></h2>
              <?php the_excerpt(); ?>
            </div>
<?php endforeach; wp_reset_postdata(); ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <a class="btn btn--primary btn-lg" href="<?php echo get_permalink( get_page_by_path( 'news' ) ) ?>">Blog Archive</a>

    </div>
  </div><!-- .container -->
</section>

<?php endif; ?>
