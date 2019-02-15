<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<h2><?php the_title(); ?></h2>
<p>You can show individual team member's detail here, but i choose shortcode from the plugin
	instead</p>
<?php echo do_shortcode( '[ss_teammember id=' . get_the_ID() . ' use_bootstrap=true]' ); ?>
<p>In case we really need to display individual field, so here's the name: <?php the_title(); ?>
	, position: <?php echo get_post_meta( get_the_ID(), 'ssteammember_position', true ); ?>,
	email: <?php echo get_post_meta( get_the_ID(), 'ssteammember_email', true ); ?>,
	website: <?php echo get_post_meta( get_the_ID(), 'ssteammember_website', true ); ?>, and so
	on.</p>