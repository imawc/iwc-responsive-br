<?php
/**
 * @package iwc-responsive-br
 * @author imawc
 * @license GPL-2.0+
 */

namespace iwc_responsive_br;

class Main {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Load classes
		$this->load_classes();
	}

	/**
	 * Load classes
	 */
	private function load_classes() {

		require_once IWC_RBR_PATH . '/inc/shortcode.php';
		require_once IWC_RBR_PATH . '/inc/class-enqueue.php';
	}

}

new Main();