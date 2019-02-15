<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 9:08 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT7_Activation' ) ) {
	class SSWT7_Activation {
		static function activate() {
			self::add_custom_roles();
		}

		static private function add_custom_roles() {
			add_role( 'staff', __( 'Staff' ), array(
				'read'       => true,
				'edit_posts' => true,
			) );

			add_role( 'manager', __( 'Manager' ), array(
				'read'       => true,
				'edit_posts' => true,
				'edit_users' => true,
				'list_users' => true
			) );
		}
	}
}