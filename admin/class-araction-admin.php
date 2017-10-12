<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.crushed-eyes.com
 * @since      1.0.0
 *
 * @package    Araction
 * @subpackage Araction/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Araction
 * @subpackage Araction/admin
 * @author     Friedrich Seydel <f.seydel@crushed-eyes.com>
 */
class Araction_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Araction_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Araction_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/araction-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Araction_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Araction_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/araction-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'ARaction Settings', 'araction' ),
			__( 'ARaction', 'araction' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_account_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'ACCOUNT', 'araction' ),
			__( 'Account', 'araction' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_account_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'DEVICES', 'araction' ),
			__( 'Devices', 'araction' ),
			'manage_options',
			'araction-devices',
			array( $this, 'display_devices_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'PROJECTS & SYNC', 'araction' ),
			__( 'Projects & Sync', 'araction' ),
			'manage_options',
			'araction-projects_sync',
			array( $this, 'display_projects_sync_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'PROJECT SETTINGS', 'araction' ),
			__( 'Project settings', 'araction' ),
			'manage_options',
			'araction-projects_settings',
			array( $this, 'display_projects_settings_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'EDIT MARKERS', 'araction' ),
			__( 'Edit markers', 'araction' ),
			'manage_options',
			'araction-markers_edit',
			array( $this, 'display_markers_edit_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'SORT & COPY MARKERS', 'araction' ),
			__( 'Sort & copy markers', 'araction' ),
			'manage_options',
			'araction-markers_edit',
			array( $this, 'display_markers_sort_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'GENERAL SETTINGS', 'araction' ),
			__( 'General settings', 'araction' ),
			'manage_options',
			'araction-general',
			array( $this, 'display_general_page' )
		);
		$this->plugin_screen_hook_suffix = add_submenu_page(
			$this->plugin_name,
			__( 'EXPORT & IMPORT', 'araction' ),
			__( 'Export & Import', 'araction' ),
			'manage_options',
			'araction-export',
			array( $this, 'display_export_page' )
		);
	}
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_account_page() {
		include_once 'partials/araction-admin-account.php';
	}
	public function display_devices_page() {
		include_once 'partials/araction-admin-devices.php';
	}
	public function display_projects_sync_page() {
		include_once 'partials/araction-admin-projects_sync.php';
	}
	public function display_projects_settings_page() {
		include_once 'partials/araction-admin-projects_settings.php';
	}
	public function display_markers_edit_page() {
		include_once 'partials/araction-admin-markers_edit.php';
	}
	public function display_markers_sort_page() {
		include_once 'partials/araction-admin-markers_sort.php';
	}
	public function display_general_page() {
		include_once 'partials/araction-admin-general.php';
	}
	public function display_export_page() {
		include_once 'partials/araction-admin-export.php';
	}
}
