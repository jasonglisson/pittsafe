<?php
/*
 * Blog posts template
 *
 * @package WPlook
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0.0
*/
?>

<?php $args = array( 'post_type' => 'post','post_status' => 'publish', 'paged'=> $paged); ?>
<?php $wp_query = null; ?>
<?php $wp_query = new WP_Query( $args ); ?>
<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>
	
<?php endwhile; wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'charitas'); ?></p>
<?php endif; ?>

<?php charitas_content_navigation('postnav' ) ?>