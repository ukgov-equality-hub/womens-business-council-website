<?php
/*===========================================
 *
 * Add bulk dropdown option noindex no follow
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions' );
 
function register_bseoni_bulk_actions($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer'] = __( 'Noindex-NoFollow', 'bseoni_bulk_seo_noindexer');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler', 10, 3 );
 
function bseoni_bulk_action_handler( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_noindexer', '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>' );
      update_post_meta( $post_id, 'bseoni_bulk_nofollow', '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice' );
 
function bseoni_bulk_action_admin_notice() {
  if ( ! empty( $_REQUEST['bulk_seo_updated'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s post to NoIndex-NoFollow.',
        'Updated %s posts to NoIndex-NoFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer'
      ) . '</div>', $seo_updated_count );
  }
}




/*===========================================
 *
 * No index dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions3' );
 
function register_bseoni_bulk_actions3($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer3'] = __( 'NoIndex', 'bseoni_bulk_seo_noindexer3');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler3', 10, 3 );
 
function bseoni_bulk_action_handler3( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer3' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_noindexer', '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated3', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice3' );
 
function bseoni_bulk_action_admin_notice3() {
  if ( ! empty( $_REQUEST['bulk_seo_updated3'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated3'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s post to NoIndex.',
        'Updated %s posts to NoIndex.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer3'
      ) . '</div>', $seo_updated_count );
  }
}




/*===========================================
 *
 * No follow dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions2' );
 
function register_bseoni_bulk_actions2($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer2'] = __( 'NoFollow', 'bseoni_bulk_seo_noindexer2');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler2', 10, 3 );
 
function bseoni_bulk_action_handler2( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer2' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_nofollow', '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated2', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice2' );
 
function bseoni_bulk_action_admin_notice2() {
  if ( ! empty( $_REQUEST['bulk_seo_updated2'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated2'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s post to NoFollow.',
        'Updated %s posts to NoFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer2'
      ) . '</div>', $seo_updated_count );
  }
}


/*===========================================
 *
 * Add remove bulk dropdown option noindex no follow
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions4' );
 
function register_bseoni_bulk_actions4($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer4'] = __( 'Remove Noindex-NoFollow', 'bseoni_bulk_seo_noindexer4');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler4', 10, 3 );
 
function bseoni_bulk_action_handler4( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer4' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_noindexer', '<div class="seo-bulk-index"><span class="tooltiptextstatus">Currently set to Index</span></div>' );
      update_post_meta( $post_id, 'bseoni_bulk_nofollow', '<div class="seo-bulk-follow"><span class="tooltiptextstatus">Currently set to Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated4', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice4' );
 
function bseoni_bulk_action_admin_notice4() {
  if ( ! empty( $_REQUEST['bulk_seo_updated4'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated4'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s post to remove Noinxed/noFollow.',
        'Updated %s posts to remove Noinxed/noFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer4'
      ) . '</div>', $seo_updated_count );
  }
}


/*===========================================
 *
 * Add remove No index dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions5' );
 
function register_bseoni_bulk_actions5($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer5'] = __( 'Remove NoIndex', 'bseoni_bulk_seo_noindexer5');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler5', 10, 5 );
 
function bseoni_bulk_action_handler5( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer5' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_noindexer', '<div class="seo-bulk-index"><span class="tooltiptextstatus">Currently set to Index</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated5', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice5' );
 
function bseoni_bulk_action_admin_notice5() {
  if ( ! empty( $_REQUEST['bulk_seo_updated5'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated5'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Removed NoIndex from %s post.',
        'Removed NoIndex %s posts.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer5'
      ) . '</div>', $seo_updated_count );
  }
}


/*===========================================
 *
 * Remove no follow dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-post', 'register_bseoni_bulk_actions6' );
 
function register_bseoni_bulk_actions6($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer6'] = __( 'Remove NoFollow', 'bseoni_bulk_seo_noindexer6');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'bseoni_bulk_action_handler6', 10, 3 );
 
function bseoni_bulk_action_handler6( $redirect_to, $doaction, $post_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer6' ) {
    return $redirect_to;
  }
  foreach ( $post_ids as $post_id ) {
    // Perform action for each post.
      
          update_post_meta( $post_id, 'bseoni_bulk_nofollow', '<div class="seo-bulk-follow"><span class="tooltiptextstatus">Currently set to Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated6', count( $post_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice6' );
 
function bseoni_bulk_action_admin_notice6() {
  if ( ! empty( $_REQUEST['bulk_seo_updated6'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated6'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Removed NoFollow from %s post.',
        'Removed NoFollow from %s posts.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer6'
      ) . '</div>', $seo_updated_count );
  }
}
