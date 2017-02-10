<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header' => __( 'Header Menu', 'twentysixteen' ),
		//'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

/*--------------------LOGO --------------*/
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; background-size: 23% auto !important;box-shadow: none !important; height: 76px !important; outline: medium none !important; width: auto !important;}
</style>';
}
add_action('login_head', 'custom_loginlogo');

function my_login_logo_url() {
   return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
   return 'Aesthetic Creations';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*--------------------/LOGO --------------*/

/*----------------------Image size---------------------*/
add_image_size( 'slider-image', 1920, 963, true );
add_image_size( 'about-image', 582, 647, true );
add_image_size( 'blog-image', 438, 348, true );
add_image_size( 'singleblogimage', 949, 414, true );
add_image_size( 'blogimage', 336, 258, true );
add_image_size( 'firstimage', 857, 417, true );
add_image_size( 'secimage', 557, 420, true );
add_image_size( 'thrimage', 484, 420, true );
add_image_size( 'forimage', 490, 344, true );
add_image_size( 'fivimage', 712, 347, true );
add_image_size( 'siximage', 320, 346, true );
add_image_size( 'teamimage', 150, 150, true );
add_image_size( 'teamimage', 150, 150, true );
add_image_size( 'service1', 661, 576, true );
add_image_size( 'logosec', 292, 144, true );

/**************testimonials post*****************/
function post_testimonial() {
  $labels = array(
    'name'               => _x( 'Testimonials', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Testimonial' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonial' ),
    'search_items'       => __( 'Search Testimonials' ),
    'not_found'          => __( 'No testimonials found' ),
    'not_found_in_trash' => __( 'No testimonials found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our testimonial and testimonial specific data',
    'public'        => true,
    'menu_position' => null,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' , 'author'),
    'has_archive'   => true,
  );
  register_post_type( 'testimonial', $args ); 
}
add_action( 'init', 'post_testimonial' );


/************slider post**************/
add_action( 'init', 'Slider_init' );
function Slider_init() {
	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Sliders', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Sliders', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Sliders', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Sliders', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Sliders', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Sliders', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Sliders', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Sliders', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Sliders', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Sliders', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Sliders:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Sliders found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Sliders found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'Slider_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'Slider', $args );
}

/************services post**************/

/*
function my_custom_post_service() {
$labels = array(
  'name' => 'service',
  'singular_name' => 'service',
  'add_new' => 'Add service',
  'add_new_item' => 'Add New service',
  'edit_item' => 'Edit service',
  'new_item' => 'New service',
  'all_items' => 'All service',
  'view_item' => 'View service',
  'search_items' => 'Search service',
  'not_found' =>  'No service found',
  'not_found_in_trash' => 'No service found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Service'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'service_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'service', $args ); 
}  
add_action( 'init', 'my_custom_post_service' );

function my_taxonomies_Service() {
$labels = array(
  'name' =>  'service Categories',
'add_new_item' => 'Add New service category',
'search_items' => 'Search service Categories',
'edit_item' => 'Edit service Category',
  'menu_name' =>  'Service Categories'
);
$args = array(
  'labels' => $labels,
  'hierarchical' => true,
  'show_admin_column' => true,
);
register_taxonomy( 'service_category', 'service', $args );
}
add_action( 'init', 'my_taxonomies_service');
*/
/*test*/
/* Service */

function codex_service() {
 $labels = array(
   'name' => 'service',
   'singular_name' => 'service',
   'add_new' => 'Add Services',
   'add_new_item' => 'Add New Services',
   'edit_item' => 'Edit Services',
   'new_item' => 'New Services',
   'all_items' => 'All Services',
   'view_item' => 'View Services',
   'search_items' => 'Search Services',
   'not_found' =>  'No Services found',
   'not_found_in_trash' => 'No Services found in Trash', 
   'parent_item_colon' => '',
   'menu_name' => 'Our service'
 );

 $args = array(
   'labels' => $labels,
   'public' => true,
   'publicly_queryable' => true,
   'show_ui' => true, 
   'show_in_menu' => true, 
   'query_var' => true,
   'rewrite' => array( 'slug' => 'service' ), 
   'capability_type' => 'post',
   'has_archive' => true, 
   'hierarchical' => true,
   'menu_position' => null,
	'taxonomies' => array('service_categories'),
   'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','page-attributes' )
 ); 

 register_post_type( 'service', $args );
}
add_action( 'init', 'codex_service' );

$labels = array(
'name'              => _x( 'Services category', 'Services category' ),
'singular_name'     => _x( 'Services category', 'Services category' ),
'search_items'      => __( 'Search Services category' ),
'all_items'         => __( 'All Services category' ),
'parent_item'       => __( 'Parent Services category' ),
'parent_item_colon' => __( 'Parent Services category:' ),
'edit_item'         => __( 'Edit Services category' ),
'update_item'       => __( 'Update Services category' ),
'add_new_item'      => __( 'Add New Services category' ),
'new_item_name'     => __( 'New Services category' ),
'menu_name'         => __( 'Services category' ),
);

$args = array(
'hierarchical'      => true,
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'rewrite'           => array( 'slug' => 'service_categories' ),
);

register_taxonomy( 'service_categories', array( 'service_categories' ), $args );

/*************************************************************/
/************our team post**************/
add_action( 'init', 'team_init' );
function team_init() {
	$labels = array(
		'name'               => _x( 'Our team', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Our team', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Our Teams', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Our team', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Our team', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Our team', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Our team', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Our team', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Our team', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Our teams', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Our teams', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Our team:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Our team found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Our team found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'our_team' ),
		'team_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'team', $args );
}

/************services post**************/
function my_custom_post_gallry() {
$labels = array(
  'name' => 'Gallery',
  'singular_name' => 'Gallery',
  'add_new' => 'Add Gallery',
  'add_new_item' => 'Add New Gallery',
  'edit_item' => 'Edit Gallery',
  'new_item' => 'New Gallery',
  'all_items' => 'All Gallery',
  'view_item' => 'View Gallery',
  'search_items' => 'Search Gallery',
  'not_found' =>  'No Gallery found',
  'not_found_in_trash' => 'No Gallery found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Our Gallery'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'Gallry_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'gallry', $args ); 
}  
add_action( 'init', 'my_custom_post_gallry' );

/**************get youtube Id ***************************/

function extractUTubeVidId($url){
    /*
    * type1: http://www.youtube.com/watch?v=9Jr6OtgiOIw
    * type2: http://www.youtube.com/watch?v=9Jr6OtgiOIw&feature=related
    * type3: http://youtu.be/9Jr6OtgiOIw
    */
    $vid_id = "";
    $flag = false;
    if(isset($url) && !empty($url)){
        /*case1 and 2*/
        $parts = explode("?", $url);
        if(isset($parts) && !empty($parts) && is_array($parts) && count($parts)>1){
            $params = explode("&", $parts[1]);
            if(isset($params) && !empty($params) && is_array($params)){
                foreach($params as $param){
                    $kv = explode("=", $param);
                    if(isset($kv) && !empty($kv) && is_array($kv) && count($kv)>1){
                        if($kv[0]=='v'){
                            $vid_id = $kv[1];
                            $flag = true;
                            break;
                        }
                    }
                }
            }
        }

        /*case 3*/
        if(!$flag){
            $needle = "youtu.be/";
            $pos = null;
            $pos = strpos($url, $needle);
            if ($pos !== false) {
                $start = $pos + strlen($needle);
                $vid_id = substr($url, $start, 11);
                $flag = true;
            }
        }
    }
    return $vid_id;
}

/****************************end id******************************/
function filter_search($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

/****************************comment form******************************/
function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

/*----------------website remove-------------------------*/
function crunchify_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url'); 

add_filter( 'comment_form_default_fields', 'help4cms_comment_placeholders' );
function help4cms_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="Name *"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="Email *"',
        $fields['email']
    );
    return $fields;
}


//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu1" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');  