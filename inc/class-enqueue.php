<?php
/**
 * @package iwc-responsive-br
 * @author imawc
 * @license GPL-2.0+
 */

namespace iwc_responsive_br;

class Enqueue {

	/**
	 * Constructor
	 */
	function __construct() {
		// Enqueue front-end scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Enqueue block editor scripts
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_scripts' ) );

	}

	/**
	 * Enqueue front-end scripts
	 */
	public function enqueue_scripts() {
		// wp_register_style( IWC_RBR_NAME, false );
		wp_register_style( IWC_RBR_NAME, IWC_RBR_URL . '/build/style-index.css', array(), NULL );
		wp_enqueue_style( IWC_RBR_NAME );
	}

	/**
	 * Enqueue block editor scripts
	 */
	public function enqueue_editor_scripts() {
		// wp_register_style( IWC_RBR_NAME, false );
		wp_register_style( IWC_RBR_NAME, IWC_RBR_URL . '/build/style-index.css', array(), NULL );
		wp_enqueue_style( IWC_RBR_NAME );

		// $inline_css  = '.iwc-dropdown-popover .components-dropdown-menu__menu-item{justify-content:left;height:auto;}';
		// $inline_css .= '.iwc-dropdown-popover .components-dropdown-menu__menu-item svg{margin-right:8px;}';

		// wp_add_inline_style( IWC_RBR_NAME, $inline_css );

		$asset = include( IWC_RBR_PATH . '/build/index.asset.php' );
		wp_enqueue_script( IWC_RBR_NAME, IWC_RBR_URL . '/build/index.js', $asset['dependencies'] );
	}
}

new Enqueue();
