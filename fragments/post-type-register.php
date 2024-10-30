<?php
$show_in_menu = true;

$labels = array(
		'name'               => __( $customposts[$i]['name'], 'post type general name', 'srcpt-mapper' ),
		'singular_name'      => __( $customposts[$i]['name'], 'post type singular name', 'srcpt-mapper' ),
		'menu_name'          => __( $customposts[$i]['name'], 'admin menu', 'srcpt-mapper' ),
		'name_admin_bar'     => __( $customposts[$i]['name'], 'add new on admin bar', 'srcpt-mapper' ),
		'add_new'            => __( 'Add New', $customposts[$i]['name'], 'srcpt-mapper' ),
		'add_new_item'       => __( 'Add New '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'new_item'           => __( 'New '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'edit_item'          => __( 'Edit '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'view_item'          => __( 'View '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'all_items'          => __( 'All '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'search_items'       => __( 'Search '.$customposts[$i]['name'], 'srcpt-mapper' ),
		'parent_item_colon'  => __( 'Parent '.$customposts[$i]['name'].':', 'srcpt-mapper' ),
		'not_found'          => __( 'Nothing found.', 'srcpt-mapper' ),
		'not_found_in_trash' => __( 'Not found in Trash.', 'srcpt-mapper' )
		);

		if ( ! empty( $customposts[$i]['title'] ) ) { $title = $customposts[$i]['title'];} else { $title = "";	}

		if ( ! empty( $customposts[$i]['editor'] ) ) { $editor = $customposts[$i]['editor'];} else { $editor = "";	}
		if ( ! empty( $customposts[$i]['author'] ) ) { $author = $customposts[$i]['author'];} else { $author = "";	}
		if ( ! empty( $customposts[$i]['thumbnail'] ) ) { $thumbnail = $customposts[$i]['thumbnail'];} else { $thumbnail = "";	}
		if ( ! empty( $customposts[$i]['excerpt'] ) ) { $excerpt = $customposts[$i]['excerpt'];} else { $excerpt = "";	}
		if ( ! empty( $customposts[$i]['comments'] ) ) { $comments = $customposts[$i]['comments'];} else { $comments = "";	}		

		$args = array(
			'labels'             => $labels,
	                'description'        => __( 'Description.', 'srcpt-mapper' ),
			'public'             => true,
			'show_in_rest'       => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => $show_in_menu,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $customposts[$i]['slug'] ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => $customposts[$i]['icon'],
			'supports'           => array( 
				$title, 
				$editor,
				$author,
				$thumbnail, 
				$excerpt, 
				$comments  
			)
		);
?>