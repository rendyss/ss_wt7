<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/15/2019
 * Time: 3:12 PM
 */

/*Template name: Page - All Managers */ ?>

<?php get_header(); ?>

<?php while ( have_posts() ): the_post(); ?>

    <main>
        <div class="container">
            <div class="content">
                <h2><?php the_title(); ?></h2>
                <p>This is going to be a page with list of all managers</p>
				<?php echo do_shortcode( '[wp7_managers]' ); ?>
            </div>
        </div>
    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
