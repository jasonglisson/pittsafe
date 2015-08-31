<?php
/**
 * Template Name: News
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
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$loop = new WP_Query( array(
						'post_type' => 'news',
						'posts_per_page' => 9,
						'paged' => $paged
					) ); 
					while ( $loop->have_posts() ) : $loop->the_post();?>
					
					<?php //print_r($post); ?>
					<div class="project-item">	
						<div class="grid_3">
							<a href="<?php echo get_permalink();?>"><img src="<?php $image = get_field('news_image', $post->ID); echo $image['sizes']['thumbnail'];?>" width="100%"></a>
						</div>											
						<div class="grid_13">
								<h2><a href="<?php echo get_permalink();?>"><?php the_title();?></a></h2>
								<h4><?php the_time('F d, Y'); ?></h4>
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