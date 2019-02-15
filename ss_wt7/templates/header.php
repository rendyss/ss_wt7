<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php wp_head(); ?>
</head>

<body <?php echo ! $is_front_page ? "class=\"generic\"" : ""; ?>>

<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
        </div>
        <nav id="nav-menu-container">
			<?php if ( has_nav_menu( 'main_menu' ) ) :
				wp_nav_menu( array(
						'theme_location' => 'main_menu',
						'menu_class'     => 'nav-menu',
						'depth'          => 1,
						'container'      => '',
						'walker'         => new SSWT4_Navwalker()
					)
				);
			endif; ?>
        </nav>
    </div>
</header><!-- #header -->