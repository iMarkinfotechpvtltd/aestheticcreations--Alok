<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


     <!-- Bootstrap -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/fav_icon.png" type="image/x-icon">
	<?php wp_head(); ?>
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i" rel="stylesheet">
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=676909915815947";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="preloader">
        <span><img src="<?php echo get_template_directory_uri(); ?>/images/preloader.gif" alt="loading"></span>
    </div>
    <header>
        <div class="container-fluid">
            <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('logo','option');?>" alt="logo">Aesthetic Creations</a>
            <div class="custom_nav">
                <ul>
                   <?php 
					$defaults = array(
					'theme_location'  => '',
					'menu'            => 'header_menu',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => ''
					);
					wp_nav_menu( $defaults ); 
                   ?>
				   <li><a id="cntus" href="#cntct">Contact Us</a></li>
                </ul>
            </div>
            <div class="search-main">
                <form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <div class="search-icons"> <a class="search-btn active" href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a> <a class="search-close-btn" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a> </div>
                    <div class="search-field">
                        <div class="search-field-inner">
                            <input class="form-control" placeholder="Type what you're looking for and press Enter to search" name="s" id="s" value="<?php echo get_search_query(); ?>" type="text">

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </header>