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
        $user_author_name = isset( $instance['user_author_name'] ) ? $instance['user_author_name'] : '';
        $user_author_bio = isset( $instance['user_author_bio'] ) ? (bool) $instance['user_author_bio'] : '';
        $image =  isset( $instance['image'] ) ? (bool) $instance['image'] : false;
        $user_occupation =  isset( $instance['user_occupation'] )  ? (bool) $instance['user_occupation'] : false;
        $user_website_link =  isset( $instance['user_website_link'] )  ? (bool) $instance['user_website_link'] : false;
        $user_facebook_link =  isset( $instance['user_facebook_link'] )  ? (bool) $instance['user_facebook_link'] : false;
        $user_instagram_link =  isset( $instance['user_instagram_link'] )  ? (bool) $instance['user_instagram_link'] : false;
        $user_tiktok_link =  isset( $instance['user_tiktok_link'] )  ? (bool) $instance['user_tiktok_link'] : false;
        $user_linkedin_link =  isset( $instance['user_linkedin_link'] )  ? (bool) $instance['user_linkedin_link'] : false;
        $user_github_link =  isset( $instance['user_github_link'] )  ? (bool) $instance['user_github_link'] : false;
        $user_paypal_link =  isset( $instance['user_paypal_link'] )  ? (bool) $instance['user_paypal_link'] : false;
        
        $display_latest_posts = isset( $instance['display_latest_posts'] ) ? (bool) $instance['display_latest_posts'] : false;
        $latest_posts_number = isset( $instance['latest_posts_number'] ) ? (int) $instance['latest_posts_number'] : 3;

        $display_post_categories = isset( $instance['display_post_categories'] ) ? (bool) $instance['display_post_categories'] : false;

        ?>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'csc-sidebar' ); ?>:</label>
                <input type="text" class="widefat" 
                id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                value="<?php echo esc_attr( $title ); ?>">
            </p>

            <p>
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'user_author_name' ); ?>" name="<?php echo $this->get_field_name( 'user_author_name' ); ?>" <?php checked( $user_author_name ); ?>>
                <label for="<?php echo $this->get_field_id( 'user_author_name' ); ?>"><?php esc_html_e( 'Display author name', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'user_author_bio' ); ?>" name="<?php echo $this->get_field_name( 'user_author_bio' ); ?>" <?php checked( $user_author_bio ); ?>>
                <label for="<?php echo $this->get_field_id( 'user_author_bio' ); ?>"><?php esc_html_e( 'Display author bio', 'csc-sidebar' ); ?></label>
            </p>
            
            <p>
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" <?php checked( $image ); ?>>
                <label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php esc_html_e( 'Display user image', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_occupation' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_occupation' ); ?>"
                <?php checked( $user_occupation ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_occupation' ); ?>"><?php esc_html_e( 'Display users occupation', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'user_website_link' ); ?>" 
                name="<?php echo $this->get_field_name( 'user_website_link' ); ?>"
                <?php checked( $user_website_link ) ?>>
                <label for="<?php echo $this->get_field_id( 'user_website_link' ); ?>"><?php esc_html_e( 'Display users website link', 'csc-sidebar' ); ?></label>
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

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'display_latest_posts' ); ?>" 
                name="<?php echo $this->get_field_name( 'display_latest_posts' ); ?>"
                <?php checked( $display_latest_posts ) ?>>
                <label for="<?php echo $this->get_field_id( 'display_latest_posts' ); ?>"><?php esc_html_e( 'Display authors latest posts', 'csc-sidebar' ); ?></label>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'latest_posts_number' ); ?>"><?php esc_html_e( 'Latest number of posts to show', 'csc-sidebar' ); ?>:</label>
                <input type="latest_posts_number" class="tiny-text" id="<?php echo $this->get_field_id( 'latest_posts_number' ); ?>" name="<?php echo $this->get_field_name( 'latest_posts_number' ); ?>" step="1" min="1" size="3" value="<?php echo esc_attr( $latest_posts_number ); ?>">
            </p>

            <p>
                <input type="checkbox" class="checkbox" 
                id="<?php echo $this->get_field_id( 'display_post_categories' ); ?>" 
                name="<?php echo $this->get_field_name( 'display_post_categories' ); ?>"
                <?php checked( $display_post_categories ) ?>>
                <label for="<?php echo $this->get_field_id( 'display_post_categories' ); ?>"><?php esc_html_e( 'Display post categories', 'csc-sidebar' ); ?></label>
            </p>
        <?php

    }

    public function widget( $args, $instance ){
        $default_title = 'CSC Sidebar';
        $title = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
        $user_author_name = ! empty( $instance['user_author_name'] ) ? $instance['user_author_name'] : false;
        $user_author_bio = ! empty( $instance['user_author_bio'] ) ? $instance['user_author_bio'] : false;
        $image = isset( $instance['image'] ) ? $instance['image'] : false;
        $user_website_link = isset( $instance['user_website_link'] ) ? $instance['user_website_link'] : false;
        $user_occupation = isset( $instance['user_occupation'] ) ? $instance['user_occupation'] : false;
        $user_facebook_link = isset( $instance['user_facebook_link'] ) ? $instance['user_facebook_link'] : false;
        $user_instagram_link = isset( $instance['user_instagram_link'] ) ? $instance['user_instagram_link'] : false;
        $user_tiktok_link = isset( $instance['user_tiktok_link'] ) ? $instance['user_tiktok_link'] : false;
        $user_linkedin_link = isset( $instance['user_linkedin_link'] ) ? $instance['user_linkedin_link'] : false;
        $user_github_link = isset( $instance['user_github_link'] ) ? $instance['user_github_link'] : false;
        $user_paypal_link = isset( $instance['user_paypal_link'] ) ? $instance['user_paypal_link'] : false;

        $display_latest_posts = isset( $instance['display_latest_posts'] ) ? $instance['display_latest_posts'] : false;
        $latest_posts_number = isset( $instance['latest_posts_number'] ) ? $instance['latest_posts_number'] : 3;

        $display_post_categories = isset( $instance['display_post_categories'] ) ? $instance['display_post_categories'] : false;

        echo $args['before_widget'];

        require( CSC_SIDEBAR_PATH . 'views/csc-sidebar_widget.php');

        echo $args['after_widget'] ?? '';

    }

    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['user_author_name'] = ! empty ( $new_instance['user_author_name'] ) ? 1 : 0;
        $instance['user_author_bio'] = ! empty ( $new_instance['user_author_bio'] ) ? 1 : 0;
        $instance['image'] = ! empty ( $new_instance['image'] ) ? 1 : 0;
        $instance['user_website_link'] = ! empty ( $new_instance['user_website_link'] ) ? 1 : 0;
        $instance['user_occupation'] = ! empty ( $new_instance['user_occupation'] ) ? 1 : 0;
        $instance['user_facebook_link'] = ! empty ( $new_instance['user_facebook_link'] ) ? 1 : 0;
        $instance['user_instagram_link'] = ! empty ( $new_instance['user_instagram_link'] ) ? 1 : 0;
        $instance['user_tiktok_link'] = ! empty ( $new_instance['user_tiktok_link'] ) ? 1 : 0;
        $instance['user_linkedin_link'] = ! empty ( $new_instance['user_linkedin_link'] ) ? 1 : 0;
        $instance['user_github_link'] = ! empty ( $new_instance['user_github_link'] ) ? 1 : 0;
        $instance['user_paypal_link'] = ! empty ( $new_instance['user_paypal_link'] ) ? 1 : 0;

        $instance['display_latest_posts'] = ! empty ( $new_instance['display_latest_posts'] ) ? 1 : 0;
        $instance['latest_posts_number'] = (int) $new_instance['latest_posts_number'];

        $instance['display_post_categories'] = ! empty ( $new_instance['display_post_categories'] ) ? 1 : 0;

        return $instance;
    }
}