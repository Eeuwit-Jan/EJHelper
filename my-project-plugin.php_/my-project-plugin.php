<?php

/*
     Plugin Name: EJHelper
     Plugin URI: https://github.com/eeuwit-jan
     Description: Improves accessibility with a few clicks in the pop-up, simple and efficient.
     Version: 1.0.0
     Author: Eeuwit-Jan van der Bok
     Author URI: https://github.com/eeuwit-jan
     License: MIT
    */

if (!defined('ABSPATH')) exit;

function initializeEJHelperRenderer($atts)
{
    //Render HTML
    ob_start();
?>

<?php
    require_once plugin_dir_path(__FILE__) . 'popup.php';
    echo ob_get_clean();
}
wp_enqueue_script('jquery');
// Initialize image after body opens on page
add_action('wp_body_open', 'initializeEJHelperRenderer');

// Enqueue styles
function enqueueEJHelperStyles()
{
    $plugin_url = plugin_dir_url(__FILE__);

    wp_enqueue_style('the-style', $plugin_url . "styles/style.css");
    wp_enqueue_script('the-script', $plugin_url . "scripts/script.js");
}

add_action('wp_enqueue_scripts', 'enqueueEJHelperStyles');
