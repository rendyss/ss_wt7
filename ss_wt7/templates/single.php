<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<h2><?php the_title(); ?></h2>
<?php echo "<p class=\"info\"><i class=\"fa fa-info-circle\"></i> Posted on " . get_the_date() . " by " . get_the_author() . "</p>"; ?>

<?php the_content(); ?>