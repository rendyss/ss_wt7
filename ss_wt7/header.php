<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 8:48 AM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $ssWT7template;

echo $ssWT7template->render( 'header', array(
	'is_front_page' => is_front_page()
) );