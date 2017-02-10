<?php
include('../../../../wp-config.php');
?>
<?php 
$count=5;
$offSet=$_GET['page_value'];
$offSet = ( $offSet - 1 ) * $count; 

$args = array ( 'post_type' => 'testimonial','ORDER' => 'DESC','showposts'=>$count,'offset'=>$offSet  );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
  ?>
               <div class="testimonial_box">
               <?php the_content(); ?>
                <h3><?php the_title(); ?></h3>
            </div>
<?php endwhile; wp_reset_query(); ?>