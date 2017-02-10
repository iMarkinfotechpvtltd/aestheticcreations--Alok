<?php
/*

 * Template Name: Testimonials Page
 
*/

get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="testimonial_page_section">
        <h2><?php the_title(); ?></h2>
        <div class="wrapper testss">
		<?php 
				 
				 $i==1;
                    $args = array('post_type' => 'testimonial','posts_per_page' => 5,'order' => 'DESC','offset'=> 0);
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
            <div class="testimonial_box">
               <?php the_content(); ?>
                <h3><?php the_title(); ?></h3>
            </div>
           <?php
                $i++;		   
				endwhile;
				wp_reset_query();
				?>
            <!--<a class="load_more_btn" href="#">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <br>load more
            </a>-->
			
			<!---------------loader------------------>
			<?php
			if($i==5){
			?>   
			<input type="hidden" name="page" class="pagination" value="1">
			<a class="load_more_btn" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> <br>load more</a><div id="loadingblog" style="display:none" align="center">
		   <img src="<?php echo  get_template_directory_uri(); ?>/images/kloader.gif" id="loadingblog">
			</div>
			<?php } ?> 
			<!---------------End loader------------------>
        </div>
    </section>
   

<?php endwhile; wp_reset_query(); ?>
<script>

jQuery(document).ready(function(){

	jQuery(".load_more_btn").each(function(){

		jQuery(this).click(function(){
            jQuery('#loadingblog').show();
			var class_section = jQuery(this).siblings(".pagination").val();
			var name = jQuery(".testss").attr("id");
			var page_value=parseInt(class_section)+1;
				
			//alert(class_section);
			// alert(page_value);
			// alert(name);
			jQuery.ajax({

			type: "GET",

			url:"<?php bloginfo('template_url'); ?>/ajax/testimonials.php",

			data:{page_value:page_value},

			success:function(abc) 

			{
					if(abc!="")
					{
						jQuery(abc).insertAfter(jQuery(".testimonial_box:last")).fadeIn('slow');

						jQuery(".pagination").val(page_value);
						jQuery("#loadingblog").hide();
					}
					else if(abc=="")
					{
						jQuery(".load_more_btn").hide();
						jQuery("#loadingblog").hide();
						
					}
			} 

			});

		});

	});

});

</script>
<?php get_footer(); ?>