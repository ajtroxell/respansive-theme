<?php
/*
 * Add theme options
 */
	require_once (TEMPLATEPATH .'/functions/theme-options.php');
/*
 * Add meta-boxes
 */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( TEMPLATEPATH . '/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
include 'boxes.php';
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
/*
 * Remove admin bar
 */
	add_filter('show_admin_bar', '__return_false');
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
	set_post_thumbnail_size(1594, 384, true);
/**
 * Feed links
 */
	add_theme_support( 'automatic-feed-links' );
/**
 * Remove bio HTML sanitization
 */
	remove_filter('pre_user_description', 'wp_filter_kses');
/**
 * Add excerpts to pages
 */
	add_action( 'init', 'respansive_page_excerpts' );
	function respansive_page_excerpts() {
	     add_post_type_support( 'page', 'excerpt' );
	}
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
<?php function respansive_pingtracks($comment, $args, $depth) { ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<?php comment_author_link() ?>
<?php } ?>
<?php function respansive_comments($comment, $args, $depth) { ?>
	<li <?php comment_class(); ?> id="ping-<?php comment_ID() ?>">
		<div class="wrap-comment">
			<div class="gravatar">
				<?php echo get_avatar($comment,$size='60' ); ?>
			</div>

			<header class="author"><?php comment_author_link() ?></header>

			<footer><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> (<a href="#comment-<?php comment_ID() ?>" title="">#</a>) <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
			</footer>

			<div class="comment-content">
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'white') ?></em>
				<?php endif; ?>

				<?php comment_text() ?>
			</div>

			<?php if($args['max_depth']!=$depth) { ?>
			<div class="reply">
				<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			<?php } ?>
		</div>
<?php } ?>