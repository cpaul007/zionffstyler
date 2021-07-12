<?php

/**
 * A 3rd Party Addon for Zion Builder.
 * 
 * @wordpress-plugin
 * Plugin Name: 	ZionFFStyler
 * Plugin URI: 		https://github.com/cpaul007/zionffstyler
 * Description: 	Fluent Form styler element of Zion Builder.
 * Author: 			Paul Chinmoy
 * Author URI: 		https://www.paulchinmoy.com
 *
 * Version: 		1.0.1
 *
 * License: 		GPLv2 or later
 * License URI: 	http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: 	zionffstyler
 * Domain Path: 	languages  
 */

/**
 * Copyright (c) 2021 Paul Chinmoy. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 */

//* Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
	wp_die( __( "Sorry, you are not allowed to access this page directly.", 'wordpress' ) );
}

// Load autoloader
require __DIR__ . '/vendor/autoload.php';

// Load Plugin
require dirname( __FILE__ ) . '/includes/Plugin.php';

new ZionFfStyler\Plugin();
