<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 9:10 AM
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT4_Front_Assets' ) ) {
	class SSWT4_Front_Assets {
		function __construct() {
			$this->load_global_assets();
		}

		function load_global_assets() {
			//These assets is globally used in front-end
			add_action( 'wp_enqueue_scripts', array( $this, 'global_assets_callback' ) );
		}

		function global_assets_callback() {
			$path = get_template_directory_uri();
			//include main style
			wp_enqueue_style( 'style.css', get_stylesheet_uri() );

			//include bootstrap's assets
			wp_enqueue_style( 'bootstrap.css', $path . '/assets/plugins/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_script( 'bootstrap.js', $path . '/assets/plugins/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );

			//include font-awesome's assets
			wp_enqueue_style( 'font-awesome.css', $path . '/assets/plugins/font-awesome/css/font-awesome.min.css' );

			//Include google fonts
			wp_enqueue_style( 'google_font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700' );

			//Include 3rd party assets
			wp_enqueue_style( '3rdparty.css', $path . '/assets/css/3rdparty.css' );
			wp_enqueue_script( '3rdparty.js', $path . '/assets/js/3rdparty.js', array( 'jquery' ), false, true );

			//include WOW.js's assets
			wp_enqueue_script( 'wow.js', $path . '/assets/plugins/wow/wow.min.js', array( 'jquery' ), false, true );

			//Include Superfish's assets
			wp_enqueue_script( 'hoverIntent.js', $path . '/assets/plugins/superfish/hoverIntent.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'superfish.js', $path . '/assets/plugins/superfish/superfish.min.js', array( 'jquery' ), false, true );

			//include custom assets
			wp_enqueue_style( 'custom.css', $path . '/assets/css/custom.css' );
			wp_enqueue_script( 'custom.js', $path . '/assets/js/custom.js', array( 'jquery' ), false, true );
		}
	}
}