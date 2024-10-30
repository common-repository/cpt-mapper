<?php
$labels = array(
		'name'              => __( $taxonomies[$i]['tname'], 'taxonomy general name', 'srcpt-mapper' ),
		'singular_name'     => __( $taxonomies[$i]['tname'], 'taxonomy singular name', 'srcpt-mapper' ),
		'search_items'      => __( 'Search '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'all_items'         => __( 'All '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'parent_item'       => __( 'Parent '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'parent_item_colon' => __( 'Parent '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'edit_item'         => __( 'Edit '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'update_item'       => __( 'Update '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'add_new_item'      => __( 'Add New '.$taxonomies[$i]['tname'], 'srcpt-mapper' ),
		'new_item_name'     => __( 'New '.$taxonomies[$i]['tname'].' Name', 'srcpt-mapper' ),
		'menu_name'         => __( $taxonomies[$i]['tname'], 'srcpt-mapper' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $taxonomies[$i]['tslug'] ),
		);
$posttypes = explode(",", $taxonomies[$i]['srcpt_ptypes'] );