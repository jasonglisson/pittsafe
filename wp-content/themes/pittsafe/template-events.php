<?php
/**
 * Template Name: Events
 *
 */
?>

<?php get_header(); ?>
	
<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
		</div><!-- #content -->
		<?php get_sidebar('post-1'); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	
	
<?php get_footer(); ?>
