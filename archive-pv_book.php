<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
	<?php if( have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>
		<h1><?php echo post_type_archive_title( $display ); ?></h1>

		<ul class="filter-isotope">
			<li>Genre:</li>
			<li><a class="active" data-filter="" href="#">all</a></li>
			<?php wp_list_categories( array( 'taxonomy' => 'genre', 'orderby' => 'name', 'title_li' => '', 'walker' => new Walker_Books()) ); ?>
		</ul>
		<ul class="filter-isotope">
			<li>Subject:</li>
			<li><a class="active" data-filter="" href="#">all</a></li>
			<?php wp_list_categories( array( 'taxonomy' => 'subject', 'orderby' => 'name', 'title_li' => '', 'walker' => new Walker_Books()) ); ?>
		</ul>


		
		<div class="isotope-container">
			<div class="gutter-sizer"></div>
	
			<?php while( have_posts() ) : the_post(); ?>
	
				<?php responsive_entry_before(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php responsive_entry_top(); ?>
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'small', array( 'class' => 'alignleft' ) ); ?>
							</a>
						<?php endif; ?>
		
						<h1 class="entry-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<h2 class="post-subtitle"><?php the_field('subtitle'); ?></h2>
		
						<div class="post-entry">
							<?php if(get_field('excerpt')){
								the_field('excerpt');
							} else {
								echo excerpt(20);
							} ?>
							<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
						</div>
						<!-- end of .post-entry -->
		
						<?php responsive_entry_bottom(); ?>
					</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php endwhile; ?>
		</div>
		<?php get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
