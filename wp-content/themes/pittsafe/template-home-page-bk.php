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
			<?php // Display the default content
			if ( have_posts() ) { ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="single">
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<div class="clear"></div>
					</article>
				<?php endwhile;
			} // End displaying the default content
		?>
		<div class="clear"></div>
		
		<?php if (is_active_sidebar( 'front-1' ) || is_active_sidebar( 'front-2' ) || is_active_sidebar( 'front-3' ) || is_active_sidebar( 'front-4' ) || is_active_sidebar( 'front-5' ) ) { ?>
			
			<?php if ( is_active_sidebar( 'front-1' ) ) : ?>
				<!-- First Widget Area -->
				<div class="<?php echo esc_html(ot_get_option('charitas_first_front_widget_size') ) ?> first-home-widget-area">
					<?php ! dynamic_sidebar( 'front-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-2' ) ) : ?>
				<!-- Second Widget Area -->
				<div class="<?php echo esc_html(ot_get_option('charitas_second_front_widget_size') ) ?> second-home-widget-area">
					<?php dynamic_sidebar( 'front-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-3' ) ) : ?>
				<!-- Third Widget Area -->
				<div class="<?php echo esc_html( ot_get_option('charitas_third_front_widget_size') ) ?> third-home-widget-area">
					<?php dynamic_sidebar( 'front-3' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'front-4' ) ) : ?>
				<!-- Forth Widget Area -->
				<div class="<?php echo esc_html( ot_get_option('charitas_forth_front_widget_size') ) ?> forth-home-widget-area">
					<?php dynamic_sidebar( 'front-4' ); ?>
				</div>
			<?php endif; ?>

		<?php }	?>

		<div class="clear"></div>
	</div>
</div>	

<?php get_footer(); ?>