<?php
/**
 * Template Name: Projects
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
	
	<div id="main" class="site-main container_16">
		<div class="inner">
					<?php
					$post = $wp_query->post;
					$args = array( 'post_type' => 'project', 'posts_per_page' => 100,);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php //print_r($loop); ?>
					<div class="project-item">	
						<div class="grid_4">	
							<a href="<?php echo get_permalink();?>"><img src="<?php echo the_field('project_image', $post->ID);?>" width="100%"></a>
						</div>											
						<div class="grid_12">
								<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
								<div class="entry-content">
								<?php the_excerpt(); ?>
								</div>
								<div class="flexslider-news"><div class="flex-button-red"><a class="radius" href="<?php echo get_permalink();?>">Read More <i class="icon-angle-right"></i></a></div></div>
						</div>		
					</div>	
					<?php endwhile; ?>
			</div>
	
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>