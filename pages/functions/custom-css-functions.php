<?php 
function graphw_css_admin_action() {
     if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
   if (!wp_verify_nonce($retrieved_nonce)){
    //custom-css
    update_option('graphw-custom-css', $_POST['custom-css-field']);
  }
  wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=custom-css') );

 exit;
} 

function graphw_custom_css() {
  if(get_option('graphw-custom-css') !== '') {
    echo '<style type="text/css">/*graphw-toolbox*/'.get_option('graphw-custom-css').'</style>';
  }
}
add_action('wp_head', 'graphw_custom_css');

?>