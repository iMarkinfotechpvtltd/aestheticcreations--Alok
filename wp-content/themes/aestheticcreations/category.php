<?php
/**
* A Simple Category Template
*/

get_header(); ?> 


    <section class="blogs">
        <div class="container">
            <h2><?php single_cat_title(); ?></h2>

            <div class="blog_outer">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blog_post">
						<?php while ( have_posts() ) : the_post(); ?>
                            <div class="cvr postcvr">
							
                                <div class="date1"><?php the_time('d') ?><span><?php the_time('M') ?></span></div>
                                <div class="post_image">
                                    <?php if ( has_post_thumbnail() ) {
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogimage' );
									?>
									<img src="<?php echo $image[0]; ?>"/>
									<?php
									} else { ?>
									<img src="http://placehold.it/438x348&amp;text=No image found" alt="<?php the_title(); ?>" />
									<?php } ?>  
                                </div>
                                <div class="post_info_dtls">
                                    <h3><?php
										$thetitle = $post->post_title; /* or you can use get_the_title() */
										$getlength = strlen($thetitle);
										$thelength = 35; 
										echo substr($thetitle, 0, $thelength);
										if ($getlength > $thelength) echo "...";
										?>
									</h3>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?php the_time('jS F, Y') ?></li>
                                        <li><i class="fa fa-calendar"></i><?php the_time('h : i A') ?></li>
                                        <li><i class="fa fa-user"></i><a href="javascript:void(0)" title="Posts by admin" rel="author"> <?php the_author() ?></a></li>
                                        <li><i class="fa fa-comments" aria-hidden="true"></i><a href="<?php comment_link(); ?>" rel="category tag"><?php comments_number('No Comment', '1 Comment', '%'); ?></a></li>
                                    </ul>
                                    <p><?php  $content = get_the_content(); echo wp_trim_words( $content , '19' ); ?></p>
                                    <a class="rd_more" href="<?php the_permalink(); ?>">read more</a>
                                    <span class="tags"> <i class="fa fa-tags"></i> <?php $tag = wp_get_post_tags($post->ID);
									foreach($tag as $nreone)
									{
										echo $nreone->name;
										
									}
									 ?>
                                      </span>
                                </div>
                            </div>
                            <?php	
endwhile;
wp_reset_query();
?>
                           
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
                                    <h5>Latest Post</h5>
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
    </section>


<?php get_footer(); ?>
