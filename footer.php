	<footer class="primary">
		<div class="row" role="navigation">
			<div class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<div class="wp-pagenavi">
					<?php if ( ! is_single() ) { ?>
						<?php previous_posts_link('&laquo; Previous') ?>
						<?php next_posts_link('Next &raquo;') ?>
					<?php } ?>
					<?php if ( is_single() ) { ?>
						<?php previous_post_link('%link', '&laquo; View Prev', false); ?> 
						<?php next_post_link('%link', 'View Next &raquo;', false); ?> 
					<?php } ?>
				</div>
			</div>
		</div>
		<?php if ( ! is_page() ) { ?>
		<div class="row">
			<article class="small-12 medium-10 medium-centered large-8 large-centered columns">
				<?php
					$args = array('posts_per_page' => 1,'orderby' => 'rand','ignore_sticky_posts' => 1);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>" title="Keep reading">Keep reading</a></p>
				<?php endwhile;?>
				<?php endif;?>
			</article>
		</div>
		<?php } ?>
		<div class="row">
			<div class="small-12 medium-10 medium-centered large-8 large-centered columns text-center">
				<p class="copy">&copy;<?php echo date("Y") ?> <?php bloginfo('name'); ?>. <?php $options = get_option('respansive_options'); if ($options['footer-text']) { echo $options['footer-text']; } ?></p>
			</div>
		</div>
	</footer>

</div>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.master-ck.js"></script>

	<?php if ( is_single() || is_page() ) { ?>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.validate-ck.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.comments-ck.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.login-ck.js"></script>
	<?php } ?>

	<?php wp_footer(); ?>

	<?php $options = get_option('respansive_options'); if ($options['google-analytics']) { echo $options['google-analytics']; } ?>

</body>
</html>