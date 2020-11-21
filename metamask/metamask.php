<?php
/**
 * @package Metamask
 * @version 0.0.1
 */
/*
Plugin Name: Metamask
Plugin URI: https://wordpress.org/plugins/metamask23_131/
Description: intégration metamask
Author: Al P
Version: 0.0.2
Author URI: https://www.kredeum.com
*/

function metamask_script(){
	printf('<script defer src="/wp-content/plugins/metamask/metamask.js"></script>' );
}
add_action( 'wp_head', 'metamask_script' );

function metamask() {
	printf('<li id="metamask"><svelte-metamask></li>' );
}
add_action( 'wp_meta', 'metamask' );
