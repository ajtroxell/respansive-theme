<?php get_header(); ?>

	<div class="wrap-content">

		<div class="row module">
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<header>
					<h1>Error 404: Page not Found</h1>
				</header>
					<p>Sorry, but the page that was once here has been deleted, renamed, or lost somehow. Click <a href="/">here</a> to return to the home page.</p>

					<h2>Try searching</h2>
					<?php get_search_form(); ?>
			</article>
		</div>

	<div class="push"></div>
	</div>
<?php get_footer(); ?>