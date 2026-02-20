<?php
/**
 * Enqueue scripts and styles.
 */
function workflow_scripts() {
	wp_enqueue_style( 'above-workflow-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'above-workflow-style', 'rtl', 'replace' );

	// wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), time(), 'all');
    wp_enqueue_style('global-css', get_template_directory_uri() . '/assets/css/global.css', array(), time(), 'all');

    // wp_enqueue_script('jquery-min-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), time(), true);
	// wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), time(), true);
	
    wp_enqueue_script('global-js', get_template_directory_uri() . '/assets/js/global.js', array('jquery'), time(), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
     /*--------- DD Enqueue Styles ---------*/
	global $post;
	$flex_modules = get_post_meta( get_the_ID(), 'page_builder', true );
	if ( ! empty( $flex_modules ) ) {
		array_map( function ($element) {
            
			// $element = str_replace( "_", "-", $element );
			$file_abs_path = ABSPATH . 'wp-content/themes/above_workforce/assets/css/' . $element . '.css';
			$file_path = get_template_directory_uri() . '/assets/css/' . $element . '.css';
		
			
			if ( file_exists( $file_abs_path ) ) {
				$file_id = str_replace( "_", "-", $element );
				wp_enqueue_style( $file_id, $file_path, array(), time(), "all" );
			}
		}, $flex_modules );
	}
}
add_action( 'wp_enqueue_scripts', 'workflow_scripts' );

/* svg support */ 
function cc_mime_types($mimes) { $mimes['svg'] = 'image/svg+xml'; return $mimes; } add_filter('upload_mimes', 'cc_mime_types');
