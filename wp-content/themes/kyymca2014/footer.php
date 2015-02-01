	</div>
</div>
</div>
	<div class="footer">
		<div class="row">
			<div class="col-sm-6">
				<div class="footer-left">
					<p>
						<?php $copyright = get_field('copyright', 'option'); if ( $copyright != NULL ) { ?><?php the_field('copyright', 'option') ?><br><?php } ?>
						<?php $organization = get_field('organization', 'option'); if ( $organization != NULL ) { ?><?php the_field('organization', 'option') ?><br><?php } ?>
						<?php $website = get_field('website', 'option'); if ( $website != NULL ) { ?><a href="http://<?php the_field('website', 'option') ?>"><?php the_field('website', 'option') ?></a><br><?php } ?>
						Web Development by <a href="http://www.ericpait.com">Eric Pait Visuals</a>
					</p>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="footer-right pull-right hidden-xs">
					<p>
						<?php $phone = get_field('contact_phone', 'option'); if ( $phone != NULL ) { ?><i class="fa fa-phone footer-icon"></i><span id="phoneFooter"><?php the_field('contact_phone', 'option') ?></span><br><?php } ?>
						<?php $email = get_field('contact_email', 'option'); if ( $email != NULL ) { ?><i class="fa fa-envelope-o footer-icon"></i><span id="emailFooter"><a href="mailto:<?php the_field('contact_email', 'option') ?>"><?php the_field('contact_email', 'option') ?></a></span><br><?php } ?>
						<?php $twitter = get_field('contact_twitter', 'option'); if ( $twitter != NULL ) { ?><i class="fa fa-twitter footer-icon"></i><span id="twitterFooter"><a target="_blank" href="http://twitter.com/<?php the_field('contact_twitter', 'option') ?>">@<?php the_field('contact_twitter', 'option') ?></a></span><br><?php } ?>
						<?php $facebook = get_field('contact_facebook', 'option'); if ( $facebook != NULL ) { ?><i class="fa fa-facebook footer-icon"></i><span id="fbFooter"><a target="_blank" href="http://facebook.com/<?php the_field('contact_facebook', 'option') ?>"><?php the_field('contact_facebook', 'option') ?></a></span><?php } ?>
					</p>
				</div>
				<div class="footer-right visible-xs">
					<p>
						<?php $phone = get_field('contact_phone', 'option'); if ( $phone != NULL ) { ?><i class="fa fa-phone footer-icon"></i><span id="phoneFooter"><?php the_field('contact_phone', 'option') ?></span><br><?php } ?>
						<?php $email = get_field('contact_email', 'option'); if ( $email != NULL ) { ?><i class="fa fa-envelope-o footer-icon"></i><span id="emailFooter"><a href="mailto:<?php the_field('contact_email', 'option') ?>"><?php the_field('contact_email', 'option') ?></a></span><br><?php } ?>
						<?php $twitter = get_field('contact_twitter', 'option'); if ( $twitter != NULL ) { ?><i class="fa fa-twitter footer-icon"></i><span id="twitterFooter"><a target="_blank" href="http://twitter.com/<?php the_field('contact_twitter', 'option') ?>">@<?php the_field('contact_twitter', 'option') ?></a></span><br><?php } ?>
						<?php $facebook = get_field('contact_facebook', 'option'); if ( $facebook != NULL ) { ?><i class="fa fa-facebook footer-icon"></i><span id="fbFooter"><a target="_blank" href="http://facebook.com/<?php the_field('contact_facebook', 'option') ?>"><?php the_field('contact_facebook', 'option') ?></a></span><?php } ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


	<!-- Scripts -->
		<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/layerslider/js/greensock.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/layerslider/js/layerslider.transitions.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
		<!--<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jtweetsanywhere-1.3.1.js"></script>-->
		<script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>
		<script type="text/javascript">
	      function hideURLbar() {
	        if (window.location.hash.indexOf('#') == -1) {
	          window.scrollTo(0, 1);
	        }
	      }

	      if (navigator.userAgent.indexOf('iPhone') != -1 || navigator.userAgent.indexOf('Android') != -1) {
	          addEventListener("load", function() {
	                  setTimeout(hideURLbar, 0);
	          }, false);
	      }
	    </script>
	    <script type="text/javascript" charset="utf-8">
	    	$(document).ready(function(){
		        // Calling LayerSlider on the target element
		        $('.layerslider').layerSlider({
		        	skinsPath: "<?php bloginfo('template_directory'); ?>/layerslider/skins/",
		        	skin: 'v5',
		        	showCircleTimer: false,
		        	thumbnailNavigation: 'disabled',
		        	navButtons: false,
		        	navStartStop: false,
		        	navPrevNext: false,
		        	pauseOnHover: false,
		        	animateFirstSlide: false
		        	// skin: 'noskin'
		            // Slider options goes here,
		            // please check the 'List of slider options' section in the documentation
		        });
		    });
	    </script>
		<div id="fb-root"></div>
		<script>
		// 	(function(d, s, id) {
		//  	var js, fjs = d.getElementsByTagName(s)[0];
		//   	if (d.getElementById(id)) return;
		//   	js = d.createElement(s); js.id = id;
		//   	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=248181015197587";
		//  	 fjs.parentNode.insertBefore(js, fjs);
		// 	}(document, 'script', 'facebook-jssdk'));
		</script>
		<?php wp_footer(); ?>
</body>
</html>