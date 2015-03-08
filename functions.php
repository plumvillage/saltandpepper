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

/* To Increase the blog post summary excerpt
*/

function custom_excerpt_length( $length ) {
return 55;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* shortcode called [wbsub2count]
*/

function wbsub2countshow()
{
    global $mysubscribe2;
    $registered = $mysubscribe2->get_registered();
    $confirmed = $mysubscribe2->get_public();
    $count = count($confirmed);

    $mystring="We currently have " . $count . " subscribers";
    return $mystring;
}
add_shortcode('wbsub2count','wbsub2countshow');

/* Message */
function subscribe_change($message) {
    $message .= "A warm welcome to Plum Village. We hope you enjoy our emails.";
    return $message;
}
add_filter('s2_subscribe_confirmed', 'subscribe_change');

function unsubscribe_change($message) {
    $message .= "We're sorry to see you leave, no coming no going.";
    return $message;
}
add_filter('s2_unsubscribe_confirmed', 'unsubscribe_change');


/* function s2_subject_changes($subject) {return "[Plum Village] Breathe you are online";} */

/* add_filter('s2_email_subject', 's2_subject_change


// Runs the <title> element through our custom filter
add_filter('wp_title', 'filter_events_title');
// Runs the Page title element through our custom filter
add_filter('tribe_get_events_title', 'filter_events_title');
 
// Tribe events: Manually set title for each page
function filter_events_title ($title) {
 
	if ( tribe_is_upcoming() && !is_tax() ) { // List View Page: Upcoming Events
		$title = 'List view: Upcoming events with lay sanghas across Europe';
	}
	elseif ( tribe_is_upcoming() && is_tax() ) { // List View Category Page: Upcoming Events
		$title = 'List view Category: Upcoming events with lay sanghas across Europe';
	}
	
	return $title;
} */



//Add php functionality in test-wdiget
function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);
?>
