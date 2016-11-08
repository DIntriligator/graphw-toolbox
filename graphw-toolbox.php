<?php
/*
Plugin Name: Graphics Westchester Toolset
Description: A toolset for websites developed by Graphics Westchester
Author:      Graphics Westchester
Version: 0.0.00
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

// ********************** PLUGIN UPDATER ********************** //


/*
*  graphw_plugin_updater_init
*
*  This function sets up the updater for the plugin to get updates via github
*
*  @type    function
*  @date    06/15/12
*  @since   0.0.0
*
*  @param   N/A
*  @return  N/A
*/
add_action( 'init', 'graphw_plugin_updater_init' );
function graphw_plugin_updater_init() {

    define( 'WP_GITHUB_FORCE_UPDATE', true );
    include_once('updater/updater.php');


       if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
           $config = array(
               'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
               'proper_folder_name' => 'graphw-toolbox', // this is the name of the folder your plugin lives in
               'api_url' => 'https://api.github.com/repos/dintriligator/graphw-toolbox', // the GitHub API url of your GitHub repo
               'raw_url' => 'https://raw.githubusercontent.com/dintriligator/graphw-toolbox/master', // the GitHub raw url of your GitHub repo
               'github_url' => 'https://github.com/dintriligator/graphw-toolbox/master', // the GitHub url of your GitHub repo
               'zip_url' => 'https://github.com/dintriligator/graphw-toolbox/zipball/master', // the zip url of the GitHub repo
               'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
               'requires' => '4.0.0', // which version of WordPress does your plugin require?
               'tested' => '4.5.2', // which version of WordPress is your plugin tested up to?
               'readme' => 'ReadMe.md', // which file to use as the readme for the version number
               'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
           );
           new WP_GitHub_Updater($config);
       }
   }

   ?>
