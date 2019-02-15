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
		private function get_users( $role, $single_role, $paged = 1, $html = true, $pagination = true ) {
			global $ssWT7template;
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
			$result        = false;
			if ( ! empty( $qStaffManager->get_results() ) ) {

				if ( $html ) { //if result is html
					$wrap_class = $single_role ? $role : "staff_manager";
					$result     = "<div class=\"uitems $wrap_class\" data-cat=\"$wrap_class\">";
					$result     .= "<div class=\"row\">";
					foreach ( $staff_manager as $user ) {
						$result .= $ssWT7template->render( 'user-list', array(
							'uname'   => $user->display_name,
							'uavatar' => get_avatar_url( $user->ID ),
							'urole'   => $user->roles ? $user->roles[0] : ''
						) );
					}
					$result .= "</div>";
					$result .= $pagination ? custom_pagination( $paged, $total_pages ) : '';
					$result .= "</div>";
				} else {
					foreach ( $staff_manager as $user ) {
						$result['items'][] = $ssWT7template->render( 'user-list', array(
							'uname'   => $user->display_name,
							'uavatar' => get_avatar_url( $user->ID ),
							'urole'   => $user->roles ? $user->roles[0] : ''
						) );
					}

					$result['pagination'] = $pagination ? custom_pagination( $paged, $total_pages ) : '';
				}
			}

			return $result;
		}

		function get_staffs( $paged = 1, $html = true ) {
			return $this->get_users( 'staff', true, $paged, $html );
		}

		function get_managers( $paged = 1, $html = true ) {
			return $this->get_users( 'manager', true, $paged, $html );
		}

		function get_staffs_managers( $paged = 1, $html = true ) {
			return $this->get_users( array( 'staff', 'manager' ), false, $paged, $html );
		}
	}
}