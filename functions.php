<?php
/*
 * Salt and Pepper functions.php
 */

add_action( "wp_enqueue_scripts", 'saltandpepper_load_javascript_files' );

function saltandpepper_load_javascript_files() {
    wp_register_script( 
        'jquery.flexslider',
        get_stylesheet_directory_uri() . '/js/jquery.flexslider.js',
        array('jquery'),
        '2.1',
        true
    );

    wp_register_script( 
        'saltandpepper.frontpage',
        get_stylesheet_directory_uri() . '/js/saltandpepper.frontpage.js',
        array('jquery', 'jquery.flexslider'),
        '',
        true
    );


    wp_enqueue_script( 'jquery.flexslider' );
    if ( is_front_page() ) {
        wp_enqueue_script( 'saltandpepper.frontpage' );
    }
}

