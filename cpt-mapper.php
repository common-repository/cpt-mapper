<?php
/*
 * Plugin Name:       CPT Mapper
 * Plugin URI:        https://srsoftwares926.000webhostapp.com/cpt-mapper
 * Description:       This plugin is  useful to register new custom post types and add taxonomies and meta fields in new or existing custom post types without coding.
 * Version:           0.0.1
 * Author:            SR Softwares
 * Author URI:        https://srsoftwares926.000webhostapp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       srcpt-mapper
 * Domain Path:       /languages
 */


// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Defining plugin version
if ( ! defined( 'CPT_MAPPER_VERSION' ) ) {
	define( 'CPT_MAPPER_VERSION', '0.0.1' );
}


// This line includes all action hooks of following functions
require_once( 'fragments/action-hooks.php' );

//This function is responsible for internationalization of plugin
if ( ! function_exists( "srcpt_load_plugin_textdomain" ) ) {		
	function srcpt_load_plugin_textdomain () {
	    load_plugin_textdomain( 'srcpt-mapper', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}

// This function enqueues styles and scripts for admin side interface
if ( ! function_exists( "srcpt_admin_enqueue" ) ) {	
	function srcpt_admin_enqueue() {
	    wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array(), CPT_MAPPER_VERSION , true );
	    wp_enqueue_style( 'custom', plugin_dir_url( __FILE__ ) . 'assets/css/cascade.css', array(), CPT_MAPPER_VERSION , 'all' );
	}
}

// This function add a settings page in admin menu
if ( ! function_exists( "srcpt_add_menu_page" ) ) {	
	function srcpt_add_menu_page() {
		add_menu_page( 
			'CPT Mapper', 
			'CPT Mapper', 
			'manage_options', 
			'cpt-mapper', 
			'srcpt_adminmenu_callback', 
			'dashicons-pressthis', 
			50 );
		add_submenu_page( 
			'cpt-mapper',
			'Taxonomies',
			'Taxonomies',
			'manage_options', 
			'taxonomy-mapper', 
			'srcpt_taxonomy_page_callback' );
		add_submenu_page( 
			'cpt-mapper',
			'Meta Fields',
			'Meta Fields',
			'manage_options', 
			'meta-mapper', 
			'srcpt_meta_page_callback' );
	}
}
// This is callback function to include content in admin menu page
if ( ! function_exists( "srcpt_adminmenu_callback" ) ) {
	function srcpt_adminmenu_callback() {
		include( 'fragments/admin-page-content.php' );
	}
}

if ( ! function_exists( "srcpt_taxonomy_page_callback" ) ) {
	function srcpt_taxonomy_page_callback() {
		include( 'fragments/admin-page-taxonomy-content.php' );
	}
}

if ( ! function_exists( "srcpt_meta_page_callback" ) ) {
	function srcpt_meta_page_callback() {
		include( 'fragments/admin-page-meta-content.php' );
	}
}


//This function is responsible for registering and updating options in settings page
if ( ! function_exists( "srcpt_plugin_settings" ) ) {	
	function srcpt_plugin_settings() {
	 	$args = array(
            'type' => 'string', 
            'sanitize_callback' => 'srcpt_sanitize_array',   // this callback is implemented at bottom of this page 
            'default' => NULL,
            ); 
	 	//// post types settings		
	 	register_setting( 'cpt-mapper-settings', 'srcpt_cpt', $args);
	 	
	 	//// taxonomies settings 
	 	register_setting( 'tax-mapper-settings', 'srcpt_tax', $args);
		
		///// metabox settings
	 	register_setting( 'meta-mapper-settings', 'srcpt_meta', $args );
	 	register_setting( 'meta-mapper-settings', 'srcpt_opt_meta', $args );
	}
}
//This function registers multiple post types using loop
if ( ! function_exists( "srcpt_post_type_registeration" )) {	
	function srcpt_post_type_registeration() {
		$customposts = get_option( 'srcpt_cpt' ); // Getting  values for each post type
			
		if ( ! empty( $customposts ) && is_array( $customposts ) ) {
			for ( $i=0; $i < count( $customposts ) ; $i++ ) { 
				if ( ! empty( $customposts[$i] ) ) {
					include( "fragments/post-type-register.php" );
					register_post_type( $customposts[$i]['name'], $args );
				}				
			}
		}		
	}		
}

// This function is responsible for registeration of taxonomies 
if ( ! function_exists( "srcpt_taxonomies_registeration" ) ) {
 	function srcpt_taxonomies_registeration() {
		$taxonomies = get_option('srcpt_tax');

		if ( ! empty( $taxonomies ) && is_array( $taxonomies ) ) {
			for ($i=0; $i < count( $taxonomies ) ; $i++) { 
				if ( ! empty( $taxonomies[$i] ) ) {
					include( "fragments/taxonomy-register.php" ); 
					register_taxonomy( $taxonomies[$i]['tname'], $posttypes , $args );
				}
			}
		}
	}
}

// This function is responsible for registeration of new meta boxes using array with defines its type. name, screen etc on every index
if ( ! function_exists( "srcpt_register_meta_boxes" ) ) {
	function srcpt_register_meta_boxes() {
		$meta = get_option( 'srcpt_meta' );
		$opt  = get_option( 'srcpt_opt_meta' ); 

		if ( is_array( $meta ) ) {
			foreach ($meta as $key => $code ) {
		    	add_meta_box(
			        $meta[$key]['mname'],
			        __( $meta[$key]['mid'], 'srcpt-mapper' ),
			        'srcpt_metabox_callback',
			        explode( ",", $meta[$key]['mscreen']),
			        $meta[$key]['mcontext'],
			        $meta[$key]['mpriority'],
			        array(  '__block_editor_compatible_meta_box' => false, 'metaid' => $meta[$key]['mid'], 'type' => $meta[$key]['mtype'], 'opt' => $opt[$key]  )
			    );
		    }
		}
	}
}

// This is callback function of metaboxes
if ( ! function_exists( "srcpt_metabox_callback" ) ) {	
	function srcpt_metabox_callback ( $post, $metabox ) {
		include('fragments/meta-callback.php');
	}
}

// This function saves the data of meta boxes 
if ( ! function_exists( "srcpt_metabox_save" ) ) {	
	function srcpt_metabox_save ( $post_id ) {
		$meta = get_option('srcpt_meta');
		$metaid  = get_option( 'metaid' );
		$type  = get_option( 'type' );
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
	        return;
	    }
	    if(!isset($_POST['cpt_mapper_nonce']) || !wp_verify_nonce( $_POST['cpt_mapper_nonce'], 'cpt_mapper_nonce' ) ) {
	        return;
	    }
	    if( !current_user_can( 'edit_posts' ) ){
	        return;
	    }
	    
	    foreach ($meta as $key => $value) {
	    	switch ( $meta[$key]['mtype'] ) {
	    		case 'text':
	    			update_post_meta( $post_id, $meta[$key]['mid'], sanitize_text_field( $_POST[ $meta[$key]['mid'] ] ) );
	    			break;
	    		case 'textarea':
	    			update_post_meta( $post_id, $meta[$key]['mid'], sanitize_textarea_field( $_POST[ $meta[$key]['mid'] ] ) );
	    			break;
	    		case 'radio':
	    			update_post_meta( $post_id, $meta[$key]['mid'], sanitize_key( $_POST[ $meta[$key]['mid'] ] ) );
	    			break;	
	    		case 'select':
	    			update_post_meta( $post_id, $meta[$key]['mid'], sanitize_key( $_POST[ $meta[$key]['mid'] ] ) );
	    			break;	
	    		case 'checkbox':
	    			update_post_meta( $post_id, $meta[$key]['mid'], srcpt_sanitize_array( $_POST[ $meta[$key]['mid'] ] ) );
	    			break;			
	    	}
	    }
	     
	} 
}


// Helper function to check validity of options

if ( !function_exists( "srcpt_sanitize_array" ) ) {
	function srcpt_sanitize_array( $option ) {
		
		for ( $i=0; $i < count( $option ) ; $i++ ) { 			
			foreach ( $option[$i] as $key => $value ) {
				sanitize_text_field( $value );        // getting every index saperately and sanitizing one by one
			}
		}
		$reindexed_array = array_values( $option );   // rearrange array if any random index is empty
		return $reindexed_array;
	}	
}