<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=true">
	<meta name="format-detection" content="telephone=yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<?php if (is_search()) : ?>
	<meta name="robots" content="noindex, nofollow" />
	<?php endif; ?>

	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>
	
	<meta nam="title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?>">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon/apple-touch-icon.png">
	
	<!-- Open Graph (FB) -->
	<meta property="og:title" content="Aleks Blagojevich">
	<meta property="og:type" content="blog">
	<meta property="og:url" content="http://aleksblago.com">
	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-192x192.png">
	<meta property="og:site_name" content="Aleks Blagojevich">
	<meta property="og:description" content="A blog about Technology, Business, Marketing, and everything else that interests designer and developer Aleks Blagojevich.">

	<!-- Twitter Card -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@TwitterName">
	<meta name="twitter:description" content="A blog about Technology, Business, Marketing, and everything else that interests designer and developer Aleks Blagojevich.">
	<meta name="twitter:title" content="Aleks Blagojevich">
	<meta name="twitter:url" content="http://aleksblago.com">
	<meta name="twitter:creator" content="@_aleksblago">
	<meta name="twitter:image" content="<?php bloginfo('template_directory'); ?>/img/favicon/favicon-192x192.png">	

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if (!current_user_can('activate_plugins')) : ?>
	<script>
		
	</script>
	<?php wp_head(); ?>
	
	<?php endif; ?>
</head>

<body itemscope itemtype="http://schema.org/WebPage">
	<div class="ui-Container">
		<?php get_template_part('navigation'); ?>