
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $custom_taxonomy = get_the_terms( $item->ID, 'work' );
				foreach ($custom_taxonomy as $custom_tax) {
				if($custom_tax->term_id == 52) { //do nothing for FEATURED link
				}
				else {
					echo '<a href="';
					echo get_category_link( $custom_tax->term_id );
					echo '" class="linkBlock">';
				}
		} ?>



		<div class="entry-content">
			<?php
				$job_title = get_post_meta( get_the_ID(), 'job_title', true );
				$person_pic = get_post_meta( get_the_ID(), 'person_pic', 1 );
			?>
			<?php if ($person_pic) { ?><div class="caseStudyPic" ><img src="<?php echo $person_pic; ?>" alt="<?php the_title(); ?>" border="0" /></div><?php } ?>
			<div class="caseStudyText" >
				<header class="entry-header">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</header><!-- .entry-header -->
				<?php if ($job_title) { ?><p class="role" itemprop="jobTitle"><?php echo $job_title; ?></p><?php } ?>

				<p><?php $custom_taxonomy = get_the_terms( $item->ID, 'work' );
					foreach ($custom_taxonomy as $custom_tax) {
					echo '<span class="workCat ';
					echo $custom_tax->name;
					echo '">';
					echo $custom_tax->name;
					echo '</span> ';
				} ?></p>


				<span class="theExcerpt"><?php the_excerpt(); ?></span>

			</div>
		</div><!-- .entry-content -->
		</a>

	</article><!-- #post -->


