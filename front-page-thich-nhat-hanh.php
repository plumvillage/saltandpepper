<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  Landing Thich Nhat Hanh
 *
 * @file           front-page-thich-nhat-hanh.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>
<div id="content-full" class="grid col-940">

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>


			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('like-home'); ?>>
				<?php responsive_entry_top(); ?>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>

					<div id="widgets" class="home-widgets">
						<div id="home_widget_1" class="grid col-300">					
							<?php if ( is_active_sidebar( 'thich-nhat-hanh-page-1' ) ) : ?>
								<?php dynamic_sidebar( 'thich-nhat-hanh-page-1' ); ?>
							<?php endif; ?>
						</div>
						<div id="home_widget_2" class="grid col-300">					
							<?php if ( is_active_sidebar( 'thich-nhat-hanh-page-2' ) ) : ?>
								<?php dynamic_sidebar( 'thich-nhat-hanh-page-2' ); ?>
							<?php endif; ?>
						</div>
						<div id="home_widget_3" class="grid col-300 fit">					
							<?php if ( is_active_sidebar( 'thich-nhat-hanh-page-3' ) ) : ?>
								<?php dynamic_sidebar( 'thich-nhat-hanh-page-3' ); ?>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="show-share"><?php echo really_simple_share_publish($link='http://plumvillage.org/about/thich-nhat-hanh/', $title='Thich Nhat Hanh'); ?></div>
					
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

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
