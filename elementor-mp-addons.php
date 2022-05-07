<?php
/**
 *
 * @package ElementorMPAddons
 *
 * Plugin Name: MPAddons for Elementor
 * Description: Elementor Widgits
 * Version:     1.0.0
 * Author:      priyanka behera, manoranjan nayak
 * Text Domain: elementor-mp-addons
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Globally defining the file.
 */
define( 'ELEMENTOR_MP_ADDONS', __FILE__ );

/**
 * Include the Elementor_MP_Addons class.
 */
require plugin_dir_path( ELEMENTOR_MP_ADDONS ) . 'class-elementor-mp-addons.php';

//  Elementor_MP_Addons class initialization.
new Elementor_MP_Addons();
