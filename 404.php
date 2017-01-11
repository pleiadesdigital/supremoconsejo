<?php // The template for displaying 404 pages (not found) ?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e('That page can&rsquo;t be found.', 'pleiades17'); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'pleiades17'); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
