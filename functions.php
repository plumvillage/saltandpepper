<?php
/*
 * Salt and Pepper functions.php
 */

/*
 * Regester and Enqueue Javascript Files
 */
add_action( "wp_enqueue_scripts", 'snp_load_javascript_files' );

function snp_load_javascript_files() {
    wp_register_script( 
        'jquery.flexslider',
        get_stylesheet_directory_uri() . '/js/jquery.flexslider.js',
        array('jquery'),
        '2.1',
        true
    );

    wp_register_script( 
        'snp.frontpage',
        get_stylesheet_directory_uri() . '/js/saltandpepper.frontpage.js',
        array('jquery', 'jquery.flexslider'),
        '',
        true
    );


    wp_enqueue_script( 'jquery.flexslider' );
    if ( is_front_page() ) {
        wp_enqueue_script( 'snp.frontpage' );
    }
}

/* 
 * Remove Comments from Pages
 */
add_filter( 'comments_template', 'snp_no_page_comments', 11);

function snp_no_page_comments( $file ) {
    if ( is_page() ) 
        $file = STYLESHEETPATH . '/no-comments-please.php';
    return $file;
}
