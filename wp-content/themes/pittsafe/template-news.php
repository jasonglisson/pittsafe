<?php
/**
 * Template Name: News Page
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

	</div>
	<div id="main" class="site-main container_16">
		<div id="blog" class="clearfix">
			<div class="row">
			    <div class="" role="main">
			    	
					<?php
					$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$args = array( 'post_type' => 'news', 'posts_per_page' => 10, 'paged' => $paged, 'has_archive' => false, 'rewrite' => array('slug' => 'news', 'with_front' => false,), );
					$the_query = new WP_Query( $args );
				    if ($wp_query->have_posts()) :			
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<div class="news-item">	
						<div class="grid_3">
							<a href="<?php echo get_permalink();?>"><img src="<?php $image = get_field('news_image', $the_query->ID); echo $image['sizes']['thumbnail'];?>" width="100%"></a>
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
				<?php endif; ?>
				</div> <!-- end #main -->
			</div>
			<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			  <div class="pager-nav">
			    <div class="next-posts-link grid_8 pager-link">
			      <?php echo get_previous_posts_link( '&lsaquo; Newer Entries' ); // display newer posts link ?>
			    </div>    
			    <div class="prev-posts-link grid_8 pager-link">
			      <?php echo get_next_posts_link( 'Older Entries &rsaquo;', $the_query->max_num_pages ); // display older posts link ?>
			    </div>    
			  </div>
			<?php } ?>				
			</div> <!-- end #inner-content -->
	</div> <!-- end #content -->	
<?php get_footer(); ?>