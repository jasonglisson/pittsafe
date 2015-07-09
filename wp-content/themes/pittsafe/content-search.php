<?php
/**
 * The default template for displaying search results
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("list"); ?>>
	<div class="short-content">
		
		<?php if ( has_post_thumbnail() ) {?>
			<figure>
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('charitas-lite-small-thumb'); ?>
				<div class="mask radius">
					<div class="mask-square"><i class="icon-link"></i></div>
				</div>
			</a>
			</figure> 
		<?php } ?>

		<h1 class="entry-header">
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>

		<div class="short-description">
			<p><?php echo charitas_short_excerpt('40'); ?></p>
		</div>

		<div class="entry-meta">
			<!-- Date -->
			<?php if ( ot_get_option('charitas_date_blog_post') != "off" ) { ?>
				<time datetime="<?php echo esc_html(get_the_date( 'c' ) ) ?>">
					<a class="buttons time fleft" href="<?php the_permalink(); ?>"><i class="icon-calendar"></i> <?php esc_html(charitas_get_date_time()); ?></a>
				</time>
			<?php } ?>

			<!-- Author -->
			<?php if ( ot_get_option('charitas_author_blog_post') != "off" ) { ?>
				<a class="buttons author fleft" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="icon-user"></i> <?php echo get_the_author(); ?></a> 
			<?php } ?>
			
			<a class="buttons fright" href="<?php the_permalink(); ?>" title="<?php _e('read more', 'charitas'); ?>"><?php _e('read more', 'charitas'); ?></a>
		</div>
		<div class="clear"></div>

	</div>
	<div class="clear"></div>
</article>