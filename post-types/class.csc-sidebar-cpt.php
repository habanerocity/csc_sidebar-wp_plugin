<?php

if( !class_exists('CSC_Sidebar_Post_Type')){
    class CSC_Sidebar_Post_Type{
        public function __construct(){
            add_action( 'init', array( $this, 'create_post_type' ) );

            add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
            add_action( 'save_post', array( $this, 'save_post' ) );
        }

        public function create_post_type(){
            register_post_type(
                'csc-sidebar',
                array(
                    'label' => esc_html__( 'Sidebar', 'csc-sidebar' ),
                    'description'   => esc_html__( 'Sidebar', 'csc-sidebar' ),
                    'labels' => array(
                        'name'  => esc_html__( 'Sidebar', 'csc-sidebar' ),
                        'singular_name' => esc_html__( 'Sidebar', 'csc-sidebar' ),
                    ),
                    'public'    => true,
                    'supports'  => array( 'title', 'editor', 'thumbnail' ),
                    'hierarchical'  => false,
                    'show_ui'   => true,
                    'show_in_menu'  => true,
                    'menu_position' => 5,
                    'show_in_admin_bar' => true,
                    'show_in_nav_menus' => true,
                    'can_export'    => true,
                    'has_archive'   => false,
                    'exclude_from_search'   => true,
                    'publicly_queryable'    => true,
                    'show_in_rest'  => true,
                    'menu_icon' => 'dashicons-align-pull-right',
                )
            );
        }

        public function add_meta_boxes(){
            add_meta_box(
                'csc_sidebar_meta_box',
                esc_html__( 'Sidebar Options', 'csc-sidebar' ),
                array( $this, 'add_inner_meta_boxes' ),
                'csc-sidebar',
                'normal',
                'high'
            );
        }

        public function add_inner_meta_boxes( $post ){
            require_once( CSC_SIDEBAR_PATH . 'views/csc-sidebar_metabox.php' );
        }

        public function save_post( $post_id ){
            if( isset( $_POST['csc_sidebar_nonce'] ) ){
                if( ! wp_verify_nonce( $_POST['csc_sidebar_nonce'], 'csc_sidebar_nonce' ) ){
                    return;
                }
            }

            if( defined( 'DOING AUTOSAVE' ) && DOING_AUTOSAVE ){
                return;
            }

            if( isset( $_POST['post_type'] ) && $_POST['post_type'] === 'csc-sidebar' ){
                if( ! current_user_can( 'edit_page', $post_id ) ){
                    return;
                } elseif( ! current_user_can( 'edit_post', $post_id ) ){
                    return;
                }
            }

            if( isset( $_POST['action'] ) && $_POST['action'] === 'editpost' ){
                $old_user_facebook_link = get_post_meta( $post_id, 'csc_sidebar_user_facebook_link', true );
                $new_user_facebook_link = $_POST['csc_sidebar_user_facebook_link'];

                $old_user_instagram_link = get_post_meta( $post_id, 'csc_sidebar_user_instagram_link', true );
                $new_user_instagram_link = $_POST['csc_sidebar_user_instagram_link'];

                $old_user_tiktok_link = get_post_meta( $post_id, 'csc_sidebar_user_tiktok_link', true );
                $new_user_tiktok_link = $_POST['csc_sidebar_user_tiktok_link'];

                update_post_meta( $post_id, 'csc_sidebar_user_facebook_link', esc_url_raw( $new_user_facebook_link, $old_user_facebook_link ) );
                update_post_meta( $post_id, 'csc_sidebar_user_instagram_link', esc_url_raw( $new_user_instagram_link, $old_user_instagram_link ) );
                update_post_meta( $post_id, 'csc_sidebar_user_tiktok_link', esc_url_raw( $new_user_tiktok_link, $old_user_tiktok_link ) );
            }
        }
    }  
}