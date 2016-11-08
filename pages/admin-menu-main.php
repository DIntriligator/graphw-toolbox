<?php function graphw_toolbox_options(){

    // HEADER

    ?>
<div class="wrap">
  <div class ="graphw_toolset_wrap">
  <div class="container">
    <div class="row">
      <div class="twelve columns text-center">
        <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . '/images/graphw-theme-options.png' ?>">
      </div>
    </div>
  </div>
<section id="menu">
  <div class="container">
    <div class="row">
      <div class="text-center graphw_toolset_navbar">
        <a href="#" class="menu-link is-active" name="settings">Settings</a>
        <a href="#" class="menu-link" name="image-sizes">Image Sizes</a>
        <a href="#" class="menu-link" name="custom-css">Custom CSS</a>
        <a href="#" class="menu-link" name="cpt">Custom Post Types</a>
        <a href="#" class="menu-link" name="maintenance">Maintenance Mode</a>
        <a href="#" class="menu-link" name="custom-loops">Custom Loops</a>
      </div>
    </div>
  </div>
</section>

<?php

    //PAGES
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/settings.php');
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/image-sizes.php');
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/custom-css.php');
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/cpt.php');
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/maintenance-mode.php');
    include( plugin_dir_path(dirname(__FILE__)) . 'pages/custom-loops.php');

    //FOOTER

?>
</div><!--graphw_toolset_wrap-->
</div>
<?php
}
//enqueue menu scripts
function graphw_enqueue_admin_scripts($hook) {
      if ( 'toplevel_page_graphicswestchestertoolbox' != $hook ) {
        return;
    }

  wp_enqueue_script( 'admin_menu_scripts', plugin_dir_url(dirname(__FILE__)) . '/js/admin-menu.js');
}
add_action( 'admin_enqueue_scripts', 'graphw_enqueue_admin_scripts' );

//enqueue menu css
add_action('admin_head', 'graphw_toolset_styling');

function graphw_toolset_styling($hook) {
  wp_enqueue_style( 'graphw_toolset_css' , plugin_dir_url(dirname(__FILE__)) . '/style.css' );
}?>
