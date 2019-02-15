<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<footer class="footer-distributed">

    <div class="footer-right">
        <!--<div class="socmed">-->
        <a class="facebook wow bounceIn" data-wow-delay="1.1s" href="#"
           style="visibility: visible; animation-delay: 1.1s; animation-name: bounceIn;"><i class="fa fa-facebook"></i></a>
        <a class="twitter wow bounceIn" data-wow-delay="1.2s" href="#"
           style="visibility: visible; animation-delay: 1.2s; animation-name: bounceIn;"><i
                    class="fa fa-twitter"></i></a>
        <a class="instagram wow bounceIn" data-wow-delay="1.3s" href="#"
           style="visibility: visible; animation-delay: 1.3s; animation-name: bounceIn;"><i class="fa fa-instagram"></i></a>
        <!--</div>-->
    </div>

    <div class="footer-left">
		<?php if ( has_nav_menu( 'footer_menu' ) ) :
			wp_nav_menu( array(
					'theme_location' => 'footer_menu',
					'menu_class'     => 'footer-links',
					'depth'          => 1,
					'container'      => '',
					'walker'         => new SSWT4_Navwalker()
				)
			);
		endif; ?>

        <p class="cname wown" data-wow-delay="1.4s">&copy; <?php echo get_bloginfo( 'name' ) . " " . date( 'Y' ); ?></p>
    </div>
</footer>
</body>
<script>
    var $ = jQuery.noConflict();
</script>

<?php wp_footer(); ?>
</html>
