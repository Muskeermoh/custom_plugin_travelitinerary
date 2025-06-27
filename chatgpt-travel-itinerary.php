
<?php
/*
Plugin Name: ChatGPT Travel Itinerary Generator
Description: A custom plugin to generate personalized travel itineraries using the ChatGPT API.
Version: 1.0
Author: Your Name
*/

// Ensure this file is being called directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include other necessary files
require_once(plugin_dir_path(__FILE__) . 'includes/itinerary-form.php');
require_once(plugin_dir_path(__FILE__) . 'includes/api-integration.php');
?>
