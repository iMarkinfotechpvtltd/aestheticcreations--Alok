<?php
/*

 * Template Name: Blog Page
 
*/

get_header(); 
global $post;
?>
    <?php while ( have_posts() ) : the_post(); ?>
        <section class="blogs">
            <div class="container">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                    <div class="blog_outer">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <?php 
						$i==1;
						$args = array('post_type' => 'post','posts_per_page' => 5,'order' => 'DESC','offset'=> 0);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						?>
                                        <div class="cvr postcvr" >
                                            <div class="date1">
                                                <?php the_time('d') ?><span><?php the_time('M') ?></span></div>
                                            <div class="post_image">
                                                <?php if ( has_post_thumbnail() ) {
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blogimage' );
									?>
                                                    <img src="<?php echo $image[0]; ?>" class="abcd" id="<?php echo $post->ID; ?>" data-id="<?php echo $post->ID; ?>"  />
                                                    <?php
									} else { ?>
                                                        <img src="http://placehold.it/438x348&amp;text=No image found" alt="<?php the_title(); ?>" />
                                                        <?php } ?>
                                            </div>
                                            <div class="post_info_dtls" data-id=<?php echo $post->ID; ?> >
                                                <h3><?php
														$thetitle = $post->post_title; /* or you can use get_the_title() */
														$getlength = strlen($thetitle);
														$thelength = 35; 
														echo substr($thetitle, 0, $thelength);
														if ($getlength > $thelength) echo "...";
													?>
												</h3>
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i>
                                                        <?php the_time('jS F, Y') ?>
                                                    </li>
                                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        <?php the_time('h : i A') ?>
                                                    </li>
                                                    <li><i class="fa fa-user"></i>
                                                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a>
                                                    </li>
                                                    <br>
                                                    <li><i class="fa fa-comments" aria-hidden="true"></i>
                                                        <a href="<?php comment_link(); ?>" rel="category tag">
                                                            <?php comments_number('No Comment', '1 Comment', '%'); ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p>
                                                    <?php  $content = get_the_content(); echo wp_trim_words( $content , '22' ); ?>
                                                </p>
                                                <a class="rd_more" href="<?php the_permalink(); ?>">read more</a>
                                                <span class="tags"> <i class="fa fa-tags"></i> <?php $tag = wp_get_post_tags($post->ID);
			if(!empty($tag)){	
			foreach($tag as $nreone) 
			{ ?>		
			<a href="<?php echo get_tag_link($nreone->term_id); ?>"><?php echo $nreone->name; ?></a>
		<?php }
			}else{
				
				echo"No Tags";
			}		?>
							
                                      </span>
                                            </div>
                                        </div>
                                        <?php
							$i++;
							endwhile;
							wp_reset_query();
							?>
                                            <?php
			if($i==5){
			?>
                                                <input type="hidden" name="page" class="pagination" value="1">
                                                <a class="load_more_btn" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i> <br>load more</a>
                                                <div id="loadingblog" style="display:none" align="center">
                                                    <img src="<?php echo  get_template_directory_uri(); ?>/images/kloader.gif" id="loadingblog">
                                                </div>
                                                <?php } ?>
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
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?><span><i class="fa fa-calendar"></i><?php the_time('j M, Y') ?></span></a>
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


        <?php endwhile; wp_reset_query(); ?>
            <script>
                jQuery(document).ready(function () {

                    jQuery(".load_more_btn").each(function () {

                        jQuery(this).click(function () {
                            jQuery('#loadingblog').show();
                            var class_section = jQuery(this).siblings(".pagination").val();
                            var name = jQuery(".blog_post").attr("id");
                            var page_value = parseInt(class_section) + 1;

                            //alert(class_section);
                            // alert(page_value);
                            // alert(name);
                            jQuery.ajax({

                                type: "GET",

                                url: "<?php bloginfo('template_url'); ?>/ajax/blog.php",

                                data: {
                                    page_value: page_value
                                },

                                success: function (abc)

                                {
                                    if (abc != "") {
                                        jQuery(abc).insertAfter(jQuery(".postcvr:last")).fadeIn('slow');

                                        jQuery(".pagination").val(page_value);
                                        jQuery("#loadingblog").hide();
                                    } else if (abc == "") {
                                        jQuery(".load_more_btn").hide();
                                        jQuery("#loadingblog").hide();

                                    }
                                }

                            });

                        });

                    });

                });
            </script>
            <?php get_footer(); ?>