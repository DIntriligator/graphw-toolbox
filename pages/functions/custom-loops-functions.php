<?php 
function graphw_add_custom_loops_admin_action() {
	  if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
  if (!wp_verify_nonce($retrieved_nonce)){
	$loops = get_option('gw-loops');
	$loop_count = count($loops) + 1;
	if($loop_count > 0) {
		$last_count = $loop_count - 1;
		$last_id = $loops[$last_count]['id'];
		$new_id = $last_id + 1;
	} else {
		$new_id = 0;
	}
	$loops[$new_id]['id'] = $new_id;
	$loops[$new_id]['title'] = 'New Loop';

	update_option('gw-loops', $loops);
}
 wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=custom-loops') );
 exit;
}

function graphw_custom_loops_admin_action() {
	  if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
  if (!wp_verify_nonce($retrieved_nonce)){

	$loops = get_option('gw-loops');

	foreach($loops as $loop){
		$loop_id = $loop['id'];

    $loops[$loop_id]['title'] = $_POST['post-title-' . $loop_id];
    $loops[$loop_id]['post-type'] = $_POST['post-type-' . $loop_id];
    $loops[$loop_id]['categories'] = $_POST['categories-' . $loop_id];
    $loops[$loop_id]['tags'] = $_POST['tags-' . $loop_id];
    $loops[$loop_id]['posts-per-page'] = $_POST['posts-per-page-' . $loop_id];
    $loops[$loop_id]['post-order'] = $_POST['post-order-' . $loop_id];
    $loops[$loop_id]['order-by'] = $_POST['order-by-' . $loop_id];
    $loops[$loop_id]['taxonomy-name'] = $_POST['taxonomy-name-' . $loop_id];
     $loops[$loop_id]['taxonomy-query'] = $_POST['taxonomy-query-' . $loop_id];
    if ($loops[$loop_id]['loop-content'] !==$_POST['loop-content-' . $loop_id]) {
      $loops[$loop_id]['loop-content'] = $_POST['loop-content-' . $loop_id];
      file_put_contents ( plugin_dir_path(dirname(dirname(__FILE__))) . 'templates/loop-' . $loop_id. '.php', stripslashes($_POST['loop-content-' . $loop_id]));
    }
	}

 update_option('gw-loops', $loops);
}
 wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=custom-loops') );
 exit;
}

function graphw_delete_custom_loops_admin_action() {
		  if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
  if (!wp_verify_nonce($retrieved_nonce)){
  	$loops = get_option('gw-loops');
  	$loop_id = $_POST['the-id'];
  	unset($loops[$loop_id]);
  	update_option('gw-loops', $loops);
    $filename = plugin_dir_path(dirname(dirname(__FILE__))) . 'templates/loop-' . $loop_id. '.php';
         if (file_exists($filename)) {  
          wp_delete_file($filename);
      }
    }
   wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=custom-loops') );
 exit;

}