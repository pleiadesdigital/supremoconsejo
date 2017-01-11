<?php //Displays header media ?>

<div class="custom-header">
	<div class="custom-header-media">
		<?php the_custom_header_markup(); ?>
		<img src="http://localhost/~ronyortiz/sites2017/pleiades17/wp-content/themes/pleiades-reverse/assets/images/header2.jpg">
	</div>
	<?php get_template_part('template-parts/header/site', 'branding'); ?>
</div><!-- .custom-header -->
