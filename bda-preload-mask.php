<?php
/*
Plugin Name: BDA Preload Mask
Plugin URI: http://github.co.uk/
Description: Masks a page until it has fully loaded
Version: 0.1
Author: Kit Dix-Pincott (kit@thinkbda.com)
Author URI: http://thinkbda.com/team/kit
License: GPLv2 or later
*/

/*
 * Append the prelaod mask div to the bottom of the page
 */
function bda_preload_mask__html() {
	echo "\n\r<div class=\"bda-preload-mask\"></div>\n\r";
}
add_action('wp_footer', 'bda_preload_mask__html');

function bda_preload_mask__noscript() {
	
	// Add the noscript style to ensure that the mask is not visible if javascript is disabled
	$noscript = dirname(__FILE__) . "/css/noscript.css";
	echo "\n<noscript>\n<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$noscript\" />\n</noscript>\n";
	
}
add_action('wp_head','bda_preload_mask__noscript');

function bda_preload_mask__css() {
	
	$stylesheet = dirname(__FILE__) . "/css/preload-mask.css";
	$stylesheet = str_replace($_SERVER['DOCUMENT_ROOT'], '', $stylesheet);	
	
	wp_deregister_style('bda-preload-mask');
	wp_register_style('bda-preload-mask',$stylesheet);
	wp_enqueue_style('bda-preload-mask');
	
}
add_action('wp_enqueue_scripts','bda_preload_mask__css',0);

function bda_preload_mask__script() {
	
	$script = dirname(__FILE__) . "/js/preload-mask.js";
	$script = str_replace($_SERVER['DOCUMENT_ROOT'], '',$script);	
	
	wp_deregister_script('bda-preload-mask');
	wp_register_script('bda-preload-mask',$script,array('jquery'));
	wp_enqueue_script('bda-preload-mask');
	
}
add_action('wp_enqueue_scripts','bda_preload_mask__script');