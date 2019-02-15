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

if ( ! class_exists( 'SSWT4_Public_Hooks' ) ) {
	class SSWT4_Public_Hooks {
		function __construct() {
			$this->set_page_title();
			$this->add_head_content();
			$this->remove_emoji();
		}

		function set_page_title() {
			add_theme_support( 'title-tag' );
//			add_filter( 'wp_title', array( $this, 'page_title_callback' ) );
		}

		function add_head_content() {
			add_action( 'wp_head', array( $this, 'head_content_callback' ) );
		}

		function page_title_callback() {
			$pg_title = ! is_author() ? get_the_title() . " -" : "";

			return is_front_page() ? get_bloginfo( 'name' ) . " - " . get_bloginfo( 'description' ) : ( is_404() ? "404 - " . get_bloginfo( 'description' ) : $pg_title . " " . get_bloginfo( 'name' ) );
		}

		function head_content_callback() {
			echo "<meta charset=\"utf-8\">";
			echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
		}

		function remove_emoji() {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );

			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
		}
	}
}