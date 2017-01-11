<?php //Template for displaying search results pages ?>

<?php get_header(); ?>

<div class="wrap">

	<header class="page-header">
		<?php if (have_posts()) : ?>
			<h1 class="page-title"><?php printf( __('Search Results for: %s', 'pleiades17'), '<span>' . get_search_query() . '</span>'); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e('Nothing Found', 'pleiades17'); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if (have_posts()) : while (have_posts()) : the_post();
				get_template_part('template-parts/post/content', 'excerpt');
			endwhile; 
			the_posts_pagination(array(
				'prev_text' => pleiades17_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous page', 'pleiades17') . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __('Next page', 'pleiades17') . '</span>' . pleiades17_get_svg(array('icon' => 'arrow-right')),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'pleiades17') . ' </span>',
			));
		else : ?>
			<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pleiades17'); ?></p>
			<?php
				//	get_search_form();
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
