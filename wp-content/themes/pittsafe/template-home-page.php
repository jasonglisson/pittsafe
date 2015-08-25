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
	    	<div class="flexslider-news"><div class="flex-button-red"><a class="radius" href="<?php echo get_permalink();?>">Read More <i class="icon-angle-right"></i></a></div></div>
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
				<ul class="project-slides">
					<?php
					$post = $wp_query->post;
					$args = array( 'post_type' => 'project', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php //print_r($loop); ?>
					<li class="project-item">					
						<div class="grid_10">
								<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
								<div class="entry-content">
								<?php the_excerpt(); ?>
								</div>
								<div class="flexslider-news"><div class="flex-button-red"><a class="radius" href="<?php echo get_permalink();?>">Read More <i class="icon-angle-right"></i></a></div></div>
						</div>		
						<div class="grid_6">	
							<a href="<?php echo get_permalink();?>"><img src="<?php echo the_field('project_image', $post->ID);?>" width="100%"></a>
						</div>	
					</li>	
					<?php endwhile; ?>	
				</ul>		
		</div>
		<div class="grid_16 block second-home-widget-area">
			<div class="home-mission">
				<?php $post = $wp_query->post; ?>
				<h3><?php echo the_field('about_text_header', $post->ID);?></h3>
				<?php echo the_field('about_text', $post->ID);?>		
			</div>		
		</div>	
		<div class="clear"></div>
		<div class="grid_5 block second-home-widget-area">
			<div class="widget-title">
				<h3>Galleries</h3>
				<div class="viewall fright">
					<a href="/galleries/" class="radius" title="View all Images">VIEW ALL</a>
				</div>
				<div class="clear"></div>		
			</div>		
			<div class="home-gallery">
				<?php
				$post = $wp_query->post;
				$args = array( 'post_type' => 'gallery', 'posts_per_page' => 4 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>					
						<?php $images = get_field('gallery', $post->ID); ?>
					<a href="<?php echo get_permalink();?>" class="gallery-item"><img src="<?php echo $images[0]['sizes']['thumbnail'];?>" width="100%" alt="<?php echo $post->post_title; ?>"></a>
				<?php endwhile; ?>	
			</div>					
		</div>
		<div class="grid_6 block second-home-widget-area">
			<div class="widget-title">
				<h3>Videos</h3>
				<div class="clear"></div>
			</div>		
			<div class="home-gallery">
				<?php
				$post = $wp_query->post;
				$args = array( 'post_type' => 'video', 'posts_per_page' => 4 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>					
						<?php $video = get_field('video_url', $post->ID); ?>
					<a href="<?php echo get_permalink();?>" class="gallery-item"><img src="<?php echo $video['thumbnail']; ?>" width="100%" alt="<?php echo $post->post_title; ?>"></a>
				<?php endwhile; ?>	
			</div>									
		</div>
		<div class="grid_5 block second-home-widget-area">
			<div class="widget-title">
				<h3>Documents</h3>
				<div class="viewall fright">
					<a href="/documents/" class="radius" title="View all News">VIEW ALL</a>
				</div>
				<div class="clear"></div>				
			</div>	
			<div class="">
				<?php
				$post = $wp_query->post;
				$args = array( 'post_type' => 'document', 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>					
						<?php $video = get_field('document', $post->ID); ?>
					<a href="<?php echo get_permalink();?>" class=""><h3><?php echo $post->post_title; ?></h3></a>
					<?php echo the_excerpt();?>
				<?php endwhile; ?>	
			</div>						
		</div>		
		<div class="clear"></div>	
	</div>
</div>		

<?php get_footer(); ?>