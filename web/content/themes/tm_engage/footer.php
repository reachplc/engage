<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tm_engage
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	  <div class="container site-info">
	    <div class="row">
	      <div class="col-xs-6">
	        <div class="footer_logo">
	        <img src="<?php echo esc_url( get_template_directory_uri() . '/gui/tm_logo.png' ); ?>" alt="Trinity Mirror">
	      </div>
	      </div>
	      <div class="col-xs-6 credit">
	        <p>Trinity Mirror Creative</em></a></p>
	      </div>
	    </div>
	  </div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Preloader -->
<script type="text/javascript">
	//<![CDATA[
	;(function( $ ){
	$(window).load(function() { // makes sure the whole site is loaded
	  $('#status').fadeOut(); // will first fade out the loading animation
	  $('#preloader').delay(1000).fadeOut('slow'); // will fade out the white DIV that covers the website.
	  $('body').delay(1000).css({'overflow':'visible'});
	})
	})( jQuery );
	//]]>
</script>


<script>
;(function( $ ){
	$(document).ready(function(e) {
	$("img.lazy").lazyload();
	});
})( jQuery );
</script>

<!-- Control the camera slider -->
<script>
			   (function($){
				jQuery('#engage-hero').camera({
				  height: 'auto',
				  navigation: false,
				  loader: 'none',
				  slideOn: 'left',
				  fx: 'scrollLeft',
				  overlayer: true,
				  playPause: false,
				  hover: false,
				  pagination: false
				});
			   })(jQuery);
</script>

</body>
</html>
