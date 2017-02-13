<?php

// Register custom post type meta boxes.
require_once('includes/class-add-meta-box.php');

if (function_exists('add_theme_support'))
{
	// Add Menu Support
	add_theme_support('menus');

	// Enables post and comment RSS feed links to head
	add_theme_support('automatic-feed-links');
	
	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');
	add_image_size('large', 850, '', true); // Large Thumbnail
	add_image_size('medium', 600, '', true); // Medium Thumbnail
	add_image_size('small', 300, '', true); // Small Thumbnail
	add_image_size('custom-size', 850, 300, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

// Format site navigation
function aleksblago_nav()
{
	wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'container'       => false,
			'menu_class'      => 'nav-Links',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'items_wrap'      => '<ul class="%2$s"><li class="nav-MobileMenu js-mobile-menu"></li>%3$s</ul>',
			'depth'           => 0
		)
	);
}

// Register HTML5 Blank Navigation
function register_aleksblago_menu()
{
	register_nav_menus(array( // Using array to specify more menus if needed
		'header-menu' => __('Primary Navigation', 'aleksblago-menu'), // Main Navigation
		// 'sidebar-menu' => __('Sidebar Menu', 'aleksblago-menu'), // Sidebar Navigation
		// 'extra-menu' => __('Extra Menu', 'aleksblago-menu') // Extra Navigation if needed (duplicate as many as you need!)
	));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter( $var )
{
	return is_array($var) ? array() : '';
}

function theme_styles_and_scripts()
{
	wp_register_style('font-lora', 'http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic');
	wp_register_style('font-oswald', 'http://fonts.googleapis.com/css?family=Oswald');
	wp_register_script('aleksblago', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
	
	wp_register_style('prism', get_template_directory_uri() . '/lib/prism/prism.css');
	wp_register_script('prism', get_template_directory_uri() . '/lib/prism/prism.js');
	
	wp_enqueue_style('font-lora');
	wp_enqueue_style('font-oswald');
	wp_enqueue_script('aleksblago');
	
	wp_enqueue_style('prism');
	wp_enqueue_script('prism');
}

// Remove 'text/css' from our enqueued stylesheet
function my_style_remove( $tag )
{
	return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
	$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}

function remove_excerpt_brackets( $more )
{
	return '...';
}

function my_custom_excerpt( $length )
{
	return 70;
}

// Add textarea for embed code input.
add_aleksblago_meta_box('featured-content', array(
	'title'     => 'Featured Content',
	'pages'     => array('post'),
	'context'   => 'normal',
	'priority'  => 'high',
	'fields'    => array(
		array(
			'name' => 'Text Quote',
			'id' => 'text-quote',
			'default' => '',
			'placeholder' => '',
			'desc' => 'Chcek the box to convert this post into a "Text Quote" post.',
			'type' => 'checkbox'
		),
		array(
			'name' => 'Image Only',
			'id' => 'image-only',
			'default' => '',
			'placeholder' => '',
			'desc' => 'Chcek the box to convert this post into an "Image Only" post.',
			'type' => 'checkbox'
		),
		array(
			'name' => 'Embed Code:',
			'id' => 'featured-embed',
			'default' => '',
			'placeholder' => '',
			'desc' => 'Enter the embed code in the text area above.',
			'type' => 'textarea'
		)
	)
));

class comment_walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	// constructor – wrapper for the comments list
	function __construct() { ?>

		<section class="comments-list">

	<?php }

	// start_lvl – wrapper for child comments list
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>
		
		<section class="child-comments comments-list">

	<?php }

	// end_lvl – closing wrapper for child comments list
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 2; ?>

		</section>

	<?php }

	// start_el – HTML for comment template
	function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
	?>

		<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
			<h5 class="comment-author">
				<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
				&horbar;
				<a class="comment-time" href="<?php the_permalink(); ?>#comment-<?php comment_ID() ?>"><time datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('F j, Y') ?> @ <span><?php comment_time() ?></span></time></a>
			</h5>
			<div class="comment-content post-content" itemprop="text">
				<figure class="gravatar"><?php echo get_avatar( $comment->comment_author_email, 50, get_bloginfo('template_url') . '/img/default-avatar.png', get_comment_author() ); ?></figure>
				<?php comment_text() ?>
			</div>
			<?php edit_comment_link('<span class="comment-meta-item">Edit</span>','',''); ?></span>
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<span class="comment-meta-item">', 'after' => '</span>'))); ?>

	<?php }

	// end_el – closing HTML for comment template
	function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

		</article>

	<?php }

	// destructor – closing wrapper for the comments list
	function __destruct() { ?>

		</section>
	
	<?php }

}

// Clean Up Wordpress Head
function clean_up_wp_head ()
{
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	add_filter('the_generator', '__return_false');
	add_filter('show_admin_bar','__return_false');
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'feed_links_extra', 3);	
}

// Remove query parameters on static assets
function remove_query_parameters($src)
{
	$parts = explode( '?ver', $src );
	return $parts[0];
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
add_action('init', 'register_aleksblago_menu'); // Add HTML5 Blank Menu
add_action('wp_enqueue_scripts', 'theme_styles_and_scripts'); // wp_enqueue_scripts action hook to link only on the front-end
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
add_filter('style_loader_tag', 'my_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('excerpt_more', 'remove_excerpt_brackets');
add_filter('excerpt_length', 'my_custom_excerpt', 999);
add_action('after_setup_theme', 'clean_up_wp_head'); // Clean Up Wordpress Head
add_filter( 'script_loader_src', 'remove_query_parameters', 15, 1 ); // Remove query parameters
add_filter( 'style_loader_src', 'remove_query_parameters', 15, 1 ); // Remove query parameters

?>