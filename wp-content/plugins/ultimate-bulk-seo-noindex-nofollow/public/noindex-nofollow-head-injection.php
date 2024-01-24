<?php
/*=====================================
 *
 * The head injection
 *
 *====================================*/

add_action('wp_head', 'bseoni_bulk_quick_noindexer');
function bseoni_bulk_quick_noindexer(){
   
    echo get_post_meta( get_the_ID(), 'bseoni_bulk_noindexer', true ); 
    echo get_post_meta( get_the_ID(), 'bseoni_bulk_nofollow', true ); 
}

/*add_action('wp_head', 'cat_noindex');
function cat_noindex(){
	$noindexers = get_post_meta( get_the_ID(), 'bseoni_bulk_noindexer', true ); 
	if (isset($noindexers) && $noindexers == 1) {
		echo '<META NAME="ROBOTS" CONTENT="NOINDEXes"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>';
	} else {
		echo '<div class="seo-bulk-indexes"><span class="tooltiptextstatus">Currently set to Index</span></div>';
	}
}*/
add_action('wp_head', 'bseoni_bulk_quick_noindexer1');
function bseoni_bulk_quick_noindexer1(){
	 echo get_term_meta(get_queried_object()->term_id, 'bseoni_bulk_noindexer', true);
       
    }