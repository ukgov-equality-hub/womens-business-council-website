<?php /* Template Name: LACA 2020 template */ ?>

<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header( 'laca2020' ); ?>

	<div id="content-full" class="content-area">

		<main id="main" class="site-main full-width" role="main">

			<?php if ( have_posts() ) : ?>

				<?php // get_template_part( 'template-parts/loop-header2020' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #content-full -->

<?php get_footer( 'laca2020' ); ?>
