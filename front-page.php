<?php //The front page template file ?>


<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<!-- Display content from home.php -->
		<?php 
			if (have_posts()) :	while (have_posts()) : the_post();
				get_template_part('template-parts/page/content', 'front-page');
			endwhile; endif; 
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
