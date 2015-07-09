<?php
/**
 * The default template for displaying Single posts
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class("single"); ?>>
						
			<div class="entry-content">
				<?php if(has_post_thumbnail()) { ?>
					<figure>
						<?php the_post_thumbnail('charitas-lite-big-thumb'); ?>
					</figure> 
				<?php } ?>
				
				<div class="clear"></div>

				<div class="long-description">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'charitas' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div>

				
				<div class="clear"></div>
				
				<div class="entry-meta-press">

					<!-- Date -->
					<?php if ( ot_get_option('charitas_date_single_post') != "off" ) { ?>
						<time class="entry-date fleft" datetime="<?php echo esc_html(get_the_date( 'c' ) ) ?>">
							<i class="icon-calendar"></i> <?php esc_html(charitas_get_date_time()); ?>
						</time>
					<?php } ?>
					
					<!-- Category -->
					<?php if ( ot_get_option('charitas_category_single_post') != "off" ) { ?>
						<div class="category-i fleft">
							<i class="icon-folder"></i> <?php the_category(', ') ?>
						</div>
					<?php } ?>


					<?php if ( get_the_tag_list( '', ', ' ) ) { ?>
						<div class="tag-i fleft"> 
							<i class="icon-tags"></i> <a href="#" rel="tag"><?php echo get_the_tag_list('',', ',''); ?></a> 
						</div>
					<?php } ?>

					<!-- Author -->
					<?php if ( ot_get_option('charitas_author_single_post') != "off" ) { ?>
						<div class="author-i">
							<i class="icon-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
						</div>
					<?php } ?>
					<div class="clear"></div>
				</div>

			</div>

			<div class="clear"></div>
					
		</article>
	
<?php endwhile;  endif; ?>

<?php comments_template( '', true ); ?>