<?php
/**
 * @package Horloge
 * @version 0.0.2
 */
/*
Plugin Name: Horloge
Plugin URI: https://wordpress.org/plugins/horloge23_131/
Description: intégration horloge
Author: Al P
Version: 0.0.2
Author URI: https://www.kredeum.com
*/

function horloge_script(){
	printf('<script defer src="' . WP_PLUGIN_URL . '/horloge/horloge.js"></script>' );
}
add_action( 'wp_head', 'horloge_script' );

function horloge() {
	printf('<li id="horloge"><kredeum-horloge tz="UTC"></li>' );
}
add_action( 'wp_meta', 'horloge' );
echo ABSPATH;