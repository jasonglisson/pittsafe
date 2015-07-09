<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<?php get_header(); ?>

<?php if( is_home() ) { ?>
	<div id="teaser">
		<?php  get_template_part( 'inc', 'slider' ); ?>
	</div>
<?php } else { ?>
	<div class="item teaser-page-list">
		<div class="container_16">
			<aside class="grid_10">
				<?php wplook_doctitle(); ?>
			</aside>
			<div class="grid_6">
				<div id="rootline">
					<?php charitas_breadcrumbs(); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php } ?>
<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			<?php if ( is_home() ) { ?>
				<div class="widget-title">
					<h3><?php _e('Latest posts', 'charitas'); ?></h3>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php charitas_content_navigation('postnav' ) ?>
		</div>
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>