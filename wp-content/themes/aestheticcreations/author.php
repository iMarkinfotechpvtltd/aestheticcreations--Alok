<?php
/**
 * The template part for displaying an Author 
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
get_header(); 

if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
    <section class="services_section">
        <div class="container">
             <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
            <div class="services-section-wrapper">
                <div class="row">
                    
                       
                    <div class="col-md-12">
                        <div class="services-right-side">
                            <div class="services-right-side-text auther_pg">
                               
                                <ul>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<li>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
								<?php the_title(); ?></a>,
								<?php the_time('d M Y'); ?> in <?php the_category('&');?>
								</li>

								<?php endwhile; wp_reset_query(); else: ?>
								<p><?php _e('No posts by this author.'); ?></p>

								<?php endif; ?>
								</ul>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>
        </div>
    </section>
<?php get_footer(); ?>
