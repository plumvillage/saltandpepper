<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Full Content Template
 *
 * Template Name:  UH Planyo PHP
 * @file           uh-registration-php.php
 * @package        SaltandPepper
 * @author         Emil Uzelac
 * @copyright      2003 - 2011 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/saltandpepper/uh-registration-php.php

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
   <?php
   global $planyo_site_id, $planyo_files_location, $planyo_language,
      $planyo_always_use_ajax, $planyo_sort_fields, $planyo_resource_id,
      $planyo_js_library_used, $planyo_include_js_library,
      $planyo_default_mode, $planyo_extra_search_fields, $planyo_resource_ordering, $planyo_attribs;

   $planyo_site_id = '9813';  // ID of your planyo site. It can be a number or 'demo' to see demonstration of the plugin
   $planyo_files_location_real = 'planyo-files'; // relative or absolute directory (this is real path, not HTTP path) where the planyo files are kept
   $planyo_files_location = '/planyo-files';  // relative or absolute directory (HTTP path) where the planyo files are kept (usually '/planyo-files')
   $planyo_language='AUTO';  // you can optionally change the language here, e.g. 'FR' or 'ES' or pass the languge in the 'lang' parameter. 'AUTO' means the language is detected automatically
   $planyo_always_use_ajax = true;  // set to true to use AJAX to display resource list and resource details views; default value (false) makes the output content SEO-friendly
   $planyo_sort_fields='';  // comma-separated sort fields -- a single field will hide the sort dropdown box
   $planyo_resource_ordering='name'; // optional sort criterium for resource list
   $planyo_extra_search_fields='';  // comma-separated extra fields in the search box, e.g. 'Number of persons'. You first need to define them in settings/custom resource properties
   $planyo_default_mode='empty'; // one of: 'resource_list' (displays list of resources with photos, descriptions etc.), 'search' (displays the search box), 'empty' (will not display anything by default but will require you to either pass the resource ID as parameter in the URL (resource_id) or add an external search box or calendar preview), 'upcoming_availability' (displays a quick list of all upcoming availability)
   $planyo_resource_id = null;  // optional: ID of the resource being reserved (set only if always the same)
   $planyo_include_js_library=true; // set this to true if jQuery (required) should be included by this plugin, or false if your website already includes jQuery
   $planyo_attribs=''; // optionally you can insert the attribute string here
   require_once($planyo_files_location_real.'/planyo-plugin-impl.php');
   echo "<div id='planyo_plugin_code' class='planyo'>";
   planyo_setup();
   echo "</div>";
   ?>


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
