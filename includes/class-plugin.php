<?php
/**
 * Main plugin loader. Registers hooks and coordinates the plugin.
 *
 * Use this class to see how to:
 * - Enqueue admin CSS/JS (admin_enqueue_scripts)
 * - Enqueue front-end CSS/JS (wp_enqueue_scripts)
 * - Load the plugin text domain for translations (init + load_plugin_textdomain)
 *
 * @package WpPluginBoilerplateAi
 */

namespace WpPluginBoilerplateAi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Plugin
 */
final class Plugin {

	/**
	 * Single instance.
	 *
	 * @var Plugin|null
	 */
	private static ?Plugin $instance = null;

	/**
	 * Get the plugin instance.
	 *
	 * @return Plugin
	 */
	public static function instance(): Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor. Registers hooks only.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'on_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
	}

	/**
	 * Fires on init. Register post types, taxonomies, or other early hooks here.
	 *
	 * Load the plugin text domain so translations from languages/ (e.g. .mo files)
	 * are used. Generate the .pot with: composer pot
	 *
	 * @return void
	 */
	public function on_init(): void {
		load_plugin_textdomain(
			'wp-plugin-boilerplate-ai',
			false,
			dirname( WP_PLUGIN_BOILERPLATE_AI_BASENAME ) . '/languages'
		);
	}

	/**
	 * Enqueue admin CSS and JS.
	 *
	 * Hook: admin_enqueue_scripts. Only loads on admin; use $hook_suffix or
	 * get_current_screen() to restrict to specific admin pages if needed.
	 *
	 * @param string $hook_suffix Current admin page hook suffix (e.g. use to restrict by page).
	 * @return void
	 */
	public function enqueue_admin_assets( string $hook_suffix ): void { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found -- For optional page restriction.
		// Optional: load only on your plugin's admin pages. Uncomment next line and use $hook_suffix.
		// if ( strpos( $hook_suffix, 'your-plugin-slug' ) === false ) { return; }.

		wp_enqueue_style(
			'wp-plugin-boilerplate-ai-admin',
			WP_PLUGIN_BOILERPLATE_AI_URL . 'assets/css/admin.css',
			array(),
			WP_PLUGIN_BOILERPLATE_AI_VERSION
		);

		wp_enqueue_script(
			'wp-plugin-boilerplate-ai-admin',
			WP_PLUGIN_BOILERPLATE_AI_URL . 'assets/js/admin.js',
			array(),
			WP_PLUGIN_BOILERPLATE_AI_VERSION,
			true
		);
	}

	/**
	 * Enqueue front-end CSS and JS.
	 *
	 * Hook: wp_enqueue_scripts. Loads on the front end. Restrict to specific
	 * pages or templates if you only need assets in certain places.
	 *
	 * @return void
	 */
	public function enqueue_frontend_assets(): void {
		wp_enqueue_style(
			'wp-plugin-boilerplate-ai-frontend',
			WP_PLUGIN_BOILERPLATE_AI_URL . 'assets/css/frontend.css',
			array(),
			WP_PLUGIN_BOILERPLATE_AI_VERSION
		);

		wp_enqueue_script(
			'wp-plugin-boilerplate-ai-frontend',
			WP_PLUGIN_BOILERPLATE_AI_URL . 'assets/js/frontend.js',
			array(),
			WP_PLUGIN_BOILERPLATE_AI_VERSION,
			true
		);
	}
}
