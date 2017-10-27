<?php
/**
 * Plugin Name: Second Street Promotion
 * Description: Plugin will allow Second Street Affiliates to embed a Second Street Promotion within their WordPress site(s).
 * Version: 1.0
 * Author: Second Street (Heather McCarron)
 * Author URI: http://secondstreet.com
 * License: GPL2
 */

/*  Copyright 2014  Second Street | Heather McCarron  (email : heather@secondstreet.com)

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
**************************************************************************/

// Blocks direct access to plugin
defined( 'ABSPATH' ) or die( "Access Forbidden" );

defined( 'ABSPATH' ) or die( "Access Forbidden" ); // Blocks direct access to plugin

// Define Second Street Plugin
define( 'SECONDSTREET_PLUGIN_VERSION', '1.0' );
define( 'SECONDSTREET_PLUGIN__MINIMUM_WP_VERSION', '3.1' );
define( 'SECONDSTREET_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SECONDSTREET_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// [ss-promo] Code
function ss_promo_func( $atts, $content = null ) {
	$a = shortcode_atts( array (
			'op_id' => '',
			'op_guid' => '',
			'routing' => ''
		), $atts );

	$ss_script_url = 'https://embed-' . $a['op_id'] . '.secondstreetapp.com/Scripts/dist/embed.js';

	return '<script src="' . esc_url( $ss_script_url ) . '" data-ss-embed="promotion" data-opguid="' . esc_attr( $a['op_guid'] ) . '" data-routing="' . esc_attr( $a['routing'] ) . '"></script>';

}
add_shortcode( 'ss-promo', 'ss_promo_func' );

// [ss-signup] Code
function ss_signup_func( $atts, $content = null ) {
	$a = shortcode_atts( array (
			'audience_id' => '',
			'design_id' => '',
			'text_header' => '',
			'text_subheader' => '',
			'text_label' => '',
			'text_button' => '',
			'text_thanks' => '',
			'image_src' => '',
			'color' => '',
			'color_contrast' => '',
			'font' => ''
		), $atts );

	$ss_script_url = 'https://embed.secondstreetapp.com/Scripts/dist/optin.js';

	return '<script src="' . esc_url( $ss_script_url ) . '" data-ss-optin="embed" data-audience-id="' . esc_attr( $a['audience_id'] ) . '" data-design-id="' . esc_attr( $a['design_id'] ) . '" data-text-header="' . esc_attr( $a['text_header'] ) . '" data-text-subheader="' . esc_attr( $a['text_subheader'] ) . '" data-text-label="' . esc_attr( $a['text_label'] ) . '" data-text-button="' . esc_attr( $a['text_button'] ) . '" data-text-thanks="' . esc_attr( $a['text_thanks'] ) . '" data-image-src="' . esc_attr( $a['image_src'] ) . '" data-color="' . esc_attr( $a['color'] ) . '" data-color-contrast="' . esc_attr( $a['color_contrast'] ) . '" data-font="' . esc_attr( $a['font'] ) . '"></script>';

}

add_shortcode( 'ss-promo', 'ss_promo_func' );
add_shortcode( 'ss-signup', 'ss_signup_func' );
