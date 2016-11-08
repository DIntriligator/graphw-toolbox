<?php 

function graphw_excerpt($excerpt_length = 55, $custom_end = " ...", $id = false, $echo = true)  {
    
    $text = '';
    
    if($id) {
      $the_post = & get_post( $my_id = $id );
      $text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
    } else {
      global $post;
      $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }
    
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
  
    $excerpt_more = ' ';
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
      array_pop($words);
      $text = implode(' ', $words);
      $text = $text . $excerpt_more;
    } else {
      $text = implode(' ', $words);
    }
  if($echo)
  echo apply_filters('the_content', $text.$custom_end);
  else
  return $text;
}

function get_graphw_excerpt($excerpt_length = 55, $id = false, $echo = false) {
 return graphw_excerpt($excerpt_length, $id, $echo);
} ?>