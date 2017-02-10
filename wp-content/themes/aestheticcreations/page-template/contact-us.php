<?php
/*

 * Template Name: Contact Us Page
 
*/

get_header(); 
global $post;
?>
<?php while ( have_posts() ) : the_post(); ?>

   

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>