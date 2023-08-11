<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 */

/**
 * The admin-specific functionality of the plugin.
 *
 */
class WOO_QUICKBOOKS_WOOQ_Admin {

    /**
     * helper
     *
     * @var mixed
    */
    public $helper;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $helper ) {
        $this->helper = $helper;
	}

}
