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
        $user_website_link =  isset( $instance['user_website_link'] )  ? (bool) $instance['user_website_link'] : false;
        $user_facebook_link =  isset( $instance['user_facebook_link'] )  ? (bool) $instance['user_facebook_link'] : false;
        $user_instagram_link =  isset( $instance['user_instagram_link'] )  ? (bool) $instance['user_instagram_link'] : false;
        $user_tiktok_link =  isset( $instance['user_tiktok_link'] )  ? (bool) $instance['user_tiktok_link'] : false;
        $user_linkedin_link =  isset( $instance['user_linkedin_link'] )  ? (bool) $instance['user_linkedin_link'] : false;
        $user_github_link =  isset( $instance['user_github_link'] )  ? (bool) $instance['user_github_link'] : false;
        $user_paypal_link =  isset( $instance['user_paypal_link'] )  ? (bool) $instance['user_paypal_link'] : false;

        ?>
            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_website_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_website_link' ); ?>"
                <?php checked( $user_website_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_website_link' ); ?>"><?php esc_html_e( 'Display users website link', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'csc-sidebar' ); ?>:</label>
                <input type="text" class="widefat" 
                id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                value="<?php echo esc_attr( $title ); ?>">
            </p>
            
            <p>
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

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_linkedin_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_linkedin_link' ); ?>"
                <?php checked( $user_linkedin_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_linkedin_link' ); ?>"><?php esc_html_e( 'Display user LinkedIn link', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_github_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_github_link' ); ?>"
                <?php checked( $user_github_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_github_link' ); ?>"><?php esc_html_e( 'Display user github link', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_paypal_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_paypal_link' ); ?>"
                <?php checked( $user_paypal_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_paypal_link' ); ?>"><?php esc_html_e( 'Display user paypal link', 'csc-sidebar' ); ?></label>
            </p>
        <?php

    }

    public function widget( $args, $instance ){
        $default_title = 'CSC Sidebar';
        $title = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;

        $image = isset( $instance['image'] ) ? $instance['image'] : false;
        $user_website_link = isset( $instance['user_website_link'] ) ? $instance['user_website_link'] : false;
        $user_facebook_link = isset( $instance['user_facebook_link'] ) ? $instance['user_facebook_link'] : false;
        $user_instagram_link = isset( $instance['user_instagram_link'] ) ? $instance['user_instagram_link'] : false;
        $user_tiktok_link = isset( $instance['user_tiktok_link'] ) ? $instance['user_tiktok_link'] : false;
        $user_linkedin_link = isset( $instance['user_linkedin_link'] ) ? $instance['user_linkedin_link'] : false;
        $user_github_link = isset( $instance['user_github_link'] ) ? $instance['user_github_link'] : false;
        $user_paypal_link = isset( $instance['user_paypal_link'] ) ? $instance['user_paypal_link'] : false;

        echo $args['before_widget'];

        require( CSC_SIDEBAR_PATH . 'views/csc-sidebar_widget.php');

        echo $args['after_widget'] ?? '';

    }

    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        $instance['image'] = ! empty ( $new_instance['image'] ) ? 1 : 0;
        $instance['user_website_link'] = ! empty ( $new_instance['user_website_link'] ) ? 1 : 0;
        $instance['user_facebook_link'] = ! empty ( $new_instance['user_facebook_link'] ) ? 1 : 0;
        $instance['user_instagram_link'] = ! empty ( $new_instance['user_instagram_link'] ) ? 1 : 0;
        $instance['user_tiktok_link'] = ! empty ( $new_instance['user_tiktok_link'] ) ? 1 : 0;
        $instance['user_linkedin_link'] = ! empty ( $new_instance['user_linkedin_link'] ) ? 1 : 0;
        $instance['user_github_link'] = ! empty ( $new_instance['user_github_link'] ) ? 1 : 0;
        $instance['user_paypal_link'] = ! empty ( $new_instance['user_paypal_link'] ) ? 1 : 0;

        return $instance;
    }
}