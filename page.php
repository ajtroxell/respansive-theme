<?php get_header(); ?>
	<div class="wrap-content">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="featured-img">
			<img src="/assets/css/images/featured/1.jpg" alt=""/>
		</div>

		<section class="row module">
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<header>
					<h1><?php the_title(); ?></h1>
					<h2><?php the_excerpt(); ?></h2>
				</header>
					<?php the_content(); ?>
			</article>
		</section>

		<?php endwhile; else: ?>
		<?php endif; ?>

	<div class="push"></div>
	</div>
<?php get_footer(); ?>