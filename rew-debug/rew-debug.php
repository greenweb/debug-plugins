<?php
/*
Plugin Name: Rew Debug
Description: Description
Plugin URI: http://www.greenvilleweb.us
Author: rew rixom
Author URI: http://www.greenvilleweb.us
Version: 1.0
License: GPL2

*/

/*

    Copyright (C) 2017  rew rixom  (email : rew@greenvilleweb.us)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function rew_d_show_all_options() {
  $alloptions = wp_load_alloptions();
  return '<pre>' . print_r($alloptions, true) . '</pre>';

}
add_shortcode( 'all-options','rew_d_show_all_options' );

function rew_d_show_options_with_this_string_in_key( $atts ) {
  $atts = extract( shortcode_atts( array( 'look_for'=> false ),$atts ) );
  if(!$look_for) return "<h1>You need to add the 'look_for' attribute to the shortcode</h1>";


  $all_options = wp_load_alloptions();

  $returned_options = array();
  foreach( $all_options as $name => $value ) {
    #if(stristr($name, $look_for)) $returned_options[$name] = $value;
    #if( preg_match('/^'.$look_for.'/', $name) ) $returned_options[$name] = $value;
    if( preg_match('/^'.$look_for.'/', $name) ) {
      #delete_option($name);
      $returned_options[$name] = $value;
    }

  }
  $return  = '<h2>Options that contain: ' .$look_for. '</h2>';
  $return .= '<pre>' . print_r($returned_options, true) . '</pre>';
  return $return;
}
add_shortcode( 'show-options-with-this-string-in-key','rew_d_show_options_with_this_string_in_key' );


function rew_d_show_options_that_start_this_string_in_key( $atts ) {
  $atts = extract( shortcode_atts( array( 'look_for'=> false ),$atts ) );
  if(!$look_for) return "<h1>You need to add the 'look_for' attribute to the shortcode</h1>";


  $all_options = wp_load_alloptions();

  $returned_options = array();
  foreach( $all_options as $name => $value ) {
    #if(stristr($name, $look_for)) $returned_options[$name] = $value;
    #if( preg_match('/^'.$look_for.'/', $name) ) $returned_options[$name] = $value;
    if( preg_match('/^'.$look_for.'/', $name) ) {
      #delete_option($name);
      $returned_options[$name] = $value;
    }

  }
  $return  = '<h2>Options that contain: ' .$look_for. '</h2>';
  $return .= '<pre>' . print_r($returned_options, true) . '</pre>';
  return $return;
}
add_shortcode( 'show-options-that-start-with-this-string-in-key','rew_d_show_options_that_start_this_string_in_key' );