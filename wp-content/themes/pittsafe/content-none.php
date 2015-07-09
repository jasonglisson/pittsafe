<?php
/**
 * The default template for no results
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h3 class="entry-title">
		<?php _e("We didn't find any results for:", 'charitas'); ?> '<?php echo get_search_query(); ?>'
	</h3>
	<p><?php _e('Try again with another combination!', 'charitas'); ?></p>
	<?php get_template_part( 'searchform' ); ?>
</article>