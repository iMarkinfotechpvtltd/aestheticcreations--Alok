<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="blogs srch_rslts">
        <div class="container">
            <h2><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
            <div class="blog_outer">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blog_post">
						<?php 
						if ( have_posts() ) {
						while ( have_posts() ) : the_post(); ?>
						
                            <div class="cvr postcvr">                          
                                <div class="post_info_dtls">
                                    <h3><?php
										$thetitle = $post->post_title; /* or you can use get_the_title() */
										$getlength = strlen($thetitle);
										$thelength = 35; 
										echo substr($thetitle, 0, $thelength);
										if ($getlength > $thelength) echo "...";
										?>
									</h3>
                                    
                                    <p><?php  $content = get_the_content(); echo wp_trim_words( $content , '37' ); ?></p>
                                    <a class="rd_more" href="<?php the_permalink(); ?>">read more</a>
                                    
                                </div>
                            </div>
                           
                            <?php
							endwhile;
							wp_reset_query();
							
							} else {  ?>
							<div class="blog-content blog-search-rs">
                                        <div class="blog-descp">
                                            <h4>No Result found</h4>

                                        </div>
                                    </div>

                                    <?php }	
					?> 
					<?php if ( have_posts() ) {?>
                                            <div class="pagi-cvr">
                                                <?php
								if($loopb->max_num_pages>1){?>
                                                    <ul class="pagination">
                                                        <?php
							 if ($paged > 1) { ?>
                                                            <li><a href="<?php echo '?paged=' . ($paged -1); //prev link ?>"><i class="fa fa-chevron-left" aria-hidden="true"></a></i>
                                                            </li>
                                                            <?php }
						   for($i=1;$i<=$loopb->max_num_pages;$i++){?>
                                                                <li><a href="<?php echo '?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="selected"': '';?>><?php echo $i;?></a></li>
                                                                <?php
						   }
						   if($paged < $loopb->max_num_pages){?>
                                                                    <li><a href="<?php echo '?paged=' . ($paged + 1); //next link ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                                                                    <?php } ?>

                                                    </ul>

                                                    <?php } } ?>



                                            </div>
											
											<?php if ( have_posts() ) {?>

</div>
                                                <?php } ?>
                        
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
        </div>
    </section>

    <?php get_footer(); ?>