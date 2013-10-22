<?php
/*
 Template Name: Login
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
					<?php if (!(current_user_can('level_0'))){ ?>
						<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post" id="login">
							<label for="log" id="log">Username<span class="required">*</span></label>
				            	<input type="text" name="log" id="log" value="<?php echo esc_html(stripslashes($user_login), 1) ?>" size="20" required/>
				            <label for="pwd" id="pwd">Password<span class="required">*</span></label> 
				            	<input type="password" name="pwd" id="pwd" required/>
				            <label for="answer" id="answer">Name the small house pet that says "<i>meow</i>"<span class="required">*</span></label>
								<input type="text" name="answer" value="" required/>
				            <input type="submit" value="Register" id="register" />
				            <label for="rememberme">
				            	<input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me
				            </label>
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" /> 
						</form>
						<small>If you can't remember your login informatio, you can <a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">recover your password</a>. After successful login, you will be taken to the admin dashboard.</small>
					<?php } else { ?>
						<p>You are logged in, feel free to <a href="<?php echo wp_logout_url(urlencode($_SERVER['REQUEST_URI'])); ?>">logout</a> or visit the <a href="http://XXX/wp-admin/">admin dashboard</a> to make a post.</p>
					<?php }?>
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