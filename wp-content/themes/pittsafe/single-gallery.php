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
			<br><br>
			<?php if ( ot_get_option('charitas_breadcrumbs') != "off") { ?>
				<div class="grid_16">
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
		<?php 
		
		$images = get_field('gallery');
		
		if( $images ): ?>
		        <ul class="gallery">
		            <?php foreach( $images as $image ): ?>
	                <li class="gallery-list grid_4">
		                <a href="<?php echo $image['url']; ?>" rel="lightbox[gallery]">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                     <br>
		                </a>
	                </li>
		            <?php endforeach; ?>
		        </ul>
		<?php endif; ?>
		</div><!-- #content -->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>