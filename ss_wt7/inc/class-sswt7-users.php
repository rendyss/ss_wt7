<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/15/2019
 * Time: 3:19 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT7_Users' ) ) {
	class SSWT7_Users {
		private function get_users( $role, $single_role, $pagination = true ) {
			global $ssWT7template;
			$paged    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$per_page = 2;
			$querry   = array(
				'number' => $per_page,
				'paged'  => $paged
			);

			if ( $single_role ) {
				$querry['role'] = $role;
			} else {
				$querry['role__in'] = $role;
			}

			$qStaffManager = new WP_User_Query( $querry );
			$total_pages   = ceil( $qStaffManager->get_total() / $per_page );

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

				$result_html .= $pagination ? custom_pagination( $paged, $total_pages ) : '';
			}

			return $result_html;
		}

		function get_staffs() {
			return $this->get_users( 'staff', true );
		}

		function get_managers() {
			return $this->get_users( 'manager', true );
		}

		function get_staff_manager() {
			return $this->get_users( array( 'staff', 'manager' ), false );
		}
	}
}