<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
global $meta_boxes;

$meta_boxes = array();

// Per post theme
$meta_boxes[] = array(
    'id' => 'entry_options',
    'title' => 'Entry Options',
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',

    'fields' => array(
        // SELECT BOX
        array(
            'name'     => __( 'Post Theme Color' ),
            'id'       => "post_theme_color",
            'type'     => 'select',
            'options'  => array(
                '' => __( 'default' ),
                'theme-alizarin' => __( 'alizarin' ),
                'theme-amethyst' => __( 'amethyst' ),
                'theme-belize-hole' => __( 'belize hole' ),
                'theme-blue-good' => __( 'blue good' ),
                'theme-carrot' => __( 'carrot' ),
                'theme-concrete' => __( 'concrete' ),
                'theme-emerald' => __( 'emerald' ),
                'theme-orange' => __( 'orange' ),
                'theme-peter-river' => __( 'peter river' ),
                'theme-pink-lizard' => __( 'pink lizard' ),
                'theme-pomegranate' => __( 'pomegranate' ),
                'theme-pumpkin' => __( 'pumpkin' ),
                'theme-wet-asphalt' => __( 'wet asphalt' ),
                'theme-wisteria' => __( 'wisteria' ),
            ),
            // Select multiple values, optional. Default is false.
            'multiple'    => false,
            'std'         => 'value2',
            'placeholder' => __( 'select a color' ),
        ),
        array(
            'name'     => __( 'Show placeholder?' ),
            'desc' => 'A placeholder image the same color as your site or post theme will be used if "yes" is selected and no featured image is assigned.',
            'id'       => "featured_image_holder",
            'type'     => 'select',
            'options'  => array(
                'yes' => __( 'yes' ),
                '' => __( 'no' ),
            ),
            // Select multiple values, optional. Default is false.
            'multiple'    => false,
            'std'         => 'value2',
            'placeholder' => __( 'yes or no' ),
        ),
        array(
            'name'    => __( 'Star Rating' ),
            'id'      => "star_rating",
            'type'    => 'select',
            // Array of 'value' => 'Label' pairs for radio options.
            // Note: the 'value' is stored in meta field, not the 'Label'
            'options'  => array(
                '0' => __( 'select stars' ),
                '1' => __( '0 stars' ),
                '2' => __( '1 star' ),
                '3' => __( '2 stars' ),
                '4' => __( '3 stars' ),
                '5' => __( '4 stars' ),
                '6' => __( '5 stars' ),
            ),
            // Select multiple values, optional. Default is false.
            'multiple'    => false,
            'std'         => 'value0',
        ),
        array(
            'name'  => __( 'Podcast URL', 'rwmb' ),
            'id'    => "podcast_url",
            'desc'  => __( 'If this post has an accompanying podcast, enter the url.' ),
            'type'  => 'text',
            'std'   => __( '' ),
        ),
    )
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;

    global $meta_boxes;
    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
