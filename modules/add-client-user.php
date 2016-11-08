<?php
add_action('init', 'graphw_add_client');
function graphw_add_client(){
	add_role('client', __( 'Client' ), array('read => true'));

	if(current_user_can('client')){
		show_admin_bar(false);
	}
}


?>