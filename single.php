<?php get_header(); ?>
	<div class="wrap-content">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-img">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } else { ?>
				 <?php if((get_post_meta($post->ID, "featured_image_holder", true))) { ?>
					<div class="featured-img">
						<?php if((get_post_meta($post->ID, "post_theme_color", true))) { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/css/themes/images/<?php echo get_post_meta($post->ID, "post_theme_color", true); ?>.jpg" alt="" />
						<?php } else { ?>
							<img src="<?php $options = get_option('respansive_options'); if (($options['themeinput'] == 'default')) { echo "".get_template_directory_uri()."/assets/css/themes/images/default.jpg"; } elseif (($options['themeinput'] == 'none')) { echo ""; } else { echo "".get_template_directory_uri()."/assets/css/themes/images/".$options['themeinput'].".jpg"; } ?>" alt="" />
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>

		<div class="row module">
			<article id="post-<?php the_ID(); ?> <?php post_class(); ?>" class="small-12 medium-10 medium-centered large-8 large-centered columns <?php if ( has_post_thumbnail()) {} else { echo "no-thumb"; } ?>">
				<?php $options = get_option('respansive_options'); if (($options['authorinput'] == 'yes')) { ?>
				<div class="author-box hide-for-small">
					<a href="#author-info"><?php echo get_avatar( get_the_author_meta('email'),'60'); ?></a>
				</div>
				<?php } ?>
				<header>
					<ul class="meta">
						<li>in <?php echo get_the_category_list(', '); ?></li>
						<li>on <?php the_time('F j, Y'); ?></li>
						<li><a href="<?php the_permalink(); ?>#comments" title="Comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></li>
					</ul>
					<h1><?php the_title(); ?></h1>

					<ul class="extras text-right">
					<?php  if((get_post_meta($post->ID, "star_rating", true))) { ?>
					<?php $starRating=get_post_meta($post->ID, 'star_rating', true); ?>
					<li>
						<div class="rating">
							<?php if ($starRating == "1") : ?>
								Rating: <i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i>
							<?php elseif ($starRating == "2") : ?>
								Rating: <i class="metro-plan-starred"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i>
							<?php elseif ($starRating == "3") : ?>
								Rating: <i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i>
							<?php elseif ($starRating == "4") : ?>
								Rating: <i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred outlined"></i><i class="metro-plan-starred outlined"></i>
							<?php elseif ($starRating == "5") : ?>
								Rating: <i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred outlined"></i>
							<?php elseif ($starRating == "6") : ?>
								Rating: <i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred"></i><i class="metro-plan-starred"></i>
							<?php endif; ?>
						</div>
					</li>
					<?php } ?>

					<?php  if((get_post_meta($post->ID, "podcast_url", true))) { ?>
						<li>
							<div class="podcast">
								Podcast: <a href="<?php echo get_post_meta($post->ID, "podcast_url", true); ?>"><i class="metro-tumblr-audio"></i> Listen</a>
							</div>
						</li>
					<?php } ?>
				</ul>

					<h2><?php echo get_the_excerpt(); ?></h2>
				</header>

					<?php the_content(); ?>
					<?php if( has_tag() ) { ?>
					<div class="tags uc">
						<h4>Tagged with</h4>
						<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
					</div>
					<?php } ?>
					<?php $options = get_option('respansive_options'); if (($options['authorinput'] == 'yes')) { ?>
					<div id="author-info" class="row author-info">
						<div class="small-12 medium-8 medium-centered large-7 columns">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta('email'),'80'); ?></a>
							<a class="author-name" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_meta( 'display_name' ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div>
					</div>
					<?php } ?>
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