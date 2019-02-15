<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="list_item">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="excerpt">
		<?php echo $post_type == 'post' ? get_the_excerpt() : $post_type; ?>
    </span>
</div>