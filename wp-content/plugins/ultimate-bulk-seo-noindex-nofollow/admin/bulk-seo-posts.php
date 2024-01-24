<?php

/*================================================================================================================================
 *  
 *  Noindex and no follow meta box
 * 
 * ==============================================================================================================================*/
/*=========================
 * add the meta box
 * ======================*/
add_action( 'add_meta_boxes', 'bseoni_noindexer_meta_box_add' );
function bseoni_noindexer_meta_box_add()
{
    add_meta_box(
        'bseoni-my-meta-box-id',
        'No Index No Follow',
        'bseoni_noindexer_meta_box_cb',
        'post',
        'side',
        'high'
    );
}

/*================
 * add the fields for the meta box
 * ==============*/
function bseoni_noindexer_meta_box_cb( $post )
{
    // $post is already set, and contains an object: the WordPress post
    global  $post ;
    $values = get_post_custom( $post->ID );
    $check = ( $values['bseoni_bulk_noindexer'][0] == 'on' ? 'on' : '' );
    $check2 = ( $values['bseoni_bulk_nofollow'][0] == 'on' ? 'on' : '' );
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'bseoni_meta_box_nonce', 'meta_box_nonce' );
    ?>     
    <p> 
        <label class="noindexer-switch"><input type="checkbox" id="bseoni_bulk_noindexer" name="bseoni_bulk_noindexer" <?php 
    
    if ( in_array( '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>', $values['bseoni_bulk_noindexer'] ) ) {
        echo  'checked' ;
    } else {
        echo  'unchecked' ;
    }
    
    ?> /><span class="noindexer-slider noindexer-round"></span></label>
        <label for="bseoni_bulk_noindexer">NoIndex</label>
    </p>

    <p>
        <label class="noindexer-switch"><input type="checkbox" id="bseoni_bulk_nofollow" name="bseoni_bulk_nofollow" <?php 
    
    if ( in_array( '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>', $values['bseoni_bulk_nofollow'] ) ) {
        echo  'checked' ;
    } else {
        echo  'unchecked' ;
    }
    
    ?> /><span class="noindexer-slider noindexer-round"></span></label>
        <label for="bseoni_bulk_nofollow">NoFollow</label>
    </p>

    <?php 
}

/*=================================
 * save the settings
 * ==============================*/
add_action( 'save_post', 'bseoni_noindexer_meta_box_save' );
function bseoni_noindexer_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // if our nonce isn't there, or we can't verify it, bail
    if ( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'bseoni_meta_box_nonce' ) ) {
        return;
    }
    // if our current user can't edit this post, bail
    if ( !current_user_can( 'edit_post' ) ) {
        return;
    }
    // now we can actually save the data
    $allowed = array(
        'a' => array(
        'href' => array(),
    ),
    );
    // Make sure your data is set before trying to save it
    /*===========================
     * first checkbox
     * =========================*/
    $chk = ( isset( $_POST['bseoni_bulk_noindexer'] ) ? '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>' : '<div class="seo-bulk-index"><span class="tooltiptextstatus">Currently set to Index</span></div>' );
    update_post_meta( $post_id, 'bseoni_bulk_noindexer', $chk );
    /*===========================
     * second checkbox
     * =========================*/
    $chk = ( isset( $_POST['bseoni_bulk_nofollow'] ) ? '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>' : '<div class="seo-bulk-follow"><span class="tooltiptextstatus">Currently set to Follow</span></div>' );
    update_post_meta( $post_id, 'bseoni_bulk_nofollow', $chk );
}
