<section class="maintenance" id="maintenance" style="display:none;">
		<div class="container">
			<div class="row">
				<div class="twelve columns graphw_admin-card">
					<div class="text-center">
          	<?php if(get_option('graphw_maintenance-mode')) : ?>
	          	<div class="text-center">
	          		<form name="form1" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
								<input type="hidden" name="action" value="graphw_maintenance_off" />
								<?php wp_nonce_field(); ?>
	          			<h6 class="title">Maintenance Mode is <b>ON</b></h6><br><br>
	          			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Turn Off'); ?>" /> 
	          		</form>
	          	</div><br>
	          	<div class="text-center">
		    				<a href="/coming-soon" target="_blank">View Maintenance Page</a>
		    			</div>
          	<?php else : ?>
	          	<div class="text-center">
	          		<form name="form1" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
								<input type="hidden" name="action" value="graphw_maintenance_on" />
								<?php wp_nonce_field()?>
	          			<h6 class="title">Maintenance Mode is <b>OFF</b></h6><br><br>
	          			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Turn On'); ?>" /> 
	          		</form>
	          	</div>
          	<?php endif ?>
          	<hr>
						<!-- <input type="checkbox" name="switch" <?php echo $checked ?>> <label style="display:inline;">Enable Maintenance Mode</label><br><br> -->
	<form name="form1" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
		<input type="hidden" name="action" value="graphw_maintenance" />
		<?php wp_nonce_field()?>
						<?php $settings = array (
                'id' => 'graphw_maintenance',
                'image-size' => "full"
                ); ?>
          	<?php graphw_media_uploader($settings); ?>	<br><br>
          	<label for="image-size">Image Size</label>
						<input type="text" name="image-size" value="<?php echo get_option('graphw_maintenance-mode-sizing') ?>">
							<label for="message">Maintenance Mode Message</label>
							<textarea name="message"><?php echo get_option('graphw_maintenance-mode-message'); ?></textarea><br><br>
						<div class="row">
							<div class="four columns">
								<label for="form">Ninja Form ID</label>
								<input type="text" name="form" value="<?php echo get_option('graphw_maintenance-mode-form') ?>">
							</div>
							<div class="four columns">
								<label for="background">Background Color</label>
								<input type="text" name="background" value="<?php echo get_option('graphw_maintenance-mode-background') ?>">
							</div>
							<div class="four columns">
								<label for="font">Font Color</label>
								<input type="text" name="font" value="<?php echo get_option('graphw_maintenance-mode-font') ?>">
							</div>
						</div><br><br>
						<div class="row">
							<div class="four columns">
								<label for="button">Button Color</label>
								<input type="text" name="button" value="<?php echo get_option('graphw_maintenance-mode-button') ?>">
							</div>
							<div class="four columns">
								<label for="button-hover">Button Hover Color</label>
								<input type="text" name="button-hover" value="<?php echo get_option('graphw_maintenance-mode-button-hover') ?>">
							</div>
							<div class="four columns">
								<label for="accent">Accent Color</label>
								<input type="text" name="accent" value="<?php echo get_option('graphw_maintenance-mode-accent') ?>">
							</div>
						</div>
					</div>
					<div class="submit text-center">
		    			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		    	</div>
				</div>
			</div>
		</div>
	</form>
</section>