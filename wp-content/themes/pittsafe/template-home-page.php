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
	<div class="inner">
		<div class="grid_10 first-home-widget-area">
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
		<div class="grid_6 block second-home-widget-area">
		<div class="widget-title">
			<h3>Recent News</h3>
			<div class="viewall fright">
				<a href="/news/" class="radius" title="View all News">VIEW ALL</a>
			</div>
			<div class="clear"></div>
		</div>
	<?php
	$args = array( 'post_type' => 'news', 'posts_per_page' => 1 );
    $loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();?>
	<?php //print_r($loop); ?>
    	<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
    	<?php the_date('F d, Y', '<h4>', '</h4>'); ?>
	    <div class="entry-content">
	    	<?php the_excerpt(); ?>
	    </div>
	<?php endwhile; ?>	
	<?php wp_reset_postdata(); ?>
	</div>	
		<div class="clear"></div>
		<div class="grid_4 block first-home-widget-area">
			<div class="widget-title">
				<h3>Events</h3>
				<div class="viewall fright">
					<a href="/events/" class="radius" title="View all Events">VIEW ALL</a>
				</div>
				<div class="clear"></div>
			</div>
			<?php
			$args = array( 'post_type' => 'event', 'posts_per_page' => 1 );
		    $loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();?>
				<img src="<?php echo get_field('event_header_image');?>" alt="<?php the_title();?>" width="100%"/>
		    	<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
		    	<?php the_date('F d, Y', '<h4>', '</h4>'); ?>
			<?php endwhile; ?>			
		</div>
		<div class="grid_12 block second-home-widget-area">
			<div class="widget-title">
				<h3>Projects</h3>
				<div class="viewall fright">
					<div class="flex-prev flex-nav">Previous</div><div class="flex-next flex-nav">Next</div><a href="/projects/" class="radius" title="View all Projects">VIEW ALL</a>
				</div>
				<div class="clear"></div>
			</div>		
			<div class="grid_8">	
				<?php
				$args = array( 'post_type' => 'project', 'posts_per_page' => 1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>
				<?php //print_r($loop); ?>
				<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
				<div class="entry-content">
				<?php the_excerpt(); ?>
				</div>
				<div class="flexslider-news"><div class="flex-button-red"><a class="radius" href="<?php echo get_permalink();?>">Read More <i class="icon-angle-right"></i></a></div></div>
				<?php endwhile; ?>		
			</div>	
			<div class="grid_8">	
				test
			</div>	
		</div>
		<div class="grid_16 block second-home-widget-area">
			<?php $post = $wp_query->post; ?>
			<h3><?php echo the_field('about_text_header', $post->ID);?></h3>
			<?php echo the_field('about_text', $post->ID);?>			
		</div>	
		<div class="clear"></div>		
	</div>
</div>		

<?php get_footer(); ?>