<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Full Content Template
 *
   Template Name:  NH Registration
 * @file           nh-registration.php
 * @package        SaltandPepper 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/saltandpepper/nh-registration.php
 
 */

get_header(); ?>

        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part( 'loop-header' ); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>

                <?php get_template_part( 'post-meta-page' ); ?>
                
                <div class="post-entry">

<div id="content-full" class="grid col-940">
<script type="text/javascript">
// change the following values to match your settings
var planyo_site_id='12200'; // ID of your planyo site
var planyo_default_mode='empty'; // one of: 'empty' (displays list of resources with photos, descriptions etc.), 'search' (displays the search box), 'empty' (will not display anything by default but will require you to either pass the resource ID as parameter in the URL (resource_id) or add an external search box or calendar preview), 'upcoming_availability' (displays a quick list of all upcoming availability)
var extra_search_fields=''; // comma-separated extra fields in the search box, e.g. 'Number of persons'. You first need to define them in settings/custom resource properties
var sort_fields=''; // comma-separated sort fields for the search box -- a single field will hide the sort dropdown box
var planyo_resource_ordering='name'; // optional sort criterium for resource list
var planyo_js_library_used='jquery'; // set this to 'mootools' if you want to use mootools instead of jQuery
var planyo_include_js_library=true; // set this to false if your website already includes the Javascript library chosen in the live above (jQuery or mootools)
var planyo_attribs='separate-units=0&ppp_separate_ranges=0'; // optionally you can insert the attribute string here
var planyo_resource_id=''; // optional: ID of the resource being reserved
var planyo_language='EN'; // you can optionally change the language here, e.g. 'FR' or 'ES' or pass the languge in the 'lang' parameter
var ulap_script="jsonp"; // leave this as "jsonp" for a plain-javascript implementation --OR-- if using a php/asp.net/java implementation, one of the ULAP scripts: "ulap.php", "ulap.aspx", "ulap.jsp", in such case you must download the advanced integration Planyo files from http://www.planyo.com/Plugins/PlanyoFiles/planyo-files.zip
var planyo_use_https=("https:" == document.location.protocol); // set this to true if embedding planyo on a secure website (SSL)
var planyo_files_location=(planyo_use_https ? "https" : "http") + '://www.planyo.com/Plugins/PlanyoFiles'; // relative or absolute directory where the planyo files are kept (leave unchanged for plain-javascript implementation, otherwise e.g. '/planyo-files' when using the ULAP scripts)
var empty_mode=false; // should be always set to false
</script>

<script type="text/javascript">
function get_param (name) {name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS = "[\\?&]"+name+"=([^&#]*)";var regex = new RegExp (regexS);var results = regex.exec (window.location.href);if (results == null) return null;else  return results[1];}
if (get_param('mode'))planyo_embed_mode = get_param('mode');
function get_full_planyo_file_path(name) {if(planyo_files_location.length==0||planyo_files_location.lastIndexOf('/')==planyo_files_location.length-1)return planyo_files_location+name; else return planyo_files_location+'/'+name;}
document.write("<"+"div id='planyo_content'><img src='"+get_full_planyo_file_path("hourglass.gif")+"' align='middle' /><"+"/div>");
if (planyo_js_library_used=='jquery' || planyo_js_library_used=='jQuery') {
  if (planyo_include_js_library) document.write("<sc"+"ript type='text/javascript' src='"+get_full_planyo_file_path("jquery.js")+"'></sc"+"ript>");
  document.write("<sc"+"ript src='"+get_full_planyo_file_path("planyo-jquery-utils.js")+"' type='text/javascript'></sc"+"ript>");
  document.write("<sc"+"ript src='"+get_full_planyo_file_path("planyo-jquery-reservations.js")+"' type='text/javascript'></sc"+"ript>");
}
else {
  if (planyo_include_js_library) {
    document.write("<sc"+"ript type='text/javascript' src='"+get_full_planyo_file_path("mootools-1.4-core.js")+"'></sc"+"ript>");
    document.write("<sc"+"ript type='text/javascript' src='"+get_full_planyo_file_path("mootools-1.4-more.js")+"'></sc"+"ript>");
  }
  document.write("<sc"+"ript src='"+get_full_planyo_file_path("utils.js")+"' type='text/javascript'></sc"+"ript>");
  document.write("<sc"+"ript src='"+get_full_planyo_file_path("planyo-reservations.js")+"' type='text/javascript'></sc"+"ript>");
}
document.write("<li"+"nk rel='stylesheet' href='https://static.planyo.com/schemes/?site_id="+window.planyo_site_id+"' type='text/css' />");

</script>
<noscript><a href='https://www.planyo.com/about-calendar.php?calendar=9813'>Make a reservation</a><br/><br/><a href='https://www.planyo.com/'>Reservation system powered by Planyo</a></noscript>
<br />

                    <?php the_content(__('Read more &#8250;', 'responsive')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
            
				<?php get_template_part( 'post-data' ); ?>
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
            
			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-full -->

<?php get_footer(); ?>
