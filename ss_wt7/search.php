<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/12/2019
 * Time: 8:52 AM
 */

global $ssWT4template;

get_header(); ?>

    <main>
        <div class="container">
            <div class="content">

				<?php if ( is_active_sidebar( 'right_1' ) ) { ?>
                <div class="row">
                    <div class="col-sm-8">
						<?php } ?>
                        <h2>Search result for: "<?php echo $s; ?>"</h2>
						<?php if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								echo $ssWT4template->render( 'search-list', array(
									'post_type' => $post->post_type
								) );
							endwhile;
						else:
							echo $ssWT4template->render( 'search-not-found' );
						endif; ?>
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

<?php get_footer(); ?>