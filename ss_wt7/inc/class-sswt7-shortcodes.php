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
			add_shortcode( 'wp7_training', array( $this, 'list_staff_and_manager' ) );
		}

		function list_staff_and_manager( $atts ) {
			global $ssWT7template;

			$args = shortcode_atts( array(
				'paged' => 1
			), $atts );

			$querry        = array(
				'role__in' => array( 'staff', 'manager' ),
				'paged'    => $args['paged'],
				'number'   => 3
			);
			$qStaffManager = new WP_User_Query( $querry );

			$staff_manager = $qStaffManager->get_results();
			$result_html   = '';
			if ( ! empty( $qStaffManager->get_results() ) ) {
				$result_html .= "<div class=\"row\">";
				foreach ( $staff_manager as $user ) {
					$result_html .= $ssWT7template->render( 'user-list', array(
						'uname'   => $user->display_name,
						'uavatar' => get_avatar_url( $user->ID ),
						'urole'   => $user->roles ? $user->roles[0] : ''
					) );
				}
				$result_html .= "</div>";
			}

			return $result_html;

		}
	}
}