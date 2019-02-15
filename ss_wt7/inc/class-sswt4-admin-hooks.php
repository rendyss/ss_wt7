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

if ( ! class_exists( 'SSWT4_Admin_Hooks' ) ) {
	class SSWT4_Admin_Hooks {
		function __construct() {
			$this->register_sidebar();
			$this->register_menu_nav();
		}

		function register_sidebar() {
			register_sidebar( array(
				'name'          => 'Right sidebar',
				'id'            => 'right_1',
				'before_widget' => '<div class="sidebar-item">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			) );
		}

		function register_menu_nav() {
			register_nav_menus( array(
				'main_menu'   => 'Main Menu',
				'footer_menu' => 'Footer Menu',
			) );
		}
	}
}