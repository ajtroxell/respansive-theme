<?php get_header(); ?>
	<div class="wrap-content">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-img">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>

		<div class="row module">
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<header>
					<ul class="meta">
						<li>in <?php echo get_the_category_list(', '); ?></li>
						<li>on <?php the_time('F j, Y'); ?></li>
						<li><a href="<?php the_permalink(); ?>#comments" title="Comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
					</ul>
					<h1><?php the_title(); ?></h1>
					<h2><?php echo get_the_excerpt(); ?></h2>
				</header>
					<?php the_content(); ?>
				<section id="comments" class="comments">
					<?php comments_template('', true); ?>
				</section>
        	</article>
		</div>

		<?php endwhile; else: ?>
		<?php endif; ?>

	<div class="push"></div>
	</div>
<?php get_footer(); ?>