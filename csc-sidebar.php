<?php

/**
* Plugin Name: CSC Sidebar
* Plugin URI: https://www.wordpress.org/csc-sidebar
* Description: A customizable sidebar for your WordPress theme
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Lindy Ramirez
* Author URI: https://www.lindyramirez.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: csc-sidebar
* Domain Path: /languages
*/
/*
CSC Sidebar is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
CSC Sidebar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with CSC Sidebar. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'CSC_Sidebar' ) ){

    class CSC_Sidebar{
        // public $author_email = '';

        public function __construct() {

            // Define constants used througout the plugin
            $this->define_constants(); 
            
            require_once( CSC_SIDEBAR_PATH . 'post-types/class.csc-sidebar-cpt.php' );
            $CSCSidebarPostType = new CSC_Sidebar_Post_Type();

            require_once( CSC_SIDEBAR_PATH . 'widgets/class.csc-sidebar-widget.php' );
            $CSCSidebarWidget = new CSC_Sidebar_Widget();

            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

        }

         /**
         * Define Constants
         */
        public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
            define ( 'CSC_SIDEBAR_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'CSC_SIDEBAR_URL', plugin_dir_url( __FILE__ ) );
            define ( 'CSC_SIDEBAR_VERSION', '1.0.0' );     
        }

        // public function set_author_email() {
        //     global $post;
        //     $this->author_email = get_the_author_meta('user_email', $post->post_author);
        // }

         /**
         * Enqueue scripts and pass PHP variables to JavaScript
         */
        public function enqueue_scripts() {
            wp_enqueue_style('csc-sidebar-frontend', CSC_SIDEBAR_URL . 'assets/css/frontend.css', array(), CSC_SIDEBAR_VERSION, 'all');
            // $this->set_author_email();

            // wp_enqueue_script('social-icons-handler', CSC_SIDEBAR_URL . 'assets/social-icons-handler.js', array(), CSC_SIDEBAR_VERSION, true);
        
            // $author_email_hash = hash('sha256', $this->author_email); 
        
            // Localize the script with your data
            // wp_localize_script('social-icons-handler', 'cscSidebarData', array(
            //     'authorEmailHash' => $author_email_hash,
            // ));
        }


        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );
        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            unregister_post_type( 'csc-sidebar' );
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }

    }
}

if( class_exists( 'CSC_Sidebar' ) ){
    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'CSC_Sidebar', 'activate'));
    register_deactivation_hook( __FILE__, array( 'CSC_Sidebar', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'CSC_Sidebar', 'uninstall' ) );

    $csc_sidebar = new CSC_Sidebar();
}