<?php
/*

 * Template Name: Services Page
 
*/

get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="services_section">
        <div class="container">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
            <ul>
			<?php 
				$args = array( 'post_type' => 'service', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
                if ( $post->post_parent == 0 ) {
				?>
                <li>
                    <div class="rect"></div>
                    <div class="srvc_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/srvc_icon.png" alt="srvc_icon" /></div>
                    <div class="srvc_details">
					<?php  ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('home_page_content',$post->ID); ?></p>
                        <a href="<?php the_permalink(); ?>">READ MORE</a>
						
                    </div>
                </li>
                <?php } endwhile; wp_reset_query(); ?>
            </ul>
        </div>
    </section>
<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>