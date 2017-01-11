<?php //Template part for displaying gallery posts ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if (is_sticky() && is_home()) :
			echo pleiades17_get_svg(array('icon' => 'thumb-tack'));
		endif;
	?>
	<header class="entry-header">
		<?php	if ('post' === get_post_type()) : ?>
			<div class="entry-meta">
			<?php 
				if (is_single()) :
					pleiades17_posted_on();
				else :
					echo pleiades17_time_link();
					pleiades17_edit_link();
				endif;
				?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php
			if (is_single()) {
				the_title('<h1 class="entry-title">', '</h1>');
			} else {
				the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink()) . '" rel="bookmark">', '</a></h2>');
			}
		?>
	</header><!-- .entry-header -->

	<?php if ('' !== get_the_post_thumbnail() && !is_single() && !get_post_gallery()) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('pleiades17-featured-image'); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">

		<?php if (!is_single()) : if (get_post_gallery()) : ?>
			<div class="entry-gallery">'
				<?php echo get_post_gallery(); ?>
			</div>
		<?php  endif; endif; ?>

		<?php
		if (is_single() || !get_post_gallery()) :

			the_content(sprintf(
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pleiades17'),
				get_the_title()
			));

			wp_link_pages(array(
				'before'      => '<div class="page-links">' . __('Pages:', 'pleiades17'),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			));

		endif; ?>

	</div><!-- .entry-content -->

	<?php if (is_single()) : ?>
		<?php pleiades17_entry_footer(); ?>
	<?php endif; ?>

</article><!-- #post-## -->
