<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 2:17 PM
 */

global $ssWT4template;

get_header();

while ( have_posts() ) : the_post(); ?>

    <main>
        <div class="container">
            <div class="content">
				<?php if ( is_active_sidebar( 'right_1' ) ) { ?>
                <div class="row">
                    <div class="col-sm-8">
						<?php } ?>
						<?php echo $ssWT4template->render( 'single-team-member' ); ?>
						<?php if ( is_active_sidebar( 'right_1' ) ) { ?>
                    </div>
                    <div class="col-sm-4">
                        <div class="sidebars">
							<?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
			<?php } ?>
            </div>
        </div>
    </main>

<?php endwhile;

get_footer(); ?>
