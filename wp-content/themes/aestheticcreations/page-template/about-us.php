<?php
/*

 * Template Name: About Us Page
 
*/

get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="about_us">
        <div class="container">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
            <div class="full-area">
                <div class="left-area">
                <?php 
				$image = get_post_meta($post->ID,"about_us_image",true);
				$thumb = wp_get_attachment_image_src($image, 'full');
				if($thumb==""){
				?>
				<img src="http://placehold.it/582x647&amp;text=582x647" alt="about_img" />
				<?php }	else{  ?>
				<img src="<?php echo $thumb[0]; ?>" alt="about_img" />
				<?php } ?>
                </div>
                <div class="right-area cs-btn">
                    <div class="inner_area">
                        <?php the_field('about_us_section_text',$post->ID) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="choose_us">
        <div class="container">
            <h2><?php the_field('where_to_find_us',$post->ID) ?></h2>
            <div class="cover_box">
                <div class="area-left">
                    <p><?php the_field('where_to_find_us_for_description',$post->ID) ?></p>
                </div>
                <div class="area-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bravery_logo.jpg" alt="bravery_logo" />
                </div>
            </div>
        </div>
    </section>
    <section class="our_team">
        <div class="container">
            <h2>Our Team</h2>
            <div id="team">
			<?php
				$args = array('post_type' => 'team','posts_per_page'=>-1,'order'=>'DESC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
                <div class="item">
                    <div class="team_box">
                        <div class="info">
						<h3><?php the_title(); ?></h3>
                            <p><?php  $content = get_the_content(); echo wp_trim_words( $content , '10' ); ?></p>                           
                        </div>
                        <div class="member_img">
                            <div class="bg_img"></div>
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) {
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'teamimage' );
								?>
								<img src="<?php echo $image[0]; ?>"/>
								<?php
								} else { ?>
								<img src="http://placehold.it/150x150&amp;text=No image found" alt="<?php the_title(); ?>" />
								<?php } ?>   
                            </a>
                        </div>
                    </div>
                </div>
                <?php	
				endwhile;
				wp_reset_query();
				?> 
            </div>
            <div class="bottom_img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial_logo_img.png" alt="testimonial_logo_img" />
            </div>
        </div>
    </section>
   

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>