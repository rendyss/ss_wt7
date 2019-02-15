<?php get_header(); ?>

<?php
global $ssWT4template;

echo $ssWT4template->render( 'front-masthead' );
echo $ssWT4template->render( 'front-team' );
?>
<?php get_footer();