<?php
/**
 * Plugin Name:       IWC RESOINSIVE BR
 * Description:
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            imawc
 * License:           GPL2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       iwc-responsive-br
 *
 * @package iwc-responsive-br
 * @author imawc
 * @license GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$active_theme = wp_get_theme();
$theme_tags[] = $active_theme['Tags'];

$iwc_extension_data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

// if ( in_array( 'IWCTHEME', $theme_tags, true ) ) {

	/**
	 * Defined Plugin const
	 */

	define( 'IWC_RBR_VERSION', $iwc_extension_data );
	define( 'IWC_RBR_NAME', 'iwc-responsive-br' );
	define( 'IWC_RBR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
	define( 'IWC_RBR_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'IWC_RBR_BASENAME', plugin_basename( __FILE__ ) );

	/**
	 *
	 */

	require_once IWC_RBR_PATH . '/inc/class-main.php';

// }

new iwc_responsive_br\Main();