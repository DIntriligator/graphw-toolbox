<?php
/*
Plugin Name: Graphics Westchester Toolset
GitHub Plugin URI: dintriligator/graphw-toolbox 
GitHub Plugin URI: https://github.com/dintriligator/graphw-toolbox
Description: A toolset for websites developed by Graphics Westchester
Author:      Graphics Westchester
Version: 0.1.00
*/


/*
*  graphw_toolbox_activate
*
*  This function adds options for the plugin to use on activation
*
*  @type    function
*  @date    06/15/12
*  @since   0.0.0
*
*  @param   N/A
*  @return  N/A
*/

function graphw_toolbox_activate() {
 add_option('graphw_google_analytics', '');
 add_option('graphw_favicon', '#');
 add_option('graphw_login', 'images/wordpress-logo.svg?ver=20131107');
 add_option('graphw-custom-css', '');
 add_option('graphw_maintenance-mode', '');
 add_option('graphw_maintenance-mode-message', 'COMPANY NAME is currently under construction! If your have any questions, please feel free to contact us via phone at (xxx)xxx-xxxx. Also, be sure to sign up for our mailing list.'); 
 add_option('maintenance-mode-page', '');
 add_option('graphw_maintenance', '');
 add_option('graphw_maintenance-mode-font', '#222');
 add_option('graphw_maintenance-mode-accent', '#007acc');
 add_option('graphw_maintenance-mode-background', '#fff');
 add_option('graphw_maintenance-mode-form', '');
 add_option('graphw_maintenance-mode-button', '#007acc');
 add_option('graphw_maintenance-mode-button-hover', '#007acc');
 add_option('graphw_maintenance-mode-sizing', '35vw');
 add_option('graphw_loops', '');

  //Loop through custom post types
    $types = get_post_types();
    $type_i = 0;
    $dont_show=['attachment', 'revision', 'nav_menu_item', 'acf', 'graphw_cpt', 'newcpt', 'nf_sub'];
      foreach( $types as $type ) {
      if(!in_array($type, $dont_show)) {
        add_option('graphw-'.$type.'-image-size');
      }
    }

  //Add template pages
  $loops = get_option('gw-loops');
  if (!file_exists(plugin_dir_path( __FILE__ ) . 'templates')) {
    mkdir(plugin_dir_path( __FILE__ ) . 'templates', 0755, true);
}
  if($loops){
    foreach($loops as $loop){
      $loops[$loop_id]['loop-content'] = $_POST['loop-content-' . $loop_id];
      file_put_contents ( dirname(__FILE__) . 'templates/loop-' . $loop_id. '.php', stripslashes($_POST['loop-content-' . $loop_id]));
    }
  }


}
register_activation_hook( __FILE__, 'graphw_toolbox_activate' );
// ********************** SHORTCODES ********************** //

include( plugin_dir_path( __FILE__ ) . 'modules/shortcodes.php');

// ********************** REGISTER ADMIN MENU ********************** //

include( plugin_dir_path( __FILE__ ) . 'modules/admin-menu-setup.php');

// ********************** ADMIN MENU ********************** //

include( plugin_dir_path( __FILE__ ) . 'pages/admin-menu-main.php');

include( plugin_dir_path( __FILE__ ) . 'pages/functions/functions-main.php');

include( plugin_dir_path( __FILE__ ) . 'modules/admin-menu-image-uploader.php');

// ********************** SOCIAL WIDGET ********************** //

include( plugin_dir_path( __FILE__ ) . 'modules/social-widget.php');

// ********************** CUSTOM POST EXCERPTS ********************** //

include( plugin_dir_path( __FILE__ ) . 'modules/custom-excerpt.php');

// ********************** CLIENT USER ROLE ********************** //

include( plugin_dir_path( __FILE__ ) . 'modules/add-client-user.php');

   ?>
