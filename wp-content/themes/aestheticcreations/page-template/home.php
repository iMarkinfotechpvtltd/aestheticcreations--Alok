<?php
/*

 * Template Name: Home Page
 
*/

get_header( 'home' );

global $post;
?>
    <?php while ( have_posts() ) : the_post(); ?>

        <section class="home-slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php	$args = array('post_type' => 'slider','posts_per_page'=>'6','order'=>'ASC');
					$loop = new WP_Query( $args );
					$i=0;
					while ( $loop->have_posts() ) : $loop->the_post();
					?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class=""></li>
                        <?php 
				$i++;
				endwhile; wp_reset_query(); ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php	
			$args = array('post_type' => 'slider','posts_per_page'=>'6','order'=>'ASC');
			$loop = new WP_Query( $args );
			$i=0;
			while ( $loop->have_posts() ) : $loop->the_post();
			
			if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'silder-image' );
			?>

                        <div class="item <?php if($i==0){echo 'active' ;}?>" style="background: url(<?php echo $image[0]; ?>);">
                            <?php
              } else { ?>
                                <img src="http://placehold.it/1920x962&amp;text=No image found" alt="<?php the_title(); ?>" class="img-responsive" />
                                <?php } ?>


                                    <div class="container">
                                        <div class="<?php 
						if($i==0 || $i==3) 
						{
							echo 'info-caption' ;
						}
						if($i==1 || $i==4 || $i==5)
						{
							echo 'info-caption1' ;
						}
						if($i==2)
						{	
							echo 'info-caption1 blk';
						}  
						?>">
                                            <h1><?php the_title();?></h1>
                                            <?php the_content();?>
                                                <div class=" <?php if($i==2){ echo 'combo-btns alt';}else { echo 'combo-btns';}?>">
                                                    <a href="#cntct">contact us</a>
                                                    <a href="tel:<?php the_field('banner_contact_number','option');?>">
                                                        <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="612px" height="439.485px" viewBox="0 86.258 612 439.485" enable-background="new 0 86.258 612 439.485" xml:space="preserve">
                                                            <g>
                                                                <path d="M588.075,199.311c-11.955-12.377-25.672-16.74-35.289-18.225c-8.256-62.36-15.939-94.828-275.988-94.828
		C16.75,86.258,0,125.46,0,193.498v11.605c0,18.411,14.925,33.336,33.336,33.336h83.427c18.411,0,33.336-14.925,33.336-33.336
		v-11.605c0-52.705,80.699-54.319,126.698-54.319c45.999,0,126.698,1.614,126.698,54.319v11.605
		c0,18.411,14.926,33.336,33.336,33.336h83.428c18.41,0,33.336-14.925,33.336-33.336v-4.464c6.146,1.51,13.908,4.794,20.777,11.905
		c16.746,17.347,22.305,50.861,16.068,96.927c-10.816,79.816-42.182,108.325-75.586,117.813v-13.886
		c0-14.098-3.523-28.051-10.668-40.242c-33.336-57.053-80.674-107.677-140.822-152.301v-33.717c0-2.619-2.145-4.762-4.764-4.762
		h-49.48c-2.667,0-4.762,2.143-4.762,4.762v33.527h-56.481v-33.527c0-2.619-2.143-4.762-4.762-4.762h-49.529
		c-2.62,0-4.762,2.143-4.762,4.762v33.527C128.581,265.384,81.195,316.007,47.81,373.156c-7.144,12.191-10.668,26.146-10.668,40.242
		v31.384c0,44.72,36.242,80.961,80.961,80.961h315.794c44.018,0,79.742-35.135,80.854-78.884
		c53.541-12.54,83.912-56.225,94.563-134.832C616.467,259.232,609.319,221.31,588.075,199.311z M358.727,414.231l-31.773-11.313
		c3.371-6.792,5.313-14.421,5.313-22.521c0-28.004-22.715-50.721-50.766-50.721c-28.003,0-50.767,22.717-50.767,50.721
		c0,28.051,22.764,50.768,50.767,50.768c10.371,0,20.003-3.121,28.038-8.453l17.428,28.648
		c-13.129,8.43-28.707,13.379-45.464,13.379c-46.576,0-84.294-37.767-84.294-84.342c0-46.528,37.718-84.293,84.294-84.293
		c46.576,0,84.341,37.766,84.341,84.293C365.842,392.438,363.276,403.867,358.727,414.231z" />
                                                            </g>
                                                        </svg>
                                                        <?php the_field('banner_contact_number','option');?>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                        </div>
                        <?php 
				$i++;
				endwhile; wp_reset_query(); ?>



                </div>
                <!--carousel-inner-->
            </div>
            <a class="scroll-down pulse" href="#main"><i class="fa fa-chevron-down"></i></a>
        </section>
        <section class="below_slider_info" id="main">

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <?php the_content(); ?>
                            <a class="cntct-btn" href="<?php the_field('link_contact_us',$post->ID) ?>">contact us</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="our_services">
            <div class="container">
                <?php the_field('our_services',$post->ID) ?>
                    <ul>
                        <?php 
				$args = array( 'post_type' => 'service', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
                if ( $post->post_parent == 0 ) {
				?>

                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="icon">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="538.114px" height="295.478px" viewBox="0 0 538.114 295.478" enable-background="new 0 0 538.114 295.478" xml:space="preserve">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#010101" d="M186.547,154.492c9.187-23.152,18.388-46.296,27.556-69.454
		c10.146-25.63,20.258-51.274,30.403-76.905c0.427-1.078,0.981-2.113,1.564-3.118c3.862-6.651,8.628-6.748,12.159,0.077
		c6.738,13.02,11.286,26.98,16.846,40.506c4.551,11.074,8.791,22.275,13.237,33.393c0.497,1.242,0.12,3.424,2.21,3.347
		c1.501-0.056,1.735-1.827,2.329-2.977c9.384-18.204,22.283-33.446,38.598-45.805C355.125,15.618,382.269,6.94,411.468,4.37
		c35.557-3.13,70.799-0.515,105.674,7.134c4.059,0.891,8.207,1.42,12.335,1.939c3.713,0.466,5.42,2.542,4.926,6.099
		c-2.691,19.361-2.118,38.866-2.739,58.318c-0.073,2.306-0.423,4.634-0.942,6.883c-0.483,2.095-1.735,3.581-4.242,3.351
		c-2.32-0.214-2.862-1.863-3.324-3.75c-1.271-5.19-0.611-10.58-2.044-15.807c-5.718-20.856-20.3-32.505-39.953-38.886
		c-26.369-8.562-53.234-10.291-80.223-3.878c-27.581,6.553-46.457,24.09-58.551,49.304c-8.348,17.406-11.549,36.071-12.379,55.126
		c-0.947,21.746,0.604,43.238,8.204,63.977c6.929,18.904,17.109,35.6,31.975,49.307c-0.78,2.619-2.282,1.49-3.715,0.717
		c-43.448-23.182-74.736-58.182-97.356-101.264c-10.279-19.58-17.143-40.669-24.561-61.469c-0.383-1.074-0.365-2.508-1.867-2.547
		c-1.23-0.03-1.389,1.213-1.723,2.137c-9.553,26.387-19.108,52.77-28.65,79.158c-0.107,0.297-0.038,0.658-0.051,0.99
		c-1.455,5.17-5.274,2.502-8.087,2.158c-1.843-0.225-3.541-1.678-5.613-1.553c-2.702-1.145-5.527-1.748-8.407-2.318
		C187.794,159.029,184.478,158.486,186.547,154.492z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#010101" d="M204.323,166.555c35.91,9.967,67.948,27.629,98.896,48.057
		c30.227,19.951,62.419,36.496,96.522,49.035c3.096,1.139,6.33,1.896,9.501,2.832c14.6,4.527,29.35,8.26,44.769,8.445
		c0.814,0.01,1.659-0.102,2.325,0.547c26.272,1.244,48.458-6.732,64.17-28.846c3.454-4.861,6.174-10.244,9.317-15.334
		c2.37-3.834,4.423-3.938,6.326,0.176c3.484,7.531,1.999,15.02-1.848,21.957c-8.229,14.838-21.566,23.678-36.728,30.047
		c-13.251,5.568-27.182,8.428-41.432,10.377c-14.619,2-29.233,1.961-43.793,0.951c-18.379-1.273-36.521-4.625-54.668-7.941
		c-39.159-7.154-71.885-27.867-104.659-48.545c-27.978-17.65-56.317-34.531-87.259-46.658c-19.615-7.688-39.984-12.406-60.57-16.371
		c-34.656-6.678-69.697-10.51-104.784-13.986c-0.603-0.885-0.597-1.668,0.39-2.285c0.613-0.059,1.227-0.084,1.844-0.078
		c13.52-1.455,27.146-2.049,40.597-3.746c14.905-1.881,29.801-1.838,44.688-1.943c15.599-0.111,31.257-0.625,46.818,1.422
		c4.948,0.65,9.95,0.828,14.944,0.801c13.709,1.5,27.313,3.594,40.605,7.406c0.775,0.223,1.645,0.057,2.467,0.09
		C196.343,165.031,200.771,164.381,204.323,166.555z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#020202" d="M189.842,282.816c-16.601-0.799-33.196-1.406-49.823-0.592
		c-9.129,0.447-18.281,0.432-27.424,0.574c-1.483,0.023-3.014-0.029-4.445-0.367c-1.937-0.459-3.257-1.604-2.993-3.904
		c0.242-2.117,1.747-2.732,3.485-2.877c3.31-0.275,6.631-0.404,9.947-0.592c12.552-0.709,20.943-7.607,26.729-18.189
		c7.202-13.176,11.406-27.598,16.992-41.447c1.92-4.762,3.83-9.537,5.477-14.398c0.895-2.648,2.016-2.906,4.379-1.688
		c5.896,3.037,11.852,5.971,17.9,8.684c2.512,1.127,2.521,2.434,1.72,4.697c-4.427,12.508-8.767,25.047-13.024,37.613
		c-1.279,3.775-2.217,7.682-2.418,11.691c-0.445,8.855,3.205,12.93,12.118,13.471c2.985,0.182,5.993-0.043,8.982,0.092
		c2.204,0.1,4.706,0.447,4.741,3.305c0.035,2.967-2.389,3.754-4.856,3.896C194.841,282.928,192.337,282.816,189.842,282.816z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#020202" d="M360.791,228.02c-4.104-6.322-8.021-12.818-10.533-19.971
		c-8.113-23.086-12.641-46.811-11.43-71.391c0.359-7.311,1.658-14.541,3.873-21.535c1.577-4.977,4.813-8.288,10.351-8.736
		c9.829-0.797,19.589,0.201,29.305,1.418c2.253,0.281,5.217,0.857,5.793,3.945c0.519,2.787-1.568,4.25-3.549,5.482
		c-14.142,8.811-19.643,22.887-23.024,38.109c-4.292,19.32-5.238,38.816-2.046,58.42c0.745,4.572,1.675,9.115,2.52,13.67
		C361.63,227.629,361.21,227.824,360.791,228.02z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <h4><?php the_title(); ?></h4>
                                    <p>
                                        <?php the_field('home_page_content',$post->ID); ?>
                                    </p>
                                    <span>READ MORE</span>
                                </a>
                            </li>
                            <?php } endwhile; wp_reset_query(); ?>
                    </ul>

                    <a class="view_btn" href="<?php the_field('our_services_link',$post->ID) ?>">view all</a>
            </div>
        </section>
        <section class="about_us abt_hm">
            <div class="container">
                <?php the_field('about_us_heading',$post->ID) ?>
                    <div class="full-area">
                        <div class="left-area">
                            <?php 
				$image = get_post_meta($post->ID,"about_us_image",true);
				$thumb = wp_get_attachment_image_src($image, 'full');
				if($thumb==""){
				?>
                                <img src="http://placehold.it/582x647&amp;text=582x647" alt="about_img" />
                                <?php }	else{  ?>
                                    <img src="<?php echo $thumb[0]; ?>" alt="about_img" />
                                    <?php } ?>

                        </div>
                        <div class="right-area cs-btn">
                            <div class="inner_area">
                                <p>
                                    <?php the_field('about_us_text',$post->ID) ?>
                                </p>
                                <a class="read_btn" href="<?php the_field('about_us_link',$post->ID) ?>">read more</a>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

        <section class="testimonial">
            <div class="container">
                <h2>Testimonials</h2>
                <div id="testimonial">
                    <?php	
				$args = array('post_type' => 'testimonial','posts_per_page'=>'5','order'=>'DESC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="item">
                            <div class="testim-box">
                                <p>
                                    <?php  $content = get_the_content(); echo wp_trim_words( $content , '70' ); ?>
                                </p>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial_logo_img.png" alt="testimonial-logo" />
                                <h3><?php the_title(); ?></h3>
                                <h4><?php the_field('designation',$post->ID) ?></h4>
                            </div>
                        </div>
                        <?php	
				endwhile;
				wp_reset_query();
				?>

                </div>
            </div>
        </section>
        <section class="blog_section">
            <div class="container">
                <?php the_field('blog_text',$post->ID) ?>
                    <div id="blogs">
                        <?php
				$args = array('post_type' => 'post','posts_per_page'=>-1,'order'=>'DESC');
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <div class="item">
                                <div class="box">
                                    <a class="cover" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-image' );
						?>
                                            <img src="<?php echo $image[0]; ?>" />
                                            <?php
						} else { ?>
                                                <img src="http://placehold.it/438x348&amp;text=No image found" alt="<?php the_title(); ?>" />
                                                <?php } ?>
                                    </a>
                                    <h3><?php
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 35; 
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?></h3>
                                    <ul>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> On
                                            <?php the_time('j F, Y') ?>
                                        </li>
                                        <li><i class="fa fa-user" aria-hidden="true"></i> Posted by
                                            <a href="javascript:void(0)">
                                                <?php the_author() ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <p>
                                        <?php  $content = get_the_content(); echo wp_trim_words( $content , '11' ); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="rd_more_btn">read more</a>
                                </div>
                            </div>
                            <?php	
				endwhile;
				wp_reset_query();
				?>
                    </div>
            </div>
        </section>
        <section class="get_social">
            <div class="container">
                <h2>Get Social With Us</h2>
                <ul>
                    <li class="wow bounceInUp" data-wow-delay="0s">
                        <a target="_blank" href="<?php the_field('facebook_link','option');?>">
                            <div class="scl_icon">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                            <span>facebook</span>
                        </a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.2s">
                        <a target="_blank" href="<?php the_field('twitter_link','option');?>">
                            <div class="scl_icon">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </div>
                            <span>twitter</span>
                        </a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.4s">
                        <a target="_blank" href="<?php the_field('instagram_link','option');?>">
                            <div class="scl_icon">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                            <span>instagram</span>
                        </a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.6s">
                        <a target="_blank" href="<?php the_field('youtube_link','option');?>">
                            <div class="scl_icon">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </div>
                            <span>you tube</span>
                        </a>
                    </li>
                    <li class="wow bounceInUp" data-wow-delay="0.8s">
                        <a target="_blank" href="<?php the_field('google_plus_link','option');?>">
                            <div class="scl_icon">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </div>
                            <span>Google+</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="gallery">
            <?php the_field('our_gallery_text',$post->ID) ?>
                <div class="gallery-wrap">
                    <aside class="one-third-section">
                        <figure class="first-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_first",true);
					$thumb = wp_get_attachment_image_src($image, 'firstimage' );?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/857x417&amp;text=No image found" alt="Not found" />
                                        <?php
					}else{?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                        <figure class="second-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_second",true);
					$thumb = wp_get_attachment_image_src($image, 'secimage' );?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/557x420&amp;text=No image found" alt="Not found" />
                                        <?php
					} else { ?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                        <figure class="third-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_third",true);
					$thumb = wp_get_attachment_image_src($image, 'thrimage' );?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/484x420&amp;text=No image found" alt="Not found" />
                                        <?php
					}else{?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                    </aside>
                    <aside class="one-fourth-section">
                        <figure class="fourth-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_forth",true);
					$thumb = wp_get_attachment_image_src($image, 'forimage' );?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/490x344&amp;text=No image found" alt="Not found" />
                                        <?php
					}else{?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                        <figure class="fifth-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_five",true);
					$thumb = wp_get_attachment_image_src($image, 'fivimage' );?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/712x347&amp;text=No image found" alt="Not found" />
                                        <?php
					}else{?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                        <figure class="sixth-block">
                            <?php
					$image=get_post_meta($post->ID,"gallery_image_six",true);
					$thumb = wp_get_attachment_image_src($image, 'siximage' ); ?>
                                <a href="<?php echo $url = $thumb['0'];?>" class="fancybox" data-fancybox-group="gallery">
                                    <?php if($thumb==""){?>
                                        <img src="http://placehold.it/320x346&amp;text=No image found" alt="Not found" />
                                        <?php
					}else{?>
                                            <img src="<?php echo $url = $thumb['0'];?>" alt="<?php the_title(); ?>">
                                            <?php } ?>
                                </a>
                        </figure>
                        <div class="gallery_view">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <a href="<?php the_field('link_for_gallery',$post->ID) ?>">view <br> more</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
        </section>
        <section class="news_feeds">
            <div class="container">
                <h2>Our Latest Feeds</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <fb:like-box href="https://www.facebook.com/AestheticCreationsLA" width="490" show_faces="true" stream="true" header="true"></fb:like-box>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="twitter">
                            <a class="twitter-timeline" href="https://twitter.com/aestheticLA" style="width:30%;">Tweets by @aestheticLA</a>
                            <script>
                                ! function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0],
                                        p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + "://platform.twitter.com/widgets.js";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, "script", "twitter-wjs");
                            </script>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <!-- InstaWidget -->
                        <div class="instagram-feed">
                            <a href="https://instawidget.net/v/user/aestheticcreationsla" id="link-503599ec85c4690bedeb0df66e5cbf3718902e0f7f838129c5add7e34b35fe6c">@aestheticcreationsla</a>
                            <script src="https://instawidget.net/js/instawidget.js?u=503599ec85c4690bedeb0df66e5cbf3718902e0f7f838129c5add7e34b35fe6c&width=350px"></script>
                        </div>
                    </div>
                </div>
            </div>





        </section>

        <?php endwhile; wp_reset_query(); ?>

            <?php get_footer(); ?>