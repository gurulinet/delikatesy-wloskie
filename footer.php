<?php wp_footer(); ?>

<footer>
	<?php
	$footerMenuArgs = [
		'theme_location' => 'footer-menu',
		'container' => 'nav',
		'after' => '<span class="separator"> | </span>'
	];
	wp_nav_menu($footerMenuArgs);
	?>
	<div class="location">
		<p><?php echo esc_attr('WinoToskanii | Garbary 6 | 66-400 Gorzów Wielkopolski'); ?></p>
		<p class="copyright"><?php echo 'Wszelkie prawa zastrzeżone - ' . date('Y') ?></p>
</footer>