<?php
/**
 * @package spigot_Sample_Wordpress_Plugin
 * @version 0.1
 */
/*
Plugin Name: Spigot Sample Wordpress Plugin
Plugin URI: https://zachary.host/
Description: This plugin injects a javascript snippet if it meets all criteria: 1. Android user agent 2. URL contains query string source with a value of google. It is then injected using jQuery and on document load waits 5 seconds, does an async call to a function called promptUser() which injects HTML after an element with i dof article, then writes the value of the source query string inside the element in "b" which I assume means bold tags.
Author: Zachary Toney
Version: 0.1
Author URI: https://zachary.host/
Text Domain: spigot-sample-plugin
*/

function javascriptInjection() {
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(stripos($ua,'android') !== false) {
			if ($_GET['source'] == 'google') {
				echo '<script type="text/javascript" src="'.plugins_url('js/spigot-sample-plugin.js', __FILE__).'"></script>';
			}
		}
}

// Add hook for front-end <head></head>
add_action( 'wp_head', 'javascriptInjection' );