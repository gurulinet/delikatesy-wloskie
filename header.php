<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
    <header class="site-header header-<?php get_the_ID() ?>">
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')) ?>">
                    <?php if (function_exists('the_custom_logo')) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <!--MOVE HERE IMG AFTER ADDING THEME SUPPORTS!!!-->
                    <?php endif; ?>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" class="logoimg"
                         title="Winotoskanii"/>
                </a>
            </div><!--LOGO-->
            <div class="header-information">
                <div class="socials">
			        <?php initSmMenu(); ?>
                </div>
                <div class="address">
                    <p>WinoToskanii</p>
                    <p>Garbary 6 66-400</p>
                    <p>Gorzów Wielkopolski</p>
                </div>
            </div>
        </div>
    </header>
    <div class="main-menu">
        <!--MOBILE FIRST-->
        <div class="mobile-menu">
            <a href="#" class="mobile"><i class="fa fa-bars">Menu</i></a>
        </div>
        <div class="navigation">
            <?php initMainMenu(); ?>
        </div>
    </div>
</body>
</html>