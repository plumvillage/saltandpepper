<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>


<div id="content">

	<?php get_template_part( 'loop-header' ); ?>

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<div class="grid col-300">
					<?php the_post_thumbnail( 'large' ); ?> 
					<dl>
					<?php if(get_field('publication_date')){ ?>
						<dt>Publication Date:</dt>
						<dd>
							<?php $date = DateTime::createFromFormat('Ymd', get_field('publication_date'));
							echo $date->format('F j, Y'); ?>
						</dd>
					<?php }?>
					<?php if(get_field('publisher')){ ?>
						<dt>Publisher:</dt>
						<dd>
						<?php if(get_field('publisher_url')){
							echo '<a href="'.get_field('publisher_url').'">'.get_field('publisher').'</a>';
						} else {
							the_field('publisher');
						} ?>
						</dd>
					<?php }?>
					<?php if(get_field('isbn')){ ?>
						<dt>ISBN:</dt>
						<dd><?php the_field('isbn'); ?></dd>
					<?php }?>
					</dl>					
				</div>
				<div class="grid col-620 fit">
					<h1 class="entry-title post-title"><?php the_title(); ?></h1>
					<h2 class="post-subtitle"><?php the_field('subtitle'); ?></h2>
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php if ( function_exists( "get_yuzo_related_posts" ) ) { get_yuzo_related_posts(); } ?>
				</div>

				<div class="post-entry">
					<?php if(get_field('isbn') && get_field('show_reviews')){
						echo do_shortcode('[goodreviews isbn="' . get_field('isbn') . '" buyinfo="off" bookinfo="off" width="918"]');
					} ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

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

</div><!-- end of #content -->

<?php get_footer(); ?>
