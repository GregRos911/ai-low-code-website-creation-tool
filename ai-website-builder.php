<?php
/*
Plugin Name: AI Website Builder
Description: A simple plugin to load the Silex editor in WordPress.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) exit;

function aiwb_add_menu_page() {
    add_menu_page(
        'AI Website Builder',           // Page title
        'AI Website Builder',           // Menu title
        'manage_options',               // Capability
        'aiwb-builder',                 // Menu slug
        'aiwb_load_editor_page',        // Callback function
        'dashicons-admin-site',         // Icon
        6
    );
}
add_action('admin_menu', 'aiwb_add_menu_page');

function aiwb_load_editor_page() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You are not allowed to access this page.'));
    }

    include plugin_dir_path(__FILE__) . 'admin/editor-page.php';
}