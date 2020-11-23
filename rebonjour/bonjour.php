<?php
/**
 * @package Bonjour
 * @version 0.0.1
 */
/*
Plugin Name: Bonjour
Plugin URI: https://wordpress.org/plugins/bonjour23_131/
Description: Bonjour à vous
Author: Al P
Version: 0.0.1
Author URI: https://www.kredeum.com
*/

function bonjour() {
	$lyrics = "Bonjour\nBienvenue\nBonjour bonjour\nBonne journée\nBonjour chez vous\nBien le bonjour\nBonsoir\nBonne nuit";
	$lyrics = explode( "\n", $lyrics );
	printf('<li id="bonjour">%s</li>',wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] ));
}
add_action( 'wp_meta', 'bonjour' );
