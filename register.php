<?php
/*
 Template Name: Register
 */
get_header(); ?>

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
					<h1><?php the_title(); ?></h1>
					<h2><?php echo get_the_excerpt(); ?></h2>
				</header>
					<?php the_content(); ?>
					<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post" id="register">
						<label for="user_login" id="user_login">Username<span class="required">*</span></label>
			            	<input type="text" name="user_login" value="" id="user_login" class="input" required/>
			            <label for="user_email" id="user_email">Email<span class="required">*</span></label> 
			            	<input type="text" name="user_email" value="" id="user_email" class="input" required/>
			            <label for="answer" id="answer">Name the small house pet that says "<i>meow</i>"<span class="required">*</span></label>
							<input type="text" name="answer" value="" required/>
			            <?php do_action('register_form'); ?>  
			            <input type="submit" value="Register" id="register" />  
					</form>
					<small>After registration you are classified as a subscriber and can complete your profile, but you will not be able to make any posts until an administrator has approved your account. Sorry about this, but the world is just too spammy.</small>
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