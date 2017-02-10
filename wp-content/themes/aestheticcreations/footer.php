<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
    <a id="cntct"></a>
    <section class="contact_section">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="wrap">
                <div class="contact_area">
                    <?php echo do_shortcode( '[contact-form-7 id="1234" title="Contact form"]' ); ?>
                </div>
                <div class="address_area">
                    <div class="contact_details">
                        <div class="row1">
                            <div class="icn"><img src="<?php echo get_template_directory_uri(); ?>/images/map_marker.png" alt="map_marker"></div>
                            <p><span>Address:</span>
                                <?php the_field('address','option');?>
                            </p>
                        </div>
                        <div class="row1">
                            <div class="icn">&nbsp;</div>
                            <a class="get_btn" target="_blank" href="<?php the_field('get_direction_link','option');?>">
                                <?php the_field('get_directions','option');?>
                            </a>
                        </div>
                        <div class="row1">
                            <div class="icn">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="612px" height="439.485px" viewBox="0 86.258 612 439.485" enable-background="new 0 86.258 612 439.485" xml:space="preserve">
                                    <g>
                                        <path d="M588.075,199.311c-11.955-12.377-25.672-16.74-35.289-18.225c-8.256-62.36-15.939-94.828-275.988-94.828
		C16.75,86.258,0,125.46,0,193.498v11.605c0,18.411,14.925,33.336,33.336,33.336h83.427c18.411,0,33.336-14.925,33.336-33.336
		v-11.605c0-52.705,80.699-54.319,126.698-54.319c45.999,0,126.698,1.614,126.698,54.319v11.605
		c0,18.411,14.926,33.336,33.336,33.336h83.428c18.41,0,33.336-14.925,33.336-33.336v-4.464c6.146,1.51,13.908,4.794,20.777,11.905
		c16.746,17.347,22.305,50.861,16.068,96.927c-10.816,79.816-42.182,108.325-75.586,117.813v-13.886
		c0-14.098-3.523-28.051-10.668-40.242c-33.336-57.053-80.674-107.677-140.822-152.301v-33.717c0-2.619-2.145-4.762-4.764-4.762
		h-49.48c-2.667,0-4.762,2.143-4.762,4.762v33.527h-56.481v-33.527c0-2.619-2.143-4.762-4.762-4.762h-49.529
		c-2.62,0-4.762,2.143-4.762,4.762v33.527C128.581,265.384,81.195,316.007,47.81,373.156c-7.144,12.191-10.668,26.146-10.668,40.242
		v31.384c0,44.72,36.242,80.961,80.961,80.961h315.794c44.018,0,79.742-35.135,80.854-78.884
		c53.541-12.54,83.912-56.225,94.563-134.832C616.467,259.232,609.319,221.31,588.075,199.311z M358.727,414.231l-31.773-11.313
		c3.371-6.792,5.313-14.421,5.313-22.521c0-28.004-22.715-50.721-50.766-50.721c-28.003,0-50.767,22.717-50.767,50.721
		c0,28.051,22.764,50.768,50.767,50.768c10.371,0,20.003-3.121,28.038-8.453l17.428,28.648
		c-13.129,8.43-28.707,13.379-45.464,13.379c-46.576,0-84.294-37.767-84.294-84.342c0-46.528,37.718-84.293,84.294-84.293
		c46.576,0,84.341,37.766,84.341,84.293C365.842,392.438,363.276,403.867,358.727,414.231z" />
                                    </g>
                                </svg>
                            </div>
                            <p><span>Phone:</span>
                                <?php the_field('phone_number','option');?>
                            </p>
                        </div>
                        <div class="row1">
                            <div class="icn"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <p><span>Email:</span>
                                <a href="mailto:<?php the_field('email_address','option');?>">
                                    <?php the_field('email_address','option');?>
                                </a>
                            </p>
                        </div>
                        <div class="connect">
                            <p>
                                <?php the_field('connect_with_us_text','option');?>
                            </p>
                            <ul>
                                <li>
                                    <a target="_blank" href="<?php the_field('facebook_link','option');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php the_field('twitter_link','option');?>"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php the_field('instagram_link','option');?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>

                                <li>
                                    <a target="_blank" href="<?php the_field('youtube_link','option');?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php the_field('google_plus_link','option');?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                            <p class="copyright">Copyright &copy;
                                <?php the_time('Y'); ?> All Rights Reserved | powered by <a href="http://www.imarkinfotech.com/" target="_blank">iMarkInfotech</a>
                            </p>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <?php wp_footer(); ?>
	
	<script>
		// jQuery(window).on('load resize', function () {
			// var common_height = jQuery(".post_image").height();
			// jQuery(".post_info_dtls").css('height', common_height);
		// });
	</script>
	<script>
	jQuery('.cvr').each(function(){  
     var $columns = jQuery('.post_info_dtls',this);
     var $image = jQuery('.abcd',this);
	 console.log($image);
	 //var image_id =	jQuery(this).attr("data-id");
	 //console.log(image_id);
     var maxHeight = Math.max.apply(Math, $columns.map(function(){
         return jQuery(this).height();
     }).get());
	 var dataList = jQuery(".abcd").map(function() {
		return jQuery(this).data("id");
	}).get();	 
     $columns.height(maxHeight);
     $image.height(maxHeight+24);
	
});
		// (function (jQuery) {
			// jQuery(window).on("load", function () {
				// jQuery(".post_info_dtls").mCustomScrollbar({
					// theme: "minimal-dark"
				// });
			// });
		// })(jQuery);
	</script>

		
        </body>

        </html>