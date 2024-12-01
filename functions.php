<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Includes
//require FL_CHILD_THEME_DIR . '/includes/utility.php';

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'fl_head', 'FLChildTheme::stylesheet' );

// Enqueue Custom Scripts
add_action( 'wp_enqueue_scripts', 'wpbw_enqueue_headroom_scripts' );
function wpbw_enqueue_headroom_scripts()
{
    wp_enqueue_script( 'theme-cookie', FL_CHILD_THEME_URL . '/js/js.cookie.js', array('jquery') );
}

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_scripts_styles', 1000 );
function parallax_enqueue_scripts_styles() {
	// Styles
	wp_enqueue_style( 'icomoon-fonts', get_stylesheet_directory_uri() . '/icomoon.css', array() );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/style.css', array() );

}

// Removes Query Strings from scripts and styles
function remove_script_version( $src ){
  if ( strpos( $src, 'uploads/bb-plugin' ) !== false || strpos( $src, 'uploads/bb-theme' ) !== false ) {
    return $src;
  }
  else {
    $parts = explode( '?ver', $src );
    return $parts[0];
  }
}
add_filter( 'script_loader_src', 'remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'remove_script_version', 15, 1 );

// Add Additional Image Sizes
add_image_size( 'news-thumb', 260, 150, false );
add_image_size( 'news-full', 800, 300, false );
add_image_size( 'sidebar-thumb', 200, 150, false );
add_image_size( 'blog-thumb', 388, 288, true );
add_image_size( 'mailchimp', 564, 9999, false );
add_image_size( 'amp', 600, 9999, false );
add_image_size( 'home-news', 388, 188, true );
add_image_size( 'home-service', 287, 213, true );
add_image_size( 'home-stories', 388, 267, true );
add_image_size( 'subpage-header', 1400, 267, true );

// Gravity Forms confirmation anchor on all forms
add_filter( 'gform_confirmation_anchor', '__return_true' );

//Sets the number of revisions for all post types
add_filter( 'wp_revisions_to_keep', 'revisions_count', 10, 2 );
function revisions_count( $num, $post ) {
	$num = 3;
    return $num;
}

// Enable Featured Images in RSS Feed and apply Custom image size so it doesn't generate large images in emails
function featuredtoRSS($content) {
global $post;
if ( has_post_thumbnail( $post->ID ) ){
$content = '<div>' . get_the_post_thumbnail( $post->ID, 'mailchimp', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');

//Show custom widget in navigation

// Register sidebar/ widget
register_sidebar( array(
'id' => 'mobile-nav-widget',
'name' => __( 'Mobile Nav Widget', 'lj-create' ),
'description' => __( 'Custom Widget Area', 'childtheme' ),
'before_widget' => '<li class="cstm-html">',
'after_widget' => '</li>',
) );

// add sidebar to menu
add_filter( 'wp_nav_menu_items','add_phone_mobile_menu', 10, 2 );
function add_phone_mobile_menu( $items, $args ) {

//	print_r($args->menu );

//	if ($args->menu == 'main-menu') {
		ob_start();
		dynamic_sidebar('mobile-nav-widget');
		$sidebar = ob_get_contents();
		ob_end_clean();
		$items = $sidebar . $items;
//	}
	return $items;

}

//****** AMP Customizations ******/

// Add Fav Icon to AMP Pages
add_action('amp_post_template_head','amp_favicon');
function amp_favicon() { ?>
	<link rel="icon" href="<?php echo get_site_icon_url(); ?>" />
<?php }

// Add Banner below content of AMP Pages
add_action('ampforwp_after_post_content','amp_custom_banner_extension_insert_banner');
function amp_custom_banner_extension_insert_banner() { ?>
	<div class="amp-custom-banner-after-post">
		<h2>IF YOU HAVE ANY QUESTIONS, PLEASE DO NOT HESITATE TO CONTACT US</h2>
		<a class="ampforwp-comment-button" href="/contact-us">
			CONTACT US
		</a>
	</div>
<?php }

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'font-awesome' ); // FontAwesome 4
    wp_enqueue_style( 'font-awesome-5' ); // FontAwesome 5

    //wp_dequeue_style( 'jquery-magnificpopup' );
    //wp_dequeue_script( 'jquery-magnificpopup' );

    wp_dequeue_script( 'bootstrap' );
    //wp_dequeue_script( 'imagesloaded' );
    wp_dequeue_script( 'jquery-fitvids' );
    //wp_dequeue_script( 'jquery-throttle' );
    wp_dequeue_script( 'jquery-waypoints' );
}, 9999 );

/* Site Optimization - Removing several assets from Home page that we dont need */

// Remove Assets from HOME page only
function remove_home_assets() {
  if (is_front_page()) {
      
	  wp_dequeue_style('yoast-seo-adminbar');
	  wp_dequeue_style('font-awesome-5');
	  wp_dequeue_style('font-awesome');
	  
  }
  
};
add_action( 'wp_enqueue_scripts', 'remove_home_assets', 9999 );


//Removing unused Default Wordpress Emoji Script - Performance Enhancer
function disable_emoji_dequeue_script() {
    wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Removes Emoji Scripts 
add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'wp_shortlink_header', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}

// Register Stories Post Type
function success_stories_post_type() {

	$labels = array(
		'name'                  => _x( 'Success Stories', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Success Stories', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Success Stories', 'text_domain' ),
		'name_admin_bar'        => __( 'Success Stories', 'text_domain' ),
		'archives'              => __( 'Success Stories Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Stories', 'text_domain' ),
		'add_new_item'          => __( 'Add New Stories', 'text_domain' ),
		'add_new'               => __( 'Add New Stories', 'text_domain' ),
		'new_item'              => __( 'New Stories', 'text_domain' ),
		'edit_item'             => __( 'Edit Stories', 'text_domain' ),
		'update_item'           => __( 'Update Stories', 'text_domain' ),
		'view_item'             => __( 'View Stories', 'text_domain' ),
		'view_items'            => __( 'View Stories', 'text_domain' ),
		'search_items'          => __( 'Search Stories', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Stories', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Stories', 'text_domain' ),
		'items_list'            => __( 'Stories list', 'text_domain' ),
		'items_list_navigation' => __( 'Stories list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Stories list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Success stories', 'text_domain' ),
		'description'           => __( 'Success stories', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor', 'thumbnail', 'page-attributes', 'custom-fields', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'success-stories', $args );

}
add_action( 'init', 'success_stories_post_type', 0 );


// Register Stories Post Categories
function create_custom_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ),
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Categories' ),
  );

// Now register the taxonomy
  register_taxonomy('story_categories',array('success-stories'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'category' ),
  ));

}
add_action( 'init', 'create_custom_taxonomy', 0 );


