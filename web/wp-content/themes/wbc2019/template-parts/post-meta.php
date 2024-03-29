<?php
/**
 * Post Meta Template
 *
 * The template used for displaying post meta data for the posts
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<?php
$responsive_options = responsive_mobile_get_options();
		if($responsive_options['blog_posts_index_layout_default']=="three-column-posts" && ! is_single() )
		{
					// Added filter to get featured_image option working.
					$featured_image = apply_filters( 'responsive_mobile_featured_image', '1' );
					if ( has_post_thumbnail() && $featured_image ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif;
		}			 ?>
		
<header class="entry-header">
	<?php if( is_single() ) {
		the_title( '<h1 class="entry-title post-title">', '</h1>' );
	} else {
		the_title( sprintf( '<h1 class="entry-title post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
	} ?>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-meta">
			<?php
			responsive_mobile_post_meta_data();
			
			// Added filter to get by_line_comments option working.
			$by_line_comments = apply_filters( 'responsive_mobile_by_line_comments', '1' );
			
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && $by_line_comments ) : ?>
				<span class="comments-link">
					<span class="mdash">&mdash;</span>
					<?php comments_popup_link( __( 'No Comments &darr;', 'responsive-mobile' ), __( '1 Comment &darr;', 'responsive-mobile' ), __( '% Comments &darr;', 'responsive-mobile' ) ); ?>
				</span>
			<?php endif; ?>
		</div><!-- .post-meta -->
	<?php endif; ?>

</header><!-- .entry-header -->


