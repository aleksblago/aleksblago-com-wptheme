<?php

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

// HTML5 Blank navigation
function aleksblago_nav()
{
	wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'container'       => false,
			'menu_class'      => 'nav-Links',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
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


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/
add_action('init', 'register_aleksblago_menu'); // Add HTML5 Blank Menu
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
add_filter('style_loader_tag', 'my_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('excerpt_more', 'remove_excerpt_brackets');
add_filter( 'excerpt_length', 'my_custom_excerpt', 999);


?>