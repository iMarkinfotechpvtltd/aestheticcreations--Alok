<?php
/**
* WP Post Template: Content and slider without logos template service page  
*/
get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="services_section">
        <div class="container">
             <h2><?php the_title(); ?></h2>
            <div class="services-section-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-right-side">
                            <div class="services-right-side-text drpdwn_innrtxt">
                               
                                 <?php the_content(); ?>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>
        </div>
    </section>
    <section class="portfolio">
        <div class="container">
            <h4><?php the_field('before_and_after_pictures',$post->ID) ?></h4>
            <div class="owl-carousel" id="pictures">
			<?php if( have_rows('add_images_for_slider') ): ?>
			<?php while( have_rows('add_images_for_slider') ): the_row(); 
			// vars
			$image = get_sub_field('add_image_number');
		    ?>
                <div class="item">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                </div>
                <?php endwhile; ?>
				<?php endif; ?>
				
            </div>

        </div>


    </section>
	<?php	
endwhile;
wp_reset_query();
?>

<?php get_footer(); ?>