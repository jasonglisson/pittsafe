<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<?php get_header(); ?>

<?php $wpl_sliders = ot_get_option( 'wpl_sliders', array() ); ?>
	<div id="teaser">
		<?php  get_template_part( 'inc', 'slider' ); ?>
	</div>
<div id="main" class="site-main container_16">
	<div class="grid_10">
		<?php if( have_rows('slideshow_images') ): ?>
			<ul class="slides custom_bg img_bg">	
				<?php while( have_rows('slideshow_images') ): the_row(); 
					// vars
					$image = get_sub_field('image');
					//$caption = get_sub_field('caption');
					//$title = get_sub_field('image_title');
				?>
				<img class="slide" src="<?php echo $image; ?>">
					<?php if($title): ?>
					<div class="caption">
					<div class="photo-title"><?php echo $title; ?></div>
					<?php if($caption): ?>	
						<div class="photo-caption"><?php echo $caption; ?></div>		
					<?php endif; ?>			
					</div>	
					<?php endif; ?>
				
				<?php endwhile; ?>
			</ul>
			<div class="click-btn">
				<div class="home-prev-photo btn">‹</div>							  
				<div class="home-next-photo btn">›</div>							  
			</div>
		<?php endif; ?>
	</div>	
	<div class="grid_6">
		<div class="block-header"><h3>Recent News<a href="/news">VIEW ALL</a></h3></div>
	<?php
	$args = array( 'post_type' => 'news', 'posts_per_page' => 1 );
    $loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();?>
    	<h2><?php the_title();?></h2>
	    <div class="entry-content">
	    	<?php the_excerpt(); ?>
	    </div>
	<?php endwhile; ?>	
	</div>	
	<div class="inner">

		<div class="clear"></div>
		


		<div class="clear"></div>
	</div>
</div>	

<?php get_footer(); ?>