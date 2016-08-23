<?php
/**
 * The template for displaying contact module.
 *
 * @package tm_engage
 */

?>
<section class="dark-bg text-center section-padding contact-wrap" id="contact"> <a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="arrow">Drop us a line</h1>
			</div>
		</div>
		<div class="row contact-details">
			<div class="col-md-4 wp6 delay-05s">
				<div class="light-box box-hover">
					<h2><i class="fa fa-map-marker"></i><span>Address</span></h2>
					<p>Mitchell Henry House<br>
		 Hollinwood Avenue<br>
		 Chadderton<br>
		 Oldham, OL9 8EF</p>
				</div>
			</div>
			<div class="col-md-4 wp6 delay-1s">
				<div class="light-box box-hover">
					<h2><i class="fa fa-mobile"></i><span>Phone</span></h2>
					<p>+44 (0)161 829 3322</p>
				</div>
			</div>
			<div class="col-md-4 wp6 delay-1-5s">
				<div class="light-box box-hover">
					<h2><i class="fa fa-linkedin"></i><span>Linkedin</span></h2>
					<p><?php if ( get_theme_mod( 'linkedin' ) ) : ?><a href="<?php echo esc_url( get_theme_mod( 'linkedin' ) ); ?>" target="_blank">Keep up with Engage</a><?php endif; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="social-buttons">
					<?php if ( get_theme_mod( 'linkedin' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'linkedin' ) ); ?>" target="_blank" class="social-btn"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'facebook' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>" class="social-btn" target="_blank"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'twitter' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>" class="social-btn" target="_blank"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if ( get_theme_mod( 'email' ) ) : ?><li><a href="<?php echo esc_url( get_theme_mod( 'email' ) ); ?>" target="_top" class="social-btn"><i class="fa fa-envelope"></i></a></li><?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
