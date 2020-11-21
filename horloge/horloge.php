<?php
/**
 * @package Horloge
 * @version 0.0.1
 */
/*
Plugin Name: Horloge
Plugin URI: https://wordpress.org/plugins/horloge23_131/
Description: intégration horloge
Author: Al P
Version: 0.0.1
Author URI: https://www.kredeum.com
*/

function horloge_script(){
	printf('<script defer src="/wp-content/plugins/horloge/horloge.js"></script>' );
}
add_action( 'wp_head', 'horloge_script' );

function horloge() {
	printf('<li id="horloge"><svelte-horloge></li>' );
}
add_action( 'wp_meta', 'horloge' );
