<?php get_header(); ?>
	<div class="wrap-content">

		<div class="row module">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns">
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
					<ul class="meta">
						<li>in <?php echo get_the_category_list(', '); ?></li>
						<li>on <?php the_time('F j, Y'); ?></li>
						<li><a href="<?php the_permalink(); ?>#comments" title="Comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
					</ul>
			</article>
			<?php endwhile; else: ?>
			<?php endif; ?>
		</div>

	<div class="push"></div>
	</div>
<?php get_footer(); ?>