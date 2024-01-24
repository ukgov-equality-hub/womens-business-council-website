<?php
/*===========================================
 *
 * Add bulk dropdown option noindex no follow
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions20' );
 
function register_bseoni_bulk_actions20($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer20'] = __( 'Noindex-NoFollow', 'bseoni_bulk_seo_noindexer20');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler20', 10, 3 );
 
function bseoni_bulk_action_handler20( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer20' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_noindexer', '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>' );
      update_post_meta( $page_id, 'bseoni_bulk_nofollow', '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated20', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice20' );
 
function bseoni_bulk_action_admin_notice20() {
  if ( ! empty( $_REQUEST['bulk_seo_updated20'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated20'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s page to NoIndex-NoFollow.',
        'Updated %s pages to NoIndex-NoFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer20'
      ) . '</div>', $seo_updated_count );
  }
}




/*===========================================
 *
 * No index dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions21' );
 
function register_bseoni_bulk_actions21($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer21'] = __( 'NoIndex', 'bseoni_bulk_seo_noindexer21');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler21', 10, 21 );
 
function bseoni_bulk_action_handler21( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer21' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_noindexer', '<META NAME="ROBOTS" CONTENT="NOINDEX"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Index</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice21' );
 
function bseoni_bulk_action_admin_notice21() {
  if ( ! empty( $_REQUEST['bulk_seo_updated21'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated21'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s page to NoIndex.',
        'Updated %s pages to NoIndex.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer21'
      ) . '</div>', $seo_updated_count );
  }
}




/*===========================================
 *
 * No follow dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions22' );
 
function register_bseoni_bulk_actions22($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer22'] = __( 'NoFollow', 'bseoni_bulk_seo_noindexer22');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler22', 10, 3 );
 
function bseoni_bulk_action_handler22( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer22' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_nofollow', '<META NAME="ROBOTS" CONTENT="NOFOLLOW"><div class="seo-bulk-noindexer"><span class="tooltiptextstatus">Currently set to No Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated22', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice22' );
 
function bseoni_bulk_action_admin_notice22() {
  if ( ! empty( $_REQUEST['bulk_seo_updated22'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated22'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s page to NoFollow.',
        'Updated %s pages to NoFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer22'
      ) . '</div>', $seo_updated_count );
  }
}

/*===========================================
 *
 * Add remove bulk dropdown option noindex no follow
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions23' );
 
function register_bseoni_bulk_actions23($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer23'] = __( 'Remove Noindex-NoFollow', 'bseoni_bulk_seo_noindexer23');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler23', 10, 3 );
 
function bseoni_bulk_action_handler23( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer23' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_noindexer', '<div class="seo-bulk-index"><span class="tooltiptextstatus">Currently set to Index</span></div>' );
      update_post_meta( $page_id, 'bseoni_bulk_nofollow', '<div class="seo-bulk-follow"><span class="tooltiptextstatus">Currently set to Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated23', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice23' );
 
function bseoni_bulk_action_admin_notice23() {
  if ( ! empty( $_REQUEST['bulk_seo_updated23'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated23'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Updated %s page to remove Noinxed/noFollow.',
        'Updated %s pages to remove Noinxed/noFollow.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer23'
      ) . '</div>', $seo_updated_count );
  }
}


/*===========================================
 *
 * Add remove No index dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions24' );
 
function register_bseoni_bulk_actions24($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer24'] = __( 'Remove NoIndex', 'bseoni_bulk_seo_noindexer24');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler24', 10, 3 );
 
function bseoni_bulk_action_handler24( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer24' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_noindexer', '<div class="seo-bulk-index"><span class="tooltiptextstatus">Currently set to Index</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated24', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice24' );
 
function bseoni_bulk_action_admin_notice24() {
  if ( ! empty( $_REQUEST['bulk_seo_updated24'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated24'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Removed NoIndex from %s page.',
        'Removed NoIndex %s pages.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer24'
      ) . '</div>', $seo_updated_count );
  }
}


/*===========================================
 *
 * No follow dropdown
 *
 *===========================================*/
add_filter( 'bulk_actions-edit-page', 'register_bseoni_bulk_actions25' );
 
function register_bseoni_bulk_actions25($bulk_actions) {
  $bulk_actions['bseoni_bulk_seo_noindexer25'] = __( 'Remove NoFollow', 'bseoni_bulk_seo_noindexer25');
  return $bulk_actions;
}

add_filter( 'handle_bulk_actions-edit-page', 'bseoni_bulk_action_handler25', 10, 3 );
 
function bseoni_bulk_action_handler25( $redirect_to, $doaction, $page_ids ) {
  if ( $doaction !== 'bseoni_bulk_seo_noindexer25' ) {
    return $redirect_to;
  }
  foreach ( $page_ids as $page_id ) {
    // Perform action for each post.
      
          update_post_meta( $page_id, 'bseoni_bulk_nofollow', '<div class="seo-bulk-follow"><span class="tooltiptextstatus">Currently set to Follow</span></div>' );
         
      
  }
  $redirect_to = add_query_arg( 'bulk_seo_updated25', count( $page_ids ), $redirect_to );
  return $redirect_to;
}
add_action( 'admin_notices', 'bseoni_bulk_action_admin_notice25' );
 
function bseoni_bulk_action_admin_notice25() {
  if ( ! empty( $_REQUEST['bulk_seo_updated25'] ) ) {
    $seo_updated_count = intval( $_REQUEST['bulk_seo_updated25'] );
    printf( '<div id="message" class="updated fade">' .
      _n( 'Removed NoFollow from %s page.',
        'Removed NoFollow from %s pages.',
        $seo_updated_count,
        'bseoni_bulk_seo_noindexer25'
      ) . '</div>', $seo_updated_count );
  }
}