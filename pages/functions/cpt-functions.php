<?php 
add_action( 'init', 'graphw_plugin_create_post_type' );
function graphw_plugin_create_post_type() {
  register_post_type( 'graphw_cpt',
    array(
      'labels' => array(
        'name' => __( 'cpt' ),
        'singular_name' => __( 'cpt' )
      ),
      'public' => false,
      'has_archive' => true,
      'supports' => array('title')
    )
  );
}
function graphw_cpt_add_button_admin_action() {
  if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
  if (!wp_verify_nonce($retrieved_nonce)){
    $args = array(
      'post_title'    => 'new-cpt',
      'post_content' => ' ',
      'post_type'=>'graphw_cpt',
      'post_status' => 'publish',
    );
   $graphw_new_post = wp_insert_post($args);

    update_post_meta( $graphw_new_post, '_plural', 'New Cpts', true );
    update_post_meta( $graphw_new_post, '_single', 'New Cpt', true );
    update_post_meta( $graphw_new_post, '_dashicon', 'dashicons-admin-post', true );

 }
  wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=cpt') );
 exit;
}
function graphw_cpt_delete_button_admin_action() {
  if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
  }
  if (!wp_verify_nonce($retrieved_nonce)){
    wp_delete_post( $_POST['the-id'], true);
  }
  wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=cpt') );

 exit;
}
function graphw_cpt_admin_action() {
    if ( !current_user_can( 'manage_options' ) )
   {
      wp_die( 'You are not allowed to be on this page.' );
   }
   if (!wp_verify_nonce($retrieved_nonce)){
      function graphw_cpt_action_checkbox($item, $index) {
        if($_POST[$item.$index] == 'yes') {
          update_post_meta( get_the_id(), '_'.$item, 'checked' );
        } else {
          update_post_meta( get_the_id(), '_'.$item, ' ' );
        }
       }
      function graphw_cpt_action_text_field($item, $index) {
        if(isset($_POST[$item.$index])) {
          update_post_meta( get_the_id(), '_'.$item, sanitize_text_field( $_POST[$item.$index] ) );
        }
      }
      global $post;
      $index = 0;
      $args = array( 'post_type' => 'graphw_cpt', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'ID' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); 

      if(isset($_POST['name'.$index])) {
          wp_update_post(array('ID' => get_the_id(), 'post_title' => strtolower($_POST['name'.$index])));
        }

      graphw_cpt_action_text_field('plural', $index);
      graphw_cpt_action_text_field('single', $index);
      graphw_cpt_action_text_field('dashicon', $index);
      graphw_cpt_action_text_field('plural', $index);

      graphw_cpt_action_checkbox('public', $index);
      graphw_cpt_action_checkbox('hierarchial', $index);
      graphw_cpt_action_checkbox('archive', $index);
      graphw_cpt_action_checkbox('title', $index);
      graphw_cpt_action_checkbox('editor', $index);
      graphw_cpt_action_checkbox('author', $index);
      graphw_cpt_action_checkbox('thumbnail', $index);
      graphw_cpt_action_checkbox('excerpt', $index);
      graphw_cpt_action_checkbox('comments', $index);
      graphw_cpt_action_checkbox('page-attributes', $index);
      $index++; endwhile;
  }
  wp_redirect(  admin_url( 'admin.php?page=graphicswestchestertoolbox&loc=cpt') );
 exit;
} 

add_action( 'init', 'graphw_cpt_init' );
function graphw_cpt_init() {
  function graphw_cpt_checkbox($id, $item) {
    if(get_post_meta( $id, '_'.$item, true ) == 'checked'){
      return true;
    } else {
      return false;
    }
  }
  function graphw_cpt_supports($id, $item) {
    if(get_post_meta( $id, '_'.$item, true ) == 'checked'){
      return $item;
    } else {
      return '';
    }
  }
  global $post;
  $args = array( 'post_type' => 'graphw_cpt', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'ID' );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
  $plural_cpt = get_post_meta( $post->ID, '_plural', true );
  $single_cpt = get_post_meta( $post->ID, '_single', true );
  $dashicon_cpt = get_post_meta( $post->ID, '_dashicon', true );
  $public_cpt = graphw_cpt_checkbox($post->ID,'public');
  $hierarchial_cpt = graphw_cpt_checkbox($post->ID,'hierarchial');
  $archive_cpt = graphw_cpt_checkbox($post->ID,'archive');
  $title_cpt = graphw_cpt_supports($post->ID, 'title');
  $author_cpt = graphw_cpt_supports($post->ID, 'author');
  $thumbnail_cpt = graphw_cpt_supports($post->ID, 'thumbnail');
  $excerpt_cpt = graphw_cpt_supports($post->ID, 'excerpt');
  $editor_cpt = graphw_cpt_supports($post->ID, 'editor');
  $comments_cpt = graphw_cpt_supports($post->ID, 'comments');
  $page_attributes_cpt = graphw_cpt_supports($post->ID, 'page-attributes');

  if(get_the_title() !== 'new-cpt'){

    $labels = array(
      'name'               => ( $plural_cpt ),
      'singular_name'      => ( $single_cpt ),
      'menu_name'          => ( $plural_cpt ),
    );

    $args = array(
      'labels'             => $labels,
      'public'             => $public_cpt,
      'rewrite'            => array( 'slug' => get_the_title() ),
      'has_archive'        => $archive_cpt,
      'hierarchical'       => $hierarchial_cpt,
      'menu_icon'          => $dashicon_cpt,
      'supports'           => array( $title_cpt, $editor_cpt, $author_cpt, $thumbnail_cpt, $excerpt_cpt, $comments_cpt, $page_attributes_cpt )
    );

    register_post_type( get_the_title(), $args );
  }
  endwhile;
}?>