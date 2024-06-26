<?php

if( !class_exists('CSC_Sidebar_Post_Type')){
    class CSC_Sidebar_Post_Type{
        public function __construct(){
            add_action( 'init', array( $this, 'create_post_type' ) );

            add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
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
    }  
}