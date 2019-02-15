<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 9:37 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT7' ) ) {
	class SSWT7 {
		public static function Instance() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->load_front_end_assets();
			$this->register_public_hooks();
			$this->register_admin_hooks();
			$this->load_templates();
			$this->load_navwalker();
		}

		function load_front_end_assets() {
			require get_template_directory() . '/inc/class-sswt7-front-assets.php';
			SSWT7_Front_Assets::Instance();
		}

		function register_public_hooks() {
			require get_template_directory() . '/inc/class-sswt7-public-hooks.php';
			SSWT7_Public_Hooks::Instance();
		}

		function register_admin_hooks() {
			require get_template_directory() . '/inc/class-sswt7-admin-hooks.php';
			SSWT7_Admin_Hooks::Instance();
		}

		function load_templates() {
			require get_template_directory() . '/inc/class-sswt7-template.php';
		}

		function load_navwalker() {
			require get_template_directory() . '/inc/class-sswt7-navwalker.php';
		}
	}
}