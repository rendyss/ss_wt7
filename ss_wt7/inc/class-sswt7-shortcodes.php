<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/15/2019
 * Time: 2:18 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT7_Shortcode' ) ) {
	class SSWT7_Shortcode {
		static function Instance() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->register_shortcode();
		}

		private function register_shortcode() {
			add_shortcode( 'wp7_users', array( $this, 'list_staff_and_manager' ) );
			add_shortcode( 'wp7_staffs', array( $this, 'list_staff' ) );
			add_shortcode( 'wp7_managers', array( $this, 'list_manager' ) );
		}

		function list_staff_and_manager() {
			$ssWT7Users = new SSWT7_Users();
			return $ssWT7Users->get_staffs_managers();
		}

		function list_staff() {
			$ssWT7Users = new SSWT7_Users();

			return $ssWT7Users->get_staffs();
		}

		function list_manager() {
			$ssWT7Users = new SSWT7_Users();

			return $ssWT7Users->get_managers();
		}
	}
}