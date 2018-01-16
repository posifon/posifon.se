<?php

//header('Access-Control-Allow-Origin: http://*.posifonomsorg.se');
header('Access-Control-Allow-Origin: *'); //Temp, only under PosifonOmsorg-development phase.
//header("Content-Security-Policy: default-src 'self'; img-src 'self'; script-src 'self' https://*.posifonomsorg.se http://ajax.googleapis.com ");

function posifon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on posifon, use a find and replace
	 * to change 'posifon' to the name of your theme in all the template files
	 */
	//load_theme_textdomain( 'posifon', get_template_directory() . '/languages' );

    // Clean up the <head>
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_nav' => __( 'Main Nav Menu', 'posifon' ),
		'footer_menu1'  => __( 'Footer Menu1', 'posifon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

//    Add custom header support for changing the front page background
    $defaults = array(
      'default-image'          => get_template_directory_uri() . "/img/utsikt_stad.jpg",
      'width'                  => 0,
      'height'                 => 0,
      'flex-height'            => false,
      'flex-width'             => false,
      'uploads'                => true,
      'random-default'         => false,
      'header-text'            => false,
      'default-text-color'     => '',
      'wp-head-callback'       => '',
      'admin-head-callback'    => '',
      'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $defaults );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
/*	add_theme_support( 'post-formats', array(
*		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
*	) );
*/

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
//	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', posifon_fonts_url() ) );
}
// posifon_setup
add_action( 'after_setup_theme', 'posifon_setup' );

/**
 * Enqueue scripts and styles.
 *
 * @since posifon 2.0
 */

function posifon_scripts() {

    // Load our main stylesheet.
    wp_enqueue_style( 'posifon-style', get_stylesheet_uri(), false, '20150728' );

    // Load the Internet Explorer 8 specific stylesheet.
	 wp_enqueue_style( 'posifon-ie8', get_template_directory_uri() . '/css/style-ie8.css', false, '20150727' );
	 wp_style_add_data( 'posifon-ie8', 'conditional', 'lt IE 9' );

    // Load the Internet Explorer 9 specific stylesheet.
	 wp_enqueue_style( 'posifon-ie9', get_template_directory_uri() . '/css/style-ie9.css', false, '20150811' );
	 wp_style_add_data( 'posifon-ie9', 'conditional', 'gt IE 8' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'posifon-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}
    // Load bestall-script for selectively hiding some elements of the form
    if ( is_page_template( 'template-bestall.php' )) {
      wp_enqueue_script( 'posifon-bestall', get_template_directory_uri() . '/js/bestall.js', array( 'jquery' ), '20150709', true );
      wp_enqueue_script( 'posifon-pop-up', get_template_directory_uri() . '/js/jquery.bpopup.min.js', array( 'jquery' ), '0.11.0', true );
    }

    if ( is_page_template( 'template-kunskapsbank.php' )) {
      wp_enqueue_script( 'posifon-kunskapsbank', get_template_directory_uri() . '/js/kunskapsbank.js', array( 'jquery' ), '20150713', true );
    }

    if ( is_page_template( 'template-kunskapsbank_eng.php' )) {
      wp_enqueue_script( 'posifon-kunskapsbank', get_template_directory_uri() . '/js/kunskapsbank.js', array( 'jquery' ), '20150713', true );
    }

    if ( is_page_template( 'template-medicinpaminnare.php' )) {
      wp_enqueue_script( 'posifon-startsida', get_template_directory_uri() . '/js/startsida.js', array( 'jquery' ), '20150722', true );
    }

    if ( is_page_template( 'template-medicinpaminnare.php' )) {
      wp_enqueue_script( 'posifon-enheter', get_template_directory_uri() . '/js/enheter.js', array( 'jquery' ), '20150723', true );
    }


    if ( is_page_template( 'startsida.php' )) {
      wp_enqueue_script( 'posifon-startsida', get_template_directory_uri() . '/js/startsida.js', array( 'jquery' ), '20150722', true );
    }

    if ( is_page_template( 'startsida_eng.php' )) {
      wp_enqueue_script( 'posifon-startsida', get_template_directory_uri() . '/js/startsida.js', array( 'jquery' ), '20150722', true );
    }

    if ( is_page_template( 'template-enhet.php' )) {
      wp_enqueue_script( 'posifon-enheter', get_template_directory_uri() . '/js/enheter.js', array( 'jquery' ), '20150723', true );
    }

    if ( is_page_template( 'template-enhet_eng.php' )) {
      wp_enqueue_script( 'posifon-enheter', get_template_directory_uri() . '/js/enheter.js', array( 'jquery' ), '20150723', true );
    }

    wp_enqueue_script( 'modernizr-script', get_template_directory_uri() . '/js/modernizr.min.js', array( 'jquery' ), '20150726', false);

	wp_enqueue_script( 'posifon-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20150622', true );
}
add_action( 'wp_enqueue_scripts', 'posifon_scripts' );


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since posifon 1.0
 * @uses register_sidebar
 */
function posifon_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Standard Sidebar', 'posifon' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 3, located on template-omoss.
	register_sidebar( array(
		'name' => __( 'Om Oss Sidebar', 'posifon' ),
		'id' => 'third-widget-area',
		'description' => __( 'Widget area shown on the "om" page template', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

  	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 1', 'posifon' ),
		'id' => 'footer-widget-area-1',
		'description' => __( 'Footer column 1', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="footer-widget-1 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

  	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 2', 'posifon' ),
		'id' => 'footer-widget-area-2',
		'description' => __( 'Footer column 2', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="footer-widget-2 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area 3', 'posifon' ),
		'id' => 'footer-widget-area-3',
		'description' => __( 'Footer column 3', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="footer-widget-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 7, located in the footer at the bottom of the page. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer bottom area', 'posifon' ),
		'id' => 'footer-widget-area-4',
		'description' => __( 'Full span bottom area', 'posifon' ),
		'before_widget' => '<div id="%1$s" class="footer-widget-4 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

/** Register sidebars by running posifon_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'posifon_widgets_init' );

// Shortens the excerpt
function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');


function is_subpage()
{
	global $post, $wpdb;

	if ( is_page() AND isset( $post->post_parent ) != 0 )
	{
		$aParent = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d AND post_type = 'page' LIMIT 1", $post->post_parent ) );
		if ( $aParent->ID ) return true; else return false;
	}
	else
	{
		return false;
	}
}

if (function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
			'main_nav' => 'Main Navigation Menu'
			)
	);
}


/**
 * wpi_stylesheet_dir_uri
 * overwrite theme stylesheet directory uri
 * filter stylesheet_directory_uri
 * @see get_stylesheet_directory_uri()
 */
function wpi_stylesheet_dir_uri($stylesheet_dir_uri, $theme_name){

	$subdir = '/css';
	return $stylesheet_dir_uri.$subdir;

}

add_filter('stylesheet_directory_uri','wpi_stylesheet_dir_uri',10,2);


/*
Plugin Name: Simple Image Grabber
Plugin URI: http://bavotasan.com/2009/simple-image-grabber-wordpress-plugin/
Description: Display one or all images from a post's content.
Author: c.bavota
Version: 1.0.3
Author URI: http://bavotasan.com
License: GPL2
*/

/*  Copyright 2012  c.bavota  (email : cbavota@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Retreive one or all images from a post's content and display it.
 *
 * @param   string $content     Source content, for example get_the_content()
 * @param	int $num			Index number of image to retrieve
 * @param	array $num			First parameter can also be an array
 * @param	int $width			Width setting for retrieved image
 * @param	int $height			Height setting for retrieved image
 * @param	string $class		Class setting for retrieve image
 * @param	boolean $permalink	Link image to parent post
 * @param	boolean $echo		Echo or return result
 *
 * @uses	wp_parse_args()		Parse the defaults and array parameters
 * @uses	get_permalink()		Get permalink to parent post
 * @uses	get_the_content()	Get the post content
 *
 * @return	string  Echo or return requests images
 *
 * @author c.bavota
 */

/**
* usage:
* The following function will echo the second image from a post (if there is one) with a width of 150px and a height of 200px, the class "alignleft" and no link to the post.
*`<?php images( '2', '150', '200', 'alignleft', false ); ?>`
*
**/
function images( $content = '', $num = 1, $width = null, $height = null, $class = 'alignleft', $permalink = true, $echo = true ) {

	// Parse all of the defaults and parameters
	if ( is_array( $num ) ) {

		$defaults = array(
			'number' => 1,
			'width' => '',
			'height' => '',
			'class' => 'alignleft',
			'permalink' => true,
			'echo' => true
		);

		$args = wp_parse_args( $num, $defaults );

		extract( $args, EXTR_OVERWRITE );

	} else {

		// Fix for number parameter
		$number = $num;

	}

	// Set $more variable to retrieve full post content
	global $more;
	$more = 1;

	// Setup variables according to passed parameters
	$size = empty( $width ) ? '' : ' width="' . $width . '"';
	$size = empty( $height ) ? $size : $size . ' height="' . $height . '"';
	$class = empty( $class ) ? '' : ' class="' . $class . '"';
	$link = empty( $permalink ) ? '' : '<a href="' . get_permalink() . '">';
	$linkend = empty( $permalink ) ? '' : '</a>';

	// Number of images in content
	$count = substr_count( $content, '<img' );
	$start = 0;

	// Loop through the images
	for ( $i = 1; $i <= $count; $i++ ) {

		// Get image src
		$imgBeg = strpos( $content, '<img', $start );
		$post = substr( $content, $imgBeg );
		$imgEnd = strpos( $post, '>' );
		$postOutput = substr( $post, 0, $imgEnd + 1 );

		// Replace width || height || class
		if ( $width || $height )
			$replace = array( '/width="[^"]*" /', '/height="[^"]*" /', '/class="[^"]*" /' );
		else
			$replace = '/class="[^"]*" /';

		$postOutput = preg_replace( $replace, '', $postOutput );

		$image[$i] = $postOutput;

		$start = $imgBeg + $imgEnd + 1;

	}

	// Go through the images and return/echo according to above parameters
	if ( ! empty( $image ) ) {

		if ( 'all' == $number ) {

			$x = count( $image );
			$images = '';

			for ( $i = 1; $i <= $x; $i++ ) {

				if ( stristr( $image[$i], '<img' ) ) {

					$theImage = str_replace( '<img', '<img' . $size . $class, $image[$i] );
					$images .= $link . $theImage . $linkend;

				}

			}

		} else {

			if ( stristr( $image[$number], '<img' ) ) {

				$theImage = str_replace( '<img', '<img' . $size . $class, $image[$number] );
				$images = $link . $theImage . $linkend;

			}

		}

		// Reset the $more tag back to zero
		$more = 0;

		// Echo or return
		if ( ! empty( $echo ) )
	    	echo $images;
	    else
	    	return $images;

	}

}


/**
*
* Author: Richie KS
* Date:   November 2, 2013
*
**/

if( !function_exists('get_the_content_strip_images') ):
  function get_the_content_strip_images ($more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = strip_tags($content, '<h1><h2><h3><h4><p><a><strong><li><ul><tr><td><ol>');
    return $content;
  }
endif;

if( !function_exists('get_field_strip_images') ):
  function get_field_strip_images ($field_slug = '') {
    $content = get_field($field_slug);
    $content = strip_tags($content, '<h1><h2><h3><h4><p><a><strong><li><ul><tr><td><ol>');
    return $content;
  }
endif;

// Prevent Easy Image Gallery from appending gallery to content
remove_filter( 'the_content', 'easy_image_gallery_append_to_content' );

// Changing excerpt more
 function new_excerpt_more($more) {
   global $post;
   return '… <a href="'. get_permalink($post->ID) . '">' . 'Fortsätt läsa &raquo;' . '</a>';
 }
 add_filter('excerpt_more', 'new_excerpt_more');




/* Function permalink Thingy
* https://digwp.com/2009/09/easy-shortcode-permalinks/
* by Chris Coyier on September 28th, 2009
*
* This shortcode can be used in two ways:
* Basic: <a href="[permalink id=49]">Using without providing text</a>
*
* This way you only provide the id parameter and it only returns a URL.
* This was you can use that URL however you want. For example, if you needed to add a special class name to the link or something (but only occasionally).
* Providing text: [permalink id=49 text='providing text']
*
* This way returns a fully formatted anchor link back, using the text you pass.
*/

function permalink_thingy($atts) {
	extract(shortcode_atts(array(
		'id' => 1,
		'text' => ""  // default value if none supplied
    ), $atts));

    if ($text) {
        $url = get_permalink($id);
        return "<a href='$url'>$text</a>";
    } else {
	   return get_permalink($id);
	}
}
add_shortcode('permalink', 'permalink_thingy');

if ( ! isset( $content_width ) ) {
	$content_width = 620;
}

