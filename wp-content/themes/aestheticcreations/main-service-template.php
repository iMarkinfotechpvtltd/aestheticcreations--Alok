<?php
/**
* WP Post Template: Full content service template page  
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
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="services-left-side">
						<?php if ( has_post_thumbnail() ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'service1' );
						?>
						<img src="<?php echo $image[0]; ?>"/>
						<?php
						} else { ?>
						<img src="http://placehold.it/661x576&amp;text=No image found" alt="<?php the_title(); ?>" class="img-responsive" />
						<?php } ?>
                          
                        </div>

                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 pull-right">
                        <div class="services-right-side">
                            <div class="services-right-side-text drpdwn_innrtxt">
                               
                                 <?php the_content(); ?>

                            </div>

                        </div>

                    </div>

                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>
    <section class="brands-logo">
        <div class="container">
            <ul class="logo-img">
                <li>
                    <a href="<?php the_field('add_logo_first_link',$post->ID) ?>">
                        <?php
							$image=get_post_meta($post->ID,"add_logo_first",true);
							$thumb = wp_get_attachment_image_src($image, 'logosec' );?>
							<?php if($thumb==""){?>
							<img src="http://placehold.it/292x144&amp;text=No image found"/>
							<?php
							}else{?>
							<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>" class="img-responsive"><?php } ?></a>
                </li>

                <li>
                    <a href="<?php the_field('add_second_logo_link',$post->ID) ?>">
                        <?php
							$image=get_post_meta($post->ID,"add_second_logo",true);
							$thumb = wp_get_attachment_image_src($image, 'logosec' );?>
							<?php if($thumb==""){?>
							<img src="http://placehold.it/292x144&amp;text=No image found"/>
							<?php
							}else{?>
							<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>" class="img-responsive"><?php } ?></a>
                </li>

                <li>
                    <a href="<?php the_field('add_third_logo_link',$post->ID) ?>">
                        <?php
							$image=get_post_meta($post->ID,"add_third_logo",true);
							$thumb = wp_get_attachment_image_src($image, 'logosec' );?>
							<?php if($thumb==""){?>
							<img src="http://placehold.it/292x144&amp;text=No image found"/>
							<?php
							}else{?>
							<img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>" class="img-responsive"><?php } ?> </a>
                </li>
            </ul>
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