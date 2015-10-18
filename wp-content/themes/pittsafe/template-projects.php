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
				
				$posts = get_field('projects_order');			
				if( $posts ): ?>

					<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						<div class="project-item">	
							<div class="grid_4">	
								<a href="<?php echo get_permalink( $p->ID );?>"><img src="<?php echo the_field('project_image', $p->ID);?>" width="100%"></a>
							</div>											
							<div class="grid_12">
									<h2><a href="<?php echo get_permalink();?>"><?php echo $p->post_title;?></a></h2>
									<div class="entry-content">
									<?php echo wp_trim_words($p->post_content, $num_words = 85, $more = null); ?>
									</div>
									<br>
									<div class="flexslider-news"><div class="flex-button-red"><a class="radius" href="<?php echo get_permalink( $p->ID );?>">Read More <i class="icon-angle-right"></i></a></div></div>
							</div>		
						</div>					    
					<?php endforeach; ?>

				<?php endif; ?>					
			</div>
	
			<div class="clear"></div>
		</div>
	</div>
	
<?php get_footer(); ?>