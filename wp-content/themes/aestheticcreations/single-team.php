<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="blogs single_blog_page">
        <div class="container">
            <h2><?php the_title(); ?></h2>
           <!-- <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>-->
            <div class="blog_outer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog_post">
                            <div class="single_blog">
                                
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
