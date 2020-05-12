<?php
/*
Plugin Name: Spotlight
Plugin URI: addspotlight.com
Description: Display the Spotlight widget on your WordPress site
Version: 1.0.0
Author: Steven Boyce
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

class Spotlight_Plugin {
    public function __construct() {
        // Hook into Admin Menu
        add_action( 'admin_menu', array( $this, 'create_plugin_settings_page'));
        add_action( 'admin_init', array( $this, 'setup_sections' ) );
        add_action( 'admin_init', array( $this, 'setup_fields' ) );

    }

    public function create_plugin_settings_page() {
        // Add the menu item and page
        $page_title = 'Spotlight';
        $menu_title = 'Spotlight';
        $capability = 'manage_options';
        $slug = 'spotlight_fields';
        $callback = array( $this, 'plugin_settings_page_content' );
        $icon = 'dashicons-admin-plugins';
        $position = 100;
    
        add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
    }

    public function plugin_settings_page_content() { ?>
        <div class="wrap">
            <h2>Manage Spotlight Settings</h2>
            <form method="post" action="options.php">
                <?php
                    settings_fields( 'spotlight_fields' );
                    do_settings_sections( 'spotlight_fields' );
                    submit_button();
                ?>
            </form>
        </div> <?php
    }


    public function setup_sections() {
        add_settings_section( 'workspace_settings', 'Workspace Settings', array( $this, 'section_callback'), 'spotlight_fields' );
        // multiple options
        // add_settings_section( 'our_second_section', 'My Second Section Title', array( $this, 'section_callback' ), 'spotlight_fields' );
        // add_settings_section( 'our_third_section', 'My Third Section Title', array( $this, 'section_callback' ), 'spotlight_fields' );
    }
    public function section_callback( $arguments ) {
        switch( $arguments['id'] ){
            case 'workspace_settings':
                // echo 'This is where the workspace settings go!';
                break;
                // only for multiple options but I'm keeping this here for clarity
            // case 'our_second_section':
            //     echo 'This one is number two';
            //     break;
            // case 'our_third_section':
            //     echo 'Third time is the charm!';
            //     break;
        }
    }   

    public function setup_fields() {
        $fields = array(
            array(
            'uid' => 'workspaceId',
            'label' => 'Workspace ID',
            'section' => 'workspace_settings',
            'type' => 'text',
            )
            );
            foreach( $fields as $field ){
                add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'spotlight_fields', $field['section'], $field);
                register_setting( 'spotlight_fields', $field['uid'] );
            }
    }

    public function field_callback( $arguments ) {
        echo '<input name="workspaceId" id="workspaceId" type="text" value="' . get_option( 'workspaceId' ) . '" />';
        register_setting( 'spotlight_fields', 'workspaceId' );
    }

}

new Spotlight_Plugin();

require_once(plugin_dir_path(__FILE__).'/includes/spotlight-scripts.php');
