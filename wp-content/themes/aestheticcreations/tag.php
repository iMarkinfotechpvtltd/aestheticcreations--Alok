<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <section class="blogs single_blog_page">
            <div class="container">
                <h2><?php the_archive_title(); ?></h2>

                <!-- <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>-->
                <div class="blog_outer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog_post tg">
                                <div class="single_blog">
                                    <div class="sngl_blg_img_outer">
                                        <div class="date1">
                                            <?php the_time('d') ?><span><?php the_time('M') ?></span></div>
                                       <a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail() ) {
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'singleblogimage' );
									?>
                                            <img src="<?php echo $image[0]; ?>" />
                                            <?php
									} else { ?>
                                                <img src="http://placehold.it/949x414&amp;text=No image found" alt="<?php the_title(); ?>" />
                                                <?php } ?> </a>
                                    </div>

                                    <?php  $content = get_the_content(); echo wp_trim_words( $content , '50' ); ?>
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