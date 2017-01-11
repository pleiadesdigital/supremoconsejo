<?php //Custom template tags for this theme

if (!function_exists('pleiades17_posted_on')) :
	function pleiades17_posted_on() {
		$byline = sprintf(
			__('by %s', 'pleiades17'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
		);
		echo '<span class="posted-on">' . pleiades17_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	} //pleiades17_posted_on()
endif;

if (!function_exists('pleiades17_time_link')) :
	function pleiades17_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf($time_string,
			get_the_date(DATE_W3C),
			get_the_date(),
			get_the_modified_date(DATE_W3C),
			get_the_modified_date()
		);
		return sprintf(
			__('<span class="screen-reader-text">Posted on</span> %s', 'pleiades17'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);
	} //pleiades17_time_link()
endif;

if (!function_exists('pleiades17_entry_footer')) :
	function pleiades17_entry_footer() {
		$separate_meta = __(', ', 'pleiades17');
		$categories_list = get_the_category_list($separate_meta);
		$tags_list = get_the_tag_list('', $separate_meta);
		if (((pleiades17_categorized_blog() && $categories_list ) || $tags_list) || get_edit_post_link()) {
			echo '<footer class="entry-footer">';
				if ('post' === get_post_type()) {
					if (($categories_list && pleiades17_categorized_blog()) || $tags_list) {
						echo '<span class="cat-tags-links">';
							if ($categories_list && pleiades17_categorized_blog()) {
								echo '<span class="cat-links">' . pleiades17_get_svg( array('icon' => 'folder-open')) . '<span class="screen-reader-text">' . __('Categories', 'pleiades17') . '</span>' . $categories_list . '</span>';
							}
							if ($tags_list) {
								echo '<span class="tags-links">' . pleiades17_get_svg(array('icon' => 'hashtag')) . '<span class="screen-reader-text">' . __('Tags', 'pleiades17') . '</span>' . $tags_list . '</span>';
							}
						echo '</span>';
					}
				} //if ('post' === get_post_type())
				pleiades17_edit_link();
			echo '</footer> <!-- .entry-footer -->';
		}
	} //pleiades17_entry_footer()
endif;

if (!function_exists('pleiades17_edit_link')) :
	function pleiades17_edit_link() {
		$link = edit_post_link(
			sprintf(
				__('Edit<span class="screen-reader-text"> "%s"</span>', 'pleiades17'),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		return $link;
	} //pleiades_edit_link()
endif;

function pleiades17_front_page_section($partial = null, $id = 0) {
	if (is_a($partial, 'WP_Customize_Partial')) {
		global $pleiades17counter;
		$id = str_replace('panel_', '', $partial->id);
		$pleiades17counter = $id;
	}
	global $post;
	if (get_theme_mod('panel_' . $id)) {
		global $post;
		$post = get_post(get_theme_mod('panel_' . $id));
		setup_postdata($post);
		set_query_var('panel', $id);
		get_template_part('template-parts/page/content', 'front-page-panels');
		wp_reset_postdata();
	} elseif (is_customize_preview()) {
		echo '<article class="panel-placeholder panel pleiades17-panel pleiades17-panel' . $id . '" id="panel' . $id . '"><span class="pleiades17-panel-title">' . sprintf(__('Front Page Section %1$s Placeholder', 'pleiades17'), $id) . '</span></article>';
	}
} //pleiades17_front_page_section()

function pleiades17_categorized_blog() {
	$category_count = get_transient('pleiades17_categories');
	if (false === $category_count) {
		$categories = get_categories(array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		));
		$category_count = count($categories);
		set_transient('pleiades17_categories', $category_count);
	}
	return $category_count > 1;
} //pleiades17_categorized_blog()

function pleiades17_category_transient_flusher() {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	delete_transient('pleiades17_categories');
}
add_action('edit_category', 'pleiades17_category_transient_flusher');
add_action('save_post',     'pleiades17_category_transient_flusher');
