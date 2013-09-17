	<footer>
		<nav class="row" role="navigation">
			<div class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<div class="wp-pagenavi">
					<?php if ( ! is_single() ) { ?>
						<?php previous_posts_link('&laquo; Previous') ?>
						<?php next_posts_link('Next &raquo;') ?>
					<?php } ?>
					<?php if ( is_single() ) { ?>
						<?php previous_post('%','&laquo; View Prev', 'no'); ?> 
						<?php next_post('%','View Next &raquo;', 'no'); ?>
					<?php } ?>
				</div>
			</div>
		</nav>
		<section class="row">
			<article class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<?php
					$args = array('posts_per_page' => 1,'orderby' => 'rand','ignore_sticky_posts' => 1);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" title="Keep reading">Keep reading</a></p>
				<?php endwhile;?>
				<?php endif;?>
			</article>
		</section>
		<div class="row">
			<div class="small-12 medium-10 medium-centered large-8 large-centered columns text-center">
				<p class="copy">&copy;<?php echo date("Y") ?> <?php bloginfo('name'); ?></p>
			</div>
		</div>
	</footer>

</div>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.master-ck.js"></script>

</body>
</html>