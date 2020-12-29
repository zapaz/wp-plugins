<?php
/*
Plugin Name: Ma Boite
Text domain: maboite
Domain Path: /languages
*/

function ajoute_ma_boite_html($post)
{
  _e('boite', 'maboite');
  _e('ma', 'maboite');
}
function ajoute_ma_boite()
{
  add_meta_box(
    'ma_boite',
    __('Ma Boite', 'maboite'),
    'ajoute_ma_boite_html'
  );
}
add_action('add_meta_boxes', 'ajoute_ma_boite');

add_action('plugins_loaded', function () {
  load_plugin_textdomain('maboite', FALSE, basename(dirname(__FILE__)) . '/languages/');
});

function custom_menu() { 
  add_menu_page( 
      'Page Boite', 
      __('Menu Boite','maboite'), 
      'edit_posts', 
      'menu_slug', 
      'page_callback_function', 
      'dashicons-media-spreadsheet' 
     );
}

add_action('admin_menu', 'custom_menu');
