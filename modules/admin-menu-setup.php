<?php 
add_action( 'admin_menu', 'graphw_toolbox_menu' );
add_action( 'admin_action_graphw_settings', 'graphw_settings_admin_action' );
add_action( 'admin_action_graphw_images', 'graphw_images_admin_action' );
add_action( 'admin_action_graphw_css', 'graphw_css_admin_action' );
add_action( 'admin_action_graphw_cpt_add_button', 'graphw_cpt_add_button_admin_action' );
add_action( 'admin_action_graphw_cpt', 'graphw_cpt_admin_action' );
add_action( 'admin_action_graphw_cpt_delete_button', 'graphw_cpt_delete_button_admin_action' );
add_action( 'admin_action_graphw_maintenance', 'graphw_maintenance_admin_action' );
add_action( 'admin_action_graphw_maintenance_on', 'graphw_maintenance_on_admin_action' );
add_action( 'admin_action_graphw_maintenance_off', 'graphw_maintenance_off_admin_action' );
add_action( 'admin_action_graphw_custom_loops', 'graphw_custom_loops_admin_action' );
add_action( 'admin_action_graphw_add_custom_loops', 'graphw_add_custom_loops_admin_action' );
add_action( 'admin_action_graphw_delete_custom_loops', 'graphw_delete_custom_loops_admin_action' );

function graphw_toolbox_menu() {
add_menu_page( 'GW Theme Options', 'GW Theme Options', 'manage_options', 'graphicswestchestertoolbox', 'graphw_toolbox_options',plugin_dir_url(dirname(__FILE__)) . 'images/graphw-logo.png');
}
?>