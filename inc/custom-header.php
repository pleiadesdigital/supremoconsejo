<?php //Custom header implementation https://codex.wordpress.org/Custom_Headers ?>

<?php

function pleiades17_custom_header_setup() {
	add_theme_support('custom-header', apply_filters('pleiades17_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri('/assets/images/header.jpg'),
		'width'              => 2000,
		'height'             => 1200,
		'flex-height'        => true,
		'video'              => true,
		'wp-head-callback'   => 'pleiades17_header_style',
	) ) );

	register_default_headers(array(
		'default-image' => array(
			'url'           => '%s/assets/images/header.jpg',
			'thumbnail_url' => '%s/assets/images/header.jpg',
			'description'   => __('Default Header Image', 'pleiades17'),
		),
	));
}
add_action('after_setup_theme', 'pleiades17_custom_header_setup');

if (!function_exists('pleiades17_header_style')) :
	function pleiades17_header_style() {
		$header_text_color = get_header_textcolor();
		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}
		?>
		<style id="pleides17-custom-header-styles" type="text/css">
		<?php
			// Has the text been hidden?
			if ('blank' === $header_text_color) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			else :
		?>
			.site-title a,
			.colors-dark .site-title a,
			.colors-custom .site-title a,
			body.has-header-image .site-title a,
			body.has-header-video .site-title a,
			body.has-header-image.colors-dark .site-title a,
			body.has-header-video.colors-dark .site-title a,
			body.has-header-image.colors-custom .site-title a,
			body.has-header-video.colors-custom .site-title a,
			.site-description,
			.colors-dark .site-description,
			.colors-custom .site-description,
			body.has-header-image .site-description,
			body.has-header-video .site-description,
			body.has-header-image.colors-dark .site-description,
			body.has-header-video.colors-dark .site-description,
			body.has-header-image.colors-custom .site-description,
			body.has-header-video.colors-custom .site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
	endif; // End of pleiades17_header_style.

function pleiades17_video_controls($settings) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . __('Play background video', 'pleiades17') . '</span>' . pleiades17_get_svg(array('icon' => 'play'));
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __('Pause background video', 'pleiades17') . '</span>' . pleiades17_get_svg(array('icon' => 'pause'));
	return $settings;
}
add_filter('header_video_settings', 'pleiades17_video_controls');
