<?php
/**
* WP Post Template: Neuromodulators page  
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

	<?php	
endwhile;
wp_reset_query();
?>

<?php get_footer(); ?>