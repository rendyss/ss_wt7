<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:34 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SSWT7_Ajax' ) ) {
	class SSWT7_Ajax {
		static function Instance() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->register_ajax();
		}

		private function register_ajax() {
			add_action( 'wp_ajax_staff', array( $this, 'staff_callback' ) );
			add_action( 'wp_ajax_nopriv_staff', array( $this, 'staff_callback' ) );

			add_action( 'wp_ajax_manager', array( $this, 'manager_callback' ) );
			add_action( 'wp_ajax_nopriv_manager', array( $this, 'manager_callback' ) );

			add_action( 'wp_ajax_staff_manager', array( $this, 'staff_manager_callback' ) );
			add_action( 'wp_ajax_nopriv_staff_manager', array( $this, 'staff_manager_callback' ) );

		}

		function staff_callback() {
			$paged      = ! empty( $_GET['p'] ) ? $_GET['p'] : 1;
			$sswt7Users = new SSWT7_Users();
			$results    = $sswt7Users->get_staffs( $paged, false );
			wp_send_json( $results );
		}

		function manager_callback() {
			$paged      = ! empty( $_GET['p'] ) ? $_GET['p'] : 1;
			$sswt7Users = new SSWT7_Users();
			$results    = $sswt7Users->get_managers( $paged, false );
			wp_send_json( $results );
		}

		function staff_manager_callback() {
			$paged      = ! empty( $_GET['p'] ) ? $_GET['p'] : 1;
			$sswt7Users = new SSWT7_Users();
			$results    = $sswt7Users->get_staffs_managers( $paged, false );
			wp_send_json( $results );
		}
	}
}