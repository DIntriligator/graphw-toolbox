<?php 
/*
Template Name: Maintenance Mode
*/

include(plugin_dir_path(dirname(__FILE__)) . 'maintenance-view/header-coming-soon.php'); ?>
<div class="maintenance-content">
      			<div class="text-center">
 			  	<img class="maintenance_image" src="<?php echo get_option('graphw_maintenance'); ?>"><br>
      				<p class="maintenance_message"><?php echo get_option('graphw_maintenance-mode-message'); ?></p>
 				<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form(get_option('graphw_maintenance-mode-form')); } ?>
 				</div>
</div>




<?php include(plugin_dir_path(dirname(__FILE__)) . 'maintenance-view/footer-coming-soon.php'); ?>