// Shortcodes
//add_shortcode('nap_number', 'nap_number_shortcode');
function nap_number_shortcode( $atts = array() ) {

  $att = shortcode_atts( array(
    'link'    =>  false,
  ), $atts );
  $output = '';

  if( phoneLocation() ){

    $napNumber = phoneLocation();

    $napNumber = standardize_phone_number_format($napNumber);

    if($att['link']){

      $output = '<a href="tel:+1 '. $napNumber .'" onclick="ga(\'send\', \'event\', \'Phone call click to call\', \'Select phone number\');">'. $napNumber .'</a>';

    }else{

      $output = $napNumber;

    }
  }
  return $output;
}
function standardize_phone_number_format($phone) {
  //Format: (000) 000-0000
  $numbers_only = preg_replace("/[^\d]/", "", $phone);
  return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2-$3", $numbers_only);
}


/*
 * Cookie localization functions start
 */
 function isLocation(){

 	global $post;

 	// Is current post/page a location page? (e.g. restoration1.com/austin/)
 	$template = get_post_meta( get_the_ID(), '_wp_page_template', true );
 	if ( $template == "templates/franchise-page.php" ) {
 		return true;
 	}

 	if ( isset( $post->post_parent ) && $post->post_parent ) {
 		// Otherwise, is current post/page a child of a location page?
 		$template = get_post_meta( idLocation(), '_wp_page_template', true );
 		if ( $template == "templates/franchise-page.php" ) {
 			return true;
 		}
 	}

 	return false;
 }

 ////// GET LOCATION ID
 function idLocation(){
 	global $post;
 	if ($post->post_parent)	{
 		$ancestors=get_post_ancestors($post->ID);
 		$root=count($ancestors)-1;
 		$parent = $ancestors[$root];
 		return $parent;
 	} else {
 		$parent = $post->ID;
 		return $parent;
 	}
 }

 function getIdFromCookie(){
 	if ( isLocation() == false ){
 		if(isset($_COOKIE['franchise_id'])) {
 			return $_COOKIE['franchise_id'];
 		}
 	}else{
 		return idLocation();
 	}
 }

 function locationPermalink(){
 	return get_permalink(getIdFromCookie());
 }

 function locationName(){
 	if( ! class_exists('ACF') )
 		return;

 	return get_field( "franchise_name", getIdFromCookie() );
 }

 function locationPhone(){
 	if( ! class_exists('ACF') )
 		return;

 	return get_field( "phone_number", getIdFromCookie() );
 }

function locationLogo(){
 	if( ! class_exists('ACF') )
 		return;

 	return get_field( "location_logo", getIdFromCookie() );
 }



add_action( 'wp_footer', 'my_footer_scripts' );
function my_footer_scripts(){
	if( getIdFromCookie() ):
  ?>
	<script type="text/javascript">
		// Get Clear Location Button
		let getclearLocationBtn = document.querySelector('#clearLocation');

		// Clear Location Event :: Desktop
		getclearLocationBtn.addEventListener('click', (clear) => {
			clear.preventDefault();
			Cookies.remove('franchise_id');
			window.location.href = '/';
		})
	</script>
  <?php
	endif;
}
 /** Cookie localization functions end **/
