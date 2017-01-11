<?php // Main Template file ?>

<?php get_header(); ?>

<div class="wrap">
	<?php if (is_home() && ! is_front_page()) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e('Posts', 'pleiades17'); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2>Template for the BLOG</h2>
			<?php
				if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'template-parts/post/content', get_post_format());
					endwhile;
					the_posts_pagination( array(
						'prev_text' => pleiades17_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous page', 'pleiades17') . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __('Next page', 'pleiades17') . '</span>' . pleiades17_get_svg(array('icon' => 'arrow-right')),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'pleiades17') . ' </span>',
					));
			else :
				get_template_part('template-parts/post/content', 'none');
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
