<?php
/**
 * Template Name: Media
 *
 */
?>

<?php get_header(); ?>

	<div class="item teaser-page-list">
		<div class="container_16">
			<br>
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
	<br><br>
	<div class="site-main container_16">
		<h2>Galleries</h2>
		<div class="inner">
		        <ul>
				<?php $args = array( 'post_type' => 'gallery', 'order' => 'ASC', 'posts_per_page' => 200 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$image = get_field('gallery' , $loop->post->ID);	
					?>
	                <li class="gallery-list grid_2">
	                	<a href="<?php the_permalink() ?>"><?php echo the_title(); ?>
	                    <img class="gallery-image-link fwrap" src="<?php echo $image[0]['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
	                </li>
				<?php endwhile; 
				echo '</ul>';
				?>
			</div>
			<div class="clear"></div>
		</div>		
	</div>	
	<br>
	<div class="site-main container_16">
		<h2>Videos</h2>
		<div class="inner">
		        <ul>
				<?php $args = array( 'post_type' => 'video', 'order' => 'ASC', 'posts_per_page' => 200 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					?>
	                <li class="gallery-list grid_3">
	                	<a href="<?php the_permalink() ?>"><?php echo the_title(); ?>
						<?php $video = get_field('video_url', $post->ID); 
						?>
					<a href="<?php echo get_permalink();?>" class="gallery-item"><img src="<?php echo $video['thumbnail']; ?>" width="100%" alt="<?php echo $post->post_title; ?>"></a>
	                </li>
				<?php endwhile; 
				echo '</ul>';
				?>
			</div>
			<div class="clear"></div>
		</div>	
	</div>
	<br><br>
<?php get_footer(); ?>