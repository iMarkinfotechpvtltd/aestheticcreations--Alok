<?php
/**
* WP Post Template: Wellness page  
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
	<?php	
endwhile;
wp_reset_query();
?>

<?php get_footer(); ?>