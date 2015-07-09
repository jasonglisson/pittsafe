<?php
/**
 * The default template for displaying Single posts
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); // start of the loop.?>

	<div class="item teaser-page-list">
	
		<div class="container_16">
			<aside class="grid_10">
				<?php 
				if ( get_the_title() ) {
					the_title('<h1 class="page-title">', '</h1>');
				} else {
					echo '<h1 class="page-title">';
					echo esc_html(get_the_date());
					echo "</h1>";
				}

				?>
			</aside>
			<?php if ( ot_get_option('charitas_breadcrumbs') != "off") { ?>
				<div class="grid_6">
					<div id="rootline">
						<?php charitas_breadcrumbs(); ?>	
					</div>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</div>

<?php endwhile; // end of the loop. ?>

<div id="main" class="site-main container_16">
	<div class="inner">
		<div id="primary" class="grid_11 suffix_1">
			<?php get_template_part( 'content', get_post_format() ); ?>
		</div><!-- #content -->

		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>