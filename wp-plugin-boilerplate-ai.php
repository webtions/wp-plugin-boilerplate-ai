<?php
/**
 * Plugin Name:       WP Plugin Boilerplate AI
 * Plugin URI:        https://github.com/webtions/wp-plugin-boilerplate-ai
 * Description:       A structured WordPress plugin foundation for AI-assisted development. Clone, rename, and build with guardrails.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Your Name
 * Author URI:        https://themeist.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-plugin-boilerplate-ai
 * Domain Path:       /languages
 *
 * @package WpPluginBoilerplateAi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Plugin constants */
define( 'WP_PLUGIN_BOILERPLATE_AI_VERSION', '1.0.0' );
define( 'WP_PLUGIN_BOILERPLATE_AI_FILE', __FILE__ );
define( 'WP_PLUGIN_BOILERPLATE_AI_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_PLUGIN_BOILERPLATE_AI_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_PLUGIN_BOILERPLATE_AI_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Bootstrap: load the plugin loader. No business logic here.
 *
 * How to include CSS, JS, and translations is handled in includes/class-plugin.php:
 * - Admin assets: enqueue_admin_assets() → assets/css/admin.css, assets/js/admin.js
 * - Front-end assets: enqueue_frontend_assets() → assets/css/frontend.css, assets/js/frontend.js
 * - Language: on_init() calls load_plugin_textdomain(); put .pot in languages/ (composer pot)
 */
require_once WP_PLUGIN_BOILERPLATE_AI_PATH . 'includes/class-plugin.php';

WpPluginBoilerplateAi\Plugin::instance();
