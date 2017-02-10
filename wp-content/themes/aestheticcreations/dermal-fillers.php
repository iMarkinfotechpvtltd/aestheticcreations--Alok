<?php
/**
* WP Post Template: dermal-fillers page  
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
								 <button id = "toggle">Important Product Information</button>
                                 <div class="target" style="display:none;"><?php the_field('important_safety_information',$post->ID) ?></div> 
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