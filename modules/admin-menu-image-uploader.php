<?php // Image uploader
function graphw_media_uploader($settings){
// jQuery
wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media();
?>
    <div class="text-center">
    <input type="hidden" name="<?php echo $settings['id'] ?>" id="<?php echo $settings['id'] ?>-image_url" class="regular-text" value="<?php echo get_option($settings['id']) ?>">
    <img src="<?php echo get_option($settings['id']) ?>" id="<?php echo $settings['id'] ?>-image"><br><br>
    <div class="image-uploader-div">
      <input type="button" name="upload-btn" id="<?php echo $settings['id'] ?>-upload-btn" class="button-secondary" value="Upload Image">
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
	if(jQuery('#<?php echo $settings['id'] ?>-image').attr('src') == '#'){
		jQuery('#<?php echo $settings['id'] ?>-image').hide();
	}
    jQuery('#<?php echo $settings['id'] ?>-upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            <?php if(isset($settings['image-size'])) : ?>
              var image_url = uploaded_image.toJSON().sizes.<?php echo $settings['image-size'] ?>.url;
            <?php else : ?>
              var image_url = uploaded_image.toJSON().url;
            <?php endif; ?>  
            if(image_url.indexOf('png') < 0 ) {
              alert('Image must be a png')
            } else {
              jQuery('#image_url').val(image_url);
              jQuery('#<?php echo $settings['id'] ?>-image').attr('src', image_url);
              jQuery('#<?php echo $settings['id'] ?>-image').show(); 
            jQuery('#<?php echo $settings['id'] ?>-image').attr('src', image_url);
            jQuery('#<?php echo $settings['id'] ?>-image_url').val(image_url);
            jQuery('#<?php echo $settings['id'] ?>-image').show(); 
            }
        });
    });
});
</script> <?php
}
function graphw_load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'graphw_load_wp_media_files' ); ?>