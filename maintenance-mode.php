<?php
/**
 * Plugin Name: Maintenance Mode
 * Description: Enables lightweight maintenance mode for the site.
 * Version: 1.0
 * License: MIT
 * Author: SDkid
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// Function to display maintenance message
function mm_maintenance_mode()
{
    if (!current_user_can('administrator') || !is_user_logged_in()) {
        wp_die(
            '<h1>Site Under Maintenance</h1><p>Our website is currently undergoing scheduled maintenance. Please check back later.</p>',
            'Maintenance Mode',
            array('response' => 503)
        );
    }
}

// Hook the function to the 'get_header' action
add_action('template_redirect', 'mm_maintenance_mode');

?>