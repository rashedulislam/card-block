<?php
/**
 * Plugin Name: Gutenberg Card Block
 * Plugin URI: https://rashedul.co/card-block/
 * Description: Creating Plugin for learning
 * Author: Md Rashedul Islam
 * Author URI: https://rashedul.co
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package RACardBlock
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
