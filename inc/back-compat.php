<?php // Twenty Seventeen back compat functionality. Prevents Twenty Seventeen from running on WordPress versions prior to 4.7.

function pleiades17_switch_theme() {
	switch_theme(WP_DEFAULT_THEME);
	unset($_GET['activated']);
	add_action('admin_notices', 'pleiades17_upgrade_notice');
}
add_action('after_switch_theme', 'pleiades17_switch_theme');

//Adds a message for unsuccessful theme switch.
function pleiades17_upgrade_notice() {
	$message = sprintf(__('Pleiades17 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'pleiades17'), $GLOBALS['wp_version']);
	printf('<div class="error"><p>%s</p></div>', $message);
}

function pleiades17_customize() {
	wp_die(sprintf(__('Pliades17 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'pleiades17'), $GLOBALS['wp_version']), '', array(
		'back_link' => true,
	));
}
add_action('load-customize.php', 'pleiades17_customize');

function pleiades17_preview() {
	if (isset($_GET['preview'])) {
		wp_die(sprintf(__('Pleiades17 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'pleiades17'), $GLOBALS['wp_version']));
	}
}
add_action('template_redirect', 'pleiades17_preview');
