<?php

/*-----------------------------------------------------------------------------------*/
/* Register Custom Posts
/*-----------------------------------------------------------------------------------*/

/* Standard Options */
//register_post_type(
//    'js_custom_post_type', //add a namespace (js_) before to prevent conflict, rewrite url using rewrite below with a simple word
//    array(
//		'labels' => array(
//			'name' => __('Products'),
//			'singular_name' => __('Product'),
//			'add_new' => __( 'Add New' ),
//			'add_new_item' => __( 'Add New '.__('Product') ),
//			'edit' => __( 'Edit' ),
//			'edit_item' => __( 'Edit '.__('Product') ),
//			'new_item' => __( 'New '.__('Product') ),
//			'view' => __( 'View' ),
//			'view_item' => __( 'View '.__('Product') ),
//			'search_items' => __( 'Search '.__('Product') ),
//			'not_found' => __( 'Not Found' ),
//			'not_found_in_trash' => __( 'Not Found In Trash' ),
//			'parent' => __( 'Parent' ),
//		),
//		'description' => __( 'A super duper is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.', 'js'),
//        'public' => true,
//        'show_ui' => true,
//        'publicly_queryable' => true,
//       	'exclude_from_search' => true,
//        'capability_type' => 'post',
//        'hierarchical' => false, //if true will behave like pages
//        'has_archive' => true,
//        'rewrite' => array('slug' => 'custom_url'),
//        'query_var' => true,
//        'show_in_nav_menus' => true,
//        'menu_position' => 20,
//        //'taxonomies' => array('slider'),
//        'menu_icon' => '',
//        'supports' => array(
//        		'title',
//        		'editor',
//        		'comments',
//        		'trackbacks',
//        		'revisions',
//        		'author',
//        		'excerpt',
//        		'thumbnail',
//        		'custom-fields',
//        		'page-attributes'
//        	),
//        '_builtin' => false, // It's a custom post type, not built in!
//));

	function js_register_portfolio() {
		/* Standard Options */
		register_post_type(
		    'js_portfolio', //add a namespace (js_) before to prevent conflict, rewrite url using rewrite below with a simple word
		    array(
				'labels' => array(
					'name' => __('Portfolio'),
					'singular_name' => __('Portfolio Item'),
					'add_new' => __( 'Add New' ),
					'add_new_item' => __( 'Add New '.__('Portfolio Item') ),
					'edit' => __( 'Edit' ),
					'edit_item' => __( 'Edit '.__('Portfolio Item') ),
					'new_item' => __( 'New '.__('Portfolio Item') ),
					'view' => __( 'View' ),
					'view_item' => __( 'View '.__('Portfolio Item') ),
					'search_items' => __( 'Search '.__('Portfolio Item') ),
					'not_found' => __( 'Not Found' ),
					'not_found_in_trash' => __( 'Not Found In Trash' ),
				),
		        'public' => true,
		        'publicly_queryable' => true,
		       	'exclude_from_search' => true,
		        'capability_type' => 'post',
		        'hierarchical' => false, //if true will behave like pages
		        'rewrite' => array('slug' => 'portfolio'),
		        'query_var' => true,
		        'show_in_nav_menus' => true,
		        'menu_position' => 20,
		        'taxonomies' => array('js_portfolio_categories'),
		        'menu_icon' => '',
		        'supports' => array(
		        		'title',
		        		'editor',
		        		'thumbnail'
		        	),
		        '_builtin' => false, // It's a custom post type, not built in!
		));
	}

    function js_portfolio_categories() {  
       register_taxonomy(  
        'js_portfolio_categories',  
        'js_portfolio',  
        array(  
            'hierarchical' => true,  
            'show_in_nav_menus' => false,
            'label' => __('Portfolio Categories'), 
            'query_var' => true, 
            'rewrite' => array('slug' => 'skill-type', 'hierarchical' => true)  
        ) 
    );  
    }  
      
    add_action( 'init', 'js_register_portfolio' );  
    add_action( 'init', 'js_portfolio_categories' );  

?>