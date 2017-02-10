<?php
/*

 * Template Name: Gallery Page
 
*/

get_header(); 
global $post;
?>

    <section class="gallery_view_section">
        <div class="container">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
						
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
							$posts = query_posts(array(
							'post_type'=>'gallry',
							'paged'=>$paged,
							'posts_per_page'=>17
							
							
							));?> 
                <?php 
						 $count = count($posts); 
						$i = 0;
				while (have_posts()) : the_post(); 
					if ($i == 0 || $i == 5 || $i == 9 || ($i > 10 && ($i - 4) % 5 == 0))
				//if ($i == 0 || $i == 5 || $i == 7 || ($i > 8 && ($i - 2) % 5 == 0))
 {
   echo '<ul>';
 }
				//$button_link=get_post_meta($post->ID, "button_link", true ); 	
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
				
        <li>  <a href="<?php echo $image[0]; ?>" class="fancybox" data-fancybox-group="gallery">
                        <div class="hexagon hexagon2">
                            <div class="hexagon-in1">
                                <div class="hexagon-in2">
								<img src="<?php echo $image[0]; ?>"/>
								
                                </div>
                            </div>
                        </div>
                    </a> 
        </li>
		<?php if ($i == 4 || $i == 8 || $i == $total - 1 || ($i > 8 && ($i - 4) % 5 == 4)) {
   echo '</ul>';
 }
 
 $i++;?>
	<?php    endwhile;
	?>		
			<?php 		wp_reset_query(); ?>
        </ul>
        </div>    
        </div>    
        </div>
        </section>

            
           
        </div>
    </section>
    <section class="video_section">
        <div class="container">
            <h2><?php the_field('radiesse_10_year',$post->ID) ?></h2>
			<div class="video-img">
                <?php the_field('video_link',$post->ID) ?>
			<?php // $videoID = get_post_meta($post->ID, 'video_link', true); ?>
			
			</div>

        </div>
    </section>
   


<?php get_footer(); ?>