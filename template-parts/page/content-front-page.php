<?php //Displays content for front page ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pleiades17-panel '); ?> >

	<?php if (has_post_thumbnail()) :
		$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pleiades17-featured-image');
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$thumbnail_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pleiades17-featured-image');
		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
	?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url($thumbnail[0]); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr($ratio); ?>%"></div>
		</div><!-- .panel-image -->

	<?php endif; ?>

	<div class="fp-main-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
					the_content(sprintf(
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pleiades17'),
						get_the_title()
					));
				?>
			</div><!-- .entry-content -->
		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
