<?php

/**
 * @package IPFS
 * @version 0.0.2
 */
/*
Plugin Name: IPFS Client
Plugin URI: https://wordpress.org/plugins/ipfs23_131/
Description: intégration ipfs
Author: Alain Papazoglou
Version: 0.0.2
Author URI: https://www.kredeum.com
*/

function ipfs_script()
{
  printf('<script defer src="' . WP_PLUGIN_URL . '/ipfs/ipfs.js"></script>');
}
add_action('wp_head', 'ipfs_script');

function _cid($pdfId)
{
  $ch = curl_init();

  $pdf_buffer = file_get_contents(get_attached_file($pdfId));
  $boundary = 'flkjqdshlkerjhtlertkljezrtkljhezrtlkjehzrtlkj';

  curl_setopt($ch, CURLOPT_URL, 'http://localhost:5001/api/v0/add?cid-version=1');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; boundary=' . $boundary));
  curl_setopt($ch, CURLOPT_POSTFIELDS, "--" . $boundary
    . "\r\nContent-Type: application/octet-stream\r\nContent-Disposition: file; \r\n\r\n"
    . $pdf_buffer . "\r\n--" . $boundary);

  $ret = json_decode(curl_exec($ch))->Hash;
  curl_close($ch);

  return $ret;
}

function ipfs()
{
  $ret = "";
  $pdfs = get_attached_media('application/pdf');
  foreach ($pdfs as $pdf) {

    $cid = get_post_meta($pdf->ID, 'CID', true);
    if (!$cid) {
      $cid = _cid($pdf->ID);
      update_post_meta($pdf->ID, 'CID', $cid);
    }
    $ret .= sprintf('<kredeum-ipfs pdf="' . $pdf->guid . '">');
  }
  return $ret;
}

function filter_the_content_in_the_main_loop($content)
{

  // Check if we're inside the main loop in a single Post.
  if (is_singular() && in_the_loop() && is_main_query()) {
    return $content . ipfs();
  }

  return $content;
}
add_filter('the_content', 'filter_the_content_in_the_main_loop');
