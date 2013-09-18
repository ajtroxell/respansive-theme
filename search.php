<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
	<div class="wrap-content">

		<section class="row module">
			<article id="search-results" class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<header>
					<h1>Search results for "<em><?php the_search_query() ?></em>"</h1>
				</header>
					<dl>
		                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		                <dt><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></dt>
		                <dd><?php the_excerpt(); ?></dd>
		                <?php endwhile; else: ?>
		                <dd><?php _e("Sorry, your search returned no results."); ?></dd>
		                <?php endif; ?>
					</dl>
			</article>
		</section>

	<div class="push"></div>
	</div>
<?php get_footer(); ?>