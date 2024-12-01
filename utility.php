<?php

/**
 * @global $post WP_Post
 * @return bool
 */
function isLocation(){
	
	global $post;
	
	// Is current post/page a location page? (e.g. accurateleak.com/dallas/)
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

//// Mobile Menu 
function mobileMenu(){
	wp_nav_menu( array( 'menu' => 263, 'menu_class' => 'nav nav-pills', 'after' => '<span></span>' ) );
}




//// TITLE LOCATION
function titleLocation(){
	echo get_the_title(getIdFromCookie());
}

function logoLocation(){
	if( ! class_exists('ACF') )
		return;

	return get_field( "location_logo", getIdFromCookie() );
}

//// PHONE LOCATION
function phoneLocation(){
	if( ! class_exists('ACF') )
		return;

	return get_field( "napnumber", getIdFromCookie() );
}

//// YOUR LOCAL TEAM PAGE URL
/*function yourLocalTeamPageLocation(){
	if( ! class_exists('ACF') )
		return;

	return get_field( "about_us__your_local_team_page", getIdFromCookie() );
}*/

//// YOUR LOCAL TEAM PAGE URL
/*function emailLocation(){
	if( ! class_exists('ACF') )
		return;

	return get_field( "email", getIdFromCookie() );
}*/

//// YOUR LOCAL TEAM PAGE URL
/*function sideRibbonLocation( $field_name ){
	if( ! class_exists('ACF') )
		return;

	$sideRibbonFields = get_field( 'side_ribbon_fields', getIdFromCookie() );
	if($sideRibbonFields)
		return $sideRibbonFields[$field_name];
}*/

// GET HOUSE CALL REVIEWS SCRIPT
/*function housecallProDetailsLocation( $field_name ){
	if( ! class_exists('ACF') )
		return;

	$sideRibbonFields = get_field( 'housecall_pro_details', getIdFromCookie() );
	if($sideRibbonFields)
		return $sideRibbonFields[$field_name];
}*/

//// ADDRESS LOCATION
function addressLocation(){
	echo get_post_meta(  getIdFromCookie(), 'cmb_home_location_address', true );
}

function hideAddress(){
	return get_post_meta(  getIdFromCookie(), 'cmb_home_location_hide_address', true );
}

//// LOCAL MAIL
/*function localSiteEmail(){
	echo get_post_meta( getIdFromCookie(), 'cmb_home_location_email', true );
}*/

//// AREAS LOCATION
function areasLocation(){
	echo get_post_meta( getIdFromCookie(), 'cmb_home_location_areas', true );
}

function localSite(){
	return get_post_meta( getIdFromCookie(), 'cmb_home_location_website', true );
}

//// ZIP CODES LOCATION
function zipCodesLocation(){
	echo get_post_meta( getIdFromCookie(), 'cmb_home_location_zip_codes', true );
}

//// MAP LOCATION
function mapLocation(){
	echo get_post_meta( getIdFromCookie(), 'cmb_home_location_map', true );
}

//// STATE LOCATION
function stateLocation(){
	echo get_post_meta( getIdFromCookie(), 'cmb_home_location_state', true );
}

//// GET PERMALINK LOCATION
function getPermalinkLocation(){
	echo get_permalink(getIdFromCookie());
}

//// GET SERVICES LOCATION
/*function menu_services_shortcode(){
	ob_start();
	$services = get_post_meta( getIdFromCookie(), 'cmb_home_location_services', true );
	if (!empty($services)){
		echo '<div class="menu-services menu-service-sidebar"><ul>';
		foreach ( $services as $key => $entry ):
			echo '<li class="service-'.$entry.'"><a href="'.get_the_permalink($entry).'">'.get_the_title($entry).'</a></li>' ;
		endforeach;
		echo '</ul></div>';
	}else{
		wp_nav_menu( array( 'theme_location' => 'services-menu') );
	}
	return ob_get_clean();
}
add_shortcode('menu_services', 'menu_services_shortcode');*/

// SOCIAL LINKS LOCATION
/*function socialLinksLocation(){
	$socialLinks = get_post_meta(  getIdFromCookie(), 'cmb_home_location_social_links', true );
	if (!empty($socialLinks)) {
		foreach ($socialLinks as $link) {
			echo '<a href="' . $link . '" target="_blank" rel="noopener"></a>';
		}
	}else{
		echo '<a href="https://www.facebook.com/Restoration1Headquarters/" target="_blank" rel="noopener"><span>Facebook Social Link</span></a><a href="https://twitter.com/Restoration1HDQ" target="_blank" rel="noopener"><span>Twitter Social Link</span></a><a href="https://www.linkedin.com/company/restoration-1-headquarters" target="_blank" rel="noopener"><span>LinkedIn Social Link</span></a>';
	}
}*/

//// SHORTCODE BLOG LOCATION
/*if(!function_exists('blog_location')){
	function blog_location($atts, $content = null){
		ob_start();
		$content = trim(do_shortcode(shortcode_unautop($content)));
		extract(shortcode_atts(array("location" => ''), $atts));
		echo '<div class="list-blog">';
		$loop = new WP_Query(
			array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $location,
					),
				),
			)
		);
		while ( $loop->have_posts() ) : $loop->the_post();
			get_template_part( 'template-parts/content-category', 'none' );
		endwhile; wp_reset_query();
		echo '</div><div id="pagination" class="clearfix">';
			if(function_exists('tw_pagination')) tw_pagination($loop);
		echo '</div>';
		return ob_get_clean();
	}
}
add_shortcode('blog', 'blog_location');

function services_arr(){
	$services = array(
			'18216' 	=> 'Concrete Services(DO NOT UNSELECT THIS IF ANY CHILD ITEM IS SELECTED)',
			'18223' 		=> '- Concrete Repair & Maintenance',
			'18217' 		=> '- Concrete Crack & Joint Repair',
			'18219' 		=> '- Concrete Filling',
			'18221' 		=> '- Concrete Lifting',
			'18220' 		=> '- Concrete Leveling',
			'18218' 		=> '- Concrete Dye & Polishing',
			'18222' 		=> '- Concrete Mudjacking',
			'18224' 		=> '- Decorative Concrete Services',
			'18225' 	=> 'Sealents & Cleaning(DO NOT UNSELECT THIS IF ANY CHILD ITEM IS SELECTED)',
			'18231' 		=> '- Waterproofing',
			'18229' 		=> '- Top-Coat Sealing',
			'18230' 		=> '- UV Resistant Top Coat',
			'18226' 		=> '- Epoxy/Aspartic & Polymer Coatings',
			'18228' 		=> '- Surface Cleaning',
			'18227' 		=> '- Pressure Washing',
			'18232' 	=> 'Commercial Concrete Services(DO NOT UNSELECT THIS IF ANY CHILD ITEM IS SELECTED)',
			'18233' 		=> '- Commercial concrete repair & maintenance',
			'18234' 		=> '- Commercial crack & joint repair',
			'18235' 		=> '- Commercial filling, lifting & leveling',
			'18236' 		=> '- Other Commercial Services',
			'18237' 	=> 'Other Services(DO NOT UNSELECT THIS IF ANY CHILD ITEM IS SELECTED)',
			'18241' 		=> '- Paver Repair & Maintenance',
			'18238' 		=> '- Brick Repair & Maintenance',
			'18239' 		=> '- Foundation Crack Repair',
			'18242' 		=> '- Rubber Surfacing',
			'18240' 		=> '- Overlays',
		);
	return $services;
}*/

////// LOCATIONS FUNCTIONS

// isMain();
// idLocation();
// titleLocation();
// phoneLocation();
// addressLocation();
// areasLocation();
// zipCodesLocation();
// stateLocation();
// mapLocation();
// socialLinksLocation();
