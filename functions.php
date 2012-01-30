<?php

// Register the menus

register_nav_menus(
    array(
    	'site-nav' => __( 'Site Nav' ),
    	'section-about' => __( 'Section: About' ),
		'section-news' => __( 'Section: News' ),
		'section-resources' => __( 'Section: Resources' ),
		'section-onalocal' => __( 'Section: ONA Local' ),
		'section-conference' => __( 'Section: Conference' ),
		'section-awards' => __( 'Section: Awards' ),
		'section-nextgen' => __( 'Section: Next Gen' ),
		'section-support' => __( 'Section: Support ONA' )
    	)
  );
  
// Register the sidebars

if ( function_exists('register_sidebar') )
    register_sidebar(array('name'=>'ONA Local Locator Sidebar'));

if ( function_exists('register_sidebars') )
    register_sidebars(3, array('name'=>'Featured Group %d'));

// Add theme options

// require_once ( get_stylesheet_directory() . '/options.php' );

// Add custom content types to Zoninator

function zoninator_pre_init() {
		add_post_type_support( 'frontpageslide' );
	}

// Change excerpt jump link

function new_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '">...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add custom post types "Events" and "Front Page Slide", add custom taxonomy "Event Type"

add_action( 'init', 'create_post_types' );

function create_post_types() {

  $labels = array(
    'name' => _x( 'Event Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Event Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Event Types' ),
    'all_items' => __( 'All Event Types' ),
    'parent_item' => __( 'Parent Event Type' ),
    'parent_item_colon' => __( 'Parent Event Type:' ),
    'edit_item' => __( 'Edit Event Type' ), 
    'update_item' => __( 'Update Event Type' ),
    'add_new_item' => __( 'Add New Event Type' ),
    'new_item_name' => __( 'New Event Type Name' ),
    'menu_name' => __( 'Event Type' ),
  ); 	

  register_taxonomy('eventtype',array('event'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'eventtype' ),
  ));

	register_post_type( 'event',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
		'public' => true,
		'publicly_queryable' => true,
	    'show_ui' => true, 
    	'show_in_menu' => true, 
	    'query_var' => true,
    	'rewrite' => true,
	    'capability_type' => 'post',
    	'has_archive' => true, 
	    'hierarchical' => false,
    	'menu_position' => null,
	    'supports' => array('title','editor','author','excerpt','comments','revisions'),
    	'taxonomies' => 'eventtype'
		)
	);

	register_post_type( 'frontpageslide',
		array(
			'labels' => array(
				'name' => __( 'Front Page Slides' ),
				'singular_name' => __( 'Front Page Slide' )
			),
		'public' => true,
	    'publicly_queryable' => true,
    	'show_ui' => true, 
	    'show_in_menu' => true, 
    	'query_var' => true,
	    'rewrite' => true,
    	'capability_type' => 'post',
	    'has_archive' => true, 
    	'hierarchical' => false,
	    'menu_position' => null,
    	'supports' => array('title','editor','revisions'),
	    'taxonomies' => 'slidetype'
		)
	);
}

?>