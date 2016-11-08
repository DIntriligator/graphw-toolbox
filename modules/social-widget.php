<?php class graphw_Social_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'graphw_social_widget',
      'description' => 'Social Link For Footer',
    );
    parent::__construct( 'social_widget', 'Social Widget', $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
 
  public function widget( $args, $instance ) {
    if(strpos($instance['social_site'], 'https://') == false && strpos($instance['social_site'], 'http://') == false){
      $instance['social_site'] = 'http://' . $instance['social_site'];
    }
    if ( ! empty( $instance['social_site'] ) ) {
      echo $args['before_widget'] ?><a href="<?php echo $instance['social_site'] ?>" target="_blank"><i class="fa fa-<?php echo $instance['font_awesome'] ?>"></i></a><?php echo $args['after_widget'];
    }
  }


  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    $social_site = ! empty( $instance['social_site'] ) ? $instance['social_site'] : __( 'Social Website Address', 'text_domain' );
    $font_awesome = ! empty( $instance['font_awesome'] ) ? $instance['font_awesome'] : __( 'Font Awesome Name', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'social_site' ); ?>"><?php _e( 'Social Website Address (ex. www.instagram.com/yourusername):' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'social_site' ); ?>" name="<?php echo $this->get_field_name( 'social_site' ); ?>" type="text" value="<?php echo esc_attr( $social_site ); ?>">
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'font_awesome' ); ?>"><?php _e( 'Social Media Logo:' ); ?></label> 
    <select class="widefat" id="<?php echo $this->get_field_id( 'font_awesome' ); ?>" name="<?php echo $this->get_field_name( 'font_awesome' ); ?>"  value="<?php echo esc_attr( $font_awesome ); ?>">
    
    <?php graphw_social_widget_option($font_awesome, 'instagram', 'Instagram'); ?>
    <?php graphw_social_widget_option($font_awesome, 'facebook', 'Facebook'); ?>
    <?php graphw_social_widget_option($font_awesome, 'facebook-square', 'Facebook Square Logo'); ?>
    <?php graphw_social_widget_option($font_awesome, 'pinterest', 'Pinterest'); ?>
    <?php graphw_social_widget_option($font_awesome, 'pinterest-square', 'Pinterest Square Logo'); ?>
    <?php graphw_social_widget_option($font_awesome, 'twitter', 'Twitter'); ?>
    <?php graphw_social_widget_option($font_awesome, 'twitter-square', 'Twitter Square Logo'); ?>
    <?php graphw_social_widget_option($font_awesome, 'youtube', 'YouTube'); ?>
          
    </select>
    </p>
    <?php 

  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['social_site'] = ( ! empty( $new_instance['social_site'] ) ) ? strip_tags( $new_instance['social_site'] ) : '';
    $instance['font_awesome'] = ( ! empty( $new_instance['font_awesome'] ) ) ? strip_tags( $new_instance['font_awesome'] ) : '';
    return $instance;
  }
}

function register_social_widget() {
    register_widget( 'graphw_social_widget' );
}
add_action( 'widgets_init', 'register_social_widget' );
function graphw_social_widget_option($font_awesome, $input, $display_name){

if ($font_awesome == $input) : ?>
      <option value="<?php echo $input?>" selected><?php echo $display_name ?></option>
    <?php else : ?>
      <option value="<?php echo $input ?>"><?php echo $display_name ?></option>
    <?php endif; 

} ?>