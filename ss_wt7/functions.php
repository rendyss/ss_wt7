<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 8:49 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_switch_theme', 'sswt4_setup_theme' );

function sswt4_setup_theme() {
	require_once get_template_directory() . '/inc/class-sswt4-activation.php';
	SSWT4_Activation::activate();
}

//Call the main class
require get_template_directory() . '/inc/class-sswt4.php';
$ssTestimonialsV2 = SSWT4::Instance();

$ssWT4template = new SSWT4_Template( get_template_directory() . '/templates' );