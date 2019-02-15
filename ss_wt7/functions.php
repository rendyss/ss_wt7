<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 8:79 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'sswt7_setup_theme' );

function sswt7_setup_theme() {
	require_once get_template_directory() . '/inc/class-sswt7-activation.php';
	SSWT7_Activation::activate();
}

//Call the main class
require get_template_directory() . '/inc/class-sswt7.php';
$ssTestimonialsV2 = SSWT7::Instance();

global $ssWT7template;
$ssWT7template = new SSWT7_Template( get_template_directory() . '/templates' );