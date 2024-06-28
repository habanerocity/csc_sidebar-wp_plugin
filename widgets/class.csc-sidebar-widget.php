<?php

class CSC_Sidebar_Widget extends WP_Widget{
    public function __construct(){
        $widget_options = array(
            'description' => __( 'Your favorite customizable sidebar', 'csc-sidebar' )
        );

        parent::__construct(
            'csc-sidebar',
            'CSC Sidebar',
            $widget_options
        );

        add_action( 
            'widgets_init', function(){
                register_widget(
                    'CSC_Sidebar_Widget'
                );
            } 
        );
    }

    public function form( $instance ){
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        // $number = 5;
        $image =  isset( $instance['image'] ) ? (bool) $instance['image'] : false;
        $user_facebook_link =  isset( $instance['user_facebook_link'] )  ? (bool) $instance['user_facebook_link'] : false;
        $user_instagram_link =  isset( $instance['user_instagram_link'] )  ? (bool) $instance['user_instagram_link'] : false;
        $user_tiktok_link =  isset( $instance['user_tiktok_link'] )  ? (bool) $instance['user_tiktok_link'] : false;
        var_dump( $image );
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'csc-sidebar' ); ?>:</label>
                <input type="text" class="widefat" 
                id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                value="<?php echo esc_attr( $title ); ?>">
            </p>
            
            <p>
                <?php var_dump( $image ); ?>
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" <?php checked( $image ); ?>>
                <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Display user image?', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_facebook_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_facebook_link' ); ?>"
                <?php checked( $user_facebook_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_facebook_link' ); ?>"><?php esc_html_e( 'Display user Facebook profile link', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_instagram_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_instagram_link' ); ?>"
                <?php checked( $user_instagram_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_instagram_link' ); ?>"><?php esc_html_e( 'Display user Instagram link', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_tiktok_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_tiktok_link' ); ?>"
                <?php checked( $user_tiktok_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_tiktok_link' ); ?>"><?php esc_html_e( 'Display user Tiktok link', 'csc-sidebar' ); ?></label>
            </p>
        <?php

    }

    public function widget( $args, $instance ){
        $default_title = 'CSC Sidebar';
        $title = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;

        $image = isset( $instance['image'] ) ? $instance['image'] : false;
        $user_facebook_link = isset( $instance['user_facebook_link'] ) ? $instance['user_facebook_link'] : false;
        $user_instagram_link = isset( $instance['user_instagram_link'] ) ? $instance['user_instagram_link'] : false;
        $user_tiktok_link = isset( $instance['user_tiktok_link'] ) ? $instance['user_tiktok_link'] : false;

        echo $args['before_widget'];

        require( CSC_SIDEBAR_PATH . 'views/csc-sidebar_widget.php');

        echo $args['after_widget'] ?? '';

    }

    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        $instance['image'] = ! empty ( $new_instance['image'] ) ? 1 : 0;
        $instance['user_facebook_link'] = ! empty ( $new_instance['user_facebook_link'] ) ? 1 : 0;
        $instance['user_instagram_link'] = ! empty ( $new_instance['user_instagram_link'] ) ? 1 : 0;
        $instance['user_tiktok_link'] = ! empty ( $new_instance['user_tiktok_link'] ) ? 1 : 0;

        return $instance;
    }
}