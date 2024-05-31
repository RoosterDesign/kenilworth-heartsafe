<?php
/**
 * kh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kh
 */


if ( ! defined( '_S_VERSION' ) ) { define( '_S_VERSION', '1.0.0' ); }



//== Register Menus

register_nav_menus(
	array(
		'main-menu' => esc_html__( 'Primary', 'kh' ),
		'footer-menu' => esc_html__( 'Footer', 'kh' ),
	)
);



//== Enqueue scripts and styles.

function kh_scripts() {
  	
	//== Google Fonts

	wp_enqueue_style( 'kh-google-font-fragment', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null );

	function kh_google_font_loader_tag_filter( $html, $handle ) {
		if ( $handle === 'kh-google-font-fragment' ) {
			$rel_preconnect = "rel='stylesheet preconnect'";

			return str_replace(
				"rel='stylesheet'",
				$rel_preconnect,
				$html
			);
		}
		return $html;
	}
	add_filter( 'style_loader_tag', 'kh_google_font_loader_tag_filter', 10, 2 );


	// wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;700&Rubik:wght@300;400;700&family=Young+Serif&display=swap', array(), null );



	//== jQuery
	wp_enqueue_script( 'kh-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), _S_VERSION, true );


	//== Waypoints
	// wp_enqueue_script( 'kh-waypoints', get_template_directory_uri() . '/js/vendor/waypoints.min.js', array(), _S_VERSION, true );

	
	//== Owl Carousel
	wp_enqueue_script( 'kh-owlcarousel', get_template_directory_uri() . '/js/vendor/owl-carousel.js', array('kh-jquery'), null, true );


	//== Global Scripts
	wp_enqueue_script( 'kh-global', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );


	//== Homepage Scripts
	if ( is_page_template( 'templates/homepage.php' ) ) {
		wp_enqueue_style( 'kh-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), _S_VERSION, true );
		wp_enqueue_script( 'kh-homepage', get_template_directory_uri() . '/js/home.js', array('kh-jquery'), _S_VERSION, true );
	}



	//== Defibrillator Details Page

	if ( is_singular( 'defibrillators' ) ) {
		wp_enqueue_script('kh-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCm3DQ6OjTssKzTWz7uIBS0CT_zEWCpHsA&libraries=places', array(), '', true);
		wp_enqueue_script( 'kh-defibrillator', get_template_directory_uri() . '/js/defibrillator-details.js', array('kh-jquery'), _S_VERSION, true );
	}


	//== Google Map
	if ( is_page_template( 'templates/homepage.php' ) || is_page_template( 'templates/defibrillators.php' )   ) {
		wp_enqueue_script('kh-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCm3DQ6OjTssKzTWz7uIBS0CT_zEWCpHsA&libraries=places', array(), '', true);
		wp_enqueue_script( 'kh-defibrillator-map', get_template_directory_uri() . '/js/defibrillator-map.js', array('kh-google-maps'), _S_VERSION, true );
	}

}

add_action( 'wp_enqueue_scripts', 'kh_scripts' );



//== Disable WP Forms Scroll
 
function wpf_dev_disable_scroll_effect_on_all_forms( $forms ) { 
	foreach ( $forms as $form ) {
					?>
					<script type="text/javascript">
					wpforms.scrollToError = function(){};
					wpforms.animateScrollTop = function(){};
					</script>
					<?php					
	}
}
add_action( 'wpforms_wp_footer_end', 'wpf_dev_disable_scroll_effect_on_all_forms', 10, 1 );




//= Check if there is pagination

function is_paginated() {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) {
			return true;
	} else {
			return false;
	}
}



//== Custom Post Types

function create_posttype() {
  	
	// add_theme_support('post-thumbnails');
	// add_post_type_support( 'defibrillators', 'thumbnail' );
	// add_post_type_support( 'people', 'thumbnail' );


	//== Hero Slider Images

	$heroSliderLabels = array(
		'name'                  => _x('Hero Slider', 'Post type general name', 'kenilworth-heartsafe'),
		'singular_name'         => _x('Hero Slide', 'Post type singular name', 'kenilworth-heartsafe'),
		'menu_name'             => _x('Hero Slider', 'Admin Menu text', 'kenilworth-heartsafe'),
		'name_admin_bar'        => _x('Hero Slide', 'Add New on Toolbar', 'kenilworth-heartsafe'),
		'add_new'               => __('Add New Hero Slide', 'kenilworth-heartsafe'),
		'add_new_item'          => __('Add New Hero Slide', 'kenilworth-heartsafe'),
		'new_item'              => __('New Hero Slide', 'kenilworth-heartsafe'),
		'edit_item'             => __('Edit Hero Slide', 'kenilworth-heartsafe'),
		'view_item'             => __('View Hero Slide', 'kenilworth-heartsafe'),
		'all_items'             => __('All Hero Slider', 'kenilworth-heartsafe'),
		'search_items'          => __('Search Hero Slider', 'kenilworth-heartsafe'),
		'parent_item_colon'     => __('Parent Hero Slider:', 'kenilworth-heartsafe'),
		'not_found'             => __('No Hero Slider found.', 'kenilworth-heartsafe'),
		'not_found_in_trash'    => __('No Hero Slider found in Trash.', 'kenilworth-heartsafe'),
		'featured_image'        => _x('Hero Slide Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'archives'              => _x('Hero Slide archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kenilworth-heartsafe'),
		'insert_into_item'      => _x('Insert into Hero Slide', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kenilworth-heartsafe'),
		'uploaded_to_this_item' => _x('Uploaded to this Hero Slide', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kenilworth-heartsafe'),
		'filter_items_list'     => _x('Filter Hero Slider list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list_navigation' => _x('Hero Slider list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list'            => _x('Hero Slider list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kenilworth-heartsafe'),
	);

	$heroSliderArgs = array(
		'labels'             => $heroSliderLabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'hero-slide', 'with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'   			 => 'dashicons-format-gallery',
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title', 'thumbnail'),
	);

	register_post_type('hero-slider', $heroSliderArgs);
	
	
	
	
	//== Defibrillator Post Type

	$defibrillatorsLabels = array(
		'name'                  => _x('Defibrillators', 'Post type general name', 'kenilworth-heartsafe'),
		'singular_name'         => _x('Defibrillator', 'Post type singular name', 'kenilworth-heartsafe'),
		'menu_name'             => _x('Defibrillators', 'Admin Menu text', 'kenilworth-heartsafe'),
		'name_admin_bar'        => _x('Defibrillator', 'Add New on Toolbar', 'kenilworth-heartsafe'),
		'add_new'               => __('Add New Defibrillator', 'kenilworth-heartsafe'),
		'add_new_item'          => __('Add New Defibrillator', 'kenilworth-heartsafe'),
		'new_item'              => __('New Defibrillator', 'kenilworth-heartsafe'),
		'edit_item'             => __('Edit Defibrillator', 'kenilworth-heartsafe'),
		'view_item'             => __('View Defibrillator', 'kenilworth-heartsafe'),
		'all_items'             => __('All Defibrillators', 'kenilworth-heartsafe'),
		'search_items'          => __('Search Defibrillators', 'kenilworth-heartsafe'),
		'parent_item_colon'     => __('Parent Defibrillators:', 'kenilworth-heartsafe'),
		'not_found'             => __('No defibrillators found.', 'kenilworth-heartsafe'),
		'not_found_in_trash'    => __('No defibrillators found in Trash.', 'kenilworth-heartsafe'),
		'featured_image'        => _x('Defibrillator Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'archives'              => _x('Defibrillator archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kenilworth-heartsafe'),
		'insert_into_item'      => _x('Insert into defibrillator', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kenilworth-heartsafe'),
		'uploaded_to_this_item' => _x('Uploaded to this defibrillator', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kenilworth-heartsafe'),
		'filter_items_list'     => _x('Filter defibrillators list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list_navigation' => _x('Defibrillators list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list'            => _x('Defibrillators list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kenilworth-heartsafe'),
	);

	$defibrillatorsArgs = array(
		'labels'             => $defibrillatorsLabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'defibrillators', 'with_front' => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'   			 => 'dashicons-heart',
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
	);

	register_post_type('defibrillators', $defibrillatorsArgs);


	//== People Post Type

	$peopleLabels = array(
		'name'                  => _x('People', 'Post type general name', 'kenilworth-heartsafe'),
		'singular_name'         => _x('Person', 'Post type singular name', 'kenilworth-heartsafe'),
		'menu_name'             => _x('People', 'Admin Menu text', 'kenilworth-heartsafe'),
		'name_admin_bar'        => _x('Person', 'Add New on Toolbar', 'kenilworth-heartsafe'),
		'add_new'               => __('Add New Person', 'kenilworth-heartsafe'),
		'add_new_item'          => __('Add New Person', 'kenilworth-heartsafe'),
		'new_item'              => __('New Person', 'kenilworth-heartsafe'),
		'edit_item'             => __('Edit Person', 'kenilworth-heartsafe'),
		'view_item'             => __('View Person', 'kenilworth-heartsafe'),
		'all_items'             => __('All People', 'kenilworth-heartsafe'),
		'search_items'          => __('Search People', 'kenilworth-heartsafe'),
		'parent_item_colon'     => __('Parent People:', 'kenilworth-heartsafe'),
		'not_found'             => __('No people found.', 'kenilworth-heartsafe'),
		'not_found_in_trash'    => __('No people found in Trash.', 'kenilworth-heartsafe'),
		'featured_image'        => _x('Person Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'archives'              => _x('Person archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kenilworth-heartsafe'),
		'insert_into_item'      => _x('Insert into person', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kenilworth-heartsafe'),
		'uploaded_to_this_item' => _x('Uploaded to this person', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kenilworth-heartsafe'),
		'filter_items_list'     => _x('Filter people list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list_navigation' => _x('People list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list'            => _x('People list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kenilworth-heartsafe'),
	);

	$peopleArgs = array(
		'labels'             => $peopleLabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'person', 'with_front' => false),		
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'   			 => 'dashicons-admin-users',
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
	);

	register_post_type('people', $peopleArgs);


	//== Supporters Post Type

	$supporterLabels = array(
		'name'                  => _x('Supporters', 'Post type general name', 'kenilworth-heartsafe'),
		'singular_name'         => _x('Supporter', 'Post type singular name', 'kenilworth-heartsafe'),
		'menu_name'             => _x('Supporters', 'Admin Menu text', 'kenilworth-heartsafe'),
		'name_admin_bar'        => _x('Supporter', 'Add New on Toolbar', 'kenilworth-heartsafe'),
		'add_new'               => __('Add New Supporter', 'kenilworth-heartsafe'),
		'add_new_item'          => __('Add New Supporter', 'kenilworth-heartsafe'),
		'new_item'              => __('New Supporter', 'kenilworth-heartsafe'),
		'edit_item'             => __('Edit Supporter', 'kenilworth-heartsafe'),
		'view_item'             => __('View Supporter', 'kenilworth-heartsafe'),
		'all_items'             => __('All Supporters', 'kenilworth-heartsafe'),
		'search_items'          => __('Search Supporters', 'kenilworth-heartsafe'),
		'parent_item_colon'     => __('Parent Supporters:', 'kenilworth-heartsafe'),
		'not_found'             => __('No Supporters found.', 'kenilworth-heartsafe'),
		'not_found_in_trash'    => __('No Supporters found in Trash.', 'kenilworth-heartsafe'),
		'featured_image'        => _x('Supporter Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kenilworth-heartsafe'),
		'archives'              => _x('Supporter archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kenilworth-heartsafe'),
		'insert_into_item'      => _x('Insert into Supporter', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kenilworth-heartsafe'),
		'uploaded_to_this_item' => _x('Uploaded to this Supporter', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kenilworth-heartsafe'),
		'filter_items_list'     => _x('Filter Supporters list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list_navigation' => _x('Supporters list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kenilworth-heartsafe'),
		'items_list'            => _x('Supporters list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kenilworth-heartsafe'),
	);

	$supporterArgs = array(
		'labels'             => $supporterLabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'supporter', 'with_front' => false),		
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'   			 => 'dashicons-tag',
		'hierarchical'       => false,
		'menu_position'      => 7,
		'supports'           => array('title', 'thumbnail'),
	);

	register_post_type('supporters', $supporterArgs);

	// register_taxonomy('defibrillators_category', 'defibrillators', array('hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true));

};
add_action( 'init', 'create_posttype' );



//== Active menu class
function change_page_menu_classes($menu)
{
  	
		$DEFIBRILLATORS_MENU_ID = 18;// LOCAL
		//  $DEFIBRILLATORS_MENU_ID = 2250; // STAGE
		// $DEFIBRILLATORS_MENU_ID = ####; // PROD  
	
		global $post;

    if (get_post_type($post) == 'defibrillators')
    {
        $menu = str_replace( 'current_page_parent', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-'.$DEFIBRILLATORS_MENU_ID, 'menu-item-'.$DEFIBRILLATORS_MENU_ID.' current-menu-item', $menu ); // add the current_page_parent class to the page you want
    }
    return $menu;
}
add_filter( 'nav_menu_css_class', 'change_page_menu_classes', 10,2 );



//== Remove Default Image Sizes

function remove_default_image_sizes( $sizes ) {
  
  /* Default WordPress */
  unset( $sizes[ 'thumbnail' ]);       // Remove Thumbnail (150 x 150 hard cropped)
  unset( $sizes[ 'medium' ]);          // Remove Medium resolution (300 x 300 max height 300px)
  unset( $sizes[ 'medium_large' ]);    // Remove Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
  unset( $sizes[ 'large' ]);           // Remove Large resolution (1024 x 1024 max height 1024px)
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
  return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );



//== Post Thumbnails
add_theme_support( 'post-thumbnails' );
	
if ( function_exists( 'add_theme_support' ) ) {	
	
	add_image_size( 'people-photo', 340, 340, true );	
	add_image_size( 'supporter-logo', 160, 180 );	
	add_image_size( 'hero-slide-mobile', 768, 500, true );
	add_image_size( 'hero-slide-desktop', 1920, 900, true );
	add_image_size( 'card', 480, 330, true );
	add_image_size( 'masthead-mobile', 1024, 200, true );
	add_image_size( 'masthead-desktop', 1920, 400, true );
	add_image_size( 'about-panel', 1920, 600, true );
	add_image_size( 'defibrillator-location', 610, 340, true );
	
	add_image_size( 'fw-img-mobile', 600, 600, true );
	add_image_size( 'fw-img-tablet', 1024, 1024, true );
	add_image_size( 'fw-img-desktop', 1920, 1920, true );
	add_image_size( 'fw-img-desktop-lg', 2560, 2560, true );
	// add_image_size( 'featured-post', 1600, 9999, true );
	
}




//== ACF Google Maps

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyCm3DQ6OjTssKzTWz7uIBS0CT_zEWCpHsA';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



//== Customise ACF WYSIWYG Editor

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
	// Uncomment to view format of $toolbars
	
	// echo '< pre >';
	// 	print_r($toolbars);
	// echo '< /pre >';
	// die;

	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link', 'removeformat', 'undo', 'redo' );

	// Edit the "Full" toolbar and remove 'code'
	// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	// remove the 'Basic' toolbar completely
	unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}




//== Sitewide Options Page

add_action('admin_menu', 'awesome_page_create');
function awesome_page_create() {
    $page_title = 'Sitewide Settings';
    $menu_title = 'Sitewide Settings';
    $capability = 'edit_posts';
    $menu_slug = 'sitewide_settings';
    $function = 'sitewide_settings_display';
    $icon_url = '';
    $position = 30;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		function sitewide_settings_display() {
			
			//== Telephone Number
			if (isset($_POST['tel_number'])) {
				$tel_number = $_POST['tel_number'];
				update_option('tel_number', $tel_number);
			}
			$tel_number = get_option('tel_number', '');


			//== Email Address
			if (isset($_POST['email_address'])) {
				$email_address = $_POST['email_address'];
				update_option('email_address', $email_address);
			}
			$email_address = get_option('email_address', '');


			//== Address
			if (isset($_POST['address'])) {
				$address = $_POST['address'];
				update_option('address', $address);
			}
			$address = get_option('address', '');


			//== Facebook Social Link
			if (isset($_POST['facebook_link'])) {
					$facebook_link = $_POST['facebook_link'];
					update_option('facebook_link', $facebook_link);
			}
			$facebook_link = get_option('facebook_link', '');


			//== X Link
			if (isset($_POST['x_link'])) {
				$x_link = $_POST['x_link'];
				update_option('x_link', $x_link);
			}
			$x_link = get_option('x_link', '');


			//== Footer About Text
			if (isset($_POST['footer_text'])) {
				$footer_text = stripslashes($_POST['footer_text']);
				update_option('footer_text', $footer_text);
			}
			$footer_text = get_option('footer_text', '');


			//== Footer Copyrigght

			if (isset($_POST['footer_copyright'])) {
				$footer_copyright = stripslashes($_POST['footer_copyright']);
				update_option('footer_copyright', $footer_copyright);
			}
			$footer_copyright = get_option('footer_copyright', '');


			//== Footer site created by

			if (isset($_POST['site_creator'])) {
				$site_creator = stripslashes($_POST['site_creator']);
				update_option('site_creator', $site_creator);
			}
			$site_creator = get_option('site_creator', '');



			//== Footer donate text
			
			if (isset($_POST['footer_donate'])) {
				$footer_donate = stripslashes($_POST['footer_donate']);
				update_option('footer_donate', $footer_donate);
			}
			$footer_donate = get_option('footer_donate', '');

			

			//== Fallback Masthead Image
			if (isset($_POST['masthead_fallback_image'])) {
				$masthead_fallback_image = stripslashes($_POST['masthead_fallback_image']);
				update_option('masthead_fallback_image', $masthead_fallback_image);
			}
			$masthead_fallback_image = get_option('masthead_fallback_image', '');


			//== Fallback Card Image
			if (isset($_POST['masthead_card_image'])) {
				$masthead_card_image = stripslashes($_POST['masthead_card_image']);
				update_option('masthead_card_image', $masthead_card_image);
			}
			$masthead_card_image = get_option('masthead_card_image', '');
						

			//== Donate Link
			if (isset($_POST['donate_link'])) {
				$donate_link = stripslashes($_POST['donate_link']);
				update_option('donate_link', $donate_link);
			}
			$donate_link = get_option('donate_link', '');
			

		?>

		<style>
			.settingsGroup { align-items: center; display: flex; margin-bottom: 30px; }
			.settingsGroup label { margin: 0; width: 150px; }
			.settingsGroup input, .settingsGroup textarea { width: 400px; }
			.settingsGroup textarea { height: 100px }
		</style>

			<h1>Sitewide Settings Page</h1>
			<br>
			<form method="POST">

					<h2>Footer</h2>

					<div class="settingsGroup">
						<label for="footer_text">About Text</label><br>
						<textarea name="footer_text" id="footer_text"><?php echo $footer_text; ?></textarea>
					</div>

					<div class="settingsGroup">
						<label for="footer_copyright">Copyright</label><br>
						<input type="text" name="footer_copyright" id="footer_copyright" value="<?php echo $footer_copyright; ?>">
					</div>

					<div class="settingsGroup">
						<label for="site_creator">Site Creator</label><br>
						<textarea name="site_creator" id="site_creator"><?php echo $site_creator; ?></textarea>
					</div>

					<div class="settingsGroup">
						<label for="footer_donate">Donate Text</label><br>
						<textarea name="footer_donate" id="footer_donate"><?php echo $footer_donate; ?></textarea>
					</div>

					<hr />

					<h2>Contact Details</h2>
					
					<div class="settingsGroup">
						<label for="tel_number">Telephone Number</label><br>
						<input type="text" name="tel_number" id="tel_number" value="<?php echo $tel_number; ?>">
					</div>	

					<div class="settingsGroup">
						<label for="email_address">Email Address</label><br>
						<input type="text" name="email_address" id="email_address" value="<?php echo $email_address; ?>">
					</div>

					<div class="settingsGroup">
						<label for="address">Address</label><br>
						<textarea name="address" id="address"><?php echo $address; ?></textarea>
					</div>

					<hr />

					<h2>Social</h2>

					<div class="settingsGroup">
						<label for="facebook_link">Facebook Link</label><br>
						<input type="text" name="facebook_link" id="facebook_link" value="<?php echo $facebook_link; ?>">
					</div>							

					<div class="settingsGroup">
						<label for="x_link">X Link</label><br>
						<input type="text" name="x_link" id="x_link" value="<?php echo $x_link; ?>">
					</div>

					<hr />					

					<h2>Fallback Images</h2>

					<div class="settingsGroup">
						<label for="masthead_fallback_image">Fallback Masthead Image</label><br>
						<input type="text" name="masthead_fallback_image" id="masthead_fallback_image" value="<?php echo $masthead_fallback_image; ?>">
					</div>

					<div class="settingsGroup">
						<label for="masthead_card_image">Fallback Card Image</label><br>
						<input type="text" name="masthead_card_image" id="masthead_card_image" value="<?php echo $masthead_card_image; ?>">
					</div>

					<hr />

					<h2>Donate</h2>

					<div class="settingsGroup">
						<label for="donate_link">Donate Link</label><br>
						<input type="text" name="donate_link" id="donate_link" value="<?php echo $donate_link; ?>">
					</div>

    			<input type="submit" value="Save" class="button button-primary button-large">
			</form>

		<?php }

}