<?php //----------SECTION--------------//
function graphw_section_shortcode($atts,$content,$tags) {
$value = shortcode_atts(array(
    'class' => ''
    ), $atts);
  return '<section class="'.$value['class'].'">'.do_shortcode($content).'</section>'; 
}
add_shortcode('section','graphw_section_shortcode');

//----------CONTAINER--------------//
function graphw_container_shortcode($atts,$content,$tags) {
$value = shortcode_atts(array(
		'class' => ''
		), $atts);
	return '<div class="container '.$value['class'].'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('container','graphw_container_shortcode');

//-------------ROW-------------//
function graphw_row_shortcode($atts,$content,$tags) {
    $value = shortcode_atts(array(
    'class'=> '',
    ), $atts);
	return '<div class="row '.$value['class'].'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('row','graphw_row_shortcode');

//--------------COLUMNS-------------//
function graphw_col_shortcode($atts,$content,$tags) {
	$value = shortcode_atts(array(
		'columns' => '',
		'offset' => '',
		'class'=> '',
		), $atts);

  if (!$value['offset'] == ''){
	$result = $value['columns']." offset-by-".$value['offset'];
}else {
  $result = $value['columns'];
}

	return '<div class="'.$result.' '.$value['class'].' columns">'.do_shortcode($content).'</div>';
}
add_shortcode('col','graphw_col_shortcode');

//-------------DIV-------------//
function graphw_div_shortcode($atts,$content,$tags) {
    $value = shortcode_atts(array(
    'class'=> '',
    ), $atts);
	return '<div class="'.$value['class'].'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('div','graphw_div_shortcode');

//-------------Accordian-------------//
function graphw_acc_container_shortcode($atts,$content,$tags) {
	$value = shortcode_atts(array(
		'class' => ''
		), $atts);
	return '<div class="_accordian '.$value['class'].'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('acc-container','graphw_acc_container_shortcode'); 

function graphw_acc_title_shortcode($atts,$content,$tags) {
	$value = shortcode_atts(array(
		'class' => ''
		), $atts);
	return '<a href="#" class="_accordian-title '.$value['class'].'">'.do_shortcode($content).'</a>'; 
}
add_shortcode('acc-title','graphw_acc_title_shortcode'); 

function graphw_acc_content_shortcode($atts,$content,$tags) {
	$value = shortcode_atts(array(
		'class' => ''
		), $atts);
	return '<div class="_accordian-content '.$value['class'].'">'.do_shortcode($content).'</div>'; 
}
add_shortcode('acc-content','graphw_acc_content_shortcode'); 


// //-------------Loops-------------//
function graphw_gw_loop_shortcode($atts,$content,$tags) {
  $value = shortcode_atts(array(
      'id' => ''
   ), $atts);
	 $loops = get_option('gw-loops');
	 $loop_id = $value['id'];

	 $loop = $loops[$loop_id];



   $args=[
			'post_type' => $loop['post-type'],
			'category_name' => $loop['categories'],
			'tag' => $loop['tags'],
			'posts_per_page' => $loop['posts-per-page'],
			'order' => $loop['post-order'],
			'order_by' => $loop['order-by'],
			$loop['taxonomy-name'] => $loop['taxonomy-query']
		];
		$query = new WP_Query($args);

   ob_start(); 

   if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post();

   	include(plugin_dir_path(dirname(__FILE__)) . '/templates/loop-'. $loop_id .'.php');
          
   endwhile; endif;
   
   wp_reset_query();
   return ob_get_clean();
}
add_shortcode('gw-loop','graphw_gw_loop_shortcode'); 


//ignore whitespace inside shortcode
	add_filter( 'the_content', 'graphw_shortcode_empty_paragraph_fix' );
function graphw_shortcode_empty_paragraph_fix( $content ) {

	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
		);
	return strtr( $content, $array );

}

//shortcode buttons
function graphw_enqueue_plugin_scripts($plugin_array)
{
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["shortcode_plugin"] =  plugin_dir_url(dirname(__FILE__)) . "js/Shortcodes_js.js";
    return $plugin_array;
}

add_filter("mce_external_plugins", "graphw_enqueue_plugin_scripts");
function graphw_register_buttons_editor($buttons)
{
    //add each button here and on js page
    array_push($buttons, "graphw_button");
    return $buttons;
}
add_filter("mce_buttons_2", "graphw_register_buttons_editor");
?>