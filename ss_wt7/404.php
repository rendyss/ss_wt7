<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 8:49 AM
 */

global $ssWT4template;

get_header();

echo $ssWT4template->render( '404' );

get_footer();