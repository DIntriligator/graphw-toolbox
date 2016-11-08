<?php function graphw_images_admin_action() {
     if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
   if (!wp_verify_nonce($retrieved_nonce)){
     //Loop through custom post types
      $types = get_post_types();
      $type_i = 0;
      foreach( $types as $type ) {
          update_option('graphw-'.$type.'-image-size', $_POST['graphw-'.$type.'-image']);
      }
    }
     wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=image-sizes') );
 exit;
} 
function graphw_featured_image_setup($post_type, $graphw_text) {
  add_meta_box('postimagediv', __('Featured Image'), 'graphw_featured_meta_box', $post_type, 'side', 'default', array('text'=>$graphw_text ));

}
function graphw_featured_meta_box($post, $metabox) {
      $thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );
    echo _wp_post_thumbnail_html( $thumbnail_id, $post->ID );
    echo '<p><b>'.$metabox['args']['text'].'</b><br> is the optimal size for this image. Any images larger than this will be cropped to this size at the center.</p>';
}

 //Loop through custom post types
function graphw_featured_image() {
  $types = get_post_types();
  $type_i = 0;
  foreach( $types as $type ) {
    if(!get_option('graphw-'.$type.'-image-size') == '') {
    $dont_show=['attachment', 'revision', 'nav_menu_item', 'acf', 'graphw_cpt', 'newcpt', 'nf_sub'];
      if(!in_array($type, $dont_show)) {
        graphw_featured_image_setup($type, get_option('graphw-'.$type.'-image-size'));
      } 
    }
  }
}
add_action('do_meta_boxes', 'graphw_featured_image');?>