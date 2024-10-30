<?php 
/*

This files contains all actions and filter hooks of functions 

*/

// Action Hooks
add_action( 'plugins_loaded', 'srcpt_load_plugin_textdomain' );
add_action( 'admin_menu', 'srcpt_add_menu_page' );
add_action( 'admin_init', 'srcpt_plugin_settings' );
add_action( 'admin_enqueue_scripts', 'srcpt_admin_enqueue' );
add_action( 'init', 'srcpt_post_type_registeration' );
add_action( 'init', 'srcpt_taxonomies_registeration', 0 );
add_action( 'add_meta_boxes', 'srcpt_register_meta_boxes' );
add_action( 'save_post', 'srcpt_metabox_save' );
