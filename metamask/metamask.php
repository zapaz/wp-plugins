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
Version: 0.0.1
Author URI: https://www.kredeum.com
*/

function metamask() {
	printf('<li id="metamask">%s</li>', "Metamask" );
}
add_action( 'wp_meta', 'metamask' );
