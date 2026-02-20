<?php

function my_login_logo() { 
    $logo = get_theme_mod( 'custom_logo' );
    if($logo){
        $image = wp_get_attachment_image_src( $logo , 'full' );
        $logo_url = $image[0];
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo $logo_url; ?> );
                background-repeat: no-repeat;
                /* background-color: #3c3c3b; */
                background-size: 150px;
                background-position: center;
                width: 100%;
                border-radius: 0.5rem;
            }
        </style>
        <?php 
    }
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function add_custom_upload_mimes($existing_mimes) {

    $existing_mimes['webp'] = 'image/webp';
    $existing_mimes['svg'] = 'image/svg+xml';

    return $existing_mimes;
}
add_filter('upload_mimes', 'add_custom_upload_mimes');

add_action('acf/init', function() {
    if( function_exists('acf_add_options_page') ) {
  
        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    
        // acf_add_options_sub_page(array(
        //     'page_title'    => 'Theme Header Settings',
        //     'menu_title'    => 'Header',
        //     'parent_slug'   => 'theme-general-settings',
        // ));
    
        // acf_add_options_sub_page(array(
        //     'page_title'    => 'Theme Footer Settings',
        //     'menu_title'    => 'Footer',
        //     'parent_slug'   => 'theme-general-settings',
        // ));
  
    }
  });