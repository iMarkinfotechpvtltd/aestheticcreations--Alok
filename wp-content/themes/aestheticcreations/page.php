<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <section class="services_section">
        <div class="container">
             <h2><?php the_title(); ?></h2>
            <div class="services-section-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-right-side">
                            <div class="services-right-side-text">
                               
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
