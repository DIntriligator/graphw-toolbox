<section class="settings is-visible" id="settings">
  <form name="form1" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
  <input type="hidden" name="action" value="graphw_settings" />
  <?php wp_nonce_field()?>
    <div class="container">
      <div class="row">
        <div class="six columns text-center graphw_admin-card settings-card">
          <h5>Google Analytics</h5>
          <p>Google Analytics can help you track who is visiting your site and how they are interacting with your site. Learn more about Google Analytics <a href="http://www.google.com/analytics/">here</a>.</p><br><br><br>
          <p>Enter your Google Analytics ID here</p>
          <p><input type="text" name="google_analytics" placeholder="UA-********-*" value="<?php echo get_option('graphw_google_analytics'); ?>"></p>
          <div class="submit text-center">
          <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
          </div>
        </div>
        <div class="six columns text-center graphw_admin-card login-logo-card settings-card">
          <h5>Login Page Logo</h5>
          <p>Upload an image to be used as the logo in the login page</p> 
          <?php $login_settings = array (
                'id' => 'graphw_login',
                'image-size' => "medium"
                ); ?>
          <?php graphw_media_uploader($login_settings); ?>
          <div class="submit text-center">
          <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
          </div>
        </div>
      </div>
    </div>
    </form>
</section>

