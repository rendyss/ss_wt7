<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 9:30 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT7_Public_Hooks' ) ) {
	class SSWT7_Public_Hooks {
		public static function Instance() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->set_page_title();
			$this->add_head_content();
			$this->remove_emoji();
		}

		private function set_page_title() {
			add_theme_support( 'title-tag' );
		}

		private function add_head_content() {
			add_action( 'wp_head', array( $this, 'head_content_callback' ) );
		}

		private function remove_emoji() {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );

			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
		}

		function head_content_callback() {
			echo "<meta charset=\"utf-8\">";
			echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
		}
	}
}