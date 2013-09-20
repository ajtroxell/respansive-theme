<?php get_header(); ?>
	<div class="wrap-content">
		<?php $options = get_option('respansive_options'); if (($options['taglineinput'] == 'yes')) { ?>
		<div class="hide-for-small tagline">
			<div class="row">
				<div class="medium-10 medium-centered large-8 large-centered columns">
					<p><?php echo html_entity_decode(get_bloginfo('description')); ?></p>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="row module">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns">
					<?php $options = get_option('respansive_options'); if (($options['authorinput'] == 'yes')) { ?>
					<div class="author-box">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta('email'),'60'); ?></a>
					</div>
					<?php } ?>
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