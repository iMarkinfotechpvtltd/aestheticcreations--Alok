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
                    <div class="col-md-9">
                        <div class="blog_post">
                            <div class="single_blog">
                                <div class="sngl_blg_img_outer">
                                    <div class="date1"><?php the_time('d') ?><span><?php the_time('M') ?></span></div>
                                    <?php if ( has_post_thumbnail() ) {
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'singleblogimage' );
									?>
									<img src="<?php echo $image[0]; ?>"/>
									<?php
									} else { ?>
									<img src="http://placehold.it/949x414&amp;text=No image found" alt="<?php the_title(); ?>" />
									<?php } ?> 
                                </div>
                                <ul>
                                    <li><i class="fa fa-calendar"></i><?php the_time('jS F, Y') ?> </li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('h : i A') ?></li>
                                    <li><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a></li>
                                    <li><i class="fa fa-comments" aria-hidden="true"></i><a href="#commentform" rel="category tag"><?php comments_number('No Comment', '1 Comment', '%'); ?></a></li>
                                </ul>
                                <?php the_content(); ?>
                                <span class="tags"> <i class="fa fa-tags"></i> <?php $tag = wp_get_post_tags($post->ID);
									if(!empty($tag)){	
			foreach($tag as $nreone) 
			{ ?>		
			<a href="<?php echo get_tag_link($nreone->term_id); ?>"><?php echo $nreone->name; ?></a>
		<?php }
			}else{
				
				echo"No Tags";
			}		?></span>
                                <ul class="btm_social">
                                    <li><?php echo do_shortcode('[wp_ulike]'); ?></li>
                                    <li><a href="#commentform" title=""> Comments <i class="fa fa-comments" aria-hidden="true"></i></a></li>									
                                    <li><?php echo do_shortcode('[addtoany]'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="sidebar1">
                            <div class="news-sidebar">

                                <div class="in_sidebar">
                                    <!-- SIDEBAR : begin -->
                         <form class="search-form" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input class="search-input" type="text" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                                    <h5>Categories</h5>
                                    <ul>
									<?php 
									$taxonomyName = "category";                 
								    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));
								    foreach ($parent_terms as $pterm) {  ?>
                                        <li class="cat-item cat-item-3"><a href="<?php echo get_term_link($pterm)?>"><?php echo $pterm->name ?></a>
                                        </li>
                                        <?php } wp_reset_query(); ?>
                                    </ul>

                                    <h5>Latest Blog</h5>
                                    <ul class="recent-post">
									<?php
										$args = array('post_type' => 'post','posts_per_page'=>5,'order'=>'DESC');
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
										<li>
                                            <div class="media-body">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><i class="fa fa-calendar"></i><?php the_time('j M, Y') ?></span></a>
                                            </div>
                                        </li>
                                     <?php	
										endwhile;
										wp_reset_query();
										?> 

                                    </ul>
                                    <!-- SIDEBAR : end -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment_section">
            <div class="container">   
            <?php comment_form(); ?>
            </div>
        </div>
    </section>
<?php	
endwhile;
wp_reset_query();
?>
<?php get_footer(); ?>
