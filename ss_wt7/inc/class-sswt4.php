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

if ( ! class_exists( 'SSWT4' ) ) {
	class SSWT4 {
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
			require get_template_directory() . '/inc/class-sswt4-front-assets.php';
			new SSWT4_Front_Assets();
		}

		function register_public_hooks() {
			require get_template_directory() . '/inc/class-sswt4-public-hooks.php';
			new SSWT4_Public_Hooks();
		}

		function register_admin_hooks() {
			require get_template_directory() . '/inc/class-sswt4-admin-hooks.php';
			new SSWT4_Admin_Hooks();
		}

		function load_templates() {
			require get_template_directory() . '/inc/class-sswt4-template.php';
		}

		function load_navwalker() {
			require get_template_directory() . '/inc/class-sswt4-navwalker.php';
		}
	}
}