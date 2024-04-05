<?php
/**
 * Archive Template
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>

<div id="content" class="content-area">
		<main id="main" class="site-main content-sidebar" role="main">

			<div class="breadcrumb-list" xmlns:v="http://rdf.data-vocabulary.org/#"><span class="breadcrumb" typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="/">Home</a></span> <span class="chevron">&#8250;</span>
			<span class="breadcrumb" typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="/100-ways-to-work/">100 Ways to Work</a></span> <span class="chevron">&#8250;</span>
			<span class="breadcrumb-current"><?php single_term_title(); ?></span></div>

            <article><header class="entry-header">
            	<h1 class="title-archive"><?php single_term_title(); ?></h1>
	            <p class="caseStudyCatsDescription"><?php echo term_description(); ?></p>
			</header></article>

			<div class="columns-3 caseStudyList">
            <?php while ( have_posts() ) : the_post(); ?>

				<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'casestudy' );
				?>

			<?php endwhile; ?>

            </div>


			<link rel="stylesheet" id="contact-form-7-css" href="/wp-content/plugins/so-widgets-bundle/icons/fontawesome/style.css?ver=5.2.2" type="text/css" media="all">
			<div class="so-widget-sow-social-media-buttons so-widget-sow-social-media-buttons-atom-28482d211f4c"><h3 class="widget-title">Follow our activity on our social media channels: </h3>
			<div class="social-media-button-container">
				<a class="ow-button-hover sow-social-media-button-twitter sow-social-media-button" title="uk_maca" aria-label="uk_maca" target="_blank" rel="noopener noreferrer" href="https://twitter.com/womenequalities" >
				<span><span class="sow-icon-fontawesome sow-fab" data-sow-icon="&#xf099;" ></span></span>
				</a>
				<a class="ow-button-hover sow-social-media-button-linkedin sow-social-media-button" title="menaschangeagents" aria-label="menaschangeagents" target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/company/government-equalities-office/" >
				<span><span class="sow-icon-fontawesome sow-fab" data-sow-icon="&#xf0e1;" ></span></span>
				</a>
			</div>
			</div>

	</main><!-- #main -->
	<?php get_sidebar( 'caseStudy' ); ?>
</div><!-- #content-archive -->

<?php get_footer(); ?>
