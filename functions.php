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
 * Set the output of comments_open to false for all pages
 * taken directly from:
 * http://codex.wordpress.org/Function_Reference/comments_open
 */
add_filter( 'comments_open', 'snp_comments_open', 10, 2 );

function snp_comments_open( $open, $post_id ) {

    $post = get_post( $post_id );

    if ( 'page' == $post->post_type )
        $open = false;

    return $open;
}
