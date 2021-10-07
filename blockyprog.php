<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/HoverEpic
 * @since             1.0.0
 * @package           BlockyProg
 *
 * @wordpress-plugin
 * Plugin Name:       BlockyProg
 * Plugin URI:        https://github.com/HoverEpic
 * Description:       Wordpress plugin
 * Version:           1.0.0
 * Author:            Epic
 * Author URI:        https://github.com/HoverEpic
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blockyprog
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BLOCKYPROG_VERSION', '1.0.0');

function BlockyProg() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
    return BlockyProg::instance();
}

function get_blockyprog_dir_path() {
    return plugin_dir_path(__FILE__);
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-blockyprog-activator.php
 */
function activate_blockyprog() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-blockyprog-activator.php';
    BlockyProg_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blockyprog-deactivator.php
 */
function deactivate_blockyprog() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-blockyprog-deactivator.php';
    BlockyProg_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_blockyprog');
register_deactivation_hook(__FILE__, 'deactivate_blockyprog');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-blockyprog.php';

/**
 * Returns the main instance of BlockyProg.
 *
 * @since  1.0.0
 * @return BlockyProg
 */
function BP() {
    return BlockyProg::instance();
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blockyprog() {

    $plugin = new BlockyProg();
    $plugin->run();
}

run_blockyprog();
