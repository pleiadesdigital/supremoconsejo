<?php //The front page template file ?>


<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<!-- Display content from home.php -->
		<?php 
			if (have_posts()) :	while (have_posts() ) : the_post();
					get_template_part('template-parts/page/content', 'front-page');
				endwhile;
			else : 
				get_template_part('template-parts/post/content', 'none');
			endif; 
		?>

		<?php
		// Get each of our panels and show the post data.
		if (0 !== pleiades17_panel_count() || is_customize_preview()) : 
			$num_sections = apply_filters('pleiades17_front_page_sections', 4);
			global $pleiades17counter;

			for ($i = 1; $i < (1 + $num_sections); $i++) {
				$pleiades17counter = $i;
				pleiades17_front_page_section(null, $i);
			}
		endif; // The if ( 0 !== pleiades17_panel_count() ) ends here. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
