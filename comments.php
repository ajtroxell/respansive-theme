<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

	<?php if (have_comments()) : global $wp_query; ?>

	<?php if (!empty($comments_by_type['comment'])) { ?>

		<h3 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' ); ?></h3>
		<ol class="commentlist">
			<?php wp_list_comments( array('callback' => 'respansive_comments', 'type' => 'comment', 'max_depth' => '8') ); ?>
		</ol>

	<?php } ?>
	<?php if (!empty($comments_by_type['pingback'])) { ?>

		<h3 id="ping-tracks"><?php echo count($wp_query->comments_by_type['pingback']); ?> Pings/Trackbacks</h3>
		<ol class="pingbacklist">
			<?php wp_list_comments( array('callback' => 'respansive_pingtracks', 'type' => 'pings') ); ?>
		</ol>

	<?php } ?>

<?php else : // if there are no comments yet ?>

	<?php if (comments_open()) : ?>
		<!-- comments open, no comments -->
	 <?php else : ?>
		<!-- comments closed, no comments -->
	<?php endif; ?>

<?php endif; ?>

	<?php comment_form(); ?>