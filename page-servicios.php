<?php 
/* Template Name: Services Page */
?>

<?php get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h2>SERVICIOS</h2>
			<?php 
				$args = array(
					'post_type'				=> 'servicios',
				);
				$query = new WP_Query($args);
			?>

			<ul>
			<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<li>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
					<?php the_excerpt(); ?>
				</li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</ul>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();