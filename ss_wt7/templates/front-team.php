<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<section id="team">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">Team</h3>
            <p class="section-description">This section going to be team member's section</p>
        </div>
		<?php echo do_shortcode( '[ss_teammember use_bootstrap=true]' ); ?>
    </div>
</section>