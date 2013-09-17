<?php
/*
 * Add theme options
 */
	require_once (TEMPLATEPATH .'/functions/theme-options.php');
/*
 * Remove header junk
 */
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
/**
 * Menus
 */
	register_nav_menus( array(
        'main-menu' => __( 'Main Menu' )
    ));
/**
 * Thumbnails
 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(1200, 320, true);
/**
 * Feed links
 */
	add_theme_support( 'automatic-feed-links' );
/**
 * Add magnific popup class to images
 */
	add_filter('the_content', 'addlightboxrel_replace');
	function addlightboxrel_replace ($content)
	{	global $post;
		$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
	  	$replacement = '<a$1class="pop" href=$2$3.$4$5$6</a>';
	    $content = preg_replace($pattern, $replacement, $content);
	    return $content;
	}
/**
 * Excerpt
 */
	function replace_excerpt($content) {
		return str_replace('[...]',
			'...',
			$content
		);
	}
	add_filter('the_excerpt', 'replace_excerpt');
/**
 * Contact width
 */
	if ( ! isset( $content_width ) )
		$content_width = 755;
/**
 * Remove caption line styling
 */
	add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
	add_shortcode('caption', 'fixed_img_caption_shortcode');
	function fixed_img_caption_shortcode($attr, $content = null) {
		if ( ! isset( $attr['caption'] ) ) {
			if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
				$content = $matches[1];
				$attr['caption'] = trim( $matches[2] );
			}
		}
		$output = apply_filters('img_caption_shortcode', '', $attr, $content);
		if ( $output != '' )
			return $output;

		extract(shortcode_atts(array(
			'id'	=> '',
			'align'	=> 'alignnone',
			'width'	=> '',
			'caption' => ''
		), $attr));

		if ( 1 > (int) $width || empty($caption) )
			return $content;

		if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

		return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px">'
		. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
	}
?>
<?php function squaredv2_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_id(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php function squaredv2_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="avatar">
				<?php echo get_avatar($comment,$size='66' ); ?>
			</div>

			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.', 'white') ?></em>
				<br />
			<?php endif; ?>

			<?php comment_text() ?>

			<div class="comment-meta">
				<div class="info vcard">
					<?php printf(__('<cite class="fn">%s</cite>, '), get_comment_author_link()) ?>
					<?php printf(__('%1$s at %2$s', 'white'), get_comment_date(),get_comment_time()) ?><?php edit_comment_link( __( '(Edit)', 'white' ), ' ' ) ?>
				</div>
				<?php if($args['max_depth']!=$depth) { ?>
				<div class="reply">
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
<?php } ?>